<?php
class User extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
        $this->load->model('Users_constriction');
        $this->load->model('administrative_affairs_models/employee');
        $this->load->model('Difined_model');
                  /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
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

    public function add_user($id){
        if($this->input->post('add') && $id == 0){
            $file_name='user_photo';
            $file= $this->upload_image($file_name);
            $this->Users_constriction->insert($file);
            $this->message('success','إضافة مستخدم');
            redirect('User/add_user/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name='user_photo';
            $file= $this->upload_image($file_name);
            $this->Users_constriction->update($id, $file);
            $this->message('success','تعديل مستخدم');
            redirect('User/add_user/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Users_constriction->display($id);
            $data['deps'] = $this->Users_constriction->select_allEmp($data['result']['role_id_fk']);
            $data['emps'] = $this->Users_constriction->select_emp_without_code();
            $data['all_emps'] = $this->Users_constriction->select_allEmp();
            $data['magls'] = $this->Users_constriction->select_magls_members();
            $data['all_magls'] = $this->Users_constriction->select_all_magls_members_t();
        }
      
            $data['emps'] = $this->Users_constriction->select_emp_without_code();
            $data['magls'] = $this->Users_constriction->select_magls_members();
            $data['table'] = $this->Users_constriction->select();
            $data['subview'] = 'admin/users/users';
            $this->load->view('admin_index', $data);
      
    }
    
    public function check(){
        $username = $this->input->post('username');
        $exists = $this->Users_constriction->userename_exists($username);
        $count = count($exists);
        if (empty($count)) {
            var_dump("لا يوجد مستخدم بهذا الإسم .. مستخدم جديد :)");die;
        } else {
            var_dump("يوجد مستخدم بهذا الإسم .. برجاء تغييره");die;
        }
    }
    
    public function delete_user($id){
        $this->Users_constriction->delete($id);
        redirect('User/add_user/0','refresh');
    }
}