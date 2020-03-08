<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_model extends CI_Model {
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
		$this->db->from("fr_sponsor");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 0;
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


/*
	public function select_all(){
		$this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor');
		$this->db->join('banks_settings','banks_settings.id=fr_sponsor.bank_id_fk','left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x=0;
			foreach ($query->result() as $row){
				$data[$x] =  $row;
				$data[$x]->Images =  $this->getImagesById($row->id);
   	        $data[$x]->kafel_status =  $this->getkafelStatusById($row->halat_kafel_id);
			$x++;}
			return $data;
		}else{
			return false;
		}

	}*/
    
public function select_all(){
    $this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
    $this->db->from('fr_sponsor');
    $this->db->join('banks_settings','banks_settings.id=fr_sponsor.bank_id_fk','left');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
    $x=0;
    foreach ($query->result() as $row){
    $data[$x] =  $row;
    $data[$x]->desc =  $this->get_fr_setting($row->wakel_relationship);
  //  $data[$x]->halt =  $this->get_fr_setting($row->halat_kafel_id);
     $data[$x]->halt =  $this->fr_kafalat_kafel_status($row->halat_kafel_id);
    $data[$x]->reason =  $this->get_fr_setting($row->reasons_stop_id_fk);
    $data[$x]->Images =  $this->getImagesById($row->id);
    $data[$x]->kafel_status =  $this->getkafelStatusById($row->halat_kafel_id);
     $data[$x]->fe2a_title =  $this->get_fe2a_type($row->fe2a_type);
    $x++;}
    return $data;
    }else{
    return false;
    }

}


  public  function get_fe2a_type($fe2a_type){
        $h = $this->db->get_where("fr_sponser_donors_setting", array('id'=>$fe2a_type));
        return $arr= $h->row_array();
        
    }
