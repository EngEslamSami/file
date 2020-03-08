<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor_model extends CI_Model {
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
		$this->db->from("fr_donor");
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
		$this->db->from('fr_donor');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->donor_status =  $this->getdonorStatusById($row->halat_donor_id);
				$x++;
			}

			return $query->result();
		}
			return false;


	}

	public function select_all(){
		$this->db->select('fr_donor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_donor');
		$this->db->join('banks_settings','banks_settings.id=fr_donor.bank_id_fk','left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->Images =  $this->getImagesById($row->id);
   	        $data[$x]->donor_status =  $this->getdonorStatusById($row->halat_donor_id);
			$x++;}
			return $data;
		}else{
			return false;
		}

	}
	public function getdonorStatusById($id)
	{
		return $this->db->get_where('fr_kafalat_kafel_status', array('id'=>$id))->row_array();
	}

/*	public function insert_maindata($id,$file)
	{

		$data['fe2a_type'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type'));
		$data['d_num']  		 	   =  $this->chek_Null($this->input->post('d_num'));
		$data['d_addres']  		 	   =  $this->chek_Null($this->input->post('d_addres'));
		$data['d_name']   	   =  $this->chek_Null($this->input->post('d_name'));
		$data['d_gender_fk'] 		   =  $this->chek_Null($this->input->post('d_gender_fk'));
		$data['d_nationality_fk'] =  $this->chek_Null($this->input->post('d_nationality_fk'));
		$data['d_national_num'] 	   =  $this->chek_Null($this->input->post('d_national_num'));
		$data['d_national_type']   	   =  $this->chek_Null($this->input->post('d_national_type'));
		$data['d_national_place'] 		   =  $this->chek_Null($this->input->post('d_national_place'));
		$data['d_city']   	   =  $this->chek_Null($this->input->post('d_city'));
		$data['d_job_fk'] 		   =  $this->chek_Null($this->input->post('d_job_fk'));
		$data['d_job_place'] 		   =  $this->chek_Null($this->input->post('d_job_place'));
		$data['d_specialize_fk'] 		  	   =  $this->chek_Null($this->input->post('d_specialize_fk'));
		$data['d_barid_box'] 	   =  $this->chek_Null($this->input->post('d_barid_box'));
		$data['d_bardid_code']   	   =  $this->chek_Null($this->input->post('d_bardid_code'));
		$data['d_fax']    =  $this->chek_Null($this->input->post('d_fax'));
		$data['d_mob'] 	   =  $this->chek_Null($this->input->post('d_mob'));
		$data['d_email']   	   =  $this->chek_Null($this->input->post('d_email'));
		$data['d_activity_fk'] 		   =  $this->chek_Null($this->input->post('d_activity_fk'));
		$data['d_message_method'] 	   =  $this->chek_Null($this->input->post('d_message_method'));
		$data['d_message_mob'] 	   =  $this->chek_Null($this->input->post('d_message_mob'));
		$data['d_notes']   	   	   =  $this->chek_Null($this->input->post('d_notes'));
		$data['right_time_from']   	   	   =  $this->chek_Null($this->input->post('right_time_from'));
		$data['right_time_to']   	   	   =  $this->chek_Null($this->input->post('right_time_to'));
        
        
		$data['social_status_id_fk']   	   	   =  $this->chek_Null($this->input->post('social_status_id_fk'));
		$data['reasons_stop_id_fk']   	   	   =  $this->chek_Null($this->input->post('reasons_stop_id_fk'));
		$data['halat_donor_id']   	   	   =  $this->chek_Null($this->input->post('halat_donor_id'));
		$data['w_name']   	   	   =  $this->chek_Null($this->input->post('w_name'));
		$data['w_national_num']   	   	   =  $this->chek_Null($this->input->post('w_national_num'));
		$data['w_mob']   	   	   =  $this->chek_Null($this->input->post('w_mob'));
		$data['d_hai']   	   	   =  $this->chek_Null($this->input->post('d_hai'));
        
        
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
			$this->db->insert('fr_donor',$data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('fr_donor',$data);
		}



	}
*/
	public function insert_maindata($id,$file)
	{

		$data['fe2a_type'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type'));
		$data['d_num']  		 	   =  $this->chek_Null($this->input->post('d_num'));
		$data['d_addres']  		 	   =  $this->chek_Null($this->input->post('d_addres'));
		$data['d_name']   	   =  $this->chek_Null($this->input->post('d_name'));
		$data['d_gender_fk'] 		   =  $this->chek_Null($this->input->post('d_gender_fk'));
		$data['d_nationality_fk'] =  $this->chek_Null($this->input->post('d_nationality_fk'));
		$data['d_national_num'] 	   =  $this->chek_Null($this->input->post('d_national_num'));
		$data['d_national_type']   	   =  $this->chek_Null($this->input->post('d_national_type'));
		$data['d_national_place'] 		   =  $this->chek_Null($this->input->post('d_national_place'));
		$data['d_city']   	   =  $this->chek_Null($this->input->post('city_id_fk'));
		$data['d_job_fk'] 		   =  $this->chek_Null($this->input->post('d_job_fk'));
		$data['d_job_place'] 		   =  $this->chek_Null($this->input->post('d_job_place'));
		$data['d_specialize_fk'] 		  	   =  $this->chek_Null($this->input->post('d_specialize_fk'));
		$data['d_barid_box'] 	   =  $this->chek_Null($this->input->post('d_barid_box'));
		$data['d_bardid_code']   	   =  $this->chek_Null($this->input->post('d_bardid_code'));
		$data['d_fax']    =  $this->chek_Null($this->input->post('d_fax'));
		$data['d_mob'] 	   =  $this->chek_Null($this->input->post('d_mob'));
		$data['d_email']   	   =  $this->chek_Null($this->input->post('d_email'));
		$data['d_activity_fk'] 		   =  $this->chek_Null($this->input->post('d_activity_fk'));
		$data['d_message_method'] 	   =  $this->chek_Null($this->input->post('d_message_method'));
		$data['d_message_mob'] 	   =  $this->chek_Null($this->input->post('d_message_mob'));
		$data['d_notes']   	   	   =  $this->chek_Null($this->input->post('d_notes'));
		$data['right_time_from']   	   	   =  $this->chek_Null($this->input->post('right_time_from'));
		$data['right_time_to']   	   	   =  $this->chek_Null($this->input->post('right_time_to'));
        
        
		$data['social_status_id_fk']   	   	   =  $this->chek_Null($this->input->post('social_status_id_fk'));
		$data['reasons_stop_id_fk']   	   	   =  $this->chek_Null($this->input->post('reasons_stop_id_fk'));
		$data['halat_donor_id']   	   	   =  $this->chek_Null($this->input->post('halat_donor_id'));
		$data['w_name']   	   	   =  $this->chek_Null($this->input->post('w_name'));
		$data['w_national_num']   	   	   =  $this->chek_Null($this->input->post('w_national_num'));
		$data['w_mob']   	   	   =  $this->chek_Null($this->input->post('w_mob'));
		$data['d_hai']   	   	   =  $this->chek_Null($this->input->post('hai_id_fk'));
        
        
    $data['wakel_relationship']   	   	   =  $this->chek_Null($this->input->post('wakel_relationship'));
        
	$data['wakala_type']   	   	   =  $this->chek_Null($this->input->post('wakala_type'));
        
       	$data['work_id_fk']   	   	   =  $this->chek_Null($this->input->post('work_id_fk')); 
        
        
        
        
		if(!empty($file)){
			$data['person_img']   	   	   =  $file;

		}

		if(empty($id)){

			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
			$data['date_ar'] 	  	   = date('Y-m-d');
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$this->db->insert('fr_donor',$data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('fr_donor',$data);
		}



	}

	public function get_city_name($id)
    {  $this->db->select('name,id');
        $this->db->where('id',$id);
        $query= $this->db->get('cities');
        return $query->row()->name;
    }

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_donor');
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
		 $data['type'] 	  	               = 2;
		 $this->db->insert('fr_all_attachments',$data);
	 }
	 }
	}
