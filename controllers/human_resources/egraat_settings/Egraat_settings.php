<?php

class Egraat_settings extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('human_resources_model/egraat_settings/Egraat_settings_model');

        $this->load->library('google_maps');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        // $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['new_image'] = 'uploads/human_resources/egraat_settings/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/human_resources/egraat_settings';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
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


    public function add_setting(){ // human_resources/egraat_settings/Egraat_settings/add_setting

    $data['all_jobs']= $this->Egraat_settings_model->get_all_jobs();
    $data['all_egraat']= $this->Egraat_settings_model->get_all_egraa();

    if ($this->input->post('add')){
        $file = $this->upload_all_file('person_img');
        $this->Egraat_settings_model->insert_emp_egraa($file);
        $this->messages('success','تم الاضافة بنجاح');
        redirect('human_resources/egraat_settings/Egraat_settings/add_setting','refresh');
    }
        $data['title']= '  شاشة الاجراء ' ;
        $data['subview']= 'admin/Human_resources/egraat_settings/egraat_settings_view';
        $this->load->view('admin_index',$data);
    }
    public function get_person($person_type,$job_title_id_fk){

        if ($person_type == 1){
        $all_emp = $this->Egraat_settings_model->get_all_emp($job_title_id_fk,$person_type);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if(!empty($all_emp)){
            foreach($all_emp as $row ){
                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="'.$row['id'].'"
                          ondblclick="GetMemberName('.$row['id'].')" id="member'.$row['id'].'" data-name="'.$row['employee'].'" 
                           data-code="'.$row['emp_code'].'"
                           data-edara="'.$row['edara'].'"
                           data-qsm="'.$row['qsm'].'"
                           data-id="'.$row['id'].'"
                                 />',

                    $row['emp_code'],
                    $row['employee'],



                    ''
                );
            }
        }
        echo json_encode($arr_emp);
        }
        elseif ($person_type == 2){

            $all_emp = $this->Egraat_settings_model->get_magls_member('md_all_magls_edara_members',$job_title_id_fk,'mem_id_fk',$person_type);
            $arr_emp = array();
            $arr_emp['data'] = array();

            if(!empty($all_emp)){
                foreach($all_emp as $row ){


                    $arr_emp['data'][] = array(
                        '<input type="radio" name="choosed" value="'.$row['id'].'"
                          ondblclick="GetMemberName('.$row['mem_id_fk'].')"   id="member'.$row['mem_id_fk'].'" data-name="'.$row['mem_name'].'" 
                          data-id="'.$row['mem_id_fk'].'"
                           data-code="'.$row['mem_id_fk'].'"
                           data-edara=""
                           data-qsm=""
                                 />',
                        $row['mem_id_fk'],
                        $row['mem_name'],


                        ''
                    );
                }
            }
            echo json_encode($arr_emp);


        }
        elseif ($person_type == 3){
            $all_emp = $this->Egraat_settings_model->get_magls_member('md_all_gam3ia_omomia_members',$job_title_id_fk,'id',$person_type);
            $arr_emp = array();
            $arr_emp['data'] = array();

            if(!empty($all_emp)){
                foreach($all_emp as $row ){


                    $arr_emp['data'][] = array(
                        '<input type="radio" name="choosed" value="'.$row['id'].'"
                          ondblclick="GetMemberName('.$row['id'].')"   id="member'.$row['id'].'" data-name="'.$row['name'].'" 
                          data-id="'.$row['id'].'"
                           data-code="'.$row['id'].'"
                           data-edara=""
                           data-qsm=""
                                 />',
                        $row['id'],
                        $row['name'],


                        ''
                    );
                }
            }
            echo json_encode($arr_emp);


        }
        elseif ($person_type == 4){
            $all_emp = $this->Egraat_settings_model->get_magls_member('volunteers',$job_title_id_fk,'id',$person_type);
            $arr_emp = array();
            $arr_emp['data'] = array();

            if(!empty($all_emp)){
                foreach($all_emp as $row ){


                    $arr_emp['data'][] = array(
                        '<input type="radio" name="choosed" value="'.$row['id'].'"
                          ondblclick="GetMemberName('.$row['id'].')"   id="member'.$row['id'].'" data-name="'.$row['name'].'" 
                          data-id="'.$row['id'].'"
                          data-code="'.$row['id'].'"
                           data-edara=""
                           data-qsm=""
                                 />',
                        $row['id'],
                        $row['name'],



                        ''
                    );
                }
            }
            echo json_encode($arr_emp);
        }

    }

    public function update_setting($id){
        $data['get_egraa'] = $this->Egraat_settings_model->get_by_id($id);
        $data['all_jobs']= $this->Egraat_settings_model->get_all_jobs();
        if ($this->input->post('add')){
            $file = $this->upload_all_file('person_img');
            $this->Egraat_settings_model->update_egraa($id,$file);
            $this->messages('success','تم التعديل بنجاح');
            redirect('human_resources/egraat_settings/Egraat_settings/add_setting','refresh');
        }
        $data['title']= '  شاشة الاجراء ' ;
        $data['subview']= 'admin/Human_resources/egraat_settings/egraat_settings_view';
        $this->load->view('admin_index',$data);

    }

    public function delete_setting($id){
        $this->Egraat_settings_model->delete_egraa($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('human_resources/egraat_settings/Egraat_settings/add_setting','refresh');
    }
 /* public function update_status(){
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $this->Egraat_settings_model->update_status($id,$value);
  }*/
  
   public function update_status(){
        $id = $this->input->post('id');
        $value = $this->input->post('value');
       echo $this->Egraat_settings_model->update_status($id,$value);
  }
  public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Egraat_settings_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/egraat_settings/load_details',$data);

    }


 public function get_job_date(){
        $code = $this->input->post('code');
       $data= $this->Egraat_settings_model->get_job_for_date($code);
       echo json_encode($data);

    }
    
}