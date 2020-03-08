<?php

class Hr_all_transformation_setting_model extends CI_Model
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



    // omnia

/*public function get_employees_by_level($arr)
{


    $query = $this->db->where($arr)->get('hr_egraat_emp_setting');
    if ($query->num_rows() > 0) {
        return $query->result();

    } else {
        return false;
    }

}
*/
    public function get_employees_by_level($arr)
    {


        $query = $this->db->where($arr)->get('hr_egraat_emp_setting');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $item) {

                $query[$key]->person_img = $this->Get_photo_by_emp_id($item->person_id);
            }
            return $query;

        } else {
            return false;
        }

    }

    public function Get_photo_by_emp_id($emp_id)
    {

        $this->db->select('employees.id,employees.personal_photo');
        $this->db->from("employees");
        $this->db->where('id', $emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->personal_photo;
        } else {
            return false;
        }
    }

public function save_from_transfomation()
{
//    echo  '<pre>';
//    print_r($_POST);
//    die;

    $insert['agaza_rkm_fk'] = $this->input->post('agaza_rkm_fk');
    $insert['agaza_id_fk'] = $this->input->post('agaza_id_fk');
    $insert['from_user'] = $this->input->post('from_user');
    $insert['date'] = strtotime(date('Y-m-d'));
    $insert['date_ar'] = date('Y-m-d');

    $action = $this->input->post('action');

    $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

     if (!empty($from_user)) {
            $insert['from_user_n'] = $from_user->employee;
            $update['current_from_user_id'] = $from_user->user_id;
            $update['current_from_user_name'] = $from_user->employee;
        }

    $level = $this->input->post('level');

    $update['level'] = $insert['level'] = $level;
     $level_data_msg = $this->select_transformation_setting_by_level($level-1);

    if ($action == 1) {
        $to_user = $this->get_user_data2(array('employees.id' => $this->input->post('current_to_id')));
            if (!empty($to_user)) {
                $insert['to_user'] = $to_user->user_id;
                $insert['to_user_n'] = $to_user->employee;
                $update['current_to_user_id']=$to_user->user_id;
                $update['current_to_user_name']=$to_user->employee;
            }
        $update['talab_msg'] =$insert['talab_msg'] = $level_data_msg->msg_accept;
         
    }else {
        $to_user = $this->get_user_data2(array('employees.id' => $this->input->post('emp_id_fk')));
            if (!empty($to_user)) {
                $insert['to_user'] = $to_user->user_id;
                $insert['to_user_n'] = $to_user->employee;
                $update['current_to_user_id']=$to_user->user_id;
                $update['current_to_user_name']=$to_user->employee;
            }
        $update['talab_msg'] = $insert['talab_msg'] = $level_data_msg->msg_refuse;
        $update['reason_action'] = $insert['reason_action'] = $this->input->post('reason_action');
        $update['level'] = 0;
        $level_data = $this->select_transformation_setting_by_level(0);
        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;

    }
     
    switch ($level-1) {
        case 1:
            // $agaza_data=$this->get_agaza_data(array('agaza_rkm'=>$this->input->post('agaza_rkm_fk')));
            // direct_manager_id_fk
            $level_data = $this->select_transformation_setting_by_level($level);
            $update['talab_in_fk'] =$insert['talab_in_fk'] = $level_data->id;
            $update['talab_in_title'] =$insert['talab_in_title'] = $level_data->title;
            $update['action_emp_badel']=$update['suspend'] = $action;

            
        break;
         case 2:

             $level_data = $this->select_transformation_setting_by_level($level);
             $update['talab_in_fk'] =$insert['talab_in_fk'] = $level_data->id;
             $update['talab_in_title'] =$insert['talab_in_title'] = $level_data->title;
            $update['action_direct_manager']=$update['suspend'] = $action;

        break;
        case 3:

            $level_data = $this->select_transformation_setting_by_level($level);
            $update['talab_in_fk'] =$insert['talab_in_fk'] = $level_data->id;
            $update['talab_in_title'] =$insert['talab_in_title'] = $level_data->title;
            $update['action_mowazf_moktas']=$update['suspend'] = $action;

        break;
        case 4:

            $level_data = $this->select_transformation_setting_by_level($level);
            $update['talab_in_fk'] =$insert['talab_in_fk'] = $level_data->id;
            $update['talab_in_title'] =$insert['talab_in_title'] = $level_data->title;
            $update['action_moder_hr']=$update['suspend'] = $action;

            
        break;
        case 5:

            $level_data = $this->select_transformation_setting_by_level(0);
            $update['talab_in_fk'] =$insert['talab_in_fk'] = $level_data->id;
            $update['talab_in_title'] =$insert['talab_in_title'] = $level_data->title;
            $update['action_moder_final'] = $action;
            if ($action == 1) {
                $update['suspend']=4;
            }else {
                $update['suspend']=5;

            }

        break;
        default:
               
        break;
    }
            $update['seen'] = 0;
            $this->db->insert("hr_all_agzat_history", $insert);
            $this->db->where('id', $this->input->post('agaza_id_fk'))
            ->update('hr_all_agzat_orders', $update);

}
    // omnia

    /*    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("hr_job_request");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id ;
            }
            return $data;
        }
        return  1;
    }*/

    public function select_transformation_setting_by_level($level)
    {
        $this->db->select('*');
        $this->db->from("hr_all_transformation_setting");
        $this->db->where("level", $level);
        $this->db->where("tbl", 'agaza');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }



        public function select_hr_all_transformations_history_by_level($arr)
    {
        $this->db->select('*');
        $this->db->from("hr_all_agzat_history");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
                   $query->row();
                    $query->row()->from_user_photo=$this->Get_photo($query->row()->from_user);
                    $query->row()->from_user_job=$this->Get_job($query->row()->from_user);
                    $query->row()->to_user_photo=$this->Get_photo($query->row()->to_user);
                    $query->row()->to_user_job=$this->Get_job($query->row()->to_user);
            return $query->row();
        } else {
            return false;
        }
    }
    public function Get_photo($user_id){

        $this->db->select('users.user_id ,users.emp_code,employees.id,employees.personal_photo');
        $this->db->from("users");
        $this->db->join('employees', 'users.emp_code=employees.id', 'left');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->row()->personal_photo;
    } else {
        return false;
    }
    }





	      public function Get_job($user_id){

          $this->db->select('users.user_id ,users.emp_code,employees.id,employees.degree_id,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
          $this->db->from("users");
          $this->db->join('employees', 'users.emp_code=employees.id', 'left');
            $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
          $this->db->where('user_id',$user_id);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
          return $query->row()->job_title;
      } else {
          return false;
      }
      }

      public function getUserName($user_id)
      {
          $sql = $this->db->where("user_id", $user_id)->get('users');
          if ($sql->num_rows() > 0) {
              $data = $sql->row();
              if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                  return $data->user_username;
              } elseif ($data->role_id_fk == 2) {
                  $id = $data->user_name;
                  $table = 'magls_members_table';
                  $field = 'member_name';
              } elseif ($data->role_id_fk == 3) {
                  $id = $data->emp_code;
                  $table = 'employees';
                  $field = 'employee';
              } elseif ($data->role_id_fk == 4) {
                  $id = $data->user_name;
                  $table = 'general_assembley_members';
                  $field = 'name';
              }
              return $this->getUserNameByRoll($id, $table, $field);
          }
          return false;

      }

      public function getUserNameByRoll($id, $table, $field)
      {
          return $this->db->where('id', $id)->get($table)->row_array()[$field];
      }
  //=============================================================================================================//



	    public function select_allhistory_by_agaza_rkm_fk($agaza_rkm_fk)
    {
        $this->db->select('*');
        $this->db->from("hr_all_agzat_history");
        $this->db->where("agaza_rkm_fk", $agaza_rkm_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $c=0;
            foreach ($query->result() as  $value) {
                $data[$c] =$value;
                $data[$c]->from_user_photo =$this->Get_photo($value->from_user);
                $data[$c]->from_user_job =$this->Get_job($value->from_user);
                $data[$c]->to_user_job  =$this->Get_job($value->to_user);
                $data[$c]->to_user_photo  =$this->Get_photo($value->to_user);
            $c++; }
     return $data;
        } else {
            return false;
        }
    }
    public function explode_date($date)
    {
        //'6/15/2019'2019-06-15
        $txt = explode('-', $date);
        $title = $txt[0] . '-' . $txt[1] . '-' . $txt[2];
        return $title;
    }




    //ahmed
    public function select_from_hr_all_agzat_orders($arr)
    {
        $this->db->select('hr_all_agzat_orders.*,holiday_setting.id as holiday_setting_id ,holiday_setting.name as no3_title,employees.id as emp_id,employees.employee');
        $this->db->from("hr_all_agzat_orders");
        $this->db->where($arr);
        $this->db->join('holiday_setting', 'holiday_setting.id=hr_all_agzat_orders.no3_agaza', 'left');
       $this->db->join('employees', 'employees.id=hr_all_agzat_orders.emp_id_fk', 'left');
        $this->db->order_by("hr_all_agzat_orders.id", "DESC");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }

            return $data;
        } else {
            return false;
        }
    }


    public function get_employees($arr)
    {
        $this->db->select('employees.*,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('employees');
        $this->db->where($arr);
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $query=  $query->result();
          foreach ($query as $key => $value) {
            if (empty($value->job_title)) {
            $query[$key]->job_title='غير محدد';
            }
          }
              return $query;

        } else {
            return false;
        }

    }

    public function get_user_data($arr)
    {
        $this->db->select('id,employee');
        $this->db->from('employees');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }

    }


    public function get_user_data2($arr)
    {
        $this->db->select('users.*,employees.id as emp_id,employees.employee,employees.personal_photo,employees.degree_id,
        all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('users');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=users.emp_code', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }

    }
    public function get_agaza_data($arr)
    {
        $this->db->select('hr_all_agzat_orders.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title,holiday_setting.id as holiday_setting_id ,
        holiday_setting.name as no3_title  ,  holiday_setting.mowazf_badel as holiday_mowazf_badel');
        $this->db->from('hr_all_agzat_orders');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=hr_all_agzat_orders.emp_id_fk', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $this->db->join('holiday_setting', 'holiday_setting.id=hr_all_agzat_orders.no3_agaza', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query->row();
            $emp_code = $query->row()->emp_code_fk;
            $vac_id = $query->row()->no3_agaza;
            if ($vac_id == 2) {
                $result = $this->get_days_vacation_year($emp_code, $vac_id);
            } elseif ($vac_id == 1) {
                $result = $this->get_days_vacation_cousal_by_vid($emp_code, $vac_id);
            } else {
                $result = $this->get_days_vacation_by_vid($emp_code, $vac_id);
            }
            if (!empty($result)) {
                if (!empty($result->ava_days)) {
                    $query->row()->rseed_vacations = $result->ava_days;
                }else{ 
                     $query->row()->rseed_vacations =0; }
                if (!empty($result->vDays)) {
                    $query->row()->past_vacations = $result->vDays;
                }else{ 
                     $query->row()->past_vacations =0; }
                if (!empty($result->vacation_previous_balance)) {
                    $query->row()->vacation_previous_balance = $result->vacation_previous_balance;
                }else{ 
                     $query->row()->vacation_previous_balance =0; }
                if (!empty($result->year_vacation_num)) {
                    $query->row()->year_vacation_num = $result->year_vacation_num;
                }else{ 
                     $query->row()->year_vacation_num =0; }
                     $query->row()->emp_to_photo=$this->Get_photo($query->row()->current_to_user_id);
                     $query->row()->emp_to_job=$this->Get_job($query->row()->current_to_user_id);
                     
            }
            return $query->row();
        } else {
            return false;
        }


    }

    public function get_days_vacation_year($emp_id, $vac_id)
    {
        $q = $this->db->select('emp_code,vacation_start_ar,vacation_previous_balance,year_vacation_num')
            ->where('emp_code', $emp_id)
            ->get('contract_employe')->row();
        $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id, date("Y"));
        $q->ava_days = (($q->year_vacation_num + $q->vacation_previous_balance) - $q->vDays);
        if (!empty($q)) {
            return $q;
        } else {
            return 0;
        }

    }

    public function get_days_vacation_cousal_by_vid($emp_id, $vac_id)
    {

        $q = $this->db->select('casual_vacation_num, emp_code')
            ->where('emp_code', $emp_id)
            ->get('contract_employe')->row();
        $q->vDays = $this->get_days_pervious($q->emp_code, $vac_id);
        $q->ava_days = ($q->casual_vacation_num - $q->vDays);
        if (!empty($q)) {
            return $q;
        } else {
            return 0;
        }
    }
