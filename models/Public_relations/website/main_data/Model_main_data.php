<?php
class Model_main_data extends CI_Model
{
    public function __construct(){
        parent:: __construct();
    }

    public  function record_count(){
        return $this->db->count_all("main_data");
    }
    
   /* public  function  insert($file){
        
        $data['name'] = $this->input->post('name');
        $data['logo'] = $file;
        $data['date_construct'] = $this->input->post('date_construct');
        $data['address'] = $this->input->post('address');
        $data['num'] = $this->input->post('num');

     //   $data['facebook'] = $this->input->post('facebook');
       // $data['youtube'] = $this->input->post('youtube');
      //  $data['twitter'] = $this->input->post('twitter');
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $data['type'] = 0;
        

        $this->db->insert('main_data',$data);
        return  $this->db->insert_id();
    }*/


    public function insert_phone($id)
    {
        if($this->input->post('phone')){
            foreach($this->input->post('phone') as $phone){
                $data['main_id_fk'] = $id;
                $data['tele'] = $phone;
                $this->db->insert('main_data_tele',$data);
            }
        }

    }

    public function insert_fax($id)
    {
        if($this->input->post('fax')) {
            foreach ($this->input->post('fax') as $fax) {
                $data['main_id_fk'] = $id;
                $data['fax'] = $fax;
                $this->db->insert('main_data_fax', $data);
            }
        }
    }

