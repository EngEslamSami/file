<?php
class Project_model extends CI_Model{

public function insert_projects($file){

    $data['project_name'] = $this->input->post('project_name');
    $data['project_details'] = $this->input->post('project_details');
    $data['project_type'] = $this->input->post('project_type');
    if (isset($file)){
        $data['img'] = $file['img'];
    }
    if ($this->input->post('approved') == 1) {
        $data['approved'] = 1;
    } else if ($this->input->post('approved') == 0) {
        $data['approved'] = 0;
    }

    $this->db->insert('projects', $data);
    return $this->db->insert_id();
}
    public function get_num_rows($id,$table)
    {
        $this->db->where('project_id_fk', $id);
        $query = $this->db->get($table);
        return $query->result();
    }

public function insert_items($id){
    if ($this->get_num_rows($id,'projects_items') > 0) {
        $this->delete_all_details($id);
    }


    if (!empty($this->input->post('title'))) {
        $title = $this->input->post('title');
        $details = $this->input->post('details');

        for ($a = 0; $a < count($title); $a++) {
            $data["title"] = $title[$a];
            $data["details"] = $details[$a];
            $data['project_id_fk'] = $id;
            $this->db->insert("projects_items", $data);
        }

    }

}

public function insert_mostafed($id){
    if ($this->get_num_rows($id,'projects_mostafed') > 0) {
        $this->delete_all_mostafed($id);
    }

    if (!empty($this->input->post('name'))) {
        $name = $this->input->post('name');
        $number = $this->input->post('number');

        for ($a = 0; $a < count($name); $a++) {
            $data["name"] = $name[$a];
            $data["number"] = $number[$a];
            $data['project_id_fk'] = $id;
            $this->db->insert("projects_mostafed", $data);
        }

    }
}

public function display_projects(){
    $this->db->select('*');
    $this->db->from('projects');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query->result() as $row){
            $data[$i] = $row;
            $data[$i]->items = $this->get_details_by_id('projects_items',$row->id);
            $data[$i]->mostafed = $this->get_details_by_id('projects_mostafed',$row->id);

            $i++;
        }
        return $data;
       // return $query->result();
    }
    return false;
}

public function get_by_id($id){
    $this->db->select('*');
    $this->db->from('projects');
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
    if (isset($file)){
    $data['img'] = $file['img'];
  }
    if ($this->input->post('approved') == 1) {
        $data['approved'] = 1;
    } else if ($this->input->post('approved') == 0) {
        $data['approved'] = 0;
    }
    $this->db->where('id', $id);
    $this->db->update('projects',$data);
}
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('projects');

    }

    public function delete_details($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('projects_items');

    }
    public function delete_all_details($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('projects_items');

    }
    public function delete_mostafed($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('projects_mostafed');

    }
    public function delete_all_mostafed($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('projects_mostafed');

    }


    public function insert_project_imgs($all_img, $id)
    {
        foreach ($all_img as $key => $value) {
            if (!empty($value)) {
                $data["image"] = $value;
                $data['project_id_fk'] = $id;
                $this->db->insert("projects_photos", $data);
            } else {
                continue;
            }
        }

    }

    public function display_project_imgs($id){
        $this->db->select('*');
        $this->db->from('projects_photos');
        $this->db->where('project_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;

    }

    public function delete_photos($id){
        $this->db->where('id',$id);
        $this->db->delete('projects_photos');

    }

    public function delete_all_photos($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('projects_photos');

    }

    public function insert_video($id){
        if (!empty($this->input->post('video_link'))) {
            for ($a = 0; $a < count($this->input->post('video_link')); $a++) {
                $video_link = $this->input->post('video_link')[$a];
                $data["video_link"] = $video_link;

                $data['project_id_fk'] = $id;
                $this->db->insert("projects_videos", $data);
            }

        }
    }
    public function display_project_videos($id){
        $this->db->select('*');
        $this->db->from('projects_videos');
        $this->db->where('project_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;

    }

    public function delete_video($id){
        $this->db->where('id',$id);
        $this->db->delete('projects_videos');

    }

    public function delete_all_videos($id)
    {
        $this->db->where('project_id_fk', $id);
        $this->db->delete('projects_videos');

    }





}