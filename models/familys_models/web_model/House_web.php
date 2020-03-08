<?php

class House_web extends CI_Model
{
   public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
 public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
//---------------------------------------------------
    public  function  insert($mother_national_num){
        $data['mother_national_num_fk']=$this->chek_Null($mother_national_num);
        $data['h_electricity_account']=$this->chek_Null( $this->input->post('h_electricity_account'));
        $data['h_health_number']=$this->chek_Null( $this->input->post('h_health_number'));
        $data['h_area_id_fk']=$this->chek_Null( $this->input->post('h_area_id_fk'));
        $data['h_city_id_fk']=$this->chek_Null( $this->input->post('h_city_id_fk'));
        $data['h_center_id_fk']=$this->chek_Null( $this->input->post('h_center_id_fk'));
        $data['h_village_id_fk']=$this->chek_Null( $this->input->post('h_village_id_fk'));
        $data['hai_name']=$this->chek_Null( $this->input->post('hai_name'));
        $data['h_street']=$this->chek_Null( $this->input->post('h_street'));
       // $data['map']=$this->chek_Null( $this->input->post('map'));
        
        $data['house_google_lat']=$this->chek_Null( $this->input->post('house_google_lat'));
        $data['house_google_lng']=$this->chek_Null( $this->input->post('house_google_lng'));
        
        $data['h_mosque']=$this->chek_Null( $this->input->post('h_mosque'));
        $data['h_nearest_school']=$this->chek_Null( $this->input->post('h_nearest_school'));
        $data['h_nearest_teacher']=$this->chek_Null( $this->input->post('h_nearest_teacher'));
        $data['h_house_type_id_fk']=$this->chek_Null( $this->input->post('h_house_type_id_fk'));
        $data['h_house_owner_id_fk']=$this->chek_Null( $this->input->post('h_house_owner_id_fk'));
        $data['h_house_color']=$this->chek_Null( $this->input->post('h_house_color'));
        $data['h_rent_amount']=$this->chek_Null($this->input->post('h_rent_amount'));
        $data['h_rooms_account']=$this->chek_Null( $this->input->post('h_rooms_account'));
        $data['h_bath_rooms_account']=$this->chek_Null( $this->input->post('h_bath_rooms_account'));
        $data['h_borrow_from_bank']=$this->chek_Null( $this->input->post('h_borrow_from_bank'));
        $data['h_borrow_remain']=$this->chek_Null( $this->input->post('h_borrow_remain'));
        $data['h_house_area']=$this->chek_Null( $this->input->post('h_house_area'));
        $data['h_house_direction']=$this->chek_Null( $this->input->post('h_house_direction'));
        $data['h_loan_restoration']=$this->chek_Null( $this->input->post('h_loan_restoration'));
        $data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        $data['h_house_status_id_fk']=$this->chek_Null( $this->input->post('h_house_status_id_fk'));
        $data['h_house_size']=$this->chek_Null( $this->input->post('h_house_size'));
        
        //======================================================
        
                /***********************ahmed*/
        $data['h_water_account']=$this->chek_Null( $this->input->post('h_water_account'));
        $data['h_renter_name']=$this->chek_Null( $this->input->post('h_renter_name'));
        $data['h_renter_mob']=$this->chek_Null( $this->input->post('h_renter_mob'));
        $data['contract_start_date']=$this->chek_Null( $this->input->post('contract_start_date'));
        $data['contract_end_date']=$this->chek_Null( $this->input->post('contract_end_date'));



        /***********************ahmed*/
        
        
        $this->db->insert('houses',$data);
    }




    //=======================================================================

  public function getById($id){
        $h = $this->db->get_where('houses', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }

  
 public function update($id){

        $data['h_electricity_account']=$this->chek_Null( $this->input->post('h_electricity_account'));
        $data['h_health_number']=$this->chek_Null( $this->input->post('h_health_number'));


        $data['h_area_id_fk']=$this->chek_Null( $this->input->post('h_area_id_fk'));
        $data['h_city_id_fk']=$this->chek_Null( $this->input->post('h_city_id_fk'));
        $data['h_center_id_fk']=$this->chek_Null( $this->input->post('h_center_id_fk'));
        $data['h_village_id_fk']=$this->chek_Null( $this->input->post('h_village_id_fk'));


        $data['house_google_lat']=$this->chek_Null( $this->input->post('house_google_lat'));
        $data['house_google_lng']=$this->chek_Null( $this->input->post('house_google_lng'));


        $data['h_street']=$this->chek_Null( $this->input->post('h_street'));
        $data['h_mosque']=$this->chek_Null( $this->input->post('h_mosque'));
        $data['hai_name']=$this->chek_Null( $this->input->post('hai_name'));
       // $data['map']=$this->chek_Null( $this->input->post('map'));
        $data['h_nearest_school']=$this->chek_Null( $this->input->post('h_nearest_school'));
        $data['h_nearest_teacher']=$this->chek_Null( $this->input->post('h_nearest_teacher'));
        $data['h_house_type_id_fk']=$this->chek_Null( $this->input->post('h_house_type_id_fk'));
        $data['h_house_owner_id_fk']=$this->chek_Null( $this->input->post('h_house_owner_id_fk'));
        $data['h_house_color']=$this->chek_Null( $this->input->post('h_house_color'));
        $data['h_rent_amount']=$this->chek_Null($this->input->post('h_rent_amount'));
        $data['h_rooms_account']=$this->chek_Null( $this->input->post('h_rooms_account'));
        $data['h_bath_rooms_account']=$this->chek_Null( $this->input->post('h_bath_rooms_account'));
        $data['h_borrow_from_bank']=$this->chek_Null( $this->input->post('h_borrow_from_bank'));
        $data['h_borrow_remain']=$this->chek_Null( $this->input->post('h_borrow_remain'));
        $data['h_house_area']=$this->chek_Null( $this->input->post('h_house_area'));
        $data['h_house_direction']=$this->chek_Null( $this->input->post('h_house_direction'));
        $data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        $data['h_house_size']=$this->chek_Null( $this->input->post('h_house_size'));
        $data['h_house_status_id_fk']=$this->chek_Null( $this->input->post('h_house_status_id_fk'));
        /***********************ahmed*/
        $data['h_water_account']=$this->chek_Null( $this->input->post('h_water_account'));
        $data['h_renter_name']=$this->chek_Null( $this->input->post('h_renter_name'));
        $data['h_renter_mob']=$this->chek_Null( $this->input->post('h_renter_mob'));
        $data['contract_start_date']=$this->chek_Null( $this->input->post('contract_start_date'));
        $data['contract_end_date']=$this->chek_Null( $this->input->post('contract_end_date'));
        //===========================
        $data['h_borrow_remain']=$this->chek_Null($this->input->post('h_borrow_remain'));
        $data['h_loan_restoration']=$this->chek_Null($this->input->post('h_loan_restoration'));

        $data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        //====================================



        /***********************ahmed*/
/*
        if($this->input->post('h_loan_restoration')==0){
            $data['h_loan_restoration_remain']=0;
        }else{$data['h_loan_restoration_remain']=$this->chek_Null($this->input->post('h_loan_restoration_remain'));
        }
        if($this->input->post('h_borrow_from_bank')==0){
            $data['h_borrow_remain']=0;
        }else{$data['h_borrow_remain']=$this->chek_Null($this->input->post('h_borrow_remain'));
        }
        */
        $this->db->where('mother_national_num_fk', $id);
        if($this->db->update('houses',$data)) {
            return true;
        }else{
            return false;
        }
    }


}// END CLASS

