<?php

class Agazat_model extends CI_Model
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

//=============================================================================================================//


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

                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }

    public function delete_from_table($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }


    public function GetReplacementEmployee($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->order_by('emp_code', 'ASC');
        return $this->db->get('employees')->result();
    }


    public function insert_vacation()
    {
        $data = $this->get_data();
        $data['agaza_rkm'] = $this->get_agaza_rkm();
        $data['agaza_date'] = strtotime(date('Y-m-d'));
        $data['agaza_date_ar'] = date('Y-m-d');
        $data['month'] = date('m');
        $data['year'] = date('Y');
        $this->db->insert('hr_all_agzat_orders', $data);
    }

    public function update_by_id($id)
    {
        $data = $this->get_data();
        $this->db->where('id', $id)->update('hr_all_agzat_orders', $data);
    }

    public function get_agaza_rkm()
    {

        return $this->db->select('MAX(agaza_rkm) as agaza_rkm')->get('hr_all_agzat_orders')->row()->agaza_rkm + 1;
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


    public function get_data()
    {
        $days = array('', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', 'الأحد');

        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['emp_code_fk'] = $this->input->post('emp_code_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['direct_manager_id_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manger;
        $data['direct_manager_code_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_code;
        $data['direct_manager_n'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_name;
        $data['no3_agaza'] = $this->input->post('no3_agaza');
        $data['agaza_from_date_m'] = $this->input->post('agaza_from_date_m');
        $data['agaza_to_date_m'] = $this->input->post('agaza_to_date_m');
        $data['num_days'] = $this->input->post('num_days');
        $data['mobashret_amal_date_m'] = $this->input->post('mobashret_amal_date_m');
        $data['address_since_agaza'] = $this->input->post('address_since_agaza');
        $data['emp_jwal'] = $this->input->post('emp_jwal');

//17-6-om
        if ($this->input->post('emp_badel_id_fk') && (!empty($this->input->post('emp_badel_id_fk')))) {
            $data['emp_badel_id_fk'] = $this->input->post('emp_badel_id_fk');
            $data['emp_badel_code_fk'] = $this->input->post('emp_badel_code_fk');
            $data['emp_badel_n'] = $this->input->post('emp_badel_n');


            $data['current_from_user_name'] = $this->input->post('emp_name');
            $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

            $data['current_to_user_name'] = $this->input->post('emp_badel_n');
            $data['current_to_user_id'] = $this->get_user_id($data['emp_badel_id_fk']);


            $data['level'] = 1;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;

        } else {

            $data['emp_badel_id_fk'] = '';
            $data['emp_badel_code_fk'] = '';
            $data['emp_badel_n'] = '';


            $data['current_from_user_name'] = $this->input->post('emp_name');
            $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

            $data['current_to_user_name'] = $data['direct_manager_n'];
            $data['current_to_user_id'] = $this->get_user_id($data['direct_manager_id_fk']);

            $data['level'] = 2;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;

        }
//17-6-om

        $data['agaza_from_date_h'] = $this->input->post('agaza_from_date_h');
        $data['agaza_to_date_h'] = $this->input->post('agaza_to_date_h');

        $data['mobashret_amal_date_h'] = $this->input->post('mobashret_amal_date_h');

        if ($this->input->post('marad_name') && (!empty($this->input->post('marad_name')))) {
            $data['marad_name'] = $this->input->post('marad_name');
            $data['taqrer_form_date_m'] = $this->input->post('taqrer_form_date_m');
            $data['taqrer_form_date_h'] = $this->input->post('taqrer_form_date_h');
            $data['taqrer_to_date_m'] = $this->input->post('taqrer_to_date_m');
            $data['taqrer_to_date_h'] = $this->input->post('taqrer_to_date_h');
            $data['hospital_name'] = $this->input->post('hospital_name');
        } else {

            $data['marad_name'] = '';
            $data['taqrer_form_date_m'] = '';
            $data['taqrer_form_date_h'] = '';
            $data['taqrer_to_date_m'] = '';
            $data['taqrer_to_date_h'] = '';
            $data['hospital_name'] = '';
        }

        if ($this->input->post('daraget_waffa') && (!empty($this->input->post('daraget_waffa')))) {
            $data['daraget_waffa'] = $this->input->post('daraget_waffa');
        } else {
            $data['daraget_waffa'] = '';

        }

        $data['agaza_from_day_n'] = $days[date('N', strtotime($data['agaza_from_date_m']))];
        $data['agaza_to_day_n'] = $days[date('N', strtotime($data['agaza_to_date_m']))];
        $data['mobashret_amal_day_n'] = $days[date('N', strtotime($data['mobashret_amal_date_m']))];
        return $data;
    }


    public function get_all_from_vacation($id = false)
    {
        $this->db->select('hr_all_agzat_orders.*, employees.employee');
        if ($_SESSION['emp_code'] != 1 && $_SESSION['emp_code'] != 0) {
            $this->db->where('hr_all_agzat_orders.emp_id_fk', $_SESSION['emp_code']);
        }
        if (!empty($id)) {
            $this->db->where('hr_all_agzat_orders.id', $id);

        }
        $this->db->join('employees', 'employees.id=hr_all_agzat_orders.emp_id_fk');
        $query = $this->db->get('hr_all_agzat_orders');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->chek_Null($this->holiday($row->no3_agaza)->name);
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }


    public function get_vacation_by_id($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('hr_all_agzat_orders');
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $query->emp_name = $this->select_depart_with_out_session($query->emp_id_fk)->employee;
            $query->min_days = $this->holiday($query->no3_agaza)->min_days;
            $query->max_days = $this->holiday($query->no3_agaza)->max_days;
            return $query;
        } else {
            return 0;
        }
    }


    public function get_holiday()
    {
        return $this->db->where('agaza_ttype!=', 1)->get('holiday_setting')->result();
    }

    public function holiday($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('holiday_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        }

    }


    public function get_all_vacation()
    {
        $arr = array('suspend' => 4, 'back_in_time' => 0);
        $this->db->where($arr);
        $query = $this->db->get('hr_all_agzat_orders');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->emp = $this->select_depart_with_out_session($row->emp_id_fk)->employee;
                $data[$x]->emp_code = $this->select_depart_with_out_session($row->emp_id_fk)->emp_code;
                $data[$x]->badl_emp = $this->select_depart_with_out_session($row->emp_badel_id_fk)->employee;
                $data[$x]->vacation_name = $this->holiday($row->no3_agaza)->name;
                $data[$x]->management = $this->select_depart_with_out_session($row->emp_id_fk)->administration_name;
                $data[$x]->department = $this->select_depart_with_out_session($row->emp_id_fk)->departments_name;
                $data[$x]->job_name = $this->get_job_title($this->select_depart_with_out_session($row->emp_id_fk)->degree_id);
                $x++;
            }
            return $data;
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
                $arr[$a]->administration_name = $this->get_edara_name_or_qsm($row->administration);
                $arr[$a]->departments_name = $this->get_edara_name_or_qsm($row->department);
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }


    public function get_for_print($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('hr_all_agzat_orders');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->emp = $this->select_depart_with_out_session($row->emp_id_fk)->employee;
                $data[$x]->emp_code = $this->select_depart_with_out_session($row->emp_id_fk)->emp_code;
                $data[$x]->badl_emp = $this->select_depart_with_out_session($row->emp_badel_id_fk)->employee;
                $data[$x]->vacation_name = $this->holiday($row->no3_agaza)->name;
                $data[$x]->management = $this->select_depart_with_out_session($row->emp_id_fk)->administration_name;
                $data[$x]->department = $this->select_depart_with_out_session($row->emp_id_fk)->departments_name;
                $data[$x]->job_name = $this->get_job_title($this->select_depart_with_out_session($row->emp_id_fk)->degree_id);
            }
            return $data;

        } else {
            return 0;
        }
    }


//8-6-om

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


    public function get_user_id($emp_code)
    {

        $q = $this->db->where('emp_code', $emp_code)->get('users')->row();

        if (!empty($q)) {
            return $q->user_id;
        }
    }

    public function get_transformation_setting($level)
    {

        $q = $this->db->where('level', $level)->get('hr_all_transformation_setting')->row();

        if (!empty($q)) {
            return $q;
        }
    }


//get vacaytion for vacation year
    public function get_days_vacation_year($emp_id, $vac_id)
    {
//            ->from("")
//            ->join('employees', 'employees.emp_code = contract_employe.emp_code ')
        $q = $this->db->select('emp_code,vacation_start_ar,vacation_previous_balance,year_vacation_num')
            ->where('emp_code', $emp_id)
            ->get('contract_employe')->row();
        $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id, date("Y"));
        $q->ava_days = (($q->year_vacation_num + $q->vacation_previous_balance) - $q->vDays);
//        $q->ava_days = $this->calcilate_days($q->vacation_start_ar, $q->year_vacation_num, $q->vacation_previous_balance, $q->vDays);
        return $q;

    }

    public function get_days_pervious($emp_code, $vac_id, $current_year = 0)
    {
        $this->db->select(' SUM(hr_all_agzat_orders.num_days) as vDays')
            ->where('emp_code_fk', $emp_code)
            ->where('no3_agaza', $vac_id)
            ->where('suspend', 4);
        if ($current_year != 0) {
            $this->db->like('hr_all_agzat_orders.agaza_to_date_m', $current_year)
                ->like('hr_all_agzat_orders.agaza_from_date_m', $current_year);
        }
        $q = $this->db->get('hr_all_agzat_orders')->row()->vDays;
        if (!empty($q)) {
            return $q;
        } else {
            return 0;
        }

    }

//get vacation for spacial vacation
    public function get_days_vacation_by_vid($emp_code, $vac_id)
    {
        $q = $this->db->select('max_days')
            ->where('id', $vac_id)
            ->get('holiday_setting')->row();
        $q->vDays = $this->get_days_pervious($emp_code, $vac_id);
        $q->ava_days = ($q->max_days - $q->vDays);
        return $q;
    }

    public function get_days_vacation_cousal_by_vid($emp_id, $vac_id)
    {
        $q = $this->db->select('casual_vacation_num, emp_code')
//            ->from("employees")
            ->where('emp_code', $emp_id)
//            ->join('contract_employe', 'contract_employe.emp_code  = employees.emp_code')
            ->get('contract_employe')->row();
        $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id);
        $q->ava_days = ($q->casual_vacation_num - $q->vDays);
        return $q;
    }


//8-6-om

}// END CLASS