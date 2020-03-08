<?php
class Report extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    /**
     * ===================================================================================================
     *
     */

    public  function record_count($table){
        return $this->db->count_all($table);
    }

    //==========================================
    public function get_details_beetween_dates($from,$to)
    {
    $this->db->select('motab3a.*,prisoners.nazeel_code,prisoners.nationality,prisoners.nazeel_name');
    $this->db->from('motab3a');
    $this->db->where('motab3a.date >=',$from);
    $this->db->where('motab3a.date <=',$to);
    $this->db->join('prisoners', 'prisoners.nazeel_code = motab3a.sagin_id');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $x=0 ;
        foreach ($query->result() as $row) {
            $data[] = $row;
            $data[$x]->num = $this->get_motab3a_num($row->sagin_id);

            $x++; }
        return $data;
    }
    }


    public function get_motab3a_num($condition){
        $this->db->select('*');
        $this->db->from("motab3a");
        $this->db->where('sagin_id',$condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->num_rows();
            return $data;
        }else{
            return 0;
        }
        return false;
    }


}//END CLASS

