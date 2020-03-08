<?php
class Counting extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }



public function get_basic_in_num(){
    /*$h = $this->db->get_where('basic', array('suspend'=>0));
    return $h->num_rows();*/
    return 0;
}

    public function get_files_basic_in(){
      /*  $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        }
        return false;*/
          return 0; 
    }


 
}//END CLASS 

