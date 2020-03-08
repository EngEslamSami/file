<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 28/03/2019
 * Time: 10:54 ص
 */

class Ezn_edafa extends MY_Controller
{
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
        $this->load->model('Difined_model');
        $this->load->model('st/ezn_edafa_model/Ezn_edafa_model');

        $this->load->library('google_maps');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/st/ezn_edafa';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
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
        $file_path = 'uploads/st/ezn_edafa/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function index()
    {//st/ezn_edafa/Ezn_edafa

      $data['last_id']= $this->Ezn_edafa_model->select_last_id();
       $id=base64_encode($data['last_id']);

        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Ezn_edafa_model->insert_tabr3();
         redirect('st/ezn_edafa/Ezn_edafa/update/'.$id, 'refresh');
        }

        $data['suppliers']= $this->Ezn_edafa_model->get_suppliers();

        $data['all_data'] = $this->Ezn_edafa_model->get_all_tabr3();
        $data['storage']= $this->Ezn_edafa_model->get_storage(1);

        $data['rkm_ezen'] = $this->Ezn_edafa_model->get_rkm_ezen();
        $data['erad_tabro3'] = $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));


        $data['title'] = ' اضافه اذونات الاضافه ';
        $data['subview'] = 'admin/st/ezn_edafa/ezn_edafa_view';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        $data['id'] = base64_decode($id);
        if ($this->input->post('edit')) {
//                        $this->test($_POST);
            $this->Ezn_edafa_model->update($data['id']);
            messages('success', 'تم تعديل بنجاح ');
            redirect('st/ezn_edafa/Ezn_edafa', 'refresh');
        }
        $data['one_data'] = $this->Ezn_edafa_model->get_one_tabr3($data['id']);
        $data['storage']= $this->Ezn_edafa_model->get_storage(1);
        $data['suppliers']= $this->Ezn_edafa_model->get_suppliers();


//     $this->test($data['one_data']);

        $data['erad_tabro3'] = $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));
        $data['title'] = '  تعديل اذن الاضافه  ';
        $data['subview'] = 'admin/st/ezn_edafa/ezn_edafa_view';
        $this->load->view('admin_index', $data);
    }

    public function delete($id, $rkm_ezen)
    {
        $id = base64_decode($id);
        $rkm_ezen = base64_decode($rkm_ezen);
        $this->Ezn_edafa_model->delete($id, $rkm_ezen);
        messages('success', 'تم حذف بنجاح ');
        redirect('st/ezn_edafa/Ezn_edafa', 'refresh');

    }

    public function getConnection()
    {
        $all_Donors = $this->Ezn_edafa_model->getMembersDonors();
        $arr_donors = array();
        $arr_donors['data'] = array();

        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {

                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_donors['id'] . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_donors['id'] . '" data-name="' . $row_donors['d_name'] . '" data-id="' . $row_donors['id'] . '"
                      data-mob="' . $row_donors['d_mob'] . '"/>',
                    $row_donors['d_name'],
                    $row_donors['d_national_num'],
                    $row_donors['d_mob'],
                    ''
                );
            }
        }
        echo json_encode($arr_donors);


    }
