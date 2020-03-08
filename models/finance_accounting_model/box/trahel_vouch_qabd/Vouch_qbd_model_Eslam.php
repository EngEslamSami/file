<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_qbd_model extends CI_Model {


	public function select_last_id(){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 1;
		}
	}

	public function getAllVouchQbd(){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->delails = $this->getdetailsById($row->rqm_sanad);
				$data[$i]->files = $this->get_attachment($row->rqm_sanad);
			}
			return $query->result();
		}
			return false;

	}





	public function findById($id){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->where("id",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				$data = $query->row();
				$data->delails = $this->getdetailsById($data->rqm_sanad);

			return $data;
		}
		return false;

	}

	public function getdetailsById($id){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd_details");
		$this->db->where("rqm_sanad_fk",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;

	}

	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

    public function getAccount($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}

	public function insert_update($id)
	{

		$data['rqm_sanad'] = $this->input->post('rqm_sanad');
		$data['date_sanad'] = strtotime($this->input->post('date_sanad'));
		$data['date_sanad_ar'] = $this->input->post('date_sanad');
		$data['pay_method'] = $this->input->post('pay_method');
		$data['recived_from'] = $this->input->post('recived_from');
		$data['about'] = $this->input->post('about');
		$data['total_value'] = $this->input->post('total_value');
		$data['sheek_num'] = $this->input->post('sheek_num');
		$data['sheek_date'] = $this->input->post('sheek_date');
		$data['sheek_date_ar'] = $this->input->post('sheek_date');
		$data['bank_id_fk'] = $this->input->post('bank_id_fk');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['qued_rkm_id_fk'] = $this->input->post('qued_rkm_fk');
		$data['box_rqm_hesab'] = $this->input->post('x1');
		$data['box_name'] = $this->input->post('x2');



		//===================

		$data_qued['rkm'] = $this->input->post('qued_rkm_fk');
		$data_qued['no3_qued'] = 5;
		$data_qued['no3_qued_name'] = "قيد سند قبض";
		$data_qued['halet_qued'] = 2;
		$data_qued['halet_qued_name'] = "غير مرحل";
		$data_qued['qued_date_ar'] = $this->input->post('date_sanad');
		$data_qued['qued_date'] = strtotime($this->input->post('date_sanad'));
		$data_qued['total_value'] = $this->input->post('total_value');
		$data_qued['date'] = date("Y-m-d");
		$data_qued['date_s'] = strtotime(date("Y-m-d"));
		$data_qued['publisher'] = $_SESSION['user_id'];
		$data_qued['publisher_name'] = $_SESSION['user_name'];


         $this->db->where('publisher_esal',$_SESSION['user_id']);
		$this->db->delete('esal_test-table');
		//==========================
		$this->db->where('rkm',$this->input->post('qued_rkm_fk'));
		$this->db->delete('finance_quods');
		$this->db->where('qued_rkm_fk',$this->input->post('qued_rkm_fk'));
		$this->db->delete('finance_quods_details');
		//=============================================================
		$this->db->where('rkm',$this->input->post('qued_rkm_fk'));
		$this->db->delete('finance_quods');
		$this->db->where('rkm',$this->input->post('qued_rkm_fk'));
		$this->db->delete('finance_quods');
		//=================  data qued ============

		if(empty($id)){

			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$this->db->insert('finance_sanad_qabd',$data);
			$this->db->insert('finance_quods',$data_qued);
			return $this->db->insert_id();

		}else{
			$this->db->where('id', $id);
			$this->db->update('finance_sanad_qabd',$data);
			$this->db->insert('finance_quods',$data_qued);
			return $id;
		}

	}

    public function insert_update_datails($id)
	{
		if($this->input->post('rqm_hesab')){
			$count = count($this->input->post('rqm_hesab'));
			for ($i=0 ;$i < $count; $i++){
				$data['rqm_sanad_fk'] = $this->input->post('rqm_sanad');
				$data['value'] = $this->input->post('value')[$i];
				$data['rqm_hesab'] = $this->input->post('rqm_hesab')[$i];
				$data['name_hesab'] = $this->input->post('name_hesab')[$i];
				$data['marg3'] = $this->input->post('marg3')[$i];
				$data['byan'] = $this->input->post('byan')[$i];

				$data_qued['qued_rkm_fk'] = $this->input->post('qued_rkm_fk');
				$data_qued['maden'] = 0;
				$data_qued['dayen'] = $this->input->post('value')[$i];
				$data_qued['value'] = 0;
				$data_qued['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
				$data_qued['hesab_name'] =  $this->input->post('name_hesab')[$i];
				$data_qued['byan'] = $this->input->post('byan')[$i];
				$data_qued['marg3'] = $this->input->post('marg3')[$i];
				$this->db->where('pill_num',$this->input->post('marg3')[$i]);
				$data_update['deport_sand_qabd']=1;
				$this->db->update('fr_all_pills',$data_update);
				//=====================================================





				//=====================$this->input->post('total_value');
				$this->db->insert('finance_sanad_qabd_details',$data);
				$this->db->insert('finance_quods_details',$data_qued);
			}

			$data_qued2['qued_rkm_fk'] = $this->input->post('qued_rkm_fk');
			$data_qued2['maden'] = $this->input->post('total_value');
			$data_qued2['dayen'] = 0;
			$data_qued2['value'] = 0;
			$data_qued2['rkm_hesab'] = 111201;
			$data_qued2['hesab_name'] ="حساب الصندوق";
			$data_qued2['byan'] = $this->input->post('byan')[0];
			$data_qued2['marg3'] = $this->input->post('marg3')[0];
			$this->db->insert('finance_quods_details',$data_qued2);

		}
	}

	public function delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('finance_sanad_qabd');
	}


	public function delete_datails($id)
	{
		$this->db->where("rqm_sanad_fk",$id);
		$this->db->delete('finance_sanad_qabd_details');
	}

//=================================================

	public function select_last_id2(){
		$this->db->select('*');
		$this->db->from("finance_quods");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->rkm+1;
		}else{
			return 1;
		}
	}

	//=============================
	/*public function get_all(){
		$this->db->select('*');
		$this->db->from("esal_test-table");
		$this->db->where("publisher_esal",$_SESSION['user_id']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;

	}*/
    
    	public function get_all(){
		$this->db->select('*');
		$this->db->from("esal_test-table");
		$this->db->where("publisher_esal",$_SESSION['user_id']);
		$query = $this->db->get();
         $x =0;
		if ($query->num_rows() > 0) {
		//	return $query->result();
       
         foreach ($query->result() as $row) {
              $data[$x] = $row;
              $data[$x]->total_sand_value = $this->get_total_sand_value();
               $x++;
            }
            return $data;
        
		}
		return false;

	} 
    
    
    

   
         public function get_total_sand_value(){
        $this->db->select('*');
        $this->db->from('esal_test-table');
     	$this->db->where("publisher_esal",$_SESSION['user_id']);

        $query = $this->db->get();
        $datas =0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $datas += $row->value;
            }
            return $datas;
        }else{
            return 0;
        }

    }

	public function insert_img($images)
	{
		$title=$this->input->post('title');
		$rqm_sanad_id_fk=$this->input->post('rqm_sanad_id_fk');
		if(!empty($images)){
			$count=count($images);
			for($x=0;$x<$count;$x++)
			{
				$data['title']=$this->input->post('title')[$x];
				$data['rqm_sanad_id_fk']=$this->input->post('rqm_sanad_id_fk');
				$data['file_attached']=$images[$x];
				$this->db->insert('finance_sanad_qabd_attachment',$data);

			}




		}
	}

	public function get_attachment($id)
	{
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd_attachment");
		$this->db->where("rqm_sanad_id_fk",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;

	}

	public function delete_img($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('finance_sanad_qabd_attachment');
	}
	public function delete_by_sand($id)
	{
		$this->db->where("rqm_sanad_id_fk",$id);
		$this->db->delete('finance_sanad_qabd_attachment');
	}

	public function get_code_hesab($type,$tawred_method)
	{
		$this->db->where('type',$type);
		$this->db->where('tawred_method',$tawred_method);
		$query=$this->db->get('finance_box_setting');
		return $query->row();
	}

}

/* End of file Vouch_qbd_model.php */
/* Location: ./application/models/finance_accounting_model/box/vouch_qbd/Vouch_qbd_model.php */