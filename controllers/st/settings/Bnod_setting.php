<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 31/03/2019
 * Time: 10:09 ص
 */

class Bnod_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');


        $this->load->model('st/settings/Bnod_model');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
//      
    }
    public function index() ///st/settings/Bnod_setting
    {

        $data['title']="اضافه البنود";
        $data['records']=$this->Bnod_model->get_all_account_group();

        $data['bnods']=$this->Bnod_model->get_from_table();


        $data['rows']=$this->Bnod_model->select_bnod();

        $data['subview'] = 'admin/st/settings/bnod_setting';
        $this->load->view('admin_index', $data);
    }
    public function add_data()
    {
       /* echo "<pre>";
       print_r($_POST);
       echo "</pre>";*/


        $this->Bnod_model->insert_bnod();

    }

    public function delete_record($id)
    {
        $this->Bnod_model->delete_record($id);
        redirect('st/settings/Bnod_setting','refresh');
    }

    public function get_sub_branch()
    {
        $valu=$this->input->post('valu');
        $data['records'] =$this->Bnod_model->get_records_by_id($valu);

        $this->load->view('admin/st/settings/load_page',$data);
    }



    public function update_bnod($id)
    {
        $this->Bnod_model->update_bnod($id);
        redirect('st/settings/Bnod_setting','refresh');
    }
    
      public function change_status()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Bnod_model->change_status($valu, $id);

        echo json_encode($data);

    }
}