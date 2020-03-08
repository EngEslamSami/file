<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_report_model extends CI_Model {

	public function getMothers()
	{
		return $this->db->select('mother.*,basic.mother_national_num')
						->join('mother','mother.mother_national_num_fk=basic.mother_national_num','LEFT')
						->where('basic.suspend',4)
						->get('basic')
						->result();
	}

	public function motherData($mother_national_num_fk)
	{
		return $this->db->select('mother.*, nationality.title_setting AS title, living.title_setting AS place, id_type.title_setting AS idType, health.title_setting AS health, job.title_setting AS job, education.title_setting AS education, education_status.title_setting AS education_status')
						->join('family_setting nationality','mother.m_nationality=nationality.id_setting','LEFT')
						->join('family_setting living','mother.m_living_place_id_fk=living.id_setting','LEFT')
						->join('family_setting id_type','mother.m_national_id_type=id_type.id_setting','LEFT')
						->join('family_setting health','mother.m_health_status_id_fk=health.id_setting','LEFT')
						->join('family_setting job','mother.m_job_id_fk=job.id_setting','LEFT')
						->join('family_setting education','mother.m_education_level_id_fk=education.id_setting','LEFT')
						->join('family_setting education_status','mother.m_education_status_id_fk=education_status.id_setting','LEFT')
						->where('mother.mother_national_num_fk',$mother_national_num_fk)
						->get('mother')
						->row_array();
	}

	public function fatherData($mother_national_num_fk)
	{
		return $this->db->select('father.*, nationality.title_setting AS title,
                                             id_type.title_setting AS idType,
                                             job.title_setting AS job,
                                             death.title_setting AS death ,
                                             nation_place.title_setting AS nation_place_title ,
                                             death_reason.title_setting AS death_reason_title ')
						->join('family_setting id_type','father.f_national_id_type=id_type.id_setting','LEFT')
						->join('family_setting nationality','father.f_nationality_id_fk=nationality.id_setting','LEFT')
						->join('family_setting job','father.f_job=job.id_setting','LEFT')
						->join('family_setting death','father.f_death_id_fk=death.id_setting','LEFT')
                        ->join('family_setting death_reason','father.f_death_id_fk=death_reason.id_setting','LEFT')
                        ->join('family_setting nation_place','father.f_national_id_place=nation_place.id_setting','LEFT')
						->where('father.mother_national_num_fk',$mother_national_num_fk)
						->get('father')
						->row_array();
	}

	public function childrenData($mother_national_num_fk)
	{
		return $this->db->select('f_members.*, job.title_setting AS job')
						->join('family_setting job','f_members.member_job=job.id_setting','LEFT')
						->where('f_members.mother_national_num_fk',$mother_national_num_fk)
						->get('f_members')
						->result();
	}

	public function houseData($mother_national_num_fk)
	{
		return $this->db->select('houses.*, area.title_setting AS area, city.title_setting AS city, houseType.title_setting AS houseType, houseDirect.title_setting AS houseDirect, houseStatus.title_setting AS houseStatus, houseOwner.title_setting AS houseOwner')
						->join('family_setting area','houses.h_area_id_fk=area.id_setting','LEFT')
						->join('family_setting city','houses.h_city_id_fk=city.id_setting','LEFT')
						->join('family_setting houseType','houses.h_house_type_id_fk=houseType.id_setting','LEFT')
						->join('family_setting houseDirect','houses.h_house_direction=houseDirect.id_setting','LEFT')
						->join('family_setting houseStatus','houses.h_house_status_id_fk=houseStatus.id_setting','LEFT')
						->join('family_setting houseOwner','houses.h_house_owner_id_fk=houseOwner.id_setting','LEFT')
						->where('houses.mother_national_num_fk',$mother_national_num_fk)
						->get('houses')
						->row_array();
	}

	public function deviceData($mother_national_num_fk)
	{
		return $this->db->select('devices.*, device.title_setting AS device')
						->join('family_setting device','devices.d_house_device_id_fk=device.id_setting','LEFT')
						->where('devices.mother_national_num_fk',$mother_national_num_fk)
						->get('devices')
						->result();
	}

	public function financeData($mother_national_num_fk)
	{
		return $this->db->select('financial.*, bank.title_setting AS bank')
						->join('family_setting bank','financial.f_bank_id_fk=bank.id_setting','LEFT')
						->where('financial.mother_national_num_fk',$mother_national_num_fk)
						->get('financial')
						->row_array();
	}

	public function selectDataServices($mother_national_id_fk)
	{
		$tables = array(2=>'marriage_help',
               3=>'medical_center', 4=>'electronic_card', 
                   5=>'', 6=>'electrical_device_order', 
                      7=>'maintenance_electrical_device_order',
                        8=>'furniture_order', 9=>'electrical_fatora_order', 
                         10=>'water_fatora_order', 11=>'haj_omra_order',
                          12=>'haj_omra_order', 13=>'home_repairs_order', 
                          14=>'restore_repairs_order', 15=>'cars_repairs_order', 
                          16=>'health_care_orders', 17=>'insurance_medical_device_orders', 
                          18=>'school_supplies_order');
		$where = '';
		$i = count($tables);
		$query = '';
		foreach ($tables as $key => $table) {
			$i--;
			if($key == 5){
				continue;
			}
			$query .= 'SELECT '.$table.'.mother_national_id_fk, '.$table.'.approved, '.$key.' AS tableName FROM '.$table.' WHERE '.$table.'.mother_national_id_fk='.$mother_national_id_fk;
			if($key == 11) {
				$query .= ' AND '.$table.'.type=1 ';
			}
			if($key == 12) {
				$query .= ' AND '.$table.'.type=2 ';
			}
			if($i > 0) {
				$query .= ' UNION ';
			}
		}
        return $this->db->query($query)->result();
	}

	public function select_categories()
	{
		$sql = $this->db->get('service_categories');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row) {
				$data[$row->id] = $row;
				$i++;
			}
			return $data;
		}
		return false;
	}

}

/* End of file Family_report_model.php */
/* Location: ./application/models/familys_models/Family_report_model.php */