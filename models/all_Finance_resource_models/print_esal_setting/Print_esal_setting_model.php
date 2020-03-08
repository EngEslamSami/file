<?php

class Print_esal_setting_model extends CI_Model
{


    public function insert_esal_setting()
    {
        $data['emp_id']=$this->input->post('emp_id');
        $data['emp_code']=$this->input->post('emp_code');
        $data['emp_name']=$this->get_emp_name($this->input->post('emp_id'));
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['edara_name']= $this->get_edara_qsm($this->input->post('edara_id_fk'));
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['qsm_name']=$this->get_edara_qsm($this->input->post('qsm_id_fk'));
        $data['esal_type']=$this->input->post('esal_type');
        $data['esal_type_name']=$this->input->post('esal_type_name');
        $data['margin_top']=$this->input->post('margin_top');
        $data['margin_bottom']=$this->input->post('margin_bottom');
        $data['margin_left']=$this->input->post('margin_left');
        $data['margin_right']=$this->input->post('margin_right');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$this->getUserName($_SESSION['user_id']);
        $data['date_add']=date("Y-m-d");

$x=$this->check_emp_esal($this->input->post('emp_id'));
if(empty($x)) {
   $this->db->insert('fr_print_esal_setting', $data);
}else {
    $this->db->where('emp_id', $this->input->post('emp_id'));
    $this->db->update('fr_print_esal_setting', $data);
}
    }


    public function get_edara_qsm($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('department_jobs');
        if($query->num_rows()>0){
           return $query->row()->name;
        }else{
            return false;
        }

        }
    public function get_emp_name($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('employees');
        if($query->num_rows()>0){
            return $query->row()->employee;
        }else{
            return false;
        }

    }

    public function get_all()
    {
        return $this->db->get('fr_print_esal_setting')->result();
    }

    public function get_esal_by_id($id)
    {
        $this->db->where('emp_id',$id);
        $query=$this->db->get('fr_print_esal_setting');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function update_esal_setting($id)
    {
        $data['emp_id']=$this->input->post('emp_id');
        $data['emp_code']=$this->input->post('emp_code');
        $data['emp_name']=$this->get_emp_name($this->input->post('emp_id'));
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['edara_name']= $this->get_edara_qsm($this->input->post('edara_id_fk'));
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['qsm_name']=$this->get_edara_qsm($this->input->post('qsm_id_fk'));
        $data['esal_type']=$this->input->post('esal_type');
        $data['esal_type_name']=$this->input->post('esal_type_name');
        $data['margin_top']=$this->input->post('margin_top');
        $data['margin_bottom']=$this->input->post('margin_bottom');
        $data['margin_left']=$this->input->post('margin_left');
        $data['margin_right']=$this->input->post('margin_right');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$this->getUserName($_SESSION['user_id']);
        $data['date_add']=date("Y-m-d");
         $this->db->where('id',$id);
       $this->db->update('fr_print_esal_setting',$data);


    }

    public function delete_esal($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('fr_print_esal_setting');
    }
    public function check_emp_esal($emp_id)
    {
        $this->db->where('emp_id',$emp_id);
        $query=$this->db->get('fr_print_esal_setting');
      if($query->num_rows()>0)
      {
        return $query->row_array();
      }else{
          return false;
      }


    }


    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }


}