<?php
class Fr_member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function general_assembley_members()
    {
     return $this->db->get('general_assembley_members')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('general_assembley_members');
        if($query->num_rows()>0)
        {
            return $query->row();

        }else{
            return false;
        }
    }

    public function select_all_banks()
    {
        return $this->db->get('banks_settings')->result();
    }
    public function data()
    {
       $data['member_id_fk']=$this->input->post('member_id_fk');
        $data['magls_num']=$this->get_magls_num($this->input->post('member_id_fk'));
        $data['member_mob']=$this->input->post('member_mob');
        $data['member_ship_type_fk']=$this->input->post('member_ship_type_fk');
        $data['member_ship_num']=$this->input->post('member_ship_num');
        $data['qrar_num']=$this->input->post('qrar_num');
        //===============
        $data['qrar_date']=$this->input->post('qrar_date');
        $data['value']=$this->input->post('value');
        $data['bank_account_num']=$this->input->post('bank_account_num');
        $data['bank_id_fk']=$this->input->post('bank_id_fk');
        $data['qrar_num']=$this->input->post('qrar_num');
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
        $data['to_date_s']=strtotime($this->input->post('to_date'));
        $data['from_date_s']=strtotime($this->input->post('from_date'));
         $data['date']=date("Y-m-d");

        $data['alert_update']=$this->input->post('alert_update');
        $data['alert_num']=$this->input->post('alert_update');
        $data['member_status']=$this->input->post('member_status');
        $data['member_status_reason_fk']=$this->input->post('member_status_reason_fk');
        $data['publisher']=$_SESSION['user_username'];

        return $data;
    }
    public function insert_data()
    {
        $data=$this->data();
        $this->db->insert('fr_members',$data);
    }
    public function edit_data($id)
    {
        $this->db->where('id',$id);
        $data=$this->data();
        $this->db->update('fr_members',$data);

    }
    public function get_magls_num($id)
    {
      $this->db->where('id',$id);
        $query=$this->db->get('general_assembley_members');
        if($query->num_rows()>0){
            $query->row()->qrar_num;
        }else{
            return 0;
        }

    }

    public function get_all()
    {
        $query=$this->db->get('fr_members')->result();
        $data=array();
        $x=0;
        foreach ($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->member_name=$this->get_member_name($row->id);
            $data[$x]->member_type=$this->get_member_type($row->member_ship_type_fk);
            $x++;

        }
        return $data ;



    }

    public function get_member_name($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('general_assembley_members');
        if($query->num_rows()>0){
           return  $query->row()->name;
        }else{
            return "لم تحدد";
        }
    }
    public function get_member_type($id)
    {
        $this->db->where('id_setting',$id);
        $query=$this->db->get('general_assembly_settings');
        if($query->num_rows()>0){
           return  $query->row()->title_setting;
        }else{
            return "لم تحدد";
        }
    }

    public function get_data_by_id($id,$table)
    {
        $this->db->where('id',$id);
        $query=$this->db->get($table);
        if($query->num_rows()>0){
            return  $query->row();
        }else{
            return false;
        }
    }

    public function delete_record($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('fr_members');
    }
}
