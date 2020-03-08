<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Markz_tklfaa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
      
        $this->load->model('finance_accounting_model/markz_tklfa/Markz_tklfa_m');
      
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }
    
    public function markz_tklfaa()// finance_accounting/markz_tklfa/Markz_tklfaa/markz_tklfaa
    { 
  
      
        $data["marakez"]=$this->Markz_tklfa_m->select_markez();
        $data["hesabs"]=$this->Markz_tklfa_m->select_hesab();
        $records = $this->Markz_tklfa_m->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['title'] = 'مراكز التكلفه';
        $data['subview'] = 'admin/finance_accounting/markz_tklfa/markz_tklfa_v';
        $this->load->view('admin_index', $data);
    }

    public function add_markz()
    {

       $this->Markz_tklfa_m->add_markez();

    }
    
    public function load_markz()
    {

       $data["marakez"]=$this->Markz_tklfa_m->select_markez();
        $this->load->view('admin/finance_accounting/markz_tklfa/load_markez', $data);
    }
    public function getById_markz()
    {
    
        
        $id=$this->input->post('id');
        $reason=$this->Markz_tklfa_m->select_markez_by_id($id);
        echo json_encode($reason);
        
    }
    public function update_markz()
    {
      
   $id=$this->input->post('id');
       $this->Markz_tklfa_m->update_markez($id);
    
   
    }
    public function delete_markz()
    {
      
   $id=$this->input->post('id');
       $this->Markz_tklfa_m->delete_markez($id);
    
   
    }


    ///////////////////////////////////////////hesab//////////////////////////
    public function add_hesab()
    {

       $this->Markz_tklfa_m->add_hesab();

    }
    
    public function load_hesab()
    {

       $data["hesabs"]=$this->Markz_tklfa_m->select_hesab();
        $this->load->view('admin/finance_accounting/markz_tklfa/load_hesab', $data);
    }
    public function getById_hesab()
    {
    
        
        $id=$this->input->post('id');
        $reason=$this->Markz_tklfa_m->select_hesab_by_id($id);
        echo json_encode($reason);
        
    }
    public function update_hesab()
    {
      
   $id=$this->input->post('id');
       $this->Markz_tklfa_m->update_hesab($id);
    
   
    }
    public function delete_hesab()
    {
      
   $id=$this->input->post('id');
       $this->Markz_tklfa_m->delete_hesab($id);
    
   
    }
 public function get_data()
    {
        /*
         * <a href="#" onclick="update_hesab(' . $row->id . ');">
                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
         * */
        $hesabs = $this->Markz_tklfa_m->select_hesab();
        $arr = array();
        $arr['data'] = array();
        if (!empty($hesabs)) {
            $x = 0;
            foreach ($hesabs as $row) {
                $x++;
                if (isset($row->markez) && !empty($row->markez)) {
                    $color = $row->markez->color;
                } else {
                    $color = '';
                }

                $arr['data'][] = array(

                    $x,
                    '<span  style="border-radius: 4px;padding: 0 25px;font-size: 14px; background-color:' . $color . '" >
                      ' . $row->markez->name . '</span>'
                ,
                    '<span  style="border-radius: 4px;padding: 0 25px; font-size: 14px; background-color:' . $color . '" >
                      ' . $row->rkm_hesab . '</span>',
                    $row->hesab_name,
                    '<a href="#" onclick="delete_hesab(' . $row->id . ');"> <i class="fa fa-trash"> </i></a>
                     '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;

    }




   



}
?>