<?php

class Add_sader extends MY_Controller{
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

        $this->load->model('all_secretary_models/archive_m/sader/Sader_model');

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
    private function upload_all_file($file_name,$folder="uploads/images")
    {
      //  $config['upload_path'] = 'uploads/archive';

        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

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

    // private function upload_muli_file($input_name,$folder)
    // {
    //     $filesCount = count($_FILES[$input_name]['name']);
    //     for ($i = 0; $i < $filesCount; $i++) {
    //         $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
    //         $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
    //         $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
    //         $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
    //         $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
    //         $all_img[] = $this->upload_all_file("userFile",$folder);
    //     }
    //     return $all_img;
    // }
    private function upload_muli_file($input_name,$folder){
        $filesCount = count($_FILES[$input_name]['name']);

        for($i = 0; $i < $filesCount; $i++){
            $ext = pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION);
            $full_ext = '.'.$ext;
          if ($ext=="jpeg" || $ext=="JPEG"){
              $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.jpg');

          }
          if ($ext=="PNG"){
            $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.png');

        }
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_all_file("userFile",$folder);
        }
     
       return $all_img;

    }
    /*public function read_file($folder,$file_name)
    {
         $this->load->helper('file');

        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);


    }*/
        /*  public function read_file($file_name)
    {
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
        $wared_id=$this->Wared_model->select_key('arch_sader_morfq','morfaq',$file_name)->sader_id_fk;
        $folder=$this->Wared_model->select_key('arch_sader','id',$wared_id)->folder_path;
         $this->load->helper('file');
        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);


    }*/
        
