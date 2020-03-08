<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_ohda_settings extends CI_Model
{
public function insert_data()
{
    $arr=array(1=>'مستديمه',2=>'مؤقته',3=>'عهد البرامج والامششط');
    //print_r($_POST); hesab_name  rkm_hesab
    $data['ohda_type_fk']=$this->input->post('ohda_type_fk');
    $data['ohda_type_name']=$arr[$this->input->post('ohda_type_fk')];

    $data['rkm_hesab']=$this->input->post('rkm_hesab');

    $data['hesab_name']=$this->input->post('hesab_name');

    $data['date_ar']=date("Y-m-d");

    $data['publisher']=$_SESSION['user_username'];
    $this->db->insert('finance_ohad_setting',$data);

}

    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('finance_ohad_setting');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }
    }


    public function update_data($id)
    {
        $arr=array(1=>'مستديمه',2=>'مؤقته',3=>'عهد البرامج والامششط');
        //print_r($_POST); hesab_name  rkm_hesab
        $data['ohda_type_fk']=$this->input->post('ohda_type_fk');
        $data['ohda_type_name']=$arr[$this->input->post('ohda_type_fk')];

        $data['rkm_hesab']=$this->input->post('rkm_hesab');

        $data['hesab_name']=$this->input->post('hesab_name');

        $data['date_ar']=date("Y-m-d");

        $data['publisher']=$_SESSION['user_username'];
        $this->db->where('id',$id);
        $this->db->update('finance_ohad_setting',$data);
    }

    public function get_all_records()
    {
        return $this->db->get('finance_ohad_setting')->result();
    }

    public function delete_record($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('finance_ohad_setting');

    }

    public function get_by_id_type($id)
    {
        $this->db->where('ohda_type_fk',$id);
        $query=$this->db->get('finance_ohad_setting');
        return $query->num_rows();

    }
}