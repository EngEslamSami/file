<?php


class Father extends CI_Model
{
  
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
//---------------------------------------------------
  /*  public  function  insert($national_mother)
    {
        $data['mother_national_num_fk']=$national_mother;
      
      
     
      $data['full_name']=$this->input->post('full_name');
        $data['f_nationality_id_fk']=$this->input->post('f_nationality_id_fk');
        $data['nationality_other']=$this->input->post('nationality_other');
        $data['f_national_id_type']=$this->input->post('f_national_id_type');
        $data['f_national_id']=$this->input->post('f_national_id');
      
        $data['f_birth_date']=strtotime($this->input->post('f_birth_date'));
        $data['f_death_date']=strtotime($this->input->post('f_death_date'));
        $data['f_job']=$this->input->post('f_job');
        $data['f_job_place']=$this->input->post('f_job_place');
        $data['f_death_id_fk']=$this->input->post('f_death_id_fk');
     
        $data['f_death_reason']=$this->input->post('f_death_reason');
        $data['f_child_num']=$this->input->post('f_child_num');
        $data['f_wive_count']=$this->input->post('f_wive_count');
     
        $data['f_death_reason_fk']=$this->chek_Null($this->input->post('f_death_reason_fk'));

$gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
$gregorian_date=implode('/',$gregorian_date_arr);
$data['f_birth_date']=$gregorian_date;
$hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
$hijri_date=implode('/',$hijri_date_arr);
$data['f_birth_date_year']=$hijri_date;
$data['family_members_number']=$this->chek_Null($this->input->post('CYear'));
$data['f_birth_date_hijri_year']=$this->chek_Null( $this->input->post('HYear'));
$data['family_members_number']=$this->chek_Null( $this->input->post('family_members_number'));
$data['f_card_source']=$this->chek_Null( $this->input->post('f_card_source'));

     
        if($this->get_mother_national($national_mother)>0){
            $this->db->where('mother_national_num_fk',$national_mother);
            $this->db->update('father',$data);
        }else {
            $this->db->insert('father',$data);
        }

    }*/
    
