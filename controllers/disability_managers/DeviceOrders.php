<?php
class DeviceOrders extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('disability_managers_models/Model_device_order');
        $this->load->model('Difined_model');

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
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

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url(){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    //-----------------------------------------
    private function message($type, $text){
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }

    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function PageLoad(){  //   disability_managers/DeviceOrders/PageLoad
        if($this->input->post('person_code')){
            $id=$this->input->post('person_code');
            $data_load["all_device"]=$this->Model_device_order->select_all_device();
            $data_load["result"]=$this->Model_device_order->get_one_peson($id);
        $this->load->view('admin/disability_managers_views/device_order/load_page/get_person_data', $data_load);
        }elseif($this->input->post('get_row') == "1"){
            $data_load["all_device"]=$this->Model_device_order->select_all_device();
            $this->load->view('admin/disability_managers_views/device_order/load_page/get_row', $data_load);
        }elseif($this->input->post('order_num') && $this->input->post('need_suport_value')){
            $order_num= $this->input->post('order_num');
            $value= $this->input->post('need_suport_value');
            $this->Model_device_order->update_need_suport($order_num ,$value);
        }elseif($this->input->post('order_id') && $this->input->post('approved_device')){
            $order_id= $this->input->post('order_id');
            $value= $this->input->post('approved_device');
            $this->Model_device_order->update_approved_device($order_id ,$value);
        }elseif($this->input->post('order_id') && $this->input->post('medical_company_id_fk')){
            $order_id= $this->input->post('order_id');
            $value= $this->input->post('medical_company_id_fk');
            $this->Model_device_order->update_medical_company($order_id ,$value);
        }
    }
    //============================================
    public function index(){  //   disability_managers/DeviceOrders    
        if($this->input->post('INSERT') =="INSERT"){
            $last=1 + $this->Model_device_order->select_last_order_num();
            $this->Model_device_order->insert($last);
            $this->message('success','إضافة الاجهزة');
            redirect('disability_managers/DeviceOrders','refresh');
        }
        $data["data_table"]=$this->Model_device_order->select_all();
        $data["all_person"]=$this->Model_device_order->select_all_peson();
        $data["all_medical"]=$this->Model_device_order->select_all_medical();
        $data['title'] = 'نموذج طلب أجهزة مساعدة';
        $data['metakeyword'] = 'نموذج طلب أجهزة مساعدة';
        $data['metadiscription'] = 'نموذج طلب أجهزة مساعدة';
        $data['subview'] = 'admin/disability_managers_views/device_order/add_device_order';
        $this->load->view('admin_index', $data);
    }
    //============================================
    public  function UpdateDeviceOrders($order_num){
        if($this->input->post('UPDATE') =="UPDATE"){
            $this->Model_device_order->delete_person_device($order_num);
            $this->Model_device_order->update($order_num);
            $this->message('success','تعديل الاجهزة');
            redirect('disability_managers/DeviceOrders','refresh');
        }
        $data["result_id"]=$this->Model_device_order->get_person_device($order_num);

        $data["result"]=$this->Model_device_order->get_one_peson($data["result_id"][0]->person_id_fk);
        $data["all_person"]=$this->Model_device_order->select_all_peson();
        $data["all_device"]=$this->Model_device_order->select_all_device();

        $data['title'] = 'تعديل  نموذج طلب أجهزة مساعدة ';
        $data['metakeyword'] ='تعديل  نموذج طلب أجهزة مساعدة ';
        $data['metadiscription'] = 'تعديل  نموذج طلب أجهزة مساعدة ';
        $data['subview'] = 'admin/disability_managers_views/device_order/add_device_order';
        $this->load->view('admin_index', $data);
    }
    //============================================
    public  function DeleteDeviceOrders($peson_id){
        $this->Model_device_order->delete_person_device($peson_id);
        $this->message('success','حذف الطلب ');
        redirect('disability_managers/DeviceOrders','refresh');
    }
    //============================================
    public function DeleteDevice($id,$order_num){
        $this->Model_device_order->delete_device($id);
        $this->message('success','الحذف');
        redirect('disability_managers/DeviceOrders/UpdateDeviceOrders/'.$order_num,'refresh');
    }
    //============================================
    public function PrintOrder($order_num){  // disability_managers/DeviceOrders/PrintOrder
    $this->load->model('disability_managers_models/Model_disability_archive');
        $data["detail"]=$this->Model_device_order->get_print_data($order_num);
        $data["person_data"]=$this->Model_device_order->get_one_peson($data["detail"][0]->person_id_fk);
        $data["order_table"]=$this->Model_disability_archive->get_person_device($data["detail"][0]->person_id_fk);
        $this->load->view('admin/disability_managers_views/device_order/print_order',$data);
    }
    //============================================

}