<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_qbd_model extends CI_Model {


	public function select_last_id(){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 1;
		}
	}




	public function select_last_rkm(){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->rqm_sanad + 1;
		}else{
			return 1;
		}
        }
	
	public function getAllVouchQbd(){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->delails = $this->getdetailsById($row->rqm_sanad);
                
                
               $data[$i]->delails_cheque = $this->get_details_cheque($row->rqm_sanad);
                 
			}
			return $query->result();
		}
			return false;

	}





	public function findById($id){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd");
		$this->db->where("id",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				$data = $query->row();
				$data->delails = $this->getdetailsById($data->rqm_sanad);
               $data->pill_details = $this->get_pills_by_pill_num($data->rqm_sanad);
               $data->delails_cheque = $this->get_details_cheque($data->rqm_sanad);
               
                $data->attaches = $this->getAttachesByRkm($query->row()->rqm_sanad);

			return $data;
		}
		return false;

	}
     public function getAttachesByRkm($id){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_attachment");
        $this->db->where("rqm_sanad_id_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;

        }

    }
    
     public function delete_attaches($id)
    {
        $this->db->where("id",$id);
        $this->db->delete('finance_sanad_qabd_attachment');
    }
    
    public function insert_attach($all_img){


        if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){
                $files['rqm_sanad_id_fk'] =   $_POST['rqm_sanad'];
                $files['file_attached'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert('finance_sanad_qabd_attachment',$files);
            }

        }


    }
    
  /*  public function get_details_cheque($id)
    {
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_sheek");
        $this->db->where("rqm_sanad_id_fk",$id);
        //$this->db->order_by("marg3_rkm_esal","asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }*/
    
    public function get_details_cheque($id)
{
    $this->db->select('*');
    $this->db->from("finance_sanad_qabd_sheek");
    $this->db->where("rqm_sanad_fk",$id);//32-3-om
    //$this->db->order_by("marg3_rkm_esal","asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
}

	public function getdetailsById($id){
		$this->db->select('*');
		$this->db->from("finance_sanad_qabd_details");
		$this->db->where("rqm_sanad_fk",$id);
          $this->db->order_by("marg3_rkm_esal","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;

	}

	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

    public function getAccount($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}

	public function insert_update($id,$saned,$rkm)
	{

	//	$data['rqm_sanad'] = $this->input->post('rqm_sanad');
		$data['date_sanad'] =  strtotime($this->input->post('date_sanad'));
		$data['date_sanad_ar'] =$this->input->post('date_sanad');
		$data['pay_method'] = $this->input->post('pay_method');
	
		$data['about'] = $this->input->post('about');
		$data['total_value'] = $this->input->post('total_value');
		/*$data['sheek_num'] = $this->input->post('sheek_num');
		$data['sheek_date'] = $this->input->post('sheek_date');
		$data['sheek_date_ar'] = $this->input->post('sheek_date');
		$data['bank_id_fk'] = $this->input->post('bank_id_fk');
		$data['bank_name'] = $this->input->post('bank_name');*/
        
        $data['sheek_num'] = $this->input->post('sheek_num')[0];
        $data['sheek_date'] = $this->input->post('sheek_date')[0];
        $data['sheek_date_ar'] = $this->input->post('sheek_date')[0];
        $data['bank_id_fk'] = $this->input->post('bank_id_fk')[0];
        $data['bank_name'] = $this->input->post('bank_name')[0];
        
        
       	$data['print_type'] = 1;
       	$data['type'] = $this->input->post('type');
		$data['person_name'] = $this->input->post('person_name');
 	    $data['recived_from'] = $this->input->post('person_name');
		$data['mother_national_num'] = $this->input->post('mother_national_num');
		$data['person_id_fk'] = $this->input->post('person_id_fk');
		$data['person_mob'] = $this->input->post('person_mob');
		$data['box_rqm_hesab'] = $this->input->post('box_rqm_hesab');
		$data['box_name'] = $this->input->post('box_name');
        /*
       recived_from 
person_name*/

        $var =time() + 5;
        if($var == true){
            $last_sanad_num   = $this->select_last_rkm();
        }

       $last_quod_num   = $this->selectLastQuodId(array('id!='=>0))+1;




		if(empty($id)){
		     $data['rqm_sanad']         = $last_sanad_num;
             $data['qued_rkm_id_fk']    = $last_quod_num;
			$data['date'] 		  	   = date('Y-m-d');
			$data['date_s'] 	  	   = strtotime(date('Y-m-d'));
			$data['publisher'] 	  	   = $_SESSION['user_id'];
			$this->db->insert('finance_sanad_qabd',$data);
		     /* $this->db->insert_id();
               $this->insert_Quods($last_sanad_num,$last_quod_num);*/
                 $last_id =$this->db->insert_id();
              $this->insert_Quods($last_sanad_num,$last_quod_num);
              return $last_id;
               

		}else{
			$this->db->where('id', $id);
			$this->db->update('finance_sanad_qabd',$data);
             $this->insert_Quods($saned,$rkm);
			return $id;
		}

	}
    
    public function get_bank_name($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('banks_settings');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }
    }
    
    

    public function insert_update_datails($id)
	{
		if($this->input->post('rqm_hesab')){
		  $this->db->where("rqm_sanad_fk",$this->getRkm_snad($id));
       $this->db->delete('finance_sanad_qabd_details'); 
          
          
			$count = count($this->input->post('rqm_hesab'));
			for ($i=0 ;$i < $count; $i++){
			//	$data['rqm_sanad_fk'] = $id;
			   $data['rqm_sanad_fk'] = $this->getRkm_snad($id);
   	           $data['rqm_sanad_id_fk'] = $id;
               
				$data['value'] = $this->input->post('value')[$i];
				$data['rqm_hesab'] = $this->input->post('rqm_hesab')[$i];
				$data['name_hesab'] = $this->input->post('name_hesab')[$i];
				$data['byan'] = $this->input->post('byan')[$i];
				
				$this->db->insert('finance_sanad_qabd_details',$data);
			}
		}
	}
    
    
    public function insert_sheek_details($id)
    {
        $this->db->where("rqm_sanad_id_fk", $id);
        $this->db->delete('finance_sanad_qabd_sheek');
        $count = count($this->input->post('sheek_num'));
        $cheque = $this->input->post('pay_method');
        if ($cheque == 2) {
            for ($i = 0; $i < $count; $i++) {
                $data2['rqm_sanad_id_fk'] = $id;
                $data2['rqm_sanad_fk'] = $this->input->post('rqm_sanad');
                $data2['sheek_num'] = $this->input->post('sheek_num')[$i];
                $data2['sheek_date'] = strtotime($this->input->post('sheek_date')[$i]);
                $data2['sheek_date_ar'] = $this->input->post('sheek_date')[$i];
                $data2['bank_id_fk'] = $this->input->post('bank_id_fk')[$i];
                $data2['bank_name'] = $this->get_bank_name($this->input->post('bank_id_fk')[$i]);

                $this->db->insert('finance_sanad_qabd_sheek', $data2);
            }
        }
    }
    
    
     public function getRkm_snad($id){
        $h = $this->db->get_where('finance_sanad_qabd', array('id'=>$id));
        return $h->row_array()['rqm_sanad'];
    }

	public function delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('finance_sanad_qabd');
	}


	public function delete_datails($id)
	{
		$this->db->where("rqm_sanad_id_fk",$id);
		$this->db->delete('finance_sanad_qabd_details');
	}

	public function get_hesab_data($id,$type){
		$this->db->select('rqm_hesab,name_hesab');
		$this->db->from("finance_box_setting");
		$this->db->where("tawred_method",$id);
		$this->db->where("type",$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;

	}



    public function get_pills_by_pill_num($id)
{

    $this->db->select('*');
    $this->db->from("finance_sanad_qabd_details");
    $this->db->where("rqm_sanad_fk",$id);
    $this->db->order_by("marg3_rkm_esal","asc");
    $this->db->group_by("marg3_rkm_esal");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $arr[] = $row->marg3_rkm_esal;
        }

        $this->db->select('value,about,bnd_type2_name,bnd_type1_name,bnd_type2,bnd_type1,person_name,pill_num,id');
        $this->db->from('fr_all_pills');
        $this->db->where_in('pill_num',$arr);
        $query2 = $this->db->get();
        if ($query2->num_rows() > 0) {
            $x=0;
            foreach ($query2->result() as $row){
                $data[$x] =  $row;
                $x++;}
            return$data;
        }else{
            return 0;
        }
    }else{
        return 0;
    }

}
/*********************************************/

  public function selectLastQuodId($where)
    {
        return $this->db->select('COALESCE(MAX(CAST(rkm AS UNSIGNED)),0) AS rkm')->where($where)->get('finance_quods')->row_array()['rkm'];
    }
    
    
    
    public function insert_Quods($sanad_id,$last_quod_num)
    {
        $this->db->where("rkm",$last_quod_num);
        $this->db->delete('finance_quods');
        $data['no3_qued'] = 5;
        $data['no3_qued_name'] = 'قيد سند قبض';
        $data['halet_qued'] = 2;
        $data['halet_qued_name'] = 'غير مرحل';
        $data['qued_date'] = strtotime($this->input->post('date_sanad'));
        $data['qued_date_ar'] = $this->input->post('date_sanad');
        $data['total_value'] = $this->input->post('total_value');

        $data['rkm'] = $last_quod_num;

        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);




        $data['date'] = date('Y-m-d');
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('finance_quods', $data);



        //details

        if ($this->input->post('rqm_hesab')) {

            $this->db->where("qued_rkm_fk",$last_quod_num);
            $this->db->delete('finance_quods_details');


            $count = count($this->input->post('rqm_hesab'));
            $maden_value = $this->input->post('value');

            $byan = $this->input->post('byan');


            for ($i = 0; $i < $count; $i++) {
                $details['qued_rkm_fk'] =  $last_quod_num;
                if(!empty($id)){
                    $details['qued_rkm_fk'] = $id;
                }
                if (!empty($maden_value[$i])) {
                    $details['maden'] = $maden_value[$i];
                } else {
                    $details['maden'] = 0;
                }
                if (!empty($dayen_value[$i])) {
                    $details['dayen'] = $dayen_value[$i];
                } else {
                    $details['dayen'] = 0;
                }
                $details['rkm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('name_hesab')[$i];
                $details['byan'] = $byan[$i];
                $details['marg3'] = $sanad_id;


                $details['date'] = strtotime($this->input->post('date_sanad'));
                $details['date_ar'] = ($this->input->post('date_sanad'));

                $this->db->insert('finance_quods_details', $details);
            }
            $details['qued_rkm_fk'] = $last_quod_num;
            $details['maden'] = 0;

            $details['dayen'] = $this->input->post('total_value');
            $details['marg3'] = $sanad_id;
            if($_POST['pay_method'] != 3){
                $details['rkm_hesab'] = $this->input->post('box_rqm_hesab');
                $details['hesab_name'] = $this->input->post('box_name');
            }

            $details['byan'] = '';



            $details['date'] = strtotime($this->input->post('date_sanad'));
            $details['date_ar'] = ($this->input->post('date_sanad'));

            $this->db->insert('finance_quods_details', $details);

        }
    }


    public function select_last_Quod_rkm(){
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
    /******************************************************************************/
    
    
    
    
     
   public function  get_all_qabds(){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $all_qabd=0;
            foreach ($query->result() as $row) {
                $all_qabd += $row->total_value;
            }
            return $all_qabd;
        }
        return 0;
    }  
    
    
    
       public function  get_all_sarf(){
        $this->db->select('*');
        $this->db->from("finance_sanad_sarf");
         $this->db->where("pay_method !=",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $all_sarf=0;
            foreach ($query->result() as $row) {
                $all_sarf += $row->total_value;
            }
            return $all_sarf;
        }
        return 0;
    }  
  
