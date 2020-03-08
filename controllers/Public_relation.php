<?php
class Public_relation extends MY_Controller
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
        $this->load->model('system_management/Groups');
        
          $this->load->model('Public_relations/Report_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
         
         $this->load->model('Public_relations/News_model');
    }
    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '100000000';
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
    
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1000000000';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
 //-----------------------------------------   
 private function message($type,$text){
if($type =='success') {
return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
}elseif($type=='wiring'){
return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
}elseif($type=='error'){
return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
                                                </div>');
}
        }
  /**
     * ==============================================================================================================
     *                                ALL FUnction 
     *
     * ===============================================================================================================
     */      
        public function work_donation($id){   // 
        $this->load->model('Public_relations/Relation');
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->insert_work_donation($file);
            $this->message('success','إضافة الأعمال');
            redirect('Public_relation/work_donation/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->update_work($id,$file);
            $this->message('success','تعديل الأعمال');
            redirect('Public_relation/work_donation/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Relation->getById_work($id);
            $data['subs'] = $this->Relation->select_sub($data['result']['main_field_id']);
        }
            
        if($this->input->post('main') || $this->input->post('num')){
            if($this->input->post('main') != ''){
                $data['subs']=$this->Relation->select_sub($this->input->post('main'));
                $this->load->view('admin/public_relations/get_sub_fields',$data);
            }
            if($this->input->post('num') != 0)
                $this->load->view('admin/public_relations/get_sub_fields');
        }
        else{    
            $data['records'] = $this->Relation->select_main(0);
            $data['main'] = $data['records'][0];
            $data['records2'] = $this->Relation->select_main(1);
            $data['sub'] = $data['records2'][0];
            $data['table'] = $this->Relation->select_work_donation();            
            $data['subview'] = 'admin/public_relations/work_donation';
            $this->load->view('admin_index', $data);
        }
    }
   /* public function programs($id){
        $this->load->model('Public_relations/Programs');
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'logo';
            $file = $this->upload_image($file_name);
            $this->Programs->insert($file);
            $this->message('success','إضافة برنامج');
            redirect('Public_relation/programs/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'logo';
            $file = $this->upload_image($file_name);
            $this->Programs->update($id, $file);
            $this->message('success','تعديل برنامج');
            redirect('Public_relation/programs/0','refresh');
        }
        if($this->input->post('code')){
            $this->db->where('id',$this->input->post('code'));
            $this->db->delete('programs_photo');
        }
        if($this->input->post('num')){
            $this->load->view('admin/public_relations/load_program_titles');
        }
        if($id != 0)
            $data['result']=$this->Programs->getById($id);
            
        $data['table'] = $this->Programs->select('');
        $data['all'] = $this->Programs->select_photo('');
        $data['photo'] = $data['all'][0];
        $data['video'] = $data['all'][1];
        $data['subview'] = 'admin/public_relations/programs';
        $this->load->view('admin_index', $data);
    }*/
    
    
        public function programs($id){
        $this->load->model('Public_relations/Programs');
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'logo';
            $file = $this->upload_image($file_name);


            $file_name2 = 'icon';
            $icon = $this->upload_image($file_name2);
            $this->Programs->insert($file,$icon);
            $this->message('success','إضافة برنامج');
            redirect('Public_relation/programs/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'logo';
            $file = $this->upload_image($file_name);

            $file_name2 = 'icon';
            $icon = $this->upload_image($file_name2);

            $this->Programs->update($id, $file,$icon);
            $this->message('success','تعديل برنامج');
            redirect('Public_relation/programs/0','refresh');
        }
        if($this->input->post('code')){
            $this->db->where('id',$this->input->post('code'));
            $this->db->delete('programs_photo');
        }
        if($this->input->post('num')){
            $this->load->view('admin/public_relations/load_program_titles');
        }
      
            $data['result']=$this->Programs->getById($id);
            
        $data['table'] = $this->Programs->select('');
        $data['all'] = $this->Programs->select_photo('');
        $data['photo'] = $data['all'][0];
        $data['video'] = $data['all'][1];
        $data['subview'] = 'admin/public_relations/programs';
        $this->load->view('admin_index', $data);
    }
    
    
    public function delete_donation($id,$page){
        $this->load->model('Public_relations/Relation');
        $this->Relation->delete_work_donation($id);
        redirect('Public_relation/'.$page.'/0','refresh');
    }
     public function programs_about($id){ 
        $this->load->model('Public_relations/Programs');
        
        if($this->input->post('add') && $id == 0){
            $this->Programs->insert_about();
            $this->message('success','إضافة عن برنامج');
            redirect('Public_relation/programs_about/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Programs->update_about($id);
            $this->message('success','تعديل عن برنامج');
            redirect('Public_relation/programs_about/0','refresh');
        }
        if($this->input->post('main')){
            $data['titles']=$this->Programs->select_title($this->input->post('main'));
            $this->load->view('admin/public_relations/load_program_titles',$data);
        }
        if($id != 0)
            $data['result']=$this->Programs->getById_about($id);
            
        $data['programs'] = $this->Programs->select('');
        $data['table'] = $this->Programs->select_about();
        $data['subview'] = 'admin/public_relations/programs_about';
        $this->load->view('admin_index', $data);
    }
     public function delete_about($id,$page){
        $this->load->model('Public_relations/Programs');
        $this->Programs->delete_about($id);
        redirect('Public_relation/'.$page.'/0','refresh');
    }
    
    public function delete_programs($id,$page){
        $this->load->model('Public_relations/Programs');
        $this->Programs->delete($id);
        redirect('Public_relation/'.$page.'/0','refresh');
    }
    
    public function add_journalist(){
        $this->load->model('Public_relations/Journalist');

        if ($this->input->post('add_news')){

            for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_image($file_name);
            }
            $file_name='logo';
            $file2= $this->upload_image($file_name);

            $this->Journalist->insert($file,$file2);
            $this->message('success','إضافة خبر صحفي');
            redirect('Public_relation/add_journalist','refresh');
        }
        $data['records']=$this->Journalist->select("");
        if($data['records']){
            for($r = 0 ; $r < count($data['records']) ; $r++)
                $data['user'][$r]=$this->Journalist->display($data['records'][$r]->publisher);}


        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/public_relations/journalist/photos', $data);
            }
        }else{
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'إضافة أخبار الملف الصحفي';
        $data['metakeyword'] = 'إعدادات الأخبار الصحفية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/journalist';
        $this->load->view('admin_index', $data);
        }
    }
    public function delete_journalist($id){
        $this->load->model('Public_relations/Journalist');
        $this->Journalist->delete($id);
        redirect('Public_relation/add_journalist','refresh');
    }

    public function suspend_journalist($id,$clas){
        $this->load->model('Public_relations/Journalist');

        $this->Journalist->suspend($id,$clas);
        if($clas == 'danger')
            $this->message('success','الخبر نشط');
        else
            $this->message('success','الخبر غير نشط');
        redirect('Public_relation/add_journalist');
    }

    public function update_journalist($id){
        $this->load->model('Public_relations/Journalist');

        if($this->input->post('update')){

            if($this->input->post('photo_num'))
            {
                if($this->input->post('photo_num') != 0)
                {
                    for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
                    {
                        $file_name='img'.$x;
                        $file[]= $this->upload_image($file_name);
                    }
                }
            }else{
                $file = '';
            }

            $file_name='logo';
            $file2= $this->upload_image($file_name);

            $this->Journalist->update($id,$file2,$file);
            $this->message('success','تعديل الخبر الصحفي');
            redirect('Public_relation/add_journalist','refresh');
        }
        $data['result']=$this->Journalist->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل خبر صحفي';
        $data['metakeyword'] = 'إعدادات الأخبار الصحفية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/journalist';
        $this->load->view('admin_index', $data);

    }

    public function delete_photo_($id,$index){
        $this->load->model('Public_relations/Journalist');
        $this->Journalist->delete_photo($id,$index);
        redirect('Public_relation/update_journalist/'.$id.'');
    }
        public function add_album(){
        $this->load->model('Public_relations/Album');

        if ($this->input->post('add_album')){

            for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_image($file_name);
            }

            $this->Album->insert($file);
            $this->message('success','إضافة صور');
            redirect('Public_relation/add_album','refresh');
        }
       // $config=$this->pagnate('add_album',$this->Album->record_count(),50);
        $data['records']=$this->Album->select();
        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/album/photos', $data);
            }
        }
        else{
            $data["links"] = $this->pagination->create_links();
            $data['title'] = 'إضافة صور';
            $data['metakeyword'] = 'إعدادات مكتبة الصور';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/public_relations/album/album';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_album($id){
        $this->load->model('Public_relations/Album');
        $this->Album->delete($id);
        redirect('Public_relation/add_album','refresh');
    }
    public function update_album($id){
        $this->load->model('Public_relations/Album');

        if($this->input->post('update_album')){

            if($this->input->post('photo_num'))
            {
                if($this->input->post('photo_num') != 0)
                {
                    for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
                    {
                        $file_name='img'.$x;
                        $file[]= $this->upload_image($file_name);
                    }
                }
            }
            else
                $file = '';

            $this->Album->update($id,$file);
            $this->message('success','تعديل الصور');
            redirect('Public_relation/add_album','refresh');
        }
        $data['result']=$this->Album->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الصور';
        $data['metakeyword'] = 'إعدادات مكتبة الصور';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/album/album';
        $this->load->view('admin_index', $data);

    }

    public function delete_photo_album($id,$index){
        $this->load->model('Public_relations/Album');
        $this->Album->delete_photo($id,$index);
        redirect('Public_relation/update_album/'.$id.'');
    }
    public function video(){

        $this->load->model('Public_relations/Video');
        if ($this->input->post('add')) {
            $this->Video->insert();
            $this->message('success', 'إضافة فيديو');
            redirect('Public_relation/video', 'refresh');
        }
        $data['records'] = $this->Video->select();
        $data['title'] = 'إضافة فيديو';
        $data['metakeyword'] = 'إعدادات الفيديو';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/public_relations/video/video';
        $this->load->view('admin_index',$data);

    }

    public function delete_video($id)
    {
        $this->load->model('Public_relations/Video');
        $this->Video->delete($id);
        $this->message('success', 'حذف الفيديو');
        redirect('Public_relation/video', 'refresh');
    }

    public function update_video($id)
    {
        $this->load->model('Public_relations/Video');

        if ($this->input->post('update')) {
            $this->Video->update($id);
            $this->message('success', 'تعديل الفيديو');
            redirect('Public_relation/video', 'refresh');
        }
        $data['result'] = $this->Video->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الفيديو .';
        $data['metakeyword'] = 'اعدادات الفيديو ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/video/video';
        $this->load->view('admin_index', $data);
    }
    
    public function addreports(){
        $this->load->model('Public_relations/Report');
        if ($this->input->post('add_report')){
            $file_name='file';
            $file= $this->upload_file($file_name);
            $img_name='img';
            $img= $this->upload_image($img_name);
            //echo  $img;
            $this->Report->insert($file,$img);
            $this->message('success','إضافةتقرير');
            redirect('Public_relation/addreports');
        }
        $data['records']=$this->Report->select();
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'إضافة تقرير';
        $data['metakeyword'] = 'إعدادات التقارير السنوية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/reports/reports';
        $this->load->view('admin_index', $data);
    }
    public function deletereports($id){
        $this->load->model('Public_relations/Report');
        $this->Report->delete($id);
        redirect('Public_relation/addreports');
    }
    public function updatereports($id){
        $this->load->model('Public_relations/Report');
        if($this->input->post('update_report')){
            $img_name='img';
            $img= $this->upload_image($img_name);
            $file_name='file';
            $file= $this->upload_file($file_name);
            $this->Report->update($id,$file,$img);
            $this->message('success','تعديل التقرير بنجاح');
            redirect('Public_relation/addreports','refresh');
        }
        $data['result']=$this->Report->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل تقرير';
        $data['metakeyword'] = 'إعدادات  التقارير السنوية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/reports/reports';
        $this->load->view('admin_index', $data);

    }
	
	
	
    public function suspendreports($id,$clas){
        $this->load->model('Public_relations/Report');

        $this->Report->suspend($id,$clas);
        if($clas == 'danger')
            $this->message('success','التقرير نشط');
        else
            $this->message('success','التقرير غير نشط');
        redirect('Public_relation/addreports');
    }
    public function download($file)
    {

        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);
        redirect('Public_relation/addreports','refresh');
    }

  /**
   *   ==========================================================================================================
   * 
   * 
   * 
   *  */
    public function sub_fields($id){
    $this->load->model('Public_relations/Relation');
    if($this->input->post('add') && $id == 0){
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->insert_sub($file);
        $this->message('success','إضافة مجال فرعي');
        redirect('Public_relation/sub_fields/0', 'refresh');
    }
    if($this->input->post('add') && $id != 0){
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->update_sub($id,$file);
        $this->message('success','تعديل مجال فرعي');
        redirect('Public_relation/sub_fields/0','refresh');
    }
    if($id != 0){
        $data['result']=$this->Relation->getById_main($id);
    }
    $data['records'] = $this->Relation->select_main(0);
    $data['main'] = $data['records'][0];
    $data['records'] = $this->Relation->select_main(1);
    $data['table'] = $data['records'][1];
    $data["links"] = $this->pagination->create_links();
    $data['title'] = 'إضافة مجال الفرعي';
    $data['metakeyword'] = 'إعدادات المجال الفرعي';
    $data['subview'] = 'admin/public_relations/sub_fields';
    $this->load->view('admin_index', $data);
}



