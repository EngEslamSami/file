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
		$this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor');
		$this->db->join('banks_settings','banks_settings.id=fr_sponsor.bank_id_fk','left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->Images =  $this->getImagesById($row->id);
			$x++;}
			return $data;
		}else{
			return false;
		}

	}


	public function insert_maindata($id)
	{


		$k_type_arr =array('k_yatem_full'=>'كفالة شاملة','k_yatem_half'=>'نصف كفالة','k_mostafed'=>'كفالة مستفيد','k_armal'=>'كفالة أرملة');

			 foreach ($k_type_arr as $key =>$value){
				 if($this->input->post($key) == 1){
					 $data[$key]  =	 $this->input->post($key);
				 }else{
					 $data[$key]  =0;

				 }

			 }
		
		$data['k_status'] 		   =  $this->chek_Null($this->input->post('k_status'));
		$data['start_kfala_date'] 		  	   =  $this->chek_Null($this->input->post('start_kfala_date'));
		$data['num_days'] 		  	   =  $this->chek_Null($this->input->post('num_days'));
		$data['num'] 		  	   =  $this->chek_Null($this->input->post('num'));
		$data['alert_type'] 		  	   =  $this->chek_Null($this->input->post('alert_type'));
		$data['pay_method']      =  $this->chek_Null($this->input->post('pay_method'));
		$data['bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_num'] 		  	   =  $this->chek_Null($this->input->post('bank_account_num'));
		$data['bank_branch'] 		  	   =  $this->chek_Null($this->input->post('bank_branch'));


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

}

