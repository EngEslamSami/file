<?php
class Job_requests_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

//=============================================================================================================//


    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("hr_job_request");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id ;
            }
            return $data;
        }
        return  1;
    }


    public function insert()
    {


        if(!empty($_POST['dep_id_fk'])) {
            $departs = explode('-', $_POST['dep_id_fk']);
            $data['dep_id_fk'] = $departs[0];
            $data['sub_dep_id_fk'] = $departs[1];
        }
        $data['job_title_id_fk']=$this->input->post('job_title_id_fk');
        $data['num_for_job']=$this->input->post('num_for_job');
        $data['job_type']=$this->input->post('job_type');
        $data['job_natural']=$this->input->post('job_natural');
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_ar']=date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('hr_job_request',$data);



        if(!empty($_POST['details_reason'])){
            $reason =$_POST['details_reason'];
            for($x=0;$x<sizeof($reason);$x++){
                $data2['request_id_fk']= $this->select_last_id();
                $data2['details']=$reason[$x];
                $data2['type']=1;
                $this->db->insert('hr_job_request_details',$data2);

            }
        }



        if(!empty($_POST['details_job_request'])){
            $job_request =$_POST['details_job_request'];
            for($a=0;$a<sizeof($job_request);$a++){
                $data3['request_id_fk']= $this->select_last_id();
                $data3['details']=$job_request[$a];
                $data3['type']=2;
                $this->db->insert('hr_job_request_details',$data3);
            }
        }

    }
    public function update($id)
    {


        $this->db->where('request_id_fk',$id);
        $this->db->delete("hr_job_request_details");

        if(!empty($_POST['dep_id_fk'])) {
            $departs = explode('-', $_POST['dep_id_fk']);
            $data['dep_id_fk'] = $departs[0];
            $data['sub_dep_id_fk'] = $departs[1];
        }
        $data['job_title_id_fk']=$this->input->post('job_title_id_fk');
        $data['num_for_job']=$this->input->post('num_for_job');
        $data['job_type']=$this->input->post('job_type');
        $data['job_natural']=$this->input->post('job_natural');

        $this->db->where('id', $id);
        $this->db->update('hr_job_request', $data);



        if(!empty($_POST['details_reason'])){
            $reason =$_POST['details_reason'];
            for($x=0;$x<sizeof($reason);$x++){
                $data2['request_id_fk']= $id;
                $data2['details']=$reason[$x];
                $data2['type']=1;
                $this->db->insert('hr_job_request_details',$data2);

            }
        }



        if(!empty($_POST['details_job_request'])){
            $job_request =$_POST['details_job_request'];
            for($a=0;$a<sizeof($job_request);$a++){
                $data3['request_id_fk']= $id;
                $data3['details']=$job_request[$a];
                $data3['type']=2;
                $this->db->insert('hr_job_request_details',$data3);
            }
        }
    }
