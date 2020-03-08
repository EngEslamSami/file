<?php
class ALLtest extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
       
    }



       public function select_data_basic_accepted(){
        $this->db->select('file_num,mother_national_num');
        $this->db->from('basic');
        $this->db->where('suspend',4);
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
            return "·„ Ì÷«› «·«”„";
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
            return '<button type="button" class="btn btn-warning w-md m-b-5"> ≈” ﬂ„· «·»Ì«‰«  </button>
            
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
            return "·„ Ì÷«› «·«”„";
        }
    }   
    
      public function select_operation($id){
        $this->db->select('transformation_process.* ,
                          e_to.employee  as to_employee  , 
                          e_from.employee  as from_employee,
                          user_to_t.user_name  as to_user_name, 
                          user_from_t.user_name as from_user_name');
        $this->db->from('transformation_process');
        $this->db->join('users as user_to_t', 'user_to_t.user_id = transformation_process.to_id',"left");
        $this->db->join('users as user_from_t', 'user_from_t.user_id = transformation_process.from_id',"left");
        $this->db->join('employees as e_to', 'e_to.id = user_to_t.emp_code',"left");
        $this->db->join('employees as e_from', 'e_from.id = user_from_t.emp_code',"left");
        $this->db->where('family_file',$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
        public function select_transformation_lagna($id){
        $this->db->select('transformation_lagna.* ,
                           lagna_main.lagna_name     as  main_lagna_name    ,
                           lagna_approved.lagna_name as  approved_lagna_name    ,
                           users.user_name  ,
                           procedures_option_lagna.title  as procedures_option_lagna_title');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna as lagna_main', 'lagna_main.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
        $this->db->join('lagna as lagna_approved', 'lagna_approved.id_lagna = transformation_lagna.approved_lagna',"left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
        $this->db->join('users', 'users.user_id = transformation_lagna.person_transfer',"left");
        $this->db->where('transformation_lagna.mother_national_num',$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
          public function get_reason($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('files_status_operation');
        $this->db->where('mother_national_num_fk',$mother_national_num);


        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
       return $query->row()->reason;

        }else{
            return 0;
        }


    }
    
    
    
              public function gggg(){
        $this->db->select('basic.*,
                           basic.mother_national_num  as  faher_name ,
                           
                           father.f_national_id     as  father_national,
                           mother.full_name     as  mother_name,
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
        
       // $this->db->where('transformation_lagna.mother_national_num',$id);
      //  $this->db->order_by("id","DESC");
        $query = $this->db->get();
          return  $query->result();
       /* if ($query->num_rows() > 0) {
            return  $query->result();
        }*/
        return false;
    }
      
    
            public function get_gggg(){
        $this->db->select('basic.*,
                           basic.mother_national_num  as  faher_name ,
                           
                           father.f_national_id     as  father_national,
                            father.full_name as father_full_name,
                           
                           mother.full_name     as  mother_name,
                           
                           
                           mother.mother_national_card_new     as  mother_new_card,
                           
                           files_status_setting.title as process_title ,
                           files_status_setting.color as files_status_color ,
                           mother.categoriey_m as categorey
                           
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
        
               
        $this->db->order_by('file_num',"ASC");
       // $this->db->where('transformation_lagna.mother_national_num',$id);
      // $this->db->order_by("id","ASC");
        $query = $this->db->get();
         if($query->num_rows() >0){
            $data = $query->result_array(); $i =0;
            foreach ($query->result_array() as $array){
                $data[$i] =  $array;
                $data[$i]['nasebElfard'] =  $this->getNaseb($data[$i]['faher_name'],$data[$i]['categorey']);
                $i++;  }
            return $data;
        }
        return  $query->result_array();
        
        
          /*return  $query->result_array();
      
        return false;*/
    }
    
    
    
       
            public function get_gggg_filter(){
        $this->db->select('basic.*,
                           basic.mother_national_num  as  faher_name ,
                           
                           father.f_national_id     as  father_national,
                            father.full_name as father_full_name,
                           
                           mother.full_name     as  mother_name,
                           
                           
                           mother.mother_national_card_new     as  mother_new_card,
                           
                           files_status_setting.title as process_title ,
                           files_status_setting.color as files_status_color ,
                           mother.categoriey_m as categorey
                           
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
        
               
        $this->db->order_by('file_num',"ASC");
       // $this->db->where('transformation_lagna.mother_national_num',$id);
      // $this->db->order_by("id","ASC");
        $query = $this->db->get();
         if($query->num_rows() >0){
            $data = $query->result_array(); $i =0;
            foreach ($query->result_array() as $array){
                $data[$i] =  $array;
                $data[$i]['nasebElfard'] =  $this->getNaseb($data[$i]['faher_name'],$data[$i]['categorey']);
                $i++;  }
            return $data;
        }
        return  $query->result_array();
        
        
          /*return  $query->result_array();
      
        return false;*/
    }
    /*****************************************************************************************************/
      public function getNaseb($mother_national_num_fk,$categoriey_m)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $query = $this->db->get();
        if($query->num_rows() >0){
            $total_income = 0;
            $total_duties = 0;
            $count =0;
            $data = $query->result(); $i =0;
            foreach ($query->result() as $row){

                if($row->affect == 1 && $row->type ==1){
                    $total_income +=$row->value;
                }
                if($row->affect == 1 && $row->type ==2){
                    $total_duties +=$row->value;
                }

            }
            if($categoriey_m == 1  || $categoriey_m == 2 ){
                $count =  $this->sum_mosfed_in_mother($mother_national_num_fk);
            }
            $member_num =$this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
            if($member_num == 0){
                $member_num = 1;
            }
            $total = $total_income - $total_duties;
            $data['naseb'] =$total  / $member_num;
            if($data['naseb'] <= 0){
              $data['f2a'] =1;  
            }else{
               $data['f2a'] =$this->GetF2a_data($data['naseb']); 
            }
            

            return $data;

        }
        return 0;
    }


    public function sum_mosfed_in_mother($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('person_type',62);
        $this->db->where('halt_elmostafid_m',1);
        $query = $this->db->get();

        return $rowcount = $query->num_rows();


    }


    public function sum_mosfed_in_f_members($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('member_person_type',62);
        $this->db->where('halt_elmostafid_member',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
    public function GetF2a_data($value)
    {
        $this->db->select("id,title,from,to,color");
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row();

        }else{
            return 0;
        }

    }
    
   
   
   
     function get_all()
    {
        $customer = $this->db->get('basic')->result_array();
        return $customer;
    }
    
         function get_all_2()
    {
        /*
        $customer = $this->db->get('basic')->result_array();
        return $customer;*/
        
            $this->db->select('*');  
  //  $this->db->select("trn_employee.EMPLOYEE_ID,trn_employee.FIRST_NAME,trn_employee.LAST_NAME,trn_employee.EMAIL,trn_address.ADDRESS_LINE,trn_address.CITY");
  $this->db->from('basic');
  //$this->db->join('trn_address', 'trn_address.employee_id = trn_employee.employee_id');
  $query = $this->db->get();
  return $query->result_array();
    }
    

    
    
    
    
    }// END CLASS
    ?>