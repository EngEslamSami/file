<?php

class Egraat_settings_model extends CI_Model
{

    public function get_all_emp($job_title_id_fk,$person_type)
    {
        $this->load->model('human_resources_model/Public_employee_main_data');
        $emps = $this->get_mems($job_title_id_fk,$person_type);
         $this->db->order_by('emp_code','ASC');
        $this->db->where_not_in('emp_code', $emps);
        $query =$this->db->select('*')
            ->get('employees');
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result_array() as $row){
                $data[$x] =  $row;
                $data[$x]['edara'] =  $this->Public_employee_main_data->get_edara_name_by_emp_id($row['id']);
                $data[$x]['qsm'] =  $this->get_id('all_defined_setting','defined_id',$row['degree_id'],'defined_title');
                $x++;}
            return$data;
        }else{
            return 0;
        }
    }

    public function get_mems($job_title_id_fk,$person_type)
    {
        $q = $this->db->select('person_code')->where('person_type',$person_type)->where('job_title_id_fk',$job_title_id_fk)->get('hr_egraat_emp_setting')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->person_code);
            }
            return $data;
        }
    }


    public function get_magls_member($table,$job_title_id_fk,$where,$person_type){
        $emps = $this->get_mems($job_title_id_fk,$person_type);
        $this->db->where_not_in($where, $emps);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result_array();

        } else{
            return false;
        }
    }

    public function get_emp_setting($code){
        $this->db->where('job_title_code_fk',$code);
        $query = $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows()>0){
            return $query->num_rows();
        } else{
            return 0;
        }
    }
    public function get_all_jobs(){
        $query = $this->db->get('hr_egraat_setting');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_setting = $this->get_emp_setting($row->code);
                if ( $row->max_num <= $data[$i]->emp_setting){
                    unset($data[$i]);
                }

                $i++;

            }
            return $data;
        }
    }

    public function insert_emp_egraa($file)
    {

        $data['job_title_id_fk'] = $this->input->post('job_title_id_fk');
        $data['job_title_code_fk'] = $this->get_id('hr_egraat_setting','id', $data['job_title_id_fk'],'code');
        $data['job_title_n'] = $this->get_id('hr_egraat_setting','id', $data['job_title_id_fk'],'title');
        $data['person_type'] = $this->input->post('person_type');
        $data['person_code'] = $this->input->post('person_code');
        $data['person_name'] = $this->input->post('person_name');
        $data['person_qsm'] = $this->input->post('person_qsm');
        $data['person_edara'] = $this->input->post('person_edara');
        $data['person_private_name'] = $this->input->post('person_private_name');
        $data['person_suspend'] = $this->input->post('person_suspend');
         $data['person_id'] = $this->input->post('person_id');
          $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');	
		
        if (!empty($file)){
            $data['person_img'] = $file;
        }

        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d');
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

        $this->db->insert('hr_egraat_emp_setting', $data);


    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_all_egraa(){

        $query= $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows()>0){
            return $query->result();

        } else{
            return false;
        }

    }
   /* public function get_by_id($id){
        $this->db->where('id',$id);
        $query =  $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows()>0){
            return $query->row();

        } else{
            return 0;
        }
    }*/


 public function get_by_id($id){
        $this->db->where('id',$id);
        $query =  $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows()>0){
          //  return $query->row();
            $data = $query->row();
            if ($data->person_type==1){
                $data->emp_img = $this->get_id('employees','emp_code',$data->person_code,'personal_photo');

            } elseif ($data->person_type==3){
                $data->emp_img = $this->get_id('md_all_gam3ia_omomia_members','id',$data->person_code,'mem_img');
            }

        return $data;
        } else{
            return 0;
        }
    }
    public function update_egraa($id,$file){
        $data['job_title_id_fk'] = $this->input->post('job_title_id_fk');
        $data['job_title_code_fk'] = $this->get_id('hr_egraat_setting','id', $data['job_title_id_fk'],'code');
        $data['job_title_n'] = $this->get_id('hr_egraat_setting','id', $data['job_title_id_fk'],'title');
        $data['person_type'] = $this->input->post('person_type');
        $data['person_code'] = $this->input->post('person_code');
        $data['person_name'] = $this->input->post('person_name');
        $data['person_qsm'] = $this->input->post('person_qsm');
        $data['person_edara'] = $this->input->post('person_edara');
        $data['person_private_name'] = $this->input->post('person_private_name');
        $data['person_suspend'] = $this->input->post('person_suspend');
        $data['person_id'] = $this->input->post('person_id');
         $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');	
		
        if (!empty($file)){
            $data['person_img'] = $file;
        }

        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d');
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
        $this->db->where('id',$id);

        $this->db->update('hr_egraat_emp_setting', $data);

    }
    public function delete_egraa($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_egraat_emp_setting');

    }
    
    public function update_status($id, $value)
    {
        $data['person_suspend'] = 3 - $value;
        $this->db->where('id', $id);
        $this->db->update('hr_egraat_emp_setting', $data);
        return $data['person_suspend'];

    }
    /*public function update_status($id,$value){
        $data['person_suspend']= $value;
        $this->db->where('id',$id);
        $this->db->update('hr_egraat_emp_setting',$data);


    }*/

public function get_job_for_date($code){
        $this->db->where('job_title_code_fk',$code);
        $query = $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows()>0){
         
            return $query->last_row();
        } else{
            return false;
        }
    }
/*****************************************/

public function update_web_display($id, $value)
    {
        $data['web_display'] = 1 - $value;
        $this->db->where('id', $id);
        $this->db->update('hr_egraat_emp_setting', $data);
        return $data['web_display'];

    }
    public function display_web_emps(){
        $this->db->where('web_display',1);
        $this->db->order_by('person_code','ASC');
        $query= $this->db->get('hr_egraat_emp_setting');
        if ($query->num_rows()>0){
            $i =0;

            foreach ($query->result() as $row) {
                $data[$i]= $row;
                $data[$i]->emp_data= $this->get_emp_data($row->person_type,$row->person_id);
             

                   if ($row->person_type==1){
                        $data[$i]->path ='uploads/human_resources/emp_photo';

                    } elseif ($row->person_type==2 || $row->person_type==3){
                        $data[$i]->path ='uploads/md/gam3ia_omomia_members';


                    }elseif ($row->person_type==4){
                        $data[$i]->path ='';

                    }
                $i++;

            }
            return $data;
        }
        else{
            return false;
        }
    }

    public function get_emp_data($person_type,$emp_id){
        $table='';
        if ($person_type==1){
            $table ='employees';
            $mob = 'phone as mob';
            $img = 'personal_photo as img';

        } elseif ($person_type==2 || $person_type==3){
            $table ='md_all_gam3ia_omomia_members';
            $mob = 'jwal as mob';
            $img = 'mem_img as img';

        }elseif ($person_type==4){
            $table ='volunteers';
            $mob = 'mobile as mob';
            $img='';

        }
        $this->db->select('id,email,'.$mob.','.$img);
        $this->db->from($table);
        $this->db->where('id',$emp_id);
       $query = $this->db->get();
       if ($query->num_rows()>0){
           return $query->row();
       }
       else{
           return false;
       }
    }
}