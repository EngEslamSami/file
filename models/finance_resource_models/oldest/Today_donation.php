<?php

class Today_donation extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert(){
        $data['person_id']=$this->chek_Null( $this->input->post('person_id'));
        $data['donate_type_id_fk']=$this->chek_Null( $this->input->post('type'));
         $data['account_settings_id_fk']=$this->input->post('account_settings_id_fk');
           $data['program_id_fk']=$this->input->post('program_id_fk');
        $data['detail']=$this->input->post('detail');   
         
        $data['mob']=0;
        if($this->input->post('mob')){
         $data['mob']=$this->chek_Null( $this->input->post('mob'));
        }
        $data['card_id']=0;
        if($this->input->post('mob')){
            $data['card_id']=$this->chek_Null( $this->input->post('card_id'));
        }
        $data['name']='null';
        if($this->input->post('mob')){
            $data['name']=$this->chek_Null( $this->input->post('name'));
        }
        
         $data["paid_type"]=$this->chek_Null( $this->input->post('payment_type'));
        $data["bank_id_fk"]=$this->chek_Null( $this->input->post('bank_id_fk'));
        
            $data["box"]=$this->chek_Null( $this->input->post('box'));
            $data["worth_date"]=$this->chek_Null( strtotime($this->input->post('worth_date')));
            $data["network"]=$this->chek_Null( $this->input->post('network'));
        
        
        $data["account_num"]=$this->chek_Null( $this->input->post('account_num'));
        
