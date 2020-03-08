<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 10/02/2019
 * Time: 12:06 م
 */

class Family_web_profile extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

    }

//---------------------------------------------------
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $out = '';
            return $out;
        } else {
            return $post_value;
        }
    }

    public function get_family_details($national_num)
    {
        $q = $this->db->select('basic.file_num,basic.id as order_num,
        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.m_mob,mother.m_marital_status_id_fk,
        father.full_name as father_name,father.f_national_id,
        f_members.member_full_name,f_members.member_card_num')
            ->from('mother')->where('mother.mother_national_num_fk', $national_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->where('basic.final_suspend', 4)
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')
            ->join('f_members', 'f_members.mother_national_num_fk = mother.mother_national_num_fk')->get()->result();
        if (!empty($q)) {
//            foreach ($q as $key => $row) {
//                $q[$key] = $q;
            $q['nasebElfard'] = $this->getNaseb($q[0]->mother_national_num_fk, $q[0]->categoriey_m);
//            }
            return $q;
        }

//        ->where('mother.m_marital_status_id_fk!=', 1951)

    }

    public function get_cat()
    {
        $q = $this->db->get('family_category')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_cat_by($id)
    {
        $q = $this->db->where('id', $id)->get('family_category')->row();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }

    public function insert_service()
    {
        $data['name_ser'] = $this->input->post('name_ser');
        $data['description_ser'] = $this->input->post('description_ser');
        $data['cat_ser'] = $this->input->post('cat_ser');
        $d = serialize($this->input->post('input_show'));
        $data['input_show'] = $d;
        $this->db->insert('pr_service_setting_web', $data);
        $insert_id = $this->db->insert_id();
        $this->insert_doc($insert_id);
        $this->insert_cond($insert_id);
    }
    public function update_service($id)
    {
        $data['name_ser'] = $this->input->post('name_ser');
        $data['description_ser'] = $this->input->post('description_ser');
        $data['cat_ser'] = $this->input->post('cat_ser');
        $d = serialize($this->input->post('input_show'));
        $data['input_show'] = $d;
        $this->db->where('id',$id)->update('pr_service_setting_web', $data);
        $this->db->where('ser_id_fk',$id)->delete('pr_decoment_asked');
        $this->db->where('ser_id_fk',$id)->delete('pr_condition_asked');
        $this->insert_doc($id);
        $this->insert_cond($id);
    }

    public function service_setting_delete($id)
    {
        $this->db->where('id', $id)->delete('pr_service_setting_web');
        $this->db->where('ser_id_fk', $id)->delete('pr_decoment_asked');
        $this->db->where('ser_id_fk', $id)->delete('pr_condition_asked');
        $this->db->where('ser_id_fk', $id)->delete('pr_category_service_setting');
        $this->db->where('cat_id_fk', $id)->delete('pr_description_services');
    }

    public function insert_doc($insert_id)
    {
        $docs = $this->input->post('docm_asked');
        if (!empty($docs)) {
            foreach ($docs as $doc) {
                $data['ser_id_fk'] = $insert_id;
                $data['doc_asked'] = $doc;
                $this->db->insert('pr_decoment_asked', $data);
            }
        }
    }

    public function insert_cond($insert_id)
    {
        $conds = $this->input->post('cond_asked');
        if (!empty($conds)) {
            foreach ($conds as $cond) {
                $data['ser_id_fk'] = $insert_id;
                $data['cond_asked'] = $cond;
                $this->db->insert('pr_condition_asked', $data);
            }
        } else {
            return false;
        }
    }

    public function get_cond_ser($ser_id)
    {
        $q = $this->db->where('ser_id_fk', $ser_id)->get('pr_condition_asked')->result();
        if (!empty($q))
            return $q;
        else
            return false;
    }

    public function get_doc_ser($ser_id)
    {
        $q = $this->db->where('ser_id_fk', $ser_id)->get('pr_decoment_asked')->result();
        if (!empty($q))
            return $q;
        else
            return false;
    }

    public function details_service()
    {
        $q = $this->db->get('pr_service_setting_web')->result();
        if (!empty($q)) {
//            foreach ($q as $key => $row) {
//                $q[$key]->input_show = unserialize($row->input_show);
//                $q[$key]->doc = $this->get_doc_ser($row->id);
//                $q[$key]->con = $this->get_cond_ser($row->id);
//            }
            return $q;
        } else
            return false;
    }

    public function details_service_by($id)
    {
        $q = $this->db->where('id', $id)->get('pr_service_setting_web')->row();
        if (!empty($q)) {
//            foreach ($q as $key => $row) {
            $q->input_show = unserialize($q->input_show);
            $q->doc = $this->get_doc_ser($q->id);
            $q->con = $this->get_cond_ser($q->id);
            $q->cat_ser = $this->get_cat_by($q->cat_ser);
//            }
            return $q;
        } else
            return false;
    }

    public function insert_cats()
    {
        $insert_id = $this->input->post('service');
        $conds = $this->input->post('cat_serv');
//        if (!empty($conds)) {
//            foreach ($conds as $cond) {
        $data['ser_id_fk'] = $insert_id;
        $data['cat_name'] = $conds;
        $this->db->insert('pr_category_service_setting', $data);

//            }
//        } else {
//            return false;
//        }
    }

    public function get_services()
    {
        $q = $this->db->get('pr_service_setting_web')->result();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }

    public function get_services_by($id)
    {
        $q = $this->db->where('id', $id)->get('pr_service_setting_web')->row();
        if (!empty($q)) {
            $q->input_show = unserialize($q->input_show);
            return $q;
        } else {
            return false;
        }
    }

    public function getf2at_service($id)
    {
        $q = $this->db->select('pr_category_service_setting.*,pr_service_setting_web.id as ser_id ,pr_service_setting_web.name_ser')
            ->join('pr_service_setting_web', 'pr_category_service_setting.ser_id_fk=pr_service_setting_web.id')
            ->where('ser_id_fk', $id)->get('pr_category_service_setting')->result();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }

    public function get_desc_f2at_service($id)
    {
        $q = $this->db->where('cat_id_fk', $id)->get('pr_description_services')->result();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }

    public function insert_service_desc()
    {
        $data['ser_id_fk'] = $this->input->post('service');
        $data['cat_id_fk'] = $this->input->post('cat_ser');
        $data['description'] = $this->input->post('description_ser');
        $this->db->insert('pr_description_services', $data);

    }

    public function getNaseb($mother_national_num_fk, $categoriey_m)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total_income = 0;
            $total_duties = 0;
            $count = 0;
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {

                if ($row->affect == 1 && $row->type == 1) {
                    $total_income += $row->value;
                }
                if ($row->affect == 1 && $row->type == 2) {
                    $total_duties += $row->value;
                }

            }
            if ($categoriey_m == 1 || $categoriey_m == 2) {
                $count = $this->sum_mosfed_in_mother($mother_national_num_fk);
            }
            $member_num = $this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
            if ($member_num == 0) {
                $member_num = 1;
            }
            $total = $total_income - $total_duties;
            $data['naseb'] = $total / $member_num;
            $data['f2a'] = $this->GetF2a_data($data['naseb']);

            return $data;

        }
        return 0;
    }


    public function sum_mosfed_in_mother($mother_national_num_fk)
    {

        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $this->db->where('person_type', 62);
        $this->db->where('halt_elmostafid_m', 1);
        $query = $this->db->get();

        return $rowcount = $query->num_rows();


    }


    public function sum_mosfed_in_f_members($mother_national_num_fk)
    {

        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $this->db->where('member_person_type', 62);
        $this->db->where('halt_elmostafid_member', 1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }

    public function GetF2a_data($value)
    {
        $this->db->select("id,title,from,to,color");
        $this->db->where('from <=', $value);
        $this->db->where('to >=', $value);
        $query = $this->db->get("family_category");
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return 0;
        }

    }

    public function add_family_order_web()
    {
        $data['family_num'] = $this->input->post('family_num');
        $data['family_order_date_ar'] = $this->input->post('family_order_date');
        $data['mother_national_num_fk'] = $this->input->post('mother_national_num_fk');
        $data['m_mob'] = $this->input->post('m_mob');
        $data['ser_order'] = $this->input->post('ser_order');
        $data['family_order_date'] = strtotime($this->input->post('family_order_date'));
        $this->db->insert('pr_family_order_web', $data);
        $insert_id = $this->db->insert_id();
        $this->add_family_order_details_web($insert_id, $data['ser_order']);

    }

    public function add_family_order_details_web($id, $ser_order)
    {
        $d = $this->input->post('desc_cat_ser_order');
        if (!empty($d)) {
            foreach ($d as $key => $doc) {
                $data['family_num_order_fk'] = $id;
                $data['family_ser_order_fk'] = $ser_order;
                $data['desc_cat_ser_order'] = $this->input->post('desc_cat_ser_order')[$key];
                $data['cat_ser_order'] = $this->input->post('cat_ser_order')[$key];
                $data['note'] = $this->input->post('note')[$key];
                $this->db->insert('pr_family_order_web_details', $data);
                $insert_id = $this->db->insert_id();
                $this->add_family_order_input_web($insert_id, $data['family_ser_order_fk'], $id);//14-2-om
            }
        }

    }

    public function add_family_order_input_web($id, $ser_order, $order_id)//14-2-om
    {
        $ser = $this->get_services_by($ser_order);
        $inputs = $ser->input_show;
        if (!empty($inputs)) {
            foreach ($inputs as $input) {
                $data['family_num_order_fk'] = $order_id;//14-2-om
                $data['family_details_order_fk'] = $id;
                $data['input_id'] = $input;
                $data['value'] = $this->input->post('' . $input);
                $this->db->insert('pr_input_order_web', $data);

            }
        }
    }

    public function check_login()
    {
        $email = $this->input->post('user_name');
        $pass = sha1(md5($this->input->post('user_pass')));
        $q = $this->db->where('user_name', $email)->where('user_password', $pass)->get('basic')->row_array();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_allf2at_services()
    {
        $q = $this->db->select('pr_service_setting_web.*,pr_category_service_setting.*')
            ->join('pr_service_setting_web', 'pr_category_service_setting.ser_id_fk=pr_service_setting_web.id')
            ->get('pr_category_service_setting')->result();
        if (!empty($q)) {
            return $q;
        }

    }


    public function get_all_desc__services()
    {
        $q = $this->db->select('pr_service_setting_web.name_ser,pr_category_service_setting.cat_name,pr_description_services.*')
            ->join('pr_service_setting_web', 'pr_description_services.ser_id_fk=pr_service_setting_web.id')
            ->join('pr_category_service_setting', 'pr_description_services.cat_id_fk=pr_category_service_setting.id')
//            ->where('pr_description_services.id',$id)
            ->get('pr_description_services')->result();
        if (!empty($q)) {
            return $q;
        }

    }


    public function get_by_desc__services($id)
    {
        $q = $this->db->select('pr_service_setting_web.name_ser,pr_category_service_setting.cat_name,pr_description_services.*')
            ->join('pr_service_setting_web', 'pr_description_services.ser_id_fk=pr_service_setting_web.id')
            ->join('pr_category_service_setting', 'pr_description_services.cat_id_fk=pr_category_service_setting.id')
            ->where('pr_description_services.id', $id)
            ->get('pr_description_services')->row();
        if (!empty($q)) {
            return $q;
        }

    }


    public function getf2at_ser($id)
    {
        $q = $this->db->where('id', $id)->get('pr_category_service_setting')->row();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }


    public function cat_service_setting_delete($id)
    {
        $this->db->where('id', $id)->delete('pr_category_service_setting');
        $this->db->where('cat_id_fk', $id)->delete('pr_description_services');

    }




    public function cat_service_setting_uptate($id)
    {
        $data['ser_id_fk'] = $this->input->post('service');
        $data['cat_name'] = $this->input->post('cat_serv');
        $this->db->where('id', $id)->update('pr_category_service_setting', $data);

    }

    public function desc_cat_service_setting_delete($id)
    {
        $this->db->where('id', $id)->delete('pr_description_services');
    }


    public function desc_cat_service_setting_uptate($id)
    {
        $data['ser_id_fk'] = $this->input->post('service');
        $data['cat_id_fk'] = $this->input->post('cat_ser');
        $data['description'] = $this->input->post('description_ser');
        $this->db->where('id', $id)->update('pr_description_services', $data);

    }

    public function select_all_sarf($mother_num, $from, $to)
    {
        $query = $this->db->select('finance_sarf_order.sarf_date_ar ,finance_sarf_order.method_type ,finance_sarf_order.about,finance_sarf_order.mon_melady 
        ,bnod_help.title as band_name,
       finance_sarf_order_details.value,finance_sarf_order_details.sarf_num_fk ,finance_sarf_order_details.mother_national_num_fk')
            ->from('finance_sarf_order')
            ->join('bnod_help', 'bnod_help.id = finance_sarf_order.bnod_help_fk')
            ->join('finance_sarf_order_details', 'finance_sarf_order_details.sarf_num_fk = finance_sarf_order.sarf_num')
            ->where('finance_sarf_order_details.mother_national_num_fk', $mother_num)
            ->where('finance_sarf_order.sarf_date >=', $from)
            ->where('finance_sarf_order.sarf_date <=', $to)
            ->order_by("finance_sarf_order_details.id", "DESC")
            ->get()->result();
        if (!empty($query)) {
            return $query;
        }
        return false;
    }

    public function get_dtailes($mother_num, $sarf_num)
    {
        $member = $this->db->select('f_members.member_full_name,f_members.categoriey_member,f_members.member_person_type')
            ->where('f_members.mother_national_num_fk', $mother_num)->where('f_members.member_person_type', 62)->where('f_members.halt_elmostafid_member', 1)
            ->get('f_members')->result();
        $mother = $this->db->select(' mother.person_type,mother.full_name as mother_name')
            ->where('mother_national_num_fk', $mother_num)->where('person_type', 62)
            ->get('mother')->row();
        $sarf = $this->db->select(' finance_sarf_order.value_armal ,finance_sarf_order.value_yatem,finance_sarf_order.value_mostafed,
        finance_sarf_order_details.value,finance_sarf_order_details.mother_num,finance_sarf_order_details.adult_num,finance_sarf_order_details.young_num')
            ->where('finance_sarf_order.sarf_num', $sarf_num)
            ->where('finance_sarf_order_details.mother_national_num_fk', $mother_num)
            ->join('finance_sarf_order_details', 'finance_sarf_order_details.sarf_num_fk = finance_sarf_order.sarf_num')
            ->get('finance_sarf_order')->row();

        $details_array = array('member' => $member, 'mother' => $mother, 'sarf' => $sarf);
        return $details_array;


    }

//    14-2-om

    public function select_all_order_web()
    {
        $q = $this->db->select('mother.full_name,mother.mother_national_num_fk,
        pr_service_setting_web.name_ser,
        pr_family_order_web.*')
            ->join('mother', 'mother.mother_national_num_fk =pr_family_order_web.mother_national_num_fk')
            ->join('pr_service_setting_web', 'pr_service_setting_web.id =pr_family_order_web.ser_order')
            ->get('pr_family_order_web')->result();

        if (!empty($q)) {
            return $q;
        }
        return false;

    }

    public function select_details_order_web($order_id)
    {
        $q = $this->db->select(' pr_family_order_web_details.*,
        pr_description_services.description,pr_category_service_setting.cat_name,
        pr_service_setting_web.name_ser,
       ')
            ->join('pr_description_services', 'pr_description_services.id =pr_family_order_web_details.desc_cat_ser_order')
            ->join('pr_category_service_setting', 'pr_category_service_setting.id =pr_family_order_web_details.cat_ser_order')
            ->join('pr_service_setting_web', 'pr_service_setting_web.id =pr_family_order_web_details.family_ser_order_fk')
            ->where('family_num_order_fk', $order_id)
            ->get('pr_family_order_web_details')->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->inputs = $this->get_input_orders($row->id, $order_id);
            }
            return $q;
        }
        return false;

    }

    public function get_input_orders($detail_id, $order_id)
    {

        $q = $this->db->where('family_num_order_fk', $order_id)
            ->where('family_details_order_fk', $detail_id)
            ->get('pr_input_order_web')->result();
        if (!empty($q)) {
            return $q;
        }
        return false;


    }
//    14-2-om
}