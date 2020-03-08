<?php
class Activites_orders_m extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="area_settings";
    }



    public function select_all_members(){
        $this->db->select('*');
        $this->db->from('f_members');
      //  $this->db->where('mother_national_num_fk',$mother_national_num);
        $query = $this->db->get();
        $a=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                if($row->stage_id_fk !=0 && $row->stage_id_fk!=''){
                    $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                }
                if($row->class_id_fk !=0 && $row->class_id_fk!=''){
                    $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);

                }
                
                
                    $data[$a]->mother_name = $this->get_mother_name($row->mother_national_num_fk);
                
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }
    public function get_classroom_name($id){
        $this->db->select('*');
        $this->db->from('classrooms');
        $this->db->where("id",$id);
        $myquery = $this->db->get();
        $all_resultes = $myquery->result()[0]->name;
        return $all_resultes;
    }


     public  function get_mother_name($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }
    
    
    public function insert_activites_orders(){



        $data['activity_id_fk']=3;
         $data['type']=$this->input->post('type');
    for($x = 0 ; $x < count($this->input->post('members')) ; $x++){
        $member_id_fk=$this->input->post('members')[$x];
      $data['member_id_fk']=$member_id_fk;
      $data['mother_national_num_fk']= $this->get_mother_national_num_fk($member_id_fk);
  
    $data['date'] = strtotime(date("Y-m-d"));
    $data['date_ar'] = date("Y-m-d");
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_username'];
    $this->db->insert('prog_activites_orders',$data); 
    } 
}
    
    
     public  function get_mother_national_num_fk($member_id){
    
        $h = $this->db->get_where("f_members", array('id'=>$member_id));
        $arr= $h->row_array();
        return $arr['mother_national_num_fk'];

    }
    
        public function select_by(){
        $this->db->select('*');
        $this->db->from('prog_activites');
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
     public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('prog_activites');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `prog_activites` WHERE `from_id_fk`=' . $row->from_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
    
    
        public function select_all(){
        $this->db->select('*');
        $this->db->from('f_members');
      //  $this->db->where('mother_national_num_fk',$mother_national_num);
        $query = $this->db->get();
        $a=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                if($row->stage_id_fk !=0 && $row->stage_id_fk!=''){
                    $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                }
                if($row->class_id_fk !=0 && $row->class_id_fk!=''){
                    $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);

                }
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }   



}//END CLASS


