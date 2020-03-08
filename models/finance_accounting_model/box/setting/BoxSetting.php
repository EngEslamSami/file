<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoxSetting extends CI_Model {
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || empty($post_value) ){
            return '';
        }else{
            return $post_value;
        }
    }

    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id + 1;
        }else{
            return 1;
        }
    }

    public function getAllVouchQbd(){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array();$i=0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $data[$i]->delails = $this->getdetailsById($row->rqm_sanad);
            }
            return $query->result();
        }
        return false;

    }





    public function findById($id){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd");
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->delails = $this->getdetailsById($data->rqm_sanad);

            return $data;
        }
        return false;

    }
    
     public function deleteSetting($id)
    {
        $this->db->where("id",$id);
        $this->db->delete('finance_box_setting');
    }


    public function getdetailsById($id){
        $this->db->select('*');
        $this->db->from("finance_sanad_qabd_details");
        $this->db->where("rqm_sanad_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

    public function getAllAccounts($where)
    {
        return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
    }

    public function getAccount($where)
    {
        return $this->db->where($where)->get('dalel')->row_array();
    }

    public function insert_update($id)
    {

        $data['rqm_sanad'] = $this->input->post('rqm_sanad');
        $data['date_sanad'] = $this->input->post('date_sanad');
        $data['date_sanad_ar'] = strtotime($this->input->post('date_sanad'));
        $data['pay_method'] = $this->input->post('pay_method');
        $data['recived_from'] = $this->input->post('recived_from');
        $data['about'] = $this->input->post('about');
        $data['total_value'] = $this->input->post('total_value');
        $data['sheek_num'] = $this->input->post('sheek_num');
        $data['sheek_date'] = $this->input->post('sheek_date');
        $data['sheek_date_ar'] = $this->input->post('sheek_date');
        $data['bank_id_fk'] = $this->input->post('bank_id_fk');
        $data['bank_name'] = $this->input->post('bank_name');
        //osama
        $data['type'] = $this->input->post('type');
        $data['person_name'] = $this->input->post('person_name');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['person_id_fk'] = $this->input->post('person_id_fk');
        $data['person_mob'] = $this->input->post('person_mob');
        $data['box_rqm_hesab'] = $this->input->post('box_rqm_hesab');
        $data['box_name'] = $this->input->post('box_name');

        if(empty($id)){

            $data['date'] 		  	   = date('Y-m-d');
            $data['date_s'] 	  	   = strtotime(date('Y-m-d'));
            $data['publisher'] 	  	   = $_SESSION['user_id'];
            $this->db->insert('finance_sanad_qabd',$data);
            return $this->db->insert_id();

        }else{
            $this->db->where('id', $id);
            $this->db->update('finance_sanad_qabd',$data);
            return $id;
        }

    }

    public function insert_update_datails($type)
    {
        if($this->input->post('rqm_hesab')){
            $count = count($this->input->post('rqm_hesab'));
            for ($i=0 ;$i < $count; $i++){
                $data['tawred_method'] = $this->input->post('tawred_method')[$i];
                $data['tawred_method_name'] = $this->input->post('tawred_method_name')[$i];
                $data['rqm_hesab'] = $this->input->post('rqm_hesab')[$i];
                $data['name_hesab'] = $this->input->post('name_hesab')[$i];
                $data['status'] = $this->input->post('status')[$i];
                $data['type'] = $type;
                $data['emp_type'] = $this->input->post('emp_type')[$i];
                $data['edara_name'] = $this->chek_Null($this->input->post('edara_name')[$i]);
                $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk')[$i]);
                $data['emp_id_fk'] = $this->chek_Null($this->input->post('emp_id_fk')[$i]);
                $data['emp_name'] = $this->chek_Null($this->input->post('emp_name')[$i]);


                $this->db->insert('finance_box_setting',$data);
            }
        }
    }

    public function delete($id)
    {
        $this->db->where("id",$id);
        $this->db->delete('finance_sanad_qabd');
    }


    public function delete_datails($id)
    {
        $this->db->where("type",$id);
        $this->db->delete('finance_box_setting');
    }




}

/* End of file Vouch_qbd_model.php */
/* Location: ./application/models/finance_accounting_model/box/vouch_qbd/Vouch_qbd_model.php */