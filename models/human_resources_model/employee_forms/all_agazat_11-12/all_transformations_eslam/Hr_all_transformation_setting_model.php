<?php
class Hr_all_transformation_setting_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }


    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    /*    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("hr_job_request");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id ;
            }
            return $data;
        }
        return  1;
    }*/
    public function select_transformation_setting_by_level($level){
        $this->db->select('*');
        $this->db->from("hr_all_transformation_setting");
        $this->db->where("level",$level);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return  false;
        }
    }
    public function select_hr_all_transformations_history_by_level($level){
        $this->db->select('*');
        $this->db->from("hr_all_transformations_history");
        $this->db->where("level",$level);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return  false;
        }
    }
    public function select_from_hr_all_agzat_orders($arr){
        $this->db->select('hr_all_agzat_orders.*,holiday_setting.id as holiday_setting_id ,holiday_setting.name as no3_title');
        $this->db->from("hr_all_agzat_orders");
        $this->db->where($arr);
        $this->db->join('holiday_setting','holiday_setting.id=hr_all_agzat_orders.no3_agaza','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return  false;
        }
    }


    public function get_employees($arr)
    {
        $this->db->select('employees.*,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('employees');
        $this->db->where($arr);
        $this->db->join('all_defined_setting','all_defined_setting.defined_id = employees.degree_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();

        } else {
            return false;
        }

    }

    public function get_user_data($arr)
    {
        $this->db->select('id,employee');
        $this->db->from('employees');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }

    }

    public function get_user_data2($arr)
    {
        $this->db->select('users.*,employees.id as emp_id,employees.employee');
        $this->db->from('users');
        $this->db->where($arr);
        $this->db->join('employees','employees.id=users.emp_code','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }

    }

    public function get_agaza_data($arr){


        $this->db->select('hr_all_agzat_orders.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('hr_all_agzat_orders');
        $this->db->where($arr);
        $this->db->join('employees','employees.id=hr_all_agzat_orders.emp_id_fk','left');
        $this->db->join('all_defined_setting','all_defined_setting.defined_id = employees.degree_id','left');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }



    }

    public function saveTransformBadel(){

       //insert
        $insert['agaza_rkm_fk']=$this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk']=$this->input->post('agaza_id_fk');
        $from_user =$this->get_user_data2(array('user_id'=>$this->input->post('from_user')));

        $insert['from_user']=$this->input->post('from_user');
        if(!empty($from_user)){

            $insert['from_user_n']=$from_user->employee;
        }

        $to_user =$this->get_user_data2(array('users.emp_code'=>$this->input->post('to_user')));

        if(!empty($to_user)){
            $insert['to_user']=$to_user->user_id;
            $insert['to_user_n']=$to_user->employee;
        }


        $level_data =$this->select_transformation_setting_by_level($this->input->post('level'));
        if(!empty($level_data)){

            $insert['talab_in_fk']=$level_data->id;
            $insert['talab_in_title']=$level_data->title;
            $insert['level']=$this->input->post('level');
            $insert['talab_msg']=$level_data->msg_accept;
        }
           if($this->input->post('approved') ==2){

               $insert['reason_action']=$this->input->post('reason_action');
           }


        $insert['date']=strtotime(date('Y-m-d'));
        $insert['date_ar']= date('Y-m-d');

        $this->db->insert("hr_all_transformations_history",$insert);



      //update
        if($this->input->post('level') ==1){
        $update['action_emp_badel']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==2){

            $update['action_direct_manager']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==3){

            $update['action_mowazf_moktas']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==4){

            $update['action_moder_hr']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==5){

            $update['action_moder_final']=$this->input->post('approved');

        }
        $update['current_from_user_id']=$this->input->post('from_user');
        if(!empty($from_user)) {
        $update['current_from_user_name']=$from_user->user_name;
        }

        if(!empty($to_user)) {
            $update['current_to_user_id']=$to_user->user_id;
            $update['current_to_user_name'] = $to_user->user_name;
        }

        $update['talab_in_fk']=$level_data->id;
        $update['talab_in_title']=$level_data->title;
        $update['level']=$this->input->post('level');
        $update['talab_msg']=$level_data->msg_accept;
        $update['suspend']=$this->input->post('approved');

       // $update['suspend']=$this->input->post('approved');

        $this->db->where('agaza_rkm',$this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders',$update);
    }



    public function saveTransformMokhtas(){

        //insert
        $insert['agaza_rkm_fk']=$this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk']=$this->input->post('agaza_id_fk');
        $from_user =$this->get_user_data2(array('user_id'=>$this->input->post('from_user')));

        $insert['from_user']=$this->input->post('from_user');
        if(!empty($from_user)){

            $insert['from_user_n']=$from_user->employee;
        }

        $to_user =$this->get_user_data2(array('users.emp_code'=>$this->input->post('current_to_id')));

        if(!empty($to_user)){
            $insert['to_user']=$to_user->user_id;
            $insert['to_user_n']=$to_user->employee;
        }


        $level_data =$this->select_transformation_setting_by_level($this->input->post('level'));
        if(!empty($level_data)){

            $insert['talab_in_fk']=$level_data->id;
            $insert['talab_in_title']=$level_data->title;
            $insert['level']=$this->input->post('level');
            $insert['talab_msg']=$level_data->msg_accept;
        }
        if($this->input->post('approved') ==2){

            $insert['reason_action']=$this->input->post('reason_action');
        }


        $insert['date']=strtotime(date('Y-m-d'));
        $insert['date_ar']= date('Y-m-d');

        $this->db->insert("hr_all_transformations_history",$insert);



        //update
        if($this->input->post('level') ==1){
            $update['action_emp_badel']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==2){

            $update['action_direct_manager']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==3){

            $update['action_mowazf_moktas']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==4){

            $update['action_moder_hr']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==5){

            $update['action_moder_final']=$this->input->post('approved');

        }
        $update['current_from_user_id']=$this->input->post('from_user');
        if(!empty($from_user)) {
            $update['current_from_user_name']=$from_user->employee;
        }

        if(!empty($to_user)) {
            $update['current_to_user_id']=$to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }

        $update['talab_in_fk']=$level_data->id;
        $update['talab_in_title']=$level_data->title;
        $update['level']=$this->input->post('level');
        $update['talab_msg']=$level_data->msg_accept;
         $update['suspend']=$this->input->post('approved');

        $this->db->where('agaza_rkm',$this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders',$update);


    }



    public function saveTransformDirectManger(){

        //insert
        $insert['agaza_rkm_fk']=$this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk']=$this->input->post('agaza_id_fk');
        $from_user =$this->get_user_data2(array('user_id'=>$this->input->post('from_user')));

        $insert['from_user']=$this->input->post('from_user');
        if(!empty($from_user)){

            $insert['from_user_n']=$from_user->employee;
        }

        $to_user =$this->get_user_data2(array('users.emp_code'=>$this->input->post('current_to_id')));

        if(!empty($to_user)){
            $insert['to_user']=$to_user->user_id;
            $insert['to_user_n']=$to_user->employee;
        }


        $level_data =$this->select_transformation_setting_by_level($this->input->post('level'));
        if(!empty($level_data)){

            $insert['talab_in_fk']=$level_data->id;
            $insert['talab_in_title']=$level_data->title;
            $insert['level']=$this->input->post('level');
            $insert['talab_msg']=$level_data->msg_accept;
        }
        if($this->input->post('approved') ==2){

            $insert['reason_action']=$this->input->post('reason_action');
        }


        $insert['date']=strtotime(date('Y-m-d'));
        $insert['date_ar']= date('Y-m-d');

        $this->db->insert("hr_all_transformations_history",$insert);



        //update
        if($this->input->post('level') ==1){
            $update['action_emp_badel']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==2){

            $update['action_direct_manager']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==3){

            $update['action_mowazf_moktas']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==4){

            $update['action_moder_hr']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==5){

            $update['action_moder_final']=$this->input->post('approved');

        }
        $update['current_from_user_id']=$this->input->post('from_user');
        if(!empty($from_user)) {
            $update['current_from_user_name']=$from_user->employee;
        }

        if(!empty($to_user)) {
            $update['current_to_user_id']=$to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }

        $update['talab_in_fk']=$level_data->id;
        $update['talab_in_title']=$level_data->title;
        $update['level']=$this->input->post('level');
        $update['talab_msg']=$level_data->msg_accept;
        $update['suspend']=$this->input->post('approved');

        $this->db->where('agaza_rkm',$this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders',$update);


    }
//=============================================================================================================//


    public function saveTransformToManger(){

        //insert
        $insert['agaza_rkm_fk']=$this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk']=$this->input->post('agaza_id_fk');
        $from_user =$this->get_user_data2(array('user_id'=>$this->input->post('from_user')));

        $insert['from_user']=$this->input->post('from_user');
        if(!empty($from_user)){

            $insert['from_user_n']=$from_user->employee;
        }

        $to_user =$this->get_user_data2(array('users.emp_code'=>$this->input->post('current_to_id')));

        if(!empty($to_user)){
            $insert['to_user']=$to_user->user_id;
            $insert['to_user_n']=$to_user->employee;
        }


        $level_data =$this->select_transformation_setting_by_level($this->input->post('level'));
        if(!empty($level_data)){

            $insert['talab_in_fk']=$level_data->id;
            $insert['talab_in_title']=$level_data->title;
            $insert['level']=$this->input->post('level');
            $insert['talab_msg']=$level_data->msg_accept;
        }
        if($this->input->post('approved') ==2){

            $insert['reason_action']=$this->input->post('reason_action');
        }


        $insert['date']=strtotime(date('Y-m-d'));
        $insert['date_ar']= date('Y-m-d');

        $this->db->insert("hr_all_transformations_history",$insert);



        //update
        if($this->input->post('level') ==1){
            $update['action_emp_badel']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==2){

            $update['action_direct_manager']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==3){

            $update['action_mowazf_moktas']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==4){

            $update['action_moder_hr']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==5){

            $update['action_moder_final']=$this->input->post('approved');

        }
        $update['current_from_user_id']=$this->input->post('from_user');
        if(!empty($from_user)) {
            $update['current_from_user_name']=$from_user->employee;
        }

        if(!empty($to_user)) {
            $update['current_to_user_id']=$to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }

        $update['talab_in_fk']=$level_data->id;
        $update['talab_in_title']=$level_data->title;
        $update['level']=$this->input->post('level');
        $update['talab_msg']=$level_data->msg_accept;
        $update['suspend']=$this->input->post('approved');

        $this->db->where('agaza_rkm',$this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders',$update);


    }


    public function saveTransformManger(){

        //insert
        $insert['agaza_rkm_fk']=$this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk']=$this->input->post('agaza_id_fk');
        $from_user =$this->get_user_data2(array('user_id'=>$this->input->post('from_user')));

        $insert['from_user']=$this->input->post('from_user');
        if(!empty($from_user)){

            $insert['from_user_n']=$from_user->employee;
        }

        $to_user =$this->get_user_data2(array('users.emp_code'=>$this->input->post('current_to_id')));

        if(!empty($to_user)){
            $insert['to_user']=$to_user->user_id;
            $insert['to_user_n']=$to_user->employee;
        }


        $level_data =$this->select_transformation_setting_by_level($this->input->post('level'));
        if(!empty($level_data)){

            $insert['talab_in_fk']=$level_data->id;
            $insert['talab_in_title']=$level_data->title;
            $insert['level']=$this->input->post('level');
            $insert['talab_msg']=$level_data->msg_accept;
        }
        if($this->input->post('approved') ==2){

            $insert['reason_action']=$this->input->post('reason_action');
        }


        $insert['date']=strtotime(date('Y-m-d'));
        $insert['date_ar']= date('Y-m-d');



        $this->db->insert("hr_all_transformations_history",$insert);



        //update
        if($this->input->post('level') ==1){
            $update['action_emp_badel']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==2){

            $update['action_direct_manager']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==3){

            $update['action_mowazf_moktas']=$this->input->post('approved');
        }elseif ($this->input->post('level') ==4){

            $update['action_moder_hr']=$this->input->post('approved');

        }elseif ($this->input->post('level') ==5){

            $update['action_moder_final']=$this->input->post('approved');

        }
        $update['current_from_user_id']=$this->input->post('from_user');
        if(!empty($from_user)) {
            $update['current_from_user_name']=$from_user->employee;
        }

        if(!empty($to_user)) {
            $update['current_to_user_id']=$to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }

        $update['talab_in_fk']=$level_data->id;
        $update['talab_in_title']=$level_data->title;
        $update['level']=$this->input->post('level');
        $update['talab_msg']=$level_data->msg_accept;
        $update['suspend']=$this->input->post('approved');

        $this->db->where('agaza_rkm',$this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders',$update);


    }





//=============================================================================================================//



    
}// END CLASS