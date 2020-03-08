<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pill_model extends CI_Model
{
    public function select_all_by_fr_all_pills()
    {
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->where('deport_sand_qabd',0);
      //  $this->db->where($arr);

        $this->db->order_by('pill_num','asc');
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

                    $data[$x]->fe2a_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                    $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);

                    $data[$x]->fe2a_type_title2 = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type2);
                    $data[$x]->band_title2 =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type2);

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
        $h = $this->db->get_where("fr_bnod_pills_setting", array('code'=>$id));
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
        $this->db->where('deport_sand_qabd',0);
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

    public function get_all_record($arr, $q)
    {
        $date_to = $this->input->post('date_to');
        $date_from = $this->input->post('date_from');
        $pay_method = $this->input->post('pay_method');
        $type_pay = $this->input->post('type_pay');
        $publisher = $this->input->post('publisher');
        $checkbox_value = $this->input->post('checkbox_value');


        $this->db->select('*');

        $this->db->from('fr_all_pills');


        if (!empty($publisher)) {
            $this->db->where('publisher', $publisher);
        }


        if (!empty($checkbox_value)) {
            $this->db->where_in('pill_num', $checkbox_value);
        }

        if (!empty($date_from)) {
            $this->db->where('date>=', $date_from);
        }
        if (!empty($date_to)) {
            $this->db->where('date<=', $date_to);
        }

//        $this->db->where('pill_date BETWEEN "' . date('Y-m-d', strtotime($date_from)) . '"
//       and "' . date('Y-m-d', strtotime($date_to)) . '"');


        if (!empty($pay_method) && $pay_method != 3) {
            $this->db->where('pay_method', $pay_method);
        }
        if (!empty($pay_method) && !empty($type_pay) && $pay_method == 3) {
            $this->db->where_in('pay_method', $type_pay);
        }
        $this->db->where($arr);


        $this->db->order_by('pill_num', 'asc');
        $this->db->where('deport_sand_qabd', 0);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $x = 0;
            $data = array();
            foreach ($query->result() as $row) {

                $data[$x] = $row;

                $data[$x]->publisher_name = $this->get_user_name_submit($row->publisher);

                $data[$x]->pill_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
                $data[$x]->Fe2a_title = $this->GetFe2aTitle($row->fe2a_id_fk);
                $data[$x]->erad_title = $this->GetTitleFromFr_bnod_pills_setting($row->erad_type);

                $data[$x]->fe2a_type_title1 = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                $data[$x]->band_title1 = $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);

                $data[$x]->fe2a_type_title2 = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type2);
                $data[$x]->band_title2 = $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type2);

                if (!empty($row->person_type)) {
                    $data[$x]->MemberDetails = $this->GetMemberNameByID($row->person_id_fk, $row->person_type);
                }

                $data[$x]->bank_title = $this->GetBankTitle($row->bank_id_fk);
                $data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $x++;
            }
            return $data;
        } else {
            return 0;
        }

    }



 /*     
    public function get_all_record($arr,$q)
    {
        $date_to=$this->input->post('date_to');
        $date_from=$this->input->post('date_from');
        $pay_method=$this->input->post('pay_method');
        $type_pay=$this->input->post('type_pay');
        $publisher=$this->input->post('publisher');
          $checkbox_value = $this->input->post('checkbox_value');
          
        $this->db->select('*');

        $this->db->from('fr_all_pills');



        if(!empty($publisher))
        {
            $this->db->where('publisher',$publisher);
        }
        
          if (!empty($checkbox_value)) {
            $this->db->where_in('pill_num', $checkbox_value);
        }
       
        
    $this->db->where('pill_date BETWEEN "'. date('Y-m-d', strtotime($date_from)). '" 
       and "'. date('Y-m-d', strtotime($date_to)).'"');
                
                
                
                
        if(!empty($pay_method)&&$pay_method!=3)
        {
            $this->db->where('pay_method',$pay_method);
        }
        if(!empty($pay_method)&& !empty($type_pay)&&$pay_method==3)
        {
            $this->db->where_in('pay_method',$type_pay);
        }
       $this->db->where($arr);



        $this->db->order_by('pill_num','asc');
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

                    $data[$x]->fe2a_type_title1 = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
                    $data[$x]->band_title1 =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);

                    $data[$x]->fe2a_type_title2 = $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type2);
                    $data[$x]->band_title2 =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type2);

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
*/
/*
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
                 $data['publisher_text']=$this->input->post('publisher_text');
                $data2['band_id']=$this->input->post('band_id')[$x];
                $data['name_hesab']=$this->GetTitleFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['rqm_hesab']=$this->GetcodeFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['value']=$this->input->post('value')[$x];

                $data['about']=$this->input->post('about')[$x];


                $data['publisher_esal']=$_SESSION['user_id'];
                if(!empty($this->input->post('publisher_name')[$x])) {
                    $data['publisher_name'] = $this->input->post('publisher_name')[$x];
                }
                $this->db->insert('esal_test-table',$data);
               $this->update_deport($this->input->post('rkm_esal')[$x]);

            }

        }
        return  $data;
    }
    */
    
       public function insert_test_esal()
    {
        $rkm_esal=$this->input->post('rkm_esal');
        $band_id=$this->input->post('band_id');
        $value=$this->input->post('value');
        /*
        ECHO'<PRE>';
        print_r($_POST);*/
        if(!empty($band_id)){

            $count=count($rkm_esal);
            for($x=0;$x<$count;$x++)
            {
                $data['rkm_esal']=$this->input->post('rkm_esal')[$x];
                 $data['publisher_text']=$this->input->post('publisher_text');
                $data2['band_id']=$this->input->post('band_id')[$x];
                $data['name_hesab']=$this->GetTitleFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['rqm_hesab']=$this->GetcodeFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['value']=$this->input->post('value')[$x];

                $data['about']=$this->input->post('about')[$x];


                $data['publisher_esal']=$_SESSION['user_id'];
                if(!empty($this->input->post('publisher_name')[$x])) {
                    $data['publisher_name'] = $this->input->post('publisher_name')[$x];
                }
                $rkm_qed_new = $this->select_last_id()-1;
                
                $this->db->insert('esal_test-table',$data);
               $this->update_deport($this->input->post('rkm_esal')[$x],$rkm_qed_new);

            }

        }
        return  $data;
    } 
   
         public function update_deport($id,$rkm_quod)
{
    $this->db->where('pill_num',$id);
    $data_update['deport_sand_qabd']='1';
    $data_update['deport_date_ar'] = date("Y-m-d");
    $data_update['qued_num']=$rkm_quod;
    $this->db->update('fr_all_pills',$data_update);
}  
   
   
    
 /*   public function update_deport($id)
{
    $this->db->where('pill_num',$id);
    $data_update['deport_sand_qabd']='1';
    $data_update['deport_date_ar'] = date("Y-m-d");
    $this->db->update('fr_all_pills',$data_update);
}*/

    //===========================================================

  /*  public function insert_test_qued()
    {

        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = 2;
        $data['no3_qued_name'] = "ظ‚ظٹط¯ ظٹظˆظ…ظٹط©";
        //$halet_qued =explode('-',$this->input->post('halet_qued'));

        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = "ط؛ظٹط± ظ…ط±ط­ظ„";
        $data['qued_date'] = strtotime(date("Y-m-d"));
        $data['qued_date_ar'] = date("Y-m-d");
        $data['date'] = date("Y-m-d");
        $data['date_s'] =strtotime(date("Y-m-d"));
        $data['total_value'] = $this->input->post('total_value');
        $data['rkm'] = $this->select_last_id();

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['publisher'] = $_SESSION['user_id'];

        
         $this->db->insert('finance_quods',$data);


        if($this->input->post('rkm_esal')){



            $count = count($this->input->post('rkm_esal'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');


     
    $count_code= count($this->input->post('bank_account_code'));
            for ($x=0 ;$x < $count_code; $x++){

                $details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                $details_maden['dayen'] = 0;
                $details_maden['maden'] = $this->input->post('maden')[$x];
                $details_maden['value'] = 0;
                $details_maden['rkm_hesab'] = $this->input->post('bank_account_code')[$x];
                $details_maden['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('bank_account_code')[$x]);
                //method
                if($this->input->post('pay_method')[$x]==3) {
                    $details_maden['byan'] = " ظ†ظ‚ط§ط· ط§ظ„ط¨ظٹط¹ ط¬ظ‡ط§ط² ط±ظ‚ظ… -".$this->input->post('device')[$x]."ط¨طھط§ط±ظٹط®".$this->input->post('pill_date')[$x];
                }else{
                    $details_maden['byan'] = "طھط­ظˆظٹظ„ ظ…ظ† ط­ /".$this->input->post('person')[$x]." - ط±ظ‚ظ… ".$this->input->post('marg3_num')[$x];
                }
                $details_maden['marg3'] = $this->input->post('pill_num')[$x];
                $this->db->insert('finance_quods_details',$details_maden);

            }
            
        


            for ($i=0 ;$i < $count; $i++){

                $details['qued_rkm_fk'] = $this->select_last_id()-1;
                $details['dayen'] = $this->input->post('value_sand')[$i];
                $details['maden'] = 0;
                $details['value'] = 0;
              //  $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i]; //date_esal
               // $details['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('rkm_hesab')[$i]);
               $details['rkm_hesab'] = $this->input->post('band_id')[$i]; //date_esal
              $details['hesab_name'] = $this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('band_id')[$i]); 
                
                $details['byan'] = "ط¥ظٹطµط§ظ„". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $details['hesab_name'];
                $details['marg3'] = $this->input->post('rkm_esal')[$i];
                $this->db->insert('finance_quods_details',$details);
                
                $this->update_deport($this->input->post('rkm_esal')[$i]);

            }

        
        }


    }
    */
    
 /*       public function insert_test_qued($rkm_quod)
    {

        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = 2;
        $data['no3_qued_name'] = "ظ‚ظٹط¯ ظٹظˆظ…ظٹط©";
       

        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = "ظ‚ظٹط¯ ط§ظ„ظ…ط±ط§ط¬ط¹ط©";
        $data['qued_date'] = strtotime(date("Y-m-d"));
        $data['qued_date_ar'] = date("Y-m-d");
        $data['date'] = date("Y-m-d");
        $data['date_s'] =strtotime(date("Y-m-d"));
        $data['total_value'] = $this->input->post('total_value');
       

if($rkm_quod !=0 ){
            $data['rkm'] = $rkm_quod;
        }else{
            $data['rkm'] = $this->select_last_id();
        }


        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['publisher'] = $_SESSION['user_id'];

        
         if($rkm_quod!=0){
           // $data['rkm'] = $rkm_quod;
            $data_quod2['total_value']=$this->input->post('total_value')+$this->get_value_money($rkm_quod);
                $this->db->where('rkm',$rkm_quod);
            $this->db->update('finance_quods',$data_quod2);
        }else{
            $this->db->insert('finance_quods',$data);
        }
        
       //  $this->db->insert('finance_quods',$data);


        if($this->input->post('rkm_esal') && !empty($this->input->post('rkm_esal') ) ){



            $count = count($this->input->post('rkm_esal'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');


   
    $count_code= count($this->input->post('bank_account_code'));
            for ($x=0 ;$x < $count_code; $x++){

                //$details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                  if($rkm_quod!=0){
                    //$data['rkm'] = $rkm_quod;
                    $details_maden['qued_rkm_fk'] = $rkm_quod;
                }else{
                    $details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                }
                
                
                $details_maden['dayen'] = 0;
                $details_maden['maden'] = $this->input->post('maden')[$x];
                $details_maden['value'] = 0;
                $details_maden['rkm_hesab'] = $this->input->post('bank_account_code')[$x];
                $details_maden['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('bank_account_code')[$x]);
                //method
                if($this->input->post('pay_method')[$x]==3) {
                    $details_maden['byan'] = " ظ†ظ‚ط§ط· ط§ظ„ط¨ظٹط¹ ط¬ظ‡ط§ط² ط±ظ‚ظ… -".$this->input->post('device')[$x]."ط¨طھط§ط±ظٹط®".$this->input->post('pill_date')[$x];
                }else{
                    $details_maden['byan'] = "طھط­ظˆظٹظ„ ظ…ظ† ط­ /".$this->input->post('person')[$x]." - ط±ظ‚ظ… ".$this->input->post('marg3_num')[$x];
                }
                $details_maden['marg3'] = $this->input->post('pill_num')[$x];
                $details_maden['esal_rkm'] = $this->input->post('rkm_esal')[$x];

                $details_maden['date'] 	  	   = strtotime(date('Y-m-d'));
                $details_maden['date_ar'] 	  	   = (date('Y-m-d'));


                $this->db->insert('finance_quods_details',$details_maden);

            }
            
          


            for ($i=0 ;$i < $count; $i++){

             //   $details['qued_rkm_fk'] = $this->select_last_id()-1;
              if($rkm_quod!=0){
                    //$data['rkm'] = $rkm_quod;
                    $details['qued_rkm_fk'] = $rkm_quod;
                }else{
                    $details['qued_rkm_fk'] = $this->select_last_id()-1;
                }
             
             
                $details['dayen'] = $this->input->post('value_sand')[$i];
                $details['maden'] = 0;
                $details['value'] = 0;
              //  $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i]; //date_esal
               // $details['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('rkm_hesab')[$i]);
               $details['rkm_hesab'] = $this->input->post('band_id')[$i]; //date_esal
              $details['hesab_name'] = $this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('band_id')[$i]); 
                
           //     $details['byan'] = "ط¥ظٹطµط§ظ„". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $details['hesab_name'];
             
           $details['byan'] = "ط§ظٹطµط§ظ„". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $this->input->post('about')[$i];
                
                $details['marg3'] = $this->input->post('rkm_esal')[$i];
                $details['esal_rkm'] = $this->input->post('rkm_esal')[$i];
                $details['date'] 	  	   = strtotime(date('Y-m-d'));
                $details['date_ar'] 	  	   = (date('Y-m-d'));


                $this->db->insert('finance_quods_details',$details);
                
                $this->update_deport($this->input->post('rkm_esal')[$i]);

            }

        
        }


    }
    */
    
      /*   public function insert_test_qued($rkm_quod)
    {

        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = 2;
        $data['no3_qued_name'] = "ظ‚ظٹط¯ ظٹظˆظ…ظٹط©";
        //$halet_qued =explode('-',$this->input->post('halet_qued'));

        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = "ظ‚ظٹط¯ ط§ظ„ظ…ط±ط§ط¬ط¹ط©";
        $data['qued_date'] = strtotime(date("Y-m-d"));
        $data['qued_date_ar'] = date("Y-m-d");
        $data['date'] = date("Y-m-d");
      // $data['date_s'] =strtotime(date("Y-m-d"));
      $data['date_s'] =   time();
   
        $data['total_value'] = $this->input->post('total_value');
       // $data['rkm'] = $this->select_last_id();

if($rkm_quod !=0 ){
            $data['rkm'] = $rkm_quod;
        }else{
            $data['rkm'] = $this->select_last_id();
        }


        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['publisher'] = $_SESSION['user_id'];

        
         if($rkm_quod!=0){
           // $data['rkm'] = $rkm_quod;
            $data_quod2['total_value']=$this->input->post('total_value')+$this->get_value_money($rkm_quod);
                $this->db->where('rkm',$rkm_quod);
            $this->db->update('finance_quods',$data_quod2);
        }else{
            $this->db->insert('finance_quods',$data);
        }
        
       //  $this->db->insert('finance_quods',$data);


        if($this->input->post('rkm_esal') && !empty($this->input->post('rkm_esal') ) ){



            $count = count($this->input->post('rkm_esal'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');


    
    $count_code= count($this->input->post('bank_account_code'));
            for ($x=0 ;$x < $count_code; $x++){

                //$details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                  if($rkm_quod!=0){
                    //$data['rkm'] = $rkm_quod;
                    $details_maden['qued_rkm_fk'] = $rkm_quod;
                   // $rkm_qed_new = $rkm_quod;
                }else{
                    $details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                    
                }
                
                
                $details_maden['dayen'] = 0;
                $details_maden['maden'] = $this->input->post('maden')[$x];
                $details_maden['value'] = 0;
                $details_maden['rkm_hesab'] = $this->input->post('bank_account_code')[$x];
                $details_maden['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('bank_account_code')[$x]);
                //method
                if($this->input->post('pay_method')[$x]==3) {
                    $details_maden['byan'] = " ظ†ظ‚ط§ط· ط§ظ„ط¨ظٹط¹ ط¬ظ‡ط§ط² ط±ظ‚ظ… -".$this->input->post('device')[$x]."ط¨طھط§ط±ظٹط®".$this->input->post('pill_date')[$x];
                }else{
                    $details_maden['byan'] = "طھط­ظˆظٹظ„ ظ…ظ† ط­ /".$this->input->post('person')[$x]." - ط±ظ‚ظ… ".$this->input->post('marg3_num')[$x];
                }
                $details_maden['marg3'] = $this->input->post('pill_num')[$x];
                $details_maden['esal_rkm'] = $this->input->post('rkm_esal')[$x];

                $details_maden['date'] 	  	   = strtotime(date('Y-m-d'));
                $details_maden['date_ar'] 	  	   = (date('Y-m-d'));


                $this->db->insert('finance_quods_details',$details_maden);

            }
            
         


            for ($i=0 ;$i < $count; $i++){

             //   $details['qued_rkm_fk'] = $this->select_last_id()-1;
              if($rkm_quod!=0){
                    //$data['rkm'] = $rkm_quod;
                    $details['qued_rkm_fk'] = $rkm_quod;
                     $rkm_qed_new = $rkm_quod;
                }else{
                    $details['qued_rkm_fk'] = $this->select_last_id()-1;
                      $rkm_qed_new = $this->select_last_id()-1;
                }
             
             
                $details['dayen'] = $this->input->post('value_sand')[$i];
                $details['maden'] = 0;
                $details['value'] = 0;
              //  $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i]; //date_esal
               // $details['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('rkm_hesab')[$i]);
               $details['rkm_hesab'] = $this->input->post('band_id')[$i]; //date_esal
              $details['hesab_name'] = $this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('band_id')[$i]); 
                
           //     $details['byan'] = "ط¥ظٹطµط§ظ„". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $details['hesab_name'];
           
           $details['byan'] = "ط§ظٹطµط§ظ„". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $this->input->post('about')[$i];
                $details['marg3'] = $this->input->post('rkm_esal')[$i];
                $details['esal_rkm'] = $this->input->post('rkm_esal')[$i];
                $details['date'] 	  	   = strtotime(date('Y-m-d'));
                $details['date_ar'] 	  	   = (date('Y-m-d'));
                $this->db->insert('finance_quods_details',$details);
                $this->update_deport($this->input->post('rkm_esal')[$i] ,$rkm_qed_new);

            }
        }
    }
      
   
   */
   
            public function insert_test_qued($rkm_quod)
    {


        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = 2;
        $data['no3_qued_name'] = "قيد يومية";
        //$halet_qued =explode('-',$this->input->post('halet_qued'));

        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = "قيد المراجعة";
        $data['qued_date'] = strtotime(date("Y-m-d"));
        $data['qued_date_ar'] = date("Y-m-d");
        $data['date'] = date("Y-m-d");
      // $data['date_s'] =strtotime(date("Y-m-d"));
      $data['date_s'] =   time();
   
        $data['total_value'] = $this->input->post('total_value');
       // $data['rkm'] = $this->select_last_id();

   if($rkm_quod !=0 ){
            $data['rkm'] = $rkm_quod;
        }else{
            $data['rkm'] = $this->select_last_id();
        }


        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['publisher'] = $_SESSION['user_id'];

        
         if($rkm_quod!=0){
           // $data['rkm'] = $rkm_quod;
            $data_quod2['total_value']=$this->input->post('total_value')+$this->get_value_money($rkm_quod);
                $this->db->where('rkm',$rkm_quod);
            $this->db->update('finance_quods',$data_quod2);
        }else{
            $this->db->insert('finance_quods',$data);
        }
        
       //  $this->db->insert('finance_quods',$data);


        if($this->input->post('rkm_esal') && !empty($this->input->post('rkm_esal') ) ){



            $count = count($this->input->post('rkm_esal'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');


       /*** madeen ***/
    $count_code= count($this->input->post('bank_account_code'));
            for ($x=0 ;$x < $count_code; $x++){

                //$details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                  if($rkm_quod!=0){
                    //$data['rkm'] = $rkm_quod;
                    $details_maden['qued_rkm_fk'] = $rkm_quod;
                   // $rkm_qed_new = $rkm_quod;
                }else{
                    $details_maden['qued_rkm_fk'] = $this->select_last_id()-1;
                    
                }
                
                
                $details_maden['dayen'] = 0;
                $details_maden['maden'] = $this->input->post('maden')[$x];
                $details_maden['value'] = 0;
                $details_maden['rkm_hesab'] = $this->input->post('bank_account_code')[$x];
                $details_maden['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('bank_account_code')[$x]);
                //method
                if($this->input->post('pay_method')[$x]==3) {
                    $details_maden['byan'] = " نقاط البيع جهاز رقم -".$this->input->post('device')[$x]."بتاريخ".$this->input->post('pill_date')[$x];
                }else{
                    $details_maden['byan'] = "تحويل من ح /".$this->input->post('person')[$x]." - رقم ".$this->input->post('marg3_num')[$x];
                }
                $details_maden['marg3'] = $this->input->post('pill_num')[$x];
                $details_maden['esal_rkm'] = $this->input->post('rkm_esal')[$x];

                $details_maden['date'] 	  	   = strtotime(date('Y-m-d'));
                $details_maden['date_ar'] 	  	   = (date('Y-m-d'));


                $this->db->insert('finance_quods_details',$details_maden);

            }
            
            /*** dayen ***/


            for ($i=0 ;$i < $count; $i++){

             //   $details['qued_rkm_fk'] = $this->select_last_id()-1;
              if($rkm_quod!=0){
                    //$data['rkm'] = $rkm_quod;
                    $details['qued_rkm_fk'] = $rkm_quod;
                     $rkm_qed_new = $rkm_quod;
                }else{
                    $details['qued_rkm_fk'] = $this->select_last_id()-1;
                      $rkm_qed_new = $this->select_last_id()-1;
                }
             
             
                $details['dayen'] = $this->input->post('value_sand')[$i];
                $details['maden'] = 0;
                $details['value'] = 0;
              //  $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i]; //date_esal
               // $details['hesab_name'] = $this->GetTitleFromSociety_main_banks_account($this->input->post('rkm_hesab')[$i]);
               $details['rkm_hesab'] = $this->input->post('band_id')[$i]; //date_esal
              $details['hesab_name'] = $this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('band_id')[$i]); 
                
           //$details['byan'] = "إيصال". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $details['hesab_name'];
             //$this->input->post('rkm_esal')[$x];

                $esal_data =$this->GetEsalDetails($this->input->post('rkm_esal')[$i]);
                if(!empty($esal_data)) {
                    $pay_method_arr = array('إختر', 1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي', 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');
                    $pay_method = $esal_data->pay_method;
                    if (!empty($pay_method_arr[$pay_method])) {
                        $pay_method = $pay_method_arr[$pay_method];

                    } else {
                        $pay_method = '';
                    }

                    $details['byan'] = "ايصال". $this->input->post('rkm_esal')[$i].' '.$pay_method.' - '.$this->input->post('publisher_name')[$i]."/". $this->input->post('about')[$i];
                }else{
                  $details['byan'] = "إيصال". $this->input->post('rkm_esal')[$i].''.$this->input->post('publisher_name')[$i]."/". $details['hesab_name'];
                }



                $details['marg3'] = $this->input->post('rkm_esal')[$i];
                $details['esal_rkm'] = $this->input->post('rkm_esal')[$i];
                $details['date'] 	  	   = strtotime(date('Y-m-d'));
                $details['date_ar'] 	  	   = (date('Y-m-d'));


                $this->db->insert('finance_quods_details',$details);
                
                $this->update_deport($this->input->post('rkm_esal')[$i] ,$rkm_qed_new);

            }

        
        }


    }
      
    
    
        public function get_value_money($rkm)
    {
        $this->db->select('*');
        $this->db->where("rkm",$rkm);
        $query=$this->db->get('finance_quods');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->total_value;
        }
        return false;
    }
    
    public function GetTitleFromFr_bnod_pills_settingByCode($id){
    $h = $this->db->get_where("fr_bnod_pills_setting", array('code'=>$id));
    $arr= $h->row_array();
    if ($h->num_rows() > 0) {
        return $arr['title'];
    }else{
        return 0;
    }


}

