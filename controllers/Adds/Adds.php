<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adds extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('Adds/Adds_model');
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index()
	{
	    $data['adds'] = $this->Adds_model->select_adds(0);
        $data['title'] = 'الإعلانات';
        $data['subview'] = 'admin/adds/adds';
        $this->load->view('admin_index', $data);
	}

	public function new_add()
    {
        if($this->input->post('add')){
        	$file_name = 'img';
        	$file = upload_image($file_name);
            $this->Adds_model->add($file);
            messages('success','إضافة إعلان');
            redirect('Adds/Adds','refresh');
        }
        $data['title'] = 'إضافة إعلان';
        $data['subview'] = 'admin/adds/new_add';
        $this->load->view('admin_index', $data);
    }

    public function edit_add($id)
    {
        if($this->input->post('add')){
        	$file_name = 'img';
        	$file = upload_image($file_name);
            $this->Adds_model->update($id,$file);
            messages('success','تعديل إعلان');
            redirect('Adds/Adds','refresh');
        }
        $data['title'] = 'تعديل إعلان';
        $data['record'] = $this->Adds_model->getById($id);
        $data['subview'] = 'admin/adds/new_add';
        $this->load->view('admin_index', $data);
    }

    public function delete_add($id)
    {
        $this->Adds_model->delete($id);
        messages('success','حذف إعلان');
        redirect('Adds/Adds','refresh');
    }

}

/* End of file Adds.php */
/* Location: ./application/controllers/Adds/Adds.php */