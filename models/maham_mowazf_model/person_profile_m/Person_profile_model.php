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

 /*   public function get_emp_data($id)
    {
        $q = $this->db->select('employees.*, users.*')
            ->where('id', $id)
            ->join('users', 'users.emp_code = employees.id')
            ->get('employees')
            ->row();

        $q->name = $q->employee;
        $q->employe_code = $this->get_real_emp_code($q->emp_code);
        $q->img = $q->user_photo;
        $q->edara = $this->get_edara_name_or_qsm($q->administration);
        $q->department = $this->get_edara_name_or_qsm($q->department);
        $q->job = $this->get_job_title($q->degree_id);
        return $q;

    }
    */
    
 /*      public function get_emp_data($id)
    {

        $employee_type_arr = array(1 => 'نشط', 2 => 'موقوف');
        $contract_type_arr = array('عقد غير محدد المدة', 'عقد محدد المدة');
        $work_types = array("1" => "فترة", "2" => "فترتين");
        $due_period = array('360' => 'سنة', '720' => 'سنتين');
        $paid_type = array("2" => "شيك", "3" => "تحويل بنكي");
        
        
        
        
        $q = $this->db->select(' users.*,employees.*')
            ->where('id', $id)
            ->join('users', 'users.emp_code = employees.id')
            ->get('employees')
            ->row();

        $q->name = $q->employee;
          $q->employe_code = $this->get_real_emp_code($q->id);
       // $q->img = $q->user_photo;
       $q->img = $q->personal_photo;//17-7-om
        $q->edara = $this->get_edara_name_or_qsm($q->administration);
        $q->department = $this->get_edara_name_or_qsm($q->department);
        $q->job = $this->get_job_title($q->degree_id);
        $q->manager_name = $this->get_direct_manager_name_by_emp_id($q->id)->manager_name;
        $q->employee_type_title = $employee_type_arr[$q->employee_type];
        $q->contract_type_title = $contract_type_arr[$q->contract];
        $q->employee_degree_title = $this->get_data_table('employees_settings', array('type' => 14, 'id_setting' => $q->employee_degree), 'title_setting');
        $q->employee_qualification_title = $this->get_data_table('employees_settings', array('type' => 15, 'id_setting' => $q->employee_qualification), 'title_setting');
        $q->work_maktb_title = $this->get_data_table('employees_settings', array('type' => 12, 'id_setting' => $q->work_maktb), 'title_setting');
        $q->tamin_company_title = $this->get_data_table('employees_settings', array('type' => 7, 'id_setting' => $q->tamin_company), 'title_setting');
        $q->cat_manager_title = $this->get_data_table('hr_main_cat', array('id' => $q->cat_manager_id_fk), 'name');
        $q->finance_Data = $this->get_finance_Data($q->id);
        $q->my_always = $this->get_my_always_times($q->id);
          $q->files = $this->get_emp_files($q->id);



      $q->contract_employe = $this->get_data_table('contract_employe', array('emp_code' => $q->emp_code));
        if (!empty($q->contract_employe)) {
            $q->contract_nature_title = $this->get_data_table('employees_settings', array('type' => 10, 'id_setting' => $q->contract_employe->contract_nature), 'title_setting');
            $q->job_type_title = $this->get_data_table('hr_forms_settings', array('type' => 12, 'id_setting' => $q->contract_employe->job_type), 'title_setting');
            $q->work_period_title = $work_types[$q->contract_employe->work_period_id_fk];
            $q->year_vacation_period_title = $due_period[$q->contract_employe->year_vacation_period];
            $q->pay_method_title = $paid_type[$q->contract_employe->pay_method_id_fk];
        }
        
        

        return $q;

    }
    */
    
         public function get_emp_data($id)
    {

        $employee_type_arr = array(1 => 'نشط', 2 => 'موقوف',0=>'لم تحدد');
        $contract_type_arr = array('عقد غير محدد المدة', 'عقد محدد المدة');
        $work_types = array("1" => "فترة", "2" => "فترتين");
        $due_period = array('360' => 'سنة', '720' => 'سنتين');
        $paid_type = array("2" => "شيك", "3" => "تحويل بنكي");
        
        
        
        
        $q = $this->db->select(' users.*,employees.*')
            ->where('id', $id)
            ->join('users', 'users.emp_code = employees.id')
            ->get('employees')
            ->row();

        $q->name = $q->employee;
          $q->employe_code = $this->get_real_emp_code($q->id);
       $q->img = $q->personal_photo;//17-7-om
        $q->edara = $this->get_edara_name_or_qsm($q->administration);
        $q->department = $this->get_edara_name_or_qsm($q->department);
        $q->job = $this->get_job_title($q->degree_id);
        $q->manager_name = $this->get_direct_manager_name_by_emp_id($q->id)->manager_name;


        if(key_exists($q->employee_type,$employee_type_arr)){
            $q->employee_type_title = $employee_type_arr[$q->employee_type];
        }else{
            $q->employee_type_title = 'لم تحدد';

        }
        if(key_exists($q->contract,$contract_type_arr)){
            $q->contract_type_title = $contract_type_arr[$q->contract];
        }else{
            $q->contract_type_title = 'لم تحدد';

        }
        $q->employee_degree_title = $this->get_data_table('employees_settings', array('type' => 14, 'id_setting' => $q->employee_degree), 'title_setting');
        $q->employee_qualification_title = $this->get_data_table('employees_settings', array('type' => 15, 'id_setting' => $q->employee_qualification), 'title_setting');
        $q->work_maktb_title = $this->get_data_table('employees_settings', array('type' => 12, 'id_setting' => $q->work_maktb), 'title_setting');
        $q->tamin_company_title = $this->get_data_table('employees_settings', array('type' => 7, 'id_setting' => $q->tamin_company), 'title_setting');
        $q->cat_manager_title = $this->get_data_table('hr_main_cat', array('id' => $q->cat_manager_id_fk), 'name');
        $q->finance_Data = $this->get_finance_Data($q->id);
        $q->my_always = $this->get_my_always_times($q->id);
          $q->files = $this->get_emp_files($q->id);



      $q->contract_employe = $this->get_data_table('contract_employe', array('emp_code' => $q->emp_code));
        if (!empty($q->contract_employe)) {
            $q->contract_nature_title = $this->get_data_table('employees_settings', array('type' => 10, 'id_setting' => $q->contract_employe->contract_nature), 'title_setting');
            $q->job_type_title = $this->get_data_table('hr_forms_settings', array('type' => 12, 'id_setting' => $q->contract_employe->job_type), 'title_setting');

            if(key_exists($q->contract_employe->work_period_id_fk,$work_types)){
                $q->work_period_title = $work_types[$q->contract_employe->work_period_id_fk];
            }else{
                $q->work_period_title = 'لم تحدد';

            }
            if(key_exists($q->contract_employe->year_vacation_period,$due_period)){
                $q->year_vacation_period_title = $due_period[$q->contract_employe->year_vacation_period];
            }else{
                $q->year_vacation_period_title = 'لم تحدد';

            }
            if(key_exists($q->contract_employe->pay_method_id_fk,$paid_type)){
                $q->pay_method_title = $paid_type[$q->contract_employe->pay_method_id_fk];
            }else{
                $q->pay_method_title = 'لم تحدد';

            }



        }
        
        

        return $q;

    }

    public function get_emp_files($emp_code)
    {
        $query = $this->db->where('emp_code', $emp_code)->get('emp_files');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->title_name = $this->get_data_table("employees_settings",array( 'id_setting'=> $row->title), "title_setting");

                $i++;

            }
            return $data;
        }
        return false;
    }


    public function get_real_emp_code($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->emp_code;
        } else {
            return false;
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
       // $data['user_phone'] = $this->input->post('user_phone');
       // $data['user_id_number'] = $this->input->post('id_number');
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
/***************************************/

    public function get_data_table($table, $where_arr, $return_filed = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $q = $this->db->get($table);
        if ($q->num_rows() > 0) {
            if (!empty($return_filed)) {
                return $q->row()->$return_filed;
            } elseif (!empty($where_arr)) {
                return $q->row();

            } else {
                return $q->result();
            }
        } else {
            return false;
        }

    }


    public function get_finance_Data($emp_id)
    {
        $data = array();
                $data['badlat'] = $this->getEmp_Badalat($emp_id, 1);
                $data['get_having_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(1));
                $data['get_discut_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(2));
                $data['tamin_value'] = $this->get_tamin_value($emp_id, $this->getBadalat_id(1));
            return $data;

    }

    public function get_sum_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_code', $emp_code);
        $this->db->select_sum('value');
        $result = $this->db->get('emp_badlat_discount_details');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }


    }

    public function get_tamin_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_code', $emp_code);
        $this->db->where('insurance_affect', 1);
        $this->db->select_sum('value');
        $result = $this->db->get('emp_badlat_discount_details');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }


    }

    public function getEmp_Badalat($emp_code, $type)
    {

        $query2 = $this->db->where('emp_code', $emp_code)->get('emp_badlat_discount_details');
        if ($query2->num_rows() > 0) {
            $data_ids = array();
            foreach ($query2->result() as $row) {
                $data_ids[] = $row->badl_discount_id_fk;
            }
        } else {
            return 0;
        }
        $this->db->where_in('id', $data_ids);
        $this->db->order_by('in_order', 'asc');

        $query = $this->db->get('emp_badlat_discount_settings')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->badalat = $this->get_badalat_order_by($emp_code, $row->id);
            $x++;

        }
        return $data;

    }

    public function get_badalat_order_by($emp_code, $id)
    {
        $arr = array('emp_code' => $emp_code, 'badl_discount_id_fk' => $id);
        $this->db->where($arr);
        return $this->db->get('emp_badlat_discount_details')->row();
    }

    public function getBadalat_id($type)
    {
        $query = $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->id;
            $x++;
        }
        return $data;
    }
    public function get_my_always_times($emp_id){
        $this->db->select('emp_always_times.*,
                           always_setting.id as always_setting_id ,always_setting.name');
        $this->db->from("emp_always_times");
        $this->db->join('always_setting', 'always_setting.id = emp_always_times.always_id_fk','left');
        $this->db->where("emp_id",$emp_id);
        $this->db->group_by('always_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;$data =$query->result();
            foreach ($query->result() as $row) {
                $data[$x]->period_num = $this->get_period_num($row->always_id_fk,$emp_id);
                $x++;
            }
            return $data;
        }
        return false ;
    }
    public function get_period_num($always_id_fk,$emp_id){
        $this->db->select('*');
        $this->db->from("emp_always_times");
        $this->db->where("always_id_fk",$always_id_fk);
        $this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false ;
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
    
    
     public function update_emp_img($id, $file)
    {

        if (!empty($file)) {
            $data['personal_photo'] = $file;
            $_SESSION['user_login_image'] = $file;
            $this->db->where('id', $id);
            $this->db->update('employees', $data);
        }
    }
    
/***** sadad fatora ******************************************************/    
  
//19-8-om

    public function get_sadad_fatora()
    {
//        $user_id = $this->get_user_id();
        $user_id = $_SESSION['emp_code'];

        $query = $this->db->where('current_to_user_id', $user_id)->get('finance_sadad_fatora');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->get_fatora_details($row->t_rkm);
                $data[$x]->num_fators = sizeof($data[$x]->details);


                $x++;


            }
            return $data;
        } else {
            return false;
        }

    }

    public function get_fatora_details($rkm)
    {
        $this->db->where('t_rkm_fk', $rkm);
        $query = $this->db->get('finance_sadad_fatora_details');
        if ($query->num_rows() > 0) {
            $x = 0;
            $data = array();
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->markz_name = $this->get_data_table('employees_settings',array('id_setting'=>$row->f_markz_taklfa_id_fk),'title_setting');
                $x++;


            }
            return $data;
        } else {
            return false;
        }
    }  
/*************************************************************************/    
}