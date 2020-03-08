<?php
class Radwa_settings extends CI_Model
{


  

  /////yara
 /*
public function select_all(){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
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
}*/
public function select_all(){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
    $this->db->where("from_id_fk",0);
    $this->db->where("status",0);
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

public function insert(){
    $data['name'] = $this->input->post('name');
    $data['in_order'] = $this->input->post('in_order');
    $this->db->insert('hr_radwa_department_jobs',$data);
}

public function update($id){
    $data['name'] = $this->input->post('name');
    $data['in_order'] = $this->input->post('in_order');
    $this->db->where('id',$id);
    $this->db->update('hr_radwa_department_jobs',$data);
}
public function get_sub($f_id){
    $h = $this->db->get_where('hr_radwa_department_jobs', array('from_id_fk'=>$f_id));
    return $h->num_rows();
}
/*public function select_main(){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
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
}*/
public function select_main(){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
    $this->db->where("from_id_fk",0);
    $this->db->where("status",0);
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
/*public function select_sub($f_id){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
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
}*/

public function select_sub($f_id){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
    $this->db->where("from_id_fk",$f_id);
    $this->db->where("status",1);
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

public function getById($id){
    $h = $this->db->get_where('hr_radwa_department_jobs', array('id'=>$id));
    return $h->row_array();
}
public function insert_sub(){
    $data['name'] = $this->input->post('name');
    $data['from_id_fk'] = $this->input->post('from_id_fk');
    $data['in_order'] = $this->input->post('in_order');
    $data['status'] = 1;
    $this->db->insert('hr_radwa_department_jobs',$data);
}

public function update_sub($id){
    $data['name'] = $this->input->post('name');
    $data['from_id_fk'] = $this->input->post('from_id_fk');
    $data['in_order'] = $this->input->post('in_order');
    $data['status'] = 1;
    $this->db->where('id',$id);
    $this->db->update('hr_radwa_department_jobs',$data);
}

public function select_allSub($where=false){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
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




public function select_all_job_role(){
    $this->db->select('*');
    $this->db->from('hr_radwa_department_jobs');
    $this->db->where("status",4);
   // $this->db->order_by("defined_id","desc");
    $this->db->order_by('in_order','asc');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result() ;
    }
    return false;
}
public function insert_job_role(){
    $data['name'] = $this->input->post('name');
    $data['from_id_fk'] = 0;
    $data['in_order'] = $this->input->post('in_order');
    $data['status'] = 4;
    $this->db->insert('hr_radwa_department_jobs',$data);
}
public function getByIdjob_role($id){
    $h = $this->db->get_where('hr_radwa_department_jobs',array("id"=>$id));
    return $h->row_array();
}
public function update_job_role($id){
    $data['name'] = $this->input->post('name');
    $data['from_id_fk'] =0;
    $data['in_order'] = $this->input->post('in_order');
    $data['status'] =4;
    $this->db->where('id',$id);
    $this->db->update('hr_radwa_department_jobs',$data);
}
public function delete($Conditions_arr){
    $this->db->where($Conditions_arr);
    $this->db->delete('hr_radwa_department_jobs');
}

}
