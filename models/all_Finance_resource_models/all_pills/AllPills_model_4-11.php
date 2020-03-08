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
            return "��� ����";
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
            return "��� ���� ";
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


	public function getMembersSponsors($where = false)
	{
		$query =$this->db->select('*')
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





	public function insert($id =false)
	{

		$data['pill_num'] 	   		   =  $this->chek_Null($this->input->post('pill_num'));
		$data['pill_date'] 	   		   =  $this->chek_Null($this->input->post('pill_date'));
		$data['pill_type'] 	   		   =  $this->chek_Null($this->input->post('pill_type'));
		$data['place_supply'] 	   		   =  $this->chek_Null($this->input->post('place_supply'));
		$data['fe2a_id_fk'] 	   		   =  $this->chek_Null($this->input->post('fe2a_id_fk'));
		$data['pay_method'] 	   		   =  $this->chek_Null($this->input->post('pay_method'));
		$data['value'] 	   		   =  $this->chek_Null($this->input->post('value'));
		$data['laqab'] 	   		   =  $this->chek_Null($this->input->post('laqab'));
		$data['person_id_fk'] 	   		   =  $this->chek_Null($this->input->post('person_id_fk'));
		if(!empty(	$data['person_id_fk'] 	 )){
			$data['person_type']   	   	   =  1;
		}else{
			$data['person_type']   	   	   =  0;
		}

		$data['person_mob'] 	   		   =  $this->chek_Null($this->input->post('person_mob'));
		$data['person_name'] 	   		   =  $this->chek_Null($this->input->post('person_name'));
		$data['tahia'] 	   		   =  $this->chek_Null($this->input->post('tahia'));
		$data['erad_type'] 	   		   =  $this->chek_Null($this->input->post('erad_type'));
		$data['fe2a_type'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type'));
		$data['bnd_type'] 	   		   =  $this->chek_Null($this->input->post('bnd_type'));
		$data['bank_id_fk'] 	   		   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_id_fk'] 	   		   =  $this->chek_Null($this->input->post('bank_account_id_fk'));
		$data['bank_account_num'] 	   		   =  $this->chek_Null($this->input->post('bank_account_num'));
		$data['bank_account_code'] 	   		   =  $this->chek_Null($this->input->post('bank_account_code'));
		$data['cheq_num'] 	   		   =  $this->chek_Null($this->input->post('cheq_num'));
		$data['branch_id_fk'] 	   		   =  $this->chek_Null($this->input->post('branch_id_fk'));
		$data['marg3_num'] 	   		   =  $this->chek_Null($this->input->post('marg3_num'));
		$data['marg3_date'] 	   		   =  $this->chek_Null($this->input->post('marg3_date'));
		$data['device_num'] 	   		   =  $this->chek_Null($this->input->post('device_num'));
		$data['tafwed_num'] 	   		   =  $this->chek_Null($this->input->post('tafwed_num'));
		$data['process_date'] 	   		   =  $this->chek_Null($this->input->post('process_date'));
		$data['kafala_type'] 	   		   =  $this->chek_Null($this->input->post('kafala_type'));
	
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
				$data[$x]->fe2a_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->fe2a_type);
				$data[$x]->MemberDetails =  $this->GetMemberNameByID($row->person_id_fk,$row->kafala_type);
				$data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_setting($row->bnd_type);
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

}