public function fr_kafalat_kafel_status($id)
{
	$this->db->where('id',$id);
	$query=$this->db->get('fr_kafalat_kafel_status');
	if($query->num_rows()>0)
	{
		return $query->row()->title;
	}else{
		return 'غير محدد';
	}
}
public function get_fr_setting($id)
{
            $this->db->where('id_setting',$id);
         $query=$this->db->get('fr_settings');
    if($query->num_rows()>0)
    {
         return $query->row()->title_setting;
    }else{
          return 'غير محدد';
    }
}
    
	public function getkafelStatusById($id)
	{
		return $this->db->get_where('fr_kafalat_kafel_status', array('id'=>$id))->row_array();
	}

	public function insert_maindata($id,$file)
	{

		$data['fe2a_type'] 	   		   =  $this->chek_Null($this->input->post('fe2a_type'));
		$data['k_num']  		 	   =  $this->chek_Null($this->input->post('k_num'));
		$data['k_addres']  		 	   =  $this->chek_Null($this->input->post('k_addres'));
		$data['k_name']   	   =  $this->chek_Null($this->input->post('k_name'));
		$data['k_gender_fk'] 		   =  $this->chek_Null($this->input->post('k_gender_fk'));
		$data['k_nationality_fk'] =  $this->chek_Null($this->input->post('k_nationality_fk'));
		$data['k_national_num'] 	   =  $this->chek_Null($this->input->post('k_national_num'));
		$data['k_national_type']   	   =  $this->chek_Null($this->input->post('k_national_type'));
		$data['k_national_place'] 		   =  $this->chek_Null($this->input->post('k_national_place'));
		$data['k_city']   	   =  $this->chek_Null($this->input->post('k_city'));
		$data['k_job_fk'] 		   =  $this->chek_Null($this->input->post('k_job_fk'));
		$data['k_job_place'] 		   =  $this->chek_Null($this->input->post('k_job_place'));
		$data['k_specialize_fk'] 		  	   =  $this->chek_Null($this->input->post('k_specialize_fk'));
		$data['k_barid_box'] 	   =  $this->chek_Null($this->input->post('k_barid_box'));
		$data['k_bardid_code']   	   =  $this->chek_Null($this->input->post('k_bardid_code'));
		$data['k_fax']    =  $this->chek_Null($this->input->post('k_fax'));
		$data['k_mob'] 	   =  $this->chek_Null($this->input->post('k_mob'));
		$data['k_email']   	   =  $this->chek_Null($this->input->post('k_email'));
		$data['k_activity_fk'] 		   =  $this->chek_Null($this->input->post('k_activity_fk'));
		$data['k_message_method'] 	   =  $this->chek_Null($this->input->post('k_message_method'));
		$data['k_message_mob'] 	   =  $this->chek_Null($this->input->post('k_message_mob'));
		$data['k_notes']   	   	   =  $this->chek_Null($this->input->post('k_notes'));
		$data['right_time_from']   	   	   =  $this->chek_Null($this->input->post('right_time_from'));
		$data['right_time_to']   	   	   =  $this->chek_Null($this->input->post('right_time_to'));
        
        
		$data['social_status_id_fk']   	   	   =  $this->chek_Null($this->input->post('social_status_id_fk'));
		$data['reasons_stop_id_fk']   	   	   =  $this->chek_Null($this->input->post('reasons_stop_id_fk'));
		$data['halat_kafel_id']   	   	   =  $this->chek_Null($this->input->post('halat_kafel_id'));
		$data['w_name']   	   	   =  $this->chek_Null($this->input->post('w_name'));
		$data['w_national_num']   	   	   =  $this->chek_Null($this->input->post('w_national_num'));
		$data['w_mob']   	   	   =  $this->chek_Null($this->input->post('w_mob'));
		$data['k_hai']   	   	   =  $this->chek_Null($this->input->post('k_hai'));
        
        
    $data['wakel_relationship']   	   	   =  $this->chek_Null($this->input->post('wakel_relationship'));
     $data['wakala_type']   	   	   =  $this->chek_Null($this->input->post('wakala_type'));   
        
        
       	$data['work_id_fk']   	   	   =  $this->chek_Null($this->input->post('work_id_fk')); 
        
        
  	     $data['company_phone']   	   	   =  $this->chek_Null($this->input->post('company_phone'));
		$data['company_gawal']   	   	   =  $this->chek_Null($this->input->post('company_gawal'));
		$data['company_fax']   	   	   =  $this->chek_Null($this->input->post('company_fax'));
        
        
        
        
        
		if(!empty($file)){
			$data['person_img']   	   	   =  $file;

		}

		if(empty($id)){

			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
			$data['date_ar'] 	  	   = date('Y-m-d');
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$this->db->insert('fr_sponsor',$data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('fr_sponsor',$data);
		}



	}




	public function getf_members($id){
		$this->db->select('*');
		$this->db->from('f_members');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0];
		}else{
			return false;
		}

	}



	public function insert_Kfala_data($file,$id)
	{


       /* echo "<pre>";

        print_r($_POST);

        echo "</pre>";

        die;*/
	   
          if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
         $person_type =2;   
        }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
          $person_type =3;   
        }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
            $person_type =1;    
        }else{
          $person_type = 0;     
        }
       
    $datas['checked_in_main_kafalat'] =  $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk') , $person_type , $this->input->post('person_id_fk') );
     if(empty($datas['checked_in_main_kafalat']) ){    
        $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar']     =  $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));    
        $data['first_date_to_ar']       =  $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] 	        =  strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));
        
        /**
         * @Hints
         * armal    = 1
         * yatem    = 2
         * mostafed = 3
         */ 
        
        if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
         $person_type =2;   
        }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
          $person_type =3;   
        }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
            $person_type =1;    
        }else{
          $person_type = 0;     
        }
        
          $data['person_type'] 		    =  $person_type;
        /*******************************************************************************************/
		$data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
		$data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
		$data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
		$data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
		$data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
		$data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
		$data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
		$data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
    	$data['mostdem_img']    	   =  $file ;

     	//$this->db->insert('fr_main_kafalat',$data);
        $this->db->insert('fr_main_kafalat_details',$data);
  }else{
    /********************************************************************/
     $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] 	    =  $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));    
        $data['first_date_to_ar'] 		    =  $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] 	    =  strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));
        
        /**
         * @Hints
         * armal    = 1
         * yatem    = 2
         * mostafed = 3
         */ 
        
        if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
         $person_type =2;   
        }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
          $person_type =3;   
        }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
            $person_type =1;    
        }else{
          $person_type = 0;     
        }
        
          $data['person_type'] 		    =  $person_type;
        /*******************************************************************************************/
		$data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
		$data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
		$data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
		$data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
		$data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
		$data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
         $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
         $data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
         $data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
		$data['mostdem_img']    	   =  $file ;


			  $this->db->insert('fr_main_kafalat_details',$data);
		 
  
    
   /*********************************************************************/ 
  }

	}

  public function update_Kfala_data($file,$id)
  {

	  

		if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
	   $person_type =2;   
	  }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
		$person_type =3;   
	  }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
		  $person_type =1;    
	  }else{
		$person_type = 0;     
	  }
	 
  $datas['checked_in_main_kafalat'] =  $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk') , $person_type , $this->input->post('person_id_fk') );
   if(empty($datas['checked_in_main_kafalat']) ){    
	  $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
	  $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
	  $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
	  $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
	  $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
	  $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
	  $data['first_date_from_ar']     =  $this->chek_Null($this->input->post('from_date'));
	  $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));    
	  $data['first_date_to_ar']       =  $this->chek_Null($this->input->post('to_date'));
	  $data['first_date_to'] 	        =  strtotime($this->chek_Null($this->input->post('to_date')));
	  $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));
	  
	  /**
	   * @Hints
	   * armal    = 1
	   * yatem    = 2
	   * mostafed = 3
	   */ 
	  
	  if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
	   $person_type =2;   
	  }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
		$person_type =3;   
	  }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
		  $person_type =1;    
	  }else{
		$person_type = 0;     
	  }
	  
		$data['person_type'] 		    =  $person_type;
	  /*******************************************************************************************/
	  $data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
	  $data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
	  $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
	  $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
	  $data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
	  $data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
       $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
		$data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
	  $data['mostdem_img']    	   =  $file ;
	  $this->db->where('id', $id);
	  $this->db->update('fr_main_kafalat_details',$data);
}else{
  /********************************************************************/
   $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
	  $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
	  $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
	  $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
	  $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
	  $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
	  $data['first_date_from_ar'] 	    =  $this->chek_Null($this->input->post('from_date'));
	  $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));    
	  $data['first_date_to_ar'] 		    =  $this->chek_Null($this->input->post('to_date'));
	  $data['first_date_to'] 	    =  strtotime($this->chek_Null($this->input->post('to_date')));
	  $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));
	  
	  /**
	   * @Hints
	   * armal    = 1
	   * yatem    = 2
	   * mostafed = 3
	   */ 
	  
	  if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
	   $person_type =2;   
	  }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
		$person_type =3;   
	  }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
		  $person_type =1;    
	  }else{
		$person_type = 0;     
	  }
	  
		$data['person_type'] 		    =  $person_type;
	  /*******************************************************************************************/
	  $data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
	  $data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
	  $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
	  $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
	  $data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
	  $data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
       $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
       $data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
       $data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
	  $data['mostdem_img']    	   =  $file ;


	$this->db->where('id', $id);
	
	$this->db->update('fr_main_kafalat_details',$data);

       }
      //echo'<pre>';  var_dump($data); echo'</pre>'; die;
	}
    


	public function Get_Details_from_fr_main_kafalat($mother_national_num_fk , $person_type , $person_id_fk ){
		$this->db->select('id,mother_national_num_fk,person_type,person_id_fk');
		$this->db->from('fr_main_kafalat');
		$this->db->where('mother_national_num_fk',$mother_national_num_fk);
 	    $this->db->where('person_type',$person_type);
 	    $this->db->where('person_id_fk',$person_id_fk);
        
        
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$data =  $row;
			}
			return $data;
		}else{
			return false;
		}

	}