    public function read_file($file_name)
    {
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
        $wared_id=$this->Wared_model->select_key('arch_sader_morfaq','morfaq',$file_name)->sader_id_fk;
        $folder=$this->Wared_model->select_key('arch_sader','id',$wared_id)->folder_path;
         $this->load->helper('file');

        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);


    }
    public function downloads($folder,$file){
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./'.$folder.$file);
        force_download($name, $data);
    }

    public function add_sader(){ // all_secretary/archive/sader/Add_sader/add_sader
/*
echo '<pre>';
print_r($_SESSION);*/

  $data['emp_dep'] = $this->Sader_model->emp_dep();


//$this->test($data['emp_dep']);

         $data['all_sader'] = $this->Sader_model->get_table('arch_sader',array('suspend'=>0));
         $data['rkm'] = $this->Sader_model->get_rkm();
         $data['gehat'] = $this->Sader_model->get_table('arch_gehat','');
         $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
         $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        if ($this->input->post('add')){
             $this->Sader_model->insert_sader();
             $this->messages('success','تم الاضافة بنجاح ');
             $data['last_rkm'] = $this->Sader_model->get_rkm();
             redirect('all_secretary/archive/sader/Add_sader/add_deal/'.$data['last_rkm'],'refresh');
         }


        $data['title'] = "  اضافة صادر  ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_sader_view';

        $this->load->view('admin_index', $data);
    }
    public function load_modal(){

        if ($this->input->post('type')){
            $type = $this->input->post('type');
            $data['all_data'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>$type));
            $this->load->view('admin/all_secretary_view/archive_v/sader/load_page', $data);
        }
        elseif ($this->input->post('geha_id')){
            $geha_id = $this->input->post('geha_id');
            $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));
            $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);
        }

    }
       public function update_sader($id){
        $data['rkm'] = $this->Sader_model->get_rkm();
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        $data['gehat'] = $this->Sader_model->get_table('arch_gehat','');
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        if ($this->input->post('add')){
            $this->Sader_model->insert_sader($id);
            $this->messages('success','تم التعديل بنجاح ');
            redirect('all_secretary/archive/sader/Add_sader/add_deal/'.$id,'refresh');
        }
        $data['title'] = " صادر خارجي ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_sader_view';
        $this->load->view('admin_index', $data);
    }
    /*public function update_sader($id){

        $data['emp_dep'] = $this->Sader_model->emp_dep();

        $data['rkm'] = $this->Sader_model->get_rkm();
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        $data['gehat'] = $this->Sader_model->get_table('arch_gehat','');
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        if ($this->input->post('add')){
            $this->Sader_model->insert_sader($id);
            $this->messages('success','تم التعديل بنجاح ');
            redirect('all_secretary/archive/sader/Add_sader/add_sader','refresh');
        }
        $data['title'] = " صادر خارجي ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_sader_view';
        $this->load->view('admin_index', $data);
    }*/
    public  function delete_sader($id){
        $this->Sader_model->delete_sader($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('all_secretary/archive/sader/Add_sader/add_sader','refresh');

    }
    public function load_details(){

            $row_id = $this->input->post('row_id');
            $data['arr']=$this->Sader_model->select_secret();
              $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($row_id,1);
            $data['get_all'] = $this->Sader_model->get_sader_by_id($row_id);
            $this->load->view('admin/all_secretary_view/archive_v/sader/load_details', $data);
    }
    /*public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal

        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
        $data['comments'] = $this->Sader_model->get_table_order('arch_sader_comments',array('sader_id_fk'=>$id));
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();

        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }*/
    
      /*  public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$id));
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        //yara
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        //yara
        $data['emp_dep'] = $this->Sader_model->emp_dep();
        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }*/
   
        public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$id));
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        //yara24-2
        $data['emp_dep'] = $this->Sader_model->emp_dep();
         //yara24-2
        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }
    
    
    public function upload_morfaq()
    {
        $id = $this->input->post('row');
        $sader = $this->Sader_model->get_sader_by_id($id);
        $folder= $sader->folder_path;
        //$this->test($sader);
        $images = $this->upload_muli_file("files",$folder);
        $this->Sader_model->insert_attach($id, $images);
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['folder_path']= $data['get_all']->folder_path;
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_morfaq', $data);
    }
   /* public function delete_morfaq(){

        $id = $this->input->post('row_id');
        $sader_id = $this->input->post('sader_id');
        $this->delete_upload($id,$sader_id);
        $this->Sader_model->delete_morfaq($id);
       
        $data['get_all'] = $this->Sader_model->get_sader_by_id($sader_id);
        $data['folder_path']= $data['get_all']->folder_path;
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_morfaq', $data);
    }
    public function delete_upload($id,$sader_id)
{
    $img = $this->Sader_model->get_table_by_id('arch_sader_morfaq',array('id'=>$id));
    $path=$this->Sader_model->get_table_by_id('arch_sader',array('id'=>$sader_id));
    //$this->test($img->morfaq);
    if (file_exists($path->folder_path . "/" . $img->morfaq)) {
        unlink(FCPATH . "" . $path->folder_path . "/" . $img->morfaq);
    }
  
}
*/
    public function delete_morfaq()
    {
        $id = $this->input->post('row_id');
        $sader_id = $this->input->post('sader_id');
        $this->delete_upload($id,$sader_id);
            $this->Sader_model->delete_morfaq($id);
    
    } 
    public function delete_upload($id,$sader_id)
{
    $img = $this->Sader_model->get_table_by_id('arch_sader_morfaq',array('id'=>$id));
    $path=$this->Sader_model->get_table_by_id('arch_sader',array('id'=>$sader_id));
    //$this->test($img->morfaq);
    if (file_exists($path->folder_path . "/" . $img->morfaq)) {
        unlink(FCPATH . "" . $path->folder_path . "/" . $img->morfaq);
    }
  
}
    public function insert_comments(){
        $sader_id = $this->input->post('sader_id');
        $this->Sader_model->insert_comments($sader_id);
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$sader_id));

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_comment', $data);
    }

    public function delete_comment(){
        $sader_id = $this->input->post('sader_id');
        $row_id = $this->input->post('row_id');
        $this->Sader_model->delete_comment($row_id);
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_comment', $data);
    }
    public function load_tahwel(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Sader_model->get_table('department_jobs',array('from_id_fk !='=>0));
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Sader_model->get_table('employees','');
            $data['type']= $type;
        }

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_tahwel', $data);
    }

    public function insert_tahwel(){
        //$this->test($_POST);
        $sader_id = $this->input->post('sader_id');
        $this->Sader_model->insert_tahwel($sader_id);
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_tahwelat', $data);
    }
    public function delete_tahwel(){
        $sader_id = $this->input->post('sader_id');
        $row_id = $this->input->post('row_id');
        $this->Sader_model->delete_tahwel($row_id);
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_tahwelat', $data);
    }
    public function update_tahwel(){
        $row_id = $this->input->post('row_id');
        $tahwel = $this->Sader_model->get_table('arch_sader_history',array('id'=>$row_id))[0];
        echo json_encode($tahwel);

    }
    public function load_realtion(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Sader_model->get_table('arch_sader','');
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Sader_model->get_table('arch_wared','');
            $data['type']= $type;
        }
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_relation', $data);
    }
    public function insert_realtion(){
        $sader_id = $this->input->post('sader_id');
        $this->Sader_model->insert_realtion($sader_id);
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_relations', $data);
    }

    public function delete_relation(){
        $sader_id = $this->input->post('sader_id');
        $row_id = $this->input->post('row_id');
        $this->Sader_model->delete_relation($row_id);
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_relations', $data);
    }
    public function add_reason_end()
{
$id=$this->input->post('id');
$value=$this->input->post('value');
$name=$this->input->post('name');
$to_user_n=$this->input->post('to_user_n');
$to_user_id=$this->input->post('to_user_id');
$from_user_n=$this->input->post('from_user_n');
$date_end=$this->input->post('date_end');
$num_end=$this->input->post('num_end');
$this->Sader_model->update_sader_status($id,$value,$name,$to_user_n,$to_user_id,$from_user_n,$date_end,$num_end);

}
    public function PrintCode(){



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
            $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));


            $data_load["date"]= $this->input->post("date");

            $data_load["id"]=$this->input->post("num");
            $data_load["morfaq_num"]=$this->input->post("morfaq_num");
            $data_load["subject"]= $this->input->post("subject");

            $this->load->view('admin/all_secretary_view/archive_v/sader/print_barcode', $data_load);


    }
     
     ////notification
     public function get_tot_sader()

     {

         $tot=$this->Sader_model->total_rows();

         $result['tot_sader']=$tot;

         $msg=$this->Sader_model->get_new_sader();

         $result['msg_sader']=$msg;

         echo json_encode($result);

 

 

     }

 

     

     public function get_msg_sader()

     {

         $msg=$this->Sader_model->get_new_sader();

         $result['msg_sader']=$msg;

         echo json_encode($result);

 

 

     }

     public function update_seen_sader()

     {

     $this->Sader_model->update_seen_sader();

     }

 

 

 public function update_read_sader($id)

 {

    // $id=$this->input->post("id");

     $this->Sader_model->update_read_sader($id);

 }
 ///rehab
 public function load_mohemat()
    {
        $data["mohemat"]=$this->Sader_model->select_search_key('arch_setting','from_code',901);
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mohemat', $data);
    }

    public function add_mohema_n()
    {
        $this->Sader_model->add_mohema_n();

    }
    public function getById_mohema_n()
    {
        $id=$this->input->post('id');
        $reason=$this->Sader_model->GetFromGeneral_settings_mohema_n($id);
        echo json_encode($reason);
    }
    public function update_mohema()
    {
        $id=$this->input->post('id');
        $this->Sader_model->update_mohema($id);
    }
    public function delete_mohema()
    {
        $id=$this->input->post('id');
        $this->Sader_model->delete_setting($id);
    }



   public function all_sader()// all_secretary/archive/sader/Add_sader/all_sader
      {
        $data['all_sader'] = $this->Sader_model->get_table('arch_sader',array('suspend'=>0));
          $data['title'] = "  قائمه  بالصادر  ";
          $data['subview'] = 'admin/all_secretary_view/archive_v/sader/all_sader';
          $this->load->view('admin_index', $data);
      }
      
      
      public function get_folders()
{
    $sader_type = $this->input->post('type');
    $data['folders'] = $this->Sader_model->get_main_folders($sader_type);
    $this->load->view('admin/all_secretary_view/archive_v/sader/load_folders', $data);
}


