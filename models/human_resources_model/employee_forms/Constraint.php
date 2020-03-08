<?php
class Constraint extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }


    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//=============================================================================================================//


    public function select_last_id(){
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
    }


    public function insert()
    {

        $data['emp_id']=$this->input->post('emp_id');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['direct_manger_id_fk']=$this->input->post('direct_manger_id_fk');
        $data['from_date']=strtotime($this->input->post('from_date'));
        $data['from_date_ar']=$this->input->post('from_date');
        $data['to_date']=strtotime($this->input->post('to_date'));
        $data['to_date_ar']=$this->input->post('to_date');
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('hr_tayi_qyed',$data);
        

    }
    public function update($id)
    {
        $data['emp_id']=$this->input->post('emp_id');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['direct_manger_id_fk']=$this->input->post('direct_manger_id_fk');
        $data['from_date']=strtotime($this->input->post('from_date'));
        $data['from_date_ar']=$this->input->post('from_date');
        $data['to_date']=strtotime($this->input->post('to_date'));
        $data['to_date_ar']=$this->input->post('to_date');
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];

        $this->db->where('id',$id);
        $this->db->update('hr_tayi_qyed', $data);



      
    }
//=============================================================================================================//


    public function findConstraint($id)
    {
        $this->db->select('*');
        $this->db->from('hr_tayi_qyed');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
                $data = $query->row();
                $data->employee_info = $this->get_one_employee($data->emp_id);

            return $data;

        }
        return false;

    }


    public function allConstraints()
    {
        $this->db->select('*');
        $this->db->from('hr_tayi_qyed');
//        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->result();
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i]->employee_info = $this->get_one_employee($row->emp_id);
                $i++;  }
            return $data;
        }
        return false;

    }


    public function get_one_employee($id){
        $this->db->select('employees.* , 
                           admin_t.name as admin_name ,
                           depart_t.name as depart_name ,
                           all_defined_setting.defined_title as degree_name');
        $this->db->from("employees");
        $this->db->join('department_jobs as admin_t', 'admin_t.id = employees.administration',"left");
        $this->db->join('department_jobs as depart_t', 'depart_t.id = employees.department',"left");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
        $this->db->where("employees.id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();

            return $data;
        }
        return false;
    }




}// END CLASS