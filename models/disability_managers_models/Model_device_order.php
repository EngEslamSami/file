<?php
class Model_device_order extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->main_table="disabilities_device_order";
    }
    //==========================================
    public  function select_all_peson(){
        $this->db->select('p_name , id ,p_num');
        $this->db->from("disabilities_persons");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public  function get_one_peson($id){
        $this->db->select('disabilities_persons.*,disabilities_type_settings.title as disability_title');
        $this->db->from("disabilities_persons");
        $this->db->join("disabilities_type_settings","disabilities_type_settings.id=disabilities_persons.disability_type_id_fk","left");
        $this->db->where("disabilities_persons.id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array() ;
        }
        return false;
    }
    //==========================================
    public  function select_all_device(){
        $this->db->select('*');
        $this->db->from("medical_devices");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public  function insert($last){
      foreach ($this->input->post("divice") as $key=>$value){
          $data["order_num"]=$last;
          $data["device_id_fk"]=$value;
          $data["amount_device"]=$this->input->post("numbers")[$key];
          $data["person_id_fk"]=$this->input->post("person");
          $data["order_date"]=$this->input->post("order_date");
          $data["date"]=strtotime(date("Y-m-d"),time());
          $data["date_s"]=time();
          $data["publisher"]=$_SESSION["user_id"];
          $this->db->insert($this->main_table,$data);
      }
    }
    //==========================================
    public function delete_person_device($id){
        $this->db->where("order_num",$id);
        $this->db->delete($this->main_table);
    }
    //==========================================
    public  function update($id){
        foreach ($this->input->post("divice") as $key=>$value){
            $data["order_num"]=$id;
            $data["device_id_fk"]=$value;
            $data["amount_device"]=$this->input->post("numbers")[$key];
            $data["person_id_fk"]=$this->input->post("person");
            $data["order_date"]=$this->input->post("order_date");
            $data["date"]=strtotime(date("Y-m-d"),time());
            $data["date_s"]=time();
            $data["publisher"]=$_SESSION["user_id"];
            $this->db->insert($this->main_table,$data);

        }
    }
    //==========================================
    public function select_all(){
        $this->db->select('disabilities_device_order.* ,
                           disabilities_persons.p_name  ,disabilities_persons.p_num');
        $this->db->from($this->main_table);
        $this->db->join("disabilities_persons","disabilities_persons.id=disabilities_device_order.person_id_fk","left");
        $this->db->order_by("order_id","DESC");
        $this->db->group_by("disabilities_device_order.order_num");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result() ;$i=0;
            foreach ($query->result() as $row){
                $data[$i]->sub = $this->get_person_device($row->order_num);
                $i++;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public function get_person_device($id){
        $this->db->select('disabilities_device_order.* ,
                           medical_devices.title ');
        $this->db->from("disabilities_device_order");
        $this->db->join("medical_devices","medical_devices.id=disabilities_device_order.device_id_fk","left");
        $this->db->where("disabilities_device_order.order_num",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function select_last_order_num(){
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
    public  function select_all_medical(){
        $this->db->select('*');
        $this->db->from("medical_company");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public  function update_need_suport($order_num ,$value){
        $data["need_suport"]=$value;
        $this->db->where("order_num",$order_num);
        $this->db->update($this->main_table,$data);
    }
    //==========================================
    public  function update_approved_device($order_id ,$value){
        $data["approved_device"]=$value;
        $this->db->where("order_id",$order_id);
        $this->db->update($this->main_table,$data);
    }
    //==========================================
    public  function update_medical_company($order_id ,$value){
        $data["medical_company_id_fk"]=$value;
        $this->db->where("order_id",$order_id);
        $this->db->update($this->main_table,$data);
    }
    //==========================================
    public function get_print_data($id){
        $this->db->select('disabilities_device_order.* ,
                           medical_devices.title ,
                           medical_company.title as company_name');
        $this->db->from("disabilities_device_order");
        $this->db->join("medical_devices","medical_devices.id=disabilities_device_order.device_id_fk","left");
        $this->db->join("medical_company","medical_company.id=disabilities_device_order.medical_company_id_fk","left");
        $this->db->where("disabilities_device_order.order_num",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function delete_device($id){
        $this->db->where("order_id",$id);
        $this->db->delete($this->main_table);
    }
    //==========================================

}//END CLASS




?>