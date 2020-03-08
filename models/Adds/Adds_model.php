<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adds_model extends CI_Model {

    public function select_adds($limit)
	{
		return $this->db->select('*')
						->limit($limit)
						->order_by('id','DESC')
						->get('adds')
						->result();
	}

	public function add($file)
	{
		$data['name'] = $this->input->post('name');
		$data['img']  = $file;
		$this->db->insert('adds',$data);
	}

	public function getById($id)
	{
		return $this->db->get_where('adds', array('id'=>$id))
						->row_array();
	}

	public function update($id,$file)
	{
		$data['name'] = $this->input->post('name');
		if($file) {
			$data['img']  = $file;
		}
		$this->db->where('id', $id)
        		 ->update('adds',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)
      			 ->delete('adds');
	}

}

/* End of file Adds_model.php */
/* Location: ./application/models/Adds/Adds_model.php */