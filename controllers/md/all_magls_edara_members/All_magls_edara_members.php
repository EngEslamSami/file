<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 12:00 م
 */

class All_magls_edara_members extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }


        $this->load->model('Difined_model');
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');
        $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
        $this->load->model('md/md_settings/Settings_model');


    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*88888888888888888888';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
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
    {//md/all_magls_edara_members/All_magls_edara_members
        $data['all_members'] = $this->All_magls_edara_members_model->get_all_gam3ia_omomia_members();
        $data['active_magles'] = $this->All_magls_edara_members_model->get_all_active_magles();
        $data['all_data'] = $this->All_magls_edara_members_model->get_all_data();
//    $this->test($data['all_members']);
        $data['reasons_settings'] = $this->Settings_model->get_reasons_settings();

        if ($this->input->post('btn')) {
            $file_name = 'morfaq_end';
            $file = $this->upload_file($file_name, 'md/magls_edara_members');

            $this->All_magls_edara_members_model->insert_magls_membser($file);
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/all_magls_edara_members/All_magls_edara_members', 'refresh');
        }
        $data['title'] = 'إضافة عضو بالمجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/md/all_magls_edara_members/all_magls_edara_members_view';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        $data['id'] = base64_decode($id);
        $data['result'] = $this->Gam3ia_omomia_members_model->getById($data['id'])[0];
        $data['reasons_settings'] = $this->Settings_model->get_reasons_settings();

        if ($this->input->post('btn')) {
            $file_name = 'morfaq_end';
            $file = $this->upload_file($file_name, 'md/magls_edara_members');

            $this->All_magls_edara_members_model->update_magles_membser($data['id'], $file);
            $this->messages('success', 'تم تعديل بنجاح ');
            redirect('md/all_magls_edara_members/All_magls_edara_members', 'refresh');
        }
        $data['all_members'] = $this->All_magls_edara_members_model->get_all_gam3ia_omomia_members();
        $data['active_magles'] = $this->All_magls_edara_members_model->get_all_active_magles();
        $data['one_data'] = $this->All_magls_edara_members_model->get_one_data($data['id']);
        /*if($estqala ==1){
            $data['estqala']=1;
        }*/
//     $this->test($data['one_data']);
        $data['title'] = 'تعديل  مجلس   ';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/md/all_magls_edara_members/all_magls_edara_members_view';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $this->All_magls_edara_members_model->delete_data($id);
        redirect('md/all_magls_edara_members/All_magls_edara_members', 'refresh');

    }


    public function check_mansep()
    {
        $mansep_id = $this->input->post('mansep');
        $magles_code = $this->input->post('magles_code');
        $result = $this->All_magls_edara_members_model->check_mansep($mansep_id, $magles_code);
        echo json_encode($result);

    }
   /* public function load_details()
    {
        if ($this->input->post('row_id')) {
            $id = $this->input->post('row_id');
            $data['all_members'] = $this->All_magls_edara_members_model->get_all_magls_edara_members($id);
            // $this->test( $data['all_members']);

        }

        $this->load->view('admin/md/all_magls_edara_members/load_details', $data);


    }
    */
    
        public function load_details()
    {
        if ($this->input->post('row_id')) {
            $id = $this->input->post('row_id');
            $data['all_members'] = $this->All_magls_edara_members_model->get_all_magls_edara_members($id);
     
            $this->load->model('md/all_magls_edara/All_magls_edara_model');
            $data['one_data'] = $this->All_magls_edara_model->get_one_data($data['all_members'][0]->mgls_id_fk);
           

        }

        $this->load->view('admin/md/all_magls_edara_members/load_details', $data);


    }
    
    
    public function load_reason()
{
    $data['reasons_settings'] =   $this->Settings_model->get_reasons_settings();
      
    $this->load->view('admin/md/all_magls_edara_members/load', $data);
}

}