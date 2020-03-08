<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {

	public function add($file)
	{
		$data['name'] 			   = $this->input->post('name');
		$data['id_card']		   = $this->input->post('id_card');
		$data['birth_date']		   = $this->input->post('birth_date');
		$data['job_setting_id_fk'] = $this->input->post('job_setting_id_fk');
		$data['mobile'] 		   = $this->input->post('mobile');
		$data['nationality'] 	   = $this->input->post('nationality');
		$data['expire_date'] 	   = $this->input->post('expire_date');
		$data['email'] 		 	   = $this->input->post('email');
		$data['gender'] 		   = $this->input->post('gender');
		$data['social_status']     = $this->input->post('social_status');
		$data['zoon'] 		   	   = $this->input->post('zoon');
		$data['neighborhood'] 	   = $this->input->post('neighborhood');
		$data['phone'] 	   		   = $this->input->post('phone');
		$data['qualification'] 	   = $this->input->post('qualification');
		$data['specialization']    = $this->input->post('specialization');
		$data['experience'] 	   = $this->input->post('experience');
		$data['cv'] 	   		   = $file;
		$data['date'] 			   = strtotime(date("Y-m-d"));
		$data['date_s'] 		   = time();
		$this->db->insert('job_orders',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
	    $this->db->delete('job_orders');
	}

	public function select_settings()
	{
		return $this->db->get('job_setting')->result();
	}

	public function select_jobs()
	{
		return $this->db->select('job_orders.*, job_setting.title')
						->join('job_setting','job_setting.id=job_orders.job_setting_id_fk')
						->get('job_orders')
						->result();
	}

}

/* End of file Jobs_model.php */
/* Location: ./application/models/Jobs/Jobs_model.php */