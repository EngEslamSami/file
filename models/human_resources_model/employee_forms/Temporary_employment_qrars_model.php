<?php
class Temporary_employment_qrars_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }
    public function get_emp($id)
    {
        $this->db->where_not_in('id',$id);
        $query= $this->db->get('employees');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row){
                $data[] =    $row;
            }
            return $data;
        }else{
            return 0;
        }
    }




    public function insert(){

                $data['emp_name']= $this->chek_Null($this->input->post('emp_name'));
                $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));
                $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));
        if(!empty($_POST['direct_manager_id_fk'])){
                $manager =explode('-',$_POST['direct_manager_id_fk']);
                $data['direct_manager_id_fk']= $this->chek_Null($manager[0]);
                $data['direct_manager_id_name']= $this->chek_Null($manager[1]);
        }
                $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title_id_fk'));
                $data['salary']= $this->chek_Null($this->input->post('salary'));
                $data['bdal_skan']= $this->chek_Null($this->input->post('bdal_skan'));
                $data['bdal_mowaslat']= $this->chek_Null($this->input->post('bdal_mowaslat'));
                $data['bdal_other']= $this->chek_Null($this->input->post('bdal_other'));
                $data['total_salary']= $this->chek_Null($this->input->post('total_salary'));
                $data['work_date']= $this->chek_Null($this->input->post('work_date'));
                $data['date_from']= $this->chek_Null($this->input->post('date_from'));
                $data['date_to']= $this->chek_Null($this->input->post('date_to'));
                $data['num_days']= $this->chek_Null($this->input->post('num_days'));
                $this->db->insert('hr_temporary_employment_qrars',$data);

    }

  public function update($id){

      $data['emp_name']= $this->chek_Null($this->input->post('emp_name'));
      $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));
      $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));
      if(!empty($_POST['direct_manager_id_fk'])){
          $manager =explode('-',$_POST['direct_manager_id_fk']);
          $data['direct_manager_id_fk']= $this->chek_Null($manager[0]);
          $data['direct_manager_id_name']= $this->chek_Null($manager[1]);
      }
      $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title_id_fk'));
      $data['salary']= $this->chek_Null($this->input->post('salary'));
      $data['bdal_skan']= $this->chek_Null($this->input->post('bdal_skan'));
      $data['bdal_mowaslat']= $this->chek_Null($this->input->post('bdal_mowaslat'));
      $data['bdal_other']= $this->chek_Null($this->input->post('bdal_other'));
      $data['total_salary']= $this->chek_Null($this->input->post('total_salary'));
      $data['work_date']= $this->chek_Null($this->input->post('work_date'));
      $data['date_from']= $this->chek_Null($this->input->post('date_from'));
      $data['date_to']= $this->chek_Null($this->input->post('date_to'));
      $data['num_days']= $this->chek_Null($this->input->post('num_days'));
      $this->db->where('id',$id);
      $this->db->update('hr_temporary_employment_qrars',$data);
  }

    public function getById($id){
        $h = $this->db->get_where("hr_temporary_employment_qrars", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array();
        }else {
            return 0;
        }
    }




    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("hr_temporary_employment_qrars");
    }

    public function get_department()
    {
      $this->db->where('from_id_fk !=', 0);
        $query= $this->db->get('department_jobs');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row){
             $data[] =    $row;
            }
            return $data;
        }else{
            return 0;
        }
    }


    public function get_department_by($id)
    {
        $this->db->where('from_id_fk ', $id);
        $query= $this->db->get('department_jobs');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row){
                $data[] =    $row;
            }
            return $data;
        }else{
            return 0;
        }
    }

    public function get_last()
    {
        $this->db->order_by('id_setting','desc');
        $this->db->select('id_setting');
        $this->db->where('type',9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
        return $query->row()->id_setting;
    }


    public function insert_record($valu)
    {
        $data['title_setting']=$valu;
        $data['type']=9;
        $data['have_branch']=0;
        $this->db->insert('hr_forms_settings',$data);
    }



    public function select_all($id)
    {
  
        $this->db->select('hr_temporary_employment_qrars.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,  all_defined_setting.defined_id , all_defined_setting.defined_title as job_title');
        $this->db->from("hr_temporary_employment_qrars");
        if(!empty($id)){
            $this->db->where("hr_temporary_employment_qrars.id",$id);
        }
        $this->db->join('employees','hr_temporary_employment_qrars.direct_manager_id_fk = employees.id','left');
        $this->db->join('all_defined_setting','hr_temporary_employment_qrars.job_title_id_fk = all_defined_setting.defined_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->admin_title =  $this->Get_from_department_jobs(array('id'=>$row->edara_id_fk));
                $data[$a]->department_title = $this->Get_from_department_jobs(array('id'=>$row->qsm_id_fk));
                //$data[$a]->department_name = $this->Get_from_department_jobs(array('id'=>$row->mostafed_edara_id));
             $a++; }
            return $data;

        }else{

            return 0;
        }
    }



    public function Get_from_department_jobs($arr){
        $h = $this->db->get_where("department_jobs",$arr);
        if ($h->num_rows() > 0) {
            return $h->row_array()['name'];
        }else{
            return 0;
        }
    }
    public function select_all_defined($type){
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type",$type);
        $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }


}