<?php
class Vacation extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('vacations');
        $this->db->where('deleted',1);
        $this->db->where('year',date("Y"));
        $this->db->group_by('emp_id');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
             $i=0;
            foreach ($query_result as $row) {
                $data[$row->id] = $row;
              $query_result[$i]->emp_name= $this->get_by_vac($row->emp_id);    
               $i++;
            }
            return $data;
        }
        return false;
    }
    
    public function get_by_vac($emp_assigned_id)
    {
       $this->db->select("*");
       $this->db->from("vacations");
       $this->db->where("emp_id",$emp_assigned_id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data = $row->id;
           }
           return $data;
       }
       return false;
    } 

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('vacations');
    }

    public function getById($id)
    {
        $h = $this->db->get_where('vacations', array('id'=>$id));
        return $h->row_array();
    }

    public function insert()
    {
        $data['emp_id']= $this->input->post('emp_id');
        $data['vacation_id']=$this->input->post('vacation_id');
        $data['from_date']= $this->input->post('from_date');
        $data['to_date']= $this->input->post('to_date');
        $data['vacation_detail']= $this->input->post('vacation_detail');
        $data['vacation_reason']= $this->input->post('vacation_reason');
        $data['year']= date("Y");
        $data['emp_assigned_id']= $this->input->post('emp_assigned_id');
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $this->db->insert('vacations',$data);
    }

    public function update($id)
    {
        $h = $this->db->get_where('vacations', array('id'=>$id));
        $row = $h->row_array();
        $data['vacation_id']=$this->input->post('vacation_id');
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
        $data['vacation_detail']= $this->input->post('vacation_detail');
        $data['vacation_reason']= $this->input->post('vacation_reason');
        $data['year']= date("Y");
        $data['emp_assigned_id']= $this->input->post('emp_assigned_id');
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }

    public function suspend($id,$clas)
    {
        if ($clas == 'danger') {
            $update = array(
                'suspend' => 1
            );
        } else {
            $update = array(
                'suspend' => 0
            );
        }
        $this->db->where('id', $id);
        if ($this->db->update('vacations', $update)) {
            return true;
        } else {
            return false;
        }
    }

    public function type_vacation($approved)
    {
        $this->db->select("*");
        $this->db->from("vacations");
        $this->db->where("approved",$approved);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $query_result[$i]->emp_assigned_name= $this->get_by_emp($row->emp_assigned_id);
               $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function get_by_emp($emp_assigned_id)
    {
        $this->db->select("*");
        $this->db->from("employees");
        $this->db->where("id",$emp_assigned_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->employee;
            }
            return $data;
        }
        return false;
    }

    public function approved_vacation($id,$value)
    {
        $data['approved_publisher'] = $_SESSION["user_id"];
        $data['approved_date']=time();
        $data['approved']=$value;
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function suspend_DoVacationsApproved($id)
    {
        if($_POST['accept'] )
        {
            $update = array(
                'approved' => 1,
                'reason' => $_POST['reason']
            );
        }
        elseif($_POST['refuse'])
        {
            $update = array(
                'approved' => 2 ,
                'reason' => $_POST['reason']
            );
        }
        $this->db->where('id', $id);
        if($this->db->update('vacations',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function approved_vacation2($id,$value)
    {
        $data['approved_publisher'] = $_SESSION["user_id"];
        $data['approved_date']=time();
        $data['head_approved']=$value;
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function suspend_DoVacationsApproved2($id)
    {
        if($_POST['accept'] )
        {
            $update = array(
                'head_approved' => 1,
                'head_reason' => $_POST['head_reason']
            );
        }
        elseif($_POST['refuse'])
        {
            $update = array(
                'head_approved' => 2 ,
                'head_reason' => $_POST['head_reason']
            );
        }
        $this->db->where('id', $id);
        if($this->db->update('vacations',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function type_vacation_head($approved)
    {
        $this->db->select("*");
        $this->db->from("vacations");
        $this->db->where("head_approved",$approved);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $query_result[$i]->emp_assigned_name= $this->get_by_emp($row->emp_assigned_id);
               $i++;
            }
            return $query_result;
        }
        return false;
    }
    
}

