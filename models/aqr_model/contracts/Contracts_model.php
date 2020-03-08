<?php
class Contracts_model extends CI_Model{

    public function get_table($table){
        $query = $this->db->get($table);
        if ($query->num_rows ()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_rkm(){

        $query = $this->db->get(' aqr_contracts');
        if ($query->num_rows()>0){
            return $query->last_row()->contract_rkm;
        } else{
            return 0;
        }

    }
    public function insert_contract(){
        $data['contract_rkm'] = $this->input->post('contract_rkm');
        $data['aqr_fk'] = $this->input->post('aqr_fk');
        $data['aqr_n'] = $this->input->post('aqr_n');
        $data['whda_type_fk'] = $this->input->post('whda_type_fk');
        $data['whda_type_n'] = $this->input->post('whda_type_n');
        $data['egar_value'] = $this->input->post('egar_value');
        $data['egar_start_date_m'] = $this->input->post('egar_start_date_m');
        $data['egar_start_date_h'] = $this->input->post('egar_start_date_h');
        $data['egar_end_date_m'] = $this->input->post('egar_end_date_m');
        $data['egar_end_date_h'] = $this->input->post('egar_end_date_h');
        $data['period'] = $this->input->post('period');
        $data['aqsat_num'] = $this->input->post('aqsat_num');
        $data['qst_value'] = $this->input->post('qst_value');
        $data['mostager_rkm'] = $this->input->post('mostager_rkm');
        $data['mostager_name'] = $this->input->post('mostager_name');
        $data['tamen'] = $this->input->post('tamen');
        $data['tzker'] = $this->input->post('tzker');
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $num =  $data['aqsat_num'];
        $this->db->insert('aqr_contracts',$data);

        if (!empty($num)){
            for ($i=1;$i<=$num;$i++){
                $data_q['contract_rkm']=   $this->input->post('contract_rkm');
                $data_q['qst_rkm']=  $i;
                $data_q['qst_value']=  $this->input->post('qst_value');
                $data_q['p_date']= strtotime(date("Y/m/d"));
                $data_q['p_date_ar'] = date("Y/m/d");
                if($_SESSION['role_id_fk']==1){

                    $data_q['publisher']=$_SESSION['user_id'];
                    $data_q['publisher_name']=$_SESSION['user_name'];;
                }
                else if ($_SESSION['role_id_fk']==2){
                    $data_q['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                    $data_q['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

                }
                else if ($_SESSION['role_id_fk']==3){
                    $data_q['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                    $data_q['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
                }
                else if ($_SESSION['role_id_fk']==4){
                    $data_q['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                    $data_q['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
                }
                $this->db->insert('aqr_qst_details',$data_q);

            }
        }
}
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_all(){
        $this->db->order_by('contract_rkm','ASC');
        $query = $this->db->get('aqr_contracts');

        if ($query->num_rows ()>0){
         //   return $query->result();
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->qst_details= $this->get_contract_details($row->contract_rkm);
                $i++;
            }
            return $data;

        } else{
            return false;
        }

    }
    public function getById($id)
    {
        return $this->db->get_where('aqr_contracts', array('id'=>$id))->row();
    }
    public function update_contract($id){
        $data['contract_rkm'] = $this->input->post('contract_rkm');
        $data['aqr_fk'] = $this->input->post('aqr_fk');
        $data['aqr_n'] = $this->input->post('aqr_n');
        $data['whda_type_fk'] = $this->input->post('whda_type_fk');
        $data['whda_type_n'] = $this->input->post('whda_type_n');
        $data['egar_value'] = $this->input->post('egar_value');
        $data['egar_start_date_m'] = $this->input->post('egar_start_date_m');
        $data['egar_start_date_h'] = $this->input->post('egar_start_date_h');
        $data['egar_end_date_m'] = $this->input->post('egar_end_date_m');
        $data['egar_end_date_h'] = $this->input->post('egar_end_date_h');
        $data['period'] = $this->input->post('period');
        $data['aqsat_num'] = $this->input->post('aqsat_num');
        $data['qst_value'] = $this->input->post('qst_value');
        $data['mostager_rkm'] = $this->input->post('mostager_rkm');
        $data['mostager_name'] = $this->input->post('mostager_name');
        $data['tamen'] = $this->input->post('tamen');
        $data['tzker'] = $this->input->post('tzker');
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $num =  $data['aqsat_num'];
        $this->db->where('id',$id);
        $this->db->update('aqr_contracts',$data);

        $d = $this->get_contract_details($data['contract_rkm']);
        if (!empty($d)){
            $this->delete_contract_details($data['contract_rkm']);
        }

        if (!empty($num)){

            for ($i=1;$i<=$num;$i++){
                $data_q['contract_rkm']=   $this->input->post('contract_rkm');
                $data_q['qst_rkm']=  $i;
                $data_q['qst_value']=  $this->input->post('qst_value');
                $data_q['p_date']= strtotime(date("Y/m/d"));
                $data_q['p_date_ar'] = date("Y/m/d");
                if($_SESSION['role_id_fk']==1){

                    $data_q['publisher']=$_SESSION['user_id'];
                    $data_q['publisher_name']=$_SESSION['user_name'];;
                }
                else if ($_SESSION['role_id_fk']==2){
                    $data_q['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                    $data_q['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

                }
                else if ($_SESSION['role_id_fk']==3){
                    $data_q['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                    $data_q['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
                }
                else if ($_SESSION['role_id_fk']==4){
                    $data_q['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                    $data_q['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
                }
                $this->db->insert('aqr_qst_details',$data_q);

            }
        }


    }
    public function get_contract_details($rkm){
        $this->db->where('contract_rkm',$rkm);
        $query = $this->db->get('aqr_qst_details');
        if ($query->num_rows ()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function delete_contract_details($rkm){
        $this->db->where('contract_rkm',$rkm);
        $this->db->delete('aqr_qst_details');
    }
    public function delete_contract($rkm){
        $this->db->where('contract_rkm',$rkm);
        $this->db->delete('aqr_contracts');
    }
    public function get_qst_data($id){

        $this->db->where('id',$id);
        $query = $this->db->get('aqr_contracts');
        if ($query->num_rows ()>0){
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->qst_details= $this->get_contract_details($row->contract_rkm);
                $data[$i]->mostager = $this->get_mostager($row->mostager_rkm);
                $i++;
            }
            return $row;

        } else{
            return false;
        }
    }
    public function get_mostager($rkm){
        $this->db->where('rkm',$rkm);
        $query = $this->db->get('aqr_mostager');
        if ($query->num_rows ()>0){
            return $query->row();
        } else{
            return false;
        }
    }

    public function update_qst($c_rkm,$q_rkm){
        $data['paid']= 1;
        $data['p_date']= strtotime(date("Y/m/d"));
        $data['p_date_ar'] = date("Y/m/d");
        $this->db->where(array('contract_rkm'=>$c_rkm,'qst_rkm'=>$q_rkm));
        $this->db->update('aqr_qst_details',$data);

    }
    public function update_contract_paid($c_rkm){
        $data['paid']= 1;
        $this->db->where(array('contract_rkm'=>$c_rkm));
        $this->db->update('aqr_contracts',$data);

    }
    public function get_main_data()
    {
        $q = $this->db->select('*')->get('main_data')->row();
        $q->tele_info = unserialize($q->tele_info);
        return $q;
    }
    public function get_contract_setting()
    {
        $q = $this->db->get('aqr_contract_setting')->row();
        return $q;

    }



}