<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_orders extends MY_Controller {

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
          
		$this->load->model('services_models/print_orders_model/Service_print_model');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index($id)
    {
        $data['row']=$this->Service_print_model-> get_mirrage_help($id,'marriage_help');

        $this->load->view('admin/services_orders/print_orders_views/print_mirrage',$data);
    }
    public function medical($id)
    {
        $data['row']=$this->Service_print_model->get_mirrage_help($id,'medical_center');

        $this->load->view('admin/services_orders/print_orders_views/medical_print',$data);


    }
    public function card($id)
    {
        $data['row']=$this->Service_print_model->get_mirrage_help($id,'electronic_card');

        $this->load->view('admin/services_orders/print_orders_views/card_print',$data);


    }
    public function bag($id)
    {
        $data['row']=$this->Service_print_model->select_all($id,'school_supplies_order');
        $this->load->view('admin/services_orders/print_orders_views/print_bag',$data);
    }



    public function health($mother_national_id_fk)
    {

        $data['row'] = $this->Health_care_model->selectHealth_care(array('health_care_orders.mother_national_id_fk'=>$mother_national_id_fk));
        $this->load->view('admin/services_orders/print_orders_views/healthprint',$data);

    }

   public function medicine($id)
    {
        $data['row']=$this->Service_print_model->select_all($id,'insurance_medical_device_orders');
        $this->load->view('admin/services_orders/print_orders_views/medicine',$data);

    }
	
	public function print_home_repair($id){
    $this->load->model('services_models/print_orders_model/General_services');
    $data['table'] = $this->General_services->select_all($id,'home_repairs_order');
    $this->load->view('admin/services_orders/print_orders_views/home_repair', $data);
}

    /**************************************************************************************/
	                                  /** الخدمات العامة */
/**************************************************************************************/

    public function print_Electrical_devices($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'electrical_device_order');
        $this->load->view('admin/services_orders/print_orders_views/electrical_device_order', $data);
    }



    public function print_Maintenance_electrical_appliances($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'maintenance_electrical_device_order');
        $this->load->view('admin/services_orders/print_orders_views/maintenance_electrical_device_order', $data);
    }


    public function print_Electrical_fatora($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'electrical_fatora_order');
        $this->load->view('admin/services_orders/print_orders_views/electrical_fatora', $data);
    }

    public function print_Water_fatora($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'water_fatora_order');
        $this->load->view('admin/services_orders/print_orders_views/water_fatora', $data);
    }

    public function print_Furniture($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'furniture_order');
        $this->load->view('admin/services_orders/print_orders_views/furniture', $data);
    }

    public function print_haj($id){
       $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'haj_omra_order');
        $this->load->view('admin/services_orders/print_orders_views/haj', $data);
    }

    public function print_omra($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'haj_omra_order');
        $this->load->view('admin/services_orders/print_orders_views/omra', $data);
    }

    public function print_restore_repair($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'restore_repairs_order');
        $this->load->view('admin/services_orders/print_orders_views/restore_repair', $data);
    }

    public function print_cars_repairs($id){
        $this->load->model('services_models/print_orders_model/General_services');
        $data['table'] = $this->General_services->select_all($id,'cars_repairs_order');
        $this->load->view('admin/services_orders/print_orders_views/cars_repairs', $data);
    }

    /**************************************************************************************/
}

