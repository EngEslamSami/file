
<?php
class Settings extends MY_Controller
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
    public function index(){}

    public function add_programs()	// family_controllers/activites_orders/Settings/add_programs
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if ($this->input->post('add')){
            $this->Prog_actives->insert();
            $this->message('success','إضافة برنامج');
            redirect('family_controllers/activites_orders/Settings/add_programs','refresh');
        }
        $data['records'] = $this->Prog_actives->select_all();
        //$this->test($data['records']);
        $data['title'] = 'اٍدارة البرامج';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/programs';
        $this->load->view('admin_index', $data);
    }


    public function update_program($id)  // family_controllers/activites_orders/Settings/update_program
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if($this->input->post('update')){
            $this->Prog_actives->update($id);
            $this->message('success','تعديل البرنامج');
            redirect('family_controllers/activites_orders/Settings/add_programs','refresh');
        }
        $data['results']=$this->Prog_actives->getById($id);
        $data['title'] = 'تعديل البرنامج';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/programs';
        $this->load->view('admin_index', $data);
    }

    public function delete_program($id)
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        $this->load->model('Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("prog_activites",$Conditions_arr);
        redirect('family_controllers/activites_orders/Settings/add_programs');
    }

    public function add_actives()	// family_controllers/activites_orders/Settings/add_actives
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        $this->load->model('Difined_model');
        if ($this->input->post('add')){
            $this->Prog_actives->insert_sub();
            $this->message('success','إضافة نشاط');
            redirect('family_controllers/activites_orders/Settings/add_actives','refresh');
        }
        $data['records'] = $this->Prog_actives->select_main();
        $data['title'] = 'إضافة نشاط';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/actives';
        $this->load->view('admin_index', $data);
    }

    public function update_actives($id) // family_controllers/activites_orders/Settings/update_actives
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if($this->input->post('update')){
            $this->Prog_actives->update_sub($id);
            $this->message('success','تعديل نشاط');
            redirect('family_controllers/activites_orders/Settings/add_actives','refresh');
        }
        $data['records'] = $this->Prog_actives->select_main();
        $data['results']=$this->Prog_actives->getById($id);
        $data['title'] = 'تعديل نشاط';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/actives';
        $this->load->view('admin_index', $data);
    }


  public function load_members_num(){
    if ($this->input->post('num') != 0) {
       $this->load->view('admin/familys_views/activites_orders/setting/programs/get_members_load');
     }
 }

  public function load_item_num(){
    if ($this->input->post('num') != 0) {
       $this->load->view('admin/familys_views/activites_orders/setting/programs/get_item_load');
     }
 }



public function add_members_prog()
{
        $this->load->model('familys_models/activites_orders/Prog_actives');
         if ($this->input->post('memb_num') != 0) {
               $max=$this->input->post('memb_num');
               for($x=1;$x<=$max;$x++){
              $arr[] =  $this->input->post('name'.$x.'');              
               }
               $this->Prog_actives->insert_members($arr,$this->input->post('activity_id_fk'));
            }
    redirect('family_controllers/activites_orders/Settings/add_setup_activity');

}


public function add_item_prog()
{
        $this->load->model('familys_models/activites_orders/Prog_actives');
         
        
      //  $this->test($_POST);
         if ($this->input->post('item_num') != 0) {
               $max=$this->input->post('item_num');
               for($x=1;$x<=$max;$x++){
              $arr[] =  $this->input->post('name'.$x.''); 
            //  $arr2[] =  $this->input->post('from'.$x.'');  
            //  $arr3[] =  $this->input->post('to'.$x.'');              
               }
               $this->Prog_actives->insert_items($arr,$arr2,$this->input->post('activity_id_fk'));
            } 
    redirect('family_controllers/activites_orders/Settings/add_setup_activity');

}



 



// اماكن مستفيدي البرامج 

    public function add_places()	// family_controllers/activites_orders/Settings/add_places
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if ($this->input->post('add')){
            $this->Prog_actives->insert_place();
            $this->message('success','إضافة مكان');
            redirect('family_controllers/activites_orders/Settings/add_places','refresh');
        }
        $data['records'] = $this->Prog_actives->select_all_places();
        //$this->test($data['records']);
        $data['title'] = 'اٍدارة الاماكن';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/prog_places';
        $this->load->view('admin_index', $data);
    }

