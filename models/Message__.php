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
     $data['emp_mob'] = $this->chek_Null($row);
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


}//END CLASS