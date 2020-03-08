<?php

class Ezn_order_model extends CI_Model{


  public function check_ezn($emp_id)
  {
    $q=$this->db->where('emp_id_fk',$emp_id)->order_by('ezn_rkm','DESC')
    ->get('hr_all_ozonat_orders')->first_row();
    if (!empty($q)) {
      if (in_array($q->suspend,array(2,5)) ) {
        return 1;
      }elseif (in_array($q->suspend,array(1,0))) {
        return 0;
      }elseif ($q->suspend == 4) {
        return $q;
      }
    }else {
      return 1;

    }
  }

public function get_all_ozenat($emp_id)
{
  $q=$this->db->select('*,COUNT(no3_ezn) as type_ezn, SUM(total_hours) as total')
  ->where('ezn_date <',strtotime(date('Y-m-d')))->where('suspend',4)->where('emp_id_fk',$emp_id)->group_by('no3_ezn')
  ->get('hr_all_ozonat_orders')->result();
  return $q;
}


    public function get_all_emp($id)
    {
        $this->db->where_not_in('id',$id);
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
    //yara
    public function get_emp_profile($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
            }
            return $q[0];
        }
    }

    public  function get_emp_name($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['employee'];

    }

    public function get_ezn_rkm(){
        $this->db->select_max('ezn_rkm');
        $query = $this->db->get('hr_all_ozonat_orders');
        if ($query->num_rows() > 0){
            return $query->row()->ezn_rkm;
        } else{
            return 0;
        }
    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }


    public function add_ezn(){
        $this->load->model('human_resources_model/Public_employee_main_data');

        $data['ezn_rkm'] = $this->get_ezn_rkm()+1;
        $data['ezn_date'] = strtotime($this->input->post('ezn_date'));
        $data['ezn_date_ar'] = $this->input->post('ezn_date');
        $data['no3_ezn'] = $this->input->post('no3_ezn');
        $data['fatra_fk'] = $this->input->post('fatra_fk');
       if ($this->input->post('fatra_fk')==1){
           $data['fatra_n']= 'فترة';
       } elseif ($this->input->post('fatra_fk')==2){
           $data['fatra_n']= 'فترتين';
       }
       $data['from_hour'] = $this->input->post('from_hour');
       $data['to_hour'] = $this->input->post('to_hour');
       $data['total_hours'] = $this->input->post('total_hours');
       $data['reason'] = $this->input->post('reason');
       if (isset($_SESSION) && $_SESSION['role_id_fk']==1){
           $data['emp_id_fk'] = $this->input->post('emp_id_fk');
       } elseif (isset($_SESSION) && $_SESSION['role_id_fk']==3){
           $data['emp_id_fk'] = $_SESSION['emp_code'];

        }

       $data['emp_code_fk'] = $this->get_id('employees','id',$data['emp_id_fk'],'emp_code');
       // $data['edara_id_fk']= $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
       // $data['edara_n']= $this->Public_employee_main_data->get_edara_name_by_emp_id($data['emp_id_fk']);
       $data['emp_name']= $this->input->post('emp_name');
       $data['edara_n']= $this->input->post('edara_n');
       $data['edara_id_fk']= $this->input->post('edara_id_fk');
       $data['qsm_n']= $this->input->post('qsm_n');
       $data['qsm_id_fk']= $this->input->post('qsm_id_fk');
       $data['job_title']= $this->input->post('job_title');
       // $data['qsm_id_fk']= $this->Public_employee_main_data->get_qsm_id_by_emp_id($data['emp_id_fk']);
       // $data['qsm_n']= $this->Public_employee_main_data->get_qsm_name_by_emp_id($data['emp_id_fk']);
       $data['direct_manager_id_fk']= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
       $data['direct_manager_code_fk']= $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
       $data['direct_manager_n']= $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
       $data['date']= strtotime(date("Y/m/d"));
       $data['date_ar'] = date("Y/m/d");
       $data['publisher'] = $_SESSION['user_id'];
       $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        $emp_user_id=$this->get_id('users','emp_code',$data['emp_id_fk'],'user_id');
        $data['emp_user_id'] = $emp_user_id;
        $data['current_from_id'] = $emp_user_id;

        $data['current_to_id']= $this->get_user_emp_id($data['direct_manager_id_fk'],3);

        $data['level']=1;
        $data['suspend']=0;
        $data['update']=1;
        $data['current_from_user_name'] = $this->get_user_name_submit($emp_user_id);
        $data['current_to_user_name'] =$this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $this->db->insert('hr_all_ozonat_orders',$data);
    }

    public function display_data(){
        $query= $this->db->order_by('id','DESC')->get('hr_all_ozonat_orders');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_name = $this->get_id("employees",'id',$row->emp_id_fk,"employee");
                $data[$i]->last_ezn = $this->check_last_ezn($row->emp_id_fk,$row->ezn_rkm);

                $i++;
            }
            return $data;
        }
    }
    public function check_last_ezn($emp_id,$ezn_rkm)
    {
          $q=$this->db->select('* , MAX(ezn_rkm) as ezn_rkm_max ')
          ->where('emp_id_fk',$emp_id)->get('hr_all_ozonat_orders')->row();
          if (!empty($q)) {
            if ($ezn_rkm == $q->ezn_rkm_max) {
              return 1;
            }else {
              return 0;
            }
          }else {
            return 1;
          }
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('hr_all_ozonat_orders',$id)->row();
    }

    public function update_ezn($id){

        $this->load->model('human_resources_model/Public_employee_main_data');

        $data['ezn_rkm'] = $this->get_ezn_rkm()+1;
        $data['ezn_date'] = strtotime($this->input->post('ezn_date'));
        $data['ezn_date_ar'] = $this->input->post('ezn_date');
        $data['no3_ezn'] = $this->input->post('no3_ezn');
        $data['fatra_fk'] = $this->input->post('fatra_fk');
        if ($this->input->post('fatra_fk')==1){
            $data['fatra_n']= 'فترة';
        } elseif ($this->input->post('fatra_fk')==2){
            $data['fatra_n']= 'فترتين';
        }
        $data['from_hour'] = $this->input->post('from_hour');
        $data['to_hour'] = $this->input->post('to_hour');
        $data['total_hours'] = $this->input->post('total_hours');
        $data['reason'] = $this->input->post('reason');
        if (isset($_SESSION) && $_SESSION['role_id_fk']==1){
            $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        } elseif (isset($_SESSION) && $_SESSION['role_id_fk']==3){
            $data['emp_id_fk'] = $_SESSION['emp_code'];

        }

        $data['emp_code_fk'] = $this->get_id('employees','id',$data['emp_id_fk'],'emp_code');
        // $data['edara_id_fk']= $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
        // $data['edara_n']= $this->Public_employee_main_data->get_edara_name_by_emp_id($data['emp_id_fk']);
        // $data['qsm_id_fk']= $this->Public_employee_main_data->get_qsm_id_by_emp_id($data['emp_id_fk']);
        // $data['qsm_n']= $this->Public_employee_main_data->get_qsm_name_by_emp_id($data['emp_id_fk']);
        $data['emp_name']= $this->input->post('emp_name');
        $data['edara_n']= $this->input->post('edara_n');
        $data['edara_id_fk']= $this->input->post('edara_id_fk');
        $data['qsm_n']= $this->input->post('qsm_n');
        $data['qsm_id_fk']= $this->input->post('qsm_id_fk');
        $data['job_title']= $this->input->post('job_title');
        $data['direct_manager_id_fk']= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_code_fk']= $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_n']= $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->where('id',$id);
        $this->db->update('hr_all_ozonat_orders',$data);

    }
    public function select_depart($id = false)
    {
      $this->load->model('human_resources_model/Public_employee_main_data');

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
                $arr[$a]->manger_name = $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($row->id);

                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }

    public function delete_ezn($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_all_ozonat_orders');

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

    // ___________Nagwa 1-6 ___________

    public function get_ozonat($id){
        $this->db->where('emp_id_fk',$id);
      //  $this->db->where('suspend',4);
        $query = $this->db->get('hr_all_ozonat_orders');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_name = $this->get_id("employees",'id',$row->emp_id_fk,"employee");
                $i++;
            }
            return $data;
        }
    }

    public function get_emp($emp_id){
        $this->db->where('emp_id_fk',$emp_id);
        $query = $this->db->get('hr_all_ozonat_orders');
        if ($query->num_rows()>0){
            return $query->num_rows();
        }
        else{
            return 0;
        }
    }
    public function get_user_name_submit($user_id)
    {
        $this->db->select('*');
        $this->db->where("user_id",$user_id);
        $query=$this->db->get('users');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $name = $this->get_user_name_member($data->user_name);
                return $name;
            }
            elseif($data->role_id_fk == 3)
            {
                $name = $this->get_emp_n_session($data->emp_code);
                return $name;
            }
            elseif($data->role_id_fk == 4)
            {
                $name = $this->name_general_assembley($data->user_name);
                return $name;
            }



        }
        return false;
    }

    public function get_user_name_member($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('magls_members_table');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->member_name;
        }
        return false;

    }

    public function get_emp_n_session($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('employees');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->employee;
        }
        return false;

    }

    public function name_general_assembley($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->name;
        }
        return false;

    }
    public function get_user_emp_id($user_id,$role_id_fk)
    {
        $this->db->where('emp_code',$user_id);
        $this->db->where('role_id_fk',$role_id_fk);
        $query=$this->db->get('users');
        if($query->num_rows() > 0)
        {
            return $query->row()->user_id;
        }else{
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


}//end class
