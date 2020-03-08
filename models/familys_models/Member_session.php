<?php

class Member_session  extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

    }

  /*  public function get_member_session()
    {
        $emp_code = $_SESSION['emp_code'];
        $this->db->where('member_id', $emp_code);
        $this->db->group_by('session_number');
        $query = $this->db->get('selected_lagna_members');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->option=$this->get_option($row->member_id);
                $data[$x]->data = $this->get_session_procedure($row->session_number);


                $x++;

            }
            return $data;
        } else {
            return 0;
        }
    } */
     public function get_member_session($Conditions_arr){
        $this->db->select('*');
        $this->db->from('selected_lagna_members');
        $this->db->group_by("session_number");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;$data= $query->result();
            $session_active=$this->chek_found_session();
            foreach ($query->result() as $row) {
                $data[$x]->data = $this->get_session_procedure($row->session_number);
                $data[$x]->session_active = $session_active;
                $data[$x]->do_action = $this->check_can_action($row->session_number);
              //  $data[$x]->galsa_member_job = $this->getByArray_job_name($row->member_type,$row->member_id);
                $x++;
            }
            return $data;
        } 
        return false ; 
    }
    //-------------------------------------------------------
     public function getByArray_job_name($type,$member_id){
        $h = $this->db->get_where("lagna_members",array("type"=>$type,"member_id"=>$member_id) );
        $data = $h->row_array();
        return $data["member_job"] ;
    }
    //-------------------------------------------------------
    public function chek_found_session(){
        $this->db->select('id');
        $this->db->from("selected_lagna_members");
        $this->db->where("finished",0);
        $this->db->where("suspend",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;    
    } 
    //-------------------------------------------------------
    public function check_can_action($session_number){
        $this->db->select('id');
        $this->db->from("selected_lagna_members");
        $this->db->where("finished",0);
        $this->db->where("suspend",1);
        $this->db->where("session_number",$session_number);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;     
    }
    
   //-------------------------------------------------------
    public function get_option($id)
    {
        $arr=array('member_id'=>$id,'suspend'=>0,'finished!='=>1);
        return $this->db->select('*')
        ->from('selected_lagna_members')
        ->where($arr)

            ->get()->num_rows();
    }

    public function get_session_procedure($session_num){
        $this->db->where('session_num_fk',$session_num);
        $this->db->group_by('procedure_id_fk');
        $query=$this->db->get('transformation_lagna');
        if($query->num_rows()>0)
        {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->decision = $this->get_decision($row->procedure_id_fk, $row->session_num_fk);
              
                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }
     
   


    public function all_sarf(){


        return $this->db->get('family_mahaders')->result();

    }
    
    
    public function get_decision($procedure, $session)
    {
         $this->db->select('transformation_lagna.* ,family_reasons_settings.title as reason_title');
         $this->db->from('transformation_lagna');
         $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
        $this->db->where(array('session_num_fk'=>$session,'procedure_id_fk'=>$procedure));
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->all_member = $this->get_member($row->mother_national_num, array(1, 2, 3)) + $this->get_mother_armla($row->mother_national_num, array(1));
                $data[$x]->armla = $this->get_member($row->mother_national_num, array(1));
                $data[$x]->armla_table_mother = $this->get_mother_armla($row->mother_national_num, array(1));
                $data[$x]->yateem = $this->get_member($row->mother_national_num, array(2));
                $data[$x]->mostafid = $this->get_member($row->mother_national_num, array(3));
                $data[$x]->father = $this->get_father_name($row->mother_national_num);
                $data[$x]->file_num = $this->get_file_num($row->mother_national_num);
                //$data[$x]->decision=$this->get_decision($row->procedure_id_fk,$row->session_num_fk);
                $x++;

            }
            return $data;

        } else {
            return false;
        }
    }


    public function get_mother_armla($mother_num, $arr)
    {
        // $arr=array(1,2,3);
        $this->db->where_in('categoriey_m', $arr);
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('mother');
        return $query->num_rows();
    }


    public function get_member($mother_num, $arr)
    {
        // $arr=array(1,2,3);
        $this->db->where_in('categoriey_member', $arr);
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('f_members');
        return $query->num_rows();
    }


    public function get_session_data($session_num)
    {
        $this->db->where('session_number', $session_num);
        $query = $this->db->get('selected_lagna_members');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function get_father_name($mother_national_num)
    {
        $this->db->where('mother_national_num_fk', $mother_national_num);
        $query = $this->db->get('father');
        if ($query->num_rows() > 0) {
            return $query->row()->full_name;
        } else {
            return false;
        }

    }

    public function get_file_num($mother_national_num)
    {
        $this->db->where('mother_national_num', $mother_national_num);
        $query = $this->db->get('basic');
        if ($query->num_rows() > 0) {
            return $query->row()->file_num;
        } else {
            return false;
        }

    }


    public function change_member_status()
    {
        $member_id=$this->input->post('member_id');
        $lagna_id=$this->input->post('lagna_id');
        $session_id=$this->input->post('session_id');
        $valu=$this->input->post('valu');
        $arr=array('member_id'=>$member_id,'session_number'=>$session_id,'lagna_number'=>$lagna_id);
        $data['member_decision']=$valu;
        $this->db->where($arr);
        $this->db->update('selected_lagna_members',$data);




    }
   /**
    *   =======================================================================================================
    * 
    *  */
    //==================================================
     public function get_session($Conditions_arr){
        $this->db->select('*');
        $this->db->from('selected_lagna_members');
        $this->db->where($Conditions_arr);
        $this->db->group_by("session_number");
        $this->db->order_by("session_number","DESC");
        $query = $this->db->get();
          if ($query->num_rows() > 0) {
         $x = 0; $data = $query->result();
            foreach ($query->result() as $row) {
                $data[$x]->members = $this->get_member_session_name($row->session_number);
                $data[$x]->type = $this->get_type($row->session_number);
              
            //    $data[$x]->band_id_fk = $this->get_type($row->session_number);
             /*   echo $data[$x]->type->type;
                echo '<pre>';
                print_r($data[$x]->type);
                die;
            */
                
                $x++;
            }
            return $data;
           } 
        return false ; 
    }
    
        public function get_type($session_num){

      $q=  $this->db->select('type,surf_num,bnod_help_fk')->where('session_num_fk',$session_num)->limit(1)->get('transformation_lagna')->result();
        return $q;
    }
    
    

    
    

    
    
    //==================================================
    public function get_member_session_name($num){ // 
        $this->db->select('member_name');
        $this->db->where('session_number',$num);
        return  $this->db->get('selected_lagna_members')->result();
    }
    //==================================================
    public function get_member_session_data($num ,$Conditions_arr){
        $this->db->select('*');
        $this->db->from('selected_lagna_members');
        $this->db->where('session_number',$num);
        $this->db->where($Conditions_arr);
         $query = $this->db->get();
           if ($query->num_rows() > 0) {
             $session_active=$this->chek_found_session();
             $data  = $query->result() ;$x=0;
               foreach ($query->result() as $row) {
                   // $data[$x]->data = $this->get_session_procedure($row->session_number);
                    $data[$x]->session_active = $session_active;
                    $data[$x]->do_action = $this->check_can_action($row->session_number);
                    $data[$x]->galsa_member_job = $this->getByArray_job_name($row->member_type,$row->member_id);
                $x++;
            }
            return $data; 
           }
         return false ; 
    }
  


 }// END CLASS 