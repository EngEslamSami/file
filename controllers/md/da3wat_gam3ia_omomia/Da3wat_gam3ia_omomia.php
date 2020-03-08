<?php

class Da3wat_gam3ia_omomia extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia_model');
        $this->load->model("Difined_model");

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }

    public function index()
    {//md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_gam3ia_omomia_members();
        $data['galsa'] = $this->Da3wat_gam3ia_omomia_model->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $data['da3wa_rkmm'] = $this->Da3wat_gam3ia_omomia_model->get_da3wa_rkm();
        $data['all_da3wat'] = $this->Da3wat_gam3ia_omomia_model->get_all_da3wat();
        $data['greetings'] = $this->Da3wat_gam3ia_omomia_model->GetFromFr_settings(9);
//        $this->test($data['greetings']);

        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Da3wat_gam3ia_omomia_model->insert_dawa();
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
        }
        $data['title'] = 'دعوة انعقاد جمعية عمومية';
        $data['subview'] = 'admin/md/da3wat_gam3ia_omomia/da3wat_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }

    public function get_da3wat_Details()
    {
        $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($_POST['galsa_rkm']);
        $this->load->view('admin/md/da3wat_gam3ia_omomia/da3wa_gam3ia_details', $data);
    }


    public function getDetailsDiv()
    {
        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('id' => $_POST['id']));
        if (!empty($data['result'])) {
            $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
        }
        $this->load->view('admin/md/da3wat_gam3ia_omomia/getDetailsDiv', $data);
    }

    public function delete_dawat($id)
    {
        $this->Da3wat_gam3ia_omomia_model->delete_dawa($id);
        $this->messages('success', 'تم الحذف بنجاح ');
        redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
    }

    public function edit($id)
    {

        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('id' => $id));
        if (!empty($data['result'])) {
            $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
        }
//        $this->test($data);
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_gam3ia_omomia_members();
        $data['greetings'] = $this->Da3wat_gam3ia_omomia_model->GetFromFr_settings(9);

        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Da3wat_gam3ia_omomia_model->insert_dawa($id);
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
        }
        $data['title'] = 'دعوة انعقاد جمعية عمومية';
        $data['subview'] = 'admin/md/da3wat_gam3ia_omomia/da3wat_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }


    public function reply_dawa()
    {
        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('id' => $_POST['id']));
        $this->load->view('admin/md/da3wat_gam3ia_omomia/reply_da3wa_view', $data);
    }
}