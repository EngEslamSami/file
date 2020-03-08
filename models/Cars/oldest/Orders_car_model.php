<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_car_model extends CI_Model {

	public function insert()
	{
		$data['car_id_fk'] 	 	   = $this->input->post('car_id_fk');		
		$data['driver_id_fk'] 	   = $this->input->post('driver_id_fk');
		$data['counter_number_go'] = $this->input->post('counter_number_go');
		$data['place_from'] 	   = $this->input->post('place_from');
		$data['place_to'] 		   = $this->input->post('place_to');
		$data['date_from'] 		   = strtotime($this->input->post('date_from'));
		$data['date_to'] 		   = strtotime($this->input->post('date_to'));
		$data['date'] 			   = strtotime(date("Y-m-d"));
		$data['date_s'] 		   = time();
		$data['add_by'] 		   = $_SESSION['user_id'];
		$this->db->insert('orders_car',$data);
	}

	public function update($id)
	{
		$data['car_id_fk'] 	 	   = $this->input->post('car_id_fk');		
		$data['driver_id_fk'] 	   = $this->input->post('driver_id_fk');
		$data['counter_number_go'] = $this->input->post('counter_number_go');
		$data['place_from'] 	   = $this->input->post('place_from');
		$data['place_to'] 		   = $this->input->post('place_to');
		$data['date_from'] 		   = strtotime($this->input->post('date_from'));
		$data['date_to'] 		   = strtotime($this->input->post('date_to'));
		$data['date'] 			   = strtotime(date("Y-m-d"));
		$data['date_s'] 		   = time();
		$data['add_by'] 		   = $_SESSION['user_id'];
		$this->db->where('id', $id);
		$this->db->update('orders_car',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('orders_car');
	}

	public function select()
	{
		return $this->db->select('orders_car.*, cars.car_code, drivers.driver_name')
						->join('cars','cars.id=orders_car.car_id_fk')
						->join('drivers','drivers.id=orders_car.driver_id_fk')
			     		->order_by('id', 'DESC')
			     		->get('orders_car')
			     		->result();
	}

	public function select_cars($id=false)
	{
		if($id == false) {
			return $this->db->query('SELECT t1.*, t3.name
									FROM cars t1
									LEFT JOIN orders_car t2 ON (t2.car_id_fk=t1.id AND t2.return_car=0)
									LEFT JOIN companies_and_cars_types t3 ON (t3.id=t1.car_type_id_fk)
									WHERE t2.car_id_fk IS NULL
									ORDER BY t1.id
									')->result();
		}
		else {
			return $this->db->query('SELECT t1.*, t3.name
									FROM cars t1
									LEFT JOIN orders_car t2 ON (t2.car_id_fk=t1.id AND t2.return_car=0)
									LEFT JOIN companies_and_cars_types t3 ON (t3.id=t1.car_type_id_fk)
									WHERE t2.car_id_fk IS NULL
									UNION
									SELECT t1.*, t3.name
									FROM cars t1
									LEFT JOIN companies_and_cars_types t3 ON (t3.id=t1.car_type_id_fk)
									WHERE t1.id='.$id.'
									')->result();
		}
	}

	public function select_drivers($id=false)
	{
		if($id == false) {
			return $this->db->query('SELECT t1.*
									FROM drivers t1
									LEFT JOIN orders_car t2 ON (t2.driver_id_fk=t1.id AND t2.return_car=0)
									WHERE t2.driver_id_fk IS NULL
									ORDER BY t1.id
									')->result();
		}
		else {
			return $this->db->query('SELECT t1.*
									FROM drivers t1
									LEFT JOIN orders_car t2 ON (t2.driver_id_fk=t1.id AND t2.return_car=0)
									WHERE t2.driver_id_fk IS NULL
									UNION
									SELECT t1.*
									FROM drivers t1
									WHERE t1.id='.$id.'
									')->result();
		}
	}

	public function selectByID($id)
	{
		return $this->db->select('orders_car.*, cars.car_type_id_fk, companies_and_cars_types.name AS type_name')
						->join('cars','cars.id=orders_car.car_id_fk')
						->join('companies_and_cars_types','companies_and_cars_types.id=cars.car_type_id_fk')
			     		->where('orders_car.id', $id)
			     		->get('orders_car')
			     		->row_array();
	}

	public function car_return($id)
	{
		$data['counter_number_return'] = $this->input->post('counter_number_return');
		$data['return_car'] = 1;
		$this->db->where('id', $id);
		$this->db->update('orders_car',$data);
	}

	public function R_status()
	{
		return $this->db->query('
			SELECT drivers.driver_name AS name, 1 AS type, 0 AS status
			FROM drivers 
			LEFT JOIN orders_car ON (orders_car.driver_id_fk=drivers.id AND orders_car.return_car=0)
			WHERE orders_car.driver_id_fk IS NULL
			
			UNION

			SELECT cars.car_code AS name, 2 AS type, 0 AS status
			FROM cars 
			LEFT JOIN orders_car ON (orders_car.car_id_fk=cars.id AND orders_car.return_car=0)
			WHERE orders_car.car_id_fk IS NULL

			UNION

			SELECT cars.car_code AS name, drivers.driver_name AS type, 1 AS status
			FROM orders_car 
			LEFT JOIN cars ON (cars.id=orders_car.car_id_fk)
			LEFT JOIN drivers ON (drivers.id=orders_car.driver_id_fk)
			WHERE orders_car.return_car=0
			')->result();
	}

}

/* End of file Orders_car_model.php */
/* Location: ./application/models/Cars/Orders_car_model.php */