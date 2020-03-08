<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quods_model extends CI_Model {


	public function select_last_id(){
		$this->db->select('*');
		$this->db->from("finance_quods");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 1;
		}
	}


	public function select_last_rkm_2(){
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



	public function select_last_rkm(){
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
    public function insert($id =false,$all_img=false)
    {

        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = $no3_qued[0];
        $data['no3_qued_name'] = $no3_qued[1];
        $halet_qued =explode('-',$this->input->post('halet_qued'));

        $data['halet_qued'] = $halet_qued[0];
        $data['halet_qued_name'] = $halet_qued[1];
        $data['qued_date'] = strtotime($this->input->post('qued_date'));
        $data['qued_date_ar'] = $this->input->post('qued_date');
        $data['total_value'] = $this->input->post('total_value');
       
      


        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->update('finance_quods',$data);
         //  $this->delete_datails($id);

        }else{
            $data['rkm'] = $this->input->post('rkm');
            $data['date'] 		  	   = date('Y-m-d');
            $data['date_s'] 	  	   = time();
            $data['publisher'] 	  	   = $_SESSION['user_id'];
            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
            
            $this->db->insert('finance_quods',$data);
        }


        //details

        if($this->input->post('rkm_hesab')){

            $markz_tklfa_id = $this->input->post('markz_id');
            $markz_tklfa_name = $this->input->post('markz_name');

            $count = count($this->input->post('rkm_hesab'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');
               $harka =$this->input->post('harka_id');
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم',8=>'صرف شيك');
            
            
            

            for ($i=0 ;$i < $count; $i++){
                
                $details['markz_id'] = $markz_tklfa_id[$i];
                $details['markz_name'] = $markz_tklfa_name[$i];
                $details['qued_rkm_fk'] = $this->input->post('rkm');
                if(!empty($maden_value[$i])){
                    $details['maden'] = $maden_value[$i];
                }else{
                    $details['maden'] = 0;
                }
                if(!empty($dayen_value[$i])){
                    $details['dayen'] = $dayen_value[$i];
                }else{
                    $details['dayen'] = 0;
                }
                $details['date'] = strtotime($this->input->post('qued_date'));
                $details['date_ar'] = ($this->input->post('qued_date'));

                $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('hesab_name')[$i];
                $details['byan'] = $byan[$i];
                $details['marg3'] = $marg3[$i];
                $details['harka_id'] = $harka[$i];
             //   $details['harka_name'] = $pay_method_arr[$harka[$i]];
                
                
              $this->update_finance($marg3[$i]);
                $this->db->insert('finance_quods_details',$details);
                $this->db->where('publisher_esal',$_SESSION['user_id']);
                $this->db->delete('queds_test-table');
            }

        }


        //////////// attaches

        if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){
                $files['qued_rkm_fk'] = $this->input->post('rkm');
                $files['file_attached'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert('finance_quods_attaches',$files);
            }

        }
        
        
     $delete_action['rkm'] =  $this->input->post('rkm');
     $delete_action['total_value'] =  $this->input->post('total_value');
     $delete_action['no3_qued_name'] = $no3_qued[1];
     $delete_action['halet_qued_name'] = $halet_qued[1];
     $delete_action['qued_date'] =  strtotime($this->input->post('qued_date'));
     $delete_action['qued_date_ar'] =   $this->input->post('qued_date');
   
      $delete_action['publisher_do_action'] = $this->getUserName($_SESSION['user_id']);
      $delete_action['action_date'] 	  = date('Y-m-d');
     $delete_action['action_date_s'] 	  	      = time();
 
     $delete_action['date_time'] =   date('h:i:sa');
     $delete_action['action_name'] =  'إضافة القيد';
     
     
     $delete_action['action_color'] =  '#078007'; 
      
     $this->db->insert('finance_all_actions_in_finance_quods',$delete_action);  
        
        


    }
//==================================
public function update_finance($id)
{
    $data['deport_sand_qabd']=1;
    $this->db->where('pill_num',$id);
    $this->db->update('fr_all_pills',$data);
}


//===============================

	public function getAllquod_3($arr){
		$this->db->select('*');
		$this->db->from("finance_quods");
		if($arr !=''){
            $this->db->where($arr);
        }
      //    $this->db->where('rkm =',77);
        
		$this->db->order_by("rkm","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->details = $this->getdetailsById($row->rkm);
				$data[$i]->attaches = $this->getAttachesByRkm($row->rkm);
			}
			return $query->result();
		}
			return false;

	}



	public function getAllquod_2($arr){
		$this->db->select('*');
		$this->db->from("finance_quods");
		if($arr !=''){
            $this->db->where($arr);
        }
       //   $this->db->where('rkm !=',1);
        
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->details = $this->getdetailsById($row->rkm);
				$data[$i]->attaches = $this->getAttachesByRkm($row->rkm);
			}
			return $query->result();
		}
			return false;

	}



	public function getAllquod($arr){
		$this->db->select('*');
		$this->db->from("finance_quods");
		if($arr !=''){
            $this->db->where($arr);
        }
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->details = $this->getdetailsById_2($row->rkm,$row->no3_qued);
				$data[$i]->attaches = $this->getAttachesByRkm($row->rkm);
			}
			return $query->result();
		}
			return false;

	}
    
    
        public function getdetailsById_2($id,$no3_qued){
        $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk",$id);
      //   $this->db->where("dayen",0);
        if($no3_qued == 5){
            /*	$this->db->order_by("id","desc");
             $this->db->order_by("marg3","desc");*/
          /*   $this->db->order_by("id","asc");
               $this->db->order_by("marg3","asc");*/
             $this->db->order_by("esal_rkm","asc");   
               
        }elseif($no3_qued == 2){
             $this->db->order_by("marg3","asc");
             	$this->db->order_by("id","asc");
                    
        }else{
          	$this->db->order_by("id","asc");  
        }
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          //return $query->result();
           $query= $query->result();

            if (!empty($query)){
                foreach ($query as $key=>$item){
                    $query[$key]->mrakz_taklefa=$this->get_marakz_taklefa($item->rkm_hesab);
                }
                return $query;
            }
          
        }
        return false;

    }
    
    public function getdetailsById($id){
        $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk",$id);
       	$this->db->order_by("id","asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }


    public function getAttachesByRkm($id){
        $this->db->select('*');
        $this->db->from("finance_quods_attaches");
        $this->db->where("qued_rkm_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;

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



	/*public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}*/
    public function getAllAccounts($where)
{
    $q = $this->db->where($where)->order_by('parent', 'ASC')->get('dalel')->result();
    if (!empty($q)) {
        foreach ($q as $key => $item) {
            if ($item->hesab_no3 == 2) {
                $q[$key]->acount_parent = $this->get_parent($item->code);
            }
        }

    }

    return $q;
}
public function get_parent($code)
{
    $new_code=substr($code,0,2);
    $q2 = $this->db->select('id,parent,code,parent_code,name,level')->where('code', $new_code)->get('dalel')->row();

    return $q2;
}

    public function getAccount($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}




	public function delete($id)
	{
	   
       
        /******************************************************************************/
     $delete_action['rkm'] =  $this->all_action_deleted_quods($id)['rkm'];
     $delete_action['rkm_id_fk'] =  $this->all_action_deleted_quods($id)['id'];
     $delete_action['total_value'] =  $this->all_action_deleted_quods($id)['total_value']; 
     $delete_action['no3_qued_name'] =  $this->all_action_deleted_quods($id)['no3_qued_name'];
     $delete_action['halet_qued_name'] =  $this->all_action_deleted_quods($id)['halet_qued_name']; 
     $delete_action['qued_date'] =  $this->all_action_deleted_quods($id)['qued_date']; 
     $delete_action['qued_date_ar'] =  $this->all_action_deleted_quods($id)['qued_date_ar'];
     $delete_action['publisher_add'] =  $this->all_action_deleted_quods($id)['publisher_name'];
     $delete_action['publisher_do_action'] =  $this->getUserName($_SESSION['user_id']);
     $delete_action['action_date'] 	  = date('Y-m-d');
     $delete_action['action_date_s'] 	  	      = time();
     $delete_action['date_time'] =   date('h:i:sa');
     $delete_action['action_name'] =  'حذف القيد';
      $delete_action['action_color'] =  '#d60000';
     
     
      
     $this->db->insert('finance_all_actions_in_finance_quods',$delete_action);
      /*****************************************************************************/
       
       
       
		$this->db->where("rkm",$id);
		$this->db->delete('finance_quods');
        $this->db->where("qued_rkm_fk",$id);
        $this->db->delete('finance_quods_attaches');
        $this->delete_datails($id);
        
        
        
        
        
        
        

	}


	public function delete_datails($id)
	{
		$this->db->where("qued_rkm_fk",$id);
		$this->db->delete('finance_quods_details');
	}

    public function delete_attaches($id)
    {
        $this->db->where("id",$id);
        $this->db->delete('finance_quods_attaches');
    }


    //==================================================================
    public function rkm_esal_array(){
        $this->db->select('*');
        $this->db->from("queds_test-table");
        $this->db->where("publisher_esal",$_SESSION['user_id']);
        $query = $this->db->get();
        $x =0;
        if ($query->num_rows() > 0) {
            //	return $query->result();
            foreach ($query->result() as $row) {
                $data[$x] = $row->rkm_esal;
                // $data[$x]->total_sand_value = $this->get_total_sand_value();
                $x++;
            }
            return $data;

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


   public function select_all_by_fr_all_pills()
    {
        $arr =$this->rkm_esal_array();
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->where_in('pill_num',$arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =  $row;
                $data[$x]->hesab_name =  $this->GetTitleFromSociety_main_banks_account($row->bank_account_code);
                $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);
                if(!empty($row->bnd_type2)){
                    $data[$x]->band_title2 =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type2);
                }
                $x++;}
            return$data;
        }else{
            return 0;
        }

//       $this->db->where('publisher_esal',$_SESSION['user_id']);
//       $this->db->group_by('rkm_esal');
//       $query= $this->db->get('queds_test-table');
//       $data=array();
//       $x=0;
//       foreach($query->result() as $row)
//       {
//          $data[$x]=$row;
//           $data[$x]->maden=$this->GetTitleFromSociety_main_banks_account($row->bank_account_code);
//           $x++;
//       }

    }


    public function select_all_in_queds()
    {
        $this->db->where('publisher_esal',$_SESSION['user_id']);
         $this->db->order_by('rkm_esal','asc');
        $query= $this->db->get('queds_test-table')->result();
        $data=array();
        $x=0;

        foreach ($query as $row)
        {
          $data[$x]=$row;
            $data[$x]->pill=$this->get_pill($row->rkm_esal);
            $x++;
        }
        return $data;
    }

    public function get_pill($id)
    {
        $this->db->where('pill_num',$id);
        return $this->db->get('fr_all_pills')->row();
    }

    public function GetTitleFromSociety_main_banks_account($code){
        $h = $this->db->get_where("society_main_banks_account", array('rqm_hesab'=>$code));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['name_hesab'];
        }else{
            return 0;
        }


    }
/******************************************************************************/

 	public function getAllquodDetails($arr){
		$this->db->select('*');
		$this->db->from("finance_quods");
		if($arr !=''){
            $this->db->where($arr);
        }
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->details = $this->getdetailsByIdDetails($row->rkm,$row->no3_qued);
				$data[$i]->attaches = $this->getAttachesByRkm($row->rkm);
			}
			return $query->result();
		}
			return false;

	}
    public function getdetailsByIdDetails($id,$no3_qued){


  $this->db->select('*');
    $this->db->from("finance_quods_details");
    $this->db->where("qued_rkm_fk",$id);
       $this->db->where("dayen",0);
       if($no3_qued == 5){
         $this->db->order_by("esal_rkm","asc");
       }else{
         $this->db->order_by("marg3","asc");
       }
       
       
      
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $data2 = $this->getdetailsByIdmaden($id,$no3_qued);
        $dataTotal = (object) array_merge((array) $data, (array) $data2);

        return $dataTotal;
    }
    return false;

      /*  $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk",$id);
       	$this->db->where("dayen",0);
       	$this->db->order_by("marg3","asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $data += $this->getdetailsByIdmaden($id);
            return $data;
        }
        return false;*/

    }

    public function getdetailsByIdmaden($id,$no3_qued){

        $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk",$id);
        $this->db->where("maden",0);
       // $this->db->order_by("esal_rkm","asc");
        
          if($no3_qued == 5){
         $this->db->order_by("esal_rkm","asc");
       }else{
         $this->db->order_by("marg3","asc");
       }
       
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }
/**********************************************************/

