<?php

class Department_jobs extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------    
    public function insert(){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $this->db->insert('department_jobs',$data);
    }
    //-----------------------------------------------------    
    public function update($id){
        $data['name'] = $this->chek_Null($this->input->post('name'));
         $this->db->where('id',$id);
        $this->db->update('department_jobs',$data);
    }
//-----------------------------------------------------
   /* public function select(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }*/
    public function getById($id){
        $h = $this->db->get_where('department_jobs', array('id'=>$id));
        return $h->row_array();
    }


    public function select_main(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_departments = $this->select_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }


    public function select_sub($f_id){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",$f_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }





    public function select_all(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->count =$this->get_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }


    public function get_sub($f_id){
        $h = $this->db->get_where('department_jobs', array('from_id_fk'=>$f_id));
        return $h->num_rows();

    }


    //-----------------------------------------------------
    public function insert_sub(){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['from_id_fk'] = $this->chek_Null($this->input->post('from_id_fk'));
        $data['status'] = 1;
        $this->db->insert('department_jobs',$data);
    }
    //-----------------------------------------------------
    public function update_sub($id){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['from_id_fk'] = $this->chek_Null($this->input->post('from_id_fk'));
        $data['status'] = 1;
        $this->db->where('id',$id);
        $this->db->update('department_jobs',$data);
    }
//-----------------------------------------------------
}//END CLASS