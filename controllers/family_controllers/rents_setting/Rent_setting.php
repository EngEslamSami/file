<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 17/11/2018
 * Time: 10:30 ص
 */
class Rent_setting  extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('familys_models/rents_setting/Rents_setting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();

        $this->load->helper(array('url','text','permission','form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/



    }

        public function rent_setting(){
//            echo "<pre>";print_r($this->Rents_setting->recent_rents());die;


            if($this->input->post('add')) {
                
           
                
                $this->Rents_setting->insert();
            }
        $data['rent']=$this->Rents_setting->recent_rents();
        $data['all_catg']=$this->Rents_setting->all_family_categrpy();
        $data['all_rent']=$this->Rents_setting->all_rents();
        $data['countt']=count($this->Rents_setting->all_rents());
        $data['title'] = "اعدادات الإيجارات";
        $data['subview'] = 'admin/familys_views/rents_setting/rent_setting_v';
        $this->load->view('admin_index', $data);


    }


    public function add(){

        $data['all_catg']=$this->Rents_setting->all_family_categrpy();
        $data['rent']=$this->Rents_setting->recent_rents();
       // echo "<pre>";print_r($this->Rents_setting->recent_rents());die;
        $this->load->view('admin/familys_views/rents_setting/add_row',$data);
    }

public function uptade($id){

    $this->Rents_setting->update($id);
    redirect('family_controllers/rents_setting/Rent_setting/rent_setting','refresh');



}
    public function delete($id){

        $this->Rents_setting->delete($id);
        redirect('family_controllers/rents_setting/Rent_setting/rent_setting','refresh');

    }


}
