<?php



class Emails extends MY_Controller

{

    public $email_count;



    public function __construct()

    {

        parent::__construct();

        $this->load->library('pagination');

        if ($this->session->userdata('is_logged_in') == 0) {

            redirect('login');

        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('all_secretary_models/email/Email');
  
        $this->load->model('all_secretary_models/email/ReplayModel');

    }



    public function read_file($file_name)

    {

        $this->load->helper('file');

        // $file_name=$this->uri->segment(3);

        $file_path = 'uploads/emails/' . $file_name;

        header('Content-Type: application/pdf');

        header('Content-Discription:inline; filename="' . $file_name . '"');

        header('Content-Transfer-Encoding: binary');

        header('Accept-Ranges:bytes');

        header('Content-Length: ' . filesize($file_path));

        readfile($file_path);

    }



   /* public function download_file($file)

    {

        $this->load->helper('download');

        $name = $file;

        $data = file_get_contents('uploads/emails/' . $file);

        force_download($name, $data);

    }*/

    

    public function download_file($email_rkm, $file)

{

    $this->load->helper('download');

    $name = $file;

//        $data = file_get_contents('uploads/emails/' . $file);

    $data = file_get_contents('uploads/emails/' . $email_rkm . '/' . $file);

    force_download($name, $data);

}



    private function upload_image($file_name)

    {

        $config['upload_path'] = 'uploads/emails';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

      //  $config['max_size'] = '1024*8';

      $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

    

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



    private function upload_image_2($file_name, $folder = '')

    {

        if (!empty($folder)) {

            $config['upload_path'] = 'uploads/' . $folder;

        } else {

            $config['upload_path'] = 'uploads/files';

        }

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';

        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';

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

        $this->image_lib->initialize($config);

        $this->image_lib->resize();

    }



    private function upload_file($file_name, $folder = '')

    {

        if (!empty($folder)) {

            $config['upload_path'] = 'uploads/' . $folder;

        } else {

            $config['upload_path'] = 'uploads/files';

        }

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

      //  $config['max_size'] = '1024*8';

        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

    

        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            $this->thumb($datafile, $folder);

            return $datafile['file_name'];

        }

    }



    private function url()

    {

        unset($_SESSION['url']);

        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

    }



    public function messages($type, $text, $method = false)

    {

        $CI =& get_instance();

        $CI->load->library("session");

        if ($type == 'success') {

            return $CI->session->set_flashdata('message', '<script> swal({

                    title:"' . $text . '" ,

                    confirmButtonText: "تم"

                })</script>');

        } elseif ($type == 'warning') {

            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');

        } elseif ($type == 'error') {

            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');

        }

    }



    private function test($data = array())

    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }



    public function inbox($notif='')

    {//all_secretary/email/Emails/inbox

        if(!empty($notif))

        {

            $data['notifi']=$notif;

        }

        else{

            $data['notifi']='';

        }

        $data['title'] = 'تراسل عبر النظام (الموظفين)';

        $data['subview'] = 'admin/all_secretary_view/email/main_page';

        $this->load->view('admin_index', $data);

    }





public function upload_image_files($countfiles, $email_rkm)

