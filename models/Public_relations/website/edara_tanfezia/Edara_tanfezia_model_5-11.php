<?php
class Edara_tanfezia_model extends CI_Model{

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


    public function insert_empdata()
    {

        $ids = $this->input->post('edara_id_fk');
        for ($i =0;$i<count($ids); $i++){

            $data['edara_id_fk']= $this->input->post('edara_id_fk')[$i];
            $data['qsm_id']= $this->input->post('qsm_id')[$i];
            $data['emp_id_fk']= $this->input->post('emp_id_fk')[$i];
            $data['emp_order']= $this->input->post('emp_order')[$i];
            $data['date_ar'] = date("Y/m/d");
            if($_SESSION['role_id_fk']==1){

               $data['publisher']=$_SESSION['user_id'];
            }
            else if ($_SESSION['role_id_fk']==2){
               $data['publisher'] = $this->get_id("magls_members_table",$_SESSION['emp_code'],"id");

            }
            else if ($_SESSION['role_id_fk']==3){
                $data['publisher'] = $this->get_id("employees",$_SESSION['emp_code'],"id");
            }
            else if ($_SESSION['role_id_fk']==4){
              $data['publisher'] = $this->get_id("general_assembley_members",$_SESSION['emp_code'],"id");
            }
          $data['emp_code'] = $this->get_id("employees",$this->input->post('emp_id_fk')[$i],"emp_code");
          $data['emp_name'] = $this->get_id("employees",$this->input->post('emp_id_fk')[$i],"employee");
          $data['edara_name'] = $this->get_id("department_jobs",$this->input->post('edara_id_fk')[$i],"name");
          $data['qsm_name'] = $this->get_id("department_jobs",$this->input->post('qsm_id')[$i],"name");
            $this->db->insert('pr_edara_tanfezia',$data);
        }
    }

    public function get_id($table,$id,$select){
        $h = $this->db->get_where($table, array('id'=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
     public function get_all_emp(){
        $this->db->order_by('emp_order');
       $query = $this->db->get('pr_edara_tanfezia');
        if ($query->num_rows()>0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp= $this->get_emp_details($row->emp_id_fk);
                $data[$i]->degree_name= $this->get_degree($data[$i]->emp->degree_id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_edara_tanfezia');
    }
    public function get_emp($id){
        $this->db->where('id',$id);
        $query = $this->db->get('pr_edara_tanfezia');
        if ($query->num_rows()> 0){
            return $query->row();
        }
        return false;
    }

    public function update_emp($id){

        $data['edara_id_fk']= $this->input->post('edara_id_fk');
        $data['qsm_id']= $this->input->post('qsm_id');
        $data['emp_id_fk']= $this->input->post('emp_id_fk');
        $data['emp_order']= $this->input->post('emp_order');
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_id'];
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",$_SESSION['emp_code'],"id");
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",$_SESSION['emp_code'],"id");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",$_SESSION['emp_code'],"id");
        }
        $data['emp_code'] = $this->get_id("employees",$this->input->post('emp_id_fk'),"emp_code");
        $data['emp_name'] = $this->get_id("employees",$this->input->post('emp_id_fk'),"employee");
        $data['edara_name'] = $this->get_id("department_jobs",$this->input->post('edara_id_fk'),"name");
        $data['qsm_name'] = $this->get_id("department_jobs",$this->input->post('qsm_id'),"name");
        $this->db->where('id',$id);
        $this->db->update('pr_edara_tanfezia',$data);
    }
    
    
    public function get_emp_details($id){
        $this->db->where('id',$id);
        $query = $this->db->get('employees');
        if ($query->num_rows()> 0){
            return $query->row();
        }
        return false;
    }
    public function get_degree($id){
        $this->db->where('defined_id',$id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows()> 0){
            return $query->row()->defined_title;
        }
        return false;
    }
	
    
}