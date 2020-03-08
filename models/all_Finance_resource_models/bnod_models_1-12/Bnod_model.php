<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bnod_model extends CI_Model
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

    public function get_all_account_group()
    {
        $query= $this->db->get('accounts_group');
        if($query->num_rows()>0)
        {
          $data=array();
            $x=0;
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->CountChilds=$this->getCountChilds($row->id);
                $data[$x]->branch=$this->get_branch($row->id);

               // $data[$x]->count_sub_branch=count($data[$x]->sub_branch);
                $x++;
            }
            return $data;
        }
    }

    public function get_branch($id)
    {
        $this->db->where('from_id',$id);
        $query=$this->db->get('accounts_group');
        $data=array();
        $x=0;
        foreach ($query->result() as $row)
        {
            $data[$x]=$row;
            $data[$x]->sub_branch=$this->get_branch($row->id);

            $x++;
        }

            return $data;
    }
public function get_sub_branch($id)
{
    $this->db->where('from_id',$id);
    $query=$this->db->get('accounts_group');
    $data=array();
    $x=0;
    foreach ($query->result() as $row)
    {
        $data[$x]=$row;
        $data[$x]->branches=$this->get_sub_branch($row->id);
        $x++;
    }

    return $data;
}

    //===========================================================

    public function getCountChilds($id)
    {
        $count = 0;

        $query = $this->db
            ->select('*')
            ->from('accounts_group')
            ->where('from_id', $id)
            ->get();

        if ($query->num_rows() > 0)
        {
            foreach($query->result() AS $objChild)
            {
                $count += $this->getCountChilds($objChild->id);
                ++ $count;
            }
        }
        return $count;
    }


public function insert_bnod($type)
{
   $select1=$this->input->post('select1');
    $select2=$this->input->post('select2');
    $select3=$this->input->post('select3');
    $select4=$this->input->post('select4');
    $select1_text=$this->input->post('select1_text');
    $select2_text=$this->input->post('select2_text');
    $select3_text=$this->input->post('select3_text');
    $select4_text=$this->input->post('select4_text');

if($type==1){ //  esal    erad_tabro3   fe2a     band
    $data['code']=$select1;
    $data['title']=$select1_text;
    $data['from_id']=$select1;
    $data['type']=$type;
    $data['esal']=0;
    $data['erad_tabro3']=0;
    $data['fe2a']=0;
    $data['band']=0;
}
    if($type==2){
        $data['code']=$select2;
        $data['title']=$select2_text;
        $data['from_id']=$select2;
        $data['type']=$type;
        $data['esal']=$select1;
        $data['erad_tabro3']=0;
        $data['fe2a']=0;
        $data['band']=0;
    }
    if($type==3){
        $data['code']=$select3;
        $data['title']=$select3_text;
        $data['from_id']=$select3;
        $data['type']=$type;
        $data['esal']=$select1;
        $data['erad_tabro3']=$select2;
        $data['fe2a']=0;
        $data['band']=0;

    }
    if($type==4){
        $data['code']=0;
        $data['title']=$select4_text;
        $data['from_id']=$select4;
        $data['type']=$type;
        $data['esal']=$select1;
        $data['erad_tabro3']=$select2;
        $data['fe2a']=$select3;
        $data['band']=0;

    }

        $this->db->insert('fr_bnod_pills_setting',$data);




}

    //======================================================

    public function get_from_table()
    {
        $this->db->order_by('id','desc');
        $query= $this->db->get('fr_bnod_pills_setting');
        $x=0;
        $data=array();
        if($query->num_rows()>0)
        {
            foreach ($query->result()as $row)
            {
                $data[$x]=$row;
                $data[$x]->basic=$this->get_name($row->from_id);
                $x++;
            }
            return $data;
        }
    }

    public function get_name($id)
    {
       $this->db->where('id',$id);
        $query=$this->db->get('accounts_group');
        if($query->num_rows()>0)
        {
            return $query->row()->name;
        }else{
            return "غير محدد";
        }
    }



public function select_bnod()
{
    $this->db->where('esal',0);
    $this->db->where('type',1);
    $query=$this->db->get('fr_bnod_pills_setting');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach ($query->result()as $row)
        {
            $data[$x]=$row;
            $data[$x]->erad=$this->erad_tabro3($row->from_id,'esal');
            if( isset($data[$x]->erad)&&!empty($data[$x]->erad)) {

                $data[$x]->fe2at = $this->fe2at($this->erad_tabro3($row->from_id, 'esal')->from_id);
            }else{
                $data[$x]->fe2at ='';
            }

            $x++;
        }
        return $data;
    }
}

    public function erad_tabro3($id,$filed)
    {
        $this->db->where($filed,$id);
        $this->db->where('erad_tabro3',0);
        $this->db->where('fe2a',0);
        $this->db->where('band',0);
        $query=$this->db->get('fr_bnod_pills_setting');
        if($query->num_rows()>0)
        {
            return $query->row();
        }
        else{
            return 0 ;
        }

    }

    public function fe2at($id)
    {
        $this->db->where('erad_tabro3',$id);
        $this->db->where('fe2a',0);
        $this->db->where('band',0);
        $query=$this->db->get('fr_bnod_pills_setting');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
           foreach ($query->result()as $row)
            {
             $data[$x]=$row;
             $data[$x]->bnod=$this->get_records($row->from_id);
            }
            return $data;
        }
        else{
            return "غير محدد";
        }

    }

    public function get_records($id)
    {

        $this->db->where('fe2a',$id);
        $this->db->where('band',0);
        $query=$this->db->get('fr_bnod_pills_setting');
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else{
            return "غير محدد";
        }
        return flase;

    }


public function bond_tabro3($id)
{

    $this->db->where('fe2a',$id);
    $query=$this->db->get('fr_bnod_pills_setting');
    if($query->num_rows()>0)
    {
        return $query->result();
    }
    else{
        return false ;
    }


}

    public function delete_record($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('fr_bnod_pills_setting');
    }

public function get_records_by_id($id)
{
    $this->db->where('from_id',$id);
    $query=$this->db->get(' accounts_group');
    if($query->num_rows()>0)
    {
        return $query->result();
    }
    else{
        return false ;
    }
}


}