<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteers_model extends CI_Model {

	public function add($suspend)
	{
		$data['name'] 			   = $this->input->post('name');
		$data['id_card']		   = $this->input->post('id_card');
		$data['birth_date']		   = $this->input->post('birth_date');
		$data['address']		   = $this->input->post('address');
		$data['mobile'] 		   = $this->input->post('mobile');
		$data['job'] 			   = $this->input->post('job');
		$data['email'] 		 	   = $this->input->post('email');
		$data['fields'] 		   = serialize($this->input->post('fields'));
		$data['reasons'] 		   = serialize($this->input->post('reasons'));
		$data['dayes'] 			   = serialize($this->input->post('dayes'));
		$data['period'] 		   = serialize($this->input->post('period'));
		$data['another_charity']   = $this->input->post('another_charity');
		$data['charity'] 		   = $this->input->post('charity');
		$data['having_disability'] = $this->input->post('having_disability');
		$data['disability'] 	   = $this->input->post('disability');
		$data['suspend'] 		   = $suspend;
		$data['date'] 			   = strtotime(date("Y-m-d"));
		$data['date_s'] 		   = time();
		if(isset($_SESSION['user_id'])) {
			$data['publisher'] 	   = $_SESSION['user_id'];
		}
		$this->db->insert('volunteers',$data);
	}

	public function update($id)
	{
		$data['name'] 			   = $this->input->post('name');
		$data['id_card']		   = $this->input->post('id_card');
		$data['birth_date']		   = $this->input->post('birth_date');
		$data['address']		   = $this->input->post('address');
		$data['mobile'] 		   = $this->input->post('mobile');
		$data['job'] 			   = $this->input->post('job');
		$data['email'] 		 	   = $this->input->post('email');
		$data['fields'] 		   = serialize($this->input->post('fields'));
		$data['reasons'] 		   = serialize($this->input->post('reasons'));
		$data['dayes'] 			   = serialize($this->input->post('dayes'));
		$data['period'] 		   = serialize($this->input->post('period'));
		$data['another_charity']   = $this->input->post('another_charity');
		$data['charity'] 		   = $this->input->post('charity');
		$data['having_disability'] = $this->input->post('having_disability');
		$data['disability'] 	   = $this->input->post('disability');
		$this->db->where('id',$id);
		$this->db->update('volunteers',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
	    $this->db->delete('volunteers');
	}

	public function select_volunteers($suspend=false)
	{
		if($suspend != false) {
			$this->db->where('suspend',$suspend);
		}
		return $this->db->get('volunteers')->result();
	}

	public function select_settings($type)
	{
		return $this->db->where('type',$type)->get('volunteer_setting')->result();
	}

	public function getRecordById($where)
	{
		return $this->db->where($where)->get('volunteers')->row_array();
	}

	public function confirm($id, $status)
	{
		$data['suspend'] 		   = $status;
		$data['suspend_reason']    = $this->input->post('suspend_reason');
		$data['suspend_date']      = strtotime(date("Y-m-d"));
		$data['suspend_publisher'] = $_SESSION['user_id'];
		$this->db->where('id',$id);
		$this->db->update('volunteers',$data);
	}

}

/* End of file Volunteers_model.php */
/* Location: ./application/models/Volunteers/Volunteers_model.php */