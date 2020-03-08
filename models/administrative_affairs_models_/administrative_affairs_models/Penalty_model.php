<?php
class Penalty_model extends CI_Model
{

    public function select()
    {
        $this->db->select('*');
        $this->db->from('penalty');
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

    public function insert()
    {
        $data['emp_id'] = $this->chek_Null($this->input->post('emp_id'));
        $data['penalty_type'] = $this->chek_Null($this->input->post('penalty_type'));
        $data['value'] = $this->chek_Null($this->input->post('value'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['date_s'] = time();
        $data['mon'] = date("m",time());
        $data['year'] = date("Y",time());
        $this->db->insert('penalty', $data);
    }

    public function update($id)
    {
        $data['penalty_type'] = $this->chek_Null($this->input->post('penalty_type'));
        $data['value'] = $this->chek_Null($this->input->post('value'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date_s'] = time();
        $this->db->where('id', $id);
        $this->db->update('penalty', $data);
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
        $this->db->update('penalty', $data);
    }
    
    public function select_all_penalty()
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where("penalty_type",1);
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

    public function get_emp_name($id)
    {
        $h = $this->db->get_where('employees', array('id'=>$id));
        return $h->row_array();
    }

    public function get_all_money($id){
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where("penalty_type",1);
        $this->db->where("emp_id",$id);
          $this->db->where("deport",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    /***************************************************************/
    
    
    
    public function select_all_emp_penalty()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
             //   $query_result[$i]->emp_name = $this->get_emp_name($row->emp_id);
                $query_result[$i]->penality_current_month = $this->select_penality_current_month($row->id);
                $query_result[$i]->num_of_penalites = $this->count_penalites($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    
    
    
    
    
    public function select_penality_current_month($emp_id)
    {
        $current_month =  date('m');
        $current_year =  date('Y');
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where("mon",$current_month);
        $this->db->where("year",$current_year);
         $this->db->where("emp_id",$emp_id);        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = 0;
            foreach ($query->result() as $row) {
                $data += $row->value;
            }
            return $data;
        }
        return 0;
    }
    
    
        public function select_penality_current_x($emp_id)
    {
        $current_month =  date('m');
        $current_year =  date('Y');
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where("mon",$current_month);
        $this->db->where("year",$current_year);
         $this->db->where("emp_id",$emp_id);        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           
            return $query->num_rows();
        }
        return 0;
    }
    
    function count_penalites($emp_id) {	
  //$this->db->from('table');
        $current_month =  date('m');
        $current_year =  date('Y');
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where("mon",$current_month);
        $this->db->where("year",$current_year);
         $this->db->where("emp_id",$emp_id); 
  return $num_rows = $this->db->count_all_results();
}
    


}

