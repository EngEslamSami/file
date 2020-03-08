<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdad_fatora_model extends CI_Model
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


    public function insert_fatora_details($id,$rkm)
    {
        //$this->delete_by_t_rkm($t_rkm);
         $count=0;
         if($this->input->post('f_markz_taklfa_id_fk') && !empty($this->input->post('f_markz_taklfa_id_fk'))){
          $count=count($this->input->post('f_markz_taklfa_id_fk'));
          for($x=0; $x<$count ; $x++)
          {

               $data['t_rkm_id_fk']=$id;
               $data['t_rkm_fk']=$rkm;
               //yara
             
               $data['f_value']=$this->input->post('f_value')[$x];
              $data['f_geha_id_fk']=$this->input->post('f_geha_id_fk')[$x];
              $data['f_geha_name']=$this->input->post('f_geha_name')[$x];
              $data['f_markz_taklfa_id_fk']=$this->input->post('f_markz_taklfa_id_fk')[$x];
              $data['rkm_fatora']=$this->input->post('rkm_fatora')[$x];
              $data['byan']=$this->input->post('byan')[$x];
              $date=strtotime($this->input->post('date')[$x]);
              $data['date']=$date;
              $data['date_ar']=date("Y-m-d",$date);


              $this->db->insert('finance_sadad_fatora_details',$data);
          }
        }
    }
    
    public function update_fatora_details($rkm,$id)
    {
       // $this->delete_by_t_rkm($id);
     
      //  return;
        $count=0;
        if($this->input->post('f_markz_taklfa_id_fk') && !empty($this->input->post('f_markz_taklfa_id_fk'))){
            $count=count($this->input->post('f_markz_taklfa_id_fk'));
        

              //  $data['t_rkm_id_fk']=$id;
                //$data['t_rkm_fk']=$rkm;
                //yara
            
                $data['f_value']=$this->input->post('f_value');
                $data['f_geha_id_fk']=$this->input->post('f_geha_id_fk');
                $data['f_geha_name']=$this->input->post('f_geha_name');
                $data['f_markz_taklfa_id_fk']=$this->input->post('f_markz_taklfa_id_fk');
                $data['rkm_fatora']=$this->input->post('rkm_fatora');
                $data['byan']=$this->input->post('byan');
                $date=strtotime($this->input->post('date'));
                $data['date']=$date;
                $data['date_ar']=date("Y-m-d",$date);
               
                $this->db->where('t_rkm_fk',$rkm)->where('id',$id)->update('finance_sadad_fatora_details',$data);
             
        }
       
    }


    public function insert_fatora()
    {
        $data['t_rkm']=$this->input->post('t_rkm');
        $data['total_value']=$this->input->post('total_value');
        $date=strtotime($this->input->post('t_date'));
       
        $data['t_date']=$date;
        $data['t_date_ar']=date("Y-m-d",$date);
        $data['debaga']=$this->input->post('debaga');
        //yara
        $data['no3_elsdad']=$this->input->post('no3_elsdad');
        $data['t_foot']=$this->input->post('t_foot');
        $data['salam']=$this->input->post('salam');
        $data['start_laqb']=$this->input->post('start_laqb');
        $data['end_laqb']=$this->input->post('end_laqb');
        //====================================================



        //====================================================


        //$data['total_value']=$this->input->post('total_value');
        $data['to_geha_id_fk']=$this->input->post('to_geha_id_fk');
        $data['to_geha_name']= $this->get_geha_name($this->input->post('to_geha_id_fk'));
       $data['to_geha_emp_name_n']=$this->get_geha_emp_name($this->input->post('to_geha_id_fk'));
        $data['mawdo3']=$this->input->post('mawdo3');
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar']= date("Y-m-d");
        $data['publisher']= $_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
        $data['current_form_user_id']= $_SESSION['emp_code'];
        $data['current_form_user_name']= $_SESSION['user_login_name'];

        $this->db->insert('finance_sadad_fatora',$data);
        return $this->db->insert_id();
    }

