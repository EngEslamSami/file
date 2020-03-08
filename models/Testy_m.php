
<?php

class Testy_m extends CI_Model

{

    public function __construct() {

        parent::__construct();

    }
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }



/*

    public  function get_emp_name($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['employee'];

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
*/



    public function select_all_main_kafalat_details()
    {
        /*
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->order_by('id', "ASC");*/
     
        $this->db->select('fr_main_kafalat_details.* , basic.mother_national_num ,basic.file_num,basic.family_cat,basic.family_cat_name,basic.file_status');
        $this->db->from("fr_main_kafalat_details");
        $this->db->join('basic', 'basic.mother_national_num = fr_main_kafalat_details.mother_national_num_fk',"left");
       
       // $this->db->where("basic.suspend",4);
     //  $this->db->limit(5);
        $this->db->order_by('basic.file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
               $data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id)['k_name'];
                 $data[$i]->kafel_rkm = $this->get_kafel_name($row->first_kafel_id)['k_num'];

                  $data[$i]->person_name = $this->get_person_name($row->person_id_fk,$row->person_type);
$data[$i]->person_age = (1440 - $this->get_person_age($row->person_id_fk,$row->person_type));

$data[$i]->person_hala = $this->get_person_hala($row->person_id_fk,$row->person_type);

$data[$i]->kafel_status = $this->get_kafel_name($row->first_kafel_id)['halat_kafel_id'];
$data[$i]->person_cat = $this->get_person_categ($row->person_id_fk,$row->person_type);

 $data[$i]->files_status_title = $this->get_files_status_setting($row->file_status)['title'];
$data[$i]->files_status_color = $this->get_files_status_setting($row->file_status)['color'];


$data[$i]->person_status = $this->get_person_status($row->person_id_fk);



                  $data[$i]->ddate = $this->Days($row->first_date_to_ar);

          $data[$i]->dddddd = $this->getRangeDateString($row->first_date_to);
          
         
          
          
          
          
                $i++;
            }
            return $data;
        }
        return false;
    }


    public  function get_kafel_name($first_kafel_id){

        $h = $this->db->get_where("fr_sponsor", array('id'=>$first_kafel_id));
      return  $arr= $h->row_array();
      //  return $arr['k_name'];

    }


  public  function get_files_status_setting($file_status_id){

        $h = $this->db->get_where("files_status_setting", array('id'=>$file_status_id));
      return  $arr= $h->row_array();
      //  return $arr['k_name'];

    }


   public  function get_person_status($person_id_fk){

        $h = $this->db->get_where("f_members", array('id'=>$person_id_fk));
        $arr= $h->row_array();
        return $arr['persons_status'];

    }



    public  function get_person_categ($person_id_fk,$person_type){

        if($person_type == 1){
           $ttable = "mother";
          $nname_field = 'categoriey_m';
        }elseif($person_type == 2){
               $ttable = "f_members";
                $nname_field = 'categoriey_member';
        }elseif($person_type == 3){
               $ttable = "f_members";
             $nname_field = 'categoriey_member';
        }

        $h = $this->db->get_where($ttable, array('id' =>$person_id_fk));
        $arr= $h->row_array();
           return $arr[$nname_field];

    } 



    public  function get_person_hala($person_id_fk,$person_type){

        if($person_type == 1){
           $ttable = "mother";
          $nname_field = 'halt_elmostafid_m';
        }elseif($person_type == 2){
               $ttable = "f_members";
                $nname_field = 'persons_status';
        }elseif($person_type == 3){
               $ttable = "f_members";
             $nname_field = 'persons_status';
        }

        $h = $this->db->get_where($ttable, array('id' =>$person_id_fk));
        $arr= $h->row_array();
           return $arr[$nname_field];

    } 


    public  function get_person_age($person_id_fk,$person_type){

        if($person_type == 1){
           $ttable = "mother";
          $nname_field = 'm_birth_date_hijri_year';
        }elseif($person_type == 2){
               $ttable = "f_members";
                $nname_field = 'member_birth_date_hijri_year';
        }elseif($person_type == 3){
               $ttable = "f_members";
             $nname_field = 'member_birth_date_hijri_year';
        }

        $h = $this->db->get_where($ttable, array('id' =>$person_id_fk));
        $arr= $h->row_array();
           return $arr[$nname_field];

    } 




