<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marriage_help_model extends CI_Model {

	public function add_help($files)
	{
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['child_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['city_id_fk'] 		   = $this->input->post('city_id_fk');
		$data['place'] 				   = $this->input->post('place');
		$data['marriage_date'] 		   = $this->input->post('marriage_date');
		$data['contract_number'] 	   = $this->input->post('contract_number');
		$data['contract_date'] 		   = $this->input->post('contract_date');
		$data['contract_source'] 	   = $this->input->post('contract_source');
		$data['dowry_cost']			   = $this->input->post('dowry_cost');
		$data['nationality_id_fk']	   = $this->input->post('nationality_id_fk');
		$data['national_id']		   = $this->input->post('national_id');
		$data['national_type']		   = $this->input->post('national_type');
		$data['first_marriage']		   = $this->input->post('first_marriage');
		$data['mobile'] 			   = $this->input->post('mobile');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['publisher'] 			   = $_SESSION['user_id'];
		foreach ($files as $key => $value) {
			if($value != '') {
				$data[$key] = $value;
			}
		}
		$this->db->insert('marriage_help',$data);
	}

	public function edit_help($files,$id)
	{
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['child_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['city_id_fk'] 		   = $this->input->post('city_id_fk');
		$data['place'] 				   = $this->input->post('place');
		$data['marriage_date'] 		   = $this->input->post('marriage_date');
		$data['contract_number'] 	   = $this->input->post('contract_number');
		$data['contract_date'] 		   = $this->input->post('contract_date');
		$data['contract_source'] 	   = $this->input->post('contract_source');
		$data['dowry_cost']			   = $this->input->post('dowry_cost');
		$data['nationality_id_fk']	   = $this->input->post('nationality_id_fk');
		$data['national_id']		   = $this->input->post('national_id');
		$data['national_type']		   = $this->input->post('national_type');
		$data['first_marriage']		   = $this->input->post('first_marriage');
		$data['mobile'] 			   = $this->input->post('mobile');
		foreach ($files as $key => $value) {
			if($value != '') {
				$data[$key] = $value;
			}
		}
		$this->db->where('id',$id);
		$this->db->update('marriage_help',$data);
	}

	public function selectMarriage_help($national_id)
	{
		return $this->db->select('marriage_help.*, mother.m_first_name, mother.m_father_name, mother.m_family_name, mother.m_birth_date_hijri, mother.m_mob, area.title_setting AS area, f_members.member_name, nationality.title_setting AS nationality')
						->join('mother','marriage_help.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('family_setting area','marriage_help.city_id_fk=area.id_setting','LEFT')
						->join('family_setting nationality','marriage_help.nationality_id_fk=nationality.id_setting','LEFT')
						->join('f_members','marriage_help.child_id_fk=f_members.id','LEFT')
						->where('marriage_help.mother_national_id_fk',$national_id)
						->get('marriage_help')
						->result();
	}

	public function getSetting($where)
	{
		return $this->db->where($where)->get('family_setting')->result();
	}

	public function selectMarriage_helpByID($id)
	{
		return $this->db->select('marriage_help.*, mother.m_first_name, mother.m_father_name, mother.m_family_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','marriage_help.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('marriage_help.id',$id)
						->get('marriage_help')
						->row_array();
	}

	public function deleteMarriage_help($id)
	{
		$this->db->where('id',$id)->delete('marriage_help');
	}

}

/* End of file Marriage_help_model.php */
/* Location: ./application/models/services_models/Marriage_help_model.php */