<?php

class Hr_solaf_transformation_setting_model extends CI_Model
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

    public function select_transformation_setting_by_level($level)
    {
      $q = $this->db->where('level', $level)->where('tbl', 'solfa')->get('hr_all_transformation_setting')->row();

      if (!empty($q)) {
          return $q;
      }
    }


        public function select_hr_all_transformations_history_by_level($arr)
    {
        $this->db->select('*');
        $this->db->from("hr_all_solf_history");
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


    /*
    public function select_allhistory_by_agaza_rkm_fk($agaza_rkm_fk)
    {
        $this->db->select('*');
        $this->db->from("hr_all_agzat_history");
        $this->db->where("agaza_rkm_fk", $agaza_rkm_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }*/

  /* public function select_allhistory_by_agaza_rkm_fk($agaza_rkm_fk)
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
                $data[$c]->to_user_photo  =$this->Get_photo($value->to_user);
            $c++; }
     return $data;
        } else {
            return false;
        }
    }*/


	    public function select_allhistory_by_solaf_rkm_fk($solaf_rkm_fk)
    {
        $this->db->select('*');
        $this->db->from("hr_all_solf_history");
        $this->db->where("solaf_rkm_fk", $solaf_rkm_fk);
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

// omnia

public function get_employees_by_level($arr)
{


    $query = $this->db->where($arr)->get('hr_egraat_emp_setting');
    if ($query->num_rows() > 0) {
        return $query->result();

    } else {
        return false;
    }

}


public function save_from_transfomation()
{
  // $solaf_data=$this->get_solaf_data(array('t_rkm'=>$solaf_rkm));
  $insert['solaf_rkm_fk'] = $this->input->post('solaf_rkm_fk');
  $insert['solaf_id_fk'] = $this->input->post('solaf_id_fk');
  $insert['from_user'] = $this->input->post('from_user');
  $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

  if (!empty($from_user)) {

      $insert['from_user_n'] = $from_user->employee;
  }
  $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

  if (!empty($to_user)) {
      $insert['to_user'] = $to_user->user_id;
      $insert['to_user_n'] = $to_user->employee;
  }

  $level = $this->input->post('level');

  $level_data = $this->select_transformation_setting_by_level($level);
  if (!empty($level_data)) {

      $insert['talab_in_fk'] = $level_data->id;
      $insert['talab_in_title'] = $level_data->title;
      $insert['level'] = $level;
      $insert['talab_msg'] = $level_data->msg_accept;

      $update['talab_in_fk'] = $level_data->id;
      $update['talab_in_title'] = $level_data->title;
      $update['level'] = $level;
      $update['talab_msg'] = $level_data->msg_accept;
  }

      $insert['reason_action'] = $this->input->post('reason_action');
      $insert['date'] = strtotime(date('Y-m-d'));
      $insert['date_ar'] = date('Y-m-d');

      $this->db->insert("hr_all_solf_history", $insert);


      $update['suspend'] = $level;

switch ($level) {
  case 2:
  $update['action_direct_manager'] = $this->input->post('action');
  $update['direct_manger_taqeem'] = $this->input->post('taqeem');
  $update['direct_manger_sarf'] = $this->input->post('action');
    $update['suspend']=0;
    break;
  case 3:
  $update['emp_motalbat'] = $this->input->post('emp_motalbat');
  $update['solaf_qaema'] = $this->input->post('solaf_qaema');
  $update['suspend']=0;
    break;
  case 4:
  $update['action_moder_hr'] = $this->input->post('action');
  $update['suspend']=0;
    break;
  case 5:
  $update['action_moder_fr'] = $this->input->post('rased_yasmah');
  $update['rased_yasmah'] = $this->input->post('rased_yasmah');
  $update['rased_motah'] = $this->input->post('rased_motah');
  $update['suspend']=$update['rased_yasmah'];

    break;

  case 6:
  $update['action_moder_fr'] = $this->input->post('moder_mali_option');
  $update['moder_mali_option'] = $this->input->post('moder_mali_option');
  $update['suspend'] = $update['moder_mali_option'];
    break;
  case 7:
  $update['level'] =0;
  $update['action_moder_final'] = $this->input->post('action_moder_final');
  $update['suspend'] = $update['action_moder_final'];
  $update['current_to_user_id'] = null;
  $update['current_to_user_name'] = null;

    break;

  default:

    break;
}
      //update


      // $update['current_from_user_id'] = $this->input->post('from_user');
      // if (!empty($from_user)) {
      //     $update['current_from_user_name'] = $from_user->user_name;
      // }

          $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));
          if (!empty($to_user)) {
              $update['current_to_user_id'] = $to_user->user_id;
              $update['current_to_user_name'] = $to_user->user_name;
          }

      $this->db->where('t_rkm', $this->input->post('solaf_rkm_fk'));
      $this->db->update('hr_solaf', $update);



}



