<?php
class Productes extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->load->model('Products/Product');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
             /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    
    }



    public function add_product()
    {
        if($this->input->post('code_post')){//get_last
            $code = $this->input->post('code_post');

            $data['row'] =$this->Product->get_by_code($code);
            if($code != 0){
                $last =$this->Product->get_last($data['row']['id']);
                if($last != false){
                    $data_load1['new_code'] =$last+1;
                }else{
                    $arr_zeros=array('','0','00','000','0000','00000','000000');
                   

                    $data_load1['new_code']= $data['row']['code'].$arr_zeros[(($data['row']['level']) == '')? 0 : $data['row']['level']]."1";
                }
                $data_load1['level']=($data['row']['level'] +1);
                $data_load1['id_from']=$data['row']['id'];
                $this->load->view('admin/products/load1',$data_load1);
            }
        } elseif($this->input->post('add_product')){
            if($this->input->post('type') == '0'){
                $last =$this->Product->get_last(0);
                if($last !=false){
                    $data_load1['new_code']=$last+1;
                }else{
                    $data_load1['new_code']=1;
                }
                $data_load1['level']=1;
                $data_load1['id_from']=0;
                $this->load->view('admin/products/load1',$data_load1);
            }
            $data['last_id'] = $this->Product->add_product();
            redirect('productes/Productes/add_product');

        }else{
            $data['title'] = 'ادارة الاصناف';
            $data['all'] = $this->Product->select_all();
            $data['tree'] = $this->Product->index(0);

            //$this->test($data['tree']);

            $data['subview'] = 'admin/products/add_products';
            $this->load->view('admin_index', $data);
        }
    }


    public function update_product($id){
        if($this->input->post('update_product')){
            $this->Product->update_product($id);
            redirect('productes/Productes/add_product');
            }else{
        $data['title'] = ' تعديل صنف';

        $data['record'] = $this->Product->get_productById($id);
        $data['products']=$this->Product->select_all_except($id);
        
            //$this->test($data['tree']);
        
        $data['subview'] = 'admin/products/add_products';
        $this->load->view('admin_index', $data);
        }

    }



    public function add_codelevel(){
        $last =$this->Product->get_last(0);
        if($last !=false){
            $data_load1['new_code']=$last+1;
        }else{
            $data_load1['new_code']=1;
        }
        $data_load1['level']=1;
        $data_load1['id_from']=0;
        $this->load->view('admin/products/load1',$data_load1);
    }




    public function add_product_()
    {
        
    
         if($this->input->post('add_product')){
            $this->Product->add_product();
           redirect('productes/Productes/add_product');
            
         }else{
            $data['all']=$this->Product->select_all();
            
            $data['subview'] = 'admin/products/add_products';
            $this->load->view('admin_index', $data);
         }
    }
    
    
    public function product_details()
    {
            
            $data['all']=$this->Product->select_all();
            
            $this->load->view('admin/products/details_products', $data);
            
         
    }


    public function delete_product($id){
        $this->Product->delete_product($id);
        redirect('productes/Productes/add_product');
    }
    
}

?>
