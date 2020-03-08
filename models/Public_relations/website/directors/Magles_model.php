<?php
class Magles_model extends CI_Model{

    public function all_councils($state){
        $this->db->select('*');
        $this->db->from('council_admin_table'); //magls_members_table
      //  $this->db->order_by('job_title_id_fk');
     //  $this->db->where('show_web',1);
      
        $this->db->where('status',$state);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=null;
            foreach ($query->result() as $row) {
                $query2 = $this->db->query("SELECT * FROM `magls_members_table` WHERE `council_id_fk`=".$row->id .' and show_web = 1 order by id asc' );

                if ($query2->num_rows() > 0) {
                    $sub_data=array();
                    $x=0;
                    $x=0;
                    foreach ($query2->result() as $row2) {

                        $sub_data[$x] = $row2;
                        $sub_data[$x]->emp_name = $this->get_member_details($row2->member_name,'name');
                        $sub_data[$x]->surname = $this->get_member_details($row2->member_name,'surname');
                        $sub_data[$x]->mob = $this->get_member_details($row2->member_name,'mob');
                        $sub_data[$x]->email = $this->get_member_details($row2->member_name,'email');
                        $sub_data[$x]->member_img = $this->get_member_details($row2->member_name,'member_img');
                        $sub_data[$x]->emp_surname = $this->GetFromGeneral_assembly_settings($sub_data[$x]->surname);
                        $x++;



                    }
                    $data[$row->id] = $sub_data;
                }
            }
            return $data;
        }
        return false;
    }

    public function get_member_details($id,$select)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('general_assembley_members');
        if($query->num_rows()>0)
        {
            return $query->row()->$select;
        }else{
            return false;
        }

    }

    public function GetFromGeneral_assembly_settings($id){
        $this->db->select('*');
        $this->db->from('general_assembly_settings');
        $this->db->where('type',4);
        $this->db->where('id_setting',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           return $query->row()->title_setting;
        }
        return false;
    }

    public function display_general_assemply_members(){

        $this->db->select('*');
        $this->db->from('general_assembley_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->surname_name= $this->GetFromGeneral_assembly_settings($row->surname);
                $i++;
            }
            return $data;
            //return $query->result();
        }
        return false;

    }


}