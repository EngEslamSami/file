<?php
class Email extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

   
public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}
public function get_last_id()
{
    $this->db->select('id');
    $this->db->order_by('id','desc');
    $query=$this->db->get('email_inbox');
    if($query->num_rows()>0)
    {
        return $query->row()->id+1 ;
    }else{
        return 1;
    }

}
    
        public function insert()
        {
          
            if($_SESSION['role_id_fk']==1){

                $data['email_from_id']=$_SESSION['user_id'];
                $data['email_from_n']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['email_from_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['email_from_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['email_from_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
      //   $data['email_to_n']=$this->input->post('to_user_n');
      //   $data['email_to_id']=$this->input->post('to_user_id');
      $data['email_rkm']=$this->select_last_email();
           // $data['email_motbaa_n']=$this->input->post('motb3a_user_n');
         //   $data['email_motbaa_id']=$this->input->post('motb3a_user_id');
          //  $data['email_etlaa_n']=$this->input->post('etlaa_user_n');
//$data['email_etlaa_id']=$this->input->post('etlaa_user_id');
            $data['need_replay']=$this->input->post('need_replay');
            $data['important_degree']=$this->input->post('important_degree');
            $data['title']=$this->input->post('title');
               $data['content']=$this->input->post('content');

              










       $data['date']= strtotime(date("Y-m-d"));
       $data['date_ar'] = date('Y-m-d H:i:s');
       $data['sent'] = 1;

       $x= $this->input->post('to_user_fk');
       $y=$this->input->post('to_user_fk_name');
       $h=$this->input->post('type');
       if(   $x!=null)
       {
        
       for($i=0;$i<sizeof($x);$i++)
{
   
    $data['type_sender']=$h[$i];
   $data['email_to_id'] = $x[$i];
   $data['email_to_n'] = $y[$i];

   $this->db->insert('email_inbox',$data);
}}


         //   $this->db->insert('email_inbox',$data);
            
            
          
        }
        public function insert_attached($img_file)
        {
            $dataq['file'] = $img_file;
            $dataq['email_rkm']=$this->select_last_email();

            $this->db->insert('email_inbox_attached',$dataq);

        }
        public function get_files_by_id($rkm)
        {
            $this->db->select('*');
            $this->db->from('email_inbox_attached');
            $query = $this->db->where('email_rkm',$rkm)->get()->result();
            return $query;

        }
        public function select_last_email()
        {
            
                $this->db->select('id');
                $this->db->order_by('id','desc');
                $query=$this->db->get('email_inbox');
                if($query->num_rows()>0)
                {
                    return $query->row()->id + 1;
                }else{
                    return 1;
                }
            
              
        }
        public function select_all_my_email()
        {
            $this->db->select('*');
            $this->db->from('email_inbox');
            $query = $this->db->where('sent',1)->where('deleted',0)->get()->result();
            return $query;

        }
        public function select_all_deleted_email()
        {
            $this->db->select('*');
            $this->db->from('email_inbox');
            $query = $this->db->where('deleted',1)->get()->result();
            return $query;


        }
        
        public function make_read($id)
        {
            $data['readed'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);

        }
        
        public function make_reply($id)
        {
            $data['reply'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);

        }
        
        public function make_forward($id)
        {
            $data['forward'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);

        }
        public function get_email_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('email_inbox');
            $query = $this->db->where('sent',1)->where('readed',1)->where('id',$id)->get()->row();
            return $query;

        }
        public function make_deleted($id)
        {

            $data['deleted'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);
        }
    

    
    
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }



   //notification

public function total_rows($q=NULL){
    $this->db->like('id',$q);
    

   
$this->db->where('email_to_id',$_SESSION['emp_code']);
$this->db->where('seen',0);  
    
     $this->db->from('email_inbox');
    return $this->db->count_all_results();


}
public function get_new_messages($q=NULL)
{
    $this->db->where('email_to_id',$_SESSION['emp_code']);
  $this->db->where('readed',0);

     $this->db->from('email_inbox');
    return $this->db->get()->result();
    
}
public function update_seen_messages()
{
   
   $data['seen']=1;
     
 $this->db->where('email_to_id',$_SESSION['emp_code'])->update('email_inbox',$data);


}

public function update_read_messages($id)
{
   
   $data['readed']=1;
     
 $this->db->where('id',$id)->update('email_inbox',$data);


}


}