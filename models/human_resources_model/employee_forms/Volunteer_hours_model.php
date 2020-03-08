<?php
class Volunteer_hours_model extends CI_Model
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





    public function insert()
    {


        $volunteer_date =$_POST['volunteer_date'];
        $from_time =$_POST['from_time'];
        $to_time =$_POST['to_time'];
        $place =$_POST['place'];
        $activities =$_POST['activities'];
        $num_hours =$_POST['num_hours'];


                $data['direct_manager_id_fk']= $this->chek_Null($this->input->post('direct_manager_id_fk'));
                $data['emp_id_fk']= $this->chek_Null($this->input->post('emp_id_fk'));
                $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));
                $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));
              //  $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));
                $data['mostafed_type_fk']= $this->chek_Null($this->input->post('mostafed_type_fk'));
                $data['mostafed_edara_id']= $this->chek_Null($this->input->post('mostafed_edara_id'));
                $data['mostafed_direction_id']= $this->chek_Null($this->input->post('mostafed_direction_id'));
                $data['responsible']= $this->chek_Null($this->input->post('responsible'));
                $data['volunteer_description']= $this->chek_Null($this->input->post('volunteer_description'));
                $data['job']= $this->chek_Null($this->input->post('job'));
                $data['tele']= $this->chek_Null($this->input->post('tele'));
                $data['mob']= $this->chek_Null($this->input->post('mob'));
                $data['email']= $this->chek_Null($this->input->post('email'));
                $data['volunteer_date']= $this->chek_Null(strtotime($volunteer_date));
                $data['volunteer_date_ar']= $this->chek_Null($volunteer_date);
                $data['from_time']= $this->chek_Null($from_time);
                $data['to_time']= $this->chek_Null($to_time);
                $data['place']= $this->chek_Null($place);
                $data['activities']= $this->chek_Null($activities);
                $data['num_hours']= $this->chek_Null($num_hours);
                $data['date']= date('Y-m-d');
                $data['date_s']=strtotime(date('Y-m-d'));
                $data['date_ar']=date('Y-m-d');
                $data['publisher']=$_SESSION['user_id'];
                
                  $data['job_title_id_fk']= $this->get_id('employees','id',$data['emp_id_fk'],'degree_id');
                $this->db->insert('hr_volunteer_hours_orders',$data);





    }
  public function update($id){

      $volunteer_date =$_POST['volunteer_date'];
      $from_time =$_POST['from_time'];
      $to_time =$_POST['to_time'];
      $place =$_POST['place'];
      $activities =$_POST['activities'];
      $num_hours =$_POST['num_hours'];


      $data['direct_manager_id_fk']= $this->chek_Null($this->input->post('direct_manager_id_fk'));
      $data['emp_id_fk']= $this->chek_Null($this->input->post('emp_id_fk'));
      $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));
      $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));
      //$data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));
      $data['mostafed_type_fk']= $this->chek_Null($this->input->post('mostafed_type_fk'));
      $data['mostafed_edara_id']= $this->chek_Null($this->input->post('mostafed_edara_id'));
      $data['mostafed_direction_id']= $this->chek_Null($this->input->post('mostafed_direction_id'));
      $data['responsible']= $this->chek_Null($this->input->post('responsible'));
      $data['volunteer_description']= $this->chek_Null($this->input->post('volunteer_description'));
      $data['job']= $this->chek_Null($this->input->post('job'));
      $data['tele']= $this->chek_Null($this->input->post('tele'));
      $data['mob']= $this->chek_Null($this->input->post('mob'));
      $data['email']= $this->chek_Null($this->input->post('email'));
      $data['volunteer_date']= $this->chek_Null(strtotime($volunteer_date));
      $data['volunteer_date_ar']= $this->chek_Null($volunteer_date);
      $data['from_time']= $this->chek_Null($from_time);
      $data['to_time']= $this->chek_Null($to_time);
      $data['place']= $this->chek_Null($place);
      $data['activities']= $this->chek_Null($activities);
      $data['num_hours']= $this->chek_Null($num_hours);
  $data['job_title_id_fk']= $this->get_id('employees','id',$data['emp_id_fk'],'degree_id');
      $this->db->where('id',$id);
      $this->db->update('hr_volunteer_hours_orders',$data);
  }



    public function GetById($id){
        $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code');
        $this->db->from('hr_volunteer_hours_orders');
        $this->db->where('hr_volunteer_hours_orders.id',$id);
        $this->db->join('employees','hr_volunteer_hours_orders.emp_id_fk = employees.id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
                $data->emp_name = $this->get_id('employees','id',$row->emp_id_fk,'employee');
                $data->card_num = $this->get_id('employees','id',$row->emp_id_fk,'card_num');
                $data->qsm_name = $this->get_id('department_jobs','id',$row->qsm_id_fk,'name');
                $data->edara_name = $this->get_id('department_jobs','id',$row->edara_id_fk,'name');
                $data->job_title = $this->get_id('all_defined_setting','defined_id',$row->job_title_id_fk,'defined_title');
                $data->emp_code = $this->get_id('employees','id',$row->emp_id_fk,'emp_code');
                if ($row->mostafed_type_fk==0){
                    $data->mostafed_edara_name = $this->get_id('department_jobs','id',$row->mostafed_edara_id,'name');
                } elseif ($row->mostafed_type_fk==1){
                    $data->mostafed_edara_name = $this->get_id('hr_forms_settings','id_setting',$row->mostafed_edara_id,'title_setting');

                }
                
            }
            return $data;
        }else{
           return 0;
        }
    }
    
       public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("hr_volunteer_hours_orders");
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

