<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_repairs extends CI_Model {

	public function add($files)
	{  
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
        $data['p_name'] 	       = $this->input->post('p_name');
		$data['owner_name'] 	       = $this->input->post('owner_name');
		$data['problem'] 		           = $this->input->post('problem');
		$data['car_form_num'] 		   = $this->input->post('car_form_num');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['date_ar']			   = date("m/d/Y");
        $data['approved']			   = 0;
        $data['publisher'] 			   = $_SESSION['user_id'];
		foreach ($files as $key => $value) {
			if($value != '') {
				$data[$key] = $value;
			}
		}

		$this->db->insert('cars_repairs_order',$data);
	}
    
	public function update($files,$id)
	{  
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
        $data['p_name'] 	               = $this->input->post('p_name');
		$data['owner_name'] 	       = $this->input->post('owner_name');
		$data['problem'] 		           = $this->input->post('problem');
		$data['car_form_num'] 		   = $this->input->post('car_form_num');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['date_ar']			   = date("m/d/Y");
        $data['approved']			   = 0;
        $data['publisher'] 			   = $_SESSION['user_id'];
		foreach ($files as $key => $value) {
			if($value != '') {
				$data[$key] = $value;
			}
		}
        $this->db->where('id', $id);
        if($this->db->update('cars_repairs_order',$data)) {
            return true;
        }else{
            return false;
        }
	}


public function getMotherData($national_id)
	{
		 $sql = $this->db->where('mother_national_num_fk',$national_id)->get('mother')->row_array();
         return $sql['m_first_name'].'-'.$sql['m_father_name'].'-'.$sql['m_grandfather_name'];
	}

public function selectCars_repairs($mother_national_id_fk){
   	$sql = $this->db->select('*')
						->where('mother_national_id_fk',$mother_national_id_fk)
						->get('cars_repairs_order');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row) {
				$data[$i] = $row;
                $data[$i]->member_name = $this->getMotherData($row->mother_national_id_fk);
				$i++;
			}
			return $data;
		}
		return false; 
}

public function getById_Cars_repairs($id)
	{
		return $this->db->select('cars_repairs_order.*, mother.m_first_name, mother.m_father_name, mother.m_family_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','cars_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('cars_repairs_order.id',$id)
						->get('cars_repairs_order')
						->row_array();
	}
    
  public function  delete_Cars_repairs($id){
    
        $this->db->where('id',$id);
        $this->db->delete('cars_repairs_order');
  }
    
}

/* End of file Services_orders_model.php */
/* Location: ./application/models/services_models/Services_orders_model.php */