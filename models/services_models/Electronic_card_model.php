<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Electronic_card_model extends CI_Model {

	public function add_electronic_card()
	{
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['child_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['national_id'] 	       = $this->input->post('national_id');
		$data['card_service_type'] 	   = $this->input->post('card_service_type');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['publisher'] 			   = $_SESSION['user_id'];
        $this->db->insert('electronic_card',$data);
	}

	public function edit_electronic_card($id)
	{
		$data['mother_national_id_fk'] = $this->input->post('mother_national_id_fk');
		$data['child_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['national_id'] 	       = $this->input->post('national_id');
		$data['card_service_type'] 	   = $this->input->post('card_service_type');
        $this->db->where('id',$id);
		$this->db->update('electronic_card',$data);
	}

	public function selectElectronic_card($national_id)
	{
		return $this->db->select('electronic_card.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name')
						->join('mother','electronic_card.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('f_members','electronic_card.child_id_fk=f_members.id','LEFT')
						->where('electronic_card.mother_national_id_fk',$national_id)
						->get('electronic_card')
						->result();
	}

	public function selectElectronic_cardByID($id)
	{
		return $this->db->select('electronic_card.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','electronic_card.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('electronic_card.id',$id)
						->get('electronic_card')
						->row_array();
	}

	public function deleteElectronic_card($id)
	{
		$this->db->where('id',$id)->delete('electronic_card');
	}

}

/* End of file Electronic_card_model.php */
/* Location: ./application/models/services_models/Electronic_card_model.php */