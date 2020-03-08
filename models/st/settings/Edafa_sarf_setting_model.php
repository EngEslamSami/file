<?php

class Edafa_sarf_setting_model extends CI_Model{

    public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function slect_where($table,$Conditions_arr,$grouby,$limit,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        foreach($Conditions_arr as $key=>$value){
            $this->db->where($key,$Conditions_arr[$key]);
        }
        $this->db->order_by($order_by,$order_by_desc_asc);
        $this->db->group_by($grouby);
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function get_storage($id){
        $this->db->where('type',$id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;

    }

    public function getAllAccounts()
    {

        $this->db->where('id!=',0);
        $this->db->order_by('parent','ASC');
        return $this->db->get('dalel')->result();
    }

    public function insert_sarf(){


        $ids = $this->input->post('edara_name');
        for ($i =0;$i<count($ids); $i++){
            $data['edara_name']= $this->get_id("department_jobs",$this->input->post('edara_name')[$i],"name");
            $data['qsm_name']= $this->get_id("department_jobs",$this->input->post('qsm_name')[$i],"name");
            $data['storage_fk']=$this->input->post('storage_fk')[$i];
            $data['process']= $this->input->post('process')[$i];
            $data['rkm_hesab']= $this->input->post('rkm_hesab')[$i];
            $data['hesab_name']= $this->input->post('hesab_name')[$i];
            $data['rkm_hesab_moshtriat']= $this->input->post('rkm_hesab_moshtriat')[$i];
            $data['hesab_moshtriat_name']= $this->input->post('hesab_moshtriat_name')[$i];

            $data['emp_id'] = $this->input->post('emp_id')[$i];
            $data['emp_code'] = $this->get_id("employees",$this->input->post('emp_id')[$i],"emp_code");

            $data['date']= strtotime(date("Y/m/d"));
            $data['date_ar'] = date("Y/m/d");
            if($_SESSION['role_id_fk']==1){

                $data['publisher']=$_SESSION['user_id'];
                $data['publisher_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['publisher'] = $this->get_id("magls_members_table",$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("magls_members_table",$_SESSION['emp_code'],"member_name");

            }
            else if ($_SESSION['role_id_fk']==3){
                $data['publisher'] = $this->get_id("employees",$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("employees",$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['publisher'] = $this->get_id("general_assembley_members",$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("general_assembley_members",$_SESSION['emp_code'],"name");
            }


            $this->db->insert('st_edafa_sarf_setting',$data);
        }

    }


    public function get_id($table,$id,$select){
        $h = $this->db->get_where($table, array('id'=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

    public function get_emp()
    {
        $q = $this->db->select('emp_id')->get('st_edafa_sarf_setting')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->emp_id);
            }
            return $data;
        }
    }

 /*   public function get_all_emp($Conditions_arr){
        $emp = $this->get_emp();

        foreach($Conditions_arr as $key=>$value){
            $this->db->where($key,$Conditions_arr[$key]);
        }
        $this->db->where_not_in('id', $emp);
        $query = $this->db->get('employees');
        if ($query->num_rows()>0){
            return $query->result();
        }
        return false;

    }
*/

public function get_all_emp($Conditions_arr){
        $emp = $this->get_emp();

        foreach($Conditions_arr as $key=>$value){
            $this->db->where($key,$Conditions_arr[$key]);
        }
      
        $query = $this->db->get('employees');
        if ($query->num_rows()>0){
            return $query->result();
        }
        return false;

    }
    public function display_sarf(){
        $query = $this->db->get('st_edafa_sarf_setting');
        if ($query->num_rows() >0 ){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_name = $this->get_id("employees",$row->emp_id,"employee");
                $data[$i]->storage_name = $this->get_d("st_setting",$row->storage_fk,'id_setting',"title_setting");
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('st_edafa_sarf_setting');

    }
    public function getById($id){
        $this->db->where('id',$id);
        $query = $this->db->get('st_edafa_sarf_setting');
        if ($query->num_rows() >0 ){
            $i= 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_name=$this->get_id("employees",$row->emp_id,"employee");
                $data[$i]->qsm_id= $this->get_d("department_jobs",$row->qsm_name,'name',"id");
                $data[$i]->emp_img = $this->get_id("employees",$row->emp_id,"personal_photo");
                $data[$i]->storage_name = $this->get_d("st_setting",$row->storage_fk,'id_setting',"title_setting");

                $i++;

            }
            return $data;

        }

        return 0;

    }

    public function get_d($table,$id,$where,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

    public function update($id){


        $data['edara_name']= $this->get_id("department_jobs",$this->input->post('edara_name'),"name");
        $data['qsm_name']= $this->get_id("department_jobs",$this->input->post('qsm_name'),"name");
        $data['storage_fk']=$this->input->post('storage_fk');
        $data['process']= $this->input->post('process');
        $data['rkm_hesab']= $this->input->post('rkm_hesab');
        $data['hesab_name']= $this->input->post('hesab_name');
        $data['rkm_hesab_moshtriat']= $this->input->post('rkm_hesab_moshtriat');
        $data['hesab_moshtriat_name']= $this->input->post('hesab_moshtriat_name');

        $data['emp_id'] = $this->input->post('emp_id');
        $data['emp_code'] = $this->get_id("employees",$this->input->post('emp_id'),"emp_code");

        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('st_edafa_sarf_setting',$data);
    }



}