/*
    public function insert_test_qued()
    {
        $rkm_esal=$this->input->post('rkm_esal');
        $band_id=$this->input->post('band_id');
        $value=$this->input->post('value');
        if(!empty($band_id)){

            $count=count($rkm_esal);
            for($x=0;$x<$count;$x++)
            {
                $data['rkm_esal']=$this->input->post('rkm_esal')[$x];
                $data['publisher_text']=$this->input->post('publisher_text');
                $data2['band_id']=$this->input->post('band_id')[$x];
                $data['name_hesab']=$this->GetTitleFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['rqm_hesab']=$this->GetcodeFromFr_bnod_pills_setting($this->input->post('band_id')[$x]);
                $data['value']=$this->input->post('value')[$x];

                $data['about']=$this->input->post('about')[$x];

                //==============================

                $data['value_sand']=$this->input->post('value_sand')[$x];
                $data['code_el_maden']=$this->input->post('code_el_dayen')[$x];
                $data['pay_method']=$this->input->post('pay_method')[$x];
                $data['date_esal']=$this->input->post('date_esal')[$x];

                //===============================


                $data['publisher_esal']=$_SESSION['user_id'];
                if(!empty($this->input->post('publisher_name')[$x])) {
                    $data['publisher_name'] = $this->input->post('publisher_name')[$x];
                }
                $this->db->insert('queds_test-table',$data);

            }

        }
        return  $data;
    }
*/



    //=========================================================
    public function GetcodeFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('code'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['code'];
        }else{
            return 0;
        }


    }
    //=================================
    public function get_all_qued()
    {
      //  $arr=array(0=>2,1=>3);
      //  $this->db->where_in('no3_qued',$arr);
      $this->db->where('deport',0);
       $this->db->order_by("rkm", "desc");
        $query=$this->db->get('finance_quods');
        //return $query->result();
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
    
/************************************************************/    
    
    public function select_total_by_pay_method()
{
    $pay_method_arr =
        array(1=>'total_nakdy',2=>'total_cheq',3=>'total_chabka',4=>'total_eda3_nakdy'
        ,5=>'total_eda3_cheq',6=>'total_tahwel',7=>'total_amr_mostdem');
        foreach ($pay_method_arr as $key =>$value){

            $data[$value] = $this->getTotal('pay_method,value,sum(value) as total',array('pay_method'=>$key));

          }
        return$data;


}


public function getTotal($select,$where){
    $this->db->select($select);
    $this->db->from('fr_all_pills');
    $this->db->where($where);
    $this->db->where('deport_sand_qabd',1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        if(!empty($query->row()->total)){
            return$query->row()->total;
        }else{
            return 0;
        }
    }else{
        return 0;
    }

}

/************************************/

     public function GetTitleFromSociety_main_banks_account($code){
        $h = $this->db->get_where("society_main_banks_account", array('rqm_hesab'=>$code));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['name_hesab'];
        }else{
            return 0;
        }


    }  
    
    
    
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }

    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("finance_quods");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->rkm + 1;
        }else{
            return 1;
        }
    }
    
        public function select_last_rkm_new(){
        $this->db->select('*');
        $this->db->from("finance_quods");
        $this->db->order_by("rkm","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->rkm + 1;
        }else{
            return 1;
        }
    }
