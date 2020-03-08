<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_jobs extends CI_Model {

    public function insert(){
        $data['name'] = $this->input->post('name');
        $data['in_order'] = $this->input->post('in_order');
        $this->db->insert('department_jobs',$data);
    }

    public function update($id){
        $data['name'] = $this->input->post('name');
        $data['in_order'] = $this->input->post('in_order');
        $this->db->where('id',$id);
        $this->db->update('department_jobs',$data);
    }

    public function getById($id){
        $h = $this->db->get_where('department_jobs', array('id'=>$id));
        return $h->row_array();
    }

    public function select_all(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",0);
         $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->count =$this->get_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function get_sub($f_id){
        $h = $this->db->get_where('department_jobs', array('from_id_fk'=>$f_id));
        return $h->num_rows();
    }

    public function select_main(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",0);
         $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_departments = $this->select_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function select_sub($f_id){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",$f_id);
         $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function insert_sub(){
        $data['name'] = $this->input->post('name');
        $data['from_id_fk'] = $this->input->post('from_id_fk');
        $data['in_order'] = $this->input->post('in_order');
        $data['status'] = 1;
        $this->db->insert('department_jobs',$data);
    }

    public function update_sub($id){
        $data['name'] = $this->input->post('name');
        $data['from_id_fk'] = $this->input->post('from_id_fk');
        $data['in_order'] = $this->input->post('in_order');
        $data['status'] = 1;
        $this->db->where('id',$id);
        $this->db->update('department_jobs',$data);
    }
    
    public function select_allSub($where=false){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where($where);
         $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    

}

/* End of file Department_jobs.php */
/* Location: ./application/models/administrative_affairs_models/Department_jobs.php */