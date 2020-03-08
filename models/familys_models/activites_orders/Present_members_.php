<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Present_members extends CI_Model {

	public function loadActivities()
	{
		$query = $this->db->where('from_id_fk!=',0)->get('prog_activites');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->members = $this->getMembers(array('prog_activites_orders.activity_id_fk'=>$row->id,'prog_activites_orders.finshed'=>0));
                $data[$i]->attendedMembers = $this->getMembers(array('prog_activites_orders.activity_id_fk'=>$row->id,'prog_activites_orders.finshed'=>0,'prog_activites_orders.attend'=>1));
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function getMembers($array)
	{
		return $this->db->select('prog_activites_orders.*, f_members.member_full_name, mother.full_name')
						->join('f_members','f_members.id=prog_activites_orders.member_id_fk AND prog_activites_orders.person=1','LEFT')
						->join('mother','mother.id=prog_activites_orders.member_id_fk AND prog_activites_orders.person=0','LEFT')
						->where($array)
						->get('prog_activites_orders')
						->result();
	}

	public function attendance($attend,$id)
	{
		$data['attend'] 		  = $attend;
		$data['attend_date_ar']   = date('Y-m-d');
		$data['attend_publisher'] = $_SESSION['user_id'];
		$this->db->where('id',$id)
        		 ->update('prog_activites_orders',$data);
	}

	public function programRun()
	{
		foreach ($this->input->post('value') as $key => $value) {
			$data['finshed'] 	   = 1;
			$data['value'] 	   	   = $value;
			$data['finished_date'] = $this->input->post('finished_date');
			$this->db->where('id',$key)
        		 	 ->update('prog_activites_orders',$data);
		}
	}

}

/* End of file Present_members.php */
/* Location: ./application/models/familys_models/activites_orders/Present_members.php */