<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 28/01/2019
 * Time: 04:01 م
 */

class Shoraka_model extends CI_Model
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

    public function get_member_name($id)
    {

        $h = $this->db->get_where("magls_members_table", array('id' => $id));
        $arr = $h->row_array();
        return $arr['member_name'];

    }

    public function get_emp_name($id)
    {

        $h = $this->db->get_where("employees", array('id' => $id));
        $arr = $h->row_array();
        return $arr['employee'];

    }


    public function get_member_general_name($id)
    {

        $h = $this->db->get_where("general_assembley_members", array('id' => $id));
        $arr = $h->row_array();
        return $arr['name'];

    }

    public function insert_shoraka($logo)
    {
        $status_name = array(' نشط', 'غير نشط');
        $link = $this->chek_Null($this->input->post('link'));
        if (!empty($link)) {
            $data['link'] = $link;
        } else {
            $data['link'] = '#';
        }
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['status'] = $this->chek_Null($this->input->post('status_name'));
        $data['status_name'] = $status_name[$data['status']];
        $data['logo'] = $logo;

        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_id'];

        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher_name'] = $_SESSION['user_name'];
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher_name'] = $this->news_model->get_member_name($_SESSION['emp_code']);
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher_name'] = $this->news_model->get_emp_name($_SESSION['emp_code']);
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher_name'] = $this->news_model->get_member_general_name($_SESSION['emp_code']);
        }
//        $data['publisher_name'] = $_SESSION['user_id'];
        $this->db->insert('pr_shoraka', $data);
    }

    public function update_shoraka($logo, $id)
    {
        $status_name = array(' نشط', 'غير نشط');
        $link = $this->chek_Null($this->input->post('link'));
        if (!empty($link)) {
            $data['link'] = $link;
        } else {
            $data['link'] = '#';
        }
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['status'] = $this->chek_Null($this->input->post('status_name'));
        $data['status_name'] = $status_name[$data['status']];
        if (!empty($logo)) {
            $data['logo'] = $logo;
        }
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_id'];

        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher_name'] = $_SESSION['user_name'];
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher_name'] = $this->news_model->get_member_name($_SESSION['emp_code']);
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher_name'] = $this->news_model->get_emp_name($_SESSION['emp_code']);
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher_name'] = $this->news_model->get_member_general_name($_SESSION['emp_code']);
        }
        $this->db->where('id', $id)->update('pr_shoraka', $data);
    }

    public function selet_allshoraka()
    {

        $q = $this->db->get('pr_shoraka')->result();
        if (!empty($q)) {
            return $q;
        }
    }
     public function selet_shoraka($id)
    {

        $q = $this->db->where('id',$id)->get('pr_shoraka')->row();
        if (!empty($q)) {
            return $q;
        }
    }

    public function delete_shoraka($id)
    {
        $this->db->where('id', $id)->delete('pr_shoraka');
    }

    public function selet_webshoraka()
    {

        $q = $this->db->where('status',0)->get('pr_shoraka')->result();
        if (!empty($q)) {
            return $q;
        }
    }
}