/*
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
*/

    public function get_days_pervious($emp_code, $vac_id, $current_year = 0)
    {
        $this->db->select(' SUM(hr_all_agzat_orders.num_days) as vDays')
            ->where('emp_code_fk', $emp_code)
            ->where('no3_agaza', $vac_id)
            ->where('suspend', 4)
            ->where('agaza_from_date <', strtotime(date('Y-m-d')));
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

    public function get_days_vacation_by_vid($emp_code, $vac_id)
    {
        $q = $this->db->select('max_days')
            ->where('id', $vac_id)
            ->get('holiday_setting')->row();
        $q->vDays = $this->get_days_pervious($emp_code, $vac_id);
        $q->ava_days = ($q->max_days - $q->vDays);
        if (!empty($q)) {
            return $q;
        } else {
            return 0;
        }
    }

    /****************************************************/

    public function saveTransformBadel()
    {

        //insert
        $insert['agaza_rkm_fk'] = $this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk'] = $this->input->post('agaza_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level'));

        $insert['from_user'] = $this->input->post('from_user');
        if (!empty($from_user)) {

            $insert['from_user_n'] = $from_user->employee;
        }
        if ($this->input->post('approved') == 2) {

            $insert['to_user'] = $_POST['user_id_emp'];
            $insert['to_user_n'] = $_POST['name_emp'];


            $level = 0;

        } else {
            $level = $this->input->post('level');
            $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('to_user')));

            if (!empty($to_user)) {
                $insert['to_user'] = $to_user->user_id;
                $insert['to_user_n'] = $to_user->employee;
            }

        }

        $level_data = $this->select_transformation_setting_by_level($level);
        if (!empty($level_data)) {

            $insert['talab_in_fk'] = $level_data->id;
            $insert['talab_in_title'] = $level_data->title;
            $insert['level'] = $level;
            $insert['talab_msg'] = $level_data_msg->msg_accept;
        }
        if ($this->input->post('approved') == 2) {
            $insert['talab_msg'] = $level_data_msg->msg_refuse;
            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_agzat_history", $insert);


        //update
        if ($this->input->post('level') == 2) {
            $update['action_emp_badel'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 3) {

            $update['action_direct_manager'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 4) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_hr'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 6) {

            $update['action_moder_final'] = $this->input->post('approved');

        }


        $update['current_from_user_id'] = $this->input->post('from_user');
        if (!empty($from_user)) {
            $update['current_from_user_name'] = $from_user->user_name;
        }


        if ($this->input->post('approved') == 2) {

            $update['current_to_user_id'] = $_POST['user_id_emp'];
            $update['current_to_user_name'] = $_POST['name_emp'];
            $update['reason_action'] = $this->input->post('reason_action');
            $update['suspend'] = 5;
            $update['talab_msg'] = $level_data_msg->msg_refuse;

        } elseif ($this->input->post('approved') == 1) {
            $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('to_user')));

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }
            $update['suspend'] = $this->input->post('approved');
            $update['talab_msg'] = $level_data_msg->msg_accept;


        }

        $update['current_date_s'] = strtotime(date('Y-m-d'));

        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;


        // $update['suspend']=$this->input->post('approved');
        /*     echo "<pre>";
             print_r($update);
             echo "</pre>";
             die;*/
        $this->db->where('agaza_rkm', $this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders', $update);
    }


    public function saveTransformMokhtas()
    {

        //insert
        $insert['agaza_rkm_fk'] = $this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk'] = $this->input->post('agaza_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level'));

        $insert['from_user'] = $this->input->post('from_user');
        if (!empty($from_user)) {

            $insert['from_user_n'] = $from_user->employee;
        }

        $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

        if (!empty($to_user)) {
            $insert['to_user'] = $to_user->user_id;
            $insert['to_user_n'] = $to_user->employee;
        }


        $level_data = $this->select_transformation_setting_by_level($this->input->post('level'));
        if (!empty($level_data)) {

            $insert['talab_in_fk'] = $level_data->id;
            $insert['talab_in_title'] = $level_data->title;
            $insert['level'] = $this->input->post('level');
            $insert['talab_msg'] = $level_data_msg->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
            $insert['talab_msg'] = $level_data_msg->msg_refuse;

        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_agzat_history", $insert);


        //update
        if ($this->input->post('level') == 1) {
            $update['action_emp_badel'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 2) {

            $update['action_direct_manager'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 3) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 4) {

            $update['action_moder_hr'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_final'] = $this->input->post('approved');

        }
        $update['current_from_user_id'] = $this->input->post('from_user');
        if (!empty($from_user)) {
            $update['current_from_user_name'] = $from_user->employee;
        }

        if (!empty($to_user)) {
            $update['current_to_user_id'] = $to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }

        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $this->input->post('level');
        $update['talab_msg'] = $level_data_msg->msg_accept;
        $update['suspend'] = $this->input->post('approved');

        $this->db->where('agaza_rkm', $this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders', $update);


    }


    public function saveTransformDirectManger()
    {

        //insert
        $insert['agaza_rkm_fk'] = $this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk'] = $this->input->post('agaza_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level'));

        $insert['from_user'] = $this->input->post('from_user');
        if (!empty($from_user)) {

            $insert['from_user_n'] = $from_user->employee;
        }

        if ($this->input->post('approved') == 2) {

            $insert['to_user'] = $_POST['user_id_emp'];
            $insert['to_user_n'] = $_POST['name_emp'];


            $level = 0;

        } else {
            $level = $this->input->post('level');

            $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

            if (!empty($to_user)) {
                $insert['to_user'] = $to_user->user_id;
                $insert['to_user_n'] = $to_user->employee;
            }


        }


        $level_data = $this->select_transformation_setting_by_level($level);
        if (!empty($level_data)) {

            $insert['talab_in_fk'] = $level_data->id;
            $insert['talab_in_title'] = $level_data->title;
            $insert['level'] = $this->input->post('level');
            $insert['talab_msg'] = $level_data_msg->msg_accept;
        }
        if ($this->input->post('approved') == 2) {
          $insert['talab_msg'] = $level_data_msg->msg_refuse;

            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_agzat_history", $insert);


        //update
        if ($this->input->post('level') == 2) {
            $update['action_emp_badel'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 3) {

            $update['action_direct_manager'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 4) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_hr'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 6) {

            $update['action_moder_final'] = $this->input->post('approved');

        }
        $update['current_from_user_id'] = $this->input->post('from_user');
        if (!empty($from_user)) {
            $update['current_from_user_name'] = $from_user->employee;
        }


        if ($this->input->post('approved') == 2) {

            $update['current_to_user_id'] = $_POST['user_id_emp'];
            $update['current_to_user_name'] = $_POST['name_emp'];
            $update['reason_action'] = $this->input->post('reason_action');
            $update['suspend'] = 5;
            $update['talab_msg'] = $level_data_msg->msg_refuse;

        } elseif ($this->input->post('approved') == 1) {

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }

            $update['suspend'] = $this->input->post('approved');
            $update['talab_msg'] = $level_data_msg->msg_accept;

        }


        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;


        $this->db->where('agaza_rkm', $this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders', $update);


    }

//=============================================================================================================//


    public function saveTransformToManger()
    {

        //insert
        $insert['agaza_rkm_fk'] = $this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk'] = $this->input->post('agaza_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level'));

        $insert['from_user'] = $this->input->post('from_user');
        if (!empty($from_user)) {

            $insert['from_user_n'] = $from_user->employee;
        }


        if ($this->input->post('approved') == 2) {

            $insert['to_user'] = $_POST['user_id_emp'];
            $insert['to_user_n'] = $_POST['name_emp'];


            $level = 0;

        } else {
            $level = $this->input->post('level');
            $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

            if (!empty($to_user)) {
                $insert['to_user'] = $to_user->user_id;
                $insert['to_user_n'] = $to_user->employee;
            }

        }


        $level_data = $this->select_transformation_setting_by_level($level);
        if (!empty($level_data)) {

            $insert['talab_in_fk'] = $level_data->id;
            $insert['talab_in_title'] = $level_data->title;
            $insert['level'] = $this->input->post('level');
            $insert['talab_msg'] = $level_data_msg->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
            $insert['talab_msg'] = $level_data_msg->msg_refuse;

        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_agzat_history", $insert);


        //update
        if ($this->input->post('level') == 2) {
            $update['action_emp_badel'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 3) {

            $update['action_direct_manager'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 4) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_hr'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 6) {

            $update['action_moder_final'] = $this->input->post('approved');

        }
        $update['current_from_user_id'] = $this->input->post('from_user');
        if (!empty($from_user)) {
            $update['current_from_user_name'] = $from_user->employee;
        }

        if ($this->input->post('approved') == 2) {

            $update['current_to_user_id'] = $_POST['user_id_emp'];
            $update['current_to_user_name'] = $_POST['name_emp'];
            $update['reason_action'] = $this->input->post('reason_action');
            $update['suspend'] = 5;
            $update['talab_msg'] = $level_data_msg->msg_refuse;


        } elseif ($this->input->post('approved') == 1) {

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }

            $update['suspend'] = $this->input->post('approved');
            $update['talab_msg'] = $level_data_msg->msg_accept;

        }


        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;


        $this->db->where('agaza_rkm', $this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders', $update);


    }


    public function saveTransformManger()
    {


        $to_user_send = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level'));

// current_to_id user_id_emp
        //insert
        $insert['agaza_rkm_fk'] = $this->input->post('agaza_rkm_fk');
        $insert['agaza_id_fk'] = $this->input->post('agaza_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

        $insert['from_user'] = $this->input->post('from_user');
        if (!empty($from_user)) {

            $insert['from_user_n'] = $from_user->employee;
        }

        $level = 0;
        if ($this->input->post('approved') == 2) {

            //  $insert['to_user'] = $_POST['user_id_emp'];
            //  $insert['to_user_n'] = $_POST['name_emp'];

            $insert['to_user'] = $to_user_send->user_id;
            $insert['to_user_n'] = $to_user_send->employee;

        } else {
            // $level =$this->input->post('level');
            $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

            if (!empty($to_user)) {
                $insert['to_user'] = $to_user->user_id;
                $insert['to_user_n'] = $to_user->employee;
            }


        }


        $level_data = $this->select_transformation_setting_by_level($level);
        if (!empty($level_data)) {

            $insert['talab_in_fk'] = $level_data->id;
            $insert['talab_in_title'] = $level_data->title;
            $insert['level'] = $this->input->post('level');
            $insert['talab_msg'] = $level_data_msg->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
            $insert['talab_msg'] = $level_data_msg->msg_refuse;

        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_agzat_history", $insert);


        //update

        $update['action_moder_final'] = $this->input->post('approved');


        $update['current_from_user_id'] = $this->input->post('from_user');
        if (!empty($from_user)) {
            $update['current_from_user_name'] = $from_user->employee;
        }

        if ($this->input->post('approved') == 2) {
            $update['suspend'] = 5;
            //  $update['current_to_user_id'] = $_POST['user_id_emp'];
            //  $update['current_to_user_name'] = $_POST['name_emp'];

            $update['current_to_user_id'] = $to_user_send->user_id;
            $update['current_to_user_name'] = $to_user_send->employee;

            $update['reason_action'] = $this->input->post('reason_action');
            $update['talab_msg'] = $level_data_msg->msg_refuse;

        } elseif ($this->input->post('approved') == 1) {

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }
            $update['suspend'] = 4;
            $update['talab_msg'] = $level_data_msg->msg_accept;


        }


        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;


        $this->db->where('agaza_rkm', $this->input->post('agaza_rkm_fk'));
        $this->db->update('hr_all_agzat_orders', $update);


    }


//=============================================================================================================//


/*********30-6-2019**********/


    public function select_department_jobs(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($row->id==3){
                    array_unshift($data,$row);
                    continue;
                }
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }



    public function get_levels_data()
    {
      $q=$this->db->where('tbl','agaza')->get('hr_all_transformation_setting')->result();
      $data = array();
      if (!empty($q)) {
        foreach ($q as $key => $value) {
          $data[$value->level]=$value;
        }
        return $data;
      }

    }

}// END CLASS
