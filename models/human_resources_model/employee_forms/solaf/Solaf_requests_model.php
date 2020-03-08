<?php

class Solaf_requests_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_emp_data($id)
    {

        $q = $this->db->select('id,emp_code,start_work_date_m')->where('id', $id)->get('employees')->row();

        $q->finance_Data = $this->get_finance_Data($q->id);

        $q->reward_end_work = $this->get_by('contract_employe', array('emp_code' => $q->emp_code),'reward_end_work');
        return $q;

    }

    public function get_finance_Data($emp_id)
    {
        $data = array();
                $data['rateb_asasy'] = $this->get_by('emp_badlat_discount_details',array('emp_code'=>$emp_id,'badl_discount_id_fk'=>9),1);
                $data['get_having_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(1));
                $data['get_discut_value'] = $this->get_sum_value($emp_id, $this->getBadalat_id(2));
                // $data['tamin_value'] = $this->get_tamin_value($emp_id, $this->getBadalat_id(1));
            return $data;

    }
    // public function get_tamin_value($emp_code, $ids)
    // {
    //     $this->db->where_in('badl_discount_id_fk', $ids);
    //     $this->db->where('emp_code', $emp_code);
    //     $this->db->where('insurance_affect', 1);
    //     $this->db->select_sum('value');
    //     $result = $this->db->get('emp_badlat_discount_details');
    //     if ($result->num_rows() > 0) {
    //         return $result->row()->value;
    //     } else {
    //         return 0;
    //     }


    // }

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
    public function getBadalat_id($type)
    {
        $query = $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->id;
            $x++;
        }
        return $data;
    }
    public function get_sum_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_code', $emp_code);
        $this->db->select_sum('value');
        $result = $this->db->get('emp_badlat_discount_details');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }


    }

    public function get_badl($emp_code, $id)
    {
      $this->db->where('emp_code', $emp_code);
      $this->db->where('badl_discount_id_fk', $id);
      return $this->db->get('emp_badlat_discount_details')->row();

    }
    public function get_num_solf($emp_id_fk)
    {
      $this->db->where('emp_id_fk', $emp_id_fk)->where('suspend', 4)->order_by('t_rkm','DESC');
      return $this->db->get('hr_solaf')->result();

    }
    public function get_by($table, $where_arr = false, $select = false,$order_by=false)
    {

        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        if (!empty($order_by)) {
            $this->db->order_by($order_by,'ASC');
        }
        $query = $this->db->get($table);
        // return $query;
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
 public function get_had_solfa($emp_id_fk)
 {
         $all_batlat=0;
         $solaf_main_setting = $this->get_by('hr_solaf_main_setting', '', 1);
         if(!empty($solaf_main_setting)){
         $bnod = array('rateb_asasy'=>9,  'bdl_sakn'=>11 ,  'bdl_mowaslat'=>12 ,  'bdl_jwal'=>15
         ,  'rateb_mokto3'=>10 ,  'bdl_ma3esha' => 16,  'bdl_amal' =>13 ,  'bdl_taklef' =>14 );


         foreach ($solaf_main_setting as $key => $value) {
             if (array_key_exists ($key, $bnod)) {
                 $key_input = $bnod[$key];

                 if ($value == 1) {
                   $batel_value=$this->get_by('emp_badlat_discount_details',array('emp_code'=>$emp_id_fk,'badl_discount_id_fk'=>$key_input),1);
                   if(!empty($batel_value)){
                   $all_batlat+=$batel_value->value;
                 }
                 }
             }

         }

              $hat_solfa=($all_batlat * ($solaf_main_setting->had_adna /100))/($solaf_main_setting->aqsa_moda_sadad);
              return (float)number_format($hat_solfa, 3, '.', '');
              }else {
                return 0;
              }
         }
    public function chek_Null($post_value)
    {

        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function get_all_emp()
    {

        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
            }
            return $q;
        }
    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }
	public function insert_solfa()
    {
        $data = $this->get_data();

        $this->db->insert('hr_solaf', $data);
        $insert_id = $this->db->insert_id();
        $this->insert_history($data,$insert_id);
        if(   $this->input->post('qst_num')>0)
        {
            $x= $this->input->post('qst_num');
            $qust_value=( $this->input->post('qemt_solaf')/ $this->input->post('qst_num'));
            $qust_remain=(($qust_value-round($qust_value))*$x);
            for($i=0;$i<$x;$i++)
            {

                $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
                $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
                if ($i == ($x-1)) {
                    $dataw['value_of_qst'] = (round($qust_value)+$qust_remain);
                }else {
                    $dataw['value_of_qst'] = round($qust_value);

                }
                $this->db->insert('hr_solaf_quest', $dataw);
            }

        }
    }

