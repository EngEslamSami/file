

<?php

class T_counts_model extends CI_Model

{

    public function __construct() {

        parent::__construct();

    }
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
/******************************************************/


    public function get_all_files()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    public function get_all_files_active()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $this->db->where("file_status", 1);
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_all_files_non_active()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $this->db->where("file_status", 4);
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }




    public function get_all_talabat()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend !=", 4);
   
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

/*******************************************/
  

    public function get_mostafed(){
            
      $this->db->select('basic.* , f_members.mother_national_num_fk ,f_members.id');
        $this->db->from("basic");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num',"left");
            
            $this->db->where("basic.final_suspend",4); // ""
           $this->db->where("basic.file_status", 1);
            $this->db->where("f_members.categoriey_member ",3);
           // $this->db->where("halt_elmostafid_member",1);
              $this->db->where("f_members.persons_status",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }


    public function get_yatem(){
            
      $this->db->select('basic.* , f_members.mother_national_num_fk ,f_members.id');
        $this->db->from("basic");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num',"left");
            
            $this->db->where("basic.final_suspend",4); // ""
           $this->db->where("basic.file_status", 1);
            $this->db->where("f_members.categoriey_member ",2);
           // $this->db->where("halt_elmostafid_member",1);
              $this->db->where("f_members.persons_status",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }






    public function get_mother_num(){
            
      $this->db->select('basic.* , mother.mother_national_num_fk ,mother.id');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            
            $this->db->where("basic.final_suspend",4); // ""
           $this->db->where("basic.file_status", 1);
            $this->db->where("mother.categoriey_m ",1);
              $this->db->where("mother.halt_elmostafid_m",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }














/*********************************************/








    public function select_where_cashing()
    {    //basic.file_num ,basic.mother_national_num  , mother.mother_national_num_fk ,mother.full_name
        $this->db->select('basic.file_num ,basic.mother_national_num  ,
                          mother.mother_national_num_fk ,mother.full_name ,
                          father.full_name as father_full_name  ');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->where('basic.suspend',4);
        $this->db->order_by('basic.file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                /********* الارامل ***********/
                $data[0]->mother_num_in = $this->get_armal_sum_armal_full_active_mother_new();
                /********* الايتام ***********/
                $data[0]->down_child = $this->get_yatem_full_active();

                /********* البالغين ***********/
                $data[0]->up_child = $this->get_bale3_full_active();

                $i++;
            }
            return $data;
        }
        return false;
    }


    public function get_armal_sum_armal_full_active_mother_new()
    {
        $this->db->select("*");
        $this->db->from("mother");
      //  $this->db->where("mother_national_num_fk", $mother_national_num_fk);
         $this->db->where("person_type",62);
        $this->db->where("categoriey_m", 1);
        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    
    
       public function get_yatem_full_active()
    {
        $this->db->select("*");
        $this->db->from("f_members");
       // $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        // $this->db->where("member_person_type",62);
        $this->db->where("categoriey_member", 2);
      //  $this->db->where('halt_elmostafid_member', 1);
         $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    } 

    public function get_bale3_full_active()
    {
        $this->db->select("*");
        $this->db->from("f_members");
        //$this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 3);
       // $this->db->where('halt_elmostafid_member', 1);
          $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    
    
    


}