public function index($id){
    $this->load->model('Public_relations/Relation');

    if($this->input->post('add') && $id == 0){
        $this->Relation->insert_main();
        $this->message('success','إضافة مجال رئيسي');
        redirect('Public_relation/index/0', 'refresh');
    }
    if($this->input->post('add') && $id != 0){
        $this->Relation->update_main($id);
        $this->message('success','تعديل مجال رئيسي');
        redirect('Public_relation/index/0','refresh');
    }
    if($id != 0){
        $data['result']=$this->Relation->getById_main($id);
    }
    $data['records'] = $this->Relation->select_main(0);
    $data['table'] = $data['records'][0];
    $data["links"] = $this->pagination->create_links();
    $data['metakeyword'] = 'إعدادات المجال رئيسي';
    $data['subview'] = 'admin/public_relations/public_relations';
    $this->load->view('admin_index', $data);
}


public function success($id)
{
    $this->load->model('Public_relations/Relation');
    $data['table'] = $this->Relation->select_success();

    if ($this->input->post('add') && $id == 0) {
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->insert_success($file);
        $this->message('success', 'إضافة شريك نجاح');
        redirect('Public_relation/success/0', 'refresh');
    }
    if ($this->input->post('add') && $id != 0) {
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->update_success($id, $file);
        $this->message('success', 'تعديل شريك نجاح');
        redirect('Public_relation/success/0', 'refresh');
    }
    if ($id != 0){
        $data['result'] = $this->Relation->getById_success($id);
    }
    $data["links"] = $this->pagination->create_links();
    $data['metakeyword'] = 'إعدادات شريك نجاح';
    $data['subview'] = 'admin/public_relations/success';
    $this->load->view('admin_index', $data);

}