function Days($days){
         $current = strtotime(date("Y-m-d"));
 $date    = strtotime($days);

 $datediff = $date - $current;
 $difference = floor($datediff/(60*60*24));
 if($difference==0)
 {
    return 'today';
 }
 else if($difference > 1)
 {
    return 'Future Date';
 }
 else if($difference > 0)
 {
    return 'tomarrow';
 }
 else if($difference < -1)
 {
    return 'Long Back';
 }
 else
 {
    return 'yesterday';
 }

}




  function getTheDay($date)
                {
                    $curr_date=strtotime(date("Y-m-d "));
                    $the_date=strtotime($date);
                    $diff=floor(($curr_date-$the_date)/(60*60*24));
                    switch($diff)
                    {
                        case 0:
                            return "Today";
                            break;
                        case 1:
                            return "Yesterday";
                            break;
                        default:
                            return $diff." Days ago";
                    }
                }




    public  function get_person_name($person_id_fk,$person_type){

        if($person_type == 1){
           $ttable = "mother";
          $nname_field = 'full_name';
        }elseif($person_type == 2){
               $ttable = "f_members";
                $nname_field = 'member_full_name';
        }elseif($person_type == 3){
               $ttable = "f_members";
             $nname_field = 'member_full_name';
        }

        $h = $this->db->get_where($ttable, array('id' =>$person_id_fk));
        $arr= $h->row_array();
           return $arr[$nname_field];

    }
    
    
    public  function get_person_categoriey_member($person_id_fk,$person_type){

        if($person_type == 1){
           $ttable = "mother";
          $nname_field = 'categoriey_m';
        }elseif($person_type == 2){
               $ttable = "f_members";
                $nname_field = 'categoriey_member';
        }elseif($person_type == 3){
               $ttable = "f_members";
             $nname_field = 'categoriey_member';
        }

        $h = $this->db->get_where($ttable, array('id' =>$person_id_fk));
        $arr= $h->row_array();
           return $arr[$nname_field];

    }    
    
 function getRangeDateString($timestamp) {
    if ($timestamp) {
        $currentTime=strtotime(date("Y-m-d"));
        // Reset time to 00:00:00
        $timestamp=strtotime(date('Y-m-d',$timestamp));
        $days=round(($timestamp-$currentTime)/86400);
        switch($days) {
            case '0';
                return 'اليوم';
                break;
            case '-1';
              //  return 'أمس';
               return '-1';
                break;
            case '-2';
               // return 'قبل يوم أمس ';
                  return '-2';
                break;
            case '1';
               // return 'غدا ';
               return '+1 ';
                break;
            case '2';
              //  return 'بعد يوم غد ';
              return '+2 ';
                break;
            default:
                if ($days > 0) {
                 //   return ' متبقي  '.$days.' يوم';
                //   return '+'.$days.' يوم';
                return '+'.$days;
                } else {
               //     return ' انتهت منذ  '. ($days*-1).' يوم';
                return '-'. ($days*-1);
                }
                break;
        }
    }
}
   
  function getRangeDateString_plus_min($timestamp) {
    if ($timestamp) {
        $currentTime=strtotime(date("Y-m-d"));
        // Reset time to 00:00:00
        $timestamp=strtotime(date('Y-m-d',$timestamp));
        $days=round(($timestamp-$currentTime)/86400);
        switch($days) {
            case '0';
                return 'plus';
                break;
            case '-1';
              //  return 'أمس';
               return 'min';
                break;
            case '-2';
               // return 'قبل يوم أمس ';
                  return 'min';
                break;
            case '1';
               // return 'غدا ';
               return 'plus';
                break;
            case '2';
              //  return 'بعد يوم غد ';
              return 'plus';
                break;
            default:
                if ($days > 0) {
                 //   return ' متبقي  '.$days.' يوم';
                //   return '+'.$days.' يوم';
                return 'plus';
                } else {
               //     return ' انتهت منذ  '. ($days*-1).' يوم';
                return 'min';
                }
                break;
        }
    }
}   

 /****************************************************************************/

 public function setCategoryTree() {
        $categories = array();
        $query = $this->db->query('SELECT id,code, name as text, parent as children FROM dalel WHERE parent = 0');
        foreach ($query->result() as $row) {
            $child = $this->getChilderen($row->code);
            if (count($child) > 0) {
                                   /*

             echo '<pre/>';
            print_r($child)  ;   */
                $row->children = $child;




            } else {

                $row->children = false;

            }
            $categories[] = $row;
        }
        return $categories;
    }

    private function getChilderen($parentId) {
        $child = array();
        $query = $this->db->query('SELECT id,code , name as text, parent as children FROM dalel  WHERE parent = ' . $parentId);
        if (count($query->result()) > 0) {
            foreach ($query->result() as $i => $row) {
                if ($row->children > 0) {

                    $row->children = $this->getChilderen($row->id);

                    $row->sum =  $this->select_from_past_payments_pills($row->code);

                    $row->sss =    $row->sum;



                }
                $child[$i] = $row;
            }
            return $child;
        } else {
            return false;
        }
    }


      public function select_from_past_payments_pills($code)
{


     $this->db->select('*');
     $this->db->where('rkm_hesab',$code);

    $query = $this->db->get('finance_quods_details');
      $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $data =0;
        foreach ($query->result() as $row) {
            $data += $row->maden;
        }
        return $data;
    }
    return false;
}

 /*********************************************************************/

     public function tree(){
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');

      //  $this->db->where('parent',21);
        $this->db->where('hesab_report',1);
        $this->db->where('parent',0);
         // $this->db->where('parent',21);
    //   $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            
            foreach($result as $key=>$value)
            {
                $query = $this->db->query('select SUM(maden) AS madeen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $dayen_result = $query->result();

                $role = array();
                $role['id'] = $result[$key]->id;
               $role['last_value'] = $result[$key]->last_value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
               // $role['madeen'] = $result[$key]->last_value_madeen;
               // $role['dayen'] = $result[$key]->last_value_dayen;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->madeen;

                $children = $this->build_child($result[$key]->id);

                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id.'');
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
         
                }

                $roles[] = $role;
            }
        return $roles;
        }
        return false;
    }


    public function build_child($parent){
       /* $query = $this->db->query('select * from dalel where parent = '.$parent.'');
        $result = $query->result();
     */
          $this->db->select('*');
        $this->db->from('dalel');

        $this->db->where('parent',$parent);

      //    $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();




        $roles = array();
        $value = 0;
        $value2 = 0;

        foreach($result as $key => $val){
            $role = array();

            if($result[$key]->parent == $parent){
                $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id.'');
                $result2 = $query2->result();

                $query = $this->db->query('select SUM(maden) AS maden from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $dayen_result = $query->result();
                if($result[$key]->hesab_tabe3a == 1){
                    $value = $madeen_result[0]->maden - $dayen_result[0]->dayen;
                    $role['madeen'] = $result[$key]->last_value + $madeen_result[0]->maden;
                    $role['dayen'] = $dayen_result[0]->dayen;
                }
                elseif($result[$key]->hesab_tabe3a == 2){
                    $value = $dayen_result[0]->dayen - $madeen_result[0]->maden;
                    $role['madeen'] = $madeen_result[0]->maden;
                    $role['dayen'] = $result[$key]->last_value + $dayen_result[0]->dayen;
                }
                $value2 += $result[$key]->last_value + $value;

                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value + $value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
             //   $role['madeen'] = $result[$key]->last_value_madeen;
             //   $role['dayen'] = $result[$key]->last_value_dayen;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->maden;

                $children = $this->build_child($result[$key]->id);

                if( !empty($children[0]) ){
                    $role['value'] =  $children[1];
                    $role['children'] = $children[0];
                }

                $roles[] = $role;
            }
        }
        return array($roles,$value2);
    }

