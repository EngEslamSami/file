<?php
class Reports_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
      public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }


public function get_stage_name($stage_id_fk)
	{
		 $sql = $this->db->where('id',$stage_id_fk)->get('classrooms')->row_array();
         return $sql['name'];
	}
  //----------------------------------------
  public function get_f_members($age,$currnt_year){
      $this->db->select('f_members.* ,(('.$currnt_year.')-(f_members.member_birth_date_year)) as ages_id,
                    mother.mother_national_num_fk as mother_id,mother.full_name');
      $this->db->from('f_members');
      $this->db->join('mother', 'mother.mother_national_num_fk = f_members.mother_national_num_fk', 'left');
      
      if($this->input->post('gender') == 'all'){
      }else{
      $this->db->where("f_members.member_gender",$this->input->post('gender'));  
      }
      
        if($this->input->post('operation_id_fk') == 1){
      $this->db->where("f_members.member_birth_date_year < ",$age);      
      }elseif($this->input->post('operation_id_fk') == 2){
         $this->db->where("f_members.member_birth_date_year <= ",$age);  
      }elseif($this->input->post('operation_id_fk') == 3){
         $this->db->where("f_members.member_birth_date_year > ",$age);  
      }elseif($this->input->post('operation_id_fk') == 4){
         $this->db->where("f_members.member_birth_date_year >= ",$age);  
      }elseif($this->input->post('operation_id_fk') == 5){
         $this->db->where("f_members.member_birth_date_year",$age);  
      }else{
        
      }

      $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {  $i=0;
                foreach ($query->result() as $row) {
                 $data[] = $row;
                $data[$i]->stage_name = $this->get_stage_name($row->stage_id_fk);
                $i++;
                
                 }
            return $data;
            }
            else
            {
                return false;
            }
  }
  
 
 //////////////////////////////////////////////////////
 
   public function get_familys_request(){
      $this->db->select('basic.* ,
                      mother.mother_national_num_fk as mother_id,mother.full_name');
      $this->db->from('basic');
      $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', 'left');
     
      if($this->input->post('status_id_fk') == 'all'){
            
      }elseif($this->input->post('status_id_fk') == 'gary'){
       $this->db->where("basic.suspend",0); 
      }elseif($this->input->post('status_id_fk') == 'accept'){
       $this->db->where("basic.suspend",1); 
      }elseif($this->input->post('status_id_fk') == 'refuse'){
       $this->db->where("basic.suspend",3); 
      }elseif($this->input->post('status_id_fk') == 'forward'){
       $this->db->where("basic.suspend",2); 
      }elseif($this->input->post('status_id_fk') == 'accredited'){
       $this->db->where("basic.suspend",4); 
      }
      else{
        
      }
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {  
                foreach ($query->result() as $row) {
                 $data[] = $row;
                
                 }
            return $data;
            }
            else
            {
                return false;
            }
  }
  ////////////////////////////////////////////////////
  
  
  public function get_familys_request_period($from,$to){
      $this->db->select('basic.* ,
                      mother.mother_national_num_fk as mother_id,mother.full_name');
      $this->db->from('basic');
      $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', 'left');
     
      if($this->input->post('status_id_fk') == 'all'){
            
      }elseif($this->input->post('status_id_fk') == 'gary'){
       $this->db->where("basic.suspend",0); 
      }elseif($this->input->post('status_id_fk') == 'accept'){
       $this->db->where("basic.suspend",1); 
      }elseif($this->input->post('status_id_fk') == 'refuse'){
       $this->db->where("basic.suspend",3); 
      }elseif($this->input->post('status_id_fk') == 'forward'){
       $this->db->where("basic.suspend",2); 
      }elseif($this->input->post('status_id_fk') == 'accredited'){
       $this->db->where("basic.suspend",4); 
      }
      else{
        
      }
        $this->db->where('basic.date >=',$from);
        $this->db->where('basic.date <=',$to);
        $this->db->order_by('basic.date','ASC');
        $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {  
                foreach ($query->result() as $row) {
                 $data[] = $row;
                
                 }
            return $data;
            }
            else
            {
                return false;
            }
  }
  /*********************************************************************/
  
      public function report_files_status_search($suspend_id, $from, $to){

    

        $this->db->where('basic.date >=',$from);
        $this->db->where('basic.date <=',$to);
        $this->db->where('suspend',$suspend_id);
        $query = $this->db->get('basic');

        $i = 0;$data = $query->result();
        foreach( $query->result() as $row){
            $data[$i]->mather_name = $this->gat_mother_name($row->mother_national_num);
            $data[$i]->childs = $this->get_childs($row->mother_national_num);
            $data[$i]->age = $this->get_ages();
            $i++;
        }
        return $data;
    }

    public function gat_mother_name($id){
        $this->db->where('mother_national_num_fk',$id);
        $query = $this->db->get('mother');
        $mother = $query->row();
        return $mother->full_name;
    }

    public function get_childs($id){
        $this->db->where('mother_national_num_fk',$id);
        $query = $this->db->get('f_members');
        return $query->result();

    }


    public function get_ages(){

        $query = $this->db->get('person_ages_setting');
        return $query->row();

    }

  
   public function get_from_family_setting($type)
    {
        $this->db->select('*');
        $this->db->from('family_setting');
        $this->db->where("type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row->title_setting;
            }
            return $data;
        }else{
            return 0;
        }

    }
  
  
  
  
  

    public function getMemberYearAges($year_hegri,$gender,$year_current)
    {
        $this->db->select('f_members.* ,(('.$year_current.')-(f_members.member_birth_date_hijri_year)) as ages_id,
                    mother.mother_national_num_fk as mother_id,mother.full_name,
                    mother.m_mob as mother_phone,basic.file_num as file_num_basic,father.full_name as father_name_basic');
        $this->db->from('f_members');
        $this->db->join('mother', 'mother.mother_national_num_fk = f_members.mother_national_num_fk', 'left');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', 'left');
        $this->db->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', 'left');

        if($this->input->post('gender') == 'all'){
        }else{
            $this->db->where("f_members.member_gender",$gender);
        }
        $this->db->where("f_members.member_birth_date_hijri_year",$year_hegri);
        $this->db->where("f_members.persons_status",1);
        
        $this->db->where("basic.final_suspend",4);
         $this->db->where("basic.file_status",1);
      
        
        
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {  $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
               $data[$i]->fe2aaaa = $this->get_money_function($row->mother_national_num_fk);
                $i++;

            }
            return $data;
        }
        else
        {
            return false;
        }
    }
    
    
    
    public function get_money_function($mother_national_num_fk){
    $this->load->model('familys_models/Money');
    $this->load->model('Difined_model');
    $mothers_data =$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num_fk);
    $count =0;
    if(!empty($mothers_data)){
         if($mothers_data[0]->categoriey_m == 1  || $mothers_data[0]->categoriey_m == 2 ){
         //   $count =1;
          $count =  $this->Money->sum_mosfed_in_mother($mother_national_num_fk);
         }
    }
    //$data['member_num'] =$this->Money->get_member_num($_POST['family_num']) + $count;
      $data['member_num'] =$this->Money->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
    if($data['member_num'] == 0){
        $data['member_num'] = 1;
    }
    $data['total'] = $this->Getfamily_income_duties($mother_national_num_fk);
    
    $data['naseb'] =( $data['total']  / $data['member_num']  );
    $data['f2a'] =$this->Money->GetF2a($data['naseb'] );
   // echo json_encode($data);
     return $data;

} 
  
  
  
  
    public function Getfamily_income_duties($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $income_total=0;
             $income_duties=0;
                 foreach( $query->result() as $row){
                     if($row->type ==1){
                        $income_total +=$row->value;

                     }elseif($row->type ==2){
                        $income_duties +=$row->value;
                    }

                 }
                 $total =  $income_total -$income_duties;

         return $total;
         }else{
             return 0;
         }
   
   }  
  
  
  
    

  
  /*******************************************************************/
  
  
     public function select_data_basic_accepted(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('final_suspend',4);
        $this->db->where('deleted',0);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
               $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
               
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                     $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                   /*  $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                      $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
                $data[$i]->reason=$this->get_reason($row->mother_national_num);*/
                //   $data[$i]->fe2aaaa = $this->get_money_function($row->mother_national_num);  
                 $i++;
            }
            return $data;
        }
        return false;
    } 
  
  
          public  function get_mother_name($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }

         public  function get_mother_n_card($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['mother_national_card_new'];

    }
   public function get_father_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->full_name;
        }else{
            return "لم يضاف الاسم";
        }
    } 

       public function get_father_national($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->f_national_id;
        }else{
            return '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات </button>
            
            ';
        }
    } 
    
    
         public function get_files_status_setting($file_status_id)
    {
        $this->db->where('id', $file_status_id);
        $query=$this->db->get('files_status_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->color;
        }else{
            return "لم يضاف الاسم";
        }
    } 
    
    
    
                public function get_gggg(){
        $this->db->select('basic.*,
                           basic.mother_national_num  as  faher_name ,
                           
                           father.f_national_id     as  father_national,
                            father.full_name as father_full_name,
                           
                           mother.full_name     as  mother_name,
                           mother.m_mob     as  mother_mob,
                           mother.m_another_mob     as  mother_another_mob,
                           
                           
                           
                           mother.mother_national_card_new     as  mother_new_card,
                           
                           files_status_setting.title as process_title ,
                           files_status_setting.color as files_status_color 
                           
                            ');
                            
                            
        $this->db->from('basic');
    ////   // $this->db->join('lagna as lagna_main', 'lagna_main.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
     ////   // $this->db->join('lagna as lagna_approved', 'lagna_approved.id_lagna = transformation_lagna.approved_lagna',"left");
      ////   // $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
     
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status',"left");
      
     //   $this->db->where('basic.suspend',4);
        $this->db->where('basic.final_suspend',4);
         $this->db->where('basic.deleted',0);
        
               
       // $this->db->order_by('id',"ASC");
       // $this->db->where('transformation_lagna.mother_national_num',$id);
       $this->db->order_by("id","ASC");
        $query = $this->db->get();
          return  $query->result_array();
       /* if ($query->num_rows() > 0) {
            return  $query->result();
        }*/
        return false;
    }
/**************************************************************************************/


      public function select_all_f_members(){
      /*  $this->db->select('*');
        $this->db->from('f_members');
*/

  $this->db->select('f_members.*');
        $this->db->from('f_members');
      //  $this->db->join('mother', 'mother.mother_national_num_fk = f_members.mother_national_num_fk', 'left');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', 'left');
      //  $this->db->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', 'left');

     $this->db->where("basic.final_suspend",4);


        $query = $this->db->get();
        $a=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
             
                 $data[$a]->mother_name = $this->get_mother_name_2($row->mother_national_num_fk);  
                 $data[$a]->mother_mob = $this->get_mother_mob($row->mother_national_num_fk); 
                 $data[$a]->father_name = $this->get_father_name($row->mother_national_num_fk);  
                 $data[$a]->file_num = $this->get_file_num($row->mother_national_num_fk);  
               
                $data[$a]->persons_status_name = $this->files_status_setting($row->persons_status); 
               
               
               if((is_numeric($row->member_study_case))){
                 $data[$a]->halet_drasa = $this->get_halet_drasa($row->member_study_case);
                 /*
                 if($row->stage_id_fk == 0){
                    $data[$a]->stage_name =  $this->get_motakeg(); 
                    $data[$a]->class_name =  $this->get_motakeg(); 
                    $data[$a]->school_name =  $this->get_motakeg(); 
                 }else{
                     $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                     $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);
                     $data[$a]->school_name = $this->get_school_name($row->school_id_fk);
                 }*/
                  
                //  $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                //  $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);
             
               //   $data[$a]->school_name = $this->get_school_name($row->school_id_fk);
                  
                  
                  
              }else{
                 $data[$a]->halet_drasa = $row->member_study_case;  
               }
               
$data[$a]->school = $this->get_school($row->school_id_fk);
$data[$a]->class = $this->get_class($row->class_id_fk);
$data[$a]->stage = $this->get_class($row->stage_id_fk);
               
               
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }

    
    
    
    
 
      public function files_status_setting($persons_statue){
           $h = $this->db->get_where("files_status_setting", array('id'=>$persons_statue ));
        $arr= $h->row_array();
        return $arr['title'];
        
       }  
 
    
      public function get_halet_drasa($member_study_case){
           $h = $this->db->get_where("family_setting", array('id_setting'=>$member_study_case , 'type'=>40));
        $arr= $h->row_array();
        return $arr['title_setting'];
        
       }  
       
  public function get_school($id){
    if ($id == 0) {
    
    $school = 'غير محدد';
    return $school;
    } else {
    $q = $this->db->where('id_setting', $id)->get('family_setting');
    if ($q->num_rows() > 0) {
    return $q->row()->title_setting;
    } else {
    $school = 'غير محدد';
    return $school;
    }
    }

} 

public function get_class($id){
    if ($id == 0) {
    
    $class = 'غير محدد';
    return $class;
    } else {
    $q = $this->db->where('id', $id)->get('classrooms');
    if ($q->num_rows() > 0) {
    return $q->row()->name;
    } else {
    $class = 'غير محدد';
    return $class;
    }
    }

}    
       
       
       
       
      /*     public function get_school_name($school_id_fk){
           $h = $this->db->get_where("family_setting", array('id_setting'=>$school_id_fk , 'type'=>26));
        $arr= $h->row_array();
        return $arr['title_setting'];
        
       } */
    
    
  
       public function get_file_num($mother_national_num){
           $h = $this->db->get_where("basic", array('mother_national_num'=>$mother_national_num));
        $arr= $h->row_array();
        return $arr['file_num'];
        
       }
        public function get_classroom_name($id){
        $this->db->select('*');
        $this->db->from('classrooms');
        $this->db->where("id",$id);
        $myquery = $this->db->get();
        $all_resultes = $myquery->result()[0]->name;
        return $all_resultes;
    }
    
    
   public  function get_mother_mob($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['m_mob'];

    }
    
    
                public  function get_mother_name_2($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }
    
            /*       public  function get_father_name($mother_national_num_fk){
    
        $h = $this->db->get_where("father", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }  */
  
  public function select_all_test($cond)
{
    $this->db->select('file_num,mother_national_num,father_national_num,file_status,process_title');
    $this->db->from("basic");
  
    $this->db->where("final_suspend", 4);
   // $this->db->where('file_status', $cond['file_status']);
    if($cond['file_status'] != 0) {
      //  $this->db->where('file_status', $cond['file_status']);
    }
   
   $this->db->where('file_status', 1);
    $query = $this->db->get();
    $data=array();
    if ($query->num_rows() > 0) {
        $a = 0;
        foreach ($query->result() as $row) {
//                ******************31-12-om******************
           $mater_data = $this->getMother($row->mother_national_num, $cond['category']);
            if(empty($mater_data)){
                continue ;
            }
            //                ******************31-12-om******************
            $data[$a] = $row;

            $data[$a]->father_name = $this->get_father_name($row->mother_national_num);
            /********* الارامل ***********/
            $data[$a]->ff_armal = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);
            /********* الايتام ***********/
            $data[$a]->ff_yatem = $this->get_yatem_full_active_test($row->mother_national_num);

            $data[$a]->up_child = $this->get_bale3_full_active_test($row->mother_national_num);
            $data[$a]->mother = $mater_data;
            $a++;
        }
        return $data;
    } else {
        return 0;
    }

}

  
  public function select_all($cond)
{
    $this->db->select('file_num,mother_national_num,father_national_num,file_status,process_title');
    $this->db->from("basic");
  
    $this->db->where("final_suspend", 4);
   // $this->db->where('file_status', $cond['file_status']);
    if($cond['file_status'] != 0) {
        $this->db->where('file_status', $cond['file_status']);
    }
   
   
    $query = $this->db->get();
    $data=array();
    if ($query->num_rows() > 0) {
        $a = 0;
        foreach ($query->result() as $row) {
//                ******************31-12-om******************
            $mater_data = $this->getMother($row->mother_national_num, $cond['category']);
            if(empty($mater_data)){
                continue ;
            }
            //                ******************31-12-om******************
            $data[$a] = $row;

            $data[$a]->father_name = $this->get_father_name($row->mother_national_num);
            /********* الارامل ***********/
            $data[$a]->ff_armal = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);
            /********* الايتام ***********/
            $data[$a]->ff_yatem = $this->get_yatem_full_active($row->mother_national_num);

            $data[$a]->up_child = $this->get_bale3_full_active($row->mother_national_num);
            $data[$a]->mother = $mater_data;
            $a++;
        }
        return $data;
    } else {
        return 0;
    }

}


