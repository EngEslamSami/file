<?php
class ActivitesOrders extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('familys_models/Model_access_rule');

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    //-----------------------------------------
    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //-----------------------------------------
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
    //-----------------------------------------
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
    //-----------------------------------------
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
    //-----------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //-----------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }
    //-----------------------------------------
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
     public function index()
     {  //  family_controllers/activites_orders/ActivitesOrders
         $this->load->model('familys_models/activites_orders/Model_activite_order');
         if($this->input->post('ADD') == "ADD"){
         // $this->test($_POST);
            $this->Model_activite_order->insert();
            $this->message('success','تمت الاضافة بنجاح');
             redirect('family_controllers/activites_orders/ActivitesOrders', 'refresh');
         }elseif($this->input->post('get_activite') && $this->input->post('start_id')  ){
           //  $id_activite=$this->input->post('get_activite');
             $id=$this->input->post('start_id');
             $arr_cond = array("start_activity.id "=>$id);
             $data_load['activite_data'] = $this->Model_activite_order->select_in_activite($arr_cond);
             $this->load->view('admin/familys_views/activites_orders/all_activites_orders/get_activite_data', $data_load);
         
         }elseif($this->input->post('type_id_fk') && $this->input->post('mother_num')&&
                 $this->input->post('active_id') && $this->input->post('start_id')  ){
            $type =$this->input->post('type_id_fk');
            $mother_national_num_fk =$this->input->post('mother_num');
           if($type == 1){
             $data_load["mother"]= $this->Model_activite_order->select_search_mother($mother_national_num_fk);
             $data_load["member"]= $this->Model_activite_order->select_search_member($mother_national_num_fk);
           }elseif($type == 2){
               $data_load["member"]= $this->Model_activite_order->select_search_member($mother_national_num_fk);
           }elseif($type == 3){
               $data_load["mother"]= $this->Model_activite_order->select_search_mother($mother_national_num_fk);
           }elseif($type == 4){
               $data_load["member"]= $this->Model_activite_order->select_search_member($mother_national_num_fk);
           }
             $codition=array("activity_id_fk"=>$this->input->post('active_id'),"start_activ_id_fk"=>$this->input->post('start_id') );
             $data_load["person_in"]=$this->Model_activite_order->select_membet_in($codition);
          //$this->test($data["person_in"]);
             $this->load->view('admin/familys_views/activites_orders/all_activites_orders/get_family', $data_load);

         }else {
               $arr_cond = array("start_activity.from_date <="=>time(),"start_activity.to_date >="=>time());
             $data['all_activite'] = $this->Model_activite_order->select_in_activite($arr_cond);
           //  $data['all_programs'] = $this->Model_activite_order->select_activite(0);
             $data['all_places'] = $this->Model_activite_order->select_places($arr_cond);
             $data['title'] = 'مستفيدين المشروع  ';
             $data['metakeyword'] = 'مستفيدين المشروع  ';
             $data['metadiscription'] = 'مستفيدين المشروع  ';
             $data['subview'] = 'admin/familys_views/activites_orders/all_activites_orders/add_activites_orders';
             $this->load->view('admin_index', $data);
         }
     }
 /***************************************************************************/
 
 /*
 public function presentMembers()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        $data['activities'] = $this->Present_members->loadActivities();
        $data['title']="إثبات حضور";
        $data['subview'] = 'admin/familys_views/activites_orders/presentMembers';
        $this->load->view('admin_index', $data);
    }

    public function attendance()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        $this->Present_members->attendance($this->input->post('attend'),$this->input->post('id'));
    }

    public function programRun()
    {
        if($this->input->post('save')) {
            $this->load->model('familys_models/activites_orders/Present_members');
            $this->Present_members->programRun();
            redirect('family_controllers/activites_orders/ActivitesOrders/programRun','refresh');
        }
        $this->load->model('familys_models/activites_orders/Present_members');
        $data['activities'] = $this->Present_members->loadActivities();
        $data['title']="تنفيذ برنامج";
        $data['subview'] = 'admin/familys_views/activites_orders/programRun';
        $this->load->view('admin_index', $data);
    }
    */
    
    public function presentMembers()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        $data['activities'] = $this->Present_members->loadActivities(array('from_id_fk!='=>0));
        $data['title']="إثبات حضور";
        $data['subview'] = 'admin/familys_views/activites_orders/presentMembers';
        $this->load->view('admin_index', $data);
    }

    public function attendance()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        $this->Present_members->attendance($this->input->post('attend'),$this->input->post('id'));
    }

    public function programRun()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        if($this->input->post('save')) {
            $this->Present_members->programRun();
            redirect('family_controllers/activites_orders/ActivitesOrders/programRun','refresh');
        }
        $data['activities'] = $this->Present_members->loadActivities(array('from_id_fk!='=>0));
        $data['title']="تنفيذ برنامج";
        $data['subview'] = 'admin/familys_views/activites_orders/programRun';
        $this->load->view('admin_index', $data);
    }

    public function R_programs()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        $data['programs'] = $this->Present_members->programs();
        $data['title']="تقرير البرامج";
        $data['subview'] = 'admin/familys_views/activites_orders/R_programs';
        $this->load->view('admin_index', $data);
    }

    public function get_programs()
    {
        $this->load->model('familys_models/activites_orders/Present_members');
        $data['records'] = $this->Present_members->getStartActivity(array('start_activity.id'=>$this->input->post('id')));
        $this->load->view('admin/familys_views/activites_orders/get_programs', $data);
    }

    
 /********************************************************************/
        
   public function prog_details($id)	// family_controllers/activites_orders/ActivitesOrders/prog_details
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');

        $data['records'] = $this->Prog_actives->select_start_activity(array("id"=>$id));

    //  $this->test($data['records']);
      
      
        $data['title'] = 'تقرير بتفاصيل النشاط';
        $data['subview'] = 'admin/familys_views/activites_orders/reports/prog_details';
        $this->load->view('admin_index', $data);
    }    

} // END CLASS 
?>