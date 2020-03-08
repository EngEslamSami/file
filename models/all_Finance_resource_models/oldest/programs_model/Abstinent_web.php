<?php


class Abstinent_web extends CI_Model
{

    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert(){
 

        
            $data['name']=$this->chek_Null( $this->input->post('name'));
            $data['tele']=$this->chek_Null( $this->input->post('tele'));
            $data['status']=$this->chek_Null( $this->input->post('status'));
            $data['address']=$this->chek_Null( $this->input->post('address'));
            $data['approved']=0;
            $data['date'] = strtotime(date("Y-m-d"));
            $data['date_s'] = time();
            $data['date_ar'] = (date("Y-m-d"));
           $this->db->insert('abstinent',$data);
    }
        
         public function get_all_img(){
        
    return $this->db->get('main_photo')->result();
        
    }
        
        }// END CLASS
        
        
        