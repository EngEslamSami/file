<?php
class Notification extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();
      

    }


    public function insert_token($table,$token,$user_id)
    {
        $num=$this->get_num_rows($table,$user_id);
        if($num==0){
            $data['user_id']=$user_id;
            $data['token']=$token;
            $data['date']=date("Y/m/d");
            $this->db->insert($table,$data);

        }else{
            $data_update['token']=$token;
            $this->db->where('user_id',$user_id);
            $this->db->update($table,$data_update);
        }
        $data2['is_logged']=1;
        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->update('users',$data2);
    }

    public function get_num_rows($table,$user_id)
    {

        $this->db->where('user_id',$user_id);
        $query= $this->db->get($table);
        return $query->num_rows();
    }
    




    public function get_token_by_id($user_id)
    {
        $this->db->select('token');
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('tokens');
        if($query->num_rows()>0)
        {
            $data=array();
            foreach($query->result() as $row){

                $data[]=$row->token;
            }
            return $data;

        }else{
            return false;
        }

    }

    public function insert_notify($user_id,$text,$type)
    {
        $data['notify_id_fk']=$user_id;
        $data['type']=$type;
        $data['message']=$text;
        $data['date']=date("Y-m-d h-i-s");
        $data['approved']=0;
        $this->db->insert('users_notifications',$data);


    }

    public function get_user_logged($user_id)
    {
        $this->db->where('user_id',$user_id);
       $query= $this->db->get('users');
        if($query->num_rows()>0)
        {
            return $query->row()->is_logged;
        }


    }
    
       public function get_user_notification()
    {

        $this->db->where('notify_id_fk',$_SESSION['user_id']);
        $this->db->order_by('id','desc');
        $query=$this->db->get('users_notifications');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    } 
    
    
     public function get_user_header_notification($type)
    {
        $this->db->where('type',$type);
        $this->db->where('notify_id_fk',$_SESSION['user_id']);
        $this->db->where('approved',0);
        $query=$this->db->get('users_notifications');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    public function update_notification()
    {
        $data['approved']=1;
        $this->db->where('notify_id_fk',$_SESSION['user_id']);
        $this->db->update('users_notifications',$data);
    }

}







    ?>