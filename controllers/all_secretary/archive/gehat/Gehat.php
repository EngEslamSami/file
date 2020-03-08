<?php
class Gehat extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
     
        $this->load->model('all_secretary_models/archive_m/gehat/Geha_model');
  

               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index() {     // all_secretary/archive/gehat/Gehat
          
        $data['title']="اضافه جهه اساسيه";
      $data['result']= $this->Geha_model->select_all_gehat();
       //$this->test(  $data['result']);
       $data['subview'] = 'admin/all_secretary_view/archive_v/gehat/add_geha';
       $this->load->view('admin_index', $data);
    }
    public function add()
    {   
       $this->Geha_model->insert();
       $this->messages('success', ' تمت الاضافه  بنجاح');
       redirect('all_secretary/archive/gehat/Gehat','refresh');
    }
    public function delete() {
        $id=$this->uri->segment(6);
        $this->Geha_model->delete($id);
        redirect('all_secretary/archive/gehat/Gehat','refresh');
        
    }
    public function  update_main($id){   
       if($this->input->post('add')){
      
          $this->Geha_model->update($id); 
          $this->messages('success', ' تمت التعديل  بنجاح');
          redirect('all_secretary/archive/gehat/Gehat/update_main/'.$id,'refresh');
       }
       $data['title']="تعديل جهه اساسيه";
       $data['all']=$this->Geha_model->get_by_id($id);
        $data['subview'] = 'admin/all_secretary_view/archive_v/gehat/add_geha';
       $this->load->view('admin_index', $data);
        
    }
    public function load_details()
    {
        if ($this->input->post('row_id')) {
            $id = $this->input->post('row_id');
            $data['all']=$this->Geha_model->get_by_id($id);
     
           

        }

        $this->load->view('admin/all_secretary_view/archive_v/gehat/load_details', $data);


    }
    public function add_ms2ol()
    {
  
      // $this->test($_POST);
        $id=$this->input->post('geha');
        $this->Geha_model->add_ms2ol($id);
        //$this->messages('success', ' تمت الاضافه  بنجاح');
        //redirect('all_secretary/archive/gehat/Gehat/add_ms2ol_gehat/'.$id,'refresh');
     
    }
    public function add_ms2ol_gehat()
    {
        $id=$this->input->post('row_id');
      

       
         $data['all']=$this->Geha_model->get_by_id($id);
         //$this->test($data['all']);
         $data['geha']=$data['all']->name;
         $data['title']="   اضافه مسئولي الجهه ";
         $data['result']=$this->Geha_model->get_by_id_ms2olen($id);
        // $data['result']=$this->Geha_model->get_by_id_ms2olen($id);
     //  $data['subview'] = 'admin/all_secretary_view/archive_v/gehat/add_ms2ol_gehat';
      $this->load->view('admin/all_secretary_view/archive_v/gehat/add_ms2ol_gehat', $data);
         //$this->load->view('admin/all_secretary_view/archive_v/gehat/add_ms2ol_gehat', $data);


    }
    public function delete_ms2ol() {
        $id=$this->input->post('id');
        $this->Geha_model->delete_ms2ol($id);
        $data['record']=$this->Geha_model->get_ms2ol($id);
        redirect('all_secretary/archive/gehat/Gehat/add_ms2ol_gehat/'. $data['record']->geha_id_fk,'refresh');
        
    }
    public function update_ms2ol($id)
    {
        $data['record']=$this->Geha_model->get_ms2ol($id);
        $data['geha']=$data['record']->name;
       // $this->test($data['record']);
        if($this->input->post('add')){
        $this->Geha_model->update_ms2ol($id);
        $this->messages('success', ' تمت التعديل  بنجاح');
        redirect('all_secretary/archive/gehat/Gehat/update_ms2ol/'. $data['record']->geha_id_fk,'refresh');
     }
     $data['title']=" تعديل مسئولي ";
     $data['subview'] = 'admin/all_secretary_view/archive_v/gehat/add_ms2ol_gehat';
     $this->load->view('admin_index', $data);
      
    }
    //
    public function getById_ms2ol_geha()
    {
    
        
        $id=$this->input->post('id');
        $reason=$this->Geha_model->get_ms2ol($id);
        echo json_encode($reason);
        
    }
    public function update_ms2ol_geha()
    { 
        
      //  $this->test($_POST);
        $id=$this->input->post('id');
        $this->Geha_model->update_ms2ol($id);
           
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
    
   public function load_geha_type()
   {
    $data["geha"]=$this->Geha_model->select_geha();
    $this->load->view('admin/all_secretary_view/archive_v/gehat/load', $data);


   }
  
   public function add_geha_type()
     
     { 
     
             $this->Geha_model->add_geha_type();
            
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
    
     public function getById_geha_type()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Geha_model->GetFromGeneral_settings($id);
         echo json_encode($reason);
         
     }
     public function update_geha_type()
     { 
         
         
         $id=$this->input->post('id');
             $this->Geha_model->update_geha_type($id);
         
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
     public function delete_travel_type()
     { 
  
         $id=$this->input->post('id');
             $this->Geha_model->delete_setting($id);
         
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     } 
     public function load_m2sol_geha()
     {
      
      
        $id=$this->input->post('geha');
        $data['result']=$this->Geha_model->get_by_id_ms2olen($id);
    
      
         $this->load->view('admin/all_secretary_view/archive_v/gehat/load_ms2olen', $data);
     }
      






 public function load_safms2ol()
    {
        $data["safms2ol"]=$this->Geha_model->select_search_key('arch_setting','from_code',1001);

        $this->load->view('admin/all_secretary_view/archive_v/gehat/load_safms2ol', $data);
    }


    public function add_safms2ol()
    {
        $this->Geha_model->add_safms2ol();
    }

    public function getById_safms2ol()
    {
        $id=$this->input->post('id');
        $from_code = 1001;
        $reason=$this->Geha_model->GetFromGeneral_settings($id,$from_code);

        echo json_encode($reason);
    }

    public function update_safms2ol()
    {
        $id=$this->input->post('id');
        $this->Geha_model->update_safms2ol($id);
    }

    public function delete_safms2ol()
    {
        $id=$this->input->post('id');
        $this->Geha_model->delete_setting($id);
    }


    public function add_gehat_ektsas()
    {

        if (!empty($this->input->post('geha')))
        {

            $id=$this->input->post('geha');
            $this->Geha_model->add_gehat_ektsas($id);

        }else{
            $id=$this->input->post('row_id');

            $data['all']=$this->Geha_model->get_by_id($id);
            //$this->test($data['all']);
            $data['geha']=$data['all']->name;
            $data['title']="   اضافه جهه الاختصاص ";
            $data['result']=$this->Geha_model->getbyid_ektsas($id);

            $this->load->view('admin/all_secretary_view/archive_v/gehat/add_gehat_ektsas', $data);

        }

    }

    public function load_gehat_ektsas()
    {
        $id=$this->input->post('geha');

        $data['result']=$this->Geha_model->getbyid_ektsas($id);

        $this->load->view('admin/all_secretary_view/archive_v/gehat/load_gehat_ektsas', $data);
    }

    public function getById_gehat_ektsas()
    {
        $id=$this->input->post('id');
        $reason=$this->Geha_model->get_by_id_ektsas('arch_gehat_ektsas','id',$id);
        echo json_encode($reason);

    }

    public function update_gehat_ektsas()
    {
        $id=$this->input->post('id');
        $this->Geha_model->update_gehat_ektsas($id);

    }

    public function delete_gehat_ektsas() {

        $id=$this->input->post('id');
        $this->Geha_model->delete_gehat_ektsas($id);
        //$data['record']=$this->Geha_model->get_ms2ol($id);
        //redirect('all_secretary/archive/gehat/Gehat/add_ms2ol_gehat/'. $data['record']->geha_id_fk,'refresh');

    }













    

    
} // END CLASS 