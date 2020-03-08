

<?php

class Awards_model extends CI_Model
{

    public function select()
    {
        $this->db->select('*');
        $this->db->from('mon_rewards');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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

    //=======================================================================

    public function insert($img_file)
    {
            $data['emp_id'] = $this->chek_Null($this->input->post('emp_id'));
            $data['img']=$img_file ;
            $data['value'] = $this->chek_Null($this->input->post('value'));
               $data['type'] = $this->chek_Null($this->input->post('type'));
            $data['details'] = $this->chek_Null($this->input->post('details'));
            $data['date'] = strtotime($this->input->post('date'));
            $data['date_s'] = time();
            $data['mon'] = date("m",time());
            $data['year'] = date("Y",time());
            
        $this->db->insert('mon_rewards', $data);
    }

    //=======================================================================
    public function update($id,$img_file)
    {
   
    //$data['emp_id'] = $this->chek_Null($this->input->post('emp_id'));
        if($img_file != ''){
            $data['img']=$img_file ;
        }
        $data['value'] = $this->chek_Null($this->input->post('value'));
         $data['details'] = $this->chek_Null($this->input->post('details'));
             $data['type'] = $this->chek_Null($this->input->post('type'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['date_s'] = time();
   
   
        $this->db->where('id', $id);
        $this->db->update('mon_rewards', $data);
    }

    public function getById($id)
    {
        $h = $this->db->get_where('employees', array('emp_code' => $id));
        return $h->row_array();
    }

    public function getById_emp($id)
    {
        $h = $this->db->get_where('employees', array('emp_code' => $id));
        return $h->row_array();
    }

    public function select_emp_name()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `employees` WHERE `emp_code`=' . $row->emp_code);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->emp_code] = $arr;
            }
            return $data;
        }
        return false;
    }


    public function get_department_name()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `id`=' . $row->id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->id] = $arr;
            }
            return $data;
        }
        return false;
    }


    public function select_sub_depart()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->from_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }


    public function approved($id,$type)
    {
        $data['suspend'] = $type;
        $data['reason'] = $this->chek_Null($this->input->post('reason'));
        $this->db->where('id', $id);
        $this->db->update('mon_rewards', $data);
    }
    
    
    
public function select_all_rewards(){
    $this->db->select('*');
    $this->db->from('mon_rewards');
    $this->db->where("deport",0);
    $this->db->group_by("emp_id");
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->emp_name = $this->get_emp_name($row->emp_id);
            $query_result[$i]->all_money = $this->get_all_money($row->emp_id);
            $i++;
        }
        return $query_result;
    }
    return false;
}

public function get_emp_name($id){
    $h = $this->db->get_where('employees', array('id'=>$id));
    return $h->row_array();
}


public function get_all_money($id){
    $this->db->select('*');
    $this->db->from('mon_rewards');
    $this->db->where("deport",0);
    $this->db->where("emp_id",$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

    
    /***********************/
    
    
     public function type_rewards($arr){
    $this->db->select("*");
    $this->db->from("mon_rewards");
    $this->db->where($arr);
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->emp_name= $this->get_emp_name($row->emp_id);
            $i++;
        }
        return $query_result;
    }
    return false;
}



    public function suspend_DoRewardsApproved($id){
        if($_SESSION['role_id_fk'] ==1){
            if($_POST['accept'] )
            {
                $update = array(
                    'suspend_head' => 1,
                    'reason_head' => $_POST['reason']
                );
            }
            elseif($_POST['refuse'])
            {
                $update = array(
                    'suspend_head' => 2 ,
                    'reason_head' => $_POST['reason']
                );
            }

        }elseif ($_SESSION['role_id_fk'] ==3 && $_SESSION['head_dep_id_fk']==1){
            if($_POST['accept'] )
            {
                $update = array(
                    'suspend' => 1,
                    'reason' => $_POST['reason']
                );
            }
            elseif($_POST['refuse'])
            {
                $update = array(
                    'suspend' => 2 ,
                    'reason' => $_POST['reason']
                );
            }elseif ($_POST['return']){
                $update = array(
                    'suspend' => 0 ,
                    'reason' => ''
                );
            }

        }

        $this->db->where('id', $id);
        if($this->db->update('mon_rewards',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
}

