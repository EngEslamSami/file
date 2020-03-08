<?php

class Edara_tanfezia extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('Public_relations/website/edara_tanfezia/Edara_tanfezia_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }


    public function add_managment(){ // public_relations/website/edara_tanfezia/Edara_tanfezia/add_managment

        $data['title'] = 'الإدارة التنفيذية';
        if ($this->input->post('save')){
            $this->Edara_tanfezia_model->insert_empdata();
            $this->messages('success','تمت الاضافة بنجاح  ');
            redirect('public_relations/website/edara_tanfezia/Edara_tanfezia/add_managment','refresh');
        }
        $data['all']= $this->Edara_tanfezia_model->get_all_emp();
       // $this->test(  $data['all']);
        $data['adminstations'] = $this->Edara_tanfezia_model->select_search_key('department_jobs','from_id_fk',0);
        
        
        $data['subview'] = 'admin/public_relations/website/edara_tanfezia/edara_tanfezia_view';
        $this->load->view('admin_index', $data);
    }

    /*public function GetDepart() //  public_relations/website/edara_tanfezia/Edara_tanfezia/GetDepart
    {
        if ($this->input->post("id_depart")) {
            $admin_id = $this->input->post("id_depart");
            $data_load["admin_id"] = $admin_id;
            //yara
            $data_load['departments']= $this->Edara_tanfezia_model->get_manager_cat();
         //   $data_load["departments"] = $this->Edara_tanfezia_model->select_search_key("department_jobs", "from_id_fk", $admin_id);
            $this->load->view('admin/public_relations/website/edara_tanfezia/get_department', $data_load);
        }elseif ($this->input->post("id_qsm")) {
            $this->load->model('Difined_model');
            $depart_id = $this->input->post("id_qsm");
            $Conditions_arr = array("employees.department" => $depart_id);
            $data_load["employees"] = $this->Edara_tanfezia_model->slect_where('employees','','','','id','asc');
            $this->load->view('admin/public_relations/website/edara_tanfezia/get_employees', $data_load);
        }

    }
    */

  public function GetDepart() //  public_relations/website/edara_tanfezia/Edara_tanfezia/GetDepart
    {
        if ($this->input->post("id_depart")) {
            $admin_id = $this->input->post("id_depart");
            $data_load["admin_id"] = $admin_id;
            //yara
            $data_load['departments']= $this->Edara_tanfezia_model->get_manager_cat();
         //   $data_load["departments"] = $this->Edara_tanfezia_model->select_search_key("department_jobs", "from_id_fk", $admin_id);
            $this->load->view('admin/public_relations/website/edara_tanfezia/get_department', $data_load);
        }elseif ($this->input->post("id_qsm")) {
            $this->load->model('Difined_model');
            $depart_id = $this->input->post("id_qsm");
            $Conditions_arr = array("employees.cat_manager_id_fk" => $depart_id);
            $data_load["employees"] = $this->Edara_tanfezia_model->slect_where('employees',$Conditions_arr,'','','id','asc');
            $this->load->view('admin/public_relations/website/edara_tanfezia/get_employees', $data_load);
        }

    }
    public function add_emp_row(){ //  public_relations/website/edara_tanfezia/Edara_tanfezia/add_emp_row
        $data['lenght']= $_POST['length'];
        $data['adminstations'] = $this->Edara_tanfezia_model->select_search_key('department_jobs','from_id_fk',0);
        $this->load->view('admin/public_relations/website/edara_tanfezia/get_emp_row',$data);
    }
    public function Update($id){
        $data['title'] = 'الإدارة التنفيذية';
        $data['get_emp'] = $this->Edara_tanfezia_model->get_emp($id);
    // $this->test(  $data['get_emp']);
        if ($this->input->post('save')){
            $this->Edara_tanfezia_model->update_emp($id);
           // $this->test($_POST);
         //   die;
            $this->messages('success','تم التعديل بنجاح  ');
            redirect('public_relations/website/edara_tanfezia/Edara_tanfezia/add_managment','refresh');
        }
        $data['adminstations'] = $this->Edara_tanfezia_model->select_search_key('department_jobs','from_id_fk',0);

        $data['subview'] = 'admin/public_relations/website/edara_tanfezia/edara_tanfezia_view';
        $this->load->view('admin_index', $data); 
    }
    
    public function Delete($id){ //  public_relations/website/edara_tanfezia/Edara_tanfezia/Delete
        $this->Edara_tanfezia_model->delete($id);
        $this->messages('success','تمت الحذف بنجاح  ');
        redirect('public_relations/website/edara_tanfezia/Edara_tanfezia/add_managment','refresh');
    }
    
    public function change_statuss() {
        $id=$this->input->post('select5');
      $x=  $this->Edara_tanfezia_model->update_statuss($id);
    echo $x;
    }

}