<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 28/03/2019
 * Time: 10:54 ص
 */

class Tabr3_ayni extends MY_Controller
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
        $this->load->model('st/tabr3_ayni/Tabr3_ayni_model');
        $this->load->model('st/moshtriat_ayni/Moshtriat_ayni_model');

        $this->load->library('google_maps');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index()
    {//st/tabr3_ayni/Tabr3_ayni


        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Tabr3_ayni_model->insert_tabr3();
            redirect('st/tabr3_ayni/Tabr3_ayni', 'refresh');
        }

        $data['suppliers']= $this->Moshtriat_ayni_model->get_suppliers();

        $data['all_data'] = $this->Tabr3_ayni_model->get_all_tabr3();
        $data['storage']= $this->Moshtriat_ayni_model->get_storage(1);

        $data['rkm_ezen'] = $this->Tabr3_ayni_model->get_rkm_ezen();
        $data['erad_tabro3'] = $this->Tabr3_ayni_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));


        $data['title'] = ' اضافه اذونات الاضافه ';
        $data['subview'] = 'admin/st/tabr3_ayni/tabr3_ayni_view';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        $data['id'] = base64_decode($id);
        if ($this->input->post('edit')) {
//                        $this->test($_POST);

            $this->Tabr3_ayni_model->update($data['id']);
            messages('success', 'تم تعديل بنجاح ');
            redirect('st/tabr3_ayni/Tabr3_ayni', 'refresh');
        }
        $data['one_data'] = $this->Tabr3_ayni_model->get_one_tabr3($data['id']);
        $data['storage']= $this->Moshtriat_ayni_model->get_storage(1);
        $data['suppliers']= $this->Moshtriat_ayni_model->get_suppliers();


//     $this->test($data['one_data']);

        $data['erad_tabro3'] = $this->Tabr3_ayni_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));
        $data['title'] = '  تعديل اذن الاضافه  ';
        $data['subview'] = 'admin/st/tabr3_ayni/tabr3_ayni_view';
        $this->load->view('admin_index', $data);
    }

    public function delete($id, $rkm_ezen)
    {
        $id = base64_decode($id);
        $rkm_ezen = base64_decode($rkm_ezen);
        $this->Tabr3_ayni_model->delete($id, $rkm_ezen);
        messages('success', 'تم حذف بنجاح ');
        redirect('st/tabr3_ayni/Tabr3_ayni', 'refresh');

    }

    public function getConnection()
    {
        $all_Donors = $this->Tabr3_ayni_model->getMembersDonors();
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

    public function getConnection2($row_id)
    {
        $all_Asnafs = $this->Tabr3_ayni_model->get_asnaf();
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
            $data = $this->Tabr3_ayni_model->select_st_bnod_setting_by_condition(
                array('band'=>0,'erad_tabro3'=>$_POST['id']));

        } elseif ($_POST['type'] === 'band'){
            $data = $this->Tabr3_ayni_model->select_st_bnod_setting_by_condition(
                array('fe2a'=>$_POST['id']));

        }
        echo json_encode($data);

    }

    public function get_detailes()
    {
        $data['one_data'] = $this->Tabr3_ayni_model->get_one_tabr3($this->input->post('id'));
//        $this->test($data['one_data']);
        echo json_encode($data['one_data']);
    }

    public function print_pop(){
        $id = $this->input->post('id');

        $data['one_data'] = $this->Tabr3_ayni_model->get_one_tabr3($id);

//        application/views/admin/st/tabr3_ayni/print_asnaf.php
        $this->load->view('admin/st/tabr3_ayni/print_asnaf',$data);

    }
    public function get_code_tabro3()
    {
        $id= $this->input->post('id');
        $code = $this->Tabr3_ayni_model->get_code($id);
        $json = json_encode($code);
        echo $json;
    }
    public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Tabr3_ayni_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/tabr3_ayni/load_details',$data);

    }

    public function Print_moshtriat(){
        $data['title']="طباعة المشتريات" ;
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Tabr3_ayni_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/tabr3_ayni/print_moshtriat', $data);

    }
}