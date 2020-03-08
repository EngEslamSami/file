<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transformation_accounts_model extends CI_Model {

    public function convert_number($number)
    {

        if (($number < 0) || ($number > 999999999999))
        {
            throw new Exception("العدد خارج النطاق");
        }
        $return="";
        //convert number into array of (string) number each case
        // -------number: 121210002876-----------//
        // 	0		1		2		3  //
        //'121'	  '210'	  '002'	  '876'
        $english_format_number = number_format($number);
        $array_number=explode(',', $english_format_number);
        //convert each number(hundred) to arabic
        for($i=0; $i<count($array_number); $i++){
            $place=count($array_number) - $i;
            $return .= $this->convert($array_number[$i], $place);
            if(isset($array_number[($i + 1)]) && $array_number[($i + 1)]>0)  $return .= ' و';
        }
        return $return;
    }
    public function convert($number, $place){
        // take in charge the sex of NUMBERED
        $sex='female';
        //the number word in arabic for masculine and feminine
        $words = array(
            'male'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'أحد عشر','12' => 'إثني عشر','13' => 'ثلاثة عشر','14' => 'أربعة عشر','15' => 'خمس عشر',
                '16' => 'ستة عشر','17' => 'سبعة عشر','18' => 'ثمانية عشر','19' => 'تسعة عشر','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            ),
            'female'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنتان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'إحدى عشرة','12' => 'إثني عشر','13' => 'ثلاث عشرة','14' => 'أربع عشرة','15' => 'خمسة عشرة',
                '16' => 'ستة عشرة','17' => 'سبعة عشرة','18' => 'ثمانية عشرة','19' => 'تسعة عشرة','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            )
        );
        //take in charge the different way of writing the thousands and millions ...
        $mil = array(
            '2'=>array('1'=>'ألف', '2'=>'ألفان', '3'=>'آلاف'),
            '3'=>array('1'=>'مليون', '2'=>'مليونان', '3'=>'ملايين'),
            '4'=>array('1'=>'مليار', '2'=>'ملياران', '3'=>'مليارات')
        );

        $mf = array('1'=>$sex, '2'=>'male', '3'=>'male', '4'=>'male');
        $number_length = strlen((string)$number);
        if($number == 0) return '';
        else if($number[0]==0){
            if($number[1]==0) $number=(int)substr($number, -1);
            else $number=(int)substr($number, -2);
        }
        switch($number_length){
            case '1': {
                switch($place){
                    case '1':{
                        $return = $words[$mf[$place]][$number];
                    }
                        break;
                    case '2':{

                        if($number==1) $return = 'ألف';
                        else if($number==2) $return = 'ألفان';
                        else{
                            $return = $words[$mf[$place]][$number]. ' آلاف';
                        }
                    }
                        break;
                    case '3':{
                        if($number==1) $return = 'مليون';
                        else if($number==2) $return = 'مليونان';
                        else $return = $words[$mf[$place]][$number]. ' ملايين';
                    }
                        break;
                    case '4':{
                        if($number==1) $return = 'مليار';
                        else if($number==2) $return = 'ملياران';
                        else $return = $words[$mf[$place]][$number]. ' مليارات';
                    }
                        break;
                }
            }
                break;
            case '2': {
                if(isset($words[$mf[$place]][$number])) $return = $words[$mf[$place]][$number];
                else{
                    $twoy=$number[0] * 10;
                    $ony=$number[1];
                    $return = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                }
                switch($place){
                    case '2':{
                        $return .= ' ألف';
                    }
                        break;
                    case '3':{
                        $return .= ' مليون';
                    }
                        break;
                    case '4':{
                        $return .= ' مليار';
                    }
                        break;
                }
            }
                break;
            case '3':{
                if(isset($words[$mf[$place]][$number])){
                    $return = $words[$mf[$place]][$number];
                    if($number == 200) $return = 'مائتان';
                    switch($place){
                        case '2':{
                            $return .= ' ألف';
                        }
                            break;
                        case '3':{
                            $return .= ' مليون';
                        }
                            break;
                        case '4':{
                            $return .= ' مليار';
                        }
                            break;
                    }
                    return $return;
                }
                else{
                    $threey=$number[0] * 100;
                    if(isset($words[$mf[$place]][$threey])){
                        $return = $words[$mf[$place]][$threey];
                    }
                    $twoyony=$number[1] * 10 + $number[2];
                    if($twoyony==2){
                        switch($place){
                            case '1': $twoyony=$words[$mf[$place]]['2']; break;
                            case '2': $twoyony='ألفان'; break;
                            case '3': $twoyony='مليونان'; break;
                            case '4': $twoyony='ملياران'; break;
                        }
                        if($threey!=0){
                            $twoyony='و'.$twoyony;
                        }
                        $return = $return.' '.$twoyony;
                    }
                    else if($twoyony==1){
                        switch($place){
                            case '1': $twoyony=$words[$mf[$place]]['1']; break;
                            case '2': $twoyony='ألف'; break;
                            case '3': $twoyony='مليون'; break;
                            case '4': $twoyony='مليار'; break;
                        }
                        if($threey!=0){
                            $twoyony='و'.$twoyony;
                        }
                        $return = $return.' '.$twoyony;
                    }

                    else{
                        if(isset($words[$mf[$place]][$twoyony])) $twoyony = $words[$mf[$place]][$twoyony];
                        else{
                            $twoy=$number[1] * 10;
                            $ony=$number[2];
                            $twoyony = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                        }
                        if($twoyony!='' && $threey!=0) $return= $return.' و'.$twoyony;
                        switch($place){
                            case '2':{
                                $return .= ' ألف';
                            }
                                break;
                            case '3':{
                                $return .= ' مليون';
                            }
                                break;
                            case '4':{
                                $return .= ' مليار';
                            }
                                break;
                        }
                    }
                }
            }
                break;
        }
        return $return;
    }

    public function GetTotalValueArabic($number)
    {
        $number = number_format((float)$number, 2, '.', '');
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number(round($val[1]));
            if(!empty(round($val[1]))){
                $data['title'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
                $data['value'] = $number;
            }else{
                $data['title'] = $integer." "."ريال ". " فقط لا غير"  ;
                $data['value'] = $val[0];

            }
        }else {
            $title=$this->convert_number($number);
            $data['title'] = $title." "."ريال فقط لا غير"  ;
            $data['value'] = $number;
        }
        return $data;

    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

	public function select_last_id(){
		$this->db->select('*');
		$this->db->from("finance_account_transformations");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 1;
		}
	}

	public function select_department(){
		$this->db->select('*');
		$this->db->from("department_jobs");
		$this->db->where("from_id_fk",0);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
		}else{
			return false;
		}
	}

    public function GetBankName($id)
    {

        $h = $this->db->get_where("banks_settings", array('id' => $id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['title'];
        } else {
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
    public function select_all_by_condition($where = false,$group = false)
    {
        $this->db->select('society_main_banks_account.*,banks_settings.id as banks_settings_id,banks_settings.title');
        $this->db->from('society_main_banks_account');
        $this->db->where($where);
        $this->db->group_by($group);
        $this->db->join("banks_settings","banks_settings.id=society_main_banks_account.bank_id_fk","left");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =  $row;
                if($row->account_id_fk !=0){
                    $data[$x]->AccountName =  $this->GetAccountName($row->account_id_fk);
                }
                $x++;}
            return$data;
        }else{
            return 0;
        }


    }

    public function search_all($table,$arr,$select){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->$select;
        }
        return false;
    }



    public function select_all(){
        $this->db->select('*');
        $this->db->from("finance_account_transformations");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_result($arr){
        $this->db->select('*');
        $this->db->from("finance_account_transformations");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function get_result_details($arr){
        $this->db->select('*');
        $this->db->from("finance_account_transformations_process");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i] =$row;
                $data[$i]->arabic_value =$this->GetTotalValueArabic($row->value);
                $data[$i]->from_general_hesab_arr = $this->select_all_by_condition(array('society_main_banks_account.bank_id_fk'=>$row->from_bank_id_fk),'');
                $data[$i]->to_general_hesab_arr =$this->select_all_by_condition(array('society_main_banks_account.bank_id_fk'=>$row->to_bank_id_fk),'');
           $i++; }
            return $data;
        }
        return false;
    }




	/****************************************************************/
    public function insert()
    {


        $data['process_rkm'] = $this->chek_Null($this->input->post('process_rkm'));
        $data['process_date'] = $this->chek_Null(strtotime($this->input->post('process_date_ar')));
        $data['process_date_ar'] = $this->chek_Null($this->input->post('process_date_ar'));
        $data['process_date_s'] = $this->chek_Null(strtotime($this->input->post('process_date_ar')));
        $data['geha_name'] = $this->chek_Null($this->input->post('geha_name'));
        $data['emp_name'] = $this->chek_Null($this->input->post('emp_name'));
        $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
        $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
        if(!empty($this->input->post('edara_id_fk'))){
            $data['edara_name'] = $this->search_all("department_jobs",array('id'=>$this->input->post('edara_id_fk')),'name');

        }
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        if(!empty($this->input->post('qsm_id_fk'))){
        $data['qsm_name'] = $this->search_all("department_jobs",array('id'=>$this->input->post('qsm_id_fk')),'name');
        }
        $data['emp_card_num'] = $this->chek_Null($this->input->post('emp_card_num'));
        $data['date'] 		  	   = strtotime(date('Y-m-d'));
        $data['date_ar'] 	  	   = date('Y-m-d');
        $data['publisher'] 	  	   = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
            
        $this->db->insert('finance_account_transformations',$data);


        //details

        if(!empty($this->input->post('value'))){



            $count = count($this->input->post('value'));
            for ($i=0 ;$i < $count; $i++){


                $details['process_id_fk'] = $this->chek_Null($this->select_last_id()-1);
                $details['process_rkm_fk'] = $this->chek_Null($this->input->post('process_rkm'));
                $details['value'] = $this->chek_Null($this->input->post('value')[$i]);
                $details['from_bank_id_fk'] = $this->chek_Null($this->input->post('from_bank_id_fk')[$i]);

                $details['from_bank_name'] = $this->chek_Null(
                    $this->GetBankName($this->input->post('from_bank_id_fk')[$i]));
                $details['from_general_hesab_id_fk'] = $this->chek_Null($this->input->post('from_general_hesab_id_fk')[$i]);
                $details['from_general_hesab_name'] = $this->chek_Null( $this->GetAccountName($this->input->post('from_general_hesab_id_fk')[$i]));


                 $from_ayban_rkm_full =$this->select_all_by_condition(
                     array(
                         'society_main_banks_account.bank_id_fk'=>$this->input->post('from_bank_id_fk')[$i],
                         'society_main_banks_account.account_id_fk'=>$this->input->post('from_general_hesab_id_fk')[$i]),'')[0];


                $details['from_ayban_rkm_full'] = $from_ayban_rkm_full->account_num;
                $details['from_rkm_hesab'] = $from_ayban_rkm_full->rqm_hesab;
                $details['from_rkm_hesab_name'] = $from_ayban_rkm_full->name_hesab;


                $details['to_bank_id_fk'] = $this->chek_Null($this->input->post('to_bank_id_fk')[$i]);
                $details['to_bank_name'] = $this->chek_Null(
                    $this->GetBankName($this->input->post('to_bank_id_fk')[$i]));
                $details['to_general_hesab_id_fk'] = $this->chek_Null($this->input->post('to_general_hesab_id_fk')[$i]);
                $details['to_general_hesab_name'] = $this->chek_Null( $this->GetAccountName($this->input->post('to_general_hesab_id_fk')[$i]));



                $to_ayban_rkm_full =$this->select_all_by_condition(
                    array(
                        'society_main_banks_account.bank_id_fk'=>$this->input->post('to_bank_id_fk')[$i],
                        'society_main_banks_account.account_id_fk'=>$this->input->post('to_general_hesab_id_fk')[$i]),'')[0];


                $details['to_ayban_rkm_full'] = $to_ayban_rkm_full->account_num;
                $details['to_rkm_hesab'] = $to_ayban_rkm_full->rqm_hesab;
                $details['to_rkm_hesab_name'] = $to_ayban_rkm_full->name_hesab;

                $this->db->insert('finance_account_transformations_process',$details);

            }

        }




    }

  public function update($process_rkm){






      $data['process_rkm'] = $this->chek_Null($this->input->post('process_rkm'));
      $data['process_date'] = $this->chek_Null(strtotime($this->input->post('process_date_ar')));
      $data['process_date_ar'] = $this->chek_Null($this->input->post('process_date_ar'));
      $data['process_date_s'] = $this->chek_Null(strtotime($this->input->post('process_date_ar')));
      $data['geha_name'] = $this->chek_Null($this->input->post('geha_name'));
      $data['emp_name'] = $this->chek_Null($this->input->post('emp_name'));
      $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
      $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
      if(!empty($this->input->post('edara_id_fk'))){
          $data['edara_name'] = $this->search_all("department_jobs",array('id'=>$this->input->post('edara_id_fk')),'name');

      }
      $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
      if(!empty($this->input->post('qsm_id_fk'))){
          $data['qsm_name'] = $this->search_all("department_jobs",array('id'=>$this->input->post('qsm_id_fk')),'name');
      }
      $data['emp_card_num'] = $this->chek_Null($this->input->post('emp_card_num'));
      $this->db->where("process_rkm",$process_rkm);
      $this->db->update('finance_account_transformations',$data);


      //details

      if(!empty($this->input->post('value'))){

          $this->db->where('process_rkm_fk',$process_rkm);
          $this->db->delete('finance_account_transformations_process');


          $count = count($this->input->post('value'));
          for ($i=0 ;$i < $count; $i++){


              $details['process_id_fk'] = $this->chek_Null($this->select_last_id()-1);
              $details['process_rkm_fk'] = $this->chek_Null($this->input->post('process_rkm'));
              $details['value'] = $this->chek_Null($this->input->post('value')[$i]);
              $details['from_bank_id_fk'] = $this->chek_Null($this->input->post('from_bank_id_fk')[$i]);

              $details['from_bank_name'] = $this->chek_Null(
                  $this->GetBankName($this->input->post('from_bank_id_fk')[$i]));
              $details['from_general_hesab_id_fk'] = $this->chek_Null($this->input->post('from_general_hesab_id_fk')[$i]);
              $details['from_general_hesab_name'] = $this->chek_Null( $this->GetAccountName($this->input->post('from_general_hesab_id_fk')[$i]));


              $from_ayban_rkm_full =$this->select_all_by_condition(
                  array(
                      'society_main_banks_account.bank_id_fk'=>$this->input->post('from_bank_id_fk')[$i],
                      'society_main_banks_account.account_id_fk'=>$this->input->post('from_general_hesab_id_fk')[$i]),'')[0];


              $details['from_ayban_rkm_full'] = $from_ayban_rkm_full->account_num;
              $details['from_rkm_hesab'] = $from_ayban_rkm_full->rqm_hesab;
              $details['from_rkm_hesab_name'] = $from_ayban_rkm_full->name_hesab;


              $details['to_bank_id_fk'] = $this->chek_Null($this->input->post('to_bank_id_fk')[$i]);
              $details['to_bank_name'] = $this->chek_Null(
                  $this->GetBankName($this->input->post('to_bank_id_fk')[$i]));
              $details['to_general_hesab_id_fk'] = $this->chek_Null($this->input->post('to_general_hesab_id_fk')[$i]);
              $details['to_general_hesab_name'] = $this->chek_Null( $this->GetAccountName($this->input->post('to_general_hesab_id_fk')[$i]));



              $to_ayban_rkm_full =$this->select_all_by_condition(
                  array(
                      'society_main_banks_account.bank_id_fk'=>$this->input->post('to_bank_id_fk')[$i],
                      'society_main_banks_account.account_id_fk'=>$this->input->post('to_general_hesab_id_fk')[$i]),'')[0];


              $details['to_ayban_rkm_full'] = $to_ayban_rkm_full->account_num;
              $details['to_rkm_hesab'] = $to_ayban_rkm_full->rqm_hesab;
              $details['to_rkm_hesab_name'] = $to_ayban_rkm_full->name_hesab;

              $this->db->insert('finance_account_transformations_process',$details);

          }

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


public function Delete($process_rkm){

    $this->db->where('process_rkm_fk',$process_rkm);
    $this->db->delete('finance_account_transformations_process');

    $this->db->where('process_rkm',$process_rkm);
    $this->db->delete('finance_account_transformations');


}



/***************************************************/

    public function insert_attach($rkm,$all_img){


        if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){

                $files['finance_account_id_fk'] = $rkm;
                $files['file'] = $all_img[$a];
                $files['title'] = $title[$a];

                $this->db->insert('finance_account_transformations_attaches',$files);
            }

        }
    }
    public function get_attach($id){
        $this->db->where('finance_account_id_fk',$id);
        $query= $this->db->get('finance_account_transformations_attaches');
        if ($query->num_rows()>0){
            return $query->result();
        }

    }
    public function delete_attach($id){

        $this->db->where('id',$id);
        $this->db->delete('finance_account_transformations_attaches');
    }
    public function get_num_attach($id)
    {
        $this->db->where('finance_account_id_fk',$id);
        $query=$this->db->get('finance_account_transformations_attaches');
        return $query->num_rows();

    }


}

