<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_center_model extends CI_Model {

	public function add_medical()
	{
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['child_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['disease_type'] 	       = $this->input->post('disease_type');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['publisher'] 			   = $_SESSION['user_id'];
        $this->db->insert('medical_center',$data);
	}

	public function edit_medical($id)
	{
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['child_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['disease_type'] 	       = $this->input->post('disease_type');
        $this->db->where('id',$id);
		$this->db->update('medical_center',$data);
	}

	public function selectMedical_center($national_id)
	{
		return $this->db->select('medical_center.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name')
						->join('mother','medical_center.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('f_members','medical_center.child_id_fk=f_members.id','LEFT')
						->where('medical_center.mother_national_id_fk',$national_id)
						->get('medical_center')
						->result();
	}

	public function selectMedical_centerByID($id)
	{
		return $this->db->select('medical_center.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','medical_center.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('medical_center.id',$id)
						->get('medical_center')
						->row_array();
	}

	public function deleteMedical_center($id)
	{
		$this->db->where('id',$id)->delete('medical_center');
	}

}

/* End of file Medical_center_model.php */
/* Location: ./application/models/services_models/Medical_center_model.php */