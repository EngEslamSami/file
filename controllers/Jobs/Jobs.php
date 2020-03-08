<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('Jobs/Jobs_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index()
	{   //  Jobs/Jobs
		$data['settings'] = $this->Jobs_model->select_settings();
		$data['jobs'] = $this->Jobs_model->select_jobs();
        $data['title'] = 'طلبات التوظيف';
        $data['subview'] = 'admin/jobs/jobs/jobs';
        $this->load->view('admin_index', $data);
	}

	public function delete($id)
    {
    	$this->Jobs_model->delete($id);
        messages('success','حذف طلب التوظيف');
        redirect('Jobs/Jobs','refresh');
    }

    public function downloads($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
        redirect('Jobs/Jobs','refresh');
    }

    public function read_file()
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
    }  

}

/* End of file Jobs.php */
/* Location: ./application/controllers/Jobs/Jobs.php */