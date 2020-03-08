<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_report extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        
        $this->load->model('familys_models/Family_report_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index()
	{
		$data['mothers'] = $this->Family_report_model->getMothers();
        $data['title'] = 'تقرير تفصيلي للأسرة';
        $data['subview'] = 'admin/familys_views/reports/familyReport';
        $this->load->view('admin_index', $data);
	}

	public function getMotherData() 
	{
		$data['services'] = $this->Family_report_model->selectDataServices($this->input->post('mother_national_id_fk'));
		$data['categories'] = $this->Family_report_model->select_categories();
		$data['motherData'] = $this->Family_report_model->motherData($this->input->post('mother_national_id_fk'));
		$data['fatherData'] = $this->Family_report_model->fatherData($this->input->post('mother_national_id_fk'));
		$data['childrenData'] = $this->Family_report_model->childrenData($this->input->post('mother_national_id_fk'));
		$data['houseData'] = $this->Family_report_model->houseData($this->input->post('mother_national_id_fk'));
		$data['deviceData'] = $this->Family_report_model->deviceData($this->input->post('mother_national_id_fk'));
		$data['financeData'] = $this->Family_report_model->financeData($this->input->post('mother_national_id_fk'));
		//---------------------------------------------------------------
         $this->load->model('familys_models/Family_print');
         $this->load->model('Difined_model');
         $this->load->model('familys_models/House');
        /***********************************/
        $data['check_data']=$this->House->getById($this->input->post('mother_national_id_fk'));
        $data_in=$data["check_data"];
        $data['area'] = $this->Family_print->select_places(0);
        if(isset($data_in) && !empty($data_in) && $data_in !=null) {
        $data['city'] = $this->Family_print->select_places($data_in["h_area_id_fk"]);
        $data['centers'] = $this->Family_print->select_places($data_in["h_city_id_fk"]);
        $data['village'] = $this->Family_print->select_places($data_in["h_center_id_fk"]);
        }
        $data['job_titles']=  $this->Family_print->get_from_family_setting(3);
        $data['nationality']=  $this->Family_print->get_from_family_setting(2);
        $data['national_num_type']=  $this->Family_print->get_from_family_setting(1);
        $data['arr_type_house']=  $this->Family_print->get_from_family_setting(14);
        $data['arr_direct']=  $this->Family_print->get_from_family_setting(23);
        $data['house_state']=  $this->Family_print->get_from_family_setting(22);
        $data['house_own']=  $this->Family_print->get_from_family_setting(13);
        $data['devices']=$this->Family_print->get_from_family_setting(18);
        $data["banks"]=$this->Family_print->select_banks();
        $data['member_status']=$this->Family_print->get_files_status_setting();
        $data['marital_status_array']=  $this->Family_print->get_from_family_setting(4);
        $data['living_place_array']=  $this->Family_print->get_from_family_setting(5);
        $data['arr_ed_state']=  $this->Family_print->get_from_family_setting(40);
        $data['education_level_array']=  $this->Family_print->get_from_family_setting(8);
        $data['specialties']=  $this->Family_print->get_from_family_setting(45);
        $data['women_houses']=    $this->Family_print->get_from_family_setting(44);
        $data['arr_deth']=  $this->Family_print->get_from_family_setting(25);
        $data['personal_characters']=  $this->Family_print->get_from_family_setting(48);
        $data['relations_with_family']=  $this->Family_print->get_from_family_setting(49);
        $data['works_type']=  $this->Family_print->get_from_family_setting(50);
        $data['member_status']=$this->Family_print->get_all_files_status();
        $data["relationships"]=$this->Family_print->get_from_family_setting(34);
        $data['health_status_array']=  $this->Family_print->get_from_family_setting(6);
        $data["person_type"]= $this->Family_print->get_from_family_setting(32);
        /***********************************/
        //------------------------------------------------------------------
        $this->load->view('admin/familys_views/reports/Get_familyReport',$data);
	}
	/********************************************************************/
	
	    public function report_files_status()  //  family_controllers/Family_report/report_files_status
    {

        $data['title'] = 'تقرير حالات الملفات';
        $data['subview'] = 'admin/familys_views/reports/report_files_status';
        $this->load->view('admin_index', $data);
    }

    public function report_files_status_search(){
        $this->load->model("familys_models/reports/Reports_model");


        $suspend_id = $this->input->post('suspend_num');
        $from = strtotime($this->input->post('date_from') );
        $to = strtotime($this->input->post('date_to') );

    $data['to'] = $to;
           $data['from'] = $from;
        $data['mothers'] = $this->Reports_model->report_files_status_search($suspend_id, $from, $to);

       
      
        $this->load->view('admin/familys_views/reports/result_files_status',$data);

    }
    
    	public  function houses_report(){ //family_controllers/Family_report/houses_report
		$this->load->model('Difined_model');
		$this->load->model('Difined_model_new');
		$this->load->model('familys_models/reports/Reports_model');
		if(isset($_POST['house_id']) && isset($_POST['type'])){
			if($_POST['type'] ==='all'){
				$arr =array('member_house_check'=>1,'member_house_id_fk'=>$_POST['house_id']);

			}elseif ($_POST['type'] >1){
				$arr =array('member_person_type'=>$_POST['type'],'member_house_id_fk'=>$_POST['house_id']);
			}
			$data['all_records']=$this->Difined_model_new-> select_where("f_members",$arr,'');
			$data["person_type"]=$this->Reports_model->get_from_family_setting(32);
			$this->load->view('admin/familys_views/reports/get_house_data',$data);

		}else{
		$data["person_type"]=$this->Reports_model->get_from_family_setting(32);
		$data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
		$data['title'] =' تقرير الدار';
		$data['subview'] = 'admin/familys_views/reports/houses_report';
		$this->load->view('admin_index', $data);
		}
		
	}
    
    
	
	

}

/* End of file Family_report.php */
/* Location: ./application/controllers/family_controllers/Family_report.php */