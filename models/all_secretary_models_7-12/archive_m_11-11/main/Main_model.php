<?php

class Main_model extends CI_Model
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
    public function select_new_wared()
    {
       
        $this->db->select('*');
        $this->db->from('arch_wared');
        $this->db->join('arch_wared_history', 'arch_wared_history.wared_id_fk = arch_wared.id');
        $this->db->where(array('arch_wared_history.esthkak_date' => date('Y-m-d')));
        
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_new_sader()
    {
       
        $this->db->select('*');
        $this->db->from('arch_sader');
        $this->db->join('arch_sader_history', 'arch_sader_history.sader_id_fk = arch_sader.id');
        $this->db->where(array('arch_sader_history.esthkak_date' => date('Y-m-d')));
        
        $query = $this->db->get()->result();
        return $query;
    }
    
    
    public function select_wared_mostalm()
    {
       
        $this->db->select('*');
        $this->db->from('arch_wared');
        $this->db->join('arch_wared_history', 'arch_wared_history.wared_id_fk = arch_wared.id');
     
        
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_sader_mostalm()
    {
       
        $this->db->select('*');
        $this->db->from('arch_sader');
        $this->db->join('arch_sader_history', 'arch_sader_history.sader_id_fk = arch_sader.id');
       
        
        $query = $this->db->get()->result();
        return $query;
    }
    //nagwa
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                if($table=='arch_sader_history'){
                    $data_table = 'arch_sader';
                    $row_id = 'sader_id_fk' ;
                } elseif ($table=='arch_wared_history'){
                    $data_table = 'arch_wared';
                    $row_id = 'wared_id_fk' ;

                }
                else{
                    $data_table='';
                    $row_id ='';
                }
                $data[$i]->data = $this->get_tahwel_data($data_table,array('id'=>$row->$row_id));
                $i++;
            }
            return $data;

        }else{
            return false;
        }
    }
    public  function get_tahwel_data($table,$arr){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->row();
        } else{
            return false;
        }

    }
    public function get_updates($table,$arr){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }











}
?>