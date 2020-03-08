<?php
class Setting extends  MY_Controller{
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

        $this->load->model('all_secretary_models/archive_m/arch_setting/Setting_model');
    

      
        $this->myarray = array (
            201=>' أنواع المعاملات',
            301=>' تصنيفات الجهات',
            401=>'  طرق التسليم والاستلام',
            501=>'    تصنيف المرفقات',
            601=>'  أسماء المواضيع   ',
            701=>'  اسباب انهاء المعامله    ',
            801=>'    درجة السرية    ',
            901=>'    أسماء المهمات     ',
            1001=>'    صفه المسؤول     '

        );
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

    public function add_setting($type=0){ // all_secretary/archive/arch_setting/Setting/add_setting

        $data['typee']= $type;
        $data['all'] = $this->Setting_model->get_all_data($this->myarray);
       // $this->test($data['all']);

        $data['title'] = "اعدادات  ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/arch_setting/setting_view';
        $this->load->view('admin_index', $data);
    }
    public function AddSitting($type=0)
    {
       // $this->test($type);
        if ($this->input->post('add')) {

         //   $this->test($type);
          //  die;

            $this->Setting_model->insert_setting($type);
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('all_secretary/archive/arch_setting/Setting/add_setting/'. $type, 'refresh');
        }

    }

    public function UpdateSitting($id, $type)
    {
        $data['typee'] = $type;

        $data['get_setting'] = $this->Setting_model->getById($id);
        $data['typee'] = $type;
        $data["id"] = $id;
        $data["type_name"] = $this->myarray[$type];
        if ($this->input->post('add')) {
            $this->Setting_model->update_setting($id);
            $this->messages('success', '  تم التعديل بنجاح');
            redirect('all_secretary/archive/arch_setting/Setting/add_setting/'. $type, 'refresh');
        }

        $data['title'] = "اعدادات  ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/arch_setting/setting_view';
        $this->load->view('admin_index', $data);

    }

    public function DeleteSitting($id, $type)
    {
        $this->Setting_model->delete_setting($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('all_secretary/archive/arch_setting/Setting/add_setting/'. $type, 'refresh');

    }
    
    
    
    //new_func_yara    
function pdf($filename)
{
    $filePath = 'uploads/archive/main_egraat/'.$filename;
    if (file_exists($filePath)) {
        echo "The file  exists";
    } else {
        echo "The file  does not exist <br>";
        die();
    }
    
    header('Content-type:application/pdf');
    header('Content-disposition: inline; filename="'.$filename.'"');
    header('content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    //header('Content-Length: ' . filesize($filePath));

    readfile($filePath);


 
}   
    

    
        public function main_egraat()
    {
        //$this->load->model('Subscription');
        //$data['branches'] = $this->Subscription->SubBranches();
        $data['pdfname'] = "pdf.pdf";

        $data['title'] = " عرض ملف الاجراءات ";

        $data['subview'] = 'admin/all_secretary_view/archive_v/main_egraat_folder/showpdf';

        $this->load->view('admin_index', $data);
    }
    
    
    
}