<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 12:00 م
 */

class All_mehwr_gam3ia_omomia extends MY_Controller
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
        $this->load->model('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/all_mehwr_gam3ia_omomia/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/md/all_mehwr_gam3ia_omomia';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '10000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    private function upload_muli_file($input_name){
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
        }
        return $all_img;
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/md/all_mehwr_gam3ia_omomia/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function download_file($file){
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/md/all_mehwr_gam3ia_omomia/'.$file);
        force_download($name, $data);
    }

    public function index(){ // md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia
      
        $data['all_data'] = $this->All_mehwr_gam3ia_omomia_model->get_data();

        if ($this->input->post('btn')) {
            $files=$this->upload_muli_file("mehwar_morfaq");
           // $this->test($_POST);
           // die;
            $this->All_mehwr_gam3ia_omomia_model->insert_mehwr($files);
            messages('success', 'تم إضافة بنجاح ');
            redirect('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia', 'refresh');
        }

        $data['last_galsa']=$this->All_mehwr_gam3ia_omomia_model->select_last_galsa();
        if(!empty(  $data['last_galsa'])){
            $data['glsa_members'] = $this->All_mehwr_gam3ia_omomia_model->get_glasat_hdoor($data['last_galsa']->glsa_rkm);

        }

        $data['title'] = 'إضافة محاور الجلسات';
        $data['subview'] = 'admin/md/all_mehwr_gam3ia_omomia/all_mehwr_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }

    public function get_table(){

        $data['last_galsa']=$this->All_mehwr_gam3ia_omomia_model->select_last_galsa();

        $this->load->view('admin/md/all_mehwr_gam3ia_omomia/get_table', $data);
    }

    public function update($glsa_rkm)
    {

        if ($this->input->post('btn')) {
            $files=$this->upload_muli_file("mehwar_morfaq");

            $this->All_mehwr_gam3ia_omomia_model->update_mehwr($glsa_rkm,$files);
            messages('success', 'تم تعديل بنجاح ');
            redirect('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia', 'refresh');
        }
        $data['result'] = $this->All_mehwr_gam3ia_omomia_model->getById($glsa_rkm);
        if(!empty(  $data['result'])){
            $data['glsa_members'] = $this->All_mehwr_gam3ia_omomia_model->get_glasat_hdoor($data['result']->glsa_rkm);

        }
        $data['result_details'] = $this->All_mehwr_gam3ia_omomia_model->get_mehwr_details($glsa_rkm);
        $data['get_last_rkm'] = $this->All_mehwr_gam3ia_omomia_model->get_last_rkm($glsa_rkm);

        $data['title'] = 'تعديل  مجلس   ';
        $data['subview'] = 'admin/md/all_mehwr_gam3ia_omomia/all_mehwr_view_update';
        $this->load->view('admin_index', $data);
    }

    public function delete_row($id,$glsa_rkm)
    {
        $this->All_mehwr_gam3ia_omomia_model->delete_row($id);
        redirect('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/update/'.$glsa_rkm, 'refresh');

    }

    public function delete($glsa_rkm)
    {
        $this->All_mehwr_gam3ia_omomia_model->delete($glsa_rkm);
        redirect('md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia', 'refresh');

    }


    public function get_table_mehwer()
    {
        $glsa_rkm = $this->input->post('glsa_rkm');
        $data['result'] = $this->All_mehwr_gam3ia_omomia_model->get_mehwr_details($glsa_rkm);
        $this->load->view('admin/md/all_mehwr_gam3ia_omomia/get_table_mehwer_view', $data);
    }
}