/********************************************************/  
   public function  get_all_qabds_naqdi(){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
         $this->db->where("pay_method",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $all_qabd=0;
            foreach ($query->result() as $row) {
                $all_qabd += $row->total_value;
            }
            return $all_qabd;
        }
        return 0;
    }    
    
       public function  get_all_qabds_sheek(){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
         $this->db->where("pay_method",2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $all_qabd=0;
            foreach ($query->result() as $row) {
                $all_qabd += $row->total_value;
            }
            return $all_qabd;
        }
        return 0;
    }  
/********************************************************/  
    
         public function  get_all_sarf_naqdi(){
        $this->db->select('*');
        $this->db->from("finance_sanad_sarf");
         $this->db->where("pay_method ",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $all_sarf=0;
            foreach ($query->result() as $row) {
                $all_sarf += $row->total_value;
            }
            return $all_sarf;
        }
        return 0;
    }  
    
       public function  get_all_sarf_sheek(){
        $this->db->select('*');
        $this->db->from("finance_sanad_sarf");
         $this->db->where("pay_method ",2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $all_sarf=0;
            foreach ($query->result() as $row) {
                $all_sarf += $row->total_value;
            }
            return $all_sarf;
        }
        return 0;
    }
   /****************************************************/ 
    
    public function getAllVouchQbdReports(){
        $method = array(
            1=>'نقدي',
            2=>'شيك '
        );
        $method2 = array(
            1=>'نقدي',
            2=>'شيك من الصندوق',
            3=>'شيك من البنك'
        );
        $from = strtotime($_POST['from']);
        $to = strtotime($_POST['to']);
        $place_supply = $_POST['place_supply'];
        $type_sand = $_POST['type_sand'];

		$this->db->select('*');
        $this->db->where("pay_method",$type_sand);
        $this->db->group_start()
           /* ->where("date_sanad <=",$from)
            ->or_group_start()
            ->where("date_sanad <=",$from)
            ->group_end()
            ->group_end();*/
            
            ->where("date_sanad >=",$from)
        ->where("date_sanad <=",$to)
           ->group_end();

		if($place_supply === "1") {
            $this->db->from("finance_sanad_qabd");
        }elseif($place_supply === "2"){
            $this->db->from("finance_sanad_sarf");
        }
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->delails = $this->getdetailsById($row->rqm_sanad);
				if($place_supply === "1"){
                    $data[$i]->pay_method_name = $method[$row->pay_method];
                }else{
                    $data[$i]->pay_method_name = $method2[$row->pay_method];
                }

			}
			return $query->result();
		}
			return false;

	}
    
    public function delete_datails_sheek($id)
    {
        $this->db->where("rqm_sanad_fk",$id);
        $this->db->delete('finance_sanad_qabd_sheek');
    }
    
    
    /*************************************************/
    
        public function get_all_pill_search($field,$valu){
        $this->db->select('*');
        $this->db->from('finance_sanad_qabd');
        if(!empty($valu)) {
            if ($field == 'recived_from' ||  $field == 'about') {
                $this->db->like($field, $valu , 'both');
            } else {
                $this->db->where($field, $valu);

            }
        }
        $query= $this->db->get();
        if ($query->num_rows()>0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i] = $row;

                $i++;
            }
            return $data ;
        }
        else{
            return false;
        }
    }


    public function getdetailsByarr($field,$valu){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_details");
        $this->db->like($field, $valu , 'both');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $details =$this->get_all_pill_search('rqm_sanad',$row->rqm_sanad_fk);
                $data[$i]->rqm_sanad = $details[0]->rqm_sanad;
                $data[$i]->person_name = $details[0]->person_name;
                $data[$i]->total_value = $row->value;
                $data[$i]->date_sanad_ar = $details[0]->date_sanad_ar;
                $data[$i]->pay_method = $details[0]->pay_method;

                $i++;
            }
            return $data ;



        }
        return false;

    }

    public function getsheekDetails($field,$valu){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_sheek");
        $this->db->where($field, $valu);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $details =$this->get_all_pill_search('rqm_sanad',$row->rqm_sanad_fk);
                $data[$i]->rqm_sanad = $details[0]->rqm_sanad;
                $data[$i]->person_name = $details[0]->person_name;
                $data[$i]->total_value = $details[0]->total_value;
                $data[$i]->date_sanad_ar = $details[0]->date_sanad_ar;
                $data[$i]->pay_method = $details[0]->pay_method;
                $i++;
            }
            return $data ;
        }
         return false;

    }
    
    
       public function findByRqm_sanad($rkm){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
        $this->db->where("rqm_sanad",$rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->delails = $this->getdetailsById($data->rqm_sanad);
            $data->pill_details = $this->get_pills_by_pill_num($data->rqm_sanad);
            $data->delails_cheque = $this->get_details_cheque($data->rqm_sanad);

            $data->attaches = $this->getAttachesByRkm($query->row()->rqm_sanad);

            return $data;
        }
        return false;

    }
 
  
  
    public function select_gehat(){

        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function insert_geha(){
        $data['name'] = $this->input->post('title');
        $data['title']= $this->input->post('geha_title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $data['date'] =date("Y-m-d");
        $this->db->insert('finance_gehat', $data);
    }

    public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_geah($id){


        $data['name']= $this->input->post('geha_title');
        $data['title']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $data['date']= date("Y-m-d");
        $this->db->where('id',$id);
        $this->db->update('finance_gehat',$data);
    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('finance_gehat');
    }  
  
 /**************************************/
   public function get_emp_assigns($code){
        $h = $this->db->get_where("hr_egraat_emp_setting", array('job_title_code_fk'=>$code,'person_suspend'=>1));
        return $h->row_array()['person_private_name'];
    }  
  
    
}

/* End of file Vouch_qbd_model.php */
/* Location: ./application/models/finance_accounting_model/box/vouch_qbd/Vouch_qbd_model.php */