<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 22/08/2019
 * Time: 11:54 ص
 */

class Aktam_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }


//main_data_aktam

    public function get_post($ktm, $ktm_path)
    {
        $edara_code_arr = array(101 => 'الجمعية الاساسية',
            102 => 'الرعاية الاجتماعية ',
            103 => ' الشئون المالية ',
            104 => ' الكفالات والتبرعات  ',
            105 => ' القسم النسائي  ',
            106 => ' العلاقات العامة والإعلام '

        );
        $data['edara_code'] = $this->input->post('edara_code');
        $data['edara_n'] = $edara_code_arr[$data['edara_code']];
        if (!empty($ktm)) {
            $data['ktm'] = $ktm;
        }
        $data['ktm_path'] = $ktm_path;

        return $data;
    }

    public function insert_ktm($ktm, $ktm_path)
    {

        $data = $this->get_post($ktm, $ktm_path);
        $this->db->insert('main_data_aktam', $data);
    }

    public function update_ktm($ktm, $ktm_path, $id)
    {

        $data = $this->get_post($ktm, $ktm_path);
        if (!empty($ktm)) {
            $this->delete_upload($id);
        }
        $this->db->where('id', $id)->update('main_data_aktam', $data);
    }

    public function delete_ktm($id)
    {
        $this->delete_upload($id);
        $this->db->where('id', $id)->delete('main_data_aktam');
    }

    public function get_by($table, $where_arr = false, $select = false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }

    public function delete_upload($id)
    {
        $img = $this->get_by('main_data_aktam', array('id' => $id), 1);
        if (file_exists(FCPATH ."uploads/" . $img->ktm_path . "/" . $img->ktm)) {
            unlink(FCPATH . "uploads/" . $img->ktm_path . "/" . $img->ktm);
        }
        if (file_exists(FCPATH ."uploads/" . $img->ktm_path . '/thumbs/' . $img->ktm)) {
            unlink(FCPATH . "uploads/" . $img->ktm_path . '/thumbs/' . $img->ktm);
        }

    }


    public function get_all_edara(){

        $q = $this->db->select('edara_code')->get('main_data_aktam')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->edara_code);
            }
            return $data;
        }
    }
}