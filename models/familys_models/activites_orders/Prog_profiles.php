<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prog_profiles extends CI_Model {


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
        $this->db->order_by('id','desc');    
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
                $query_result[$i]->all_members_registered = $this->get_members_inactiv($row->id);
                $query_result[$i]->sum_finance = $this->get_sum_finance($row->id);
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }



public function get_sum_finance($activity_id_fk){
    
        $this->db->from("start_activity_finance");
        $this->db->where("activity_id_fk",$activity_id_fk);
    $query =   $this->db->get();
    if ($query->num_rows() > 0) {
        $data=0; foreach ($query->result() as $row) {
            $data += $row->cost;
        }
        return $data;
    }else{
        return 0;
    }

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
    
    public function get_members_inactiv($activity_id_fk){
        $this->db->select('*')->from('prog_activites_orders')->where('start_activ_id_fk',$activity_id_fk); 
        $q = $this->db->get(); 
        return $q->num_rows();
    }    
    
    



} // end class


