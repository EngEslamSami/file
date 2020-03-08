<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_reports extends MY_Controller {

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
        
        $this->load->model('services_models/reports/Services_orders_Reports_model'); 
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        
    }

	public function index() // services_orders/reports/Services_reports/
	{

        if($this->input->post('mother_national_id_fk') && $this->input->post('mainServices') && $this->input->post('service_id_fk')){
         
          $data['fa2a_service'] = '';
          $data['type_service'] = ''; 
          
          if($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 6 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'الأجهزة الكهربائية'; 
          $table ='electrical_device_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 7 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'صيانة الأجهزة الكهربائية'; 
          $table ='maintenance_electrical_device_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 8 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'أثاث'; 
          $table ='furniture_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 9 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'فواتير الكهرباء'; 
          $table ='electrical_fatora_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 10 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'فواتير المياة'; 
          $table ='water_fatora_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 11 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'حج'; 
          $table ='haj_omra_order';
          $Conditions_arr=array('type'=>1);
          $grouby='order_num';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 12 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'عمرة'; 
          $table ='haj_omra_order';
          $Conditions_arr=array('type'=>2);
          $grouby='order_num';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 13 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'إصلاح منزل'; 
          $table ='home_repairs_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 14 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'ترميم منزل'; 
          $table ='restore_repairs_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 15 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'صيانة السيارات'; 
          $table ='cars_repairs_order';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 16 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'دفع تكاليف السفر والرعاية الصحية'; 
          $table ='health_care_orders';
          $Conditions_arr='';
          $grouby='order_num';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 17 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'تأمين الأدوية والأجهزة الطبية'; 
          $table ='insurance_medical_device_orders';
          $Conditions_arr='';
          $grouby='order_num';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 1 && $this->input->post('service_id_fk')== 18 ){
          $data['fa2a_service'] = 'خدمات  عامة';
          $data['type_service'] = 'الحقيبة والمستلزمات الطبية'; 
          $table ='school_supplies_order';
          $Conditions_arr='';
          $grouby='order_num';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 2){
          $data['fa2a_service'] = 'مساعدة زواج';
          $data['type_service'] = '--'; 
          $table ='marriage_help';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 3){
          $data['fa2a_service'] = 'التحويل لمركز طبي';
          $data['type_service'] = '--'; 
          $table ='medical_center';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }elseif($this->input->post('mainServices') == 4){
          $data['fa2a_service'] = 'معالجة البطاقة الالكترونية';
          $data['type_service'] = '--'; 
          $table ='electronic_card';
          $Conditions_arr='';
          $grouby='';
          $data['results'] = $this->Services_orders_Reports_model->select_all_data($table,$this->input->post('mother_national_id_fk'),$Conditions_arr,$grouby); 
         
          }
          $this->load->view('admin/services_orders/services_report/services_reports/get_data',$data);
        }else{
            
       	$data['categories'] = $this->Services_orders_Reports_model->select_categories();
        $data['famils'] = $this->Services_orders_Reports_model->select_famils();
        $data['title'] = 'تقرير خدمات الأسرة ';
        $data['subview'] = 'admin/services_orders/services_report/services_reports/services_reports';
        $this->load->view('admin_index', $data);   
        }
        /****************************************************/
	
	}





}

/* End of file Services_orders.php */
/* Location: ./application/controllers/services_orders/Services_orders.php */