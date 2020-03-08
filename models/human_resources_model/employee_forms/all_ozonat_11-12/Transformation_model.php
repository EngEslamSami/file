<?php
class Transformation_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();  //Public_employee_main_data->get_qsm_name_by_emp_id
        $this->load->model('human_resources_model/Public_employee_main_data');
    }

    public function my_orders($table,$arr)
    {
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function change_approved($id)
    {
        $q=$this->get_by_id('hr_all_ozonat_orders', $id);
        $sett=$this->get_from_setting(1);

        $data['level'] = 1;
        $data['current_from_id']= $q->emp_user_id;



        $data['current_to_id']= $this->get_user_emp_id($q->direct_manager_id_fk,3);
        $data['current_from_user_name']=$this->get_user_name_submit($data['current_from_id']);
        $data['current_to_user_name']=$this->get_user_name_submit($data['current_to_id']);
        $data['talab_in_fk']=$sett->id;
        $data['talab_in_title']=$sett->title;

            $data['talab_msg'] = $sett->msg_accept;

        $data['suspend']=1;
        $this->db->where('id', $id);
        $this->db->update('hr_all_ozonat_orders', $data);

    }

    public function get_all_employees($table)
    {
        return $this->db->get($table)->result();
    }

    public function get_by_id($table, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        $data = array();

        if ($query->num_rows() > 0) {

            $x=0;
            $data[$x] = $query->row();  // emp  departs  adminstration
            $data[$x]->emp = $this->get_user_name_submit($query->row()->emp_user_id);
            $data[$x]->departs = $this->Public_employee_main_data->get_qsm_name_by_emp_id($query->row()->emp_id_fk);
            $data[$x]->adminstration = $this->Public_employee_main_data->get_edara_name_by_emp_id($query->row()->emp_id_fk);
            $data[$x]->num_personal_ezn = $this->get_num_ezn($query->row()->emp_id_fk,1);
            $data[$x]->peroid_personal_ezn = $this->select_sum_($query->row()->emp_id_fk,1);
            $data[$x]->num_work_ezn = $this->get_num_ezn($query->row()->emp_id_fk,2);
            $data[$x]->peroid_work_ezn = $this->select_sum_($query->row()->emp_id_fk,2);
            $data[$x]->direct_manager = $this->get_direct_manager_data($query->row()->direct_manager_id_fk);
            $data[$x]->personal_user_img=$this->get_personal_img($query->row()->emp_user_id);
            return $data[$x];
        } else {
            return false;
        }
    }
    public function get_num_ezn($emp_id,$type)
    {
        $this->db->where('emp_id_fk',$emp_id);
        $this->db->where('no3_ezn',$type);
        $this->db->where('suspend',4);
        return $this->db->get('hr_all_ozonat_orders')->num_rows();

    }
    public function select_sum_($emp_id,$type)
    {
        $this->db->select_sum('total_hours');
        $this->db->where('emp_id_fk',$emp_id);
        $this->db->where('no3_ezn',$type);
        $this->db->where('suspend',4);
        $query=$this->db->get('hr_all_ozonat_orders');
        if($query->num_rows()>0)
        {
            return $query->row()->total_hours;
        }else{
            return 0;
        }
    }

     public function get_emp($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('employees');
    if($query->num_rows()>0)
    {
        return $query->row()->employee;
    }else{
        return false;
    }
}
    public function get_job_name($id)
    {
        $this->db->where('defined_id',$id);
        $query=$this->db->get('all_defined_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->defined_title;
        }else{
            return false;
        }
    }
    public function change_suspend()
    {
        $sett=$this->get_from_setting($this->input->post('level'));
        $id=$this->input->post('ezn_id');
        $q=$this->get_by_id('hr_all_ozonat_orders', $id);
        $data['current_from_id']=$this->input->post('current_from_id');
        $data['current_to_id']= $this->get_user_emp_id($this->input->post('current_to_id'),3);
        $data['current_from_user_name']=$this->get_user_name_submit($data['current_from_id']);
        $data['current_to_user_name']=$this->get_user_name_submit($data['current_to_id']);

        $data['suspend'] = $this->input->post('valu');
        $data['level']=$this->input->post('level');

        if($this->input->post('level')==5 &&$data['suspend']==1) {
            $data['suspend'] = 4;
            $data['current_to_id']= $q->emp_user_id;
            $data['current_to_user_name']=$this->get_user_name_submit($data['current_to_id']);

        }
        if($data['suspend']==2) {
            if ($this->input->post('level') > 4){
                $data['suspend'] = 5;
            $data['current_to_id'] = $q->emp_user_id;
            $data['current_to_user_name'] = $this->get_user_name_submit($data['current_to_id']);
        }else{
                $data['suspend'] = 5;
                $data['current_to_id'] = $q->emp_user_id;
                $data['current_to_user_name'] = $this->get_user_name_submit($data['current_to_id']);
            }

        }
        $data['talab_in_fk']=$sett->id;
        $data['talab_in_title']=$sett->title;
        if($this->input->post('valu')==1) {
            $data['talab_msg'] = $sett->msg_accept;
        }else{
            $data['talab_msg']=$sett->msg_refuse;
        }

        $this->db->where('id',$id);
        $this->db->update('hr_all_ozonat_orders',$data);

    }
    //===================================================

    public function get_from_setting($level)
    {
       $this->db->where('level',$level) ;
       $this->db->where('tbl','ozonat') ;
        $query=$this->db->get('hr_all_transformation_setting');
        if($query->num_rows()>0)
        {
           return $query->row();
        }else{
            return false;
        }
    }
    //===================================================



    public function insert_transformation()
    {
if($this->input->post('level')){
    $level=$this->input->post('level');
}else{
    $level=1;
}
        $sett=$this->get_from_setting($level);
        $id=$this->input->post('ezn_id');
        $q=$this->get_by_id('hr_all_ozonat_orders', $id);
        $data['ezn_rkm_fk']=$q->ezn_rkm;
        $data['ezn_rkm_id']=$q->id;

        $data['from_user_id'] = $q->current_from_id;
        $data['to_user_id'] = $q->current_to_id;

       $data['from_user_name']=$this->get_user_name_submit( $data['from_user_id']);
        $data['to_user_name']=$this->get_user_name_submit($data['to_user_id']);
       // $data['current_procedure']=$this->input->post('current_procedure');
       // $data['procedure_title']=$this->input->post('current_process_title');
        //=================================================
        $data['talab_in_fk']=$sett->id;
        $data['talab_in_title']=$sett->title;
        if($this->input->post('valu')==1) {
            $data['talab_msg'] = $sett->msg_accept;
        }else{
            $data['talab_msg']=$sett->msg_refuse;
        }




        //====================================================

        $data['level']=$this->input->post('level');
        $data['suspend']=$this->input->post('valu');
        $data['date']=strtotime(date("Y-m-d"));
        $data['date_ar']=date("Y-m-d");
        $data['publisher']=$_SESSION['user_id'];
        //print_r($data);
       $this->db->insert('hr_all_ozonat_history',$data);
    }
    public function insert_transformation_level2($id)
    {
        if($this->input->post('level')){
            $level=$this->input->post('level');
        }else{
            $level=1;
        }
        $sett=$this->get_from_setting($level);
        $q=$this->get_by_id('hr_all_ozonat_orders', $id);
        $data['ezn_rkm_fk']=$q->ezn_rkm;
        $data['ezn_rkm_id']=$q->id;

        $data['from_user_id'] = $q->current_from_id;
        $data['to_user_id'] = $q->current_to_id;



        $data['from_user_name']=$this->get_user_name_submit($data['from_user_id']);
        $data['to_user_name']=$this->get_user_name_submit($data['to_user_id']);
        //$data['current_procedure']=1;
       // $data['procedure_title']='موافق';
        $data['talab_in_fk']=$sett->id;
        $data['talab_in_title']=$sett->title;
        if($this->input->post('valu')==1) {
            $data['talab_msg'] = $sett->msg_accept;
        }else{
            $data['talab_msg']=$sett->msg_refuse;
        }
        $data['level']=$level;
        $data['suspend']=1;
        $data['date']=date("Y-m-d");
        $data['publisher']=$_SESSION['user_id'];

        $this->db->insert('hr_all_ozonat_history',$data);
    }


    public function select_by(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id !=',9);
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_emps_by_edara($table,$valu)
    {
        $this->db->where('administration',$valu);
        return $this->db->get($table)->result();
    }
    //====================
    public function get_user_name_submit($user_id)
    {
        $this->db->select('*');
        $this->db->where("user_id",$user_id);
        $query=$this->db->get('users');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $name = $this->get_user_name_member($data->user_name);
                return $name;
            }
            elseif($data->role_id_fk == 3)
            {
                $name = $this->get_emp_name($data->emp_code);
                return $name;
            }
            elseif($data->role_id_fk == 4)
            {
                $name = $this->name_general_assembley($data->user_name);
                return $name;
            }



        }
        return false;
    }

    public function get_user_name_member($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('magls_members_table');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->member_name;
        }
        return false;

    }

    public function get_emp_name($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('employees');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->employee;
        }
        return false;

    }

    public function name_general_assembley($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->name;
        }
        return false;

    }
    public function get_user_emp_id($user_id,$role_id_fk)
    {
        $this->db->where('emp_code',$user_id);
        $this->db->where('role_id_fk',$role_id_fk);
        $query=$this->db->get('users');
        if($query->num_rows() > 0)
        {
            return $query->row()->user_id;
        }else{
            return false;
        }
    }

    public function get_direct_manager_data($emp_id)
    {
        $data=array();
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id', $emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $data[$x]= $query->row();
            $data[$x]->job_name= $this->get_job_name($query->row()->degree_id);
            return $data[$x];

        } else {
            return false;
        }

    }

    
  public function get_array_by_id($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ezn_rkm_id', $id);
        $query = $this->db->get();
        $data=array();
        $x=0;
        if($query->result()>0)
        {
            //return $query->result();
            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->personal_img=$this->get_personal_img($row->to_user_id);
                $x++;

            }
            return $data;
        }else{
            return false;
        }
    }
	
	
	
	 public function get_personal_img($id)
    {
        $this->db->where('user_id',$id);
        $query=$this->db->get('users');

        if($query->num_rows()>0)
        {
            return $query->row()->user_photo;
        }else{
            return false;
        }
    }
}