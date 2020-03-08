<?php

class Shkawi_model extends CI_Model{

    public function get_employee_data($table,$id){
        $this->db->where('id',$id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $data = $query->row() ;
            $data->edara_n = $this->get_edara_name_or_qsm($data->administration);
            $data->qsm_n = $this->get_edara_name_or_qsm($data->department);

            return $data ;
        } else{
            return false;
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

    public function get_table($table, $arr){
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();

        } else {
            return false;
        }
    }
    public function get_all_emp($id){
        $this->db->where_not_in('id', $id);
        $this->db->where('employee_type', 1);
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
    public function get_last_rkm(){
        $this->db->select('*');
        $this->db->from('arch_shkawi');
        $this->db->order_by("rkm","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->rkm +1 ;

        }
        return 1;
    }


    public function add_shkwa(){
        $data['rkm'] = $this->get_last_rkm();
        $type = $this->input->post('m_type');
        if (!empty($type)){
            $type_arr = explode('-',$type);
            $data['type']= $type_arr[0];
            $data['type_n']= $type_arr[1];
        }
        $data['sender_code'] = $this->input->post('sender_code');
        $data['sender_id_fk'] = $this->input->post('sender_id_fk');
        $data['sender_name'] = $this->input->post('sender_name');
        $data['sender_edara_fk'] = $this->input->post('sender_edara_fk');
        $data['sender_edara_n'] = $this->input->post('sender_edara_n');
        $data['sender_qsm_fk'] = $this->input->post('sender_qsm_fk');
        $data['sender_qsm_n'] = $this->input->post('sender_qsm_n');
        $data['send_date_ar'] = $this->input->post('send_date');
        $data['send_date'] = strtotime($this->input->post('send_date')) ;
        $data['content'] = $this->input->post('content');
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d')) ;
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('arch_shkawi',$data);


        $x = $this->input->post('reciver_id_fk');

        $y = $this->input->post('reciver_name');

        $h = $this->input->post('reciver_code');
        $tahwel_type = $this->input->post('tahwel_type') ;
        if ($x != null) {
            if ($tahwel_type==3){
                $data_r['rkm_fk'] = $data['rkm'];
                $data_r['recived_date']=  $data['send_date'];
                $data_r['recived_date_ar']=  $data['send_date_ar'];
                $data_r['publisher'] =  $data['publisher'];
                $data_r['publisher_name'] =  $data['publisher_name'];
                $data_r['date_ar'] =  $data['date_ar'];
                $data_r['date'] =  $data['date'];

                for ($i = 0; $i < sizeof($x); $i++) {
                    $edara_id = $x[$i] ;
                    $all_emp[$i] = $this->get_table('employees',array('administration'=>$edara_id));
                    foreach ($all_emp[$i] as $emp){
                        $data_r['reciver_id_fk'] = $emp->id;
                        $data_r['reciver_name'] =  $emp->employee;
                        $data_r['reciver_code'] =  $emp->emp_code;
                        $data_r['reciver_edara_fk'] = $emp->administration;
                        $data_r['reciver_edara_n'] = $this->get_edara_name_or_qsm($emp->administration);
                        $data_r['reciver_qsm_fk'] = $emp->department;
                        $data_r['reciver_qsm_n'] = $this->get_edara_name_or_qsm($emp->department);
                        $this->db->insert('arch_shkawi_details', $data_r);

                    }
                }


            }  elseif ($tahwel_type==2){

                $data_r['rkm_fk'] = $data['rkm'];
                $data_r['recived_date']=  $data['send_date'];
                $data_r['recived_date_ar']=  $data['send_date_ar'];
                $data_r['publisher'] =  $data['publisher'];
                $data_r['publisher_name'] =  $data['publisher_name'];
                $data_r['date_ar'] =  $data['date_ar'];
                $data_r['date'] =  $data['date'];

                for ($i = 0; $i < sizeof($x); $i++) {
                    $qsm_id = $x[$i] ;
                    $all_emp[$i] = $this->get_table('employees',array('department'=>$qsm_id));
                    foreach ($all_emp[$i] as $emp){
                        $data_r['reciver_id_fk'] = $emp->id;
                        $data_r['reciver_name'] =  $emp->employee;
                        $data_r['reciver_code'] =  $emp->emp_code;
                        $data_r['reciver_edara_fk'] = $emp->administration;
                        $data_r['reciver_edara_n'] = $this->get_edara_name_or_qsm($emp->administration);
                        $data_r['reciver_qsm_fk'] = $emp->department;
                        $data_r['reciver_qsm_n'] = $this->get_edara_name_or_qsm($emp->department);

                        $this->db->insert('arch_shkawi_details', $data_r);

                    }
                }

            }
            elseif ($tahwel_type==1){
                for ($i = 0; $i < sizeof($x); $i++) {
                    $data_r['reciver_id_fk'] = $x[$i];
                    $data_r['reciver_name'] = $y[$i];
                    $data_r['reciver_code'] = $h[$i];
                    $emp_data = $this->get_employee_data('employees',$data_r['reciver_id_fk']);
                    $data_r['reciver_edara_fk'] = $emp_data->administration;
                    $data_r['reciver_edara_n'] = $emp_data->edara_n;
                    $data_r['reciver_qsm_fk'] = $emp_data->department;
                    $data_r['reciver_qsm_n'] = $emp_data->qsm_n;

                    $this->db->insert('arch_shkawi_details', $data_r);
                }

            }
        }






    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }


    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }

  

}