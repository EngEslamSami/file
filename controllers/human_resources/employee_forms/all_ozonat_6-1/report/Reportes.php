
<?php /**
 *
 */
class Reportes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_forms/all_ozonat/report_model/Reports_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function ozonat()
    {//human_resources/employee_forms/all_ozonat/report/Reportes/ozonat
      $data['all_emp']= $this->Reports_model->get_all_emp(0);
        $data['title'] = "تقرير طلبات الاذونات من فترة .";
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/report/ezn_from_view';
        $this->load->view('admin_index', $data);
    }
    public function get_ozonat_search()
    {//human_resources/employee_forms/all_ozonat/report/Reportes/ozonats
      $emp_id_fk=$this->input->post('emp_id_fk');
      $agza_to=$this->input->post('agza_to');
      $agza_from=$this->input->post('agza_from');
      $data['items']= $this->Reports_model->get_ozonat_search($emp_id_fk,$agza_to,$agza_from);
      // $this->test($data);
      $data['emp_id_fk']=$emp_id_fk;

        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/report/ozonat_from_result_view', $data);
    }

}
 ?>
