<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transformation_lagna_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function insert_transformation_lagna($process,$file_id){  //

        /*************************ahmed*****************/
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
    }

    public function transformation_lagna_approved($process,$id){
        $data['approved']=$process;
        $data['approved_date']=strtotime(date("Y-m-d",time()));
        $data['approved_date_ar']=date("Y-m-d",time());
        //$data['session_num_fk']=$this->input->post('open_session_id');
        $this->db->where('id', $id);
        $this->db->update('transformation_lagna',$data);
        if($process == 0){
            $this->db->where('id', $id);
            $this->db->delete('transformation_lagna');
        }
    }

 /*
    public function transformation_lagna_approved($process,$id){
        $data['approved']=$process;
        $data['approved_date']=strtotime(date("Y-m-d",time()));
        $data['approved_date_ar']=date("Y-m-d",time());
        $this->db->where('id', $id);
        $this->db->update('transformation_lagna',$data);
        if($process == 0){
            $this->db->where('id', $id);
            $this->db->delete('transformation_lagna');
        }
    }*/


/************************************************/
    public function get_all_orders($type){

        $this->db->select('transformation_lagna.* ,lagna.lagna_name as lagna_title_name');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna', 'lagna.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
        $this->db->where('approved',$type);
        $data=array();
        $x=0;
        $query= $this->db->get()->result();
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->mother_last_account =$this->getMotherAccount($row->mother_national_num);
            $data[$x]->person_account =$this->getBasicAccount($row->mother_national_num);
            $data[$x]-> agent_bank_account= $this->getBasicAccount_agent($row->mother_national_num);
            $data[$x]->mother=$this->get_data_mother($row->mother_national_num);
            $data[$x]->father=$this->get_data_father($row->mother_national_num);
            $data[$x]->abnaa=$this->get_data_abnaa($row->mother_national_num);
            $data[$x]->sakn=$this->get_data_housess($row->mother_national_num);
            $data[$x]->devices=$this->get_all_devices($row->mother_national_num);
            $data[$x]->financial_data_income=$this->get_financial_data($row->mother_national_num,1);
            $data[$x]->financial_data_duties=$this->get_financial_data($row->mother_national_num,2);
            $data[$x]->home_needs=$this->get_home_need($row->mother_national_num);
            $data[$x]->searcher_opinion=$this->get_searcher_opinion($row->mother_national_num);
            $data[$x]->open_sesssion_id=$this->open_sesssion_id($row->add_to_lagna_id_fk);
            $x++;
        }
        return $data;
    }
    public function open_sesssion_id($lagna_id_fk){
        $this->db->select('*');
        $this->db->from("selected_lagna_members");
        $this->db->where("lagna_id_fk",$lagna_id_fk);
        $this->db->where("suspend",1);
         $this->db->where("finished",0);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->session_number;
        }
        return false;
    }

    public function get_searcher_opinion($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);

        //return $this->db->get('researcher_opinion')->row();
        $query = $this->db->get('researcher_opinion');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    public function get_data_father($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);


       // return $this->db->get('father')->row();
        $query = $this->db->get('father');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }
    public function get_data_mother($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);


      //  return $this->db->get('mother')->row();
        $query = $this->db->get('mother');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }
    public function get_data_abnaa($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);
        $query= $this->db->get('f_members')->result();
        $data=array();
        $x=0;
        foreach($query as $row){
            $data[$x]=$row;
            $data[$x]->stage=$this->get_stage($row->stage_id_fk);
            $data[$x]->class=$this-> get_class($row->class_id_fk);
         $data[$x]->relation_name = $this->get_setting_name($row->member_relationship);  
        $data[$x]->halet_member_name = $this->get_files_status_setting_name($row->halt_elmostafid_member);
        
    
            
            $x++;


        }
        return $data;


    }
    
            public  function get_setting_name($id_setting){
    
        $h = $this->db->get_where("family_setting", array('id_setting'=>$id_setting));
        $arr= $h->row_array();
        return $arr['title_setting'];

    }
      public  function get_files_status_setting_name($halt_elmostafid_member){
    
        $h = $this->db->get_where("files_status_setting", array('id'=>$halt_elmostafid_member));
        $arr= $h->row_array();
        return $arr['title'];

    }
    
    
    public function get_stage($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('classrooms');


        if($query->num_rows()>0){
            return $this->db->get('classrooms')->row()->name;
        }else{
            return false;
        }

    }
    public function get_class($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('classrooms');
        $query=$this->db->get('classrooms');
        if($query->num_rows()>0){
            return $this->db->get('classrooms')->row()->name;
        }else{
            return false;
        }
    }
    public function get_data_houses($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);
        $query=$this->db->get('houses');
        if($query->num_rows()>0){
            return $this->db->get('houses')->row();
        }else{
            return false;
        }

    }
    public function get_all_devices($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);
        $query= $this->db->get('devices')->result();
        $data=array();
        $x=0;
        foreach($query as $row){
            $data[$x]=$row;
            $data[$x]->title_setting=$this->get_device_name($row->d_house_device_id_fk);

            $x++;


        }
        return $data;
    }
    public function get_device_name($id)
    {

        $this->db->where( array('type'=>18,'id_setting'=>$id));
        $query=$this->db->get('family_setting');


        if($query->num_rows()>0){
            return $this->db->get('family_setting')->row()->title_setting;
        }else{
            return false;
        }



    }
    public function get_financial_data($mother_num,$type)
    {
        // array('mother_national_num_fk'=>$mother_num,'type'=>$type);
        $this->db->where( array('mother_national_num_fk'=>$mother_num,'type'=>$type));

        $query=$this->db->get('family_income_duties')->result();
        $data=array();
        $x=0;
        foreach($query as $row){
            $data[$x]=$row;
            $data[$x]->name=$this->get_name_setting($row->type,$row->finance_income_type_id);
            $x++;
        }
        return $data;
    }
    public function get_name_setting($type,$id)
    {
        if ($type == 1) {
            $this->db->where( array('type'=>42,'id_setting'=>$id));
            $query=$this->db->get('family_setting');


            if($query->num_rows()>0){
                return $query->row()->title_setting;
            }else{
                return false;
            }



        }
        if ($type == 2) {
            $this->db->where( array('type'=>43,'id_setting'=>$id));

            $query=$this->db->get('family_setting');


            if($query->num_rows()>0){
                return $query->row()->title_setting;
            }else{
                return false;
            }
        }
    }
    public function get_home_need($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('home_needs')->result();
        $data=array();
        $x=0;
        foreach ($query as $row) {
            $data[$x]=$row;
            $data[$x]->name=$this->get_name($row->h_home_device_id_fk);

        }
        return $data;
    }
    public function get_name($id)
    {

        $this->db->where('id',$id);
        $query=$this->db->get('products');


        if($query->num_rows()>0){
            return $this->db->get('products')->row()->name;
        }else{
            return false;
        }


    }
    //osama//
    public function get_data_housess($mother_num)
    {
        $this->db->select('*')
            ->from('houses')
            ->join('mother', "houses.mother_national_num_fk = $mother_num");
      //  $query = $this->db->get();
       // return $query->row();
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }


    public function get_all_areas(){
        $query = $this->db->get('area_settings');
        //return $query->result();
      //  $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function getMotherAccount($mother_num){
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0]->m_account;
            return $data;
        }else{
            return 0;
        }

    }

    /*****************************************************************************************/

    public function getFamilyAccount($mother_num){
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_num);
        $this->db->where("member_account",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return 1;
        }else{
            return 0;
        }

    }

    public function getBasicAccount($mother_num){
        $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result()[0]->person_account ;
            return $data;
        }else{
            return 0;
        }

    }

    public function getBasicAccount_agent($mother_num){
        $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result()[0]->agent_bank_account ;
            return $data;
        }else{
            return 0;
        }

    }
    
    /********************************************************/
    
      /**********************************************************************************/
  /*  public function all_procedures($type){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagna(array('transformation_lagna.procedure_id_fk'=>$row->id,'transformation_lagna.approved'=>$type));
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }*/
   /*
    public function GetTransformationLagna($arr){
        $this->db->select('transformation_lagna.* ,lagna.lagna_name as lagna_title_name');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna', 'lagna.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
        $this->db->where($arr);
        $data=array();
        $x=0;
        $query= $this->db->get()->result();
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->father=$this->get_data_father($row->mother_national_num);
            $data[$x]->file_num=$this->GetFileNum($row->mother_national_num);
            $data[$x]->open_sesssion_id=$this->open_sesssion_id($row->add_to_lagna_id_fk);
            $x++;
        }
        return $data;
    }*/

    public function GetFileNum($mother_num){
        $this->db->select('id,mother_national_num,file_num,suspend,final_suspend');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             if($query->result()[0]->final_suspend == 4){
                 $data =$query->result()[0]->file_num;
             }elseif ($query->result()[0]->final_suspend != 4){
                 $data =$query->result()[0]->id;
             }
            return $data;
        }else{
            return 0;
        }
    }

    public function transformation_approved(){
    /*
        $this->db->select('session_number,lagna_id_fk,suspend');
        $this->db->from("selected_lagna_members");
        $this->db->where(array('lagna_id_fk'=>$this->input->post('add_to_lagna_id_fk'),'suspend'=>1));
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        //$data['reason_lagna'] = $this->input->post('reason_lagna');
       // $data['approved_lagna'] = $this->input->post('approved_lagna');
        if ($query->num_rows() > 0) {
        $data['session_num'] =$query->result()[0]->session_number;
        $data['session_num_fk'] = $query->result()[0]->session_number;
        }else{
            $data['session_num'] =0;
            $data['session_num_fk'] = 0;
        }*/
        $data['session_num'] =$this->input->post('open_sesssion_id');
        $data['session_num_fk'] = $this->input->post('open_sesssion_id');
        $data['date_add_to_sessions'] = time();
        $data['person_add_to_sessions'] = $_SESSION["user_id"];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('transformation_lagna', $data);

    }

    /**********************************************************************************/

          /**********************************************************************************/
    public function all_procedures($type){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagna(array('transformation_lagna.procedure_id_fk'=>$row->id,'transformation_lagna.approved'=>$type),0);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }

    public function GetTransformationLagna($arr,$conditions){
        $this->db->select('transformation_lagna.* ,lagna.lagna_name as lagna_title_name');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna', 'lagna.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
        $this->db->where("finished",0);
          $this->db->where("type",1);
        
        $this->db->where($arr);
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $this->db->order_by('file_num','asc');
        $data=array();
        $x=0;
        $query= $this->db->get()->result();
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->father=$this->get_data_father($row->mother_national_num);
            $data[$x]->file_num=$this->GetFileNum($row->mother_national_num);
            $data[$x]->open_sesssion_id=$this->open_sesssion_id($row->add_to_lagna_id_fk);
            $x++;
        }
        return $data;
    }



   



    public function all_procedures2($conditions){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagna(array('transformation_lagna.procedure_id_fk'=>$row->id),$conditions);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }
    

    public function finish_session($session_num){
        
        // transformation_lagna
        $table1['finished'] = 1;
        $this->db->where('session_num_fk',$session_num);
        $this->db->update('transformation_lagna', $table1);
        //selected_lagna_members
        $table2['finished'] = 1;
        $table2['finished_date'] = strtotime(date('Y-m-d'));
        $table2['finished_date_s'] = time();
        $table2['finished_publiher'] = $_SESSION['user_id'];
        $this->db->where('session_number',$session_num);
        $this->db->update('selected_lagna_members', $table2);
        
    }
