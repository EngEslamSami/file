<?php
class Notes extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');

        $this->load->model('all_secretary_models/archive_m/notes/Notes_model');



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

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function add_notes(){ // all_secretary/archive/notes/Notes/add_notes


        $data['notes'] = $this->Notes_model->get_events($_SESSION['user_id']);

     
        $data['title'] = "   اضافة حدث او ملاحظه  ";
        $data['footer_calender']='admin/all_secretary_view/archive_v/notes/script_calender';
        $data['subview'] = 'admin/all_secretary_view/archive_v/notes/notes_view';
        $this->load->view('admin_index', $data);
    }
    public function insert_notes(){
      //  $id = $this->input->post('id');
        if ($this->input->post('add')){
            $this->Notes_model->add_notes();
            $this->messages('success','تمت العملية بنجاح ');
            redirect('all_secretary/archive/notes/Notes/add_notes', 'refresh');
        }

    }

    public function get_events()
    {
        
        $records = $this->Notes_model->get_events($_SESSION['user_id']);

        $data_events = array();

        foreach($records as $record) {
            if($record->type==1) {
                $className = 'label-warning';
            }
            elseif($record->type==2) {
                $className = 'label-success';
            }
            elseif($record->type==3) {
                $className = 'label-danger';
            }
            elseif($record->type==4) {
                $className = 'label-info';
            }


            $data_events[] = array(
                "id"           => $record->id,
                "type"         => $record->type,
                "date"         => $record->date,
                "qsm"          => $record->qsm,
                "className"    => $className,
                "tasnef"       => $record->tasnef,
                "details"      => $record->details,
            

            );
        }

    }
    public function update_events()
    {
        $this->Notes_model->update_event();
        $this->get_events();
    }
    public function delete_event($id){
      //  $id = $this->input->post('id');
        $this->Notes_model->delete_event($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('all_secretary/archive/notes/Notes/add_notes', 'refresh');
    }
    public function get_event_by_id(){
       $id= $this->input->post('id');
        $records = $this->Notes_model->get_by_id($id);
        echo json_encode($records);

    }
    public function load_details(){
        $id= $this->input->post('row_id');
        $data['note'] = $this->Notes_model->get_by_id($id);
        $this->load->view('admin/all_secretary_view/archive_v/notes/load_details',$data);

    }

}