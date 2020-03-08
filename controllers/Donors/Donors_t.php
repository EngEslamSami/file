<?php
class Donors_t extends MY_Controller
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
    }
    private  function test($data=array()){
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
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
   // $config['max_size']    = '1024*8';
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
    private  function upload_file($file_name){
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
 * ===============================================================================================================
 * 
 * ========================         add_donors_guaranty         ======================================================
 * 
 * ===============================================================================================================
 */    
 public function  add_donors(){ // Donors/Donors_t/add_donors
    
        $this->load->model('Difined_model'); 
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('Donors/Donors_t_model');
        
        $data['nationality']=  $this->Nationality->select();
        $data['main_depart'] = $this->Department->select_all();
        $data['guaranty_types'] = $this->Difined_model->select_all('guaranty_settings','','','','');
        $data['banks'] = $this->Difined_model->select_banks();
        if($this->input->post('save')){
            $national_id_img ='national_id_img';
            $national_id_file =$this->upload_image($national_id_img);
            $bank_card_img ='bank_card_img';
            $bank_card_file =$this->upload_image($bank_card_img);
            $bank_deduction_voucher_img ='bank_deduction_voucher_img';
            $bank_deduction_voucher_file =$this->upload_image($bank_deduction_voucher_img);
            $other_img ='other_img';
            $other_img_file =$this->upload_image($other_img);
            $this->Donors_t_model->insert($national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file);
            redirect('Donors/Donors_t/add_donors', 'refresh');
        }
        $data['records']=$this->Donors_t_model->select();
        $data['title'] = 'إضافة متبرع';
        $data['metakeyword'] = 'إضافة متبرع';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/donors_t/donors_t';
        $this->load->view('admin_index', $data);
    }
    ///////////////////////////////////////////// edit_donors
    
   public function  edit_donors($id){ // Donors/Donors_t/edit_donors
        $this->load->model('Difined_model'); 
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('Donors/Donors_t_model');
    
    
        $data['guaranty_types'] = $this->Difined_model->select_all('guaranty_settings','','','','');
        $data['banks'] = $this->Difined_model->select_banks();
        $data['update_link']='donors';
        $data['main_depart'] = $this->Department->select_all();
        $data['results'] = $this->Difined_model->select_search_key('donors_t_settings','id',$id);
        $data['nationality']=  $this->Nationality->select();
        if($this->input->post('save')){
            
            $national_id_img ='national_id_img';
            $national_id_file =$this->upload_image($national_id_img);
            $bank_card_img ='bank_card_img';
            $bank_card_file =$this->upload_image($bank_card_img);
            $bank_deduction_voucher_img ='bank_deduction_voucher_img';
            $bank_deduction_voucher_file =$this->upload_image($bank_deduction_voucher_img);
            $other_img ='other_img';
            $other_img_file =$this->upload_image($other_img);
            $this->Donors_t_model->update($id,$national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file);
            redirect('Donors/Donors_t/add_donors', 'refresh');
        }else{
            $data['title'] = 'تعديل المتبرع';
            $data['metakeyword'] = 'تعديل المتبرع';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/donors_t/donors_t';
            $this->load->view('admin_index', $data);
        }
    }  
     public function delete_person($id){
        $this->load->model('Donors/Donors_t_model');
        $this->Donors_t_model->delete($id);
        redirect('Donors/Donors_t/add_donors');
    }
    
    
    }
        
        ?>