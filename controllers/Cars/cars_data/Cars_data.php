<?php
class Cars_data extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');


        $this->load->model('system_management/Groups');
        $this->load->model('Cars/cars_data/Cars_data_model');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('Difined_model');

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
        $config['new_image'] = 'uploads/thumbs/cars_thumbs' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images/cars_img';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
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
    
    
    	    function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_image("userFile");
        }
        return $all_img;
    }
    
    

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files/cars_files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }


    public function add_cars() // Cars/cars_data/Cars_data/add_cars
    {
        $data["last_car_code"] = $this->Cars_data_model->select_last_code();
        
        $data['records'] =$this->Cars_data_model->all_cars();
        $data['marka'] =$this->Difined_model->select_search_key('cars_settings', 'type', '3');
        $data['traz'] =$this->Difined_model->select_search_key('cars_settings', 'type', '4');
        $data['colors'] =$this->Difined_model->select_search_key('cars_settings', 'type', '5');
        $data['fuel_types'] =$this->Difined_model->select_search_key('cars_settings', 'type', '6');
        if ($this->input->post('add')) {
            
          
          //  $this->test($_POST);
            $img ='b_car_img';
            $img_file = $this->upload_image($img);
            $this->Cars_data_model->insert_car($img_file);
            redirect('Cars/cars_data/Cars_data/add_cars','refresh');
        }
         $data['types_reg'] =$this->Difined_model->select_search_key('cars_settings', 'type', '9');
         $data['amaken'] =$this->Difined_model->select_search_key('cars_settings', 'type', '12'); 
        $data['title'] = 'بيانات السيارة';
        $data['subview'] = 'admin/Cars/cars_data/add_car';
        $this->load->view('admin_index', $data);
    }

    public function update_car($id) // Cars/cars_data/Cars_data/update_car
    {
        $data['car'] =$this->Cars_data_model->carById($id);
        $data['marka'] =$this->Difined_model->select_search_key('cars_settings', 'type', '3');
        $data['traz'] =$this->Difined_model->select_search_key('cars_settings', 'type', '4');
        $data['colors'] =$this->Difined_model->select_search_key('cars_settings', 'type', '5');
        $data['fuel_types'] =$this->Difined_model->select_search_key('cars_settings', 'type', '6');
        if ($this->input->post('add')) {
        // $this->test($_POST);
            $img ='b_car_img';
            $img_file = $this->upload_image($img);
            $this->Cars_data_model->update_car($img_file,$id);
            redirect('Cars/cars_data/Cars_data/add_cars','refresh');
        }
          $data['types_reg'] =$this->Difined_model->select_search_key('cars_settings', 'type', '9');
            $data['amaken'] =$this->Difined_model->select_search_key('cars_settings', 'type', '12'); 
        $data['title'] = 'البيانات الأساسية ';
        $data['subview'] = 'admin/Cars/cars_data/add_car';
        $this->load->view('admin_index', $data);
    }



    public function addInsurance($id) // Cars/cars_data/Cars_data/addInsurance
    {
        $data['carId']= $id;
        $data['car'] =$this->Cars_data_model->carById($id);
        $data['companies'] =$this->Difined_model->select_search_key('cars_settings', 'type', '1');
        $data['tamenat'] =$this->Difined_model->select_search_key('cars_settings', 'type', '2');

        if ($this->input->post('add')) {

            $this->Cars_data_model->updateInsurance($id);
            redirect('Cars/cars_data/Cars_data/addInsurance/'.$id,'refresh');
        }
        $data['title'] = 'وثيقة التأمين';
        $data['subview'] = 'admin/Cars/cars_data/add_insurance';
        $this->load->view('admin_index', $data);
    }

    public function addDates($id) // Cars/cars_data/Cars_data/addDates
    {
      $data['files'] = $this->Difined_model->select_search_key('cars_settings', 'type', '8');
        $data['car'] =$this->Cars_data_model->carById($id);
        $data['carId']= $id;
        if ($this->input->post('add')) {
            $this->Cars_data_model->updateDates($id);
            redirect('Cars/cars_data/Cars_data/addDates/'.$id,'refresh');
        }
          $data['car_attach'] =$this->Cars_data_model->get_by_id($id);
        $data['title'] = ' الوثائق والمستندات';
        $data['subview'] = 'admin/Cars/cars_data/add_dates';
        $this->load->view('admin_index', $data);
    }

    public function deleteCar($id)
    {
        $this->Cars_data_model->deleteCar($id);
        redirect('Cars/cars_data/Cars_data/add_cars','refresh');
    }
/********************************************************************/
    public function add_row()
    {
        $data['files'] = $this->Difined_model->select_search_key('cars_settings', 'type', '8');
        $this->load->view('admin/Cars/cars_data/load_page', $data);
    }
    public function add_files($id)
    {
        $files = $this->upload_muli_image('file');
        $this->Cars_data_model->attachment($id, $files);
        redirect('Cars/cars_data/Cars_data/addDates/'.$id,'refresh');
    }

        public function delete_image($id,$red)
        {
          $this->Cars_data_model->delete_img($id);
            redirect('Cars/cars_data/Cars_data/addDates/'.$red,'refresh');
       }
	   
	   

    /***************************************************************/
    
     public function update_files($id,$car_id)
    {
        $img ='file_update';
        $img_file = $this->upload_image($img);
        $this->Cars_data_model->updateAttachment($car_id,$id , $img_file);
        redirect('Cars/cars_data/Cars_data/addDates/'.$car_id,'refresh');
    }  



}
?>