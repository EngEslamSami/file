<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 28/03/2019
 * Time: 10:55 ص
 */

class Ezn_edafa_model extends CI_Model
{

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function getMembersDonors()
    {
        $query = $this->db->select('*')
            ->get('fr_donor')->result_array();
        if (!empty($query)) {
            return $query;
        }
        return 0;
    }
//22-5-om
    public function get_asnaf($store_id)
    {
        $query = $this->db->select('st_asnaf.*,st_setting`.`id_setting`,st_setting`.`title_setting`')
            ->from('st_setting')
            ->where('st_setting`.`type`', 2)
            ->join('st_asnaf', 'st_asnaf.whda = st_setting`.`id_setting`')->get()->result_array();

        if (!empty($query)) {
            foreach ($query as $key => $value) {

                $query[$key]['all_rased'] = $this->get_sanf_rased($value['code'],$store_id);
            }
            return $query;
        }
        return 0;
    }

    public function get_sanf_rased($sanf_code,$store_id)
    {

        $sum_moshtriat_ayni = $this->sum_moshtriat_ayni($sanf_code,$store_id);
        $sum_ayniirasid = $this->sum_ayniirasid($sanf_code,$store_id);
        $sum_ezn_sarf = $this->sum_ezn_sarf($sanf_code, $store_id);
        $sanf_rased = ($sum_moshtriat_ayni + $sum_ayniirasid) - $sum_ezn_sarf;

        return  $sanf_rased;

    }

    public function sum_moshtriat_ayni($sanf_code,$store_id)
    {

        $sql = $this->db->select('SUM(sanf_amount) as sum_moshtriat_ayni')->where('storage_id_fk', $store_id)->where('sanf_code', $sanf_code)->get('st_ezn_edafa_details')->row();
        if (!empty($sql->sum_moshtriat_ayni)) {
            return $sql->sum_moshtriat_ayni;
        } else {
            return 0;
        }
    }

    public function sum_ezn_sarf($sanf_code,$store_id)
    {

        $sql = $this->db->select('SUM(sanf_amount) as sum_ezn_sarf')->where('storage_id_fk', $store_id)->where('sanf_code', $sanf_code)->get('st_ezn_sarf_details')->row();
        if (!empty($sql->sum_ezn_sarf)) {
            return $sql->sum_ezn_sarf;
        } else {
            return 0;
        }
    }

    public function sum_ayniirasid($sanf_code,$store_id)
    {

        $sql = $this->db->select('SUM(sanf_amount) as sum_ayniirasid')->where('sanf_code', $sanf_code)->where('storage_id_fk', $store_id)->get('st_ayniirasid_details')->row();
        if (!empty($sql->sum_ayniirasid)) {
            return $sql->sum_ayniirasid;
        } else {
            return 0;
        }
    }



//
//    public function get_storage()
//    {
//        return $sql = $this->db->select('st_setting`.`id_setting`,st_setting`.`title_setting`,
//        st_edafa_sarf_setting.rkm_hesab,st_edafa_sarf_setting.hesab_name')->from('st_setting')
//            ->where('st_setting`.`type`', 1)
//            ->join('st_edafa_sarf_setting', 'st_edafa_sarf_setting.storage_fk = st_setting`.`id_setting`')->get()->result();
//    }

