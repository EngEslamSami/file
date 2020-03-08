<?php
class Gathering_place_model extends CI_Model
{


    //=================================================================================



    public function select_all()
    {
        $this->db->select('fr_gathering_place.*, fr_settings.id_setting as fr_settings_id, fr_settings.title_setting as gathering_place_title ');
        $this->db->from('fr_gathering_place');
        $this->db->group_by('gathering_place_id_fk');
        $this->db->join('fr_settings','fr_gathering_place.gathering_place_id_fk = fr_settings.id_setting','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                $data[$x]->sub = $this->get_sub($row->gathering_place_id_fk);
                $x++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function get_sub($id){
        $h = $this->db->get_where("fr_gathering_place", array('gathering_place_id_fk'=>$id));
        if ($h->num_rows() > 0) {
            $x=0;
            foreach ($h->result() as $row){
                $data[$x] = $row;
                $data[$x]->depart_name = $this->get_depart($row->edara_id_fk);
                $data[$x]->empolyee_name = $this->get_empolyee($row->emp_id_fk);
                
                $data[$x]->edara_name = $this->get_depart($row->edara_id_fk);
                $data[$x]->depart_name = $this->get_depart($row->qsm_id_fk);
                $x++;}
            return $data;
        }else{
            return 0;
        }
    }


    public function get_depart($id){
        $h = $this->db->get_where("department_jobs", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['name'];
        }
    }

    public function get_empolyee($id){
        $h = $this->db->get_where("employees", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['employee'];
        }
    }

    public function get_jobtitle($id){
        $h = $this->db->get_where("all_defined_setting", array('defined_id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['defined_title'];
        }
    }



    //===================================================================================


   /* public function insert(){

        if(!empty($this->input->post('gathering_place_id_fk'))){
            for ($a=0;$a<sizeof($this->input->post('gathering_place_id_fk'));$a++){
                $data['gathering_place_id_fk'] =$this->input->post('gathering_place_id_fk')[$a];
                $data['edara_id_fk'] =$this->input->post('edara_id_fk')[$a];
                $data['qsm_id_fk'] =$this->input->post('qsm_id_fk')[$a];
                $data['emp_id_fk'] =$this->input->post('emp_id_fk')[$a];
                $this->db->insert("fr_gathering_place",$data);
            }

        }

    }*/
    
     public function insert(){
                $data['gathering_place_id_fk'] =$this->input->post('gathering_place_id_fk');
                $data['edara_id_fk'] =$this->input->post('edara_id_fk');
                $data['qsm_id_fk'] =$this->input->post('qsm_id_fk');
                $data['emp_id_fk'] =$this->input->post('emp_id_fk');
                $data['emp_user_id'] =$this->get_emp_user_id($this->input->post('emp_id_fk'));
                  $data['emp_code_fk'] =$this->get_emp_code($this->input->post('emp_id_fk'));
                $data['suspend'] =$this->input->post('suspend');
                     //yara
                $data['mqr_thseel'] =$this->input->post('mqr_thseel');
                //
                
                $this->db->insert("fr_gathering_place",$data);
         
    }

    public function update($id,$file)
    {
        $data['depart_id_fk'] =$this->input->post('depart_id_fk');
        $data['emp_id_fk'] =$this->input->post('emp_id_fk');
        $data['emp_user_id'] =$this->get_emp_user_id($this->input->post('emp_id_fk'));
          $data['emp_code_fk'] =$this->get_emp_code($this->input->post('emp_id_fk'));
        if(!empty($file)){
            $data['sign_img'] =$file;
        }
        $this->db->where('id',$id);
        $this->db->update("hr_depart_managers",$data);
    }
    
         public function get_emp_user_id($emp_id_fk){
        $h = $this->db->get_where("users", array('emp_code'=>$emp_id_fk ,'role_id_fk'=>3));
        if ($h->num_rows() > 0) {
            return $h->row_array()['user_id'];
        }
    }
    
       public function get_emp_code($emp_id_fk){
        $h = $this->db->get_where("employees", array('id'=>$emp_id_fk ));
        if ($h->num_rows() > 0) {
            return $h->row_array()['emp_code'];
        }
    }

    public function getById($id){
        $h = $this->db->get_where("fr_gathering_place", array('id'=>$id));
        return $h->row_array();
    }
    public function getById_authorities($id){
        $h = $this->db->get_where("hr_jobtitles_managers", array('id'=>$id));
        return $h->row_array();
    }




    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('fr_gathering_place');
    }






    /**********************************************/
    public function select_all_departments(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $query_result[$i] =$row;
                $i++; }
            return $query_result;
        }else{
            return 0;
        }

    }

/**************************************/
public function get_emps(){
        $this->load->model('human_resources_model/Public_employee_main_data');
        $this->db->order_by('emp_code');
        $this->db->where('employee_type',1);
        $query = $this->db->get('employees');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->edara = $this->Public_employee_main_data->get_edara_name_by_emp_id($row->id);
                $data[$i]->qsm = $this->Public_employee_main_data->get_qsm_name_by_emp_id($row->id);
                $data[$i]->check_user = $this->check_user($row->id);

                $i++;

            }
            return $data;
        }
        else{
            return false;
        }


        }

    public function update_status($id,$value){

        $data['suspend']= $value;
        $this->db->where('id',$id);
        $this->db->update('fr_gathering_place',$data);

    }
    public function check_user($id){
        $this->db->where("role_id_fk",3);
        $this->db->where("emp_code",$id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        else{
            return 0;
        }

    }


    
    //yara
    public function select_by_id($id)
    {

        $this->db->select('fr_gathering_place.*, fr_settings.id_setting as fr_settings_id, fr_settings.title_setting as gathering_place_title ');
        $this->db->from('fr_gathering_place');
        $this->db->group_by('gathering_place_id_fk');
        $this->db->join('fr_settings','fr_gathering_place.gathering_place_id_fk = fr_settings.id_setting','left');
        $query = $this->db->where('fr_gathering_place.id',$id)->get()->row();
        return $query;
        
    }
    //yara


    //yara
    public function update_gathering_place($id){
        $data['gathering_place_id_fk'] =$this->input->post('gathering_place_id_fk');
        $data['mqr_thseel'] =$this->input->post('mqr_thseel');
        $data['edara_id_fk'] =$this->input->post('edara_id_fk');
        $data['qsm_id_fk'] =$this->input->post('qsm_id_fk');
        $data['emp_id_fk'] =$this->input->post('emp_id_fk');
        $data['suspend'] =$this->input->post('suspend');
        $this->db->where('id',$id)->update("fr_gathering_place",$data);
 
}


}
