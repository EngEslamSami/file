<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_model extends CI_Model {
	public function chek_Null($post_value){
		if($post_value == '' || $post_value==null || (!isset($post_value))){
			$val='';
			return $val;
		}else{
			return $post_value;
		}
	}
	public function select_last_id(){
		$this->db->select('*');
		$this->db->from("fr_sponsor");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 0;
		}
	}


	public function GetFromEmployees_settings($type){
		$this->db->select('*');
		$this->db->from('employees_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}


	public function GetFromFr_settings($type){
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}
	public function GetFromFr_settings2($type){
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	 public function getImagesById($id){
		 $this->db->select('fr_all_attachments.*,fr_settings.*');
		 $this->db->from('fr_all_attachments');
		 $this->db->where('person_id',$id);
		 $this->db->join('fr_settings','fr_settings.id_setting=fr_all_attachments.attach_id_fk','left');
		 $query = $this->db->get();
		 if ($query->num_rows() > 0) {
			 foreach ($query->result() as $row) {
				 $data[] = $row;
			 }
			 return $data;
		 }else{
			 return false;
		 }
	 }
	public function GetFromGeneral_assembly_settings($type){
		$this->db->select('*');
		$this->db->from('general_assembly_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}

/*

	public function getById($id){
		$this->db->select('*');
		$this->db->from('fr_sponsor');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}*/
    	public function getById($id){
		$this->db->select('*');
		$this->db->from('fr_sponsor');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->kafel_status =  $this->getkafelStatusById($row->halat_kafel_id);
				$x++;
			}

			return $query->result();
		}
			return false;


	}



	public function select_all(){
		$this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor');
		$this->db->join('banks_settings','banks_settings.id=fr_sponsor.bank_id_fk','left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->Images =  $this->getImagesById($row->id);
   	        $data[$x]->kafel_status =  $this->getkafelStatusById($row->halat_kafel_id);
			$x++;}
			return $data;
		}else{
			return false;
		}

	}
	public function getkafelStatusById($id)
	{
		return $this->db->get_where('fr_kafalat_kafel_status', array('id'=>$id))->row_array();
	}

	public function insert_maindata($id,$file)
	{

		$data['fe2a_type'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type'));
		$data['k_num']  		 	   =  $this->chek_Null($this->input->post('k_num'));
		$data['k_addres']  		 	   =  $this->chek_Null($this->input->post('k_addres'));
		$data['k_name']   	   =  $this->chek_Null($this->input->post('k_name'));
		$data['k_gender_fk'] 		   =  $this->chek_Null($this->input->post('k_gender_fk'));
		$data['k_nationality_fk'] =  $this->chek_Null($this->input->post('k_nationality_fk'));
		$data['k_national_num'] 	   =  $this->chek_Null($this->input->post('k_national_num'));
		$data['k_national_type']   	   =  $this->chek_Null($this->input->post('k_national_type'));
		$data['k_national_place'] 		   =  $this->chek_Null($this->input->post('k_national_place'));
		$data['k_city']   	   =  $this->chek_Null($this->input->post('k_city'));
		$data['k_job_fk'] 		   =  $this->chek_Null($this->input->post('k_job_fk'));
		$data['k_job_place'] 		   =  $this->chek_Null($this->input->post('k_job_place'));
		$data['k_specialize_fk'] 		  	   =  $this->chek_Null($this->input->post('k_specialize_fk'));
		$data['k_barid_box'] 	   =  $this->chek_Null($this->input->post('k_barid_box'));
		$data['k_bardid_code']   	   =  $this->chek_Null($this->input->post('k_bardid_code'));
		$data['k_fax']    =  $this->chek_Null($this->input->post('k_fax'));
		$data['k_mob'] 	   =  $this->chek_Null($this->input->post('k_mob'));
		$data['k_email']   	   =  $this->chek_Null($this->input->post('k_email'));
		$data['k_activity_fk'] 		   =  $this->chek_Null($this->input->post('k_activity_fk'));
		$data['k_message_method'] 	   =  $this->chek_Null($this->input->post('k_message_method'));
		$data['k_message_mob'] 	   =  $this->chek_Null($this->input->post('k_message_mob'));
		$data['k_notes']   	   	   =  $this->chek_Null($this->input->post('k_notes'));
		$data['right_time_from']   	   	   =  $this->chek_Null($this->input->post('right_time_from'));
		$data['right_time_to']   	   	   =  $this->chek_Null($this->input->post('right_time_to'));
        
        
		$data['social_status_id_fk']   	   	   =  $this->chek_Null($this->input->post('social_status_id_fk'));
		$data['reasons_stop_id_fk']   	   	   =  $this->chek_Null($this->input->post('reasons_stop_id_fk'));
		$data['halat_kafel_id']   	   	   =  $this->chek_Null($this->input->post('halat_kafel_id'));
		$data['w_name']   	   	   =  $this->chek_Null($this->input->post('w_name'));
		$data['w_national_num']   	   	   =  $this->chek_Null($this->input->post('w_national_num'));
		$data['w_mob']   	   	   =  $this->chek_Null($this->input->post('w_mob'));
		$data['k_hai']   	   	   =  $this->chek_Null($this->input->post('k_hai'));
        
        
    $data['wakel_relationship']   	   	   =  $this->chek_Null($this->input->post('wakel_relationship'));
        
        
        
       	$data['work_id_fk']   	   	   =  $this->chek_Null($this->input->post('work_id_fk')); 
        
        
        
        
		if(!empty($file)){
			$data['person_img']   	   	   =  $file;

		}

		if(empty($id)){

			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
			$data['date_ar'] 	  	   = date('Y-m-d');
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$this->db->insert('fr_sponsor',$data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('fr_sponsor',$data);
		}



	}




	public function getf_members($id){
		$this->db->select('*');
		$this->db->from('f_members');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0];
		}else{
			return false;
		}

	}


	public function insert_Kfala_data($file,$id)
	{


		//fr_kafala_subscription

		$data['mother_national_num_fk'] 		   =  $this->chek_Null($this->input->post('mother_national_num_fk'));
		$data['kafel_id_fk'] 		   =  $this->chek_Null($this->input->post('kafel_id_fk'));
		$data['kafala_type_fk'] 		   =  $this->chek_Null($this->input->post('kafala_type_fk'));
		$data['person_type'] 		   =  $this->chek_Null($this->input->post('person_type'));
		$data['person_id_fk'] 		   =  $this->chek_Null($this->input->post('person_id_fk'));
		$data['from_date'] 		   =  $this->chek_Null($this->input->post('from_date'));
		$from_date =explode('/',$data['from_date'] 	);
		$data['from_d'] 		   =  $this->chek_Null($from_date[0]);
		$data['from_m'] 		   =  $this->chek_Null($from_date[1]);
		$data['from_y'] 		   =  $this->chek_Null($from_date[1]);

		$data['to_date'] 		   =  $this->chek_Null($this->input->post('to_date'));
		$to_date =explode('/',$data['to_date'] 	);
		$data['to_d'] 		   =  $this->chek_Null($to_date[0]);
		$data['to_m'] 		    =  $this->chek_Null($to_date[1]);
		$data['to_y'] 		   =  $this->chek_Null($to_date[1]);
		$data['kafala_now'] 		   =  0;
		$data['kafala_status'] 		   =  $this->chek_Null($this->input->post('kafala_status'));
		$data['num_days'] 		  	   =  $this->chek_Null($this->input->post('num_days'));
		$data['alert_type'] 		  	   =  $this->chek_Null($this->input->post('alert_type'));
		$data['pay_method']      =  $this->chek_Null($this->input->post('pay_method'));
		$data['bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_num'] 		  	   =  $this->chek_Null($this->input->post('bank_account_num'));



/******************************/

		$data['mostdem_from_date'] 		  	   =  $this->chek_Null($this->input->post('mostdem_from_date'));
		$data['mostdem_to_date'] 		  	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
		$data['gamia_account'] 		  	   =  $this->chek_Null($this->input->post('gamia_account'));
		$data['gamia_bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
	
    
    	$data['mostdem_img'] 		  	   =  $file ;





/******************************/
		$data['date'] 		  	   = date('Y-m-d');
		$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
		$data['date_ar'] 	  	   = date('Y-m-d');
		$data['publisher'] 	  	   = $_SESSION['user_id'];
		$this->db->insert('fr_kafala_subscription',$data);


		//f_members
		$data2['kafala_type_fk']      =  $this->chek_Null($this->input->post('kafala_type_fk'));
		$data2['kafel_id_fk'] 		  	   =  $this->chek_Null($this->input->post('kafel_id_fk'));
		if(	$data2['kafala_type_fk'] ==1){
			$data2['first_kafala_from'] 		  	   =  $this->chek_Null($data['from_date']);
			$data2['first_kafala_to'] 		  	   =  $this->chek_Null($data['to_date']);
		}elseif($data2['kafala_type_fk'] ==2){
			$f_members_data =$this->getf_members($this->input->post('person_id_fk'));
			if(!empty($f_members_data)){

				if($f_members_data->first_kafala_from == 0 && $f_members_data->first_kafala_to == 0 ){
					$data2['first_kafala_from'] 		  	   =  $this->chek_Null($data['from_date'] );
					$data2['first_kafala_to'] 		  	   =  $this->chek_Null($data['to_date'] );

				}else{
					$data2['second_kafala_from'] 		  	   =  $this->chek_Null($data['from_date'] );
					$data2['second_kafala_to'] 		  	   =  $this->chek_Null($data['to_date']);
				}
			}

		}


		$this->db->where('id', $this->input->post('person_id_fk'));
		$this->db->update('f_members',$data2);
	}

/********************************************************************************************/

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_sponsor');
		$this->db->where('person_id', $id);
		$this->db->delete('fr_all_attachments');
	}

	public function delete_attach($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_all_attachments');
	}


	public function add_attach($images){
		$attach_id_fk =$this->input->post('attach_id_fk');
	 if(!empty($images)){ for($s=0; $s<sizeof($images);$s++){
		 $data['person_id'] 		  	   =  $this->chek_Null($this->input->post('person_id'));
		 $data['attach_id_fk'] 		  	   =  $this->chek_Null($attach_id_fk[$s]);
		 $data['img'] 		  	           =  $this->chek_Null($images[$s]);
		 $data['type'] 	  	               = 1;
		 $this->db->insert('fr_all_attachments',$data);
	 }
	 }
	}



	/*********************************************************/


	public function getMembers($where = false)
	{
	/*	$full =$this->FullKafalaArray();
		$half =$this->FullKafalaArray();*/
		//$condition =array('f_members.')
	  $query =$this->db->select('f_members.*,
			basic.file_num, 
			father.full_name AS father_name')
			->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk',"LEFT")
			->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"LEFT")
			->where('basic.final_suspend',4)
			->where('basic.deleted',0)
            ->where('f_members.persons_status',1)
			->where($where)
			/*->where_not_in('f_members.id', $full)
			->where_not_in('f_members.id', $half)*/
			->order_by("basic.file_num","ASC")
			->get('f_members');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row){

				$data[] =  $row;
			}
			 return$data;
		}else{
			return 0;
		}


	}
    
    
    public function getBanks($acc= false){
    $this->db->select('*');
    $this->db->from('society_main_banks_account');
    $this->db->where('account_id_fk',$acc);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data[] =  $this->GetBanksDetails($row->bank_id_fk);
        }
        return $data;
    }else{
        return false;
    }

}


public function GetBanksDetails($bank_id){
    $this->db->select('*');
    $this->db->from('banks_settings');
    $this->db->where('id',$bank_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result()[0];
    }else{
        return false;
    }
}

	public function select_banks_accounts(){
		$this->db->select('*');
		$this->db->from('society_main_banks_account');
		$this->db->where('type',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$x++;}
			return $data;
		}else{
			return false;
		}

	}




	public function GetBankAccount($arr){
		$this->db->select('id,account_num,bank_id_fk,account_id_fk');
		$this->db->from('society_main_banks_account');
		$this->db->where($arr);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$data[] =  $row;
			}
			return $data;
		}else{
			return false;
		}

	}

}