/**************************************************************************/


    public function select_all_quods_details()
    {

       $this->db->select('finance_quods_details.* , finance_quods.rkm ,finance_quods.no3_qued_name ,finance_quods.halet_qued_name  ,finance_quods.no3_qued ');
        $this->db->from("finance_quods_details");
        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");
        
        
        $this->db->where("finance_quods.no3_qued != ",6);
        $this->db->where("finance_quods.no3_qued != ",1);
       /* $this->db->select('*');
        $this->db->from('finance_quods_details');
       $this->db->order_by('basic.file_num', "ASC");
       */
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

                $i++;
            }
            return $data;
        }
        return false;
    }

/*************************************************************/


		public function select_all_by_fr_all_pills_all_deported()
	{
		$this->db->select('*');
		$this->db->from('fr_all_pills');
 	    $this->db->order_by("id","DESC");
    	$this->db->where('deport_sand_qabd',1);

        $this->db->limit(100);

        if($_SESSION['role_id_fk'] ==1  ){
    
    if($_SESSION['user_id'] == 101){
        $this->db->where('publisher',$_SESSION['user_id']); 
    }else{
        
    }
    
}elseif($_SESSION['role_id_fk'] == 3){
   
            	$this->db->where('publisher',$_SESSION['user_id']);           
}

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->pill_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
				$data[$x]->Fe2a_title =  $this->GetFe2aTitle($row->fe2a_id_fk);
				$data[$x]->erad_title =  $this->GetTitleFromFr_bnod_pills_setting($row->erad_type);
				$data[$x]->fe2a_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type1);
				if(!empty($row->person_type)){
				$data[$x]->MemberDetails =  $this->GetMemberNameByID($row->person_id_fk,$row->person_type);
				}
				$data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);
				if(!empty($row->bnd_type2)){
                    $data[$x]->band_title2 =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type2);

                }
				$data[$x]->bank_title =  $this->GetBankTitle($row->bank_id_fk);
				$data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
			//	$data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $data[$x]->attaches = $this->getAttachesByRkm($row->pill_num);


               // $qued_rkm_fk =;
                if(!empty($this->select_quod_details_bypill_num($row->pill_num)[0]->qued_rkm_fk)){
                $data[$x]->qued_num =$this->select_quod_details_bypill_num($row->pill_num)[0]->qued_rkm_fk;

                $data[$x]->qued_type = $this->select_finance_quods_byqued_rkm_fk(
                    $this->select_quod_details_bypill_num($row->pill_num)[0]->qued_rkm_fk)->no3_qued_name;

                }

                if($row->pay_method == 1 || $row->pay_method == 2){

                    $data[$x]->Rakmy =    $this->get_qued_for_pill('one','esal_rkm',$row->pill_num);


                }else{

                    $data[$x]->Rakmy =     $this->get_qued_for_pill('other','marg3',$row->pill_num);

                }




                $x++;}
			return$data;
		}else{
			return 0;
		}

	}

    public function GetTitleFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('from_id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


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
	public function GetFe2aTitle($id){
        $h = $this->db->get_where("fr_sponser_donors_setting", array('id'=>$id));
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
	public function GetBankTitle($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
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
    
    
        public function getAttachesByRkm($id){
        $this->db->select('*');
        $this->db->from(" fr_all_pills_attaches");
        $this->db->where("pill_num",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;

        }

    }
    
    
    public function select_quod_details_bypill_num($pill_num){
    $this->db->select('*');
    $this->db->from("finance_quods_details");
    $this->db->where("marg3",$pill_num);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}



public function select_finance_quods_byqued_rkm_fk($qued_rkm_fk){
    $this->db->select('*');
    $this->db->from("finance_quods");
    $this->db->where("rkm",$qued_rkm_fk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row();
    }
    return false;
}


    public function get_qued_for_pill($status, $field ,$pill_num){
        $h = $this->db->get_where("finance_quods_details", array($field=>$pill_num));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['qued_rkm_fk'];
        }else{
            return 'none';
        }


    }
/*******************************************************************/
	public function all_ppils()
	{
	$this->db->select('*');
		$this->db->from('fr_all_pills');
 	    $this->db->order_by("id","DESC");
        
        	$this->db->where('deport_sand_qabd =',1);
        
        
  //  	$this->db->where('pay_method !=',1);



//$this->db->or_where('pay_method !=',2);
      //  $this->db->limit(100);



		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;

                if($row->pay_method == 1 || $row->pay_method == 2){
                    $data[$x]->rkm_sanad_qabd =    $this->get_pill_sanad_qabd($row->pill_num);
                    $data[$x]->rkm_qued =    $this->select_rkm_quued_2($data[$x]->rkm_sanad_qabd);
                    
                    
                }else{
                    $data[$x]->rkm_qued =  $this->select_rkm_quued($row->pill_num); 
                }



                 $data[$x]->halet_qued =  $this->get_qued_hala($data[$x]->rkm_qued ); 


                $x++;}
			return$data;
		}else{
			return 0;
		}
}