public function getSarfInfo($id)
    {
        return $this->db->query('
                            SELECT c.*, b.*, a.*
                            FROM (
                                SELECT *
                                From finance_sarf_order 
                                WHERE sarf_num = '.$id.') c

                             LEFT JOIN
                            (
                                SELECT *
                                From bnod_help
                            ) b
                            on (c.bnod_help_fk=b.id)

                             LEFT JOIN
                            (
                                SELECT SUM(value) AS value, SUM(mother_num) AS aramel, SUM(young_num) AS aytam, SUM(adult_num) AS mostafeed, sarf_num_fk
                                From finance_sarf_order_details
                                WHERE sarf_num_fk = '.$id.' 
                            ) a
                            on (c.sarf_num=a.sarf_num_fk)
                            ')->row_array();
    }

    public function main_data()
    {
        return $this->db->get('main_data')->row_array();
    }
/*****************************************************************************/

    public function update_quods($id =false,$all_img=false)
    {

        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = $no3_qued[0];
        $data['no3_qued_name'] = $no3_qued[1];
        $halet_qued =explode('-',$this->input->post('halet_qued'));

        $data['halet_qued'] = $halet_qued[0];
        $data['halet_qued_name'] = $halet_qued[1];
        $data['qued_date'] = strtotime($this->input->post('qued_date'));
        $data['qued_date_ar'] = $this->input->post('qued_date');
        $data['total_value'] = $this->input->post('total_value');
       
       $rkm = $this->get_rkm_qqued($id);

            $this->db->where('id',$id);
            $this->db->update('finance_quods',$data);
          $this->delete_datails($rkm);





        if($this->input->post('rkm_hesab')){

             $markz_tklfa_id = $this->input->post('markz_id');
            $markz_tklfa_name = $this->input->post('markz_name');

            $count = count($this->input->post('rkm_hesab'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');
            $esal_rkm =$this->input->post('esal_rkm');
            
            $harka =$this->input->post('harka_id');
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم',8=>'صرف شيك');
            

            for ($i=0 ;$i < $count; $i++){
                
                $details['markz_id'] = $markz_tklfa_id[$i];
                $details['markz_name'] = $markz_tklfa_name[$i];
                
                $details['qued_rkm_fk'] = $this->input->post('rkm');
                if(!empty($maden_value[$i])){
                    $details['maden'] = $maden_value[$i];
                }else{
                    $details['maden'] = 0;
                }
                if(!empty($dayen_value[$i])){
                    $details['dayen'] = $dayen_value[$i];
                }else{
                    $details['dayen'] = 0;
                }
                $details['date'] = strtotime($this->input->post('qued_date'));
                $details['date_ar'] = ($this->input->post('qued_date'));


                $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('hesab_name')[$i];
                $details['byan'] = $byan[$i];
                $details['marg3'] = $marg3[$i];
              //  $details['esal_rkm'] = $esal_rkm[$i];
                
              if(isset($esal_rkm[$i]) && $esal_rkm[$i] !=null){
                $details['esal_rkm'] = $esal_rkm[$i];
                }
                
                $details['harka_id'] = $harka[$i];
                
                
            //    $details['harka_name'] = $pay_method_arr[$harka[$i]];
                
            //    return  $harka[$i];
                
              //  die;
              $this->update_finance($marg3[$i]);
                $this->db->insert('finance_quods_details',$details);

            }

        }


   if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){
                $files['qued_rkm_fk'] = $this->input->post('rkm');
                $files['file_attached'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert('finance_quods_attaches',$files);
            }

        }
        



     $delete_action['rkm'] =  $this->input->post('rkm');
    
     
     $delete_action['total_value'] =  $this->input->post('total_value');
     $delete_action['no3_qued_name'] = $no3_qued[1];
     $delete_action['halet_qued_name'] = $halet_qued[1];
     $delete_action['qued_date'] =  strtotime($this->input->post('qued_date'));
     $delete_action['qued_date_ar'] =   $this->input->post('qued_date');
   
     $delete_action['publisher_do_action'] = $this->getUserName($_SESSION['user_id']);

     $delete_action['action_date'] 	  = date('Y-m-d');
     $delete_action['action_date_s'] 	  	      = time();

     $delete_action['date_time'] =   date('h:i:sa');
     $delete_action['action_name'] =  'تعديل القيد';
     
     $delete_action['action_color'] =  '#eab61e';  
     
      
     $this->db->insert('finance_all_actions_in_finance_quods',$delete_action);  
            
            
        



    }



 public function get_rkm_qqued ($id){
        $h = $this->db->get_where("finance_quods",array("id"=>$id));
        $data = $h->row_array();
        return $data["rkm"];
    }



  public function CheckRkm($rkm){
        $this->db->select('*');
        $this->db->from("finance_quods");
        $this->db->where("rkm",$rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }


/*
	public function change_deport($valu)
    {
        $data['deport']=1;
        $data['deport_date_s']=strtotime(date("Y-m-d"));
        $data['deport_date_ar']=date("Y-m-d");
        $data['deport_date']=date("Y-m-d");
        $data['deport_publisher_id']=$_SESSION['id'];
         $this->db->where('rkm',$valu);
        $this->db->update('finance_quods',$data);

    }*/

public function change_deport($valu,$num)
    {
        $data['deport'] = $num;
        if ($num == 1) {

        $data['deport_date_s'] = strtotime(date("Y-m-d"));
        $data['deport_date_ar'] = date("Y-m-d");
        $data['deport_date'] = date("Y-m-d");
        $data['deport_publisher_name'] = $this->getUserName($_SESSION['user_id']);;

          $data['halet_qued'] = 1;
          $data['halet_qued_name'] = 'تمت المراجعة';
          

 

        $data['deport_publisher_id'] = $_SESSION['user_id'];
    }else{
           $data['halet_qued'] = 2;
          $data['halet_qued_name'] = 'قيد المراجعة';
        
            $data['deport_date_s'] = "";
            $data['deport_date_ar'] = "";
            $data['deport_date'] = "";
           $data['deport_publisher_name'] = "";

            $data['deport_publisher_id'] = "";
        }
        $this->db->where('rkm', $valu);
        $this->db->update('finance_quods', $data);

        //=============
        $q=$this->get_by_rkm($valu);
        $data_action['qued_rkm']=$q->rkm;
        $data_action['qued_id_fk']=$q->id;
        $data_action['qued_value']=$q->total_value;
        $data_action['qued_date_ar']=$q->qued_date_ar;
        $data_action['qued_action']=$num;
        if($num == 0){
        $data_action['qued_action_name']='إلغاء ترحيل القيد';     
        }elseif($num == 1){
              
               $data_action['qued_action_name']='ترحيل القيد';
        }
        
        $data_action['qued_publisher_add']=$q->publisher_name;
        $data_action['qued_publisher_deport_id']=$_SESSION['user_id'];
        $data_action['qued_publisher_deport_name']=$this->getUserName($_SESSION['user_id']);
        $data_action['qued_deport_date']=strtotime(date("Y-m-d"));


        $data_action['qued_deport_date_ar']=date("Y-m-d");
        $data_action['qued_deport_date_s']=strtotime(date("Y-m-d h:i:sa"));
        $this->db->insert('all_actions_quods',$data_action);



/**********************************************************************/

        /******************************************************************************/
     $delete_action['rkm'] =$q->rkm;  
     $delete_action['rkm_id_fk'] =$q->id;  
     $delete_action['total_value'] =$q->total_value;  
     $delete_action['no3_qued_name'] =$q->no3_qued_name; 
     $delete_action['halet_qued_name'] =$q->halet_qued_name; 
     $delete_action['qued_date'] =$q->qued_date;  
     $delete_action['qued_date_ar'] =$q->qued_date_ar; 
     $delete_action['publisher_add'] =$q->publisher_name;  
     $delete_action['publisher_do_action'] =  $this->getUserName($_SESSION['user_id']);
     $delete_action['action_date'] 	  = date('Y-m-d');
     $delete_action['action_date_s'] 	  	      = time();
     $delete_action['date_time'] =   date('h:i:sa');
    
       if($num == 0){
        $action_name ='إلغاء ترحيل القيد';  
        $color_name= '#a50505';   
        }elseif($num == 1){
               $action_name='ترحيل القيد';
               $color_name= '#009cb3';
        }
     
     $delete_action['action_color'] = $color_name;    
     $delete_action['action_name'] =  $action_name;
     
     
     
     
      
     $this->db->insert('finance_all_actions_in_finance_quods',$delete_action);
      /*****************************************************************************/



/********************************************************************/
    }

    public function get_by_rkm($valu)
    {
        $this->db->where('rkm',$valu);
        return $this->db->get('finance_quods')->row();
    }





    
    
      public function data_qued($rkm)
    {
        $this->db->where('rkm',$rkm);
        return $this->db->get('finance_quods')->row();
    }



/***********************************************************/   
        public function all_action_deleted_quods($rkm){
        $h = $this->db->get_where("finance_quods", array('rkm'=>$rkm));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr;
        }else{
            return 0;
        }
    }

/********************************************************/


 	public function getAllquodTracked(){
		$this->db->select('*');
		$this->db->from("finance_all_actions_in_finance_quods");
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
			}
			return $query->result();
		}
			return false;

	}


