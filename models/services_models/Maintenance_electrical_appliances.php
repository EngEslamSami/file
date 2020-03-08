<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_electrical_appliances extends CI_Model {

	public function add($files)
	{
	     
         
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['device_id_fk'] 	       = $this->input->post('device_id_fk');
		$data['number'] 		       = $this->input->post('number');
		$data['notes'] 				   = $this->input->post('notes');
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
		$this->db->insert('maintenance_electrical_device_order',$data);
	}
    
	public function update($files,$id)
	{
	     
         
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['device_id_fk'] 	       = $this->input->post('device_id_fk');
		$data['number'] 		       = $this->input->post('number');
		$data['notes'] 				   = $this->input->post('notes');
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
        if($this->db->update('maintenance_electrical_device_order',$data)) {

            return true;

        }else{

            return false;

        }
	}

  	public function  getSetting($arr){
  	 	$sql = $this->db->select('*')
						->where($arr)
						->get('family_setting');
		if ($sql->num_rows() > 0) {
			foreach ($sql->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
  	

	public function get_device_id_fk($from_id)
	{
		return $this->db->where('id_setting',$from_id)->get('family_setting')->result()[0]->title_setting;
	}

public function getMotherData($national_id)
	{
		 $sql = $this->db->where('mother_national_num_fk',$national_id)->get('mother')->row_array();
         return $sql['m_first_name'].'-'.$sql['m_father_name'].'-'.$sql['m_grandfather_name'];
	}

public function selectElectrical_devices($mother_national_id_fk){
   
return $this->db->select('maintenance_electrical_device_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
						->join('mother','maintenance_electrical_device_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('family_setting device','maintenance_electrical_device_order.device_id_fk=device.id_setting','LEFT')
						->where('maintenance_electrical_device_order.mother_national_id_fk',$mother_national_id_fk)
						->get('maintenance_electrical_device_order')
						->result();
		
}

public function getById_Electrical_devices($id)
	{
		return $this->db->select('maintenance_electrical_device_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','maintenance_electrical_device_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('maintenance_electrical_device_order.id',$id)
						->get('maintenance_electrical_device_order')
						->row_array();
	}
    
  public function  delete_Electrical_devices($id){
    
        $this->db->where('id',$id);
        $this->db->delete('maintenance_electrical_device_order');
  }
    
}

/* End of file Services_orders_model.php */
/* Location: ./application/models/services_models/Services_orders_model.php */