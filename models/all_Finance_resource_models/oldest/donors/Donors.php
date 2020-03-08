<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donors extends CI_Model {

	public function select_nationality()
	{
		return $this->db->get('nationality')->result();
	}

	public function select_bank()
	{
		return $this->db->where('type',1)->get('prog_main_sitting')->result();
	}

	public function insert()
	{
		$data['donor_type'] 	   = $this->input->post('donor_type');		
		$data['name']  		 	   = $this->input->post('name');
		$data['gender'] 		   = $this->input->post('gender');
		$data['user_name']   	   = $this->input->post('user_name');
		$data['password'] 		   = $this->input->post('password');
		$data['nationality_id_fk'] = $this->input->post('nationality_id_fk');
		$data['identity_type'] 	   = $this->input->post('identity_type');		
		$data['national_id']   	   = $this->input->post('national_id');
		$data['mobile'] 		   = $this->input->post('mobile');
		$data['job_type']   	   = $this->input->post('job_type');
		$data['job_place'] 		   = $this->input->post('job_place');
        $data['activity'] 		   = $this->input->post('activity');
		$data['email'] 		  	   = $this->input->post('email');
		$data['pay_method'] 	   = $this->input->post('pay_method');
		$data['bank_id_fk']   	   = $this->input->post('bank_id_fk');
		$data['account_number']    = $this->input->post('account_number');
		$data['note'] 		  	   = $this->input->post('note');
		$data['date'] 		  	   = strtotime($this->input->post('date'));
		$data['date_s'] 	  	   = time();
		$data['publisher'] 	  	   = $_SESSION['user_id'];
		$this->db->insert('donors',$data);
		return $this->db->insert_id();
	}

	public function update($id)
	{
		$data['donor_type'] 	   = $this->input->post('donor_type');		
		$data['name']  		 	   = $this->input->post('name');
		$data['gender'] 		   = $this->input->post('gender');
		$data['user_name']   	   = $this->input->post('user_name');
		$data['password'] 		   = $this->input->post('password');
		$data['nationality_id_fk'] = $this->input->post('nationality_id_fk');
		$data['identity_type'] 	   = $this->input->post('identity_type');		
		$data['national_id']   	   = $this->input->post('national_id');
		$data['mobile'] 		   = $this->input->post('mobile');
		$data['job_type']   	   = $this->input->post('job_type');
		$data['job_place'] 		   = $this->input->post('job_place');
		$data['email'] 		  	   = $this->input->post('email');
		$data['pay_method'] 	   = $this->input->post('pay_method');
		$data['bank_id_fk']   	   = $this->input->post('bank_id_fk');
		$data['account_number']    = $this->input->post('account_number');
		$data['note'] 		  	   = $this->input->post('note');
		$data['date'] 		  	   = strtotime($this->input->post('date'));
		$data['date_s'] 	  	   = time();
		$data['publisher'] 	  	   = $_SESSION['user_id'];
		$this->db->where('id', $id);
		$this->db->update('donors',$data);
	}

	public function insert_donors_files($file, $donor_id)
	{
		foreach ($file as $value) {
			$data['file_name']   = $value;
			$data['donor_id_fk'] = $donor_id;
			$this->db->insert('donors_files',$data);
		}
	}

	public function select_donors()
	{
		$sql = $this->db->select('donors.*, nationality.title AS nationality, prog_main_sitting.title AS bank')
						->join('nationality','nationality.id=donors.nationality_id_fk','LEFT')
						->join('prog_main_sitting','prog_main_sitting.id=donors.bank_id_fk','LEFT')
						->get('donors');
		if ($sql->num_rows() > 0) {
			$i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->files = $this->select_files($row->id);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function select_files($id)
	{
		return $this->db->where('donor_id_fk',$id)->get('donors_files')->result();
	}

	public function selectByID($id)
	{
		return $this->db->where('id', $id)->get('donors')->row_array();
	}

	public function delete_donor($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('donors');
		$this->delete_files($id);
	}

	public function delete_files($id)
	{
		$this->db->where('donor_id_fk', $id);
		$this->db->delete('donors_files');
	}

}

/* End of file Donors.php */
/* Location: ./application/models/finance_resource_models/Donors.php */