/*
public function get_result_search($field,$value){
	$this->db->select('finance_quods_details.*,finance_quods.rkm,
	finance_quods.no3_qued,finance_quods.no3_qued_name,finance_quods.halet_qued,finance_quods.halet_qued_name,
	finance_quods.qued_date,finance_quods.qued_date_ar,finance_quods.total_value');
	$this->db->from("finance_quods_details");
	$this->db->JOIN("finance_quods","finance_quods.rkm=finance_quods_details.qued_rkm_fk","left");
	if ($field ==='byan') {
      $a = str_replace('الا', 'الإ', $value);
      $b = str_replace('ره', 'رة', $value);
      $c=  str_replace('الإ', 'الا', $value);
      $d=  str_replace('الا', 'الآ', $value);
      $e=  str_replace('ا', 'أ', $value);
      $f=  str_replace('ة', 'ه',$value);
      $g=  str_replace('ه', 'ة', $value);
      $h=  str_replace('ى', 'ي', $value);
      $j=  str_replace('إ', 'أ', $value);


			 $this->db->or_like($field,$a, 'both');
			 $this->db->or_like($field,$b, 'both');
			 $this->db->or_like($field,$c, 'both');
			 $this->db->or_like($field,$d, 'both');
			 $this->db->or_like($field,$e, 'both');
			 $this->db->or_like($field,$f, 'both');
			 $this->db->or_like($field,$g, 'both');
			 $this->db->or_like($field,$h, 'both');
			 $this->db->or_like($field,$j, 'both');


}else{
	  $this->db->where($title, $match);
}
	$this->db->order_by("id","DESC");
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		$data = array();
		$i=0;
		foreach ($query->result() as $row){
			$data[$i] = $row;
		}
		return $query->result();
	}
		return false;

}
*/

