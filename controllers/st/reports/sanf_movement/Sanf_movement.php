<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 16/06/2019
 * Time: 09:31 ص
 */

class Sanf_movement extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model("st/reports/sanf_movement/Sanf_movement_model");


        $this->load->helper(array('url', 'text', 'permission', 'form'));


        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

    }

    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }


    public function index()
    {//st/reports/sanf_movement/Sanf_movement


        $data['storage'] = $this->Sanf_movement_model->get_storage(1);

        $data['title'] = 'حركة الصنف';
        $data['subview'] = 'admin/st/reports/sanf_movement/sanf_movement_view';
        $this->load->view('admin_index', $data);
    }


    public function getConnection2()
    {
        $all_Asnafs = $this->Sanf_movement_model->get_asnaf();
//        $this->test($all_asnafs);
        $arr_asnaf = array();
        $arr_asnaf['data'] = array();

        if (!empty($all_Asnafs)) {
            foreach ($all_Asnafs as $row_asnafs) {

                $arr_asnaf['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_asnafs['id'] . '"
                       ondblclick="Get_sanfe_Name(this)" 
                        id="member' . $row_asnafs['id'] . '" data-code="' . $row_asnafs['code'] . '" 
                        data-name="' . $row_asnafs['name'] . '"
                         />',
                    $row_asnafs['code'],
                    $row_asnafs['name'],

                    ''
                );
            }
        }
        echo json_encode($arr_asnaf);


    }

    public function search_result()
    {

//        search
        $data['result'] = $this->Sanf_movement_model->search();

//        $this->test($data['result']);

        $this->load->view('admin/st/reports/sanf_movement/sanf_movement_result_view.php', $data);
    }
}