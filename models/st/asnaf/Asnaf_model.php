<?php
class Asnaf_model extends CI_Model{

public function get_fe2a($id){
    $this->db->where('from_id',$id);
    $query = $this->db->get('products');
    if ($query->num_rows() >0 ){
        return $query->result();
    }
    return false;

}
    public function get_we7da($id){
        $this->db->where('type',$id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;

    }
    public function get_code(){
        $query = $this->db->get('st_asnaf');
        if ($query->num_rows() >0 ){
            return $query->last_row()->code;
        }
        return 0;

    }

    public function insert_sanf($img){

    $data['code']= $this->input->post('code');
    $data['code_br']= $this->input->post('code_br');
    $data['code_qr']= $this->input->post('code_qr');
    $data['name']= $this->input->post('name');
    $data['fe2a']= $this->input->post('fe2a');
    $data['tasnef']= $this->input->post('tasnef');
    $data['whda']= $this->input->post('whda');
    $data['sbig']= $this->input->post('sbig');
    $data['ssmall']= $this->input->post('ssmall');
    $data['slahia']= $this->input->post('slahia');
    $data['details']= $this->input->post('details');
    $data['price']= $this->input->post('price');
    $data['img']= $img;
    $this->db->insert('st_asnaf',$data);

    }

    public function display_data(){
        $query = $this->db->get('st_asnaf');
        if ($query->num_rows() >0 ){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->fe2a_name= $this->get_id('products','id',$row->fe2a,'name');
                $data[$i]->tasnef_name= $this->get_id('products','id',$row->tasnef,'name');
                $data[$i]->we7da_name= $this->get_id('st_setting','id_setting',$row->whda,'title_setting');
                $data[$i]->rased_motah = $this->get_asnaf_rased($row->code);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function get_id($table,$where,$value,$select){
        $query = $this->db->get_where($table,array($where =>$value));
        if ($query->num_rows()>0){
            return $query->row()->$select;
        }
        return 0;
    }

    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('st_asnaf');
        if ($query->num_rows() >0 ){
           // return $query->row();
            $i= 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                 $data[$i]->tasnef_name= $this->get_id('products','id',$row->tasnef,'name');
                $data[$i]->fe2a_name= $this->get_id('products','id',$row->fe2a,'name');
                $data[$i]->we7da_name= $this->get_id('st_setting','id_setting',$row->whda,'title_setting');

                $i++;

            }
            return $data;

        }
        return 0;
    }

    public function update($id,$img){
    if (!empty($img)){
        $data['img']= $img;
    }
        $data['code']= $this->input->post('code');
        $data['code_br']= $this->input->post('code_br');
        $data['code_qr']= $this->input->post('code_qr');
        $data['name']= $this->input->post('name');
        $data['fe2a']= $this->input->post('fe2a');
        $data['tasnef']= $this->input->post('tasnef');
        $data['whda']= $this->input->post('whda');
        $data['sbig']= $this->input->post('sbig');
        $data['ssmall']= $this->input->post('ssmall');
        $data['slahia']= $this->input->post('slahia');
        $data['details']= $this->input->post('details');
        $data['price']= $this->input->post('price');
        $this->db->where('id',$id);
        $this->db->update('st_asnaf',$data);

    }
    public function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('st_asnaf');

    }


    //_______________NEW_______________

    public function buildTree($where)
    {
      $query= $this->db->where($where)->order_by('id','ASC')->get('products')->result();
      $data=array();
      $x=0;
      foreach ($query as $row)
      {
          $data[$x]=$row;
          $data[$x]->subs=$this->get_asnaf($row->id);
          $data[$x]->num=count($data[$x]->subs);

          $x++;
      }
      return $data;

       // $this->db->where($where);
      //  $this->db->join('st_asnaf');
    }

    public function get_asnaf($id)
    {
        $this->db->where('tasnef',$id);
        return  $this->db->get('st_asnaf')->result();

    }
/*****************************************/


    public function get_asnaf_rased($sanf_code)
    {
        $this->db->where('code',$sanf_code);
        $query = $this->db->get('st_asnaf')->result_array();

        if (!empty($query)) {
            foreach ($query as $key => $value) {

                $query[$key]['all_rased'] = $this->get_sanf_rased($value['code']);
            }
            return $query[0]['all_rased'];
        }
        return 0;
    }

    public function get_sanf_rased($sanf_code)
    {

        $sum_moshtriat_ayni = $this->sum_moshtriat_ayni($sanf_code);
        $sum_ayniirasid = $this->sum_ayniirasid($sanf_code);
        $sum_ezn_sarf = $this->sum_ezn_sarf($sanf_code);
        $sanf_rased = ($sum_moshtriat_ayni + $sum_ayniirasid) - $sum_ezn_sarf;

        return $sanf_rased;

    }

    public function sum_moshtriat_ayni($sanf_code)
    {

        $sql = $this->db->select('SUM(sanf_amount) as sum_moshtriat_ayni')
            ->where('sanf_code', $sanf_code)->get('st_ezn_edafa_details')->row();
        if (!empty($sql->sum_moshtriat_ayni)) {
            return $sql->sum_moshtriat_ayni;
        } else {
            return 0;
        }
    }

    public function sum_ezn_sarf($sanf_code)
    {

        $sql = $this->db->select('SUM(sanf_amount) as sum_ezn_sarf')
            ->where('sanf_code', $sanf_code)->get('st_ezn_sarf_details')->row();
        if (!empty($sql->sum_ezn_sarf)) {
            return $sql->sum_ezn_sarf;
        } else {
            return 0;
        }
    }

    public function sum_ayniirasid($sanf_code)
    {

        $sql = $this->db->select('SUM(sanf_amount) as sum_ayniirasid')
            ->where('sanf_code', $sanf_code)
            ->get('st_ayniirasid_details')->row();
        if (!empty($sql->sum_ayniirasid)) {
            return $sql->sum_ayniirasid;
        } else {
            return 0;
        }
    }
}