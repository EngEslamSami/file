<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheek_setting_model extends CI_Model {

	public function getBanks()
	{
		return $this->db->get('banks_settings')->result();
	}

	public function getSettingById($id)
	{
		return $this->db->where('id',$id)->get('finance_sheek_setting')->row_array();
	}

	public function getAllSettings()
	{
		return $this->db->select('finance_sheek_setting.*, banks_settings.title')
						->join('banks_settings','banks_settings.id=finance_sheek_setting.bank_id','LEFT')
						->get('finance_sheek_setting')
						->result();
	}

	public function insert_update($file,$id=false)
	{
		$data['bank_id'] 			 = $this->input->post('bank_id');
		$data['size'] 				 = $this->input->post('size');
		$data['full_width'] 		 = $this->input->post('full_width');
		$data['full_height'] 		 = $this->input->post('full_height');
		$data['sheek_date_right'] 	 = $this->input->post('sheek_date_right');
		$data['sheek_date_top'] 	 = $this->input->post('sheek_date_top');
		$data['sheek_horer_right'] 	 = $this->input->post('sheek_horer_right');
		$data['sheek_horer_top'] 	 = $this->input->post('sheek_horer_top');
		$data['sheek_benifit_right'] = $this->input->post('sheek_benifit_right');
		$data['sheek_benifit_top']   = $this->input->post('sheek_benifit_top');
		$data['sheek_value_right'] 	 = $this->input->post('sheek_value_right');
		$data['sheek_value_top'] 	 = $this->input->post('sheek_value_top');
		$data['sheek_text_right'] 	 = $this->input->post('sheek_text_right');
		$data['sheek_text_top'] 	 = $this->input->post('sheek_text_top');
		$data['sheek_byan_right'] 	 = $this->input->post('sheek_byan_right');
		$data['sheek_byan_top'] 	 = $this->input->post('sheek_byan_top');
		$data['sheek_sarf_right'] 	 = $this->input->post('sheek_sarf_right');
		$data['sheek_sarf_top'] 	 = $this->input->post('sheek_sarf_top');
		$data['ka3b_num_right'] 	 = $this->input->post('ka3b_num_right');
		$data['ka3b_num_top'] 		 = $this->input->post('ka3b_num_top');
		$data['ka3b_date_right'] 	 = $this->input->post('ka3b_date_right');
		$data['ka3b_date_top'] 		 = $this->input->post('ka3b_date_top');
		$data['ka3b_to_right'] 		 = $this->input->post('ka3b_to_right');
		$data['ka3b_to_top'] 		 = $this->input->post('ka3b_to_top');
		$data['ka3b_value_right'] 	 = $this->input->post('ka3b_value_right');
		$data['ka3b_value_top'] 	 = $this->input->post('ka3b_value_top');
		$data['horer_in'] 			 = $this->input->post('horer_in');
		$data['quotation'] 			 = $this->input->post('quotation');
		$data['sheek_date'] 		 = $this->input->post('sheek_date');
		$data['benefit_name'] 		 = $this->input->post('benefit_name');
		$data['value'] 			 	 = $this->input->post('value');
		$data['value_text'] 		 = $this->input->post('value_text');
		$data['byan'] 			 	 = $this->input->post('byan');
		$data['type'] 				 = $this->input->post('type');
		if ($file) {
			$data['img'] 			 = $file;
		}
		if ($id == false) {
			$this->db->insert('finance_sheek_setting',$data);
		}
		else {
			$this->db->where('id',$id)->update('finance_sheek_setting',$data);
		}
	}

	public function delete($id)
	{
		$this->db->where('id',$id)->delete('finance_sheek_setting');
	}

}

/* End of file Sheek_setting_model.php */
/* Location: ./application/models/finance_accounting_model/box/sheek_setting/Sheek_setting_model.php */