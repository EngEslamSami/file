<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_sarf_model extends CI_Model {

	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

	public function getAccount($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}

	public function getLastId($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(rqm_sanad AS UNSIGNED)),0) AS rqm_sanad')->where($where)->get('finance_sanad_sarf')->row_array()['rqm_sanad'];
	}

	public function getBox($where)
	{
		$sql = $this->db->where($where)->get('finance_box_setting');
		if ($sql->num_rows() > 0) {
			foreach ($sql->result() as $row) {
                $data[$row->tawred_method_name] = $row;
            }
            return $data;
		}
		return false;
	}

	public function getAllVouchSarf()
	{
		$sql = $this->db->get('finance_sanad_sarf');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row){
				$data[$i] = $row;
				$data[$i]->delails = $this->getdetailsById($row->id);
                $i++;}
			return $data;
		}
			return false;
	}

	public function getdetailsById($id)
	{
		return $this->db->where("rqm_sanad_fk",$id)->get('finance_sanad_sarf_details')->result();
	}

	public function findById($id)
	{
		$sql = $this->db->where("id",$id)->get('finance_sanad_sarf');
		if ($sql->num_rows() > 0) {
			$data = $sql->row();
			$data->delails = $this->getdetailsById($data->id);
			return $data;
		}
		return false;
	}

	public function insert_update($id=false)
	{
		$data['rqm_sanad'] 	   		 = $this->input->post('rqm_sanad');
		$data['date_sanad_ar']    	 = $this->input->post('date_sanad');
		$data['date_sanad'] 		 = strtotime($this->input->post('date_sanad'));
		$data['pay_method']    		 = $this->input->post('pay_method_sarf');
		$data['person_name']  		 = $this->input->post('person_name');
		$data['about'] 		   		 = $this->input->post('about');
		$data['note'] 		   		 = $this->input->post('note');
		$data['total_value']   		 = $this->input->post('total_value');
		$data['sheek_num'] 	   		 = $this->input->post('sheek_num');
		$data['sheek_date']    		 = strtotime($this->input->post('sheek_date'));
		$data['sheek_date_ar'] 		 = $this->input->post('sheek_date');
		$data['bank_id_fk']    		 = $this->input->post('bank_id_fk');
		$data['bank_name']     		 = $this->input->post('bank_name');
		$data['type'] 				 = $this->input->post('type');
		$data['mother_national_num'] = $this->input->post('mother_national_num');
		$data['person_id_fk'] 		 = $this->input->post('person_id_fk');
		$data['person_mob'] 		 = $this->input->post('person_mob');
		$data['box_rqm_hesab'] 		 = $this->input->post('box_rqm_hesab');
		$data['box_name'] 			 = $this->input->post('box_name');
		$data['sheek_bank_id'] 		 = $this->input->post('sheek_bank_id');
		$data['sheek_bank_name'] 	 = $this->input->post('sheek_bank_name');
		$data['sheek_rqm_hesab'] 	 = $this->input->post('sheek_rqm_hesab');
		$data['sheek_num_bank'] 	 = $this->input->post('sheek_num_bank');
		if($id == false) {
			$data['date'] 		  	 = strtotime(date('Y-m-d'));
			$data['date_s'] 	  	 = time();
			$data['publisher'] 	  	 = $_SESSION['user_id'];
			$this->db->insert('finance_sanad_sarf',$data);
			return $this->db->insert_id();
		}
		else {
			$this->db->where('id', $id);
			$this->db->update('finance_sanad_sarf',$data);
			return $id;
		}
	}

	public function insert_update_datails($id)
	{
		if($this->input->post('rqm_hesab')){
			$count = count($this->input->post('rqm_hesab'));
			for ($i=0 ;$i < $count; $i++){
				$data['rqm_sanad_fk'] = $id;
				$data['value'] = $this->input->post('value')[$i];
				$data['rqm_hesab'] = $this->input->post('rqm_hesab')[$i];
				$data['name_hesab'] = $this->input->post('name_hesab')[$i];
				$data['byan'] = $this->input->post('byan')[$i];
				$this->db->insert('finance_sanad_sarf_details',$data);
			}
		}
	}

	public function delete($id)
	{
		$this->db->where("id",$id)->delete('finance_sanad_sarf');
		$this->delete_datails($id);
	}

	public function delete_datails($id)
	{
		$this->db->where("rqm_sanad_fk",$id)->delete('finance_sanad_sarf_details');
	}

	public function insert_update_files($files,$id)
	{
		if(!empty($files)){
			$count = count($files);
			for ($i=0 ;$i < $count; $i++){
				$data['rqm_sanad_fk'] = $id;
				$data['file_attached'] = $files[$i];
				$data['title'] = $this->input->post('title')[$i];
				$this->db->insert('finance_sanad_sarf_attaches',$data);
			}
		}
	}

	public function deleteFiles($id,$filed,$table)
	{
		$this->db->where($filed,$id)->delete($table);
	}


    public function getBankData($bank_id,$code)
    {
        return $this->db->where(array('bank_id_fk'=>$bank_id,'rqm_hesab'=>$code))
            ->get('society_main_banks_account')->row_array()['name_hesab'];

    }
    public function getBanCheekNum($bank_id)
    {
        $num = $this->db->where(array('sheek_bank_id'=>$bank_id))
            ->order_by('sheek_num_bank',"desc")->limit(1)->get('finance_sanad_sarf')->row_array();
        if(!empty($num)){
            return $num['sheek_num_bank']+1;
        }
        return 0;
    }
}

/* End of file Vouch_sarf_model.php */
/* Location: ./application/models/finance_accounting_model/box/vouch_sarf/Vouch_sarf_model.php */