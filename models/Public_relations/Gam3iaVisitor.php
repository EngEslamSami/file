<?php

class Gam3iaVisitor extends CI_Model
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
//=============================================================================================================//


    public function selectAllByType($type)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result();

            return $data;
        }
    }

   



    public function get_one_vesitor($id)
    {
        $this->db->select('*');
        $this->db->from('gam3ia_visitors');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            return $data;
        }
    }

   /* public function insertGam3iaVisitors($id)
    {
        $data['visit_date']=$this->chek_Null($this->input->post('visit_date'));

        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['fe2a']=$this->chek_Null($this->input->post('fe2a'));
        $data['purpose']=$this->chek_Null($this->input->post('purpose'));
        $data['twasol']=$this->chek_Null($this->input->post('twasol'));
        $data['elentb']=$this->chek_Null($this->input->post('elentb'));
         $data['visit_date_ar'] = $this->chek_Null($this->input->post('visit_date'));
         $data['natega_visit'] = $this->chek_Null($this->input->post('natega_visit'));   

        if($id == 0){
            $data['visit_time_start']=$this->chek_Null($this->input->post('visit_time_start'));
            $data['visit_time_end']=date("h:i:sa");
            $data['degree_id']=$this->chek_Null($this->input->post('degree_id'));
           $data['degree_name']=$this->chek_Null($this->input->post('degree_name'));
            $data['publisher'] = $_SESSION['user_id']; 
            
         $data['visit_date'] = strtotime(date("m/d/Y"));
         $data['visit_date_s'] =  time();
         $data['date_s'] = time();
            

            $this->db->insert('gam3ia_visitors',$data);
        }else{
            $this->db->where("id",$id);
            $this->db->update('gam3ia_visitors',$data);
        }

    }
*/
public function insertGam3iaVisitors($id)
    {
       // $data['visit_date']=$this->chek_Null($this->input->post('visit_date'));

        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['fe2a']=$this->chek_Null($this->input->post('fe2a'));
        $data['purpose']=$this->chek_Null($this->input->post('purpose'));
        $data['twasol']=$this->chek_Null($this->input->post('twasol'));
        $data['elentb']=$this->chek_Null($this->input->post('elentb'));
         $data['visit_date_ar'] = $this->chek_Null($this->input->post('visit_date'));
         $data['natega_visit'] = $this->chek_Null($this->input->post('natega_visit'));   

        if($id == 0){
            $data['visit_time_start']=$this->chek_Null($this->input->post('visit_time_start'));
            $data['visit_time_end']=date("h:i:sa");
            $data['degree_id']=$this->chek_Null($this->input->post('degree_id'));
           $data['degree_name']=$this->chek_Null($this->input->post('degree_name'));
            $data['publisher'] = $_SESSION['user_id']; 
            
         $data['visit_date'] = strtotime(date("Y/m/d"));
         $data['visit_date_s'] =  time();
         $data['date_s'] = time();
            // nagwa 8-1

            $data['nategaa_id_fk']=$this->chek_Null($this->input->post('nategaa_id_fk'));
            $data['purpose_id_fk']=$this->chek_Null($this->input->post('purpose_id_fk'));

            if ($this->input->post('kafel_status_fk')){
                $arr = explode('-',$this->input->post('kafel_status_fk'));
                $data['kafel_status_fk']= $arr[0];
                $data['kafel_status_n']= $arr[1];
            }
            if ($this->input->post('financial_value')){
                $data['financial_value']=$this->chek_Null($this->input->post('financial_value'));

            }
            if ($this->input->post('fe2a') !='2'){
                $data['financial_value']= null;
                $data['kafel_status_fk'] = null;
                $data['kafel_status_n'] = null ;
            }



            /*$data['date'] = strtotime(date("m/d/Y"));
            $data['date_ar'] = date("m/d/Y");
            $data['date_s'] = time();
            $data['publisher'] = $_SESSION['user_id'];*/
            $this->db->insert('gam3ia_visitors',$data);
        }else{

            $this->db->where("id",$id);
            $this->db->update('gam3ia_visitors',$data);
        }

    }


  /*  public function get_all_record()
    {
       // return $this->db->get('gam3ia_visitors')->result();
       
       
          $this->db->select('*');
        $this->db->from("gam3ia_visitors");
if($_SESSION['role_id_fk'] ==1  ){
    
}elseif($_SESSION['role_id_fk'] == 3){
   
            	$this->db->where('publisher',$_SESSION['user_id']);           
}
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
              
                $i++;
            }
            return $data;
        }
        return false;
       
       
    }
*/

	  public function get_all_record($arr ='')
    {
      
       
       
          $this->db->select('*');
        $this->db->from("gam3ia_visitors");
if($_SESSION['role_id_fk'] ==1  ){
    
}elseif($_SESSION['role_id_fk'] == 3){
   
            //	$this->db->where('publisher',$_SESSION['user_id']);           
}
 if (!empty($arr)){
     $this->db->where($arr);
 }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
              
                $i++;
            }
            return $data;
        }
        return false;
       
       
    }

    public function deleteGam3iaVisitors($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('gam3ia_visitors');
    }

