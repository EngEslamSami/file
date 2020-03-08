<?php


class Motab3a_da3men extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model("all_Finance_resource_models/all_pills/AllPills_model");

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/motab3a_da3men_models/Motab3a_da3men_model');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Connection_model");

    }

    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }

    public function index()
    {  //motab3a_da3men/Motab3a_da3men
        $data['title'] = 'الإيصالات على مدار اليوم ';
        $this->load->view('admin/all_Finance_resource_views/motab3a_da3men_views/esalat_3la_mdar_elyoum', $data);
    }


    public function insert_motab3a()
    {
        $this->Motab3a_da3men_model->insert_motab3a();
        redirect('all_Finance_resource/motab3a_da3men/Motab3a_da3men', 'refresh');

    }

    public function update_motab3a()
    {

        $this->Motab3a_da3men_model->update_motab3a();
        redirect('all_Finance_resource/motab3a_da3men/Motab3a_da3men/motab3a', 'refresh');

    }


    public function motab3a()
    {  //motab3a_da3men/motab3a

        $data['title'] = 'متابعة الداعمين';
        $this->load->view('admin/all_Finance_resource_views/motab3a_da3men_views/motab3a', $data);
    }

    public function get_motab3a_data()
    {  //motab3a_da3men/motab3a
        $data['records'] = $this->Motab3a_da3men_model->getById($_POST['id']);
        $this->load->view('admin/all_Finance_resource_views/motab3a_da3men_views/get_motab3a_data', $data);

    }

    public function all_esalat_json($type)
    {

        if ($type == 1) {
            $esalat = $this->Motab3a_da3men_model->select_all_by_fr_all_pills_all_deported(array('pills_da3men' => 0));
        } elseif ($type == 2) {
            $esalat = $this->Motab3a_da3men_model->select_all_by_fr_all_pills_all_deported(array('pills_da3men' => 1));


        }


        $arr = array();
        $arr['data'] = array();
        if (!empty($esalat)) {

            $pay_method_arr = array(1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي', 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');
            $x = 0;
            foreach ($esalat as $row) {
                $x++;


                $link = 'onclick="GetTable(' . $row->id . ');"';

                $modal2 = '  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" style="padding: 1px 5px;" title="التفاصيل"
                                           ' . $link . '  data-target="#myModal"><i class="fa fa-list"></i>
                                        </a>';


                if ($type == 1) {

                    $modal3 = ' <button type="button" data-toggle="modal" data-target="#modal-mota3a" data-pill_num="' . $row->pill_num . '" 
                     data-id="' . $row->id . '"    onclick="add_hidden($(this))"
               class="btn btn-warning btn-xs">متابعة الإيصال</button>';

                } elseif ($type == 2) {

                    $modal3 = ' <button type="button" data-toggle="modal" data-target="#modal-mota3a" data-pill_num="' . $row->pill_num . '" 
                     data-id="' . $row->id . '"    onclick="getFunc($(this))"
               class="btn btn-warning btn-xs">متابعة الإيصال</button>';

                }


                $arr['data'][] = array(


                    $x,
                    $row->pill_num,
                    $row->pill_date,
                    $row->pill_type_title,
                    $pay_method_arr[$row->pay_method],
                    $row->value,
                    $row->person_name,
                    $row->band_title,
                    $modal2 . $modal3,

                );
            }
        }
        //$this->test($arr);
        $json = json_encode($arr);
        echo $json;
    }


// end class
}