<?php
// Kafala_model
class Kafala_model extends CI_Model{
    public function insert_maindata_order($id, $file)
    {

        $data['fe2a_type'] = $this->chek_Null($this->input->post('fe2a_type'));
        $data['k_num'] = $this->chek_Null($this->input->post('k_num'));
        $data['k_addres'] = $this->chek_Null($this->input->post('k_addres'));
        $data['k_name'] = $this->chek_Null($this->input->post('k_name'));
        $data['k_gender_fk'] = $this->chek_Null($this->input->post('k_gender_fk'));
        $data['k_nationality_fk'] = $this->chek_Null($this->input->post('k_nationality_fk'));
        $data['k_national_num'] = $this->chek_Null($this->input->post('k_national_num'));
        $data['k_national_type'] = $this->chek_Null($this->input->post('k_national_type'));
        $data['k_national_place'] = $this->chek_Null($this->input->post('k_national_place'));
        $data['k_city'] = $this->chek_Null($this->input->post('k_city'));
        $data['k_job_fk'] = $this->chek_Null($this->input->post('k_job_fk'));
        $data['k_job_place'] = $this->chek_Null($this->input->post('k_job_place'));
        $data['k_specialize_fk'] = $this->chek_Null($this->input->post('k_specialize_fk'));
        $data['k_barid_box'] = $this->chek_Null($this->input->post('k_barid_box'));
        $data['k_bardid_code'] = $this->chek_Null($this->input->post('k_bardid_code'));
        $data['k_fax'] = $this->chek_Null($this->input->post('k_fax'));
        $data['k_mob'] = $this->chek_Null($this->input->post('k_mob'));
        $data['k_email'] = $this->chek_Null($this->input->post('k_email'));
        $data['k_activity_fk'] = $this->chek_Null($this->input->post('k_activity_fk'));
        $data['k_message_method'] = $this->chek_Null($this->input->post('k_message_method'));
        $data['k_message_mob'] = $this->chek_Null($this->input->post('k_message_mob'));
        $data['k_notes'] = $this->chek_Null($this->input->post('k_notes'));
        $data['right_time_from'] = $this->chek_Null($this->input->post('right_time_from'));
        $data['right_time_to'] = $this->chek_Null($this->input->post('right_time_to'));


        $data['social_status_id_fk'] = $this->chek_Null($this->input->post('social_status_id_fk'));
        $data['reasons_stop_id_fk'] = $this->chek_Null($this->input->post('reasons_stop_id_fk'));
        $data['halat_kafel_id'] = $this->chek_Null($this->input->post('halat_kafel_id'));
        $data['w_name'] = $this->chek_Null($this->input->post('w_name'));
        $data['w_national_num'] = $this->chek_Null($this->input->post('w_national_num'));
        $data['w_mob'] = $this->chek_Null($this->input->post('w_mob'));
        $data['k_hai'] = $this->chek_Null($this->input->post('k_hai'));


        $data['wakel_relationship'] = $this->chek_Null($this->input->post('wakel_relationship'));
        $data['wakala_type'] = $this->chek_Null($this->input->post('wakala_type'));


        $data['work_id_fk'] = $this->chek_Null($this->input->post('work_id_fk'));


        $data['company_phone'] = $this->chek_Null($this->input->post('company_phone'));
        $data['company_gawal'] = $this->chek_Null($this->input->post('company_gawal'));
        $data['company_fax'] = $this->chek_Null($this->input->post('company_fax'));
        $data["web_register"]='1';
        $password = $this->input->post('password', true);
        $password = sha1(md5($password));
        $data['password'] = $password;
        $data['user_name'] = $this->input->post('user_name');



        if (!empty($file)) {
            $data['person_img'] = $file;

        }

        if (empty($id)) {

            $data['date'] = date('Y-m-d');
            $data['date_s'] = strtotime(date('Y-m-d'));
            $data['date_ar'] = date('Y-m-d');
            $data['publisher'] = "web";
            $this->db->insert('fr_sponsor_orders', $data);

            $last_id = $this->db->insert_id();

        } else {
            $last_id = $id;
            $this->db->where('id', $id);
            $this->db->update('fr_sponsor_orders', $data);
        }

        if ($this->input->post('member_num')) {
            $num = count($this->input->post('member_num'));
            for ($i = 0; $i < $num; $i++) {
                $data_r['kafel_id_fk'] = $last_id;
                $data_r['kafala_type'] = $this->chek_Null($this->input->post('kafala_type')[$i]);
                $data_r['member_num'] = $this->chek_Null($this->input->post('member_num')[$i]);
                $data_r['kafala_period'] = $this->chek_Null($this->input->post('kafala_period')[$i]);
                $data_r['kafala_value'] = $this->chek_Null($this->input->post('kafala_value')[$i]);
                $data_r['all_kafala_value'] = $this->chek_Null($this->input->post('all_kafala_value')[$i]);
                $data_r['pay_method'] = $this->chek_Null($this->input->post('pay_method')[$i]);

                $this->db->insert('fr_sponsor_orders_details', $data_r);
            }
        }


    }

