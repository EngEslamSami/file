<?php
class Archive_design extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));  
      /*************************************************************/
      $this->load->model('familys_models/for_dash/Counting');
      $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
    }
    
    
    
 public function archive_index() { //Archive_design/archive_index

    $data['title'] = 'نظام الأرشيف';
    $data['subview'] = 'admin/design/arch/archive_index';
    $this->load->view('admin_index',$data); 

}

  public function all_deals() { //Archive_design/all_deals

    $data['title'] = 'المعاملات';
    $data['subview'] = 'admin/design/arch/deals';
    $this->load->view('admin_index',$data); 

}
 public function add_deal() { //Archive_design/add_deal

    $data['title'] = 'تسجيل معاملة جديدة';
    $data['subview'] = 'admin/design/arch/add_deal';
    $this->load->view('admin_index',$data); 

}

 public function deal_details() { //Archive_design/deal_details

    $data['title'] = 'تفاصيل معاملة';
    $data['subview'] = 'admin/design/arch/deal_details';
    $this->load->view('admin_index',$data); 

}    


 public function new_message() { //Archive_design/new_message

    $data['title'] = 'رسالة جديدة';
    $data['subview'] = 'admin/design/arch/new_message';
    $this->load->view('admin_index',$data); 

}   


    
}
?>