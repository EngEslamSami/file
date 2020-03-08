<?php
class Overtime_hours_orders_model extends CI_Model
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

        $from_time =$_POST['from_time'];
        $to_time =$_POST['to_time'];
        $work_assigned =$_POST['work_assigned_arr'];
        $bdal_type =$_POST['bdal_type'];
        $num_hours =$_POST['num_hours'];


                $data['emp_id_fk']= $this->chek_Null($this->input->post('emp_id_fk'));
                $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));
                $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));
                $data['direct_manager_id_fk']= $this->chek_Null( $data['emp_id_fk']);
                $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title'));
                $data['direct_manager_job_title_fk']= $this->chek_Null($this->input->post('direct_manager_job_title_fk'));
                $data['nazran']= $this->chek_Null($this->input->post('nazran'));
              $data['work_assigned']= $this->chek_Null($this->input->post('work_assigned'));
                $data['max_hours']= $this->chek_Null($this->input->post('max_hours'));
                $data['date']= date('Y-m-d');
                $data['date_s']=strtotime(date('Y-m-d'));
                $data['date_ar']=date('Y-m-d');
                $data['publisher']=$_SESSION['user_id'];
                $this->db->insert('hr_overtime_hours_orders',$data);



           $id =$this->last_id();

        if(!empty($from_time)){
            for($s=0;$s<sizeof($from_time);$s++){
                $data2['order_id_fk']= $id;
                $data2['from_time']= $this->chek_Null($from_time[$s]);
                $data2['to_time']= $this->chek_Null($to_time[$s]);
                $data2['num_hours']= $this->chek_Null($num_hours[$s]);
                $data2['bdal_type']= $this->chek_Null($bdal_type[$s]);
                $data2['work_assigned']= $this->chek_Null($work_assigned[$s]);
                $data2['date']= date('Y-m-d');
                $this->db->insert('hr_overtime_hours_details',$data2);
            }

        }





    }
    public function update($id){


        $from_time =$_POST['from_time'];
        $to_time =$_POST['to_time'];
        $work_assigned =$_POST['work_assigned'];
        $bdal_type =$_POST['bdal_type'];
        $num_hours =$_POST['num_hours'];


        $data['emp_id_fk']= $this->chek_Null($this->input->post('emp_id_fk'));
        $data['edara_id_fk']= $this->chek_Null($this->input->post('edara_id_fk'));
        $data['qsm_id_fk']= $this->chek_Null($this->input->post('qsm_id_fk'));
        $data['direct_manager_id_fk']= $this->chek_Null( $data['emp_id_fk']);
        $data['job_title_id_fk']= $this->chek_Null($this->input->post('job_title_id_fk'));
        $data['direct_manager_job_title_fk']= $this->chek_Null($this->input->post('direct_manager_job_title_fk'));
        $data['nazran']= $this->chek_Null($this->input->post('nazran'));
        // $data['work_assigned']= $this->chek_Null($this->input->post('work_assigned'));
        $data['max_hours']= $this->chek_Null($this->input->post('max_hours'));

        $this->db->where('id',$id);
        $this->db->update('hr_overtime_hours_orders',$data);



        $this->db->where('order_id_fk',$id);
        $this->db->delete("hr_overtime_hours_details");

        $id =$this->last_id();

        if(!empty($from_time)){
            for($s=0;$s<sizeof($from_time);$s++){
                $data2['order_id_fk']= $id;
                $data2['from_time']= $this->chek_Null($from_time[$s]);
                $data2['to_time']= $this->chek_Null($to_time[$s]);
                $data2['num_hours']= $this->chek_Null($num_hours[$s]);
                $data2['bdal_type']= $this->chek_Null($bdal_type[$s]);
                $data2['work_assigned']= $this->chek_Null($work_assigned[$s]);
                $data2['date']= date('Y-m-d');
                $this->db->insert('hr_overtime_hours_details',$data2);
            }

        }


  }
    public function GetById($id){
        $this->db->select('hr_overtime_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code');
        $this->db->from('hr_overtime_hours_orders');
        $this->db->where('hr_overtime_hours_orders.id',$id);
        $this->db->join('employees','hr_overtime_hours_orders.emp_id_fk = employees.id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }else{
           return 0;
        }
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("hr_overtime_hours_orders");
        $this->db->where('order_id_fk',$id);
        $this->db->delete("hr_overtime_hours_details");
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
    public function last_id()
    {
        $this->db->select('*');
        $this->db->from('hr_overtime_hours_orders');
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id ;
            }
            return $data;
        }else{
            return 1;
        }

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
        $role=$_SESSION['role_id_fk'];  $emp_id=$_SESSION['emp_code'];
        $this->db->select('hr_overtime_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code ,
        all_defined_setting.defined_id , all_defined_setting.defined_title as job_title');
        $this->db->from("hr_overtime_hours_orders");
        if(!empty($id)){
            $this->db->where('hr_overtime_hours_orders.id', $id);
        }
        $this->db->join('employees','hr_overtime_hours_orders.emp_id_fk = employees.id','left');
        $this->db->join('all_defined_setting','hr_overtime_hours_orders.job_title_id_fk = all_defined_setting.defined_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->admin_title =  $this->Get_from_department_jobs(array('id'=>$row->edara_id_fk));
                $data[$a]->department_title = $this->Get_from_department_jobs(array('id'=>$row->qsm_id_fk));
                $data[$a]->overtime_hours_details = $this->Get_overtime_hours_details(array('order_id_fk'=>$row->id));
             $a++; }
            return $data;

        }else{

            return 0;
        }
    }

    public function Get_overtime_hours_details($arr){

        $this->db->select('*');
        $this->db->from('hr_overtime_hours_details');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
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
/******************************************************************/
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