<?php
class Add_wared extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
 
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
  
       
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
      $this->load->model('all_secretary_models/archive_m/sader/Sader_model');
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function read_file($folder,$file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        // $file_path = 'uploads/archive/deals/'.$file_name;
        $file_path = $folder.'/'.$file_name;
      //  $file_path = $folder;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);

    }
  
    public function index()//all_secretary/archive/wared/Add_wared
    {
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['last_rkm']=$this->Wared_model->get_last_rkm();
        $data['result']=$this->Wared_model->select_all_wared();
      $data['arr']=$this->Wared_model->select_secret();
    
      // $this->test( $data['arr']);
        $data['subview'] = 'admin/all_secretary_view/archive_v/wared/add_wared';
        $this->load->view('admin_index', $data);
    }
    public function add()
    {   
      //  $this->test($_POST);
       $this->Wared_model->insert();
       $this->messages('success', ' تمت الاضافه  بنجاح');
       redirect('all_secretary/archive/wared/Add_wared','refresh');
    }
    public function  update($id){   
        if($this->input->post('add')){
       
           $this->Wared_model->update($id); 
           $this->messages('success', ' تمت التعديل  بنجاح');
           redirect('all_secretary/archive/wared/Add_wared/update/'.$id,'refresh');
        }
        $data['arr']=$this->Wared_model->select_secret();
    
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['title']="تعديل جهه اساسيه";
        $data['item']=$this->Wared_model->get_by_id($id);
        $data['subview'] = 'admin/all_secretary_view/archive_v/wared/add_wared';
        $this->load->view('admin_index', $data);
         
     }
     public function delete($id)
     {
        $this->Wared_model->delete($id); 
        $this->messages('success', ' تمت الحذف  بنجاح');
        redirect('all_secretary/archive/wared/Add_wared','refresh');
     }

    public function load_geha()
     {
      
      
      
    
    
        $data["geha"]=$this->Wared_model->select_search('arch_gehat');
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_geha', $data);
     }
     public function load_estlam()
     {

        $data["estlam"]=$this->Wared_model->select_search_key('arch_setting','from_code',401);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_estlam', $data);

     }
     
     
     
     
     public function add_estlam()
     
     { 
     
             $this->Wared_model->add_estlam();
             
            
         
     }
    
     public function getById_estlam()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->GetFromGeneral_settings($id);
         echo json_encode($reason);
         
     }
     public function update_estlam()
     { 
         
         
         $id=$this->input->post('id');
             $this->Wared_model->update_estlam($id);
            
           
         
     }
     public function delete_estlam()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_setting($id);
          
            
         
     }  

     
     
    public function load_geha_morsel()
    {
     
     
     
   
   
       $data["geha"]=$this->Wared_model->select_search('arch_gehat');
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_geha_morsel', $data);
    }


    public function load_morsel()
    {
$id=$this->input->post('id');
//$this->test($id);
$data["geha"]=$this->Wared_model->select_search_key('arch_gehat_ms2olen','geha_id_fk',$id);

$this->load->view('admin/all_secretary_view/archive_v/wared/load_morsel', $data);

    }
   

    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Wared_model->get_wared_by_id($row_id);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_details', $data);
}

public function compelete_details($id)
{
//$this->test($_SESSION);
    $data['title'] = 'تفاصيل معاملة';
    $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
    //$this->test(   $data['get_all']);
 //   $data['morfqat']=$this->Wared_model->get_morfq_by_id($id);
    $data['morfqat'] = $this->Wared_model->get_table('arch_wared_morfq',array('wared_id_fk'=>$id));
    $data['folder_path']= $data['get_all']->folder_path;
    $data['department']=$this->Wared_model->get_all_department();
    $data['employees']=$this->Wared_model->get_all_employees();
    $data["record"]=$this->Wared_model->select_mohmat($id);
    $data['last_rkm']=$this->Wared_model->get_last_mohma();
    $data['result']=$this->Wared_model->get_comments($id);
    $data['sader']=$this->Wared_model->get_all_sader();
    $data['wared']=$this->Wared_model->select_all_wared();
    
    $data["relations"]=$this->Wared_model->select_relations($id);
    //$this->test($data['get_all_morfq']);
    $data['subview'] = 'admin/all_secretary_view/archive_v/wared/deal_details';
    $this->load->view('admin_index',$data); 
}
private function upload_all_file($file_name,$id)
{
    $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
  $path=$data['get_all']->folder_path;
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size'] = '100000000';
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $this->upload->data();
        //  $this->thumb($datafile);
        return $datafile['file_name'];
    }
}
private function upload_muli_file($input_name,$id)
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = $this->upload_all_file("userFile",$id);
    }
    return $all_img;
}

