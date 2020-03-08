<?php
class Donor_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }




   public function get_by_types($type)
   {
       $this->db->where('type',$type);
       $query=$this->db->get('fr_settings');
       if($query->num_rows()>0)
       {
           return $query->result();
       }else{
           return false;
       }
   }

    public function get_all_banks()
    {
        return $this->db->get('banks_settings')->result();
    }

    public function insert_donor()
    {
        $data['fe2a_type']=$this->input->post('fe2a_type');
        $data['donor_num']=$this->input->post('donor_num');
        //$data['d_type']=$this->input->post('d_type');
        $data['d_status']=$this->input->post('d_status');
        $data['d_name']=$this->input->post('d_name');
        $data['d_gender_fk']=$this->input->post('d_gender_fk');
        $data['d_national_num']=$this->input->post('d_national_num');
        $data['d_national_type']=$this->input->post('d_national_type');
        $data['d_national_place']=$this->input->post('d_national_place');
        $data['city']=$this->input->post('city');
        $data['address']=$this->input->post('address');
        $data['job_fk']=$this->input->post('job_fk');
        $data['job_place']=$this->input->post('job_place');
        $data['specialized_fk']=$this->input->post('specialized_fk');
        $data['d_nationality_fk']=$this->input->post('d_nationality_fk');
        $data['barid_box']=$this->input->post('barid_box');
        $data['barid_code']=$this->input->post('barid_code');
        $data['fax']=$this->input->post('fax');
        $data['mob']=$this->input->post('mob');
        $data['d_email']=$this->input->post('d_email');
        $data['d_activity_fk']=$this->input->post('d_activity_fk');
        $data['d_message_method']=$this->input->post('d_message_method');
        $data['d_message_mob']=$this->input->post('d_message_mob');
       // $data['d_notes']=$this->input->post('d_notes');
       // $data['img']=$this->input->post('img');
        $data['pay_method']=$this->input->post('pay_method');
        $data['bank_id_fk']=$this->input->post('bank_id_fk');
        $data['bank_account_num']=$this->input->post('bank_account_num');
        $data['bank_branch']=$this->input->post('bank_branch');
        $data['date']=date("Y-m-d");
        $data['date_s']=strtotime(date("Y-m-d"));
        $data['date_ar']=0;
        $data['publisher']=$_SESSION['user_name'];
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->db->insert('fr_donors',$data);


    }

    public function get_from_fr_donors()
    {
        $query = $this->db->get('fr_donors')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[$x] = $row;
            $x++;
        }
        return $data;

    }
        public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('fr_donors');
        if($query->num_rows()>0)
        {
            return $query->row();

        }else{
            return false;
        }
    }
    public function get_order_num()
    {
        $this->db->order_by('donor_num','desc');
        $query=$this->db->get('fr_donors');
        if($query->num_rows()>0)
        {
            return $query->row()->donor_num;
        }else{
            return 0;
        }
    }

    public function update_donor($id)
    {
        $data['fe2a_type']=$this->input->post('fe2a_type');

        $data['d_status']=$this->input->post('d_status');
        $data['d_name']=$this->input->post('d_name');
        $data['d_gender_fk']=$this->input->post('d_gender_fk');
        $data['d_national_num']=$this->input->post('d_national_num');
        $data['d_national_type']=$this->input->post('d_national_type');
        $data['d_national_place']=$this->input->post('d_national_place');
        $data['city']=$this->input->post('city');
        $data['address']=$this->input->post('address');
        $data['job_fk']=$this->input->post('job_fk');
        $data['job_place']=$this->input->post('job_place');
        $data['specialized_fk']=$this->input->post('specialized_fk');
        $data['d_nationality_fk']=$this->input->post('d_nationality_fk');
        $data['barid_box']=$this->input->post('barid_box');
        $data['barid_code']=$this->input->post('barid_code');
        $data['fax']=$this->input->post('fax');
        $data['mob']=$this->input->post('mob');
        $data['d_email']=$this->input->post('d_email');
        $data['d_activity_fk']=$this->input->post('d_activity_fk');
        $data['d_message_method']=$this->input->post('d_message_method');
        $data['d_message_mob']=$this->input->post('d_message_mob');

        $data['pay_method']=$this->input->post('pay_method');
        $data['bank_id_fk']=$this->input->post('bank_id_fk');
        $data['bank_account_num']=$this->input->post('bank_account_num');
        $data['bank_branch']=$this->input->post('bank_branch');
        $this->db->where('id',$id);
        $this->db->update('fr_donors',$data);

    }

    public function delete_data($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('fr_donors');
    }
}