{

    if (!is_dir('uploads/emails/' . $email_rkm)) {

        mkdir('uploads/emails/' . $email_rkm, 0777, TRUE);

    }

    for ($i = 0; $i < $countfiles; $i++) {

        if (!empty($_FILES['img']['name'][$i])) {

            // Define new $_FILES array - $_FILES['file']

            $_FILES['file']['name'] = $_FILES['img']['name'][$i];

            $_FILES['file']['type'] = $_FILES['img']['type'][$i];

            $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

            $_FILES['file']['error'] = $_FILES['img']['error'][$i];

            $_FILES['file']['size'] = $_FILES['img']['size'][$i];

            // Set preference

            $config['upload_path'] = 'uploads/emails/' . $email_rkm;

            $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

            //  $config['max_size'] = '5000'; // max_size in kb

            $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

            $config['overwrite'] = true;

            $config['encrypt_name'] = true;

            $config['file_name'] = $_FILES['img']['name'][$i];

            //Load upload library

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            // File upload

            if ($this->upload->do_upload('file')) {

                // Get data about the file

                $uploadData = $this->upload->data();

                $filename = $uploadData['file_name'];

                // Initialize array

                $data['filenames'][] = $filename;

                $this->Email->insert_attached($filename);

            }

        }

    }

}







   /* public function add_email()

    {

        //$this->test($_FILES);

        $countfiles = count($_FILES['img']['name']);

// $this->test($countfiles);

        $img_file = $this->upload_image_files($countfiles);

//$this->test($img_file);

        $this->Email->insert();

        $this->messages('success', ' تمت الاضافه  بنجاح');

        redirect('all_secretary/email/Emails/inbox');

    }*/

public function add_email()

{

    //$this->test($_FILES);

    $countfiles = count($_FILES['img']['name']);

    $email_rkm = $this->Email->select_last_email();



// $this->test($countfiles);

    $img_file = $this->upload_image_files($countfiles,$email_rkm);

//$this->test($img_file);

    $this->Email->insert();

    $this->messages('success', ' تمت الاضافه  بنجاح');

    redirect('all_secretary/email/Emails/inbox');

}

    public function my_emails()

    {

          $this->update_seen_email();

        $data['my_email'] = $this->Email->select_all_my_email();

        // $this->test( $_SESSION);

        //$this->test( $data['my_email']);

        $data['title'] = 'تراسل عبر النظام (الموظفين)';

//            $data['subview'] = 'admin/all_secretary_view/email/message';

        $this->load->view('admin/all_secretary_view/email/message', $data);

    }



    public function my_sent_emails()

    {

        $data['title'] = 'تراسل عبر النظام (الموظفين)';

        $data['my_email'] = $this->Email->select_all_my_sent_email();

        $this->load->view('admin/all_secretary_view/email/my_message', $data);

//            $data['subview'] = 'admin/all_secretary_view/email/my_message';

//            $this->load->view('admin_index', $data);

    }



    public function my_deleted_emails()

    {

        $data['title'] = 'تراسل عبر النظام (الموظفين)';

        $data['my_email'] = $this->Email->select_all_deleted_email();

        $this->load->view('admin/all_secretary_view/email/my_message_deleted', $data);

//            $data['subview'] = 'admin/all_secretary_view/email/my_message_deleted';

//            $this->load->view('admin_index', $data);

    }



    // new function

    public function my_email_data_js()

    {

        $type = $this->input->post('type'); //1=>select_all_my_email , 2=>select_all_deleted_email

        if ($type == 1) {

            $data['my_email'] = $this->Email->select_all_my_sent_email();

            //$this->test($data['my_email']);

        } else if ($type == 2) {

            $data['my_email'] = $this->Email->select_all_deleted_email();

        }

        //data['type_page']= $type;

        $this->load->view('admin/all_secretary_view/email/my_message_js', $data);

    }



    public function message_details($id)

    {

        //$this->Email->make_read($id);

        $this->update_read_email($id);

        $data['message'] = $this->Email->get_email_by_id($id);

        $data['files'] = $this->Email->get_files_by_id($data['message']->email_rkm);

        //  $this->test($data['files']);

//            $data['subview'] = 'admin/all_secretary_view/email/message_details';

//            $this->load->view('admin_index', $data);

        $data['strTitle']='';
        $data['strsubTitle']='';
        $list=[];
        $unlist=[];
        $list = $this->Email->ClientsListCs($data['message']->email_rkm);
        $unlist = $this->Email->Clients($data['message']->email_rkm);
        $data['strTitle']='المستخدمين المتصلين';
        $data['strsubTitle']='مستخدم';
        $data['chatTitle']=' اختر مستخدم للتواصل';


        $vendorslist=[];
        foreach($list as $u){
            $vendorslist[]=
                [
                    'user_id' =>$u['email_to_id'],
                    'user_id_notifiy'=>$u['email_to_id'],
                    'user_name' => $u['email_to_n'],
                    //'user_name'=>$this->UserModel->NameById($u['user_id']),
                    'picture_url' => $this->Email->PictureUrlById($u['email_to_id']),
                ];
        }

        $vendorslist1=[];
        foreach($unlist as $u){
            $vendorslist1[]=
                [
                    'user_id' =>$u['email_from_id'],
                    'user_id_notifiy'=>$u['email_from_id'],
                    'user_name' => $u['email_from_n'],
                    //'user_name'=>$this->UserModel->NameById($u['user_id']),
                    'picture_url' => $this->Email->PictureUrlById($u['email_from_id']),
                ];
        }
        $data['vendorslist']=$vendorslist;
        $data['vendorslist1']=$vendorslist1;
//$this->test($vendorslist);

        $data['replays'] = $this->Email->get_email_replay($data['message']->email_rkm);

        $this->load->view('admin/all_secretary_view/email/message_details', $data);

    }



    public function reply_message($id)

    {

        $data['message'] = $this->Email->get_email_by_id($id);

        $data['subview'] = 'admin/all_secretary_view/email/reply_email';

        $this->load->view('admin_index', $data);

    }



