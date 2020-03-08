<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 31/01/2019
 * Time: 01:29 ص
 */

class Model_data_web extends CI_Model
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

    public function insert()
    {
        $this->db->truncate('main_data_web');
        if (isset($_POST['h_logo'])) {
            $data['h_logo'] = 1;
        }
        if (isset($_POST['h_email'])) {
            $data['h_email'] = 1;
        }
        if (isset($_POST['h_soeial'])) {
            $data['h_soeial'] = 1;
        }
        if (isset($_POST['h_date'])) {
            $data['h_date'] = 1;
        }
        if (isset($_POST['h_mob'])) {
            $data['h_mob'] = 1;
        }
        if (isset($_POST['f_logo'])) {
            $data['f_logo'] = 1;
        }
        if (isset($_POST['f_address'])) {
            $data['f_address'] = 1;
        }
        if (isset($_POST['f_map'])) {
            $data['f_map'] = 1;
        }
        if (isset($_POST['f_mob'])) {
            $data['f_mob'] = 1;
        }
        if (isset($_POST['f_email'])) {
            $data['f_email'] = 1;
        }
        $this->db->insert('main_data_web', $data);

    }

    public function select(){
        $q = $this->db->get('main_data_web')->row();
        if (!empty($q)) {
            return $q;
        }
    }

}