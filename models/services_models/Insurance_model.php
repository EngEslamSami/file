<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_model extends CI_Model {

	public function add_insurance($file,$order_num)
	{
		foreach ($this->input->post('child_id_fk') as $key => $value) {
			$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
			$data['order_num'] 	       	   = $order_num;
			$data['child_id_fk'] 	       = $value;
			$data['type'] 	       		   = $this->input->post('type');
			$data['device_medical_id_fk']  = $this->input->post('device_medical_id_fk');
			if($file) {
				$data['file'] 	   		   = $file;
			}
			$data['date']			       = strtotime(date("m/d/Y"));
	        $data['date_s']				   = time();
	        $data['publisher'] 			   = $_SESSION['user_id'];
	        $this->db->insert('insurance_medical_device_orders',$data);
		}
	}

	public function lastRecord()
	{
		return $this->db->order_by('order_num',"DESC")->limit(1)->get('insurance_medical_device_orders')->row()->order_num;
	}

	public function childrenWithMother($national_id)
	{
		return $this->db->query('
								SELECT mother.id AS memberID, mother.full_name AS memberName, mother.m_birth_date AS gender, 2 as type, mother.mother_national_num_fk AS mother_num
            					FROM mother
            					WHERE mother.mother_national_num_fk = '.$national_id.'
            					UNION
            					SELECT f_members.id AS memberID, f_members.member_full_name AS memberName, f_members.member_gender AS gender, 1 as type, f_members.mother_national_num_fk AS mother_num
            					FROM f_members
            					WHERE f_members.mother_national_num_fk = '.$national_id.' 
								')->result();
	}

	public function selectInsuranceOrder($where)
	{
		$query = $this->db->select('insurance_medical_device_orders.*, mother.m_national_id, mother.m_mob, mother.m_birth_date_hijri, mother.full_name, family_setting.title_setting')
						  ->join('mother','insurance_medical_device_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						  ->join('family_setting','insurance_medical_device_orders.device_medical_id_fk=family_setting.id_setting','LEFT')
						  ->group_by('insurance_medical_device_orders.order_num')
				 		  ->where($where)
				 		  ->get('insurance_medical_device_orders');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->selectedChildren = $this->getInsuranceChildren($row->mother_national_id_fk,$row->order_num);
                $data[$i]->allchildrenWithMother = $this->childrenWithMother($row->mother_national_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function selectInsuranceByID($where)
	{
		return $this->db->select('insurance_medical_device_orders.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','insurance_medical_device_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->group_by('insurance_medical_device_orders.order_num')
				 		->where($where)
				 		->get('insurance_medical_device_orders')
				 		->row_array();
	}

	public function getInsuranceChildren($mother_national_id_fk,$order_num)
	{
		return $this->db->where('mother_national_id_fk',$mother_national_id_fk)
						->where('order_num',$order_num)
						->get('insurance_medical_device_orders')
						->result();
	}

	public function deleteInsurance($id)
	{
		$this->db->where('order_num',$id)->delete('insurance_medical_device_orders');
	}

	public function selectMed_Device($type)
	{
		return $this->db->where('type',$type)->get('family_setting')->result();
	}

}

/* End of file Insurance_model.php */
/* Location: ./application/models/services_models/Insurance_model.php */