public function get_result_search($field,$value){
	$this->db->select('finance_quods_details.*,finance_quods.rkm, finance_quods.publisher_name,
	finance_quods.no3_qued,finance_quods.no3_qued_name,finance_quods.halet_qued,finance_quods.halet_qued_name,
	finance_quods.qued_date,finance_quods.qued_date_ar,finance_quods.total_value');
	$this->db->from("finance_quods_details");
	$this->db->JOIN("finance_quods","finance_quods.rkm=finance_quods_details.qued_rkm_fk","left");
	if ($field ==='byan') {
  //$this->db->like($title, $match, 'both');
      $a = str_replace('الا', 'الإ', $value);
      $b = str_replace('ره', 'رة', $value);
      $c=  str_replace('الإ', 'الا', $value);
      $d=  str_replace('الا', 'الآ', $value);
      $e=  str_replace('ا', 'أ', $value);
      $f=  str_replace('ة', 'ه',$value);
      $g=  str_replace('ه', 'ة', $value);
      $h=  str_replace('ى', 'ي', $value);
      $j=  str_replace('إ', 'أ', $value);


			 $this->db->or_like($field,$a, 'both');
			 $this->db->or_like($field,$b, 'both');
			 $this->db->or_like($field,$c, 'both');
			 $this->db->or_like($field,$d, 'both');
			 $this->db->or_like($field,$e, 'both');
			 $this->db->or_like($field,$f, 'both');
			 $this->db->or_like($field,$g, 'both');
			 $this->db->or_like($field,$h, 'both');
			 $this->db->or_like($field,$j, 'both');


}else{
	  $this->db->where($field, $value);
}
	$this->db->order_by("id","DESC");
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		$data = array();
		$i=0;
		foreach ($query->result() as $row){
			$data[$i] = $row;
		}
		return $query->result();
	}
		return false;

}



