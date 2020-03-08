<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllPills_model extends CI_Model {
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
     
     	public function select_last_pill_num(){
        $this->db->select('*');
        $this->db->from("fr_all_pills");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->pill_num+1;
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
    	public function getById($id){
		$this->db->select('*');
		$this->db->from('fr_sponsor');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->kafel_status =  $this->getkafelStatusById($row->halat_kafel_id);
				$x++;
			}

			return $query->result();
		}
			return false;


	}











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

/*********************************************************************************/
	public function getMembersSponsors_2(){
		$this->db->select('*');
		$this->db->from('fr_sponsor');
     $this->db->order_by("id", "asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				$i=0;
				foreach ($query->result() as $row) {
					$data[$i] = $row;
					$i++;}
			return $data;
		}else{
			return false;
		}

	}

	public function getMembersSponsors($where = false)
	{
		$query =$this->db->select('*')
           ->order_by('id', 'asc')
			->get('fr_sponsor');
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

    	public function getMembersGeneral_assembly($where = false)
	{
		$query =$this->db->select('*')
			->get('general_assembley_members');
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




    public function insert($id =false,$all_img=false){
		  /*  echo '<pre>';
	var_dump($_POST);
  echo '</pre>';
   die;

		  */




		  $data['about'] 	   		   =  $this->chek_Null($this->input->post('about'));
	//	$data['pill_num'] 	   		   =  $this->chek_Null($this->input->post('pill_num'));
    	$var =time() + 5;
		if($var == true){
		  $last_pill_num   = $this->select_last_pill_num();
        }

    
    
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


	//	$data['value1'] 	   		   =  $this->chek_Null($this->input->post('value1'));
        
        /*
        if(!empty($data['fe2a_type2'] ) && !empty($data['bnd_type2'])){
             $data['value1'] 	   		   =  $this->chek_Null($this->input->post('value1'));
         }else{
             $data['value1'] 	   		   =  $data['value'];
         }
        
        
        $data['value2'] 	   		   =  $this->chek_Null($this->input->post('value2'));
        */
            $bnd_type2 = $this->input->post('bnd_type2');
       
         if(isset($bnd_type2) and $bnd_type2 != null){
               $data['value1'] 	   		   =  $this->chek_Null($this->input->post('value1'));
                $data['value2'] 	   		   =  $this->chek_Null($this->input->post('value2'));
        }else{
               $data['value1'] 	   		   =  $data['value'];
               $data['value2'] 	   		   =  0;
               
        }
        
        
		$data['fe2a_type2'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type2'));
		$data['bnd_type2'] 	   		   =  $this->chek_Null($this->input->post('bnd_type2'));


     $data['bnd_type1_name'] 	   		   =  $this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('bnd_type1'));
      $data['bnd_type2_name'] 	   		   =  $this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('bnd_type2'));


		if(empty($id)){
		    $data['pill_num'] 	   		   =  $last_pill_num;
			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = time();
			$data['date_ar'] 	  	   = date('Y-m-d');
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$data['publisher_name'] 	  	   = $this->getUserName($_SESSION['user_id']);
			$this->db->insert('fr_all_pills',$data);
		}else{
		  
           /********************تعديل قيد*******************/
/*  <?php if($row->deport_sand_qabd ==1){?>*/
  $result = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_num'=>$_POST['pill_num']))[0];
if($result->deport_sand_qabd ==1){
            //Delete and insert;
            $qued_rkm_fk =$this->select_quod_details_bypill_num($_POST['pill_num'])[0]->qued_rkm_fk;

            $data['qued_num'] =$qued_rkm_fk;
            $data['qued_type'] = "قيد يومية";

            $this->db->where("marg3",$_POST['pill_num']);
            $this->db->delete("finance_quods_details");

                 if(!empty($this->input->post('bank_account_code'))){

                     $dataa['qued_rkm_fk'] =$qued_rkm_fk;
                     $dataa['rkm_hesab'] =$this->input->post('bank_account_code');
                     $dataa['hesab_name'] =$this->GetTitleFromSociety_main_banks_account($this->input->post('bank_account_code'));
                     $dataa['maden'] =$this->input->post('value');
                     $dataa['dayen'] =0;
                     if($this->input->post('pay_method')==3) {
                         $dataa['byan'] = " نقاط البيع جهاز رقم -".$this->input->post('device_num')."بتاريخ".$this->input->post('pill_date');
                     }else{
                         $dataa['byan'] = "تحويل من ح /".$this->input->post('person_name')." - رقم ".$this->input->post('marg3_num');
                     }

                     $dataa['marg3'] = $_POST['pill_num'];
                     $this->db->insert('finance_quods_details',$dataa);


                 }


            if(!empty($this->input->post('value1'))){
                $datas['qued_rkm_fk'] =$qued_rkm_fk;
                $datas['rkm_hesab'] =$this->input->post('bnd_type1');
                $datas['hesab_name'] =$this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('bnd_type1'));
                $datas['dayen'] =$this->input->post('value1');
                $dataa['maden'] =0;
                $datas['byan'] = "إيصال". $this->input->post('pill_num').''.$this->input->post('person_name')."/". $datas['hesab_name'];
                $datas['marg3'] = $_POST['pill_num'];

                $this->db->insert('finance_quods_details',$datas);

            }


            if(!empty($this->input->post('value1'))){

                $datab['qued_rkm_fk'] =$qued_rkm_fk;
                $datab['rkm_hesab'] =$this->input->post('bnd_type2');
                $datab['hesab_name'] =$this->GetTitleFromFr_bnod_pills_settingByCode($this->input->post('bnd_type2'));
                $datab['dayen'] =$this->input->post('value2');
                $datab['maden'] =0;
                $datab['byan'] = "إيصال". $this->input->post('pill_num').''.$this->input->post('person_name')."/". $datas['hesab_name'];
                $datab['marg3'] = $_POST['pill_num'];


                $this->db->insert('finance_quods_details',$datab);
            }
            

            /********************تعديل قيد*******************/
          }
          
          
			$this->db->where('id', $id);
			$this->db->update('fr_all_pills',$data);
		}

        //////////// attaches

        if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){
                $files['pill_num'] =  $this->chek_Null($this->input->post('pill_num'));
                $files['file_attached'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert(' fr_all_pills_attaches',$files);
            }

        }

	}

	public function select_all_by_fr_all_pills_all()
	{
		$this->db->select('*');
		$this->db->from('fr_all_pills');
 	    $this->db->order_by("id","DESC");
    	$this->db->where('deport_sand_qabd',0);
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
				$data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $data[$x]->attaches = $this->getAttachesByRkm($row->pill_num);

				$x++;}
			return$data;
		}else{
			return 0;
		}

	}
    
    
	public function select_all_by_fr_all_pills_all_deported()
	{
		$this->db->select('*');
		$this->db->from('fr_all_pills');
 	    $this->db->order_by("id","DESC");
    	$this->db->where('deport_sand_qabd',1);
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
				$data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $data[$x]->attaches = $this->getAttachesByRkm($row->pill_num);

				$x++;}
			return$data;
		}else{
			return 0;
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
				$data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);
				if(!empty($row->bnd_type2)){
                    $data[$x]->band_title2 =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type2);

                }
				$data[$x]->bank_title =  $this->GetBankTitle($row->bank_id_fk);
				$data[$x]->bank_account_title = $this->GetAccountName($row->bank_account_id_fk);
				$data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $data[$x]->attaches = $this->getAttachesByRkm($row->pill_num);

				$x++;}
			return$data;
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

    public function DeletePill($id)
    {
        $this->db->where('pill_num', $id);
        $this->db->delete('fr_all_pills');
        $this->db->where('pill_num', $id);
        $this->db->delete('fr_all_pills_attaches');
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


    public function delete_attaches($id)
    {
        $this->db->where("id",$id);
        $this->db->delete('fr_all_pills_attaches');
    }




   public function slect_where($table,$Conditions){
        $this->db->select('*');
        $this->db->from($table);
        foreach($Conditions as $key=>$value){
            $this->db->where($key,$Conditions[$key]);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
/****************************************************************/


    public function getSearchResults($row_name,$value)
    {
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->where("$row_name", "$value");
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
                $data[$x]->bank_account_num_title = $this->GetAccountNum($row->bank_account_num);

                $data[$x]->attaches = $this->getAttachesByRkm($row->pill_num);

                $x++;}
            return$data;
        }
        return false;
    }
 /***************************************************************************************************/
 /****************************************************************************************************/
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
    if($_SESSION['role_id_fk'] == 3){
        
     $this->db->where($where);    
        
    // $this->db->where('pill_date',date("Y-m-d"));   
     $this->db->where('publisher',$_SESSION['user_id']);
    }else{
        
    }
    
     $this->db->where('deport_sand_qabd',0);  
  
    
    
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
    
    
    
 /*******************************************************************************************************/   
 	public function get_all_sponsers(){
		$this->db->select("fr_sponsor.k_name,fr_all_pills.person_id_fk,fr_sponsor.id");
		//$this->db->select('k_name');
		$this->db->from('fr_sponsor');
		//$this->db->where('id',$id);
		$this->db->join('fr_all_pills','fr_all_pills.person_id_fk=fr_sponsor.id');
	//	$this->db->group_by('fr_all_pills.person_id_fk');
		$query =$this->db->get();
		if ($query->num_rows()>0){
			$i = 0;
			foreach ($query->result() as $row){
				$data[$i]= $row;
				$data[$i]->count = $this->get_count($row->id);
			//	$data[$i]->details = $this->get_all_pill($row->id);
				$i++;
			}
			return $data;
			//return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_count($id){
		$this->db->select('person_id_fk');
		$this->db->from('fr_all_pills');
		$this->db->where('person_id_fk',$id);
		$query= $this->db->get();
		if ($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return false;
		}
	}

	public function get_all_pill($id){
		$this->db->select('*');
		$this->db->from('fr_all_pills');
		$this->db->where('person_id_fk',$id);
		$query= $this->db->get();
		if ($query->num_rows()>0){
			$i = 0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->pill_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
				$i++;
			}
			return $data ;
		}
		else{
			return false;
		}
	}
   /***********************************************/    
 
 
 
  public function select_all_devices_points(){
        $this->db->select('*');
        $this->db->from('fr_devices_points');
       	$this->db->where('device_status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }       
    
    
   public function get_all_pill_search($field,$valu){
		$this->db->select('*');
		$this->db->from('fr_all_pills');
		if(!empty($valu)) {
			if ($field == 'person_name') {
				$this->db->like($field, $valu);
			} else {
				$this->db->where($field, $valu);

			}
		}
		$query= $this->db->get();
		if ($query->num_rows()>0){
			$i = 0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->pill_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
				$data[$i]->markz =  $this->get_markz($row->place_supply);
				$data[$i]->erad =  $this->GetTitleFromFr_bnod_pills_setting($row->erad_type);
				$data[$i]->band =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type1);

				$i++;
			}
			return $data ;
		}
		else{
			return false;
		}
	}

	public function get_markz($id)
	{
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('id_setting',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row()->title_setting;
		}
		return "غير محدد";
	}
    
    
     /***************************ahmed_start****************/

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
    public function GetTitleFromSociety_main_banks_account($code){
        $h = $this->db->get_where("society_main_banks_account", array('rqm_hesab'=>$code));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['name_hesab'];
        }else{
            return 0;
        }


    }
    
}

