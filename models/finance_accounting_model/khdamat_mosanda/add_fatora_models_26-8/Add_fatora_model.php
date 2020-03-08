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

        $query = $this->db->get('family_letter_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }else{
            return false;
        }

    }

    public function insert_geha(){
        $data['title'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $this->db->insert('family_letter_setting', $data);
    }

    public function select_family_letter_setting(){

        $query = $this->db->get('family_letter_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }else{
            return false;
        }

    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('family_letter_setting');
    }


    public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('family_letter_setting');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_geah($id){


        $data['title']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('family_letter_setting',$data);
    }

    public function select_subscription_members(){

        $query = $this->db->get('subscription_members');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }else{
            return false;
        }

    }




    /**************************************/
    public function insert_subscription_members(){
        $data['title'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $this->db->insert('subscription_members', $data);
    }

    public function delete_subscription_members($id){

        $this->db->where('id',$id);
        $this->db->delete('subscription_members');
    }


    public function get_subscription_members_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('subscription_members');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_subscription_members($id){


        $data['title']= $this->input->post('title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('subscription_members',$data);
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
        $data['subscriber_name'] = $this->input->post('subscriber_name');
        $data['subscription_number'] = $this->input->post('subscription_number');
        $data['mrakz_tklfa_id_fk'] = $this->input->post('mrakz_tklfa');
        $data['mrakz_tklfa_title'] = $this->get_mrakz_tklfa_title($this->input->post('mrakz_tklfa'));
        $data['rkm_hesab'] = $this->input->post('rkm_hesab');
        $data['hesab_name'] = $this->input->post('hesab_name');
        $data['alert_time'] = $this->input->post('alert_time');
        $data['subscription_type'] = $this->input->post('subscription_type');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_s'] = time();
        $data['date_ar'] = date('Y-m-d');
        $this->db->insert('finance_support_services', $data);
    }



    public function  update($id){
        $data['geha_name'] = $this->input->post('geha_name');
        $data['subscriber_name'] = $this->input->post('subscriber_name');
        $data['subscription_number'] = $this->input->post('subscription_number');
        $data['mrakz_tklfa_id_fk'] = $this->input->post('mrakz_tklfa');
        $data['mrakz_tklfa_title'] = $this->get_mrakz_tklfa_title($this->input->post('mrakz_tklfa'));
        $data['rkm_hesab'] = $this->input->post('rkm_hesab');
        $data['hesab_name'] = $this->input->post('hesab_name');
        $data['alert_time'] = $this->input->post('alert_time');
        $data['subscription_type'] = $this->input->post('subscription_type');
        $this->db->where('id',$id);
        $this->db->update('finance_support_services', $data);
    }
    public function  Delete($id){
        $this->db->where('id',$id);
        $this->db->delete('finance_support_services');
    }


    public function getTable(){

        $query = $this->db->get('finance_support_services');
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

        $h = $this->db->get_where('finance_support_services', array('id'=>$id));
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
        $data['finance_support_services_id_fk'] 	  	   = $this->input->post('id');
        $data['title']  = $this->input->post('title');
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $data['img_type']  = $ext;
        $data['inserted_person_id']  = $_SESSION['user_id'];
        $user = $this->get_user_data2(array('users.user_id' => $_SESSION['user_id']));
        if (!empty($user)) {

            $data['inserted_person_name'] = $user->user_name;

        }

        $data['date_ar']  = date('Y-m-d');
        $this->db->insert('finance_support_services_attaches', $data);
    }

    public function get_attach($id)
    {
        $this->db->where('finance_support_services_id_fk', $id);
        $query= $this->db->get('finance_support_services_attaches');
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
        $this->db->delete('finance_support_services_attaches');
    }



    public function getLastInserted(){
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query= $this->db->get('finance_support_services');
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
        }

    }



    public function  complete_fatora(){
        $data['start_date'] = $this->input->post('start_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['release_date'] = $this->input->post('release_date');
        $data['last_date_pay'] = $this->input->post('last_date_pay');
        $data['value'] = $this->input->post('value');
        $this->db->where('id',$_POST['id']);
        $this->db->update('finance_support_services', $data);
    }
}


