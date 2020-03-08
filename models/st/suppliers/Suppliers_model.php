<?php
class Suppliers_model extends CI_Model{

    public function get_activity($id){
        $this->db->where('type',$id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;

    }

  public function insert_supplier(){
        $data['code']=$this->input->post('code');
        $data['name']=$this->input->post('name');
        $data['nshat']=$this->input->post('nshat');
        $data['tele']=$this->input->post('tele');
        $data['fax']=$this->input->post('fax');
        $data['resp_name']=$this->input->post('resp_name');
        $data['resp_jwal']=$this->input->post('resp_jwal');
        $data['method_shera']=$this->input->post('method_shera');
        $data['rkm_hesab']=$this->input->post('rkm_hesab');
        $data['hesab_name']=$this->input->post('hesab_name');
        $data['tele_other'] = serialize($this->input->post('tele_other'));

        $this->db->insert('st_suppliers',$data);

      return $this->db->insert_id();


  }

    public function insert_supplier_imgs($all_img, $id)
    {
        if (isset($all_img) && !empty($all_img)) {
            //  print_r($all_img);

            foreach ($all_img as $key => $value) {
                if (!empty($value)) {

                    $data["morfaq"] = "uploads/st/suppliers"."//".$value;
                    $data['code_id_fk'] = $id;
                    $this->db->insert("st_supplier_morfaqat", $data);

                }
            }

        }
    }


    public function display_data(){
        $query = $this->db->get('st_suppliers');
        if ($query->num_rows() >0 ){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->nashat_name= $this->get_id('st_setting','id_setting',$row->nshat,'title_setting');
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
        $query = $this->db->get('st_suppliers');
        if ($query->num_rows() >0 ){
            $i= 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->nashat_name= $this->get_id('st_setting','id_setting',$row->nshat,'title_setting');
                $data[$i]->morfqat= $this->get_morfaq($row->code);

                $i++;

            }
            return $data;

        }

        return 0;
    }
    public function update($id){

        $data['code']=$this->input->post('code');
        $data['name']=$this->input->post('name');
        $data['nshat']=$this->input->post('nshat');
        $data['tele']=$this->input->post('tele');
        $data['fax']=$this->input->post('fax');
        $data['resp_name']=$this->input->post('resp_name');
        $data['resp_jwal']=$this->input->post('resp_jwal');
        $data['method_shera']=$this->input->post('method_shera');
        $data['rkm_hesab']=$this->input->post('rkm_hesab');
        $data['hesab_name']=$this->input->post('hesab_name');
        $data['tele_other'] = serialize($this->input->post('tele_other'));
        $this->db->where('id',$id);
        $this->db->update('st_suppliers',$data);


    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('st_suppliers');

    }
    public function get_code(){
        $query = $this->db->get('st_suppliers');
        if ($query->num_rows() >0 ){
            return $query->last_row()->code;
        }
        return 0;

    }


    public function getAllAccounts()
    {
       // $this->db->where($where);
    //  $this->db->where('hesab_no3',2);
        $this->db->where('id!=',0);
        $this->db->order_by('parent','ASC');
        return $this->db->get('dalel')->result();
      //  return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
    }

    public function get_morfaq($id){
        $this->db->where('code_id_fk',$id);
        $query = $this->db->get(' st_supplier_morfaqat');
        if ($query->num_rows() >0 ){
            //return $query->result();
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->morfqq = explode('//',$row->morfaq);
                $data[$i]->morfq_name=  $data[$i]->morfqq[1];

                $i++;
            }
            return $data;

        }
        return 0;

    }

    public function delete_morfq($id){
        $this->db->where('id',$id);
        $this->db->delete('st_supplier_morfaqat');

    }

}