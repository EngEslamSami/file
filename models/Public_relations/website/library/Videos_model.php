<?php

class Videos_model extends CI_Model
{
   /* public function insert_video(){
        if (!empty($this->input->post('video_link'))) {
            for ($a = 0; $a < count($this->input->post('video_link')); $a++) {
                $video_link = $this->input->post('video_link')[$a];
                $data["video_link"] = $video_link;
                $this->db->insert("pr_videos_library", $data);
            }

        }
    }*/
        public function insert_video(){
        if (!empty($this->input->post('video_link'))) {
            for ($a = 0; $a < count($this->input->post('video_link')); $a++) {
                $video_link = $this->input->post('video_link')[$a];
                $link =explode('https://www.youtube.com/watch?v=',$video_link);
                $data["video_link"] = $link[1];

                $this->db->insert("pr_videos_library", $data);
            }


        }
    }
    
    public function display_videos(){
        $this->db->select('*');
        $this->db->from('pr_videos_library');

        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }

    public function delet_video($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_videos_library');

    }
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from('pr_videos_library');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    public function Update_video($id){

    }
    
    
    public function get_Main_video(){
        $data["main_page_video"] = 0;
        $this->db->update("pr_videos_library", $data);

        $data["main_page_video"] = 1;
        $this->db->where('id',$_POST['id']);
        $this->db->update("pr_videos_library", $data);


    }


    public function select_Main_video(){
        $this->db->select('*');
        $this->db->from('pr_videos_library');
        $this->db->where('main_page_video',1);

        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row();
        }
        return false;
    }
}