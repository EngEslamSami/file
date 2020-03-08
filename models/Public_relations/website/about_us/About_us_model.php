<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 26/01/2019
 * Time: 12:15 م
 */

class About_us_model extends CI_Model
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

    public function select_pages()
    {
        $q = $this->db->get('pr_main_pages')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function return_pages()
    {
        $pages = $this->select_pages();
        if (!empty($pages)) {
            $data = array();
            $x = 0;
            foreach ($pages as $page) {
                if ($page->have_sub == 1) {
                    $data[$x] = $page;
                } elseif (!$this->is_in_page_data($page->id)) {
                    $data[$x] = $page;
                }
                $x++;
            }
            return $data;
        }
    }

    public function is_in_page_data($id)
    {
        $q = $this->db->where('page_id_fk', $id)->get('pr_sub_pages')->row();
        if (!empty($q)) {
            return true;
        }
        return false;
    }

    public function select_page($id)
    {
        $q = $this->db->where('id', $id)->get('pr_main_pages')->row();
        if (!empty($q)) {
            return $q;
        }
    }

    public function select_page_data($id)
    {

        $this->db->select('pr_main_pages.page_title,pr_main_pages.have_sub,pr_main_pages.id as main_page 
        ,pr_sub_pages.*');
        $this->db->from('pr_main_pages');
        $this->db->where('pr_sub_pages.id', $id)->join('pr_sub_pages', 'pr_main_pages.id = pr_sub_pages.page_id_fk');
        $q = $this->db->get()->row();
        if (!empty($q)) {

            return $q;
        }
//
//        $q = $this->db->where('id', $id)->get('pr_sub_pages')->row();
//        if (!empty($q)) {
//            return $q;
//        }
    }

    public function pages_web()
    {
        $this->db->select('pr_main_pages.* ');
        $this->db->from('pr_main_pages')->order_by('pr_main_pages.page_order  ASC')
            ->where('page_status', 1)->group_by('pr_sub_pages.page_id_fk');
        $this->db->join('pr_sub_pages', 'pr_main_pages.id = pr_sub_pages.page_id_fk');
        $q = $this->db->get()->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function page_web($id)
    {
        $this->db->select('pr_main_pages.page_title,pr_main_pages.have_sub,pr_main_pages.id as main_page 
        ,pr_sub_pages.*');
        $this->db->from('pr_main_pages');
        $this->db->where('pr_sub_pages.page_id_fk', $id)->group_by('pr_sub_pages.page_id_fk')->join('pr_sub_pages', 'pr_main_pages.id = pr_sub_pages.page_id_fk');
        $q = $this->db->get()->row();
        if (!empty($q)) {
//            foreach ($q as $key => $page) {
                if ($q->have_sub == 1) {
                    $q->subs = $this->get_subs($q->main_page);
                }
//            }
            return $q;
        }
    }

    public function get_subs($id)
    {
        $subs = $this->db->where('page_id_fk', $id)->get('pr_sub_pages')->result();
        if (!empty($subs)) {
            return $subs;
        }
    }

    public function insert_page()
    {
        $page_status_name = array('غير نشط', 'نشط');
        $have_sub = array('لا', 'نعم');
        $data['page_title'] = $this->chek_Null($this->input->post('page_title'));
        $data['page_order'] = $this->chek_Null($this->input->post('page_order'));
        $data['page_status'] = $this->chek_Null($this->input->post('page_status'));
        $data['page_status_name'] = $page_status_name[$data['page_status']];
        $data['have_sub'] = $this->chek_Null($this->input->post('have_sub'));
        $data['have_sub_title'] = $have_sub[$data['have_sub']];

        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('pr_main_pages', $data);
    }

    public function update_page($id)
    {
        $page_status_name = array('غير نشط', 'نشط');
        $have_sub = array('لا', 'نعم');
        $data['page_title'] = $this->chek_Null($this->input->post('page_title'));
        $data['page_order'] = $this->chek_Null($this->input->post('page_order'));
        $data['page_status'] = $this->chek_Null($this->input->post('page_status'));
        $data['page_status_name'] = $page_status_name[$data['page_status']];
        $data['have_sub'] = $this->chek_Null($this->input->post('have_sub'));
        $data['have_sub_title'] = $have_sub[$data['have_sub']];

        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where('id', $id)->update('pr_main_pages', $data);
    }

    public function delete_page($id)
    {
        $this->db->where('id', $id)->delete('pr_main_pages');
    }

    public function delete_page_data($id)
    {
        $this->db->where('id', $id)->delete('pr_sub_pages');
    }

    public function insert_page_data($img)
    {
        $data['page_id_fk'] = $this->chek_Null($this->input->post('page_id_fk'));
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['img'] = $img;

        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('pr_sub_pages', $data);


    }

    public function update_page_data($id, $img)
    {
        $data['page_id_fk'] = $this->chek_Null($this->input->post('page_id_fk'));
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['img'] = $img;

        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['date_ar'] = date("Y-m-d");
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where('id', $id)->update('pr_sub_pages', $data);


    }

    public function select_data_pages()
    {

        $this->db->select('pr_main_pages.page_title ,pr_main_pages.have_sub ,pr_main_pages.id as main_page ,pr_sub_pages.*');
        $this->db->from('pr_main_pages')->order_by('pr_main_pages.page_order  ASC');
        $this->db->join('pr_sub_pages', 'pr_main_pages.id = pr_sub_pages.page_id_fk');
        $q = $this->db->get()->result();
        if (!empty($q)) {

            return $q;
        }
    }
}