public function delete_success($id,$page){
    $this->load->model('Public_relations/Relation');
    $this->Relation->delete_success($id);
    redirect('Public_relation/'.$page.'/0','refresh');
}


public function delete_main($id,$page){
    $this->load->model('Public_relations/Relation');
    if($page == 'sub_fields'){
        $this->Relation->delete_sub($id);
    }else{
        $this->Relation->delete_main($id);
    }
    redirect('Public_relation/'.$page.'/0','refresh');
}
/***************************************************************/


public function main_photo($id)
{     //   Public_relation/main_photo/0
    $this->load->model('Public_relations/Relation');
    $data['table'] = $this->Relation->select_main_photo();

    if ($this->input->post('add') && $id == 0) {
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->insert_main_photo($file);
        $this->message('success', 'إضافة شريك نجاح');
        redirect('Public_relation/main_photo/0', 'refresh');
    }
    if ($this->input->post('add') && $id != 0) {
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->update_main_photo($id, $file);
        $this->message('success', 'تعديل شريك نجاح');
        redirect('Public_relation/main_photo/0', 'refresh');
    }
    if ($id != 0){
        $data['result'] = $this->Relation->getById_main_photo($id);
    }
    $data["links"] = $this->pagination->create_links();
    $data['metakeyword'] = 'إعدادات شريك نجاح';
    $data['subview'] = 'admin/public_relations/main_photo';
    $this->load->view('admin_index', $data);

}

public function delete_main_photo($id){
    $this->load->model('Public_relations/Relation');
    $this->Relation->delete_main_photo($id);
    redirect('Public_relation/main_photo/0','refresh');
}






 /**
   *   ==========================================================================================================
   * 
   * 
   * 
   *  */
   
  /*  public function add_main_data(){
        $this->load->model('Public_relations/Main_data');
        if ($this->input->post('add')){
            $file_name='logo';
            $file= $this->upload_image($file_name);
            $this->Main_data->insert($file);
            $this->message('success','إضافة البيانات الأساسية');
            redirect('Public_relation/add_main_data');
        }
        $data['table']=$this->Main_data->select('',0);
        $data['result']=$this->Main_data->getById(0);
        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/public_relations/'.$page.'', $data);
            }
        }
        else{
            $data['title']="البيانات الاساسيه";
        $data['subview'] = 'admin/public_relations/main_data';
        $this->load->view('admin_index', $data);}
    }
     public function update_main_data($id){
        $this->load->model('Public_relations/Main_data');
        if($this->input->post('add')){
            $file_name='logo';
            $file= $this->upload_image($file_name);
            $this->Main_data->update($id,$file);
            $this->message('success','تعديل البيانات الأساسية');
            redirect('Public_relation/add_main_data','refresh');
        }
        $data['table'] = '';
        $data['result']=$this->Main_data->getById($id);
        $data['subview'] = 'admin/public_relations/main_data';
        $this->load->view('admin_index', $data);

    }
    
    public function delete($from,$id,$index){
        $data['title']="البيانات الاساسيه";
        $this->load->model('Public_relations/Main_data');
        $this->Main_data->delete($from,$id,$index);
        redirect('Public_relation/update_main_data/'.$id.'');
    }
   */
   
     public function add_main_data(){
        $this->load->model('Public_relations/Main_data');
        if ($this->input->post('add')){
            $file_name='logo';
            $file= $this->upload_image($file_name);
            $this->Main_data->insert($file);
            $this->message('success','إضافة البيانات الأساسية');
            redirect('Public_relation/add_main_data');
        }
        $data['table']=$this->Main_data->select('',0);
        $data['result']=$this->Main_data->getById(0);
        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/public_relations/'.$page.'', $data);
            }
        }
        else{
            $data['title']="البيانات الاساسيه";
        $data['subview'] = 'admin/public_relations/main_data';
        $this->load->view('admin_index', $data);}
    }
     public function update_main_data($id){
        $this->load->model('Public_relations/Main_data');
        if($this->input->post('add')){
            $file_name='logo';
            $file= $this->upload_image($file_name);
            $this->Main_data->update($id,$file);
            $this->message('success','تعديل البيانات الأساسية');
            redirect('Public_relation/add_main_data','refresh');
        }
        $data['table'] = '';
        $data['result']=$this->Main_data->getById($id);
        $data['subview'] = 'admin/public_relations/main_data';
        $this->load->view('admin_index', $data);

    }
    
    public function delete($from,$id,$index){
        $data['title']="البيانات الاساسيه";
        $this->load->model('Public_relations/Main_data');
        $this->Main_data->delete($from,$id,$index);
        redirect('Public_relation/update_main_data/'.$id.'');
    }
   
     public function about_us(){
    $this->load->model("Public_relations/About");
    $this->load->model("Public_relations/Difined_model");
            if($this->input->post("add")){
               $this->About->insert(); 
               $this->message('success', 'إضافة المقطع');
            redirect('Public_relation/about_us', 'refresh');   
            }       
     $data['all_table']=$this->Difined_model->select_all("about","","","",'');         
     $data['records']=$this->Difined_model->select_all("about","","","",'');      
     $data["select_in"]=$this->About->select_in();
     $data['title']="من نحن";
          $data['subview'] = 'admin/public_relations/about_us';
    $this->load->view('admin_index', $data);   
 }
 //-----------------------------------
 public function update_about_us($id){
   $this->load->model("Public_relations/About");
     $this->load->model("Public_relations/Difined_model");
         if($this->input->post("edit")){
               $this->About->update($id); 
               $this->message('success', 'تعديل المقطع');
            redirect('Public_relation/about_us', 'refresh');   
            }     
     $data['result']=$this->Difined_model->getById("about",$id); 
     $data['all_table']=$this->Difined_model->select_search_key("about","id !=",$id); 
     $data['title']="من نحن";
      $data['subview'] = 'admin/public_relations/about_us';
    $this->load->view('admin_index', $data);   
 }
 //-------------------------------------
  public function delete_id($id,$table,$controller){
     $this->load->model("Public_relations/Difined_model");
    $this->load->model("Public_relations/News");
    $Conditions_arr=array("id" =>$id);
    $this->Difined_model->delete($table,$Conditions_arr);
    if($table == "news"){
     $this->News->delete_where($id);
     $this->News->delete_cont_news($id);
    }
    
   redirect('Public_relation/'.$controller, 'refresh');   
 }
   
   
   
   public function add_opinion(){
     $this->load->model("Public_relations/Opinion");
     $this->load->model("Public_relations/Difined_model");
         if($this->input->post("add")){
           $input_name='img';
                $file=$this->upload_image($input_name);  
        $this->Opinion->insert($file);
        $this->message('success', 'إضافة رأي');
        redirect('Public_relation/add_opinion','refresh');
     }
         $data['records']=$this->Difined_model->select_all("opinions","","","",'');      
  $data['title']="الأراء عن  الجمعيه";
     $data['subview'] = 'admin/public_relations/opinions';
    $this->load->view('admin_index', $data);  
 }