///موجودين

    public function add_reply($id){

        $this->Email->make_reply($id);

        $countfiles = count($_FILES['img']['name']);

        //  $this->test($_POST);

        $img_file = $this->upload_image_files($countfiles);

        //$this->test($img_file);

        $this->Email->insert_reply();

        $this->messages('success', ' تمت الاضافه   الرد بنجاح');

        redirect('all_secretary/email/Emails/inbox');



    }



    public function add_forward($id){

        $this->Email->make_forward($id);

        // $img = $this->input->post('img');

        // $this->Email->insert_attached($img);

        $this->Email->insert();

        $this->messages('success', ' تمت الاضافه   بنجاح');

        redirect('all_secretary/email/Emails/inbox ');



    }



   /* public function add_reply($id)

    {

        $this->Email->make_reply($id);

        $countfiles = count($_FILES['img']['name']);

        //  $this->test($_POST);

        $img_file = $this->upload_image_files($countfiles);

        //$this->test($img_file);

        $this->Email->insert_reply();

        $this->messages('success', ' تمت الاضافه   الرد بنجاح');

        redirect('all_secretary/email/Emails/my_emails');

    }*/



    public function forward_message($id)

    {

        $data['message'] = $this->Email->get_email_by_id($id);

        $data['files'] = $this->Email->get_files_by_id($data['message']->email_rkm);

        $data['subview'] = 'admin/all_secretary_view/email/forward_email';

        $this->load->view('admin_index', $data);

    }



 /*   public function add_forward($id)

    {

        $this->Email->make_forward($id);

        $img = $this->input->post('img');

        $this->Email->insert_attached($img);

        $this->Email->insert();

        $this->messages('success', ' تمت الاضافه   بنجاح');

        redirect('all_secretary/email/Emails/my_emails');

    }

*/

    public function delete_message()

    {

        $id = $this->input->post('id');

        $this->Email->make_deleted($id);

        //  $this->Email->delete($id);

    }



    public function get_details()

    {

        $data['my_email'] = $this->Email->select_all_my_email();

        // $data['subview'] = 'admin/all_secretary_view/email/email_details';

        $this->load->view('admin/all_secretary_view/email/email_details', $data);

    }



    public function get_details_message()

    {

        $data['my_email'] = $this->Email->select_all_my_email();

        // $data['subview'] = 'admin/all_secretary_view/email/email_details';

        $this->load->view('admin/all_secretary_view/email/email_details_message', $data);

    }



    public function load_tahwel()

    {



        $type = $this->input->post('type');

        if ($type == 2) {

            $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk !=' => 0));

            $data['type'] = $type;

            $this->load->view('admin/all_secretary_view/email/load_tahwel', $data);

        } elseif ($type == 1) {

            $data['all'] = $this->Email->get_all_emp(0);

            $data['type'] = $type;

            $this->load->view('admin/all_secretary_view/email/load_tahwel_employee', $data);

        } elseif ($type == 3) {

            $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk' => 0));

            $data['type'] = $type;

            $this->load->view('admin/all_secretary_view/email/load_tahwel', $data);

        }



    }



    public function load_motbaa()

    {



        $type = $this->input->post('type');

        if ($type == 2) {

            $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk !=' => 0));

            $data['type'] = $type;

        } elseif ($type == 1) {

            $data['all'] = $this->Email->get_table('employees', '');

            $data['type'] = $type;

        } elseif ($type == 3) {

            $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk ' => 0));

            $data['type'] = $type;

        }



        $this->load->view('admin/all_secretary_view/email/load_motbaa', $data);

    }



    public function load_etlaa()

    {



        $type = $this->input->post('type');

        if ($type == 2) {

            $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk !=' => 0));

            $data['type'] = $type;

        } elseif ($type == 1) {

            $data['all'] = $this->Email->get_table('employees', '');

            $data['type'] = $type;

        } elseif ($type == 3) {

            $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk ' => 0));

            $data['type'] = $type;

        }



        $this->load->view('admin/all_secretary_view/email/load_etlaa', $data);

    }



    /*  public function load_tahwel()

      {

          $type = $this->input->post('type');

          if ($type == 2) {

              $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk !=' => 0));

              $data['type'] = $type;

          } elseif ($type == 1) {

              $data['all'] = $this->Email->get_table('employees', '');

              $data['type'] = $type;

          }

          $this->load->view('admin/all_secretary_view/email/load_tahwel', $data);

      }



      public function load_motbaa()

      {

          $type = $this->input->post('type');

          if ($type == 2) {

              $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk !=' => 0));

              $data['type'] = $type;

          } elseif ($type == 1) {

              $data['all'] = $this->Email->get_table('employees', '');

              $data['type'] = $type;

          }

          $this->load->view('admin/all_secretary_view/email/load_motbaa', $data);

      }



      public function load_etlaa()

      {

          $type = $this->input->post('type');

          if ($type == 2) {

              $data['all'] = $this->Email->get_table('department_jobs', array('from_id_fk !=' => 0));

              $data['type'] = $type;

          } elseif ($type == 1) {

              $data['all'] = $this->Email->get_table('employees', '');

              $data['type'] = $type;

          }

          $this->load->view('admin/all_secretary_view/email/load_etlaa', $data);

      }*/

    ///notification

    public function get_tot_email()

    {

        $tot = $this->Email->total_rows();

        $result['tot_email'] = $tot;

        $msg = $this->Email->get_new_messages();

        $result['msg_email'] = $msg;

        echo json_encode($result);

    }



    public function get_msg_email()

    {

        $msg = $this->Email->get_new_messages();

        $result['msg_email'] = $msg;

        echo json_encode($result);

    }



    public function update_seen_email()

    {

        $this->Email->update_seen_messages();

    }



    public function update_read_email($id)

    {

        // $id=$this->input->post("id");

        $this->Email->update_read_messages($id);

    }



    public function load_email_rocket()

    {

        $this->load->view('admin/all_secretary_view/email/load_email_rocket');

    }





