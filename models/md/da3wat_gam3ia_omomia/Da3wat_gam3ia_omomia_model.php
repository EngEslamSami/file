<?php

class Da3wat_gam3ia_omomia_model extends CI_Model
{

/*
    public function get_all_gam3ia_omomia_members()
    {
//        $this->test($members);
        $q = $this->db->select('md_all_gam3ia_omomia_odwiat.no3_odwia_title,md_all_gam3ia_omomia_odwiat.no3_odwia_fk,md_all_gam3ia_omomia_odwiat.rkm_odwia_full,md_all_gam3ia_omomia_odwiat.rkm_odwia,
        md_all_gam3ia_omomia_members.*')
            ->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_gam3ia_omomia_members.id')
            ->get('md_all_gam3ia_omomia_members')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $from = new DateTime($row->birth_date_m);
                $to = new DateTime('today');
                $q[$key]->age = $from->diff($to)->y;
            }
            return $q;
        }
    }*/


    public function get_all_gam3ia_omomia_members()
    {
        $galsa = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');

        $members = $this->get_all_data_members($galsa);
//        $this->test($members);
        $q = $this->db->select('md_all_gam3ia_omomia_odwiat.no3_odwia_title,md_all_gam3ia_omomia_odwiat.no3_odwia_fk,md_all_gam3ia_omomia_odwiat.rkm_odwia_full,md_all_gam3ia_omomia_odwiat.rkm_odwia,
        md_all_gam3ia_omomia_members.*')
            ->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_gam3ia_omomia_members.id')
            ->where_not_in('md_all_gam3ia_omomia_members.id', $members)
            ->get('md_all_gam3ia_omomia_members')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $from = new DateTime($row->birth_date_m);
                $to = new DateTime('today');
                $q[$key]->age = $from->diff($to)->y;
            }
            return $q;
        }
    }
    public function get_by($table, $where_arr, $select)
    {

        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            return $q->$select;
        } else {
            return false;
        }

    }

    public function get_mhawer($galsa_rkm)
    {
        return $this->db->where('glsa_rkm', $galsa_rkm)
            ->get('md_gadwal_a3mal_gam3ia_omomia')->result();
    }

    public function get_da3wa_rkm()
    {
        return $this->db->select_max('da3wa_rkm')
                ->get('md_da3wat_gam3ia_omomia')->row()->da3wa_rkm + 1;
    }

    public function get_all_da3wat()
    {
        return $this->db->get('md_da3wat_gam3ia_omomia')->result();
    }

    public function insert_dawa($id = false)
    {
        if (!empty($_POST['mem_id_fk'])) {
            $names = explode(',', $_POST['memb_name']);
            $ids = explode(',', $_POST['mem_id_fk']);
            $rkms = explode(',', $_POST['mem_rkm_fk']);
            for ($i = 0; $i < sizeof($ids); $i++) {

                $data['da3wa_rkm'] = $this->input->post('da3wa_rkm');
                $data['da3wa_date'] = strtotime($this->input->post('da3wa_date'));
                $data['da3wa_date_ar'] = $this->input->post('da3wa_date');
                $data['no3_egtma3'] = $this->input->post('no3_egtma3');
                $data['galsa_rkm'] = $this->input->post('galsa_rkm');
                $data['mawdo3'] = $this->input->post('mawdo3');
                $data['salam'] = $this->input->post('salam');
                $data['cont_header'] = $this->input->post('cont_header');
                $data['cont_footer'] = $this->input->post('cont_footer');

                $data['end_laqb_fk'] = $this->input->post('end_laqb');
                $data['end_laqb_title'] = $this->get_by('fr_settings', array('type' => 9, 'id_setting' => $data['end_laqb_fk']), 'title_setting');

                $data['mem_id_fk'] = $ids[$i];
                $data['mem_rkm_fk'] = $rkms[$i];
                $data['mem_name'] = $names[$i];

                $data['date'] = strtotime(date('Y-m-d'));
                $data['date_ar'] = date('Y-m-d');
                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

//                echo '<pre>';
//                print_r($data);
//                die;
                if (!empty($id)) {
                        $this->db->where('id', $id)->delete('md_da3wat_gam3ia_omomia');
                }
                $this->db->insert("md_da3wat_gam3ia_omomia", $data);


            }
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

    public function getAllDetails($where_arr)
    {
        $q = $this->db->where($where_arr)
            ->get('md_da3wat_gam3ia_omomia')->row();

        if (!empty($q)) {
            $q->start_laqb = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $q->mem_id_fk), 'laqb_title');
            return $q;
        }
    }

    public function GetFromFr_settings($type)
    {
        $this->db->select('*');
        $this->db->from('fr_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function delete_dawa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_da3wat_gam3ia_omomia');
    }
    
    
    
      public function get_all_data_members($galsa_rkm)
    {
        $q = $this->db->select('mem_id_fk')->where('galsa_rkm', $galsa_rkm)->get('md_da3wat_gam3ia_omomia')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->mem_id_fk);
            }
            return $data;
        }
    }
}