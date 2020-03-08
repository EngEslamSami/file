<?php
class Register_web extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//---------------------------------------------
    public function inserted_reg(){
        $data['user_name']=$this->input->post('user_name');

        $password=$this->input->post('user_password',true);
        $password=sha1(md5($password));
        $data['user_password'] = $password;
        $data['mother_mob']=$this->input->post('mother_mob');
        $data['n_name'] = $this->input->post('user_password',true);
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place']=$this->input->post('register_place');
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();


        $data['bank_ramz']=$this->input->post('bank_ramz');
        $explode=explode("-",$this->input->post('bank_account_id'));
        $data['bank_account_id'] =$explode[0];


        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['person_account']=$this->input->post('person_account');
        $data['person_response']=0; // ����
        $data['publisher']="web_member";

        $this->db->insert('basic',$data);

    }

    public function inserted_reg_wakel(){
        $data['user_name']= $this->input->post('mother_national_num');
        $password=$this->input->post('user_password',true);
        $password=sha1(md5($password));
        $data['user_password'] = $password;
        $data['mother_mob']=$this->input->post('agent_mob');
        $data['n_name'] = $this->input->post('user_password',true);
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place']=$this->input->post('register_place');
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['person_account']=$this->input->post('person_account_wakeel');


        $data['bank_ramz']=$this->input->post('bank_ramz');
        $explode=explode("-",$this->input->post('bank_account_id'));
        $data['bank_account_id'] =$explode[0];


        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['person_account']=$this->input->post('person_account_wakeel');
        $data['person_response']=1; // ����
        $data['publisher']=$_SESSION['user_name'];

        $data['agent_name']=$this->input->post('agent_name');
        $data['agent_mob']=$this->input->post('agent_mob');
        $data['agent_card']=$this->input->post('agent_card');
        $data['agent_card_source']=$this->input->post('agent_card_source');
        $data['agent_relationship']=$this->chek_Null($this->input->post('agent_relationship'));
        $data['agent_bank_account']=$this->chek_Null($this->input->post('agent_bank_account'));


        $this->db->insert('basic',$data);
    }







    public function inserted(){
        $data['user_name']=$this->input->post('user_name');
        $password=$this->input->post('user_password',true);
        $password=sha1(md5($password));
        $data['user_password'] = $password;
        $data['mother_mob']=$this->input->post('mother_mob');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place']=$this->input->post('register_place');
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['date_suspend']=$this->input->post('date_suspend');
        $data['file_num']=$this->input->post('file_num');
        $data['file_update_date']=$this->input->post('update_date');

        $data['bank_ramz']=$this->input->post('bank_ramz');



        $explode=explode("-",$this->input->post('bank_account_id'));
        $data['bank_account_id'] =$explode[0];


        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));



        /****************ahmed*/

        $data['peroid_update']=$this->input->post('peroid_update');
        $data['person_response']=$this->input->post('person_response');
        $data['person_account']=$this->input->post('person_account');
        $data['agent_name']=$this->input->post('agent_name');
        $data['agent_card']=$this->input->post('agent_card');
        $data['agent_card_source']=$this->input->post('agent_card_source');
        $data['agent_relationship']=$this->chek_Null($this->input->post('agent_relationship'));
        $data['agent_bank_account']=$this->chek_Null($this->input->post('agent_bank_account'));