public function upload_image_files_ajax($countfiles, $email_rkm)

{



    if (!is_dir('uploads/emails/' . $email_rkm)) {

        mkdir('uploads/emails/' . $email_rkm, 0777, TRUE);

    }

    for ($i = 0; $i < $countfiles; $i++) {

        if (!empty($_FILES['files']['name'][$i])) {

            // Define new $_FILES array - $_FILES['file']

            $_FILES['file']['name'] = $_FILES['files']['name'][$i];

            $_FILES['file']['type'] = $_FILES['files']['type'][$i];

            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

            $_FILES['file']['error'] = $_FILES['files']['error'][$i];

            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            // Set preference

            $config['upload_path'] = 'uploads/emails/' . $email_rkm;

            $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

            //$config['max_size'] = '5000'; // max_size in kb

            $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

                $config['overwrite'] = true;

                $config['encrypt_name'] = true;



            $config['file_name'] = $_FILES['files']['name'][$i];

            //Load upload library

            $this->load->library('upload', $config);

             $this->upload->initialize($config);

            // File upload

            if ($this->upload->do_upload('file')) {

                // Get data about the file

                $uploadData = $this->upload->data();

                $filename = $uploadData['file_name'];

                // Initialize array

                $data['filenames'][] = $filename;

                $this->Email->insert_attached($filename);

            }

        }

    }

}

  /*  public function add_email_ajax()

    {

        $countfiles = count($_FILES['files']['name']);

        $img_file = $this->upload_image_files_ajax($countfiles);

        $this->Email->insert_ajax();

    }*/

   public function add_email_ajax()

