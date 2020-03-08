<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globalmodel extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function insert($table, $data){
        if($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        }
        else {
            return false;
        }
    }

    public function delete($table, $column, $id){
        $this->db->where($column, $id)
                 ->delete($table);
    }

    public function update($data, $table, $column, $column_value){
        $this->db->where($column, $column_value);
        if($this->db->update($table, $data)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function rowsCount($table, $where = array()){
        return $this->db->from($table)->where($where)->count_all_results();
    } 

    public function selectRecords($select, $tableName, $where=array(), $join=false, $column=false, $order=false, $orderType=false, $limit=false, $groupBy=false) {
        $this->db->select($select);
        $this->db->from($tableName);
        if($order != false){
            $this->db->order_by($order, $orderType);
        }
        if($groupBy != false){
            $this->db->group_by($groupBy);
        }
        if($limit != false){
            $this->db->limit($limit);
        }
        if($where != false){
            $this->db->where($where);
        }
        if($join != false){
            foreach ($join as $table => $condition) {
                $this->db->join($table, $condition, 'LEFT');
            }
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($column == false){
                    $data[] = $row;
                }
                else{
                    $data[$row->$column][] = $row;
                }
            }
            return $data;
        }
        return false;
    } 
    
}

/* End of file globalModel.php */
/* Location: ./application/models/globalModel.php */