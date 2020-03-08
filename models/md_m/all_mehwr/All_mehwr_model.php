<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 01:34 م
 */

class All_mehwr_model extends CI_Model
{
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function select_last_galsa(){
        $this->db->select('*');
        $this->db->from("md_all_glasat");
        $this->db->where("glsa_finshed",0);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return false;
        }
    }

    public function get_data(){
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->group_by("glsa_rkm");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row){
                $data[$a] =$row;
                $data[$a]->mehwr_num =$this->get_mehwr($row->glsa_rkm);
                  $data[$a]->glsa_members =$this->get_glasat_hdoor($row->glsa_rkm);

            $a++;}
            return $data;
        }else{
            return false;
        }
    }

    public function get_mehwr($glsa_rkm){
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm",$glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->num_rows();
        }else{
            return false;
        }
    }


    public function get_mehwr_details($glsa_rkm){
        $this->db->select('*');
        $this->db->from("md_gadwal_a3mal");
        $this->db->where("glsa_rkm",$glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row){

                $data[$a] =  $row ;

                $a++;}
            return $data;
        }else{
            return false;
        }
    }
    public function getById($glsa_rkm){
        $h = $this->db->get_where("md_gadwal_a3mal", array('glsa_rkm'=>$glsa_rkm));
        return $h->row();
    }


    public function insert_mehwr()
    {
        $last_galsa =$this->select_last_galsa();
         $mehwar_rkm =$this->input->post('mehwar_rkm');
         $mehwar_title =$this->input->post('mehwar_title');
          if(!empty($mehwar_rkm)){
        for($a=0;$a<sizeof($mehwar_rkm);$a++){
        $data['mgls_code'] = $last_galsa->mgls_code;
        $data['mgls_id_fk'] = $last_galsa->mgls_id_fk;
        $data['glsa_rkm'] = $last_galsa->glsa_rkm;
        $data['glsa_rkm_full'] = $last_galsa->glsa_rkm_full;
        $data['glsa_date_m'] = $last_galsa->glsa_date_m;
        $data['glsa_date_h'] = $last_galsa->glsa_date_h;
        $data['mehwar_rkm'] =$mehwar_rkm[$a];
        $data['mehwar_title'] = $mehwar_title[$a];
        $this->db->insert('md_gadwal_a3mal', $data);
        }
          }
    }

    public function update_mehwr($glsa_rkm)
    {

        $this->db->where('glsa_rkm', $glsa_rkm);
        $this->db->delete('md_gadwal_a3mal');


        $last_galsa =$this->select_last_galsa();
        $mehwar_rkm =$this->input->post('mehwar_rkm');
        $mehwar_title =$this->input->post('mehwar_title');
        if(!empty($mehwar_rkm)){
            for($a=0;$a<sizeof($mehwar_rkm);$a++){
                $data['mgls_code'] = $last_galsa->mgls_code;
                $data['mgls_id_fk'] = $last_galsa->mgls_id_fk;
                $data['glsa_rkm'] = $last_galsa->glsa_rkm;
                $data['glsa_rkm_full'] = $last_galsa->glsa_rkm_full;
                $data['glsa_date_m'] = $last_galsa->glsa_date_m;
                $data['glsa_date_h'] = $last_galsa->glsa_date_h;
                $data['mehwar_rkm'] =$mehwar_rkm[$a];
                $data['mehwar_title'] = $mehwar_title[$a];
                $this->db->insert('md_gadwal_a3mal', $data);

            }
        }



    }

    public function delete_row($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_gadwal_a3mal');

    }

    public function delete($glsa_rkm)
    {
        $this->db->where('glsa_rkm', $glsa_rkm);
        $this->db->delete('md_gadwal_a3mal');

    }
    
    
         public function get_glasat_hdoor($glsa_rkm){
        $this->db->select('*');
        $this->db->from("md_all_glasat_hdoor");
        $this->db->where("glsa_rkm",$glsa_rkm);
        $this->db->order_by("mansp_fk",'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row){

                $data[$a] =  $row ;

                $a++;}
            return $data;
        }else{
            return false;
        }
    }
}