/*

	public function insert_Kfala_data($file,$id)
	{
		//fr_kafala_subscription
        
		$data['mother_national_num_fk'] 		   =  $this->chek_Null($this->input->post('mother_national_num_fk'));
		$data['kafel_id_fk'] 		   =  $this->chek_Null($this->input->post('kafel_id_fk'));
		$data['kafala_type_fk'] 		   =  $this->chek_Null($this->input->post('kafala_type_fk'));
		$data['person_type'] 		   =  $this->chek_Null($this->input->post('person_type'));
		$data['person_id_fk'] 		   =  $this->chek_Null($this->input->post('person_id_fk'));
		$data['from_date'] 		   =  $this->chek_Null($this->input->post('from_date'));
		$from_date =explode('/',$data['from_date'] 	);
		$data['from_d'] 		   =  $this->chek_Null($from_date[0]);
		$data['from_m'] 		   =  $this->chek_Null($from_date[1]);
		$data['from_y'] 		   =  $this->chek_Null($from_date[1]);

		$data['to_date'] 		   =  $this->chek_Null($this->input->post('to_date'));
		$to_date =explode('/',$data['to_date'] 	);
		$data['to_d'] 		   =  $this->chek_Null($to_date[0]);
		$data['to_m'] 		    =  $this->chek_Null($to_date[1]);
		$data['to_y'] 		   =  $this->chek_Null($to_date[1]);
		$data['kafala_now'] 		   =  0;
		$data['kafala_status'] 		   =  $this->chek_Null($this->input->post('kafala_status'));
		$data['num_days'] 		  	   =  $this->chek_Null($this->input->post('num_days'));
		$data['alert_type'] 		  	   =  $this->chek_Null($this->input->post('alert_type'));
		$data['pay_method']      =  $this->chek_Null($this->input->post('pay_method'));
		$data['bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('bank_id_fk'));
		$data['bank_account_num'] 		  	   =  $this->chek_Null($this->input->post('bank_account_num'));





		$data['mostdem_from_date'] 		  	   =  $this->chek_Null($this->input->post('mostdem_from_date'));
		$data['mostdem_to_date'] 		  	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
		$data['gamia_account'] 		  	   =  $this->chek_Null($this->input->post('gamia_account'));
		$data['gamia_bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
    	$data['mostdem_img'] 		  	   =  $file ;

		$data['date'] 		  	   = date('Y-m-d');
		$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
		$data['date_ar'] 	  	   = date('Y-m-d');
		$data['publisher'] 	  	   = $_SESSION['user_id'];
		$this->db->insert('fr_kafala_subscription',$data);


		//f_members
		$data2['kafala_type_fk']      =  $this->chek_Null($this->input->post('kafala_type_fk'));
		$data2['kafel_id_fk'] 		  	   =  $this->chek_Null($this->input->post('kafel_id_fk'));
		if(	$data2['kafala_type_fk'] ==1){
			$data2['first_kafala_from'] 		  	   =  $this->chek_Null($data['from_date']);
			$data2['first_kafala_to'] 		  	   =  $this->chek_Null($data['to_date']);
		}elseif($data2['kafala_type_fk'] ==2){
			$f_members_data =$this->getf_members($this->input->post('person_id_fk'));
			if(!empty($f_members_data)){

				if($f_members_data->first_kafala_from == 0 && $f_members_data->first_kafala_to == 0 ){
					$data2['first_kafala_from'] 		  	   =  $this->chek_Null($data['from_date'] );
					$data2['first_kafala_to'] 		  	   =  $this->chek_Null($data['to_date'] );

				}else{
					$data2['second_kafala_from'] 		  	   =  $this->chek_Null($data['from_date'] );
					$data2['second_kafala_to'] 		  	   =  $this->chek_Null($data['to_date']);
				}
			}

		}


		$this->db->where('id', $this->input->post('person_id_fk'));
		$this->db->update('f_members',$data2);
        
        
	}
*/
/********************************************************************************************/

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_sponsor');
		$this->db->where('person_id', $id);
		$this->db->delete('fr_all_attachments');
	}

	public function delete_attach($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_all_attachments');
	}


	public function add_attach($images){
		$attach_id_fk =$this->input->post('attach_id_fk');
	 if(!empty($images)){ for($s=0; $s<sizeof($images);$s++){
		 $data['person_id'] 		  	   =  $this->chek_Null($this->input->post('person_id'));
		 $data['attach_id_fk'] 		  	   =  $this->chek_Null($attach_id_fk[$s]);
		 $data['img'] 		  	           =  $this->chek_Null($images[$s]);
		 $data['type'] 	  	               = 1;
		 $this->db->insert('fr_all_attachments',$data);
	 }
	 }
	}



	/*********************************************************/


