<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prog_actives extends CI_Model {

    public function insert(){
        $data['name'] = $this->input->post('name');
        $this->db->insert('prog_activites',$data);
    }

    public function update($id){
        $data['name'] = $this->input->post('name');
        $this->db->where('id',$id);
        $this->db->update('prog_activites',$data);
    }

    public function getById($id){
        $h = $this->db->get_where('prog_activites', array('id'=>$id));
        return $h->row_array();
    }

    public function select_all(){
        $this->db->select('*');
        $this->db->from('prog_activites');
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->count =$this->get_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function get_sub($f_id){
        $h = $this->db->get_where('prog_activites', array('from_id_fk'=>$f_id));
        return $h->num_rows();
    }

    public function select_main(){
        $this->db->select('*');
        $this->db->from('prog_activites');
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_departments = $this->select_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function select_sub($f_id){
        $this->db->select('*');
        $this->db->from('prog_activites');
        $this->db->where("from_id_fk",$f_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function insert_sub(){
        $data['name'] = $this->input->post('name');
        $data['from_id_fk'] = $this->input->post('from_id_fk');
        $data['status'] = 1;
        $this->db->insert('prog_activites',$data);
    }

    public function update_sub($id){
        $data['name'] = $this->input->post('name');
        $data['from_id_fk'] = $this->input->post('from_id_fk');
        $data['status'] = 1;
        $this->db->where('id',$id);
        $this->db->update('prog_activites',$data);
    }
    
    public function select_allSub($where=false){
        $this->db->select('*');
        $this->db->from('prog_activites');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }



    public function insert_place(){
        $data['title'] = $this->input->post('name');
        $this->db->insert('places_prog_settings',$data);
    }


    public function select_all_places(){
        $this->db->select('*');
        $this->db->from('places_prog_settings');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            return $query_result;
        }
        return false;
    }


    public function update_place($id){
        $data['title'] = $this->input->post('name');
        $this->db->where('id',$id);
        $this->db->update('places_prog_settings',$data);
    }

    public function getPlaceById($id){
        $h = $this->db->get_where('places_prog_settings', array('id'=>$id));
        return $h->row_array();
    }

    
    public function select_all_setup_actives(){
        $this->db->select('*');
        $this->db->from('start_activity');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->program = $this->programById($row->prog_id_fk)->name;
                $query_result[$i]->activity = $this->activityById($row->active_id_fk)->name;
                $query_result[$i]->place = $this->placeById($row->place_id_fk)->title;
                $query_result[$i]->band_maly = $this->getBand($row->id,'start_activity_finance');
                $query_result[$i]->band_okhra = $this->getBand($row->id,'start_activity_items');
                $query_result[$i]->members = $this->get_members($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function activityById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('prog_activites')->row();
    }


/*
public function select_allActivity_ById($id)
{
    $this->db->where('id',$id);
    return $this->db->get('prog_activites')->result();
}*/

public function select_allActivity_ById($id) //old replace it
{
    $this->db->where('from_id_fk',$id);
    return $this->db->get('prog_activites')->result();
}

    public function programById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('prog_activites')->row();
    }

    public function placeById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('places_prog_settings')->row();
    }

    public function insert_setup_activity(){
        $data['prog_id_fk'] = $this->input->post('prog_id_fk');
        $data['active_id_fk'] = $this->input->post('activity_id_fk');
        $data['place_id_fk'] = $this->input->post('place_id_fk');
        $data['from_date'] = $this->input->post('from_date');
        $data['num'] = $this->input->post('num');
        $data['to_date'] = $this->input->post('to_date');
        $data['prog_goals'] = $this->input->post('prog_goals');
        $data['date'] = strtotime(time('Y-m-d'));
        $data['date'] = time('Y-m-d');
        
        
        
        $data['publisher'] = $_SESSION['user_username'];

        
        $this->db->insert('start_activity',$data);
    }

    public function update_setup_activity($id){
        $data['prog_id_fk'] = $this->input->post('prog_id_fk');
        $data['active_id_fk'] = $this->input->post('activity_id_fk');
        $data['place_id_fk'] = $this->input->post('place_id_fk');
        $data['from_date'] = $this->input->post('from_date');
        $data['num'] = $this->input->post('num');
        $data['to_date'] = $this->input->post('to_date');
        $data['prog_goals'] = $this->input->post('prog_goals');
       
        
        $this->db->where('id',$id);
        $this->db->update('start_activity',$data);
    }


    public function setup_activity_ById($id){
        $this->db->where('id',$id);
        return $this->db->get('start_activity')->row();
    }



   public  function  insert_members($arr,$activity_id_fk){

        //$data['f_id']=$last;
       // print_r($last)
        
        foreach($arr as $key=>$value){
        $data['name']=$value;    
         $data['activity_id_fk']=$activity_id_fk;  
         $this->db->insert('start_activity_members',$data);
        }
        
    }

   public  function  insert_items($arr,$arr2,$activity_id_fk){


        foreach($arr as $key=>$value_){
         $data['title']= 22;    
         $data['activity_id_fk']=$activity_id_fk;  
         $this->db->insert('start_activity_items',$data);
        }
         foreach($arr2 as $key=>$value){
        $data_['from_t']= $value;    
         $data_['activity_id_fk']=$activity_id_fk;  
         $this->db->insert('start_activity_items',$data_);
        } 
     
    }




/********************************************************/
    public function select_all_prog_details(){
        $this->db->select('*');
        $this->db->from('start_activity');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->program = $this->programById($row->prog_id_fk)->name;
                $query_result[$i]->activity = $this->activityById($row->active_id_fk)->name;
                $query_result[$i]->place = $this->placeById($row->place_id_fk)->title;
                $query_result[$i]->all_members = $this->get_all_members($row->id);
                
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }




    public function get_all_members($activity_id_fk){
        $this->db->select('*');
        $this->db->from('start_activity_members');
        $this->db->where('activity_id_fk',$activity_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
/******************************************************/
 public function insert_band_maly(){
    
    $band = $this->input->post('band');
        if (!empty( $band)) {
            $my_arr = $this->input->post('band');
            $this->db->insert_batch('start_activity_finance',$my_arr);
        }
    }


    public function insert_band_okhra(){
         $band = $this->input->post('band');
        if (!empty($band)){
            $my_arr = $this->input->post('band');
            $this->db->insert_batch('start_activity_items',$my_arr);
        }
    }

    function getBand($activity_id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('activity_id_fk',$activity_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return 0;
        }
    }


 
    public function select_all_setup_actives_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('start_activity');
        $query_result=$query->row();
        if ($query->num_rows() > 0) {

                $query_result->program = $this->programById($query_result->prog_id_fk)->name;
                $query_result->activity = $this->activityById($query_result->active_id_fk)->name;
                $query_result->place = $this->placeById($query_result->place_id_fk)->title;
              //  $query_result->sub = $this->select_all_items_by_id($query_result->active_id_fk);

            return $query_result;
        }
        return false;
    }

/********************************************************/
    public function select_start_activity_profile(){
        $this->db->select('*');
        $this->db->from('start_activity');
        //$this->db->where($Conditions_arr);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->finance = $this->get_finance($row->id);
                $query_result[$i]->items = $this->get_items($row->id);
                $query_result[$i]->members = $this->get_members($row->id);
                $query_result[$i]->program = $this->programById($row->prog_id_fk)->name;
                $query_result[$i]->activity = $this->activityById($row->active_id_fk)->name;
                $query_result[$i]->place = $this->placeById($row->place_id_fk)->title;
                $i++;
            }
            return $query_result;
        }
        return false;
    }


    public function select_start_activity($Conditions_arr){
        $this->db->select('*');
        $this->db->from('start_activity');
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->finance = $this->get_finance($row->id);
                $query_result[$i]->items = $this->get_items($row->id);
                $query_result[$i]->members = $this->get_members($row->id);
                $query_result[$i]->program = $this->programById($row->prog_id_fk)->name;
                $query_result[$i]->activity = $this->activityById($row->active_id_fk)->name;
                $query_result[$i]->place = $this->placeById($row->place_id_fk)->title;
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    //============================================
     public function get_finance($activity_id_fk){
        $this->db->select('*');
        $this->db->from("start_activity_finance");
        $this->db->where("activity_id_fk",$activity_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //=============================================
     public function get_items($activity_id_fk){
        $this->db->select('*');
        $this->db->from("start_activity_items");
         $this->db->where("activity_id_fk",$activity_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //=================================================
     public function get_members($activity_id_fk){
        $this->db->select('*');
        $this->db->from("start_activity_members");
         $this->db->where("activity_id_fk",$activity_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


} // end class




/* End of file Department_jobs.php */
/* Location: ./application/models/administrative_affairs_models/Department_jobs.php */