        $data['value']=$this->chek_Null( $this->input->post('value'));
        $data['month']=$this->chek_Null( date('m',time()));
        $data['year']=$this->chek_Null(date('Y',time()));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('cash_donations',$data);
    }

    //=======================================================
  /*  public  function  update($id){

        $data['person_id']=$this->chek_Null( $this->input->post('person_id'));
        $data['donate_type_id_fk']=$this->chek_Null( $this->input->post('type'));
         $data['account_settings_id_fk']=$this->input->post('account_settings_id_fk');
           $data['program_id_fk']=$this->input->post('program_id_fk');
           $data['detail']=$this->input->post('detail');  
             $data["paid_type"]=$this->chek_Null( $this->input->post('payment_type'));
        $data["bank_id_fk"]=$this->chek_Null( $this->input->post('bank_id_fk'));
        $data["account_num"]=$this->chek_Null( $this->input->post('account_num'));
        
           
            
        $data['mob']=0;
        if($this->input->post('mob')){
            $data['mob']=$this->chek_Null( $this->input->post('mob'));
        }
        $data['card_id']=0;
        if($this->input->post('mob')){
            $data['card_id']=$this->chek_Null( $this->input->post('card_id'));
        }
        $data['name']=null;
        if($this->input->post('mob')){
            $data['name']=$this->chek_Null( $this->input->post('name'));
        }
        $data['value']=$this->chek_Null( $this->input->post('value'));
        $data['month']=$this->chek_Null( date('m',time()));
        $data['year']=$this->chek_Null(date('Y',time()));
        $this->db->where('id', $id);
        $this->db->update('cash_donations',$data);

    }*/
    
    public  function  update($id){
        $data['person_id']=$this->chek_Null( $this->input->post('person_id'));
        $data['donate_type_id_fk']=$this->chek_Null( $this->input->post('type'));
        $data['account_settings_id_fk']=$this->input->post('account_settings_id_fk');
        $data['program_id_fk']=$this->input->post('program_id_fk');
        $data['detail']=$this->input->post('detail');   
         
        $data['mob']=0;
        if($this->input->post('mob')){
         $data['mob']=$this->chek_Null( $this->input->post('mob'));
        }
        $data['card_id']=0;
        if($this->input->post('mob')){
            $data['card_id']=$this->chek_Null( $this->input->post('card_id'));
        }
        $data['name']='null';
        if($this->input->post('mob')){
            $data['name']=$this->chek_Null( $this->input->post('name'));
        }
        
        $data["paid_type"]=$this->chek_Null( $this->input->post('payment_type'));
        $data["bank_id_fk"]=$this->chek_Null( $this->input->post('bank_id_fk'));
   
        $data["box"]=$this->chek_Null($this->input->post('box'));
        $data["worth_date"]=$this->chek_Null( strtotime($this->input->post('worth_date')));
        $data["network"]=$this->chek_Null( $this->input->post('network'));
        
        
        $data["account_num"]=$this->chek_Null( $this->input->post('account_num'));
        
        $data['value']=$this->chek_Null( $this->input->post('value'));
        $data['month']=$this->chek_Null( date('m',time()));
        $data['year']=$this->chek_Null(date('Y',time()));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();

        $this->db->where('id', $id);
        $this->db->update('cash_donations',$data);

    }

    //=================================================
    public function select_name($id){
        $h = $this->db->get_where('donors_t', array('id'=>$id));
        return $h->row_array();
    }
    //======================================================
    public function select_guarantees(){
        $this->db->select('*');
        $this->db->from('guarantees');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->name = $this->select_name($row->guarantee_id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }


    public function select(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }



    //--------------------------------------------------------------------
    public function get_details_beetween_dates($from,$to,$type)
    {
        $this->db->select('*');
        $this->db->from('cash_donations');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        if($type !=4){
          $this->db->where('donate_type_id_fk',$type);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
   //---------------------------------------------------------------------------------

//---------------------------------------------------------------------
  /*  public function participation_money($array){
        $this->db->select('*');
        $this->db->from('participation_money');
        $this->db->where('deport',0);
        $this->db->where($array);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->donor_name = $this->get_donor_name($p_cat->donor_id);
            $i++;
        }
        return $categories;
    }*/
    
        public function participation_money($pill_num,$array){ // old
        $this->db->select('*');
        $this->db->from('participation_money');
        $this->db->where('deport',0);
        $this->db->where($array);
        $this->db->where("pill_num",$pill_num);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->donor_name = $this->get_donor_name($p_cat->donor_id);
            $categories[$i]->program_name = $this->get_names("programs_depart",array("id"=>$p_cat->program_id_fk),"program_name");
            $categories[$i]->bank_name = $this->get_names("banks",array("id"=>$p_cat->bank_id),"bank_name");
            $i++;
        }
        return $categories;
    }
     public function get_names($table,$array_if,$fild_name){
        $h = $this->db->get_where($table,$array_if );
        $data=$h->row_array();
        return $data[$fild_name];
    }
   //----------------------------------------------------------------------
    public function get_donor_name($id){
            $h = $this->db->get_where("donors_t", array('id'=>$id));
            $data=$h->row_array();
        return $data['user_name'];
    }
    //---------------------------------------------------------------------
    public function insert_deport_participation_money(){
        $data['p_cost']=$this->input->post("value");
        $data['madeen']=$this->input->post("madeen");
        $data['dayen']=$this->input->post("dayen");
        $data['paid_type']=$this->input->post("paid_type");
        $data['process']=9;
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();//publisher
        $data['pill_num']=time();//publisher
        $data['publisher']=$_SESSION['user_username'];
       $this->db->insert("all_deports",$data);
    }
    //--------------------------------------------------------------------
    public function update_deport_participation_money(){
        foreach ($this->input->post("select-id") as $key=>$value){
            $data['deport']=1;
            $this->db->where("id",$value);
            $this->db->update("participation_money",$data);
        }
    }


/**********************/
   public function update_deport_penalty_money(){
        foreach ($this->input->post("select-id") as $key=>$value){
            $data['deport']=1;
            $this->db->where("id",$value);
            $this->db->update("penalty",$data);
        }
    }

    //--------------------------------------------------------------------

    public function update_deport_debts_money(){
        foreach ($this->input->post("select-id") as $key=>$value){
            $data['deport']=1;
            $this->db->where("debt_id",$value);
            $this->db->update("emp_debts",$data);
        }
    }



public function update_deport_rewards_money(){
    foreach ($this->input->post("select-id") as $key=>$value){
        $data['deport']=1;
        $this->db->where("id",$value);
        $this->db->update("mon_rewards",$data);
    }
}


/*****************************************/
    public function undport_participation_money($array){
        $this->db->select('pill_num ,donor_id ,deport, pay_method_id_fk');
        $this->db->from('participation_money');
        $this->db->where('deport',0);
        $this->db->where($array);
        $this->db->group_by('pill_num');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->participation_money($p_cat->pill_num,$array);
            $i++;
        }
        return $categories;
    }
    
    


}// END CLASS