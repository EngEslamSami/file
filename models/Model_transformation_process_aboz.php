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
        $data['reason_lagna']=$this->chek_Null( $this->input->post('reason')) ;
        $data['add_to_lagna_id_fk']=$this->input->post('add_to_lagna_id_fk');
        $this->db->insert('transformation_lagna',$data);
    }
    //==========================================
    public function insert_operation($process,$file_id){  //all_actions_in_family_files
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
        $data["final_suspend"]=4;
    }elseif($process == 6){
        
        
    }elseif($process == 1 || $process == 2){
        
    }else{
    $condition=  $_POST['condition'];
    $file_setting =$this->get_file_setting($condition);
        $title = $file_setting['title'];
    $file_status = $condition;
    
        $data['file_status'] = $file_status;
    $data['process_title'] = $title;
    
    }
    




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

  //=============================================================   //
    public function select_user_where($Conditions_arr){
        $this->db->select('employees.employee ,employees.id , employees.personal_photo ,
                           all_defined_setting.defined_title as emp_job_title');
        $this->db->from("employees");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= array();$i=0;
            foreach ( $query->result() as $row){
               
                 $out=$this->check_emp_user($row->id);
                 if(!empty($out)){
                    $data[$i]=$out;
                    $data[$i]->employee=$row->employee;

                    $data[$i]->personal_photo=$row->personal_photo;
                    $data[$i]->emp_job_title=$row->emp_job_title;

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

 /*******************************************************/
     public function insert_actions_in_family_files($process,$file_id){  //
  //  $user_data=explode("-",$this->input->post('user_to')) ;
    $data['mother_national_num_fk']=$file_id;
  
  
      if($process== 1 || $process == 2 ||$process == 4) {
        $reason_id_fk = explode("-", $this->input->post('reason_id_fk'));

        $data['reason_id_fk'] = $this->chek_Null($reason_id_fk[0]);

        $data['reason_name'] = $this->chek_Null($reason_id_fk[1]);
    }
  
  
  if( $process == 5){
  $data['lagna_descision_id_fk']=$this->chek_Null($this->input->post('lagna_descision_id_fk') );
      
  }
    
    
    
    $data['main_type_id_fk']=$this->chek_Null($this->input->post('main_type_id_fk'));
   
    $data['process']=$process;
    
     $data['process_title']=$this->get_process_name($process);
  
    $data['reason']=$this->input->post('reason'); 
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['date_ar']= date("Y-m-d");
    $data['publisher']=$_SESSION['user_name'];
    $this->db->insert('all_actions_in_family_files',$data);
}
 
        public  function get_process_name($process){
      
        $h = $this->db->get_where("file_procedure_setting", array('id'=>$process));
        $arr= $h->row_array();
        return $arr['title'];

    } 
 /**********************************************/
 
   
        public  function get_process_name_2($process){
      
        $h = $this->db->get_where("file_procedure_setting", array('id'=>$process));
        $arr= $h->row_array();
        return $arr;

    }
  
    public function select_all_actions_in_family_files($mother_national_num){

        $this->db->select('*');
        $this->db->from('all_actions_in_family_files');
         $this->db->where('mother_national_num_fk',$mother_national_num);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {

                $query_result[$i]->process_color = $this->get_process_name_2($row->process)['color']; 
         
                $i++;
            }
            return $query_result;
        }
        return false;
    } 
     //======================================================================
     public function change_file_setting2($file_id)
{

    $condition=  $_POST['condition'];
    $mother_id = $file_id;
    $file_setting =$this->get_file_setting($condition);
    $title = $file_setting['title'];
    $process = $condition;
    $reason=$this->input->post('reason');
    /************************************/
    $data['file_status'] = $process;
    $data['process_title'] = $title;
    /********************************/
    /************************************/
    $data_2['mother_national_num_fk']=$mother_id;
    $data_2['process_id']=$process;
    $data_2['title']=$title;
    $data_2['reason']=$reason;
    $data_2['date']=strtotime(date("Y-m-d"));
    $data_2['date_es']=strtotime(date("Y-m-d"));
    $data_2['publisher']=$_SESSION['user_name'];
    /*********************************/
    $this->db->where('mother_national_num', $file_id);
    $this->db->update('basic', $data);


    $this->db->insert('files_status_operation', $data_2);



}
 /***************************************************************/

 /*
 public function insert_transformation_lagna2($process,$file_id){  //
    $data['file_num'] =$this->input->post('file_num');
    $data['session_num_fk'] =$this->get_last_session();
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['mother_national_num']=$file_id;
    $data['month_transfer']=date("m",time());
    $data['process']=$process;
    $procedure =explode('-',$this->input->post('procedure_id_fk'));
    $data['procedure_id_fk']=$procedure[0];
    $data['title']=$procedure[1];
    $data['person_transfer']=$_SESSION['user_id'];
    $data['reason_lagna']=$this->chek_Null( $this->input->post('reason')) ;
    $data['add_to_lagna_id_fk']=$this->input->post('add_to_lagna_id_fk');


    if(!empty($_POST['ids'])){
        $data['person_details']= json_encode($_POST['ids']);
    }
    $data['transfer_type_id_fk']= $this->chek_Null( $this->input->post('transfer_type_id_fk')) ;

    $this->db->insert('transformation_lagna',$data);


     if($process ==5){


         if(!empty($_POST['ids'])){



             foreach ($_POST['ids'] as $row){
                 $data2['file_num'] =$this->input->post('file_num');
                 $data2['mother_national_num'] =$file_id;
                 $data2['session_num_fk'] =$this->get_last_session();
                 $data2['procedure_id_fk'] =$this->chek_Null($procedure[0]);
                 $data2['procedure_title'] =$this->chek_Null($procedure[1]);
                 $data2['halet_file_id_fk'] =$this->chek_Null($this->input->post('halet_file_id_fk'));
                 $data2['halet_file_title'] =$this->chek_Null($this->input->post('halet_file_title'));

                 $data2['person_id_fk']= $row;
                 $data2['person_name']= $this->getName($row,$file_id);;
                 $this->db->insert('transformation_lagna_members',$data2);
             }
         }
     }


}*/

public function insert_transformation_lagna2($process,$file_id){  //


    $data['file_num'] =$this->input->post('file_num');
    $data['session_num_fk'] =$this->get_last_session();
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['mother_national_num']=$file_id;
    $data['month_transfer']=date("m",time());
    $data['process']=$process;
    $procedure =explode('-',$this->input->post('procedure_id_fk'));
    $data['procedure_id_fk']=$procedure[0];
    $data['title']=$procedure[1];
    $data['person_transfer']=$_SESSION['user_id'];
    $data['reason_lagna']=$this->chek_Null( $this->input->post('reason')) ;
    $data['add_to_lagna_id_fk']=$this->input->post('add_to_lagna_id_fk');


    if(!empty($_POST['ids'])){
        $data['person_details']= json_encode($_POST['ids']);
    }
    $data['transfer_type_id_fk']= $this->chek_Null( $this->input->post('transfer_type_id_fk')) ;

    $this->db->insert('transformation_lagna',$data);


     if($process ==5){


      //   die;
         if(!empty($_POST['ids'])){

                     //أفراد

             foreach ($_POST['ids'] as $row){
                 $data2['file_num'] =$this->input->post('file_num');
                 $data2['mother_national_num'] =$file_id;
                 $data2['session_num_fk'] =$this->get_last_session();


                $data2['procedure_id_fk'] =$this->chek_Null($procedure[0]);
                 $data2['procedure_title'] =$this->chek_Null($procedure[1]);
                 $data2['halet_file_id_fk'] =$this->chek_Null($this->input->post('halet_file_id_fk'));
                 $data2['halet_file_title'] =$this->chek_Null($this->input->post('halet_file_title'));
                // $data2['person_type']= 2;
                	    if($row ==$file_id){
                     $data2['person_type']= 1;
                 }else{
                     $data2['person_type']= 2;
                 }
                 $data2['person_id_fk']= $row;
                 $data2['person_name']= $this->getName($row,$file_id);;
                $this->db->insert('transformation_lagna_members',$data2);


               /*  echo "<pre>";
                 print_r($data2);
                 echo "</pre>";*/
             }

           // die;

         }else{
             //أسر


             $data2['file_num'] =$this->input->post('file_num');
             $data2['mother_national_num'] =$file_id;
             $data2['session_num_fk'] =$this->get_last_session();


             $data2['procedure_id_fk'] =$this->chek_Null($procedure[0]);
             $data2['procedure_title'] =$this->chek_Null($procedure[1]);
             $data2['halet_file_id_fk'] =$this->chek_Null($this->input->post('halet_file_id_fk'));
             $data2['halet_file_title'] =$this->chek_Null($this->input->post('halet_file_title'));

             $data2['person_type']= 1;
             $data2['person_id_fk']= $_POST['father_national_id'];
             $data2['person_name']= $_POST['father_name'];
             $this->db->insert('transformation_lagna_members',$data2);


         }
     }
/*     echo "<pre>";
     print_r($data2);
     echo "</pre>";
     die;*/


}


    public function get_last_session(){
        $this->db->order_by('id','desc');
        $query=$this->db->get('selected_lagna_members');
        if($query->num_rows()>0){
            return  $query->row()->session_number;
        }else{
            return 0;
        }
    }
  /***********************************************/
  
  
public function get_transformation_lagna_last($arr){
    $this->db->select('transformation_lagna.* ,
                           family_reasons_settings.title as reason_title ,
                           procedures_option_lagna.title as procedures_option_lagna_title');
    $this->db->from("transformation_lagna");
    $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
    $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
    $this->db->where($arr);
    $this->db->order_by("id","desc");
    $this->db->limit($arr);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();$i=0;
        foreach ( $query->result() as $row){
            if($row->transfer_type_id_fk ==2){
                $data[$i]->lagna_members =
                    $this->get_transformation_lagna_members2(array('mother_national_num'=>$row->mother_national_num,'session_num_fk'=>$row->session_num_fk));
            }elseif($row->transfer_type_id_fk ==1){
                $data[$i]->reason_lagna_data  =$this->get_reason_lagna(array('id'=>$row->reason_id_fk));
            }
            $i++;
        }
        return $data;
    }else{
        return false;
    }

}


public function get_transformation_lagna_members2($arr){
    $this->db->select('transformation_lagna_members.*, procedures_option_lagna.title as procedures_option_lagna_title');
    $this->db->from("transformation_lagna_members");
    $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna_members.procedure_id_fk',"left");
    $this->db->where($arr);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $s=0;
        foreach ( $query->result() as $row){
            $data[$s]  =$row;
            $data[$s]->member_name  =$this->getName($row->person_id_fk,$row->mother_national_num);
            $data[$s]->reason_lagna_data  =$this->get_reason_lagna(array('id'=>$row->reason_lagna_id_fk));
            $s++; }
        return $data;
    }else{
        return false;
    }

}


public function get_reason_lagna($arr){
    $this->db->select('*');
    $this->db->from("files_status_setting");
    $this->db->where($arr);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ( $query->result() as $row){
            $data[]  =$row;
        }
        return $query->result()[0];
    }else{
        return false;
    }

}  
/*************************************************/

 public function insert_transformation_lagna2Sarf($process,$band_id,$surf_num){  //
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['band_id']=$band_id;
        $data['surf_num']=$surf_num;
        $data['type']=2;
        $data['month_transfer']=date("m",time());
        $data['process']=$process;
        $procedure =explode('-',$this->input->post('procedure_id_fk'));
        $data['procedure_id_fk']=$procedure[0];
        $data['title']=$procedure[1];
        $data['person_transfer']=$_SESSION['user_id'];
        $data['reason_lagna']=$this->chek_Null($this->input->post('reason')) ;
        $data['add_to_lagna_id_fk']=$this->input->post('add_to_lagna_id_fk');
        if(!empty($_POST['ids'])){
            $data['person_details']= json_encode($_POST['ids']);
        }
        $data['transfer_type_id_fk']= $this->chek_Null( $this->input->post('transfer_type_id_fk')) ;

        $this->db->insert('transformation_lagna',$data);
    }





    /***********************************************/

/*
    public function get_last_lagna_transformation($arr){

        $this->db->select('transformation_lagna.*,
                           family_reasons_settings.title as reason_title ,
                           procedures_option_lagna.title as procedures_option_lagna_title');
        $this->db->from("transformation_lagna");
        $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
                if($row->transfer_type_id_fk ==2){
                    $data[$i]->lagna_members =
                        $this->get_transformation_lagna_members2(array('mother_national_num'=>$row->mother_national_num,'session_num_fk'=>$row->session_num_fk));
                }elseif($row->transfer_type_id_fk ==1){
                    $data[$i]->reason_lagna_data  =$this->get_reason_lagna(array('id'=>$row->reason_id_fk));
                }
                $i++;
            }
            return  $query->result();
        }else{
            return false;
        }

    }*/

 public function get_last_lagna_transformation($arr){

        $this->db->select('transformation_lagna.*,
                           family_reasons_settings.title as reason_title ,
                           procedures_option_lagna.title as procedures_option_lagna_title');
        $this->db->from("transformation_lagna");
        $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
                if($row->transfer_type_id_fk ==2){
                    $data[$i]->lagna_members =
                        $this->get_transformation_lagna_members2(

                            array('mother_national_num'=>$row->mother_national_num,'file_num'=>$row->file_num,'session_num_fk'=>$row->session_num_fk,'procedure_id_fk'=>$row->procedure_id_fk)


);
                }elseif($row->transfer_type_id_fk ==1){
                    $data[$i]->reason_lagna_data  =$this->get_reason_lagna(array('id'=>$row->reason_id_fk));
                }
                $i++;
            }
            return  $query->result();
        }else{
            return false;
        }

    }

    public function get_last_lagna_transformation2($arr){

        $this->db->select('transformation_lagna.*,
                           family_reasons_settings.title as reason_title ,
                           procedures_option_lagna.title as procedures_option_lagna_title');
        $this->db->from("transformation_lagna");
        $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i=0;
            foreach ( $query->result() as $row){
                if($row->transfer_type_id_fk ==2){
                    $data[$i]->lagna_members =
                        $this->get_transformation_lagna_members2(array('mother_national_num'=>$row->mother_national_num,'session_num_fk'=>$row->session_num_fk));
                }elseif($row->transfer_type_id_fk ==1){
                    $data[$i]->reason_lagna_data  =$this->get_reason_lagna(array('id'=>$row->reason_id_fk));
                }
                $i++;
            }
            return  $query->result();
        }else{
            return false;
        }

    }

    //16-2-2019
    public function get_transformation_lagna_members_($arr){
        $this->db->select('transformation_lagna_members.*, procedures_option_lagna.title as procedures_option_lagna_title');
        $this->db->from("transformation_lagna_members");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna_members.procedure_id_fk',"left");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            foreach ( $query->result() as $row){
                $data[$row->person_id_fk]  =$row;
                $data[$row->person_id_fk]->member_name  =$this->getName($row->person_id_fk,$row->mother_national_num);
                $data[$row->person_id_fk]->reason_lagna_data  =$this->get_reason_lagna(array('id'=>$row->reason_lagna_id_fk));
                 }
            return $data;
        }else{
            return false;
        }

    }

    public function getName($id,$mother_num){
        if($id == $mother_num){
            $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_num));
            if ($h->num_rows() > 0) {
                return $h->row_array()['full_name'];
            }else{
                return false;

            }
        }else{

            $h = $this->db->get_where("f_members", array('id'=>$id));
            if ($h->num_rows() > 0) {
                return $h->row_array()['member_full_name'];
            }else{
                return false;

            }
        }
    }




    /********************************************************/

  /*  //16-2-2019
    public function update_transformation_lagna($file_id){


        $mother_num =$file_id;



        //update_transformation_lagna
        if(!empty($_POST['ids'])){
            $data['person_details']= json_encode($_POST['ids']);
        }

        if(!empty($_POST['procedure_id_fk'])){
            $procedure =explode('-',$_POST['procedure_id_fk']);
            $data['procedure_id_fk'] =$procedure[0];
            $data['title'] =$procedure[1];

        }

        $this->db->where('mother_national_num',$mother_num);
        $this->db->where('session_num_fk',$_POST['session_num']);
        $this->db->update('transformation_lagna',$data);








            if(!empty($_POST['ids'])){


                //Delete_transformation_lagna_members
                $this->db->where('mother_national_num',$mother_num);
                $this->db->where('session_num_fk',$_POST['session_num']);
                $this->db->delete("transformation_lagna_members");



                //update_transformation_lagna_members


                for($a=0;$a<sizeof($_POST['ids']);$a++){
                    $data2['file_num'] =$this->input->post('file_num');
                    $data2['mother_national_num'] =$mother_num;
                    $data2['session_num_fk'] =$_POST['session_num'];

                    if(!empty($_POST['procedure'][$a])){
                        $procedure =explode('-',$_POST['procedure'][$a]);
                        $data2['procedure_id_fk'] =$procedure[0];
                        $data2['procedure_title'] =$procedure[1];

                    }


                    if(!empty($_POST['halet_file'][$a])){
                        $halet_file =explode('-',$_POST['halet_file'][$a]);
                        $data2['halet_file_id_fk'] =$halet_file[0];
                        $data2['halet_file_title'] =$halet_file[1];

                    }


                    $data2['person_id_fk']= $_POST['ids'][$a];
                    $data2['person_name']= $this->getName($_POST['ids'][$a],$mother_num);
                    $this->db->insert('transformation_lagna_members',$data2);
                }
            }



    }
*/



    public function update_transformation_lagna($file_id){

    /*    echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/

        $mother_num =$file_id;


        $procedure_id_fk =explode('-',$_POST['procedure_id_fk']);


        //update_transformation_lagna
        if(!empty($_POST['ids'])) {
            $data['person_details'] = json_encode($_POST['ids']);
        }
        if(!empty($_POST['procedure_id_fk'])){

            $data['procedure_id_fk'] =$procedure_id_fk[0];
            $data['title'] =$procedure_id_fk[1];

        }
        $this->db->where('mother_national_num',$mother_num);
        $this->db->where('session_num_fk',$_POST['session_num']);
        $this->db->where('file_num',$_POST['file_num']);
        $this->db->where('procedure_id_fk',$_POST['procedure_id_fk_edit']);
        $this->db->update('transformation_lagna',$data);









//die;

        if(!empty($_POST['ids'])){

            //Delete_transformation_lagna_members
            $this->db->where('mother_national_num',$mother_num);
            $this->db->where('session_num_fk',$_POST['session_num']);
            $this->db->where('file_num',$_POST['file_num']);
            $this->db->where('procedure_id_fk',$_POST['procedure_id_fk_edit']);
            $this->db->where('person_type',2);
            $this->db->delete("transformation_lagna_members");




            //update_transformation_lagna_members


                foreach($_POST['ids'] as $key=>$member_id){
                    if(!empty( $_POST['ids'][$member_id])){
                        $data2['file_num'] =$this->input->post('file_num');
                        $data2['mother_national_num'] =$file_id;
                        $data2['session_num_fk'] =$_POST['session_num'];
                        $data2['person_id_fk']= $member_id;
                        $data2['person_type']= 2;

                        $data2['person_name']= $this->getName($member_id,$file_id);



                    }




                    if(!empty($_POST['procedure_id_fk'])){
                        $procedure_id_fk =explode('-',$_POST['procedure_id_fk']);

                        $data2['procedure_id_fk'] =$procedure_id_fk[0];
                        $data2['procedure_title'] =$procedure_id_fk[1];

                    }

                    if(!empty($_POST['procedure'][$member_id])){
                        $procedure =explode('-',$_POST['procedure'][$member_id]);
                        $data2['reason_lagna_id_fk'] =$procedure[0];
                        $data2['reason_lagna_title'] =$procedure[1];

                    }


                    if(!empty($_POST['halet_file'][$member_id])){
                        $halet_file =explode('-',$_POST['halet_file'][$member_id]);
                        $data2['halet_file_id_fk'] =$halet_file[0];
                        $data2['halet_file_title'] =$halet_file[1];

                    }


                    $this->db->insert('transformation_lagna_members',$data2);

                   /* echo "<pre>";
                    print_r($data2);
                    echo "</pre>";*/
                }


           // die;



        }else{

            //Delete_transformation_lagna_members
            $this->db->where('mother_national_num',$mother_num);
            $this->db->where('session_num_fk',$_POST['session_num']);
            $this->db->where('file_num',$_POST['file_num']);
            $this->db->where('procedure_id_fk',$_POST['procedure_id_fk_edit']);
            $this->db->where('person_type',2);
            $this->db->delete("transformation_lagna_members");


            $this->db->where('mother_national_num',$mother_num);
            $this->db->where('session_num_fk',$_POST['session_num']);
            $this->db->where('file_num',$_POST['file_num']);
            $this->db->where('transfer_type_id_fk',2);
            $this->db->where('procedure_id_fk',$_POST['procedure_id_fk_edit']);
            $this->db->delete("transformation_lagna");




            //أسر



            //halet_file_id_fk
            //reason_lagna_id_fk

            if(!empty($_POST['reason_lagna_id_fk'])){
                $data2['reason_lagna_id_fk'] =$_POST['reason_lagna_id_fk'];
                $data2['reason_lagna_title'] =$this->get_title_by_id('files_status_setting',array('id'=>$_POST['reason_lagna_id_fk']),'title');


            }

            if(!empty($_POST['halet_file_id_fk'])){
                $data2['halet_file_id_fk'] =$_POST['halet_file_id_fk'];
                $data2['halet_file_title'] = $this->get_title_by_id('family_reasons_settings',array('id'=>$_POST['halet_file_id_fk']),'title');


            }

            $data2['person_type']= 1;


            $this->db->where('mother_national_num',$mother_num);
            $this->db->where('session_num_fk',$_POST['session_num']);
            $this->db->where('file_num',$_POST['file_num']);
            $this->db->where('procedure_id_fk',$_POST['procedure_id_fk_edit']);
            $this->db->where('person_type',1);
            $this->db->update('transformation_lagna_members',$data2);


        }



    }

    public function Transformation_Delete($file_id){




        $mother_num =$file_id;



        //update_transformation_lagna
        if(!empty($_POST['ids'])){
            $data['person_details']= json_encode($_POST['ids']);
            $this->db->where('mother_national_num',$mother_num);
            $this->db->where('session_num_fk',$_POST['session_num']);
            $this->db->update('transformation_lagna',$data);
        }else{

            $this->db->where('mother_national_num',$mother_num);
            $this->db->where('session_num_fk',$_POST['session_num']);
            $this->db->delete("transformation_lagna");


        }






//Delete_transformation_lagna_members
        $this->db->where('mother_national_num',$mother_num);
        $this->db->where('session_num_fk',$_POST['session_num']);
        $this->db->delete("transformation_lagna_members");



        //update_transformation_lagna_members



        if(!empty($_POST['ids'])){

            for($a=0;$a<sizeof($_POST['ids']);$a++){
                $data2['file_num'] =$this->input->post('file_num');
                $data2['mother_national_num'] =$mother_num;
                $data2['session_num_fk'] =$_POST['session_num'];

                if(!empty($_POST['procedure'][$a])){
                    $procedure =explode('-',$_POST['procedure'][$a]);
                    $data2['procedure_id_fk'] =$procedure[0];
                    $data2['procedure_title'] =$procedure[1];

                }


                if(!empty($_POST['halet_file'][$a])){
                    $halet_file =explode('-',$_POST['halet_file'][$a]);
                    $data2['halet_file_id_fk'] =$halet_file[0];
                    $data2['halet_file_title'] =$halet_file[1];

                }


                $data2['person_id_fk']= $_POST['ids'][$a];
                $data2['person_name']= $this->getName($_POST['ids'][$a],$mother_num);
                $this->db->insert('transformation_lagna_members',$data2);
            }
        }




    }

 /*   public function get_session_member($mother_national_num	)
    {
        $this->db->select('person_id_fk');
        $this->db->from("transformation_lagna_members");
        $this->db->where('mother_national_num	',$mother_national_num);
       // $this->db->where('session_num_fk',$_POST['session_num']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= array();$i=0;
            foreach ( $query->result() as $row){

                    $data[]=$row->person_id_fk;


                $i++;
            }
            return $data;
        }
        return false;
    }*/

		    public function get_session_member($arr)
    {
        $this->db->select('person_id_fk');
        $this->db->from("transformation_lagna_members");
        $this->db->where($arr);
       // $this->db->where('session_num_fk',$_POST['session_num']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= array();$i=0;
            foreach ( $query->result() as $row){

                    $data[]=$row->person_id_fk;


                $i++;
            }
            return $data;
        }
        return false;

       // return $_POST['session_num'] ;
    }

    public function get_title_by_id($table,$arr,$select){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($arr);
        $query= $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->$select;
        }
        return false ;
    }


}//END CLASS


