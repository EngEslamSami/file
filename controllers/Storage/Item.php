<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {

	public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
       
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('Storage/Gymmodel'); 
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    public function index() {  // Storage/Item
       
      if($this->uri->segment(3)!=null){
           $data['pill']=$this->uri->segment(3);
        $data['pill_items']=$this->Gymmodel->get_pill_items();
        $data['date2']=$this->Gymmodel->get_date2();
       }
   
    $data['items']=$this->Gymmodel->select_all_items();
   
    
   //  $data['branches']=$this->Gymmodel->select_all_branch();   
        
     $data['subview'] = 'admin/Storage/pills_operation/ordrebuy';
      $this->load->view('admin_index', $data);

    }
     public function getamount()
            {
        
      echo $this->Gymmodel->get_available_amount();
        //echo $this->Gymmodel->get_from_returns(7);
        
      
    }
    
    public function get_price(){
     $this->Gymmodel->get_one_price_form_purchases();    
        
      
    }
    public function unit() {
            
      echo $this->Gymmodel->get_unit(); 
    }
    public function save_pill() {
     $this->Gymmodel->save_fatora();
      // echo "ddddd";
  
    }
        
    
}