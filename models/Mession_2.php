<?php
class Mession extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert($data){
        $this->db->insert('mession',$data);
    }
    
    public function update($data, $id){
        $this->db->where('id', $id);
        if($this->db->update('mession',$data)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function getById($id){
        $h = $this->db->get_where('mession', array('id'=>$id));
        return $h->row_array();
    }
    
    public function select(){
        $this->db->select('mession.*, employees.id AS e_id, employees.employee');
        $this->db->from('mession');
        $this->db->join('employees','employees.id = mession.emp_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_emp($id){
        if($id == 0)
            $query = $this->db->query('SELECT * FROM employees
                                       WHERE id NOT IN
                                       (SELECT emp_id FROM mession 
                                       WHERE date_to > '.strtotime(date("Y/m/d")).') ');
        else
            $query = $this->db->query('SELECT * FROM employees
                                       WHERE id NOT IN
                                       (SELECT emp_id FROM mession 
                                       WHERE date_to > '.strtotime(date("Y/m/d")).')
                                       UNION
                                       SELECT * FROM employees ');
      
        foreach ($query->result() as $row) 
            $data[$row->id] = $row;
        if(isset($data))
            return $data;
        else
            return false;
    }
    
    public function get_messions($date_from, $date_to, $emp_id){
        $this->db->select('mession.*, employees.id AS e_id, employees.employee');
        $this->db->from('mession');
        $this->db->join('employees','employees.id = mession.emp_id');
        if($emp_id == 'all')
            $this->db->where('(mession.date_from BETWEEN '.$date_from.' AND '.$date_to.' 
                                OR 
                                mession.date_to BETWEEN '.$date_from.' AND '.$date_to.')');
        else
            $this->db->where('(mession.date_from BETWEEN '.$date_from.' AND '.$date_to.' 
                                OR 
                                mession.date_to BETWEEN '.$date_from.' AND '.$date_to.')
                                AND
                                mession.emp_id = '.$emp_id.'');
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