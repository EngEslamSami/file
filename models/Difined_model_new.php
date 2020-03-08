<?php
class Difined_model_new extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
/**
 * ===================================================================================================
 *      
 *            count all row of table
 * ----------------------------------------
 */    
    
    public  function record_count($table){
        return $this->db->count_all($table);
    }
/**
 *  ===================================================================================================
 *      
 *          - slect last return last id -- 
 * ----------------------------------------
 */
 
 
     public function select_last_id($table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        }
        return 0;
     } 
        //==========================================
             public function select_last_value_fild($table,$fild){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->$fild;
            }
            return $data;
        }
        return 0;
     } 
/**
 * ===================================================================================================
 *          - delete from table where  --
 *     ex: $Conditions_arr=array('id !='=>2);
 *     ex:  delete("table_name",$Conditions_arr) 
 * ----------------------------------------
 */ 
  public function delete($table,$Conditions_arr){
        $this->db->where($Conditions_arr);
        $this->db->delete($table);
   }
/**
 * ===================================================================================================
 *          - getById from table where  --
 *     
 *     ex:  getById("table_name",id_value) 
 * ----------------------------------------
 */     public function getById($table,$id){
        $h = $this->db->get_where($table, array('id'=>$id));
        return $h->row_array();
    }
/**
 * ===================================================================================================
 *          - getById from table where  --
 *     
 *     ex:  getById("table_name",id_value) 
 * ----------------------------------------
 */     public function getByArray($table,$arr){
        $h = $this->db->get_where($table,$arr);
        return $h->row_array();
    }

    /**
     * ===============================================================================================================
     *
     *
     *  */
    public function select_where($table,$Conditions_arr,$limit){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($Conditions_arr);
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
    /**
     * ===============================================================================================================
     *
     *
     *  */
    public function select_wherein($table,$where_in_arr){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where_in($where_in_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    /**
     * ===============================================================================================================
     *
     *
     *  */
    public function select_where_wherein($table,$Conditions_arr,$where_in_arr){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where_in($where_in_arr);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
/**
 * ===============================================================================================================
 * 
 * 
 *  */
  public function select_search_key($table,$search_key,$search_key_value){
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
 
/**
 * ===============================================================================================================
 * 
 * 
 *  */
 public function select_limit($table,$limit,$order_by_fild_name,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by_fild_name,$order_by_desc_asc);
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
    /**
     * ===============================================================================================================
     *
     *
     *  */
    public function select_all($table,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    /**
     * ===================================================================================================
     *          - select from table where  --
     *     ex: $Conditions_arr=array('id'=>2);
     *     ex:  delete("table_name",$Conditions_arr,"card_num",limit,$order_by,$order_by_desc_asc)
     *     ex:  delete("table_name",$Conditions_arr,"",5,"id",DESC)
     * ----------------------------------------
     */
    public function select_where_groupy($table,$Conditions_arr,$grouby){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($Conditions_arr);
        $this->db->group_by($grouby);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


 /**
 * ===============================================================================================================
 * 
 * 
 *  */ 
 public function get_field($table){
    $query = $this->db->query("select * from ".$table);
      $field_array = $query->list_fields();
    return $field_array;
  }  
   /**
  * 
  * ===============================================================================================================
  */
  public function table_truncate ($table){
      $this->db->from($table); 
     $this->db->truncate(); 
  }
  /**
   * =========================================================
   * 
   */ 
  
  
      public function select_where2($table,$Conditions_arr,$grouby,$limit,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        foreach($Conditions_arr as $key=>$value){
            $this->db->where($key,$Conditions_arr[$key]);
        }
        $this->db->order_by($order_by,$order_by_desc_asc);
        $this->db->group_by($grouby);
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





    public function get_rows_num($table,$arr){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($arr);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function select_all2($select,$table,$order_by,$order_by_desc_asc){
        $this->db->select($select);
        $this->db->from($table);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
  
  //=================================================
 /* public function set(){
    $this->load->dbforge();
    $fields = array(
        'storage_code' => array('type' => 'INT', 'after' => 'sanf_code'));
        $this->dbforge->add_column('sanf_production_system', $fields);     
  }
  */
  
}//END CLASS 

