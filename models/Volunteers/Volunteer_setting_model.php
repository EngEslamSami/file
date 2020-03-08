<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer_setting_model extends CI_Model {

	public function select_settings($type)
	{
		return $this->db->select('*')
						->where('type',$type)
						->get('volunteer_setting')
						->result();
	}

	public function add($type)
	{
		$array = array(1=>'مجال التطوع', 2=>'سبب التطوع');
		$data['title']    = $this->input->post('title');
		$data['type']     = $type;
		$data['des_type'] = $array[$type];
		$this->db->insert('volunteer_setting',$data);
	}

	public function getById($id)
	{
		return $this->db->get_where('volunteer_setting', array('id'=>$id))
						->row_array();
	}

	public function update($id)
	{
		$data['title'] = $this->input->post('title');
		$this->db->where('id', $id)
        		 ->update('volunteer_setting',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)
      			 ->delete('volunteer_setting');
	}

}

/* End of file Volunteer_setting_model.php */
/* Location: ./application/models/Volunteers/Volunteer_setting_model.php */