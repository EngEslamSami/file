<?php

class Message extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------    
    public function insert($type,$mob){
        /*echo'<pre>';
        var_dump($_POST);
        echo'</pre>';
        die;*/
 foreach ($_POST['phone_num'] as $row){
     $h = $this->db->get_where('employees', array('phone_num'=>$row));
     $data['content'] = $this->chek_Null($this->input->post('content'));
     $data['emp_mob'] = $_POST['mobile'];
     $data['emp_code'] = $h->row_array()['emp_code'] ;

       $data['emp_depart'] = $this->chek_Null($h->row_array()['administration']);

     $data['date'] = strtotime(date("Y-m-d", time()));
     $data['date_s'] = time();
     $data['type'] = 1;
     $data['publisher'] = $_SESSION['user_username'];
     $this->db->insert('messages', $data);


 }
}

public function insert2($type,$mob){
       /* echo'<pre>';
        var_dump($_POST);
        echo'</pre>';
        die;*/
 foreach ($_POST['email_to'] as $row){
     $h = $this->db->get_where('basic', array('user_name'=>$row));
     $data['content'] = $this->chek_Null($this->input->post('content'));
     $data['emp_mob'] = $h->row_array()['mother_mob'];
     $data['emp_code'] = $h->row_array()['id'];

       $data['emp_depart'] = '';

     $data['date'] = strtotime(date("Y-m-d", time()));
     $data['date_s'] = time();
     $data['type'] = 3;
     $data['publisher'] = $_SESSION['user_username'];
     $this->db->insert('messages', $data);


 }


    }

  
    
    
        public function select(){

        $this->db->select('*');
        $this->db->from('about');
    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //------------------------------------------------------------------
      public function insert_dep(){





          foreach ($_POST['emp_depart'] as $record):

              $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$record);
              $arr=array();
              foreach ($query2->result() as  $row2) {
                  $arr[] =$row2;


              }

              endforeach;

           foreach($arr as $records){

               if(!empty($records)):
            $data['content'] = $this->chek_Null($this->input->post('content'));
            $data['emp_code'] = $this->chek_Null($records->emp_code);
            $data['emp_mob'] =$this->chek_Null($records->phone_num);
            $data['emp_depart'] = $this->chek_Null($records->administration);
            $data['date'] = strtotime(date("Y-m-d", time()));
            $data['date_s'] = time();
            $data['type'] = 2;
                  
            $data['publisher'] = $_SESSION['user_username'];
            $this->db->insert('messages', $data);
         endif;
           }
           
 


    }
    //-----------------------------------------------------    
    public function  get_data(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code );
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function  get_data2(){
        $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
      $this->db->from('basic'); 
      $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
      $this->db->where("basic.suspend",1);
      $this->db->group_by('basic.mother_national_num');
      $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {   foreach ($query->result() as $row) {
                 $data[$row->id] = $row;
                 }
            return $data;
            }
            else
            {
                return false;
            }
    }
//-----------------------------------------------------


    public function getById($id){

        $h = $this->db->get_where('employees', array('emp_code'=>$id));
        return $h->row_array();

    }
    
    
    //-------------------------------------------------------------------
    
    //---------------------Osama----------------------------------------------


    public function insert3($type,$mob){

        foreach ($_POST['phone_num'] as $row){
            $h = $this->db->get_where('donors', array('mobile'=>$row));
            $data['content'] = $this->chek_Null($this->input->post('content'));
            $data['donor_mob'] = $this->chek_Null($this->input->post('mobile'));
            $data['donor_id_fk'] = $this->chek_Null($row);

            $data['date'] = strtotime(date("Y-m-d", time()));
            $data['date_s'] = time();
            $data['type'] = 4;
            $data['publisher'] = $_SESSION['user_username'];
            $this->db->insert('donors_messages', $data);


        }
    }


    public function insert4($type,$mob){
        /*echo'<pre>';
        var_dump($_POST);
        echo'</pre>';
        die;*/
        foreach ($_POST['phone_num'] as $row){
            $h = $this->db->get_where('sponsors', array('mobile'=>$row));
            $data['content'] = $this->chek_Null($this->input->post('content'));
            $data['sponser_mob'] = $this->chek_Null($this->input->post('mobile'));
            $data['sponsor_id_fk'] = $this->chek_Null($row);

            $data['date'] = strtotime(date("Y-m-d", time()));
            $data['date_s'] = time();
            $data['type'] = 5;
            $data['publisher'] = $_SESSION['user_username'];
            $this->db->insert('sponsors_messages', $data);


        }
    }


    public function getDonorName($id){
        $this->db->where('id',$id);
        $query = $this->db->get('donors');
        return $query->row();
    }

    public function  getDonorsMessage()
    {
        $this->db->select('*');
        $this->db->from('donors_messages');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach( $query->result() as $row){
                $data[$i]->name = $this->getDonorName($row->donor_id_fk)->name;
                $i++;
            }
            return $data;
            }
            return false;
        }



    public function  getSponsorsMessage()
    {
        $this->db->select('*');
        $this->db->from('sponsors_messages');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach( $query->result() as $row){
                $data[$i]->name = $this->getSponorName($row->sponsor_id_fk)->name;
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function getSponorName($id){
        $this->db->where('id',$id);
        $query = $this->db->get('sponsors');
        return $query->row();
    }

/************************************************************/

//__________ new _____________


    public function  get_Magls_Members_Message()
    {
        $this->db->select('*');
        $this->db->from('magls_members_messages');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach( $query->result() as $row){
                $data[$i]->name = $this->getMemberName($row->member_id_fk)->member_name;
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function insert_Members_Message(){

        foreach ($_POST['phone_num'] as $row){

            $data['content'] = $this->chek_Null($this->input->post('content'));
            $data['member_mob'] = $this->chek_Null($this->input->post('mobile'));
            $data['member_id_fk'] = $this->chek_Null($row);

            $data['date'] = strtotime(date("Y-m-d", time()));
            $data['date_s'] = time();
            $data['type'] = 4;
            $data['publisher'] = $_SESSION['user_username'];
            $this->db->insert('magls_members_messages', $data);


        }
    }

    public function getMemberName($id){
        $this->db->where('id',$id);
        $query = $this->db->get('magls_members_table');
        return $query->row();
    }



    public function  get_general_Members_Message()
    {
        $this->db->select('*');
        $this->db->from('general_members_messages');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach( $query->result() as $row){
                $data[$i]->name = $this->getGeneralMemberName($row->general_member_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function insert_general_Members_Message(){

        foreach ($_POST['phone_num'] as $row){

            $data['content'] = $this->chek_Null($this->input->post('content'));
            $data['general_member_mob'] = $this->chek_Null($this->input->post('mobile'));
            $data['general_member_id_fk'] = $this->chek_Null($row);

            $data['date'] = strtotime(date("Y-m-d", time()));
            $data['date_s'] = time();
            $data['type'] = 5;
            $data['publisher'] = $_SESSION['user_username'];
            $this->db->insert('general_members_messages', $data);


        }
    }

    public function getGeneralMemberName($id){
        $this->db->where('id',$id);
        $query = $this->db->get('general_assembley_members');
           $arr= $query->row_array();
        return $arr['name'];
      //  return $query->row();
        
    }
//---------------------Osama----------------------------------------------






//---------------------Osama----------------------------------------------


}//END CLASS