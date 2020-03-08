<?php



class Journalist extends CI_Model

{
    public function display($id){

        $this->db->where('user_id',$id);

        $query=$this->db->get('users');

        return $query->row_array();

    }
    public function __construct()

    {

        parent:: __construct();

    }

    public  function record_count(){

        return $this->db->count_all("journalist");



    }




public function get_user_name(){
    
       $this->db->select('*');
      $this->db->from('users'); 
       $query = $this->db->get();
       foreach ($query->result() as $row) {

             $data[$row->user_id] = $row->user_name;

      }
    
}

    public  function  insert($file,$file2){

        $data['title']=$this->input->post('news_name');

        $data['content']=$this->input->post('details');

        $data['date']=$this->input->post('news_date');

        $data['image']=serialize($file);

        $data['logo'] = $file2;

        $data['type'] = 1;

        $data['newspaper_name'] = $this->input->post('newspaper_name');

        $data['date_s']=time();

        $data['date_day'] = strtotime(date("m/d/Y"));

        $data['publisher'] = $_SESSION['user_id'];

       

    

        $this->db->insert('journalist',$data);

    }

    //////////////////////////

///////////selecting data//////////////////

    public function select($limit){

        $this->db->select('*');

        $this->db->from('journalist');

        $this->db->where('type',1);

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

   

///////update/////////

    public function getById($id){

        $h = $this->db->get_where('journalist', array('id'=>$id));

        return $h->row_array();

    }

    public function update($id,$file,$file2){

        

        $h = $this->db->get_where('journalist', array('id'=>$id));

        $row = $h->row_array();



        $photo=unserialize($row['image']);

        if($file2 == '')

            $image = $photo;

        else

            $image = array_merge($photo,$file2);

        $final = serialize($image);

        

        $update = array(

            'title'=>$this->input->post('news_name') ,

            'content'=>$this->input->post('details') ,

            'date'=>$this->input->post('news_date') ,

            'image'=>$final,

            'type' => 1,

            'newspaper_name'=>$this->input->post('newspaper_name') ,

            'date_s'=>time(),

            'date_day' => strtotime(date("m/d/Y")),

            'publisher' => $_SESSION['user_id']

        );

        if($file != ''){

            $update['logo']=$file ;

        }else{

        }

        $this->db->where('id', $id);

        if($this->db->update('journalist',$update)) {

            return true;

        }else{

            return false;

        }

    }

    public function delete_photo($id,$index){
        $h = $this->db->get_where('journalist', array('id'=>$id));
        $row = $h->row_array();

        $unserial = unserialize($row['image']);
        unset($unserial[$index]);
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update['image']=$unserial;
        $this->db->where('id', $id);
        if($this->db->update('journalist',$update)) {
            return true;
        }
    }

    /////////////////////// Suspend

    public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }

        $this->db->where('id', $id);
        if($this->db->update('journalist',$update)) {
            return true;
        }else{
            return false;
        }
    }
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('journalist');

    }

 public function select_all_limit($start,$limit){
        $this->db->select('*');
        $this->db->from('journalist');
        $this->db->limit($limit, $start);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

   public function select_users(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
             $data[$row->user_id] = $row->user_name;
            }
            return $data;
        }
        return false;
    }

 public function user_name(){

        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = $row->user_name;
            }
            return $data;
        }
        return false;

    }
}