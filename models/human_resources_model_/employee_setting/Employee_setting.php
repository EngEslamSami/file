<?php
class Employee_setting extends CI_Model
{


    //=================================================================================
	
	
    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id_setting] = $row->title_setting;
            }
            return $data;
        }
        return false;
    }

    public function add_emp_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert('employees_settings',$data);
    }
    public function get_all_data_emp_settings($arr_all){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_emp_settings($key);

        }
        return $data;
    }
    public function  get_type_emp_settings($type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_emp_settings($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update('employees_settings',$data);
    }
    public function getById_emp_settings($id)
    {
        return $this->db->get_where('employees_settings', array('id_setting'=>$id))->row_array();
    }
    public function delete_emp_settings($id)
    {
        $this->db->where('id_setting', $id)->delete('employees_settings');
    }

    //===================================================================================
}
