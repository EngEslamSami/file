<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services_approved_model extends CI_Model {
	public function selectCategories()
	{
		$query = $this->db->get('service_categories');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id] = $row;
			}
			return $data;
		}
		return false;
	}
	public function marriage_help($where=false)
	{
		$this->db->select('marriage_help.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, area.title_setting AS area, f_members.member_full_name, nationality.title_setting AS nationality')
			->join('mother','marriage_help.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
			->join('family_setting area','marriage_help.city_id_fk=area.id_setting','LEFT')
			->join('family_setting nationality','marriage_help.nationality_id_fk=nationality.id_setting','LEFT')
			->join('f_members','marriage_help.child_id_fk=f_members.id','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return $this->db->get('marriage_help')
			->result();
	}
	public function school_supplies_order($where=false)
	{
		$this->db->select('*');
		$this->db->from("school_supplies_order");
		if($where != false){
			$this->db->where($where);
		}
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data=$query->result();$i=0;
			foreach ($query->result() as $row ){
				$data[$i]->full_name=$this->get_member($row->person_id);
				$i++;
			}
			return $data;
		}
		return false;
	}
	//==========================================
	public  function  get_member($person_id){
		$this->db->select('member_full_name');
		$this->db->from("f_members");
		$this->db->where("id",$person_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data =$query->row_array() ;
			return $data["member_full_name"];
		}
		return false;
	}
	//==========================================
	public function insurance_medical_device_orders($where=false)
	{
		$query = $this->db->select('insurance_medical_device_orders.*, mother.m_national_id, mother.m_mob, mother.m_birth_date_hijri, mother.full_name, family_setting.title_setting')
			->join('mother','insurance_medical_device_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
			->join('family_setting','insurance_medical_device_orders.device_medical_id_fk=family_setting.id_setting','LEFT')
			->group_by('insurance_medical_device_orders.order_num')
			->where($where)
			->get('insurance_medical_device_orders');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$i++;
			}
			return $data;
		}
		return false;
	}
	public function health_care_orders($where=false)
	{
		$query = $this->db->select('health_care_orders.*, mother.m_national_id, mother.m_mob, mother.full_name, mother.m_birth_date_hijri')
			->join('mother','health_care_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
			->group_by('health_care_orders.order_num')
			->where($where)
			->get('health_care_orders');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$i++;
			}
			return $data;
		}
		return false;
	}
	public function cars_repairs_order($where=false)
	{
		$this->db->select('cars_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob');
		$this->db->join('mother','cars_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('cars_repairs_order')->result();
	}
	public function restore_repairs_order($where=false)
	{
		$this->db->select('restore_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name');
		$this->db->join('mother','restore_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('family_setting device','restore_repairs_order.restore_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('restore_repairs_order')->result();
	}
	public function home_repairs_order($where=false)
	{
		$this->db->select('home_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name');
		$this->db->join('mother','home_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('family_setting device','home_repairs_order.repair_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('home_repairs_order')->result();
	}
	public function haj_omra_order($where=false)
	{
		$this->db->select('*');
		$this->db->from("haj_omra_order");
		if($where != false){
			$this->db->where($where);
		}
		$this->db->group_by("order_num");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data =$query->result(); $i=0;
			foreach ( $query->result() as $row){
				$data[$i]->full_name=$this->get_mother($row->mother_national_id_fk)["full_name"];
				$i++;
			}
			return $data;
		}
		return false;
	}
	//==========================================
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
	//=======================================
	public function water_fatora_order($where=false)
	{
		$this->db->select('water_fatora_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob');
		$this->db->join('mother','water_fatora_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		return $this->db->get('water_fatora_order')->result();
	}
	public function electrical_fatora_order($where=false)
	{
		$this->db->select('electrical_fatora_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob ');
		$this->db->join('mother','electrical_fatora_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return $this->db->get('electrical_fatora_order')->result();
	}
	public function furniture_order($where=false)
	{
		$this->db->select('furniture_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name');
		$this->db->join('mother','furniture_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('family_setting device','furniture_order.device_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('furniture_order')->result();
	}
	public function medical_center($where=false)
	{
		$this->db->select('medical_center.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name');
		$this->db->join('mother','medical_center.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('f_members','medical_center.child_id_fk=f_members.id','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		$query=$this->db->get('medical_center');
		return 	$query->result();
	}
	public function maintenance_electrical_device_order($where=false)
	{
		$this->db->select('maintenance_electrical_device_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name');
		$this->db->join('mother','maintenance_electrical_device_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('family_setting device','maintenance_electrical_device_order.device_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('maintenance_electrical_device_order')->result();
	}
	public function electrical_device_order($where=false)
	{
		$this->db->select('electrical_device_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name');
		$this->db->join('mother','electrical_device_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('family_setting device','electrical_device_order.device_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('electrical_device_order')->result();
	}
	public function electronic_card($where=false)
	{
		$this->db->select('electronic_card.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name');
		$this->db->join('mother','electronic_card.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		$this->db->join('f_members','electronic_card.child_id_fk=f_members.id','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		return	$this->db->get('electronic_card')->result();
	}

	//==================================================================
	public  function update($table,$arr_conditin,$update_data){
		$this->db->where($arr_conditin);
		$this->db->update($table,$update_data);
	}


}
/* End of file Services_approved_model.php */
/* Location: ./application/models/services_models/Services_approved_model.php */