<?php
class Donations extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('Difined_model'); 
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('finance_resource_models/Guaranty');
        $this->load->model('finance_resource_models/Endowments');
        $this->load->model('finance_resource_models/Operation_guaranty');
        $this->load->model('finance_resource_models/Donors');
        $this->load->model('finance_resource_models/Donors_gurantee');
        
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
         
         
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

    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */
     
                public function  add_today_donations() // all_Finance_resource/Donations/add_today_donations
                {
                    
                $this->load->model('Difined_model');
                $this->load->model('all_Finance_resource_models/donation/Today_donation');
                $this->load->model('all_Finance_resource_models/donation/Account_settings');
                
                $data['account_settings'] = $this->Account_settings->select();
                $data['records'] = $this->Difined_model->select_all('cash_donations','','','','');
                $data['banks'] = $this->Difined_model->select_banks();
                $data['donors'] =$this->Difined_model->select_all('donors','','','','');
                $data['guarantees'] = $this->Difined_model->select_all('sponsors','','','','');
                $data['get_name'] = $this->Today_donation->select();
                $data['get_name_sponsors'] = $this->Today_donation->select_sponsors();
                if($this->input->post('add')){
                    
                $this->Today_donation->insert();
                redirect('all_Finance_resource/Donations/add_today_donations', 'refresh');
                
                }elseif($this->input->post('values')){
                    
                $data['id']=$this->input->post('values');
                $this->load->view('admin/all_Finance_resource_views/Donations/get_donation_type',$data);
                
                }elseif($this->input->post('admin_num')){
                    
                $data['program_settings'] = $this->Account_settings->select_program();
                $data['id']=$this->input->post('admin_num');
                $this->load->view('admin/all_Finance_resource_views/Donations/get_depart',$data);
                
                }elseif($this->input->post("payment_type")){
                
                $data['id']=$this->input->post('payment_type');
                $this->load->view('admin/all_Finance_resource_views/Donations/get_payment_type_type',$data);
                 
                }else{
                    
                $data['title'] = 'اضافة تبرعات اضافية';
                $data['metakeyword'] = 'إعدادات اضافة تبرعات اضافية';
                $data['subview'] = 'admin/all_Finance_resource_views/Donations/today_donations';
                $this->load->view('admin_index', $data);
                }
                
                }
 //-------------------------------------------------------------------------------//
     
      //-------------------------------------------------------------------------------//
 
public function  edit_today_donations($id) // all_Finance_resource/Donations/edit_today_donations
{

            
            $this->load->model('Difined_model');
            $this->load->model('all_Finance_resource_models/donation/Today_donation');
            $this->load->model('all_Finance_resource_models/donation/Account_settings');
            
            $data['account_settings'] = $this->Account_settings->select();
            $data['program_settings'] = $this->Account_settings->select_program();
            $data['records'] = $this->Difined_model->select_all('cash_donations','','','','');
            $data['banks'] = $this->Difined_model->select_banks();
            
            $data['donors'] =$this->Difined_model->select_all('donors','','','','');
            $data['guarantees'] = $this->Difined_model->select_all('sponsors','','','','');
            
            $data['get_name'] = $this->Today_donation->select();
            $data['get_name_sponsors'] = $this->Today_donation->select_sponsors();
            $data['result'] = $this->Difined_model->select_search_key('cash_donations','id',$id);

            $data['account_settings'] = $this->Account_settings->select();
            $data['program_settings'] = $this->Account_settings->select_program_by_id($data['result'][0]->account_settings_id_fk);
            if($this->input->post('edit')){
            $this->Today_donation->update($id);
            redirect('all_Finance_resource/Donations/add_today_donations', 'refresh');
            }else{
                
            $data['title'] = 'تعديل تبرعات اضافية';
            $data['metakeyword'] = 'إعدادات اضافة تبرعات اضافية';    
            $data['subview'] = 'admin/all_Finance_resource_views/Donations/today_donations';
            $this->load->view('admin_index', $data);
}
}



public function delete_today_donations($id){
    
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("cash_donations",$Conditions_arr);
    redirect('all_Finance_resource/Donations/add_today_donations');
}


public function print_today_donations($id){ // all_Finance_resource/Donations/print_today_donations
    
          $this->load->model('Difined_model');
          $this->load->model('all_Finance_resource_models/donation/Today_donation');
          $this->load->library("Convert_ar");
          
         $data["tools"]=$this->convert_ar;
         $data['records'] = $this->Difined_model->select_all('cash_donations','','','','');
         $data['get_name'] = $this->Today_donation->select();
         $data['banks'] = $this->Difined_model->select_banks();
         $data['result'] = $this->Difined_model->select_search_key('cash_donations','id',$id);
         $this->load->view('admin/all_Finance_resource_views/Donations/print_today_donations', $data);
}
     
     }
     ?>