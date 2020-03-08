<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ezn_sarf_model extends CI_Model {
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
        $this->db->from("fr_all_pills");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id+1;
            }
            return $data;
        }else{
		return 1;
		}
     }


	public function GetFromEmployees_settings($type){
		$this->db->select('*');
		$this->db->from('employees_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}


	public function GetFromFr_settings($type){
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}
	public function GetFromFr_settings2($type){
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	 public function getImagesById($id){
		 $this->db->select('fr_all_attachments.*,fr_settings.*');
		 $this->db->from('fr_all_attachments');
		 $this->db->where('person_id',$id);
		 $this->db->join('fr_settings','fr_settings.id_setting=fr_all_attachments.attach_id_fk','left');
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
	public function GetFromGeneral_assembly_settings($type){
		$this->db->select('*');
		$this->db->from('general_assembly_settings');
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}

/*

	public function getById($id){
		$this->db->select('*');
		$this->db->from('fr_sponsor');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}*/










  /********************************************************************/
	public function getMother($where = false){
		$this->db->select('mother.*,basic.file_num');
		$this->db->from('mother');
		$this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk',"LEFT");
		$this->db->where('basic.final_suspend',4);
		$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row){
				$data[] =  $row;
			}
			return$data;
		}else{
			return 0;
		}

	}


	public function getMembers($where = false)
	{
		$query =$this->db->select('f_members.*,basic.file_num,
			father.full_name AS father_name')
			->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk',"LEFT")
			->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"LEFT")
			->where('basic.final_suspend',4)
			->where('basic.file_status',1)
			->where($where)
			->order_by("basic.file_num","ASC")
			->get('f_members');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$data[$x]['main_kafalat_details'] =  $this->getmain_kafalat_details_data($row['id']);
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}




	public function getMembersArmal($where = false)
	{
		$query =$this->db->select('mother.*,basic.id as basic_id,basic.file_num,father.full_name AS father_name ')
			->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk',"LEFT")
			->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"LEFT")
			->where($where)
			->where('basic.file_status',1)
			->get('mother');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$data[$x]['main_kafalat_details'] =  $this->getmain_kafalat_details_data($row['id']);
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}


	public function getmain_kafalat_details_data($mother_id){
		$this->db->select('person_id_fk,first_date_from,first_date_to');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where('person_id_fk',$mother_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return$query->result_array()[0];
		}else{
			return 0;
		}


	}

	/********************************************************************/


    public function getBanks($acc= false){
    $this->db->select('*');
    $this->db->from('society_main_banks_account');
    $this->db->where('account_id_fk',$acc);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data[] =  $this->GetBanksDetails($row->bank_id_fk);
        }
        return $data;
    }else{
        return false;
    }

}


public function GetBanksDetails($bank_id){
    $this->db->select('*');
    $this->db->from('banks_settings');
    $this->db->where('id',$bank_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result()[0];
    }else{
        return false;
    }
}

	public function select_banks_accounts(){
		$this->db->select('*');
		$this->db->from('society_main_banks_account');
		$this->db->where('type',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$x++;}
			return $data;
		}else{
			return false;
		}

	}




	public function GetBankAccount($arr){
		$this->db->select('id,account_num,bank_id_fk,account_id_fk');
		$this->db->from('society_main_banks_account');
		$this->db->where($arr);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$data[] =  $row;
			}
			return $data;
		}else{
			return false;
		}

	}