//22-5-om
    public function getConnection2($row_id,$store_id)
    {
        $all_Asnafs = $this->Ezn_edafa_model->get_asnaf($store_id);
//        $this->test($all_asnafs);
        $arr_asnaf = array();
        $arr_asnaf['data'] = array();

        if (!empty($all_Asnafs)) {
            foreach ($all_Asnafs as $row_asnafs) {

                $arr_asnaf['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_asnafs['id'] . '"
                       ondblclick="Get_sanfe_Name(this,' . $row_id . ')" 
                        id="member' . $row_asnafs['id'] . '" data-code="' . $row_asnafs['code'] . '" 
                        data-code_br="' . $row_asnafs['code_br'] . '"
                        data-name="' . $row_asnafs['name'] . '"
                        data-whda="' . $row_asnafs['title_setting'] . '" 
                        data-price="' . $row_asnafs['price'] . '" 
                        data-all_rased="' . $row_asnafs['all_rased'] . '" 
                        data-slahia="' . $row_asnafs['slahia'] . '" />',
                    $row_asnafs['code'],
                    $row_asnafs['name'],
                    $row_asnafs['title_setting'],

                    ''
                );
            }
        }
        echo json_encode($arr_asnaf);


    }

    public function GetData(){

        if ($_POST['type'] === 'fe2a'){
            $data = $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
                array('band'=>0,'erad_tabro3'=>$_POST['id']));

        } elseif ($_POST['type'] === 'band'){
            $data = $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
                array('fe2a'=>$_POST['id']));

        }
        echo json_encode($data);

    }

    public function get_detailes()
    {
        $data['one_data'] = $this->Ezn_edafa_model->get_one_tabr3($this->input->post('id'));
//        $this->test($data['one_data']);
        echo json_encode($data['one_data']);
    }

    public function print_pop(){
        $id = $this->input->post('id');

        $data['one_data'] = $this->Ezn_edafa_model->get_one_tabr3($id);

//        application/views/admin/st/tabr3_ayni/print_asnaf.php
        $this->load->view('admin/st/ezn_edafa/print_asnaf',$data);

    }
    public function get_code_tabro3()
    {
        $id= $this->input->post('id');
        $code = $this->Ezn_edafa_model->get_code($id);
        $json = json_encode($code);
        echo $json;
    }
    public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Ezn_edafa_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/ezn_edafa/load_details',$data);

    }

    public function Print_moshtriat(){
        $data['title']="طباعة المشتريات" ;
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Ezn_edafa_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/ezn_edafa/print_moshtriat', $data);

    }
    public function Print_ezn($row_id){
        $data['title']="طباعة المشتريات" ;
        $data['get_all']=$this->Ezn_edafa_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/ezn_edafa/print_moshtriat', $data);

    }
    public function add_attach($id){

        $images=$this->upload_muli_file("file");
        $this->Ezn_edafa_model->insert_attach($id,$images);
        //  $this->messages('success','تمت إضافة المرفقات');
        messages('success', 'تم اضافة المرفقات ');
        redirect('st/ezn_edafa/Ezn_edafa', 'refresh');

    }

    public function Delete_attach($id){
        $this->Ezn_edafa_model->delete_attach($id);
        messages('success', 'تم حذف المرفقات ');
        redirect('st/ezn_edafa/Ezn_edafa', 'refresh');
    }
    //================================================
    public function get_code(){ // st/ezn_edafa/Ezn_edafa/get_code
        $id= $this->input->post('id');
        $code = $this->Ezn_edafa_model->get_code($id);
        $json = json_encode($code);
        echo $json;


    }
    public function get_search_result()
    { // st/ezn_edafa/Ezn_edafa/get_search_result



        $field=$this->input->post('array_search_id');
        if($field=='ezn_rkm' || $field=='ezn_date_ar' || $field=='person_jwal'|| $field=='person_name' || $field=='mostand_rkm' || $field=='geha_name' )
        {
            $valu=$this->input->post('input_search_id');

        } elseif ($field=='no3_tabro3' || $field=='storage_fk'){
            $valu=$this->input->post('select_search_id1');
        } elseif ($field=='pay_method'){
            $valu=$this->input->post('select_search_id2');
        }  elseif ($field=='type_ezn'){
            $valu=$this->input->post('select_search_id5');
        }

        if($field !='' &&  $valu !=''){
            if( $_POST['array_search_id'] =='ezn_rkm' || $_POST['array_search_id'] =='ezn_date_ar' || $_POST['array_search_id'] =='storage_fk' || $_POST['array_search_id'] =='person_name'
                || $_POST['array_search_id'] =='person_jwal' || $_POST['array_search_id'] =='mostand_rkm' || $_POST['array_search_id'] =='geha_name'
                || $_POST['array_search_id'] =='no3_tabro3'  || $_POST['array_search_id'] =='pay_method'
                || $_POST['array_search_id'] =='type_ezn'
            ){

                $data['details']= $this->Ezn_edafa_model->getByarr($field,$valu);
            }
            $this->load->view('admin/st/ezn_edafa/load_search_details',$data );

        }
        //  $this->test($_POST);
    }

    public function get_tabr3(){  // st/ezn_edafa/Ezn_edafa/get_tabr3
        $erad_tabro3= $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));

        echo json_encode($erad_tabro3);


    }

    public function get_storage(){  // st/ezn_edafa/Ezn_edafa/get_storage
     $storage= $this->Ezn_edafa_model->get_storage(1);
       echo json_encode($storage);


    }
    
    /************************************/
    
  //    26-5-om
    public function add_esal_ezn($id)
    {
        $this->load->model("st/esalat/Esalat_estlam_model");

        $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
        $data['last_id'] = $this->Ezn_edafa_model->select_last_id();
        $id = base64_encode($data['last_id']);

        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Ezn_edafa_model->insert_tabr3();
            redirect('st/ezn_edafa/Ezn_edafa/update/' . $id, 'refresh');
        }

        $data['suppliers'] = $this->Ezn_edafa_model->get_suppliers();

        $data['all_data'] = $this->Ezn_edafa_model->get_all_tabr3();
        $data['storage'] = $this->Ezn_edafa_model->get_storage(1);

        $data['rkm_ezen'] = $this->Ezn_edafa_model->get_rkm_ezen();
        $data['erad_tabro3'] = $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));


        $data['title'] = ' اضافه اذونات الاضافه ';
        $data['subview'] = 'admin/st/ezn_edafa/ezn_edafa_view';
        $this->load->view('admin_index', $data);
    }
    
    
    
   public function change_status() {
    $id=$this->input->post('select5');
  $x=  $this->Ezn_edafa_model->update_status($id);
//echo $x;
}    
    
}