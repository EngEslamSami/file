<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_qbd_model extends CI_Model {

	public function getType($where)
	{
		return $this->db->where($where)->get('fr_bnod_pills_setting')->result();
	}

	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

}

/* End of file Vouch_qbd_model.php */
/* Location: ./application/models/finance_accounting_model/vouch_qbd/Vouch_qbd_model.php */