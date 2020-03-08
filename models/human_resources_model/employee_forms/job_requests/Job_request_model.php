<?php
class Job_request_model extends CI_Model{

    public function get_departments(){
        $this->db->where('from_id_fk !=',0);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->edara = $this->get_edara($row->from_id_fk);
                $i++;

            }
            return $data;
        }
    }
    public function get_edara($from_id){
        $this->db->where('id',$from_id);
        return $this->db->get('department_jobs')->row()->name;

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

    public function insert_request(){
        $data['dep_id_fk']=$this->input->post('dep_id_fk');
        $data['sub_dep_id_fk']=$this->input->post('sub_dep_id_fk');
        $data['job_title_id_fk']=$this->input->post('job_title_id_fk');
        $data['num_for_job']=$this->input->post('num_for_job');
        $data['job_type']=$this->input->post('job_type');
        $data['job_natural']=$this->input->post('job_natural');
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_ar']=date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('hr_job_request',$data);
        return $this->db->insert_id();
    }

    public function update_request($id){
        $data['dep_id_fk']=$this->input->post('dep_id_fk');
        $data['sub_dep_id_fk']=$this->input->post('sub_dep_id_fk');
        $data['job_title_id_fk']=$this->input->post('job_title_id_fk');
        $data['num_for_job']=$this->input->post('num_for_job');
        $data['job_type']=$this->input->post('job_type');
        $data['job_natural']=$this->input->post('job_natural');
        $data['date']=strtotime(date('Y-m-d'));
        $data['date_ar']=date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $this->db->where('id',$id);
        $this->db->update('hr_job_request',$data);

    }

    public function add_request_details($id){
        if ($this->get_items($id,'') > 0) {
            $this->delete_all_items($id);
        }

        if (!empty($this->input->post('details_reason'))) {

            $details_reason = $this->input->post('details_reason');
            for ($a = 0; $a < count($details_reason); $a++) {

                $data["details"] = $details_reason[$a];
                $data['request_id_fk'] = $id;
                $data['type'] = 1;
                $this->db->insert("hr_job_request_details", $data);
            }
        }
        if (!empty($this->input->post('details_need'))) {

            $details_need = $this->input->post('details_need');
            for ($a = 0; $a < count($details_need); $a++) {

                $data["details"] = $details_need[$a];
                $data['request_id_fk'] = $id;
                $data['type'] = 2;
                $this->db->insert("hr_job_request_details", $data);
            }
        }
    }

    public function delete_all_items($id)
    {
        $this->db->where('request_id_fk', $id);
        $this->db->delete('hr_job_request_details');

    }

    public function get_items($id,$type)
    {
        $this->db->where('request_id_fk', $id);
        if(!empty($type)){
            $this->db->where('type',$type);
        }
        $query = $this->db->get('hr_job_request_details');
        return $query->result();
    }

    public function dispaly_requests(){

        $query = $this->db->get('hr_job_request');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
               $data[$i]->reasons = $this->get_items($row->id,1);
               $data[$i]->requests = $this->get_items($row->id,2);
               $data[$i]->job_title = $this->get_id('all_defined_setting','defined_id',$row->job_title_id_fk,'defined_title');
                $i++;

            }
            return $data;
        }

    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('hr_job_request');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->reasons = $this->get_items($row->id,1);
                $data[$i]->requests = $this->get_items($row->id,2);
                $data[$i]->job_title = $this->get_id('all_defined_setting','defined_id',$row->job_title_id_fk,'defined_title');
                $data[$i]->type_name = $this->get_id('hr_forms_settings','id_setting',$row->job_type,'title_setting');
                $data[$i]->nature_name = $this->get_id('hr_forms_settings','id_setting',$row->job_natural,'title_setting');
                $data[$i]->dept_name = $this->get_id('department_jobs','id',$row->sub_dep_id_fk,'name');
                $i++;

            }
            return $data;
        }
    }

    public function delete_request($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_job_request');
    }

    // ************************************************************************
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    public function insert_main_data($file,$personal_photo){
        if(!empty($file)) {
            $data['national_num_img']=$file;
        }
        if(!empty($personal_photo)) {
            $data['personal_photo'] =$personal_photo;
        }
        
          //  new
        $data['previous_request_date_h']=$this->chek_Null($this->input->post('previous_request_date_h'));
        $data['previous_request_date_m']=$this->chek_Null($this->input->post('previous_request_date_m'));
    // new
        $data['date_start_work_h'] =$this->chek_Null($this->input->post('date_start_work_h'));
        $data['date_start_work_m'] =$this->chek_Null($this->input->post('date_start_work_m'));

        $data['national_num']=$this->chek_Null($this->input->post('national_num'));
        $data['gender_id_fk']=$this->chek_Null($this->input->post('gender_id_fk'));
        $data['nationality_id_fk']=$this->chek_Null($this->input->post('nationality_id_fk'));
        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['date_birth']=$this->chek_Null($this->input->post('date_birth_m'));
        $data['date_birth_hijri']=$this->chek_Null($this->input->post('date_birth_h'));
        $data['place_birth']=$this->chek_Null($this->input->post('place_birth'));
        $data['social_status']=$this->chek_Null($this->input->post('social_status'));
        $data['city']=$this->chek_Null($this->input->post('city'));
        $data['hai']=$this->chek_Null($this->input->post('hai'));
        $data['job_request_id_fk']=$this->chek_Null($this->input->post('job_request_id_fk'));
        $data['job_request_id_fk']=$this->chek_Null($this->input->post('job_request_id_fk'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['email']=$this->chek_Null($this->input->post('email'));
        $data['method_reached']=$this->chek_Null($this->input->post('method_reached'));
        $data['method_reached']=$this->chek_Null($this->input->post('method_reached'));
     //   $data['previous_request']=$this->chek_Null($this->input->post('previous_request'));
     //   $data['previous_request_date']=$this->chek_Null($this->input->post('previous_request_date'));
        $data['know_person_in_charity']=$this->chek_Null($this->input->post('know_person_in_charity'));
        $data['work_now']=$this->chek_Null($this->input->post('work_now'));
     //   $data['date_start_work'] =$this->chek_Null($this->input->post('date_start_work'));
        $this->db->insert('job_request_orders',$data);
    }

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
    public function update_main_data($file,$id,$personal_photo){

        if(!empty($file)) {
            $data['national_num_img']=$file;
        }

        if(!empty($personal_photo)) {
            $data['personal_photo'] =$personal_photo;
        }
        
        
                //new
        $data['previous_request_date_h']=$this->chek_Null($this->input->post('previous_request_date_h'));
        $data['previous_request_date_m']=$this->chek_Null($this->input->post('previous_request_date_m'));
       
    //   new
        $data['date_start_work_h'] = $this->chek_Null($this->input->post('date_start_work_h'));
        $data['date_start_work_m'] = $this->chek_Null($this->input->post('date_start_work_m'));
        

        $data['national_num']=$this->chek_Null($this->input->post('national_num'));
        $data['gender_id_fk']=$this->chek_Null($this->input->post('gender_id_fk'));
        $data['nationality_id_fk']=$this->chek_Null($this->input->post('nationality_id_fk'));
        $data['name']=$this->chek_Null($this->input->post('name'));
        $data['date_birth']=$this->chek_Null($this->input->post('date_birth_m'));
        $data['date_birth_hijri']=$this->chek_Null($this->input->post('date_birth_h'));
        $data['place_birth']=$this->chek_Null($this->input->post('place_birth'));
        $data['social_status']=$this->chek_Null($this->input->post('social_status'));
        $data['city']=$this->chek_Null($this->input->post('city'));
        $data['hai']=$this->chek_Null($this->input->post('hai'));
        $data['job_request_id_fk']=$this->chek_Null($this->input->post('job_request_id_fk'));
      //  $data['job_name_other']=$this->chek_Null($this->input->post('job_name_other'));
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['email']=$this->chek_Null($this->input->post('email'));
        $data['method_reached']=$this->chek_Null($this->input->post('method_reached'));
        $data['method_reached_other']=$this->chek_Null($this->input->post('method_reached_other'));
     //   $data['previous_request']=$this->chek_Null($this->input->post('previous_request'));
      //  $data['previous_request_date']=$this->chek_Null($this->input->post('previous_request_date'));
        $data['know_person_in_charity']=$this->chek_Null($this->input->post('know_person_in_charity'));
        $data['work_now']=$this->chek_Null($this->input->post('work_now'));
    //    $data['date_start_work'] = $this->chek_Null($this->input->post('date_start_work'));
        $this->db->where('id', $id);
        $this->db->update('job_request_orders', $data);
    }

    public function getMaindataById($id){
        $h = $this->db->get_where("job_request_orders", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array();
        }else{
            return 0;
        }
    }
    public function Delete_application($id){
        $delete_arr =array('job_request_orders','hr_previous_work_job_orders','hr_skills_job_orders','hr_persons_job_orders','hr_qualification_job_orders','hr_dwrat_job_orders');
        foreach ($delete_arr as $table){
            if($table ==='job_request_orders'){
                $this->db->where('id',$id);
            }else{
                $this->db->where('job_request_ordered_fk',$id);
            }
            $this->db->delete($table);
        }
    }

    // ________________________Nagwa 8-6 ________________

    public function get_ById($id){
        $this->db->where("id", $id);
        $query=$this->db->get('job_request_orders');

        if ($query->num_rows() > 0) {
            $x=0;
            $data=array();
            foreach($query->result()as $row)
            {
                $data[$x]=$row;
                $data[$x]->job=$this->select_from_hr_forms_settings($row->job_request_id_fk);
                $data[$x]->nationality=$this->select_from_hr_forms_settings($row->nationality_id_fk);
                $data[$x]->social=$this->select_from_hr_forms_settings($row->social_status);
                $data[$x]->work_only=$this->select_from($row->id);
                $data[$x]->job_title = $this->get_job($row->job_request_id_fk);

                $x++;
                return $data;

            }
        }else{
            return 0;
        }
    }
    public function select_from_hr_forms_settings($id)
    {
        $this->db->where("id_setting", $id);
        $query = $this->db->get("hr_forms_settings");
        if ($query->num_rows() > 0) {

            return $query->row()->title_setting;
        } else {
            return 0;
        }
    }
    public function select_from($id)
    {
        $this->db->where("job_request_ordered_fk", $id);
        $this->db->where('date_to>=',date('Y-m-d'));
        $query = $this->db->get("hr_previous_work_job_orders");
        if ($query->num_rows() > 0) {

            return $query->row()->company_name;
        } else {
            return 0;
        }
    }
    public function delete_rec($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("hr_interview_degree_adv_disadv");
    }
    public function get_degrees_from_tables($id)
    {
        $this->db->select('item_degree');
        $this->db->where("job_request_ordered_fk", $id);
        $query = $this->db->get("hr_interview_degree");
        if ($query->num_rows() > 0) {

            $dtata=array();
            $x=0;
            foreach ($query->result() as $row){
                $data[]=$row->item_degree;
                $x++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_points($id,$type)
    {
        $arr=array('job_request_ordered_fk'=>$id,'type'=>$type);
        $this->db->where($arr);
        $query = $this->db->get("hr_interview_degree_adv_disadv");
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
            return false;
        }
    }
    public function insert_file($id)
    {

        if(!empty($this->input->post('item_degree'))) {
            $this->db->where('job_request_ordered_fk',$id);
            $this->db->delete('hr_interview_degree');
            $count = count($this->input->post('item_degree'));
            for($i=0;$i<$count;$i++)
            {

                $data['job_request_ordered_fk']=$this->chek_Null($id);
                $data['item_id_fk']=$this->chek_Null($this->input->post('item_id_fk')[$i]);
                $data['item_degree']= $this->chek_Null($this->input->post('item_degree')[$i]);
                $data['publisher']=$_SESSION['user_name'];
                $data['date']=date('Y-m-d');
                $data['date_ar']=0;
                $this->db->insert('hr_interview_degree',$data);
            }
            if(!empty($this->input->post('positive'))) {
                $arr1=array('job_request_ordered_fk'=>$id,'type'=>1);
                $this->db->where($arr1);
                $this->db->delete('hr_interview_degree_adv_disadv');
                $count1 = count($this->input->post('positive'));
                for($i=0;$i<$count1;$i++) {
                    $data1['job_request_ordered_fk']=$this->chek_Null($id);
                    $data1['title']=$this->chek_Null($this->input->post('positive')[$i]);
                    $data1['type']=1;
                    $this->db->insert('hr_interview_degree_adv_disadv',$data1);

                }
            }
            if(!empty($this->input->post('negative'))) {
                $arr2=array('job_request_ordered_fk'=>$id,'type'=>2);
                $this->db->where($arr2);
                $this->db->delete('hr_interview_degree_adv_disadv');
                $count2 = count($this->input->post('negative'));
                for($i=0;$i<$count2;$i++) {
                    $data2['job_request_ordered_fk']=$this->chek_Null($id);
                    $data2['title']=$this->chek_Null($this->input->post('negative')[$i]);
                    $data2['type']=2;
                    $this->db->insert('hr_interview_degree_adv_disadv',$data2);

                }
            }
            $data3['do_interview']=1;
            $data3['total_degree']=$this->chek_Null($this->input->post('total'));
            $this->db->where('id',$id);
            $this->db->update('job_request_orders',$data3);

        }
    }

    public function insert_offer_work($id)
    {
        $data['job_request_ordered_fk'] = $this->chek_Null($this->uri->segment(6));
        $data['salaray'] = $this->chek_Null($this->input->post('salaray'));
        $data['bdl_sakn'] = $this->chek_Null($this->input->post('bdl_sakn'));
        $data['bdl_moslat'] = $this->chek_Null($this->input->post('bdl_moslat'));
        $data['medical_insurance'] =$this->chek_Null($this->input->post('medical_insurance'));
        $data['contract_peroid'] = $this->chek_Null($this->input->post('contract_peroid'));
        $data['contract_type_fk'] = $this->chek_Null($this->input->post('contract_type_fk'));
        $data['demo_days'] = $this->chek_Null($this->input->post('demo_days'));
        $data['yearly_vacation'] = $this->chek_Null($this->input->post('yearly_vacation'));
        $data['other'] = $this->chek_Null($this->input->post('others'));
        $data['notes'] = $this->chek_Null($this->input->post('notes'));
        $data['date'] = date('Y-md');
        $data['date_ar'] = date('Y-md');
        $data['publisher'] = $_SESSION['user_name'];
        $data['suspend'] = 0;
        $data['date_suspend'] = date('Y-md');
        $data['date_suspend_ar'] = date('Y-md');

        if($this->get_num_rows($id)==0) {
            $this->db->insert('hr_job_orders_offers', $data);
        }else{
            $this->db->where("job_request_ordered_fk", $id);
            $this->db->update('hr_job_orders_offers',$data);
        }


    }

    public function get_num_rows($id)
    {
        $this->db->where("job_request_ordered_fk", $id);
        $query = $this->db->get("hr_job_orders_offers");
        return $query->num_rows();
    }

    public function get_from_table($id)
    {
        $this->db->where("job_request_ordered_fk", $id);
        $query = $this->db->get("hr_job_orders_offers");
        if ($query->num_rows() > 0) {

            return $query->row();
        } else {
            return 0;
        }
    }


    public function insert_previous_work()
    {
        if(!empty($this->input->post('company_name'))) {
            $count = count($this->input->post('company_name'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(6);
                $data['company_name']=$this->input->post('company_name')[$i];

                $data['job_id_title_fk']=$this->input->post('job_id_title_fk')[$i];

                $data['date_from']=$this->input->post('date_from')[$i];
                $data['date_to']=$this->input->post('date_to')[$i];
                $data['job_mission']=$this->input->post('job_mission')[$i];
                $data['salary']=$this->input->post('salary')[$i];
                $data['leave_work_reason']=$this->input->post('leave_work_reason')[$i];
                $this->db->insert('hr_previous_work_job_orders',$data);
            }
        }
    }

    public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public  function get_job_request_by_id($table)
    {
        $id=$this->uri->segment(6);
        $this->db->where('job_request_ordered_fk',$id);
        $query=$this->db->get($table);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function delete_from_table($id,$table)
    {
        $this->db->where('id',$id);
        $this->db->delete($table);
    }

    public function insert_science_data($files){
        if(!empty($files)){
            $cpt =count($files);
            for($i=0; $i<$cpt; $i++) {
                $data['job_request_ordered_fk']=$this->uri->segment(6);
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
                $data['job_request_ordered_fk'] = $this->uri->segment(6);
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

    public function insert_hopies_skills()
    {
        if(!empty($this->input->post('name'))) {
            $count = count($this->input->post('name'));
            for($i=0;$i<$count;$i++)
            {
                $data['job_request_ordered_fk']=$this->uri->segment(6);

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
                $data['job_request_ordered_fk']=$this->uri->segment(6);

                $data['job']=$this->input->post('job')[$i];
                $data['job_name']=$this->input->post('job_name')[$i];
                $data['job_place']=$this->input->post('job_place')[$i];
                $data['mob']=$this->input->post('mob')[$i];
                $this->db->insert('hr_persons_job_orders',$data);
            }
        }
    }
    public function update_date($id,$interview_date)
    {

        $data['determine_interview']=1;
        $data['interview_date']=$interview_date;
        $this->db->where('id',$id);
        $this->db->update('job_request_orders',$data);

    }

  public function get_by_id_print($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('job_request_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
           
                $i++;

            }
            return $data;

        }
        return 0;
    }
    public function get_by_id_prv($id)
    {
        $this->db->where('job_request_ordered_fk', $id);
        $query = $this->db->get('hr_previous_work_job_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
            
                $i++;

            }
            return $data;

        }
        return 0;
    }
    
    public function get_by_id_qua($id)
    {
        $this->db->where('job_request_ordered_fk', $id);
        $query = $this->db->get('hr_qualification_job_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             
                $i++;

            }
            return $data;

        }
        return 0;
    }
    
    public function get_by_id_dwrat($id)
    {
        $this->db->where('job_request_ordered_fk', $id);
        $query = $this->db->get('hr_dwrat_job_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             
                $i++;

            }
            return $data;

        }
        return 0;
    }
    
    public function get_by_id_skills($id)
    {
        $this->db->where('job_request_ordered_fk', $id);
        $query = $this->db->get('hr_skills_job_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
            
                $i++;

            }
            return $data;

        }
        return 0;
    }
    
    public function get_by_id_person($id)
    {
        $this->db->where('job_request_ordered_fk', $id);
        $query = $this->db->get('hr_persons_job_orders');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
           
                $i++;

            }
            return $data;

        }
        return 0;
    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }
    //yara
   
    public function get_all_jobs(){
        $this->db->where('defined_type', 4);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    //yara
    public function all_before_interview(){
        $this->db->select('*');
        $this->db->from('job_request_orders');
        $this->db->order_by('id','asc');
        $this->db->where('do_interview',0);
       
        $q = $this->db->get()->result();
       

        if (!empty($q)) {
            foreach ($q as $key => $row) {
               
                $q[$key]->job_title = $this->get_job($row->job_request_id_fk);
            }
            return $q;
        }
    }

    public function select_forms_settings_titles($type){
        $this->db->order_by("in_order", "asc");
        $this->db->where("type", $type);
        $query =  $this->db->get("hr_forms_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id_setting] = $key->title_setting;
            }
            return $data;
        }else{
            return 0;
        }

    }
    
    public function all_after_interview(){
        $this->db->select('*');
        $this->db->from('job_request_orders');
        $this->db->order_by('id','asc');
        $this->db->where('do_interview',1);
     //   $this->db->where('determine_interview',1);
        $q = $this->db->get()->result();
       

        if (!empty($q)) {
            foreach ($q as $key => $row) {
               
                $q[$key]->job_title = $this->get_job($row->job_request_id_fk);
            }
            return $q;
        }
    }
    public function select_jobs_settings(){
      //  $this->db->order_by("in_order", "asc");
     
        $q =  $this->db->get("hr_job_request")->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->dep_id_fk);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->sub_dep_id_fk);
                $q[$key]->job_title = $this->get_job_title($row->job_title_id_fk);
            }
            return $q;
        }

    }
    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }
    
    public function get_job_title($id)
    {
    
        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }
    public function get_job($id){
        //  $this->db->order_by("in_order", "asc");
       
          $q =  $this->db->where('id',$id)->get("hr_job_request")->result();
          if (!empty($q)) {
              foreach ($q as $key => $row) {
                  $q[$key]->edara = $this->get_edara_name_or_qsm($row->dep_id_fk);
                  $q[$key]->qsm = $this->get_edara_name_or_qsm($row->sub_dep_id_fk);
                  $q[$key]->job_title = $this->get_job_title($row->job_title_id_fk);
              }
              return $q;
          }
  
      }
}