/*****************************/
/*
public function get_familys_request_period($from, $to)
    {

        $this->db->select(' degree_id , degree_name ,COUNT(id) as total')->where('visit_date >=', $from);
        $this->db->where('visit_date <=', $to)->group_by('degree_id');
        $q= $this->db->get('gam3ia_visitors')->result();
        $i=0;
        $data=$dataa=array();
        foreach ($q as $row){
            if($row->degree_id != 0) {
                $data[$i] = $this->get_date_emp($row->degree_id);
                $data[$i]['tatal']=$row->total;
            }
            else{
                $dataa['name'] = $row->degree_name;
                $dataa['edara'] = "مدير على النظام";
                $dataa['dept'] = "";
                $data[$i]=$dataa;
                $data[$i]['tatal']=$row->total;
            }
            $i++;
        }
        return $data;
    }*/
    
    
    
    public function get_familys_request_period($from, $to)
{

$this->db->select(' degree_id , degree_name ,COUNT(id) as total')->where('visit_date >=', $from);
$this->db->where('visit_date <=', $to)->where('degree_id !=', 0)->group_by('degree_id');
$q= $this->db->get('gam3ia_visitors')->result();
$i=0;
$data=$dataa=array();
foreach ($q as $row){
$data[$i] = $this->get_date_emp($row->degree_id, 'employee');
$data[$i]['tatal']=$row->total;
$i++;
}
$this->db->select(' degree_id , degree_name ,COUNT(id) as total')->where('visit_date >=', $from);
$this->db->where('visit_date <=', $to)->where('degree_id', 0)->group_by('degree_name');
$q2= $this->db->get('gam3ia_visitors')->result();
foreach ($q2 as $row2){
$dataa['name'] = $row2->degree_name;
$dataa['edara'] = "مدير على النظام";
$dataa['dept'] = "";
$data[$i]=$dataa;
$data[$i]['tatal']=$row2->total;
$i++;
}
return $data;
}

    public function get_date_emp($id)
    {
        $q = $this->db->where('id', $id)->get('employees')->row();
        $data=array();
        $data['name'] = $q->employee;
        $data['edara'] = $this->get_data_emp2($q->administration);
        $data['dept'] = $this->get_data_emp2($q->department);
        return $data;

    }

    public function get_data_emp2($id)
    {
        return $this->db->where('id', $id)->get('department_jobs')->row_array()['name'];
    }
    
