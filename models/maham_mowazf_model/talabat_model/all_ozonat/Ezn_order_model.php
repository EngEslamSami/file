<?php

class Ezn_order_model extends CI_Model{

    public function get_all_emp($id)
    {
        $this->db->where_not_in('id',$id);
        return $this->db->get('employees')->result();
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

       $data['edara_id_fk']= $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
       $data['edara_n']= $this->Public_employee_main_data->get_edara_name_by_emp_id($data['emp_id_fk']);
       $data['qsm_id_fk']= $this->Public_employee_main_data->get_qsm_id_by_emp_id($data['emp_id_fk']);
       $data['qsm_n']= $this->Public_employee_main_data->get_qsm_name_by_emp_id($data['emp_id_fk']);
       $data['direct_manager_id_fk']= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
       $data['direct_manager_code_fk']= $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
       $data['direct_manager_n']= $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
       $data['date']= strtotime(date("Y/m/d"));
       $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $data['emp_user_id'] = $_SESSION['user_id'];
        $data['current_from_id'] = $_SESSION['user_id'];

        $data['current_to_id']= $this->get_user_emp_id($data['direct_manager_id_fk'],3);

        $data['level']=1;
        $data['suspend']=1;
        $data['current_from_user_name'] = $this->get_user_name_submit($_SESSION['user_id']);
        $data['current_to_user_name'] =$this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $this->db->insert('hr_all_ozonat_orders',$data);
    }

    public function display_data(){
        $query= $this->db->get('hr_all_ozonat_orders');
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
        $data['edara_id_fk']= $this->Public_employee_main_data->get_edara_id_by_emp_id($data['emp_id_fk']);
        $data['edara_n']= $this->Public_employee_main_data->get_edara_name_by_emp_id($data['emp_id_fk']);
        $data['qsm_id_fk']= $this->Public_employee_main_data->get_qsm_id_by_emp_id($data['emp_id_fk']);
        $data['qsm_n']= $this->Public_employee_main_data->get_qsm_name_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_id_fk']= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_code_fk']= $this->Public_employee_main_data->get_direct_manager_code_by_emp_id($data['emp_id_fk']);
        $data['direct_manager_n']= $this->Public_employee_main_data->get_direct_manager_name_by_emp_id($data['emp_id_fk']);
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('hr_all_ozonat_orders',$data);

    }

    public function delete_ezn($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_all_ozonat_orders');

    }

    // ___________Nagwa 1-6 ___________

    public function get_ozonat($id){
        $this->db->where('emp_id_fk',$id);
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
}