<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 16/06/2019
 * Time: 09:34 ص
 */

class Sanf_movement_model extends CI_Model
{
    public function get_asnaf()
    {
        $query = $this->db->select('st_asnaf.*,st_setting`.`id_setting`,st_setting`.`title_setting`')
            ->from('st_setting')
            ->where('st_setting`.`type`', 2)
            ->join('st_asnaf', 'st_asnaf.whda = st_setting`.`id_setting`')->get()->result_array();

        if (!empty($query)) {
            return $query;
        }
        return 0;
    }

    public function get_storage($id)
    {
        $this->db->where('type', $id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

    public function compare_func($a, $b)
    {
        if ($a->ezn_date == $b->ezn_date) {
            return 0;
        }
        return ($a->ezn_date < $b->ezn_date) ? -1 : 1;
        // You can apply your own sorting logic here.
    }

    public function search()
    {

        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $sanf_code = $this->input->post('sanf_code');
        $storage_fk = $this->input->post('storage_fk');
        $where_arr = array();
        if (!empty($storage_fk)) {
            $where_arr['storage_fk'] = $storage_fk;
        }
        if (!empty($date_from)) {
            $where_arr['ezn_date>='] = strtotime($date_from);
        }
        if (!empty($date_to)) {
            $where_arr['ezn_date<='] = strtotime($date_to);
        }

        if (!empty($sanf_code)) {
            $where_arr['sanf_code'] = $sanf_code;
        }
        $ezn_edafa = $this->db->select('st_ezn_edafa.ezn_date,st_ezn_edafa.ezn_date_ar,st_ezn_edafa.type_ezn,st_ezn_edafa.ezn_rkm,st_ezn_edafa.person_name,
       st_ezn_edafa_details.sanf_amount,st_ezn_edafa_details.sanf_code ')->where($where_arr)->order_by('ezn_date ASC')
            ->join('st_ezn_edafa_details', 'st_ezn_edafa_details.ezn_rkm_fk=st_ezn_edafa.ezn_rkm')->get('st_ezn_edafa')->result();

        $ezn_sarf = $this->db->select('st_ezn_sarf.ezn_date,st_ezn_sarf.ezn_date_ar,st_ezn_sarf.ezn_rkm,st_ezn_sarf.sarf_to_name,
        st_ezn_sarf_details.sanf_amount,st_ezn_sarf_details.sanf_code')->where($where_arr)->order_by('ezn_date ASC')
            ->join('st_ezn_sarf_details', 'st_ezn_sarf_details.ezn_rkm_fk=st_ezn_sarf.ezn_rkm')->get('st_ezn_sarf')->result();
        $x = 0;
        $data = array();
        $type_ezn = array(1 => 'تبرعات عينية', 2 => 'مشتريات عينية');
        if (!empty($ezn_edafa)) {
            foreach ($ezn_edafa as $item) {
                $data[$x] = $item;
                $data[$x]->ezn_movement = $type_ezn[$item->type_ezn];
                $data[$x]->ezn_person = $item->person_name;
                $data[$x]->import_amount = $item->sanf_amount;
                $data[$x]->export_amount = 0;
                $data[$x]->ezn_type = 'اضافة';
                $x++;
            }
        }
        if (!empty($ezn_sarf)) {
            foreach ($ezn_sarf as $item) {
                $data[$x] = $item;
                $data[$x]->ezn_movement = 'مساعدات عينية';
                $data[$x]->ezn_person = $item->sarf_to_name;
                $data[$x]->export_amount = $item->sanf_amount;
                $data[$x]->import_amount = 0;
                $data[$x]->ezn_type = 'صرف';
                $x++;
            }
        }

        usort($data, function ($a, $b) {
            if ($a->ezn_date == $b->ezn_date) {
                return 0;
            }
            return ($a->ezn_date < $b->ezn_date) ? -1 : 1;
            // You can apply your own sorting logic here.
        });

        return $data;
    }


}