/*
    public function get_last()
    {
        $this->db->order_by('id_setting','desc');
        $this->db->select('id_setting');
        $this->db->where('type',9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
        return $query->row()->id_setting;
    }*/

    public function get_last()
    {
        $this->db->order_by('id_setting','desc');
        $this->db->select('id_setting');
        $this->db->where('type',9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
          return $query->row()->id_setting;
        }else{
            return 0;
        }
        
    }

    public function insert_record($valu)
    {
        $data['title_setting']=$valu;
        $data['type']=9;
        $data['have_branch']=0;
        $this->db->insert('hr_forms_settings',$data);
    }



    public function select_all()
    {
        $role=$_SESSION['role_id_fk'];  $emp_id=$_SESSION['emp_code'];
        $this->db->select('hr_volunteer_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,
        hr_forms_settings.id_setting ,hr_forms_settings.title_setting , all_defined_setting.defined_id , all_defined_setting.defined_title as job_title');
        $this->db->from("hr_volunteer_hours_orders");
        if($role ==3){
            $this->db->where('emp_id_fk', $emp_id);
        }
        $this->db->join('employees','hr_volunteer_hours_orders.emp_id_fk = employees.id','left');
        $this->db->join('hr_forms_settings','hr_volunteer_hours_orders.mostafed_direction_id = hr_forms_settings.id_setting','left');
        $this->db->join('all_defined_setting','hr_volunteer_hours_orders.job_title_id_fk = all_defined_setting.defined_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->admin_title =  $this->Get_from_department_jobs(array('id'=>$row->edara_id_fk));
                $data[$a]->department_title = $this->Get_from_department_jobs(array('id'=>$row->qsm_id_fk));
                $data[$a]->department_name = $this->Get_from_department_jobs(array('id'=>$row->mostafed_edara_id));
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
    
    
    public function get_all_emp()
    {

        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
                $q[$key]->direct_manager_id_fk= $this->get_direct_manager_name_by_emp_id($row->id);
                $q[$key]->direct_manager_job_title_fk= $this->get_job_title($row->id);
                
                
                

               

            }
            return $q;
        }
    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }
    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.employee as manager_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_name;
        } else {
            return false;
        }
    }

}