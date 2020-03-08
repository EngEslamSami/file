<?php
class Testy extends MY_Controller
{  
    public function __construct(){
        parent::__construct();
              
      
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));
        
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
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

                 
        
 //-----------------------------------------         
/**
 *  ================================================================================================================
 * 
 *  ================================================================================================================
 * 
 *  ================================================================================================================
 */

    public function  index(){
      $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['is_active']=1;
        
        $data['all_family']=$this->Register->family(0);
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/all_family';
        $this->load->view('admin_index', $data);
    }

   
    
        public function ttest() //Testy/ttest
    {
      $this->load->model("Testy_m");
 
 
       $data['all_main_kafalat']=$this->Testy_m->select_all_main_kafalat_details();


          //  $data['subview'] = 'admin/testy_v/testy_v';
          $data['subview'] = 'admin/testy_v/all_r';
        $this->load->view('admin_index', $data);

      

    }
    
    
            public function tttest() //Testy/ttest
    {
      $this->load->model("Testy_m");
 
 
       $data['all_main_kafalat']=$this->Testy_m->select_all_main_kafalat_details();


            $data['subview'] = 'admin/testy_v/all_v';
        //  $data['subview'] = 'admin/testy_v/all_r';
        $this->load->view('admin_index', $data);

      

    }

 /***********************************************************/
    public function getCategoryTree(){
     $this->load->model("Testy_m");

   // $this->load->model('category_m');
    $resultData = $this->Testy_m->setCategoryTree();
   // echo json_encode($resultData, JSON_UNESCAPED_UNICODE);
   echo('<pre>');
   print_r($resultData);
}

        public function all_quod_esal() //Testy/all_quod_esal
    {
      $this->load->model("Testy_m");
 
 
       $data['all_quods_details']=$this->Testy_m->select_all_quods_details();


          $data['subview'] = 'admin/testy_v/quod_esal';
        $this->load->view('admin_index', $data);

      

    }
    
         public function all_quod_esal_3() //Testy/all_quod_esal_3
    {

$this->load->model("Testy_m");
 $data['all_pills_inbox'] = $this->Testy_m->all_ppils();

        $data['subview'] = 'admin/testy_v/all_q_d_2';
        $this->load->view('admin_index', $data);



    } 
    
    
    
            public function all_quod_in_details() //Testy/all_quod_in_details
    {

$this->load->model("Testy_m");
 $data['all_pills_inbox'] = $this->Testy_m->all_finance_quods_details();

        $data['subview'] = 'admin/testy_v/all_quod_in_details_v';
        $this->load->view('admin_index', $data);



    } 
    
    
    
    
      public function all_quod_esal_2() //Testy/all_quod_esal_2
    {
       // $this->load->model("Testy_m");

      /*  $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
      //  $data['all_quods_details']=$this->Testy_m->select_all_quods_details();


        $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills_all_deported();*/

$this->load->model("Testy_m");
 $data['all_pills_inbox'] = $this->Testy_m->select_all_by_fr_all_pills_all_deported();

        $data['subview'] = 'admin/testy_v/all_q_d';
        $this->load->view('admin_index', $data);



    }  
  
  
  
      
   


      
      public function all_final_esal_quods() //Testy/all_quod_esal_3
    { //Testy/all_final_esal_quods

$this->load->model("Testy_m");
 $data['all_pills_inbox'] = $this->Testy_m->all_ppils();

        $data['subview'] = 'admin/testy_v/final_esal_quods';
        $this->load->view('admin_index', $data);



    }   



    public function all_family_members_report(){ //Testy/all_family_members_report
    $this->load->model("Testy_m");
    $data['allmembers']=$this->Testy_m->select_all_members_By_mother_national_num();
    /*
     echo '<pre>';
        print_r( $data['allmembers']);
        die;*/
    
    $data['title']=' تقرير أفراد الأسرة';
    $data['subview'] = 'admin/testy_v/all_family_members_report';
    $this->load->view('admin_index', $data);
    }




    public function allmembers_data()
    {
        $this->load->model("Testy_m");
        $allmembers=$this->Testy_m->select_all_members_By_mother_national_num();
        
       
        $arr = array();
        $arr['data'] = array();
        if(!empty($allmembers)){
            $x = 0;
            foreach($allmembers as $row){
                $x++;

                $arr['data'][] = array(
                    $x,
                    $row['file_num'],
                    $row['full_name'],
                    $row['id'],
                    $row['member_full_name'],
                    $row['mother_national_num_fk'],
                    
                    $row['title_file'],
                    $row['hala_title']
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
/****************************************************************/



//    18-5-om

    public function ttest_search() //Testy/ttest_search
    {
        $this->load->model("Testy_m");
        $data['family_cat'] = $this->Testy_m->getMembers('family_category');
        $data['halat_kafel'] = $this->Testy_m->getMembers('fr_kafalat_kafel_status', array('type' => 2));

//        $data['all_main_kafalat'] = $this->Testy_m->select_all_main_kafalat_details_search();

        //  $data['subview'] = 'admin/testy_v/testy_v';
        $data['subview'] = 'admin/testy_v/all_r_search';
        $this->load->view('admin_index', $data);


    }


    public function get_khafel()
    {
        $this->load->model("Testy_m");

        $all_Sponsors = $this->Testy_m->getMembers('fr_sponsor');
        $arr_sponsors = array();
        $arr_sponsors['data'] = array();
        if (!empty($all_Sponsors)) {
            foreach ($all_Sponsors as $row_sponsor) {

                $arr_sponsors['data'][] = array(
                    '<input type="radio" name="choosed"   id="member' . $row_sponsor['id'] . '" data-name="' . $row_sponsor['k_name'] . '" data-id="' . $row_sponsor['id'] . '"
                   data-mob="' . $row_sponsor['k_mob'] . '"     value="' . $row_sponsor['id'] . '"  ondblclick="GetMemberName(\'' . $row_sponsor['k_name'] . '\',\'' . $row_sponsor['id'] . '\')" />',
                    $row_sponsor['k_num'],
                    $row_sponsor['k_name'],

                    $row_sponsor['k_mob']

                );
            }
        }
        echo json_encode($arr_sponsors);
    }

 
 
 
 /* 22-10
    public function get_mosdafed($type)
    {
        $this->load->model("Testy_m");

//            mother
        if ($type == 1) {

          //  $all_Mosdafed = $this->Testy_m->getMembers('mother');
          $all_Mosdafed = $this->Testy_m->getMembers_2('mother');

            $all_mosdafeds = array();
            $all_mosdafeds['data'] = array();
            if (!empty($all_Mosdafed)) {
                foreach ($all_Mosdafed as $row_mosdafed) {

                    if ($row_mosdafed['halt_elmostafid_m'] == 1) {
                        $person_hala_name = ' نشط كليا ';
                    } elseif ($row_mosdafed['halt_elmostafid_m'] == 2) {
                        $person_hala_name = ' نشط جزئيا';
                    } elseif ($row_mosdafed['halt_elmostafid_m'] == 3) {
                        $person_hala_name = ' موقوف مؤقتا';
                    } elseif ($row_mosdafed['halt_elmostafid_m'] == 4) {
                        $person_hala_name = ' موقوف نهائيا';
                    } elseif ($row_mosdafed['halt_elmostafid_m'] == 0) {
                        $person_hala_name = ' جاري';
                    } else {
                        $person_hala_name = 'غير محدد';
                    }

                    if ($row_mosdafed['categoriey_m'] == 1) {
                        $person_cat_name = ' أرملة ';
                    } else {
                        $person_cat_name = 'غير محدد';
                    }

                    $all_mosdafeds['data'][] = array(
                        '<input type="radio" name="choosed"   id="member' . $row_mosdafed['id'] . '" data-name="' . $row_mosdafed['full_name'] . '" data-id="' . $row_mosdafed['id'] . '"
                        value="' . $row_mosdafed['id'] . '"  ondblclick="GetMemberName_mosdafed(\'' . $row_mosdafed['full_name'] . '\',\'' . $row_mosdafed['id'] . '\')" />',
                       $row_mosdafed['file_num'] ,
                        $row_mosdafed['full_name'],
                        $person_hala_name,
                        $person_cat_name,
                        $row_mosdafed['first_k_id'],
                        $row_mosdafed['first_k_name']
                      

                    );
                }
            }
            echo json_encode($all_mosdafeds);

        } //            f_members
        elseif ($type == 2) {
           // $all_Mosdafed = $this->Testy_m->getMembers('f_members');
              $all_Mosdafed = $this->Testy_m->getMembers_3();

            $all_mosdafeds = array();
            $all_mosdafeds['data'] = array();
            if (!empty($all_Mosdafed)) {
                foreach ($all_Mosdafed as $row_mosdafed) {

                    if ($row_mosdafed['halt_elmostafid_member'] == 1) {
                        $person_hala_name = ' نشط كليا ';
                    } elseif ($row_mosdafed['halt_elmostafid_member'] == 2) {
                        $person_hala_name = ' نشط جزئيا';
                    } elseif ($row_mosdafed['halt_elmostafid_member'] == 3) {
                        $person_hala_name = ' موقوف مؤقتا';
                    } elseif ($row_mosdafed['halt_elmostafid_member'] == 4) {
                        $person_hala_name = ' موقوف نهائيا';
                    } elseif ($row_mosdafed['halt_elmostafid_member'] == 0) {
                        $person_hala_name = ' جاري';
                    } else {
                        $person_hala_name = 'غير محدد';
                    }


                    if ($row_mosdafed['categoriey_member'] == 2) {
                        $person_cat_name = ' يتيم';
                    } elseif ($row_mosdafed['categoriey_member'] == 3) {
                        $person_cat_name = ' مستفيد بالغ';
                    } elseif ($row_mosdafed['categoriey_member'] == 4) {
                        $person_cat_name = ' أخري';
                    } else {
                        $person_cat_name = 'غير محدد';
                    }
                    
                    
                    if($row_mosdafed['first_kafala_type'] == 1){
                        $kafala_type = 'كفالة شاملة';
                    }elseif($row_mosdafed['first_kafala_type'] == 2){
                       $kafala_type = 'نصف كفالة'; 
                    }elseif($row_mosdafed['first_kafala_type'] == 3){
                       $kafala_type = 'كفالة مستفيد'; 
                    }elseif($row_mosdafed['first_kafala_type'] == 4){
                       $kafala_type = 'كفالة أرملة'; 
                    }else{
                         $kafala_type = ''; 
                    }
                    
                    
                    

                    $all_mosdafeds['data'][] = array(
                        '<input type="radio" name="choosed"   id="member' . $row_mosdafed['id'] . '" data-name="' . $row_mosdafed['member_full_name'] . '" data-id="' . $row_mosdafed['id'] . '"
                        value="' . $row_mosdafed['id'] . '"  ondblclick="GetMemberName_mosdafed(\'' . $row_mosdafed['member_full_name'] . '\',\'' . $row_mosdafed['id'] . '\')" />',
                          $row_mosdafed['file_num'] ,
                        $row_mosdafed['member_full_name'],
                        $person_hala_name,
                        $person_cat_name,
                         $row_mosdafed['first_k_id'],
                       
                          $row_mosdafed['first_k_name']

                    );
                }
            }
            echo json_encode($all_mosdafeds);

        }


    }
    */



public function get_mosdafed($type)
{
    $this->load->model("Testy_m");

      //            mother
    if ($type == 1) {

        $all_Mosdafed = $this->Testy_m->getMembers_2('mother');

        $all_mosdafeds = array();
        $all_mosdafeds['data'] = array();
        if (!empty($all_Mosdafed)) {
            foreach ($all_Mosdafed as $row_mosdafed) {

                if ($row_mosdafed['halt_elmostafid_m'] == 1) {
                    $person_hala_name = ' نشط كليا ';
                } elseif ($row_mosdafed['halt_elmostafid_m'] == 2) {
                    $person_hala_name = ' نشط جزئيا';
                } elseif ($row_mosdafed['halt_elmostafid_m'] == 3) {
                    $person_hala_name = ' موقوف مؤقتا';
                } elseif ($row_mosdafed['halt_elmostafid_m'] == 4) {
                    $person_hala_name = ' موقوف نهائيا';
                } elseif ($row_mosdafed['halt_elmostafid_m'] == 0) {
                    $person_hala_name = ' جاري';
                } else {
                    $person_hala_name = 'غير محدد';
                }

                if ($row_mosdafed['categoriey_m'] == 1) {
                    $person_cat_name = ' أرملة ';
                } else {
                    $person_cat_name = 'غير محدد';
                }
                   if($row_mosdafed['first_k_id'] == 0){
                 $llink_armal = 'all_Finance_resource/sponsors/Sponsor/xyz';   
                }else{
                   $llink_armal = 'all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$row_mosdafed['first_k_id']; 
                }
                
                

                $all_mosdafeds['data'][] = array(
                    '<input type="radio" name="choosed"   id="member' . $row_mosdafed['id'] . '" data-name="' . $row_mosdafed['full_name'] . '" data-id="' . $row_mosdafed['id'] . '"
                    value="' . $row_mosdafed['id'] . '"  ondblclick="GetMemberName_mosdafed(\'' . $row_mosdafed['full_name'] . '\',\'' . $row_mosdafed['id'] . '\')" />',
                    $row_mosdafed['file_num'],
                    $row_mosdafed['full_name'],
                    $person_hala_name,
                    $person_cat_name,
                    '<a target="_blank" href="'.base_url() .$llink_armal.'">'.$row_mosdafed['frist_k_num'].'</a>',
                    $row_mosdafed['first_k_name']

                );
            }
        }
        echo json_encode($all_mosdafeds);

    } //            f_members
    elseif ($type == 2) {
        $all_Mosdafed = $this->Testy_m->getMembers_3('f_members');

        $all_mosdafeds = array();
        $all_mosdafeds['data'] = array();
        if (!empty($all_Mosdafed)) {
            foreach ($all_Mosdafed as $row_mosdafed) {

                if ($row_mosdafed['halt_elmostafid_member'] == 1) {
                    $person_hala_name = ' نشط كليا ';
                } elseif ($row_mosdafed['halt_elmostafid_member'] == 2) {
                    $person_hala_name = ' نشط جزئيا';
                } elseif ($row_mosdafed['halt_elmostafid_member'] == 3) {
                    $person_hala_name = ' موقوف مؤقتا';
                } elseif ($row_mosdafed['halt_elmostafid_member'] == 4) {
                    $person_hala_name = ' موقوف نهائيا';
                } elseif ($row_mosdafed['halt_elmostafid_member'] == 0) {
                    $person_hala_name = ' جاري';
                } else {
                    $person_hala_name = 'غير محدد';
                }


                if ($row_mosdafed['categoriey_member'] == 2) {
                    $person_cat_name = ' يتيم';
                } elseif ($row_mosdafed['categoriey_member'] == 3) {
                    $person_cat_name = ' مستفيد بالغ';
                } elseif ($row_mosdafed['categoriey_member'] == 4) {
                    $person_cat_name = ' أخري';
                } else {
                    $person_cat_name = 'غير محدد';
                }
                if ($row_mosdafed['first_kafala_type'] == 1) {
                    $kafala_type = ' كفالة شاملة ';
              }elseif ($row_mosdafed['first_kafala_type'] == 2) {
                    $kafala_type = ' نصف كفالة';
                } elseif ($row_mosdafed['first_kafala_type'] == 3) {
                    $kafala_type = ' كفالة مستفيد ';
                } elseif ($row_mosdafed['first_kafala_type'] == 4) {
                    $kafala_type = ' كفالة أرملة';
                } else {
                    $kafala_type = 'غير محدد';
                }
                
                if($row_mosdafed['first_k_id'] == 0){
                 $llink = 'all_Finance_resource/sponsors/Sponsor/xyz';   
                }else{
                   $llink = 'all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$row_mosdafed['first_k_id']; 
                }
                
                
                
                
                $all_mosdafeds['data'][] = array(
                    '<input type="radio" name="choosed"   id="member' . $row_mosdafed['id'] . '" data-name="' . $row_mosdafed['member_full_name'] . '" data-id="' . $row_mosdafed['id'] . '"
                    value="' . $row_mosdafed['id'] . '"  ondblclick="GetMemberName_mosdafed(\'' . $row_mosdafed['member_full_name'] . '\',\'' . $row_mosdafed['id'] . '\')" />',
                   $row_mosdafed['file_num'],
                    $row_mosdafed['member_full_name'],
                    $person_hala_name,
                    $person_cat_name,
                    $kafala_type,
                    '<a target="_blank" href="'.base_url() .$llink.'">'.$row_mosdafed['frist_k_num'].'</a>',
                    $row_mosdafed['first_k_name'],
                    '<a target="_blank" href="'.base_url() .'all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$row_mosdafed['second_k_id'].'">'.$row_mosdafed['second_k_num'].'</a>',
                    $row_mosdafed['second_k_name']
                );
            }
        }
        echo json_encode($all_mosdafeds);

    }


}
    public function get_result()
    {
        $this->load->model("Testy_m");
        
         $this->input->post('kafala_end').'<br/>';
       $end_from =  strtotime($this->input->post('end_from'));
        
        
//        $this->test($_POST);

        $where_arr = $where_arr2 = array();
        $sub_table = $sub_table2 = $person_hala = '';

      /*  if (!empty($this->input->post('person_hala'))) {
            $person_hala = array('mother', 'f_members');
            $where_arr2['mother.halt_elmostafid_m'] = $this->input->post('person_hala');
            $where_arr2['f_members.persons_status'] = $this->input->post('person_hala');
        }*/
        	  if (!empty($this->input->post('person_hala'))) {
            if ($sub_table == 'mother') {
                $person_hala ='mother';
                $where_arr2['mother.halt_elmostafid_m'] = $this->input->post('person_hala');
            }
            if ($sub_table == 'f_members'){
                $person_hala='f_members';
                $where_arr2['f_members.persons_status'] = $this->input->post('person_hala');
            }
          
        }

        if (!empty($this->input->post('mosdafed_name'))) {
            $where_arr['fr_main_kafalat_details.person_id_fk'] = $this->input->post('mosdafed_name');
        }

        if (!empty($this->input->post('kafel_name'))) {
            $where_arr['fr_main_kafalat_details.first_kafel_id'] = $this->input->post('kafel_name');
        }

        if (!empty($this->input->post('family_cat'))) {
            $where_arr['basic.family_cat'] = $this->input->post('family_cat');
        }

        if (!empty($this->input->post('file_status'))) {
            $where_arr['basic.file_status'] = $this->input->post('file_status');
        }

        if (!empty($this->input->post('kafala_type'))) {
            $where_arr['fr_main_kafalat_details.kafala_type_fk'] = $this->input->post('kafala_type');
        }


        if (!empty($this->input->post('kafala_hala'))) {
            $where_arr['fr_main_kafalat_details.first_status'] = $this->input->post('kafala_hala');
        }
        
      /*  if (!empty($this->input->post('pay_method'))) {
            $where_arr['fr_main_kafalat_details.pay_method'] = $this->input->post('pay_method');
        }*/

        if (!empty($this->input->post('table2_name'))) {
            $sub_table2 = $this->input->post('table2_name');
            if (!empty($this->input->post('halat_kafel'))) {
                if ($sub_table2 == 'fr_sponsor') {
                    $where_arr['fr_sponsor.halat_kafel_id'] = $this->input->post('halat_kafel');
                }
            }
        }

        if (!empty($this->input->post('table_name'))) {
            $person_hala = '';
            $where_arr2 = array();

            $sub_table = $this->input->post('table_name');
            if ($sub_table == 'mother') {
                $where_arr['fr_main_kafalat_details.kafala_type_fk'] = 4;

                if (!empty($this->input->post('person_hala'))) {
                    $where_arr['mother.halt_elmostafid_m'] = $this->input->post('person_hala');
                }
                if (!empty($this->input->post('person_cat'))) {
                    $where_arr['mother.categoriey_m'] = $this->input->post('person_cat');
                }
            } elseif ($sub_table == 'f_members') {
                $where_arr['fr_main_kafalat_details.kafala_type_fk!='] = 4;

                if (!empty($this->input->post('person_hala'))) {
                    $where_arr['f_members.persons_status'] = $this->input->post('person_hala');
                }
                if (!empty($this->input->post('person_cat'))) {
                    $where_arr['f_members.categoriey_member'] = $this->input->post('person_cat');
                }
            }
            /* if (!empty($this->input->post('person_hala'))) {
                 if ($sub_table == 'mother') {
                     $where_arr['fr_main_kafalat_details.kafala_type_fk'] = 4;
                     $where_arr['mother.halt_elmostafid_m'] = $this->input->post('person_hala');
                 } elseif ($sub_table == 'f_members') {

                     $where_arr['fr_main_kafalat_details.kafala_type_fk!='] = 4;
                     $where_arr['f_members.persons_status'] = $this->input->post('person_hala');
                 }
             }

             if (!empty($this->input->post('person_cat'))) {
                 if ($sub_table == 'mother') {
                     $where_arr['fr_main_kafalat_details.kafala_type_fk'] = 4;
                     $where_arr['mother.categoriey_m'] = $this->input->post('person_cat');

                 } elseif ($sub_table == 'f_members') {
                     $where_arr['fr_main_kafalat_details.kafala_type_fk!='] = 4;
                     $where_arr['f_members.categoriey_member'] = $this->input->post('person_cat');

                 }
             }

 */
        }

        /*if (!empty($this->input->post('kafala_end')) && ($this->input->post('kafala_end') == 2)) {
            if (!empty($this->input->post('end_from'))) {
                $where_arr['fr_main_kafalat_details.first_date_to >='] = strtotime($this->input->post('end_from'));
            }
            if (!empty($this->input->post('end_to'))) {
                $where_arr['fr_main_kafalat_details.first_date_to <='] = strtotime($this->input->post('end_to'));
            }
        }*/
  
  /**********/      
       if (!empty($this->input->post('kafala_end')) && ($this->input->post('kafala_end') == 2)) {
   
   /* if (!empty($this->input->post('end_from'))) {
        $where_arr['fr_main_kafalat_details.first_date_to >='] = strtotime($this->input->post('end_from'));
    } elseif (!empty($this->input->post('end_to'))) {
        $where_arr['fr_main_kafalat_details.first_date_to <='] = strtotime($this->input->post('end_to'));
    } else {
        $where_arr['fr_main_kafalat_details.first_date_to <='] = strtotime(date('Y-m-d'));

    }*/
 
     if (!empty($this->input->post('end_from'))) {
        $where_arr['fr_main_kafalat_details.first_date_to >='] = strtotime($this->input->post('end_from'));
    }
    
    if (!empty($this->input->post('end_to'))) {
        $where_arr['fr_main_kafalat_details.first_date_to <='] = strtotime($this->input->post('end_to'));
    }
    
    

} elseif (!empty($this->input->post('kafala_end')) && ($this->input->post('kafala_end') == 1)) {
    
    $where_arr['fr_main_kafalat_details.first_date_to >='] = strtotime(date('Y-m-d'));

}

/***********/
  


 $data['kafala_end_var'] = $this->input->post('kafala_end');


        
        
        $data['all_main_kafalat'] = $this->Testy_m->select_all_main_kafalat_details_search($where_arr, $sub_table, $sub_table2, $person_hala, $where_arr2);

        $this->load->view('admin/testy_v/search_result_view', $data);
    }
/************************************************************/



      public function quods_byan() //Testy/quods_byan
    { //Testy/all_final_esal_quods

$this->load->model("Testy_m");
 $data['all_quods_byan'] = $this->Testy_m->select_quedsss();

        $data['subview'] = 'admin/testy_v/quods_byan_view';
        $this->load->view('admin_index', $data);



    }  


/***************************************************/



      public function all_quod() //Testy/all_quod
    { //Testy/all_final_esal_quods

   $this->load->model("Testy_m");
     $data['all_quods'] = $this->Testy_m->get_all_quods();

        $data['subview'] = 'admin/testy_v/r_all_quods_view';
        $this->load->view('admin_index', $data);



    }
    
    
        public function bbb() //Testy/bbb
    { //Testy/all_final_esal_quods

   $this->load->model("Testy_m");
    // $data['all_quods'] = $this->Testy_m->getMembers_2();
     
//$data['all_quods'] =     $this->Testy_m->getMembers_2('mother');
$data['all_quods'] =     $this->Testy_m->getMembers_3();

echo '<pre>';
print_r( $data['all_quods']);

      //  $this->load->view('admin_index', $data);



    }  
    

}// END CLASS 