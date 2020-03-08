<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prog_main_sitting_mo extends CI_Model {

	public function select_sittings($type)
	{
		return $this->db->select('*')
						->where('type',$type)
						->get('prog_main_sitting')
						->result();
	}

	public function add($type)
	{
	//	$array = array(1=>'بنك', 2=>'مهمة', 3=>'جزاء', 4=>'أجازة', 5=>'عقد', 6=>'مكافأة');
		$array = array(1=>'بنك', 2=>'مهمة', 3=>'جزاء', 4=>'أجازة', 5=>'عقد', 6=>'مكافأة' ,7=>'مسمي وظيفي' ,8=>'أسباب الأذونات',9=>'نوع المطالبة');
        $data['title']    = $this->input->post('title');
		$data['type']     = $type;
		$data['cash'] 	  = $this->input->post('cash');
		$data['des_type'] = $array[$type];
		$this->db->insert('prog_main_sitting',$data);
	}

	public function getById($id)
	{
		return $this->db->get_where('prog_main_sitting', array('id'=>$id))
						->row_array();
	}

	public function update($id)
	{
		$data['title'] = $this->input->post('title');
		$data['cash']  = $this->input->post('cash');
		$this->db->where('id', $id)
        		 ->update('prog_main_sitting',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)
      			 ->delete('prog_main_sitting');
	}

}

/* End of file Prog_main_sitting_mo.php */
/* Location: ./application/models/Prog_main_sitting_mo.php */