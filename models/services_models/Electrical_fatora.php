<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Electrical_fatora extends CI_Model {

	public function add($files)
	{  
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['fatora_num'] 	       = $this->input->post('fatora_num');
		$data['value'] 		           = $this->input->post('value');
		$data['fatora_date'] 		   = $this->input->post('fatora_date');
        $data['sanad_date'] 		   = $this->input->post('sanad_date');
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
		$this->db->insert('electrical_fatora_order',$data);
	}
    
	public function update($files,$id)
	{  
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['fatora_num'] 	       = $this->input->post('fatora_num');
		$data['value'] 		           = $this->input->post('value');
		$data['fatora_date'] 		   = $this->input->post('fatora_date');
        $data['sanad_date'] 		   = $this->input->post('sanad_date');
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
        if($this->db->update('electrical_fatora_order',$data)) {

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

public function selectElectrical_devices($mother_national_id_fk){
	
   return $this->db->select('electrical_fatora_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob ')
		->join('mother','electrical_fatora_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
		->where('electrical_fatora_order.mother_national_id_fk',$mother_national_id_fk)
		->get('electrical_fatora_order')
		->result();

}

public function getById_Electrical_fatora($id)
	{
		return $this->db->select('electrical_fatora_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','electrical_fatora_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('electrical_fatora_order.id',$id)
						->get('electrical_fatora_order')
						->row_array();
	}
    
  public function  delete_Electrical_fatora($id){
    
        $this->db->where('id',$id);
        $this->db->delete('electrical_fatora_order');
  }
    
}

/* End of file Services_orders_model.php */
/* Location: ./application/models/services_models/Services_orders_model.php */