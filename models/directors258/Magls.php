<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 7/5/2017
 * Time: 12:16 م
 */
class Magls extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    public function insert(){
    
        $data['council_id_fk'] = $this->chek_Null($this->input->post('council_id_fk'));
        $data['member_code'] =  $this->chek_Null($this->input->post('member_code'));
        $data['member_name'] = $this->chek_Null($this->input->post('member_name'));
        $data['job_title_id_fk'] = $this->chek_Null($this->input->post('job_title_id_fk'));
        $data['appointment_date'] =  $this->chek_Null(strtotime($this->input->post('appointment_date')));
        $data['expired_date'] = $this->chek_Null(strtotime($this->input->post('expired_date')));
        $data['member_type_id_fk'] = $this->chek_Null($this->input->post('member_type_id_fk'));

       $data['expired_date_ar'] = $this->input->post('expired_date');
       $data['appointment_date_ar'] =  $this->input->post('appointment_date');

        $this->db->insert('magls_members_table',$data);
    }



    //////////////////////////


///////////selecting data//////////////////


    public function select(){

        $this->db->select('*');
        $this->db->from('magls_members_table');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }



    public function select_council(){
        $this->db->select('*');
        $this->db->from('council_admin_table');
        $this->db->order_by('id','DESC');
        $this->db->where('status',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_job_title(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->order_by('id','DESC');
        $this->db->where('from_id_fk',9);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    /////delete/////


    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('magls_members_table');

    }


    //////////////////////////


///////////update//////////////////


    public function getById($id){

        $h = $this->db->get_where('magls_members_table', array('id'=>$id));
        return $h->row_array();

    }


    public function update($id){
        $data['council_id_fk'] = $this->chek_Null($this->input->post('council_id_fk'));
        $data['member_code'] =  $this->chek_Null($this->input->post('member_code'));
        $data['member_name'] = $this->chek_Null($this->input->post('member_name'));
        $data['job_title_id_fk'] = $this->chek_Null($this->input->post('job_title_id_fk'));
        $data['appointment_date'] =  $this->chek_Null(strtotime($this->input->post('appointment_date')));
        $data['expired_date'] = $this->chek_Null(strtotime($this->input->post('expired_date')));
        $data['member_type_id_fk'] = $this->chek_Null($this->input->post('member_type_id_fk'));
             $data['expired_date_ar'] = $this->input->post('expired_date');
       $data['appointment_date_ar'] =  $this->input->post('appointment_date');

      
      
        $this->db->where('id', $id);
        if($this->db->update('magls_members_table',$data)) {
            return true;
        }else{
            return false;
        }
    }
//=========================================
 public function all_councils($state){
        $this->db->select('*');
        $this->db->from('council_admin_table'); //magls_members_table
        $this->db->order_by('id','DESC');
        $this->db->where('status',$state);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            $data=null;
            foreach ($query->result() as $row) {
              $query2 = $this->db->query("SELECT * FROM `magls_members_table` WHERE `council_id_fk`=".$row->id);
                 
                    if ($query2->num_rows() > 0) {   
                        $sub_data=array();
                        foreach ($query2->result() as $row2) {
                            $sub_data[] = $row2;
                       }
                $data[$row->id] = $sub_data;
                   }
            }
            return $data;
        }
        return false;
    }
//================
  public function all_details_council(){
        $this->db->select('*');
        $this->db->from('council_admin_table');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }    
    //===================================================
    
     public function get_all()
{
    $query= $this->db->get(' council_admin_table')->result();
    $data=array();
    $x=0;
    foreach ($query as $row){
        $data[$x]=$row;
        $data[$x]->members=$this->get_members($row->id);

        $x++;
    }
    return $data;
    }
    
    //====================================================
     public function get_members($id)
    {
        $this->db->where('council_id_fk',$id);
        $query=$this->db->get('magls_members_table');
        if($query->num_rows()>0){
            return $query->result();

        }else{
            return 0;
        }
		}
    
    

}//END CLASS