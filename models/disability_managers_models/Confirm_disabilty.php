<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_disabilty extends CI_Model {

	public function select_orders($type, $confirm=false, $group_by=false)
	{
		if($confirm === false) {
			$where = array('disabilities_device_order.medical_company_id_fk'=>0,'disabilities_device_order.approved_device'=>1);
			if($type == 2) {
				$where = array('disabilities_device_order.medical_company_id_fk!='=>0);
			}
		}
		else {
			$where = array('disabilities_device_order.medical_company_id_fk'=>0,'disabilities_device_order.approved_device'=>1,'disabilities_device_order.confirm_sarf'=>$confirm);
			if($type == 2) {
				$where = array('disabilities_device_order.medical_company_id_fk!='=>0,'disabilities_device_order.confirm_sarf'=>$confirm);
			}
		}
		$this->db->select('disabilities_device_order.*, disabilities_persons.*, medical_company.title AS company, nationality_settings.title AS nationality, disabilities_type_settings.title AS type, medical_devices.title AS device')
				 ->join('disabilities_persons','disabilities_persons.id=disabilities_device_order.person_id_fk','LEFT')
				 ->join('medical_company','medical_company.id=disabilities_device_order.medical_company_id_fk','LEFT')
				 ->join('nationality_settings','nationality_settings.id=disabilities_persons.p_natonality_id_fk','LEFT')
				 ->join('medical_devices','medical_devices.id=disabilities_device_order.device_id_fk','LEFT')
				 ->join('disabilities_type_settings','disabilities_type_settings.id=disabilities_persons.disability_type_id_fk','LEFT')
				 ->where($where)
				 ->order_by('disabilities_device_order.order_num','DESC');
		if($group_by === false) {
			return $this->db->get('disabilities_device_order')
							->result();
		}
		else {
			$this->db->group_by('disabilities_device_order.order_num');
			$query = $this->db->get('disabilities_device_order');
			if ($query->num_rows() > 0) {
				$i = 0;
	            foreach ($query->result() as $row) {
	                $data[$i] = $row;
	                $data[$i]->devices = $this->getDevices($row->order_num);
	                $i++;
	            }
	            return $data;
	        }
	        return false;
		}
	}

	public function getDevices($order_num)
	{
		return $this->db->select('disabilities_device_order.amount_device, disabilities_device_order.device_id_fk,
                                 medical_devices.title, disabilities_persons.*,
                                 medical_company.title as company_name')
						->join('medical_devices','medical_devices.id=disabilities_device_order.device_id_fk','LEFT')
						->join('disabilities_persons','disabilities_persons.id=disabilities_device_order.person_id_fk','LEFT')
                        ->join('medical_company','medical_company.id=disabilities_device_order.medical_company_id_fk','LEFT')
						->where('disabilities_device_order.order_num',$order_num)
						->where('disabilities_device_order.confirm_sarf',1)
						->get('disabilities_device_order')
						->result();
	}

	public function confirmation($id, $status)
	{
		$data['confirm_sarf'] 	   = $status;
		$data['confirm_reason']    = $this->input->post('confirm_reason');
		$data['confirm_sarf_date'] = strtotime(date("Y-m-d"));
		$this->db->where('order_id',$id);
		$this->db->update('disabilities_device_order',$data);
	}

}

/* End of file Confirm_disabilty.php */
/* Location: ./application/models/disability_managers_models/Confirm_disabilty.php */