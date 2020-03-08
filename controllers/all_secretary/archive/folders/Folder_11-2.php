<?php
class Folder extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('directors/Council');
        $this->load->model('directors/Magls');
        $this->load->model('directors/Time_tables');
        $this->load->model('Difined_model');
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('system_management/Groups');
        $this->load->model('all_secretary_models/archive_m/folders/Folder_model');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
    }

    public function make_folder()  // all_secretary/archive/folders/Folder/make_folder
    {
        $data['title']="انشاء الارشيف";
        $data['folders']=$this->Folder_model->get_main_folders();
        $data['records']=$this->Folder_model->get_all_records_ar();

        $data['subview'] = 'admin/all_secretary_view/archive_v/folders/make_folder';
        $this->load->view('admin_index', $data);
    }
  public function create_folder() //all_secretary/archive/folders/Folder/create_folder
  {
      $ar_title=$this->input->post('ar_title');
      $en_title=$this->input->post('en_title');
      $from_id_fk=$this->input->post('from_id_fk');
      $from_name=$this->input->post('from_name');
      $data['ar_title']=$this->input->post('ar_title');
      $data['en_title']=$this->input->post('en_title');
      $data['type']=$this->input->post('type');
      if($this->input->post('from_id_fk')) {
          $data['from_id_fk'] = $this->input->post('from_id_fk');
          $data['from_name']=$this->input->post('from_name');
          $data['path']= $this->Folder_model->get_path($this->input->post('from_id_fk')).'/'.$en_title;
          $path=$this->Folder_model->get_path($this->input->post('from_id_fk'));
      }else{
          $data['from_id_fk'] =0;
          $data['from_name']=0;
          $data['path']= "uploads/archive/".$en_title;
          $path="uploads/archive/";

      }

        $data['date']=strtotime(date("Y-m-d"));


      $data['date_ar']=date("Y-m-d");
      $data['publisher']=$_SESSION['user_id'];
      $data['publisher_name']=$this->Folder_model->get_user_name_submit($_SESSION['user_username']);


     // $directory_name = $en_title ;
     $directory_name = iconv("UTF-8", "UTF-8//TRANSLIT",'./'.$en_title);
      $date = $en_title;
      $sub_folder=$this->Folder_model->get_sub_folder($this->input->post('from_id_fk'));
      if($data['type']==0) {
          if (!is_dir($path.'/'.$directory_name)) {
              mkdir($path.'/'.$date, 0777, TRUE);
            //  echo 1;
          } else {
             // echo 0 ;
          }
      }else{
          if (!is_dir($path.'/'.$directory_name)) {
              mkdir($path.'/'.$date, 0777, TRUE);
             // echo 1;
          } else {
            //  echo 0 ;
          }
      }
        $this->Folder_model->insert_data($data);
      $data['records']=$this->Folder_model->get_all_records();

      $data['title']="عرض المجلدات";
      $this->load->view('admin/all_secretary_view/archive_v/folders/load_folders',$data);

      
  }

    public function make_tree()
    {
        $data['folders']=$this->Folder_model->get_main_folders();
        $this->load->view('admin/all_secretary_view/archive_v/folders/tree',$data);
    }

    public function update_archeive($id) //archeive/Archieve/update_archeive
    {
      $id=base64_decode($id);
       $data['one_row']=$this->Folder_model->get_by_id($id);
        $data['folders']=$this->Folder_model->get_main_folders();

        if($this->input->post('save'))
        {
            $ar_title=$this->input->post('ar_title');
            $en_title=$this->input->post('en_title');
            $from_id_fk=$this->input->post('from_id_fk');
            $from_name= $this->Archeive_model->get_sub_folder($this->input->post('from_id_fk'));
            $data['ar_title']=$this->input->post('ar_title');
            $data['en_title']=$this->input->post('en_title');
            $data['type']=$this->input->post('type');
            if($this->input->post('from_id_fk')) {
                $data['from_id_fk'] = $this->input->post('from_id_fk');
                $data['from_name']=$this->input->post('from_name');
                $data['path']= $this->Folder_model->get_path($this->input->post('from_id_fk')).'/'.$en_title;
                $path=$this->Folder_model->get_path($this->input->post('from_id_fk'));
            }else{
                $data['from_id_fk'] =0;
                $data['from_name']=0;
                $data['path']= "uploads/archive/".$en_title;
                $path="uploads/archive/";

            }

            $data['date']=strtotime(date("Y-m-d"));


            $data['date_ar']=date("Y-m-d");
            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_username'];
            $old_path=$this->Folder_model->get_path($id);


            $directory_name = $en_title ;
            $date = $en_title;
            $sub_folder=$this->Folder_model->get_sub_folder($this->input->post('from_id_fk'));
            if($data['type']==0) {
                if (!is_dir($path.'/'.$directory_name)) {
                    mkdir($path.'/'.$date, 0777, TRUE);
                    //  echo 1;
                } else {
                    // echo 0 ;
                }
            }else{
                if (!is_dir($path.'/'.$directory_name)) {
                    mkdir($path.'/'.$date, 0777, TRUE);
                    // echo 1;
                } else {
                    //  echo 0 ;
                }
            }
            $this->Folder_model->update_data($data,$id);
            return;
        }
        $data['title']="عرض المجلدات";
        $data['subview'] = 'admin/all_secretary_view/archive_v/folders/make_folder';
        $this->load->view('admin_index', $data);

    }




    public function delete_folder($id)
    {
        $id=base64_decode($id);



        $full_path=$this->Folder_model->get_path($id);
        if (is_dir($full_path)) {
            $this->rrmdir($full_path);
        }

          $data['deleted']=1;
        $data=$this->Folder_model->get_main_folders_for_delete($id);
        //$this->Folder_model->update_data($data,$id);
        redirect('all_secretary/archive/folders/Folder/make_folder','refresh');
    }

    function rrmdir($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                  $this->rrmdir($full);
                }
                else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }


    public function fill_select()
    {
        $data['folders']=$this->Folder_model->get_main_folders();
        $this->load->view('admin/all_secretary_view/archive_v/folders/fill_select',$data);
    }

}