<?php

class Contact extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("contact");

    }

    public  function  insert(){
        
        $data['name'] = $this->input->post('name');
        $data['message']=$this->input->post('message');
        $data['email'] = $this->input->post('email');
        $data['address'] = $this->input->post('address');
        $data['phone'] = $this->input->post('phone');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 0;
        $this->db->insert('contact',$data);
       
    }
 
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('contact');

    }

    
  /**************/

    
    
    
    
     

 }