//$data['bank_account_id'] =$this->chek_Null($this->input->post('bank_account_id'));


        /****************ahmed*/



        $this->db->insert('basic',$data);
    }




    public function update_status()
    {
        $mother_num=$this->input->post('mother_national');
        $data['peroid_update']=$this->input->post('peroid_update');
        $data['date_suspend']=$this->input->post('date_suspend');
        $data['file_num']=$this->input->post('file_num');
        $data['file_update_date']=$this->input->post('update_date');
        $this->db->where('id', $mother_num);
        $this->db->update('basic',$data);

    }

    public function select_last_mother(){

        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->mother_national_num;
        }
        return false;
    }


    public function select_last_id(){

        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->id;
        }
        return false;
    }
    public function get_from_files_option_updates()
    {
        return $this->db->get('files_option_updates')->result();
    }


    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('basic')->row();
    }

    public function get_file_num()
    {
        /*  $this->db->select_max('file_num');
          $this->db->where('suspend',4);
         $query=$this->db->get('basic');


          return $query->row()->file_num;
      */

        $this->db->select_max('file_num');
        $this->db->where('suspend',4);
        $result = $this->db->get('basic')->row();

        return $result->file_num;


    }
    /*	public function get_file_num()
    {
        $this->db->select('file_num');
        $this->db->where('suspend',4);
        $this->db->order_by('id','DESC');

        return $this->db->get('basic')->row()->file_num;

    }*/
    /*
        public function get_file_num()
    {
        $this->db->select('file_num');
        $this->db->where('suspend', 4);
        $this->db->order_by('id','DESC');

        $query= $this->db->get('basic');
        if($query->num_rows()>0){
            return $query->row()->file_num;
        }else{
            return -1;
      }
    }
    */

