<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model {

	public function insert()
	{
		$data['name'] 				  = $this->input->post('name');		
		$data['client_address'] 	  = $this->input->post('client_address');	
		$data['client_phone'] 	  	  = $this->input->post('client_phone');	
		$data['client_fax'] 		  = $this->input->post('client_fax');	
		$data['accountant_name'] 	  = $this->input->post('accountant_name');	
		$data['accountant_telephone'] = $this->input->post('accountant_telephone');	
		$data['client_dayen'] 	  	  = $this->input->post('client_dayen');	
		$this->db->insert('clients',$data);
	}

	public function update($id)
	{
		$data['name'] 				  = $this->input->post('name');		
		$data['client_address'] 	  = $this->input->post('client_address');	
		$data['client_phone'] 	  	  = $this->input->post('client_phone');	
		$data['client_fax'] 		  = $this->input->post('client_fax');	
		$data['accountant_name'] 	  = $this->input->post('accountant_name');	
		$data['accountant_telephone'] = $this->input->post('accountant_telephone');	
		$data['client_dayen'] 	  	  = $this->input->post('client_dayen');	
		$this->db->where('id', $id);
		$this->db->update('clients',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('clients');
	}

	public function select()
	{
		return $this->db->select('*')
			     		->order_by('id', 'DESC')
			     		->get('clients')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('clients')
			     		->row_array();
	}

}

/* End of file Clients_model.php */
/* Location: ./application/models/Storage/Clients_model.php */