/*
	public function getMother($where = false){
		$this->db->select('*');
		$this->db->from('mother.*,	basic.file_num,\ ');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"LEFT");
         
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

	}*/

/*	public function getMother($where = false)
	{

	  $query =$this->db->select('mother.*,
			basic.file_num, 
			father.full_name AS father_name')
			->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"LEFT")
			->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk',"LEFT")
			->where('basic.final_suspend',4)
			->where('basic.deleted',0)
			->where($where)

			->order_by("basic.file_num","ASC")
			->get('mother');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row){

				$data[] =  $row;
			}
			 return$data;
		}else{
			return 0;
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
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
			->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk',"LEFT")
			->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"LEFT")
             ->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member',"LEFT") 
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
		$query =$this->db->select('mother.*,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
         files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
         ')
			->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk',"LEFT")
			->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"LEFT")
             	->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m',"LEFT") 
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


	/*
        public function getMembersArmal($where = false)
        {
            $query =$this->db->select('mother.*,basic.file_num,father.full_name AS father_name
            , fr_main_kafalat_details.id as fr_main_kafalat_details_id')
                ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk',"LEFT")
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"LEFT")
                ->join('fr_main_kafalat_details', 'fr_main_kafalat_details.person_id_fk = mother.id',"LEFT")
                ->where($where)
                ->where('basic.file_status',1)
                ->get('mother');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row){
    
                    $data[] =  $row;
                }
                return$data;
            }else{
                return 0;
            }
    
    
        }*/



    
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




    

	/*****************************************************/
    
