<?php
class Photos_model extends CI_Model
{

    public function insert_photos($file)
    {
        $data['title'] = $this->input->post('title');
        $data['date'] = $this->input->post('date');
        $data['img'] = $file['img'];
        $this->db->insert('pr_photos_library', $data);
        return $this->db->insert_id();
    }

    public function insert_library_imgs($all_img, $id)
    {
        foreach ($all_img as $key => $value) {
            if (!empty($value)) {
                $data["img"] = $value;
                $data['library_id_fk'] = $id;
                $this->db->insert("pr_photos_library_imgs", $data);
            } else {
                continue;
            }
        }

    }

    public function display_imgs(){
        $this->db->select('*');
        $this->db->from('pr_photos_library');
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $data[$i]->count = $this->count_all($row->id);
                $i++;
            }
            return $data;

           // return $query->result();
        }
        return false;

    }
    public function count_all($id){
        $this->db->select('*');
        $this->db->from('pr_photos_library_imgs');
        $this->db->where('library_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->num_rows();
        }
        return false;


    }

    public function display_album($id){
        $this->db->select('*');
        $this->db->from('pr_photos_library_imgs');
        $this->db->where('library_id_fk',$id);
        $query= $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;

    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from('pr_photos_library');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function update_library($id,$file){
        $data['title'] = $this->input->post('title');
        $data['date'] = $this->input->post('date');
        if (isset($file)){
            $data['img'] = $file['img'];
        }

        $this->db->where('id', $id);
        $this->db->update('pr_photos_library', $data);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_photos_library');

    }

    public function delete_img($id){
        $this->db->where('library_id_fk',$id);
        $this->db->delete('pr_photos_library_imgs');

    }

    public function delete_photos($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_photos_library_imgs');

    }
}