/*********************************************************************************************/


 public function insert_tabro3($id,$img)
{
	if(!empty($img))
	{
		$data['	mostdem_img']=$img;
	}
	$data['tabro3_type']=$this->input->post('tabro3_type');
	$data['value']=$this->input->post('value');
	$data['pay_method']=$this->input->post('pay_method');
	$data['d_bank_id_fk']=$this->input->post('d_bank_id_fk');
	$data['d_bank_account']=$this->input->post('d_bank_account');
	$data['mostdem_from_date']=$this->input->post('mostdem_from_date');
	$data['mostdem_to_date']=$this->input->post('mostdem_to_date');
	$data['gamia_account']=$this->input->post('gamia_account');
	$data['gamia_bank_id_fk']=$this->input->post('gamia_bank_id_fk');
	$data['gamia_account']=$this->input->post('gamia_account');
	$data['gamia_bank_account_num']=$this->input->post('gamia_bank_account_num');

		$data['tabro3_status']=$this->input->post('tabro3_status');
	$data['alert_type']=$this->input->post('alert_type');


   $data['donor_id_fk']=$id;
	
	$this->db->insert('fr_donors_tabra3at',$data);
}
	public function get_by_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('fr_donors_tabra3at');
		if ($query->num_rows() > 0) {

			return $query->row();
		}
		return false;
	}


