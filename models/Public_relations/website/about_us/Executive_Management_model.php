<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 26/01/2019
 * Time: 12:15 م
 */

class Executive_Management_model extends CI_Model
{

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }



    public function get_title($id){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        }else{
            return 'غير محدد';
        }

    }

    public function select_Executive_Management(){
        $this->db->select('employees.*,all_defined_setting.defined_title as degree_name');
        $this->db->from("employees");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");

        $this->db->where("executive_management_fk",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->administration_name = $this->get_title($row->administration);
                $data[$x]->department_name = $this->get_title($row->department);
                $x++;}
            return $data;
        }
        return false;
    }

    public function select_all_employees(){
        $this->db->select('employees.id,employees.employee,employees.degree_id ,employees.administration ,employees.department,all_defined_setting.defined_title as degree_name');
        $this->db->from("employees");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->administration_name = $this->get_title($row->administration);
                $data[$x]->department_name = $this->get_title($row->department);
            $x++;}
            return $data;
        }
        return false;
    }


    public function select_all_employees2(){
        $this->db->select('employees.id,employees.employee,employees.degree_id ,employees.administration ,employees.department');
        $this->db->from("employees");
        $this->db->where("executive_management_fk",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row->id;

                $x++;}
            return $data;
        }
        return false;
    }


    public function insert()
    {
        $employees_id =$this->input->post('employees_id');
        if(!empty($employees_id)){
              $data['executive_management_fk'] = 0;
              $this->db->update('employees', $data);
              for ($a=0;$a<sizeof($employees_id);$a++){
                  $data['executive_management_fk'] = 1;
                  $this->db->where('id', $employees_id[$a]);
                  $this->db->update('employees', $data);

              }

        }
    }

}