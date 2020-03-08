<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pill_model extends CI_Model
{
    public function select_all_by_fr_all_pills($arr,$q)
    {
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->where('deport_sand_qabd',0);
        $this->db->where($arr);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $data=array();
            foreach ($query->result() as $row){

                $data[$x] =  $row;
                $data[$x]->publisher_name  = $this->get_user_name_submit($row->publisher);

                $data[$x]->pill_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
                $data[$x]->Fe2a_title =  $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title =  $this->GetTitleFromFr_bnod_pills_setting($row->erad_type);
                if($q==1) {
                    $data[$x]->fe2a_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                    $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);
                } if($q==2){
                    $data[$x]->fe2a_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type2);
                    $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type2);
                }
               // $data[$x]->fe2a_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                if(!empty($row->person_type)){
                    $data[$x]->MemberDetails =  $this->GetMemberNameByID($row->person_id_fk,$row->person_type);
                }
               // $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);
                $data[$x]->bank_title =  $this->GetBankTitle($row->bank_id_fk);
                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $x++;}
            return$data;
        }else{
            return 0;
        }

    }

    public function GetTitleFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }


    public function GetMemberNameByID($id,$type){
        $arr_type =array(1=>'fr_sponsor',2=>'fr_donor',3=>'general_assembley_members');
        $h = $this->db->get_where($arr_type[$type], array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr;
        }else{
            return 0;
        }


    }
    public function GetAccountName($id){

        $h = $this->db->get_where("society_main_banks_account", array('id'=>$id));
        if($h ->num_rows() > 0){
            return $h->row_array()['title'];
        }else{
            return 0;
        }


    }

    public function GetAccountNum($id){

        $h = $this->db->get_where("society_main_banks_account", array('id'=>$id));
        if($h ->num_rows() > 0){
            return $h->row_array()['account_num'];
        }else{
            return 0;
        }


    }
    public function GetFe2aTitle($id){
        $h = $this->db->get_where("fr_sponser_donors_setting", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }

    }
    public function GetBankTitle($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }

    }


    public function get_user_name_submit($user_id)
    {
        $this->db->select('*');
        $this->db->where("user_id",$user_id);
        $query=$this->db->get('users');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $name = $this->get_user_name_member($data->user_name);
                return $name;
            }
            elseif($data->role_id_fk == 3)
            {
                $name = $this->get_emp_name($data->emp_code);
                return $name;
            }
            elseif($data->role_id_fk == 4)
            {
                $name = $this->name_general_assembley($data->user_name);
                return $name;
            }



        }
        return false;
    }

    public function get_user_name_member($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('magls_members_table');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->member_name;
        }
        return false;

    }

    public function get_emp_name($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('employees');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->employee;
        }
        return false;

    }

    public function name_general_assembley($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->name;
        }
        return false;

    }

    public function get_all_publisher()
    {
        $this->db->select('publisher');
        $this->db->from('fr_all_pills');
        $this->db->order_by('id','desc');
        $this->db->group_by('publisher');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $data=array();
            foreach ($query->result() as $row){

                $data[$x] =  $row;
                $data[$x]->publisher_name  = $this->get_user_name_submit($row->publisher);

                $x++;}
            return$data;
        }else{
            return 0;
        }

    }
    /*****************************************************************///==========================================
      
    public function get_all_record($arr,$q)
    {
        $date_to=$this->input->post('date_to');
        $date_from=$this->input->post('date_from');
        $pay_method=$this->input->post('pay_method');
        $type_pay=$this->input->post('type_pay');
        $publisher=$this->input->post('publisher');
        
        $this->db->select('*');
        $this->db->from('fr_all_pills');



        if(!empty($publisher))
        {
            $this->db->where('publisher',$publisher);
        }
        if(!empty($date_from))
        {
            $this->db->where('date>=',$date_from);
        }
        if(!empty($date_to))
        {
            $this->db->where('date<=',$date_to);
        }
        if(!empty($pay_method)&&$pay_method!=3)
        {
            $this->db->where('pay_method',$pay_method);
        }
        if(!empty($pay_method)&& !empty($type_pay)&&$pay_method==3)
        {
            $this->db->where_in('pay_method',$type_pay);
        }
       $this->db->where($arr);



        $this->db->order_by('date','asc');
        $this->db->where('deport_sand_qabd',0);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $x=0;
            $data=array();
            foreach ($query->result() as $row){

                $data[$x] =  $row;

                $data[$x]->publisher_name  = $this->get_user_name_submit($row->publisher);

                $data[$x]->pill_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
                $data[$x]->Fe2a_title =  $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title =  $this->GetTitleFromFr_bnod_pills_setting($row->erad_type);
                if($q==1) {
                    $data[$x]->fe2a_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                    $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);
                } if($q==2){
                    $data[$x]->fe2a_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type2);
                    $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type2);
                }
                if(!empty($row->person_type)){
                    $data[$x]->MemberDetails =  $this->GetMemberNameByID($row->person_id_fk,$row->person_type);
                }

                $data[$x]->bank_title =  $this->GetBankTitle($row->bank_id_fk);
                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $x++;}
            return$data;
        }else{
            return 0;
        }

    }


    public function insert_test_esal()
    {
        $rkm_esal=$this->input->post('rkm_esal');
        $band_id=$this->input->post('band_id');
        $value=$this->input->post('value');
        if(!empty($band_id)){

            $count=count($rkm_esal);
            for($x=0;$x<$count;$x++)
            {
                $data['rkm_esal']=$this->input->post('rkm_esal')[$x];
                $data2['band_id']=$this->input->post('band_id')[$x];
                $data['name_hesab']=$this->GetTitleFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['rqm_hesab']=$this->GetcodeFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['value']=$this->input->post('value')[$x];
                $data['publisher_esal']=$_SESSION['user_id'];
                if(!empty($this->input->post('publisher_name')[$x])) {
                    $data['publisher_name'] = $this->input->post('publisher_name')[$x];
                }
                $this->db->insert('esal_test-table',$data);
               
            }

        }
        return  $data;
    }
    public function GetcodeFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['code'];
        }else{
            return 0;
        }


    }
    

}