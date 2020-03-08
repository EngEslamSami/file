<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FamilyCalender_model extends CI_Model {

	public function getVisits($mother_national_num)
	{
		return $this->db->select('family_visitors.*,basic.id AS order_num, basic.file_num, basic.father_name, family_setting.title_setting')
						->join('basic','basic.mother_national_num=family_visitors.mother_national_num_fk','LEFT')
	    				->join('family_setting','family_setting.id_setting=family_visitors.visit_purpose_fk')
						->where('family_visitors.mother_national_num_fk',$mother_national_num)
						->get('family_visitors')
						->result();
	}

	public function getCount($where)
	{
		return $this->db->select('COUNT(*) AS c')
						->where($where)
						->get('family_visitors')
						->row_array()['c'];
	}

	public function getFamilySetting($type)
	{
		return $this->db->where('type',$type)->get('family_setting')->result();
	}

	public function getEmps($where)
	{
		return $this->db->where($where)->get('employees')->result();
	}

	public function getBasic($mother_national_num)
	{
		return $this->db->where('mother_national_num',$mother_national_num)
						->get('basic')
						->row_array()['researcher_id'];
	}

	public function get_events($where)
	{
	    return $this->db->select('family_visitors.*, family_setting.title_setting, basic.id AS order_num, basic.file_num, basic.father_name')
						->join('basic','basic.mother_national_num=family_visitors.mother_national_num_fk','LEFT')
	    				->join('family_setting','family_setting.id_setting=family_visitors.visit_purpose_fk')
	    				->where($where)
	    				->order_by('family_visitors.id','DESC')
	    				->get('family_visitors')
	    				->result();
	}

	public function insertEvent()
	{
		$data['visit_from_date']    	= strtotime($this->input->post('start_time'));
		$data['visit_to_date']      	= strtotime($this->input->post('end_time'));
        $data['manager_notes'] 			= $this->input->post('manager_notes');
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num_fk');
        $data['visit_to_date_ar']		= $this->input->post('end_time');
        $data['visit_from_date_ar']		= $this->input->post('start_time');
        $data['visit_search_type']		= $this->input->post('visit_search_type');
        $data['visit_purpose_fk']		= $this->input->post('visit_purpose_fk');
        $data['researcher_id_fk']		= $this->input->post('researcher_id_fk');
        $data['publisher']     			= $_SESSION['user_id'];
        $data['date']          			= strtotime(date("Y-m-d"));
        $data['date_s']        			= time();
		$this->db->insert('family_visitors',$data);
		return $this->db->insert_id();
	}

	public function update_event()
	{
		$data['visit_from_date'] 	= strtotime($this->input->post('start'));
		$data['visit_to_date']   	= strtotime($this->input->post('end'));
		$data['visit_to_date_ar']	= $this->input->post('end');
        $data['visit_from_date_ar']	= $this->input->post('start');
		$this->db->where('id',$this->input->post('id'))
				 ->update('family_visitors',$data);
		return $this->input->post('id');
	}

	public function delete_event()
	{
		$this->db->where("id", $this->input->post('id'))->delete("family_visitors");
	}

	public function updateTitle()
    {
        $data['manager_notes'] 			= $this->input->post('manager_notes');
        $data['visit_search_type']		= $this->input->post('visit_search_type');
        $data['visit_purpose_fk']		= $this->input->post('visit_purpose_fk');
        $data['researcher_id_fk']		= $this->input->post('researcher_id_fk');
        $data['publisher']     			= $_SESSION['user_id'];
        $data['date']          			= strtotime(date("Y-m-d"));
        $data['date_s']        			= time();
        $this->db->where('id',$this->input->post('id'))
				 ->update('family_visitors',$data);
    }

    public function updateResearcher()
    {
    	$data['end_time']     = $this->input->post('end_time');
        $data['start_time']	  = $this->input->post('start_time');
        $data['visit_status'] = $this->input->post('visit_status');
        $this->db->where('id',$this->input->post('id'))
				 ->update('family_visitors',$data);
    }

}

/* End of file FamilyCalender_model.php */
/* Location: ./application/models/familys_models/FamilyCalender/FamilyCalender_model.php */