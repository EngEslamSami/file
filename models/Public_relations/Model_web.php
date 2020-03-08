<?php
class Model_web extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
       
    }
    //==========================================
  public function all_select_news($limit){
       $this->db->select('*');
        $this->db->from("news");
        $this->db->order_by("id","DESC");
        $this->db->limit($limit);
        $query = $this->db->get();  
        if ($query->num_rows() > 0) {
            $data =$query->result();$i=0;
            foreach ($query->result() as $row) {
                $data[$i]->sub_img = $this->get_img($row->id);
                $i++;
            }
            return $data;
        }
        return false;
     }
   //===========================================
       public function get_img($id) {
         $this->db->where('f_id',$id);
         $query=$this->db->get('news_photo');
          if($query->num_rows() > 0){
            return $query->row()->img;
          } else{
            return  false;
           }
    }
 //===========================================
    public function all_select_article($limit){
        $this->db->select('*');
        $this->db->from("artical");
        $this->db->order_by("id","DESC");
        $this->db->limit($limit);
        $query = $this->db->get();  
        if ($query->num_rows() > 0) {
            $data =$query->result();$i=0;
            foreach ($query->result() as $row) {
                $data[$i]->sub_img = $this->get_img_article($row->id);
                 $i++;
            }
            
            return $data;
        }
        return false; 
    }
     //===========================================
       public function get_img_article($id) {
         $this->db->where('f_id',$id);
         $query=$this->db->get('artical_photo');
          if($query->num_rows() > 0){
            return $query->row()->img;
          } else{
            return  false;
           }
    }
    //===========================================
    
     public function select_add($limit){
        $this->db->select('*');
        $this->db->from("adds");
        $this->db->order_by("id","DESC");
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

     //===========================================
     public function check_login(){
           $this->db->select('*');
        $this->db->from('disabilities_persons');
        $this->db->where('p_national_num',$this->input->post('user_name'));
        $this->db->where('p_national_num',$this->input->post('user_pass'));
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
        
        
     }
      //========================================
         public function select_all($id){
        $this->db->select('*');
        $this->db->from('disabilities_persons');
        $this->db->where("id",$id);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;$data=$query->result() ;
            foreach ($query->result() as $row) {
                $data[$i]->photos = $this->get_photo($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    public function get_photo($f_id){
        $this->db->select('*');
        $this->db->from('disabilities_persons_files');
        $this->db->where("person_id_fk",$f_id);
         $query = $this->db->get();
    if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
}


/*******************************************/

  public function select_all_gam3ia_omomia(){
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_members');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
              
                $i++;
            }
            return $data;
        }
        return false;
    }

    
}//END CLASS