//  ************************* 31-12-om **********************
/*public function getMother($id, $cat)
{
    $h = $this->db->get_where("mother", array('mother_national_num_fk' => $id))->row();
    if(!empty($h)) {
        $categoriey = $this->getNaseb($h->mother_national_num_fk, $h->categoriey_m);
        if (!empty($categoriey)) {
            if ($categoriey->id == $cat) {
                $data = array();
                $data['categoriey'] = $categoriey->title;
                $data['mother_name'] = $h->full_name;
                $data['mother_phone'] = $h->m_mob;
                return $data;
            } else {
                return false;
            }
        }
    }
}*/

public function getMother($id, $cat)
{
    $h = $this->db->get_where("mother", array('mother_national_num_fk' => $id))->row();
    if(!empty($h)) {
        $categoriey = $this->getNaseb($h->mother_national_num_fk, $h->categoriey_m);
        if (!empty($categoriey)) {
            if($cat != 0 ) {
                if ($categoriey->id == $cat) {
                    $data = array();
                    $data['categoriey'] = $categoriey->title;
                    $data['mother_name'] = $h->full_name;
                    $data['mother_phone'] = $h->m_mob;
                    return $data;
                } else {
                    return false;
                }
            }else if($cat == 0) {
                $data = array();
                $data['categoriey'] = $categoriey->title;
                $data['mother_name'] = $h->full_name;
                $data['mother_phone'] = $h->m_mob;
                return $data;
            }else{
                return false;
            }
        }
    }




}

