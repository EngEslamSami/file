<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FamilyCalender_model extends CI_Model {

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
	    return $this->db->select('family_visitors.*,family_setting.title_setting')
	    				->join('family_setting','family_setting.id_setting=family_visitors.visit_purpose_fk')
	    				->where($where)
	    				->order_by('family_visitors.id','DESC')
	    				->get('family_visitors')
	    				->result();
	}

	public function insertEvent()
	{
		$data['start_time']    			= strtotime($this->input->post('start_time'));
		$data['end_time']      			= strtotime($this->input->post('end_time'));
        $data['manager_notes'] 			= $this->input->post('manager_notes');
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num_fk');
        $data['visit_date']				= strtotime($this->input->post('start_time'));
        $data['visit_date_ar']			= $this->input->post('start_time');
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
		$data['start_time'] = strtotime($this->input->post('start'));
		$data['end_time']   = strtotime($this->input->post('end'));
		$this->db->where('id',$this->input->post('id'))
				 ->update('family_visitors',$data);
	}

	public function delete_event()
	{
		$this->db->where("id", $this->input->post('id'))->delete("family_visitors");
	}

	public function updateTitle()
    {
        $data['event_name'] = $this->input->post('event_name');
        $this->db->where('id',$this->input->post('id'))
				 ->update('calendar',$data);
    }

}

/* End of file FamilyCalender_model.php */
/* Location: ./application/models/familys_models/FamilyCalender/FamilyCalender_model.php */