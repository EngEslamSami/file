<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Model {

	public function update($id)
	{
		$this->db->set('vote_count', 'vote_count+1', FALSE)
				 ->where('id', $id)
				 ->update('vote');
	}

	public function select()
	{
		return $this->db->get('vote')->result();
	}

}

/* End of file Vote.php */
/* Location: ./application/models/Vote.php */