<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_fatora_model extends CI_Model
{

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value==null || (!isset($post_value))) {
            $val='';
            return $val;
        } else {
            return $post_value;
        }
    }




    public function select_geha(){

        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }else{
            return false;
        }

    }

    public function insert_geha(){
        $data['name'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $this->db->insert('finance_gehat', $data);
    }

    public function select_finance_gehat(){

        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }else{
            return false;
        }

    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('finance_gehat');
    }


    public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_geah($id){


        $data['name']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('finance_gehat',$data);
    }

    public function select_finance_moshtrken(){

        $query = $this->db->get('finance_moshtrken');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }else{
            return false;
        }

    }




    /**************************************/
    public function insert_finance_moshtrken(){
        $data['name'] = $this->input->post('name');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $this->db->insert('finance_moshtrken', $data);
    }

    public function delete_finance_moshtrken($id){

        $this->db->where('id',$id);
        $this->db->delete('finance_moshtrken');
    }


    public function get_finance_moshtrken_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('finance_moshtrken');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_finance_moshtrken($id){


        $data['name']= $this->input->post('name');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('finance_moshtrken',$data);
    }

    /**************************************/


    public function diaplay_mrakz_tklfa(){
        $this->db->where('type',17);
        $this->db->order_by('in_order');
        return $this->db->get('employees_settings')->result();
    }




    public function get_mrakz_tklfa_title($id_setting){
        $h = $this->db->get_where('employees_settings', array('id_setting'=>$id_setting));
        if ($h->num_rows() >0){
            return $h->row_array()['title_setting'];
        }else{
            return false;
        }
    }



    public function getAllAccounts($where)
    {
        return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
    }




    public function  insert(){

        $data['geha_name'] = $this->input->post('geha_name');
        $data['moshtrk_name'] = $this->input->post('moshtrk_name');
        $data['moshtrk_num'] = $this->input->post('moshtrk_num');
        $data['mrakz_tklfa_id_fk'] = $this->input->post('mrakz_tklfa');
        $data['mrakz_tklfa_title'] = $this->get_mrakz_tklfa_title($this->input->post('mrakz_tklfa'));
        $data['rkm_hesab'] = $this->input->post('rkm_hesab');
        $data['hesab_name'] = $this->input->post('hesab_name');
        $data['rkm_adad'] = $this->input->post('rkm_adad');
        
        $data['alert_time'] = $this->input->post('alert_time');
        $data['fatora_esdar_date'] = $this->input->post('fatora_esdar_date');
        $data['halet_eshtrak'] = $this->input->post('halet_eshtrak');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_s'] = time();
        $data['date_ar'] = date('Y-m-d');
        $this->db->insert('finance_edaft_fatora', $data);
    }



    public function  update($id){
        $data['geha_name'] = $this->input->post('geha_name');
        $data['moshtrk_name'] = $this->input->post('moshtrk_name');
        $data['moshtrk_num'] = $this->input->post('moshtrk_num');
        $data['mrakz_tklfa_id_fk'] = $this->input->post('mrakz_tklfa');
        $data['mrakz_tklfa_title'] = $this->get_mrakz_tklfa_title($this->input->post('mrakz_tklfa'));
        $data['rkm_hesab'] = $this->input->post('rkm_hesab');
        $data['hesab_name'] = $this->input->post('hesab_name');
        $data['rkm_adad'] = $this->input->post('rkm_adad');
        $data['alert_time'] = $this->input->post('alert_time');
        $data['fatora_esdar_date'] = $this->input->post('fatora_esdar_date');
        $data['halet_eshtrak'] = $this->input->post('halet_eshtrak');
        $this->db->where('id',$id);
        $this->db->update('finance_edaft_fatora', $data);
    }
    public function  Delete($id){
        $this->db->where('id',$id);
        $this->db->delete('finance_edaft_fatora');
    }


    /*public function getTable(){

        $query = $this->db->get('finance_edaft_fatora');
        if ($query->num_rows() > 0) {
           $z=0;
           foreach ($query->result() as $row){
               $data[$z] =$row;

               $z++; }

            return  $data;
        }else{
            return false;
        }

    }*/
    
    	
    public function getTable(){

        $query = $this->db->get('finance_edaft_fatora');
        if ($query->num_rows() > 0) {
           $z=0;
           foreach ($query->result() as $row){
               $data[$z] =$row;

               $z++; }

            return  $data;
        }else{
            return false;
        }

    }

    public function getTableByID($id){

        $h = $this->db->get_where('finance_edaft_fatora', array('id'=>$id));
        if ($h->num_rows() >0){
             $h->row();
             $h->row()->attach =$this->get_attach($h->row()->id);
            return$h->row();
        }else{
            return false;
        }

    }


    public function saveFile($file){

        $data['file'] 	  	   = $file;
        $data['fatora_added_id_fk'] 	  	   = $this->input->post('id');
        $data['title']  = $this->input->post('title');
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $data['img_type']  = $ext;
        $data['publisher_id_fk']  = $_SESSION['user_id'];
        $user = $this->get_user_data2(array('users.user_id' => $_SESSION['user_id']));
        if (!empty($user)) {

            $data['publisher_name'] = $user->user_name;

        }

        $data['date_ar']  = date('Y-m-d');
        $this->db->insert('finance_edaft_fatora_morfaq', $data);
    }

    public function get_attach($id)
    {
        $this->db->where('fatora_added_id_fk', $id);
        $query= $this->db->get('finance_edaft_fatora_morfaq');
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
        }
    }



    public function get_user_data2($arr)
    {
        $this->db->select('users.*,employees.id as emp_id,employees.employee,employees.personal_photo,employees.degree_id,
        all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('users');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=users.emp_code', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function delete_attach($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('finance_edaft_fatora_morfaq');
    }



    public function getLastInserted(){
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query= $this->db->get('finance_edaft_fatora');
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
        }

    }



    public function  complete_fatora(){
        $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');
        $data['esdar_date'] = $this->input->post('esdar_date');
        $data['sadad_date'] = $this->input->post('sadad_date');
        $data['value'] = $this->input->post('value');
        $this->db->where('id',$_POST['id']);
        $this->db->update('finance_edaft_fatora', $data);
    }
    
 /****************************************************************/
 
 
 
	    public function getTableByWhere_in(){
        $this->db->select('*');
        $this->db->from('finance_edaft_fatora');
        $this->db->where_in("id",$_POST['checkInput']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }

    }

    public function get_geha_name($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('hr_egraat_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }else{
            return false;
        }
    }
    public function get_geha_emp_name($id)
    {
        $this->db->where('job_title_id_fk',$id);
        $query=$this->db->get('hr_egraat_emp_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->person_name;
        }else{
            return false;
        }
    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }
    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }

    public function insert_fatora_sdad()
    {
        $data['t_rkm']=$this->input->post('t_rkm');
        $data['total_value']=$this->input->post('total_value');
        $date=strtotime($this->input->post('t_date'));

        $data['t_date']=$date;
        $data['t_date_ar']=date("Y-m-d",$date);
        $data['debaga']=$this->input->post('debaga');
        //yara
        $data['no3_elsdad']=$this->input->post('no3_elsdad');
        $data['t_foot']=$this->input->post('t_foot');
        $data['salam']=$this->input->post('salam');
        $data['start_laqb']=$this->input->post('start_laqb');
        $data['end_laqb']=$this->input->post('end_laqb');
        //====================================================
        $data['to_geha_id_fk']=$this->input->post('to_geha_id_fk');
        $data['to_geha_name']= $this->get_geha_name($this->input->post('to_geha_id_fk'));
        $data['to_geha_emp_name_n']=$this->get_geha_emp_name($this->input->post('to_geha_id_fk'));
        $data['mawdo3']=$this->input->post('mawdo3');
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar']= date("Y-m-d");
        $data['publisher']= $_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
        $data['current_form_user_id']= $_SESSION['emp_code'];
        $data['current_form_user_name']= $_SESSION['user_login_name'];

        $this->db->insert('finance_sadad_fatora',$data);
        return $this->db->insert_id();
    }



    public function insert_fatora_details_sdad($id,$rkm)
    {

        $count=0;
        if($this->input->post('f_markz_taklfa_id_fk') && !empty($this->input->post('f_markz_taklfa_id_fk'))){
            $count=count($this->input->post('f_markz_taklfa_id_fk'));
            for($x=0; $x<$count ; $x++)
            {
                $data['t_rkm_id_fk']=$id;
                $data['t_rkm_fk']=$rkm;
                $data['f_value']=$this->input->post('f_value')[$x];
                $data['f_geha_name']=$this->input->post('f_geha_name')[$x];
                $data['f_geha_id_fk']=$this->get_geha_by_name($this->input->post('f_geha_name')[$x]);
                $data['f_markz_taklfa_id_fk']=$this->input->post('f_markz_taklfa_id_fk')[$x];
                $data['rkm_fatora']=$this->input->post('rkm_fatora')[$x];
                $data['byan']=$this->input->post('byan')[$x];
                $date=strtotime($this->input->post('date')[$x]);
                $data['date']=$date;
                $data['date_ar']=date("Y-m-d",$date);


                $this->db->insert('finance_sadad_fatora_details',$data);
            }
        }
    }
	

    
}