public function upload_img()
{
    $id = $this->input->post('row');
    
    //    echo "<pre>";
    //    print_r( $id);
    //    return;
    $images = $this->upload_muli_file("files",$id);
  
    //  $this->test($_FILES);
    
    $this->Wared_model->insert_attach($id, $images);
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    $this->Wared_model->delete_morfq($id);

}
public function load()
     {
      
      
      $id=$this->input->post('id');
      $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
      $data['morfqat'] = $this->Wared_model->get_table('arch_wared_morfq',array('wared_id_fk'=>$id));
    $data['folder_path']= $data['get_all']->folder_path;

         $this->load->view('admin/all_secretary_view/archive_v/wared/load', $data);
     }
     public function get_fatora_attach()
     {
         $id=$this->input->post('val_id');
         $data['imgs']=$this->Wared_model->get_images($id);
         $x= $data['imgs'][0]->wared_id_fk;
        
       $data['path']=$this->Wared_model->get_wared_by_id($x);
     //$this->test( $data['path']->folder_path);
        
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_attach',$data);
 
 
     }

    
///////////////////////////التوجيهات
// public function add_comment($id)//technical_support/tazkra/tazkra_comments/tazaker_comments
// {

//     //$data['result']= $this->Tazaker_comments->get_details();
//    // $this->test($data['result']);
//    // die;
// // $this->test($_SESSION);
//    $data['result']=$this->Wared_model->get_comments($id);
//   // $this->test($data['result']);
//   $data['get_tazkra']= $this->Tazkra_orders_model->get_tzkra_byId($id);
//    $data['get_all']=$this->Tazkra_orders_model->get_tzkra_byId($id);
//         //$this->test($data['get_all']->id);
//     $data['subview'] = 'admin/all_secretary_view/archive_v/wared/tazkra_comments/tazaker_comments';
//     $this->load->view('admin_index', $data);

// }


public function load_details_comment()
{
    $row_id = $this->input->post('row_id');

   
    $data['get_tazkra']= $this->Wared_model->get_comment_byId($row_id);
 
    //$this->test( $data['get_tazkra']);
    $this->load->view('admin/all_secretary_view/archive_v/wared/comments/load_details', $data);

}
//yara

public function add_comment()
{
  $id=  $this->input->post('id');
  $comment=  $this->input->post('comment');
  $this->Wared_model->add_comment($id, $comment);
}
public function update_comment()
{
  //  $this->test($_POST);
    $id=  $this->input->post('id');
    $comment=  $this->input->post('comment');
    $this->Wared_model->update_comment($id, $comment);

}