public function update_tabro3($id,$img)
{
	if(!empty($img))
	{
		$data['	mostdem_img']=$img;
	}
	$data['tabro3_type']=$this->input->post('tabro3_type');
	$data['value']=$this->input->post('value');
	$data['pay_method']=$this->input->post('pay_method');
	$data['d_bank_id_fk']=$this->input->post('d_bank_id_fk');
	$data['d_bank_account']=$this->input->post('d_bank_account');
	$data['mostdem_from_date']=$this->input->post('mostdem_from_date');
	$data['mostdem_to_date']=$this->input->post('mostdem_to_date');
	$data['gamia_account']=$this->input->post('gamia_account');
	$data['gamia_bank_id_fk']=$this->input->post('gamia_bank_id_fk');
	$data['gamia_account']=$this->input->post('gamia_account');
	$data['gamia_bank_account_num']=$this->input->post('gamia_bank_account_num');

	$data['tabro3_status']=$this->input->post('tabro3_status');
	$data['alert_type']=$this->input->post('alert_type');


	$data['donor_id_fk']=$id;
	$this->db->where('donor_id_fk',$id);

	$this->db->update('fr_donors_tabra3at',$data);
}
public function get_all($id)
{
	$this->db->where('donor_id_fk',$id);
	$query= $this->db->get('fr_donors_tabra3at');
	$data=array();
	$x=0;
	if($query->num_rows()>0)
	{
		foreach ($query->result() as $row)
		{
			$data[$x]=$row;
			$data[$x]->halt=$this->get_halt($row->tabro3_type);
			$data[$x]->bank_motabr3=$this->get_bank_motabr3($row->d_bank_id_fk);
			$data[$x]->bank_gamia=$this->get_bank_motabr3($row->gamia_bank_id_fk);
			$data[$x]->hesab_gamia=$this->get_gamia_hesab($row->gamia_account);
			$data[$x]->hesab_gamia_account=$this->get_gamia_account($row->gamia_bank_account_num);
			$x++;
		}

return $data;
	}else{
		return false;
	}
}
public function get_bank_motabr3($id)
{
	$this->db->where('id',$id);
	$query=$this->db->get('banks_settings');
	if($query->num_rows()>0)
	{
		return $query->row()->ar_name;
	}else{
		return false;
	}
}
	public function get_gamia_account($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('society_main_banks_account');
		if($query->num_rows()>0)
		{
			return $query->row()->account_num;
		}else{
			return false;
		}
	}
	public function get_gamia_hesab($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('society_main_banks_account');
		if($query->num_rows()>0)
		{
			return $query->row()->title;
		}else{
			return false;
		}
	}
public function  delete_rec($id)
{
	$this->db->where('id',$id);
	$this->db->delete('fr_donors_tabra3at');
}


	public function get_halt($id)
	{
		$this->db->where('id_setting',$id);
		$query=$this->db->get('fr_settings');
		if($query->num_rows()>0)
		{
			return $query->row()->title_setting;
		}else{
			return false;
		}
	}

	public function get_all_accounts()
	{
		return $this->db->get('society_main_banks_account')->result();
	}








}

