 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class ReplayModel extends CI_Model {
   	public function __construct()
        {
                parent::__construct();
                 // Your own constructor code
         } 
 	private $Table = 'replay_email';
	
 
	public function SendTxtMessage($data){
  		$res = $this->db->insert($this->Table, $data ); 
 		if($res == 1)
 			return true;
 		else
 			return false;
	}
	public function GetReciverChatHistory($receiver_id,$email_rkm){
		if($_SESSION['role_id_fk']==3)
		{
			$sender_id=$_SESSION['emp_code'];
		}
		else
		{
			$sender_id = $_SESSION['user_id'];
			
		}
		
		
		//SELECT * FROM `chat` WHERE `sender_id`= 197 AND `receiver_id` = 184 OR `sender_id`= 184 AND `receiver_id` = 197
		$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' AND `email_rkm` = '$email_rkm' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id' AND `email_rkm` = '$email_rkm'";
		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where($condition);
		//$this->db->where('email_rkm',$email_rkm);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
	}
 	public function GetReciverMessageList($receiver_id,$email_rkm){
  		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where('receiver_id',$receiver_id);
		$this->db->where('email_rkm',$email_rkm);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
		 
	}
	
	
	public function TrashById($receiver_id,$email_rkm)
	{  
 		$res = $this->db->where('email_rkm',$email_rkm)->delete($this->Table, ['receiver_id' => $receiver_id] ); 
		if($res == 1)
			return true;
		else
			return false;
	 }	

	//  yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	    public function total_rows($email_rkm)
        {

			$this->db->like('id', NULL);
			$this->db->where('email_rkm',$email_rkm);
			if($_SESSION['role_id_fk']==3)
			{
				$this->db->where('receiver_id', $_SESSION['emp_code']);
			}
			else
			{
				$this->db->where('receiver_id', $_SESSION['user_id']);
			}
			
            $this->db->where('seen', 0);
            $this->db->from('replay_email');
            return $this->db->count_all_results();
		}
		public function get_new_chat($email_rkm)
        {
			
			if($_SESSION['role_id_fk']==3)
			{
				$this->db->where('receiver_id', $_SESSION['emp_code']);
			}
			else
			{
				$this->db->where('receiver_id', $_SESSION['user_id']);
			}
			$this->db->where('email_rkm',$email_rkm);
            $this->db->where('seen', 0);
            $this->db->from('replay_email');
            return $this->db->get()->result();
        }

        public function update_seen_chat($sender_id,$email_rkm)
        {
			if($_SESSION['role_id_fk']==3)
		{
			$receiver_id=$_SESSION['emp_code'];
		}
		else
		{
			$receiver_id = $_SESSION['user_id'];
			
		}
		
            $data['seen'] = 1;
		
			$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' AND `email_rkm` = '$email_rkm'";
	
		$this->db->where($condition)->update('replay_email', $data);
				
			

		}
		
		public function total_rows_notifi()
        {

			$this->db->like('id', NULL);
			
			if($_SESSION['role_id_fk']==3)
			{
				$this->db->where('receiver_id', $_SESSION['emp_code']);
			}
			else
			{
				$this->db->where('receiver_id', $_SESSION['user_id']);
			}
			
			$this->db->where('seen', 0);
			$this->db->limit(1);
            $this->db->from('replay_email');
            return $this->db->count_all_results();
		}
		public function get_new_chat_notifi()
        {
			
			if($_SESSION['role_id_fk']==3)
			{
				$this->db->where('receiver_id', $_SESSION['emp_code']);
			}
			else
			{
				$this->db->where('receiver_id', $_SESSION['user_id']);
			}
		
			$this->db->where('seen', 0);
			$this->db->limit(1);
            $this->db->from('replay_email');
            return $this->db->get()->result();
        }
	 





 }