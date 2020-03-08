<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 18/02/2019
 * Time: 02:56 م
 */

class Structure_model extends CI_Model
{

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function insert_img($img)
    {
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['img'] = $img;
        $this->db->insert('pr_structure', $data);

    }

    public function update_img($id, $img)
    {
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['img'] = $img;
        $this->db->where('id', $id)->update('pr_structure', $data);

    }

    public function delete_img($id)
    {
        $this->db->where('id', $id)->delete('pr_structure');
    }

    public function slect_all()
    {
        $q = $this->db->get('pr_structure')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function slect_by($id)
    {
        $q = $this->db->where('id', $id)->get('pr_structure')->row();
        if (!empty($q)) {
            return $q;
        }
    }

}