<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection_model extends CI_Model {

	public function getMembers($where = false)
	{
		return $this->db->select('f_members.*,
			basic.file_num, 
			father.full_name AS father_name')
        				->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk',"LEFT")
        				->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"LEFT")
        				->where('basic.final_suspend',4)
         				->where('basic.deleted',0)
         				->where($where)
       					->order_by("f_members.mother_national_num_fk","ASC")
       					->get('f_members')
          				->result_array();
	}

}

/* End of file Connection_model.php */
/* Location: ./application/models/familys_models/Connection_model.php */