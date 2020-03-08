<?php
class Administrative_affairs_setting extends CI_Model
{
    public function __construct() 
	{
        parent::__construct();
    }

    public function select_all($table,$grouby,$limit,$order_by,$order_by_desc_asc)
	{
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by($grouby);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_search_key($table,$search_key,$search_key_value)
	{
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
	
    public function select_search_key_2($table,$search_key_1,$search_key_value_1,$search_key_2,$search_key_value_2)
	{
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key_1,$search_key_value_1);    
        $this->db->where($search_key_2,$search_key_value_2);  
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