        public  function  insert($national_mother)
        {
            
            
            /**********************************ahmed_start********************************/
            $data['f_employment_check']=$this->chek_Null( $this->input->post('f_employment_check'));
            $data['f_employees_sons_check']=$this->chek_Null( $this->input->post('f_employees_sons_check'));
            $data['f_special_needs_sons_check']=$this->chek_Null( $this->input->post('f_special_needs_sons_check'));
            $data['f_other_associations_check']=$this->chek_Null( $this->input->post('f_other_associations_check'));
        /**********************************ahmed_start********************************/
		
		
        /*****************************father_employment*****************************/
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->delete('father_employment');

            if(!empty($this->input->post('employee_job'))) {



         $job = $this->input->post('employee_job');
         $salary = $this->input->post('employee_salary');
         for ($z = 0; $z < sizeof($job); $z++) {
             $father_employment['mother_national_num_fk'] = $national_mother;
             $father_employment['job_id_fk'] = $this->chek_Null($job[$z]);
             $father_employment['salary'] = $this->chek_Null($salary[$z]);
             $this->db->insert('father_employment', $father_employment);
         }

         }
        /******************************father_employment****************************/

        /******************************employees_sons****************************/
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->delete('father_employees_sons');

         if(!empty($this->input->post('employees_son_name'))) {




             $son_name = $this->input->post('employees_son_name');
             $son_gender = $this->input->post('employees_son_gender');
             $son_id_number = $this->input->post('employees_son_id_number');
             $son_job = $this->input->post('employees_son_job');
             $son_geha = $this->input->post('employees_son_geha');
             $son_salary = $this->input->post('employees_son_salary');

             for ($z = 0; $z < sizeof($son_name); $z++) {
                 $father_employees_sons['mother_national_num_fk'] = $national_mother;
                 $father_employees_sons['employees_son_name'] = $this->chek_Null($son_name[$z]);
                 $father_employees_sons['employees_son_gender'] = $this->chek_Null($son_gender[$z]);
                 $father_employees_sons['employees_son_id_number'] = $this->chek_Null($son_id_number[$z]);
                 $father_employees_sons['employees_son_job'] = $this->chek_Null($son_job[$z]);
                 $father_employees_sons['employees_son_geha'] = $this->chek_Null($son_geha[$z]);
                 $father_employees_sons['employees_son_geha'] = $this->chek_Null($son_geha[$z]);
                 $father_employees_sons['employees_son_salary'] = $this->chek_Null($son_salary[$z]);
                 $this->db->insert('father_employees_sons', $father_employees_sons);
             }

            }

             /******************************employees_sons****************************/
             /******************************special_needs_sons****************************/
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->delete('father_special_needs_sons');


            if(!empty($this->input->post('disability_id_fk'))) {




                $name = $this->input->post('name');
                $gender = $this->input->post('gender');
                $id_number = $this->input->post('id_number');
                $disability_id_fk = $this->input->post('disability_id_fk');
                $comprehensive_rehabilitation = $this->input->post('comprehensive_rehabilitation');
                $comprehensive_rehabilitation_value = $this->input->post('comprehensive_rehabilitation_value');

                for ($z = 0; $z < sizeof($disability_id_fk); $z++) {
                    $father_special_needs_sons['mother_national_num_fk'] = $national_mother;
                    $father_special_needs_sons['name'] = $this->chek_Null($name[$z]);
                    $father_special_needs_sons['gender'] = $this->chek_Null($gender[$z]);
                    $father_special_needs_sons['id_number'] = $this->chek_Null($id_number[$z]);
                    $father_special_needs_sons['disability_id_fk'] = $this->chek_Null($disability_id_fk[$z]);
                    $father_special_needs_sons['comprehensive_rehabilitation'] = $this->chek_Null($comprehensive_rehabilitation[$z]);
                    $father_special_needs_sons['comprehensive_rehabilitation_value'] = $this->chek_Null($comprehensive_rehabilitation_value[$z]);
                    $this->db->insert('father_special_needs_sons', $father_special_needs_sons);
                }

            }





             /******************************special_needs_sons****************************/
             /******************************other_associations****************************/



            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->delete('father_other_associations');


            if(!empty($this->input->post('association_id_fk'))) {




                $association_id_fk = $this->input->post('association_id_fk');
                $in_kind_assistance = $this->input->post('in_kind_assistance');
                $material_assistance = $this->input->post('material_assistance');


                for ($z = 0; $z < sizeof($association_id_fk); $z++) {
                    $father_other_associations['mother_national_num_fk'] = $national_mother;
                    $father_other_associations['association_id_fk'] = $this->chek_Null($association_id_fk[$z]);
                    $father_other_associations['in_kind_assistance'] = $this->chek_Null($in_kind_assistance[$z]);
                    $father_other_associations['material_assistance'] = $this->chek_Null($material_assistance[$z]);
                    $this->db->insert('father_other_associations', $father_other_associations);
                }

            }



             /******************************other_associations****************************/
        $data['mother_national_num_fk']=$national_mother;
        $data['full_name']=$this->chek_Null($this->input->post('full_name'));
        $data['f_nationality_id_fk']=$this->chek_Null($this->input->post('f_nationality_id_fk'));
        $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['f_national_id_type']=$this->chek_Null($this->input->post('f_national_id_type'));
        $data['f_national_id']=$this->chek_Null($this->input->post('f_national_id'));
       // $data['f_birth_date']=strtotime($this->input->post('f_birth_date'));
        $data['f_death_date']=$this->chek_Null($this->input->post('f_death_date'));
        $data['f_job']=$this->chek_Null($this->input->post('f_job'));
        $data['f_job_place']=$this->chek_Null($this->input->post('f_job_place'));
        $data['f_death_id_fk']=$this->chek_Null($this->input->post('f_death_id_fk'));
        $data['f_death_reason']=$this->chek_Null($this->input->post('f_death_reason'));
        
        $data['f_child_num']=$this->chek_Null($this->input->post('male_number'));
        $data['f_female_num']=$this->chek_Null($this->input->post('female_number'));
        
        $data['f_wive_count']=$this->chek_Null($this->input->post('f_wive_count'));
        $data['f_death_reason_fk']=$this->chek_Null($this->input->post('f_death_reason_fk'));
        /**********ahmed*/
        $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
        $gregorian_date=implode('/',$gregorian_date_arr);
        $data['f_birth_date']=$gregorian_date;
        $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
        $hijri_date=implode('/',$hijri_date_arr);
        $data['f_birth_date_hijri']=$hijri_date;
        $data['f_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
        $data['f_birth_date_hijri_year']=$this->chek_Null( $this->input->post('HYear'));
        $data['family_members_number']=$this->chek_Null( $this->input->post('family_members_number'));
        $data['f_card_source']=$this->chek_Null( $this->input->post('f_card_source'));
        /**********ahmed*/
     
        if($this->get_mother_national($national_mother)>0){
            $this->db->where('mother_national_num_fk',$national_mother);
            $this->db->update('father',$data);
        }else {
            $this->db->insert('father',$data);
        }
        
        $data_basic['contact_mob'] = $this->input->post('contact_mob');
        $data_basic['contact_mob_relationship'] = $this->input->post('contact_mob_relationship');
        $this->db->where('mother_national_num',$national_mother);
        $this->db->update('basic',$data_basic);
        

    }
//--------------------------------------------------
    public function get_mother_national($national_mother)
    {
        $this->db->where('mother_national_num_fk',$national_mother);
        $query=$this->db->get('father');
        return $query->num_rows();
    }
//--------------------------------------------------
 public function getById($id){
        $h = $this->db->get_where('father', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }

//---------------------------------------------------
   /* public function update($id){

        $data['f_first_name']=$this->chek_Null($this->input->post('f_first_name'));
        $data['f_father_name']=$this->chek_Null($this->input->post('f_father_name'));
        $data['f_grandfather_name']=$this->chek_Null($this->input->post('f_grandfather_name'));
        $data['f_nationality_id_fk']=$this->chek_Null($this->input->post('f_nationality_id_fk'));
                 $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['f_national_id_type']=$this->chek_Null($this->input->post('f_national_id_type'));
        $data['f_national_id']=$this->chek_Null($this->input->post('f_national_id'));
        $data['f_national_id_place']=$this->chek_Null($this->input->post('f_national_id_place'));
        $data['f_birth_date']=$this->chek_Null(strtotime($this->input->post('f_birth_date')));
        $data['f_death_date']=$this->chek_Null(strtotime($this->input->post('f_death_date')));
        $data['f_job']=$this->chek_Null($this->input->post('f_job'));
        $data['f_job_place']=$this->chek_Null($this->input->post('f_job_place'));
        $data['f_death_id_fk']=$this->chek_Null($this->input->post('f_death_id_fk'));
        $data['f_death_reason_fk']=$this->chek_Null($this->input->post('f_death_reason_fk'));
        $data['f_death_reason']=$this->chek_Null($this->input->post('f_death_reason'));
        $data['f_child_num']=$this->chek_Null($this->input->post('f_child_num'));
        $data['f_wive_count']=$this->chek_Null($this->input->post('f_wive_count'));
        $data['f_family_name']=$this->chek_Null($this->input->post('f_family_name'));

        $this->db->where('mother_national_num_fk', $id);
        if($this->db->update('father',$data)) {
            return true;
        }else{
            return false;
        }
    }*/
//---------------------------------------------------------------
public function get_by_id($id)
{
$this->db->where('id',$id);
return $this->db->get('father')->row();	
}
  public function select_data_basic(){
        $this->db->select('*');
        $this->db->from('father');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } 
 
    public function get_by_mother($id,$table)
    {
        $this->db->where('mother_national_num_fk',$id);
        return $this->db->get($table)->row();

    }
    public function get_by_mother2($id,$table)
    {
        $this->db->where('mother_national_num_fk',$id);
        return $this->db->get($table)->row_array();

    }
    
    
    public function select_data_by_data($table,$arr){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
/***********************/

/*******************************/

  public function get_members($mother_num,$mem){

   
        $this->db->where_not_in('id', $mem);
        $this->db->where('mother_national_num_fk',$mother_num);

        $query = $this->db->get('f_members');
        if ($query->num_rows() > 0) {

            return $query->result();
        }
        return false;


    }
    public function get_member_mowazf($table){
        $q = $this->db->select('person_id_fk')->get($table)->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->person_id_fk);
            }
            return $data;
        }


    }

