<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteers extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('Volunteers/Volunteers_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index()
	{
		$data['fields'] = $this->Volunteers_model->select_settings(1);
        $data['reasons'] = $this->Volunteers_model->select_settings(2);
        $data['volunteers'] = $this->Volunteers_model->select_volunteers(2);
        $data['title'] = 'بيانات المتطوعين';
        $data['subview'] = 'admin/volunteer/volunteers/volunteers';
        $this->load->view('admin_index', $data);
	}

    public function checkUnique()
    {
        echo json_encode($this->Volunteers_model->getRecordById(array('id_card'=>$this->input->post('id_card'))));
    }

	public function new_volunteer()
    {
        if($this->input->post('add')){
            $this->Volunteers_model->add(2);
            messages('success','إضافة  متطوع');
            redirect('Volunteers/Volunteers','refresh');
        }
        $data['fields'] = $this->Volunteers_model->select_settings(1);
        $data['reasons'] = $this->Volunteers_model->select_settings(2);
        $data['title'] = 'إضافة  متطوع/ـه';
        $data['subview'] = 'admin/volunteer/volunteers/new_volunteer';
        $this->load->view('admin_index', $data);
    }

    public function edit_volunteer($id)
    {
        if($this->input->post('add')){
            $this->Volunteers_model->update($id);
            messages('success','تعديل  متطوع');
            redirect('Volunteers/Volunteers','refresh');
        }
        $data['fields'] = $this->Volunteers_model->select_settings(1);
        $data['reasons'] = $this->Volunteers_model->select_settings(2);
        $data['volunteer'] = $this->Volunteers_model->getRecordById(array('id'=>$id));
        $data['title'] = 'تعديل  متطوع/ـه';
        $data['subview'] = 'admin/volunteer/volunteers/new_volunteer';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
    	$this->Volunteers_model->delete($id);
        messages('success','حذف  متطوع');
        redirect('Volunteers/Volunteers','refresh');
    }

    public function print_volunteer($id)
    {
        $data['fields'] = $this->Volunteers_model->select_settings(1);
        $data['reasons'] = $this->Volunteers_model->select_settings(2);
        $data['volunteer'] = $this->Volunteers_model->getRecordById(array('id'=>$id));
        $this->load->view('admin/volunteer/volunteers/print_volunteer', $data);
    }

    public function volunteerConfirm()
    {    ///  Volunteers/Volunteers/volunteerConfirm
        if($this->input->post('accept')){
            $this->Volunteers_model->confirm($this->input->post('id'), 2);
            messages('success','إعتماد طلب التطوع');
        }
        if($this->input->post('refuse')){
            $this->Volunteers_model->confirm($this->input->post('id'), 3);
            messages('success','إعتماد طلب التطوع');
        }
        $data['fields'] = $this->Volunteers_model->select_settings(1);
        $data['reasons'] = $this->Volunteers_model->select_settings(2);
        $data['allVolunteers'] = $this->Volunteers_model->select_volunteers();
        $data['newVolunteers'] = $this->Volunteers_model->select_volunteers(1);
        $data['acceptedVolunteers'] = $this->Volunteers_model->select_volunteers(2);
        $data['refusedVolunteers'] = $this->Volunteers_model->select_volunteers(3);
        $data['title'] = 'إعتماد المتطوعين';
        $data['subview'] = 'admin/volunteer/volunteers/volunteerConfirm';
        $this->load->view('admin_index', $data);
    }

}

/* End of file Volunteers.php */
/* Location: ./application/controllers/Volunteers/Volunteers.php */