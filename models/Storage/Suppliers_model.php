<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers_model extends CI_Model {

	public function insert()
	{
		$data['name'] = $this->input->post('name');		
		$data['supplier_address'] 	  = $this->input->post('supplier_address');	
		$data['supplier_phone'] 	  = $this->input->post('supplier_phone');	
		$data['supplier_fax'] 		  = $this->input->post('supplier_fax');	
		$data['accountant_name'] 	  = $this->input->post('accountant_name');	
		$data['accountant_telephone'] = $this->input->post('accountant_telephone');	
		$data['supplier_dayen'] 	  = $this->input->post('supplier_dayen');	
		$this->db->insert('suppliers',$data);
	}

	public function update($id)
	{
		$data['name'] = $this->input->post('name');		
		$data['supplier_address'] 	  = $this->input->post('supplier_address');	
		$data['supplier_phone'] 	  = $this->input->post('supplier_phone');	
		$data['supplier_fax'] 		  = $this->input->post('supplier_fax');	
		$data['accountant_name'] 	  = $this->input->post('accountant_name');	
		$data['accountant_telephone'] = $this->input->post('accountant_telephone');	
		$data['supplier_dayen'] 	  = $this->input->post('supplier_dayen');	
		$this->db->where('id', $id);
		$this->db->update('suppliers',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('suppliers');
	}

	public function select()
	{
		return $this->db->select('*')
			     		->order_by('id', 'DESC')
			     		->get('suppliers')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('suppliers')
			     		->row_array();
	}

}

/* End of file Suppliers_model.php */
/* Location: ./application/models/Storage/Suppliers_model.php */