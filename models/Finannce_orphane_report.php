<?php

class Finannce_orphane_report extends CI_Model
{


    public function select(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }




    public function get_details_beetween_dates($from,$to,$type)
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        if($type !=0){
            $this->db->where('orphans_id_fk',$type);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_details_beetween($from,$to,$type)
    {
    $this->db->select('*,SUM(total) as ptotal');
    $this->db->from('payment');
    $this->db->where('date>=',$from);
    $this->db->where('date <= ',$to);
    if($type !=0){
        $this->db->where('orphans_id_fk',$type);
     }
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
        }
    }


    public function get_details($from,$to)
    {
        $this->db->select('SUM(total) as ptotal');
        $this->db->from('payment');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_details_s($from,$to)
    {
        $this->db->select('count(orphans_id_fk) as opr ');
        $this->db->from('payment');
        $this->db->group_by("orphans_id_fk");
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function get_details_name($from,$to)
    {
        $this->db->select('*,SUM(total) as ptotal');
        $this->db->from('payment');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        $this->db->group_by("orphans_id_fk");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}