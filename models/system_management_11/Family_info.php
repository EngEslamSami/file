<?php
class Family_info extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table = "family_setting";
    }


    public function all_requests(){
        
        $this->db->order_by("id", "DESC");
        $this->db->limit(10);
        $query = $this->db->get('basic');
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->mother =  $this->motherById($row->mother_national_num);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function motherById($mother_national_num){
        $this->db->where('mother_national_num_fk',$mother_national_num);
        $query = $this->db->get('mother');
        return $query->row();
    }
    public function get_all_family($type)
    {
        $this->db->where('suspend',$type);
        $query = $this->db->get('basic');
        return $query->num_rows();
    }
public function get_counter($table)
{
    $query = $this->db->get($table);
    return $query->num_rows();
}
//ahmed


    public function all_magls_members(){
        $this->db->select('*');
        $this->db->from("magls_members_table");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->job_title = $this->get_job_title($row->job_title_id_fk);
                $x++; }
            return $data;
        }
        return false;
    }




    public function get_job_title($id){
        $h = $this->db->get_where("department_jobs", array('id'=>$id));
        return $h->row_array()['name'];
    }


    public function all_general_assembly_members(){
        $this->db->select('*');
        $this->db->from("general_assembley_members");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
   
    public function all_employees()
    {
        $query = $this->db->get('employees');
        return $query->result();
    }

}
?>