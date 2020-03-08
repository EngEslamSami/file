<?php
class Secretary extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
        $this->load->model('all_secretary_models/Secretary_model');
        // $this->load->model('all_secretary_models/Secretary_model');
        $this->load->model('all_secretary_models/Search');
        $this->load->model('all_secretary_models/Details_report');

               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
    public function index() {     // all_secretary/Secretary
          
        $data['title']="اضافه جهه اساسيه";
        $data['mains']=$this->Secretary_model->get_all_main_dest(1);
       
       $data['subview'] = 'admin/all_secretary_view/all_destination/add_dest';
       $this->load->view('admin_index', $data);
    }
    public function add()
    {   
       $this->Secretary_model->insert();
       redirect('all_secretary/Secretary','refresh');
    }
    public function delete() {
        $id=$this->uri->segment(4);
        $this->Secretary_model->delete($id);
         redirect('all_secretary/Secretary','refresh');
        
    }
    public function  update_main(){   // 
       $id=$this->uri->segment(4);
      
       $data2['all']=$this->Secretary_model->get_by_id($id);
       if($this->input->post('add')){
        $data['name']=$this->input->post('main_dest');
         $data['mob']=$this->input->post('phone');
         $data['email']=$this->input->post('email');
   
         $data['fax']=$this->input->post('fax');
         $data['type_id_fk']=1;
          $data['address']=$this->input->post('adress');
           
          $this->Secretary_model->update($data); 
           
          redirect('all_secretary/Secretary','refresh');
       }
        $data2['mains']=$this->Secretary_model->get_all_main_dest($id);
        $data2['subview'] = 'admin/all_secretary_view/all_destination/add_dest';
       $this->load->view('admin_index', $data2);
      
      // $this->Secretary_model->update($id,$data);
        
    }
    public function edit_trait() {
        $id=$this->uri->segment(4);
      
       $data2['all']=$this->Secretary_model->get_by_id($id);
       if($this->input->post('add')){
        $data['name']=$this->input->post('main_trait');
        
          $this->Secretary_model->update($data); 
           
          redirect('all_secretary/Secretary/add_trait','refresh');
       }
        $data2['mains']=$this->Secretary_model->get_all_main_dest(2);
        $data2['subview'] = 'admin/all_secretary_view/all_destination/add_main_trait';
       $this->load->view('admin_index', $data2);

    }
    public function add_trait() {
        $data['title']="اضافه معامله";
         $data['mains']=$this->Secretary_model->get_all_main_dest(2);
         
        
        if($this->input->post('add')){
          $this->Secretary_model->add();
          redirect('all_secretary/Secretary/add_trait','refresh');
        }
       
        
        $data['subview'] = 'admin/all_secretary_view/all_destination/add_main_trait';
       $this->load->view('admin_index', $data);
        
    }
     public function delete_trait() {
        $id=$this->uri->segment(4);
        $this->Secretary_model->delete($id);
         redirect('all_secretary/Secretary/add_trait','refresh');
        
    }
    public function delete_branch() {
        $id=$this->uri->segment(4);
        $this->Secretary_model->delete($id);
         redirect('all_secretary/Secretary/add_branch_trait','refresh');
        
    }
    
    public function add_branch_trait() {
        $data['title']="اضافه معامله فرعيه";
        $data['branch']=$this->Secretary_model-> get_all_main_trait();
         $data['records']=$this->Secretary_model-> get_all_branch();
         
        
        if($this->input->post('add')){
           $this->Secretary_model->add_branch();
           redirect('all_secretary/Secretary/add_branch_trait','refresh');
        }
        
     
       
        $data['subview'] = 'admin/all_secretary_view/all_destination/add_branch_trait';
       $this->load->view('admin_index', $data); 
        
    }
    public function update_branch() {
        $id=$this->uri->segment(4);
        $data2['branch']=$this->Secretary_model-> get_all_main_trait();
        $data2['records']=$this->Secretary_model-> get_all_branch();
      
        $data2['all']=$this->Secretary_model->get_by_id($id);
       if($this->input->post('add')){
       $data['name']=$this->input->post('main_trait');
       
          $this->Secretary_model->update($data); 
           
        redirect('all_secretary/Secretary/add_branch_trait','refresh');
       }
       $data2['mains']=$this->Secretary_model->get_all_main_dest(2);
        $data2['subview'] = 'admin/all_secretary_view/all_destination/add_branch_trait';
       $this->load->view('admin_index', $data2); 

        
    }
    
    /**
     *  =======================================================================================
     * 
     * 
     *  */
    
    
    public function searchreport(){   //  all_secretary/Secretary/searchreport

        if ($this->input->post('date_from') && $this->input->post('date_to') AND $this->input->post('search_type') ) {
            $date_from=strtotime($this->input->post('date_from'));
            $date_to=strtotime($this->input->post('date_to'));
            $data['id']=$this->input->post('date_from');
            $data['query'] = $this->Search->select_between_dates($date_from,$date_to);
            $data['orgnize'] = $this->Search->select_orgnization($date_from,$date_to);
            $data['orgnize_ex'] = $this->Search->select_orgnization_ex($date_from,$date_to);
            $data['orgnize_all'] = $this->Search->select_orgnization_all(/*$date_from,$$date_to*/);
            $data['imports']=$this->Search->getallimports($date_from,$date_to);
            $data['transactions'] = $this->Search->select_transaction();
            $data['import'] = $this->Search->selectimport($date_from,$date_to);
            $data['images'] = $this->Search->getdetails();
            $data['title'] = $this->Search->getdetails_tit();
            $data['exports']=$this->Search->getallexports($date_from,$date_to);
            $data['transactions_ex'] = $this->Search->select_transaction_ex();
            $data['organizations_ex'] = $this->Search->select_organization_ex();
            $data['export'] = $this->Search->select_ex($date_from,$date_to);
            $data['signatures_ex'] = $this->Search->select_signatures_ex();
            $data['get_job_ex'] = $this->Search->select_sign_ex();
            $data['images_ex'] = $this->Search->getdetails_ex();
            $data['title_ex'] = $this->Search->getdetails_tit_ex();
            $this->load->view('admin/all_secretary_view/all_destination/reportsearchresult',$data);
        }else{
            $data['title'] = '';
            $data['subview'] = 'admin/all_secretary_view/all_destination/reprot';
            $this->load->view('admin_index', $data);

        }
    }



    public function search_details(){  //  all_secretary/Secretary/search_details
        if ($this->input->post('date_from') || $this->input->post('date_to') ||
            $this->input->post('search_type')|| $this->input->post('search_organizations') ||
            $this->input->post('importance_type') || $this->input->post('transactions_type') ||
            $this->input->post('method_recived_type')){
            $date_from=strtotime($this->input->post('date_from'));
            $date_to=strtotime($this->input->post('date_to'));

            $Conditions_arr=array();
            if($this->input->post('date_from')!=""){
                $Conditions_arr['date >=']=$date_from;
            }
            if($this->input->post('date_to')!=""){
                $Conditions_arr['date <=']=$date_to;
            }
            if( $this->input->post('importance_type') !="0"){
                $Conditions_arr['importance_degree_id_fk']=$this->input->post('importance_type');
            }
            if($this->input->post('transactions_type') !="0"){
                $Conditions_arr['transaction_id_fk']=$this->input->post('transactions_type');
            }
            if($this->input->post('method_recived_type') !="0"){
                $Conditions_arr['method_recived_id_fk']=$this->input->post('method_recived_type');
            }
            $Conditions_arr_inp=$Conditions_arr;
            $Conditions_arr_exp=$Conditions_arr;
            if($this->input->post('search_organizations') !="0"){
                $Conditions_arr_inp['organization_from_id_fk']=$this->input->post('search_organizations');
                $Conditions_arr_exp['organization_to_id_fk']=$this->input->post('search_organizations');
            }

            if($this->input->post('search_type') ==3 || $this->input->post('search_type') ==0){
                $exports=$this->Details_report->select_where('office_exports',$Conditions_arr_exp);
                $imports=$this->Details_report->select_where('office_imports',$Conditions_arr_inp);
                if($exports != false && $imports != false ){
                    //            var_dump("ssss");
                    $data_load['search']=array_merge($exports,$imports);
                }
                elseif($imports != false){
                    //       var_dump("sss");
                    $data_load['search']=$imports;
                }elseif($exports != false){
                    $data_load['search']=$exports;
                    //     var_dump("ss");
                }
            }elseif($this->input->post('search_type') ==1){
                $data_load['search']=$this->Details_report->select_where('office_exports',$Conditions_arr_exp);
            }elseif($this->input->post('search_type') ==2){
                $data_load['search']=$this->Details_report->select_where('office_imports',$Conditions_arr_inp);
            }
            $data_load['signatures_ex'] = $this->Details_report->select_detials('signatures',1);
            $data_load['signatures_in'] = $this->Details_report->select_detials('signatures',2);
            $data_load['attachment_ex'] = $this->Details_report->select_detials('exports_imports_attachment',2);
            $data_load['attachment_in'] = $this->Details_report->select_detials('exports_imports_attachment',1);
            $data_load['office_setting']=$this->Details_report->select_office_setting();
           
            $this->load->view('admin/all_secretary_view/all_destination/details_search_report',$data_load);
        }elseif(! $_POST){
            //========select_query========
            $data['organizations'] = $this->Details_report->select_organization();
            $data['transactions'] = $this->Details_report->select_transaction();
            $data['title'] = '';
            $data['subview'] = 'admin/all_secretary_view/all_destination/details_search';
            $this->load->view('admin_index', $data);

        }
    }

    
} // END CLASS 