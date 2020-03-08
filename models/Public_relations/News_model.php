<?php
class News_model extends CI_Model
{

    public function insert_publisher(){
        $data['title']=$this->input->post('title');
        $data['details']=$this->input->post('details');

        $data['date'] = $this->input->post('date');
        $data['auther'] = $this->input->post('auther');
        $data['keywords'] = $this->input->post('keywords');
        $data['news_type'] = $this->input->post('news_type');

        $data['n_status'] = $this->input->post('n_status');
        $data['description'] = $this->input->post('description');
        if($this->input->post('newspaper_link')){
            $data['newspaper_link'] = $this->input->post('newspaper_link');
        }
        if($this->input->post('newspaper_name')){
            $data['newspaper_name'] = $this->input->post('newspaper_name');
        }


        $data['date_ar'] = date("Y/m/d");
        $data['date_s'] = time();

        if($_SESSION['role_id_fk']==1){

            $data['publisher_name']=$_SESSION['user_name'];
            $data['publisher_id']=$_SESSION['user_id'];
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher_name'] = $this->get_member_name($_SESSION['emp_code']);
            $data['publisher_id'] = $this->get_member_id($_SESSION['emp_code']);

        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher_name']= $this->get_emp_name($_SESSION['emp_code']);
            $data['publisher_id']= $this->get_emp_id($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher_name']=   $this->get_member_general_name($_SESSION['emp_code']);
            $data['publisher_id']=   $this->get_member_general_id($_SESSION['emp_code']);

        }


        $this->db->insert('pr_news',$data);
        return $this->db->insert_id();
    }
    //Insert video
    public function insert_video($id){
        if (!empty($this->input->post('video_link'))) {


         //   var_dump($video_link);
           // die;

            for ($a = 0; $a < count($this->input->post('video_link')); $a++) {
                $video_link = $this->input->post('video_link')[$a];
                $data["video_link"] = $video_link;

                $data['news_id_fk'] = $id;
                $this->db->insert("pr_videos", $data);
            }

        }
    }


    public  function get_emp_name($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['employee'];

    }
    public  function get_emp_id($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['id'];

    }
    public  function get_emp_photo($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['personal_photo'];

    }
    public  function get_user_photo($id){

        $h = $this->db->get_where("users", array('emp_code'=>$id));
        $arr= $h->row_array();
        return $arr['user_photo'];

    }

    public  function get_member_name($id){

        $h = $this->db->get_where("magls_members_table", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['member_name'];

    }
    public  function get_member_id($id){

        $h = $this->db->get_where("magls_members_table", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['id'];

    }

    public  function get_member_general_name($id){

        $h = $this->db->get_where("general_assembley_members", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['name'];

    }
    public  function get_member_general_id($id){

        $h = $this->db->get_where("general_assembley_members", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['id'];

    }
    public  function get_member_general_photo($id){

        $h = $this->db->get_where("general_assembley_members", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['card_img'];

    }

    public function insert_photo($all_img,$id){


        foreach ($all_img as  $key => $value) {
            if (!empty($value)) {
                $data["img_name"] = $this->input->post('img_name')[$key];
               // if ($this->input->post('img_status') && $this->input->post('img_status')!=null ){
                 if($key ==$this->input->post('img_status') ){
                     $data["img_status"] = 1;
                 }
                 else{
                     $data["img_status"] = 0;
                 }
              //  }


                $data["img"] = $value;
                $data['news_id_fk']=$id;
                $this->db->insert("pr_new_photos", $data);
            } else {
                continue;
            }
        }

    }
    /// Update img_status
    public function update_img_status($id){
        $news_id_fk=$this->input->post('news_id_fk');
//        echo $news_id_fk;
//        return;
        $data_news['img_status']=0;
        $this->db->where('news_id_fk',$news_id_fk);
        $this->db->update('pr_new_photos',$data_news);
        $data['img_status']=1;
        $this->db->where('id',$id);
        $this->db->update('pr_new_photos',$data);
    }


  /*  public function display_publisher_data($limit=false,$arr =false){
        $this->db->select('*');
        $this->db->from('pr_news');
        if($limit!=false){
          $this->db->limit($limit);  
        }
        $this->db->where($arr);
        $this->db->order_by('date','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->img=$this->get_publisher_photos($row->id);
                $data[$i]->count_views=$this->get_view($row->id);
               // $data[$i]->file_time = strtotime($row->date);
               // $data[$i]->rest_time = $data[$i]->file_time - strtotime("now");

               // $data[$i]->time_stamp = $this->Timing($row->rest_time);


                $i++;
            }
            return $data;

        }
        return false;

    }*/
    
    public function display_publisher_data($limit=false,$arr =false){
        $this->db->select('*');
        $this->db->from('pr_news');
        if($limit!=false){
          $this->db->limit($limit);  
        }
          if($arr!=false){
         $this->db->where($arr);
        }
     
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->img=$this->get_publisher_photos($row->id);
                $data[$i]->count_views=$this->get_view($row->id);
               // $data[$i]->file_time = strtotime($row->date);
               // $data[$i]->rest_time = $data[$i]->file_time - strtotime("now");

               // $data[$i]->time_stamp = $this->Timing($row->rest_time);


                $i++;
            }
            return $data;

        }
        return false;

    } 
    
    public function news_details($id){
        $this->db->select('*');
        $this->db->from('pr_news');
       // $this->db->order_by('date','DESC');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->img=$this->get_publisher_photos($row->id);
                $i++;
            }
            return $data;

        }
        return false;

    }
    // get_by_id
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from('pr_news');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    public function display_photos(){
        $this->db->select('*');
        $this->db->from('pr_new_photos');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function get_publisher_photos($id){
       $this->db->select('*');
        $this->db->from('pr_new_photos');
     $this->db->where('news_id_fk',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

    public function get_photos($id){
        $this->db->select('*');
        $this->db->from('pr_new_photos');
       $this->db->where('news_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_videos($id){
        $this->db->select('*');
        $this->db->from('pr_videos');
        $this->db->where('news_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //________update publisher________

    public function update_publisher($id){
        $data['title']=$this->input->post('title');
        $data['details']=$this->input->post('details');
        $data['date'] = $this->input->post('date');
        $data['auther'] = $this->input->post('auther');
        $data['keywords'] = $this->input->post('keywords');
        $data['n_status'] = $this->input->post('n_status');
        $data['news_type'] = $this->input->post('news_type');
        $data['description'] = $this->input->post('description');
        if($this->input->post('newspaper_link')){
            $data['newspaper_link'] = $this->input->post('newspaper_link');
        }
        if($this->input->post('newspaper_name')){
            $data['newspaper_name'] = $this->input->post('newspaper_name');
        }
        $data['date_ar'] = date("Y/m/d");
        $data['date_s'] = time();
        if($_SESSION['role_id_fk']==1){

            $data['publisher_name']=$_SESSION['user_name'];
            $data['publisher_id']=$_SESSION['user_id'];
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher_name'] = $this->get_member_name($_SESSION['emp_code']);
            $data['publisher_id'] = $this->get_member_id($_SESSION['emp_code']);

        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher_name']= $this->get_emp_name($_SESSION['emp_code']);
            $data['publisher_id']= $this->get_emp_id($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher_name']=   $this->get_member_general_name($_SESSION['emp_code']);
            $data['publisher_id']=   $this->get_member_general_id($_SESSION['emp_code']);

        }
        $this->db->where('id', $id);
        $this->db->update('pr_news', $data);

    }
   
    // _______delete photo_________
    public function delete_img($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_new_photos');

    }
    // _______delete video_________
    public function delete_video($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_videos');

    }
    public function delete_publisher_img($id){
        $this->db->where('news_id_fk',$id);
        $this->db->delete('pr_new_photos');

    }
    public function delete_publisher_video($id){
        $this->db->where('news_id_fk',$id);
        $this->db->delete('pr_videos');

    }

// _______delete publisher_________

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_news');

    }
    //_____________Pagination____________________

    public function count_all(){
        return $this->db->count_all('pr_news');

    }

    public function feach_records($limit,$start){
        $this->db->limit($limit,$start);
        $query = $this->db->get('pr_news');
        if ($query->num_rows()  > 0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $data[$i]->img=$this->get_publisher_photos($row->id);
                $i++;


            }
            return $data;
        }
        return false;
    }


    public function fetch_departments($limit, $start) {

        $this->db->limit($limit, $start);
        $query = $this->db->get("basic");

        if ($query->num_rows() > 0) {
            $i =0;

            foreach ($query->result() as $row) {

                $data[$i] = $row;

                $i++;

            }

            return $data;

        }

        return false;

    }

    public function get_views($id){
        $this->db->select('count_views');
        $this->db->from('news_views');
        $this->db->where('news_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() >0){
            return $query->row()->count_views;
        }
        else{
            return 0;
        }
    }

    public function update_news_views($id){
        $count = $this->get_views($id);
        $data['count_views']=$count+1;
        $this->db->where('news_id_fk',$id);
        $this->db->update('news_views',$data);
    }


    public function insert_views_new($id)
    {
        if($this-> get_view($id)==0){
            $data['num']= 1;
            $data['new_id']= $id;

            $this->db->insert('news_views',$data);
        }else{
            $data['num']= $this-> get_view($id)+1;
            $this->db->where('new_id',$id);
            $this->db->update('news_views',$data);
        }
    }
    public function get_view($id){
        $this->db->where('new_id',$id);
        $query = $this->db->get('news_views');
        if($query->num_rows()>0){
            return $query->row()->num;
        }else{
            return 0;
        }
    }


    function Timing ($time)
    {

        //  $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }




}