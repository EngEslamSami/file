<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 9/2/2018
 * Time: 2:22 PM
 */ // Model_user_permission
class Model_user_permission extends  CI_Model{

    public function __construct(){
    }
   
    //======================================

    public function get_categories(){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where("group_id_fk",0);
        $this->db->order_by('page_order','ASC');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->page_id);
            $i++;
        }
        return $categories;
    }
//-----------------------------------------------------------
    public function sub_categories($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('group_id_fk', $id);
        $this->db->order_by('page_order','ASC');
        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->page_id);
            $i++;
        }
        return $categories;
    }



    //=======================================
   public function get_my_page_permession($user_id){
        $this->db->select('permissions.* , pages.*');
        $this->db->from("permissions");
        $this->db->join('pages', 'pages.page_id = permissions.page_id_fk',"left");
        $this->db->where("user_id",$user_id);
        $this->db->where("page_level",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             $i=0;$data=$query->result();
             $permetions=$this->get_user_permision($user_id);
           foreach ($query->result() as $row ){
              $data[$i]->sub=$this->get_sub_page($row->page_id_fk,$permetions);
              $i++;
           }
            return $data;
        }
        return array();
    }
    //======================================
    public  function get_sub_page($group_id_fk,$permetions){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where("group_id_fk",$group_id_fk);
        $this->db->where_in("page_id",$permetions);
        $this->db->order_by('page_order','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;$data=$query->result();
            foreach ($query->result() as $row ){
                if(in_array($row->page_id,$permetions)) {
                    $data[$i]->sub=$this->get_sub_page($row->page_id,$permetions);
                    $i++;
                }else{
                    continue;
                }
            }
            return $data;
        }
        return array();
    }
    //======================================
    public function get_user_permision($user_id){
        $this->db->select('page_id_fk ');
        $this->db->from("permissions");
        $this->db->where("user_id",$user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->page_id_fk;
            }
            return $data;
        }
        return false;
    }


} // end class