//=============================================================================================================//

    public function select_depart(){
        $this->db->select('id,administration,department');
        $this->db->from('employees');
        $this->db->where("id", $_SESSION['emp_code']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
            $a++;}
            return $arr[0];
        }else{
            return 0;
        }
    }


    public function  getName($id)
    {
        $this->db->select('id,name');
        $this->db->from('department_jobs');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->name;
        }else{
            return 0;
        }

    }


    public function select_all_defined($type){
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type",$type);
        $this->db->order_by('in_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }


    public function select_forms_settings($type){
        $this->db->order_by("in_order", "asc");
        $this->db->where("type", $type);
        $query =  $this->db->get("hr_forms_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }

    }


    public function get_all($id)
    {
      if(!empty($id)){
          $this->db->where('id',$id);

      }
        $this->db->order_by('id','desc');
        $query= $this->db->get('hr_job_request');
        if($query->num_rows()>0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->management = $this->get_from_job_department($row->dep_id_fk);
                $data[$x]->department = $this->get_from_job_department($row->sub_dep_id_fk);
                $data[$x]->job_name = $this->get_from_all_defined_setting($row->job_title_id_fk);
                $data[$x]->reason = $this->get_from_hr_job_request_details($row->id, 1);
                $data[$x]->requires = $this->get_from_hr_job_request_details($row->id, 2);


                $x++;

            }
            return $data;
        }else{
            return false;
        }

    }
    public function get_from_hr_job_request_details($id,$type)
    {
        $arr=array('request_id_fk'=>$id,'type'=>$type);
        $this->db->where($arr);
        $query=$this->db->get('hr_job_request_details');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
    public function get_from_job_department($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('department_jobs');
        if($query->num_rows()>0)
        {
            return $query->row()->name;
        }else{
            return false;
        }
    }
    public function get_from_all_defined_setting($id){
        $this->db->select('defined_title');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_id",$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title ;
        }
        return false;
    }

    public function Deletejob_request($id){
        $this->db->where('id',$id);
        $this->db->delete("hr_job_request");
        $this->db->where('request_id_fk',$id);
        $this->db->delete("hr_job_request_details");
    }



    /*************************************************************25-9-2018*************************************************/
    public function select_employees_settings($type){
        $this->db->order_by("in_order", "asc");
        $this->db->where("type", $type);
        $query =  $this->db->get("employees_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }

    }


    public function select_all($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }else{
            return 0;
        }
    }


    public function insert_main_data($file){
        if(!empty($file)) {
            $data['national_num_img']=$file;
        }
        $data['national_num']=$this->input->post('national_num');
        $data['gender_id_fk']=$this->input->post('gender_id_fk');
        $data['nationality_id_fk']=$this->input->post('nationality_id_fk');
        $data['name']=$this->input->post('name');
        $data['date_birth']=$this->input->post('date_birth');
        $data['place_birth']=$this->input->post('place_birth');
        $data['social_status']=$this->input->post('social_status');
        $data['city']=$this->input->post('city');
        $data['hai']=$this->input->post('hai');
        $data['job_request_id_fk']=$this->input->post('job_request_id_fk');
        $data['mob']=$this->input->post('mob');
        $data['email']=$this->input->post('email');
        $data['method_reached']=$this->input->post('method_reached');
        $data['previous_request']=$this->input->post('previous_request');
        $data['previous_request_date']=$this->input->post('previous_request_date');
        $data['know_person_in_charity']=$this->input->post('know_person_in_charity');
        $data['work_now']=$this->input->post('work_now');
        $data['date_start_work']=$this->input->post('date_start_work');
        $this->db->insert('job_request_orders',$data);
    }



    /**************************************************************************************************/
    public function insert_previous_work()
    {
        if(!empty($this->input->post('company_name'))) {
            $count = count($this->input->post('company_name'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(5);
                $data['company_name']=$this->input->post('company_name')[$i];

                $data['job_id_title_fk']=$this->input->post('job_id_title_fk')[$i];

                $data['date_from']=$this->input->post('date_from')[$i];
                $data['date_to']=$this->input->post('date_to')[$i];
                $data['job_mission']=$this->input->post('job_mission')[$i];
                $data['salary']=$this->input->post('salary')[$i];
                $data['leave_work_reason']=$this->input->post('leave_work_reason')[$i];
                $this->db->insert(' hr_previous_work_job_orders',$data);
            }
        }
    }
    public function insert_hopies_skills()
    {
        if(!empty($this->input->post('name'))) {
            $count = count($this->input->post('name'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(5);

                $data['name']=$this->input->post('name')[$i];
                $data['details']=$this->input->post('details')[$i];
                $data['efficiency_id_fk']=$this->input->post('efficiency_id_fk')[$i];
                $this->db->insert('hr_skills_job_orders',$data);
            }
        }
    }
    public function insert_persons_job()
    {
        if(!empty($this->input->post('job'))) {
            $count = count($this->input->post('job'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(5);

                $data['job']=$this->input->post('job')[$i];
                $data['job_name']=$this->input->post('job_name')[$i];
                $data['job_place']=$this->input->post('job_place')[$i];
                $data['mob']=$this->input->post('mob')[$i];
                $this->db->insert('hr_persons_job_orders',$data);
            }
        }
    }



    private function set_upload_options($folder = "images")
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }
    public function insert_science_data($files){
        if(!empty($files)){
        $cpt =count($files);
            for($i=0; $i<$cpt; $i++) {
                $data['job_request_ordered_fk']=$this->uri->segment(5);
                $data['degree_id_fk']=$this->input->post('degree_id_fk')[$i];
                $data['qualification_id_fk']=$this->input->post('qualification_id_fk')[$i];
                $data['school']=$this->input->post('school')[$i];
                $data['specialied']=$this->input->post('specialied')[$i];
                $data['year']=$this->input->post('year')[$i];
                $data['taqder']=$this->input->post('taqder')[$i];
                if(!empty($files[$i])) {
                    $data['img'] = $files[$i];
                }
                $this->db->insert('hr_qualification_job_orders',$data);

        }
        }
    }

    public function insert_dawrat_data($files)
    {
        if(!empty($files)){
            $cpt =count($files);
            for($i=0; $i<$cpt; $i++) {
                $data['job_request_ordered_fk'] = $this->uri->segment(5);
                $data['dawra'] = $this->input->post('dawra')[$i];
                $data['place'] = $this->input->post('place')[$i];
                $data['date_from'] = $this->input->post('date_from')[$i];
                $data['date_to'] = $this->input->post('date_to')[$i];
                $data['specialized'] = $this->input->post('specialized')[$i];
                if (!empty($files[$i])) {
                    $data['img'] = $files[$i];
                }
                $this->db->insert('hr_dwrat_job_orders', $data);
            }
        }
    }
/*****************************************************************/

public function get_all_vacation()
{
    $arr=array('suspend'=>4,'back_in_time'=>0);
    $this->db->where($arr);
    $query=$this->db->get('hr_vacation_orders');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach ($query->result() as $row){
            $data[$x]=$row;
            $data[$x]->emp=$this->select_depart_with_out_session($row->emp_id_fk)->employee;
          $data[$x]->emp_code=$this->select_depart_with_out_session($row->emp_id_fk)->emp_code;
          $data[$x]->badl_emp=$this->select_depart_with_out_session($row->emp_badel_id_fk)->employee;
           $data[$x]->vacation_name=$this->holiday($row->vacation_type_id_fk);
          $data[$x]->management=$this->select_depart_with_out_session($row->emp_id_fk)->administration_name;
          $data[$x]->department=$this->select_depart_with_out_session($row->emp_id_fk)->departments_name;
          $data[$x]->job_name=$this->get_from_all_defined_setting($this->select_depart($row->emp_id_fk)->degree_id);
            $x++;
        }
        return $data;
    }else
    {
        return 0;
    }
}
    public function select_depart_with_out_session($id){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
                $a++;}
            return $arr[0];
        }else{
            return 0;
        }
    }

    public function  update_start($id,$reason,$num_day)
   {
      $this->db->where('id',$id);
       if($num_day>0){

           $data['reason']=$reason;
           $data['back_in_time']=2;
           $data['delay_num_days']=$num_day;

       }elseif($num_day==0){
           $data['back_in_time']=1;
           $data['reason']=0;
           $data['delay_num_days']=0;
       }
     $this->db->update('hr_vacation_orders',$data);
    }



}// END CLASS