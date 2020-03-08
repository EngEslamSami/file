<?php

class Solaf_requests_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function get_all_emp()
    {

        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
            }
            return $q;
        }
    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }
	public function insert_solfa()
    {
        $data = $this->get_data();

        $this->db->insert('hr_solaf', $data);
        if(   $this->input->post('qst_num')>0)
        {
            $x= $this->input->post('qst_num');
for($i=0;$i<$x;$i++)
{
    $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
    $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
    $dataw['value_of_qst'] = round(( $this->input->post('qemt_solaf')/ $this->input->post('qst_num'))*10)/10;
    $this->db->insert('hr_solaf_quest', $dataw);
}

        }
    }

    public function update_by_id($id)
    {
        $data = $this->get_data();
        $this->db->where('id', $id)->update('hr_solaf', $data);
        if(   $this->input->post('qst_num')>0)
        {
            $x= $this->input->post('qst_num');
            $this->db->where('t_rkm_fk', $id)->delete('hr_solaf_quest');
for($i=0;$i<$x;$i++)
{

    $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
    $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
    $dataw['value_of_qst'] = round(( $this->input->post('qemt_solaf')/ $this->input->post('qst_num'))*10)/10;
    $this->db->insert('hr_solaf_quest', $dataw);
}

        }
    }
	  public function select_depart($id = false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if (!empty($id)) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("id", $_SESSION['emp_code']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->get_edara_name_or_qsm($row->administration);
                $arr[$a]->departments_name = $this->get_edara_name_or_qsm($row->department);
                $arr[$a]->job_title = $this->get_job_title($row->degree_id);
                $arr[$a]->manger_name = $this->get_direct_manager_name_by_emp_id($row->id)->manager_name;

                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
	public function get_last_rkm()
{
    $this->db->select('t_rkm');
    $this->db->order_by('id','desc');
    $query=$this->db->get('hr_solaf');
    if($query->num_rows()>0)
    {
        return $query->row()->t_rkm + 1;
    }else{
        return 1;
    }

}

    public function select_all_defined($type)
    {
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type", $type);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
	  public function get_emp($id)
    {

        $this->db->where_not_in('id', $id);
        return $this->db->get('employees')->result();
    }
	public function get_emp2()
    {
        return $this->db->query('
                            SELECT c.*, COALESCE(f.allDayes,0) AS allDayes, f.casual_vacation_num, COALESCE(a.vDayes,0) AS vDayes, COALESCE(b.casual,0) AS casual
                            FROM (
                                SELECT *
                                From employees ) c

                             LEFT JOIN
                            (
                                SELECT COALESCE((year_vacation_num + vacation_previous_balance),0) AS allDayes, emp_code, casual_vacation_num
                                From contract_employe
                            ) f
                            on (f.emp_code=c.emp_code)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS vDayes, emp_id_fk
                                From hr_all_agzat_orders
                                WHERE no3_agaza!=0 AND suspend != 0
                            ) a
                            on (a.emp_id_fk=c.id)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS casual, emp_id_fk
                                From hr_all_agzat_orders
                                WHERE no3_agaza=0 AND suspend != 0
                            ) b
                            on (b.emp_id_fk=c.id)
                            ')->result();
    }
 public function get_all_solfa()
    {

        $query= $this->db->get(' hr_solaf');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
	public function GetReplacementEmployee($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->order_by('emp_code', 'ASC');
        return $this->db->get('employees')->result();
    }
	 public function delete_from_table($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }
    public function delete_from_table_solaf($id, $table)
    {
        $this->db->where('t_rkm_fk', $id);
        $this->db->delete($table);
    }

    // omnia
	public function get_data()
    {

        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['emp_code_fk'] = $this->input->post('emp_code_fk');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['job_title'] = $this->input->post('job_title');
        $data['t_rkm'] = $this->input->post('t_rkm');
        //$data['t_rkm_date_h'] = $this->input->post('t_rkm_date_h');
     $data['t_rkm_date_m'] = $this->input->post('t_rkm_date_m');


        $data['qemt_solaf'] = $this->input->post('qemt_solaf');
        $data['sadad_solfa'] = $this->input->post('sadad_solfa');
        $data['qst_num'] = $this->input->post('qst_num');

        $data['khsm_form_date_m'] = $this->input->post('khsm_form_date_m');
        $data['khsm_to_date_m'] = $this->input->post('khsm_to_date_m');
        $data['hd_solfa'] = $this->input->post('hd_solfa');
       $data['previous_request_date_m'] = $this->input->post('previous_request_date_m');
       // $data['previous_request_date_h'] = $this->input->post('previous_request_date_h');
        $data['solaf_reason'] = $this->input->post('solaf_reason');
        $data['num_previous_requests'] = $this->input->post('num_previous_requests');
        $data['direct_manager_id_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manger;
        $data['direct_manager_code_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_code;
        $data['direct_manager_n'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_name;
        if ($this->input->post('emp_id_fk') && (!empty($this->input->post('emp_id_fk')))) {



            $data['current_from_user_name'] = $this->input->post('emp_name');
            $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

            $data['current_to_user_name'] = $data['direct_manager_n'];
            $data['current_to_user_id'] = $this->get_user_id($data['direct_manager_id_fk']);


            $data['level'] = 1;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;

        } else {

            $data['current_from_user_name'] = $this->input->post('emp_name');
            $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

            $data['current_to_user_name'] = $data['direct_manager_n'];
            $data['current_to_user_id'] = $this->get_user_id($data['direct_manager_id_fk']);

            $data['level'] = 2;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;

        }

        return $data;
    }
    // omnia
    public function get_transformation_setting($level)
    {

        $q = $this->db->where('level', $level)->where('tbl', 'solfa')->get('hr_all_transformation_setting')->row();

        if (!empty($q)) {
            return $q;
        }
    }

    public function get_user_id($emp_code)
    {

        $q = $this->db->where('emp_code', $emp_code)->get('users')->row();

        if (!empty($q)) {
            return $q->user_id;
        }
    }
    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,
        manager_table.employee as manager_name,manager_table.emp_code as manager_code');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

	 public function get_solfa_by_id($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('hr_solaf');
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $query->emp_name = $this->select_depart_with_out_session($query->emp_id_fk)->employee;

            return $query;
        } else {
            return 0;
        }
    }
	public function select_depart_with_out_session($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
	  public function getName($id)
    {
        $this->db->select('id,name');
        $this->db->from('department_jobs');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->name;
        } else {
            return 0;
        }

    }

    //new
    public function get_by_t_rkm($t_rkm)
    {
        $this->db->where('t_rkm',$t_rkm);
        $query=$this->db->get('hr_solaf');
        if($query->num_rows()>0)
        {


            return $query->result();
        }else{
            return false;
        }
    }




}// END CLASS
