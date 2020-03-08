<?php
class Permit_model extends CI_Model
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
    public function get_data()
    {
        $data['emp_id_fk']=$this->input->post('emp_id_fk');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['direct_manager_id_fk']=$this->input->post('direct_manager_id_fk');
        //============================
        $data['o3on_type_fk']=$this->input->post('o3on_type_fk');

        $data['from_time']=$this->input->post('from_time');
        $data['to_time']=$this->input->post('to_time');
        $data['num_hours']=$this->input->post('num_hours');
        $data['date_o3on']=$this->input->post('date_o3on');
        $data['peroid_id_fk']=$this->input->post('peroid_id_fk');
         $data['reason']=$this->input->post('reason');
        $data['date']=date("Y-m-d");
        $data['date_ar']=date("Y-m-d");
        $data['date_s']=date("Y-m-d");
        //============================
        $data['	approved_direct_manager']=0;
        $data['direct_manger_reason']=0;
        $data['approved_specific_emp']=0;
        $data['adminstrative_affairs_manger_approved']=0;
        $data['approved_society_manager']=0;
        $data['date_s']=date("Y-m-d");
        //========================

        return $data;
    }

    public function insert_permit()
    {
        $data=$this->get_data();
      $this->db->insert('hr_ozonat_orders',$data);

    }


    public function get_all_from_o3on()
    {
        if($_SESSION['role_id_fk']!=1) {
            $this->db->where('emp_id_fk', $_SESSION['emp_code']);
        }
        //return $this->db->get('hr_vacation_orders')->result();
        $query=$this->db->get('hr_ozonat_orders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach($query->result() as  $row) {
                $data[$x] = $row;
                $data[$x]->emp=$this->select_depart_with_out_session($row->emp_id_fk)->employee;

                $data[$x]->personal_permit=$this->get_num_permit($row->emp_id_fk,1);
                $data[$x]->personal_work=$this->get_num_permit($row->emp_id_fk,2 );
                $data[$x]->peroid_personal=$this->get_peroid($row->emp_id_fk,1 );
                $data[$x]->peroid_work=$this->get_peroid($row->emp_id_fk,2 );


                $x++;
            }
            return $data;
        }else{
            return false;
        }
    }
public function get_peroid($emp_id,$o3on)
{
    $arr=array('emp_id_fk'=>$emp_id,'o3on_type_fk'=>$o3on);
    $this->db->select_sum('num_hours');
    $this->db->where($arr);

    $query= $this->db->get('hr_ozonat_orders');
    if($query->num_rows()>0)
    {
     return $query->row()->num_hours;
    }else{
        return 0;
    }

}
    public function get_num_permit($emp_id,$o3on)
    {
      $arr=array('emp_id_fk'=>$emp_id,'o3on_type_fk'=>$o3on);
        $this->db->where($arr);

        return $this->db->get('hr_ozonat_orders')->num_rows();
    }
    public function select_depart_with_out_session($id){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
                $a++;}
            return $arr[0];
        }else{
            return 0;
        }
    }
    public function  getName($id)
    {
        $this->db->select('id,name');
        $this->db->from('department_jobs');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->name;
        }else{
            return 0;
        }

    }
    public function delete_permit($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("hr_ozonat_orders");
    }

    public function get_o3on_by_id($id)
    {

        $this->db->where('id', $id);
        $query= $this->db->get('hr_ozonat_orders');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return 0;
        }
    }
    public function update_by_id($id)
    {
        $this->db->where('id',$id);
        $data=$this->get_data();
        $this->db->update('hr_ozonat_orders',$data);
    }
}