public function get_result_search_by_finance_quods($field,$value){
	$this->db->select('*');
	$this->db->from("finance_quods");
	if($field ==='qued_date'){
 $date =explode('/',$value);
			$this->db->where('qued_date >=', strtotime($date[0]));
			$this->db->where('qued_date <=', strtotime($date[1]));
	}else {
		$this->db->where($field, $value);
	}
	$this->db->order_by("id","DESC");
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		$data = array();
		$i=0;
		foreach ($query->result() as $row){
			$data[$i] = $row;
		}
		return $query->result();
	}
		return false;

}

 public function change_status($valu, $id)
    {

        $status = 1 - $valu;
        $data['status'] = $status;
        $this->db->where('rkm', $id)->update('finance_quods', $data);

        return $status;

    }

/****************************************************/


  public  function get_job_title_person($job_title_code_fk){
    
        $h = $this->db->get_where("hr_egraat_emp_setting", array('job_title_code_fk'=>$job_title_code_fk,'person_suspend'=>1));
        $arr= $h->row_array();
        return $arr['person_private_name'];

    }


 public function get_rkm_qqued_deport_or_not ($id){
        $h = $this->db->get_where("finance_quods",array("id"=>$id));
        $data = $h->row_array();
        return $data["deport"];
    }

 public function get_rkm_elqeed ($rkm){
        $h = $this->db->get_where("finance_quods",array("rkm"=>$rkm));
        $data = $h->row_array();
        return $data["id"];
    }


/***********************************/
 public function get_elqeed_rkm ($id){
        $h = $this->db->get_where("finance_quods",array("id"=>$id));
        $data = $h->row_array();
        return $data["rkm"];
    }
    
 public function get_total_value_elqeed ($id){
        $h = $this->db->get_where("finance_quods",array("id"=>$id));
        $data = $h->row_array();
        return $data["total_value"];
    }
    
        public function get_total_value_elqeed_by_rkm ($rkm){
        $h = $this->db->get_where("finance_quods",array("rkm"=>$rkm));
        $data = $h->row_array();
        return $data["total_value"];
    }
    
     	public function get_elqeed_zero_value($rkm){
		$this->db->select('*');
		$this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk",$rkm);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
			}
			return $query->result();
		}
			return false;

	}
/*********************************/

   public function get_marakz_taklefa($account_code)
    {
        return $this->db->select('finance_markz_taklfa.*')
            ->join('finance_markz_taklfa ', "finance_markz_taklfa.id=finance_markz_taklfa_hesabat.markz_id_fk", "left")
            ->where('finance_markz_taklfa_hesabat.rkm_hesab', $account_code)
            ->get('finance_markz_taklfa_hesabat')->result();


    }
    
    
    
    
    
}

