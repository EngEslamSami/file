<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 02/06/2019
 * Time: 11:10 ص
 */

class Person_profile_model extends CI_Model
{


    public function get_person_data()
    {

        switch ($_SESSION['role_id_fk']) {
            case 1:
            case 5:
                $data = $this->get_user_data($_SESSION['user_id']);
                break;
            case 2:
            case 4:
                $data = $this->get_member_data($_SESSION['emp_code']);
                break;
            case 3:
                $data = $this->get_emp_data($_SESSION['emp_code']);
                break;

        }

        return $data;
    }

    public function get_user_data($id)
    {
        $q = $this->db->where('user_id', $id)->get('users')->row();
        $q->name = $q->user_name;
        $q->img = $q->user_photo;
        if ($q->role_id_fk == 1) {
            $q->edara = 'مدير على نظام ';
            $q->job = 'مدير على نظام ';
        } elseif ($q->role_id_fk == 5) {
            $q->edara = ' متطوع ';
            $q->job = ' متطوع ';
        }
        return $q;
    }

    public function get_member_data($id)
    {
        $q = $this->db->select('md_all_gam3ia_omomia_members.*, users.*')
            ->where('id', $id)
            ->join('users', 'users.emp_code = md_all_gam3ia_omomia_members.id')
            ->get('md_all_gam3ia_omomia_members')->row();
        $q->img = $q->user_photo;
        if ($q->role_id_fk == 3) {
            $q->edara = ' عضو مجلس ادارة';
            $q->job = ' عضو مجلس ادارة ';
        } elseif ($q->role_id_fk == 4) {
            $q->edara = ' عضو جمعية العمومية  ';
            $q->job = ' عضو جمعية العمومية ';
        }
        return $q;
    }

    public function get_emp_data($id)
    {
        $q = $this->db->select('employees.*, users.*')
            ->where('id', $id)
            ->join('users', 'users.emp_code = employees.id')
            ->get('employees')
            ->row();

        $q->name = $q->employee;
        $q->img = $q->user_photo;
        $q->edara = $this->get_edara_name_or_qsm($q->administration);
        $q->department = $this->get_edara_name_or_qsm($q->department);
        $q->job = $this->get_job_title($q->degree_id);
        return $q;

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

    public function update_users($id, $file)
    {
        $password = $this->input->post('user_pass', true);
        if (!empty($password)) {
            $password = sha1(md5($password));
            $data['user_pass'] = $password;
        }

        if (!empty($file)) {
            $data['user_photo'] = $file;
        }
        $data['user_name'] = $this->input->post('user_name');
        $data['user_username'] = $this->input->post('user_name');
        $data['user_phone'] = $this->input->post('user_phone');
        $data['user_id_number'] = $this->input->post('id_number');
        $emp_code = $this->input->post('emp_code');
        if (!empty($emp_code)) {
            $data['emp_code'] = $this->input->post('emp_code');
        }
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }

    public function upload_img($id,$file)
    {
        if (!empty($file)) {
            $data['user_photo'] = $file;
            $this->db->where('user_id', $id);
            $this->db->update('users', $data);
        }

    }

}