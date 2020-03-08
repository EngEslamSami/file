<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_care_model extends CI_Model {

	public function add_helthCare($file,$order_num)
	{
		foreach ($this->input->post('child_id_fk') as $key => $value) {
			$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
			$data['order_num'] 	       	   = $order_num;
			$data['child_id_fk'] 	       = $value;
			$data['travel_date'] 	       = $this->input->post('travel_date');
			$data['days_num'] 	   		   = $this->input->post('days_num');
			$data['place'] 	   		   	   = $this->input->post('place');
			if($file) {
				$data['img'] 	   		   = $file;
			}
			$data['date']			       = strtotime(date("m/d/Y"));
	        $data['date_s']				   = time();
	        $data['publisher'] 			   = $_SESSION['user_id'];
	        $this->db->insert('health_care_orders',$data);
		}
	}

	public function lastRecord()
	{
		return $this->db->order_by('order_num',"DESC")->limit(1)->get('health_care_orders')->row()->order_num;
	}

	public function childrenWithMother($national_id)
	{
		return $this->db->query('
								SELECT mother.id AS memberID, mother.m_first_name AS memberName, mother.m_birth_date AS gender, 2 as type, mother.mother_national_num_fk AS mother_num
            					FROM mother
            					WHERE mother.mother_national_num_fk = '.$national_id.'
            					UNION
            					SELECT f_members.id AS memberID, f_members.member_name AS memberName, f_members.member_gender AS gender, 1 as type, f_members.mother_national_num_fk AS mother_num
            					FROM f_members
            					WHERE f_members.mother_national_num_fk = '.$national_id.' 
								')->result();
	}

	public function selectHealth_care($where)
	{
		$query = $this->db->select('health_care_orders.*, mother.m_first_name, mother.m_father_name, mother.m_family_name, mother.m_birth_date_hijri, mother.m_mob, concat(mother.m_first_name," ",mother.m_father_name," ",mother.m_family_name) AS member_name')
						  ->join('mother','health_care_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						  ->group_by('health_care_orders.order_num')
				 		  ->where($where)
				 		  ->get('health_care_orders');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->selectedChildren = $this->getHealthCareChildren($row->mother_national_id_fk,$row->order_num);
                $data[$i]->allchildrenWithMother = $this->childrenWithMother($row->mother_national_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function selectHealth_careByID($where)
	{
		return $this->db->select('health_care_orders.*, mother.m_first_name, mother.m_father_name, mother.m_family_name, mother.m_birth_date_hijri, mother.m_mob, concat(mother.m_first_name," ",mother.m_father_name," ",mother.m_family_name) AS member_name')
						->join('mother','health_care_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->group_by('health_care_orders.order_num')
				 		->where($where)
				 		->get('health_care_orders')
				 		->row_array();
	}

	public function getHealthCareChildren($mother_national_id_fk,$order_num)
	{
		return $this->db->where('mother_national_id_fk',$mother_national_id_fk)
						->where('order_num',$order_num)
						->get('health_care_orders')
						->result();
	}

	public function deleteHealth_care($id)
	{
		$this->db->where('order_num',$id)->delete('health_care_orders');
	}

}

/* End of file Health_care_model.php */
/* Location: ./application/models/services_models/Health_care_model.php */