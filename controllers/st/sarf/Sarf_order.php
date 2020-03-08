<?php

class Sarf_order extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('st/sarf/Sarf_order_model');

        $this->load->library('google_maps');
    }

    private function test($data = array())
    {
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
    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/st/sarf';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
              $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    private function upload_muli_file($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
        }
        return $all_img;
    }

    public function read_file($file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/st/sarf/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    
   /* public function add_attach()
    {
      $id=$this->input->post('set');
     // $file=$this->input->post('file');
   // $this->test($_FILES['file1']);
     
        $images = $this->upload_muli_file("file1");
      
        $this->Sarf_order_model->insert_attach($id, $images);
        $this->messages('success', 'تم اضافة المرفقات ');
        redirect('st/sarf/Sarf_order/add_sarf','refresh');
     
        //  $this->messages('success','تمت إضافة المرفقات');
        

    }*/
   
   
       /*
    public function add_attach()
    {
        $data['id']=$this->input->post('set');
        //$this->test($_POST)
        if ($this->input->post('save')){
        $images = $this->upload_muli_file("file");
        $this->Sarf_order_model->insert_attach( $data['id'], $images);
        //  $this->messages('success','تمت إضافة المرفقات');
        messages('success', 'تم اضافة المرفقات ');
        redirect('st/sarf/Sarf_order/add_sarf','refresh');
        }
       $data['get_supplier']=$this->Sarf_order_model->get_by_id_morfq($data['id'])[0];
    
     //   $data['result'] = $this->Ezn_edafa_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
        $this->load->view('admin/st/sarf/sarf_morfaq_load', $data);
       
    }*/
    public function show_attach_esal()
    {
        $data['id']=$this->input->post('set');
        $data['get_supplier']=$this->Sarf_order_model->get_by_id_morfq($data['id'])[0];
        $this->load->view('admin/st/sarf/sarf_morfaq_load', $data);

    }  
    
   /* public function Delete_attach($id)
    {
        $this->Sarf_order_model->delete_attach($id);
        messages('success', 'تم حذف المرفقات ');
        redirect('st/sarf/Sarf_order/add_sarf','refresh');
    }
   */

  public function add_attach()
    {
        $data['id']=$this->input->post('set');
        //$this->test($_POST)
        if ($this->input->post('save')){
            if (isset($_FILES['file'])){  
        $images = $this->upload_muli_file("file");
        $this->Sarf_order_model->insert_attach( $data['id'], $images);
        //  $this->messages('success','تمت إضافة المرفقات');
        messages('success', 'تم اضافة المرفقات ');
        redirect('st/sarf/Sarf_order/add_sarf','refresh');
            }
            else
            {
                redirect('st/sarf/Sarf_order/add_sarf','refresh');   
            }
        }
       $data['get_supplier']=$this->Sarf_order_model->get_by_id_morfq($data['id'])[0];
    
     //   $data['result'] = $this->Ezn_edafa_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
        $this->load->view('admin/st/sarf/sarf_morfaq_load', $data);
       
    }
    
    
    public function Delete_attach()
    {
        $id = $this->input->post('set');
        $this->Sarf_order_model->delete_attach($id);
        messages('success', 'تم حذف المرفقات ');
        redirect('st/sarf/Sarf_order/add_sarf','refresh');
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
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }

    public function add_sarf(){ // st/sarf/Sarf_order/add_sarf
        $data['storage']=$this->Sarf_order_model->get_storage(1);
        $data['ezn_rkm']= $this->Sarf_order_model->get_ezn_rkm();
        $data['family']=$this->Sarf_order_model->get_family();
     //   $data['all_sarf']=$this->Sarf_order_model->display_sarf();
     
     $data['all_sarf']=$this->Sarf_order_model->display_sarf_deport_finance_zero();
     
        $data['geha_table'] =$this->Sarf_order_model->select_gehat();

        //  $this->test( $data['all_sarf']);
      //  die;

        if ($this->input->post('save')){
  
          $id=  $this->Sarf_order_model->insert_sarf();
          $this->Sarf_order_model->insert_asnaf_details();
          $this->messages('success','تم اضافة اذن الصرف') ;
          redirect('st/sarf/Sarf_order/add_sarf','refresh');

        }

        $data['title']= ' أذونات الصرف ' ;
        $data['subview']= 'admin/st/sarf/sarf_order_view';
        $this->load->view('admin_index',$data);

    }

    public function get_code(){
        $id= $this->input->post('id');
        $code = $this->Sarf_order_model->get_code($id);
        $json = json_encode($code);
        echo $json;
    }

    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Sarf_order_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/sarf/load_details',$data);

    }
    public function Update_sarf($id){

        $data['get_sarf']=$this->Sarf_order_model->get_by_id($id)[0];
        $data['storage']=$this->Sarf_order_model->get_storage(1);
        $data['ezn_rkm']= $this->Sarf_order_model->get_ezn_rkm();
        $data['family']=$this->Sarf_order_model->get_family();

        if ($this->input->post('edit')){
            $this->Sarf_order_model->update_sarf($id);
            $this->Sarf_order_model->insert_asnaf_details();
          //  $this->test($_POST);
          //  die;
            $this->messages('success','تم التعديل بنجاح') ;
            redirect('st/sarf/Sarf_order/add_sarf','refresh');

        }

        $data['geha_table'] =$this->Sarf_order_model->select_gehat();

        $data['title']= 'أذونات الصرف ' ;
        $data['subview']= 'admin/st/sarf/sarf_order_view';
        $this->load->view('admin_index',$data);


    }