    public function update_kafel($k_num){
        $data['k_name'] = $this->chek_Null($this->input->post('k_name'));
        $data['k_gender_fk'] = $this->chek_Null($this->input->post('k_gender_fk'));
        $data['k_nationality_fk'] = $this->chek_Null($this->input->post('k_nationality_fk'));
        $data['social_status_id_fk'] = $this->chek_Null($this->input->post('social_status_id_fk'));
        $data['k_mob'] = $this->chek_Null($this->input->post('k_mob'));
        $data['k_city'] = $this->chek_Null($this->input->post('k_city'));
        $data['k_hai'] = $this->chek_Null($this->input->post('k_hai'));
        $data['k_addres'] = $this->chek_Null($this->input->post('k_addres'));
        $data['k_specialize_fk'] = $this->chek_Null($this->input->post('k_specialize_fk'));
        $data['work_id_fk'] = $this->chek_Null($this->input->post('work_id_fk'));
        $data['k_job_fk'] = $this->chek_Null($this->input->post('k_job_fk'));
        $data['k_job_place'] = $this->chek_Null($this->input->post('k_job_place'));
        $data['k_email'] = $this->chek_Null($this->input->post('k_email'));
        $data['right_time_from'] = $this->chek_Null($this->input->post('right_time_from'));
        $data['right_time_to'] = $this->chek_Null($this->input->post('right_time_to'));

        $this->db->where('k_num',$k_num);
        $this->db->update('fr_sponsor_orders',$data);
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function select_relashion($Conditions_arr)
    {
        $this->db->select('*');
        $this->db->from("family_setting");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function all_frhk_settings($table,$typee_k)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("type", $typee_k);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
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

    public function select_areas(){
        $this->db->where('from_id_fk',0);
        $this->db->order_by("in_order", "asc");
        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;

            }
            return $data;
        }
        return false;
    }

    public function select_residentials(){
        $this->db->where('from_id_fk !=',0);

        $this->db->order_by("in_order", "asc");

        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function select_last_id()
    {
        $this->db->select_max('k_num');
        $this->db->from("fr_sponsor");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            //	return $query->result()[0]->id + 1;
            return $query->result()[0]->k_num + 1;
        } else {
            return 0;
        }
    }