public function delete_comment()
{
    $id=  $this->input->post('id');

    $this->Wared_model->delete_comment($id);

}
public function load_comments()
 {
  
  
  
$id= $this->input->post('id');
    $data['result']=$this->Wared_model->get_comments($id);
    $this->load->view('admin/all_secretary_view/archive_v/wared/comments/load_comment', $data);
 } 
 
 public function add_mohma()
 {
   
//$this->test($_POST);
    $this->Wared_model->add_mohma();
   // $this->Wared_model->update_wared_mohma();


 }

 public function update_mohma()
 {
   //$this->test($_POST);
$id=$this->input->post('id');
    $this->Wared_model->update_mohma($id);
   // $this->Wared_model->update_wared_mohma();

 }
 public function load_travel_type()
     {
      
      
      
    
    $id=$this->input->post('id');
        $data["record"]=$this->Wared_model->select_mohmat($id);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_travel_type', $data);
     }
 
     public function getById_travel_type()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->select_mohmat_by_id($id);
         echo json_encode($reason);
         
     }
     public function delete_travel_type()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_mohma($id);
           
      
         
     }
     public function get_details_wared()
     {
        $data['type']=$this->input->post('valu');
        $data['wared']=$this->Wared_model->select_all_wared();
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_wared', $data);
     }
     public function get_details_sader()
     {
$data['type']=$this->input->post('valu');
        $data['sader']=$this->Wared_model->get_all_sader();
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_sader', $data);
     }
     
 
     public function add_relation()
     {
       
    
        $this->Wared_model->add_relation();
      
    
    
     }
     
     public function load_relation()
     {
      
      $id=$this->input->post('id');
      
    
    
        $data["relations"]=$this->Wared_model->select_relations($id);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_relation', $data);
     }
     public function getById_relation()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->select_relation_by_id($id);
         echo json_encode($reason);
         
     }
     public function update_relation()
     {
       
    $id=$this->input->post('id');
        $this->Wared_model->update_relation($id);
     
    
     }
     public function delete_relation()
     {
       
    $id=$this->input->post('id');
        $this->Wared_model->delete_relation($id);
     
    
     }
     public function load_reason(){

          $data['id'] = $this->input->post('row_id');
        $data['reason']=$this->Wared_model->select_search_key('arch_setting','from_code',701);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_reasons', $data);
}
public function add_reason_end()
{
$id=$this->input->post('id');
$value=$this->input->post('value');
$name=$this->input->post('name');
$this->Wared_model->update_wared_status($id,$value,$name);


}
public function PrintCode(){
   // $this->test($_SESSION);    

 
    if($this->input->post("id") && $this->input->post("type")   && $this->input->post("num")){
         



           function arabic_w2e($str){
               $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
               $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
               return str_replace($arabic_western, $arabic_eastern, $str);
           }
           //=============================================
           function arabic_e2w($str){
               $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
               $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
               return str_replace($arabic_eastern, $arabic_western, $str);
           }
           //=============================================
           $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));  //get_one_barcode

         /*  $arr_date=explode("/",$this->input->post("date"));
           $arr_date[0]=arabic_w2e($arr_date[0]);
           $arr_date[1]=arabic_w2e($arr_date[1]);
           $arr_date[2]=arabic_w2e($arr_date[2]);*/

           //$data_load["date"]=  $arr_date[0]."/". $arr_date[1]."/". $arr_date[2];
          $data_load["date"]= $this->input->post("date");
           $data_load["subject"]= $this->input->post("id");
           $data_load["id"]=$this->input->post("num");
        
      
         $this->load->view('admin/all_secretary_view/archive_v/wared/get_one_barcode', $data_load);

       }
 // $this->test($_POST);
   }
   
   public function load_tahwel(){
    $this->load->model('all_secretary_models/email/Email');
    $type = $this->input->post('type');
    if ($type==2){
        $data['all'] = $this->Email->get_table('department_jobs',array('from_id_fk !='=>0));
        $data['type']= $type;
    } elseif ($type==1){
        $data['all'] = $this->Email->get_table('employees','');
        $data['type']= $type;
    }

    $this->load->view('admin/all_secretary_view/archive_v/wared/load_tahwel', $data);
}



public function load_no3_khtab()
     {

        $data["no3_khtab"]=$this->Wared_model->select_search_key('arch_setting','from_code',201);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_no3_khtab', $data);

     }
     
     
     
     
     public function add_no3_khtab()
     
     { 
     
             $this->Wared_model->add_no3_khtab();
             
            
         
     }
    
     public function getById_no3_khtab()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->GetFromGeneral_settings_no3_khtab($id);
         echo json_encode($reason);
         
     }
     public function update_no3_khtab()
     { 
         
         
         $id=$this->input->post('id');
             $this->Wared_model->update_no3_khtab($id);
            
           
         
     }
     public function delete_no3_khtab()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_setting($id);
          
            
         
     }  


     public function load_morfq()
     {
      
      
      
    
    
        $data["morfq"]=$this->Wared_model->select_search_key('arch_setting','from_code',501);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_morfq', $data);
     }
     
     public function add_morfq()
     
     { 
     
            
        $this->Wared_model->add_morfq();
           
           
         
     }
    
     public function getById_morfq()
     {
     
         
        $id=$this->input->post('id');
        $reason=$this->Wared_model->GetFromGeneral_settings_morfq($id);
        echo json_encode($reason);
         
     }
     public function update_morfq()
     { 
         
         
        $id=$this->input->post('id');
        $this->Wared_model->update_morfq($id);
          
         
     }


     ///////////////////////////////////
     public function add_reason_setting()
     
     { 
     
            
        $this->Wared_model->add_reason_setting();
           
           
         
     }
    
     public function getById_reason_setting()
     {
     
         
        $id=$this->input->post('id');
        $reason=$this->Wared_model->GetFromGeneral_reason_setting($id);
        echo json_encode($reason);
         
     }
     public function update_reason_setting()
     { 
         
         
        $id=$this->input->post('id');
        $this->Wared_model->update_reason_setting($id);
          
         
     }
      




} // END CLASS 