<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resignation_model extends CI_Model {

	public function __construct() 
    {
        parent::__construct();
    }

    public function select_employeeById($id)
	{
		return $this->db->select('employees.*, mainBranch.name AS main, mainBranch.id AS mainID, subBranch.name AS sub, subBranch.id AS subID, (administrative_affairs_settings.ozon_num+administrative_affairs_settings.ozon_num_extra) AS total')
						->from('employees')
						->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
						->join('department_jobs AS subBranch','subBranch.id=employees.department')
						->join('administrative_affairs_settings','employees.group_affairs_id_fk=administrative_affairs_settings.id')
						->where('employees.emp_code', $id)
						->get()
						->row_array();
	}	

	public function select_employees($where)
	{
		return $this->db->select('*')
			     		->from('employees')
			     		->where($where)
			     		->get()
			     		->result();
	}

	public function insert()
	{
		$data['emp_id_fk'] 		  = $this->input->post('emp_id_fk');
		$data['main_dep'] 		  = $this->input->post('main_dep');
		$data['sub_dep']  		  = $this->input->post('sub_dep');
		$data['type'] 	  		  = $this->input->post('type');
		$data['other_type'] 	  = $this->input->post('other_type');
		$data['request_date'] 	  = strtotime($this->input->post('request_date'));
		$data['date_resignation'] = strtotime($this->input->post('date_resignation'));
		$data['reason'] 		  = $this->input->post('reason');
		$data['publisher'] 		  = $_SESSION['user_id'];
		$data['date'] 			  = strtotime(date("Y-m-d"));
		$data['date_s'] 		  = time();
		$this->db->insert('resignation',$data);
	}

	public function update($id)
	{
		$data['emp_id_fk'] 		  = $this->input->post('emp_id_fk');
		$data['main_dep'] 		  = $this->input->post('main_dep');
		$data['sub_dep']  		  = $this->input->post('sub_dep');
		$data['type'] 	  		  = $this->input->post('type');
		$data['other_type'] 	  = $this->input->post('other_type');
		$data['request_date'] 	  = strtotime($this->input->post('request_date'));
		$data['date_resignation'] = strtotime($this->input->post('date_resignation'));
		$data['reason'] 		  = $this->input->post('reason');
		$data['publisher'] 		  = $_SESSION['user_id'];
		$data['date'] 			  = strtotime(date("Y-m-d"));
		$data['date_s'] 		  = time();
		$this->db->where('id', $id);
		$this->db->update('resignation',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
	    $this->db->delete('resignation');
	}

	public function select_resignations($where=false)
	{	
		$where['resignation.id!='] = 0;
		if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
			$where['resignation.main_dep'] = $_SESSION['administration_id'];
			$where['resignation.sub_dep'] = $_SESSION['dep_job_id_fk'];
		}
		if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
			$where['resignation.emp_id_fk'] = $_SESSION['emp_code'];
		}
		return $this->db->select('resignation.*, employees.employee, mainBranch.name AS main,  subBranch.name AS sub')
			     		->from('resignation')
			     		->join('employees','employees.emp_code=resignation.emp_id_fk')
			     		->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
						->join('department_jobs AS subBranch','subBranch.id=employees.department')
			     		->where($where)
			     		->order_by('resignation.id', 'DESC')
			     		->get()
			     		->result();
	}

	public function select_resignationID($id)
	{
		return $this->db->select('*')
			     		->from('resignation')
			     		->where('id', $id)
			     		->get()
			     		->row_array();
	}

	public function resignationConfirm($id, $status)
	{
		$data['approved'] 			  = $status;
		$data['approved_publisher']   = $_SESSION['user_id'];
		$this->db->where('id', $id);
		$this->db->update('resignation',$data);

		$employee = $this->select_resignationID($id);
		if($status == 1) {
			$data2['leave_emp'] = 1;
		}
		else {
			$data2['leave_emp'] = 0;
		}

		$this->db->where('id', $employee['emp_id_fk']);
		$this->db->update('employees',$data2);
	}
    
    
    	public function getById($id){
		$this->db->select('*');
		$this->db->from("resignation");
		$this->db->where(array('id'=>$id));
		$query = $this->db->get();
		$a=0;
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$a] = $row;
				$data[$a]->emp_name = $this->getEmp_name($row->emp_id_fk);
				$data[$a]->emp_job = $this->getEmp_job($row->emp_id_fk);
				$a++;}
			return $data;
		}else{
			return 0;
		}
	}

	public function getEmp_name($id){
		$h = $this->db->get_where("employees", array('id'=>$id));
		return $h->row_array();

	}

	public function getEmp_job($id){
		$h = $this->db->get_where("employees", array('id'=>$id));
		return $h->row_array();

	}
    
    
    

}

/* End of file Resignation_model.php */
/* Location: ./application/models/administrative_affairs_models/Resignation_model.php */