<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 02/02/2019
 * Time: 12:30 م
 */

class Season_time_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function insert()
    {
        $season_name_array = array('التوقيت الصيفي', 'التوقيت الشتوي');
        $status_array = array('غير نشط', 'نشط');

        $data['season_num'] = $this->input->post('season_num');
        $data['season_name'] = $season_name_array[$data['season_num']];

        $data['status'] = $this->input->post('status');
        $data['status_name'] = $status_array[$data['status']];

        $data['melady_start_ar'] = $this->input->post('melady_start');
        $data['hejry_start_ar'] = $this->input->post('hejry_start');

        $data['melady_end_ar'] = $this->input->post('melady_end');
        $data['hejry_end_ar'] = $this->input->post('hejry_end');

        $data['melady_start'] = strtotime($data['melady_start_ar']);
        $data['melady_end'] = strtotime($data['melady_end_ar']);

        $data['hejry_start'] = strtotime($data['hejry_start_ar']);
        $data['hejry_end'] = strtotime($data['hejry_end_ar']);

        if ($data['status'] == 1) {
            $this->update_status(0);
        }
        
        $data['season_frq'] = $this->input->post('frq');
        
        $this->db->insert('hr_season_time', $data);
        $this->update_status_season_always();


    }

    public function update_status($status)
    {
        $status_array = array('غير نشط', 'نشط');

        $data['status'] = $status;
        $data['status_name'] = $status_array[$data['status']];
        $this->db->update('hr_season_time', $data);

    }

    public function update($id)
    {
        $season_name_array = array('التوقيت الصيفي', 'التوقيت الشتوي');
        $status_array = array('غير نشط', 'نشط');

        $data['season_num'] = $this->input->post('season_num');
        $data['season_name'] = $season_name_array[$data['season_num']];

        $data['status'] = $this->input->post('status');
        $data['status_name'] = $status_array[$data['status']];

        $data['melady_start_ar'] = $this->input->post('melady_start');
        $data['hejry_start_ar'] = $this->input->post('hejry_start');

        $data['melady_end_ar'] = $this->input->post('melady_end');
        $data['hejry_end_ar'] = $this->input->post('hejry_end');

        $data['melady_start'] = strtotime($data['melady_start_ar']);
        $data['melady_end'] = strtotime($data['melady_end_ar']);

        $data['hejry_start'] = strtotime($data['hejry_start_ar']);
        $data['hejry_end'] = strtotime($data['hejry_end_ar']);

        if ($data['status'] == 1) {
            $this->update_status(0);
        }
          $data['season_frq'] = $this->input->post('frq');
        $this->db->where('id', $id)->update('hr_season_time', $data);
        $this->update_status_season_always();


    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('hr_season_time');
    }

    public function select_row($id)
    {
        $q = $this->db->where('id', $id)->get('hr_season_time')->row();
        if (!empty($q)) {
            return $q;
        }
    }

    public function select()
    {
        $q = $this->db->order_by('id DESC')->get('hr_season_time')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function is_in_page_data($id)
    {
        $q = $this->db->where('season_num', $id)->get('hr_season_time')->row();
        if (!empty($q)) {
            return true;
        }
        return false;
    }

    public function select_avilable_time()
    {
        $q = $season_name_array = array('التوقيت الصيفي', 'التوقيت الشتوي');


        $qq = array();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if (!$this->is_in_page_data($key)) {
                    $qq[$key] = $row;
                }
            }
            return $qq;
        }

    }

    public function update_status_season($new_status, $id)
    {
        if ($new_status == 1) {
            $this->update_status(0);
        } else {
            $this->update_status(1);
        }
        $status_array = array('غير نشط', 'نشط');
        $data['status'] = $new_status;
        $data['status_name'] = $status_array[$new_status];
        $this->db->where('id', $id)->update('hr_season_time', $data);
        $this->update_status_season_always();

    }

    public function update_status_season_always()
    {
        $rows = $this->select();
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $data['season_status'] = $row->status;
                $this->db->where('season_num', $row->id)->update('always_setting', $data);

            }
        }

    }
}