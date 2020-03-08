<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder_model extends CI_Model
{
 public function insert_data($data)

 {
     $this->db->insert('arch_folders',$data);
 }

    public function get_main_folders()
    {
        $this->db->where('type',0);
        $this->db->where('deleted',0);
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {

            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->sub=$this->get_sub($row->id);
                $x++;
            }
            return $data;

        }else{
            return false;
        }
    }

    public function get_sub($id)
    {
       $this->db->where('from_id_fk',$id) ;
        $this->db->where('deleted',0);
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {

            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->sub=$this->get_sub($row->id);
                $x++;
            }
            return $data;

        }else{
            return false;
        }
    }

    public function get_sub_folder($id)
   {
      $this->db->where('id',$id);
       $query=$this->db->get('arch_folders');
       if($query->num_rows()>0)
       {
           return $query->row()->en_title;

       }else{
           return false;
       }
    }
    
        public function get_sub_folder_ar($id)
   {
      $this->db->where('id',$id);
       $query=$this->db->get('arch_folders');
       if($query->num_rows()>0)
       {
           return $query->row()->ar_title;

       }else{
           return false;
       }
    }
    public function get_path($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('arch_folders');
        if($query->num_rows()>0)
        {
            return $query->row()->path;

        }else{
            return false;
        }
    }

    public function get_all_records()
    {
        $this->db->order_by('id','desc');
        $this->db->where('deleted',0);
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
           // return $query->result();
            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->main_folder_name=$this->get_sub_folder($row->from_id_fk);

                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }


 public function get_all_records_ar()
    {
        $this->db->order_by('id','desc');
        $this->db->where('deleted',0);
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
           // return $query->result();
            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->main_folder_name=$this->get_sub_folder_ar($row->from_id_fk);

                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }

    public function get_array()
    {
        $this->db->select('from_id_fk');
        $this->db->where('id',4);
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            // return $query->result();
            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->main=$this->get_parent($row->from_id_fk);

                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }
public function get_parent($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('arch_folders');
    $main=array();
    if($query->num_rows()>0)
    {
        if($query->row()->type==1) {
            //
            array_push($main,$this->parent_branch($query->row()->from_id_fk));
        }else{
           // $main[]=$this->get_parent($query->row()->from_id_fk);
            array_push($main,$query->row()->from_id_fk);
        }
return $main;
    }else{
        return false;
    }
}

    public function parent_branch($id)
    {
        $this->db->where('id',$id);
    $query=$this->db->get('arch_folders');
    //$main=array();
    if($query->num_rows()>0)
    {
        return $query->row()->from_id_fk;


    }else{
        return false;
    }
    }


    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('arch_folders');
        //$main=array();
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }


    }

    public function update_data($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('arch_folders',$data);
    }
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


    //================================================================================================



    public function get_main_folders_for_delete($id)
    {

       // $this->db->where('deleted',0);
        $this->db->where('id',$id);
        $data_update['deleted']=1;
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {

            foreach($query->result() as $row)
            {
                $this->update_data($data_update,$row->id);
                $data[$x]=$row;
                $data[$x]->sub=$this->get_sub_delete($row->id,$data_update);
                

                
                $x++;
            }
            return $data;

        }else{
            return false;
        }
    }

    public function get_sub_delete($id,$data_update)
    {
        $this->db->where('from_id_fk',$id) ;
       // $this->db->where('deleted',0);
        $query=$this->db->get('arch_folders');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {

            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $this->update_data($data_update,$row->id);
                $data[$x]->sub=$this->get_sub_delete($row->id,$data_update);
                $x++;
            }
            return $data;

        }else{
            return false;
        }
    }



}