public function getNaseb($mother_national_num_fk, $categoriey_m)
{
    $this->db->select('*');
    $this->db->from('family_income_duties');
    $this->db->where('mother_national_num_fk', $mother_national_num_fk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $total_income = 0;
        $total_duties = 0;
        $count = 0;
        foreach ($query->result() as $row) {

            if ($row->affect == 1 && $row->type == 1) {
                $total_income += $row->value;
            }
            if ($row->affect == 1 && $row->type == 2) {
                $total_duties += $row->value;
            }

        }
        if ($categoriey_m == 1 || $categoriey_m == 2) {
            $count = $this->sum_mosfed_in_mother($mother_national_num_fk);
        }
        $member_num = $this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
        if ($member_num == 0) {
            $member_num = 1;
        }
        $total = $total_income - $total_duties;
        $naseb = $total / $member_num;
        $f2a = $this->GetF2a_data($naseb);

        return $f2a;

    }

}

public function sum_mosfed_in_mother($mother_national_num_fk)
{

    $this->db->select('*');
    $this->db->from('mother');
    $this->db->where('mother_national_num_fk', $mother_national_num_fk);
    $this->db->where('person_type', 62);
    $this->db->where('halt_elmostafid_m', 1);
    $query = $this->db->get();

    return $rowcount = $query->num_rows();


}