/*
    public function Delete_sarf($id){

        $this->Sarf_order_model->delete_sarf($id);
        $this->Sarf_order_model->delete_all_asnaf($id);
        $this->messages('success','تم الحذف بنجاح') ;
        redirect('st/sarf/Sarf_order/add_sarf','refresh');

    }*/
 public function Delete_sarf($id,$ezn_rkm){

        $this->Sarf_order_model->delete_sarf($id);
        $this->Sarf_order_model->delete_all_asnaf($ezn_rkm);
        $this->messages('success','تم الحذف بنجاح') ;
        redirect('st/sarf/Sarf_order/add_sarf','refresh');

    }
    public function Print_sarf(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Sarf_order_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/sarf/print_sarf', $data);

    }
    //=============================================================================
    public function insert_geha_ajax(){
        $this->Sarf_order_model->insert_geha();
        $data['table'] =$this->Sarf_order_model->select_gehat();
        $this->load->view('admin/st/sarf/geha_load_page',$data);
    }
    public function getById(){
        $id= $this->input->post('id');
        $geha =$this->Sarf_order_model->get_geha_by_id($id);
        echo json_encode($geha);
    }
    public function update_geha(){
        $id= $this->input->post('id');
        $this->Sarf_order_model->update_geah($id);
        $data['table'] =$this->Sarf_order_model->select_gehat();

        $this->load->view('admin/st/sarf/geha_load_page',$data);

    }
    public function delete_geha(){
        $id = $this->input->post('id');
        $this->Sarf_order_model->delete_geha($id);
        $data['table'] =$this->Sarf_order_model->select_gehat();
        $this->load->view('admin/st/sarf/geha_load_page',$data);

    }
 /**********************************************************/   
    
      public function getConnection2($row_id,$store_id)
    {
        $this->load->model('st/ezn_edafa_model/Ezn_edafa_model');
        $all_Asnafs = $this->Ezn_edafa_model->get_asnaf($store_id);

        $arr_asnaf = array();
        $arr_asnaf['data'] = array();

        if (!empty($all_Asnafs)) {
            foreach ($all_Asnafs as $row_asnafs) {

                $arr_asnaf['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_asnafs['id'] . '"
                       ondblclick="Get_sanfe_Name(this,' . $row_id . ')" 
                        id="member' . $row_asnafs['id'] . '" data-code="' . $row_asnafs['code'] . '" 
                        data-code_br="' . $row_asnafs['code_br'] . '"
                        data-name="' . $row_asnafs['name'] . '"
                        data-whda="' . $row_asnafs['title_setting'] . '" 
                        data-price="' . $row_asnafs['price'] . '" 
                        data-all_rased="' . $row_asnafs['all_rased'] . '" 
                        data-slahia="' . $row_asnafs['slahia'] . '" />',
                    $row_asnafs['code'],
                    $row_asnafs['name'],
                    $row_asnafs['title_setting'],
                       $row_asnafs['all_rased'],

                    ''
                );
            }
        }
        echo json_encode($arr_asnaf);


    }
    
    
       public function ezonat_deprt() //st/sarf/Sarf_order/ezonat_deprt
    {
        $data['all_sarf'] = $this->Sarf_order_model->display_sarf();
        $data['storage'] = $this->Sarf_order_model->get_storage(1);

        $data['title'] = '';
        $data['subview'] = 'admin/st/sarf/sarf_deport_view';
        $this->load->view('admin_index', $data);
    }

    public function filter()
    {
        $data['all_sarf'] = $this->Sarf_order_model->filter_ezn_sarf();

        $this->load->view('admin/st/sarf/load_filter_view', $data);

    } 
    
        public function estlam()
    {
//        $this->test($_POST);
        $data['all_sarf'] = $this->Sarf_order_model->filter_ezn_sarf();

        $this->load->view('admin/st/sarf/load_ezn_to_estlam_view', $data);

    }
    
  /************************************/
  
     public function Print_sarf2()
    {

        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Sarf_order_model->get_by_id($row_id)[0];
         $data['UserName'] = $this->Sarf_order_model->getUserName($_SESSION['user_id']);
        $this->load->view('admin/st/sarf/print_sarf_view', $data);

    }

    public function family_member()
    {
        $file_num = $this->input->post('file_num');
        $family_mumber_data = $this->Sarf_order_model->family_member($file_num);
        echo json_encode($family_mumber_data);
    }  
    
    
  /*****************************************/
  
     public function estlam_sarf_orders(){ // st/sarf/Sarf_order/estlam_sarf_orders
     //   $data['storage']=$this->Sarf_order_model->get_storage(1);
     //   $data['ezn_rkm']= $this->Sarf_order_model->get_ezn_rkm();
     //   $data['family']=$this->Sarf_order_model->get_family();
        $data['all_sarf']=$this->Sarf_order_model->display_sarf_deport_finance_zero();
    //    $data['geha_table'] =$this->Sarf_order_model->select_gehat();



        $data['title']= 'ترحيل أذونات الصرف ' ;
        $data['subview']= 'admin/st/sarf/estlam_sarf_orders_view';
        $this->load->view('admin_index',$data);

    }  



    public function all_sarf_deported_orders(){ // st/sarf/Sarf_order/all_sarf_deported_orders

        $data['all_sarf']=$this->Sarf_order_model->display_sarf_deport_finance_one();




        $data['title']= ' أذونات الصرف المرحلة ' ;
        $data['subview']= 'admin/st/sarf/all_sarf_deported_orders_view';
        $this->load->view('admin_index',$data);

    }

   public function change_status()
    {
        $id = $this->input->post('select5');
        $x = $this->Sarf_order_model->update_status($id);
        
//echo $x;
    }



   public function update_deport()
    {
        $ezn_id = $this->input->post('checkbox_ezn_id');
        echo $this->Sarf_order_model->update_deport($ezn_id);

    }

}