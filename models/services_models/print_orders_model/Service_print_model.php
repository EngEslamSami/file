<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_print_model  extends CI_Model
{

        public function get_mirrage_help($id,$table)
    {


            $this->db->where('id', $id);

            $query = $this->db->get($table)->result();
            $data = array();
            $x = 0;
            foreach ($query as $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->get_name($row->child_id_fk)->member_full_name;
                $data[$x]->num = $this->get_name($row->child_id_fk)->member_card_num;
                $data[$x]->mob= $this->get_name($row->child_id_fk)->member_mob;
                if($table=="marriage_help"){
                    $data[$x]->nationality = $this->get_nationality($row->nationality_id_fk);
                }
                $x++;


        }
return $data;
    }
public function get_name($id)
{
    $this->db->where('id',$id);

 return $this->db->get('f_members')->row();

}
    public function get_nationality($id)
    {

        $this->db->where(array('type'=>2,'id_setting'=>$id));

        return $this->db->get('family_setting')->row()->title_setting;
    }
    //==========================================
    public function select_all($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("id",$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->result();$i=0;
            foreach ($query->result() as $row ){

                if($table=="school_supplies_order"){
                    $id=$row->person_id;
                }

                else{
                  $id= $row->child_id_fk;
                }

                $data[$i]->member_name=$this->get_member($id)->member_full_name;
               $data[$i]->num=$this->get_member($id)->member_card_num;
                $data[$i]->mobile=$this->get_member($id)->member_mob;
                if($table=="school_supplies_order") {
                    $data[$i]->support_name = $this->get_support($row->school_supplies_id_fk);
                }
                $data[$i]->order=$this->get_order($row->order_num,17)->title_setting;
                $i++;
            }
            return $data;
        }
        return false;
    }
    //===============================================
    public  function  get_order($id,$type){
        $this->db->select('*');
        $this->db->from("family_setting");
        $this->db->where(array('type'=>$type));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    //==========================================
    public  function  get_member($person_id){

        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("id",$person_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           return $query->row();
        }
        return false;
    }
    //==========================================
    public  function  get_support($school_supplies_id_fk){
        $this->db->select('title_setting');
        $this->db->from("family_setting");
        $this->db->where("id_setting",$school_supplies_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row_array() ;
            return $data["title_setting"];
        }
        return false;
    }



}
?>