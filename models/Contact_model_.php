<?php
class Contact_model extends CI_Model
{
    public function insert_contact(){
        $data['name']= $this->input->post('name') ;
        $data['email']= $this->input->post('email') ;
        $data['phone']= $this->input->post('phone') ;
        $data['address']= $this->input->post('address') ;
        $data['message']= $this->input->post('message') ;
        $this->db->insert('pr_contact_us',$data);
    }
    public function display_contact(){
        $this->db->select('*');
        $this->db->from('pr_contact_us');

        $query = $this->db->where('action_id',0)->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }
    public function display_contact_action(){
        $this->db->select('*');
        $this->db->from('pr_contact_us');

        $query = $this->db->where('action_id!=',0)->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }
    public function delete_contact($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_contact_us');
    }
    public function update_message($id){
        $this->db->where('id',$id);
        $data['seen'] =1;

        $this->db->update('pr_contact_us',$data);
    }
    public function select_main_data()
    {
        $this->db->select('*');
        $this->db->from('main_data');
        $query = $this->db->get();
    }
    //yara
    public function display_contact_by_id($id){
        $this->db->select('*');
        $this->db->from('pr_contact_us');

        $query = $this->db->where('id',$id)->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }
    

public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}

    public function add_action($id)
    {
     
        
        $data['action_id'] = $this->input->post('radio_end') ;
        if($data['action_id']==1)
        {
            $data['action_name'] ='تم المتابعه';
        }elseif($data['action_id']==2)
        {
            $data['action_name'] ='تم التواصل';
        }elseif($data['action_id']==3)
        {
            $data['action_name'] ='لم يتم التواصل';
        }
     
        $data['action_date'] =strtotime(date("Y-m-d"));
        $data['action_date_ar'] =date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){

            $data['action_publisher']=$_SESSION['user_id'];
            $data['action_publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['action_publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['action_publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
    
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['action_publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['action_publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['action_publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['action_publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('pr_contact_us',$data);
    }
}