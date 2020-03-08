<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_repair extends CI_Model {

	public function add($files)
	{
	     
         
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['repair_id_fk'] 	       = $this->input->post('repair_id_fk');
		$data['place'] 		           = $this->input->post('place');
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
		$this->db->insert('home_repairs_order',$data);
	}
    
	public function update($files,$id)
	{
	     
         
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['repair_id_fk'] 	       = $this->input->post('repair_id_fk');
		$data['place'] 		           = $this->input->post('place');
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
        if($this->db->update('home_repairs_order',$data)) {

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

public function selectHome_repair($mother_national_id_fk){
   return $this->db->select('home_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
						->join('mother','home_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('family_setting device','home_repairs_order.repair_id_fk=device.id_setting','LEFT')
						->where('home_repairs_order.mother_national_id_fk',$mother_national_id_fk)
						->get('home_repairs_order')
						->result();	
		
}

public function getById_Home_repair($id)
	{
		return $this->db->select('home_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','home_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('home_repairs_order.id',$id)
						->get('home_repairs_order')
						->row_array();
	}
    
  public function  delete_Home_repair($id){
    
        $this->db->where('id',$id);
        $this->db->delete('home_repairs_order');
  }
    
}

/* End of file Services_orders_model.php */
/* Location: ./application/models/services_models/Services_orders_model.php */