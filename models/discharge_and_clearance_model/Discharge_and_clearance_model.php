<?php

class Discharge_and_clearance_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    private   function HijriToJD($inp){
        $input_date=explode('/',$inp);
        $m=$input_date[1];
        $d=$input_date[0];
        $y=$input_date[2];
        $out= (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m)
            - (int)(($m - 1) / 2) + $d + 1948440 - 385;
        return  strtotime(jdtogregorian($out));
    }
//-------------------------------------------------
    public  function  insert(){

        $string =explode('-',$_POST['employee_id_fk']);
        $data['employee_id_fk']=$string[0];
        $data['id_number']=$this->input->post('id_number');
      //  $data['personnel_section']=$this->input->post('personnel_section');
        $data['date'] = $this->HijriToJD($this->chek_Null($this->input->post('date')));
        $data['date_ar']=$this->input->post('date');
        $this->db->insert('discharge_and_clearance',$data);
    }
//-------------------------------------------------
    public  function  update($id){
        $string =explode('-',$_POST['employee_id_fk']);
        $data['employee_id_fk']=$string[0];
        $data['id_number']=$this->input->post('id_number');
      //  $data['personnel_section']=$this->input->post('personnel_section');
        $data['date'] = $this->HijriToJD($this->chek_Null($this->input->post('date')));
        $data['date_ar']=$this->input->post('date');
        $this->db->where("id",$id);
        $this->db->update('discharge_and_clearance',$data);
    }
    //------------------------------------------------
    public  function  select_all(){
        $this->db->select('*');
        $this->db->from('discharge_and_clearance');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->get_name($row->employee_id_fk);
                $x++; }
            return $data;
        }
        return false;
    }

    public function get_name($id)
    {
        $h = $this->db->get_where('employees', array('emp_code' => $id));
        return $h->row_array()['employee'];
    }


    public  function  select_all_emp(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//-----------------------------------------------

    public function getById($id)
    {
        $h = $this->db->get_where('discharge_and_clearance', array('id' => $id));
        return $h->row_array();
    }


    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('discharge_and_clearance');

    }




}// END CLASS
?>  