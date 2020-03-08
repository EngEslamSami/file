<?php
class NewRegister extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="area_settings";
    }

    public function insert_conditions(){
      //  $data['conditions'] = $this->input->post('conditions');
       // $data['files_request'] = $this->input->post('files_request');
     //   $data['files_accept'] = $this->input->post('files_accept');
        if (!empty($this->input->post('conditions'))) {
            $conditions = $this->input->post('conditions');
            $files_request = $this->input->post('files_request');
            $files_accept = $this->input->post('files_accept');

            for ($a = 0; $a < count($conditions); $a++) {
                $data["conditions"] = $conditions[$a];
                $data["files_request"] = $files_request[$a];
                $data["files_accept"] = $files_accept[$a];

                $this->db->insert("web_registration", $data);
            }

        }

    }

    public function display_cond(){
        $this->db->select('*');
        $this->db->from('web_registration');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('web_registration');
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
    public function select_type($type){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    //_______________

    public function fetch_attach_files_in($ids)
    {
        $this->db->select('*');
        $this->db->from('family_setting');
        $this->db->where('type', 47);
        $this->db->where_not_in('id_setting', $ids);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $data =$query->result() ;
            return $data;
        }
        return 0;
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

    public function selectByType($table,$search_key,$search_key_value,$scape){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($row->id_setting == $scape){
                    continue;
                }
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function insert_new_register($motherNum)
    {
        $data['user_name'] = $this->input->post('user_name');
        $data['web_admin']=1;
        $password = $this->input->post('user_password', true);
        $password = sha1(md5($password));
        $data['user_password'] = $password;

        $data['right_time_from'] = $this->chek_Null($this->input->post('right_time_from'));
        $data['right_time_to'] = $this->chek_Null($this->input->post('right_time_to'));
        $data['father_name'] = $this->input->post('full_name');
        $data['full_name_order'] = $this->input->post('full_name_order');
        $data['person_national_card'] = $this->input->post('person_national_card');
        $data['person_relationship'] = $this->input->post('person_relationship');
        $data['contact_mob'] = $this->input->post('contact_mob');
        $data['retirement'] = $this->chek_Null($this->input->post('retirement'));
        $data['insurance'] = $this->chek_Null($this->input->post('insurance'));
        $data['guarantee'] = $this->chek_Null($this->input->post('guarantee'));
        $data['center_id_fk'] = $this->input->post('center_id_fk');
        $data['district_id_fk'] = $this->input->post('district_id_fk');
        $data['father_national_num'] = $this->input->post('father_national_num');
        $data['mother_national_num'] = $motherNum;
        $data['register_place'] = $this->input->post('register_place');
        $data['date_registration'] = strtotime(date("Y-m-d", time()));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['order_method'] = 1;
        $data['person_response'] = 0;
        $data['publisher'] = $_SESSION['user_id'];
        $data['male_number'] = $this->input->post('male_number');
        $data['female_number'] = $this->input->post('female_number');
        $data['family_members_number'] = $this->input->post('family_members_number');
        $data['h_house_owner_id_fk'] = $this->input->post('h_house_owner_id_fk');
        $data['h_rent_amount'] = $this->chek_Null($this->input->post('h_rent_amount'));
        if ($_SESSION['role_id_fk'] == 3) {
            $data['researcher_id'] = $_SESSION['emp_code'];
        } else {
        }

//=====================================================
        /*
         *
         * insert for father data
         *
         */
        $data_f['full_name'] = $this->input->post('full_name');
        $data_f['mother_national_num_fk'] = $motherNum;
        $data_f['f_national_id'] = $this->input->post('father_national_num');
        $data['national_id_type_mother'] = $this->chek_Null($this->input->post('national_id_type'));
        $data['marital_status_id_fk_mother'] = $this->chek_Null($this->input->post('marital_status_id_fk'));

        $this->db->insert('basic', $data);
        $this->db->insert('father', $data_f);
//=====================================================
        /*
         *
         * insert for files data
         *
         */
        $data_in_action_files['mother_national_num_fk']=$motherNum;
        $data_in_action_files['process']=0;
        $data_in_action_files['process_title']= 'تقديم طلب تسجيل';
        $data_in_action_files['reason']='لا يوجد ملاحظات';
        $data_in_action_files['date']=strtotime(date("Y-m-d",time()));
        $data_in_action_files['date_s']=time();
        $data_in_action_files['date_ar']= date("Y-m-d");
        $data_in_action_files['publisher']=$_SESSION['user_id'];
        $this->db->insert('all_actions_in_family_files',$data_in_action_files);
//=====================================================
        /*
         *
         * insert for members and mother data
         *
         */
        if(!empty($_POST['member_full_name'])){
            $member_full_name =$_POST['member_full_name'];
            $member_relationship =$_POST['member_relationship'];
            $member_gender =$_POST['member_gender'];
            $member_card_num =$_POST['member_card_num'];
            $member_birth_date_hijri =$_POST['member_birth_date_hijri'];
            $categoriey_member =$_POST['categoriey_member'];
            $age =$_POST['age'];

            for ($a=0;$a<sizeof($member_full_name);$a++){
                if($member_relationship[$a] == 41){
                    $data_m['m_relationship'] = 41;
                    $data_m['mother_national_num_fk'] = $motherNum;
                    $data_m['full_name'] = $member_full_name[$a];
                    $data_m['m_birth_date_hijri'] = $this->chek_Null($member_birth_date_hijri[$a]);
                    $hijri_date=explode('/',$member_birth_date_hijri[$a]);
                    $data_m['m_birth_date_hijri_year']=$this->chek_Null($hijri_date[2]);
                    $data_m['m_card_source'] = $this->input->post('member_card_source')[$a];
                    $data_m['m_gender']= 2;
                    $data_m['categoriey_m']= 1;
                    $this->db->insert('mother',$data_m);

                } else{
                    $data['member_card_source'] = $this->input->post('m_card_source')[$a];
                    $data2['mother_national_num_fk'] = $this->chek_Null($motherNum);
                    $data2['member_full_name'] = $this->chek_Null($member_full_name[$a]);
                    $data2['member_relationship'] = $this->chek_Null($member_relationship[$a]);
                    $data2['member_gender'] = $this->chek_Null($member_gender[$a]);
                    $data2['member_card_num'] = $this->chek_Null($member_card_num[$a]);
                    $data2['member_birth_date_hijri'] = $this->chek_Null($member_birth_date_hijri[$a]);
                    $hijri_date=explode('/',$member_birth_date_hijri[$a]);
                    $data2['member_birth_date_hijri_year']=$this->chek_Null($hijri_date[2]);
                    $data2['categoriey_member'] = $this->chek_Null($categoriey_member[$a]);
                    $data2['halt_elmostafid_member'] =1;
                    $this->db->insert('f_members', $data2);
                }
            }
        }
    }


    public function insert_new_register_files($all_img, $mother_national_num)
    {
        $ids = $this->input->post('attach_files_ids');

        foreach ($all_img as $key => $value) {
            if (!empty($value)) {
                $data["mother_national_num_fk"] = $mother_national_num;
                $data["file_attach_name"] = $value;
                $data["file_attach_id_fk"] = $ids[$key];
                $this->db->insert("family_attach_files", $data);
            } else {
                continue;
            }
        }


    }


}

