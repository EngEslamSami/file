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
		$this->db->from(' fr_settings');
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

	}



	public function select_all(){
		$this->db->select('*');
		$this->db->from('fr_sponsor');
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


	public function insert($id)
	{


		$k_type_arr =array('k_yatem_full'=>'كفالة شاملة','k_yatem_half'=>'نصف كفالة','k_mostafed'=>'كفالة مستفيد','k_armal'=>'كفالة أرملة');

			 foreach ($k_type_arr as $key =>$value){
				 if($this->input->post($key) == 1){
					 $data[$key]  =	 $this->input->post($key);
				 }else{
					 $data[$key]  =0;

				 }

			 }

		$data['fe2a_type'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type'));
		$data['k_num']  		 	   =  $this->chek_Null($this->input->post('k_num'));
		$data['k_status'] 		   =  $this->chek_Null($this->input->post('k_status'));
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
		$data['pay_method']      =  $this->chek_Null($this->input->post('pay_method'));
		$data['bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_num'] 		  	   =  $this->chek_Null($this->input->post('bank_account_num'));
		$data['bank_branch'] 		  	   =  $this->chek_Null($this->input->post('bank_branch'));
		$data['num_days'] 		  	   =  $this->chek_Null($this->input->post('num_days'));
		$data['alert_type'] 		  	   =  $this->chek_Null($this->input->post('alert_type'));
		$data['start_kfala_date'] 		  	   =  $this->chek_Null($this->input->post('start_kfala_date'));
		$data['k_notes'] 		  	   =  $this->chek_Null($this->input->post('k_notes'));



           $data['wakala_type']   	   	   =  $this->chek_Null($this->input->post('wakala_type'));
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





/********************************************************************************************/

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_sponsor');
	}



               public function get_fe2a_by_id($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get('fr_sponser_donors_setting');
		if($query->num_rows()>0)
		{
			return $query->row()->specialize_fk;
		}else{
			return 0 ;
		}
	}

}