/************************************************************/
	 public function get_all_from_pills()
    {
        $this->db->select_sum('value');
        $this->db->where('pay_method',1);
       $this->db->or_where('pay_method',2);
        $query = $this->db->get('fr_all_pills');
        if($query->num_rows()>0)
        {
            return  $query->row()->value;
        }else{
            return 0;
        }
    }

	
	
      public function get_from_sand_qabd($num)
    {
        $this->db->select_sum('total_value');
        $this->db->where('pay_method',$num);
       // $this->db->or_where('pay_method',$num);
        $query = $this->db->get('finance_sanad_qabd');
        if($query->num_rows()>0)
        {
            return  $query->row()->total_value;
        }else{
            return 0;
        }
    }

    public function get_from_sand_sarf($num)
    {
        $this->db->select_sum('total_value');
        $this->db->where('pay_method',$num);
       // $this->db->or_where('pay_method',2);
        $query = $this->db->get('finance_sanad_sarf');
        if($query->num_rows()>0)
        {
            return  $query->row()->total_value;
        }else{
            return 0;
        }
    }
    
	/*
	public function get_from_sand_qabd()
    {
        $this->db->select_sum('total_value');
        $this->db->where('pay_method',1);
        $this->db->or_where('pay_method',2);
        $query = $this->db->get('finance_sanad_qabd');
        if($query->num_rows()>0)
        {
            return  $query->row()->total_value;
        }else{
            return 0;
        }
    }
		
	   public function get_from_sand_sarf()
    {
        $this->db->select_sum('total_value');
        $this->db->where('pay_method',1);
        $this->db->or_where('pay_method',2);
        $query = $this->db->get('finance_sanad_sarf');
        if($query->num_rows()>0)
        {
            return  $query->row()->total_value;
        }else{
            return 0;
        }
    }*/


  public function GetEsalDetails($id){
        $this->db->select('*');
        $this->db->from("fr_all_pills");
        $this->db->where("pill_num",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }else{
            return false;
        }
    }

}