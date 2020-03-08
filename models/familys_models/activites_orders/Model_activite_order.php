<?php
class Model_activite_order extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="prog_activites_orders";
    }
    //==========================================
    public function select_finish_activite(){
        $this->db->select('activity_id_fk');
        $this->db->from($this->main_table);
        $this->db->where("finshed",1);
        $this->db->group_by("activity_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                $data[]=$item->activity_id_fk;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public function select_membet_in($codition){
        $this->db->select('member_id_fk');
        $this->db->from($this->main_table);
        $this->db->where("finshed",0);
        $this->db->where($codition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $item) {
                $data[]=$item->member_id_fk;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public function select_activite($from_id_fk){
        $this->db->select('*');
        $this->db->from("prog_activites");
        $this->db->where("from_id_fk",$from_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return $this->db->last_query();
    }
    //==========================================
    public function select_places(){
        $this->db->select('*');
        $this->db->from("places_prog_settings");
        $this->db->order_by("title","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function select_search_mother($search_key_value){
        $this->db->select('mother_national_num_fk, id ,full_name');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public function select_search_member($search_key_value){
        $this->db->select('mother_national_num_fk, id ,member_full_name');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public  function insert(){
        
        $data['activity_id_fk'] = $this->input->post('activity_id_fk');
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num_fk');
        $data['type_id_fk']= $this->input->post('type_id_fk');
        $data['start_activ_id_fk']= $this->input->post('start_activ_id_fk');
        $data['date']= strtotime(date("Y-m-d",time()));
        $data['date_ar']= date("Y-m-d",time());
        $data['date_s']= time();
        $data['publisher']= $_SESSION["user_id"]; // person
        foreach ($this->input->post('person') as $key=>$value) {
              $data_person=explode("-",$value);
            $data['member_id_fk'] =$data_person[0];
            $data['person'] = $data_person[1];
         $this->db->insert("prog_activites_orders",$data );
        }
    }
    //==========================================
    public function select_in_activite($arr_cond){
        $this->db->select('start_activity.id  ,start_activity.prog_id_fk ,start_activity.active_id_fk ,
                           start_activity.place_id_fk ,start_activity.from_date ,start_activity.to_date ,
                           places_prog_settings.title , prog_activites.name');
        $this->db->from("start_activity");
        $this->db->join('prog_activites', 'prog_activites.id = start_activity.prog_id_fk',"left");
        $this->db->join('places_prog_settings', 'places_prog_settings.id = start_activity.place_id_fk',"left");
       // $this->db->where($arr_cond);
        // $this->db->where("start_activity.from_date <=",time());
       // $this->db->where("start_activity.to_date >=",time());
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================


}//END CLASS