public function insert_history($data,$insert_id)
{
    $insert['solaf_rkm_fk'] = $data['t_rkm'];
    $insert['solaf_id_fk'] = $insert_id;
    $insert['from_user'] = $data['current_from_user_id'];
    $insert['from_user_n'] = $data['current_from_user_name'];
    if (isset($data['current_to_user_id'])&&(!empty($data['current_to_user_id']))) {
        $insert['to_user'] = $data['current_to_user_id'];
        $insert['to_user_n'] =  $data['current_to_user_name'];
        }


    $insert['talab_in_fk'] = $data['talab_in_fk'];
    $insert['talab_in_title'] = $data['talab_in_title'];
    $insert['level'] = $data['level'];
    // $insert['talab_msg'] = $data['talab_msg'];

    // $insert['reason_action'] = $data['reason_action'];
    $insert['date'] = strtotime(date('Y-m-d'));
    $insert['date_ar'] = date('Y-m-d');

    $this->db->insert("hr_all_solf_history", $insert);
  }

    public function update_by_id($id)
    {
        $data = $this->get_data();
        $this->db->where('id', $id)->update('hr_solaf', $data);
        if(   $this->input->post('qst_num')>0)
        {
            $x= $this->input->post('qst_num');
            $this->db->where('t_rkm_fk', $this->input->post('t_rkm'))->delete('hr_solaf_quest');
            $qust_value=( $this->input->post('qemt_solaf')/ $this->input->post('qst_num'));
            $qust_remain=(($qust_value-round($qust_value))*$x);
            for($i=0;$i<$x;$i++)
            {

                $dataw['t_rkm_fk'] = $this->input->post('t_rkm');
                $dataw['emp_code_fk'] = $this->input->post('emp_code_fk');
                if ($i == ($x-1)) {
                    $dataw['value_of_qst'] = (round($qust_value)+$qust_remain);
                }else {
                    $dataw['value_of_qst'] = round($qust_value);

                }
                $this->db->insert('hr_solaf_quest', $dataw);
            }

        }
    }
	  public function select_depart($id = false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if (!empty($id)) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("id", $_SESSION['emp_code']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->get_edara_name_or_qsm($row->administration);
                $arr[$a]->departments_name = $this->get_edara_name_or_qsm($row->department);
                $arr[$a]->job_title = $this->get_job_title($row->degree_id);
                $arr[$a]->manger_name = $this->get_direct_manager_name_by_emp_id($row->id)->manager_name;

                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
	public function get_last_rkm()
{
    $this->db->select('t_rkm');
    $this->db->order_by('id','desc');
    $query=$this->db->get('hr_solaf');
    if($query->num_rows()>0)
    {
        return $query->row()->t_rkm + 1;
    }else{
        return 1;
    }

}

    public function select_all_defined($type)
    {
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type", $type);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
	  public function get_emp($id)
    {

        $this->db->where_not_in('id', $id);
        return $this->db->get('employees')->result();
    }
	public function get_emp2()
    {
        return $this->db->query('
                            SELECT c.*, COALESCE(f.allDayes,0) AS allDayes, f.casual_vacation_num, COALESCE(a.vDayes,0) AS vDayes, COALESCE(b.casual,0) AS casual
                            FROM (
                                SELECT *
                                From employees ) c

                             LEFT JOIN
                            (
                                SELECT COALESCE((year_vacation_num + vacation_previous_balance),0) AS allDayes, emp_code, casual_vacation_num
                                From contract_employe
                            ) f
                            on (f.emp_code=c.emp_code)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS vDayes, emp_id_fk
                                From hr_all_agzat_orders
                                WHERE no3_agaza!=0 AND suspend != 0
                            ) a
                            on (a.emp_id_fk=c.id)

                             LEFT JOIN
                            (
                                SELECT COUNT(*) AS casual, emp_id_fk
                                From hr_all_agzat_orders
                                WHERE no3_agaza=0 AND suspend != 0
                            ) b
                            on (b.emp_id_fk=c.id)
                            ')->result();
    }
 public function get_all_solfa()
    {

        $query= $this->db->get(' hr_solaf');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
	public function GetReplacementEmployee($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->order_by('emp_code', 'ASC');
        return $this->db->get('employees')->result();
    }
	 public function delete_from_table($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }
    public function delete_from_table_solaf($id, $table)
    {
        $this->db->where('t_rkm_fk', $id);
        $this->db->delete($table);
    }

    // omnia
	public function get_data()
    {

        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['emp_code_fk'] = $this->input->post('emp_code_fk');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['job_title'] = $this->input->post('job_title');
        $data['t_rkm'] = $this->input->post('t_rkm');
        //$data['t_rkm_date_h'] = $this->input->post('t_rkm_date_h');
     $data['t_rkm_date_m'] = $this->input->post('t_rkm_date_m');


        $data['qemt_solaf'] = $this->input->post('qemt_solaf');
        $data['qemt_qst'] = round($this->input->post('qemt_qst'));
        $data['sadad_solfa'] = $this->input->post('sadad_solfa');
        $data['qst_num'] = $this->input->post('qst_num');

        $data['khsm_form_date_m'] = $this->input->post('khsm_form_date_m');
        $data['khsm_to_date_m'] = $this->input->post('khsm_to_date_m');
        $data['hd_solfa'] = $this->input->post('hd_solfa');
       $data['previous_request_date_m'] = $this->input->post('previous_request_date_m');
       // $data['previous_request_date_h'] = $this->input->post('previous_request_date_h');
        $data['solaf_reason'] = $this->input->post('solaf_reason');
        $data['num_previous_requests'] = $this->input->post('num_previous_requests');
        $data['direct_manager_id_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manger;
        $data['direct_manager_code_fk'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_code;
        $data['direct_manager_n'] = $this->get_direct_manager_name_by_emp_id($data['emp_id_fk'])->manager_name;



            $data['current_from_user_name'] = $this->input->post('emp_name');
            $data['current_from_user_id'] = $this->get_user_id($data['emp_id_fk']);

            // $data['current_to_user_name'] = $data['direct_manager_n'];
            // $data['current_to_user_id'] = $this->get_user_id($data['direct_manager_id_fk']);


            $data['level'] = 0;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;



        return $data;
    }


    public function make_transformation_direct($solf_id)
    {
        $solf_data=$this->get_solfa_by_id($solf_id);
        if(!empty($solf_data)){
            $data['current_to_user_name'] = $solf_data->direct_manager_n;
            $data['current_to_user_id'] = $this->get_user_id($solf_data->direct_manager_id_fk);
            $data['level'] = 1;
            $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
            $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;
            $this->db->where('id', $solf_id)->update('hr_solaf', $data);

            $solfa_data_array=$this->db->where('id', $solf_id)->get('hr_solaf')->row_array();
            $this->insert_history($solfa_data_array,$solf_id);
         return 1;
        }
        return 0;

    }
    // omnia
    public function get_transformation_setting($level)
    {

        $q = $this->db->where('level', $level)->where('tbl', 'solfa')->get('hr_all_transformation_setting')->row();

        if (!empty($q)) {
            return $q;
        }
    }

    public function get_user_id($emp_code)
    {

        $q = $this->db->where('emp_code', $emp_code)->get('users')->row();

        if (!empty($q)) {
            return $q->user_id;
        }
    }
    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,
        manager_table.employee as manager_name,manager_table.emp_code as manager_code');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

	 public function get_solfa_by_id($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('hr_solaf');
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $query->emp_name = $this->select_depart_with_out_session($query->emp_id_fk)->employee;

            return $query;
        } else {
            return 0;
        }
    }
	public function select_depart_with_out_session($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->administration_name = $this->getName($row->administration);
                $arr[$a]->departments_name = $this->getName($row->department);
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }
	  public function getName($id)
    {
        $this->db->select('id,name');
        $this->db->from('department_jobs');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->name;
        } else {
            return 0;
        }

    }

    //new
    public function get_by_t_rkm($t_rkm)
    {
        $this->db->where('t_rkm',$t_rkm);
        $query=$this->db->get('hr_solaf');
        if($query->num_rows()>0)
        {


            return $query->result();
        }else{
            return false;
        }
    }
    ///yara
    public function get_had_aqsa_qst()
    {
      $solaf_main_setting = $this->get_by('hr_solaf_main_setting', '', 1);
      if (!empty($solaf_main_setting)) {
        return $solaf_main_setting->aqsa_moda_sadad;
      }else {
        return 0;
      }

    }
    public function get_solf_suspend($emp_id)
    {
        $query= $this->db->where_not_in('suspend',array(5,2))->where('khsm_to_date_m>=',date("Y-m-d"))->where('emp_id_fk',$emp_id)->get('hr_solaf');
        if($query->num_rows()>0)
        {
            return 1;
        }else{
            return 0;
        }
    }



    public function update_solaf_notification()
    {
        $data['seen'] = 1;
        $this->db->where('current_to_user_id', $_SESSION['user_id'])->update('hr_solaf', $data);
        $this->db->where('to_user', $_SESSION['user_id'])->update('hr_all_solf_history', $data);

    }

    public function check_solaf_notifications($where_conn)
    {
        $this->db->select('t_rkm,current_from_user_name');
        if (!empty($where_conn)) {
            $this->db->where($where_conn);
        }
        return $this->db->where('seen', 0)->get('hr_solaf')->result();
    }



}// END CLASS