/*****************************************************************************************/

    //******************/////////////////////******************///////////////////******************
    public function select_employee()
    {
        $this->db->select('*');
        $this->db->from("employees");
        //   $this->db->where("administration",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i]->per = $this->get_employee_role($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function get_employee_role($emp_cod)
    {
        $this->db->select('edit,delet');
        $this->db->from("permits_gam3ia_visitor");
        $this->db->where("emp_code_fk", $emp_cod);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insert_permits_gam3ia_visitor($emp_code)
    {

        $data['emp_code_fk'] = $emp_code;
        $data['user_id_fk'] = $_SESSION['user_id'];
        if ($this->input->post("roles_edit")) {
            $data['edit'] = 1;
        }
        if ($this->input->post("roles_delet")) {
            $data['delet'] = 1;
        }
        $this->db->insert('permits_gam3ia_visitor', $data);
    }

    public function update_permits_gam3ia_visitor($emp_code)
    {

        $data['emp_code_fk'] = $emp_code;
        $data['user_id_fk'] = $_SESSION['user_id'];
        if ($this->input->post("roles_edit")) {
            $data['edit'] = 1;
        } else {
            $data['edit'] = 0;
        }
        if ($this->input->post("roles_delet")) {
            $data['delet'] = 1;
        } else {
            $data['delet'] = 0;
        }
        $this->db->where('emp_code_fk', $emp_code)->update('permits_gam3ia_visitor', $data);

    }
//******************/////////////////////******************///////////////////******************

  public function add_gam3ia_visitor_setting($type,$type_name,$fe2a_type){

        $data['title'] = $this->input->post('value');
        $data['type'] = $type;
        $data['type_name'] = $type_name;
        $data['fe2a_type'] = $fe2a_type;
        $f2at = array(1 => 'الاسر',2 => 'الكفلاء والمتبرعين', 3 => 'مؤسسات مانحة', 4 => 'المتطوعين', 5 => 'التوظيف', 6 => 'اخري');
       if (!empty($fe2a_type)){
           $data['fe2a_type_n'] = $f2at[$fe2a_type]   ;
       }
        $id = $this->input->post('row_id') ;
         if (!empty($id)){
             $data_update['title'] = $this->input->post('value');
             $this->db->where('id',$id);
             $this->db->update('gam3ia_visitor_setting', $data_update);
         } else{
             $this->db->insert('gam3ia_visitor_setting', $data);
         }

    }
  /*public function add_gam3ia_visitor_setting($type,$type_name){

        $data['title'] = $this->input->post('value');
        $data['type'] = $type;
        $data['type_name'] = $type_name;
   
        $id = $this->input->post('row_id') ;
         if (!empty($id)){
             $data_update['title'] = $this->input->post('value');
             $this->db->where('id',$id);
             $this->db->update('gam3ia_visitor_setting', $data_update);
         } else{
             $this->db->insert('gam3ia_visitor_setting', $data);
         }

    }*/
    /*
  public function add_gam3ia_visitor_setting($type,$type_name){

        $data['title'] = $this->input->post('value');
        $data['type'] = $type;
        $data['type_name'] = $type_name;
        $this->db->insert('gam3ia_visitor_setting', $data);
    }*/
    /*public function get_setting($type){

        $this->db->where('type',$type);
        $query = $this->db->get('gam3ia_visitor_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }*/
       public function get_setting($type,$fe2a_type){

        $this->db->where('type',$type);
        $this->db->where('fe2a_type',$fe2a_type);
        $query = $this->db->get('gam3ia_visitor_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    /*public function get_filter_data($from_date,$to_date,$degree_id){
        $this->db->select('*');
        $this->db->from("gam3ia_visitors");
        if($_SESSION['role_id_fk'] ==1  ){

        }elseif($_SESSION['role_id_fk'] == 3){

            $this->db->where('publisher',$_SESSION['user_id']);
        }
        if (!empty($from_date)){
            $this->db->where('visit_date >=',strtotime($from_date)) ;
        }
        if (!empty($to_date)){
            $this->db->where('visit_date <=',strtotime($to_date)) ;
        }

        if (!empty($degree_id)){
            $this->db->where('degree_id',$degree_id) ;
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {

                $i++;
            }
            return $data;
        }
        return false;
    }*/
     public function get_filter_data($from_date,$to_date,$degree_id,$fe2a){
        $this->db->select('*');
        $this->db->from("gam3ia_visitors");
        if($_SESSION['role_id_fk'] ==1  ){

        }elseif($_SESSION['role_id_fk'] == 3){

         //   $this->db->where('publisher',$_SESSION['user_id']);
        }
        if (!empty($from_date)){
            $this->db->where('visit_date >=',strtotime($from_date)) ;
        }
        if (!empty($to_date)){
            $this->db->where('visit_date <=',strtotime($to_date)) ;
        }

        if (!empty($degree_id)){
            $this->db->where('degree_id',$degree_id) ;
        }
        if (!empty($fe2a)){
            $this->db->where('fe2a',$fe2a) ;
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {

                $i++;
            }
            return $data;
        }
        return false;
    }
    public function get_all_emp(){

        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    
    
 public function delete_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('gam3ia_visitor_setting');
    }
    
    
      public function get_emp_visitors(){
        $this->db->group_by('degree_id');
        $query = $this->db->get('gam3ia_visitors');

        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
  

    public function get_setting_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('gam3ia_visitor_setting');

        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }
}
?>