    public function insert_email($id)
    {
        if($this->input->post('email')) {
            foreach ($this->input->post('email') as $email) {
                $data['main_id_fk'] = $id;
                $data['email'] = $email;
                $this->db->insert('main_data_email', $data);
            }
        }
    }
    public function insert_banks($id)
    {

        $x = 0;
        if($this->input->post('banks_id')) {
            foreach ($this->input->post('banks_id') as $bank) {

               
                $data['main_id_fk'] = $id;
                $data['bank_account_fk'] = $this->input->post('banks_account')[$x];
                $data['bank_id_fk'] = explode('-',$bank)[0];

                $this->db->insert('main_data_banks', $data);
            $x++; }
        }
    }


    
    public function select($limit){
        $this->db->select('*');
        $this->db->from('main_data');

        $this->db->order_by('id','DESC');
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

    public function getById($id){
        $h = $this->db->get_where('main_data', array('id'=>$id));
        return $h->row_array();
    }

    public function getBankById($id){
        $h = $this->db->get_where('main_data_banks', array('main_id_fk'=>$id));
        return $h->result();
    }
    public function getPhonesById($id){
        $h = $this->db->get_where('main_data_tele', array('main_id_fk'=>$id));
        return $h->result();
    }
    public function getEmailsById($id){
        $h = $this->db->get_where('main_data_email', array('main_id_fk'=>$id));
        return $h->result();
    }
    public function getFaxById($id){
        $h = $this->db->get_where('main_data_fax', array('main_id_fk'=>$id));
        return $h->result();
    }

    
    
        /*public function update($id,$file){


        $update = array(
            'name'             => $this->input->post('name') ,
            'date_construct'   => $this->input->post('date_construct') ,
            'num'                => $this->input->post('num'),
            'address'          => $this->input->post('address') ,
            'web_info'         => $this->input->post('web_info') ,
            'facebook'         => $this->input->post('facebook') ,
            'youtube'          => $this->input->post('youtube') ,
            'twitter'          => $this->input->post('twitter') ,
            'date'             => strtotime(date("Y-m-d")),
            'date_s'           => time() 
        );

        if($file != ''){
            $update['logo']=$file ;
        }

        $this->db->where('id', $id);
        if($this->db->update('main_data',$update)) {
            return true;
        }else{
            return false;
        }
    }*/
    public function delete($id)
    {
        $this->db->where('main_id_fk',$id);
        $this->db->delete('main_data_fax');
        $this->db->where('main_id_fk',$id);
        $this->db->delete('main_data_email');
        $this->db->where('main_id_fk',$id);
        $this->db->delete('main_data_tele');
        $this->db->where('main_id_fk',$id);
        $this->db->delete('main_data_banks');
    }


   


    public function select_bank()
    {
        return $this->db->get('banks_settings')->result();
    }


    public function update_bank_status($id,$bank_account,$gmaya_id)
    {
        $this->db->where('bank_id_fk',$id);
        $this->db->update('main_data_banks',array('status'=>1));
        $this->db->where('bank_id_fk != ',$id);
        $this->db->update('main_data_banks',array('status'=>0));
        $this->db->where('id',$gmaya_id);
        $this->db->update('main_data',array('main_bank_id_fk'=>$id, 'mainBank'=>$bank_account));
    }
    
    
    
    
    //////////////////////////////////////// omnia //////////////////
    
    public function insert($file, $file2,$file3)
    {

        $data['name'] = $this->input->post('name');
        $data['logo'] = $file;
        $data['f_logo'] = $file2;
        $data['d_img'] = $file3;
        $data['date_construct'] = $this->input->post('date_construct');
        $data['address'] = $this->input->post('address');
        $data['num'] = $this->input->post('num');

        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $data['type'] = 0;
        
        $data['lat_map'] = $this->input->post('lat_map');
        $data['lang_map'] = $this->input->post('lang_map');

        $this->insert_soeial();

        $this->db->insert('main_data', $data);


        return $this->db->insert_id();
    }





    public function update($id, $file, $file2,$file3)
    {


        $update = array(
            'name' => $this->input->post('name'),
            'date_construct' => $this->input->post('date_construct'),
            'num' => $this->input->post('num'),
            'address' => $this->input->post('address'),
            'web_info' => $this->input->post('web_info'),
            'facebook' => $this->input->post('facebook'),
            'youtube' => $this->input->post('youtube'),
            'twitter' => $this->input->post('twitter'),
            'date' => strtotime(date("Y-m-d")),
            'lang_map' => $this->input->post('lang_map'),
            'lat_map' => $this->input->post('lat_map'),
            'date_s' => time()
        );

        if ($file != '') {
            $update['logo'] = $file;
        }
        if ($file2 != '') {
            $update['f_logo'] = $file2;
        }
        if ($file3 != '') {
            $update['d_img'] = $file3;
        }
        $this->insert_soeial();
        $this->db->where('id', $id);
        if ($this->db->update('main_data', $update)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_soeial()
    {
        $soeial_array = array('', 'fa-twitter', 'fa-facebook', 'fa-twitch', 'fa-snapchat-ghost', 'fa-instagram', 'fa-youtube-play', 'fa-linkedin');
        $soeial_array_class = array('', 'twitter', 'facebook', 'twitch', 'snapchat', 'instagram', 'youtube', 'linkedin');
        $this->db->truncate('main_data_social');
        $twitter = $this->input->post('twitter');
        $facebook = $this->input->post('facebook');
        $twitch = $this->input->post('twitch');
        $snapchat = $this->input->post('snapchat');
        $instagram = $this->input->post('instagram');
        $youtube = $this->input->post('youtube');
        $linkedin = $this->input->post('linkedin');
        if (!empty($twitter)) {
            $this->insert_soeial_row(1, $soeial_array[1], $twitter, $soeial_array_class[1]);
        }
        if (!empty($facebook)) {
            $this->insert_soeial_row(2, $soeial_array[2], $facebook, $soeial_array_class[2]);
        }
        if (!empty($twitch)) {
            $this->insert_soeial_row(3, $soeial_array[3], $twitch, $soeial_array_class[3]);
        }
        if (!empty($snapchat)) {
            $this->insert_soeial_row(4, $soeial_array[4], $snapchat, $soeial_array_class[4]);
        }
        if (!empty($instagram)) {
            $this->insert_soeial_row(5, $soeial_array[5], $instagram, $soeial_array_class[5]);
        }
        if (!empty($youtube)) {
            $this->insert_soeial_row(6, $soeial_array[6], $youtube, $soeial_array_class[6]);
        }
        if (!empty($linkedin)) {
            $this->insert_soeial_row(7, $soeial_array[7], $linkedin, $soeial_array_class[7]);
        }


    }

    public function insert_soeial_row($social_num_fk, $social_icon, $social_link, $soeial_class)
    {

        $data['social_num_fk'] = $social_num_fk;
        $data['social_icon'] = $social_icon;
        $data['social_link'] = $social_link;
        $data['soeial_class'] = $soeial_class;
        $this->db->insert('main_data_social', $data);

    }

    public function select_all_soeial()
    {
        $q = $this->db->get('main_data_social')->result();
        if (!empty($q)) {
            return $q;
        }
    }
    public function select_main_data()
    {
        $q = $this->db->get('main_data')->row();
        if (!empty($q)) {
            $q->telphon=$this->getPhonesById($q->id);
            $q->emails=$this->getEmailsById($q->id);
            $q->faxs=$this->getFaxById($q->id);
            $q->bankes=$this->getBankById($q->id);
            return $q;
        }
    }
}


 