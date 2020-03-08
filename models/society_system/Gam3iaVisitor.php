<?php

class Gam3iaVisitor extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//=============================================================================================================//


    public function selectAllByType($type)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result();

            return $data;
        }
    }

   



    public function get_one_vesitor($id)
    {
        $this->db->select('*');
        $this->db->from('gam3ia_visitors');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            return $data;
        }
    }

    public function insertGam3iaVisitors($id)
    {
        $data['visit_date']=$this->chek_Null($this->input->post('visit_date'));
        $data['visit_time_start']=$this->chek_Null($this->input->post('visit_time_start'));
        $data['visit_time_end']=date("h:i:sa");
        $data['visit_date'] = strtotime(date("m/d/Y"));
        $data['visit_date_ar'] = $this->chek_Null($this->input->post('visit_date'));
        $data['visit_date_s'] =  time();
        $data['date_s'] = time();
        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['fe2a']=$this->chek_Null($this->input->post('fe2a'));
        $data['purpose']=$this->chek_Null($this->input->post('purpose'));
        $data['twasol']=$this->chek_Null($this->input->post('twasol'));
        $data['elentb']=$this->chek_Null($this->input->post('elentb'));
       


        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_ar'] = date("m/d/Y");
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        if($id == 0){
            $this->db->insert('gam3ia_visitors',$data);
        }else{
            $this->db->where("id",$id);
            $this->db->update('gam3ia_visitors',$data);
        }

    }




    public function get_all_record()
    {
        return $this->db->get('gam3ia_visitors')->result();
    }




    public function deleteGam3iaVisitors($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('gam3ia_visitors');
    }



}
?>