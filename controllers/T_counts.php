<?php
class T_counts extends MY_Controller
{  
    public function __construct(){
        parent::__construct();
              
      
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));
        
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
//--------------------------------------------------  
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

/*********************************************/

         public function all_t_counts_view() //T_counts/all_t_counts_view
    {

             $this->load->model("T_counts_model");
 
       $data['all_files'] = $this->T_counts_model->get_all_files();
       $data['all_files_active'] = $this->T_counts_model->get_all_files_active();
      $data['all_files_non_active'] = $this->T_counts_model->get_all_files_non_active();
  $data['all_talabat'] = $this->T_counts_model->get_all_talabat();
 
  $data['all_mostafed'] = $this->T_counts_model->get_mostafed();
 $data['all_yatem'] = $this->T_counts_model->get_yatem();
 $data['all_mother_num'] = $this->T_counts_model->get_mother_num();
 
 
 
 
 
 
        $data['subview'] = 'admin/testy_v/t_counts_view';
        $this->load->view('admin_index', $data);



    } 









      }