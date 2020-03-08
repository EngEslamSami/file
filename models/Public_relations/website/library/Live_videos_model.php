<?php

class Live_videos_model extends CI_Model
{
      public function insert_video(){
        if (!empty($this->input->post('video_link'))) {
            for ($a = 0; $a < count($this->input->post('video_link')); $a++) {
                $video_link = $this->input->post('video_link')[$a];
                $link =explode('https://www.youtube.com/watch?v=',$video_link);
                $data["video_link"] = $link[1];
                $data["title"] = $this->input->post('title')[$a];
                $data["from_date"] = strtotime($this->input->post('from_date')[$a]);
                $data["from_date_ar"] = $this->input->post('from_date')[$a];

                $data["to_date"] = strtotime($this->input->post('to_date')[$a]);
                $data["to_date_ar"] = $this->input->post('to_date')[$a];
                $this->db->insert("pr_live_videos_library", $data);
            }


        }
    }
    public function display_videos(){
        $this->db->select('*');
        $this->db->from('pr_live_videos_library');
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }

    public function delet_video($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_live_videos_library');

    }
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from('pr_live_videos_library');
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
        $this->db->update("pr_live_videos_library", $data);

        $data["main_page_video"] = 1;
        $this->db->where('id',$_POST['id']);
        $this->db->update("pr_live_videos_library", $data);


    }


    public function select_Main_video(){
        $this->db->select('*');
        $this->db->from('pr_live_videos_library');
        $this->db->where('main_page_video',1);

        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row();
        }
        return false;
    }
    
    
          //yara
    public function get_vedio_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('pr_live_videos_library');
        if ($query->num_rows()>0){
      
            $data = $query->row();

         return $data;
        } else{
            return 0;
        }
    }
    
    public function update_vedio($id){
        if (!empty($this->input->post('video_link'))) {
            $video_link=$this->input->post('video_link');
                 $link =explode('https://www.youtube.com/watch?v=',$video_link);
                $data["video_link"] = $link[1];

                $this->db->where('id',$id);
                $this->db->update('pr_live_videos_library',$data);
            


        }
    }
    
}