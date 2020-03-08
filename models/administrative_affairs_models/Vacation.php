<?php
class Vacation extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }



    public function getAllDepartments(){

        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('from_id_fk',$_SESSION['administration_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->id;
            }
            return $data;
        }else{
            return 0;
        }

    }

    public function getAllEmp(){
        $arr= $this->getAllDepartments();
        $this->db->select('*');
        $this->db->from('employees');
        if($_SESSION['role_id_fk'] ==2){
            if($_SESSION['head_dep_id_fk'] ==1) {
                $this->db->where_in('department',$arr);
            }elseif ($_SESSION['head_dep_id_fk'] ==2){
                $this->db->where('id',$_SESSION['administration_id']);
            }
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->id;
            }
            return $data;
        }else{
            return 0;
        }




    }


    public function select_all()
    {
        $arr2 =$this->getAllEmp();
        $this->db->select('*');
        $this->db->from('vacations');
        if($_SESSION['role_id_fk'] ==2){
            $this->db->where_in('emp_id',$arr2);
        }
       $this->db->where('deleted',1);
       $this->db->where('year',date("Y"));
        $this->db->group_by('emp_id');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
             $i=0;
            foreach ($query_result as $row) {
                $data[$row->id] = $row;
              $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
               $i++;
            }
            return $data;
        }
        return false;
    }





    public function get_by_vac($emp_assigned_id)
    {
       $this->db->select("*");
       $this->db->from("vacations");
       $this->db->where("emp_id",$emp_assigned_id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data = $row->id;
           }
           return $data;
       }
       return false;
    } 

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('vacations');
    }

    public function getById($id)
    {
        $h = $this->db->get_where('vacations', array('id'=>$id));
        return $h->row_array();
    }

    public function insert()
    {
        $data['emp_id']= $this->input->post('emp_id');
        $data['vacation_id']=$this->input->post('vacation_id');
        $data['from_date']= $this->input->post('from_date');
        $data['to_date']= $this->input->post('to_date');
        $data['vacations_days']= $this->input->post('vacations_days');
      //  $data['vacation_detail']= $this->input->post('vacation_detail');
      //  $data['vacation_reason']= $this->input->post('vacation_reason');
        $data['year']= date("Y");
        $data['emp_assigned_id']= $this->input->post('emp_assigned_id');
        $data['day_date']= $this->input->post('day_date');
     //   $data['vacation_date']= $this->input->post('vacation_date');
      $data['vacation_date']=  strtotime(date("Y-m-d"));
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $this->db->insert('vacations',$data);
    }

    public function update($id)
    {
        $h = $this->db->get_where('vacations', array('id'=>$id));
        $row = $h->row_array();
        $data['vacation_id']=$this->input->post('vacation_id');
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
       // $data['vacation_detail']= $this->input->post('vacation_detail');
       // $data['vacation_reason']= $this->input->post('vacation_reason');
        $data['year']= date("Y");
        $data['emp_assigned_id']= $this->input->post('emp_assigned_id');
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $data['day_date']= $this->input->post('day_date');
        //$data['vacation_date']= $this->input->post('vacation_date');
        $data['vacation_date']=  strtotime(date("Y-m-d"));
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }

    public function suspend($id,$clas)
    {
        if ($clas == 'danger') {
            $update = array(
                'suspend' => 1
            );
        } else {
            $update = array(
                'suspend' => 0
            );
        }
        $this->db->where('id', $id);
        if ($this->db->update('vacations', $update)) {
            return true;
        } else {
            return false;
        }
    }

    public function type_vacation($approved)
    {
        $this->db->select("*");
        $this->db->from("vacations");
        $this->db->where("approved",$approved);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $query_result[$i]->emp_assigned_name= $this->get_by_emp($row->emp_assigned_id);
               $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function get_by_emp($emp_assigned_id)
    {
        $this->db->select("*");
        $this->db->from("employees");
        $this->db->where("id",$emp_assigned_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->employee;
            }
            return $data;
        }
        return false;
    }

    public function approved_vacation($id,$value)
    {
        $data['approved_publisher'] = $_SESSION["user_id"];
        $data['approved_date']=time();
        $data['approved']=$value;
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function suspend_DoVacationsApproved($id)
    {
        if($_POST['accept'] )
        {
            $update = array(
                'approved' => 1,
                'reason' => $_POST['reason']
            );
        }
        elseif($_POST['refuse'])
        {
            $update = array(
                'approved' => 2 ,
                'reason' => $_POST['reason']
            );
        }
        $this->db->where('id', $id);
        if($this->db->update('vacations',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function approved_vacation2($id,$value)
    {
        $data['approved_publisher'] = $_SESSION["user_id"];
        $data['approved_date']=time();
        $data['head_approved']=$value;
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function suspend_DoVacationsApproved2($id)
    {
        if($_POST['accept'] )
        {
            $update = array(
                'head_approved' => 1,
                'head_reason' => $_POST['head_reason']
            );
        }
        elseif($_POST['refuse'])
        {
            $update = array(
                'head_approved' => 2 ,
                'head_reason' => $_POST['head_reason']
            );
        }
        $this->db->where('id', $id);
        if($this->db->update('vacations',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function type_vacation_head($approved)
    {
        $this->db->select("*");
        $this->db->from("vacations");
        $this->db->where("head_approved",$approved);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $query_result[$i]->emp_assigned_name= $this->get_by_emp($row->emp_assigned_id);
               $i++;
            }
            return $query_result;
        }
        return false;
    }
    //===========================================
    //====================================================================================
    public function get_vacation_data($emp_id){
        $this->db->select('past_vacation.emp_id ,past_vacation.vacation_type , past_vacation.past_num ,
                           past_vacation.current_num , vacations_settings.title');
        $this->db->from("past_vacation");  //
        $this->db->join('vacations_settings', 'vacations_settings.id = past_vacation.vacation_type',"left");
        $this->db->where("past_vacation.emp_id",$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach( $query->result() as $row){
                 $Conditions_arr =array("emp_id"=>$row->emp_id ,"vacation_id"=>$row->vacation_type);
                 $data[$i]->take_vacation =  $this->get_emp_vacations($Conditions_arr);
                $i++;
            }
            return $data ;
        }
        return false;
    }
    //====================================================================================
  /*  public  function get_emp_vacations($Conditions_arr){
        $this->db->select('emp_id');
        $this->db->from("vacations");
        $this->db->where($Conditions_arr);
        $this->db->where("approved",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }*/
    
      public  function get_emp_vacations($Conditions_arr){
        $this->db->select('*');
        $this->db->from("vacations");
        $this->db->where($Conditions_arr);
        $this->db->where("approved",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=0;
            foreach ($query->result() as $row){

              $data +=  $row->vacations_days;

            }
            return $data;
          //  return $query->num_rows();
        }else{
            return 0;
        }

    }
    //====================================================================================
  public function getByArray($table,$arr){
        $h = $this->db->get_where($table,$arr);
        return $h->row_array();
    }
    
    
    
     public function getVacationDays($emp_id,$type){
        $this->db->select('past_vacation.emp_id ,past_vacation.vacation_type , past_vacation.past_num , past_vacation.current_num , vacations_settings.title');
        $this->db->from("past_vacation");
        $this->db->join('vacations_settings', 'vacations_settings.id = past_vacation.vacation_type',"left");
        $this->db->where("past_vacation.emp_id",$emp_id);
        $this->db->where("past_vacation.vacation_type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach( $query->result() as $row){
                $data[]=$row;
                $data[$x]->allowed_days =  $this->getAllowedDays($row->vacation_type);
                $data[$x]->vacations_taken =  $this->getVacationsTaken(array("emp_id"=>$row->emp_id ,"vacation_id"=>$type,"approved"=>1));
                $x++; }
            return $data ;
        }
        return false;
    }

    public  function getVacationsTaken($Conditions_arr){
        $this->db->select('*');
        $this->db->from("vacations");
        $this->db->where($Conditions_arr);
        $this->db->where("approved",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            /*$data=0;
            foreach( $query->result() as $row){
                $data +=$row->vacations_days;
            }*/
            return $query->num_rows();
        }else {
            return 0;
        }
    }

    public function getAllowedDays($type){
        $this->db->select("*");
        $this->db->from("vacations_settings");
        $this->db->where("id",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->days_num;
        }
    }
    /************************************************************************************/

}

