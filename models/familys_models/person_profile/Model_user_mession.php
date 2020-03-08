<?php
class Model_user_mession extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="";
    }
    //     $this->db->join('users', 'users.usrID = users_profiles.usrpID',"left");
    //==========================================
    public function select_my_messions($id){
        $this->db->select('transformation_process.* ,users.user_name as sender_name ,process_procedures.title as mession_title ');
        $this->db->from("transformation_process");
        $this->db->join('users', 'users.user_id = transformation_process.to_id',"left");
        $this->db->join('process_procedures', 'process_procedures.id = transformation_process.process_procedure_id_fk',"left");
        $this->db->where("to_id",$id);
        $this->db->where("action",0);
        $this->db->order_by("date","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
   //==============================================
   public function update_action($value ,$id){
       
       $data['date_action']=strtotime(date("Y-m-d",time()));
        $data['date_s_action']=time();
       $data["action"]= $value;
       $this->db->where("id",$id);
       $this->db->update("transformation_process",$data);
   }
   //==========================================
    public function select_finish_action($id){
        $this->db->select('transformation_process.* ,users.user_name as sender_name ,process_procedures.title as mession_title ');
        $this->db->from("transformation_process");
        $this->db->join('users', 'users.user_id = transformation_process.to_id',"left");
        $this->db->join('process_procedures', 'process_procedures.id = transformation_process.process_procedure_id_fk',"left");
        $this->db->where("to_id",$id);
        $this->db->where("action",1);
        $this->db->order_by("date","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

}//END CLASS


