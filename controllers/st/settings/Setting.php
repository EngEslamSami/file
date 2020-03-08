<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 31/03/2019
 * Time: 02:35 م
 */

class Setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('st/settings/Model_setting');

        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();


        $this->myarray = array(
            1 => 'المستودعات ',
            2 => 'وحدات الأصناف',
            3 => 'نشاط الموردين',
        );


        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('system_management/Groups');


        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }


    public function index($type = 0)
    {  //st/settings/Setting
        $this->load->model('Difined_model');

        $data['typee'] = $type;
        $data['all'] = $this->Model_setting->get_all_data($this->myarray);

//2-4-om
        $data['table'] = $this->Model_setting->select_all();
        $data['sub_products'] = $this->Model_setting->select_all_with_from();
        $data['main_products'] = $this->Difined_model->Model_setting->select_all();
        $data['main_result_products'] = $this->Model_setting->select_all();


	    $records = $this->Model_setting->getAllAccounts();
        $data['tree'] = $this->buildTree($records);

        $products = $this->Model_setting->getAllproducts();
        $data['product_tree'] = $this->buildTree_procuts($products);

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/st/settings/setting_view';
        $this->load->view('admin_index', $data);
    }




    public function buildTree_procuts($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->from_id == $parent) {
                $children = $this->buildTree_procuts($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }
    public function AddSitting($type=0)
    {  // st/settings/Setting/AddSitting
        if ($this->input->post('add')) {
            $this->Model_setting->add($type);
            $this->message('success', 'إضافة ' . $this->myarray[$type]);
            redirect('st/settings/Setting/index/' . $type, 'refresh');
        }
//       2-4-om

        $this->load->model('Difined_model');

        if ($this->input->post('add_main_product')) {
            $this->Model_setting->insert_main_product();

            $this->message('success', ' اﻹﺿﺎﻓﺔ');
            redirect('st/settings/Setting', 'refresh');
        } elseif ($this->input->post('add_sub_product')) {
            $this->Model_setting->insert_sub_product();
            $this->message('success', ' اﻹﺿﺎﻓﺔ ');
            redirect('st/settings/Setting', 'refresh');
        } elseif ($this->input->post('from_id_value')) {
            $from_id_value = $this->input->post('from_id_value');
            $data['levels'] = $this->Difined_model->select_search_key("products", 'id', $from_id_value);

            $this->load->view('admin/st/settings/get_data', $data);
        }

    }

    public function UpdateSitting($id, $type)
    {
        $data['typee'] = $type;

            if ($type =='tab_fe2at' || $type=='tab_wasf'){
            $this->load->model('Difined_model');

            $data['table'] = $this->Model_setting->select_all();
            $data['main_products'] = $this->Difined_model->select_all("products", "", "", "", "");
            $data['products'] = $this->Difined_model->getById("products", $id);

		 $products = $this->Model_setting->getAllproducts();
        $data['product_tree'] = $this->buildTree_procuts($products);


            if ($this->input->post('add_main_product')) {
                $this->Model_setting->update_main_product($id);

                $this->message('success', 'التعديل');
                redirect('st/settings/Setting', 'refresh');
            } elseif ($this->input->post('add_sub_product')) {
                $this->Model_setting->update_sub_product($id);
                $this->message('success', 'التعديل');
                redirect('st/settings/Setting', 'refresh');
            }

        }

        else{
                $data['record'] = $this->Model_setting->getById($id);
                $data['typee'] = $type;
                $data["id"] = $id;
                $data["type_name"] = $this->myarray[$type];
                if ($this->input->post('add')) {
                    $this->Model_setting->update($id);
                    $this->message('success', ' تحديث البيانات');
                    redirect('st/settings/Setting/index/' . $type, 'refresh');
                }

            }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/st/settings/setting_view';
        $this->load->view('admin_index', $data);
    }

    public function DeleteSitting($id, $type)
    {
        if($type =='tab_fe2at' || $type=='tab_wasf'){
            $this->Model_setting->delete_product($id);
        $this->message('success', 'حذف ');
           redirect('st/settings/Setting', 'refresh');

        } else{
            $this->Model_setting->delete($id);
      $this->message('success', 'حذف ');
          redirect('st/settings/Setting/index/' . $type, 'refresh');
        }

    }
    
    
       public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }
  
  /*  public function update_rkm_hesab(){
        $id = $this->input->post('id');
        $rkm_hesab = $this->input->post('rkm_hesab');
        $this->Model_setting->update_rakm_hesab($id,$rkm_hesab);

    }*/
    
    
     public function update_rkm_hesab_erad(){

        $id = $this->input->post('id');
        $rkm_hesab = $this->input->post('rkm_hesab');
        $rkm_hesab_type = $this->input->post('rkm_hesab_type');
        $this->Model_setting->update_rakm_hesab($id,$rkm_hesab,$rkm_hesab_type);

    }


}