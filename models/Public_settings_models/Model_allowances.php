
<?php
class Model_allowances extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="emp_badlat_discount_settings";
    }
    //==========================================
    public function insert(){
          $data["title"]=$this->input->post("title");
          $data["type"]=1;
           $data['in_order'] = $this->input->post('in_order');
        //  $data["type"]="allowances";
           
           $this->db->insert($this->main_table,$data); 
    }
    //==========================================
    public function update($id){
         $data["title"]=$this->input->post("title");
          $data['in_order'] = $this->input->post('in_order');
        $this->db->where("id",$id);
        $this->db->update($this->main_table,$data); 
    }
    //==========================================
    public function select_last_value_fild($fild){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->order_by($fild,"DESC");
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

    public function delete($Conditions_arr){
        $this->db->where($Conditions_arr);
        $this->db->delete($this->main_table);
    }

    
      public function getById($id){
        $h = $this->db->get_where($this->main_table,array("id"=>$id));
        return $h->row_array();
    }


    public function select_all(){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("type",1);
        //$this->db->order_by("id","desc");
         $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    

   
  

}//END CLASS


