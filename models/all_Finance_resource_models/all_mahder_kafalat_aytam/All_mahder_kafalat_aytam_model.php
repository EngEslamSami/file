<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_mahder_kafalat_aytam_model extends CI_Model
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


    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("fr_all_pills");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id + 1;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function select_last_mahader_num()
    {
        $this->db->select('session_num_fk,session_year');
        $this->db->from("all_mahader_lagna_arch_ended");
        $this->db->order_by("session_num_fk", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }




    public function getfamilyData($arr)
    {
        $this->db->select('file_num,father_name,father_national_num,mother_national_num,
        file_status,process_title');
        $this->db->from("basic");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query->row();
            $query->row()->mostafed_number=$this->getMostafedNum(array('mother_national_num_fk'=>$query->row()->mother_national_num));
            return $query->row();
        } else {
            return false;
        }
    }


    public function getMostafedNum($arr)
    {
        $this->db->select('persons_status,mother_national_num_fk');
        $this->db->from("f_members");
        $this->db->where('persons_status',1);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    public function select_mahder_by_mehwar($arr)
    {
        $this->db->select('session_num_fk,session_year,mehwar_id_fk,file_num,lagna_reason_title');
        $this->db->from("all_mahader_lagna_arch_ended");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->family_data = $this->getfamilyData(array('file_num'=>$row->file_num));
                $x++;}
            return $data;
        } else {
            return false;
        }
    }


    public function select_all_mahder_data()
    {
        $last_magder =$this->select_last_mahader_num();
        if(!empty($last_magder)){
        $this->db->select('session_num_fk,session_year,mehwar_id_fk,mehwar_title');
        $this->db->from("all_mahader_lagna_arch_ended");
        $this->db->where("session_num_fk",$last_magder->session_num_fk);
        $this->db->where("session_year",$last_magder->session_year);
        $this->db->group_by("mehwar_id_fk");
        $this->db->order_by("mehwar_id_fk", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
              //  $data[$x] = $row->mehwar_id_fk;
                $data[$x]->mehwer_details = $this->select_mahder_by_mehwar(
                    array("session_num_fk"=>$last_magder->session_num_fk,
                        "session_year"=>$last_magder->session_year,
                        "mehwar_id_fk"=>$row->mehwar_id_fk));
            $x++; }
            return $data;
            //return $query->result();
        } else {
            return false;
        }
        }else{
            return false;
        }
    }


    public function getMembers($arr)
    {
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $x=0;
            foreach ($query->result() as $row) {
             $data[$x] = $row;
             $data[$x]->relation_name = $this->get_setting_name($row->member_relationship);
             $data[$x]->persons_status = $this->get_hala($row->persons_status);
             $x++;}
            return $data;

        } else {
            return false;
        }
    }

    public  function get_setting_name($id_setting){

        $h = $this->db->get_where("family_setting", array('id_setting'=>$id_setting));
        $arr= $h->row_array();
        return $arr['title_setting'];

    }

    public function get_hala($id)
    {
        $this->db->select('*');
        $this->db->from('persons_status_setting');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        }else{
            return false;
        }
    }



    public function getMother($arr){
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->relation_name = $this->get_setting_name($row->m_relationship);
                $data[$a]->persons_status = $this->get_hala($row->halt_elmostafid_m);
                $a++;
            }
            return $data;
        }
        return false;


    }


    public function get_kafel_rabt(){

        $data =array('kafel_rabt'=>$_POST['status']);
        if($_POST['type']==1){
            $this->db->where('mother_national_num_fk',$_POST['id']);
            $this->db->update('mother',$data);
        }elseif($_POST['type']==2){
            $this->db->where('id',$_POST['id']);
            $this->db->update('f_members',$data);
        }

    }





    public function getMembersSponsors2($where = false)
    {
        $query =$this->db->select('*')
            ->order_by('id', 'asc')
            ->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result_array() as $row){
                $data[$x] =  $row;
                //	$data[$x]['main_kafalat_details'] =  $this->getmain_kafalat_details_data($row['id']);
                $data[$x]['yatem'] =  $this->check_kafel_main_kafalat(
                    array('kafala_type_fk !='=>0,'kafala_type_fk !='=>3,'kafala_type_fk !='=>4,'first_kafel_id'=>$row['id']));
                $data[$x]['armal'] =  $this->check_kafel_main_kafalat(array('kafala_type_fk'=>4,'first_kafel_id'=>$row['id']));
                $data[$x]['mosatafed'] =  $this->check_kafel_main_kafalat(array('kafala_type_fk'=>3,'first_kafel_id'=>$row['id']));
                $x++;}
            return$data;
        }else{
            return 0;
        }


    }


    public function check_kafel_main_kafalat($where){
        $this->db->select('*');
        $this->db->from("fr_main_kafalat_details");
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return '<i class="glyphicon glyphicon-ok " style="color: #3c990b "></i>';
        }else{
            return '<i class="glyphicon glyphicon-remove  " style="color: #E5343D "></i>';
        }
    }


    public function  get_halet_kafalaat_reasons_settings()
    {
        $this->db->select('*');
        $this->db->from('halet_kafalaat_reasons_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function GetLastDataInserted($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('first_kafel_id', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function GetBankAccount($arr)
    {
        $this->db->select('id,account_num,bank_id_fk,account_id_fk');
        $this->db->from('society_main_banks_account');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }

    }

    public function select_banks_accounts()
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where('type', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }
    public function getBanks($acc = false)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where('account_id_fk', $acc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $this->GetBanksDetails($row->bank_id_fk);
            }
            return $data;
        } else {
            return false;
        }

    }
    public function GetBanksDetails($bank_id)
    {
        $this->db->select('*');
        $this->db->from('banks_settings');
        $this->db->where('id', $bank_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return false;
        }
    }


    public function getMembers2($where = false)
    {
        $query = $this->db->select('f_members.*,basic.file_num, basic.mother_national_num  as num,
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
            ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($where)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result_array() as $row) {




                $data[$x] = $row;
                $data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
                $data[$x]['check_member'] = $this->CheckHalfKafalaMember($row['id']);
                $data[$x]['nasebElfard'] =  $this->getNaseb($data[$x]['num'],$data[$x]['categoriey_member']);

                $x++;
            }
            return $data;
        } else {
            return 0;
        }


    }

    public function CheckHalfKafalaMember($id)
    {
        $now = strtotime(date('Y-m-d'));
        $query = $this->db->select('*')
            ->where('person_id_fk', $id)
            ->where('kafala_type_fk', 2)
            ->order_by('id', 'desc')
            ->limit(2)
            ->get('fr_main_kafalat_details');
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result_array() as $row) {
                if ($row['first_date_to'] < $now) {

                    continue;
                }

                $data[] = $row;
                $a++;
            }
            return $a;
        } else {
            return 0;
        }


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




    public function getMembersArmal($where = false)
    {
        $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
         files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
         ')
            ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
            ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
            ->where($where)
            ->where('basic.file_status', 1)
            ->get('mother');
        if ($query->num_rows() > 0) {
            $query->row_array();
            $query->row_array()['main_kafalat_details']= $this->getmain_kafalat_details_data($query->row_array()['id']);
            $query->row_array()['nasebElfard'] =  $this->getNaseb($query->row_array()['num'],$query->row_array()['categoriey_m']);
            return $query->row_array();
        } else {
            return false;
        }


    }


    public function getMembers_for_edit($where = false)
    {
        $query = $this->db->select('f_members.*,basic.file_num, basic.mother_national_num  as num,
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
            ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where($where)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
                $query->row_array();
               $query->row_array()['main_kafalat_details']= $this->getmain_kafalat_details_data($query->row_array()['id']);
             $query->row_array()['check_member'] = $this->CheckHalfKafalaMember($query->row_array()['id']);
            $query->row_array()['nasebElfard'] =  $this->getNaseb($query->row_array()['num'],$query->row_array()['categoriey_member']);
            return $query->row_array();
        } else {
            return false;
        }


    }
    public function getmain_kafalat_details_data($mother_id)
    {
        $this->db->select('person_id_fk,first_date_from,first_date_to');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $mother_id);
        $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return 0;
        }
    }




    public function insert($file)
    {

        $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
        $data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
        if (empty($datas['checked_in_main_kafalat'])) {
            $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
            $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
            $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
            $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id'));
            $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
            $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
            $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
            $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
            $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
            $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
            $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
            //kafala_period

            /**
             * @Hints
             * armal    = 1
             * yatem    = 2
             * mostafed = 3
             */

            if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
                $person_type = 2;
            } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
                $person_type = 3;
            } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
                $person_type = 1;
            } else {
                $person_type = 0;
            }

            $data['person_type'] = $person_type;
            /*******************************************************************************************/
            $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
            $data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

            $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
            // $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
            $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
            $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

            // $data['mostdem_to_date']      =  $this->chek_Null($this->input->post('mostdem_to_date'));
            $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
            $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

            $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
            $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
            $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
            $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
            $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
            $data['mostdem_img'] = $file;

            //$this->db->insert('fr_main_kafalat',$data);


            //start if

            $resut_f_members = $this->getf_members($this->input->post('person_id_fk'));
            $resut_mother = $this->get_mother_data2($this->input->post('person_id_fk'));


            if ($this->input->post('kafala_type_fk') == 4) {
                /********************  update_mother*********************/


                if ($resut_mother->first_k_id == 0) {


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                } elseif ($resut_mother->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==2) {


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                }



                $this->db->where('id', $this->input->post('person_id_fk'));
                $this->db->update('mother', $mothers);

            } else {


                if ($resut_f_members->first_k_id == 0) {


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] = 'first';

                } elseif ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==2) {


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] = 'first';

                } elseif (
                    ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==1)

                    || ($resut_f_members->second_k_id == 0 && $resut_f_members->second_halet_kafala  ==2)) {

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] = 'second';

                } elseif (
                    ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==1)

                    || ($resut_f_members->second_k_id != 0 &&  $resut_f_members->second_halet_kafala  ==2)) {

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] = 'second';

                }

                /******************** update_f_members********************/

                $this->db->where('id', $this->input->post('person_id_fk'));
                $this->db->update('f_members', $f_members);


            }

            //end if


            $this->db->insert('fr_main_kafalat_details', $data);


        } else {
            /********************************************************************/
            $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
            $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
            $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
            $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id'));
            $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
            $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
            $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
            $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
            $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
            $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
            $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
            /**
             * @Hints
             * armal    = 1
             * yatem    = 2
             * mostafed = 3
             */

            if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
                $person_type = 2;
            } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
                $person_type = 3;
            } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
                $person_type = 1;
            } else {
                $person_type = 0;
            }

            $data['person_type'] = $person_type;
            /*******************************************************************************************/
            $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
            $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
            $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
            $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

            $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
            $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));
            $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
            $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
            $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
            $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
            $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
            $data['mostdem_img'] = $file;
            /******************** *********************/


            //start if

            $resut_f_members = $this->getf_members($this->input->post('person_id_fk'));
            $resut_mother = $this->get_mother_data($this->input->post('person_id_fk'));
            if ($this->input->post('kafala_type_fk') == 4) {
                /********************  update_mother*********************/


                if ($resut_mother->first_k_id == 0) {


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                } elseif ($resut_mother->first_k_id != 0 && $resut_mother->first_to <= strtotime(date('Y-m-d'))) {


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                }

                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                $this->db->where('id', $this->input->post('person_id_fk'));
                $this->db->update('mother', $mothers);

            } else {


                if ($resut_f_members->first_k_id == 0) {


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] = 'first';

                } elseif ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==2) {


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] = 'first';

                } elseif (
                    ($resut_f_members->first_k_id != 0 &&  $resut_f_members->first_halet_kafala  ==1)

                    || ($resut_f_members->second_k_id == 0 && $resut_f_members->second_halet_kafala  ==2)) {

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                    $data['first_second_kafala'] = 'second';

                } elseif (
                    ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==1)

                    || ($resut_f_members->second_k_id != 0 && $resut_f_members->first_halet_kafala  ==2)) {

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                    $data['first_second_kafala'] = 'second';

                }

                /******************** update_f_members********************/

                $this->db->where('id', $this->input->post('person_id_fk'));
                $this->db->update('f_members', $f_members);


            }

            //end if

            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
            $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));


            $this->db->insert('fr_main_kafalat_details', $data);


            /*********************************************************************/
        }


    }


    public function Get_Details_from_fr_main_kafalat($mother_national_num_fk, $person_type, $person_id_fk)
    {
        $this->db->select('id,mother_national_num_fk,person_type,person_id_fk');
        $this->db->from('fr_main_kafalat');
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);
        $this->db->where('person_type', $person_type);
        $this->db->where('person_id_fk', $person_id_fk);


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        } else {
            return false;
        }

    }

    public function getf_members($id)
    {
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return false;
        }

    }
    public function get_mother_data2($id)
    {
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }


    }

    public function get_kafel_name($kafel_id)
    {
        $this->db->where('id', $kafel_id);
        $query = $this->db->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            return $query->row()->k_name;
        } else {
            return "غير محدد ";
        }
    }

    public function select_last_id_fr_main_kafalat_details()
    {
        $this->db->select('*');
        $this->db->from("fr_main_kafalat_details");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id + 1;
        } else {
            return 1;
        }
    }

}