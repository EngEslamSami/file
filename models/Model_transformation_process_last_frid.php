<?php
class Model_transformation_process extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="transformation_process";
    }
	 //     $this->db->join('users', 'users.usrID = users_profiles.usrpID',"left");
      public function chek_Null($post_value){
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return strip_tags($post_value);
        }
    }
    //==========================================
    public function select_process_procedures(){
        $this->db->select('*');
        $this->db->from("process_procedures");
     //   $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
     //==========================================
    public function select_user(){
        $this->db->select('users.user_id , users.role_id_fk ,users.user_name , users.system_structure_id_fk  ,
                           employees.employee');
        $this->db->from("users");
         $this->db->join('employees', 'employees.id = users.emp_code',"left");
     //   $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public function insert_for_family(){ //  user_to
      $user_data=explode("-",$this->input->post('user_to')) ; 
           $data['family_file'] = $this->chek_Null($this->input->post('family_file'));
           $data['process'] = 1; 
           $data['from_id'] = $_SESSION["user_id"];
           $data['to_id'] = $user_data[0];
           $data['role_id_fk_from'] =$_SESSION["role_id_fk"];;
           $data['role_id_fk_to'] = $user_data[1];
           $data['system_structure_id_fk_from'] = $_SESSION["system_structure_id_fk"];
           $data['system_structure_id_fk_to'] = $user_data[2];
           $data['process_procedure_id_fk'] = $this->chek_Null($this->input->post('process_procedure_id_fk'));
           $data['date']   =time();
           $data['date_s'] =time();
           
         $this->db->insert($this->main_table, $data);
    }
    //==========================================
    /* public function insert_transformation_lagna($process,$file_id){  //
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['mother_national_num']=$file_id;
        $data['month_transfer']=date("m",time());
        $data['process']=$process;
        $procedure =explode('-',$this->input->post('procedure_id_fk'));
        $data['procedure_id_fk']=$procedure[0];
        $data['title']=$procedure[1];
        $data['person_transfer']=$_SESSION['user_id'];
        $data['reason_lagna']=$this->input->post('reason');
        $this->db->insert('transformation_lagna',$data);
    }*/
    
      public function insert_transformation_lagna($process,$file_id){  //
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['mother_national_num']=$file_id;
        $data['month_transfer']=date("m",time());
        $data['process']=$process;
        $procedure =explode('-',$this->input->post('procedure_id_fk'));
        $data['procedure_id_fk']=$procedure[0];
        $data['title']=$procedure[1];
        $data['person_transfer']=$_SESSION['user_id'];
        $data['reason_lagna']=$this->input->post('reason');
        $data['add_to_lagna_id_fk']=$this->input->post('add_to_lagna_id_fk');
        $this->db->insert('transformation_lagna',$data);
    }
    //==========================================
    public function insert_operation($process,$file_id){  //
    $user_data=explode("-",$this->input->post('user_to')) ;
    $data['mother_national_num_fk']=$file_id;
    if($process ==4 || $process ==6){
        $data['family_file_from']=$_SESSION['user_id'];
        $data['family_file_to']=$_SESSION['user_id'];
    }else{
        $data['family_file_from']=$_SESSION['role_id_fk'];
        $data['family_file_to']=$user_data[1];
    }

    $data['from_user']=$_SESSION['user_id'];
    $data['to_user']=$user_data[0];
    $data['process']=$process;
    $data['reason']=$this->input->post('reason');
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_name'];
    $this->db->insert('operation_table',$data);
}
 /*   public function insert_operation($process,$file_id){  // 
      $user_data=explode("-",$this->input->post('user_to')) ; 
        $data['mother_national_num_fk']=$file_id;
        $data['family_file_from']=$_SESSION['role_id_fk'];
        $data['family_file_to']=$user_data[1];
        $data['from_user']=$_SESSION['user_id'];
        $data['to_user']=$user_data[0];
        $data['process']=$process;
        $data['reason']=$this->input->post('reason');
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_name'];
        $this->db->insert('operation_table',$data);
    }*/
    //===============================================
    public function update_file_state($file_id,$value){
        $data["suspend"]=$value;
        
        
          
        $data['final_suspend'] =   $this->get_final_suspend($file_id);
        
        if($data['final_suspend'] == 4){
            
              $data["final_suspend"]=4;  
        }else{
            
           $data["final_suspend"]=0;       
        }
         /*if($value == 4){
          $data["final_suspend"]=4;   
        }else{
         $data["final_suspend"]=0;       
        }*/
        
        
        $this->db->where("mother_national_num",$file_id);
        $this->db->update("basic",$data);
    }
    
  
        public  function get_final_suspend($mother_national_num_fk){
      
        $h = $this->db->get_where("basic", array('mother_national_num'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['final_suspend'];

    } 
    
    
public function update_basic($process,$file_id){

    $data["suspend"] =4;
    if($process ==4){
        $data["file_num"]=$_POST['filenum'];
    }
    $condition=  $_POST['condition'];
    $file_setting =$this->get_file_setting($condition);
    $title = $file_setting['title'];
    $file_status = $condition;
    $data['file_status'] = $file_status;
    $data['process_title'] = $title;

    $this->db->where("mother_national_num",$file_id);
    $this->db->update("basic",$data);
}
public function get_file_setting($id){
    $h = $this->db->get_where("files_status_setting", array('id'=>$id));
    if ($h->num_rows() > 0) {
        return $h->row_array();
    }else{
        return false;
    }

}

public function change_file_setting($file_id)
{
    $condition=  $_POST['condition'];
    $mother_id = $file_id;
    $file_setting =$this->get_file_setting($condition);
    $title = $file_setting['title'];
    $process = $condition;
    $reason=$this->input->post('reason');
    /************************************/
    $data_2['mother_national_num_fk']=$mother_id;
    $data_2['process_id']=$process;
    $data_2['title']=$title;
    $data_2['reason']=$reason;
    $data_2['date']=strtotime(date("Y-m-d"));
    $data_2['date_es']=strtotime(date("Y-m-d"));
    $data_2['publisher']=$_SESSION['user_name'];
    /*********************************/
    $this->db->insert('files_status_operation', $data_2);
}


    
    //==========================================
    public function insert_tran_family($process,$file_id){ //  user_to
      $user_data=explode("-",$this->input->post('user_to')) ; 
           $data['family_file'] = $file_id;
           $data['process'] = 1; 
           $data['transformation_type'] = $process; 
           $data['transformation_note'] = $this->input->post('reason'); 
           $data['from_id'] =  $this->chek_Null($_SESSION["user_id"]);
           $data['to_id'] =  $this->chek_Null($user_data[0]);
           $data['role_id_fk_from'] = $this->chek_Null($_SESSION["role_id_fk"]);
           $data['role_id_fk_to'] =  $this->chek_Null($user_data[1]);
           $data['system_structure_id_fk_from'] = $this->chek_Null($_SESSION["system_structure_id_fk"]);
           $data['system_structure_id_fk_to'] = $this->chek_Null($user_data[2]);
           $data['process_procedure_id_fk'] = $this->chek_Null($this->input->post('process_procedure_id_fk'));
           $data['date']   =time();
           $data['date_s'] =time();
           
         $this->db->insert($this->main_table, $data);
    }
 /*************************************************************************/
 
  
    
 
 
 
         public function report_transformation_process(){

        $this->db->select('*');
        $this->db->from('transformation_process');
      
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                
                 $query_result[$i]->user_name_from = $this->get_user($row->from_id); 
                 $query_result[$i]->user_name_to = $this->get_user($row->to_id);   
             $query_result[$i]->process_procedures_name = $this->get_process_procedures_name($row->process_procedure_id_fk);
             $query_result[$i]->mother_name = $this->get_mother_name($row->family_file );     
                
              $query_result[$i]->time_ago = $this->humanTiming($row->date );
              $query_result[$i]->time_event = $this->humanTiming_event($row->date_s ,$row->date_s_action   );          
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }  
    
        public  function get_user($user_id){
      
        $h = $this->db->get_where("users", array('user_id'=>$user_id));
        $arr= $h->row_array();
        return $arr['user_name'];

    }
            public  function get_process_procedures_name($process_procedure_id_fk){
      
        $h = $this->db->get_where("process_procedures", array('id'=>$process_procedure_id_fk));
        $arr= $h->row_array();
        return $arr['title'];

    }
        public  function get_mother_name($mother_national_num_fk){
      
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }
    
    
    
    function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}


    function humanTiming_event ($time_2,$time_actipn)
{

if($time_actipn == 0){
  $time_actipn_new = time();  
}else{
    $time_actipn_new = $time_actipn;
}


    $time_2 = $time_actipn_new - $time_2; // to get the time since that moment
    $time_2 = ($time_2<1)? 1 : $time_2;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time_2 < $unit) continue;
        $numberOfUnits = floor($time_2 / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

  //=============================================================
    public function select_user_where($Conditions_arr){
        $this->db->select('employee , id');
        $this->db->from("employees");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= array();$i=0;
            foreach ( $query->result() as $row){
               
                 $out=$this->check_emp_user($row->id);
                 if(!empty($out)){
                    $data[$i]=$out;
                    $data[$i]->employee=$row->employee;
                 }
                  $i++;
            }
            return $data;
        }
        return false;
    }
    
      /*  public function select_user_where($Conditions_arr){
        $this->db->select('employee , id');
        $this->db->from("employees");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= array();$i=0;
            foreach ( $query->result() as $row){
                 $out=$this->check_emp_user($row->id);
                 if(!empty($out)){
                    $data[$i]=$out;
                    $data[$i]->employee=$row->employee;
                 }
            $i++;
            }
            return $data;
        }
        return false;
    }*/
    
    //-------------------------------------------
    public function check_emp_user($emp_id){
        $this->db->select('users.user_id, users.role_id_fk ,users.user_name , users.system_structure_id_fk ');
        $this->db->from("users");
        $this->db->where("emp_code",$emp_id);
        $this->db->where("role_id_fk",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

     
    
}//END CLASS