//------------------------------------------------------------- 
 public function update_opinion($id){
      $data['title']="الأراء عن  الجمعيه";
     $this->load->model("Public_relations/Opinion");
     $this->load->model("Public_relations/Difined_model");
     if($this->input->post("edit")){
            $input_name='img';
                $file=$this->upload_image($input_name);  
    $this->Opinion->update($id,$file); 
        $this->message('success', 'تعديل رأي');
        redirect('Public_relation/add_opinion','refresh');
     }
    
     $data['result']=$this->Difined_model->getById("opinions",$id);    
     $data['subview'] = 'admin/public_relations/opinions';
    $this->load->view('admin_index', $data);  
 }
 
  public function add_news(){
     $this->load->model("Public_relations/News");
     $this->load->model("Public_relations/Difined_model");
         if($this->input->post("add")){
              $this->News->insert_news(2);
          $last=$this->Difined_model->select_last_id('news');
           if ($this->input->post('photo_num') != 0) {
               $max=$this->input->post('photo_num');
               for($x=1;$x<=$max;$x++){
                $input_name='img'.$x;
                $file[]=$this->upload_image($input_name);
               }
               $this->News->insert_photo($last,$file);
            }
        $this->message('success', 'إضافة خبر');
        redirect('Public_relation/add_news','refresh');
     }
     $data['records']=$this->News->select(2);
   $data['title']="الاخبار";
     $data['subview'] = 'admin/public_relations/news';
    $this->load->view('admin_index', $data);  
 }
//------------------------------------------------------------- 
 public function update_news($id){
     $this->load->model("Public_relations/News");
     $this->load->model("Public_relations/Difined_model");
     if($this->input->post("edit")){
              $this->News->update_news($id);
           if ($this->input->post('photo_num') != 0) {
               $max=$this->input->post('photo_num');
               for($x=1;$x<=$max;$x++){
                $input_name='img'.$x;
                $file[]=$this->upload_image($input_name);
               }
               $this->News->insert_photo($id,$file);
            }
        $this->message('success', 'تعديل بيانات الخبر');
        redirect('Public_relation/add_news','refresh');
     }
    
     $data['result']=$this->Difined_model->getById("news",$id);    
     $data['images']=$this->News->get_photo($id);
      $data['title']="الاخبار";
     $data['subview'] = 'admin/public_relations/news';
    $this->load->view('admin_index', $data);  
 }
 
  public function load(){
    if ($this->input->post('num') != 0) {
       $this->load->view('admin/public_relations/photos');
     }
 }
 
  public function delete_photo($id,$controler,$main_id){
       $this->load->model("Public_relations/News");
     $this->News->delete_img($id);
     redirect('Public_relation/'.$controler."/".$main_id,'refresh');
    
 }
  /**
   * 
   * 
   * 
   * 
   *   */
   public function donate_with_us($id)
{
    $this->load->model('Public_relations/Relation');
    $data['table'] = $this->Relation->select_donate_with_us('');

    if ($this->input->post('add') && $id == 0) {
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->insert_donate_with_us($file);
        $this->message('success', 'إضافة الكفالة معنا');
        redirect('Public_relation/donate_with_us/0', 'refresh');
    }
    if ($this->input->post('add') && $id != 0) {
        $file_name = 'img';
        $file = $this->upload_image($file_name);
        $this->Relation->update_donate_with_us($id, $file);
        $this->message('success', 'تعديل الكفالة معنا');
        redirect('Public_relation/donate_with_us/0', 'refresh');
    }
    if ($id != 0){
        $data['result'] = $this->Relation->getById_donate_with_us($id);
    }
    $data["links"] = $this->pagination->create_links();
    $data['metakeyword'] = 'إعدادات الكفالة معنا';
    $data['subview'] = 'admin/public_relations/donate_with_us';
    $this->load->view('admin_index', $data);

}

