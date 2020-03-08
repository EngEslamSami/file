<?php
class Programs_depart extends MY_Controller
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
        $this->load->model('Programs_dep'); 
        
        
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
      private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
           return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url(){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
        }
    }
    
    public function programs($id){
         $this->load->model('Account_settings');
        $data['account_settings'] = $this->Account_settings->select();
        if($this->input->post('add') && $id == 0){
            $this->Programs_dep->insert();
            $this->message('success','إضافة برنامج');
            redirect('Programs_depart/programs/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Programs_dep->update($id);
            $this->message('success','تعديل برنامج');
            redirect('Programs_depart/programs/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Programs_dep->getById($id);
        }else{
             $data['table'] = $this->Programs_dep->select();
        }    
        $data['subview'] = 'admin/programs_dep/programs';
        $this->load->view('admin_index', $data);
    }
    
    public function delete_programs($id){
        $this->Programs_dep->delete($id);
        redirect('Programs_depart/programs/0','refresh');
    }
    
    public function programs_to($id){
        if($this->input->post('add') && $id == 0){
            $this->Programs_dep->insert2();
            $this->message('success','إضافة برامج');
            redirect('Programs_depart/programs_to/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Programs_dep->update2($id);
            $this->message('success','تعديل برامج');
            redirect('Programs_depart/programs_to/0','refresh');
        }
        if($id != 0)
            $data['result']=$this->Programs_dep->select_programs_to($id);
            
        $data['donors'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select2();
        $data['subview'] = 'admin/programs_dep/programs_to';
        $this->load->view('admin_index', $data);
    }
    
    public function delete_programs_to($id){
        $this->db->where('donor_id',$id);
        $this->db->delete('programs_to');
        redirect('Programs_depart/programs_to/0','refresh');
    }
// --------------------------------------------------
  public function ProgramsToOrphan(){
      if($this->input->post('add') ){
          $this->Programs_dep->insert_programs_orphan();
           $this->message('success','إضافة البيانات');
          redirect('Programs_depart/ProgramsToOrphan', 'refresh');
        }
    $data['all_member_in']=$this->Programs_dep->all_member_in();
    $data['member']=$this->Programs_dep->member_mothers();
    $data['programs']=$this->Programs_dep->progams();
    $data['records']=$this->Programs_dep->all_member_table();
    $data['subview'] = 'admin/programs_dep/programs_to_orphan';
        $this->load->view('admin_index', $data);
    
  }
//------------------------------------------------------
public function UpdateProgramsToOrphan($id){
    $this->load->model('Difined_model');

  if($this->input->post('update') ){
    //   $this->test($_POST);
       $this->Difined_model->delete("programs_to_orphan",array("member_id"=>$id));
       $this->Programs_dep->insert_programs_orphan();
       $this->message('success','تعديل البيانات');
         redirect('Programs_depart/ProgramsToOrphan', 'refresh');
        }
    $data['member_data']=$this->Programs_dep->get_member_prog($id);
    $data['programs']=$this->Programs_dep->progams();
    $data['member_progr_in']=$this->Programs_dep->get_member_progr_in($id);
    $data['result']=$this->Difined_model->getByArray("programs_to_orphan",array("member_id"=>$id));
    $data['member_name']=$this->Programs_dep->get_member_name($id);
    $data['mother_name']=$this->Programs_dep->get_mother($data['result']['mother_national_num_fk']);
    $data['subview'] = 'admin/programs_dep/programs_to_orphan';
    $this->load->view('admin_index', $data);

}
//-----------------------------------------------------------
public function DeleteProgramsToOrphan($id){
    $this->load->model('Difined_model');
     $this->Difined_model->delete("programs_to_orphan",array("member_id"=>$id));
      $this->message('success','حذف البيانات');
         redirect('Programs_depart/ProgramsToOrphan', 'refresh');
}
//----------------------------------------------------------------- ReportOrphan

public function ReportOrphan(){
    
    
        $this->load->model("family_models/Register");
      
        $data['all_family']=$this->Register->family(1);
    
    
            $data['subview'] = 'admin/programs_dep/ReportOrphan';
        $this->load->view('admin_index', $data);
}
//----------------------------------------------------------------


  public function programs_to_kafel($id){
     
        $data['donors'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select2();
        $data['subview'] = 'admin/programs_dep/programs_kafel';
        $this->load->view('admin_index', $data);
    }
//----------------------------------------------------------------


  public function programs_to_orphan($id){
    
    
       $data['all_member_in']=$this->Programs_dep->all_member_in();
        $data['member']=$this->Programs_dep->member_mothers();
        $data['records']=$this->Programs_dep->all_member_table();
        $data['donors'] = $this->Programs_dep->select_all2();
        $data['donors_t'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select3();
        $data['subview'] = 'admin/programs_dep/programs_orphan';
        $this->load->view('admin_index', $data);
    }
//----------------------------------------------------------------


  public function programs_to_orphan_one($id){
    $this->load->model("family_models/Register");
    $data['all_family']=$this->Programs_dep->family();
    $data['member']=$this->Programs_dep->member_mothers();
        if ($this->input->post('valu')){
          
        $data['all_member_in']=$this->Programs_dep->all_member_in();
       // $data['member']=$this->Programs_dep->member_mothers();
        $data['records']=$this->Programs_dep->all_member_table();
        $data['donors'] = $this->Programs_dep->select_all2();
        $data['donors_t'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select3();
        $data['id']=$this->input->post('valu');
            $this->load->view('admin/programs_dep/get_table',$data);
        }else{
       
        $data['subview'] = 'admin/programs_dep/programs_orphan_one';
        $this->load->view('admin_index', $data);
        }
    }
    
    //----------------------------------------------------------------


  public function add_Payment_of_contributions(){
    
    $this->load->model('Difined_model');
         $data['donors'] = $this->Programs_dep->select_all();   
       $data['banks'] = $this->Difined_model->select_all('banks','','','','');
       $data['programs'] = $this->Programs_dep->select(); 
       $data['table'] = $this->Programs_dep->select2();
 
          if($this->input->post('add') ){
    //  $this->Programs_dep->insert_Payment();
      // $this->message('success','إضافة الإشتراك');
       //  redirect('Programs_depart/add_Payment_of_contributions', 'refresh');
       $id = $this->Programs_dep->insert_Payment();
      $this->print_programs_depart($id);

        }elseif($this->input->post('valu')){
           $data['donors'] = $this->Programs_dep->select_all();
           $data['programs'] = $this->Programs_dep->select();
           $data['table'] = $this->Programs_dep->select2();
          // $this->test($data['table']);
           $data['id']=$this->input->post('valu');
           $this->load->view('admin/programs_dep/get_table2',$data);
        }else{
         $this->load->model('finance_resource_models/Donors');
        $this->load->model('Difined_model');
      //  $data['all_records'] = $this->Difined_model->select_all('participation_money','','','','');
     //   $data['all_records'] = $this->Difined_model->select_search_key('participation_money','deport',0);
        
      $data['all_records'] = $this->Difined_model->select_search_key2('participation_money','deport',0,"pill_num");
        
           $data['banks'] = $this->Difined_model->select_all('banks','','','','');
        $data['subview'] = 'admin/programs_dep/Payment_of_contributions';
        $this->load->view('admin_index', $data);
    
    }
  }
  ////////////////////////////////////////////payment_kafel
  
  
  public function payment_kafel(){
       if($this->input->post('add') ){
      $this->Programs_dep->insert_Payment_for_orphan();
       $this->message('success','إضافة صرف ');
         redirect('Programs_depart/payment_kafel/', 'refresh');
        }
        
        $data["count_add_donations"]=$this->Programs_dep->count_add_donations();
        $data["count_payment"]=$this->Programs_dep->count_payment();
        
        $data['all_member_in']=$this->Programs_dep->all_member_in();
        $data['member']=$this->Programs_dep->member_mothers();
        $data['records']=$this->Programs_dep->all_member_table();
        $data['donors'] = $this->Programs_dep->select_all2();
        $data['donors_t'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select34();
        $data['pay'] = $this->Programs_dep->select_all3();
         $data['all_payments'] = $this->Programs_dep->all_payments_on();
        $data['payments_in'] = $this->Programs_dep->payments_in();

        
        $data['check_in_payment'] = $this->Programs_dep->check_in_payment();
        $data['payment'] =   $this->Programs_dep->select_Payment();
        $data['payment_today'] =   $this->Programs_dep->select_Payment_today();
        $data['programs'] = $this->Programs_dep->select();
        $data['subview'] = 'admin/programs_dep/payment_kafel';
        $this->load->view('admin_index', $data);
  }
  
  
  //-------------------------------------------------- 
  

  
  
  /* public function payment_kafel(){
    
       if($this->input->post('add') ){
      $this->Programs_dep->insert_Payment_for_orphan();
       $this->message('success','إضافة صرف ');
         redirect('Programs_depart/payment_kafel/0', 'refresh');
        }
         $data['all_member_in']=$this->Programs_dep->all_member_in();
        $data['member']=$this->Programs_dep->member_mothers();
        $data['records']=$this->Programs_dep->all_member_table();
        $data['donors'] = $this->Programs_dep->select_all2();
        $data['donors_t'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select34();
         $data['pay'] = $this->Programs_dep->select_all3();
    
    
         $data['payment'] =   $this->Programs_dep->select_Payment();
          $data['payment_today'] =   $this->Programs_dep->select_Payment_today();
          $data['programs'] = $this->Programs_dep->select();
          $data['subview'] = 'admin/programs_dep/payment_kafel';
        $this->load->view('admin_index', $data);
  } */
  //-------------------------------------------------- 
  
  
  /*before 21-11-2017  public function edit_contributions($id){
   $this->load->model('Difined_model');

          if($this->input->post('update') ){
     
   
       $this->Difined_model->delete("participation_money",array("id"=>$id));
       $this->Programs_dep->insert_Payment();
       $this->message('success','تعديل الإشتراك');
           redirect('Programs_depart/add_Payment_of_contributions', 'refresh');
        }
        
        
         $this->load->model('finance_resource_models/Donors');
        
       // $data['all_records'] = $this->Difined_model->select_all('participation_money','','','','');
          $data['all_records'] = $this->Difined_model->select_search_key('participation_money','deport',0);
      
        $data['donors'] = $this->Programs_dep->select_all();
       $data['programs'] = $this->Programs_dep->select();
       $data['table'] = $this->Programs_dep->select2();
      $data['result']=$this->Programs_dep->get_condition($id);
        $data['banks'] = $this->Difined_model->select_all('banks','','','','');
      $data['subview'] = 'admin/programs_dep/Payment_of_contributions';
      $this->load->view('admin_index', $data);

}*/
  public function edit_contributions($id,$pill_num){
   $this->load->model('Difined_model');

          if($this->input->post('update') ){
       $this->Difined_model->delete("participation_money",array("pill_num"=>$pill_num));
       $this->Programs_dep->insert_Payment();
       $this->message('success','تعديل الإشتراك');
           redirect('Programs_depart/add_Payment_of_contributions', 'refresh');
        }
        
        
         $this->load->model('finance_resource_models/Donors');
        
       // $data['all_records'] = $this->Difined_model->select_all('participation_money','','','','');
         // $data['all_records'] = $this->Difined_model->select_search_key('participation_money','deport',0);
      
        /**  dina 21/11 **/
        $data['all_records'] = $this->Difined_model->select_search_key2('participation_money','deport',0,"pill_num");
       /**  end **/
        $data['donors'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select2();
        $data['result']=$this->Programs_dep->get_condition($id);
        $data['banks'] = $this->Difined_model->select_all('banks','','','','');
      $data['subview'] = 'admin/programs_dep/Payment_of_contributions';
      $this->load->view('admin_index', $data);

}


//--------------------------------------------
/**before 21-11
public function delete_contributions($id){
        $this->Programs_dep->delete_contributions($id);
        redirect('Programs_depart/add_Payment_of_contributions','refresh');
}
**/
public function delete_contributions($id,$pill_num){
        //$this->Programs_dep->delete_contributions($id);
   /** dina  
   * $pill_num
   * array("pill_num"=>$pill_num)
   **/
           $this->load->model('Difined_model');
            $this->Difined_model->delete("participation_money",array("pill_num"=>$pill_num));
            /** end **/
        redirect('Programs_depart/add_Payment_of_contributions','refresh');
}






public function conditions(){
    $this->Programs_dep->insert_Payment_for_orphan();
    die;
  
   // print_r($_POST['values']);

}

  
  
  /************************/
  
  public function orphans_donations_transfer(){
    $data['donors'] = $this->Programs_dep->select_all2();
    $data['programs'] = $this->Programs_dep->select();
    $data['table'] = $this->Programs_dep->select34();
    $data['programs'] = $this->Programs_dep->select();
    $data['subview'] = 'admin/reports/orphans_donations_transfer';
    $this->load->view('admin_index', $data);
}



public function guarantees_donors_subscriptions(){
    $this->load->model('Difined_model');
    $data['donors'] = $this->Programs_dep->select_all();
    $data['all_records'] = $this->Difined_model->select_all('participation_money','','','','');
    $data['programs'] = $this->Programs_dep->select();
    $data['table'] = $this->Programs_dep->select2();
    $data['subview'] = 'admin/reports/guarantees_donors_subscriptions';
    $this->load->view('admin_index', $data);
}
 /**************************************************************************/
 /**
  * 29-10-2017
  * sh
  * @تقرير ما تم صرف للايتام
  */ 
  
   public function finannce_orphane_report(){
        $this->load->model('Finannce_orphane_report');
        $this->load->model('Difined_model');
        $data['all_family']=$this->Programs_dep->family();
        $data['member']=$this->Programs_dep->member_mothers();

        $data['get_name'] = $this->Finannce_orphane_report->select();
        if ($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('type')) {

            if($this->input->post('type')==0) {
                $data['orphans'] = $this->Finannce_orphane_report->get_details(strtotime($this->input->post('date_from')), strtotime($this->input->post('date_to')));
                $data['orp'] = $this->Finannce_orphane_report->get_details_s(strtotime($this->input->post('date_from')), strtotime($this->input->post('date_to')));
                $data['reco'] = $this->Finannce_orphane_report->get_details_name(strtotime($this->input->post('date_from')), strtotime($this->input->post('date_to')));
                $this->load->view('admin/reports/get_finannce_orphane', $data);
            }else{
                $data['recs'] = $this->Finannce_orphane_report->get_details_beetween(strtotime($this->input->post('date_from')), strtotime($this->input->post('date_to')), $this->input->post('type'));
                $data['records'] = $this->Finannce_orphane_report->get_details_beetween_dates(strtotime($this->input->post('date_from')), strtotime($this->input->post('date_to')), $this->input->post('type'));
                $this->load->view('admin/reports/get_finannce_orphane_report', $data);
            }

          }else {
            $data['subview'] = 'admin/reports/finannce_orphane_report';
            $this->load->view('admin_index', $data);
        }
    }
/*****************************************************************************/    
 
 public function orphans_non_participants(){
    $this->load->model('Programs_dep');
    $this->load->model('Difined_model');
    $data['members']=$this->Programs_dep->get_orphans_non_participants();
    $data['mother_name']=$this->Programs_dep->select_mother();
    $data['father_name']=$this->Programs_dep->select_father();
    $data['subview'] = 'admin/reports/orphan_non_participants';
    $this->load->view('admin_index', $data);
}


public function donors_non_participants(){
    $this->load->model('Programs_dep');
    $this->load->model('Difined_model');
    $data['members']=$this->Programs_dep->get_donors_non_participants();
    $data['subview'] = 'admin/reports/donors_non_participants';
    $this->load->view('admin_index', $data);
}


  public function print_programs_depart($id){
        $this->load->model('Difined_model');
        $this->load->library("Convert_ar");
        $data["tools"]=$this->convert_ar;
        $data['all_records'] = 
        $this->db->select('participation_money.*, donors_t.*')
        ->join('donors_t','donors_t.id=participation_money.donor_id')
        ->where('participation_money.id',$id)
        ->get('participation_money')
        ->result();
        $query = $this->db->select('*')->get('banks');
        if($query->num_rows() > 0)
          foreach ($query->result() as $row)
            $banks[$row->id] = $row;
        $data['banks'] = $banks;
        $this->load->view('admin/programs_dep/print',$data);
    }
  
  

}// END CLASS 