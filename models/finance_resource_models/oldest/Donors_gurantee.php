<?php

class Donors_gurantee extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert($national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file){

       $data['donor_type']=$this->chek_Null( $this->input->post('donor_type'));
        if($data['donor_type'] ==1){
            $data['user_name']=$this->chek_Null( $this->input->post('person_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('person_password'))));
               $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('person_pay_method_id_fk'));
                    $data['guaranty_mob']=$this->chek_Null( $this->input->post('person_guaranty_mob'));
        $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('person_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('guaranty_name'));
               $data['guaranty_email']=$this->chek_Null( $this->input->post('guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('person_guaranty_city'));
        }elseif ($data['donor_type'] ==2){
            $data['user_name']=$this->chek_Null( $this->input->post('corporation_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('corporation_password'))));
            $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('corporation_pay_method_id_fk'));
                    $data['guaranty_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_mob'));
        $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('corporation_guaranty_name'));
               $data['guaranty_email']=$this->chek_Null( $this->input->post('corporation_guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('corporation_guaranty_city'));
        }
        $data['character_person']=$this->chek_Null( $this->input->post('character_person'));
        $data['donor_mediator_name']=$this->chek_Null( $this->input->post('donor_mediator_name'));
        $data['donor_mediator_status']=$this->chek_Null( $this->input->post('donor_mediator_status'));
        $data['family_name']=$this->chek_Null( $this->input->post('family_name'));
        $data['grand_father_name']=$this->chek_Null( $this->input->post('grand_father_name'));
        $data['nationality_id_fk']=$this->chek_Null( $this->input->post('nationality_id_fk'));
        $data['gender_id_fk']=$this->chek_Null( $this->input->post('gender_id_fk'));
        $data['national_id_fk']=$this->chek_Null( $this->input->post('national_id_fk'));
        $data['national_type_id_fk']=$this->chek_Null( $this->input->post('national_type_id_fk'));

        $data['guaranty_date']=$this->chek_Null( strtotime($this->input->post('guaranty_date')));
        $data['guaranty_status']=$this->chek_Null( $this->input->post('guaranty_status'));
        $data['guaranty_job']=$this->chek_Null( $this->input->post('guaranty_job'));
        $data['guaranty_job_place']=$this->chek_Null( $this->input->post('guaranty_job_place'));



        $data['guaranty_note']=$this->chek_Null( $this->input->post('guaranty_note'));

        $data['bank_code_fk']=$this->chek_Null( $this->input->post('bank_code_fk'));
        $data['bank_account_number']=$this->chek_Null( $this->input->post('bank_account_number'));
        $data['bank_account_another_number']=$this->chek_Null( $this->input->post('bank_account_another_number'));

        $data['bank_account_person_name']=$this->chek_Null( $this->input->post('bank_account_person_name'));
        $data['membership_number']=$this->chek_Null( $this->input->post('membership_number'));
        //img
        $data['national_id_img']=$national_id_file;
        $data['bank_card_img']=$bank_card_file;
        $data['bank_deduction_voucher_img']=$bank_deduction_voucher_file;
        $data['other_img']=$other_img_file;
        //img
        $data['permit_number']=$this->chek_Null( $this->input->post('permit_number'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['box_number']=$this->chek_Null( $this->input->post('box_number'));
        $data['postal_code']=$this->chek_Null( $this->input->post('postal_code'));
        $data['transformation']=$this->chek_Null( $this->input->post('transformation'));
        $data['fax_number']=$this->chek_Null( $this->input->post('fax_number'));
        $data['organization_web_site']=$this->chek_Null( $this->input->post('organization_web_site'));
        $data['projects']=$this->chek_Null( $this->input->post('projects'));
        $data['condition_support']=$this->chek_Null( $this->input->post('condition_support'));

        $data['guaranty_type']=$this->chek_Null( $this->input->post('guaranty_type'));
        $data['guaranty_start']=strtotime( $this->input->post('guaranty_start'));
        $data['guaranty_end']=strtotime( $this->input->post('guaranty_end'));
        $data['type']= $this->input->post('type');
        
          $data['num_payments']= $this->input->post('num_payments');
          $data['num_of_aytam']= $this->input->post('num_of_aytam');
          $data['need_paid']= $this->input->post('need_paid');
          
          
          

        $this->db->insert('donors_t',$data);
    }

    //=======================================================
    public  function  update($id,$national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file){

        $data['donor_type']=$this->chek_Null( $this->input->post('donor_type'));
        if($data['donor_type'] ==1){
            $data['user_name']=$this->chek_Null( $this->input->post('person_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('person_password'))));
            $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('person_pay_method_id_fk'));
            $data['guaranty_mob']=$this->chek_Null( $this->input->post('person_guaranty_mob'));
            $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('person_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('guaranty_name'));
            $data['guaranty_email']=$this->chek_Null( $this->input->post('guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('person_guaranty_city'));
        }elseif ($data['donor_type'] ==2){
            $data['user_name']=$this->chek_Null( $this->input->post('corporation_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('corporation_password'))));
            $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('corporation_pay_method_id_fk'));
            $data['guaranty_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_mob'));
            $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('corporation_guaranty_name'));
            $data['guaranty_email']=$this->chek_Null( $this->input->post('corporation_guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('corporation_guaranty_city'));
        }

        if($this->input->post('person_pay_method_id_fk')==1){
            $data['bank_code_fk']='';

        }else{
            $data['bank_code_fk']=$this->chek_Null( $this->input->post('bank_code_fk'));

        }
     
        if($this->input->post('type')==2){
            $data['guaranty_start']='';
            $data['guaranty_end']='';
            $data['guaranty_date']='';
            $data['guaranty_type']='';
            $data['num_payments']= '';
            $data['num_of_aytam']= '';
            $data['need_paid']= '';
            
            
            

        }else{
            $data['guaranty_start']=strtotime( $this->input->post('guaranty_start'));
            $data['guaranty_end']=strtotime( $this->input->post('guaranty_end'));
            $data['guaranty_date']=strtotime($this->input->post('guaranty_date'));
            $data['guaranty_type']=$this->chek_Null( $this->input->post('guaranty_type'));
            $data['num_payments']= $this->input->post('num_payments');
 
 $data['num_of_aytam']= $this->input->post('num_of_aytam');
 $data['need_paid']= $this->input->post('need_paid');


        }
        
        
        $data['character_person']=$this->chek_Null( $this->input->post('character_person'));
        $data['donor_mediator_name']=$this->chek_Null( $this->input->post('donor_mediator_name'));
        $data['donor_mediator_status']=$this->chek_Null( $this->input->post('donor_mediator_status'));
        $data['family_name']=$this->chek_Null( $this->input->post('family_name'));
        $data['grand_father_name']=$this->chek_Null( $this->input->post('grand_father_name'));
        $data['nationality_id_fk']=$this->chek_Null( $this->input->post('nationality_id_fk'));
        $data['gender_id_fk']=$this->chek_Null( $this->input->post('gender_id_fk'));
        $data['national_id_fk']=$this->chek_Null( $this->input->post('national_id_fk'));
        $data['national_type_id_fk']=$this->chek_Null( $this->input->post('national_type_id_fk'));

        $data['guaranty_status']=$this->chek_Null( $this->input->post('guaranty_status'));
        $data['guaranty_job']=$this->chek_Null( $this->input->post('guaranty_job'));
        $data['guaranty_job_place']=$this->chek_Null( $this->input->post('guaranty_job_place'));
        $data['type']= $this->input->post('type');


        $data['guaranty_note']=$this->chek_Null( $this->input->post('guaranty_note'));

        $data['bank_account_number']=$this->chek_Null( $this->input->post('bank_account_number'));
        $data['bank_account_another_number']=$this->chek_Null( $this->input->post('bank_account_another_number'));

        $data['bank_account_person_name']=$this->chek_Null( $this->input->post('bank_account_person_name'));
        $data['membership_number']=$this->chek_Null( $this->input->post('membership_number'));
        //img
        if($national_id_file != ''){
            $data['national_id_img']=$national_id_file ;
        }
        if($bank_card_file != ''){
            $data['bank_card_img']=$bank_card_file ;
        }
        if($bank_deduction_voucher_file != ''){
            $data['bank_deduction_voucher_img']=$bank_deduction_voucher_file ;
        }
        if($other_img_file != ''){
            $data['other_img']=$other_img_file ;
        }

        //img
        $data['permit_number']=$this->chek_Null( $this->input->post('permit_number'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['box_number']=$this->chek_Null( $this->input->post('box_number'));
        $data['postal_code']=$this->chek_Null( $this->input->post('postal_code'));
        $data['transformation']=$this->chek_Null( $this->input->post('transformation'));
        $data['fax_number']=$this->chek_Null( $this->input->post('fax_number'));
        $data['organization_web_site']=$this->chek_Null( $this->input->post('organization_web_site'));
        $data['projects']=$this->chek_Null( $this->input->post('projects'));
        $data['condition_support']=$this->chek_Null( $this->input->post('condition_support'));
        $this->db->where('id', $id);
        $this->db->update('donors_t',$data);

    }
    
    
    
    
    
    
    
    
      public function select(){

        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
 /****************/
 
 
 
    
    public function R_current_donors($status){
        $current_date = strtotime(date("Y-m-d"));
        if($status == 0)
            $query = $this->db->query('SELECT donors_t.*, (SELECT COUNT(*) FROM programs_to WHERE programs_to.donor_id = donors_t.id) AS TOT, (SELECT COUNT(*) FROM participation_money WHERE participation_money.donor_id = donors_t.id) AS pay, (SELECT date FROM participation_money WHERE participation_money.donor_id = donors_t.id ORDER BY participation_money.id DESC LIMIT 1) AS DAT FROM donors_t WHERE donors_t.guaranty_end >= '.$current_date.' AND donors_t.type = 1');
        else
            $query = $this->db->query('SELECT donors_t.*, (SELECT COUNT(*) FROM programs_to WHERE programs_to.donor_id = donors_t.id) AS TOT, (SELECT COUNT(*) FROM participation_money WHERE participation_money.donor_id = donors_t.id) AS pay, (SELECT date FROM participation_money WHERE participation_money.donor_id = donors_t.id ORDER BY participation_money.id DESC LIMIT 1) AS DAT FROM donors_t WHERE donors_t.guaranty_end < '.$current_date.' AND donors_t.type = 1');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function R_payment_period($date_from, $date_to, $donor){
        $date_from = strtotime($date_from);
        $date_to = strtotime($date_to);
        if($donor == 'all')
            $query = $this->db->query('SELECT donors_t.*, (SELECT COUNT(*) FROM programs_to WHERE programs_to.donor_id = donors_t.id) AS TOT, (SELECT COUNT(*) FROM participation_money WHERE participation_money.donor_id = donors_t.id) AS pay, (SELECT date FROM participation_money WHERE participation_money.donor_id = donors_t.id ORDER BY participation_money.id DESC LIMIT 1) AS DAT FROM donors_t WHERE ('.$date_from.' BETWEEN donors_t.guaranty_start AND donors_t.guaranty_end OR '.$date_to.' BETWEEN donors_t.guaranty_start AND donors_t.guaranty_end) AND donors_t.type = 1');
        else{
            $query = $this->db->query('SELECT donors_t.*, (SELECT COUNT(*) FROM programs_to WHERE programs_to.donor_id = donors_t.id) AS TOT, (SELECT COUNT(*) FROM participation_money WHERE participation_money.donor_id = donors_t.id) AS pay, (SELECT date FROM participation_money WHERE participation_money.donor_id = donors_t.id ORDER BY participation_money.id DESC LIMIT 1) AS DAT FROM donors_t WHERE ('.$date_from.' BETWEEN donors_t.guaranty_start AND donors_t.guaranty_end OR '.$date_to.' BETWEEN donors_t.guaranty_start AND donors_t.guaranty_end) AND donors_t.id = '.$donor.'');
            $query2 = $this->db->query('SELECT * FROM participation_money WHERE donor_id = '.$donor.'');
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            $data2 = null;
            if (isset($query2) && $query2->num_rows() > 0) {
                foreach ($query2->result() as $row2) {
                    $data2[] = $row2;
                }
            }
            return array($data,$data2);
        }
        return false;
    }   
    
    
    
    /************************/
    
    public function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('donors_t');

}

    
    
    
    /************************/
    
    
    
    
    
    
}

