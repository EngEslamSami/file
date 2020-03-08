<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_details_model extends CI_Model {

	public function insert()
	{
		$data['car_type_id_fk']       = $this->input->post('car_type_id_fk');	
		$data['engine_code'] 		  = $this->input->post('engine_code');	
		$data['insurance_start_date'] = strtotime($this->input->post('insurance_start_date'));
		$data['insurance_end_date']   = strtotime($this->input->post('insurance_end_date'));
		$data['company_id_fk'] 		  = $this->input->post('company_id_fk');	
		$data['insurance_cost'] 	  = $this->input->post('insurance_cost');	
		$data['insurance_date']       = strtotime($this->input->post('insurance_date'));
		$data['license_end_date']     = strtotime($this->input->post('license_end_date'));
		$data['car_code'] 		      = $this->input->post('car_code');	
		$this->db->insert('cars',$data);
	}

	public function update($id)
	{
		$data['car_type_id_fk']       = $this->input->post('car_type_id_fk');	
		$data['engine_code'] 		  = $this->input->post('engine_code');	
		$data['insurance_start_date'] = strtotime($this->input->post('insurance_start_date'));
		$data['insurance_end_date']   = strtotime($this->input->post('insurance_end_date'));
		$data['company_id_fk'] 		  = $this->input->post('company_id_fk');	
		$data['insurance_cost'] 	  = $this->input->post('insurance_cost');	
		$data['insurance_date']       = strtotime($this->input->post('insurance_date'));
		$data['license_end_date']     = strtotime($this->input->post('license_end_date'));
		$data['car_code'] 		      = $this->input->post('car_code');	
		$this->db->where('id', $id);
		$this->db->update('cars',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cars');
	}

	public function select()
	{
		return $this->db->select('cars.*,car_type.name AS type, company.name AS company_name')
						->join('companies_and_cars_types car_type','car_type.id=cars.car_type_id_fk')
						->join('companies_and_cars_types company','company.id=cars.company_id_fk')
			     		->order_by('cars.id', 'DESC')
			     		->get('cars')
			     		->result();
	}

	public function companies_and_cars_types($type)
	{
		return $this->db->select('*')
						->where('type',$type)
			     		->get('companies_and_cars_types')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('cars')
			     		->row_array();
	}

	public function R_cars(){
        $date_from = strtotime( 'first day of ' . date( 'F Y'));
        $date_to = strtotime(date('Y-m-d'));
        return $this->db->query('SELECT car.*
                                , (SELECT COUNT(*) FROM orders_car WHERE orders_car.car_id_fk = car.id AND (orders_car.date_from >= '.$date_from.' AND orders_car.date_from <= '.$date_to.' OR orders_car.date_to >= '.$date_from.' AND orders_car.date_to <= '.$date_to.')) AS count_orders
                                , (SELECT COUNT(*) FROM car_violation WHERE car_violation.car_id_fk = car.id AND car_violation.date >= '.$date_from.' AND car_violation.date <= '.$date_to.') AS count_vio
                                , (SELECT COUNT(*) FROM car_crashes WHERE car_crashes.car_id_fk = car.id AND car_crashes.date >= '.$date_from.' AND car_crashes.date <= '.$date_to.') AS count_crash
                                FROM cars car')->result();
    }

}

/* End of file Cars_details_model.php */
/* Location: ./application/models/Cars/Cars_details_model.php */