{

    $countfiles = count($_FILES['files']['name']);

    $email_rkm = $this->Email->select_last_email();



    $img_file = $this->upload_image_files_ajax($countfiles, $email_rkm);

    $this->Email->insert_ajax();

}

 

    

    

    public function archive_message()

    {//select_all_my_email

        $id = $this->input->post('id');

        $this->Email->archive_message($id);



    }



/*public function make_replay()

{



    $data['replay'] = $this->Email->make_replay();

    $this->get_email_replay($data['replay']->email_rkm_fk);



}*/

public function make_replay()

{

       $id=$this->input->post('id');

    $countfiles = count($_FILES['files']['name']);

    $img_file = $this->upload_image_files_ajax_reply($countfiles,$id);

    $data['replay'] = $this->Email->make_replay();

    $this->get_email_replay($data['replay']->email_rkm_fk);

    $this->get_email_morfqat($data['replay']->email_rkm_fk);

}

public function get_email_replay($emil_rkm)

{



    $data['replays'] = $this->Email->get_email_replay($emil_rkm);

    $this->load->view('admin/all_secretary_view/email/load_replay_email', $data);



}

public function get_email_morfqat($emil_rkm)

{

    $data['files'] = $this->Email->get_files_by_id($emil_rkm);

    $this->load->view('admin/all_secretary_view/email/load_morfq_email', $data);



}



 

public function upload_image_files_ajax_reply($countfiles, $email_rkm)

