<?php
class Add_mohma extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');

        $this->load->model('all_secretary_models/archive_m/mohma/Mohma_model');

    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function mohma(){ // all_secretary/archive/mohma/Add_mohma/mohma
        
        //$data['title'] = "   اضافة حدث او ملاحظه  ";
      //  $data['footer_calender']='admin/all_secretary_view/archive_v/notes/script_calender';
      $data['record']=$this->Mohma_model->select_mohmat();
        $data['subview'] = 'admin/all_secretary_view/archive_v/mohma/mohma_v';
        $this->load->view('admin_index', $data);
    }
 
 

public function delete($id){ 
 
        $this->Mohma_model->delete_mohma($id);
         
        redirect('all_secretary/archive/notes/Add_mohma/add_mohma','refresh');
  
}
public function load_tahwel(){
    
    $type = $this->input->post('type');
   if ($type==1){
        $data['all'] = $this->Mohma_model->get_table('employees','');
        $data['type']= $type;
    }

    $this->load->view('admin/all_secretary_view/archive_v/mohma/load_tahwel', $data);
}
public function add_mohma()
 {
   
//$this->test($_POST);
    $this->Mohma_model->add_mohma();
   // $this->Wared_model->update_wared_mohma();


 }

 public function update_mohma()
 {
   //$this->test($_POST);
$id=$this->input->post('id');
    $this->Mohma_model->update_mohma($id);
   // $this->Wared_model->update_wared_mohma();

 }
 public function load_travel_type()
     {
      
      
      
    
    
        $data["record"]=$this->Mohma_model->select_mohmat();
         $this->load->view('admin/all_secretary_view/archive_v/mohma/load_travel_type', $data);
     }
 
     public function getById_travel_type()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Mohma_model->select_mohmat_by_id($id);
         echo json_encode($reason);
         
     }
     public function delete_travel_type()
     { 
  
         $id=$this->input->post('id');
             $this->Mohma_model->delete_mohma($id);
           
      
         
     }

     public function update_halat_mohma($id)
     {
     //    $this->test($_POST);
        $this->Mohma_model->update_halat_mohma($id);
        redirect('all_secretary/archive/mohma/Add_mohma/mohma','refresh');
     }


}