// omnia


    //yara
    public function select_from_hr_all_solaf_orders($arr)
    {
        $this->db->select('hr_solaf.*,employees.id as emp_id,employees.employee');
        $this->db->from("hr_solaf");
        $this->db->where($arr);

       $this->db->join('employees', 'employees.id=hr_solaf.emp_id_fk', 'left');
        $this->db->order_by("hr_solaf.id", "DESC");

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
            return $query->result();

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

   /* public function get_user_data2($arr)
    {
        $this->db->select('users.*,employees.id as emp_id,employees.employee');
        $this->db->from('users');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=users.emp_code', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }

    }*/



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
    public function get_solaf_data($arr)
    {
        $this->db->select('hr_solaf.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title
         ');
        $this->db->from(' hr_solaf');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id= hr_solaf.emp_id_fk', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query->row();
            $emp_code = $query->row()->emp_code_fk;


            return $query->row();
        } else {
            return false;
        }


    }

    public function saveTransformBadel()
    {

        //insert
        $insert['solaf_rkm_fk'] = $this->input->post('solaf_rkm_fk');
        $insert['solaf_id_fk'] = $this->input->post('solaf_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

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
            $insert['talab_msg'] = $level_data->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_solf_history", $insert);


        //update
        if ($this->input->post('level') == 2) {
            $update['action_direct_manager'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 3) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 4) {

            $update['action_moder_hr'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_fr'] = $this->input->post('approved');

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
        } elseif ($this->input->post('approved') == 1) {
            $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('to_user')));

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }
            $update['suspend'] = $this->input->post('approved');

        }



        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;
        $update['talab_msg'] = $level_data->msg_accept;

        $this->db->where('t_rkm', $this->input->post('solaf_rkm_fk'));
        $this->db->update('hr_solaf', $update);
    }





    public function saveTransformDirectManger()
    {

        //insert
        $insert['solaf_rkm_fk'] = $this->input->post('solaf_rkm_fk');
        $insert['solaf_id_fk'] = $this->input->post('solaf_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

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
            $insert['talab_msg'] = $level_data->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_solf_history", $insert);


        //update
        if ($this->input->post('level') == 2) {
            $update['action_direct_manager'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 3) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 4) {

            $update['action_moder_hr'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_fr'] = $this->input->post('approved');

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
        } elseif ($this->input->post('approved') == 1) {

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }

            $update['suspend'] = $this->input->post('approved');
        }


        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;
        $update['talab_msg'] = $level_data->msg_accept;

        $this->db->where('t_rkm', $this->input->post('solaf_rkm_fk'));
        $this->db->update('hr_solaf', $update);


    }
    public function saveTransformMokhtas()
    {

        //insert
        $insert['solaf_rkm_fk'] = $this->input->post('solaf_rkm_fk');
        $insert['solaf_id_fk'] = $this->input->post('solaf_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

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
            $insert['talab_msg'] = $level_data->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_solf_history", $insert);


        //update
        if ($this->input->post('level') == 1) {
            $update['action_direct_manager'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 2) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 3) {

            $update['action_moder_hr'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 4) {

            $update['action_moder_fr'] = $this->input->post('approved');

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
        $update['talab_msg'] = $level_data->msg_accept;
        $update['suspend'] = $this->input->post('approved');

        $this->db->where('t_rkm', $this->input->post('solaf_rkm_fk'));
        $this->db->update('hr_solaf', $update);


    }
//=============================================================================================================//


    public function saveTransformToManger()
    {

        //insert
        $insert['solaf_rkm_fk'] = $this->input->post('solaf_rkm_fk');
        $insert['solaf_id_fk'] = $this->input->post('solaf_id_fk');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));

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
            $insert['talab_msg'] = $level_data->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_solf_history", $insert);


        //update
        if ($this->input->post('level') == 2) {
            $update['action_direct_manager'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 3) {

            $update['action_mowazf_moktas'] = $this->input->post('approved');

        } elseif ($this->input->post('level') == 4) {

            $update['action_moder_hr'] = $this->input->post('approved');
        } elseif ($this->input->post('level') == 5) {

            $update['action_moder_fr'] = $this->input->post('approved');

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

        } elseif ($this->input->post('approved') == 1) {

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }

            $update['suspend'] = $this->input->post('approved');
        }


        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;
        $update['talab_msg'] = $level_data->msg_accept;



        $this->db->where('t_rkm', $this->input->post('solaf_rkm_fk'));
        $this->db->update('hr_solaf', $update);

    }


    public function saveTransformManger()
    {


        $to_user_send = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

// current_to_id user_id_emp
        //insert
        $insert['solaf_rkm_fk'] = $this->input->post('solaf_rkm_fk');
        $insert['solaf_id_fk'] = $this->input->post('solaf_id_fk');
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
            $insert['talab_msg'] = $level_data->msg_accept;
        }
        if ($this->input->post('approved') == 2) {

            $insert['reason_action'] = $this->input->post('reason_action');
        }


        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $this->db->insert("hr_all_solf_history", $insert);


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
        } elseif ($this->input->post('approved') == 1) {

            if (!empty($to_user)) {
                $update['current_to_user_id'] = $to_user->user_id;
                $update['current_to_user_name'] = $to_user->user_name;
            }
            $update['suspend'] = 4;

        }


        $update['talab_in_fk'] = $level_data->id;
        $update['talab_in_title'] = $level_data->title;
        $update['level'] = $level;
        $update['talab_msg'] = $level_data->msg_accept;

        $this->db->where('t_rkm', $this->input->post('solaf_rkm_fk'));
        $this->db->update('hr_solaf', $update);


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

}// END CLASS