    public function GetFromEmployees_settings($type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }
    public function GetFromFr_settings($type)
    {
        $this->db->select('*');
        $this->db->from('fr_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }

    public function GetFromFr_settings2($type)
    {
        $this->db->select('*');
        $this->db->from('fr_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_all_orders($k_num)
    {
        $this->db->select('fr_sponsor_orders.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
        $this->db->from('fr_sponsor_orders');
        $this->db->join('banks_settings', 'banks_settings.id=fr_sponsor_orders.bank_id_fk', 'left');
        //$this->db->where('transformed',0);
        $this->db->where('fr_sponsor_orders.k_num',$k_num);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
                //  $data[$x]->halt =  $this->get_fr_setting($row->halat_kafel_id);
                $data[$x]->halt = $this->fr_kafalat_kafel_status($row->halat_kafel_id);
                $data[$x]->reason = $this->get_fr_setting($row->reasons_stop_id_fk);
                $data[$x]->Images = $this->getImagesById($row->id);
                $data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
                $data[$x]->fe2a_title = $this->get_fe2a_type($row->fe2a_type);
                $data[$x]->details = $this->getOrderByIdDetails($row->id);
               $data[$x]->order_reciver = $this->get_user_name_submit($row->publisher);
               $data[$x]->gender = $this->get_kafel_gender($row->k_gender_fk);
               $data[$x]->nationality = $this->get_kafel_gender($row->k_nationality_fk);
               $data[$x]->social_status = $this->get_kafel_social_status('fr_settings',$row->social_status_id_fk);
               $data[$x]->k_national_type = $this->get_kafel_social_status('fr_settings',$row->k_national_type);
               $data[$x]->k_specialize_fk = $this->get_kafel_social_status('fr_settings',$row->k_specialize_fk);
               $data[$x]->wakel_relationship = $this->get_kafel_social_status('family_setting',$row->wakel_relationship);
               $data[$x]->k_job_fk = $this->get_kafel_social_status('fr_settings',$row->k_job_fk);
               $data[$x]->city = $this->kafel_areas('from_id_fk',$row->k_city);
               $data[$x]->hai = $this->kafel_areas('from_id_fk!=',$row->k_hai);

                $x++;
            }
            return $data;
        }
        return FALSE;


    }

    public function get_kafel_gender($id_setting)
    {
        $this->db->select('title_setting');
        $this->db->from('employees_settings');
        $this->db->where('id_setting', $id_setting);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return $query->row()->title_setting;
        }
        return false;
    }

    public function get_kafel_social_status($table,$value)
    {
        $this->db->select('title_setting');
        $this->db->from($table);
        $this->db->where('id_setting', $value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        }
        return false;
    }
    public function kafel_areas($from_id_fk,$value){

        $this->db->select('name');
        $this->db->from('cities');
        $this->db->where($from_id_fk,0);
        $this->db->where('id',$value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        }
        return false;
       // $this->db->where('from_id_fk',0);

        //$query =  $this->db->get("cities");
//        if ($query->num_rows() > 0) {
//            foreach ($query->result() as $key) {
//                $data[$key->id] = $key->name;
//
//            }
//            return $data;
//        }
//        return false;
    }



    public function get_fr_setting($id)
    {
        $this->db->where('id_setting', $id);
        $query = $this->db->get('fr_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return 'غير محدد';
        }
    }

    public function fr_kafalat_kafel_status($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('fr_kafalat_kafel_status');
        if ($query->num_rows() > 0) {
            return $query->row()->title;
        } else {
            return 'غير محدد';
        }
    }
    public function getImagesById($id)
    {
        $this->db->select('fr_all_attachments.*,fr_settings.*');
        $this->db->from('fr_all_attachments');
        $this->db->where('person_id', $id);
        $this->db->join('fr_settings', 'fr_settings.id_setting=fr_all_attachments.attach_id_fk', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function getkafelStatusById($id)
    {
        return $this->db->get_where('fr_kafalat_kafel_status', array('id' => $id))->row_array();
    }

    public function get_fe2a_type($fe2a_type)
    {
        $h = $this->db->get_where("fr_sponser_donors_setting", array('id' => $fe2a_type));
        return $arr = $h->row_array();

    }

    public function getOrderByIdDetails($id)
    {
        $this->db->select('*');
        $this->db->from('fr_sponsor_orders_details');
        $this->db->where('kafel_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    public function get_user_name_submit($user_id)
    {
        $this->db->select('*');
        $this->db->where("user_id",$user_id);
        $query=$this->db->get('users');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $name = $this->get_user_name_member($data->user_name);
                return $name;
            }
            elseif($data->role_id_fk == 3)
            {
                $name = $this->get_emp_name($data->emp_code);
                return $name;
            }
            elseif($data->role_id_fk == 4)
            {
                $name = $this->name_general_assembley($data->user_name);
                return $name;
            }



        }
        return false;
    }

    public function select_all($table,$grouby,$limit,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by($grouby);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getOrderById($id)
    {
        $this->db->select('*');
        $this->db->from('fr_sponsor_orders');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
                $data[$x]->details = $this->getOrderByIdDetails($row->id);
                $x++;
            }

            return $query->result();
        }
        return false;


    }

    public function GetFromGeneral_assembly_settings($type)
    {
        $this->db->select('*');
        $this->db->from('general_assembly_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }

    public function updateOrderDetails($id)
    {
        $data_r['kafala_type'] = $this->chek_Null($this->input->post('kafala_type'));
        $data_r['member_num'] = $this->chek_Null($this->input->post('member_num'));
        $data_r['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));
        $data_r['kafala_value'] = $this->chek_Null($this->input->post('kafala_value'));
        $data_r['all_kafala_value'] = $this->chek_Null($this->input->post('all_kafala_value'));
        $data_r['pay_method'] = $this->chek_Null($this->input->post('pay_method'));

        $this->db->where('id', $id);
        $this->db->update('fr_sponsor_orders_details', $data_r);
    }
    public function insertSponsorOrdersTransform($id){
        $sponser_to_insert = $this->sponserbyId($id);
        $data = array();
        foreach ($sponser_to_insert as $key=>$value){
            if($key == 'id' || $key == 'kafel_order_num'|| $key == 'transformed' || $key == 'k_num'){
                continue;
            }
            $data[$key] = $value;
        }
        $data['kafel_order_num'] = $id;
        $data['k_num'] = $this->select_last_id_basic();
        $this->db->insert('fr_sponsor',$data);
        $updateee['transformed'] = 1;
        $this->db->where('id',$id);
        $this->db->update('fr_sponsor_orders',$updateee);
    }

    public function delete_order($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fr_sponsor_orders');
        $this->db->where('kafel_id_fk', $id);
        $this->db->delete('fr_sponsor_orders_details');
    }

    public function delete_order_details($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fr_sponsor_orders_details');
    }

    public function getAhai($id){
        $this->db->where('from_id_fk',$id);
        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;

    }

    public function delete_attach($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fr_all_attachments');
    }


    public function check_login()
    {
        $email = $this->input->post('user_name');
        $pass = sha1(md5($this->input->post('password')));
        $q = $this->db->where('user_name', $email)->where('password', $pass)->get('fr_sponsor_orders')->row_array();
        if (!empty($q)) {
            return $q;
        }
    }

public function display_kafel_details($k_num){
    $this->db->where('k_num', $k_num);
    $query = $this->db->get('fr_sponsor');
    if ($query->num_rows() > 0){
        return $query->row();
    }
    else{
        return false;
    }
}


    public function select_all_kafel()
    {
        $this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
        $this->db->from('fr_sponsor');
        $this->db->join('banks_settings', 'banks_settings.id=fr_sponsor.bank_id_fk', 'left');

        //$this->db->order_by("fr_sponsor.k_num", "asc");
        if ($_SESSION['role_id_fk'] == 1) {

        } elseif ($_SESSION['role_id_fk'] == 3) {

            if ($_SESSION['user_id'] == 93 ||
                $_SESSION['user_id'] == 99 ||
                $_SESSION['user_id'] == 91 ||
                $_SESSION['user_id'] == 97 ||
                $_SESSION['user_id'] == 65 ||
                $_SESSION['user_id'] == 87 ||
                $_SESSION['user_id'] == 90
            ) {

            } else {
                $this->db->where('fr_sponsor.user_id', $_SESSION['user_id']);
            }


        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
                $data[$x]->halt = $this->fr_kafalat_kafel_status($row->halat_kafel_id);
                $data[$x]->reason = $this->get_fr_setting($row->reasons_stop_id_fk);
                $data[$x]->Images = $this->getImagesById($row->id);
                $data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
                $data[$x]->fe2a_title = $this->get_fe2a_type($row->fe2a_type);
                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }
    public function GetTitleFromFr_bnod_pills_settingByCode($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('code'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }


    public function check_sponsors($select,$k_num){
        $this->db->select($select);
        $this->db->from('fr_sponsor');
        $this->db->where('k_num',$k_num);
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->row()->$select;
        }
        else{
            return 0;
        }

    }

public function get_kafala_details($id){
    $this->db->select('*');
    $this->db->from('fr_main_kafalat_details');
    $this->db->where('first_kafel_id',$id);
    $query = $this->db->get();
    if ($query->num_rows()>0){
        return $query->row();
    }
    else{
        return false;
    }

}


    public function select_sponsors_kafalat($kafel_id)
    {
        $this->db->select('fr_main_kafalat_details.*,basic.id as basic_id,basic.file_num');
        $this->db->from('fr_main_kafalat_details');
        $this->db->join('basic', 'basic.mother_national_num =  fr_main_kafalat_details.mother_national_num_fk', "LEFT");
        $this->db->where('first_kafel_id', $kafel_id);
        //$this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->kafala_color = $this->get_kafela_name($row->kafala_type_fk)['color'];

                $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
                $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];

                if ($row->person_type == 1) {
                    $data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
                    $data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
                } elseif ($row->person_type == 2 || $row->person_type == 3) {
                    $data[$i]->person_name = $this->get_member_name($row->person_id_fk);
                    $data[$i]->person_data = $this->get_member_data($row->person_id_fk);
                }


                $data[$i]->armal_num = $this->get_armal_num($row->first_kafel_id);
                $data[$i]->aytam_num = $this->get_aytam_num($row->first_kafel_id);
                $data[$i]->mostafed_num = $this->get_mostafed_num($row->first_kafel_id);

                $data[$i]->second_kafel = $this->get_second_kafel($kafel_id, $row->person_id_fk);
                /* $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                 $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                 $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                 $data[$i]->father_national = $this->get_father_national($row->mother_national_num);*/
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function get_father_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('father');
        if ($query->num_rows() > 0) {
            return $query->row()->full_name;
        } else {
            return "غير محدد";
        }
    }

    public function get_mother_name($mother_national_num_fk)
    {
        $h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_national_num_fk));
        $arr = $h->row_array();
        return $arr['full_name'];
    }


    public function get_kafel_name($kafel_id)
    {
        $this->db->where('id', $kafel_id);
        $query = $this->db->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            return $query->row()->k_name;
        } else {
            return "غير محدد ";
        }
    }


    public function get_halet_kafela($halet_kafala)
    {
        $h = $this->db->get_where("fr_kafalat_kafel_status", array('id' => $halet_kafala));
        return $arr = $h->row_array();

    }


    public function get_kafela_name($kafala_type_fk)
    {
        $h = $this->db->get_where("fr_kafalat_types_setting", array('id' => $kafala_type_fk));
        return $arr = $h->row_array();

    }


    public function get_member_name($person_id_fk)
    {
        $h = $this->db->get_where("f_members", array('id' => $person_id_fk));
        $arr = $h->row_array();
        return $arr['member_full_name'];
    }


    public function get_mother_data($mother_national_num_fk)
    {
        $this->db->select('mother.mother_national_num_fk,mother.m_birth_date_hijri_year,
                        mother.m_gender,mother.m_birth_date_hijri, files_status_setting.title AS halt_elmostafid_title,files_status_setting.color AS halt_elmostafid_color');
        $this->db->from("mother");
        $this->db->where("mother.mother_national_num_fk", $mother_national_num_fk);
        $this->db->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data[0];
        } else {
            return 0;
        }


    }

    public function get_member_data($person_id_fk)
    {
        $this->db->select('f_members.id,f_members.member_gender,f_members.member_birth_date_hijri,f_members.member_birth_date_hijri_year,  files_status_setting.title AS halt_elmostafid_title,files_status_setting.color AS halt_elmostafid_color');
        $this->db->from("f_members");
        $this->db->where("f_members.id", $person_id_fk);
        $this->db->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data[0];
        } else {
            return 0;
        }
    }

    public function get_armal_num($kafel_id)
    {
        $this->db->select('id,first_value');
        $this->db->from("fr_main_kafalat_details");
        $this->db->where("first_kafel_id", $kafel_id);
        $this->db->where("person_type ", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = 0;
            foreach ($query->result() as $row) {
                $total += $row->first_value;
            }
            $data['num'] = $query->num_rows();
            $data['total'] = $total;
            return $data;
        } else {
            return 0;
        }
    }

    public function get_aytam_num($kafel_id)
    {
        $this->db->select('id,first_value');
        $this->db->from("fr_main_kafalat_details");
        $this->db->where("first_kafel_id", $kafel_id);
        $this->db->where("person_type ", 2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = 0;
            foreach ($query->result() as $row) {
                $total += $row->first_value;

            }
            $data['num'] = $query->num_rows();
            $data['total'] = $total;
            return $data;
        } else {
            return 0;
        }

    }


    public function get_mostafed_num($kafel_id)
    {
        $this->db->select('id,first_value');
        $this->db->from("fr_main_kafalat_details");
        $this->db->where("first_kafel_id", $kafel_id);
        $this->db->where("person_type ", 3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = 0;
            foreach ($query->result() as $row) {
                $total += $row->first_value;

            }
            $data['num'] = $query->num_rows();
            $data['total'] = $total;
            return $data;
        } else {
            return 0;
        }

    }

    public function get_second_kafel($kafel, $person)
    {
        $data_now = date("Y-m-d");
        $data_now = strtotime($data_now);
        $this->db->where('person_id_fk', $person);
        $this->db->where('first_kafel_id!=', $kafel);
        $this->db->where('first_date_from <=', $data_now);
        $this->db->where('first_date_to >=', $data_now);
        $query = $this->db->get('fr_main_kafalat_details');
        if ($query->num_rows() > 0) {

            //return $this->get_kafel_name($query->row()->first_kafel_id);
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->get_kafel_name($query->row()->first_kafel_id);
                $x++;
            }
            return $data[0];

        } else {
            return false;
        }


    }





    public function get_all_sponsers(){
        $this->db->select("fr_sponsor.k_name,fr_all_pills.person_id_fk,fr_sponsor.id");
        //$this->db->select('k_name');
        $this->db->from('fr_sponsor');
        //$this->db->where('id',$id);
        $this->db->join('fr_all_pills','fr_all_pills.person_id_fk=fr_sponsor.id');
        $this->db->group_by('fr_all_pills.person_id_fk');
        $query =$this->db->get();
        if ($query->num_rows()>0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->count = $this->get_count($row->id);
                //	$data[$i]->details = $this->get_all_pill($row->id);
                $i++;
            }
            return $data;

        }
        else{
            return false;
        }
    }