/*	public function getMembersArmal($where = false)
	{
 
		$query =$this->db->select('*')
			->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk',"RIGHT")
			->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"RIGHT")
			->join('fr_main_kafalat_details', 'fr_main_kafalat_details.person_id_fk = mother.id',"RIGHT")

			->where('basic.final_suspend',4)
        	->where($where)
            ->where('mother.categoriey_m',1)
            ->where('mother.halt_elmostafid_m',1)
			->get('mother');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row){

				$data[] =  $row;
			}
			return$data;
		}else{
			return 0;
		}
	}*/




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
                 
                 
                  $data[$i]->armal_num = $this->get_armal_num($row->first_kafel_id);
                  $data[$i]->aytam_num = $this->get_aytam_num($row->first_kafel_id);
                  $data[$i]->mostafed_num = $this->get_mostafed_num($row->first_kafel_id);
                  
                 
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


    public function get_armal_num($kafel_id ){
            $this->db->select('id');
            $this->db->from("fr_main_kafalat_details");
            $this->db->where("first_kafel_id",$kafel_id); // ""
            $this->db->where("person_type ",1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }

     public function get_aytam_num($kafel_id ){
            $this->db->select('id');
            $this->db->from("fr_main_kafalat_details");
            $this->db->where("first_kafel_id",$kafel_id); // ""
            $this->db->where("person_type ",2);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }


    public function get_mostafed_num($kafel_id ){
            $this->db->select('id');
            $this->db->from("fr_main_kafalat_details");
            $this->db->where("first_kafel_id",$kafel_id); // ""
            $this->db->where("person_type ",3);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }



   
    function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}


    function humanTiming_event ($time_2,$time_actipn)
{

if($time_actipn == 0){
  $time_actipn_new = time();  
}else{
    $time_actipn_new = $time_actipn;
}


    $time_2 = $time_actipn_new - $time_2; // to get the time since that moment
    $time_2 = ($time_2<1)? 1 : $time_2;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time_2 < $unit) continue;
        $numberOfUnits = floor($time_2 / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

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


	
	/*************************start***/
	public function getById_main_kafalat_detai($id){
		$h = $this->db->get_where("fr_main_kafalat_details", array('id'=>$id));
		if ($h->num_rows() > 0) {
		return $h->row_array();
		}else{
			return false;
		}
    }



	public function getmain_kafalat_details_data_byarray($arr){
		$this->db->select('*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where($arr);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return$query->result_array();
		}else{
			return 0;
		}


	}





    public function deleteKfala_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fr_main_kafalat_details');

    }
}

