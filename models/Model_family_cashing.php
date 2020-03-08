<?php
class Model_family_cashing extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->main_table="finance_sarf_order";
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    //==========================================
    public function select_last_value_fild(){
        $this->db->select('sarf_num');
        $this->db->from($this->main_table);
        $this->db->order_by("sarf_num","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->sarf_num;
            }
            return $data;
        }
        return 0;
    }
    //==========================================
    public function select_where($Conditions_arr,$condition_year){
        $this->db->select('basic.file_num , mother.mother_national_num_fk ,mother.full_name');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
       // $this->db->where("basic.suspend",4);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
                $data[$i]->up_child=$this->get_up_child($row->mother_national_num_fk,$condition_year);
                $data[$i]->down_child=$this->get_down_child($row->mother_national_num_fk,$condition_year);
                $data[$i]->mother_num_in=$this->get_mother_num($row->mother_national_num_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
     //==========================================
     public function get_up_child($mother_national_num_fk ,$condition_year){
        $this->db->select('id, member_full_name');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk); // ""
        $this->db->where("member_birth_date_hijri_year <=",$condition_year); 
        $this->db->where("categoriey_member ",3);
       // $this->db->where("halt_elmostafid_member",1);
       $this->db->where("persons_status",1);
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }
      //==========================================
       public function get_down_child($mother_national_num_fk ,$condition_year){
            $this->db->select('id, member_full_name');
            $this->db->from("f_members");
            $this->db->where("mother_national_num_fk",$mother_national_num_fk); // ""
            $this->db->where("member_birth_date_hijri_year >=",$condition_year); 
            $this->db->where("categoriey_member ",3);
           // $this->db->where("halt_elmostafid_member",1);
              $this->db->where("persons_status",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }
     //==========================================
       public function get_mother_num($mother_national_num_fk ){
            $this->db->select('mother_national_num_fk, full_name');
            $this->db->from("mother");
            $this->db->where("mother_national_num_fk",$mother_national_num_fk); // ""
            $this->db->where("categoriey_m ",1);
            $this->db->where("halt_elmostafid_m",1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }
       //==========================================
    public function total_child($Conditions_arr){
        $this->db->select('id, member_full_name');
        $this->db->from("f_members");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }
    //==========================================
    public function insert($file){

        $data['sarf_num'] = $this->input->post('sarf_num');
        $data['bnod_help_fk'] = $this->input->post('bnod_help_id_fk');
        $data['mon_melady'] = $this->input->post('mon_melady');
        $data['sarf_date'] = strtotime($this->input->post('sarf_date'));
        $data['sarf_date_ar'] = $this->input->post('sarf_date');
        $data['type_sarf'] = $this->input->post('sarf_type');
        $data['method_type'] = $this->input->post('method_type');
        $data['type_family'] = $this->input->post('member_type');
        $data['total_value'] = $this->input->post('total_value');
        
        
         if( $this->input->post('sarf_type') == 3){
             $data['value_armal'] = $this->input->post('value_armal');
             $data['value_yatem'] = $this->input->post('value_yatem');
             $data['value_mostafed'] = $this->input->post('value_mostafed');
               
        }
        
       /* if( $this->input->post('method_type') != 3){
            $data['bank_id_fk'] = $this->input->post('bank_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
        }*/
        $data['about']        = $this->chek_Null( $this->input->post('about') );
        $data['according_to'] = $this->chek_Null($this->input->post('method_type_according_to'));
        $data['education_according_to'] = $this->chek_Null($this->input->post('education_according_to'));
        $data['education_according_to'] = $this->chek_Null($this->input->post('education_according_to'));
        $data['from_age_according_to'] = $this->chek_Null($this->input->post('from_age_according_to'));
        $data['to_age_according_to'] = $this->chek_Null($this->input->post('to_age_according_to'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['other_person'] = $this->chek_Null($this->input->post('other_person'));
        $data['bank_attachment'] = $file;


        $data['publisher'] = $_SESSION["user_id"];
        $this->db->insert($this->main_table,$data);
        
    }
    //==========================================
    public function update($sarf_num ,$total_value){

        $data['sarf_num'] = $this->input->post('sarf_num');
        $data['sarf_date'] = strtotime($this->input->post('sarf_date'));
        $data['sarf_date_ar'] = $this->input->post('sarf_date');
        $data['bnod_help_fk'] = $this->input->post('bnod_help_id_fk');
        $data['mon_melady'] = $this->input->post('mon_melady');
        // $data['type_sarf'] = $this->input->post('sarf_type');
        $data['method_type'] = $this->input->post('method_type');
        // $data['type_family'] = $this->input->post('member_type');
        $data['total_value'] = $total_value;
        /*if( $this->input->post('method_type') != 3){
            $data['bank_id_fk'] = $this->input->post('bank_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
        }*/
        $data['publisher'] = $_SESSION["user_id"];
        $this->db->where("sarf_num",$sarf_num);
        $this->db->update($this->main_table,$data);

    }
    //==========================================
   /* public function update_presence($sarf_num ){

         $data['presence_number'] = $this->input->post('presence_number');
         $data['presence_year'] = $this->input->post('presence_year');
         $this->db->where("sarf_num",$sarf_num);
        $this->db->update($this->main_table,$data);

    }*/
       public function update_presence($sarf_num)
    {

        $data['presence_number'] = $this->input->post('presence_number');
        $data['presence_number_galsa'] = $this->input->post('presence_number_galsa');//18-6-om
        $data['presence_year'] = $this->input->post('presence_year');
        $this->db->where("sarf_num", $sarf_num);
        $this->db->update($this->main_table, $data);

    }
    
      public function gals_attachments($session_num)
    {
        $query = $this->db->select('session_attachment')->where("session_number", $session_num)->get('selected_lagna_members');
        if ($query->num_rows() > 0) {
            return $query->row()->session_attachment;
        }
        return false;
    }
    //==========================================
    public  function  insert_details($sarf_num_fk){
        $main =$this->input->post('value');
           $data["sarf_num_fk"]=$sarf_num_fk;
        foreach ($main as $item=>$value) {
              $data['mother_national_num_fk'] = $item;
              $data['value'] = $value;
              $bank_data = $this->get_Bank_details($item);
              $data['bank_responsible_national_num'] = $bank_data->person_card;
              $data['bank_account_num'] = $bank_data->bank_account_num;
              $data['bank_responsible_name'] = $bank_data->person_name;
              $data['bank_code'] = $bank_data->bank_code;
              $data['file_num'] = $bank_data->file_num; 
              
              $data['young_num'] = $bank_data->down_child; 
              
               $data['adult_num'] = $bank_data->up_child; 
               $data['mother_num'] = $bank_data->mother_num_in; 
              
              
         //   $data['all_num'] = $this->input->post('all_num')[$item];
        //    $data['file_num'] = $this->input->post('file_num')[$item];
          //  $data['mother_num'] = $this->input->post('mother_num')[$item];
          //  $data['young_num'] = $this->input->post('young_num')[$item];
          //  $data['adult_num'] = $this->input->post('adult_num')[$item];
           /* if($this->input->post('sarf_type') == 3) {
                $data['mother_value'] = $this->input->post('mother_value')[$item];
                $data['young_value'] = $this->input->post('young_value')[$item];
                $data['adult_value'] = $this->input->post('adult_value')[$item];
            }*/
            $this->db->insert("finance_sarf_order_details",$data);
        }
    }
    //==========================================
    public function select_all(){
        $this->db->select('finance_sarf_order.* ,bnod_help.title as band_name');
        $this->db->from($this->main_table);
        $this->db->join('bnod_help', 'bnod_help.id = finance_sarf_order.bnod_help_fk',"left");
        //$this->db->group_by("sarf_num");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function select_all_banks(){
        $this->db->select('id ,title');
        $this->db->from("banks_settings");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function printSarf($sarf_num){
        return $this->db->select('finance_sarf_order_details.*, basic.file_num, mother.full_name')
            ->join('basic','basic.mother_national_num=finance_sarf_order_details.mother_national_num_fk')
            ->join('mother','mother.mother_national_num_fk=finance_sarf_order_details.mother_national_num_fk')
            ->where('finance_sarf_order_details.sarf_num_fk',$sarf_num)
            ->get('finance_sarf_order_details')
            ->result();
    }
    //==========================================
    public function getByArray($sarf_num){
       // $h = $this->db->get_where($this->main_table,array("sarf_num"=>$sarf_num));
          $this->db->select('*');
        $this->db->from($this->main_table);
         $this->db->join('bnod_help','bnod_help.id=finance_sarf_order.bnod_help_fk',"left");
        $this->db->where(array("sarf_num"=>$sarf_num));
        $query = $this->db->get();
        return $query->row_array();
    }
    //==========================================
    public function select_sarf_detals($sarf_num_fk){
        $this->db->select('finance_sarf_order_details.* ,
                           mother.full_name as mother_name,
                           basic.file_num as file_num_basic ,
                           father.full_name as father_full_name ,
                           family_bank_responsible.person_name ,
                           family_bank_responsible.type as  bank_account_type,
                           family_bank_responsible.person_id_fk ,
                           family_bank_responsible.bank_account_num ,
                           banks_settings.title as bank_name 
                           ');
        $this->db->from("finance_sarf_order_details");
        $this->db->join('mother', 'mother.mother_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
        $this->db->join('father', 'father.mother_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
        $this->db->join('basic', 'basic.mother_national_num = finance_sarf_order_details.mother_national_num_fk',"left");
        $this->db->join('family_bank_responsible', 'family_bank_responsible.family_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
        $this->db->join('banks_settings', 'banks_settings.id = family_bank_responsible.bank_id_fk',"left");
     
       $this->db->order_by("finance_sarf_order_details.file_num","ASC");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get(); // banks_settings
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach( $query->result() as $row){
                 $data[$i]->mother_num_in = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num_fk);
                //  $data[$i]->armal_sub_active = $this->get_armal_sum_armal_sub_active_mother($row->mother_national_num);      
                /********* الايتام ***********/
                $data[$i]->down_child = $this->get_yatem_full_active__SARF($row->mother_national_num_fk);
                //   $data[$i]->yatem_sub_active = $this->get_yatem_sub_active($row->mother_national_num); 
                /********* البالغين ***********/
                $data[$i]->up_child = $this->get_bale3_full_active__SARF($row->mother_national_num_fk);
                ///  $data[$i]->bale3_sub_active = $this->get_bale3_sub_active($row->mother_national_num);
                /****************************************************************************************************/
                $data[$i]->person_name=$this->get_person($row->bank_account_type,$row->person_id_fk,$row->person_name);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
   public function select_all_sarf_detalis($sarf_num_fk){
    
            $this->db->select('finance_sarf_order_details.* ,
                           father.full_name as father_full_name ,
                         
                           ');
        $this->db->from("finance_sarf_order_details");
       // $this->db->join('mother', 'mother.mother_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
        $this->db->join('father', 'father.mother_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
      //  $this->db->join('basic', 'basic.mother_national_num = finance_sarf_order_details.mother_national_num_fk',"left");
      //  $this->db->join('family_bank_responsible', 'family_bank_responsible.family_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
      
     //   $this->db->join('banks_settings', 'banks_settings.id = family_bank_responsible.bank_id_fk',"left");
     
       $this->db->order_by("finance_sarf_order_details.file_num","ASC");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get(); // banks_settings
        if ($query->num_rows() > 0) {
           $data=$query->result();
           $i=0;
            foreach( $query->result() as $row){
                
                 $data[$i] = $row;
                 $data[$i]->fe2a_title = $this->money_function($row->mother_national_num_fk);    
                /*
                $data[$i]->mother_num_in = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num_fk);     
                //الايتام /
                $data[$i]->down_child = $this->get_yatem_full_active__SARF($row->mother_national_num_fk);
     
                // البالغين
                $data[$i]->up_child = $this->get_bale3_full_active__SARF($row->mother_national_num_fk);

                $data[$i]->person_name=$this->get_person($row->bank_account_type,$row->person_id_fk,$row->person_name);
                
                */$i++;
            }
            return $data;
        }
        return false;
    
    
    
   }
     
    
    
    
    
    //==========================================
    public function get_person($type,$person_id_fk,$person_name){
        if($type==0){
            return $person_name;
        }elseif ($type==1){
            $this->db->where('id', $person_id_fk);
            $query=$this->db->get('mother');
            if($query->num_rows()>0) {
                return $query->row()->full_name;
            }else{
                return "لم يضاف الاسم";
            }
        }elseif ($type==2){
            $this->db->where('id', $person_id_fk);
            $query=$this->db->get('f_members');
            if($query->num_rows()>0) {
                return $query->row()->member_full_name;
            }else{
                return "لم يضاف الاسم";
            }
        }
    }
    //==========================================
    public function delete_sarf($sarf_num){
        $this->db->where("sarf_num",$sarf_num);
        $this->db->delete($this->main_table);
        $this->delete_sarf_detals($sarf_num);
    }
    //==========================================
    public function delete_sarf_detals($sarf_num){
        $this->db->where("sarf_num_fk",$sarf_num);
        $this->db->delete("finance_sarf_order_details");
    }
    //==========================================
    public function delete_sarf_detals_id($id){
        $this->db->where("id",$id);
        $this->db->delete("finance_sarf_order_details");
    }
    //==========================================
    public function get_person_values($sarf_num_fk){
        $this->db->select('*');
        $this->db->from("finance_sarf_order_details");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data['mother_count']=0;$data['mother_value']=0;
            $data['young_count']=0;$data['young_value']=0;
            $data['adult_count']=0;$data['adult_value']=0;
            foreach ( $query->result() as $row ){
                //============================================
                 if($row->mother_value != 0){
                     $data['mother_count']+=1;
                     $data['mother_value']+=$row->mother_value;
                 }if ($row->young_value != 0){
                     $data['young_count']+=1;
                     $data['young_value']+=$row->young_value;
                 }if($row->adult_value != 0){
                     $data['adult_count']+=1;
                     $data['adult_value']+=$row->adult_value;
                }
               //============================================
            }
            $data_return["mother_value"]=($data['mother_count'] !=0 ? $data['mother_value'] /  $data['mother_count'] : 0 )  ;
            $data_return["young_value"]=($data['young_value']   !=0 ? $data['young_value']  /  $data['young_count'] : 0) ;
            $data_return["adult_value"]=( $data['adult_count']  !=0 ? $data['adult_value'] /  $data['adult_count'] :0 );
            return $data_return;
        }
        return false;
    }
    //==========================================
    public function get_sarf_total_value($sarf_num_fk){
        $this->db->select('value');
        $this->db->from("finance_sarf_order_details");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->value;
            }
        }
        return $total;
    }
    //==========================================
    public function check_family($file_num){
        $this->db->select('suspend');
        $this->db->from("basic");
        $this->db->where("file_num",$file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->row_array();
            return $data["suspend"];
        }
        return "not_found";
    }
    //==========================================
    public function select_all_bnod(){
        $this->db->select('*');
        $this->db->from("bnod_help");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    /*
   *  ================================================================================================================
   *
   *
   */
    //==================================================================
     public  function get_mother_selelct($mother_national_num_fk){
         $this->db->select("full_name , id ,  mother_national_num_fk");
         $this->db->from("mother");
         $this->db->where("mother_national_num_fk",$mother_national_num_fk);
          $this->db->where("person_type",62);
        $this->db->where("categoriey_m", 1);
        $this->db->where('halt_elmostafid_m', 1);
         
         
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             return $rowcount = $query->result();
         }
         return false;
     }
    public  function get_member_select($mother_national_num_fk){
        $this->db->select("member_full_name  , id ,  mother_national_num_fk");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->result();
        }
        return false;
    }
    /*
     *  ================================================================================================================
     *
     *
     */
    public function get_family_caching_member($Conditions_arr,$condition_mother,$condition_member){
        $this->db->select('basic.file_num ,basic.mother_national_num  ,
                          mother.mother_national_num_fk ,mother.full_name ,
                          father.full_name as father_full_name  ');
            $this->db->from("basic");
            $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->where($Conditions_arr);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->result();$i=0;
                foreach ( $query->result() as $row){
                    /********* الارامل ***********/
                    $data[$i]->mother_num_in = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num_fk,$condition_mother);
                   // $data[$i]->mother_data_in = $this->get_data_armal_sum_armal_full_active_mother($row->mother_national_num_fk,$condition_mother);
                    /********* الايتام ***********/
                    $data[$i]->down_child = $this->get_yatem_full_active($row->mother_national_num_fk,$condition_member);
                  //  $data[$i]->down_data_child = $this->get_data_yatem_full_active($row->mother_national_num_fk,$condition_member);
                    /********* البالغين ***********/
                    $data[$i]->up_child = $this->get_bale3_full_active($row->mother_national_num_fk,$condition_member);
                    //$data[$i]->up_data_child = $this->get_data_bale3_full_active($row->mother_national_num_fk,$condition_member);
                    /****************************************************************************************************/
                    $data[$i]->bank_details = $this->get_Bank_details($row->mother_national_num_fk);
                    $i++;
                }
                return $data;
            }
            return false;
        }
    //======================   31-10-2018 =================
    public function getBank_name($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        return $h->row_array()['ar_name'];
    }
        public function getBank_code($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        return $h->row_array()['bank_code'];
    }
    
    
    
    public function get_Bank_details($id){
        $this->db->select('*');
        $this->db->from('family_bank_responsible');
        $this->db->where('family_national_num_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            $data->bank_name = $this->getBank_name($data->bank_id_fk);
            $data->bank_code = $this->getBank_code($data->bank_id_fk);
            $data->file_num = $this->getbasic_file_num($id)['file_num'];
            
            
                        
                 $data->mother_num_in = $this->get_armal_sum_armal_full_active_mother__Sarf($id);
                //  $data[$i]->armal_sub_active = $this->get_armal_sum_armal_sub_active_mother($row->mother_national_num);      
                /********* الايتام ***********/
                $data->down_child = $this->get_yatem_full_active__SARF($id);
                //   $data[$i]->yatem_sub_active = $this->get_yatem_sub_active($row->mother_national_num); 
                /********* البالغين ***********/
                $data->up_child = $this->get_bale3_full_active__SARF($id);
            
            
            
            
            
            if($data->person_id_fk == 0){
                $data->person_name =  $data->person_name;
                $data->person_card =  $data->person_national_card;
            }elseif($data->person_id_fk  !=0 and $data->type == 1){
                $data->person_name = $this->getMother_data($data->person_id_fk)['full_name'];
                $data->person_card = $this->getMother_data($data->person_id_fk)['mother_national_card_new'];

            }elseif($data->person_id_fk  !=0 and $data->type == 2){
                $data->person_name = $this->getfamily_member_data($data->person_id_fk)['member_full_name'];
                $data->person_card = $this->getfamily_member_data($data->person_id_fk)['member_card_num'];
            }
            return $data;
        }
        return false;
    }
    public function getMother_data($id){
        $h = $this->db->get_where("mother", array('id'=>$id));
        return $h->row_array();
    }
    public function getfamily_member_data($id){
        $h = $this->db->get_where("f_members", array('id'=>$id));
        return $h->row_array();
    }
    //======================   31-10-2018 =================
    public function getbasic_file_num($mother_national_num){
        $h = $this->db->get_where("basic", array('mother_national_num'=>$mother_national_num));
        return $h->row_array();
    }




 //==========================================================================================================
// أرملة ونشط كلي
    public function  get_data_armal_sum_armal_full_active_mother($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        if(!empty($condition_arr)){
        $this->db->where($condition_arr);
        }
        $this->db->where("categoriey_m",1);
        $this->db->where('halt_elmostafid_m',1);
          $this->db->where('person_type',62);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->result();
        }
        return false;
    }
    
       public function  get_armal_sum_armal_full_active_mother__Sarf($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where($condition_arr);
        $this->db->where("categoriey_m",1);
        $this->db->where('halt_elmostafid_m',1);
        $this->db->where('person_type',62);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->num_rows();
        }
        return 0;
    }
    
    
    
    //----------------------------
    public function  get_armal_sum_armal_full_active_mother($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where($condition_arr);
        $this->db->where("categoriey_m",1);
        $this->db->where('halt_elmostafid_m',1);
         $this->db->where('person_type',62);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->num_rows();
        }
        return 0;
    }
    //===========================================================
    

    
    
    public function  get_data_yatem_full_active($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        if(!empty($condition_arr)){
            $this->db->where($condition_arr);
        }
       // $this->db->where('halt_elmostafid_member',1);
         $this->db->where('persons_status',1);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->result();
        }
        return false;
    }
    //----------------------------
    public function  get_yatem_full_active($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where($condition_arr);
       // $this->db->where('halt_elmostafid_member',1);
       $this->db->where('persons_status',1);
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->num_rows();
        }
        return 0;
    }
    
      public function  get_yatem_full_active__SARF($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
       $this->db->where("categoriey_member",2);
        $this->db->where('persons_status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->num_rows();
        }
        return 0;
    }


    
    
         public function  get_bale3_full_active__SARF($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
       $this->db->where("categoriey_member",3);
        $this->db->where('persons_status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->num_rows();
        }
        return 0;
    }
    
    
    
    
    //========================================================
    public function  get_data_bale3_full_active($mother_national_num_fk ,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_member",3);
        if(!empty($condition_arr)){
            $this->db->where($condition_arr);
        }
      // $this->db->where('halt_elmostafid_member',1);
         $this->db->where('persons_status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->result();
        }
        return false;
    }
    //----------------------------
    public function  get_bale3_full_active($mother_national_num_fk,$condition_arr = array()){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_member",3);
        $this->db->where($condition_arr);
      //  $this->db->where('halt_elmostafid_member',1);
       $this->db->where('persons_status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $rowcount = $query->num_rows();
        }
        return 0;
    }
    //========================================================
    public function select_sarf_attach($sarf_num_fk){
        $this->db->select('*');
        $this->db->from("finance_sarf_order_attachments");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //========================================================
    public function insert_sarf_attach($sarf_num_fk,$images){
       if(!empty($images)){
           foreach ($images as $key=>$value){
               $data["sarf_num_fk"] = $sarf_num_fk;
               $data["attachment"] = $value;
               $data["attachment_title"] = $this->input->post("attachment_title")[$key];
               $this->db->insert("finance_sarf_order_attachments",$data);
           }
       }
    }
    //========================================================
    public  function delete_sarf_attach($id){
        $this->db->where("id",$id);
        $this->db->delete("finance_sarf_order_attachments");
    }


/***************************************************************************************/
/// طباعه النموذج

  
    public function select_main_data_sarf($id)
    {
        $this->db->select('finance_sarf_order.* ,bnod_help.title as band_name');
        $this->db->from($this->main_table);
        $this->db->join('bnod_help', 'bnod_help.id = finance_sarf_order.bnod_help_fk',"left");
        $this->db->where("sarf_num",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data =  $query->row() ;
           $data->count_sarf_member = $this->count_sarf_member($data->sarf_num);
            return $data;
        }
        return false;

    }


    public function select_from_main_data()
    {
        $this->db->select('*');
        $this->db->from('main_data');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;

    }



    public function count_sarf_member($sarf_num)
    {
        $this->db->select('*');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows() ;
        }
        return 0;

    }



/***********************************************/

public function update_amin_manager($id)
    {
        $data['amin_name'] = $this->input->post('amin_name');
        $data['manager_name'] = $this->input->post('manager_name');
        $data['naeb_name'] = $this->input->post('naeb_name');
        $this->db->where("id", $id);
        $this->db->update($this->main_table, $data);


    }
/****************************************************/
    
    public  function insert_file($file,$sarf_num){// Model_family_cashing
        $data['file_downloded'] = $file;
        $this->db->where('sarf_num',$sarf_num);
        $this->db->update('finance_sarf_order', $data);


    }
    
/*****************************************************************************************/
/********************************************************************************************/

public function get_byan_by_id($sarf_num)
{
$this->db->where('sarf_num',$sarf_num);
$query=$this->db->get('family_mahaders');
if($query->num_rows()>0)
{
//  return $query->row();
$data['ancient_sarf_num'] = $query->row()->sarf_num;
$data['sarf_num']=$this->select_last_value_fild()+1;

$data['bnod_help_fk'] = $query->row()->bnod_help_fk;

$data['sarf_date'] = $query->row()->sarf_date;
$data['sarf_date_ar'] =  $query->row()->sarf_date_ar;
$data['type_sarf'] = $query->row()->type_sarf;

$data['type_family'] = $query->row()->type_family;
$data['total_value'] = $query->row()->total_value;


$data['value_armal'] = $query->row()->value_armal;
$data['value_yatem'] = $query->row()->value_yatem;
$data['value_mostafed'] = $query->row()->value_mostafed;

//$data['method_type']   = 4;


$data['about']        = $query->row()->about;
$data['according_to'] = $this->chek_Null($query->row()->according_to);
$data['education_according_to'] = $this->chek_Null($query->row()->education_according_to);
$data['education_according_to'] = $this->chek_Null($query->row()->type_sarf);
$data['from_age_according_to'] = $this->chek_Null($query->row()->from_age_according_to);
$data['to_age_according_to'] = $this->chek_Null($query->row()->to_age_according_to);
$data['person_id_fk'] = $this->chek_Null($query->row()->person_id_fk);
$data['other_person'] = $this->chek_Null($query->row()->other_person);
$data['bank_attachment'] = $query->row()->bank_attachment;


$data['publisher'] = $query->row()->publisher;

$this->db->insert('finance_sarf_order',$data);
}
}
public function get_byan_by_id_2($sarf_num)
{
$this->db->where('sarf_num',$sarf_num);
$query=$this->db->get('family_mahaders');
    if($query->num_rows()>0)
    {
    //  return $query->row();
    $data['ancient_sarf_num'] = $query->row()->sarf_num;
    $data['sarf_num']=$this->select_last_value_fild()+1;
    
    $data['bnod_help_fk'] = $query->row()->bnod_help_fk;
    
    $data['sarf_date'] = $query->row()->sarf_date;
    $data['sarf_date_ar'] =  $query->row()->sarf_date_ar;
    $data['type_sarf'] = $query->row()->type_sarf;
    
    $data['type_family'] = $query->row()->type_family;
    $data['total_value'] = $query->row()->total_value;
    
    
    $data['value_armal'] = $query->row()->value_armal;
    $data['value_yatem'] = $query->row()->value_yatem;
    $data['value_mostafed'] = $query->row()->value_mostafed;
    
    $data['method_type']   = 4;
    $data['mon_melady']= date('m');
    //
    
    $data['about']        = $query->row()->about;
    $data['according_to'] = $this->chek_Null($query->row()->according_to);
    $data['education_according_to'] = $this->chek_Null($query->row()->education_according_to);
    $data['education_according_to'] = $this->chek_Null($query->row()->type_sarf);
    $data['from_age_according_to'] = $this->chek_Null($query->row()->from_age_according_to);
    $data['to_age_according_to'] = $this->chek_Null($query->row()->to_age_according_to);
    $data['person_id_fk'] = $this->chek_Null($query->row()->person_id_fk);
    $data['other_person'] = $this->chek_Null($query->row()->other_person);
    $data['bank_attachment'] = $query->row()->bank_attachment;
    
    
    $data['publisher'] = $query->row()->publisher;
    
    $this->db->insert('finance_sarf_order',$data);
    }
}


public function get_byan_sarf_details($sarf_num)
{
$this->db->where('sarf_num_fk',$sarf_num);
$query=$this->db->get('family_mahaders_details');
if($query->num_rows()>0) {
foreach($query->result() as $row)
{
$data["sarf_num_fk"]=$this->select_last_value_fild();
$data['mother_national_num_fk'] = $row->mother_national_num_fk;
$data['value'] = $row->value;

$data['bank_responsible_national_num'] =$row->bank_responsible_national_num;
$data['bank_account_num'] = $row->bank_account_num;
$data['bank_responsible_name'] = $row->bank_responsible_name;
$data['bank_code'] = $row->bank_code;
$data['file_num'] = $row->file_num;

$data['young_num'] = $row->young_num;

$data['adult_num'] = $row->adult_num;
$data['mother_num'] = $row->mother_num;

$this->db->insert("finance_sarf_order_details",$data);
}
}
  $data_to_lagna['send_amr_sarf'] =1;
  $this->db->where('sarf_num', $sarf_num);
  $this->db->update('family_mahaders', $data_to_lagna); 
    


}    


	
	    public function get_by_id($sarf_num)
    {
        $this->db->where("sarf_num",3);
        $query=$this->db->get('family_mahaders');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
           foreach ($query->result()as $row)
           {
               $data[$x]=$row;
               $data[$x]->member=$this->get_member($row->sarf_num);
               $data[$x]->value_money=$this->get_member_value($row->sarf_num);
               $data[$x]->lagna_member=$this->get_lagna_member($row->sarf_num);
               $data[$x]->session_num=$this->get_session_num($row->sarf_num)['session_num'];
               if( $data[$x]->session_num != 0){
                  $data[$x]->galsa_num_year=$this->get_galsa_num_year($data[$x]->session_num);
                
               }
               

           }
            return $data;
        }else{
            return false;
        }
    }
    
        public function get_member($sarf_num)
    {
        $this->db->where("sarf_num_fk",$sarf_num);
        $query=$this->db->get('family_mahaders_details');
        return $query->num_rows();
    }

    public function get_member_value($sarf_num)
    {
        $this->db->where("sarf_num_fk",$sarf_num);
        $query=$this->db->get('family_mahaders_details');
        if($query->num_rows()>0)
        {
            return $query->row()->value;
        }else{
            return 0;
        }
    }
    

/*******************/
    
    public function money_function($mother_national_num_fk){
        $mothers_data =$this->GetMotherTable($mother_national_num_fk);
       
        $count =0;
        if(!empty($mothers_data)){
             if($mothers_data['categoriey_m'] == 1  || $mothers_data['categoriey_m'] == 2 ){
              $count =  $this->sum_mosfed_in_mother($mother_national_num_fk);
             }
        }
      
          $data['member_num'] =$this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
        if($data['member_num'] == 0){
            $data['member_num'] = 1;
        }
        $total =$this->Getfamily_income_duties($mother_national_num_fk);
        $data['naseb'] =($total  / $data['member_num']  );
        $data['f2a'] =$this->GetF2a($data['naseb'] );

        return( $data['f2a']);
    } 


    /***************************************************/


    public function GetMotherTable($mother_national_num_fk){
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        return $h->row_array();
    }


    public function Getfamily_income_duties($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $income_total=0;
             $income_duties=0;
                 foreach( $query->result() as $row){
                     if($row->type ==1){
                        $income_total +=$row->value;

                     }elseif($row->type ==2){
                        $income_duties +=$row->value;
                    }

                 }
                 $total =  $income_total -$income_duties;

         return $total;
         }else{
             return 0;
         }
   
   }


    public function sum_mosfed_in_mother($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('person_type',62);
        $this->db->where('halt_elmostafid_m',1);
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $rowcount = $query->num_rows();
         }else{
             return 0;
         }
   
   }
   
   
   public function sum_mosfed_in_f_members($mother_national_num_fk){
   
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('member_person_type',62);
       $this->db->where('halt_elmostafid_member',1);
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $rowcount = $query->num_rows();
        }else{
            return 0;
        }
   } 

    public function GetF2a($value)
    {
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row()->title;

        }else{
            return 'غير محدد';
        }

    }
    
 /***************************************/
 
 /*public function getLastRecord()
    {
     // $array = array('finance_sarf_order.cashing_date>='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1);
  ////  $array = array('finance_sarf_order.cashing_date>='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1); 
     
   $array = array('finance_sarf_order.sarf_num>='=>10,'finance_sarf_order.approved'=>1010);
 
  //   $array = array('finance_sarf_order.cashing_date>='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>0);
      return $this->db->select('finance_sarf_order.*, bnod_help.title as band_name')
                      ->join('bnod_help','bnod_help.id = finance_sarf_order.bnod_help_fk',"left")
                      ->where($array)
                      ->get('finance_sarf_order')
                      ->row_array();
    }   
    */
     	 public function getLastRecord()
    {
     // $array = array('finance_sarf_order.cashing_date>='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1);
    $array = array('finance_sarf_order.cashing_date ='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1);
     
    //$array = array('finance_sarf_order.sarf_num>='=>11,'finance_sarf_order.approved'=>1);
 
  //   $array = array('finance_sarf_order.cashing_date>='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>0);
      return $this->db->select('finance_sarf_order.*, bnod_help.title as band_name')
                      ->join('bnod_help','bnod_help.id = finance_sarf_order.bnod_help_fk',"left")
                      ->where($array)
                      ->get('finance_sarf_order')
                      ->row_array();
    }   
       
  public function update_session($session_number){
     $data['show_session']=1;
     $this->db->where('session_number',$session_number);
     $this->db->update('selected_lagna_members',$data);

    }