/*******************************************************************/
	public function all_finance_quods_details()
	{
       $this->db->select('finance_quods_details.* , finance_quods.rkm ,finance_quods.no3_qued_name ,finance_quods.halet_qued_name  ,finance_quods.no3_qued ');
        $this->db->from("finance_quods_details");
        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");
         
      
          $this->db->where("finance_quods_details.maden",0.00);
           $this->db->where("finance_quods.no3_qued = ",2);
         $this->db->or_where("finance_quods.no3_qued = ",5);
   /*    $this->db->where("finance_quods.no3_qued = ",2);
$this->db->where("finance_quods.no3_qued = ",5);
*/
      //$this->db->where("finance_quods_details.esal_rkm = ",$pill_num);



		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
/*
                if($row->pay_method == 1 || $row->pay_method == 2){
                    $data[$x]->rkm_sanad_qabd =    $this->get_pill_sanad_qabd($row->pill_num);
                    $data[$x]->rkm_qued =    $this->select_rkm_quued_2($data[$x]->rkm_sanad_qabd);   
                }else{
                    $data[$x]->rkm_qued =  $this->select_rkm_quued($row->pill_num); 
                }

                 $data[$x]->halet_qued =  $this->get_qued_hala($data[$x]->rkm_qued ); 
*/

                $x++;}
			return$data;
		}else{
			return 0;
		}
}





    public function get_pill_sanad_qabd($pill_num){
        $h = $this->db->get_where("finance_sanad_qabd_details", array('marg3_rkm_esal'=>$pill_num));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['rqm_sanad_fk'];
        }else{
            return 'no sanad qabd';
        }


    }



    public function select_rkm_quued($pill_num)
    {

       $this->db->select('finance_quods_details.* , finance_quods.rkm ,finance_quods.no3_qued_name ,finance_quods.halet_qued_name  ,finance_quods.no3_qued ');
        $this->db->from("finance_quods_details");
        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");
        
        
        $this->db->where("finance_quods.no3_qued = ",2);

 $this->db->where("finance_quods_details.maden = ",0);
       $this->db->where("finance_quods_details.esal_rkm = ",$pill_num);
       /* $this->db->select('*');
        $this->db->from('finance_quods_details');
       $this->db->order_by('basic.file_num', "ASC");
       */
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
               return  $row->qued_rkm_fk;

                $i++;
            }
        
        }
        return false;
    }


    public function select_rkm_quued_2($rkm_sanad_qabd)
    {

       $this->db->select('finance_quods_details.* , finance_quods.rkm ,finance_quods.no3_qued_name ,finance_quods.halet_qued_name  ,finance_quods.no3_qued ');
        $this->db->from("finance_quods_details");
        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");
        
        
        $this->db->where("finance_quods.no3_qued = ",5);

  $this->db->where("finance_quods_details.dayen = ",0);
       $this->db->where("finance_quods_details.marg3 = ",$rkm_sanad_qabd);
       
       
       
       /* $this->db->select('*');
        $this->db->from('finance_quods_details');
       $this->db->order_by('basic.file_num', "ASC");
       */
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
               return  $row->qued_rkm_fk;

                $i++;
            }
        
        }
        return false;
    }


   public function get_qued_hala($qued_rkm){
        $h = $this->db->get_where("finance_quods", array('rkm'=>$qued_rkm));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['deport'];
        }else{
            return 'none';
        }


    }