    public function get_storage($id)
    {
        $this->db->where('type', $id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

    public function get_rkm_ezen()
    {
        $ezn_rkm = $this->db->select_max('ezn_rkm')->get('st_ezn_edafa')->row()->ezn_rkm;
        if (!empty($ezn_rkm)) {
            return $ezn_rkm + 1;
        }
        return 1;
    }

    public function select_st_bnod_setting_by_condition($where = false)
    {
        $this->db->select('*');
        $this->db->from('st_bnod_setting');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_post_tabr3()
    {

        $data['ezn_rkm'] = $this->input->post('ezn_rkm');
        $data['ezn_date_ar'] = $this->input->post('ezn_date');
        $data['ezn_date'] = strtotime($data['ezn_date_ar']);
        $data['storage_fk'] = $this->input->post('storage_fk');
        $data['storage_name'] = $this->get_id("st_setting", 'id_setting', $this->input->post('storage_fk'), "title_setting");
        $data['rkm_hesab'] = $this->input->post('rkm_hesab');
        $data['hesab_name'] = $this->input->post('hesab_name');
        $data['all_value'] = $this->input->post('all_value');

        $data['last_tabro3_date_ar'] = $this->input->post('last_tabro3_date');
        $data['last_tabro3_date'] = strtotime($data['last_tabro3_date_ar']);
        $data['no3_tabro3'] = $this->input->post('no3_tabro3');
        $data['fe2a'] = $this->input->post('fe2a');
        $data['band'] = $this->input->post('band');
        //=========================================
        $data['pay_method'] = $this->input->post('pay_method');
        // $data['supplier_name'] = $this->input->post('supplier_name');
        //  $data['supplier_jwal'] = $this->input->post('jwal');
        $data['type_ezn'] = $this->input->post('type_ezn');
        if ($this->input->post('type_ezn') == 1) {
            $data['person_type'] = 1;
        } elseif ($this->input->post('type_ezn') == 2) {
            $data['person_type'] = 2;
        }
        if ($this->input->post('type_ezn') == 2) {
            $data['person_name'] = $this->input->post('supplier_name');
            //  $data['person_id_fk'] = supplier_fk
            $data['person_id_fk'] = $this->input->post('supplier_fk');
            $data['person_jwal'] = $this->input->post('jwal');
            $data['mostand_rkm'] = $this->input->post('mostand_rkm_m');
        } elseif ($this->input->post('type_ezn') == 1) {
            $data['mostand_rkm'] = $this->input->post('mostand_rkm');
            $data['person_id_fk'] = $this->input->post('motbr3_id_fk');
            $data['person_name'] = $this->input->post('motbr3_name');
            $data['person_jwal'] = $this->input->post('motbr3_jwal');
        }


        //====================================================


        $data['geha_name'] = $this->input->post('geha_name');
        $data['geha_jwal'] = $this->input->post('geha_jwal');
        $data['mostand_date_ar'] = $this->input->post('mostand_date');
        $data['mostand_date'] = strtotime($data['mostand_date_ar']);


        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        return $data;
    }

//22-5-om
    public function get_post_tabr3_sanfe($ezn_rkm_fk,$store_id)
    {

        if (!empty($this->input->post('sanf_code'))) {

            for ($i = 0; $i < count($this->input->post('sanf_code')); $i++) {
                $data['storage_fk'] = $store_id;
                $data['ezn_rkm_fk'] = $ezn_rkm_fk;
                $data['sanf_code'] = $this->input->post('sanf_code')[$i];
                $data['sanf_coade_br'] = $this->input->post('sanf_coade_br')[$i];
                $data['sanf_name'] = $this->input->post('sanf_name')[$i];
                $data['sanf_whda'] = $this->input->post('sanf_whda')[$i];
                $data['sanf_rased'] = $this->input->post('sanf_rased')[$i];
                $data['sanf_amount'] = $this->input->post('sanf_amount')[$i];
                $data['sanf_one_price'] = $this->input->post('sanf_one_price')[$i];
                $data['all_egmali'] = $this->input->post('all_egmali')[$i];
                $data['sanf_salahia_date_ar'] = $this->input->post('sanf_salahia_date')[$i];
                $data['sanf_salahia_date'] = strtotime($data['sanf_salahia_date_ar']);
                $data['lot'] = $this->input->post('lot')[$i];
                $data['rased_hali'] = $this->input->post('rased_hali')[$i];

                $this->db->insert('st_ezn_edafa_details', $data);

            }
        }
    }

    public function insert_tabr3()
    {
        $data = $this->get_post_tabr3();
        $this->db->insert('st_ezn_edafa', $data);
        $this->get_post_tabr3_sanfe($data['ezn_rkm'],$data['storage_fk']);
    }

    public function update($id)
    {
        $data = $this->get_post_tabr3();

        $this->db->where('id', $id)->update('st_ezn_edafa', $data);
        $this->delet_asnafe($data['ezn_rkm']);
        $this->get_post_tabr3_sanfe($data['ezn_rkm'],$data['storage_fk']);
    }
//22-5-om

    public function delet_asnafe($rkm_ezen)
    {
        $this->db->where('ezn_rkm_fk', $rkm_ezen)->delete('st_ezn_edafa_details');
    }

    public function delet_attach($rkm_ezen)
    {
        $this->db->where('ezn_rkm_fk', $rkm_ezen)->delete('st_ezn_edafa_attach');
    }


    public function delete($id, $rkm_ezen)
    {
        $this->delet_asnafe($rkm_ezen);
        $this->delet_attach($rkm_ezen);
        $this->db->where('id', $id)->delete('st_ezn_edafa');

    }

    public function get_all_tabr3()
    {

        $query = $this->db->select('*')->order_by('`ezn_rkm` DESC')
            ->where('finance_deport',0)
            ->get('st_ezn_edafa')->result();
        if (!empty($query)) {
            return $query;
        }
        return 0;
    }

    public function get_one_tabr3($id)
    {

        $query = $this->db->select('*')->where('id', $id)
            ->get('st_ezn_edafa')->row();
        if (!empty($query)) {
            $data['tabr3'] = $query;
            $data['fe2a_title'] = $this->get_band($query->fe2a);
            $data['band_title'] = $this->get_band($query->band);
            $data['no3_tabro3_title'] = $this->get_band($query->no3_tabro3);
            $data['asnaf'] = $this->get_asnafe($query->ezn_rkm);
            $data['attaches'] = $this->get_attach($query->ezn_rkm);
        } else {
            $data['tabr3'] = 0;
            $data['asnaf'] = 0;

        }
        return $data;
    }

    public function get_band($code)
    {

        $sql = $this->db->where('code', $code)->get('st_bnod_setting')->row();
        if (!empty($sql)) {
            return $sql->title;
        } else {
            return " ";
        }

    }

    public function get_asnafe($id)
    {

        $query = $this->db->select('*')->where('ezn_rkm_fk', $id)
            ->get('st_ezn_edafa_details')->result();
        if (!empty($query)) {
            return $query;
        }
        return 0;
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

    public function get_code($id)
    {
        $this->db->where('storage_fk', $id);
        $query = $this->db->get('st_edafa_sarf_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return 0;

    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('st_ezn_edafa');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->details = $this->get_details($row->id);
                $i++;

            }
            return $data;

        }
        return 0;
    }

    public function get_details($id)
    {
        $this->db->where('ezn_rkm_fk', $id);
        $query = $this->db->get('st_ezn_edafa_details');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->salhia = $this->get_id("st_asnaf", 'code', $row->sanf_code, "slahia");
                $i++;
            }
            return $data;
        }
        return 0;

    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    //=============================================
    public function insert_attach($id, $all_img)
    {


        if (!empty($all_img)) {
            $img_count = count($all_img);
            $title = $this->input->post('title');

            for ($a = 0; $a < $img_count; $a++) {
                $files['ezn_rkm_fk'] = $id;
                $files['file'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert('st_ezn_edafa_attach', $files);
            }

        }


    }

    public function get_attach($id)
    {
        $this->db->where('ezn_rkm_fk', $id);
        $query = $this->db->get('st_ezn_edafa_attach');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

    public function delete_attach($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('st_ezn_edafa_attach');
    }


    public function getByarr($field, $valu)
    {
        $this->db->select('*');
        $this->db->from("st_ezn_edafa");
        if ($field == 'person_name' || $field == 'geha_name') {

            $this->db->like($field, $valu, 'both');
        } else {
            $this->db->where($field, $valu);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;

        }
        return false;

    }

    public function select_last_id()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('st_ezn_edafa');
        if ($query->num_rows() > 0) {
            return $query->row()->id + 1;
        } else {
            return false;
        }
    }


    public function get_suppliers()
    {

        $query = $this->db->get('st_suppliers');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

    public function update_status($id) {

        $query = $this->db
        ->select('finance_deport')
        ->from('st_ezn_edafa')
        ->where('id', $id)
        ->get()->row()->finance_deport;
        if ($query==0)
        {  $data['finance_deport']=1;
        }
        else if ($query==1){
        $data['finance_deport']=0;}
      
        $this->db->where('id',$id);
        $this->db->update('st_ezn_edafa',$data);
        return $data['finance_deport'];
    
    }
}