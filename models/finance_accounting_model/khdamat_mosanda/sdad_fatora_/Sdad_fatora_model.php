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


    public function insert_fatora($rkm=0)
    {
        $this->delete_by_rkm($rkm);
        $count=0;
        if($this->input->post('value') && !empty($this->input->post('value'))){
          $count=count($this->input->post('value'));
          for($x=0; $x<$count ; $x++)
          {
              $data['f_value']=$this->input->post('value')[$x];
              $data['rkm']=$this->input->post('rkm');
              $date=strtotime($this->input->post('date')[$x]);
              $data['f_date']=$date;


              $data['f_date_ar']=date("Y-m-d",$date);
              $data['start_laqb']=$this->input->post('start_laqb')[$x];
              $data['geha_id_fk']=$this->input->post('geha_id_fk')[$x];
              $data['geha_name']=$this->input->post('geha_name')[$x];
              $data['end_laqb']=$this->input->post('end_laqb')[$x];
              $data['f_fatora_num']=$this->input->post('pill_num')[$x];
              $data['f_byan']=$this->input->post('byan')[$x];
              $data['f_markz_taklfa_id_fk']=$this->input->post('f_markz_taklfa_id_fk')[$x];
              $data['f_markz_taklfa_name']=$this->input->post('f_markz_taklfa_name')[$x];
              $data['date']=strtotime(date("Y-m-d"));
              $data['date_ar']=date("Y-m-d");
              $data['publisher']=$_SESSION['user_id'];
              $data['publisher_name']= $this->getUserName($_SESSION['user_id']);

              $this->db->insert('finance_sadad_fatora',$data);
          }
        }
    }



public function get_records($field=false)
{
    $this->db->group_by($field);
    $query=$this->db->get('finance_sadad_fatora');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach($query->result() as $row){
            $data[$x]=$row;
            $data[$x]->num_fators=$this->get_num_fatora($row->rkm);
            $data[$x]->total=$this->get_total($row->rkm);
            $x++;


        }
        return $data;
    }else{
        return false;
    }


}
    public function get_by_rkm($rkm)
    {
        $this->db->where('rkm',$rkm);
        $query=$this->db->get('finance_sadad_fatora');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
            foreach($query->result() as $row){
                $data[$x]=$row;
                $data[$x]->num_fators=$this->get_num_fatora($row->rkm);
                $data[$x]->total=$this->get_total($row->rkm);
                $x++;


            }
            return $data;
        }else{
            return false;
        }
    }
    public function get_num_fatora($num)
    {
        $this->db->where('rkm',$num);
        $query=$this->db->get('finance_sadad_fatora');
        return $query->num_rows();

    }

    public function get_total($num)
    {
        $this->db->select_sum('f_value');
        $this->db->where('rkm',$num);
        $query=$this->db->get('finance_sadad_fatora');
        if($query->num_rows()>0)
        {
          return   $query->row()->f_value;
        }else{
            return false;
        }
       //return $query->num_rows();
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


public function delete_by_rkm($rkm)
{
    $this->db->where('rkm',$rkm);
    $this->db->delete('finance_sadad_fatora');
}

}