/*************************************************************************/

    public function select_sponsors_kafalat($kafel_id){
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');

        $this->db->where('first_kafel_id',$kafel_id);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
                 $data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
                  $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                  $data[$i]->kafala_color = $this->get_kafela_name($row->kafala_type_fk)['color'];

                 $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
                 $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];

                if($row->person_type == 1){
                 $data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
                }elseif($row->person_type == 2 || $row->person_type == 3){
                 $data[$i]->person_name = $this->get_member_name($row->person_id_fk);
                }


               /* $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                $data[$i]->father_national = $this->get_father_national($row->mother_national_num);*/
                $i++;
            }
            return $data;
        }
        return false;
    }



    public function get_father_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->full_name;
        }else{
            return "غير محدد";
        }
    }

       public  function get_mother_name($mother_national_num_fk){
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];
    }

    public function get_kafel_name($kafel_id)
    {
        $this->db->where('id', $kafel_id);
        $query=$this->db->get('fr_sponsor');
        if($query->num_rows()>0)
        {
            return $query->row()->k_name;
        }else{
            return "غير محدد ";
        }
    }


   public  function get_halet_kafela($halet_kafala){
        $h = $this->db->get_where("fr_kafalat_kafel_status", array('id'=>$halet_kafala));
        return $arr= $h->row_array();

    }


      public  function get_kafela_name($kafala_type_fk){
        $h = $this->db->get_where("fr_kafalat_types_setting", array('id'=>$kafala_type_fk));
        return $arr= $h->row_array();

    }




       public  function get_member_name($person_id_fk){
        $h = $this->db->get_where("f_members", array('id'=>$person_id_fk));
        $arr= $h->row_array();
        return $arr['member_full_name'];
    }




	/*********************************************/
	public function getKafalatDetailsById($id){
		$this->db->select('fr_main_kafalat_details.*,
		banks_settings.id as banks_settingsid, banks_settings.title as bank_title ,banks_settings.*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->join('banks_settings','banks_settings.id=fr_main_kafalat_details.bank_id_fk','left');
		$this->db->where('fr_main_kafalat_details.id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				$i=0;
				foreach ($query->result() as $row) {
					$data[$i] = $row;
					$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
					$data[$i]->kafela_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
					$i++;}
			return $data;
		}else{
			return false;
		}

	}



	public function getMembersDonors($where = false)
	{
		$query =$this->db->select('*')
			->get('fr_donor');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
			//	$data[$x]['main_kafalat_details'] =  $this->getmain_kafalat_details_data($row['id']);
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}






	/*********************************ahmed*******************************/


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

	public function select_all_by_DeviceData($where = false,$group = false)
	{
		$this->db->select('fr_devices_points.*,banks_settings.id as banks_settings_id,banks_settings.title');
		$this->db->from('fr_devices_points');
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->join("banks_settings","banks_settings.id=fr_devices_points.bank_id_fk","left");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				if($row->account_id_fk !=0){
					$data[$x]->AccountName =  $this->GetAccountName($row->account_id_fk);
				}
				if($row->account_id_fk !=0){
					$data[$x]->AccountNum=  $this->GetAccountNum($row->account_num_id_fk);
				}
				$x++;}
			return$data;
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

	/******************************************************************************************************/
	public function select_fr_bnod_pills_setting_by_condition($where = false)
	{
		$this->db->select('*');
		$this->db->from('fr_bnod_pills_setting');
		$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}

	/******************************************************************************************************/

	public function CheckUser()
	{
		$role =$_SESSION['role_id_fk'] ;
		$role_arr =array(1=>"users",2=>"magls_members_table",3=>"employees",4=>"general_assembley_members",5=>"users");
		$this->db->select('*');
		$this->db->from($role_arr[$role]);
		if($role ==1){
		$this->db->where("user_id",$_SESSION['user_id']);
		}else{
			$this->db->where("id",$_SESSION['emp_code']);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				if($role ==1){
					$data =$_SESSION['user_name'];
				}elseif($role ==2){

					$data =$query->result()[0]->member_name;
				}elseif ($role ==3){
					$data =$query->result()[0]->employee;
				}elseif ($role ==4) {
					$data = $query->result()[0]->general_assembley_members_name;
				}
			return$data;

		}else{
			return 0;
		}
	}





	public function insert($id =false)
	{
		  /*  echo '<pre>';
	var_dump($_POST);
  echo '</pre>';
   die;

		  */




		  $data['about'] 	   		   =  $this->chek_Null($this->input->post('about'));
		$data['pill_num'] 	   		   =  $this->chek_Null($this->input->post('pill_num'));
		$data['pill_date'] 	   		   =  $this->chek_Null($this->input->post('pill_date'));
		$data['pill_type'] 	   		   =  $this->chek_Null($this->input->post('pill_type'));
		$data['place_supply'] 	   		   =  $this->chek_Null($this->input->post('place_supply'));
		$data['fe2a_id_fk'] 	   		   =  $this->chek_Null($this->input->post('fe2a_id_fk'));
		$data['pay_method'] 	   		   =  $this->chek_Null($this->input->post('pay_method'));
		$data['value'] 	   		   =  $this->chek_Null($this->input->post('value'));
		$data['laqab'] 	   		   =  $this->chek_Null($this->input->post('laqab'));
		$data['person_id_fk'] 	   		   =  $this->chek_Null($this->input->post('person_id_fk'));
		// if(!empty(	$data['person_id_fk'] 	 )){
		// 	$data['person_type']   	   	   =  1;
		// }else{
		// 	$data['person_type']   	   	   =  0;
		// }

		$data['person_mob'] 	   		   =  $this->chek_Null($this->input->post('person_mob'));
		$data['person_name'] 	   		   =  $this->chek_Null($this->input->post('person_name'));
		$data['tahia'] 	   		   =  $this->chek_Null($this->input->post('tahia'));
		$data['erad_type'] 	   		   =  $this->chek_Null($this->input->post('erad_type'));
		$data['fe2a_type1'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type1'));
		$data['bnd_type1'] 	   		   =  $this->chek_Null($this->input->post('bnd_type1'));
		$data['bank_id_fk'] 	   		   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_id_fk'] 	   		   =  $this->chek_Null($this->input->post('bank_account_id_fk'));
		$data['bank_account_num'] 	   		   =  $this->chek_Null($this->input->post('bank_account_num'));
		$data['bank_account_code'] 	   		   =  $this->chek_Null($this->input->post('bank_account_code'));
		$data['cheq_num'] 	   		   =  $this->chek_Null($this->input->post('cheq_num'));
		$data['cheq_date'] 	   		   =  $this->chek_Null($this->input->post('cheq_date'));
		$data['branch_id_fk'] 	   		   =  $this->chek_Null($this->input->post('branch_id_fk'));
		$data['marg3_num'] 	   		   =  $this->chek_Null($this->input->post('marg3_num'));
		$data['marg3_date'] 	   		   =  $this->chek_Null($this->input->post('marg3_date'));
		$data['device_num'] 	   		   =  $this->chek_Null($this->input->post('device_num'));
		$data['tafwed_num'] 	   		   =  $this->chek_Null($this->input->post('tafwed_num'));
		$data['process_date'] 	   		   =  $this->chek_Null($this->input->post('process_date'));
		$data['person_type'] 	   		   =  $this->chek_Null($this->input->post('person_type'));


		$data['value1'] 	   		   =  $this->chek_Null($this->input->post('value1'));
		$data['value2'] 	   		   =  $this->chek_Null($this->input->post('value2'));
		$data['fe2a_type2'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type2'));
		$data['bnd_type2'] 	   		   =  $this->chek_Null($this->input->post('bnd_type2'));


		if(empty($id)){
			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
			$data['date_ar'] 	  	   = date('Y-m-d');
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$this->db->insert('fr_all_pills',$data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('fr_all_pills',$data);
		}

	}



	public function select_all_by_fr_all_pills($where = false)
	{
		$this->db->select('*');
		$this->db->from('fr_all_pills');
		$this->db->where($where);
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
				$data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);
				$data[$x]->bank_title =  $this->GetBankTitle($row->bank_id_fk);
				$data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
				$data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

				$x++;}
			return$data;
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


    public function GetTitleFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }

    public function DeletePill($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fr_all_pills');
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
	public function GetFe2aTitle($id){
        $h = $this->db->get_where("fr_sponser_donors_setting", array('id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }

	}



	public function add_attach($img){

    if(!empty($img)){
		$data['file']  = $img;
		$this->db->where('id', $_POST['id']);
		$this->db->update('fr_all_pills',$data);
	}
	}


	public function delete_attach($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_all_attachments');
	}


	/*************************************start********************************************/


	public function getMembersEmployees($where = false)
	{
		$query =$this->db->select('*')
			->get('employees');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$data[$x]['administration_title'] =  $this->GetDepartmentTitle($row['administration']);
				$data[$x]['department_title'] =   $this->GetDepartmentTitle($row['department']);
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}

	/*public function getMembersBasic($where = false)
	{
		$query =$this->db->select('*')
			->where('final_suspend',4)
			->get('basic');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}*/
    public function getEznSarfById($id)
	{
		return $this->db->select('finance_ezn_sarf.*, edara.name AS edara, qesm.name AS qesm, users.user_name')
						->join('department_jobs edara','edara.id=finance_ezn_sarf.edara_fk','LEFT')
						->join('department_jobs qesm','qesm.id=finance_ezn_sarf.qsm_fk','LEFT')
						->join('users','users.user_id=finance_ezn_sarf.publisher','LEFT')
						->where('finance_ezn_sarf.id',$id)
						->get('finance_ezn_sarf')
						->row_array();
	}
    public function getMembersBasic($where = false)
	{
		$query =$this->db->select('basic.*, family_bank_responsible.person_name, family_bank_responsible.person_national_card')
			->join('family_bank_responsible','family_bank_responsible.family_national_num_fk=basic.mother_national_num')
			->where('final_suspend',4)
			->get('basic');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$x++;}
			return$data;
		}else{
			return 0;
		}
	}





	public function GetDepartmentTitle($id){
		$h = $this->db->get_where("department_jobs", array('id'=>$id));
		if($h ->num_rows() > 0){
			return $h->row_array()['name'];
		}else{
			return 'غير محدد';
		}

	}
    



public function getFunanceGehat($where)
	{
		//return $this->db->where($where)->get('finance_gehat')->result();

		$this->db->select('*');
		$this->db->from('finance_gehat');
		$this->db->where($where);
		$this->db->group_by('title');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$x++;}
			return$data;
		}else{
			return 0;
		}
	}

	public function insertEznSarf($id){


		if ( !empty($this->input->post('type'))) {
			$data['type'] 	 = $this->chek_Null($this->input->post('type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
		}else{
			$data2['title']  = $this->chek_Null($this->input->post('person_name'));
			$this->db->insert('finance_gehat',$data2);
			$insert_id = $this->db->insert_id();
			$data['person_id_fk'] = $this->chek_Null($insert_id);
			$data['type'] 	 = 5;
		}
		$data['person_name']  = $this->chek_Null($this->input->post('person_name'));
		$data['mother_national_num']  = $this->chek_Null($this->input->post('mother_national_num'));
		$data['ezn_rqm']  	 = $this->chek_Null($this->input->post('ezn_num'));
		$data['ezn_date'] 	 = $this->chek_Null(strtotime($this->input->post('pill_date')));
		$data['ezn_date_ar'] = $this->chek_Null($this->input->post('pill_date'));
		$data['edara_fk'] 	 = $this->chek_Null($this->input->post('edara_fk'));
		$data['qsm_fk'] 	 = $this->chek_Null($this->input->post('qsm_fk'));
		/*$data['edara_fk'] 	 = $this->chek_Null($_SESSION['administration_id']);
		$data['qsm_fk'] 	 = $this->chek_Null($_SESSION['dep_job_id_fk']);*/
		$data['value'] 		 = $this->chek_Null($this->input->post('value'));
		$data['about'] 		 = $this->chek_Null($this->input->post('about'));


		if(!empty($id)){
			$this->db->where('id', $id);
			$this->db->update('finance_ezn_sarf',$data);


		}else{
			$data['date'] 		 = strtotime(date('Y-m-d'));
			$data['date_ar'] 	 = date('Y-m-d');
			$data['publisher'] 	 = $this->chek_Null($_SESSION['user_id']);
			$this->db->insert('finance_ezn_sarf',$data);
		}
	}

public function getFinanceEznSarf()
	{
		$sql = $this->db->get('finance_ezn_sarf');
		if ($sql->num_rows() > 0) {
			$x=0;
			foreach ($sql->result() as $row) {
				$data[$x] = $row;
				if ($row->type == 1) {
					$data[$x]->Pname = $this->getPname($row->person_id_fk,'employees','id','employee');
				}
				if ($row->type == 2) {
					/*$data[$x]->Pname = $this->getPname($row->person_id_fk,'basic','father_name');*/
					$data[$x]->Pname = $this->getPname($row->mother_national_num,'family_bank_responsible','family_national_num_fk','person_name');
				}
				if ($row->type == 3) {
					/*$data[$x]->Pname = $this->getPname($row->person_id_fk,'basic','father_name');*/
					$data[$x]->Pname = $this->getPname($row->person_id_fk,'general_assembley_members','id','name');
				}
				if ($row->type == 5) {
					$data[$x]->Pname = $this->getPname($row->person_id_fk,'finance_gehat','id','title');
				}
				$x++;
			}
			return $data;
		}
		return false;
	}

	public function getPname($id,$table,$search_field,$field)
	{
		return $this->db->select($field)->where($search_field,$id)->get($table)->row_array()[$field];
	}

	public function getMaxEznRqm()
	{
		return $this->db->select('COALESCE(MAX(CAST(ezn_rqm AS UNSIGNED)),0) AS maxRqm')->get('finance_ezn_sarf')->row_array()['maxRqm'];
	}

public function deleteEzanSarf($id)
	{
		$this->db->where('id',$id)->delete('finance_ezn_sarf');
	}

	public function getById($id){
		$this->db->select('*');
		$this->db->from('finance_ezn_sarf');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$x++;
			}

			return $query->result();
		}
		return false;


	}



/*
	public function getEznSarfById($id)
	{
		return $this->db->select('finance_ezn_sarf.*, edara.name AS edara, qesm.name AS qesm')
						->join('department_jobs edara','edara.id=finance_ezn_sarf.edara_fk','LEFT')
						->join('department_jobs qesm','qesm.id=finance_ezn_sarf.qsm_fk','LEFT')
						->where('finance_ezn_sarf.id',$id)
						->get('finance_ezn_sarf')
						->row_array();
	}*/

/*public function updateEznSarf($id)
	{
		if ($this->input->post('person_name') == '') {
			$data['type'] 	 = $this->input->post('fe2a');
			$data['p_id_fk'] = $this->input->post('choosed');
		}
		else {
			$data2['title']  = $this->input->post('person_name');
			$this->db->insert('finance_gehat',$data2);
			$id = $this->db->insert_id();
			$data['p_id_fk'] = $id;
		}
		$data['ezn_rqm']  	 = $this->input->post('ezn_num');
		$data['ezn_date'] 	 = strtotime($this->input->post('pill_date'));
		$data['ezn_date_ar'] = $this->input->post('pill_date');
		$data['edara_fk'] 	 = $_SESSION['administration_id'];
		$data['qsm_fk'] 	 = $_SESSION['dep_job_id_fk'];
		$data['value'] 		 = $this->input->post('value');
		$data['about'] 		 = $this->input->post('about');
		$data['date'] 		 = strtotime(date('Y-m-d'));
		$data['date_ar'] 	 = date('Y-m-d');
		$data['publisher'] 	 = $_SESSION['user_id'];
		$this->db->where('id',$id)->update('finance_ezn_sarf',$data);
	}*/



	public function getMembersGeneral_assembly($where = false)
	{
		$query =$this->db->select('*')
			->get('general_assembley_members');
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result_array() as $row){
				$data[$x] =  $row;
				$x++;}
			return$data;
		}else{
			return 0;
		}


	}

	public function GetUserDetails($table,$arr){
		$h = $this->db->get_where($table, $arr);
		if($h ->num_rows() > 0){
			return $h->row_array();
		}else{
			return false;
		}

	}


	public function getUserDepartmentDetails()
	{
		$role =$_SESSION['role_id_fk'];
		if($role ==1){
			$data['main_dep'] ='مدير على النظام';
			$data['sub_dep'] ='';
		}elseif ($role ==3){
			$user =$this->GetUserDetails("employees",array('id'=>$_SESSION['emp_code']));
			$data['main_dep'] =$this->GetDepartmentTitle($user['administration']);
			$data['sub_dep'] =$this->GetDepartmentTitle($user['department']);
			$data['main_dep_id'] =$user['administration'];
			$data['sub_dep_id'] =$user['department'];
		}
		if(!empty($_SESSION['emp_code'])){
		$manager_id =$this->get_manager_name(array('id'=>$_SESSION['emp_code']))->manger;
			$data['manager_name'] =$this->get_manager_name(array('id'=>$manager_id))->employee;

		}else{
			$data['manager_name']='غير محدد';
		}
		return $data;
	}


	public function get_manager_name($arr)
	{
		$this->db->where($arr);
		$query=$this->db->get('employees');
		if($query->num_rows()>0)
		{
			return $query->row();
		}else{
			return "غير محدد";
		}
	}