//---------------------------------------------
    public function updated($id){

        if($this->input->post('user_password')){
            $password=$this->input->post('user_password',true);
            $password=sha1(md5($password));
            $data['user_password'] = $password;
        }else{

        }

        $data['peroid_update']=$this->input->post('peroid_update');
        /****************ahmed*/
        $data['person_response']=$this->input->post('person_response');
        $data['person_account']=$this->input->post('person_account');
        $data['agent_name']=$this->input->post('agent_name');
        $data['agent_card']=$this->input->post('agent_card');
        $data['agent_card_source']=$this->input->post('agent_card_source');
        $data['agent_relationship']=$this->input->post('agent_relationship');
        $data['agent_bank_account']=$this->input->post('agent_bank_account');
//$data['bank_account_id']=$this->input->post('bank_account_id');
        $data['date_suspend']=$this->input->post('date_suspend');
        $data['file_num']=$this->input->post('file_num');
        $data['file_update_date']=$this->input->post('update_date');

        /****************ahmed*/
        $data['bank_ramz']=$this->input->post('bank_ramz');

        $explode=explode("-",$this->input->post('bank_account_id'));
        $data['bank_account_id'] =$explode[0];


        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));




        $data['mother_national_num']=$this->input->post('mother_national_num');
        $data['user_name']=$this->input->post('user_name');
        $data['mother_mob']=$this->input->post('mother_mob');
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['publisher']=$_SESSION['user_name'];
        $this->db->where('id', $id);
        $this->db->update('basic',$data);
    }
    //--------------------------------------------
    public function update_pass($id){
        $password=$this->input->post('user_password',true);
        $password=sha1(md5($password));
        $data['user_password'] = $password;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic',$data);
    }

    //=========================================================
    public function delete($id){
        /*
          //===== basic table ======
          $this->db->where('mother_national_num',$id);
          $this->db->delete('basic');
          //===== mother table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('mother');
          //===== father table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('father');
          //===== houses table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('houses');
          //=====  f_members table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('f_members');
          //=====  financial table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('financial');
          //=====  devices table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('devices');
          //=====  family_attach_files table ======
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('family_attach_files');

          //======== researcher_opinion =========
          $this->db->where('mother_national_num_fk',$id);
          $this->db->delete('researcher_opinion');




          //====== ����� ������ =====
          //=====  electrical_device_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('electrical_device_order');

          //=====  electrical_device_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('electrical_fatora_order');

          //=====  maintenance_electrical_device_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('maintenance_electrical_device_order');

          //=====  furniture_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('furniture_order');

          //=====  furniture_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('water_fatora_order');

          //=====  cars_repairs_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('cars_repairs_order');

          //=====  home_repairs_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('home_repairs_order');

          //=====  restore_repairs_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('restore_repairs_order');

          //=====  haj_omra_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('haj_omra_order');

          //=====  health_care_orders table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('health_care_orders');

          //=====  insurance_medical_device_orders table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('insurance_medical_device_orders');

          //=====  school_supplies_order table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('school_supplies_order');

          //=====  marriage_help table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('marriage_help');

          //=====  medical_center table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('medical_center');

          //=====  electronic_card table ======
          $this->db->where('mother_national_id_fk',$id);
          $this->db->delete('electronic_card');
           */

        $update['deleted'] = 1;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic',$update);


        $dataa['mother_national_id_fk']  = $id;
        $dataa['deleted_date']         = strtotime(date("Y-m-d"));
        $dataa['deleted_date_s']       = time();  ;
        $dataa['deleted_date_ar']      = date("Y-m-d");
        $dataa['publisher']    = $_SESSION['user_id'];;

        $this->db->insert('family_deleted',$dataa);

        /********************************************/

    }

    public function uppdate_delet_basic($id){

        $update['deleted'] = 0;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic',$update);

    }



    /**
     * ===============================================================================================================
     *
     *
     *  */
    public function select_data(){
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }
    //----------------------------------------
    /* public function select_data_basic(){
           $this->db->select('*');
           $this->db->from('basic');
           $this->db->order_by('id',"ASC");
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
               foreach ($query->result() as $row) {
                   $data[] = $row;
               }
               return $data;
           }
           return false;
       } */

    public function select_data_basic(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public  function get_mother_name($mother_national_num_fk){

        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }

    //-----------------------------------------
    public function select_data_father(){
        $this->db->select('*');
        $this->db->from('father');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }
    //---------------------------------------
    public function check_regester_data(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('mother_national_num',$this->input->post('user_name'));
        $this->db->where('user_password',sha1(md5($this->input->post('user_pass'))));
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }
    //----------------------------------------
    public function family($case){
        $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
        $this->db->from('basic');
        $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
        $this->db->where("basic.suspend",$case);
        $this->db->group_by('basic.mother_national_num');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {   foreach ($query->result() as $row) {
            $data[] = $row;
        }
            return $data;
        }
        else
        {
            return false;
        }
    }


    //------------------------------------------------------------------------------
    public function all_archive(){
        $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
        $this->db->from('basic');
        $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
        $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
        $this->db->group_by('basic.mother_national_num');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {   foreach ($query->result() as $row) {
            $data[] = $row;
        }
            return $data;
        }
        else
        {
            return false;
        }
    }
    //------------------------  8-11  ---------------
    public function check_donor_regester(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where('user_name',$this->input->post('user_name'));
        $this->db->where('password',sha1(md5($this->input->post('user_pass'))));
        $this->db->where('approve',1);
        //   $this->db->where('type',$type);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }
    //-------------------------------------------------
    public function update_publisher($mother_national_num ,$publisher){
        $data['publisher'] = $publisher;
        $this->db->where('mother_national_num', $mother_national_num);
        $this->db->update('basic',$data);
    }

    /***************************************/

    public function select_data_basic_deleted(){
        $this->db->select('*');
        $this->db->from('basic');
        //   $this->db->where('suspend',4);
        $this->db->where('deleted',1);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function select_data_basic_accepted(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',4);
        $this->db->where('deleted',0);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_data_basic_notaccepted(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where(array('suspend !=' => 4));
        $this->db->where('deleted',0);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }

    /****************************************************/

    /******** ZIDAN *********************/
    public function get_all_files_status()
    {
        return $this->db->get('files_status_setting')->result();
    }
    public function change_file_setting()
    {
        $mother_id = $this->input->post('mom');
        $title = $this->input->post('title');
        $process = $this->input->post('process_id');
        $reason=$this->input->post('reason');
        /************************************/
        $data['file_status'] = $process;
        $data['process_title'] = $title;
        /********************************/
        $data_2['mother_national_num_fk']=$mother_id;
        $data_2['process_id']=$process;
        $data_2['title']=$title;
        $data_2['reason']=$reason;
        $data_2['date']=strtotime(date("Y-m-d"));
        $data_2['date_es']=strtotime(date("Y-m-d"));
        $data_2['publisher']=$_SESSION['user_name'];
        /*********************************/
        $this->db->where('mother_national_num', $mother_id);
        $this->db->update('basic', $data);

        $this->db->insert('files_status_operation', $data_2);




    }


    public function get_mother_num($user_name)
    {
        $this->db->where('user_name',$user_name);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
            return $query->row()->mother_national_num;
        }else{
            return false;
        }
    }
   

    /************************************/
}// END CLASS