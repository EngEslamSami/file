<?php class Mohma_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function select_search($table){
        $this->db->select('*');
        $this->db->from($table);
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    

public function add_mohma()
{
    $data['status']=$this->input->post('status_m');
    $data['mohma_name']=$this->input->post('mohma_name');
    $data['tahwel_type']=$this->input->post('tahwel_type');
    //$data['to_user_id']=$this->input->post('to_user_id');
  //  $data['to_user_name']=$this->input->post('to_user_name');
    $data['awlawya']=$this->input->post('awlawya');
    $data['subject']=$this->input->post('subject');
    $data['esthkak_date']=$this->input->post('esthkak_date');
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar'] = date('Y-m-d H:i:s');
 
    if($_SESSION['role_id_fk']==1){

        $data['from_user_id']=$_SESSION['user_id'];
        $data['from_user_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $x= $this->input->post('to_user_id');
       $y=$this->input->post('to_user_name');
       if(   $x!=null)
       {
        
       for($i=0;$i<sizeof($x);$i++)
{
   
   if($data['tahwel_type']==1)
   {
    
   $data['to_user_id'] = $x[$i];
   $data['to_user_name'] = $y[$i];
//echo "<pre>";
//print_r($data);
   $this->db->insert('arch_mohma',$data);
   
  }






}


    
    
    
    
    }


   

}


public function update_mohma($id)
{
  
    $data['status']=$this->input->post('status_m');
    $data['mohma_name']=$this->input->post('mohma_name');
    $data['tahwel_type']=$this->input->post('tahwel_type');
   // $data['to_user_id']=$this->input->post('to_user_id');
 //   $data['to_user_name']=$this->input->post('to_user_name');
    $data['awlawya']=$this->input->post('awlawya');
    $data['subject']=$this->input->post('subject');
    $data['esthkak_date']=$this->input->post('esthkak_date');
  
 
    if($_SESSION['role_id_fk']==1){

        $data['from_user_id']=$_SESSION['user_id'];
        $data['from_user_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $x= $this->input->post('to_user_id');
       $y=$this->input->post('to_user_name');
       if(   $x!=null)
       {
        for($i=0;$i<sizeof($x);$i++)
{
   
   if($data['tahwel_type']==1)
   {
    
   $data['to_user_id'] = $x[$i];
   $data['to_user_name'] = $y[$i];
//echo "<pre>";
//print_r($data);
$this->db->where('id',$id);
$this->db->update('arch_mohma',$data);
   
  }
       
    
    }
}
    
  

}
public function select_mohmat()
{

    $query = $this->db->get('arch_mohma')->result();
    return $query;

}
public function select_mohmat_by_id($id)
{
    $query = $this->db->where('id',$id)->get('arch_mohma')->row();
    return $query;

}
public function delete_mohma($id)
{
    $this->db->where('id',$id)->delete('arch_mohma');
  
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
public function update_halat_mohma($id)
{
    $data['suspend']=$this->input->post('radio_end');
    $data['percentage']=$this->input->post('percentage');
    $data['status']=2;
    $this->db->where('id',$id);
$this->db->update('arch_mohma',$data);
   

}


} 
?>