public function delete_donate_with_us($id,$page){
    $this->load->model('Public_relations/Relation');
    $this->Relation->delete_donate_with_us($id);
    redirect('Public_relation/'.$page.'/0','refresh');
}
   
  
  
  
  public function programs_photo(){
        $this->load->model('Public_relations/Programs');
        
        if(count($_FILES['imgs']['name']) > 0){
            $filesCount = count($_FILES['imgs']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['imgs']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['imgs']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['imgs']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['imgs']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['imgs']['size'][$i];

                $uploadPath = 'uploads/images';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $file = $fileData['file_name'];
                    $this->Programs->insert_photo($file,0);
                }
            }  
        }
        if($this->input->post('videos')){
            $file = explode('=',$this->input->post('videos'));
            $this->Programs->insert_photo($file[1],1);
        }
        redirect('Public_relation/programs/0', 'refresh');
    }
     
   
   
        public function download_end($file) //Public_relation/download
        {
        
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
        redirect('Public_relation/endowment','refresh');
        }
        
        public function read_file($file_name) ////Public_relation/read_file
    {
        $this->load->helper('file');
       // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    } 
     
      /********************* الوقف    *******************/
   public function endowment(){ // // Public_relation/endowment
   $this->load->model('Public_relations/Endowment');

        if ($this->input->post('add')){
            
            $file_name='end_photo';
            $file1= $this->upload_file($file_name);
            
            $file_name2='end_pdf';
            $file2= $this->upload_file($file_name2);
            
            $this->Endowment->insert($file1,$file2); 
            
            $this->message('success','إضافة وقف');
            redirect('Public_relation/endowment','refresh');
        }
        $data['records']=$this->Endowment->select("");

        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'إضافة وقف   ';
        $data['metakeyword'] = 'إعدادات الوقف ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/endowment_view';
        $this->load->view('admin_index', $data); 
   }
      public function delete_endowment($id){
         $this->load->model('Public_relations/Endowment');
        $this->Endowment->delete($id);
        redirect('Public_relation/endowment','refresh');
    }
    
            public function update_endowment($id){
        $this->load->model('Public_relations/Endowment');

        if($this->input->post('update')){
            
            $file_name='end_photo';
            $file1= $this->upload_file($file_name);
            
            $file_name2='end_pdf';
            $file2= $this->upload_file($file_name2);
            
           
            $this->Endowment->update($id,$file1,$file2);
            $this->message('success','تعديل الوقف');
            redirect('Public_relation/endowment','refresh');
        }
        $data['result']=$this->Endowment->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الوقف';
        $data['metakeyword'] = 'إعدادات الوقف';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/endowment_view';
        $this->load->view('admin_index', $data);

    }
    
    
    
    
    /**************************************************/
    
    public function add_main()
    {
        if($this->input->post('add')){
            $data['title']=$this->input->post('main_cat');
            $this->Report_model->insert('main_society_pdf',$data);
           redirect('Public_relation/add_main','refresh');
        }
		$data['title']="اضافه فئه";
        $data['mains']=$this->Report_model->get_all();
     //   $data['subview'] = 'admin/report_view/add_category';
     $data['subview'] = 'admin/public_relations/report_view/add_category';
        $this->load->view('admin_index', $data);
            
        
    }
	
    public function update()
    {
		
         $id=$this->uri->segment(3);

        $data['row']=$this->Report_model->get_by_id($id,'main_society_pdf');
	
		
		  $data['title']="نعديل فئه";
		 if($this->input->post('add')){
			 
           
            $this->Report_model->edit_by_id();
			
           redirect('Public_relation/add_main','refresh');
		   
		 
        }
		
      
      //  $data['subview'] = 'admin/report_view/add_category';
       $data['subview'] = 'admin/public_relations/report_view/add_category';
        $this->load->view('admin_index', $data);
            	  
    }
	public function delete_item()
	{
		$id=$this->uri->segment(3);
		$this->Report_model->delete_by_id($id,'main_society_pdf');
		 redirect('Public_relation/add_main','refresh');
    }
	public function add_file()
{
	
	
	if($this->input->post('add')){
           
            
		   $file=$this->upload_file('pdf');
		   $data['main_society_id_fk']=$this->input->post('main_cat');
		   $data['name']=$this->input->post('name');
		   $data['file']=$file;
		  $this->Report_model->insert('society_pdf_files',$data);
		   
		    redirect('Public_relation/add_file','refresh');
		 
        }
	$data['files']=$this->Report_model->get_all_files();
	$data['branch']=$this->Report_model->get_all();
	$data['title']="اضافه ملفات";
//	$data['subview'] = 'admin/report_view/add_file';
    $data['subview'] = 'admin/public_relations/report_view/add_file';
     $this->load->view('admin_index', $data);
}

public function update_file()
{
 $id=$this->uri->segment(3);
$data['files']=$this->Report_model->get_all_files();
	$data['branch']=$this->Report_model->get_all();
   $data['all']=$this->Report_model->get_by_id($id,'society_pdf_files');
$data['title']="نعديل فئه";
		 if($this->input->post('add')){
          
		   
		 $this->Report_model->update_branch();
		  redirect('Public_relation/add_file','refresh');
        }
		
      
       // $data['subview'] = 'admin/report_view/add_file';
           $data['subview'] = 'admin/public_relations/report_view/add_file';
        $this->load->view('admin_index', $data);
	
	
}
public function delete_branch()
{
	$id=$this->uri->segment(3);
	$this->Report_model->delete_by_id($id,'society_pdf_files');
    redirect('Public_relation/add_file','refresh');
}
/*public function read_file()
    {
        $this->load->helper('file');
        $file_name=$this->uri->segment(3);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    } */
	public function downloads($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
         redirect('Public_relation/add_file','refresh');
    }
    
    
    
    /***************************************************/
    
       
     public function Assembly_accounts(){ // Public_relation/Assembly_accounts
        $this->load->model('Public_relations/Assembly_accounts_models');

        if ($this->input->post('add_news')){

            $this->Assembly_accounts_models->insert();
            $this->message('success','إضافة حساب للجمعية');
            redirect('Public_relation/Assembly_accounts','refresh');
        }
        $data['records']=$this->Assembly_accounts_models->select("");

        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'إضافة حسابات الجمعية   ';
        $data['metakeyword'] = 'إعدادات حسابات الجمعية ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/assembly_accounts';
        $this->load->view('admin_index', $data);
        
    } 
      public function delete_Assembly_accounts($id){
        $this->load->model('Public_relations/Assembly_accounts_models');
        $this->Assembly_accounts_models->delete($id);
        redirect('Public_relation/Assembly_accounts','refresh');
    }
    
        public function update_Assembly_accounts($id){
        $this->load->model('Public_relations/Assembly_accounts_models');

        if($this->input->post('update')){
            $this->Assembly_accounts_models->update($id);
            $this->message('success','تعديل حساب الجمعية');
            redirect('Public_relation/Assembly_accounts','refresh');
        }
        $data['result']=$this->Assembly_accounts_models->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل حساب الجمعية';
        $data['metakeyword'] = 'إعدادات حسابات الجمعية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_relations/assembly_accounts';
        $this->load->view('admin_index', $data);

    }
    
   /**
    *    =========================================================================
    * 
    *    Public_relation
    *  */
       public function add_membership_settings(){ //Public_relation/add_membership_settings
        $this->load->model("Public_relations/Membership_settings_model");
        $this->load->model("Difined_model");
        if($this->input->post("add")){
            $this->Membership_settings_model->insert();
            $this->message('success', 'إضافة إعدادات العضوية');
            redirect('Public_relation/add_membership_settings','refresh');
        }
        $data['records']=$this->Difined_model->select_all("membership_settings","","","",'');
        $data['title']="إعدادات العضوية";
        $data['subview'] = 'admin/public_relations/add_membership_settings';
        $this->load->view('admin_index', $data);
    }
    //-------------------------------------------------------------
    public function update_membership_settings($id){
        $this->load->model("Difined_model");
        $this->load->model("Public_relations/Membership_settings_model");
        if($this->input->post("edit")){
            $this->Membership_settings_model->update($id);
            $this->message('success', 'تعديل إعدادات العضوية');
            redirect('Public_relation/add_membership_settings','refresh');
        }
        $data['title']="إعدادات العضوية";
        $data['result']=$this->Difined_model->getById("membership_settings",$id);
        $data['subview'] = 'admin/public_relations/add_membership_settings';
        $this->load->view('admin_index', $data);
    }
    
    
    public  function delete_membership_settings($id){
        $this->load->model("Public_relations/Membership_settings_model");
        $this->Membership_settings_model->delete($id);
        $this->message('success', 'تم الحذف بنجاح');
        redirect('Public_relation/add_membership_settings','refresh');
    }
 /**
    *    =========================================================================
    * 
    *    Public_relation
    *  */
    
     public function add_type()
    {
        $this->load->model('Public_relations/Member_model');
        if($this->input->post('add')){
       $this->Member_model->insert();
       redirect('Public_relation/add_type','refresh');
        }
        $data['records']=$this->Member_model->get_all_data();
        $data['subview'] = 'admin/public_relations/members/member';
        $this->load->view('admin_index', $data);
    }
    public function delete_type($id)
    {
       $this->load->model('Public_relations/Member_model');
        $this->Member_model->delete($id,'members_type');
         redirect('Public_relation/add_type','refresh');
        
    }
    
    public function update_type($id)
    {
         $this->load->model('Public_relations/Member_model');
         if($this->input->post('edit')){
       $this->Member_model->update($id);
       redirect('Public_relation/add_type','refresh');
        }
      $data['row']=$this->Member_model->get_by_id($id,'members_type');
      
      $data['subview'] = 'admin/public_relations/members/member';
        $this->load->view('admin_index', $data);  
    }
    public function add_type_content()
    
    {
        $this->load->model('Public_relations/Member_model');
        if($this->input->post('add')){
       $this->Member_model->insert_table();
       redirect('Public_relation/add_type_content','refresh');
        }
        $this->load->model('Public_relations/Member_model');
        $data['records']=$this->Member_model->get_all_from_content();
        $data['types']=$this->Member_model->get_all_data();
        
        $data['subview'] = 'admin/public_relations/members/member_content';
        $this->load->view('admin_index', $data);  
    }
    public function update_type_content($id)
    {
         $this->load->model('Public_relations/Member_model');
         if($this->input->post('add')){
       $this->Member_model->update($id);
       redirect('Public_relation/add_type','refresh');
        }
      $data['row']=$this->Member_model->get_by_id($id,'members_type');
      
      $data['subview'] = 'admin/public_relations/members/member';
        $this->load->view('admin_index', $data);  
    }

    public function delete_content($id)
    {
       $this->load->model('Public_relations/Member_model');
        $this->Member_model->delete($id,'member_type_conten');
         redirect('Public_relation/add_type_content','refresh');
        
    }
    public function check_id()
    {


        $this->load->model('Public_relations/Member_model');
        echo $this->Member_model->check_data();


    }
    /*************************************************************************/
    
    
    public function addGam3iaVisitors($id=0)// Public_relation/addGam3iaVisitors
    {
        $this->load->model('Public_relations/Gam3iaVisitor');
        if ($this->input->post('add')) {
            $this->Gam3iaVisitor->insertGam3iaVisitors($id);
            $this->message('success','تم إضافة بنجاح');
            redirect('Public_relation/addGam3iaVisitors', 'refresh');
        }
        $this->load->model('human_resources_model/Employee_model');
        $emp_id=$_SESSION['emp_code'];
        $data['record']=$this->Employee_model->get_one_employee($emp_id);
        //$data['records']=$this->Gam3iaVisitor->get_all_record();
          $data['records']=$this->Gam3iaVisitor->get_all_record(array('visit_date'=>strtotime(date("Y/m/d"))));
        if($id != 0){
            $data['result']=$this->Gam3iaVisitor->get_one_vesitor($id);
            $data['records']= '';
        }
    if($_SESSION['role_id_fk'] ==3) {
        $data["roles"] = $this->Gam3iaVisitor->get_employee_role($_SESSION['emp_code']);
           }
        $data['title'] = "إضافة زائر";
        $data['subview'] = 'admin/public_relations/gam3ia_visitors/add_visitors';
        $this->load->view('admin_index', $data);
    }

    public function deleteGam3iaVisitors($id)// Public_relation/deleteGam3iaVisitors
    {
        $this->load->model('Public_relations/Gam3iaVisitor');
        $this->Gam3iaVisitor->deleteGam3iaVisitors($id);
        $this->message('success', 'تم الحذف بنجاح');
        redirect('Public_relation/addGam3iaVisitors', 'refresh');
    }

/*
    public function  reportEmpGam3iaVisitors(){ // Public_relation/reportEmpGam3iaVisitors
        $this->load->model('Public_relations/Gam3iaVisitor');
        if($this->input->post('to_date') && $this->input->post('from_date') ){
            $from= strtotime($this->input->post('from_date'));
            $to= strtotime($this->input->post('to_date'));
            echo $from;
        }else{
            $data['title'] = 'تقرير الزيارات';
       
            $data['subview'] = 'admin/public_relations/gam3ia_visitors/gam3ia_visitors_period';
            $this->load->view('admin_index', $data);
        }
    }*/
    
    
    
    

    public function  reportEmpGam3iaVisitors(){ // Public_relation/reportEmpGam3iaVisitors
        $this->load->model('Public_relations/Gam3iaVisitor');

        if($this->input->post('to_date') && $this->input->post('from_date') ){

            $from= strtotime($this->input->post('from_date'));
            $to= strtotime($this->input->post('to_date'));

            $data['result'] = $this->Gam3iaVisitor->get_familys_request_period($from,$to);

            $this->load->view('admin/public_relations/gam3ia_visitors/report_table',$data);
        }else{
            $data['title'] = 'تقرير الزيارات في الجمعية';
            $data['subview'] = 'admin/public_relations/gam3ia_visitors/gam3ia_visitors_period';
            $this->load->view('admin_index', $data);
        }

    }
    
    
    
    
    
    
    
    
    //////////////////////////////////////////// Nagwa //////////////////////////////////
    
    public function thumb_news($data)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/public_relations/news/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 75;
        $config['height'] = 50;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

    }
    private  function upload_image_news($file_name,$folder = "images"){
        $config['upload_path'] = 'uploads/images/public_relations/news';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        //$config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{



            $datafile = $this->upload->data();
            $this->thumb_news($datafile);



            return  $datafile['file_name'];
        }
    }

    private function upload_muli_image($input_name,$folder = "images"){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_image_news("userFile",$folder);
        }
        return $all_img;



    }


    public function downloads_new($file)
    { // Public_relation/downloads_new
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/images/'.$file);
        force_download($name, $data);
    }

    public function news(){ // Public_relation/news

        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_name'];
            $data['photo_view']= $this->News_model->get_user_photo($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher'] = $this->News_model->get_member_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher']= $this->News_model->get_emp_name($_SESSION['emp_code']);
            $data['photo_view']= $this->News_model->get_emp_photo($_SESSION['emp_code']);

        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher']=   $this->News_model->get_member_general_name($_SESSION['emp_code']);
            $data['photo_view']= $this->News_model->get_member_general_photo($_SESSION['emp_code']);
        }
        if($this->input->post('ADD')){
            $id =  $this->News_model->insert_publisher();


            if($this->input->post('img_name')){
                $all_img= $this->upload_muli_image("img","images");
                $this->News_model->insert_photo($all_img,$id);
            }
            if($this->input->post('video_link')){
                $this->News_model->insert_video($id);
            }


            $this->message('success','تم الاضافة بنجاح');
            redirect('Public_relation/news','refresh');
        }


        $data['subview'] = 'admin/public_relations/news_view';
        $this->load->view('admin_index', $data);

    }
    public function display_news(){ // Public_relation/display_news
        $data['display_publisher_data'] = $this->News_model->display_publisher_data();
     // $this->test( $data['display_publisher_data']);
        $data['photos'] = $this->News_model->display_photos();
        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_name'];
            $data['photo_view']= $this->News_model->get_user_photo($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher'] = $this->News_model->get_member_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher']= $this->News_model->get_emp_name($_SESSION['emp_code']);
            $data['photo_view']= $this->News_model->get_emp_photo($_SESSION['emp_code']);

        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher']=   $this->News_model->get_member_general_name($_SESSION['emp_code']);
            $data['photo_view']= $this->News_model->get_member_general_photo($_SESSION['emp_code']);
        }

        $data['subview'] = 'admin/public_relations/display_news';
        $this->load->view('admin_index', $data);

    }
    public function UpdateNews($id){ // Public_relation/UpdateNews

        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_name'];
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher'] = $this->News_model->get_member_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher']= $this->News_model->get_emp_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher']=   $this->News_model->get_member_general_name($_SESSION['emp_code']);
        }

        if($this->input->post('ADD')){
            $this->News_model->update_publisher($id);

            if($this->input->post('img_name')){
                $all_img= $this->upload_muli_image("img","images");
                $this->News_model->insert_photo($all_img,$id);

            }
            if($this->input->post('video_link')){
                $this->News_model->insert_video($id);
            }


            $this->message('success','تم التعديل بنجاح');
            redirect('Public_relation/display_news','refresh');
        }
        $data['get_publisher'] = $this->News_model->get_by_id($id);

        $data['result'] = $this->News_model->get_photos($id);
      //  $this->test($data['result']);
        $data['video'] = $this->News_model->get_videos($id);

        $data['subview'] = 'admin/public_relations/news_view';
        $this->load->view('admin_index', $data);


    }
    // __________DeletePublisher___________

    public function DeletePublisher($id){ // Public_relation/DeletePublisher

        $this->News_model->delete($id);
        $this->News_model->delete_publisher_img($id);
        $this->News_model->delete_publisher_video($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('Public_relation/display_news','refresh');
    }
    // __________DeletePhoto___________
    public function DeletePhoto($id,$publish_num){ // Public_relation/DeletePhoto

        $this->News_model->delete_img($id);
        redirect('Public_relation/UpdateNews/'.$publish_num,'refresh');

    }
    // __________DeletePhoto___________
    public function DeleteVideo($id,$publish_num){ // Public_relation/DeletePhoto

        $this->News_model->delete_video($id);
        redirect('Public_relation/UpdateNews/'.$publish_num,'refresh');

    }

    public function get_publisher_photo(){ // Public_relation/get_publisher_photo
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/familys_views/get_publisher_photos');
    }


    public function  get_publisher_video(){ // Public_relation/get_publisher_video
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/familys_views/get_videos');
    }

    //___________________Update img_stauts__________

    public function Updateimage(){  // Public_relation/Updateimage

        $id= $this->input->post('id');
        $this->News_model->update_img_status($id);
    }
    //______________________news_____________________________________
    
    public function add_setting(){
        $this->load->model('Public_relations/Gam3iaVisitor');
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');

       $fe2a_type = $this->input->post('fe2a_type');
        $this->Gam3iaVisitor->add_gam3ia_visitor_setting($type,$type_name,$fe2a_type);
        $data['result'] = $this->Gam3iaVisitor->get_setting($type,$fe2a_type);

        $data['type_name'] = $type_name;
        $this->load->view('admin/public_relations/gam3ia_visitors/load_setting',$data);


    }
   /*public function add_setting(){
        $this->load->model('Public_relations/Gam3iaVisitor');
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');
        $this->Gam3iaVisitor->add_gam3ia_visitor_setting($type,$type_name);
        $data['result'] = $this->Gam3iaVisitor->get_setting($type);
        $data['type_name'] = $type_name;
        $this->load->view('admin/public_relations/gam3ia_visitors/load_setting',$data);
    }*/
    /*public function load_settigs(){
        $this->load->model('Public_relations/Gam3iaVisitor');
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');
        $data['result'] = $this->Gam3iaVisitor->get_setting($type);
        $data['type_name'] = $type_name;
        $this->load->view('admin/public_relations/gam3ia_visitors/load_setting',$data);
    }*/
     public function load_settigs(){
        $this->load->model('Public_relations/Gam3iaVisitor');
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name'); 
        $fe2a_type = $this->input->post('fe2a_type');
        $data['result'] = $this->Gam3iaVisitor->get_setting($type,$fe2a_type);
        $data['type_name'] = $type_name;
        $this->load->view('admin/public_relations/gam3ia_visitors/load_setting',$data);
    }
    public function visitors_filter(){ // Public_relation/visitors_filter
        $this->load->model('Public_relations/Gam3iaVisitor');
        $data['records'] = $this->Gam3iaVisitor->get_all_record();
       // $data['all_emps'] = $this->Gam3iaVisitor->get_all_emp();
         //   $this->db->where('visit_date',strtotime(date("Y/m/d")));
         $data['all_emps'] = $this->Gam3iaVisitor->get_emp_visitors();
 
        $data['title'] = 'بيانات الزائرين' ;
        $data['subview'] = 'admin/public_relations/gam3ia_visitors/visitors_filter';
        $this->load->view('admin_index', $data);
    }
  
  /*  public function load_filter_page(){

        $this->load->model('Public_relations/Gam3iaVisitor');
        $date_from = $this->input->post('date_from') ;
        $date_to = $this->input->post('date_to') ;
        $degree_id = $this->input->post('degree_id') ;
        $newdate_from = date("Y/m/d",strtotime($date_from)) ;
        $newdate_to = date("Y/m/d",strtotime($date_to)) ;
        $data['title'] = 'بيانات الزائرين' ;
        $data['records'] = $this->Gam3iaVisitor->get_filter_data($newdate_from,$newdate_to,$degree_id);
        $this->load->view('admin/public_relations/gam3ia_visitors/load_filter_page',$data);
    } */  
   
  /* public function load_filter_page(){

    $this->load->model('Public_relations/Gam3iaVisitor');
    $date_from = $this->input->post('date_from') ;
    $date_to = $this->input->post('date_to') ;
    $degree_id = $this->input->post('degree_id') ;
    $newdate_from = date("Y/m/d",strtotime($date_from)) ;
    $newdate_to = date("Y/m/d",strtotime($date_to)) ;
    $data['from_date'] = $newdate_from ;
    $data['to_date'] = $newdate_to ;
    $data['degree_id'] = $degree_id ;
    $data['title'] = 'بيانات الزائرين' ;
    $data['records'] = $this->Gam3iaVisitor->get_filter_data($newdate_from,$newdate_to,$degree_id);
    $this->load->view('admin/public_relations/gam3ia_visitors/load_filter_page',$data);
}*/
   
   public function load_filter_page(){

    $this->load->model('Public_relations/Gam3iaVisitor');
    $date_from = $this->input->post('date_from') ;
    $date_to = $this->input->post('date_to') ;
    $degree_id = $this->input->post('degree_id') ;
    $fe2a = $this->input->post('fe2a') ;
    $newdate_from = date("Y/m/d",strtotime($date_from)) ;
    $newdate_to = date("Y/m/d",strtotime($date_to)) ;
    $data['from_date'] = $newdate_from ;
    $data['to_date'] = $newdate_to ;
    $data['degree_id'] = $degree_id ;
    $data['fe2a'] = $fe2a ;
    $data['title'] = 'بيانات الزائرين' ;
//    $data['records'] = $this->Gam3iaVisitor->get_filter_data($newdate_from,$newdate_to,$degree_id,$fe2a);
    $this->load->view('admin/public_relations/gam3ia_visitors/load_filter_page',$data);
}
 /*   public function visitors_data()
    {
        
        $this->load->model('Public_relations/Gam3iaVisitor');
         $f2at_arr = array(

        1 => 'الاسر',

        2 => 'الكفلاء والمتبرعين',

        3 => 'مؤسسات مانحة',

        4 => 'المتطوعين',

        5 => 'التوظيف',

        6 => 'اخري'

    );
    $yes_no = array(

        1 => 'نعم',

        2 => 'لا'

    );

         if ($this->input->post('date_from')){
           $date_from = $this->input->post('date_from') ;
            $date_to = $this->input->post('date_to') ;
             $degree_id = $this->input->post('degree_id') ;
           $newdate_from = date("Y/m/d",strtotime($date_from)) ;
            $newdate_to = date("Y/m/d",strtotime($date_to)) ;
             $records = $this->Gam3iaVisitor->get_filter_data($newdate_from,$newdate_to,$degree_id);

         }
         else{
             $records = $this->Gam3iaVisitor->get_all_record();
        }
        $arr = array();
        $arr['data'] = array();
        if (!empty($records)) {
            $x = 0;
            foreach ($records as $row) {
                $x++;
                if ($row->twasol == 1) {
                    $color = "green";
                } else {
                    $color = "red";
                }
                $timeIn = strtotime($row->visit_time_start);
                $timeOUT = strtotime($row->visit_time_end);
                $defrent = $timeOUT - $timeIn;
                $hours = floor($defrent / 3600);
                $minutes = floor(($defrent / 60) % 60);
                $time_def = 'اقل من دقيقة';
                if ($minutes > 0) {
                    $time_def = $minutes . ' دقيقة  ';
                    if ($hours > 0) {
                        $time_def .= $hours . ' و ساعة ';
                    }
                }


                if (isset($f2at_arr[$row->fe2a]) && $f2at_arr[$row->fe2a] != null) {
                    $f2at = $f2at_arr[$row->fe2a];
                } else {
                    $f2at = 'غير محدد ';
                }


                if (isset($row->name) and $row->name != null) {
                    $visitor_name = $row->name;
                } else {
                    $visitor_name = 'غير محدد ';
                }

                if (isset($yes_no[$row->twasol]) && $yes_no[$row->twasol] != null) {
                    $twasol = $yes_no[$row->twasol];
                } else {
                    $twasol = 'غير محدد ';
                }
                if (!empty($row->degree_name)) {
                    $degree_name = $row->degree_name;
                } else {
                    $degree_name = 'غير محدد';
                }
                    $a_edit = '';
                    $a_delete = '';


                    if ($_SESSION['role_id_fk'] == 3) {
                        if ((isset($roles)) && (!empty($roles))) {
                            if ($roles->edit == 1) {
                                $a_edit = '<a href="' . base_url() . 'Public_relation/addGam3iaVisitors/' . $row->id . '"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                   ';

                            }
                            if ($roles->delet == 1) {
                                $de_text = ' هل انت متاكد  من عمليه الحذف؟';
                                $a_delete = '<a href="' . base_url() . 'Public_relation/deleteGam3iaVisitors/' . $row->id . '"
                                           onclick="return confirm(' . $de_text . ');"><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>';

                            }
                        }
                    }
                    else {
                        $a_edit = '<a href="' . base_url() . 'Public_relation/addGam3iaVisitors/' . $row->id . '"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                   ';
                        $de_text = ' هل انت متاكد  من عمليه الحذف؟';
                        $a_delete = '<a href="' . base_url() . 'Public_relation/deleteGam3iaVisitors/' . $row->id . '"
                                           onclick="return confirm(' . $de_text . ');"><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>';

                    }

                    $arr['data'][] = array(
                        $x,
                        date("Y-m-d", $row->visit_date),
                        $row->visit_time_start,
                        $visitor_name,
                        $row->mob,
                        $f2at,
                        word_limiter($row->purpose, 4) . '
                     <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    onclick="get_text(\'' . $row->purpose . '\',\'' . $row->natega_visit . '\')"
                                    data-target="#purpose_detail">
                                تفاصيل
                            </button>
                    ',
                        '
                    <span style=" background-color: ' . $color . '  ;color :white"
                                      class="badge badge-add">' . $twasol . '</span>
                    ',
                        $row->visit_time_end,
                        $time_def,
                        $a_edit . $a_delete,
                        $degree_name,


                    );
                }
            }
            $json = json_encode($arr);
            echo $json;

        }*/

        /*public function delete_setting(){
            $this->load->model('Public_relations/Gam3iaVisitor');
            $id = $this->input->post('id') ;
            $type = $this->input->post('type');
            $type_name = $this->input->post('type_name');
            $this->Gam3iaVisitor->delete_setting($id);
            $data['result'] = $this->Gam3iaVisitor->get_setting($type);
            $data['type_name'] = $type_name;

            $this->load->view('admin/public_relations/gam3ia_visitors/load_setting',$data);
        }*/
        
        public function visitors_data()
{
    $this->load->model('Public_relations/Gam3iaVisitor');

    $f2at_arr = array(

        1 => 'الاسر',

        2 => 'الكفلاء والمتبرعين',

        3 => 'مؤسسات مانحة',

        4 => 'المتطوعين',

        5 => 'التوظيف',

        6 => 'اخري'

    );
    $yes_no = array(

        1 => 'نعم',

        2 => 'لا'

    );
    if ($this->input->post('date_from')){
        $date_from = $this->input->post('date_from') ;
        $date_to = $this->input->post('date_to') ;
        $degree_id = $this->input->post('degree_id') ;
        $fe2a = $this->input->post('fe2a') ;
        $newdate_from = date("Y/m/d",strtotime($date_from)) ;
        $newdate_to = date("Y/m/d",strtotime($date_to)) ;
        $records = $this->Gam3iaVisitor->get_filter_data($newdate_from,$newdate_to,$degree_id,$fe2a);

    }
    else{
        $records = $this->Gam3iaVisitor->get_all_record();
    }
    $arr = array();
    $arr['data'] = array();
    if (!empty($records)) {
        $x = 0;
        foreach ($records as $row) {
            $x++;
            if ($row->twasol == 1) {
                $color = "green";
            } else {
                $color = "red";
            }
            $timeIn = strtotime($row->visit_time_start);
            $timeOUT = strtotime($row->visit_time_end);
            $defrent = $timeOUT - $timeIn;
            $hours = floor($defrent / 3600);
            $minutes = floor(($defrent / 60) % 60);
            $time_def = 'اقل من دقيقة';
            if ($minutes > 0) {
                $time_def = $minutes . ' دقيقة  ';
                if ($hours > 0) {
                    $time_def .= $hours . ' و ساعة ';
                }
            }


            if (isset($f2at_arr[$row->fe2a]) && $f2at_arr[$row->fe2a] != null) {
                $f2at = $f2at_arr[$row->fe2a];
            } else {
                $f2at = 'غير محدد ';
            }


            if (isset($row->name) and $row->name != null) {
                $visitor_name = $row->name;
            } else {
                $visitor_name = 'غير محدد ';
            }

            if (isset($yes_no[$row->twasol]) && $yes_no[$row->twasol] != null) {
                $twasol = $yes_no[$row->twasol];
            } else {
                $twasol = 'غير محدد ';
            }
            if (!empty($row->degree_name)) {
                $degree_name = $row->degree_name;
            } else {
                $degree_name = 'غير محدد';
            }
            $a_edit = '';
            $a_delete = '';


            if ($_SESSION['role_id_fk'] == 3) {
                if ((isset($roles)) && (!empty($roles))) {
                    if ($roles->edit == 1) {
                        $a_edit = '<a href="' . base_url() . 'Public_relation/addGam3iaVisitors/' . $row->id . '"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                   ';

                    }
                    if ($roles->delet == 1) {
                        $de_text = ' هل انت متاكد  من عمليه الحذف؟';
                        $a_delete = '<a href="' . base_url() . 'Public_relation/deleteGam3iaVisitors/' . $row->id . '"
                                           onclick="return confirm(' . $de_text . ');"><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>';

                    }
                }
            }
            else {
                $a_edit = '<a href="' . base_url() . 'Public_relation/addGam3iaVisitors/' . $row->id . '"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                   ';
                $de_text = ' هل انت متاكد  من عمليه الحذف؟';
                $a_delete = '<a href="' . base_url() . 'Public_relation/deleteGam3iaVisitors/' . $row->id . '"
                                           onclick="return confirm(' . $de_text . ');"><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>';

            }

            $arr['data'][] = array(
                $x,
                date("Y-m-d", $row->visit_date),
                $row->visit_time_start,
                $visitor_name,
                $row->mob,
                $f2at,
                word_limiter($row->purpose, 4) . '
                     <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    onclick="get_text(\'' . $row->purpose . '\',\'' . $row->natega_visit . '\')"
                                    data-target="#purpose_detail">
                                تفاصيل
                            </button>
                    ',
                '
                    <span style=" background-color: ' . $color . '  ;color :white"
                                      class="badge badge-add">' . $twasol . '</span>
                    ',
                $row->visit_time_end,
                $time_def,
                $a_edit . $a_delete,
                $degree_name,


            );
        }
    }
    $json = json_encode($arr);
    echo $json;

}

           public function delete_setting(){
            $this->load->model('Public_relations/Gam3iaVisitor');
            $id = $this->input->post('id') ;
            $type = $this->input->post('type');
            $type_name = $this->input->post('type_name');
            $fe2a_type = $this->input->post('fe2a_type');
            $this->Gam3iaVisitor->delete_setting($id);
            $data['result'] = $this->Gam3iaVisitor->get_setting($type,$fe2a_type);
            $data['type_name'] = $type_name;
            $this->load->view('admin/public_relations/gam3ia_visitors/load_setting',$data);
        }
        
            public function get_setting_by_id(){
        $this->load->model('Public_relations/Gam3iaVisitor');
        $id = $this->input->post('row_id') ;
       $result = $this->Gam3iaVisitor->get_setting_by_id($id);
       echo json_encode($result) ;

    } 
} // END CLASS 