public function add_setup_activity()	// family_controllers/activites_orders/Settings/add_setup_activity
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
         $this->load->model('Difined_model');
        if ($this->input->post('add')){
            $this->Prog_actives->insert_setup_activity();
            $this->message('success','إقامة نشاط ');
            redirect('family_controllers/activites_orders/Settings/add_setup_activity','refresh');
        }elseif ($this->input->post('band_num') && $this->input->post('activity_id') ){  // 
            $this->load->view('admin/familys_views/activites_orders/setting/programs/get_band_maly');
        }elseif ($this->input->post('band_okhra') && $this->input->post('activity_id') ){
            $data['last_num'] = $this->Difined_model->select_last_id("start_activity_items");
            $this->load->view('admin/familys_views/activites_orders/setting/programs/get_band_okhra',$data);
        }else{

        $data['records'] = $this->Prog_actives->select_all_setup_actives();
        $data['programs'] = $this->Prog_actives->select_main();
        $data['places'] = $this->Prog_actives->select_all_places();
        //$this->test($data['records']);
        $data['title'] = 'إقامة نشاط';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/setup_activity';
        $this->load->view('admin_index', $data);
    }
    }
    public function update_place($id)  // family_controllers/activites_orders/Settings/update_program
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if($this->input->post('update')){
            $this->Prog_actives->update_place($id);
            $this->message('success','تعديل المكان');
            redirect('family_controllers/activites_orders/Settings/add_places','refresh');
        }
        $data['results']=$this->Prog_actives->getPlaceById($id);
        $data['title'] = 'تعديل المكان';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/prog_places';
        $this->load->view('admin_index', $data);
    }

    public function delete_place($id)
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        $this->load->model('Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("places_prog_settings",$Conditions_arr);
        redirect('family_controllers/activites_orders/Settings/add_places');
    }
	
	/*************************************/
	


 public function get_actives() //family_controllers/activites_orders/Settings/update_setup_activity
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        $program_id =  $this->input->post('activity_id');

        $data['actives'] = $this->Prog_actives->select_sub($program_id);

        $this->load->view('admin/familys_views/activites_orders/setting/programs/get_activity',$data);
    }


    public function update_setup_activity($id)  // family_controllers/activites_orders/Settings/update_setup_activity
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if($this->input->post('update')){
            $this->Prog_actives->update_setup_activity($id);
            $this->message('success','تعديل اٍقامة النشاط');
            redirect('family_controllers/activites_orders/Settings/add_setup_activity','refresh');
        }

        $data['records'] = $this->Prog_actives->select_all_setup_actives();
        $data['programs'] = $this->Prog_actives->select_main();
        $data['places'] = $this->Prog_actives->select_all_places();
        $data['results']=$this->Prog_actives->setup_activity_ById($id);

     //   $data['actives']=$this->Prog_actives->select_allActivity_ById($data['results']->active_id_fk);
     $data['actives']=$this->Prog_actives->select_allActivity_ById($data['results']->prog_id_fk);

       // $this->test($data['actives']);
        $data['title'] = 'تعديل اٍقامة النشاط';
        $data['subview'] = 'admin/familys_views/activites_orders/setting/programs/setup_activity';
        $this->load->view('admin_index', $data);
    }

    public function delete_setup_activity($id)
    {
        $this->load->model('familys_models/activites_orders/Prog_actives');
        $this->load->model('Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("start_activity ",$Conditions_arr);
        redirect('family_controllers/activites_orders/Settings/add_setup_activity');
    }




    public function add_band_maly($id){
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if ($this->input->post('add_band_maly') ==='add_band_maly'){
            $this->Prog_actives->insert_band_maly($id);
            $this->message('success','إضافة بند مالي ');
            redirect('family_controllers/activites_orders/Settings/add_setup_activity','refresh');
        }
    }
    public function add_band_okhra($id){
        $this->load->model('familys_models/activites_orders/Prog_actives');
        if ($this->input->post('add_band_okhra') ==='add_band_okhra'){
            $this->Prog_actives->insert_band_okhra($id);
            $this->message('success','إضافة بنود أخري ');
            redirect('family_controllers/activites_orders/Settings/add_setup_activity','refresh');
        }
    }
    public function delete_band_maly($id){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("start_activity_finance",array('id'=>$id));
        $this->message('success','حذف  بند مالى ');
        redirect('family_controllers/activites_orders/Settings/add_setup_activity','refresh');

    }
    public function delete_band_okhra($id){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("start_activity_items",array('id'=>$id));
        $this->message('success','حذف بنود أخري ');
        redirect('family_controllers/activites_orders/Settings/add_setup_activity','refresh');

    }
    
    
    
    
 public function print_setup_activity($id)// family_controllers/activites_orders/Settings/print_setup_activity
    {
    
       // $this->load->model('familys_models/activites_orders/Prog_actives');
       // $data['record'] = $this->Prog_actives->select_all_setup_actives_by_id($id);
         $this->load->model('familys_models/activites_orders/Prog_actives');
         $data['records'] = $this->Prog_actives->select_start_activity(array("id"=>$id));
        $this->load->view('admin/familys_views/activites_orders/print/print_setup_actives', $data);
    }

} // END CLASS 
?>