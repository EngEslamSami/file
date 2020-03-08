<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_orders extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('services_models/Services_orders_model');
        $this->load->model('services_models/Marriage_help_model');
        $this->load->model('services_models/Medical_center_model');
        $this->load->model('services_models/Electronic_card_model');
        $this->load->model('services_models/Health_care_model');
        $this->load->model('services_models/Insurance_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index() //services_orders/Services_orders
	{
	   /************************** nashwa **************************/
		if($this->input->post('add_help')){
			$files_names = array('family_card','identity_img','marriage_contract','personal_picture','hall_contract','salary_definition','imam_recommendation');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Marriage_help_model->add_help($file_array);
            messages('success','إضافة خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_medical')){
            $this->Medical_center_model->add_medical();
            messages('success','إضافة خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_electronic_card')){
            $this->Electronic_card_model->add_electronic_card();
            messages('success','إضافة خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_helthCare')){
        	$order_num = $this->Health_care_model->lastRecord()+1;
        	$file_name = 'img';
        	$file = upload_image($file_name);
            $this->Health_care_model->add_helthCare($file,$order_num);
            messages('success','إضافة خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_insurance')){
        	$order_num = $this->Insurance_model->lastRecord()+1;
        	$file_name = 'file';
        	$file = upload_image($file_name);
            $this->Insurance_model->add_insurance($file,$order_num);
            messages('success','إضافة خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        /***************************************************************/
        
        /********************* dina ***************************/
                 /**
          *** الأجهزة الكهربائية
          *** 
          **/
        
        if($this->input->post('add_electrical_devices')){
            $this->load->model('services_models/Electrical_devices'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            
            $this->Electrical_devices->add($file_array);
            messages('success','الأجهزة الكهربائية');
            redirect('services_orders/Services_orders','refresh');   
        }
         /**
          *** صيانة الأجهزة الكهربائية
          *** 
          **/
          if($this->input->post('add_maintenance_electrical_device')){
            $this->load->model('services_models/Maintenance_electrical_appliances'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            
            $this->Maintenance_electrical_appliances->add($file_array);
            messages('success','صيانة الأجهزة الكهربائية');
            redirect('services_orders/Services_orders','refresh');   
        }
          /**
          *** الإثاث
          *** 
          **/
        if($this->input->post('add_furniture')){
             $this->load->model('services_models/Furniture');  
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Furniture->add($file_array);
            messages('success','الإثاث');
            redirect('services_orders/Services_orders','refresh');   
        }
          /**
          *** فواتير الكهرباء
          *** 
          **/
        if($this->input->post('add_electrical_fatora')){
             $this->load->model('services_models/Electrical_fatora');  
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Electrical_fatora->add($file_array);
            messages('success','فواتير الكهرباء');
            redirect('services_orders/Services_orders','refresh');   
        } 
         /**
          *** فواتير المياة
          *** 
          **/
        if($this->input->post('add_water_fatora')){
            $this->load->model('services_models/Water_fatora'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Water_fatora->add($file_array);
            messages('success','فواتير المياة');
            redirect('services_orders/Services_orders','refresh');   
        } 
        /**
          *** صيانة السيارات
          *** 
          **/
        if($this->input->post('add_cars_repairs')){
            $this->load->model('services_models/Cars_repairs'); 
			$files_names = array('repair_law_file','img_form');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_file($file_name);
			}
            $this->Cars_repairs->add($file_array);
            messages('success','صيانة السيارات');
            redirect('services_orders/Services_orders','refresh');   
          }
          /**
          *** إصلاح منزل
          *** 
          **/
          if($this->input->post('add_home_repair')){
            $this->load->model('services_models/Home_repair');
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Home_repair->add($file_array);
            messages('success','إصلاح منزل');
            redirect('services_orders/Services_orders','refresh');   
        }  
          /**
          *** ترميم منزل
          *** 
          **/
          if($this->input->post('add_restore_repair')){
            $this->load->model('services_models/Restore_repair');
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Restore_repair->add($file_array);
            messages('success','ترميم منزل');
            redirect('services_orders/Services_orders','refresh');   
        } 
        /****************************** musfafa **********************************/
        
                //---------------------- 777 -------------------------------------
		if($this->input->post('add_haj')){
			$this->load->model('services_models/Model_haj_omra');
			$last = (1 + $this->Model_haj_omra->select_last_value_fild() );
			$this->Model_haj_omra->insert($last);
		//	messages('success','خدمة  الحج ');
			redirect('services_orders/Services_orders','refresh');
		}
		if($this->input->post('add_omra')){
			$this->load->model('services_models/Model_haj_omra');
			$last = (1 + $this->Model_haj_omra->select_last_value_fild() );
			$this->Model_haj_omra->insert($last);
		//	messages('success','خدمة  الحج ');
			redirect('services_orders/Services_orders','refresh');
		}
		if($this->input->post('add_school_supplies')){
			
			$this->load->model('services_models/Model_school_supplies');
			$last = (1 + $this->Model_school_supplies->select_last_value_fild() );
			$this->Model_school_supplies->insert($last);
			//	messages('success','خدمة  الحج ');
			redirect('services_orders/Services_orders','refresh');
		}
		//---------------------- 7777 -------------------------------------
        
        
        
        
        /****************************************************/
		$data['categories'] = $this->Services_orders_model->select_categories();
        $data['title'] = 'خدمات الأسرة';
        $data['subview'] = 'admin/services_orders/services_orders';
        $this->load->view('admin_index', $data);
	}

	public function getMotherData()
	{
        echo json_encode($this->Services_orders_model->getMotherData($this->input->post('mother_national_id_fk')));
	}

	public function loadView($mainServices,$mother_national_id_fk,$service_id_fk)
	{
		$data['children'] = $this->Services_orders_model->getMotherChildren($mother_national_id_fk);
		$data['nationality'] = $this->Marriage_help_model->getSetting(array('type'=>2));
		$data['areas'] = $this->Marriage_help_model->getSetting(array('type'=>15));
        $data['national_type'] = $this->Marriage_help_model->getSetting(array('type'=>1));
        
        /********** nashwa ********************/
		if($mainServices == 2) {
			$this->load->view('admin/services_orders/marriage/marriageHelp',$data);
		}
		if($mainServices == 3) {
			$this->load->view('admin/services_orders/medical/medicalCenter',$data);
		}
		if($mainServices == 4) {
			$this->load->view('admin/services_orders/electronic_card/electronicId',$data);
		}
		if($service_id_fk == 16) {
			$data['childrens'] = $this->Health_care_model->childrenWithMother($mother_national_id_fk);
			$this->load->view('admin/services_orders/health_care/health_care',$data);
		}
		if($service_id_fk == 17) {
			$data['childrens'] = $this->Insurance_model->childrenWithMother($mother_national_id_fk);
			$data['devices'] = $this->Insurance_model->selectMed_Device(16);
			$data['meds'] = $this->Insurance_model->selectMed_Device(17);
			$this->load->view('admin/services_orders/insurance_orders/insurance_orders',$data);
		}
        /*********************/
        
        /***dian ***********/
        
          if($mainServices == 1 && $service_id_fk == 6){ // electrical appliances ( الاجهزة الكهربائية)
        $this->load->model('services_models/Electrical_devices'); 
        
        $data['devices_type'] = $this->Electrical_devices->getSetting(array('type'=>18)); 
       	$this->load->view('admin/services_orders/general_services/electrical_devices',$data);
            
        }
        if($mainServices == 1 && $service_id_fk == 7){ // Maintenance of electrical appliances (صيانة الاجهزة الكهربائية)
        $this->load->model('services_models/Maintenance_electrical_appliances'); 
        
        $data['devices_type'] = $this->Maintenance_electrical_appliances->getSetting(array('type'=>18)); 
       	$this->load->view('admin/services_orders/general_services/maintenance_electrical_device_order',$data);
            
        }
       if($mainServices == 1 && $service_id_fk == 8){ // Furniture (الأثاث)
        $this->load->model('services_models/Furniture'); 
        
        $data['devices_type'] = $this->Furniture->getSetting(array('type'=>19)); 
       	$this->load->view('admin/services_orders/general_services/furniture',$data);
            
        } 
        
        if($mainServices == 1 && $service_id_fk == 9){ // electrical_fatora (فواتير الكهرباء)
        $this->load->model('services_models/Electrical_fatora'); 
       	$this->load->view('admin/services_orders/general_services/electrical_fatora',$data);
            
        }
        if($mainServices == 1 && $service_id_fk == 10){ // electrical_fatora (فواتير المياة)
        $this->load->model('services_models/Water_fatora'); 
       	$this->load->view('admin/services_orders/general_services/water_fatora',$data);
            
        }
        
        if($mainServices == 1 && $service_id_fk == 15){ // Cars_repairs (صيانة السيارات)
        $this->load->model('services_models/Cars_repairs'); 
       	$this->load->view('admin/services_orders/general_services/cars_repairs',$data);
            
        }
        if($mainServices == 1 && $service_id_fk == 13){ // Home_repair  (إصلاح منزل)
        $this->load->model('services_models/Home_repair');
        $data['repair_type'] = $this->Home_repair->getSetting(array('type'=>21));  
       	$this->load->view('admin/services_orders/general_services/home_repair',$data);
            
        }
        if($mainServices == 1 && $service_id_fk == 14){ // Restore_repair  (ترميم منزل)
        $this->load->model('services_models/Restore_repair');
        $data['repair_type'] = $this->Restore_repair->getSetting(array('type'=>24));  
       	$this->load->view('admin/services_orders/general_services/restore_repair',$data);
            
        }  
        /******************************/
        
        
        /**************** musfafa ******************/
        
        
        		//---------------------- 777 -------------------------------------
        if($mainServices == 1 && $service_id_fk == 11){ // GeneralServices
            $this->load->model('services_models/Model_haj_omra');
            $data["mother_national_id_fk"]=$mother_national_id_fk;
            $data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
            $data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
            $this->load->view('admin/services_orders/hag_omra/add_haj',$data);
           }
		if($mainServices == 1 && $service_id_fk == 12){ // GeneralServices
			$this->load->model('services_models/Model_haj_omra');
			$data["mother_national_id_fk"]=$mother_national_id_fk;
			$data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
			$data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
			$this->load->view('admin/services_orders/hag_omra/add_omra',$data);
		}
		if($mainServices == 1 && $service_id_fk == 18){ // school_supplies
			$this->load->model('services_models/Model_school_supplies');
			$this->load->model('services_models/Model_haj_omra');
			$data["mother_national_id_fk"]=$mother_national_id_fk;
			$data["all_setting"]= $this->Model_school_supplies->get_setiing();
			$data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
			$this->load->view('admin/services_orders/school_supplies/add_school_supplies',$data);
		}
        //---------------------- 7777 -------------------------------------
        
        
        /*********************************************/
        
	}

	public function loadTable($mainServices,$mother_national_id_fk,$service_id_fk)
	{
		$data['mainServices'] = $mainServices;
		$data['service_id_fk'] = $service_id_fk;
        
        /************************* nashwa **********************/
	
    /*	if($mainServices == 2) {
			$data['records'] = $this->Marriage_help_model->selectMarriage_help($mother_national_id_fk);
		}
		if($mainServices == 3) {
			$data['records'] = $this->Medical_center_model->selectMedical_center($mother_national_id_fk);
		}
		if($mainServices == 4) {
			$data['records'] = $this->Electronic_card_model->selectElectronic_card($mother_national_id_fk);
		}
		if($service_id_fk == 16) {
			$data['records'] = $this->Health_care_model->selectHealth_care(array('health_care_orders.mother_national_id_fk'=>$mother_national_id_fk));
			$this->load->view('admin/services_orders/health_care/dataTable',$data);
		}
		if($service_id_fk == 17) {
			$data['records'] = $this->Insurance_model->selectInsuranceOrder(array('insurance_medical_device_orders.mother_national_id_fk'=>$mother_national_id_fk));
			$this->load->view('admin/services_orders/insurance_orders/dataTable',$data);
		}*/
        
        if($mainServices == 2) {
			$data['records'] = $this->Marriage_help_model->selectMarriage_help($mother_national_id_fk);
			$this->load->view('admin/services_orders/marriage/dataTable',$data);
		}
		if($mainServices == 3) {
			$data['records'] = $this->Medical_center_model->selectMedical_center($mother_national_id_fk);
			$this->load->view('admin/services_orders/medical/dataTable',$data);
		}
		if($mainServices == 4) {
			$data['records'] = $this->Electronic_card_model->selectElectronic_card($mother_national_id_fk);
			$this->load->view('admin/services_orders/electronic_card/dataTable',$data);
		}
		if($service_id_fk == 16) {
			$data['records'] = $this->Health_care_model->selectHealth_care(array('health_care_orders.mother_national_id_fk'=>$mother_national_id_fk));
			$this->load->view('admin/services_orders/health_care/dataTable',$data);
		}
		if($service_id_fk == 17) {
			$data['records'] = $this->Insurance_model->selectInsuranceOrder(array('insurance_medical_device_orders.mother_national_id_fk'=>$mother_national_id_fk));
			$this->load->view('admin/services_orders/insurance_orders/dataTable',$data);
		}
        
        
        
        
        
        /********************************************/
        /*********************dina *****************/
         /********************************************/
        /*********************dina *****************/
        
          /**
          *** الأجهزة الكهربائية
          *** 
          **/
        if($mainServices == 1 && $service_id_fk == 6) {
			$this->load->model('services_models/Electrical_devices'); 
            $data['records'] = $this->Electrical_devices->selectElectrical_devices($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Electrical_devices',$data);
		}
         /**
          ***  (صيانة الاجهزة الكهربائية)
          *** 
          **/
         if($mainServices == 1 && $service_id_fk == 7) {
			$this->load->model('services_models/Maintenance_electrical_appliances'); 
            $data['records'] = $this->Maintenance_electrical_appliances->selectElectrical_devices($mother_national_id_fk);
		    $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Maintenance_devices',$data);
        }
          /**
          ***  (الأثاث)
          *** 
          **/
         if($mainServices == 1 && $service_id_fk == 8) {
			$this->load->model('services_models/Furniture'); 
            $data['records'] = $this->Furniture->selectElectrical_devices($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Furniture',$data);
		}
          /**
          ***  (فواتير الكهرباء)
          *** 
          **/
         if($mainServices == 1 && $service_id_fk == 9) {
			$this->load->model('services_models/Electrical_fatora'); 
            $data['records'] = $this->Electrical_fatora->selectElectrical_devices($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Electrical_fatora',$data);
		}
          /**
          ***  (فواتير المياة)
          *** 
          **/ 
        if($mainServices == 1 && $service_id_fk == 10) {
			$this->load->model('services_models/Water_fatora');  
            $data['records'] = $this->Water_fatora->selectElectrical_devices($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Water_fatora',$data);
		}
         /**
          ***  (صيانة السيارات)
          *** 
          **/ 
        
        if($mainServices == 1 && $service_id_fk == 15) {
			$this->load->model('services_models/Cars_repairs');   
            $data['records'] = $this->Cars_repairs->selectCars_repairs($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Cars_repairs',$data);
		}
          /**
          ***  (إصلاح المنزل)
          *** 
          **/
         if($mainServices == 1 && $service_id_fk == 13) {
			$this->load->model('services_models/Home_repair');  
            $data['records'] = $this->Home_repair->selectHome_repair($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Home_repair',$data);
		}   
         /**
          ***  (ترميم المنزل)
          *** 
          **/
         if($mainServices == 1 && $service_id_fk == 14) {
			$this->load->model('services_models/Restore_repair');
            $data['records'] = $this->Restore_repair->selectRestore_repair($mother_national_id_fk);
            $this->load->view('admin/services_orders/general_services/dataTable/dataTable_Restore_repair',$data);
		}    
        
        /**********************************************************/
        
        
        /******************* musfafa ********************/
        
        	//---------------------- 777 -------------------------------------


   	//---------------------- 777 -------------------------------------
		if($mainServices == 1 && $service_id_fk == 11){
		   $this->load->model('services_models/Model_haj_omra');
		   $Conditions_arr=array("type"=>1,"mother_national_id_fk"=>$mother_national_id_fk);
		   $data['records'] = $this->Model_haj_omra->select_all($Conditions_arr);
			$data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
			$this->load->view('admin/services_orders/hag_omra/detials_haj',$data);
	    }
		if($mainServices == 1 && $service_id_fk == 12){
			$this->load->model('services_models/Model_haj_omra');
			$Conditions_arr=array("type"=>2,"mother_national_id_fk"=>$mother_national_id_fk);
			$data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
			$data['records'] = $this->Model_haj_omra->select_all($Conditions_arr);
			$this->load->view('admin/services_orders/hag_omra/detials_omra',$data);
		}
		if($mainServices == 1 && $service_id_fk == 18){
			//$this->test($service_id_fk);
			$this->load->model('services_models/Model_school_supplies');
			$this->load->model('services_models/Model_haj_omra');
			$data['records'] = $this->Model_school_supplies->select_all($mother_national_id_fk);
			$data["all_setting"]= $this->Model_school_supplies->get_setiing();
			$data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
			$data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
			$data["result"]= $this->Model_school_supplies->getByArray($service_id_fk);
		//	$this->test($data);
			$this->load->view('admin/services_orders/school_supplies/detials_school_supplies',$data);
		}
		//---------------------- 7777 -------------------------------------

        



		//---------------------- 7777 -------------------------------------
        
        
        
        
        /***********************************************/
        
	//	$this->load->view('admin/services_orders/dataTable',$data);
	}

	public function editServicesOrders($mainServices,$id)
	{
	   
       /**************************** nashwa ***************************/
		if($this->input->post('add_help')){
			$files_names = array('family_card','identity_img','marriage_contract','personal_picture','hall_contract','salary_definition','imam_recommendation');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Marriage_help_model->edit_help($file_array,$id);
            messages('success','تعديل خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_medical')){
            $this->Medical_center_model->edit_medical($id);
            messages('success','تعديل خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_electronic_card')){
            $this->Electronic_card_model->edit_electronic_card($id);
            messages('success','تعديل خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        if($this->input->post('add_helthCare')){
        	$file_name = 'img';
        	$file = upload_image($file_name);
        	if($file == ''){
        		$file = $this->input->post('img');
        	}
        	$this->Health_care_model->deleteHealth_care($this->input->post('order_num'));
            $this->Health_care_model->add_helthCare($file,$this->input->post('order_num'));
            messages('success','تعديل خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        
        if($this->input->post('add_insurance')){
        	$file_name = 'file';
        	$file = upload_image($file_name);
        	if($file == ''){
        		$file = $this->input->post('file');
        	}
        	$this->Insurance_model->deleteInsurance($this->input->post('order_num'));
            $this->Insurance_model->add_insurance($file,$this->input->post('order_num'));
            messages('success','تعديل خدمة للأسرة');
            redirect('services_orders/Services_orders','refresh');
        }
        /************************ musfafa *********************/
        
        	//---------------------- 777 -------------------------------------
		if($this->input->post('add_haj')){
			$this->load->model('services_models/Model_haj_omra');
			$last = $this->input->post('order_num') ;
			$this->Model_haj_omra->delete($last);
			$this->Model_haj_omra->insert($last);
			//messages('success','تعديل خدمة للأسرة');
			redirect('services_orders/Services_orders','refresh');
		}
		if($this->input->post('add_omra')){
			$this->load->model('services_models/Model_haj_omra');
			$last = $this->input->post('order_num') ;
			$this->Model_haj_omra->delete($last);
			$this->Model_haj_omra->insert($last);
			//messages('success','تعديل خدمة للأسرة');
			redirect('services_orders/Services_orders','refresh');
		}
		if($this->input->post('add_school_supplies')){
			$this->load->model('services_models/Model_school_supplies');
			$this->Model_school_supplies->update($id);
			//	messages('success','الحقيبة والمستلزمات المدرسية ');
			redirect('services_orders/Services_orders','refresh');
		}
		//---------------------- 7777 -------------------------------------
        
        
        
        /*************************************************************/
        /*******************dian *************************************/
        
        /**
          *** تعديل الأجهزة الكهربائية
          *** 
          **/
        if($this->input->post('edit_electrical_devices')){
          $this->load->model('services_models/Electrical_devices'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Electrical_devices->update($file_array,$id); 
            messages('success','تعديل الأجهزة الكهربائية');
            redirect('services_orders/Services_orders','refresh'); 
        }
          /**
          *** تعديل صيانة الأجهزة الكهربائية
          *** 
          **/
        if($this->input->post('edit_maintenance_electrical_device')){
          $this->load->model('services_models/Maintenance_electrical_appliances'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Maintenance_electrical_appliances->update($file_array,$id); 
            messages('success','تعديل صيانة الأجهزة الكهربائية');
            redirect('services_orders/Services_orders','refresh'); 
        }
        
          /**
          *** تعديل الأثاث
          *** 
          **/
        if($this->input->post('edit_furniture')){
          $this->load->model('services_models/Furniture'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Furniture->update($file_array,$id); 
            messages('success','تعديل الأثاث');
            redirect('services_orders/Services_orders','refresh'); 
        }
          /**
          *** تعديل فواتير الكهرباء
          *** 
          **/  
         if($this->input->post('edit_electrical_fatora')){
          $this->load->model('services_models/Electrical_fatora'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Electrical_fatora->update($file_array,$id); 
            messages('success','تعديل فواتير الكهرباء');
            redirect('services_orders/Services_orders','refresh'); 
        }
          /**
          *** تعديل فواتير المياة
          *** 
          **/
        
        if($this->input->post('edit_water_fatora')){
            $this->load->model('services_models/Water_fatora'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Water_fatora->update($file_array,$id); 
            messages('success','تعديل فواتير المياة');
            redirect('services_orders/Services_orders','refresh'); 
        }
          /**
          *** تعديل صيانة السيارات
          *** 
          **/
           if($this->input->post('edit_cars_repairs')){
            $this->load->model('services_models/Cars_repairs');
			$files_names = array('repair_law_file','img_form');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_file($file_name);
			}
            $this->Cars_repairs->update($file_array,$id); 
            messages('success','تعديل صيانة السيارات');
            redirect('services_orders/Services_orders','refresh'); 
          }
          /**
          *** تعديل إصلاح المنزل
          *** 
          **/
          if($this->input->post('edit_home_repair')){
            $this->load->model('services_models/Home_repair');  
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Home_repair->update($file_array,$id); 
            messages('success','تعديل إصلاح المنزل');
            redirect('services_orders/Services_orders','refresh'); 
          } 
        
          /**
          *** تعديل ترميم المنزل
          *** 
          **/
          if($this->input->post('edit_restore_repair')){
            $this->load->model('services_models/Restore_repair'); 
			$files_names = array('img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = upload_image($file_name);
			}
            $this->Restore_repair->update($file_array,$id); 
            messages('success','تعديل ترميم المنزل');
            redirect('services_orders/Services_orders','refresh'); 
          } 
        
      
        /*****************************************************************/
        
        /**************nashwa **********************/
        if($mainServices == 2) {
			$data['record'] = $this->Marriage_help_model->selectMarriage_helpByID($id);
			$data['nationality'] = $this->Marriage_help_model->getSetting(array('type'=>2));
			$data['areas'] = $this->Marriage_help_model->getSetting(array('type'=>15));
		}
		if($mainServices == 3) {
			$data['record'] = $this->Medical_center_model->selectMedical_centerByID($id);
		}
		if($mainServices == 4) {
			$data['record'] = $this->Electronic_card_model->selectElectronic_cardByID($id);
		}
		if($mainServices == 16) {
			$data['record'] = $this->Health_care_model->selectHealth_careByID(array('health_care_orders.order_num'=>$id));
			$data['acceptedChildren'] = $this->Health_care_model->getHealthCareChildren($data['record']['mother_national_id_fk'],$id);
			$data['childrens'] = $this->Health_care_model->childrenWithMother($data['record']['mother_national_id_fk']);
		}
		if($mainServices == 17) {
			$data['record'] = $this->Insurance_model->selectInsuranceByID(array('insurance_medical_device_orders.order_num'=>$id));
			$data['acceptedChildren'] = $this->Insurance_model->getInsuranceChildren($data['record']['mother_national_id_fk'],$id);
			$data['childrens'] = $this->Insurance_model->childrenWithMother($data['record']['mother_national_id_fk']);
			$data['devices'] = $this->Insurance_model->selectMed_Device(16);
			$data['meds'] = $this->Insurance_model->selectMed_Device(17);
		}
        /*************************************************/
        /*********** mustafa ******************************/
        
 if($mainServices == 11){
			$this->load->model('services_models/Model_haj_omra');
			$data["result"]=$this->Model_haj_omra->get_one($id);
			$mother_national_id_fk= $data["result"]["mother_national_id_fk"];
			$data['record']=$this->Model_haj_omra->get_mother_other($mother_national_id_fk);
			$data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
			$data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
			$data['check'] = $this->Model_haj_omra->in_members($data["result"]["order_num"]);
			$data["mother_national_id_fk"]=$mother_national_id_fk;
			//   $this->test($data["record"]);
		}
		if($mainServices == 12){
			$this->load->model('services_models/Model_haj_omra');
			$data["result"]=$this->Model_haj_omra->get_one($id);
			$mother_national_id_fk= $data["result"]["mother_national_id_fk"];
			$data['record']=$this->Model_haj_omra->get_mother_other($mother_national_id_fk);
			$data["mother"]= $this->Model_haj_omra->get_mother($mother_national_id_fk);
			$data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
			$data['check'] = $this->Model_haj_omra->in_members($mother_national_id_fk);
			$data["mother_national_id_fk"]=$mother_national_id_fk;
		}
		if($mainServices == 18){
			$this->load->model('services_models/Model_school_supplies');
			$this->load->model('services_models/Model_haj_omra');
			$data["all_setting"]= $this->Model_school_supplies->get_setiing();
			$data["result"]= $this->Model_school_supplies->getByArray($id);
			$mother_national_id_fk=$data["result"]["mother_national_id_fk"];
			$data['record']=$this->Model_haj_omra->get_mother_other($mother_national_id_fk);
			$data["mother_national_id_fk"]=$mother_national_id_fk;
			$data['members'] = $this->Model_haj_omra->get_mother_members($mother_national_id_fk);
		}
        //---------------------- 7777 -------------------------------------
        
        
        /********************dina *****************/
        
         /**
            *** الأجهزة الكهربائية
            *** 
            **/
        if($mainServices == 6){
           
           $this->load->model('services_models/Electrical_devices'); 
           $data['devices_type'] = $this->Electrical_devices->getSetting(array('type'=>18));
           $data['record'] = $this->Electrical_devices->getById_Electrical_devices($id);
        }
            /**
            ***  (صيانة الاجهزة الكهربائية)
            *** 
            **/
        
          if($mainServices == 7){
           
           $this->load->model('services_models/Maintenance_electrical_appliances'); 
           $data['devices_type'] = $this->Maintenance_electrical_appliances->getSetting(array('type'=>18));
           $data['record'] = $this->Maintenance_electrical_appliances->getById_Electrical_devices($id);
        }
            /**
            ***  (الأثاث)
            *** 
            **/
         if($mainServices == 8){
           
           $this->load->model('services_models/Furniture'); 
           $data['devices_type'] = $this->Furniture->getSetting(array('type'=>19));
           $data['record'] = $this->Furniture->getById_Furniture($id);
        }
            /**
            ***  (فواتير الكهرباء)
            *** 
            **/
        
        if($mainServices == 9){
           $this->load->model('services_models/Electrical_fatora'); 
           $data['record'] = $this->Electrical_fatora->getById_Electrical_fatora($id);
        }
            /**
            ***  (فواتير المياة)
            *** 
            **/ 
        if($mainServices == 10){
           $this->load->model('services_models/Water_fatora'); 
           $data['record'] = $this->Water_fatora->getById_Electrical_fatora($id);
        }
        /**
        ***  (صيانة السيارات)
        *** 
        **/ 
        
        if($mainServices == 15){
           $this->load->model('services_models/Cars_repairs');    
           $data['record'] = $this->Cars_repairs->getById_Cars_repairs($id);
        }
        
        /**
        ***  (إصلاح المنزل)
        *** 
        **/
         if($mainServices == 13){
           $this->load->model('services_models/Home_repair');
           $data['repair_type'] = $this->Home_repair->getSetting(array('type'=>21));    
           $data['record'] = $this->Home_repair->getById_Home_repair($id);
        }
        
        /**
        ***  (ترميم المنزل)
        *** 
        **/
         if($mainServices == 14){
           $this->load->model('services_models/Restore_repair');
           $data['repair_type'] = $this->Restore_repair->getSetting(array('type'=>24));    
           $data['record'] = $this->Restore_repair->getById_Restore_repair($id);
        }
        
        
        
       /*********************************************/ 
		$data['children'] = $this->Services_orders_model->getMotherChildren($data['record']['mother_national_id_fk']);
		$data['categories'] = $this->Services_orders_model->select_categories();
        $data['title'] = 'خدمات الأسرة';
        $data['subview'] = 'admin/services_orders/services_orders';
        $this->load->view('admin_index', $data);
	}

    public function download_file($file) //services_orders/Services_orders/download
        {
        
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
        }


        public function download($fileName)
        {
        $this->load->helper('download');
        $name = $fileName;
        $data = file_get_contents('./uploads/images/'.$fileName); 
        force_download($name, $data); 
        }
       public function read_file($file_name) //// services_orders/Services_orders/read_file
        {
            $this->load->helper('file');
            $file_path = 'uploads/files/'.$file_name;
            header('Content-Type: application/pdf');
            header('Content-Discription:inline; filename="'.$file_name.'"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges:bytes');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
       }

	public function delete($mainServices,$id)
	{
	   /************************ nashwa *******************/
		if($mainServices == 2) {
			$this->Marriage_help_model->deleteMarriage_help($id);
			
		}
		if($mainServices == 3) {
			$this->Medical_center_model->deleteMedical_center($id);
		}
		if($mainServices == 4) {
			$this->Electronic_card_model->deleteElectronic_card($id);
		}
		if($mainServices == 16) {
			$this->Health_care_model->deleteHealth_care($id);
		}
		if($mainServices == 17) {
			$this->Insurance_model->deleteInsurance($id);
		}
        /******************************************/
        /******************* dian ****************/
          /**
            *** الأجهزة الكهربائية
            *** 
            **/
        if($mainServices == 6){
           
           $this->load->model('services_models/Electrical_devices'); 
           $this->Electrical_devices->delete_Electrical_devices($id);
        }
           /**
            ***  (صيانة الاجهزة الكهربائية)
            *** 
            **/
         if($mainServices == 7){
        
           $this->load->model('services_models/Maintenance_electrical_appliances'); 
           $this->Maintenance_electrical_appliances->delete_Electrical_devices($id);
        }
            /**
            ***  (الأثاث)
            *** 
            **/
        
         if($mainServices == 8){
          $this->load->model('services_models/Furniture'); 
           $this->Furniture->delete_Furniture($id);
        }
        /**
        ***  (فواتير الكهرباء)
        *** 
        **/
         if($mainServices == 9){
           $this->load->model('services_models/Electrical_fatora');  
           $this->Electrical_fatora->delete_Electrical_fatora($id);
        }
        /**
        ***  (فواتير المياة)
        *** 
        **/
         if($mainServices == 10){
           $this->load->model('services_models/Water_fatora'); 
         $this->Water_fatora->delete_Electrical_fatora($id);
        }
        /**
        ***  (صيانة السيارات)
        *** 
        **/
        
         if($mainServices == 15){
         $this->load->model('services_models/Cars_repairs');    
         $this->Cars_repairs->delete_Cars_repairs($id);
        }
         /**
        ***  (إصلاح منزل)
        *** 
        **/
         if($mainServices == 13){
         $this->load->model('services_models/Home_repair');  
         $this->Home_repair->delete_Home_repair($id);
        }
        /**
        ***  (ترميم منزل)
        *** 
        **/
        
         if($mainServices == 14){
         $this->load->model('services_models/Restore_repair');  
         $this->Restore_repair->delete_Restore_repair($id);
        }
        
        /*******************************************/
		messages('success','حذف خدمة للأسرة');
        redirect('services_orders/Services_orders','refresh');
	}
    
    
    	//----------------------------------------------------------------
	public  function  DeleteHajOmra($order_num){

		$this->load->model('services_models/Model_haj_omra');
		$this->Model_haj_omra->delete($order_num);
		messages('error','تم حذف الخدمة ');
		redirect('services_orders/Services_orders','refresh');


	}
	//----------------------------------------------------------------
	public  function  DeleteSchoolSupplies($id){

		$this->load->model('services_models/Model_school_supplies');
		$this->Model_school_supplies->delete($id);
		 messages('error','تم حذف الخدمة ');
		redirect('services_orders/Services_orders','refresh');


	}
	

}

/* End of file Services_orders.php */
/* Location: ./application/controllers/services_orders/Services_orders.php */