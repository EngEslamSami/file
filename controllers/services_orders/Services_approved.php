<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_approved extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        

        $this->load->model('services_models/Model_services_approved');
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

	public function index()
	{
		if($this->input->post('accept')){
		    $this->Model_services_approved->servicesConfirm($this->input->post('id'), 1,$this->input->post('table'),$this->input->post('field'));
		    $this->Model_services_approved->set_operation(1);
		    messages('success','إعتماد طلب');
		   redirect('services_orders/Services_approved');
           //  var_dump(1);
            // die;
		}
        if($this->input->post('refuse')){
		    $this->Model_services_approved->servicesConfirm($this->input->post('id'), 2,$this->input->post('table'),$this->input->post('field'));
		    $this->Model_services_approved->set_operation(2);
		    messages('success','إعتماد طلب');
		    redirect('services_orders/Services_approved');
		    // var_dump(2);
		    // die;
        }if($this->input->post('transrorm')){
		    $this->Model_services_approved->servicesConfirm($this->input->post('id'), 3,$this->input->post('table'),$this->input->post('field'));
             $this->Model_services_approved->set_operation(3);
             $this->Model_services_approved->insert_transfer(3);
             messages('success','تحويل الطلب ');
        	redirect('services_orders/Services_approved');
        // var_dump($_POST);
        // die;
        }
		$tables = array(2=>'marriage_help', 3=>'medical_center', 4=>'electronic_card',
                        5=>'', 6=>'electrical_device_order', 7=>'maintenance_electrical_device_order',
                        8=>'furniture_order', 9=>'electrical_fatora_order', 10=>'water_fatora_order',
                        11=>'haj_omra_order', 12=>'haj_omra_order', 13=>'home_repairs_order',
                        14=>'restore_repairs_order', 15=>'cars_repairs_order', 16=>'health_care_orders',
                        17=>'insurance_medical_device_orders', 18=>'school_supplies_order');
		$data['categories'] = $this->Model_services_approved->selectCategories();
		foreach ($data['categories'] as $key => $value) {
			if($key == 1 || $key == 5){
				continue;
			}
            $fun = $tables[$key];
			if($key == 11) {
				$where = array($tables[$key].'.approved' => 0, $tables[$key].'.type' => 1);
				$data[$tables[$key].'_newHaj'] = $this->Model_services_approved->$fun($where);
				$where = array($tables[$key].'.approved' => 1, $tables[$key].'.type' => 1);
				$data[$tables[$key].'_acceptHaj'] = $this->Model_services_approved->$fun($where);
				$where = array($tables[$key].'.approved' => 2, $tables[$key].'.type' => 1);
				$data[$tables[$key].'_refusedHaj'] = $this->Model_services_approved->$fun($where);
				$data[$tables[$key]] = $this->Model_services_approved->$fun();
				continue;
			}
			if($key == 12) {
			    	$where = array($tables[$key].'.approved' => 0, $tables[$key].'.type' => 2);
			//	$data[$tables[$key].'_newOmra'] = $this->Model_services_approved->$fun($where);
			  	    $where = array($tables[$key].'.approved' => 1, $tables[$key].'.type' => 2);
			//	$data[$tables[$key].'_acceptOmra'] = $this->Model_services_approved->$fun($where);
			    	$where = array($tables[$key].'.approved' => 2, $tables[$key].'.type' => 2);
			//	$data[$tables[$key].'_refusedOmra'] = $this->Model_services_approved->$fun($where);
				$data[$tables[$key]] = $this->Model_services_approved->$fun();
				continue;
			}
			    $where = array($tables[$key].'.approved' => 0);
		//	$data[$tables[$key].'_new'] = $this->Model_services_approved->$fun($where);
			    $where = array($tables[$key].'.approved' => 1);
		//	$data[$tables[$key].'_accept'] = $this->Model_services_approved->$fun($where);
		     	$where = array($tables[$key].'.approved' => 3);
		//	$data[$tables[$key].'_refused'] = $this->Model_services_approved->$fun($where);
			$data[$tables[$key]] = $this->Model_services_approved->$fun();

		}
   // $this->test($data);
        //----------------------------------------------
        $this->load->model('services_models/Model_rules_service');
        $data['jobs_name']=$this->Model_rules_service->jobs_id();
       // $this->test($data['jobs_name']);
        $data["buttun_roles"]=$this->Model_rules_service->get_sesstion_roles($_SESSION['role_id_fk'],$_SESSION["emp_code"]);
        //----------------------------------------------
		$data['title'] = 'إعتماد خدمات الأسر';
        $data['subview'] = 'admin/services_orders/services_approved_new/services_approved';
        $this->load->view('admin_index', $data);
	}



}

/* End of file Services_approved.php */
/* Location: ./application/controllers/services_orders/Services_approved.php */