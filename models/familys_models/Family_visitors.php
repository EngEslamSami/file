<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_visitors extends CI_Model {

	public function getVisits($mother_national_num_fk)
	{
		return $this->db->where('mother_national_num_fk',$mother_national_num_fk)->get('family_visitors')->result();
	}

	public function getResearcher_id_fk($mother_national_num_fk)
	{
		return $this->db->select('researcher_id')->where('mother_national_num',$mother_national_num_fk)->get('basic')->row_array()['researcher_id'];
	}

/*	public function insert($file_id)
	{
		$this->db->where('mother_national_num_fk',$file_id)->delete('family_visitors');
		foreach ($this->input->post('visit_date') as $key => $value) {
			$data['visit_date']      = strtotime($value);
			$data['note'] 		     = $this->input->post('note')[$key];
			$data['visit_status']    = $this->input->post('visit_status')[$key];
			$data['researcher_note'] = $this->input->post('researcher_note')[$key];
			$data['researcher_id_fk']= $this->input->post('researcher_id_fk');
			$data['mother_national_num_fk']= $file_id;
			$this->db->insert('family_visitors',$data);
		}
	}*/
    
    public function insert($file_id)
	{
		$this->db->where('mother_national_num_fk',$file_id)->delete('family_visitors');

		$count=count($this->input->post('visit_date'));

		for($i=0 ;$i<$count; $i++){

			   $data['visit_date'] = strtotime($this->input->post('visit_date')[$i]);
		       $data['note'] = $this->input->post('note')[$i];
		      $data['visit_status'] = $this->input->post('visit_status')[$i];
		      $data['researcher_note'] = $this->input->post('researcher_note')[$i];
		    $data['researcher_id_fk']= $this->input->post('researcher_id_fk')[0];
			$data['mother_national_num_fk']= $file_id;
			$this->db->insert('family_visitors',$data);
		}
	}

	public function deleteVisits($id)
	{
		$this->db->where('id',$id)->delete('family_visitors');
	}

}

/* End of file Family_visitors.php */
/* Location: ./application/models/familys_models/Family_visitors.php */