<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 02/06/2019
 * Time: 11:01 ص
 */

class Personal_profile extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('maham_mowazf_model/person_profile_m/Person_profile_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';

        $config['source_image'] = $data['full_path'];

        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;

        $config['maintain_ratio'] = TRUE;

        $config['thumb_marker'] = '';

        $config['width'] = 275;

        $config['height'] = 250;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/images';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
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
    {//maham_mowazf/person_profile/Personal_profile

    $this->load->model('human_resources_model/employee_forms/all_agazat/all_transformations/Hr_all_transformation_setting_model');

        $data['person_data'] = $this->Person_profile_model->get_person_data();
        
        
            $data['coming_records'] = $this->Hr_all_transformation_setting_model->select_from_hr_all_agzat_orders(
            array('current_to_user_id'=>$_SESSION['user_id'])
        );
      //  $data["personal_data"]=$this->Hr_all_transformation_setting_model->get_user_data2(array('user_id'=>$_SESSION['user_id']));
        $data["personal_data"]=$this->Hr_all_transformation_setting_model->get_user_data2(array('user_id'=>$_SESSION['user_id']));
      
      
        $data['user_orders'] = $this->Hr_all_transformation_setting_model->select_from_hr_all_agzat_orders(
            array('emp_id_fk'=>$_SESSION['emp_code'])
        );
        

        
        
        
		$this->load->model('human_resources_model/employee_forms/all_ozonat/Transformation_model');
        $data['valu']=1;
        $arr = array('current_from_id' => $_SESSION['user_id']);
        $data['records']=$this->Transformation_model->my_orders('hr_all_ozonat_orders',$arr);
        
        $data['ozonat_records'] = $this->Transformation_model->my_orders('hr_all_ozonat_orders', array('current_from_id' => $_SESSION['user_id']));
        $data['ozonat_coming'] = $this->Transformation_model->my_orders('hr_all_ozonat_orders', array('current_to_id' => $_SESSION['user_id']));


      /***********************************تحويلات الحسابات بتاريخ 24-7-2019****************************/
               $this->load->model('finance_accounting_model/box/forms/transformation_accounts/Transformation_accounts_model');

           $data['coming_records_Transformation_accounts'] = $this->Transformation_accounts_model->select_from_hr_all_transformation_orders(
                         array('current_to_user_id'=>$_SESSION['user_id']));
           $data["personal_data_Transformation_accounts"]=$this->Transformation_accounts_model->get_user_data(array('user_id'=>$_SESSION['user_id']));
           $data['user_orders_Transformation_accounts'] = $this->Transformation_accounts_model->select_from_hr_all_transformation_orders(array('employees.id'=>$_SESSION['emp_code']));
        /***********************************تحويلات الحسابات بتاريخ 24-7-2019****************************/


 $data['sadad_fatora'] = $this->Person_profile_model->get_sadad_fatora();
        
        
        

        /******************  solaf  *******************/
        $this->load->model('human_resources_model/employee_forms/solaf/Hr_solaf_transformation_setting_model');

        $data['coming_solaf_records'] = $this->Hr_solaf_transformation_setting_model->select_from_hr_all_solaf_orders(
            array('current_to_user_id'=>$_SESSION['user_id'])
        );
 
         $data['user_solaf_orders'] = $this->Hr_solaf_transformation_setting_model->select_from_hr_all_solaf_orders(
             array('emp_id_fk'=>$_SESSION['emp_code'])
         );
 /******************  solaf  *******************/        
        
        
        
        
//        $this->test($data['person_data']);
        $data['title'] = 'بروفايلى';
        $data['subview'] = 'admin/maham_mowazf_view/person_profile_v/personal_profile.php';
        $this->load->view('admin_index', $data);
    }

    /*public function update_users($id)
    {
        if ($this->input->post('ADD') == 'ADD') {
            $file = $this->upload_image("user_photo", 'profie');
            $this->Person_profile_model->update_users($id, $file);
            $this->messages('success', 'تم التعديل بنجاح');
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        }

    }*/
     public function update_users($id)
    {
        if ($this->input->post('ADD') == 'ADD') {
            if ($_SESSION['role_id_fk'] == 3) {
                $file = $this->upload_image("user_photo", 'human_resources/emp_photo');
                $this->Person_profile_model->update_emp_img($_SESSION['emp_code'], $file);

            } else {
                $file = $this->upload_image("user_photo", 'images/profie');
            }
            $this->Person_profile_model->update_users($id, $file);
            $this->messages('success', 'تم التعديل بنجاح');
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        }

    }
    

    public function upload_img()
    {
        $id = $this->input->post('id');
        $file = $this->upload_image("files", 'profie');
        $this->Person_profile_model->upload_img($id, $file);
    }
    
/****** sadad fatora *********************************************************************************/    
    //    19-8-om
    public function get_sadad_fatora()
    {

        $data['sadad_fatora'] = $this->Person_profile_model->get_sadad_fatora();
        $this->load->view('admin/maham_mowazf_view/est3lam/sdad_fatora/sdad_fatora_view', $data);

    }
    public function load_Transformation()
    {
        $this->load->model('finance_accounting_model/khdamat_mosanda/sdad_fatora/Sdad_fatora_model');

        if ($this->input->post('operation')) {
            $this->Sdad_fatora_model->replay_transformation();

            $this->messages('success', 'تم التحويل  بنجاح');
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');

        } else {
            $rkm = $this->input->post('rkm');
            $data['rkm'] = $rkm;
            $data['gehat'] = $this->Sdad_fatora_model->get_gehat();
            $data['sadad_fatora'] = $this->Sdad_fatora_model->get_by('finance_sadad_fatora', array('t_rkm' => $rkm));
            $data['emp_gehat'] = $this->Sdad_fatora_model->get_all_by('hr_egraat_emp_setting', array('job_title_id_fk' => $data['sadad_fatora']->to_geha_id_fk));

            $this->load->view('admin/maham_mowazf_view/est3lam/sdad_fatora/Transform_view_pop', $data);

        }


    }
    
/*****************************************************************************************/    
    
}