/*********************************************************************************************/

	public function Transformation_process(){
		$id =$_POST['id'];
		$user =$this->GetUserDetails('users',array('user_id'=>$_SESSION['user_id']));
		$ezn_data =$this->getById($id)[0];
	/*	echo "<pre>";
		print_r($ezn_data);
		echo "</pre>";
		die;*/
		//accept

		if($_POST['transfer'] ==='accept'){



                 //   table current => last
			     //$_POst ==>current
		//finance_ezn_sarf  action
		$data_ezn['current_from_id'] 		 = $this->chek_Null($_SESSION['user_id']);
		$data_ezn['current_from_name'] 		 = $this->chek_Null($user['user_name']);
		$data_ezn['current_to_id'] 		 = $this->chek_Null($this->input->post('current_to_id'));
		$data_ezn['current_to_name'] 		 = $this->chek_Null($this->input->post('current_to_name'));
		$data_ezn['last_from_id'] 		 = $this->chek_Null($ezn_data->current_from_id);
		$data_ezn['last_from_name'] 		 = $this->chek_Null($ezn_data->current_from_name);
		$data_ezn['last_to_id'] 		 = $this->chek_Null($ezn_data->current_to_id);
		$data_ezn['last_to_name'] 		 = $this->chek_Null($ezn_data->current_to_name);
		$data_ezn['current_procedure_title'] 		 = $this->chek_Null($this->input->post('current_procedure_title'));
		$data_ezn['current_procedure_action'] 		 = $this->chek_Null($this->input->post('current_procedure_action'));
		$data_ezn['last_procedure_title'] 		 = $this->chek_Null($this->input->post('last_procedure_title'));
		$data_ezn['last_procedure_action'] 		 = $this->chek_Null($this->input->post('last_procedure_action'));
		$data_ezn['band_name'] 		 = $this->chek_Null($this->input->post('band_name'));
		$data_ezn['band_code'] 		 = $this->chek_Null($this->input->post('band_code'));
		$data_ezn['suspend'] 		 = 0;
		$data_ezn['level'] 		 = 2;
		$this->db->where('id', $id);
		$this->db->update('finance_ezn_sarf',$data_ezn);




		//transformation_process  action
		$data_transformation['t_name'] 		 = $this->chek_Null($this->input->post('t_name'));
		$data_transformation['ezn_id_fk'] 		 = $this->chek_Null($id);
		$data_transformation['from_id'] 		 = $this->chek_Null($_SESSION['user_id']);
		//$data_transformation['from_id'] 		 = $this->chek_Null($this->input->post('from_id'));
		$data_transformation['from_name'] 		 = $this->chek_Null($user['user_name']);
		$data_transformation['to_id'] 		 = $this->chek_Null($this->input->post('to_id'));
		$data_transformation['to_name'] 		 = $this->chek_Null($this->input->post('to_name'));
		$data_transformation['procedure_title'] 		 = 'moder_mali';
		$data_transformation['procedure_title_action'] 		 = $this->chek_Null($this->input->post('transfer'));
		$data_transformation['sarf_method'] 		 = $this->chek_Null($this->input->post('sarf_method'));
		$data_transformation['date'] 		 =date('Y-m-d');
		$data_transformation['date_s'] 		 = strtotime(date('Y-m-d'));
		$data_transformation['date_ar'] 	 = date('Y-m-d');
		$data_transformation['publisher'] 	 = $this->chek_Null($_SESSION['user_id']);
		$this->db->insert('finance_transformation_process',$data_transformation);



		}elseif($_POST['transfer'] ==='refuse'){
			//refuse



		}


	}
