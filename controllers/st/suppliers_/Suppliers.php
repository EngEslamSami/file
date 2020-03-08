<?php
class Suppliers extends MY_Controller{
    public function __construct(){
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
        $this->load->model('Difined_model');
        $this->load->model('st/suppliers/Suppliers_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/st/suppliers';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays=round($time/(60*60*24));
        $HYear=round($TDays/354.37419);
        $Remain=$TDays-($HYear*354.37419);
        $HMonths=round($Remain/29.531182);
        $HDays=$Remain-($HMonths*29.531182);
        $HYear=$HYear+1389;
        $HMonths=$HMonths+10;$HDays=$HDays+23;
        if ($HDays>29.531188 and round($HDays)!=30){
            $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
        }else{
            $HDays=Round($HDays);
        }
        if ($HMonths>12) {
            $HMonths=$HMonths-12;
            $HYear = $HYear+1;
        }
        $NowDay=$HDays;
        $NowMonth=$HMonths;
        $NowYear=$HYear;
        $MDay_Num = date("w");
        if ($MDay_Num=="0"){
            $MDay_Name = "الأحد";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "الإثنين";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "الثلاثاء";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "الأربعاء";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "الخميس";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "الجمعة";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";
        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
        $HDays; تاريخ اليوم (1).
        $HMonths; الشهر (3).
        $HYear; السنة الهجرية (1430).
        */
        return $HYear;
    }
    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/st/suppliers';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '10000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    private function upload_muli_file($input_name){
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_file("userFile");
        }
        return $all_img;
    }

    public function read_file($file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/st/suppliers/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    //-----------------------------------------
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

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


    public function add_supplier(){ // st/suppliers/Suppliers/add_supplier
        $data['title']= 'إعدادات حسابات الموردين' ;
        $data['activity']= $this->Suppliers_model->get_activity(3);
        $data['code']= $this->Suppliers_model->get_code();
        $records = $this->Suppliers_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);
        if ($this->input->post('save')){
          //  $file = $this->upload_muli_file('morfaq');

            $id= $this->Suppliers_model->insert_supplier();
            if(isset($_FILES['morfaq']) && !empty($_FILES['morfaq'])){

                $all_img = $this->upload_muli_file("morfaq");

                $this->Suppliers_model->insert_supplier_imgs($all_img, $id);
            }
            $this->messages('success','تمت الاضافة بنجاح');
            redirect('st/suppliers/Suppliers/add_supplier','refresh');
        }
        $data['suppliers_js'] = $this->load->view('admin/st/suppliers/suppliers_js', '', TRUE);
        $this->load->view('admin/st/suppliers/suppliers_view', $data);

    }


    public function display_data(){
        $suppliers = $this->Suppliers_model->display_data();
        $arr = array();
        $arr['data'] = array();
        if(!empty($suppliers)){
            $x=0;
            foreach ($suppliers as $row){
                $x++;
                if($row->method_shera==0){
                    $method_name= "نقدي";
                } elseif ($row->method_shera==1){
                    $method_name= "آجل";
                } elseif ($row->method_shera==2){
                    $method_name= "الكل";
                } else{
                    $method_name='لا يوجد';
                }

                $arr['data'][] = array(
                    $x,
                    $row->code,
                    $row->name,
                    $row->nashat_name,
                    $row->tele,
                    $method_name,
                    '
  <button data-toggle="modal" data-target="#detailsModal" class="btn btn-sm btn-info" onclick="load_page('.$row->id.');">
       <i class="fa fa-list "></i>
        
         
      تفاصيل  

</button>
  ',
                    '
                    <a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){

                                            window.location="'.base_url().'st/suppliers/Suppliers/update_supplier/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                   

                     
                      <a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="'.base_url().'st/suppliers/Suppliers/delete_supplier/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-trash"> </i></a>

                     '

                );
            }


        }
        $json = json_encode($arr);
        echo $json;

    }

    public function update_supplier($id){
        $data['get_supplier']=$this->Suppliers_model->get_by_id($id)[0];
        $records = $this->Suppliers_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);

        $data['tele_other'] = unserialize($data['get_supplier']->tele_other);

        $data['code']= $this->Suppliers_model->get_code();
        $data['activity']= $this->Suppliers_model->get_activity(3);
        if ($this->input->post('save')){

            if(isset($_FILES['morfaq']) && !empty($_FILES['morfaq'])){

                $all_img = $this->upload_muli_file("morfaq");

                $this->Suppliers_model->insert_supplier_imgs($all_img, $id);
            }
            $this->Suppliers_model->update($id);

            $this->messages('success','تم التعديل بنجاح ');
            redirect('st/suppliers/Suppliers/add_supplier','refresh');
        }
        $data['title']= 'إعدادات حسابات الموردين' ;
        $data['suppliers_js'] = $this->load->view('admin/st/suppliers/suppliers_js', '', TRUE);
        $this->load->view('admin/st/suppliers/suppliers_view', $data);


    }

    public function delete_supplier ($id){
        $this->Suppliers_model->delete($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('st/suppliers/Suppliers/add_supplier','refresh');
    }
    public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Suppliers_model->get_by_id($row_id)[0];
        $data['tele_other'] = unserialize($data['get_all']->tele_other);
        $this->load->view('admin/st/suppliers/load_details',$data);

    }
    public function delete_morfq($id,$code_id){
        $this->Suppliers_model->delete_morfq($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('st/suppliers/Suppliers/update_supplier/'.$code_id,'refresh');
    }

}