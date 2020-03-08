<?php
class File_research extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');

        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();

        $this->load->helper(array('url','text','permission','form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model("familys_models/files_need_update/File_research_model");
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/



    }
//--------------------------------------------------
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }





    public function all_re_files_accep(){ // family_controllers/files_need_update/File_research/all_re_files_accep


        $data['customer_js'] = $this->load->view('admin/familys_views/files_need_update/app_js', '', TRUE);
        $this->load->view('admin/familys_views/files_need_update/file_research_view', $data);

    }
    public function data()
    {

        $file = $this->File_research_model->get_all_files();
        $arr = array();
        $arr['data'] = array();
        if(!empty($file)){
            $x = 0;
            foreach($file as $row){
                $x++;
                if($row['file_update_date'] == 0 ){
                    if($row['file_status'] == 3 || $row['file_status'] == 4 ){
                        $file_update_date = 'الملف موقوف';
                        $file_update_date_class = 'danger';
                    }else{
                        $file_update_date = 'تحديث الملف';
                        $file_update_date_class = 'info';
                    }





                }else{
                    $file_update_date = $row['file_update_date'];
                    $file_update_date_class = 'add';
                }


                if($row['file_status'] == 1 ){
                    $file_status = 'نشط كليا';
                    // $file_colors = '#00ff00';
                    $file_colors = '#15bf00';
                }elseif($row['file_status'] == 2 ){
                    $file_status = 'نشط جزئيا';
                    $file_colors = '#00d9d9';
                }elseif($row['file_status'] == 3 ){
                    $file_status = 'موقوف مؤقتا';
                    $file_colors = '#ffff00';
                }elseif($row['file_status'] == 4 ){
                    $file_status = 'موقوف نهائيا';
                    $file_colors = '#ff0000';
                }elseif($row['file_status'] == 0){
                    $file_status = 'جـــــــــاري';
                    $file_colors = '#62d0f1';
                }



                if($row['mother_name'] != '' and $row['mother_name'] != null){

                    $mother_name = $row['mother_name'];
                }elseif($row['mother_name'] == ''){
                    $mother_name = $row['full_name_order'];

                }else{
                    $mother_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }



                if(!empty($row['nasebElfard'])){
                    $color ='';
                    if(!empty($row['nasebElfard']['f2a']->color)){
                        $color =$row['nasebElfard']['f2a']->color;
                    }

                    $title ='';
                    if(!empty($row['nasebElfard']['f2a']->title)){
                        $title =$row['nasebElfard']['f2a']->title;
                    }


                    $Fe2z_name =
                        '<span title="نصيب الفرد = '.round($row['nasebElfard']['naseb']).'ريال" class="label label-pill
                         "  style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;
                           font-size: 14px; background-color:'.$color.'" >
                      '.$title.'</span>';
                    $naseb_elfard =  '<span class="label label-pill label-info " style="color: black"  >'.round($row['nasebElfard']['naseb']).'</span>';
                }else{
                    $Fe2z_name = '<span title=" ريال 0 " class="label label-pill " style="color:black ; 
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">أ</span>';
                }






                /*   if($row['mother_name'] != '' and $row['mother_name'] != null){

                    $mother_name = $row['mother_name'];
                   }else{
                   $mother_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                   }*/


                /*  if($row['mother_new_card'] != '' and $row['mother_new_card'] != null){
                    $mother_new_card = $row['mother_new_card'];
                  }else{
                  $mother_new_card= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }*/
                if($row['mother_new_card'] != '' and $row['mother_new_card'] != null){
                    $mother_new_card = $row['mother_new_card'];
                }elseif($row['mother_new_card'] == '' and $row['id'] >= 852 ){
                    $mother_new_card = $row['mother_national_num'];

                }else{
                    $mother_new_card= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }




                if($row['father_full_name'] != '' and $row['father_full_name'] != null){
                    $father_full_name = $row['father_full_name'];
                }else{
                    $father_full_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }

                if($row['father_national_num'] != '' and $row['father_national_num'] != null){
                    $father_national_num = $row['father_national_num'];
                }else{
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }




                $arr['data'][] = array(
                    /*  if($row['file_update_date'] == 0 ){
                          echo '0';
                      }*/

                    $x,
                    $row['file_num'],
                    $father_full_name,
                    $father_national_num,

                    $mother_name,
                    $mother_new_card,
                    '
                 
    
     <a target="_blank" href="'.base_url().'family_controllers/Family/father/'.$row['mother_national_num'].'" 
        class="btn btn-sm btn-warning"> <i class="fa fa-pencil-square " aria-hidden="true"></i> تعديل</a>

    
     <a target="_blank" href="'.base_url().'family_controllers/Family_details/details/'.$row['mother_national_num'].'" class="btn btn-sm btn-success"> <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
             </i> إجراءات</a>
             
             
  <a href="'.base_url().'family_controllers/Family_details/print_family/'.$row['mother_national_num'].'" target="_blank">
                                                <i class="fa fa-print" aria-hidden="true"></i> </a>
                                                
  <a href="'.base_url().'family_controllers/Family_details/print_card/'.$row['mother_national_num'].'" target="_blank">
<i style="background-color: #0a568c" class="fa fa-print" aria-hidden="true"></i> </a>             
             
             
             
  
   
  ',
                    '
  <button style="color:#fff ;width:80px; background-color:'.$file_colors.'  " 
         data-toggle="modal" data-target="#modal-info" class="btn btn-sm" >
       '.$file_status.'</button>
  ',


                    $Fe2z_name


                ,'
  <button data-toggle="modal" data-target="#modal-update690" class="btn btn-sm btn-'.$file_update_date_class.'">
       
        
         '.$file_update_date.'
        

</button>
  ','
  
waiting
  
  '


                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    public function filter_table(){

        $data['records'] = $this->File_research_model->get_all_files();
        $this->load->view('admin/familys_views/files_need_update/load_filter_page', $data);



    }
}