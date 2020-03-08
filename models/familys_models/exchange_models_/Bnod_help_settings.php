<?php

class Bnod_help_settings extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

    }

//---------------------------------------------------
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = "";
            return $val;
        } else {
            return $post_value;
        }
    }
   //---------------------------------------------------


    public function add_data()
    {
        $data['title'] = $this->input->post('title');
        $this->db->insert("bnod_help", $data);
    }
    public function get_data_branch()
    {
        $this->db->select('*');
        $this->db->from("bnod_help");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $z=0;
            foreach ($query->result() as $row) {
                $data[$z] = $row;
                $data[$z]->checkDelete = $this->checkDelete($row->id);
                $z++; }
            return $data;
        }else{
            return 0;
        }
        
    }




    public function checkDelete($id){
        $this->db->select('*');
        $this->db->from("sarf_orders");
        $this->db->where("bnod_help_id_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }


    }


    public function delete_where_id($id)
    {
        $this->db->where('id', $id)->delete("bnod_help");
    }
    public function get_where_id($id)
    {
        return $this->db->get_where("bnod_help", array('id'=>$id))->row();
    }
    public function update_by_id($id)
    {
        $data['title'] = $this->input->post('title');
        $this->db->where('id',$id);
        $this->db->update("bnod_help",$data);
    }


}