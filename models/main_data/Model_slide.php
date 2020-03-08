<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 30/01/2019
 * Time: 08:31 م
 */

class Model_slide    extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }
    public function insert_img($img){
        $data['img_name'] = $this->chek_Null($this->input->post('img_name'));
        $data['image'] = $img;
        $data['text1'] = $this->chek_Null($this->input->post('text1'));
        $data['text2'] = $this->chek_Null($this->input->post('text2'));
        $data['text3'] = $this->chek_Null($this->input->post('text3'));
        $this->db->insert('main_slide', $data);

    } public function update_img($img,$id){
        $data['img_name'] = $this->chek_Null($this->input->post('img_name'));
    if (!empty($img)) {
        $data['image'] = $img;
    }
        $data['text1'] = $this->chek_Null($this->input->post('text1'));
        $data['text2'] = $this->chek_Null($this->input->post('text2'));
        $data['text3'] = $this->chek_Null($this->input->post('text3'));
    $this->db->where('id', $id)->update('main_slide', $data);

    }
    public function selet_all()
    {

        $q = $this->db->get('main_slide')->result();
        if (!empty($q)) {
            return $q;
        }
    }
    public function selet_img($id)
    {

        $q = $this->db->where('id',$id)->get('main_slide')->row();
        if (!empty($q)) {
            return $q;
        }
    }

    public function delete_img($id)
    {
        $this->db->where('id', $id)->delete('main_slide');
    }

}