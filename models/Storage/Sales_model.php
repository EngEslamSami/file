<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

	public function insert()
	{
		$mode = current($_SESSION["sales_add".$_SESSION['user_id']]);
		$data['fatora_date']           = strtotime($mode['fatora_date']);
		$data['client_code']         = $mode['client_code'];
		$data['paid_type']             = $mode['paid_type'];
		if($mode['paid_type'] == 1) {
			$data['box_name']          = $mode['box_name'];
		}
		$data['fatora_cost_before_discount'] = $this->input->post('fatora_cost_before_discount');
		$data['discount'] = $this->input->post('discount');
		$data['fatora_cost_after_discount'] = $this->input->post('fatora_cost_after_discount');
		$data['paid']             = $this->input->post('paid');
		$data['remain']           = $this->input->post('remain');
		$data['byan']             = $this->input->post('byan');
		$data['date']             = strtotime(date("y-m-d"));
		$data['date_s']           = time();
		$data['publisher']        = $_SESSION['user_id'];
		$this->db->insert('sales_fatora', $data);

		$id = $this->db->insert_id();

		for($x = 0 ; $x < count($_SESSION["sales_add".$_SESSION['user_id']]) ; $x++){
			$data2['fatora_code']     = $id;
			$data2['fatora_date']     = strtotime($mode['fatora_date']);
			$data2['client_code']     = $mode["client_code"];
			$data2['product_code']    = $mode["product_code"];
			$data2['sale_amount']     = $mode["sale_amount"];
			$data2['total_sanf_cost'] = $mode["total_sanf_cost"];
			$data2['one_sanf_price']  = $mode["one_sanf_price"];
			$data2['unit_id_fk']      = $mode["unit_id_fk"];
			$data2['date']     		  = strtotime(date("y-m-d"));
			$data2['date_s']    	  = time();
			$data2['publisher']       = $_SESSION['user_id'];

			$this->db->insert('sales', $data2);
			$mode = next($_SESSION["sales_add".$_SESSION['user_id']]);
		}
	}

	public function update($id)
	{
		$data['fatora_cost_before_discount']= $this->input->post('fatora_cost_before_discount');
		$data['discount'] = $this->input->post('discount');
		$data['fatora_cost_after_discount']= $this->input->post('fatora_cost_after_discount');
		$data['paid']      = $this->input->post('paid');
		$data['remain']    = $this->input->post('remain');
		$data['byan']      = $this->input->post('byan');
		$data['date']      = strtotime(date("y-m-d"));
		$data['date_s']    = time();
		$data['publisher'] = $_SESSION['user_id'];
		$this->db->where('id', $id);
		$this->db->update('sales_fatora', $data);

		$this->db->where('fatora_code', $id);
		$this->db->delete('sales');

		$mode = current($_SESSION["sales_add".$_SESSION['user_id']]);
		for($x = 0 ; $x < count($_SESSION["sales_add".$_SESSION['user_id']]) ; $x++){
			$data2['fatora_code']     = $id;
			$data2['fatora_date']     = strtotime($mode['fatora_date']);
			$data2['client_code']  	  = $mode["client_code"];
			$data2['product_code']    = $mode["product_code"];
			$data2['sale_amount']     = $mode["sale_amount"];
			$data2['total_sanf_cost'] = $mode["total_sanf_cost"];
			$data2['one_sanf_price']  = $mode["one_sanf_price"];
			$data2['unit_id_fk']      = $mode["unit_id_fk"];
			$data2['date']     		  = strtotime(date("y-m-d"));
			$data2['date_s']    	  = time();
			$data2['publisher']   	  = $_SESSION['user_id'];

			$this->db->insert('sales', $data2);
			$mode = next($_SESSION["sales_add".$_SESSION['user_id']]);
		}
	}

	public function get_last_id()
	{
		return $this->db->select('id')
		->from('sales_fatora')
		->limit(1)
		->order_by('id','DESC')
		->get()
		->row_array();
	}

	public function get_clients()
	{
		return $this->db->get('clients')->result();
	}

	public function get_safe()
	{
		return $this->db->select('*')
		->from('safe')
		->get()
		->result();
	}

	public function Get_Items($item_id=false)
	{
		if($item_id == false) {
			return $this->db->query('
									SELECT items.*,units_settings.name AS unit_name, P.one_price_sell AS sellPrice
									FROM items
									LEFT JOIN units_settings ON units_settings.id=items.unit_id_fk
									LEFT JOIN (
										SELECT purchases.*
									    FROM purchases 
									    ORDER BY purchases.fatora_date DESC
									    LIMIT 1
									) P
									ON (P.product_code=items.id)
									WHERE items.id_from!=0
									')->result();
		}
		else {
			return $this->db->query('
									SELECT items.*,units_settings.name AS unit_name, P.one_price_sell AS sellPrice
									FROM items
									LEFT JOIN units_settings ON units_settings.id=items.unit_id_fk
									LEFT JOIN (
										SELECT purchases.*
									    FROM purchases 
									    WHERE purchases.product_code='.$item_id.'
									    ORDER BY purchases.fatora_date DESC
									    LIMIT 1
									) P
									ON (P.product_code=items.id)
									WHERE items.id= '.$item_id.'
									')->result();
		}
	}

	public function allSales($where=false){
		$this->db->select('sales_fatora.*, clients.name AS clients_code_name, safe.name as dayen_name');
		$this->db->from('sales_fatora');
		$this->db->join("clients", "clients.id = sales_fatora.client_code", "LEFT");
		$this->db->join("safe", "safe.id = sales_fatora.box_name", "LEFT");
		if($where != false){
			$this->db->where($where);
		}
		$this->db->order_by('sales_fatora.id','DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$i = 0;
			$fatora = array();
			foreach ($query->result() as $row) {
				$fatora[$i] = $row;
				$fatora[$i]->sub = $this->get_one_fatora($row->id);
				$i++;
			}
			return $fatora;
		}
		return false;
	}

	public function get_one_fatora($fatora_code)
	{
		$this->db->select('sales.*,items.name AS item_name, units_settings.name AS unit_name');
		$this->db->from('sales');
		$this->db->join("items","items.id=sales.product_code","LEFT");
		$this->db->join("units_settings","units_settings.id=sales.unit_id_fk","LEFT");
		$this->db->where('fatora_code', $fatora_code);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

}

/* End of file Sales_model.php */
/* Location: ./application/models/Storage/Sales_model.php */