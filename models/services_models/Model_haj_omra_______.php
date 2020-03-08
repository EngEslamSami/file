<?php
class Model_haj_omra extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table = "haj_omra_order";
    }
    //==========================================
    public  function  get_mother_members($mother_national_num_fk){
        $this->db->select('member_name ,id');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public  function  get_mother($mother_national_num_fk){
        $this->db->select('mother_national_num_fk,
                           m_first_name ,m_father_name  ,m_grandfather_name ,m_family_name');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row_array() ;
            $data["full_name"] =$data["m_first_name"]." ".$data["m_father_name"]." "
                                .$data["m_grandfather_name"]." ".$data["m_family_name"]." ";
            return $data;
        }
        return false;
    }
    //==========================================
    public function select_last_value_fild(){
        $this->db->select('order_num');
        $this->db->from($this->main_table);
        $this->db->order_by("order_num","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->order_num;
            }
            return $data;
        }
        return 0;
    }
    //==========================================
    public  function insert($last){
          $data["order_num"]=$last;
          $data["mother_national_id_fk"]=$this->input->post('mother_national_id_fk');
          $data["type"]=$this->input->post('type');
          $data["relation"]=$this->input->post('relation');
          $data["name"]=$this->input->post('name_mehrem');
          $data["birth_date"]=$this->input->post('birth_date');
          $data["frist_haj_omra"]=$this->input->post('frist_haj_omra');
          $data["date"]=time();
          $data["date_s"]=time();
          $data["date_ar"]=date("Y-m-d",time());
          if($this->input->post('mother_id')){
              $data["person_id"]=0;
              $this->db->insert($this->main_table ,$data);
          }
          if($this->input->post('member_id')){
              $posts =$this->input->post('member_id') ;
                foreach ($posts as $key=>$value){
                    $data["person_id"]=$value;
                    $this->db->insert($this->main_table ,$data);
                }
          }

    }
    //==========================================
    public  function  select_all($Conditions_arr){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where($Conditions_arr);
        $this->db->group_by("order_num");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             $data =$query->result(); $i=0;
            foreach ( $query->result() as $row){
                $data[$i]->member_name=$this->get_mother($row->mother_national_id_fk)["full_name"];
                $data[$i]->sub=$this->get_num_order($row->order_num);
                $i++;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public  function  get_num_order($order_num){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->join("family_setting","family_setting.id_setting = haj_omra_order. ");
        $this->db->where("order_num",$order_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->result();
            return $data;
        }
        return false;
    }
    //==========================================
    public function get_one($id){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    //==========================================
   public  function in_members($order_num){
       $this->db->select('person_id');
       $this->db->from($this->main_table);
       $this->db->where("order_num",$order_num);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           foreach ( $query->result() as $row){
               $data[]=$row->person_id;
           }
           return $data;
       }
       return false;
   }
   //==========================================
    function delete($order_num){
        $this->db->where("order_num",$order_num);
        $this->db->delete("haj_omra_order");
    }

} // END CLASS
?>