/*****************************/

    public function select_all_members_By_mother_national_num(){
        $query = $this->db->select('f_members.persons_status,f_members.member_full_name,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
             basic.file_num, basic.mother_national_num  as num,basic.file_status  as halet_malaf,father.full_name,father.mother_national_num_fk')
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
           ->where('basic.final_suspend', 4)
           ->where('basic.file_status', 4)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {
                $arr =array(1=>'نشط كليا',2=>'نشط جزئيا',3=>'موقوف مؤقتا',4=>'موقوف نهائيا');
                $data[$x] = $row;
                if($row['persons_status'] >0 &&  $row['persons_status'] !=''){
                   $title = $arr[$row['persons_status']];
                }else{
                    $title = 'غير محدد';
                }
                 if($row['halet_malaf'] >0 &&  $row['halet_malaf'] !=''){
                   $title_file = $arr[$row['halet_malaf']];
                }else{
                    $title_file = 'غير محدد';
                }
                
                
                $data[$x]['hala_title'] = $title;
                  $data[$x]['title_file'] = $title_file;
                
                $x++;}
            return $data;
        } else {
            return false;
        }



    }
/***************************************************/

    public function select_all_main_kafalat_details_search($where_arr = '', $sub_table = '', $sub_table2 = '', $person_hala = '',$where_arr2='')
    {

        $this->db->select('fr_main_kafalat_details.* , basic.mother_national_num ,basic.file_num,basic.family_cat,basic.family_cat_name,basic.file_status');
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
            
        }
        /*************************************/
        if (!empty($this->input->post('pay_method'))) {
    $this->db->where_in('fr_main_kafalat_details.pay_method',$this->input->post('pay_method'));
}
     /******************************************/   

        $this->db->from("fr_main_kafalat_details");
        $this->db->join('basic', 'basic.mother_national_num = fr_main_kafalat_details.mother_national_num_fk', "left");

        if (!empty($sub_table)) {
          //  $this->db->join($sub_table, $sub_table . '.mother_national_num_fk = fr_main_kafalat_details.mother_national_num_fk', "inner");
       $this->db->join($sub_table, $sub_table . '.id = fr_main_kafalat_details.person_id_fk', "inner");

        }
       /* if (!empty($person_hala)) {
            foreach ($person_hala as $table) {
                $this->db->join($table, $table . '.mother_national_num_fk = fr_main_kafalat_details.mother_national_num_fk', "inner");
            }
            if (!empty($where_arr2)) {
                $this->db->where($where_arr2);
            }
        }*/
        
        	if (!empty($person_hala)) {
            $this->db->join($person_hala, $person_hala . '.mother_national_num_fk = fr_main_kafalat_details.mother_national_num_fk');

            if (!empty($where_arr2)) {
                $this->db->where($where_arr2);
            }
        }

        if (!empty($sub_table2)) {
            $this->db->join($sub_table2, $sub_table2 . '.id = fr_main_kafalat_details.first_kafel_id', "inner");
        }
        
        
        
        
        
        
        
        
        $this->db->order_by('basic.file_num', "ASC");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
              
              //  $data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id)['k_name'];
               // $data[$i]->kafel_rkm = $this->get_kafel_name($row->first_kafel_id)['k_num'];
               // $data[$i]->kafel_mob = $this->get_kafel_name($row->first_kafel_id)['k_mob'];

                $data[$i]->person_name = $this->get_person_name($row->person_id_fk, $row->person_type);
                $data[$i]->person_age = (1441 - $this->get_person_age($row->person_id_fk, $row->person_type));

                $data[$i]->person_hala = $this->get_person_hala($row->person_id_fk, $row->person_type);

             //   $data[$i]->kafel_status = $this->get_kafel_name($row->first_kafel_id)['halat_kafel_id'];
                $data[$i]->person_cat = $this->get_person_categ($row->person_id_fk, $row->person_type);

                $data[$i]->files_status_title = $this->get_files_status_setting($row->file_status)['title'];
                $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status)['color'];


                $data[$i]->person_status = $this->get_person_status($row->person_id_fk);


                $data[$i]->ddate = $this->Days($row->first_date_to_ar);

                $data[$i]->dddddd = $this->getRangeDateString($row->first_date_to);
                $data[$i]->ended = $this->getRangeDateString_plus_min($row->first_date_to);
                  
              $data[$i]->person_gender = $this->get_person_gender($row->person_id_fk, $row->person_type);
              $kafel=$this->get_kafel_name($row->first_kafel_id);
                if (!empty($kafel)) {
                    $data[$i]->kafel_name = $kafel['k_name'];
                    $data[$i]->kafel_rkm = $kafel['k_num'];
                    $data[$i]->kafel_mob = $kafel['k_mob'];
                    $data[$i]->kafel_status = $kafel['halat_kafel_id'];
                    $data[$i]->kafel_fe2a_type = $this->GetFe2aTitle($kafel['fe2a_type']);

                }else{
                     $data[$i]->kafel_name = '';
                    $data[$i]->kafel_rkm = '';
                    $data[$i]->kafel_mob = '';
                    $data[$i]->kafel_status = '';
                    $data[$i]->kafel_fe2a_type = '';
                }


                   // pay_method
                if (in_array($row->pay_method,array(5,7 )) ) {
                $data[$i]->bank_name = $this->GetBankTitle($row->bank_id_fk);
                }

                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
     public  function get_person_gender($person_id_fk,$person_type){

        if($person_type == 1){
           $ttable = "mother";
          $nname_field = 'm_gender';
        }elseif($person_type == 2){
               $ttable = "f_members";
                $nname_field = 'member_gender';
        }elseif($person_type == 3){
               $ttable = "f_members";
             $nname_field = 'member_gender';
        }

        $h = $this->db->get_where($ttable, array('id' =>$person_id_fk));
        $arr= $h->row_array();
           return $arr[$nname_field];

    }    

    public function getMembers($main_table, $where_arr = '')
    {
        $this->db->select('*')
            ->order_by('id', 'asc');
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($main_table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }
    
        public function getMembers_2()
    {
        
                $this->db->select('mother.*,
                          basic.mother_national_num ,basic.file_num , basic.final_suspend
                        ');
        $this->db->from("mother");
        $this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk',"left");

        $this->db->where('basic.final_suspend',4);
        $this->db->order_by('basic.file_num', "ASC");
        
      /*  $this->db->select('mother.*','basic.file_num ')
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk',"left")
            ->order_by('id', 'asc');*/
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             $query=$query->result_array();
        foreach ($query as $key=>$vaule){
            $query[$key]['frist_k_num']=$this->get_kafel_name($vaule['first_k_id'])['k_num'];
          
        }
        return $query;
           // return $query->result_array();
       //   return $query->result();
        } else {
            return 0;
        }
    }
/*********************************************/
    public function select_aramel()
    {    //basic.file_num ,basic.mother_national_num  , mother.mother_national_num_fk ,mother.full_name
        $this->db->select('basic.*  ,
                          mother.mother_national_num_fk ,mother.full_name 
                       ');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->where($Conditions_arr);
        $this->db->order_by('basic.file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                 $data[$i] = $row;
                $i++;
            }
            return $data;
        }
        return false;
    }


/************************************************/

    public function select_quedsss()
    {

       $this->db->select('finance_quods_details.* , finance_quods.rkm ,finance_quods.no3_qued_name ,finance_quods.halet_qued_name  ,finance_quods.no3_qued ');
        $this->db->from("finance_quods_details");
        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");
        
        
         $this->db->where("finance_quods_details.maden ",0);
        // $this->db->where("finance_quods.rkm",1);
        $this->db->where("finance_quods.no3_qued != ",6);
        $this->db->where("finance_quods.no3_qued != ",1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

                $i++;
            }
            return $data;
        }
        return false;
    }
    
