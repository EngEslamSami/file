<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 29/07/2019
 * Time: 01:18 م
 */

class Gam3ia_omomia_model extends CI_Model
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

    public function get_id($table, $where, $value, $select)
    {
        $query = $this->db->get_where($table, array($where => $value));
        if ($query->num_rows() > 0) {
            return $query->row()->$select;
        }
        return 0;
    }

    public function get_count($table, $where_arr)
    {
        $count = $this->db->where($where_arr)->count_all_results($table);
        return $count;
    }

    public function GetFromGeneral_assembly_settings($type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_areas()
    {
        $this->db->where('from_id_fk', 0);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;

            }
            return $data;
        }
        return false;
    }

    public function select_residentials()
    {
        $this->db->where('from_id_fk !=', 0);

        $this->db->order_by("in_order", "asc");

        $query = $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function GetFromEmployees_settings($type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);


                $i++;
            }
            return $data;
            //  return $query->row();
        }
        return 0;
    }

    public function get_odwiat($id)
    {
        $this->db->where('member_id_fk', $id);
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_odwiat');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        }
        return false;


    }

    public function update($files, $id)
    {

        if (!empty($files)) {
            foreach ($files as $name => $file) {
                if (!empty($file)) {
                    $data[$name] = $this->chek_Null($file);
                }
            }

        }

        /* if (!empty($morfaq)) {
             $arr_name_db = array('morfaq1', 'morfaq2', 'morfaq3', 'morfaq4');
             foreach ($arr_name_db as $key => $item) {
                 if (isset($morfaq[$key])) {
                     $data[$item] = $this->chek_Null($morfaq[$key]);
                 } else {
                     $data[$item] = '';

                 }
             }
         }*/


        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));


        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['gns'] = $this->chek_Null($this->input->post('gns'));

        $gns = $this->input->post('gns');
        $gns_title = $this->get_id('employees_settings', 'id_setting', $gns, 'title_setting');

        $data['gns_title'] = $gns_title;


        $data['laqb_fk'] = $this->chek_Null($this->input->post('laqb_fk'));
        $laqb_fk = $this->input->post('laqb_fk');
        $laqb_title = $this->get_id('md_settings', 'id_setting', $laqb_fk, 'title_setting');
        $data['laqb_title'] = $laqb_title;

        $data['gnsia_fk'] = $this->chek_Null($this->input->post('gnsia_fk'));

        $gnsia_fk = $this->input->post('gnsia_fk');
        $gnsia_title = $this->get_id('employees_settings', 'id_setting', $gnsia_fk, 'title_setting');

        $data['gnsia_title'] = $gnsia_title;


        $data['hala_egtma3ia_fk'] = $this->chek_Null($this->input->post('hala_egtma3ia_fk'));
        $hala_egtma3ia_fk = $this->input->post('hala_egtma3ia_fk');
        $hala_egtma3ia_title = $this->get_id('employees_settings', 'id_setting', $hala_egtma3ia_fk, 'title_setting');

        $data['hala_egtma3ia_title'] = $hala_egtma3ia_title;
        $data['card_num'] = $this->chek_Null($this->input->post('card_num'));

        $data['geha_esdar_fk'] = $this->chek_Null($this->input->post('geha_esdar_fk'));
        $geha_esdar_fk = $this->input->post('geha_esdar_fk');
        $geha_esdar_title = $this->get_id('employees_settings', 'id_setting', $geha_esdar_fk, 'title_setting');
        $data['geha_esdar_title'] = $geha_esdar_title;

        $data['esdar_date_m'] = $this->chek_Null($this->input->post('esdar_date_m'));
        $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));

        $data['birth_date_m'] = $this->chek_Null($this->input->post('birth_date_m'));
        $array_date_m = explode("/", $data['birth_date_m']);
        $data['birth_date_m_y'] = $this->chek_Null($array_date_m[2]);

        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));
        $array_date_h = explode("/", $data['birth_date_h']);
        $data['birth_date_h_y'] = $this->chek_Null($array_date_h[2]);

        $data['birth_date'] = strtotime($this->chek_Null($this->input->post('birth_date_m')));

        $data['jwal'] = $this->chek_Null($this->input->post('jwal'));
        $data['jwal_another'] = $this->chek_Null($this->input->post('jwal_another'));

        $data['madina_fk'] = $this->chek_Null($this->input->post('madina_fk'));
        $madina_fk = $this->input->post('madina_fk');
        $madina_title = $this->get_id('cities', 'id', $madina_fk, 'name');
        $data['madina_title'] = $madina_title;

        $data['hai_fk'] = $this->chek_Null($this->input->post('hai_fk'));
        $hai_fk = $this->input->post('hai_fk');
        $hai_title = $this->get_id('cities', 'id', $hai_fk, 'name');
        $data['hai_title'] = $hai_title;

        $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
        $data['enwan_watni'] = $this->chek_Null($this->input->post('enwan_watni'));
        $data['email'] = $this->chek_Null($this->input->post('email'));

        $data['daraga_3elmia_fk'] = $this->chek_Null($this->input->post('daraga_3elmia_fk'));
        $daraga_3elmia_fk = $this->input->post('daraga_3elmia_fk');
        $daraga_3elmia_title = $this->get_id('employees_settings', 'id_setting', $daraga_3elmia_fk, 'title_setting');
        $data['daraga_3elmia_title'] = $daraga_3elmia_title;

        $data['moahel_3elmi_fk'] = $this->chek_Null($this->input->post('moahel_3elmi_fk'));

        $moahel_3elmi_fk = $this->input->post('moahel_3elmi_fk');
        $moahel_3elmi_title = $this->get_id('employees_settings', 'id_setting', $moahel_3elmi_fk, 'title_setting');
        $data['moahel_3elmi_title'] = $moahel_3elmi_title;


        $data['hya_3elmia_fk'] = $this->chek_Null($this->input->post('hya_3elmia_fk'));
        $data['mehna_fk'] = $this->chek_Null($this->input->post('mehna_fk'));
        $mehna_fk = $this->input->post('mehna_fk');
        $mehna_title = $this->get_id('md_settings', 'id_setting', $mehna_fk, 'title_setting');
        $data['mehna_title'] = $mehna_title;

        if ($this->input->post('geha_amal')) {
            $data['geha_amal'] = $this->chek_Null($this->input->post('geha_amal'));
        }
        if ($this->input->post('enwan_amal')) {
            $data['enwan_amal'] = $this->chek_Null($this->input->post('enwan_amal'));
        }

        if ($this->input->post('hatf_amal')) {
            $data['hatf_amal'] = $this->chek_Null($this->input->post('hatf_amal'));
        }

        $data['map_google_lng'] = $this->chek_Null($this->input->post('map_google_lng'));
        $data['map_google_lat'] = $this->chek_Null($this->input->post('map_google_lat'));


         $data['memb_user_name'] = $this->chek_Null($this->input->post('user_name'));
        $data['memb_password'] =  sha1(md5($this->input->post('user_password')));


        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);

        //  print_r($data);


    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('md_all_gam3ia_omomia_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    }


    public function get_all_emp()
    {
        $this->db->order_by('emp_code');
        $this->db->where('employee_type', 1);
        $query = $this->db->get('employees');

        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->job_title = $this->get_id('all_defined_setting', 'defined_id', $row->degree_id, 'defined_title');
                $data[$i]->edara_name = $this->get_id('department_jobs', 'id', $row->administration, 'name');
                $data[$i]->qsm_name = $this->get_id('department_jobs', 'id', $row->department, 'name');
                $i++;
            }
            return $data;
        }

    }

    public function getMembers3($arr)
    {
        $query = $this->db->select('f_members.first_halet_kafala,f_members.second_kafala_type,f_members.second_halet_kafala,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($arr)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $not_guaranteed = 0;
            $guaranteed = 0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();

                if ($row->categoriey_member == 2) {

                    if ($row->first_kafala_type == 0) {

                        $not_guaranteed = $not_guaranteed + 1;

                    }


                    if ($row->first_kafala_type == 1) {

                        if ($row->first_halet_kafala == 2) {

                            $not_guaranteed = $not_guaranteed + 1;

                        } elseif ($row->first_halet_kafala == 1) {
                            $guaranteed = $guaranteed + 1;

                        }

                    }

                    if ($row->first_kafala_type == 2) {

                        if ($row->first_halet_kafala == 2) {

                            $not_guaranteed = $not_guaranteed + 1;

                        } elseif ($row->first_halet_kafala == 1) {
                            $guaranteed = $guaranteed + 1;

                        }
                    }


                    if ($row->second_kafala_type == 2) {


                        if ($row->second_halet_kafala == 2) {

                            $not_guaranteed = $not_guaranteed + 1;

                        } elseif ($row->second_halet_kafala == 1) {
                            $guaranteed = $guaranteed + 1;

                        }
                    }

                    if ($row->second_kafala_type == 0) {

                        $not_guaranteed = $not_guaranteed + 1;

                    }


                }
                $x++;
            }
            $values['num'] = $query->num_rows();
            $values['guaranteed'] = round($guaranteed / 2);

            $values['not_guaranteed'] = round($not_guaranteed / 2);
            return $values;
        } else {
            return 0;
        }


    }

    public function getMembersArmal2($arr)
    {
        $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
     files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
     ')
            ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
            ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
            ->where($arr)
            ->where('basic.file_status', 1)
            ->get('mother');
        if ($query->num_rows() > 0) {
            $not_guaranteed = 0;
            $guaranteed = 0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();
                $date_of_now = strtotime(date('Y-m-d'));


                if ($row->first_halet_kafala == 2) {

                    $not_guaranteed = $not_guaranteed + 1;

                } elseif ($row->first_halet_kafala == 1) {
                    $guaranteed = $guaranteed + 1;

                } else {

                    $not_guaranteed = $not_guaranteed + 1;

                }

                $data[$x]->guaranteed = round($guaranteed);
                $data[$x]->not_guaranteed = round($not_guaranteed);
                $x++;
            }

            $values['num'] = $query->num_rows();
            $values['guaranteed'] = round($guaranteed);
            $values['not_guaranteed'] = round($not_guaranteed);
            return $values;
        } else {
            return 0;
        }


    }

    public function getMembers2($arr)
    {
        $query = $this->db->select('f_members.first_halet_kafala,f_members.second_halet_kafala,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($arr)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $not_guaranteed = 0;
            $guaranteed = 0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();
                if ($row->categoriey_member == 3) {

                    if ($row->first_halet_kafala == 2) {

                        $not_guaranteed = $not_guaranteed + 1;

                    } elseif ($row->first_halet_kafala == 1) {
                        $guaranteed = $guaranteed + 1;

                    } elseif ($row->first_halet_kafala == 0) {

                        $not_guaranteed = $not_guaranteed + 1;

                    }

                }

                $x++;
            }
            $values['num'] = $query->num_rows();
            $values['guaranteed'] = round($guaranteed);
            $values['not_guaranteed'] = round($not_guaranteed);
            return $values;

        } else {
            return 0;
        }


    }

    public function GetAll()
    {
        $data['aytam'] = $this->getMembers3(
            array('categoriey_member' => 2, 'persons_status' => 1));
        $data['armal'] = $this->getMembersArmal2(
            array('mother.categoriey_m' => 1, 'mother.halt_elmostafid_m' => 1, 'mother.person_type' => 62));
        $data['mostafed'] = $this->getMembers2(
            array('categoriey_member' => 3, 'persons_status' => 1));
        return $data;
    }


    public function check_login()
    {
        $memb_user_name = $this->input->post('memb_user_name');
        $pass = sha1(md5($this->input->post('memb_password')));
        $this->db->where('memb_user_name', $memb_user_name);
         $this->db->where('memb_password',$pass);
         $this->db->where('suspend',1);
        $q = $this->db->get('md_all_gam3ia_omomia_members_accounts')->row_array();
        //$q = $this->db->where('memb_user_name', $memb_user_name)->get('md_all_gam3ia_omomia_members_accounts')->row_array();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_by_member_id($val, $field, $table)
    {
        $this->db->where($field, $val);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }


    public function get_arf_orders()
    {
        $data = array();
        for ($x = 1; $x <= 12; $x++) {
            $this->db->select_sum('total_value');

            $this->db->where('mon_melady', $x);

           // $this->db->where('sarf_date', $x);

            $query = $this->db->get('finance_sarf_order');

            if ($query->num_rows() > 0) {

                array_push($data, $query->row()->total_value);

            } else {
                array_push($data, 0);
            }

        }
        return $data;
    }
/*****************************************************************************/



    public function get_all_files()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
    public function get_all_files_active()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $this->db->where("file_status", 1);
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function get_all_files_non_active()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend", 4);
        $this->db->where("file_status", 4);
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }




    public function get_all_talabat()
    {
        $this->db->select("*");
        $this->db->from("basic");
        $this->db->where("final_suspend !=", 4);
   
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

/*******************************************/
  

    public function get_mostafed(){
            
      $this->db->select('basic.* , f_members.mother_national_num_fk ,f_members.id');
        $this->db->from("basic");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num',"left");
            
            $this->db->where("basic.final_suspend",4); // ""
           $this->db->where("basic.file_status", 1);
            $this->db->where("f_members.categoriey_member ",3);
           // $this->db->where("halt_elmostafid_member",1);
              $this->db->where("f_members.persons_status",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }


    public function get_yatem(){
            
      $this->db->select('basic.* , f_members.mother_national_num_fk ,f_members.id');
        $this->db->from("basic");
        $this->db->join('f_members', 'f_members.mother_national_num_fk = basic.mother_national_num',"left");
            
            $this->db->where("basic.final_suspend",4); // ""
           $this->db->where("basic.file_status", 1);
            $this->db->where("f_members.categoriey_member ",2);
           // $this->db->where("halt_elmostafid_member",1);
              $this->db->where("f_members.persons_status",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }






    public function get_mother_num(){
            
      $this->db->select('basic.* , mother.mother_national_num_fk ,mother.id');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            
            $this->db->where("basic.final_suspend",4); // ""
           $this->db->where("basic.file_status", 1);
            $this->db->where("mother.categoriey_m ",1);
              $this->db->where("mother.halt_elmostafid_m",1);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }

/************************/

   public function update_note($id)
    {

        $data['note'] = $this->chek_Null($this->input->post('note'));

        $this->db->where('id', $id);
        $this->db->update('md_all_gam3ia_omomia_members', $data);


    }

    public function get_all_da3wat()
    {
        $galsa_rkm = $this->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        return $this->db->where('mem_id_fk', $_SESSION['memb_id_fk'])
            ->where('galsa_rkm', $galsa_rkm)
            ->get('md_da3wat_gam3ia_omomia')->row();
    }

    public function dawa_reply($file)
    {
        $data['action_dawa'] = $this->chek_Null($this->input->post('action_dawa'));
        if ($data['action_dawa'] == 3) {
            $data['mofawad_name'] = $this->chek_Null($this->input->post('mofawad_name'));
            $data['mofawad_card_num'] = $this->chek_Null($this->input->post('mofawad_card_num'));
            $data['mofawad_moefaq'] = $file;

        } else {
            $data['mofawad_name'] = null;
            $data['mofawad_card_num'] = null;
            $data['mofawad_moefaq'] = null;
        }

        $this->db->where('mem_id_fk', $_SESSION['memb_id_fk'])
            ->update('md_da3wat_gam3ia_omomia', $data);


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








}