    public function get_count($id){
        $this->db->select('person_id_fk');
        $this->db->from('fr_all_pills');
        $this->db->where('person_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows()>0){
            return $query->num_rows();
        }
        else{
            return false;
        }
    }

    public function get_all_pill($id){
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->where('person_id_fk',$id);
        $this->db->where('person_type',1);
        $query= $this->db->get();
        if ($query->num_rows()>0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $data[$i]->pill_type_title =  $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);
                $data[$i]->band_title =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);

                $i++;
            }
            return $data ;
        }
        else{
            return false;
        }
    }

    public function GetTitleFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('from_id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }

    public function insert_kafalt($id){
        if ($this->input->post('member_num')) {
            $num = count($this->input->post('member_num'));
            for ($i = 0; $i < $num; $i++) {
                $data_r['kafel_id_fk'] = $id;
                $data_r['kafala_type'] = $this->chek_Null($this->input->post('kafala_type')[$i]);
                $data_r['member_num'] = $this->chek_Null($this->input->post('member_num')[$i]);
                $data_r['kafala_period'] = $this->chek_Null($this->input->post('kafala_period')[$i]);
                $data_r['kafala_value'] = $this->chek_Null($this->input->post('kafala_value')[$i]);
                $data_r['all_kafala_value'] = $this->chek_Null($this->input->post('all_kafala_value')[$i]);
                $data_r['pay_method'] = $this->chek_Null($this->input->post('pay_method')[$i]);

                $this->db->insert('fr_sponsor_orders_details', $data_r);
            }
        }
    }


}