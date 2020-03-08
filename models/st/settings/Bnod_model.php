<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bnod_model extends CI_Model
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

    public function get_all_account_group()
    {
        $query = $this->db->get_where('dalel', array('ttype' => 'إيرادات'));

        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->CountChilds = $this->getCountChilds($row->id);
                $data[$x]->branch = $this->get_branch($row->id);

                $x++;
            }
            return $data;
        }
    }

    public function get_branch($id)
    {
        $this->db->where('parent', $id);
        $query = $this->db->get('dalel');
        $data = array();
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->sub_branch = $this->get_branch($row->id);

            $x++;
        }

        return $data;
    }

    public function get_sub_branch($id)
    {
        $this->db->where('parent', $id);
        $query = $this->db->get('dalel');
        $data = array();
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->branches = $this->get_sub_branch($row->id);
            $x++;
        }

        return $data;
    }

    //===========================================================

    public function getCountChilds($id)
    {
        $count = 0;

        $query = $this->db
            ->select('*')
            ->from('dalel')
            ->where('parent', $id)
            ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() AS $objChild) {
                $count += $this->getCountChilds($objChild->id);
                ++$count;
            }
        }
        return $count;
    }


    public function insert_bnod()
    {
        $select1 = $this->input->post('select1');
        $select2 = $this->input->post('select2');
        $select3 = $this->input->post('select3');
        $select4 = $this->input->post('select4');
        $select1_text = $this->input->post('select1_text');
        $select2_text = $this->input->post('select2_text');
        $select3_text = $this->input->post('select3_text');
        $select4_text = $this->input->post('select4_text');


        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";*/


        if (!$this->code_exite($this->get_code_from_dalel($select1), 1)) {
            $data['code'] = $this->get_code_from_dalel($select1);
            $data['title'] = $select1_text;
            $data['from_id'] = $select1;
            $data['type'] = 1;
            $data['esal'] = 0;
            $data['erad_tabro3'] = 0;
            $data['fe2a'] = 0;
            $data['band'] = 0;
            $this->db->insert('st_bnod_setting', $data);
        }

        if (!$this->code_exite($this->get_code_from_dalel($select2), 2)) {
            $data['code'] = $this->get_code_from_dalel($select2);
            $data['title'] = $select2_text;
            $data['from_id'] = $select2;
            $data['type'] = 2;
            $data['esal'] = $select1;
            $data['erad_tabro3'] = 0;
            $data['fe2a'] = 0;
            $data['band'] = 0;
            $this->db->insert('st_bnod_setting', $data);
        }

        if (!$this->code_exite($this->get_code_from_dalel($select3), 3)) {
            $data['code'] = $this->get_code_from_dalel($select3);
            $data['title'] = $select3_text;
            $data['from_id'] = $select3;
            $data['type'] = 3;
            $data['esal'] = $select1;
            $data['erad_tabro3'] = $select2;
            $data['fe2a'] = 0;
            $data['band'] = 0;
            $this->db->insert('st_bnod_setting', $data);
        }

        if (!$this->code_exite($this->get_code_from_dalel($select4), 4)) {
            $data['code'] = $this->get_code_from_dalel($select4);
            $data['title'] = $select4_text;
            $data['from_id'] = $select3;
            $data['type'] = 4;
            $data['esal'] = $select1;
            $data['erad_tabro3'] = $select2;
            $data['fe2a'] = $select3;
            $data['band'] = $select4;
            $this->db->insert('st_bnod_setting', $data);
        }

    }

    public function code_exite($code, $type)
    {
        $sql = $this->db->where('code', $code)->where('type', $type)->get('st_bnod_setting')->row();
        if (!empty($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_code_from_dalel($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('dalel');
        if ($query->num_rows() > 0) {
            return $query->row()->code;
        } else {
            return false;
        }
    }

    //======================================================

    public function get_from_table()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('st_bnod_setting');
        $x = 0;
        $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->basic = $this->get_name($row->from_id);
                $x++;
            }
            return $data;
        }
    }

    public function get_name($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('dalel');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return "غير محدد";
        }
    }


    public function select_bnod()
    {
        $this->db->where('type', 1);
        $this->db->group_by('from_id');
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->count = $this->count_bnods($row->from_id, 4, 'esal');
                $data[$x]->erads = $this->get_feat($row->from_id, 2, 'esal');


                $x++;
            }
            return $data;
        }
    }

    public function count_bnods($id, $type, $field)
    {
        $this->db->where($field, $id);
        $this->db->where('type', $type);
        $query = $this->db->get('st_bnod_setting');
        return $query->num_rows();
    }

    //===================================================
    public function get_feat($id, $type, $field)
    {

        $this->db->group_by('code');
        $this->db->where($field, $id);
        $this->db->where('type', $type);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->fe2at = $this->get_feat2($row->from_id, 3, 'erad_tabro3');
                $data[$x]->count = $this->count_get_feat2($row->from_id, 4, 'erad_tabro3');


                $x++;


            }
            return $data;
        } else {
            return array();
        }

    }

    public function get_feat2($id, $type, $field)
    {
        $this->db->group_by('code');
        $this->db->where($field, $id);
        $this->db->where('type', $type);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->bond = $this->bond2($row->from_id, 4, 'fe2a');
                $x++;
            }
            return $data;
        } else {
            return array();
        }
    }


    public function count_get_feat2($id, $type, $field)
    {
        $this->db->where($field, $id);
        $this->db->where('type', $type);
        $query = $this->db->get('st_bnod_setting');
        return $query->num_rows();

    }

    public function bond2($id, $type, $field)
    {
        $this->db->where($field, $id);
        $this->db->where('type', $type);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;

                $x++;
            }
            return $data;
        } else {
            return array();
        }
    }


    //====================================================

    public function erad_tabro3($id, $filed)
    {
        $this->db->where($filed, $id);
        $this->db->where('erad_tabro3', 0);
        $this->db->where('fe2a', 0);
        $this->db->where('band', 0);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }

    }

    public function fe2at($id)
    {
        $this->db->group_by('code');
        $this->db->where('erad_tabro3', $id);
        $this->db->where('fe2a', 0);
        $this->db->where('band', 0);
        $query = $this->db->get('st_bnod_setting');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->bnod = $this->get_records($row->from_id);
            }
            return $data;
        } else {
            return array();
        }

    }

    public function get_records($id)
    {

        $this->db->where('fe2a', $id);
        $this->db->where('band', 0);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function bond_tabro3($id)
    {

        $this->db->where('fe2a', $id);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_record($id)
    {
        $row = $this->db->where('id', $id)->get('st_bnod_setting')->row();
        $count_band = $this->count('fe2a', $row->fe2a, 4);
        if ($count_band > 1) {
            $this->db->where('id', $id)->delete('st_bnod_setting');
        } else {
            $this->db->where('id', $id)->delete('st_bnod_setting');
            $count_fe2a = $this->count('erad_tabro3', $row->erad_tabro3, 3);
            if ($count_fe2a > 1) {
                $this->db->where('erad_tabro3', $row->erad_tabro3)->where('from_id', $row->fe2a)->where('type', 3)->delete('st_bnod_setting');
            } else {
                $this->db->where('erad_tabro3', $row->erad_tabro3)->where('from_id', $row->fe2a)->where('type', 3)->delete('st_bnod_setting');
                $count_erad_tabro3 = $this->count('esal', $row->esal, 2);
                if ($count_erad_tabro3 > 1) {
                    $this->db->where('esal', $row->esal)->where('from_id', $row->erad_tabro3)->where('type', 2)->delete('st_bnod_setting');
                } else {
                    $this->db->where('esal', $row->esal)->where('from_id', $row->erad_tabro3)->where('type', 2)->delete('st_bnod_setting');
                    $count_esal = $this->count('from_id', $row->from_id, 1);
                    if ($count_esal > 1) {
                        $this->db->where('from_id', $row->esal)->where('type', 1)->delete('st_bnod_setting');
                    }else{
                        $this->db->where('from_id', $row->esal)->where('type', 1)->delete('st_bnod_setting');

                    }
                }

            }

        }


    }

    public function get_records_by_id($id)
    {
        $this->db->where('parent', $id);
        $query = $this->db->get('dalel');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_bnod($id)
    {
        $band = $this->input->post('band');

        $band = explode('-', $band);
        $data['from_id'] = $band[0];
        $data['title'] = $band[1];
        $this->db->where('id', $id);
        $this->db->update('st_bnod_setting', $data);

    }

    /*public function count($filed, $value, $type)
    {
        $this->db->where($filed, $value);
        $this->db->where('type', $type);
        $query = $this->db->get('st_bnod_setting');
        return $query->num_rows();
    }*/
  public function count($filed, $value, $type, $status = false)
    {
        $this->db->where($filed, $value);
        $this->db->where('type', $type);
        if ($status) {
            $this->db->where('status', $status);
        }
        $query = $this->db->get('st_bnod_setting');
        return $query->num_rows();
    }
    
    
    
    
      public function change_status_for($where_arr, $status)
    {
        $data['status'] = $status;
        $this->db->where($where_arr)->update('st_bnod_setting', $data);

    }

    public function check_status($id, $status)
    {
        $row = $this->db->where('id', $id)->get('st_bnod_setting')->row();
        $count_band = $this->count('fe2a', $row->fe2a, 4, true);
        if ($status == 0) {
            if ($count_band < 1) {
                $this->change_status_for(array('from_id' => $row->fe2a, 'type' => 3), $status);
                $count_fe2a = $this->count('erad_tabro3', $row->erad_tabro3, 3, true);
                if ($count_fe2a < 1) {
                    $this->change_status_for(array('from_id' => $row->erad_tabro3, 'type' => 2), $status);
                    $count_erad_tabro3 = $this->count('esal', $row->esal, 2, true);
                    if ($count_erad_tabro3 < 1) {
                        $this->change_status_for(array('from_id' => $row->esal, 'type' => 1), $status);
                    }
                }
            }
        } else {
            if ($count_band >= 1) {
                $this->change_status_for(array('from_id' => $row->fe2a, 'type' => 3), $status);
                $count_fe2a = $this->count('erad_tabro3', $row->erad_tabro3, 3, true);
                if ($count_fe2a >= 1) {
                    $this->change_status_for(array('from_id' => $row->erad_tabro3, 'type' => 2), $status);
                    $count_erad_tabro3 = $this->count('esal', $row->esal, 2, true);
                    if ($count_erad_tabro3 >= 1) {
                        $this->change_status_for(array('from_id' => $row->esal, 'type' => 1), $status);
                    }

                }

            }
        }


    }

    public function change_status($valu, $id)
    {

        $status = 1 - $valu;
        $data['status'] = $status;
        $this->db->where('id', $id)->update('st_bnod_setting', $data);
        $this->check_status($id, $status);
        return $status;

    }

}