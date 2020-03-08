<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_setting_model extends CI_Model {

	public function select_settings()
	{
		return $this->db->select('*')
						->get('job_setting')
						->result();
	}

	public function add($type)
	{
		$data['title']    = $this->input->post('title');
		$this->db->insert('job_setting',$data);
	}

	public function getById($id)
	{
		return $this->db->get_where('job_setting', array('id'=>$id))
						->row_array();
	}

	public function update($id)
	{
		$data['title'] = $this->input->post('title');
		$this->db->where('id', $id)
        		 ->update('job_setting',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)
      			 ->delete('job_setting');
	}

}

/* End of file Jobs_setting_model.php */
/* Location: ./application/models/Jobs/Jobs_setting_model.php */