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

}