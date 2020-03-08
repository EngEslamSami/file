<?php

class Donors_t_model extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

        //===================================================insert=================================

public  function  insert($national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file){
$data['donor_type']=$this->chek_Null( $this->input->post('donor_type'));   
$data['user_name']=$this->chek_Null( $this->input->post('person_name'));
$data['password']=sha1(md5($this->chek_Null( $this->input->post('person_password'))));
$data['pay_method_id_fk']=$this->chek_Null( $this->input->post('person_pay_method_id_fk'));
$data['guaranty_mob']=$this->chek_Null( $this->input->post('person_guaranty_mob'));
$data['guaranty_email']=$this->chek_Null( $this->input->post('guaranty_email'));  
$data['nationality_id_fk']=$this->chek_Null( $this->input->post('nationality_id_fk'));
$data['gender_id_fk']=$this->chek_Null( $this->input->post('gender_id_fk'));
$data['national_id_fk']=$this->chek_Null( $this->input->post('national_id_fk'));
$data['national_type_id_fk']=$this->chek_Null( $this->input->post('national_type_id_fk'));
$data['guaranty_job']=$this->chek_Null( $this->input->post('guaranty_job'));
$data['guaranty_job_place']=$this->chek_Null( $this->input->post('guaranty_job_place'));
$data['guaranty_note']=$this->chek_Null( $this->input->post('guaranty_note'));
$data['bank_code_fk']=$this->chek_Null( $this->input->post('bank_code_fk'));
$data['activity']=$this->chek_Null( $this->input->post('activity'));
$data['bank_account_number']=$this->chek_Null( $this->input->post('bank_account_number'));
$data['national_id_img']=$national_id_file;
$data['bank_card_img']=$bank_card_file;
$data['bank_deduction_voucher_img']=$bank_deduction_voucher_file;
$data['other_img']=$other_img_file;
$data['approved']=1;
$this->db->insert('donors_t_settings',$data);
    }



    public function select(){
        $this->db->select('*');
        $this->db->from('donors_t_settings');
        $this->db->order_by('id','DESC');
        //$this->db->where('type',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }



    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('donors_t_settings');
    }

    public function getById($id){
        $h = $this->db->get_where('donors_t_settings', array('id'=>$id));
        return $h->row_array();
    }

//=======================================================
    public  function  update($id,$national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file){

       
        $data['donor_type']=$this->chek_Null( $this->input->post('donor_type'));
       
        if($this->input->post('person_pay_method_id_fk')==0){
            $data['bank_code_fk']='';

        }else{
            $data['bank_code_fk']=$this->chek_Null( $this->input->post('bank_code_fk'));

        }
     

$data['user_name']=$this->chek_Null( $this->input->post('person_name'));
$data['password']=sha1(md5($this->chek_Null( $this->input->post('person_password'))));
$data['pay_method_id_fk']=$this->chek_Null( $this->input->post('person_pay_method_id_fk'));
$data['guaranty_mob']=$this->chek_Null( $this->input->post('person_guaranty_mob'));
$data['guaranty_email']=$this->chek_Null( $this->input->post('guaranty_email'));  
$data['nationality_id_fk']=$this->chek_Null( $this->input->post('nationality_id_fk'));
$data['gender_id_fk']=$this->chek_Null( $this->input->post('gender_id_fk'));
$data['national_id_fk']=$this->chek_Null( $this->input->post('national_id_fk'));
$data['national_type_id_fk']=$this->chek_Null( $this->input->post('national_type_id_fk'));
$data['guaranty_job']=$this->chek_Null( $this->input->post('guaranty_job'));
$data['guaranty_job_place']=$this->chek_Null( $this->input->post('guaranty_job_place'));
$data['guaranty_note']=$this->chek_Null( $this->input->post('guaranty_note'));

$data['activity']=$this->chek_Null( $this->input->post('activity'));
$data['bank_account_number']=$this->chek_Null( $this->input->post('bank_account_number'));
        
        
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


        $this->db->where('id', $id);
        $this->db->update('donors_t_settings',$data);

    }
    



}