/************************************************************************************/
/// nashwa

public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

public function addMohasebAction()
	{
		$data['current_from_id']   		  = $_SESSION['user_id'];
		$data['current_from_name'] 		  = $_SESSION['user_name'];
		$data['last_from_id'] 	   		  = $this->input->post('current_from_id');
		$data['last_from_name']    		  = $this->input->post('current_from_name');
		$data['current_procedure_title']  = 'mohaseb';
		$data['current_procedure_action'] = $this->input->post('procedure_title_action');
		$data['last_procedure_title'] 	  = $this->input->post('current_procedure_title');
		$data['last_procedure_action'] 	  = $this->input->post('current_procedure_action');
		$data['level']				   	  = 1;
		$data['band_name']			   	  = $this->input->post('band_name');
		$data['band_code']			   	  = $this->input->post('band_code');
		$data['notes']			   	   	  = $this->input->post('notes');
		$this->db->where('id',$this->input->post('ezn_id_fk'))->update('finance_ezn_sarf', $data);

		$data2['t_name'] 			 	 = '';
		$data2['ezn_id_fk'] 			 = $this->input->post('ezn_id_fk');
		$data2['from_id'] 			 	 = $_SESSION['user_id'];
		$data2['from_name'] 			 = $_SESSION['user_name'];
		$data2['to_id'] 				 = '';
		$data2['to_name'] 				 = '';
		$data2['procedure_title'] 		 = 'mohaseb';
		$data2['procedure_title_action'] = $this->input->post('procedure_title_action');
		$data2['date'] 			 		 = strtotime(date('Y-m-d'));
		$data2['date_s'] 			 	 = time();
		$data2['date_ar'] 			 	 = date('Y-m-d');
		$data2['publisher'] 			 = $_SESSION['user_id'];
		$this->db->insert('finance_transformation_process',$data2);
	}

    
/***********************************************************************************/    
    
    
    



}

