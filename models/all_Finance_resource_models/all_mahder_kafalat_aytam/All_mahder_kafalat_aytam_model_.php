<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_mahder_kafalat_aytam_model extends CI_Model
{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }


    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("fr_all_pills");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id + 1;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function select_last_mahader_num()
    {
        $this->db->select('session_num_fk,session_year');
        $this->db->from("all_mahader_lagna_arch_ended");
        $this->db->order_by("session_num_fk", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }




    public function getfamilyData($arr)
    {
        $this->db->select('file_num,father_name,father_national_num,mother_national_num,
        file_status,process_title');
        $this->db->from("basic");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query->row();
            $query->row()->mostafed_number=$this->getMostafedNum(array('mother_national_num_fk'=>$query->row()->mother_national_num));
            return $query->row();
        } else {
            return false;
        }
    }


    public function getMostafedNum($arr)
    {
        $this->db->select('persons_status,mother_national_num_fk');
        $this->db->from("f_members");
        $this->db->where('persons_status',1);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    public function select_mahder_by_mehwar($arr)
    {
        $this->db->select('session_num_fk,session_year,mehwar_id_fk,file_num,lagna_reason_title');
        $this->db->from("all_mahader_lagna_arch_ended");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->family_data = $this->getfamilyData(array('file_num'=>$row->file_num));
                $x++;}
            return $data;
        } else {
            return false;
        }
    }


    public function select_all_mahder_data()
    {
        $last_magder =$this->select_last_mahader_num();
        if(!empty($last_magder)){
        $this->db->select('session_num_fk,session_year,mehwar_id_fk,mehwar_title');
        $this->db->from("all_mahader_lagna_arch_ended");
        $this->db->where("session_num_fk",$last_magder->session_num_fk);
        $this->db->where("session_year",$last_magder->session_year);
        $this->db->group_by("mehwar_id_fk");
        $this->db->order_by("mehwar_id_fk", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
              //  $data[$x] = $row->mehwar_id_fk;
                $data[$x]->mehwer_details = $this->select_mahder_by_mehwar(
                    array("session_num_fk"=>$last_magder->session_num_fk,
                        "session_year"=>$last_magder->session_year,
                        "mehwar_id_fk"=>$row->mehwar_id_fk));
            $x++; }
            return $data;
            //return $query->result();
        } else {
            return false;
        }
        }else{
            return false;
        }
    }


    public function getMembers($arr)
    {
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $x=0;
            foreach ($query->result() as $row) {
             $data[$x] = $row;
             $data[$x]->relation_name = $this->get_setting_name($row->member_relationship);
             $data[$x]->persons_status = $this->get_hala($row->persons_status);
             $x++;}
            return $data;

        } else {
            return false;
        }
    }

    public  function get_setting_name($id_setting){

        $h = $this->db->get_where("family_setting", array('id_setting'=>$id_setting));
        $arr= $h->row_array();
        return $arr['title_setting'];

    }

    public function get_hala($id)
    {
        $this->db->select('*');
        $this->db->from('persons_status_setting');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        }else{
            return false;
        }
    }



    public function getMother($arr){
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->relation_name = $this->get_setting_name($row->m_relationship);
                $data[$a]->persons_status = $this->get_hala($row->halt_elmostafid_m);
                $a++;
            }
            return $data;
        }
        return false;


    }
}

