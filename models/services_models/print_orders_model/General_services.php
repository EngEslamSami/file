<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_services extends CI_Model {

	

	public function select_all($id,$table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where("id",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data=$query->result();$i=0;
			foreach ($query->result() as $row ){
				$data[$i]  =$row;
				if($table ==='electrical_device_order' || $table ==='maintenance_electrical_device_order' || $table ==='furniture_order'  ){
					$data[$i]->device_name=$this->get_device_name(array('id_setting'=>$row->device_id_fk));
				}elseif ($table==='haj_omra_order'){
					$data[$i]->member_name=$this->get_mother($row->mother_national_id_fk)["full_name"];
					$data[$i]->sub=$this->get_num_order($row->order_num);

				}elseif ($table ==='home_repairs_order'){

					$data[$i]->device_name=$this->get_device_name(array('id_setting'=>$row->repair_id_fk));
				}elseif ($table ==='restore_repairs_order'){

					$data[$i]->device_name=$this->get_device_name(array('id_setting'=>$row->restore_id_fk));
				}
				$data[$i]->member_name=$this->get_mother($row->mother_national_id_fk);

				$i++;
			}
			return $data;
		}
		return false;
	}

//==========================================

	public  function  get_device_name($arr){
		$this->db->select('*');
		$this->db->from("family_setting device");
		$this->db->where($arr);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data =$query->row_array() ;
			return $data["title_setting"];
		}
		return false;
	}
	public  function  get_mother($mother_national_num_fk){
		$this->db->select('mother_national_num_fk,full_name ,m_mob ,m_birth_date ,full_name ,m_birth_date_hijri');
		$this->db->from("mother");
		$this->db->where("mother_national_num_fk",$mother_national_num_fk);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array() ;
		}
		return false;
	}
	public  function  get_num_order($order_num){
		$this->db->select(' haj_omra_order.* , f_members.member_full_name');
		$this->db->from('haj_omra_order');
		$this->db->join("f_members","f_members.id = haj_omra_order.person_id ","left");
		$this->db->where("order_num",$order_num);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data =$query->result();
			return $data;
		}
		return false;
	}

	//==========================================






}