public function sum_mosfed_in_f_members($mother_national_num_fk)
{

    $this->db->select('*');
    $this->db->from('f_members');
    $this->db->where('mother_national_num_fk', $mother_national_num_fk);
    $this->db->where('member_person_type', 62);
    $this->db->where('halt_elmostafid_member', 1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

public function GetF2a_data($value)
{
    $this->db->select("id,title,from,to,color");
    $this->db->where('from <=', $value);
    $this->db->where('to >=', $value);
    $query = $this->db->get("family_category");
    if ($query->num_rows() > 0) {
        return $query->row();

    }

}

//__________Nagwa_________

public function get_category()
{
    $this->db->select('*');
    $this->db->from(' family_category');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
}

public function get_file_satus()
{
    $this->db->select('*');
    $this->db->from('files_status_setting');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
}



    public function get_armal_sum_armal_full_active_mother($mother_national_num_fk)
    {
        $this->db->select("id");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("person_type", 62);
        $this->db->where("categoriey_m", 1);

        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
    public function get_yatem_full_active($mother_national_num_fk)
    {
        $this->db->select("id");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("member_person_type", 62);
        $this->db->where("categoriey_member", 2);
        $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    public function get_bale3_full_active($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 3);

        $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
/**************************************************************/

  public function get_yatem_full_active_test($mother_national_num_fk)
    {
        $this->db->select("id");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
      //  $this->db->where("member_person_type", 62);
        $this->db->where("categoriey_member", 2);
        $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    public function get_bale3_full_active_test($mother_national_num_fk)
    {
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_national_num_fk);
        $this->db->where("categoriey_member", 3);

        $this->db->where('persons_status', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
    
    
    
       public function select_bale3_full_active_test(){
  $this->db->select('f_members.*');
        $this->db->from('f_members');
      //  $this->db->join('mother', 'mother.mother_national_num_fk = f_members.mother_national_num_fk', 'left');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', 'left');
      //  $this->db->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', 'left');

     $this->db->where("basic.final_suspend",4);
  $this->db->where("basic.file_status",2);
 $this->db->where("basic.file_status",1);
  $this->db->where("f_members.categoriey_member",3);
$this->db->where("f_members.persons_status",1);
/*        $this->db->select('*');
        $this->db->from('f_members');

        
        $this->db->where('categoriey_member',3);
       $this->db->where('persons_status', 1);*/
       
     //   $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
           //    $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);

                 $i++;
            }
            return $data;
        }
        return false;
    }
    
 /*************************************************/
 
 
  public function GetAll(){
    $data['aytam']=$this->getMembers2(
           array('categoriey_member'=>2,'persons_status'=>1));
    $data['armal']=$this->getMembersArmal2(
           array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));
    $data['mostafed']=$this->getMembers2(
           array('categoriey_member'=>3,'persons_status'=>1));
    return$data;
   }   


public function getMembers2($arr)
{
    $query = $this->db->select('f_members.mother_national_num_fk,f_members.id,basic.file_num, basic.mother_national_num  as num 

          
        ')
        ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
      
        ->where('basic.final_suspend', 4)
        ->where('basic.file_status', 1)
        ->where($arr)
        ->order_by("basic.file_num", "ASC")
        ->get('f_members');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
        $data[$x] = $row;
        $data[$x]->num_rows = $query->num_rows();
        $main_kafalat_num = $this->search_from_main_kafalat_details($row->id);

        if($main_kafalat_num ==1){

            $guaranteed = $guaranteed+1;

        }elseif ($main_kafalat_num ==0){
            $not_guaranteed =$not_guaranteed+1;
        }

        $data[$x]->guaranteed = $guaranteed;
        $data[$x]->not_guaranteed =$not_guaranteed;

        $x++;}
        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
    } else {
        return 0;
    }


}
public function search_from_main_kafalat_details($id)
{
    $this->db->select('person_id_fk,first_date_from,first_date_to');
    $this->db->from('fr_main_kafalat_details');
    $this->db->where('person_id_fk', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return 1;
    } else {
        return 0;
    }


}
public function getMembersArmal2($arr)
{
    $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
     files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
     ')
        ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
        ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
        ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
        ->where($arr)
        ->where('basic.file_status', 1)
        ->get('mother');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->num_rows = $query->num_rows();
            $data[$x]->main_kafalat_num = $this->search_from_main_kafalat_details($row->id);
            if($data[$x]->main_kafalat_num ==1){
                $guaranteed=$guaranteed+1;
            }elseif ($data[$x]->main_kafalat_num ==0){
                $not_guaranteed=$not_guaranteed+1;
            }
            $data[$x]->guaranteed = $guaranteed;
            $data[$x]->not_guaranteed =$not_guaranteed;
            $x++;}

        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
    } else {
        return 0;
    }


} 

public function get_basic_data(){

      $this->db->where('final_suspend',4);
      $this->db->where('deleted',0);
      $this->db->order_by('file_num',"ASC");
      $query = $this->db->get('basic');

    if ($query->num_rows()>0){
        $i=0;
        foreach ($query->result() as $row){
            $data[$i]= $row;
            $data[$i]->mother = $this->get_mother_data($row->mother_national_num);
            $data[$i]->income = $this->get_incoms($row->mother_national_num,1);
            $data[$i]->duteies = $this->get_incoms($row->mother_national_num,2);
             if (empty($data[$i]->income) && empty($data[$i]->duteies)){
                 $total_income = $row->retirement + $row->guarantee + $row->insurance;
                 $data[$i]->duteies = 0;
             }  else{
                 $total_income =  $data[$i]->income;
             }
         //   $final_value = $total_income -  $data[$i]->duteies;
	if ($total_income > $data[$i]->duteies ){
                $final_value = $total_income -  $data[$i]->duteies;
            } else{
                $final_value =0;
            }

          $member_num = $this->sum_mosfed_in_f_members($row->mother_national_num) + $this->sum_mosfed_in_mother($row->mother_national_num);
           if ($member_num==0){
               $member_num =1;
           }
           $data[$i]->mem_naseb = round($final_value / $member_num) ;
           $data[$i]->fe2a_name= $this->GetF2a($data[$i]->mem_naseb,'title');
           $data[$i]->fe2a_color= $this->GetF2a($data[$i]->mem_naseb,'color');

            $i++;

        }
        return $data;
    }
    else{
        return false;
    }


}
public function get_mother_data($mother_num){
    $this->db->where('mother_national_num_fk',$mother_num);
    $query = $this->db->get('mother');
    if ($query->num_rows()>0){

        return $query->row();
    }
    else{
        return false;
    }
}

    public function get_incoms($num,$type)
    {
        $this->db->select('sum(value) as total_val');
        $this->db->from('family_income_duties');
        $this->db->where("mother_national_num_fk",$num);
        $this->db->where("type",$type);
        $this->db->where("affect",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->total_val;

        }else{
            return 0;
        }

    }
    public function GetF2a($value,$return)
    {
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row()->$return;

        }else{
            return 0;
        }

    }

