<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permitsmodel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert()
	{
		$data['emp_code'] 							= $this->input->post('emp_code');
		$data['administrative_affairs_settings_id'] = $this->input->post('administrative_affairs_settings_id');
		$data['administration_id_fk'] 				= $this->input->post('administration_id_fk');
		$data['dep_job_id_fk'] 						= $this->input->post('dep_job_id_fk');
		$data['permit_type'] 						= $this->input->post('permit_type');
		$data['permit_date'] 						= strtotime($this->input->post('permit_date'));
		$data['time_out'] 							= $this->input->post('time_out');
		$data['time_return'] 						= $this->input->post('time_return');
		$data['permit_reason'] 						= $this->input->post('permit_reason');
		$data['month'] 								= date('m');
		$data['year'] 								= date("Y");
		$data['permit_publisher'] 					= $_SESSION['user_id'];
		$data['date'] 								= strtotime(date("Y-m-d"));
		$data['date_s'] 							= time();
		$this->db->insert('permits',$data);
	}

	public function update($id)
	{
		$data['emp_code'] 							= $this->input->post('emp_code');
		$data['administrative_affairs_settings_id'] = $this->input->post('administrative_affairs_settings_id');
		$data['administration_id_fk'] 				= $this->input->post('administration_id_fk');
		$data['dep_job_id_fk'] 					    = $this->input->post('dep_job_id_fk');
		$data['permit_type'] 						= $this->input->post('permit_type');
		$data['permit_date'] 						= strtotime($this->input->post('permit_date'));
		$data['time_out'] 							= $this->input->post('time_out');
		$data['time_return'] 						= $this->input->post('time_return');
		$data['permit_reason'] 						= $this->input->post('permit_reason');
		$data['month'] 								= date('m');
		$data['year'] 								= date("Y");
		$data['permit_publisher'] 					= $_SESSION['user_id'];
		$data['date'] 								= strtotime(date("Y-m-d"));
		$data['date_s'] 							= time();
		$this->db->where('id', $id);
		$this->db->update('permits',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
	    $this->db->delete('permits');
	}

	public function select_permits($where=false)
	{	
		$where['permits.id!='] = 0;
		if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
			$where['permits.administration_id_fk'] = $_SESSION['administration_id'];
			$where['permits.dep_job_id_fk'] = $_SESSION['dep_job_id_fk'];
		}
		if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
			$where['permits.emp_code'] = $_SESSION['emp_code'];
		}
		return $this->db->select('permits.*, employees.employee, mainBranch.name AS main,  subBranch.name AS sub')
			     		->from('permits')
			     		->join('employees','employees.emp_code=permits.emp_code')
			     		->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
						->join('department_jobs AS subBranch','subBranch.id=employees.department')
			     		->where($where)
			     		->order_by('permits.id', 'DESC')
			     		->get()
			     		->result();
	}

	public function select_permitID($id)
	{
		return $this->db->select('*')
			     		->from('permits')
			     		->where('id', $id)
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

	public function permitConfirm($id, $status)
	{
		$data['status'] 			     = $status;
		$data['accept_refuse_publisher'] = $_SESSION['user_id'];
		$data['accept_refuse_reason'] 	 = $this->input->post('accept_refuse_reason');
		$data['accept_refuse_date'] 	 = strtotime(date("Y-m-d"));
		$this->db->where('id', $id);
		$this->db->update('permits',$data);
	}

	public function acceptedPermits()
	{
		$sql = $this->db->select('*')
			     		->from('employees')
			     		->get();
		if ($sql->num_rows() > 0) {
			$i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->permits = $this->select_permits(array('permits.emp_code'=>$row->emp_code));
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function permitsCount()
	{
		return $this->db->select('*')
			     		->from('permits')
			     		->where(array('month'=>date('m'), 'year'=>date('Y'), 'emp_code'=>$_SESSION['emp_code'], 'status'=>1))
			     		->count_all_results();
	}
    
    public function R_permitPeriod($date_from, $date_to, $emp_code)
	{	
		if($emp_code == 'all'){
			$where['permits.id!='] = 0;
			if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
				$where['permits.administration_id_fk'] = $_SESSION['administration_id'];
				$where['permits.dep_job_id_fk'] = $_SESSION['dep_job_id_fk'];
			}
		}
		else{
			$where['permits.emp_code'] = $emp_code;
		}
        //permit_date
		$where['permits.date>='] = strtotime($date_from);
		$where['permits.date<='] = strtotime($date_to);
		return $this->db->select('permits.*, employees.employee, mainBranch.name AS main,  subBranch.name AS sub')
			     		->from('permits')
			     		->join('employees','employees.emp_code=permits.emp_code')
			     		->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
						->join('department_jobs AS subBranch','subBranch.id=employees.department')
			     		->where($where)
			     		->order_by('permits.id', 'DESC')
			     		->get()
			     		->result();
	}

}

/* End of file Permitsmodel.php */
/* Location: ./application/models/Permitsmodel.php */