//==========================================================
    public function get_geha_name($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('hr_egraat_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }else{
            return false;
        }
    }
    public function get_geha_emp_name($id)
    {
        $this->db->where('job_title_id_fk',$id);
        $query=$this->db->get('hr_egraat_emp_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->person_name;
        }else{
            return false;
        }
    }

    //======================================
public function update_fatora($rkm)
{
    $data['t_rkm']=$this->input->post('t_rkm');

    $date=strtotime($this->input->post('t_date'));
    $data['t_date']=$date;
    $data['t_date_ar']=date("Y-m-d",$date);
    //yara
    $data['no3_elsdad']=$this->input->post('no3_elsdad');
    $data['t_foot']=$this->input->post('t_foot');
    $data['debaga']=$this->input->post('debaga');
    $data['salam']=$this->input->post('salam');
    $data['start_laqb']=$this->input->post('start_laqb');
    $data['end_laqb']=$this->input->post('end_laqb');
    $data['total_value']=$this->input->post('total_value');
    $data['to_geha_id_fk']=$this->input->post('to_geha_id_fk');
    $data['to_geha_name']= $this->get_geha_name($this->input->post('to_geha_id_fk'));
    $data['to_geha_emp_name_n']=$this->get_geha_emp_name($this->input->post('to_geha_id_fk'));
    $data['mawdo3']=$this->input->post('mawdo3');
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar']= date("Y-m-d");
    $data['publisher']= $_SESSION['user_id'];
    $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
    $this->db->where('t_rkm',$rkm);
    $this->db->update('finance_sadad_fatora',$data);
    return $this->db->insert_id();
}

    public function get_records()
    {
        //$this->db->group_by($field);
        $query=$this->db->get('finance_sadad_fatora');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
            foreach($query->result() as $row){
                $data[$x]=$row;
                $data[$x]->details=$this->get_fatora_details($row->t_rkm);
                $data[$x]->num_fators=$this->get_fatora_details_nums($row->t_rkm);


                $x++;


            }
            return $data;
        }else{
            return false;
        }


    }

    public function get_fatora_details_nums($rkm)
    {
        $this->db->where('t_rkm_fk',$rkm);
        $query=$this->db->get('finance_sadad_fatora_details');
        return $query->num_rows();
    }


    public function get_fatora_details($rkm)
    {
        $this->db->where('t_rkm_fk',$rkm);
        $query=$this->db->get('finance_sadad_fatora_details');
        if($query->num_rows()>0)
        {
            $x=0;
            $data=array();
           foreach ($query->result() as $row)
           {
               $data[$x]=$row;
               $data[$x]->markz_name=$this->get_markz_name($row->f_markz_taklfa_id_fk);
               $x++;


           }
            return $data;
        }else{
            return false;
        }
    }
    public function get_by_t_rkm($t_rkm)
    {
        $this->db->where('t_rkm',$t_rkm);
        $query=$this->db->get('finance_sadad_fatora');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
            foreach($query->result() as $row){
                $data[$x]=$row;
                $data[$x]->details=$this->get_fatora_details($row->t_rkm);
                $data[$x]->num_fators=$this->get_fatora_details_nums($row->t_rkm);
                $data[$x]->start_laqb_name=$this->get_laqb($row->start_laqb);
                $data[$x]->end_laqb_name=$this->get_laqb($row->end_laqb);
                $x++;


            }
            return $data;
        }else{
            return false;
        }
    }

    public function get_laqb($id)
    {
          $this->db->where('id_setting',$id);
          $query=$this->db->get('fr_settings');
        if($query->num_rows()>0)
        {
            return $query->row()->title_setting;
        }else{
            return false;
        }
    }


    public function get_num_fatora($num)
    {
        $this->db->where('t_rkm',$num);
        $query=$this->db->get('finance_sadad_fatora');
        return $query->num_rows();

    }

    public function get_total($num)
    {
        return 0;
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
                $table = 'magls_members_table';
                $field = 'member_name';
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
                $table = 'general_assembley_members';
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


public function delete_by_t_rkm($t_rkm)
{
    $this->db->where('t_rkm_id_fk',$t_rkm);
    $this->db->delete('finance_sadad_fatora_details');
}
//yara
public function delete_fatora($id)
{
    $this->db->where('id',$id);
    $this->db->delete('finance_sadad_fatora_details');
}

public function delete_fatora_by_t_rkm($t_rkm)
{
    $this->db->where('t_rkm',$t_rkm);
    $this->db->delete('finance_sadad_fatora');
}
    public function get_last_rkm()
    {
        $this->db->select('t_rkm');
        $this->db->order_by('id','desc');
        $query=$this->db->get('finance_sadad_fatora');
        if($query->num_rows()>0)
        {
            return $query->row()->t_rkm + 1;
        }else{
            return 1;
        }

    }
    
    public function get_markz($type)
    {
        $this->db->where('type',$type);
        $query=$this->db->get('employees_settings');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_gehat()
    {

        $query=$this->db->get('hr_egraat_setting');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }


    public function get_markz_name($id)
    {
        $this->db->where('id_setting',$id);
        $query=$this->db->get('employees_settings');
        if($query->num_rows()>0)
        {
            return $query->row()->title_setting;
        }else{
            return false;
        }

    }

    public function get_finance_gehat()
    {
        $query=$this->db->get('finance_gehat');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
    //=======================================================
    public function insert_geha(){
        $data['title'] = $this->input->post('title');
        $data['address'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $this->db->insert('finance_gehat', $data);
    }


    public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('finance_gehat');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('finance_gehat');
    }
    public function update_geah($id){


        $data['title']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('finance_gehat',$data);
    }
    public function get_name($table,$field,$return_field,$value)
    {
        $this->db->where($field,$value);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->row()->$return_field;
        }else{
            return false;
        }
    }
    public function insert_attach($id,$images)
    {
        if(isset($images)&& !empty($images))
        {
            $count=count($images);
            for($x=0; $x<$count;$x++)
            {
                
                $data['title']=$this->input->post('title');
                $data['file']=$images[$x];

                $this->db->where('id',$id)->update('finance_sadad_fatora_details',$data);
            }
        }

    }

    public function get_images($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('finance_sadad_fatora_details');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }
//yara
    public function delete_attach($id)
    {
        $data['title']='';
        $data['file']='';
        $this->db->where('id',$id);
        $this->db->update('finance_sadad_fatora_details',$data);
    }
    public function  get_fatora_id($id)
    {
        $this->db->where('t_rkm_id_fk',$id);
        $query=$this->db->get('finance_sadad_fatora_details');
        if($query->num_rows()>0)
        {
            return 0;
        }else{
            return false;
        }

    }
    //om
    public function get_by($table, $where_arr, $select = false)
    {

        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            if (!empty($select)) {
                return $q->$select;
            } else {
                return $q;
            }
        } else {
            return false;
        }

    }

    public function get_all_by($table, $where_arr)
    {

        $q = $this->db->where($where_arr)
            ->get($table);

        if ($q->num_rows() > 0) {
            return $q->result();

        } else {
            return false;
        }

    }


    public function transformation()
    {

        $rkm = $this->input->post('rkm');

        $data['current_to_user_id'] = $this->input->post('user_to');
        $data['current_to_user_name'] = $this->input->post('user_to_name');
        $data['suspend'] = 3;
        $data['level'] = 1;

        $this->db->where('t_rkm', $rkm);
        $this->db->update('finance_sadad_fatora', $data);
    }

    public function get_user_from_data()
    {


        $user_from = $this->db->where('person_id', $_SESSION['emp_code'])->get('hr_egraat_emp_setting')->row();

        return $user_from;
    }

    public function replay_transformation()
    {
        $user_from = $this->get_user_from_data();
        $rkm = $this->input->post('rkm');

        $data['current_form_user_id'] = $_SESSION['emp_code'];
        $data['current_form_user_name'] = $user_from->person_private_name;

        $data['current_to_user_id'] = $this->input->post('user_to');
        $data['current_to_user_name'] = $this->input->post('user_to_name');


        $data['current_suspend_reason'] = $this->input->post('current_suspend_reason');
        $data['suspend'] = $this->input->post('suspend');
        $data['level'] = 2;

        $this->db->where('t_rkm', $rkm);
        $this->db->update('finance_sadad_fatora', $data);
    }
}