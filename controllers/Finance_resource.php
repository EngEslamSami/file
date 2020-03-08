<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_resource extends MY_Controller {

	public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form','download'));
        $this->load->library('zip');
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]); 
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

    private function upload_multi_files($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        for ($i=0; $i < count($_FILES[$file_name]['name']); $i++) { 
	        $_FILES['userfile']['name'] 	= $_FILES[$file_name]['name'][$i];
	        $_FILES['userfile']['type'] 	= $_FILES[$file_name]['type'][$i];  
	        $_FILES['userfile']['tmp_name'] = $_FILES[$file_name]['tmp_name'][$i];
	        $_FILES['userfile']['error']    = $_FILES[$file_name]['error'][$i];
    		$_FILES['userfile']['size']     = $_FILES[$file_name]['size'][$i];
	        $this->upload->do_upload();
	        $file = $this->upload->data();
	        $datafile[] = $file['file_name'];
	    }
	    return $datafile;
    }

    private function message($type,$text)
	{
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }

    public function addDonor()	// Finance_resource/addDonor
    {
        $this->load->model('all_Finance_resource_models/donors/Donors');
    	if($this->input->post('add')){
            $donor_id = $this->Donors->insert();
            $file_name = 'file_name';
            $files = $this->upload_multi_files($file_name);
            if($files[0] != ''){
    			$this->Donors->insert_donors_files($files, $donor_id);
    		}
            $this->message('success','إضافة متبرع');
            redirect('Finance_resource/addDonor','refresh');
        }
    	$data['nationalities'] = $this->Donors->select_nationality();
    	$data['banks'] = $this->Donors->select_bank();
    	$data['donors'] = $this->Donors->select_donors();
    	$data['title'] = 'إضافة متبرع';
    	$data['subview'] = 'admin/all_Finance_resource_views/donors/donors';
        $this->load->view('admin_index', $data);
    }

    public function download_donor_files($id)
    {
        $this->load->model('all_Finance_resource_models/donors/Donors');
    	$files = $this->Donors->select_files($id);
    	foreach ($files as $file) {
    		$data = file_get_contents('./uploads/files/'.$file->file_name); 
    		$this->zip->add_data($file->file_name, $data);
    	}
    	$this->zip->archive('my_backup.zip');
    	$this->zip->download('my_backup.zip');
    }

    public function editDonor($id)
    {
        $this->load->model('all_Finance_resource_models/donors/Donors');
    	if($this->input->post('add')){
            $donor_id = $this->Donors->update($id);
            $file_name = 'file_name';
            $files = $this->upload_multi_files($file_name);
            if($files[0] != ''){
            	$this->Donors->delete_files($id);
    			$this->Donors->insert_donors_files($files, $donor_id);
    		}
            $this->message('success','تعديل متبرع');
            redirect('Finance_resource/addDonor','refresh');
        }
    	$data['nationalities'] = $this->Donors->select_nationality();
    	$data['banks'] = $this->Donors->select_bank();
    	$data['donor'] = $this->Donors->selectByID($id);
    	$data['title'] = 'تعديل متبرع';
    	$data['subview'] = 'admin/all_Finance_resource_views/donors/donors';
        $this->load->view('admin_index', $data);
    }

    public function deleteDonor($id)
    {
        $this->load->model('all_Finance_resource_models/donors/Donors');
    	$this->Donors->delete_donor($id);
    	redirect('Finance_resource/addDonor','refresh');
    }

    public function addSponsor()	// Finance_resource/addSponsor
    {
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors');
    	if($this->input->post('add')){
            $donor_id = $this->Sponsors->insert();
            $file_name = 'file_name';
            $files = $this->upload_multi_files($file_name);
            if($files[0] != ''){
    			$this->Sponsors->insert_sponsors_files($files, $donor_id);
    		}
            $this->message('success','إضافة كفيل');
            redirect('Finance_resource/addSponsor','refresh');
        }
    	$data['nationalities'] = $this->Sponsors->select_nationality();
    	$data['banks'] = $this->Sponsors->select_bank();
    	$data['sponsors'] = $this->Sponsors->select_sponsors();
    	$data['title'] = 'إضافة كفيل';
    	$data['subview'] = 'admin/all_Finance_resource_views/sponsors/sponsors';
        $this->load->view('admin_index', $data);
    }

    public function download_sponsor_files($id)
    {
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors');
    	$files = $this->Sponsors->select_files($id);
    	foreach ($files as $file) {
    		$data = file_get_contents('./uploads/files/'.$file->file_name); 
    		$this->zip->add_data($file->file_name, $data);
    	}
    	$this->zip->archive('my_backup.zip');
    	$this->zip->download('my_backup.zip');
    }

    public function editSponsor($id)
    {
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors');
    	if($this->input->post('add')){
            $donor_id = $this->Sponsors->update($id);
            $file_name = 'file_name';
            $files = $this->upload_multi_files($file_name);
            if($files[0] != ''){
            	$this->Sponsors->delete_files($id);
    			$this->Sponsors->insert_sponsors_files($files, $donor_id);
    		}
            $this->message('success','تعديل كفيل');
            redirect('Finance_resource/addSponsor','refresh');
        }
    	$data['nationalities'] = $this->Sponsors->select_nationality();
    	$data['banks'] = $this->Sponsors->select_bank();
    	$data['sponsor'] = $this->Sponsors->selectByID($id);
    	$data['title'] = 'تعديل كفيل';
    	$data['subview'] = 'admin/all_Finance_resource_views/sponsors/sponsors';
        $this->load->view('admin_index', $data);
    }

    public function deleteSponsor($id)
    {
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors');
    	$this->Sponsors->delete_donor($id);
    	redirect('Finance_resource/addSponsor','refresh');
    }

}

/* End of file Finance_resource.php */
/* Location: ./application/controllers/Finance_resource.php */