/*********************************************************/

  
    public function all_proceduresDesicion($type){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagnaDesicion(array('transformation_lagna.procedure_id_fk'=>$row->id,'transformation_lagna.approved'=>$type),0);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }


    public function band_data($band_id){
        $this->db->select('family_mahaders.* ,bnod_help.title as band_name');
        $this->db->from('family_mahaders');
        $this->db->join('bnod_help', 'bnod_help.id = family_mahaders.bnod_help_fk',"left");
        $this->db->where("family_mahaders.id",$band_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }




    public function GetTransformationLagnaDesicion($arr,$conditions){
        $this->db->select('transformation_lagna.* ,lagna.lagna_name as lagna_title_name');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna', 'lagna.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
        $this->db->where("type",2);
        $this->db->where("finished",0);
        
        $this->db->where($arr);
      
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
          $this->db->order_by('file_num','desc');
        $data=array();
        $x=0;
        $query= $this->db->get()->result();
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->open_sesssion_id=$this->open_sesssion_id($row->add_to_lagna_id_fk);
            $data[$x]->band_data = $this->band_data($row->band_id);
            $x++;
        }
        return $data;
    }

/*
  public function all_proceduresDesicion2($type,$session_id){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagnaDesicion(array('transformation_lagna.session_num'=>$session_id,'transformation_lagna.procedure_id_fk'=>$row->id,'transformation_lagna.approved'=>$type),0);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }*/
	 public function all_proceduresDesicion2($type,$session_id){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagnaDesicion(array('transformation_lagna.session_num'=>$session_id,'transformation_lagna.procedure_id_fk'=>$row->id ,'transformation_lagna.approved_lagna'=>0,'transformation_lagna.approved'=>$type),0);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }
    
    
        public function all_proceduresDesicion3($session_id){
        $this->db->select('id,title');
        $this->db->from("procedures_option_lagna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->transformation_lagna = $this->GetTransformationLagnaDesicion(array('transformation_lagna.session_num'=>$session_id,'transformation_lagna.procedure_id_fk'=>$row->id,"transformation_lagna.approved_lagna !="=>0),0);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }





    public function transformation_lagna_approved_new($process,$id){
        $data['approved']=$process;
        $data['approved_lagna']=2;
        $data['approved_date']=strtotime(date("Y-m-d",time()));
        $data['approved_date_ar']=date("Y-m-d",time());
        if($_POST['add_reason']){
            $data['session_num_fk']=$this->input->post('open_session_id');
            $data['session_num']=$this->input->post('open_session_id');
            $data['reason_lagna']=$this->input->post('open_session_id');
        }
        $this->db->where('id', $id);
        $this->db->update('transformation_lagna',$data);
        if($process == 0){
            $this->db->where('id', $id);
            $this->db->delete('transformation_lagna');
        }
    }    



/*********************************************/


        public function etest_fun($session_id){
        $this->db->select('*');
        $this->db->from("transformation_lagna");
         $this->db->where('session_num_fk',$session_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                 $data[$a]->file_num = $this->get_file_num($row->mother_national_num);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }

   public function get_file_num($mother_national_num_fk)
    {
        $h = $this->db->get_where("basic", array('mother_national_num' => $mother_national_num_fk));
        $arr = $h->row_array();
        return $arr['file_num'];
    }
    
    
    
    
    
    
    
    
            public function etest_fun_2($session_id){
        $this->db->select('*');
        $this->db->from("transformation_lagna_members");
         $this->db->where('session_num_fk',$session_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                 $data[$a]->member_name = $this->get_member_name($row->person_id_fk);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }

   public function get_member_name($person_id_fk)
    { 
        $h = $this->db->get_where("f_members", array('id' => $person_id_fk));
        $arr = $h->row_array();
        return $arr['member_full_name'];
    }

} // END CLASS

