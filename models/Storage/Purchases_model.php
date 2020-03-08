<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases_model extends CI_Model {

	public function insert()
	{
		$mode = current($_SESSION["purchses_add".$_SESSION['user_id']]);
		$data['fatora_date']           = strtotime($mode['fatora_date']);
		$data['supplier_code']         = $mode['supplier_code'];
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
		$this->db->insert('purchases_fatora', $data);

		$id = $this->db->insert_id();

		for($x = 0 ; $x < count($_SESSION["purchses_add".$_SESSION['user_id']]) ; $x++){
			$data2['fatora_code']    = $id;
			$data2['fatora_date']    = strtotime($mode['fatora_date']);
			$data2['supplier_code']  = $mode["supplier_code"];
			$data2['product_code']   = $mode["product_code"];
			$data2['amount_buy']     = $mode["amount_buy"];
			$data2['all_cost_buy']   = $mode["all_cost_buy"];
			$data2['one_price_sell'] = $mode["one_price_sell"];
			$data2['marge3_num']     = $mode["marge3_num"];
			$data2['unit_id_fk']     = $mode["unit_id_fk"];
			$data2['date']     		 = strtotime(date("y-m-d"));
			$data2['date_s']    	 = time();
			$data2['publisher']      = $_SESSION['user_id'];

			$this->db->insert('purchases', $data2);
			$mode = next($_SESSION["purchses_add".$_SESSION['user_id']]);
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
		$this->db->update('purchases_fatora', $data);

		$this->db->where('fatora_code', $id);
		$this->db->delete('purchases');

		$mode = current($_SESSION["purchses_add".$_SESSION['user_id']]);
		for($x = 0 ; $x < count($_SESSION["purchses_add".$_SESSION['user_id']]) ; $x++){
			$data2['fatora_code']    = $id;
			$data2['fatora_date']    = strtotime($mode['fatora_date']);
			$data2['supplier_code']  = $mode["supplier_code"];
			$data2['product_code']   = $mode["product_code"];
			$data2['amount_buy']     = $mode["amount_buy"];
			$data2['all_cost_buy']   = $mode["all_cost_buy"];
			$data2['one_price_sell'] = $mode["one_price_sell"];
			$data2['marge3_num']     = $mode["marge3_num"];
			$data2['unit_id_fk']     = $mode["unit_id_fk"];
			$data2['date']     		 = strtotime(date("y-m-d"));
			$data2['date_s']    	 = time();
			$data2['publisher']   	 = $_SESSION['user_id'];

			$this->db->insert('purchases', $data2);
			$mode = next($_SESSION["purchses_add".$_SESSION['user_id']]);
		}
	}

	public function get_last_id()
	{
		return $this->db->select('id')
		->from('purchases_fatora')
		->limit(1)
		->order_by('id','DESC')
		->get()
		->row_array();
	}

	public function get_suppliers()
	{
		return $this->db->get('suppliers')->result();
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
			return $this->db->select('items.*,units_settings.name AS unit_name')
							->from('items')
							->join('units_settings','units_settings.id=items.unit_id_fk')
							->where('items.id_from!=',0)
							->get()
							->result();
		}
		else {
			return $this->db->select('items.*,units_settings.name AS unit_name')
							->join('units_settings','units_settings.id=items.unit_id_fk')
							->where('items.id',$item_id)
							->get('items')
							->result();
		}
	}

	public function allPurchases($where=false){
		$this->db->select('purchases_fatora.*, suppliers.name AS supplier_code_name, safe.name as dayen_name');
		$this->db->from('purchases_fatora');
		$this->db->join("suppliers", "suppliers.id = purchases_fatora.supplier_code", "LEFT");
		$this->db->join("safe", "safe.id = purchases_fatora.box_name", "LEFT");
		if($where != false){
			$this->db->where($where);
		}
		$this->db->order_by('purchases_fatora.id','DESC');
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
		$this->db->select('purchases.*,items.name AS item_name, units_settings.name AS unit_name');
		$this->db->from('purchases');
		$this->db->join("items","items.id=purchases.product_code","LEFT");
		$this->db->join("units_settings","units_settings.id=purchases.unit_id_fk","LEFT");
		$this->db->where('fatora_code', $fatora_code);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	public function insertHadback($id)
	{
		$data['supplier_code'] = $this->input->post('supplier_code');
		$data['fatora_code']   = $id;
		$data['date']          = strtotime(date("y-m-d"));
		$data['date_s']        = time();
		$data['publisher']     = $_SESSION['user_id'];
		for ($i = 0; $i < count($this->input->post('hadback_amount')); $i++) {
			$data['hadback_amount'] = $this->input->post('hadback_amount')[$i];
			$this->db->where('fatora_code', $id);
			$this->db->where('product_code', $this->input->post('product_code')[$i]);
			$this->db->update('purchases', $data);
		}
		$data2['had_back'] = 1;
		$this->db->where('id', $id);
		$this->db->update('purchases_fatora', $data2);
	}

}

/* End of file Purchases_model.php */
/* Location: ./application/models/Storage/Purchases_model.php */