/******************************************************************/








public function get_all_quods(){
        $this->db->select('*');
        $this->db->from('finance_quods');
 	    $this->db->order_by("rkm","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                $data[$x]->Total_maden =  $this->get_Total_maden($row->rkm); 
                 $data[$x]->Total_dayen =  $this->get_Total_dayen($row->rkm); 
   
                    
               
                $x++; }
            return $data ;
        }
        return false;
    }















      public function get_Total_maden($rkm)
{


     $this->db->select('*');
     $this->db->where('qued_rkm_fk',$rkm);
  //   $this->db->where('dayen',0);

    $query = $this->db->get('finance_quods_details');
      $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $data =0;
        foreach ($query->result() as $row) {
            $data += $row->maden;
        }
        return $data;
    }
    return false;
}      public function get_Total_dayen($rkm)
{


     $this->db->select('*');
     $this->db->where('qued_rkm_fk',$rkm);
  //   $this->db->where('dayen',0);

    $query = $this->db->get('finance_quods_details');
      $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $data =0;
        foreach ($query->result() as $row) {
            $data += $row->dayen;
        }
        return $data;
    }
    return false;
}
  /**************************************/
  
          public function getMembers_3()
    {
        
                $this->db->select('f_members.*,
                          basic.mother_national_num ,basic.file_num , basic.final_suspend
                        ');
        $this->db->from("f_members");
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"left");

        $this->db->where('basic.final_suspend',4);
        $this->db->order_by('basic.file_num', "ASC");
        
      /*  $this->db->select('mother.*','basic.file_num ')
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk',"left")
            ->order_by('id', 'asc');*/
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
              $query=$query->result_array();
        foreach ($query as $key=>$vaule){
            $query[$key]['frist_k_num']=$this->get_kafel_name($vaule['first_k_id'])['k_num'];
            $query[$key]['second_k_num']=$this->get_kafel_name($vaule['second_k_id'])['k_num'];
        }
          return $query;
          //  return $query->result_array();
       //   return $query->result();
        } else {
            return 0;
        }
    }
  
    
    
}// END CLASS 