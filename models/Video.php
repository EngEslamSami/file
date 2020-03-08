<?php

class Video extends CI_Model
{
        public function __construct()
        {
            parent:: __construct();
        }

    
    public function insert(){
        $v_link =$this->input->post('video_link');
        if( strpos($v_link,'v=') != false) {
            $b = explode('v=',$v_link);
            $data['vid'] =$b[1];
        }else{  $data['vid']='';  }

        $data['title']=$this->input->post('title');
        $data['date'] = time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('video',$data);

    }

    public function select(){

        $q = $this->db->get('video');
        return $q->result();
    }
    public function select1(){
        $this->db->limit('3');
        $this->db->order_by('id','DESC');
        $q = $this->db->get('video');
        return $q->result();
    }

    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('video');

    }
    ////////////////////
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('video', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id){


            $data['title']=$this->input->post('title');

            $v_link =$this->input->post('video_link');
        if( strpos($v_link,'v=') != false) {
            $b = explode('v=',$v_link);
            $data['vid'] =$b[1];
        }else{  $data['vid']='';  }

        $data['publisher'] = $_SESSION['user_id'];
        $data['date']=time();





        $this->db->where('id', $id);

        if($this->db->update('video',$data)) {
            return true;
        }else{
            return false;
        }


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