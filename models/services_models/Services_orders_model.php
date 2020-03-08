<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_orders_model extends CI_Model {

	public function select_categories()
	{
		$sql = $this->db->select('*')
						->where('from_id',0)
						->get('service_categories');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row) {
				$data[$i] = $row;
				$data[$i]->subCategories = $this->getSubCategories($row->id);
				$i++;
			}
			return $data;
		}
		return false;
	}

	public function getSubCategories($from_id)
	{
		return $this->db->where('from_id',$from_id)->get('service_categories')->result();
	}

	/*public function getMotherData($national_id)
	{
		return $this->db->where('mother_national_num_fk',$national_id)->get('mother')->row_array();
	}*/
    

	public function getMotherChildren($national_id)
	{
		return $this->db->where('mother_national_num_fk',$national_id)->get('f_members')->result();
	}
    public function getMotherData($national_id)
	{
		return $this->db->select('mother.*,basic.mother_national_num')
						->join('mother','mother.mother_national_num_fk=basic.mother_national_num')
						->where('basic.mother_national_num',$national_id)
						->where('basic.suspend',4)
						->get('basic')
						->row_array();
	}

}

/* End of file Services_orders_model.php */
/* Location: ./application/models/services_models/Services_orders_model.php */