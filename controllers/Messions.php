<?php
class Messions extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        $this->load->model('Mession');
        $this->load->model('Difined_model');
        
         
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        
        
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
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> ?? ????? ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> ????? ??? ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> ??? ...</h4><p>'.$text.'</p></div>');
        }
    }
    
    public function mession_add($id){ 
        $data['emp_id'] = $this->input->post('emp_id');
        $data['dep_id'] = $this->input->post('dep_id'.$data['emp_id']);
        $data['date_from'] = strtotime($this->input->post('date_from'));
        $data['date_to'] = strtotime($this->input->post('date_to'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['path'] = $this->input->post('path');
        $data['purpos'] = $this->input->post('purpos');
        $data['date_s']=time();
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $data['date_sus']=time();
            $data['suspend'] = 1;
        }

        if($this->input->post('add') && $id == 0){
            $this->Mession->insert($data);
            $this->message('success','ÊãÊ ÇáÚãáíÉ ÈäÌÇÍ ');
            redirect('Messions/mession_add/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Mession->update($data, $id);
            $this->message('success','ÊãÊ ÇáÚãáíÉ ÈäÌÇÍ  ');
            redirect('Messions/mession_add/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Mession->getById($id);
            $data['employs'] = $this->Mession->select_emp($id);
        }
        if($id == 0)
            $data['employs'] = $this->Mession->select_emp($id);
            
        $data['table'] = $this->Mession->select();
        $data['subview'] = 'admin/messions/messions';
        $this->load->view('admin_index', $data);
    }
    
    public function mession_delete($id){
        $this->db->where('id',$id);
        $this->db->delete('mession');
        redirect('Messions/mession_add/0','refresh');
    }  
    
    public function R_mession(){
        if($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('emp_id')){
            $data['table'] = $this->Mession->get_messions(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')),$this->input->post('emp_id'));
            $this->load->view('admin/messions/get_mession',$data);
        }
        else{
            $data['employs'] = $this->Mession->select_emp(1);
            $data['subview'] = 'admin/messions/R_mession';
            $this->load->view('admin_index', $data);
        }
    }

    public function suspend(){
        //$data['none'] = $this->Mession->select_suspend('suspend', 0);
        //$data['ok'] = $this->Mession->select_suspend('suspend', 1);
        //$data['no'] = $this->Mession->select_suspend('suspend', 2);
        $data['table'] = $this->Mession->select();
        $data['subview'] = 'admin/messions/suspend';
        $this->load->view('admin_index', $data);
    }

  /*  public function action($id, $status){
        if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){
            $data['suspend_head'] = $status;
            $data['date_sus'] = time();
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $data['suspend'] = $status;
            $data['date_sus_head'] = time();
        }
        $this->Mession->update($data, $id);
        redirect('Messions/suspend','refresh');
    }*/
    
   public function action($id='', $status=''){
        if($id == ''){
            $id = $this->input->post('id');
            $status = $this->input->post('sus');
        }
        if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){
            $data['suspend_head'] = $status;
            $data['reason_head'] = $this->input->post('reason');
            $data['date_sus'] = time();
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $data['suspend'] = $status;
            $data['reason'] = $this->input->post('reason');
            $data['date_sus_head'] = time();
        }
        $this->Mession->update($data, $id);
        redirect('Messions/suspend','refresh');
    } 
    
    
}