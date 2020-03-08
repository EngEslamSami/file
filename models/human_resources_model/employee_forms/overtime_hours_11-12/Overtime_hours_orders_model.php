<?php

class Overtime_hours_orders_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('human_resources_model/Public_employee_main_data');
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

    public function insert()
    {




        $data['order_num'] = $this->get_order_rkm()+1;

        $data['order_date'] = strtotime($this->chek_Null($this->input->post('order_date')));
        $data['order_date_ar'] = $this->chek_Null($this->input->post('order_date'));
       // $data['emp_id_fk'] = $this->chek_Null($this->input->post('emp_id_fk'));
        $data['emp_code_fk'] = $this->chek_Null($this->input->post('emp_code_fk'));
        $data['emp_id_fk'] = $this->get_id("employees", 'emp_code',$data['emp_code_fk'], "id");

        $data['emp_national_num'] = $this->get_id("employees", 'id', $data['emp_id_fk'], "card_num");;
        $data['mosama_wazefy'] = $this->chek_Null($this->input->post('mosama_wazefy'));
      //  $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
      // $data['edara_id_fk'] = $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);

        $data['edara_n'] = $this->chek_Null($this->input->post('edara_n'));
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        $data['qsm_n'] = $this->chek_Null($this->input->post('qsm_n'));
        $data['direct_manager_id_fk'] = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manger_code'] = $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
        $data['direct_manger_n'] = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $data['edara_id_fk'] = $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manger_mosama_wazefy'] = $this->chek_Null($this->input->post('direct_manger_mosama_wazefy'));
        $data['nazran_to'] = $this->chek_Null($this->input->post('nazran_to'));
        $data['work_assigned_details'] = $this->chek_Null($this->input->post('work_assigned_details'));
        $data['total_hours'] = $this->chek_Null($this->input->post('total_hours'));

        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        if ($_SESSION['role_id_fk'] == 1) {

            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }

	
        $date_arr = explode('-',$this->input->post('order_date'));
        $data['mon']= $date_arr[1];
        $data['year']= $date_arr[0];
        $data['suspend']= 0;

        $this->db->insert(' hr_overtime_hours_orders', $data);


       // return $this->last_id();
        return $this->db->insert_id();

       // $from_hour = $this->input->post('from_hour')[0];



    }

    public  function  insert_overtime_details($id){

        if ($this->Get_overtime_hours_details($id) > 0) {
            $this->delete_all_items($id);
        }

        if (!empty($this->input->post('from_hour'))) {

            for ($s = 0; $s < count($this->input->post('from_hour')); $s++) {

                $data2['order_id_fk'] = $id;
                $data2['order_num_fk'] = $this->chek_Null($this->input->post('order_num'));

                $data2['from_hour'] = $this->chek_Null($this->input->post('from_hour'))[$s];
                $data2['to_hour'] = $this->chek_Null($this->input->post('to_hour'))[$s];
                $data2['num_hours'] = $this->chek_Null($this->input->post('num_hours'))[$s];

              // $ttt = strtotime($data2['num_hours'][$s]);
              // $total += $ttt;

              //  $from_time = strtotime("04:06:37");
               // $time_diff = $to_time - $from_time;
         // return  $data2['total_hours'] = gmdate('H:i', $total);
          //  die;

                ///////////

                $data2['bdal_type_fk'] = $this->chek_Null($this->input->post('bdal_type_fk'))[$s];
                $data2['work_assigned'] = $this->chek_Null($this->input->post('work_assigned'))[$s];
                if ($data2['bdal_type_fk'] ==0){
                    $data2['dbal_type_name'] = "بدل نقدي";
                }
                if ($data2['bdal_type_fk'] ==1){
                    $data2['dbal_type_name'] = "بدل أيام الراحة" ;
                }
                //  $data['date'] = strtotime(date('Y-m-d'));
                $data2['date_ar'] = $this->chek_Null($this->input->post('date'))[$s];
                $data2['date'] = strtotime($this->chek_Null($this->input->post('date'))[$s]);
                if ($_SESSION['role_id_fk'] == 1) {
                    $data2['publisher'] = $_SESSION['user_id'];
                    $data2['publisher_name'] = $_SESSION['user_name'];;
                } else if ($_SESSION['role_id_fk'] == 2) {
                    $data2['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                    $data2['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

                } else if ($_SESSION['role_id_fk'] == 3) {
                    $data2['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                    $data2['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
                } else if ($_SESSION['role_id_fk'] == 4) {
                    $data2['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
                    $data2['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
                }

                $this->db->insert('hr_overtime_hours_details', $data2);
            }

        }

    }

    public function update($id)
    {

       // $this->delete_all_items($id);

        $data['order_num'] = $this->chek_Null($this->input->post('order_num'));


        $data['order_date'] = strtotime($this->chek_Null($this->input->post('order_date')));
        $data['order_date_ar'] = $this->chek_Null($this->input->post('order_date'));
        // $data['emp_id_fk'] = $this->chek_Null($this->input->post('emp_id_fk'));
        $data['emp_code_fk'] = $this->chek_Null($this->input->post('emp_code_fk'));
        $data['emp_id_fk'] = $this->get_id("employees", 'emp_code',$data['emp_code_fk'], "id");

        $data['emp_national_num'] = $this->get_id("employees", 'id', $data['emp_id_fk'], "card_num");;
        $data['mosama_wazefy'] = $this->chek_Null($this->input->post('mosama_wazefy'));
        //  $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
        // $data['edara_id_fk'] = $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);

        $data['edara_n'] = $this->chek_Null($this->input->post('edara_n'));
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        $data['qsm_n'] = $this->chek_Null($this->input->post('qsm_n'));
        $data['direct_manager_id_fk'] = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manger_code'] = $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
        $data['direct_manger_n'] = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $data['edara_id_fk'] = $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manger_mosama_wazefy'] = $this->chek_Null($this->input->post('direct_manger_mosama_wazefy'));
        $data['nazran_to'] = $this->chek_Null($this->input->post('nazran_to'));
        $data['work_assigned_details'] = $this->chek_Null($this->input->post('work_assigned_details'));
        $data['total_hours'] = $this->chek_Null($this->input->post('total_hours'));

        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        if ($_SESSION['role_id_fk'] == 1) {

            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }

         $date_arr = explode('-',$this->input->post('order_date'));
        $data['mon']= $date_arr[1];
        $data['year']= $date_arr[0];
        $data['suspend']= 0;

        $this->db->where('id', $id);
        $this->db->update('hr_overtime_hours_orders', $data);


    }

    public function GetById($id)
    {
        $this->db->select('hr_overtime_hours_orders.*,employees.id as emp_id , employees.employee,employees.card_num ,employees.emp_code');
        $this->db->from('hr_overtime_hours_orders');
        $this->db->where('hr_overtime_hours_orders.id', $id);
        $this->db->join('employees', 'hr_overtime_hours_orders.emp_id_fk = employees.id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("hr_overtime_hours_orders");
        $this->db->where('order_id_fk', $id);
        $this->db->delete("hr_overtime_hours_details");
    }

    public function get_department()
    {
        $this->db->where('from_id_fk !=', 0);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function last_id()
    {
        $this->db->select('*');
        $this->db->from('hr_overtime_hours_orders');
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        } else {
            return 1;
        }

    }


    public function insert_record($valu)
    {
        $data['title_setting'] = $valu;
        $data['type'] = 9;
        $data['have_branch'] = 0;
        $this->db->insert('hr_forms_settings', $data);
    }


public function get_all($id){
        if (!empty($id)){
            $this->db->where('id',$id);
        }
        $query = $this->db->get('hr_overtime_hours_orders');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row ;
                $data[$i]->emp_name= $this->get_id("employees",'emp_code',$row->emp_code_fk,"employee");
                $data[$i]->details = $this->Get_overtime_hours_details($row->id);

                $i++;
            }
            return $data;

        } else{
            return 0;
        }
}

    public function Get_overtime_hours_details($id)
    {

       $this->db->where('order_id_fk',$id);
       return  $this->db->get('hr_overtime_hours_details')->result();

    }

//    public function Get_from_department_jobs($arr)
//    {
//        $h = $this->db->get_where("department_jobs", $arr);
//        if ($h->num_rows() > 0) {
//            return $h->row_array()['name'];
//        } else {
//            return 0;
//        }
//    }

    /******************************************************************/
    public function get_all_emp()
    {

        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
                $q[$key]->direct_manager_id_fk = $this->get_direct_manager_name_by_emp_id($row->id);
                $q[$key]->direct_manager_id =  $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($row->id);
                $q[$key]->direct_manager_degree = $this->get_id('employees','id', $q[$key]->direct_manager_id,'degree_id');
                $q[$key]->direct_manager_job_title_fk = $this->get_job_title($q[$key]->direct_manager_degree);


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

    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.employee as manager_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_name;
        } else {
            return false;
        }
    }

    public function get_order_rkm()
    {
        //  $this->db->select_max('order_num');
        $query = $this->db->get('hr_overtime_hours_orders');
        if ($query->num_rows() > 0) {
            // return $query->row()->order_num;
            return $query->last_row()->order_num;
        } else {
            return 0;
        }


    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
    public function delete_details_item($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_overtime_hours_details');
    }

    public function delete_all_items($id){
        $this->db->where('order_id_fk',$id);
        $this->db->delete('hr_overtime_hours_details');
    }


}