<?php

class  Sponsor_programs extends MY_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        


       /***************models*************************/
        $this->load->model('Difined_model');
        $this->load->model('all_Finance_resource_models/sponsor_programs/Programs_dep');
        /***************models*************************/
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }


    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }


    private function ara_date()
    {

        $nameday = date("l");

        $day = date("d");

        $namemonth = date("m");


        $year = date("Y");

        switch ($nameday) {

            case "Saturday":

                $nameday = "السبت";

                break;

            case "Sunday":

                $nameday = "الأحد";

                break;

            case "Monday":

                $nameday = "الاثنين";

                break;

            case "Tuesday":

                $nameday = "الثلاثاء";

                break;

            case "Wednesday":

                $nameday = "الأربعاء";

                break;

            case "Thursday":

                $nameday = "الخميس";

                break;

            case "Friday":

                $nameday = "الجمعة";

                break;

        }

        switch ($namemonth) {

            case 1:

                $namemonth = "يناير";

                break;

            case 2:

                $namemonth = "فبراير";

                break;

            case 3:

                $namemonth = "مارس";

                break;

            case 4:

                $namemonth = "إبريل";

                break;

            case 5:

                $namemonth = "مايو";

                break;

            case 6:

                $namemonth = "يونيو";

                break;

            case 7:

                $namemonth = "يوليو";

                break;

            case 8:

                $namemonth = "اغسطس";

                break;

            case 9:

                $namemonth = "سبتمبر";

                break;

            case 10:

                $namemonth = "اكتوبر";

                break;

            case 11:

                $namemonth = "نوفمبر";

                break;

            case 12:

                $namemonth = "ديسمبر";

                break;

        }

        return "$nameday $day $namemonth $year";


    }

    /**
     * @param $type     success
     * @param $type     wiring
     * @param $type     error
     */
    private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

    }

    private function thumb($data)

    {

        $config['image_library'] = 'gd2';

        $config['source_image'] = $data['full_path'];

        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];

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

        $config['upload_path'] = 'uploads/images';

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

    //////////////////////////////////
    private function upload_file($file_name)
    {

        $config['upload_path'] = 'uploads/files';

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

    ////////////////////end of excel library option
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    ///////////////////////////////

    public function index()
    {
        $this->url();
        $data['title'] = 'لوحة التحكم';
        $data['subview'] = 'admin/main';
        $this->load->view('index', $data);

    }

    /************************************************************/
    public function programs_to($id){//all_Finance_resource/Sponsor_programs/programs_to/0

        if($this->input->post('add') && $id == 0){
            $this->Programs_dep->insert2();
            $this->message('success','إضافة برامج');
            redirect('all_Finance_resource/Sponsor_programs/programs_to/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Programs_dep->update2($id);
            $this->message('success','تعديل برامج');
            redirect('all_Finance_resource/Sponsor_programs/programs_to/0','refresh');
        }
        if($id != 0)
         $data['result']=$this->Programs_dep->select_programs_to($id);
        $data['donors'] = $this->Programs_dep->select_all_sponsors();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select2();
        $data['subview'] = 'admin/all_Finance_resource_views/sponsor_programs/programs_to';
        $this->load->view('admin_index', $data);
    }
    public function delete_programs_to($id){
        $this->db->where('donor_id',$id);
        $this->db->delete('programs_to');
        redirect('all_Finance_resource/Sponsor_programs/programs_to/0','refresh');
    }
    /************************************************************/
    public function add_Payment_of_contributions(){//all_Finance_resource/Sponsor_programs/add_Payment_of_contributions
        $data['donors'] = $this->Programs_dep->select_all_sponsors();
        $data['last_id'] = $this->Programs_dep->select_last_participation();
        $data['banks'] = $this->Programs_dep->select_all_defin('banks','','','','');
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select2();
        if($this->input->post('add') ){
           // $this->test($_POST);
            $id = $this->Programs_dep->insert_Payment();
          //  $this->print_programs_depart($id);
 redirect('all_Finance_resource/Sponsor_programs/add_Payment_of_contributions', 'refresh');
        }elseif($this->input->post('valu')){
            $data['donors'] = $this->Programs_dep->select_all_sponsors();
            $data['programs'] = $this->Programs_dep->select();
            $data['table'] = $this->Programs_dep->select2();
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/all_Finance_resource_views/sponsor_programs/load_pages/get_table2',$data);
        }else{
            $this->load->model('Difined_model');
            $data['all_records'] = $this->Programs_dep->select_search_key2('participation_money','deport',0,"pill_num");
            $data['banks'] = $this->Programs_dep->select_all_defin('banks','','','','');
            $data['subview'] = 'admin/all_Finance_resource_views/sponsor_programs/Payment_of_contributions';
            $this->load->view('admin_index', $data);

        }
    }

    public function print_programs_depart($id){
        $this->load->library("Convert_ar");
        $data["tools"]=$this->convert_ar;
        $data['all_records'] =
            $this->db->select('participation_money.*, sponsors.*')
                ->join('sponsors','sponsors.id=participation_money.donor_id')
                ->where('participation_money.id',$id)
                ->get('participation_money')
                ->result();
        $query = $this->db->select('*')->get('banks');
        if($query->num_rows() > 0)
            foreach ($query->result() as $row)
            $banks[$row->id] = $row;
        $data['banks'] = $banks;
        $this->load->view('admin/all_Finance_resource_views/sponsor_programs/print',$data);
    }



    public function delete_contributions($id,$pill_num){
        $this->Difined_model->delete("participation_money",array("pill_num"=>$pill_num));
        redirect('all_Finance_resource/Sponsor_programs/add_Payment_of_contributions','refresh');
    }


    public function edit_contributions($id,$pill_num){
        //var_dump($pill_num); die;

        if($this->input->post('update') ){
            $this->Difined_model->delete("participation_money",array("pill_num"=>$pill_num));
            $this->Programs_dep->insert_Payment();
            $this->message('success','تعديل الإشتراك');
            redirect('all_Finance_resource/Sponsor_programs/sponsor_programs/add_Payment_of_contributions', 'refresh');
        }
      $data['all_records'] = $this->Programs_dep->select_search_key2('participation_money','deport',0,"pill_num");
        $data['donors'] = $this->Programs_dep->select_all_sponsors();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select2();
        $data['result']=$this->Programs_dep->get_condition($id);
        $data['banks'] = $this->Programs_dep->select_all_defin('banks','','','','');
        $data['subview'] = 'admin/all_Finance_resource_views/sponsor_programs/Payment_of_contributions';
        $this->load->view('admin_index', $data);

    }
    /************************************************************/
}//END CLASS
