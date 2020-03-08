<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_items_model extends CI_Model {

	public function insert()
	{
		$data['name'] 				  = $this->input->post('name');	
		$data['item_type'] 			  = $this->input->post('item_type');	
		$data['id_from'] 			  = $this->input->post('id_from');	
		$data['unit_id_fk'] 		  = $this->input->post('unit_id_fk');	
		$data['all_buy_cost'] 		  = $this->input->post('all_buy_cost');	
		$data['all_amount'] 		  = $this->input->post('all_amount');	
		$data['one_buy_cost'] 		  = $this->input->post('one_buy_cost');	
		$data['customer_price_sale']  = $this->input->post('customer_price_sale');	
		$data['first_balance_period'] = $this->input->post('first_balance_period');	
		$data['past_amount'] 		  = $this->input->post('past_amount');	
		$data['cost_past_amount'] 	  = $this->input->post('cost_past_amount');	
		$this->db->insert('items',$data);
	}

	public function update($id)
	{
		$data['name'] 				  = $this->input->post('name');	
		$data['item_type'] 			  = $this->input->post('item_type');	
		$data['id_from'] 			  = $this->input->post('id_from');	
		$data['unit_id_fk'] 		  = $this->input->post('unit_id_fk');	
		$data['all_buy_cost'] 		  = $this->input->post('all_buy_cost');	
		$data['all_amount'] 		  = $this->input->post('all_amount');	
		$data['one_buy_cost'] 		  = $this->input->post('one_buy_cost');	
		$data['customer_price_sale']  = $this->input->post('customer_price_sale');	
		$data['first_balance_period'] = $this->input->post('first_balance_period');	
		$data['past_amount'] 		  = $this->input->post('past_amount');	
		$data['cost_past_amount'] 	  = $this->input->post('cost_past_amount');	
		$this->db->where('id', $id);
		$this->db->update('items',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('items');
	}

	public function select_main_items()
	{
		$sql = $this->db->select('*')
						->where('id_from',0)
			     		->order_by('id', 'DESC')
			     		->get('items');
		if ($sql->num_rows() > 0) {
			$i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->sub_items = $this->select_sub_items($row->id);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function select_sub_items($id)
	{
		return $this->db->select('*')
						->where('id_from',$id)
			     		->order_by('id', 'DESC')
			     		->get('items')
			     		->result();
	}

	public function select_units()
	{
		return $this->db->select('*')
			     		->order_by('id', 'DESC')
			     		->get('units_settings')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('items')
			     		->row_array();
	}

}

/* End of file Sub_items_model.php */
/* Location: ./application/models/Storage/Sub_items_model.php */