/*******************************************************/
    public function Get_Publisher_name($sarf_num)
    {
        $this->db->where('sarf_num',$sarf_num);
        $query = $this->db->get("finance_sarf_order");
        if($query->num_rows() >0){
            return $this->getUserName($query->row()->publisher);

        }else{
            return 'غير محدد';
        }

    }



    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }



  public function get_sarf_attach($sarf_num){
        $this->db->where('sarf_num',$sarf_num);
     return $this->db->get('finance_sarf_order')->row()->file_downloded;

    }
    
 /*   public function select_finance_sarf_order(){
        $this->db->select('finance_sarf_order.* ,bnod_help.title as band_name,
        bnod_help.rkm_hesab_name,bnod_help.rkm_hesab_mostafed_name,
        bnod_help.rkm_hesab_yatem_name,bnod_help.rkm_hesab_armal_name,
          bnod_help.rkm_hesab_armal , bnod_help.rkm_hesab_yatem ,  bnod_help.rkm_hesab_mostafed ,  bnod_help.rkm_hesab');
        $this->db->from($this->main_table);
        $this->db->join('bnod_help', 'bnod_help.id = finance_sarf_order.bnod_help_fk',"left");
       $this->db->where("approved",1);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                if($row->bnod_help_fk ==1){
                    $data[$x]->mother_num_value  =$this->getFamily_numbers_value($row->sarf_num,$row->value_armal,'armal');
                    $data[$x]->young_num_value =$this->getFamily_numbers_value($row->sarf_num,$row->value_yatem,'yatem');
                    $data[$x]->adult_num_value =$this->getFamily_numbers_value($row->sarf_num,$row->value_mostafed,'mostafed');
                }
                $x++; }
            return $data ;
        }
        return false;
    }
*/
public function select_finance_sarf_order($arr){
        $this->db->select('finance_sarf_order.* ,bnod_help.title as band_name,
        bnod_help.rkm_hesab_name,bnod_help.rkm_hesab_mostafed_name,
        bnod_help.rkm_hesab_yatem_name,bnod_help.rkm_hesab_armal_name,
          bnod_help.rkm_hesab_armal , bnod_help.rkm_hesab_yatem ,  bnod_help.rkm_hesab_mostafed ,  bnod_help.rkm_hesab');
        $this->db->from($this->main_table);
        $this->db->join('bnod_help', 'bnod_help.id = finance_sarf_order.bnod_help_fk',"left");
       $this->db->where("approved",1);
       $this->db->where($arr);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                if($row->bnod_help_fk ==1){
                    $data[$x]->mother_num_value  =$this->getFamily_numbers_value_armal($row->sarf_num,$row->value_armal,'armal');
                    $data[$x]->young_num_value =$this->getFamily_numbers_value_yatem($row->sarf_num,$row->value_yatem,'yatem');
                    $data[$x]->adult_num_value =$this->getFamily_numbers_value_mostafed($row->sarf_num,$row->value_mostafed,'mostafed');
                    
                    $data[$x]->yatem_num =$this->get_yatem_num($row->sarf_num,$row->value_mostafed,'yatem');
                    $data[$x]->mostafed_num =$this->get_mostafed_num($row->sarf_num,$row->value_mostafed,'mostafed');
                    $data[$x]->armal_num =$this->get_armal_num($row->sarf_num,$row->value_mostafed,'armal');
                    
                    
                    
                    
                    
                    
                }
                $x++; }
            return $data ;
        }
        return false;
    }

    public function getFamily_numbers_value_mostafed($sarf_num,$value,$type){
      $arr =array('armal'=>'mother_num','yatem'=>'young_num','mostafed'=>'adult_num');
        $this->db->select('mother_num,young_num,adult_num');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $total=0;
            foreach ($query->result() as $row){
                $total +=$row->adult_num * $value;
                $x++;}

            return $total ;
        }else{
            return 0;
        }


    }    
    
       public function getFamily_numbers_value_yatem($sarf_num,$value,$type){
      $arr =array('armal'=>'mother_num','yatem'=>'young_num','mostafed'=>'adult_num');
        $this->db->select('mother_num,young_num,adult_num');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $total=0;
            foreach ($query->result() as $row){
                $total +=$row->young_num * $value;
                $x++;}

            return $total ;
        }else{
            return 0;
        }


    }    
   
   
    
                
       public function getFamily_numbers_value_armal($sarf_num,$value,$type){
      $arr =array('armal'=>'mother_num','yatem'=>'young_num','mostafed'=>'adult_num');
        $this->db->select('mother_num,young_num,adult_num');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $total=0;
            foreach ($query->result() as $row){
                $total +=$row->mother_num * $value;
                $x++;}

            return $total ;
        }else{
            return 0;
        }


    }    
    
    
                 
       public function get_yatem_num($sarf_num,$value,$type){
      $arr =array('armal'=>'mother_num','yatem'=>'young_num','mostafed'=>'adult_num');
        $this->db->select('mother_num,young_num,adult_num');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $total=0;
            foreach ($query->result() as $row){
                $total +=$row->young_num;
                $x++;}

            return $total ;
        }else{
            return 0;
        }


    }   
           public function get_mostafed_num($sarf_num,$value,$type){
      $arr =array('armal'=>'mother_num','yatem'=>'young_num','mostafed'=>'adult_num');
        $this->db->select('mother_num,young_num,adult_num');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $total=0;
            foreach ($query->result() as $row){
                $total +=$row->adult_num;
                $x++;}

            return $total ;
        }else{
            return 0;
        }


    }
    
            public function get_armal_num($sarf_num,$value,$type){
      $arr =array('armal'=>'mother_num','yatem'=>'young_num','mostafed'=>'adult_num');
        $this->db->select('mother_num,young_num,adult_num');
        $this->db->from('finance_sarf_order_details');
        $this->db->where("sarf_num_fk",$sarf_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $total=0;
            foreach ($query->result() as $row){
                $total +=$row->mother_num;
                $x++;}

            return $total ;
        }else{
            return 0;
        }


    }
    
    
      public function get_emp_assigns($code){
        $h = $this->db->get_where("hr_egraat_emp_setting", array('job_title_code_fk'=>$code,'person_suspend'=>1));
        return $h->row_array()['person_private_name'];
    }   
    
    
        public function get_magls_edara_assigns($mansp_fk){
        $h = $this->db->get_where("md_all_magls_edara_members", array('mansp_fk'=>$mansp_fk));
        return $h->row_array()['mem_name'];
    }     
    
    
    
      public function get_magles_edara($mansep_fk)
    {
        $magles_code = $this->db->where('suspend', 1)->get('md_all_mgales_edara')->row();
        if (!empty($magles_code)) {

            $member = $this->db->where('mgls_code', $magles_code->mg_code)
                ->where('mansp_fk', $mansep_fk)->get('md_all_magls_edara_members')->row();

            if (!empty($member)) {
                return $member->mem_name;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }    
    
}//END CLASS


