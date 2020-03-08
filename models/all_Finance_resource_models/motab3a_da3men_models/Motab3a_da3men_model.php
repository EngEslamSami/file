<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Motab3a_da3men_model extends CI_Model
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
    public function GetTitleFromFr_bnod_pills_settingByCode($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('code'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }
    public function GetTitleFromFr_bnod_pills_setting($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('from_id'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }
    public function select_all_by_fr_all_pills_all_deported($arr)
    {
        $this->db->select('*');
        $this->db->from('fr_all_pills');
        $this->db->order_by("id", "DESC");
        $this->db->where('deport_sand_qabd', 1);
        $this->db->where($arr);

        if ($_SESSION['role_id_fk'] == 1) {

            if ($_SESSION['user_id'] == 101) {
                $this->db->where('publisher', $_SESSION['user_id']);
            } elseif ($_SESSION['user_id'] == 19) {
            } else {

            }
        } elseif ($_SESSION['role_id_fk'] == 3) {
            if ($_SESSION['user_id'] == 69 || $_SESSION['user_id'] == 65 || $_SESSION['user_id'] == 94) {
            } else {
                $this->db->where('publisher', $_SESSION['user_id']);
            }
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->pill_type_title = $this->GetTitleFromFr_bnod_pills_setting($row->pill_type);

                $data[$x]->band_title = $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);
                if (!empty($row->bnd_type2)) {
                    $data[$x]->band_title2 = $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type2);

                }

                $x++;
            }
            return $data;
        } else {
            return 0;
        }

    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }


    public function insert_motab3a()
    {

        //insert
        $arr =array(1=>'سيئ',2=>'جيد',3=>'جيد جدا',4=>'ممتاز',5=>'ممتاز');
        $data['pill_id_fk'] = $this->chek_Null($this->input->post('pill_id_fk'));
        $data['pill_num_fk'] = $this->chek_Null($this->input->post('pill_num_fk'));
        $data['day_date_ar'] = $this->chek_Null($this->input->post('day_date_ar'));
        $data['day_date'] = strtotime($this->input->post('day_date_ar'));
        $data['waqt_etsal'] = $this->chek_Null($this->input->post('waqt_etsal'));
        $data['natega_etsal'] = $this->chek_Null($this->input->post('natega_etsal'));
        $data['entba3_for_gam3ia'] = $this->chek_Null($this->input->post('entba3_for_gam3ia'));
        $data['opinion_khedma'] = $this->chek_Null($this->input->post('opinion_khedma'));
        $data['emp_taqeem_fk'] = $this->chek_Null($this->input->post('emp_taqeem_fk'));
        $data['emp_taqeem_n'] = $this->chek_Null($arr[$this->input->post('emp_taqeem_fk')]);
        $data['notes'] = $this->chek_Null($this->input->post('notes'));

        $data['date'] = date('Y-m-d');
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('fr_pills_motab3a_da3men', $data);
        //update
        $update['pills_da3men'] = 1;
        $this->db->where('id', $this->input->post('pill_id_fk'));
        $this->db->update('fr_all_pills', $update);
    }



    public  function update_motab3a(){

        $this->db->where('pill_id_fk', $this->input->post('pill_id_fk'));
        $this->db->delete('fr_pills_motab3a_da3men');
        $arr =array(1=>'سيئ',2=>'جيد',3=>'جيد جدا',4=>'ممتاز',5=>'ممتاز');

        $data['natega_etsal'] = $this->chek_Null($this->input->post('natega_etsal'));
        $data['entba3_for_gam3ia'] = $this->chek_Null($this->input->post('entba3_for_gam3ia'));
        $data['opinion_khedma'] = $this->chek_Null($this->input->post('opinion_khedma'));
        $data['emp_taqeem_fk'] = $this->chek_Null($this->input->post('emp_taqeem_fk'));
        $data['emp_taqeem_n'] = $this->chek_Null($this->input->post('emp_taqeem_n'));
        $data['notes'] = $this->chek_Null($this->input->post('notes'));

        $data['pill_id_fk'] = $this->chek_Null($this->input->post('pill_id_fk'));
        $data['pill_num_fk'] = $this->chek_Null($this->input->post('pill_num_fk'));
        $data['day_date_ar'] = $this->chek_Null($this->input->post('day_date_ar'));
        $data['day_date'] = strtotime($this->input->post('day_date_ar'));
        $data['waqt_etsal'] = $this->chek_Null($this->input->post('waqt_etsal'));
        $data['natega_etsal'] = $this->chek_Null($this->input->post('natega_etsal'));
        $data['entba3_for_gam3ia'] = $this->chek_Null($this->input->post('entba3_for_gam3ia'));
        $data['opinion_khedma'] = $this->chek_Null($this->input->post('opinion_khedma'));
        $data['emp_taqeem_fk'] = $this->chek_Null($this->input->post('emp_taqeem_fk'));
        $data['emp_taqeem_n'] = $this->chek_Null($arr[$this->input->post('emp_taqeem_fk')]);
        $data['notes'] = $this->chek_Null($this->input->post('notes'));

        $data['date'] = date('Y-m-d');
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);


        $this->db->insert('fr_pills_motab3a_da3men', $data);




    }

    public function getById($id){
        $h = $this->db->get_where('fr_pills_motab3a_da3men', array('pill_id_fk'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row();
        }else{
            return false;
        }
    }
}