{

    if (!is_dir('uploads/emails/' . $email_rkm)) {

        mkdir('uploads/emails/' . $email_rkm, 0777, TRUE);

    }

    for ($i = 0; $i < $countfiles; $i++) {

        if (!empty($_FILES['files']['name'][$i])) {

            // Define new $_FILES array - $_FILES['file']

            $_FILES['file']['name'] = $_FILES['files']['name'][$i];

            $_FILES['file']['type'] = $_FILES['files']['type'][$i];

            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

            $_FILES['file']['error'] = $_FILES['files']['error'][$i];

            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            // Set preference

            $config['upload_path'] = 'uploads/emails/' . $email_rkm;

            $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

            //  $config['max_size'] = '5000'; // max_size in kb

            $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

            $config['overwrite'] = true;

                $config['encrypt_name'] = true;

            $config['file_name'] = $_FILES['files']['name'][$i];

            //Load upload library

            $this->load->library('upload', $config);

             $this->upload->initialize($config);

            // File upload

            if ($this->upload->do_upload('file')) {

                // Get data about the file

                $uploadData = $this->upload->data();

                $filename = $uploadData['file_name'];

                // Initialize array

                $data['filenames'][] = $filename;

                $this->Email->insert_attached_reply($filename, $email_rkm);

            }

        }

    }

}
///////////////////////////chat///////////////////////////////////////////////////////
public function send_text_message()//all_secretary/chat/s/ChatController
	{
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
		 	$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];
			 
		}else{
			$messageTxt = $post['messageTxt'];
        }
        
        
        if($_SESSION['role_id_fk']==3)
        {
            $sender_id=$_SESSION['emp_code'];
        }else
        {
         $sender_id =$_SESSION['user_id'];
        }
				$data=[
                   
                    'email_rkm' =>$post['email_rkm'],
                   'sender_id'=>$sender_id,
					'receiver_id' => $post['receiver_id'],
					'message' =>   $messageTxt,
					'attachment_name' => $attachment_name,
					'file_ext' => $file_ext,
					'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];
		  
 				$query = $this->ReplayModel->SendTxtMessage($data); 
 				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
             
 		   echo json_encode($response);
	}
	public function ChatAttachmentUpload(){
		 
		
		$file_data='';
		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
				$config['upload_path']          = './uploads/attachment';
				$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attachmentfile'))
				{
					echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
				}
				else
				{
					$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
					return $file_data;
				}
		    }
 		 
	}
	
	public function get_chat_history_by_vendor(){
		$receiver_id =$this->input->get('receiver_id');
		$email_rkm =$this->input->get('email_rkm');
		$Logged_sender_id =$_SESSION['user_id'];
     
		$history = $this->ReplayModel->GetReciverChatHistory($receiver_id,$email_rkm);
        //print_r($history);
		foreach($history as $chat):
			
			$message_id =$chat['id'];
            $sender_id = $chat['sender_id'];
           
			$userName = $this->Email->GetName($chat['sender_id']);
			$userPic = $this->Email->PictureUrlById($chat['sender_id']);
			
			$message = $chat['message'];
			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
			
 		?>
        	<?php
				$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
					$classBtn = 'right';
					if($Logged_sender_id==$sender_id){$classBtn = 'left';}
					
					$attachment_name = $chat['attachment_name'];
					$file_ext = $chat['file_ext'];
					$mime_type = explode('/',$chat['mime_type']);
					
					$document_url = base_url('uploads/attachment/'.$attachment_name);
					
				  if($mime_type[0]=='image'){
 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
				  }else{
					$messageBody='';
					 $messageBody.='<div class="attachment">';
                          $messageBody.='<h4>Attachments:</h4>';
                           $messageBody.='<p class="filename">';
                            $messageBody.= $attachment_name;
                          $messageBody.='</p>';
        
                          $messageBody.='<div class="pull-'.$classBtn.'">';
                            $messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                          $messageBody.='</div>';
                        $messageBody.='</div>';
					}
						
											
				}else{
					$messageBody = $message;
				}
			?>
            
            
        
             <?php if($Logged_sender_id!=$sender_id){?>     
                  <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                         <?=$messageBody;?>
                      </div>
                      <!-- /.direct-chat-text -->
                      
                    </div>
                    <!-- /.direct-chat-msg -->
			<?php }else{?>
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      	<?=$messageBody;?>
                          	<!--<div class="spiner">
                             	<i class="fa fa-circle-o-notch fa-spin"></i>
                            </div>-->
                       </div>
                       <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
             <?php }?>
        
        <?php
		endforeach;
 		
	}

	/////////////////////////////////notification////////////////////
	public function get_tot_chat()
    {
        $email_rkm =$this->input->get('email_rkm');
        $tot = $this->ReplayModel->total_rows($email_rkm);
        $result['tot_replay'] = $tot;
		$msg = $this->ReplayModel->get_new_chat($email_rkm);
        $result['msg_replay'] = $msg;
        echo json_encode($result);
    }
    
	public function get_tot_chat_notifi()
    {  
        $tot = $this->ReplayModel->total_rows_notifi();
        $result['tot_replay'] = $tot;
		$msg = $this->ReplayModel->get_new_chat_notifi();
        $result['msg_replay'] = $msg;
        echo json_encode($result);
    }
 
    public function update_seen_chat()
    {
        $id= $this->input->get('id');
        $email_rkm =$this->input->post('email_rkm');
        $this->ReplayModel->update_seen_chat($id,$email_rkm);
    }









}