public function get_all_families($value){
     
        $query = $this->db->get('basic');
        if ($query->num_rows() > 0) {
        
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->gm3iat = $this->get_association($row->mother_national_num);
                if ($value==1){
                    if (empty($data[$i]->gm3iat)){
                        unset($data[$i]);
                    }
                }
                elseif($value==2){
                    if (!empty($data[$i]->gm3iat)){
                        unset($data[$i]);
                    }
                }
                $i++;
            }
            return $data;

        } else {
            return false;
        }

    }
    public function get_association($mother_num){

      $this->db->where('mother_national_num_fk',$mother_num);
        $query = $this->db->get('family_gameiat_help');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
/***********************************************/
/*
public function report_health_search($type_member,$year_current)
{

    $persons_status_title_arr = array(1 => 'نشط كليا',2=>'نشط جزئيا',3=>'موقوف مؤقتا',4=>'موقوف نهائيا	' ); 

    $file_num = $this->input->post('file_num');
    $family_cat = $this->input->post('family_cat');
    $file_stause = $this->input->post('file_stause');
    $persons_status = $this->input->post('persons_status');
    $gender = $this->input->post('gender');
    $age_from = $this->input->post('age_from');
    $age_to = $this->input->post('age_to');

    $health_state = $this->input->post('health_state');
    // $type_member = $this->input->post('type_member');
    $disease_id_fk = $this->input->post('disease_id_fk');
    $dis_reason = $this->input->post('dis_reason');
    $date_reason = $this->input->post('date_reason');
    $dis_response_status = $this->input->post('dis_response_status');
    $dis_status = $this->input->post('dis_status');
    $comprehensive_rehabilitation = $this->input->post('m_comprehensive_rehabilitation');

    $type_member_arr = array(1 => 'mother',2=>'f_members' );
    $name_member_arr = array(1 => 'full_name',2=>'member_full_name' );
    $gender_arr = array(1 => 'm_gender',2=>'member_gender' );
    $persons_status_arr = array(1 => 'halt_elmostafid_m',2=>'persons_status' );
    $birth_date_hijri_year_arr = array(1 => 'm_birth_date_hijri_year',2=>'member_birth_date_hijri_year' );
    $cat_member_arr = array(1 => 'الام',2=>'الابناء' );
    $health_state_arr= array(1 =>'m_health_status_id_fk',2=>'member_health_type' );
    $disease_id_fk_arr = array(1 =>'disease_id_fk' ,2=>'member_disease_id_fk');
    $disability_arr = array(1 =>'disability_id_fk',2=>'member_disability_id_fk');
    $date_reason_arr = array(1=> 'date_death_disease',2=>'member_dis_date_ar' );
    $dis_response_status_arr = array(1=>'dis_response_status',2=>'member_dis_response_status');
    $dis_status_arr = array(1=>'dis_status',2=>'member_dis_status');
    $comprehensive_rehabilitation_arr = array(1 =>'m_comprehensive_rehabilitation' , 2=>'member_comprehensive_rehabilitation');
    $conn = array();
    if (!empty($type_member) &&($type_member !=0)) {
        if (!empty($health_state)) {
                $conn[$health_state_arr[$type_member]]=$health_state;        
            if($health_state !='good') {
                if ($health_state == 'disease') {
                    if (!empty($disease_id_fk)) {
                        $conn[$disease_id_fk_arr[$type_member]]=$disease_id_fk;
                    }
                }elseif ($health_state == 'disability') {
                    if (!empty($disease_id_fk)) {

                        $conn[$disability_arr[$type_member]]=$disease_id_fk;
                    }
                }
                if (!empty($date_reason)) {
                    $conn[$date_reason_arr[$type_member]]=$date_reason;
                }
                if (!empty($dis_response_status)) {
                    $conn[$dis_response_status_arr[$type_member]]=$dis_response_status;
                }
                if (!empty($dis_status)) {
                    $conn[$dis_status_arr[$type_member]]=$dis_status;
                }
            }
        
        }
        if (!empty($comprehensive_rehabilitation)) {
               $conn[$comprehensive_rehabilitation_arr[$type_member]]=$comprehensive_rehabilitation;
        } 
        if (!empty($persons_status)&&($persons_status !='all')) {
               $conn[$persons_status_arr[$type_member]]=$persons_status;
        }  
        if (!empty($gender)&&($gender !='all')) {
               $conn[$gender_arr[$type_member]]=$gender;
        }
         if (!empty($age_from)) {
             $age_from_year=$year_current-$age_from;
               $conn[$birth_date_hijri_year_arr[$type_member].'<=']=$age_from_year;
        } 
        if (!empty($age_to)) {
             $age_to_year=$year_current-$age_to;
               $conn[$birth_date_hijri_year_arr[$type_member].'>=']=$age_to_year;
        }

        if (!empty($file_num)) {
            $conn['basic.file_num']=$file_num;
        }
        if (!empty($family_cat)&&($family_cat !='all')) {
            $conn['basic.family_cat']=$family_cat;
        }  
        if (!empty($file_stause)&&($file_stause !='all')) {
            $conn['basic.file_status']=$file_stause;
        }
       $query= $this->db->select($type_member_arr[$type_member].'.*,
       basic.file_num,basic.family_cat,basic.family_cat_name,basic.file_status,basic.process_title')
       ->join('basic','basic.mother_national_num='.$type_member_arr[$type_member].'.mother_national_num_fk')
       ->where('final_suspend',4)->where($conn)->get($type_member_arr[$type_member])->result();
            //   return $query;
              
        $filed_health_state=$health_state_arr[$type_member];
        $filed_name=$name_member_arr[$type_member];
        $filed_date=$date_reason_arr[$type_member];
        $filed_disease=$disease_id_fk_arr[$type_member];
        $filed_disability=$disability_arr[$type_member];
        $filed_dis_response_status=$dis_response_status_arr[$type_member];
        $filed_dis_status=$dis_status_arr[$type_member];
        $filed_comprehensive_rehabilitation=$comprehensive_rehabilitation_arr[$type_member];
        $filed_gender=$gender_arr[$type_member];
        $filed_persons_status=$persons_status_arr[$type_member];
        $filed_birth_date_hijri_year=$birth_date_hijri_year_arr[$type_member];
       if (!empty($query)) {
        foreach ($query as $key => $value) {
            $query[$key]->name=$value->$filed_name;
            $query[$key]->date=$value->$filed_date;
            $query[$key]->cat=$cat_member_arr[$type_member];
            if (!empty($value->$filed_health_state)) {
                if ($value->$filed_health_state=='good') {
                    $query[$key]->health_state_title='سليم';
                    $query[$key]->health_state_type_title='لا يوجد ';

                }elseif ($value->$filed_health_state=='disease') {
                    $query[$key]->health_state_title='مريض';
                    $query[$key]->health_state_type_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_disease ),'title_setting');

                }elseif ($value->$filed_health_state=='disability') {
                    $query[$key]->health_state_title='معاق';
                    $query[$key]->health_state_type_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_disability ),'title_setting');

                }
            }else{
                $query[$key]->health_state_title='غير محدد';
                $query[$key]->health_state_type_title='غير محدد';
            }
            $query[$key]->dis_response_status_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_dis_response_status ),'title_setting');
            $query[$key]->dis_status_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_dis_status ),'title_setting');
            if ($value->$filed_comprehensive_rehabilitation== 1) {
                $query[$key]->comprehensive_rehabilitation_title='نعم';

            }else{
                $query[$key]->comprehensive_rehabilitation_title='لا';

            }
            if ($value->$filed_gender== 1) {
                $query[$key]->gender_title='ذكر';

            }else{
                $query[$key]->gender_title='انثى';

            }
            if (array_key_exists($value->$filed_persons_status,$persons_status_title_arr)) {
            $query[$key]->persons_status_title=$persons_status_title_arr[$value->$filed_persons_status];
            }else {
                $query[$key]->persons_status_title='غير محدد';
            }
            if (!empty($value->$filed_birth_date_hijri_year) &&(is_numeric($value->$filed_birth_date_hijri_year))) {
            $query[$key]->age=$year_current-$value->$filed_birth_date_hijri_year;
            }else{
               $query[$key]->age='غير محدد'; 
            }
                    
         }
       return $query;
    }
       
    }



} */ 


  public function report_health_search($type_member,$year_current)
{

    $persons_status_title_arr = array(1 => 'نشط كليا',2=>'نشط جزئيا',3=>'موقوف مؤقتا',4=>'موقوف نهائيا	' ); 

    $file_num = $this->input->post('file_num');
    $family_cat = $this->input->post('family_cat');
    $file_stause = $this->input->post('file_stause');
    $persons_status = $this->input->post('persons_status');
    $gender = $this->input->post('gender');
    $age_from = $this->input->post('age_from');
    $age_to = $this->input->post('age_to');
    $health_state = $this->input->post('health_state');
    $disease_id_fk = $this->input->post('disease_id_fk');
    $date_reason = $this->input->post('date_reason');
    $dis_response_status = $this->input->post('dis_response_status');
    $dis_status = $this->input->post('dis_status');
    $comprehensive_rehabilitation = $this->input->post('m_comprehensive_rehabilitation');

    $type_member_arr = array(1 => 'mother',2=>'f_members' );
    $name_member_arr = array(1 => 'full_name',2=>'member_full_name' );
    $fard_national_num_arr = array(1 => 'mother_national_card_new',2=>'member_card_num' );
    $gender_arr = array(1 => 'm_gender',2=>'member_gender' );
    /******************************** 6-2-om *******************************/
    $education_status_arr = array(1 => 'm_education_status_id_fk', 2 => 'member_study_case');
    /******************************** 6-2-om *******************************/
    
    $persons_status_arr = array(1 => 'halt_elmostafid_m',2=>'persons_status' );
    $birth_date_hijri_year_arr = array(1 => 'm_birth_date_hijri_year',2=>'member_birth_date_hijri_year' );
    $cat_member_arr = array(1 => 'الام',2=>'الابناء' );
    $health_state_arr= array(1 =>'m_health_status_id_fk',2=>'member_health_type' );
    $disease_id_fk_arr = array(1 =>'disease_id_fk' ,2=>'member_disease_id_fk');
    $disability_arr = array(1 =>'disability_id_fk',2=>'member_disability_id_fk');
    $date_reason_arr = array(1=> 'date_death_disease',2=>'member_dis_date_ar' );
    $dis_response_status_arr = array(1=>'dis_response_status',2=>'member_dis_response_status');
    $dis_status_arr = array(1=>'dis_status',2=>'member_dis_status');
    $comprehensive_rehabilitation_arr = array(1 =>'m_comprehensive_rehabilitation' , 2=>'member_comprehensive_rehabilitation');
    
    $conn = array();
    $conn_in = array();
    
    if (!empty($type_member) &&($type_member !=0)) {
        if (!empty($health_state)) {
                $conn[$health_state_arr[$type_member]]=$health_state;        
            if($health_state !='good') {
                if ($health_state == 'disease') {
                    if (!empty($disease_id_fk)) {
                        $conn_in[$disease_id_fk_arr[$type_member]] = array( );
                        for ($i=0; $i < sizeof($disease_id_fk) ; $i++) { 
                            // $conn_in[$disease_id_fk_arr[$type_member]]=$disease_id_fk;
                            array_push($conn_in[$disease_id_fk_arr[$type_member]],$disease_id_fk[$i]);

                        }
                    }
                }elseif ($health_state == 'disability') {
                    if (!empty($disease_id_fk)) {
                        $conn_in[$disease_id_fk_arr[$type_member]] = array( );

                        for ($i=0; $i < sizeof($disease_id_fk) ; $i++) { 
                            array_push($conn_in[$disease_id_fk_arr[$type_member]],$disease_id_fk[$i]);
                        }
                    }
                }
                if (!empty($date_reason)) {
                    $conn[$date_reason_arr[$type_member]]=$date_reason;
                }
                if (!empty($dis_response_status)) {
                    $conn[$dis_response_status_arr[$type_member]]=$dis_response_status;
                }
                if (!empty($dis_status)) {
                    $conn[$dis_status_arr[$type_member]]=$dis_status;
                }
            }
        
        }
        if (!empty($comprehensive_rehabilitation)) {
               $conn[$comprehensive_rehabilitation_arr[$type_member]]=$comprehensive_rehabilitation;
        } 
        if (!empty($persons_status)&&($persons_status !='all')) {
               $conn[$persons_status_arr[$type_member]]=$persons_status;
        }  
        if (!empty($gender)&&($gender !='all')) {
               $conn[$gender_arr[$type_member]]=$gender;
        }
         if (!empty($age_from)) {
             $age_from_year=$year_current-$age_from;
               $conn[$birth_date_hijri_year_arr[$type_member].'<=']=$age_from_year;
        } 
        if (!empty($age_to)) {
             $age_to_year=$year_current-$age_to;
               $conn[$birth_date_hijri_year_arr[$type_member].'>=']=$age_to_year;
        }

        if (!empty($file_num)) {
            $conn['basic.file_num']=$file_num;
        }
        if (!empty($family_cat)&&($family_cat !='all')) {
            $conn['basic.family_cat']=$family_cat;
        }  
        if (!empty($file_stause)&&($file_stause !='all')) {
            $conn['basic.file_status']=$file_stause;
        }

        
     $this->db->select($type_member_arr[$type_member].'.*,
        basic.file_num,basic.family_cat,basic.family_cat_name,basic.file_status,basic.process_title,basic.contact_mob,houses.h_village_id_fk,
        area_settings.title as hai_name')
       ->join('basic','basic.mother_national_num ='.$type_member_arr[$type_member].'.mother_national_num_fk')
       ->join('houses','houses.mother_national_num_fk ='.$type_member_arr[$type_member].'.mother_national_num_fk')
       ->join('area_settings','area_settings.id  = houses.h_village_id_fk')
             
       ->where('final_suspend',4)->where($conn);
       if (key_exists($disease_id_fk_arr[$type_member],$conn_in)) {
             $this->db->where_in($disease_id_fk_arr[$type_member],$conn_in[$disease_id_fk_arr[$type_member]]);
       }
       $query= $this->db->get($type_member_arr[$type_member])->result();
            //   return $query;
    //  $this->get_counts_health_state($type_member_arr[$type_member],$type_member,$conn,$disease_id_fk_arr[$type_member],$conn_in);
        $table_name=$type_member_arr[$type_member];
        $filed_health_state=$health_state_arr[$type_member];
        $filed_name=$name_member_arr[$type_member];
        $filed_card=$fard_national_num_arr[$type_member];
        /******************************** 6-2-om *******************************/
        $filed_education_status = $education_status_arr[$type_member];
        /******************************** 6-2-om *******************************/
        $filed_date=$date_reason_arr[$type_member];
        $filed_disease=$disease_id_fk_arr[$type_member];
        $filed_disability=$disability_arr[$type_member];
        $filed_dis_response_status=$dis_response_status_arr[$type_member];
        $filed_dis_status=$dis_status_arr[$type_member];
        $filed_comprehensive_rehabilitation=$comprehensive_rehabilitation_arr[$type_member];
        $filed_gender=$gender_arr[$type_member];
        
        $filed_persons_status=$persons_status_arr[$type_member];
        $filed_birth_date_hijri_year=$birth_date_hijri_year_arr[$type_member];
       

        if (!empty($query)) {
        foreach ($query as $key => $value) {
            $query[$key]->name=$value->$filed_name;
            $query[$key]->fard_card=$value->$filed_card;
            
            $query[$key]->date=$value->$filed_date;
            $query[$key]->cat=$cat_member_arr[$type_member];
            if (!empty($value->$filed_health_state)) {
                if ($value->$filed_health_state=='good') {
                    $query[$key]->health_state_title='سليم';
                    $query[$key]->health_state_type_title='لا يوجد ';

                }elseif ($value->$filed_health_state=='disease') {
                    $query[$key]->health_state_title='مريض';
                    $query[$key]->health_state_type_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_disease ),'title_setting');

                }elseif ($value->$filed_health_state=='disability') {
                    $query[$key]->health_state_title='معاق';
                    $query[$key]->health_state_type_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_disability ),'title_setting');

                }
            }else{
                $query[$key]->health_state_title='غير محدد';
                $query[$key]->health_state_type_title='غير محدد';
            }
            $query[$key]->dis_response_status_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_dis_response_status ),'title_setting');
            $query[$key]->dis_status_title=$this->get_by('family_setting',array('id_setting' => $value->$filed_dis_status ),'title_setting');
            if ($value->$filed_comprehensive_rehabilitation== 1) {
                $query[$key]->comprehensive_rehabilitation_title='نعم';

            }else{
                $query[$key]->comprehensive_rehabilitation_title='لا';

            }
            if ($value->$filed_gender== 1) {
                $query[$key]->gender_title='ذكر';

            }else{
                $query[$key]->gender_title='انثى';

            }
            
                    /******************************** 6-2-om *******************************/
                if ((is_numeric($value->$filed_education_status))) {
                    if ($value->$filed_education_status == 0) {
                        $query[$key]->education_status_title ='دون سن الدراسة';
                    } else {
                        $query[$key]->education_status_title = $this->get_halet_drasa($value->$filed_education_status);
                    }
                } else {

                    if ($value->$filed_education_status == 'unlettered') {
                        $halet_drasa_name = 'امي';
                    } elseif ($value->$filed_education_status == 'graduate') {

                        $halet_drasa_name = 'متخرج';

                    } elseif ($value->$filed_education_status == 'read_write') {
                        $halet_drasa_name = ' يقرأو يكتب';
                    }
                    $query[$key]->education_status_title = $halet_drasa_name;
                }
                /******************************** 6-2-om *******************************/

            
            if (array_key_exists($value->$filed_persons_status,$persons_status_title_arr)) {
            $query[$key]->persons_status_title=$persons_status_title_arr[$value->$filed_persons_status];
            }else {
                $query[$key]->persons_status_title='غير محدد';
            }
            if (!empty($value->$filed_birth_date_hijri_year) &&(is_numeric($value->$filed_birth_date_hijri_year))) {
            $query[$key]->age=$year_current-$value->$filed_birth_date_hijri_year;
            }else{
               $query[$key]->age='غير محدد'; 
            }
                    
         }
            $count_arr=$this->get_counts_health_state($type_member_arr[$type_member],$type_member,$conn,$disease_id_fk_arr[$type_member],$conn_in);
            $return_arr = array('result' => $query,'count'=>$count_arr );

       return $return_arr;
    }
       
    }



}    
 

    public function get_files_num()
    {
        
        $query= $this->db->select('mother.full_name as mother_name,father.full_name as father_name,
       basic.file_num,basic.family_cat,basic.family_cat_name,basic.file_status,basic.process_title')
       ->join('basic','basic.mother_national_num=mother.mother_national_num_fk')
       ->join('father','basic.mother_national_num=father.mother_national_num_fk')
       ->where('final_suspend',4)->get('mother')->result();
       return $query;
    }
    
    public function get_counts_health_state($table,$type_member,$conn,$disease_id_fk,$conn_in)
    {
         $this->db->select($table.'.'.$disease_id_fk.' as disease_id , COUNT(file_num)as count,
        basic.file_num')
       ->join('basic','basic.mother_national_num ='.$table.'.mother_national_num_fk')
       ->where('final_suspend',4)->where($conn);
       if (key_exists($disease_id_fk,$conn_in)) {
             $this->db->where_in($disease_id_fk,$conn_in[$disease_id_fk]);
       }
       $query= $this->db->group_by($disease_id_fk)->get($table)->result();
       if (!empty($query)) {
           $data=array();
           foreach ($query as $key => $value) {
                $data[$value->disease_id]=$value;
            $data[$value->disease_id]->health_state_type_title=$this->get_by('family_setting',array('id_setting' => $value->disease_id ),'title_setting');
           }
       }
   
    return $data;
       
    }
    
     public function get_by($table, $where_arr = false, $select = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }  
  
  public function get_all_h_village()
{
//        h_village_id_fk GROUP
    $q = $this->db->select('h_village_id_fk')->group_by('h_village_id_fk')->get('houses')->result();
    if (!empty($q)) {
        foreach ($q as $key => $item) {
            $q[$key]=$item;
            $q[$key]->h_village_title = $this->get_by('area_settings', array('id' => $item->h_village_id_fk), 'title');

        }
        return $q;
    }
}

public function report_mostafed_search($type_member, $year_current)
{

    $persons_status_title_arr = array(1 => 'نشط كليا', 2 => 'نشط جزئيا', 3 => 'موقوف مؤقتا', 4 => 'موقوف نهائيا	');

    $file_num = $this->input->post('file_num');
    $family_cat = $this->input->post('family_cat');
    $file_stause = $this->input->post('file_stause');
    $persons_status = $this->input->post('persons_status');
    $gender = $this->input->post('gender');
    $age_from = $this->input->post('age_from');
    $age_to = $this->input->post('age_to');
    $education_status = $this->input->post('education_status');
    $h_village = $this->input->post('h_village');

//        echo "<pre>";
//        print_r($education_status);

    $type_member_arr = array(1 => 'mother', 2 => 'f_members');
    $name_member_arr = array(1 => 'full_name', 2 => 'member_full_name');
    $gender_arr = array(1 => 'm_gender', 2 => 'member_gender');
    /******************************** 6-2-om *******************************/
    $education_status_arr = array(1 => 'm_education_status_id_fk', 2 => 'member_study_case');
    /******************************** 6-2-om *******************************/
    $persons_status_arr = array(1 => 'halt_elmostafid_m', 2 => 'persons_status');
    $mob_arr = array(1 => 'm_mob', 2 => 'member_mob');
    $card_num_arr = array(1 => 'mother_national_num_fk', 2 => 'member_card_num');
    $birth_date_hijri_year_arr = array(1 => 'm_birth_date_hijri_year', 2 => 'member_birth_date_hijri_year');
    $birth_date_hijri_arr = array(1 => 'm_birth_date_hijri', 2 => 'member_birth_date_hijri');
    $cat_member_arr = array(1 => 'الام', 2 => 'الابناء');

    $conn = array();
    $conn_in = array();

    if (!empty($type_member) && ($type_member != 0)) {

        if (!empty($persons_status) && ($persons_status != 'all')) {
            $conn[$persons_status_arr[$type_member]] = $persons_status;
        }
        if (!empty($gender) && ($gender != 'all')) {
            $conn[$gender_arr[$type_member]] = $gender;
        }
        if (!empty($education_status)) {
            $conn_in[$education_status_arr[$type_member]] = array();
            for ($i = 0; $i < sizeof($education_status); $i++) {
                array_push($conn_in[$education_status_arr[$type_member]], $education_status[$i]);

            }
        }
        if (!empty($h_village)) {
            $conn_in['h_village_id_fk'] = array();
            for ($i = 0; $i < sizeof($h_village); $i++) {
                array_push($conn_in['h_village_id_fk'], $h_village[$i]);

            }
        }
        if (!empty($age_from)) {
            $age_from_year = $year_current - $age_from;
            $conn[$birth_date_hijri_year_arr[$type_member] . '<='] = $age_from_year;
        }
        if (!empty($age_to)) {
            $age_to_year = $year_current - $age_to;
            $conn[$birth_date_hijri_year_arr[$type_member] . '>='] = $age_to_year;
        }

        if (!empty($file_num)) {
            $conn['basic.file_num'] = $file_num;
        }
        if (!empty($family_cat) && ($family_cat != 'all')) {
            $conn['basic.family_cat'] = $family_cat;
        }
        if (!empty($file_stause) && ($file_stause != 'all')) {
            $conn['basic.file_status'] = $file_stause;
        }

        $this->db->select($type_member_arr[$type_member] . '.*,
        basic.file_num,basic.family_cat,basic.family_cat_name,
        basic.file_status,basic.process_title,basic.contact_mob,
        houses.h_village_id_fk')
            ->join('basic', 'basic.mother_national_num =' . $type_member_arr[$type_member] . '.mother_national_num_fk')
            ->join('houses', 'houses.mother_national_num_fk =' . $type_member_arr[$type_member] . '.mother_national_num_fk')
            ->where('final_suspend', 4)->where($conn);
        if (key_exists($education_status_arr[$type_member], $conn_in)) {
            $this->db->where_in($education_status_arr[$type_member], $conn_in[$education_status_arr[$type_member]]);
        }
        if (key_exists('h_village_id_fk', $conn_in)) {
            $this->db->where_in('h_village_id_fk', $conn_in['h_village_id_fk']);
        }
        $query = $this->db->get($type_member_arr[$type_member])->result();
//               return $query;
        //  $this->get_counts_health_state($type_member_arr[$type_member],$type_member,$conn,$disease_id_fk_arr[$type_member],$conn_in);
        $table_name = $type_member_arr[$type_member];
        $filed_name = $name_member_arr[$type_member];
        /******************************** 6-2-om *******************************/
        $filed_education_status = $education_status_arr[$type_member];
        /******************************** 6-2-om *******************************/
        $filed_gender = $gender_arr[$type_member];
        $filed_persons_status = $persons_status_arr[$type_member];
        $filed_birth_date_hijri_year = $birth_date_hijri_year_arr[$type_member];
        $filed_birth_date_hijri = $birth_date_hijri_arr[$type_member];
        $filed_mob = $mob_arr[$type_member];
        $filed_card_num = $card_num_arr[$type_member];

        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $query[$key]->name = $value->$filed_name;
                $query[$key]->mob = $value->$filed_mob;
                $query[$key]->card_num = $value->$filed_card_num;
                $query[$key]->birth_date = $value->$filed_birth_date_hijri;
                $query[$key]->h_village_title = $this->get_by('area_settings', array('id' => $value->h_village_id_fk), 'title');
                $query[$key]->cat = $cat_member_arr[$type_member];

                if ($value->$filed_gender == 1) {
                    $query[$key]->gender_title = 'ذكر';

                } else {
                    $query[$key]->gender_title = 'انثى';

                }
                /******************************** 6-2-om *******************************/
                if ((is_numeric($value->$filed_education_status))) {
                    if ($value->$filed_education_status == 0) {
                        $query[$key]->education_status_title = 'دون سن الدراسة';
                    } else {
                        $query[$key]->education_status_title = $this->get_halet_drasa($value->$filed_education_status);
                    }
                } else {
                    $halet_drasa_name="غير محدد";
                    if ($value->$filed_education_status == 'unlettered') {
                        $halet_drasa_name = 'امي';
                    } elseif ($value->$filed_education_status == 'graduate') {

                        $halet_drasa_name = 'متخرج';

                    } elseif ($value->$filed_education_status == 'read_write') {
                        $halet_drasa_name = ' يقرأو يكتب';
                    }
                    $query[$key]->education_status_title = $halet_drasa_name;
                }
                /******************************** 6-2-om *******************************/

                if (array_key_exists($value->$filed_persons_status, $persons_status_title_arr)) {
                    $query[$key]->persons_status_title = $persons_status_title_arr[$value->$filed_persons_status];
                } else {
                    $query[$key]->persons_status_title = 'غير محدد';
                }
                if (!empty($value->$filed_birth_date_hijri_year) && (is_numeric($value->$filed_birth_date_hijri_year))) {
                    $query[$key]->age = $year_current - $value->$filed_birth_date_hijri_year;
                } else {
                    $query[$key]->age = 'غير محدد';
                }

            }
//                $count_arr = $this->get_counts_health_state($type_member_arr[$type_member], $type_member, $conn, $disease_id_fk_arr[$type_member], $conn_in);
//                $return_arr = array('result' => $query, 'count' => $count_arr);

            return $query;
        }

    }

}
    
}//END CLASS 
?>
