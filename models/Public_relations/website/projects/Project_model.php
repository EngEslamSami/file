<?php
class Project_model extends CI_Model{

public function insert_projects($file){

    $data['project_name'] = $this->input->post('project_name');
    $data['project_details'] = $this->input->post('project_details');
    $data['project_type'] = $this->input->post('project_type');
    if (isset($file)){
        $data['img'] = $file['img'];
    }
    $data['from_date'] = $this->input->post('from_date');
     $data['to_date'] = $this->input->post('to_date');
    if ($this->input->post('approved') == 1) {
        $data['approved'] = 1;
    } else if ($this->input->post('approved') == 0) {
        $data['approved'] = 0;
    }

    $this->db->insert('pr_projects', $data);
    return $this->db->insert_id();
}
    public function get_num_rows($id,$table)
    {
        $this->db->where('project_id_fk', $id);
        $query = $this->db->get($table);
        return $query->result();
    }

public function insert_items($id){
    if ($this->get_num_rows($id,'pr_projects_items') > 0) {
        $this->delete_all_details($id);
    }


    if (!empty($this->input->post('title'))) {
        $title = $this->input->post('title');
        $details = $this->input->post('details');

        for ($a = 0; $a < count($title); $a++) {
            $data["title"] = $title[$a];
            $data["details"] = $details[$a];
            $data['project_id_fk'] = $id;
            $this->db->insert("pr_projects_items", $data);
        }

    }

}

public function insert_mostafed($id){
    if ($this->get_num_rows($id,'pr_projects_mostafed') > 0) {
        $this->delete_all_mostafed($id);
    }

    if (!empty($this->input->post('name'))) {
        $name = $this->input->post('name');
        $number = $this->input->post('number');

        for ($a = 0; $a < count($name); $a++) {
            $data["name"] = $name[$a];
            $data["number"] = $number[$a];
            $data['project_id_fk'] = $id;
            $this->db->insert("pr_projects_mostafed", $data);
        }

    }
}

public function display_projects($arr=''){
    $this->db->select('*');
    $this->db->from('pr_projects');
      if (!empty($arr)){
        $this->db->where($arr);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query->result() as $row){
            $data[$i] = $row;
            $data[$i]->items = $this->get_details_by_id('pr_projects_items',$row->id);
            $data[$i]->mostafed = $this->get_details_by_id('pr_projects_mostafed',$row->id);

            $i++;
        }
        return $data;
       // return $query->result();
    }
    return false;
}

public function get_by_id($id){
    $this->db->select('*');
    $this->db->from('pr_projects');
    $this->db->where('id',$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row();
    }
    return false;

}

    public function get_details_by_id($table,$id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('project_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

public function update_project($id,$file){
    $data['project_name'] = $this->input->post('project_name');
    $data['project_details'] = $this->input->post('project_details');
    $data['project_type'] = $this->input->post('project_type');
    	 $data['from_date'] = $this->input->post('from_date');
     $data['to_date'] = $this->input->post('to_date');
    if (isset($file)){
    $data['img'] = $file['img'];
  }
    if ($this->input->post('approved') == 1) {
        $data['approved'] = 1;
    } else if ($this->input->post('approved') == 0) {
        $data['approved'] = 0;
    }
    $this->db->where('id', $id);
    $this->db->update('pr_projects',$data);
}
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pr_projects');

    }

    public function delete_details($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pr_projects_items');

    }
    public function delete_all_details($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('pr_projects_items');

    }
    public function delete_mostafed($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pr_projects_mostafed');

    }
    public function delete_all_mostafed($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('pr_projects_mostafed');

    }


    public function insert_project_imgs($all_img, $id)
    {
        foreach ($all_img as $key => $value) {
            if (!empty($value)) {
                $data["image"] = $value;
                $data['project_id_fk'] = $id;
                $this->db->insert("pr_projects_photos", $data);
            } else {
                continue;
            }
        }

    }

    public function display_project_imgs($id){
        $this->db->select('*');
        $this->db->from('pr_projects_photos');
        $this->db->where('project_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;

    }

    public function delete_photos($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_projects_photos');

    }

    public function delete_all_photos($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('pr_projects_photos');

    }

    public function insert_video($id){
        if (!empty($this->input->post('video_link'))) {
            for ($a = 0; $a < count($this->input->post('video_link')); $a++) {
                $video_link = $this->input->post('video_link')[$a];
                $data["video_link"] = $video_link;

                $data['project_id_fk'] = $id;
                $this->db->insert("pr_projects_videos", $data);
            }

        }
    }
    public function display_project_videos($id){
        $this->db->select('*');
        $this->db->from('pr_projects_videos');
        $this->db->where('project_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;

    }

    public function delete_video($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_projects_videos');

    }

    public function delete_all_videos($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('pr_projects_videos');

    }


public function get_project_details($id){
        $this->db->select('*');
        $this->db->from('pr_projects');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row){
                $data[0] = $row;
                $data[0]->items = $this->get_details_by_id('pr_projects_items',$id);
                $data[0]->mostafed = $this->get_details_by_id('pr_projects_mostafed',$id);
                $data[0]->photos = $this->get_details_by_id('pr_projects_photos',$id);
                $data[0]->videos = $this->get_details_by_id('pr_projects_videos',$id);

            }
            return $data;
            // return $query->result();
        }
        return false;
    }


 public function update_web_display($id,$value){

        $data['web_display']= $value;
        $this->db->where('id',$id);
        $this->db->update('pr_projects',$data);

    }

}