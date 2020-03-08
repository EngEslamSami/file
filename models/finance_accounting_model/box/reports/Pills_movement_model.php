<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pills_movement_model extends CI_Model {
	public function chek_Null($post_value){
		if($post_value == '' || $post_value==null || (!isset($post_value))){
			$val='';
			return $val;
		}else{
			return $post_value;
		}
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






    public function GetSearchData($where){
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->where($where);
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
    
 /*********************************************************/
 /*  public function GetSearchpills_tabr3at(){
        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }

        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);
        }


        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));


        }
        $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }*/
    /* public function GetSearchpills_tabr3at(){


       $bnod = $this->select_fr_bnod_pills_setting_by_condition(
           array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
       $bnod_arr=array();
       foreach ($bnod as $row){

           $bnod_arr[]=$row->code;

       }
     
        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }

        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);
            $this->db->or_where('bnd_type2',$bnd_type1);
        }else{

            $this->db->where_in('bnd_type1',$bnod_arr);
            $this->db->or_where_in('bnd_type2',$bnod_arr);
        }


        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));


        }
        $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }*/
/*  public function GetSearchpills_tabr3at(){
        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');
        

          if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
     // if($this->input->post('pay_method'))
    //    {
      //      $this->db->where('pay_method',$pay_method);
     //   }
     
               
              if($this->input->post('pay_method'))
      {
          $this->db->where_in('pay_method', $this->input->post('pay_method'));

          $this->db->order_by('pay_method','ASC');
      }
        
        
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
       if($this->input->post('publisher'))
       {
           $this->db->where('publisher',$this->input->post('publisher'));
      }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);
        }

        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
     */
 /*  public function GetSearchpills_tabr3at(){


       $bnod = $this->select_fr_bnod_pills_setting_by_condition(
           array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
       $bnod_arr=array();
       foreach ($bnod as $row){

           $bnod_arr[]=$row->code;

       }


        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }

           if($this->input->post('from_date'))
           {
               $this->db->where('pill_date>=',$from_date);
           }
           if($this->input->post('to_date'))
           {
               $this->db->where('pill_date<=',$to_date);
           }

        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }

        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {

            $this->db->where('bnd_type1',$bnd_type1);
           $this->db->or_where('bnd_type2',$bnd_type1);
        }else{

            $this->db->where_in('bnd_type1',$bnod_arr);
          
        }


        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));


        }

        $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
    */
	
	
	
	   
     
  public function GetSearchpills(){
        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
        if($this->input->post('pay_method'))
        {
            $this->db->where('pay_method',$pay_method);
        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
       if($this->input->post('publisher'))
       {
           $this->db->where('publisher',$this->input->post('publisher'));
      }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);
        }

        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
    
     public function getALL_fr_all_pills()
    {
        $query = $this->db->select('*')->group_by('person_mob')
            ->get('fr_all_pills')->result_array();

        if (!empty($query)) {
            return $query;
        }
        return 0;
    }
    
    
    public function get_from_bnod($id)
    {
        $this->db->where('from_id',$id);
        $query=$this->db->get('fr_bnod_pills_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }else{
            return 'ÛíÑ ãÍÏÏ';
        }

    }   
   /******************************************************/
   
   
       public function GetSearchpills_groupby($field){
      //  $this->db->select('bnd_type1,value1,bnd_type2,value2,bnd_type1_name,bnd_type2_name');
               $this->db->select('bnd_type1,value1,bnd_type2,value2,bnd_type1_name,bnd_type2_name
        ,Sum(value1) as value_band');
       
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
       /* if($this->input->post('pay_method'))
        {
            $this->db->where('pay_method',$pay_method);
        }*/
           if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));
            $this->db->order_by('pay_method','ASC');
        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);
        }

        $this->db->from('fr_all_pills');
        $this->db->group_by($field);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
             //  $data[$x]->value_band=$this->get_value_band($row->$field);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }

    public function get_value_band($id)
    {
        $this->db->select_sum('value1');
        $this->db->where('bnd_type1',$id);
        $query=$this->db->get('fr_all_pills');
        if($query->num_rows()>0)
        {
            return $query->row()->value1;
        }else{
            return 0 ;
        }

    }
    /********************************************************/
    
    

     /*  public function get_first_band(){

           $all_band =$this->GetBandArray();


     $this->db->select('bnd_type1_name as band_name
        ,Sum(value1) as value_band  ,bnd_type1 as band_code');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
           $motbr3_name=$this->input->post('motbr3_name');
           $motbr3_jwal=$this->input->post('motbr3_jwal');


           if($this->input->post('motbr3_jwal'))
           {
               $this->db->where('person_mob',$motbr3_jwal);
           }


           if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }

           //if($field ==='bnd_type1'){
               if($this->input->post('bnd_type1') !='')
               {
                   $this->db->where('bnd_type1',$bnd_type1);
               }else{

                   $this->db->where_in('bnd_type1',$all_band);

               }
  


           $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type1');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
             //  $data[$x]->value_band=$this->get_value_band($row->$field);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
    */
  /*  public function get_second_band(){

        $all_band =$this->GetBandArray();

        $this->db->select('bnd_type2 as band_code,bnd_type2_name as band_name
        ,Sum(value2) as value_band ');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }

        //if($field ==='bnd_type1'){
        if($this->input->post('bnd_type1') !='')
        {
            $this->db->where('bnd_type1',$bnd_type1);
        }else{

            $this->db->where_in('bnd_type1',$all_band);

        }
        //}
      


        $this->db->where('bnd_type2 !=',0);
        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type2');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                //  $data[$x]->value_band=$this->get_value_band($row->$field);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
    */
  /*  public function getTotalBnod(){
        $data['first_band'] = $this->Pills_movement_model->get_first_band();
        $data['second_band'] = $this->Pills_movement_model->get_second_band();
        $Array_merge = array_merge($data['first_band'], $data['second_band']);
        $sort = array();
        for ($i = 0; $i < count($Array_merge); $i++) {
            $sort[] = $Array_merge[$i]->band_code;
        }
        array_multisort($sort, SORT_ASC,$Array_merge);

        $keyArray = [];
        foreach ($Array_merge as $entry) {
            $name = $entry->band_code;
            if(isset($keyArray[$name])) {
                $keyArray[$name] += $entry->value_band;
            } else {
                $keyArray[$name] = $entry->value_band;
            }
        }
        $resultArray = [];
        foreach ($keyArray as $key => $value) {
          $name=$this->getBandName($key);
            $resultArray[] = ["band_code" => $key, "value_band" => $value,"band_name" =>$name];

        }

        return $resultArray;


    }*/
    
   /*  public function getTotalBnod(){
        $data['first_band'] = $this->Pills_movement_model->get_first_band();
        $data['second_band'] = $this->Pills_movement_model->get_second_band();
        $Array_merge = array_merge($data['first_band'], $data['second_band']);
if(!empty($Array_merge)){
        $sort = array();
        for ($i = 0; $i < count($Array_merge); $i++) {
            $sort[] = $Array_merge[$i]->band_code;
        }
        array_multisort($sort, SORT_ASC,$Array_merge);

        $keyArray = [];
        foreach ($Array_merge as $entry) {
            $name = $entry->band_code;
            if(isset($keyArray[$name])) {
                $keyArray[$name] += $entry->value_band;
            } else {
                $keyArray[$name] = $entry->value_band;
            }
        }
        $resultArray = [];
        foreach ($keyArray as $key => $value) {
          $name=$this->getBandName($key);
            $resultArray[] = ["band_code" => $key, "value_band" => $value,"band_name" =>$name];

        }
      if(!empty($resultArray)){

          return $resultArray;
      }else{
          return false;
      }

}
    }
    */
    
 	
	
   /* public function get_first_band(){


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
        $bnod_arr=array();
        foreach ($bnod as $row){

            $bnod_arr[]=$row->code;

        }

     $this->db->select('bnd_type1_name as band_name
        ,Sum(value1) as value_band  ,bnd_type1 as band_code');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
           $motbr3_name=$this->input->post('motbr3_name');
           $motbr3_jwal=$this->input->post('motbr3_jwal');


           if($this->input->post('motbr3_jwal'))
           {
               $this->db->where('person_mob',$motbr3_jwal);
           }

        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }


        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }


        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);

        }else{
            $this->db->where('fe2a_type1',$fe2a_type1);
            $this->db->where_in('bnd_type1',$bnod_arr);

        }

        $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type1');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
             //  $data[$x]->value_band=$this->get_value_band($row->$field);


                $x++;}
            return $data;
        }else{
            return false;
        }

    }
*/

   /* public function get_second_band(){


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
        $bnod_arr=array();
        foreach ($bnod as $row){

            $bnod_arr[]=$row->code;

        }

        $this->db->select('pill_date,bnd_type2 as band_code,bnd_type2_name as band_name
        ,Sum(value2) as value_band ');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date >=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date <=',$to_date);
        }


        if($this->input->post('place_supply'))
         {
             $this->db->where('place_supply',$place_supply);
         }
         if($this->input->post('pill_type'))
         {
             $this->db->where('pill_type',$pill_type);

         }
        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }



        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type2',$bnd_type1);
        }else{
            $this->db->where('fe2a_type1',$fe2a_type1);
            $this->db->where_in('bnd_type2',$bnod_arr);

        }

        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type2');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    } */  
    
    
      public function getTotalBnod(){
        $data['first_band'] = $this->get_first_band();
        $data['second_band'] = $this->get_second_band();


if( empty($data['first_band']) ){
$Array_merge = $data['second_band'];	
}elseif(empty($data['second_band'])){
$Array_merge = $data['first_band'];	
}elseif(!empty($data['first_band']) && !empty($data['second_band'])){
$Array_merge = array_merge($data['first_band'], $data['second_band']);	
}

if(!empty($Array_merge)){
        $sort = array();
        for ($i = 0; $i < count($Array_merge); $i++) {
            $sort[] = $Array_merge[$i]->band_code;
        }
        array_multisort($sort, SORT_ASC,$Array_merge);

        $keyArray = [];
        foreach ($Array_merge as $entry) {
            $name = $entry->band_code;
            if(isset($keyArray[$name])) {
                $keyArray[$name] += $entry->value_band;
            } else {
                $keyArray[$name] = $entry->value_band;
            }
        }
        $resultArray = [];
        foreach ($keyArray as $key => $value) {
          $name=$this->getBandName($key);
            $resultArray[] = ["band_code" => $key, "value_band" => $value,"band_name" =>$name];

        }
      if(!empty($resultArray)){

          return $resultArray;
      }else{
          return false;
      }

}
    }
    
    
    public function getBandName($code){

        $this->db->select('*');
        $this->db->from('fr_bnod_pills_setting');
        $this->db->where('code',$code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->title;
        }else{
            return false;
        }



    }
    public function GetBandArray(){
        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }
        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }

        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);
        }


        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

            $this->db->order_by('pay_method','ASC');
        }
        $this->db->group_by('bnd_type1');
        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row->bnd_type1;
               // $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
  /*************************************/ 
   
  /* public function GetSearchpills_tabr3at(){


       $bnod = $this->select_fr_bnod_pills_setting_by_condition(
           array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
       $bnod_arr=array();
       foreach ($bnod as $row){

           $bnod_arr[]=$row->code;

       }


        $this->db->select('*');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }

           if($this->input->post('from_date'))
           {
               $this->db->where('pill_date>=',$from_date);
           }
           if($this->input->post('to_date'))
           {
               $this->db->where('pill_date<=',$to_date);
           }

        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }

        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }
        if($this->input->post('fe2a_type1'))
        {
            $this->db->where('fe2a_type1',$fe2a_type1);
        }
        if($this->input->post('bnd_type1'))
        {

            $this->db->where('bnd_type1',$bnd_type1);
           $this->db->or_where('bnd_type2',$bnd_type1);
        }else{

            $this->db->where_in('bnd_type1',$bnod_arr);
            //$this->db->or_where_in('bnd_type2',$bnod_arr);
        }


        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));


        }

        $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name=$this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
*/	
	
	
	
    public function GetSearchpills_tabr3at()
    {
     if($this->input->post('bnd_type1')){
         $first_records =$this->getTabr3atByBand($this->input->post('bnd_type1'),'first');
         $second_records =$this->getTabr3atByBand($this->input->post('bnd_type1'),'second');

         if (empty($first_records)) {
             $Array_merge = $second_records;
         } elseif (empty($second_records)) {
             $Array_merge = $first_records;
         } elseif (!empty($first_records) && !empty($second_records)) {
             $Array_merge = array_merge($first_records, $second_records);
         }
         return$Array_merge;

     }else{

         return $this->getTabr3atWithoutBand();
     }


    }	
	
	
  /*  public function get_first_band(){


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
        $bnod_arr=array();
        foreach ($bnod as $row){

            $bnod_arr[]=$row->code;

        }

     $this->db->select('bnd_type1_name as band_name
        ,Sum(value1) as value_band  ,bnd_type1 as band_code');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
           $motbr3_name=$this->input->post('motbr3_name');
           $motbr3_jwal=$this->input->post('motbr3_jwal');


           if($this->input->post('motbr3_jwal'))
           {
               $this->db->where('person_mob',$motbr3_jwal);
           }

        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date>=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date<=',$to_date);
        }


        if($this->input->post('place_supply'))
        {
            $this->db->where('place_supply',$place_supply);
        }
        if($this->input->post('pill_type'))
        {
            $this->db->where('pill_type',$pill_type);

        }
        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }


        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type1',$bnd_type1);

        }else{
            $this->db->where('fe2a_type1',$fe2a_type1);
            $this->db->where_in('bnd_type1',$bnod_arr);

        }

        $this->db->order_by('pill_num','ASC');
        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type1');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
             //  $data[$x]->value_band=$this->get_value_band($row->$field);


                $x++;}
            return $data;
        }else{
            return false;
        }

    }
*/
    public function get_first_band()
    {


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band' => 0, 'fe2a' => $_POST['fe2a_type1']));
        if(!empty($bnod)){
        $bnod_arr = array();
        foreach ($bnod as $row) {

            $bnod_arr[] = $row->code;

        }
        }
        $this->db->select('bnd_type1_name as band_name
        ,Sum(value1) as value_band  ,bnd_type1 as band_code');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $place_supply = $this->input->post('place_supply');
        $pill_type = $this->input->post('pill_type');
        $pay_method = $this->input->post('pay_method');
        $fe2a_id_fk = $this->input->post('fe2a_id_fk');
        $erad_type = $this->input->post('erad_type');
        $fe2a_type1 = $this->input->post('fe2a_type1');
        $bnd_type1 = $this->input->post('bnd_type1');
        $motbr3_name = $this->input->post('motbr3_name');
        $motbr3_jwal = $this->input->post('motbr3_jwal');


        if ($this->input->post('motbr3_jwal')) {
            $this->db->where('person_mob', $motbr3_jwal);
        }

        if ($this->input->post('from_date')) {
            $this->db->where('pill_date>=', $from_date);
        }
        if ($this->input->post('to_date')) {
            $this->db->where('pill_date<=', $to_date);
        }


       if ($this->input->post('place_supply')) {
            $this->db->where('place_supply', $place_supply);
        }
        if ($this->input->post('pill_type')) {
            $this->db->where('pill_type', $pill_type);

        }
        if ($this->input->post('pay_method')) {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if ($this->input->post('fe2a_id_fk')) {
            $this->db->where('fe2a_id_fk', $fe2a_id_fk);
        }
        if ($this->input->post('publisher')) {
            $this->db->where('publisher', $this->input->post('publisher'));
        }


        if ($this->input->post('bnd_type1')) {
            $this->db->where('bnd_type1', $bnd_type1);

        } elseif(!empty($fe2a_type1)) {
            $this->db->where('fe2a_type1', $fe2a_type1);
            if(!empty($bnod_arr)) {
                $this->db->where_in('bnd_type1', $bnod_arr);
            }
        }
         $this->db->where('bnd_type1 !=', 0);
        $this->db->order_by('pill_num', 'ASC');
        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type1');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                //  $data[$x]->value_band=$this->get_value_band($row->$field);


                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }
    public function get_second_band()
    {


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band' => 0, 'fe2a' => $_POST['fe2a_type1']));
        if(!empty($bnod)) {
            $bnod_arr = array();
            foreach ($bnod as $row) {

                $bnod_arr[] = $row->code;

            }
        }

        $this->db->select('pill_date,bnd_type2 as band_code,bnd_type2_name as band_name
        ,Sum(value2) as value_band ');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $place_supply = $this->input->post('place_supply');
        $pill_type = $this->input->post('pill_type');
        $pay_method = $this->input->post('pay_method');
        $fe2a_id_fk = $this->input->post('fe2a_id_fk');
        $erad_type = $this->input->post('erad_type');
        $fe2a_type1 = $this->input->post('fe2a_type1');
        $bnd_type1 = $this->input->post('bnd_type1');
        $motbr3_name = $this->input->post('motbr3_name');
        $motbr3_jwal = $this->input->post('motbr3_jwal');


        if ($this->input->post('motbr3_jwal')) {
            $this->db->where('person_mob', $motbr3_jwal);
        }


        if ($this->input->post('from_date')) {
            $this->db->where('pill_date >=', $from_date);
        }
        if ($this->input->post('to_date')) {
            $this->db->where('pill_date <=', $to_date);
        }


        if ($this->input->post('place_supply')) {
            $this->db->where('place_supply', $place_supply);
        }
        if ($this->input->post('pill_type')) {
            $this->db->where('pill_type', $pill_type);

        }
        if ($this->input->post('pay_method')) {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if ($this->input->post('fe2a_id_fk')) {
            $this->db->where('fe2a_id_fk', $fe2a_id_fk);
        }
        if ($this->input->post('publisher')) {
            $this->db->where('publisher', $this->input->post('publisher'));
        }


        if ($this->input->post('bnd_type1')) {
            $this->db->where('bnd_type2', $bnd_type1);
        } elseif( !empty($fe2a_type1)){
            $this->db->where('fe2a_type1', $fe2a_type1);
            if(!empty($bnod_arr)) {
                $this->db->where_in('bnd_type2', $bnod_arr);
            }
        }
      $this->db->where('bnd_type2 !=', 0);
        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type2');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;

                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }

  /*  public function get_second_band(){


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
        $bnod_arr=array();
        foreach ($bnod as $row){

            $bnod_arr[]=$row->code;

        }

        $this->db->select('pill_date,bnd_type2 as band_code,bnd_type2_name as band_name
        ,Sum(value2) as value_band ');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        $place_supply=$this->input->post('place_supply');
        $pill_type=$this->input->post('pill_type');
        $pay_method=$this->input->post('pay_method');
        $fe2a_id_fk=$this->input->post('fe2a_id_fk');
        $erad_type=$this->input->post('erad_type');
        $fe2a_type1=$this->input->post('fe2a_type1');
        $bnd_type1=$this->input->post('bnd_type1');
        $motbr3_name=$this->input->post('motbr3_name');
        $motbr3_jwal=$this->input->post('motbr3_jwal');


        if($this->input->post('motbr3_jwal'))
        {
            $this->db->where('person_mob',$motbr3_jwal);
        }


        if($this->input->post('from_date'))
        {
            $this->db->where('pill_date >=',$from_date);
        }
        if($this->input->post('to_date'))
        {
            $this->db->where('pill_date <=',$to_date);
        }


        if($this->input->post('place_supply'))
         {
             $this->db->where('place_supply',$place_supply);
         }
         if($this->input->post('pill_type'))
         {
             $this->db->where('pill_type',$pill_type);

         }
        if($this->input->post('pay_method'))
        {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        if($this->input->post('fe2a_id_fk'))
        {
            $this->db->where('fe2a_id_fk',$fe2a_id_fk);
        }
        if($this->input->post('publisher'))
        {
            $this->db->where('publisher',$this->input->post('publisher'));
        }



        if($this->input->post('bnd_type1'))
        {
            $this->db->where('bnd_type2',$bnd_type1);
        }else{
            $this->db->where('fe2a_type1',$fe2a_type1);
            $this->db->where_in('bnd_type2',$bnod_arr);

        }

        $this->db->from('fr_all_pills');
        $this->db->group_by('bnd_type2');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
*/

    
      public function getTabr3atByBand($bnd_type1,$type)
    {
        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band' => 0, 'fe2a' => $_POST['fe2a_type1']));
        if (!empty($bnod)) {
            $bnod_arr = array();
            foreach ($bnod as $row) {
                $bnod_arr[] = $row->code;
            }
        }
        $this->db->select('*');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $place_supply = $this->input->post('place_supply');
        $pill_type = $this->input->post('pill_type');
        $pay_method = $this->input->post('pay_method');
        $fe2a_id_fk = $this->input->post('fe2a_id_fk');
        $erad_type = $this->input->post('erad_type');
        $fe2a_type1 = $this->input->post('fe2a_type1');
       // $bnd_type1 = $this->input->post('bnd_type1');
        $motbr3_name = $this->input->post('motbr3_name');
        $motbr3_jwal = $this->input->post('motbr3_jwal');
        
     /*  $from_time = strtotime($this->input->post('from_time'));  
       $to_time = strtotime($this->input->post('to_time'));  
      
       if ($this->input->post('from_time')) {
            $this->db->where('date_s>=', $from_time);
        }
        if ($this->input->post('to_time')) {
            $this->db->where('date_s<=', $to_time);
        } */ 
     
     
if ($this->input->post('from_time')) {
  $this->db->where('pill_time >=', strtotime($this->input->post('from_time')));
      }

           if ($this->input->post('to_time')) {
            $this->db->where('pill_time <=', strtotime($this->input->post('to_time')));
                        }
        
        if ($this->input->post('motbr3_jwal')) {
            $this->db->where('person_mob', $motbr3_jwal);
        }
        if ($this->input->post('from_date')) {
            $this->db->where('pill_date>=', $from_date);
        }
        if ($this->input->post('to_date')) {
            $this->db->where('pill_date<=', $to_date);
        }
        if ($this->input->post('place_supply')) {
            $this->db->where('place_supply', $place_supply);
        }
        if ($this->input->post('pill_type')) {
            $this->db->where('pill_type', $pill_type);
        }
        if ($this->input->post('fe2a_id_fk')) {
            $this->db->where('fe2a_id_fk', $fe2a_id_fk);
        }
        if ($this->input->post('publisher')) {
            $this->db->where('publisher', $this->input->post('publisher'));
        }
        if ($this->input->post('fe2a_type1')) {
            $this->db->where('fe2a_type1', $fe2a_type1);
        }
        if (!empty($bnd_type1)) {
               if($type ==='first'){
                   $this->db->where('bnd_type1', $bnd_type1);
               }elseif ($type ==='second'){

                   $this->db->where('bnd_type2', $bnd_type1);
               }
            //$this->db->or_where('bnd_type2', $bnd_type1);
        } else{
            if (!empty($bnod_arr)) {
                $this->db->where_in('bnd_type1', $bnod_arr);
                //$this->db->or_where_in('bnd_type2',$bnod_arr);
            }
        }
        if ($this->input->post('pay_method')) {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));
        }
        $this->db->order_by('pill_num', 'ASC');
        $this->db->from('fr_all_pills');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name = $this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }
    public function getTabr3atWithoutBand()
    {


        $bnod = $this->select_fr_bnod_pills_setting_by_condition(
            array('band' => 0, 'fe2a' => $_POST['fe2a_type1']));

        if (!empty($bnod)) {
            $bnod_arr = array();
            foreach ($bnod as $row) {

                $bnod_arr[] = $row->code;

            }
        }

        $this->db->select('*');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $place_supply = $this->input->post('place_supply');
        $pill_type = $this->input->post('pill_type');
        $pay_method = $this->input->post('pay_method');
        $fe2a_id_fk = $this->input->post('fe2a_id_fk');
        $erad_type = $this->input->post('erad_type');
        $fe2a_type1 = $this->input->post('fe2a_type1');
       // $bnd_type1 = $this->input->post('bnd_type1');
        $motbr3_name = $this->input->post('motbr3_name');
        $motbr3_jwal = $this->input->post('motbr3_jwal');


        if ($this->input->post('motbr3_jwal')) {
            $this->db->where('person_mob', $motbr3_jwal);
        }

        if ($this->input->post('from_date')) {
            $this->db->where('pill_date>=', $from_date);
        }
        if ($this->input->post('to_date')) {
            $this->db->where('pill_date<=', $to_date);
        }

        if ($this->input->post('place_supply')) {
            $this->db->where('place_supply', $place_supply);
        }
        if ($this->input->post('pill_type')) {
            $this->db->where('pill_type', $pill_type);

        }

        if ($this->input->post('fe2a_id_fk')) {
            $this->db->where('fe2a_id_fk', $fe2a_id_fk);
        }
        if ($this->input->post('publisher')) {
            $this->db->where('publisher', $this->input->post('publisher'));
        }
        if ($this->input->post('fe2a_type1')) {
            $this->db->where('fe2a_type1', $fe2a_type1);
        }


            if (!empty($bnod_arr)) {
                $this->db->where_in('bnd_type1', $bnod_arr);
                //$this->db->or_where_in('bnd_type2',$bnod_arr);
            }



        if ($this->input->post('pay_method')) {
            $this->db->where_in('pay_method', $this->input->post('pay_method'));

        }
        
        
        if ($this->input->post('from_time')) {
        $this->db->where('pill_time >=', strtotime($this->input->post('from_time')));
        }
        if ($this->input->post('to_time')) {
        $this->db->where('pill_time <=', strtotime($this->input->post('to_time')));
        }

        $this->db->order_by('pill_num', 'ASC');
        $this->db->from('fr_all_pills');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_name = $this->get_from_bnod($row->pill_type);

                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }  
    
     
}

