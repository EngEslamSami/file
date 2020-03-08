<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_orders_Reports_model extends CI_Model {

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

	public function getMotherData($national_id)
	{
	
     $sql = $this->db->where('mother_national_num_fk',$national_id)->get('mother')->row_array();
         return $sql['full_name'];
    }
     

    	public function select_famils()
	{
		$sql = $this->db->select('*')
						->where('suspend',4)
						->get('basic');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row) {
				$data[$i] = $row;
				$data[$i]->m_full_name = $this->getMotherData($row->mother_national_num);
				$i++;
			}
			return $data;
		}
		return false;
	}
//////////////////////////////////////////////

    	public function select_all_data($table,$mother_national_id_fk,$Conditions_arr,$grouby)
	{
	
          $this->db->select('*');
        $this->db->from($table);
        if($Conditions_arr != ''){
         foreach($Conditions_arr as $key=>$value){
        $this->db->where($key,$Conditions_arr[$key]);    
        }   
        }
        if($grouby != ''){
        $this->db->group_by($grouby);
        }
        $this->db->where('mother_national_id_fk',$mother_national_id_fk);  
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[] = $row;
				$data[$i]->m_full_name = $this->getMotherData($row->mother_national_id_fk);
				$i++;
            }
            return $data;
        }
        return false;
        
        
	}



}

/* End of file Services_orders_model.php */
/* Location: ./application/models/services_models/Services_orders_model.php */