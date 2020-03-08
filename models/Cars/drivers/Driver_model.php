<?php

class Driver_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || empty($post_value) ){
            return 0;
        }else{
            return $post_value;
        }
    }
    public function get_from_emp_setting($type)
    {
        $this->db->where('type', $type);
        $query = $this->db->get('employees_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_from_cars_setting($type)
    {
        $this->db->where('type', $type);
        $query = $this->db->get('cars_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_all_adminstration($id)
    {
        $this->db->where('from_id_fk', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_all_emps($id)
    {

        $this->db->where('administration', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_data($id)
    {
/*        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/
        $data['markz_taklfa_fk'] = $this->input->post('markz_taklfa_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_d_fk'] = $this->get_qsm($this->input->post('emp_id_fk'));
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['license_num	'] = $this->input->post('license_num');
        $data['esdar_date'] = $this->input->post('esdar_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['licence_type_fk'] = $this->input->post('licence_type_fk');
        $data['blood_fasila'] = $this->input->post('blood_fasila');
        if($this->input->post('edara_id_fk') =='0'){

            $data['person_type'] = 2;
            $data['person_name'] = $this->input->post('person_name');
            $data['person_nationality_fk'] = $this->input->post('nationality');
            $data['person_card_num'] = $this->input->post('card_num');
            $data['person_job_title'] = $this->input->post('person_job_title');
            $data['person_mob'] =     $this->input->post('phone');

        }else{

            $data['person_type'] = 1;
            $data['emp_job_title_fk'] = $this->input->post('job_title_id_fk');
            $data['emp_num_wazyfy'] =  $this->chek_Null($this->input->post('num_wazyfy'));
            $data['emp_card_num'] = $this->input->post('card_num');
            $data['emp_mob'] = $this->input->post('phone');
            $data['emp_nationality_fk'] = $this->input->post('person_nationality_fk');

        }
        if(!empty($id)){

            $this->db->where('id', $id);
            $this->db->update('car_drivers', $data);

        }else{

            $data['date'] = date("Y-m-d");
            $data['date_s'] = strtotime(date("Y-m-d"));
            $data['publisher'] = $_SESSION['user_username'];
            $this->db->insert('car_drivers', $data);

        }



    }



    /*    public function insert_data()
    {
        $data['markz_taklfa_fk'] = $this->input->post('markz_taklfa_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_d_fk'] = $this->get_qsm($this->input->post('emp_id_fk'));
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['license_num	'] = $this->input->post('license_num');
        $data['esdar_date'] = $this->input->post('esdar_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['licence_type_fk'] = $this->input->post('licence_type_fk');
        $data['blood_fasila'] = $this->input->post('blood_fasila');
        $data['date'] = date("Y-m-d");
        $data['date_s'] = strtotime(date("Y-m-d"));
        $data['publisher'] = $_SESSION['user_username'];

        $this->db->insert('car_drivers', $data);
    }*/

    public function update_data($id)
    {
        $data['markz_taklfa_fk'] = $this->input->post('markz_taklfa_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_d_fk'] = $this->get_qsm($this->input->post('emp_id_fk'));
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['license_num	'] = $this->input->post('license_num');
        $data['esdar_date'] = $this->input->post('esdar_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['licence_type_fk'] = $this->input->post('licence_type_fk');
        $data['blood_fasila'] = $this->input->post('blood_fasila');
        $data['date'] = date("Y-m-d");
        $data['date_s'] = strtotime(date("Y-m-d"));
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where('id', $id);
        $this->db->update('car_drivers', $data);
    }

    public function get_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->department;
        } else {
            return 0;
        }
    }

    public function get_all_drivers()
    {
        $query = $this->db->get('car_drivers');
        $data = array();
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            if($row->person_type ==1){
                $data[$x]->name = $this->get_name($row->emp_id_fk);
            }elseif ($row->person_type ==2){
                $data[$x]->name = $row->person_name;
            }

            $data[$x]->fasila_dm = $this->fasila_dm($row->blood_fasila);
            $data[$x]->markz = $this->fasila_dm($row->markz_taklfa_fk);
            $x++;
        }
        return $data;

    }

    public function get_name($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->employee;
        } else {
            return 0;
        }
    }

    public function fasila_dm($type)
    {
        $this->db->where('id_setting', $type);
        $query = $this->db->get('employees_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return false;
        }
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('car_drivers');
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }
    }

    public function delete_record($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('car_drivers');
    }

    public function get_all_cars()
    {
        return $this->db->get('cars')->result();
    }

    public function get_all_employees()
    {
        return $this->db->get('employees')->result();
    }

    public function insert_car_relation($img)
    {
        $data['car_id_fk'] = $this->input->post('car_id_fk');
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');


        $data['driver_type'] = $this->input->post('driver_type');
        $data['tafwed_date_from'] = $this->input->post('tafwed_date_from');
        $data['tafwed_date_to'] = $this->input->post('tafwed_date_to');
        $data['tafwed_img'] = $img;
        $data['responsible_emp_id'] = $this->input->post('responsible_emp_id');
        $data['responsible_edara_id'] = $this->get_edara($this->input->post('emp_id_fk'));
        $data['responsible_qsm_id'] = $this->get_qsm($this->input->post('emp_id_fk'));

        $data['date'] = date("Y-m-d");
        $data['date_s'] = strtotime(date("Y-m-d"));
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert(' car_drivers_relation', $data);
    }

    public function get_edara($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->administration;
        } else {
            return 0;
        }
    }
    
    
    
    
    
}