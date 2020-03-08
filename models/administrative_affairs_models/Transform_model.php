<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transform_model extends CI_Model {

	public function __construct() 
    {
        parent::__construct();
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

	public function select_transforms($where2=false)
	{	
		$where = 'transformation_employee.id!=0 '.$where2;
		if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
			$where = '(transformation_employee.current_sub_dep='.$_SESSION['dep_job_id_fk'].' OR transformation_employee.to_sub_dep='.$_SESSION['dep_job_id_fk'].') '.$where2;
		}
		if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
			$where = 'transformation_employee.emp_id_fk='.$_SESSION['emp_code'].' '.$where2;
		}
		return $this->db->select('transformation_employee.*,employees.address, employees.phone_num, employees.employee, current_mainBranch.name AS current_main, current_subBranch.name AS current_sub, to_mainBranch.name AS to_main, to_subBranch.name AS to_sub, mainBranch.name AS main, subBranch.name AS subs')
			     		->from('transformation_employee')
			     		->join('employees','employees.emp_code=transformation_employee.emp_id_fk')
			     		->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
						->join('department_jobs AS subBranch','subBranch.id=employees.department')
						->join('department_jobs AS current_mainBranch','current_mainBranch.id=transformation_employee.current_main_dep')
						->join('department_jobs AS current_subBranch','current_subBranch.id=transformation_employee.current_sub_dep')
						->join('department_jobs AS to_mainBranch','to_mainBranch.id=transformation_employee.to_main_dep')
						->join('department_jobs AS to_subBranch','to_subBranch.id=transformation_employee.to_sub_dep')
			     		->where($where)
			     		->order_by('transformation_employee.id', 'DESC')
			     		->get()
			     		->result();
	}

	public function mainBranches($mainBranch=false)
	{
		$where = array('department_jobs.from_id_fk'=>0);

		$sql = $this->db->select('department_jobs.*')
				 		->from('department_jobs')
				 		->where($where)
				 		->get();
		if ($sql->num_rows() > 0) {
			$i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->subBranches = $this->getSubBranches($row->id);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function getSubBranches($id)
	{
		$sql = $this->db->select('*')
				 		->from('department_jobs')
				 		->where('from_id_fk',$id)
				 		->get();
		if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function insert()
	{
		$data['emp_id_fk'] 		  = $this->input->post('emp_id_fk');
		$data['current_main_dep'] = $this->input->post('current_main_dep');
		$data['current_sub_dep']  = $this->input->post('current_sub_dep');
		$data['to_main_dep'] 	  = $this->input->post('to_main_dep');
		$data['to_sub_dep'] 	  = $this->input->post('to_sub_dep');
		$data['date_transfer'] 	  = strtotime($this->input->post('date_transfer'));
		$data['details'] 		  = $this->input->post('details');
		$data['publisher'] 		  = $_SESSION['user_id'];
		$data['date'] 			  = strtotime(date("Y-m-d"));
		$data['date_s'] 		  = time();
		$this->db->insert('transformation_employee',$data);
	}

	public function update($id)
	{
		$data['emp_id_fk'] 		  = $this->input->post('emp_id_fk');
		$data['current_main_dep'] = $this->input->post('current_main_dep');
		$data['current_sub_dep']  = $this->input->post('current_sub_dep');
		$data['to_main_dep'] 	  = $this->input->post('to_main_dep');
		$data['to_sub_dep'] 	  = $this->input->post('to_sub_dep');
		$data['date_transfer'] 	  = strtotime($this->input->post('date_transfer'));
		$data['details'] 		  = $this->input->post('details');
		$data['publisher'] 		  = $_SESSION['user_id'];
		$data['date'] 			  = strtotime(date("Y-m-d"));
		$data['date_s'] 		  = time();
		$this->db->where('id', $id);
		$this->db->update('transformation_employee',$data);
	}

	public function select_transformID($id)
	{
		return $this->db->select('*')
			     		->from('transformation_employee')
			     		->where('id', $id)
			     		->get()
			     		->row_array();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
	    $this->db->delete('transformation_employee');
	}

	public function acceptedTransforms($where=false)
	{
		$this->db->select('*')
			     ->from('employees');
		if($where != false){
			$this->db->where($where);
		}
		$sql = $this->db->get();
		if ($sql->num_rows() > 0) {
			$i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->transforms = $this->select_transforms(' AND transformation_employee.emp_id_fk='.$row->emp_code);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function transformConfirm($id, $status)
	{
		$data['approved'] 			  = $status;
		$data['approved_publisher']   = $_SESSION['user_id'];
		$data['accept_refuse_reason'] = $this->input->post('accept_refuse_reason');
		$this->db->where('id', $id);
		$this->db->update('transformation_employee',$data);

		$employee = $this->select_transformID($id);
		if($status == 1) {
			$data2['administration'] = $employee['to_main_dep'];
			$data2['department']	 = $employee['to_sub_dep'];
		}
		else {
			$data2['administration'] = $employee['current_main_dep'];
			$data2['department']	 = $employee['current_sub_dep'];
		}

		$this->db->where('id', $employee['emp_id_fk']);
		$this->db->update('employees',$data2);
	}

}

/* End of file Transform_model.php */
/* Location: ./application/models/administrative_affairs_models/Transform_model.php */