<?php
class Model_services_approved extends CI_Model {

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
        $query=$this->db->get('marriage_help');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,2,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function medical_center($where=false)
	{
		$this->db->select('medical_center.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name')
				 ->join('mother','medical_center.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('f_members','medical_center.child_id_fk=f_members.id','LEFT');
		if($where != false){
			$this->db->where($where);
		}
		 $query=$this->db->get('medical_center');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,3,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function electronic_card($where=false)
	{
		$this->db->select('electronic_card.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name')
				 ->join('mother','electronic_card.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('f_members','electronic_card.child_id_fk=f_members.id','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('electronic_card');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,4,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function electrical_device_order($where=false)
	{
		$this->db->select('electrical_device_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
				 ->join('mother','electrical_device_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('family_setting device','electrical_device_order.device_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('electrical_device_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,6,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function maintenance_electrical_device_order($where=false)
	{
		$this->db->select('maintenance_electrical_device_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
				 ->join('mother','maintenance_electrical_device_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('family_setting device','maintenance_electrical_device_order.device_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('maintenance_electrical_device_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,7,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function furniture_order($where=false)
	{
		$this->db->select('furniture_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
				 ->join('mother','furniture_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('family_setting device','furniture_order.device_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('furniture_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,8,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function electrical_fatora_order($where=false)
	{
		$this->db->select('electrical_fatora_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob ')
				 ->join('mother','electrical_fatora_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('electrical_fatora_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,9,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function water_fatora_order($where=false)
	{
   		$this->db->select('water_fatora_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
				 ->join('mother','water_fatora_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('water_fatora_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,10,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function haj_omra_order($where=false)
	{
		$this->db->select('haj_omra_order.*, mother.m_national_id, mother.m_mob, mother.m_birth_date_hijri, mother.full_name')
				 ->join('mother','haj_omra_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->group_by('haj_omra_order.order_num');
		if($where != false){
			$this->db->where($where);
		}
		$query = $this->db->get('haj_omra_order');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->selectedChildren = $this->getCheckedChildren($row->mother_national_id_fk,$row->order_num,'haj_omra_order');
                $data[$i]->allchildrenWithPerson = $this->childrenWithPerson($row->mother_national_id_fk);
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,11,$row->order_num);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function insurance_medical_device_orders($where=false)
	{
		$this->db->select('insurance_medical_device_orders.*, mother.m_national_id, mother.m_mob, mother.m_birth_date_hijri, mother.full_name, family_setting.title_setting')
				 ->join('mother','insurance_medical_device_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('family_setting','insurance_medical_device_orders.device_medical_id_fk=family_setting.id_setting','LEFT')
				 ->group_by('insurance_medical_device_orders.order_num');
		if($where != false){
			$this->db->where($where);
		}
		$query = $this->db->get('insurance_medical_device_orders');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->selectedChildren = $this->getCheckedChildren($row->mother_national_id_fk,$row->order_num,'insurance_medical_device_orders');
                $data[$i]->allchildrenWithPerson = $this->childrenWithPerson($row->mother_national_id_fk);
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,17,$row->id);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function health_care_orders($where=false)
	{
		$this->db->select('health_care_orders.*, mother.m_national_id, mother.m_mob, mother.full_name, mother.m_birth_date_hijri')
				 ->join('mother','health_care_orders.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->group_by('health_care_orders.order_num');
		if($where != false){
			$this->db->where($where);
		}
		$query = $this->db->get('health_care_orders');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->selectedChildren = $this->getCheckedChildren($row->mother_national_id_fk,$row->order_num,'health_care_orders');
                $data[$i]->allchildrenWithPerson = $this->childrenWithPerson($row->mother_national_id_fk);
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,16,$row->id);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function getCheckedChildren($mother_national_id_fk,$order_num,$table)
	{
		return $this->db->where('mother_national_id_fk',$mother_national_id_fk)
						->where('order_num',$order_num)
						->get($table)
						->result();
	}

	public function childrenWithPerson($national_id)
	{
		return $this->db->query('
								SELECT mother.id AS memberID, mother.full_name AS memberName, mother.m_birth_date AS gender, 2 as type, mother.mother_national_num_fk AS person_num
            					FROM mother
            					WHERE mother.mother_national_num_fk = '.$national_id.'
            					UNION
            					SELECT f_members.id AS memberID, f_members.member_full_name AS memberName, f_members.member_gender AS gender, 1 as type, f_members.mother_national_num_fk AS person_num
            					FROM f_members
            					WHERE f_members.mother_national_num_fk = '.$national_id.' 
								')->result();
	}

	public function home_repairs_order($where=false)
	{
		$this->db->select('home_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
				 ->join('mother','home_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('family_setting device','home_repairs_order.repair_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('home_repairs_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,13,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function restore_repairs_order($where=false)
	{
		$this->db->select('restore_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob , device.title_setting AS device_name')
				 ->join('mother','restore_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
				 ->join('family_setting device','restore_repairs_order.restore_id_fk=device.id_setting','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('restore_repairs_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,14,$row->id);
                $i++;
            }
            return $data;
        }
	}

	public function cars_repairs_order($where=false)
	{
   		$this->db->select('cars_repairs_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
				 ->join('mother','cars_repairs_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('cars_repairs_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,15,$row->id);
                $i++;
            }
            return $data;
        }
    }

	public function school_supplies_order($where=false)
	{
		$this->db->select('school_supplies_order.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, supplies.title_setting AS supplies, f_members.member_full_name')
						->join('mother','school_supplies_order.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('family_setting supplies','school_supplies_order.school_supplies_id_fk=supplies.id_setting','LEFT')
						->join('f_members','school_supplies_order.person_id=f_members.id','LEFT');
		if($where != false){
			$this->db->where($where);
		}
        $query=$this->db->get('school_supplies_order');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->operation_order = $this->get_operation($row->mother_national_id_fk,18,$row->id);
                $i++;
            }
            return $data;
        }
    }

    public function servicesConfirm($id,$status,$table,$filed)
    {
    	$data['approved'] 			= $status;
    	$data['approved_date_ar'] 	= date("Y-m-d");
		$data['approved_publisher'] = $_SESSION['user_id'];
		$data['approved_reason'] 	= $this->input->post('approved_reason');
		$this->db->where($filed, $id);
		$this->db->update($table,$data);
    }

    public  function get_operation($mother_national_num_fk,$service_id_fk,$order_id_fk){
        $this->db->select('*');
        $this->db->from("operation_service");
        $this->db->where("service_id_fk",$service_id_fk);
        $this->db->where("order_id_fk",$order_id_fk);
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function set_operation($process)
    {
        $data['mother_national_num_fk']=$this->input->post('id_mother_national') ;
        $data['order_id_fk'] 	=  $this->input->post('id');

        $data['service_file_from'] = $_SESSION['head_dep_id_fk'];
        $data['service_file_to'] 	= $_SESSION['head_dep_id_fk'];
        $data['from_user'] 	= $_SESSION['user_id'];
        $data['to_user'] 	= $_SESSION['user_id'];
        $data['process'] 	= $process;

        $data['reason'] 	= $this->input->post('approved_reason');
        $data['date'] 	= strtotime(date("Y-m-d",time()));
        $data['date_s'] 	= time();
        $data['publisher'] 	= $_SESSION['user_id'];
        $data['service_id_fk'] 	= $this->input->post('service_id_fk');
        $data['service_table'] 	= $this->input->post('table');
       $this->db->insert("operation_service",$data);
    }
  //=========================================================
    public  function insert_transfer($process){

        $data['mother_national_num']=$this->input->post('id_mother_national') ;
        $data['order_num'] 	=  $this->input->post('id');
        $data['date'] 	= strtotime(date("Y-m-d",time()));
        $data['month_transfer'] 	= date("n");
        $data['process'] 	= $process;
        $data['person_transfer'] 	= $_SESSION['user_id'];
        $this->db->insert("transformation_lagna",$data);
    }


}  // END CLASS

/* End of file Services_approved_model.php */
/* Location: ./application/models/services_models/Services_approved_model.php */