    public function insert_members_mowzfen($id){
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');;
        $data['person_id_fk'] = $this->input->post('person_id_fk');
        $data['person_national_num'] = $this->input->post('person_national_num');
        $data['person_n'] = $this->input->post('person_n');
        $data['person_gns'] = $this->input->post('person_gns');
        $data['person_job_fk'] = $this->input->post('person_job_fk');
        $data['person_job_n'] = $this->input->post('person_job_n');
        $data['geha_amal'] = $this->input->post('geha_amal');
        $data['salary'] = $this->input->post('salary');

        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date("Y-m-d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        if (!empty($id)){
            $this->db->where('id',$id);
            $this->db->update('f_member_mowazfen',$data);

        } else{
            $this->db->insert('f_member_mowazfen',$data);
        }

    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_mems($mother_num,$table){
        $this->db->where('mother_national_num_fk',$mother_num);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {

            return $query->result();
        }
        return false;

    }
    public function insert_members_eaqa($id){
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');;
        $data['person_id_fk'] = $this->input->post('person_id_fk');
        $data['person_national_num'] = $this->input->post('person_national_num');
        $data['person_n'] = $this->input->post('person_n');
        $data['person_gns'] = $this->input->post('person_gns');

        $data['no3_eaqa_fk'] = $this->input->post('no3_eaqa_fk');
        $data['no3_eaqa_n'] = $this->input->post('no3_eaqa_n');
        $data['tahil_shamil_status'] = $this->input->post('tahil_shamil_status');
        $data['value'] = $this->input->post('value');

        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date("Y-m-d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        if (!empty($id)){
            $this->db->where('id',$id);
            $this->db->update('f_member_special_needs',$data);

        } else{
            $this->db->insert('f_member_special_needs',$data);
        }

    }
    public function insert_emala($id){
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');;
        $data['job_title_fk'] = $this->input->post('job_title_fk');
        $data['job_title_n'] = $this->input->post('job_title_n');
        $data['salary'] = $this->input->post('salary');

        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date("Y-m-d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        if (!empty($id)){
            $this->db->where('id',$id);
            $this->db->update('family_emala',$data);

        } else{
            $this->db->insert('family_emala',$data);
        }

    }
    public function insert_qm3iat($id){
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num');;
        $data['gam3ia_id_fk'] = $this->input->post('gam3ia_id_fk');
        $data['gam3ia_n'] = $this->input->post('gam3ia_n');
        $data['no3_mos3da_fk'] = $this->input->post('no3_mos3da_fk');
        $data['mos3da_value'] = $this->input->post('mos3da_value');

        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date("Y-m-d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        if (!empty($id)){
            $this->db->where('id',$id);
            $this->db->update('family_gameiat_help',$data);

        } else{
            $this->db->insert('family_gameiat_help',$data);
        }

    }

    public function delete_members($table,$id){
        $this->db->where('id',$id);
        $this->db->delete($table);

    }

    
}// END CLASS