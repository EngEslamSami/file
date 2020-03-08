<?php
class Lagna_session_model extends CI_Model
{
    
    public function __construct()
	{

    }

    public function get_all_orders()
    {
        $this->db->where('approved',1);
        $data=array();
        $x=0;
        $query= $this->db->get('transformation_lagna')->result();
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


            $x++;

        }
        return $data;
    }

    public function get_searcher_opinion($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);


        return $this->db->get('researcher_opinion')->row();
    }
    public function get_data_father($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);


        return $this->db->get('father')->row();
        
    }
    public function get_data_mother($mother_num)
    {
        $this->db->where('mother_national_num_fk',$mother_num);


        return $this->db->get('mother')->row();

      
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
            $x++;


        }
        return $data;


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
            return $this->db->get('family_setting')->row()->title_setting;
        }else{
            return false;
        }
        
            

        }
        if ($type == 2) {
            $this->db->where( array('type'=>43,'id_setting'=>$id));
            
           $query=$this->db->get('family_setting');

        
        if($query->num_rows()>0){
            return $this->db->get('family_setting')->row()->title_setting;
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
        $query = $this->db->get();



        return $query->row();
    }


    public function get_all_areas(){
        $query = $this->db->get('area_settings');
        return $query->result();
    }
  /* public function update_approved_lagna()
   {
    $reason=$this->input->post('reason');
       $value=$this->input->post('value');
       $row=$this->input->post('row');
       $data['approved_lagna']=$value;
       $data['reason_lagna']= $reason;
       $this->db->where('id',$row);
       $this->db->update('transformation_lagna',$data);
       if( $value==1){
       echo "تم بنجاح قبول الطلب";
      
   }else{
     echo "تم بنجاح رفض الطلب";
   }

}*/
 public function update_approved_lagna() // old_fun
   {
    $reason=$this->input->post('reason');
       $value=$this->input->post('value');
       $row=$this->input->post('row');
       $data['approved_lagna']=$value;
       $data['reason_lagna']= $reason;
       $data['order_num']=$this->input->post('glsa_num');
       $data['session_num']=$this->input->post('glsa_num');
       $this->db->where('id',$row);
       $this->db->update('transformation_lagna',$data);
       if( $value==1){
       echo "تم بنجاح قبول الطلب";
      
   }else{
     echo "تم بنجاح رفض الطلب";
   }

}



public function get_all_member()
    {
        $this->db->order_by('id','desc');
        $session_number= $this->db->get('selected_lagna_members')->row()->session_number;
        return $session_number;
    }
    public function get_member_session()
    {
        $this->db->where('session_number',$this->get_all_member());
        $query= $this->db->get('selected_lagna_members')->result();
        $data=array();
        $x=0;
        foreach($query as $row)
        {
            $data[$x]=$row;


            $x++;
        }
        return $data;
    }
    /*********************************************************************/
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

}
?>