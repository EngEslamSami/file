<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class UserModel extends CI_Model {



  	public function __construct()

        {

                parent::__construct();

                // Your own constructor code

        }

	

	private $User = 'users';

 

	

  	public function GetUserData()

	{  

 		$this->db->select('*');

		$this->db->from($this->User);

	//	$this->db->where("user_id",$this->session->userdata['Admin']['user_id']);

		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }

   	}

	public function IfExistEmail($email){

		 

		 $this->db->select('user_id, email'); 

		 $this->db->from($this->User);

		 $this->db->where('email', $email);

		 $query = $this->db->get();

		 if ($query->num_rows() != 0) {

			  return $query->row_array();

		 } else {

			 return false;

		 }

	}

	

	public function PictureUrl()

	{  

 		$this->db->select('user_id,user_photo');

		$this->db->from($this->User);

	//	$this->db->where("user_id",$this->session->userdata['Admin']['user_id']);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

		if(!empty($res['user_photo'])){

			return base_url('uploads/profiles/'.$res['user_photo']);

		}else{

			return base_url('public/images/user-icon.jpg');

		}

   	}

	public function PictureUrlByuser_id($user_id)

	{  

 		$this->db->select('user_id,user_photo');

		$this->db->from($this->User);

		$this->db->where("user_id",$user_id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

		if(!empty($res['user_photo'])){

			return base_url('uploads/profiles/'.$res['user_photo']);

		}else{

			return base_url('public/images/user-icon.jpg');

		}

   	}

	

	

/*	public function GetName($user_id)

	{  

 		$this->db->select('user_id,user_name');

		$this->db->from($this->User);

		$this->db->where("user_id",$user_id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['user_name'];

		 

   	}
	*/
       public function GetName($user_id)
    {
        $this->db->select('user_id,user_name,emp_name');
        $this->db->from($this->User);
        $this->db->where("user_id", $user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['emp_name'];
    }
	public function Getuser_idByName($name)

	{  

 		$this->db->select('user_id,name');

		$this->db->from($this->User);

		$this->db->where("name",$name);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['user_id'];

		 

   	}

	

	public function GetUserAddress($user_id)

	{  

 		$this->db->select('user_id,email,mobile_no,address,address_2,city,state,pincode,language');

		$this->db->from($this->User);

		$this->db->where("user_id",$user_id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res;

		 

   	}

	

	

	

	

	public function UpdateProfileImageByID($data)

	{  

 		$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['Admin']['id'] ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	public function UpdateCustomerProfileImageByID($data)

	{  

 		$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['User']['id'] ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	 public function GetUserDataById($id) 

	{  

 		$this->db->select('id,name,first_name,last_name,email,about,mobile_no,address,address_2,state,city,country,user_photo,pincode');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }

   	}

	

	public function GetMemberNameById($id) 

	{  

 		$this->db->select('user_id,name');

		$this->db->from($this->User);

		$this->db->where("user_id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

 		$u=$query->row_array();

		return $u['name'];

		  

   	}

	

	public function AddMember($data)

	{  

		$res = $this->db->insert($this->User,$data);

		if($res == 1)

			return $this->db->insert_id();

		else

			return false;	

  	}

	

	

	

	public function StatusUpdateByID($user_id,$status)

	{  

 

 		$res = $this->db->update($this->User,['status' => $status],['id' => $user_id ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	

	public function TrashByID($user_id)

	{  

 

 		$res = $this->db->delete($this->User,['id' => $user_id ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

 

 

 	public function AllRoleTypes() 

	{  

 		$this->db->select('user_id,user_name');

		$this->db->from($this->User);

	//	$this->db->where("role",$role);

   		$query = $this->db->get();

 		$u=$query->num_rows();

		return $u;

		  

   	}

	

	public function VendorsList() 

	{  

 		$this->db->select('id,name,user_photo');

		$this->db->from($this->User);

		$this->db->where("role","Vendor");

		$this->db->where("status","1");

   		$query = $this->db->get();

 		$r=$query->result_array();

		return $r;

   	}
    public function ClientsListCs()
    {
        $this->db->select('user_id,user_name,user_photo');
        $this->db->from($this->User);
        $this->db->order_by('emp_code', 'asc');
        //$this->db->where("role","Client_cs");
        $this->db->where("approved", "1");
        $this->db->where("user_id !=", "73");
        $this->db->where("user_id !=", "19");
        $this->db->where("role_id_fk", "3");
        $this->db->where("user_id!=", $_SESSION['user_id']);
        $query = $this->db->get();
        $r = $query->result_array();
        return $r;
    }
/*	public function ClientsListCs() 
	{  
 		$this->db->select('user_id,user_name,user_photo');

		$this->db->from($this->User);
        $this->db->order_by('emp_code','asc');

		//$this->db->where("role","Client_cs");

		$this->db->where("approved","1");
 	    $this->db->where("user_id !=","73");
         $this->db->where("user_id !=","19");
         
   		$query = $this->db->get();

 		$r=$query->result_array();

		return $r;

	   }*/
	   
	  /* public function PictureUrlById($id){  
			$this->db->select('user_id,user_photo');
		   $this->db->from($this->User);
		   $this->db->where("user_id",$id);
		   $this->db->limit(1);
			 $query = $this->db->get();
		   $res = $query->row_array();
		   if(!empty($res['user_photo'])){
			   return base_url('uploads/attachment/'.$res['user_photo']);
		   }else{
			   return base_url('public/images/user-icon.jpg');
		   }
		  }*/


    public function PictureUrlById($id)
    {
        $this->db->select('user_id,user_photo,role_id_fk,emp_code,emp_photo');
        $this->db->from($this->User);
        $this->db->where("user_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['role_id_fk']) && ($res['role_id_fk'] == 3)) {
//            $user_photoo = $this->get_employee_photo($res['emp_code']);
//            return base_url('uploads/human_resources/emp_photo/thumbs/' . $user_photoo->personal_photo);
            return base_url('uploads/human_resources/emp_photo/thumbs/' . $res['emp_photo']);
        } else if (!empty($res['role_id_fk']) && ($res['role_id_fk'] == 1)) {
            return base_url('asisst/admin_asset/img/avatar5.png');
        } else {
            return base_url('uploads/attachment/user.png');
        }
    }
	  /* public function PictureUrlById($id)
	   {  
			$this->db->select('user_id,user_photo,role_id_fk,emp_code');
		   $this->db->from($this->User);
		   $this->db->where("user_id",$id);
		  $this->db->limit(1);
			 $query = $this->db->get();
		   $res = $query->row_array();
		    if(!empty($res['role_id_fk'])&&($res['role_id_fk']==3)){
			$user_photoo= $this->get_employee_photo($res['emp_code']);
			//print_r($user_photoo);
			return base_url('uploads/human_resources/emp_photo/thumbs/'.$user_photoo->personal_photo);
		   }
		   else if(!empty($res['role_id_fk'])&&($res['role_id_fk']==1)){
			return base_url('asisst/admin_asset/img/avatar5.png');
		   }
		   else{
			   return base_url('uploads/attachment/user.png');
		   }

		}*/	
	/*	public function NameById($id)
		{  
			 $this->db->select('user_id,user_name,role_id_fk,emp_code');
			$this->db->from($this->User);
			$this->db->where("user_id",$id);
		   $this->db->limit(1);
			  $query = $this->db->get();
			$res = $query->row_array();
			 if(!empty($res['role_id_fk'])&&($res['role_id_fk']==3)){
			 $user_name= $this->get_employee_photo($res['emp_code']);
			 //print_r($user_photoo);
			 return $user_name->employee;
			}
			else {
			 return $res['user_name'];
			}
			
		 }*/
    public function NameById($id)
    {
        $this->db->select('user_id,user_name,role_id_fk,emp_code,emp_photo,emp_name');
        $this->db->from($this->User);
        $this->db->where("user_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['role_id_fk']) && ($res['role_id_fk'] == 3)) {
//            $user_name = $this->get_employee_photo($res['emp_code']);
//            return $user_name->employee;
            return $res['emp_name'];
        } else {
            return $res['user_name'];
        }
    }
		  public function get_employee_photo($f_id)
        {
            $this->db->select('personal_photo,employee');
            $this->db->from('employees');
            $this->db->where("id", $f_id);
            $query = $this->db->get()->row();
            return $query;
        }


	

 }

