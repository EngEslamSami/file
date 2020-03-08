<?php

class Tazkra_comment_model extends CI_Model
{

    

    public function add_comment($id)
    {
        $data['tazkra_num_fk']= $this->get_tazkra_num()+1;
      $data['tazkra_id_fk']=$id;
       
        $data['comment']= $this->input->post('tazkra_comment');
      
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->insert('tech_all_tazkra_order_comments',$data);
        return $this->db->insert_id();

    }
    public function get_tazkra_num (){
        $this->db->order_by('tazkra_num','DESC');
        $query = $this->db->get('tech_all_tazaker_orders');
        if ($query->num_rows()>0){
            return $query->row()->tazkra_num;
        } else{
            return 0;
        }
    }
    public function get_comments($id){
        $this->db->where('tazkra_id_fk',$id);
        $query = $this->db->get('tech_all_tazkra_order_comments')->result();
        
          
         return $query;
       
    }

   
    public function update_comment($id){

        $data['comment']= $this->input->post('tazkra_comment');
      
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('tech_all_tazkra_order_comments',$data);
    }
    public function get_comment_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tech_all_tazkra_order_comments');
        if ($query->num_rows()>0){
          //  return $query->row();
            $data = $query->row();
            //$data->tazkra_no3_n= $this->get_id('tech_tazkra_settings','id',$data->tazkra_no3,'title');
            //$data->importance_n= $this->get_id('tech_tazkra_settings','id',$data->importance_type,'title');

         return $data;
        } else{
            return 0;
        }
    }
    
   
    public function delete_comment($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_all_tazkra_order_comments');

    }

}