public function load_gehat_ektsas()
{
    $this->load->model('all_secretary_models/archive_m/gehat/Geha_model');

    $id=$this->input->post('geha');

    $data['result']=$this->Geha_model->getbyid_ektsas($id);

    $this->load->view('admin/all_secretary_view/archive_v/sader/load_gehat_ektsas', $data);
}
public function print_tawresa()
{
    $row_id = $this->input->post('row_id');
    $data['get_all'] = $this->Sader_model->get_sader_by_id($row_id);

    $this->load->view('admin/all_secretary_view/archive_v/sader/print_tawresa', $data);

}


public function get_tot_sader_comments()
{
    $tot=$this->Sader_model->total_rows_comment();
    $result['tot_sader']=$tot;
//        $msg=$this->Sader_model->get_new_sader_comments();
//        $result['msg_sader']=$msg;
    echo json_encode($result);
}

public function update_seen_sader_comments()
{
    $this->Sader_model->update_seen_sader_comments();
}



  public function add_ms2ol()
    {

        $geha_id =$this->input->post('geha_id');

        $this->Sader_model->add_mostlm($geha_id);
        $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);
    }

    public function getById_mostlm(){
        $id=$this->input->post('id');

        $mostlm =$this->Sader_model->getById_mostlm($id);

        echo json_encode($mostlm);
    }
    public function update_ms2ol()
    {

        $geha_id =$this->input->post('geha_id');
        $row_id =$this->input->post('row_id');

        $this->Sader_model->update_mostlm($geha_id,$row_id);
        $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);
    }
    public function delete_mostlm(){

        $row_id =$this->input->post('row_id');
        $geha_id =$this->input->post('geha_id');
        $this->Sader_model->delete_mostlm($row_id);
        $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);

    }

}