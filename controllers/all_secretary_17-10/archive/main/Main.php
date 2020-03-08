<?php
class Main extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));  
        $this->load->model('all_secretary_models/archive_m/main/Main_model');
      /*************************************************************/
      $this->load->model('familys_models/for_dash/Counting');
      $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
    }
    
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    
 public function archive() { //all_secretary/archive/main/Main/archive

    $data['title'] = 'نظام الأرشيف';

    $data['subview'] = 'admin/all_secretary_view/archive_v/main/main_v';
    $data['wared']=$this->Main_model->select_new_wared();
    $data['sader']=$this->Main_model->select_new_sader();
  //  $this->test($data);
    $data['wared_mostalm']=$this->Main_model->select_wared_mostalm();
    $data['sader_mostalm']=$this->Main_model->select_sader_mostalm();
  // $this->test($data);
 //nagwa
 if ($_SESSION['role_id_fk']==1){
  $data['all_sader']=$this->Main_model->get_table('arch_sader_history','');
  $data['all_wared']=$this->Main_model->get_table('arch_wared_history','');
} else{
  $data['all_sader']=$this->Main_model->get_table('arch_sader_history',array('from_user_id'=>$_SESSION['emp_code']));
  $data['all_wared']=$this->Main_model->get_table('arch_wared_history',array('from_user_id'=>$_SESSION['emp_code']));

}
$data['new_sader']=$this->Main_model->get_updates('arch_sader',array('current_from_user_id !='=>0));
$data['new_wared']=$this->Main_model->get_updates('arch_wared',array('current_form_user_id !='=>0));
 
 
 //$this->test($data['wared_mostalm']);
    $this->load->view('admin_index',$data); 

}
public function all_archive()//all_secretary/archive/main/Main/all_archive
{
  $data['all_sader_end']=$this->Main_model->get_updates('arch_sader',array('suspend'=>4));
  $data['all_wared_end']=$this->Main_model->get_updates('arch_wared',array('suspend'=>4));
//  $this->test($data);
  $data['subview'] = 'admin/all_secretary_view/archive_v/main/data_archive';
  $this->load->view('admin_index',$data); 
 
}


  
    
}
?>