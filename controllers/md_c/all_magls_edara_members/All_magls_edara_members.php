<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 12:00 م
 */

class All_magls_edara_members  extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }


        $this->load->model('Difined_model');
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
//        application/models/md/all_magls_edara_members/All_magls_edara_members_model.php
        $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');

    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
public function index(){//md/all_magls_edara_members/All_magls_edara_members
    $data['all_members'] = $this->All_magls_edara_members_model->get_all_gam3ia_omomia_members();
    $data['active_magles'] = $this->All_magls_edara_members_model->get_all_active_magles();
    $data['all_data'] = $this->All_magls_edara_members_model->get_all_data();
//    $this->test($data['all_members']);

    if ($this->input->post('btn')) {

        $this->All_magls_edara_members_model->insert_magls_membser();
        messages('success', 'تم إضافة بنجاح ');
        redirect('md/all_magls_edara_members/All_magls_edara_members', 'refresh');
    }
    $data['title'] = 'إضافة عضو بالمجلس';
    $data['metakeyword'] = 'إعدادات المجلس';
    $data['metadiscription'] = '';
    $data['subview'] = 'admin/md/all_magls_edara_members/all_magls_edara_members_view';
    $this->load->view('admin_index', $data);
}
    public function update($id)
    {
        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {

            $this->All_magls_edara_members_model->update_magles_membser($data['id']);
            messages('success', 'تم تعديل بنجاح ');
            redirect('md/all_magls_edara_members/All_magls_edara_members', 'refresh');
        }
        $data['all_members'] = $this->All_magls_edara_members_model->get_all_gam3ia_omomia_members();
        $data['active_magles'] = $this->All_magls_edara_members_model->get_all_active_magles();
        $data['one_data'] = $this->All_magls_edara_members_model->get_one_data($data['id']);
//     $this->test($data['one_data']);
        $data['title'] = 'تعديل  مجلس   ';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/md/all_magls_edara_members/All_magls_edara_members_view';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $this->All_magls_edara_members_model->delete_data($id);
        redirect('md/all_magls_edara_members/All_magls_edara_members', 'refresh');

    }
}