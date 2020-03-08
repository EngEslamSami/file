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
       // $query= $this->db->get('dalel');
        $query = $this->db->get_where('dalel', array('ttype' =>'إيرادات'));

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
      
    $this->db->where('parent',$id);
        $query=$this->db->get('dalel');
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
    $this->db->where('parent',$id);
    $query=$this->db->get('dalel');
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
            ->from('dalel')
            ->where('parent', $id)
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


/*
print_r($type);
DIE;*/
//$type = 4;

if($type==1){ //  esal    erad_tabro3   fe2a     band
    $data['code']=$this->get_code_from_dalel($select1);
    $data['title']=$select1_text;
    $data['from_id']=$select1;
    $data['type']=$type;
    $data['esal']=0;
    $data['erad_tabro3']=0;
    $data['fe2a']=0;
    $data['band']=0;
    $this->db->insert('fr_bnod_pills_setting',$data);
}
    if($type==2){
        $data['code']=$this->get_code_from_dalel($select2);
        $data['title']=$select2_text;
        $data['from_id']=$select2;
        $data['type']=$type;
        $data['esal']=$select1;
        $data['erad_tabro3']=0;
        $data['fe2a']=0;
        $data['band']=0;
        $this->db->insert('fr_bnod_pills_setting',$data);
    }
    if($type==3){
        $data['code']=$this->get_code_from_dalel($select3);
        $data['title']=$select3_text;
        $data['from_id']=$select3;
        $data['type']=$type;
        $data['esal']=$select1;
        $data['erad_tabro3']=$select2;
        $data['fe2a']=0;
        $data['band']=0;
        $this->db->insert('fr_bnod_pills_setting',$data);

    }
    if($type==4){
        

        
        if(empty($select4)) {
            $data['code'] = $this->get_code_from_dalel($select2);
            $data['title'] = $select2_text;
            $data['from_id'] = $select2;
            $data['type'] = $type;
            $data['esal'] = $select1;
            $data['erad_tabro3'] = $select2;
            $data['fe2a'] = 0;
            $data['band'] = 0;
            $this->db->insert('fr_bnod_pills_setting', $data);
            $data2['code'] = $this->get_code_from_dalel($select2);
            $data2['title'] = $select2_text;
            $data2['from_id'] = $select2;
            $data2['type'] = 3;
            $data2['esal'] = $select1;
            $data2['erad_tabro3'] = $select2;
            $data2['fe2a'] = $select2;
            $data2['band'] = 0;
            $this->db->insert('fr_bnod_pills_setting', $data2);
            $data3['code'] = $this->get_code_from_dalel($select2);
        }else{
            $data['code']=$this->get_code_from_dalel($select4);
            $data['title']=$select4_text;
            $data['from_id']=$select4;
            $data['type']=$type;
            $data['esal']=$select1;
            $data['erad_tabro3']=$select2;
            $data['fe2a']=$select3;
            $data['band']=0;
            $this->db->insert('fr_bnod_pills_setting',$data);
        }




    }






}
public function get_code_from_dalel($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('dalel');
    if($query->num_rows()>0)
    {
      return $query->row()->code;
    }else{
        return false;
    }
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
        $query=$this->db->get('dalel');
        if($query->num_rows()>0)
        {
            return $query->row()->name;
        }else{
            return "غير محدد";
        }
    }

public function select_bnod_2()
{
    $this->db->where('fe2a !=',0);
   $this->db->group_by('from_id');
    $query=$this->db->get('fr_bnod_pills_setting');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach ($query->result()as $row)
        {
           $data[$x]=$row;
          //  $data[$x]->fe2aa=$this->get_name_bnd($row->erad_tabro3,3);
           $data[$x]->no3_esal=$this->get_name_bnd('from_id',$row->esal,1);
           $data[$x]->fe2aa=$this->get_name_bnd('erad_tabro3',$row->erad_tabro3,3);
           $data[$x]->no3_erad=$this->get_name_bnd('from_id',$row->erad_tabro3,2);
           //  $data[$x]->level_3=$this->get_name_bnd($row->esal,3);
           
           /* $data[$x]->erad=$this->erad_tabro3($row->from_id,'esal');
            if( isset($data[$x]->erad)&&!empty($data[$x]->erad)) {

                $data[$x]->fe2at = $this->fe2at($this->erad_tabro3($row->from_id, 'esal')->from_id);
            }else{
                $data[$x]->fe2at ='';
            }*/

            $x++;
        }
        return $data;
    }
}



    public function get_name_bnd($filled,$esal_id,$type)
    {
      $this->db->where('type',$type);
       $this->db->where($filled,$esal_id);
        $query=$this->db->get('fr_bnod_pills_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }else{
            return "غير محدد";
        }
    }




public function select_bnod()
{
    $this->db->where('esal',0);
   $this->db->group_by('from_id');
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
            return false ;
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
            return false;
        }
       

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
  //  $query = $this->db->get_where('dalel', array('ttype' =>'إيرادات'));
    $this->db->where('parent',$id);
    $query=$this->db->get('dalel');
    if($query->num_rows()>0)
    {
        return $query->result();
    }
    else{
        return false ;
    }
}
public function update_bnod($id)
{
    $band=$this->input->post('band');

    $band=explode('-',$band);
    $data['from_id']=$band[0];
    $data['title']=$band[1];
    $this->db->where('id',$id);
    $this->db->update('fr_bnod_pills_setting',$data);

}

}