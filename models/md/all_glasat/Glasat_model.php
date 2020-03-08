<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 31/01/2019
 * Time: 01:29 ص
 */

class Glasat_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }
public function get_last_magls()
{
    $this->db->where('suspend',1);
    $this->db->order_by('id','desc');
    $query=$this->db->get('md_all_mgales_edara');
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return 0;
    }
}
public function get_last_galsa()
{
    $this->db->select_max('glsa_rkm');
    $query=$this->db->get('md_all_glasat');
 //   $this->db->order_by('id','desc');
    if($query->num_rows()>0)
    {
        return $query->row()->glsa_rkm+1;
    }else{
        return 1;
    }
}

public function get_magls_member($code)
{$this->db->order_by('mansp_fk','ASC');
    $this->db->where('mgls_code',$code);
   
    
    $query=$this->db->get('md_all_magls_edara_members');  
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}
    public function get_last_galsa_member($rkm)
    {
        $this->db->where('glsa_rkm',$rkm);
        $query=$this->db->get('md_all_glasat_hdoor');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

public function insert_galsa()
{

$data['mgls_code']=$this->input->post('mgls_code');
$data['mgls_id_fk']=$this->input->post('mgls_id_fk');
$data['glsa_rkm']=$this->input->post('glsa_rkm');
$data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
$data['glsa_date_m']=$this->input->post('glsa_date_m');
$data['glsa_date_h']=$this->input->post('glsa_date_h');
$data['glsa_date']=strtotime($this->input->post('glsa_date_m'));
$this->db->insert('md_all_glasat', $data);
}
    public function update_galsa($rkm,$code)
    {

        $data['mgls_code']=$this->input->post('mgls_code');
        $data['mgls_id_fk']=$this->input->post('mgls_id_fk');
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
        $data['glsa_date_m']=$this->input->post('glsa_date_m');
        $data['glsa_date_h']=$this->input->post('glsa_date_h');
        $data['glsa_date']=strtotime($this->input->post('glsa_date_m'));
      //  $this->db->insert('md_all_glasat', $data);
        $this->db->where('mgls_code',$code);
        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat', $data);
    }
public function insert_galsa_member()
{


    if(!empty($this->input->post('member_id')))
    {
        $count=count($this->input->post('member_id'));
        for($x=0;$x<$count;$x++)
        {
            $data['mgls_code']=$this->input->post('mgls_code');
            $data['glsa_rkm']=$this->input->post('glsa_rkm');
            $data['mem_id_fk']=$this->input->post('member_id')[$x];
            $data['mem_name']=$this->get_mem_detail($this->input->post('member_id')[$x])->mem_name;
            $data['rkm_odwia_full']=$this->get_mem_detail($this->input->post('member_id')[$x])->rkm_odwia_full;
            $data['rkm_odwia']=$this->get_mem_detail($this->input->post('member_id')[$x])->rkm_odwia;
            $data['mansp_fk']=$this->get_mem_detail($this->input->post('member_id')[$x])->mansp_fk;
            $data['mansp_title']=$this->get_mem_detail($this->input->post('member_id')[$x])->mansp_title;
            $data['hdoor_satus']=0;
            $data['reason']=0;
            $this->db->insert('md_all_glasat_hdoor', $data);

        }



    }
}
public function update_galsa_member($rkm,$code)
{

        $this->db->where('glsa_rkm',$rkm) ;
        $this->db->where('mgls_code',$code) ;
        $this->db->delete('md_all_glasat_hdoor');
    if(!empty($this->input->post('member_id')))
    {
        $count=count($this->input->post('member_id'));
        for($x=0;$x<$count;$x++)
        {
            $data['mgls_code']=$this->input->post('mgls_code');
            $data['glsa_rkm']=$this->input->post('glsa_rkm');
            $data['mem_id_fk']=$this->input->post('member_id')[$x];
            $data['mem_name']=$this->get_mem_detail($this->input->post('member_id')[$x])->mem_name;
            $data['rkm_odwia_full']=$this->get_mem_detail($this->input->post('member_id')[$x])->rkm_odwia_full;
            $data['rkm_odwia']=$this->get_mem_detail($this->input->post('member_id')[$x])->rkm_odwia;
            $data['mansp_fk']=$this->get_mem_detail($this->input->post('member_id')[$x])->mansp_fk;
            $data['mansp_title']=$this->get_mem_detail($this->input->post('member_id')[$x])->mansp_title;
            $data['hdoor_satus']=0;
            $data['reason']=0;
            $this->db->insert('md_all_glasat_hdoor', $data);

        }



    }

}
public function get_mem_detail($id)
{
$this->db->where('mem_id_fk',$id);
$query=$this->db->get('md_all_magls_edara_members');
if($query->num_rows()>0)
{
    return $query->row();
}else{
    return false;
}


}

public function select_all()
{
    $this->db->order_by('glsa_rkm','desc');
   $query=$this->db->get('md_all_glasat');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->glsa_rkm);
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}

public function get_all_details($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    $query=$this->db->get('md_all_glasat_hdoor');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}
public function get_by_rkm($rkm)
{
    $this->db->where('glsa_rkm',$rkm);

    $query=$this->db->get('md_all_glasat');
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return false;
    }
}
public function get_details_by_rkm($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    $query=$this->db->get('md_all_glasat_hdoor');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}

public function get_galsa_member($rkm,$code)
{
    $this->db->where('glsa_rkm',$rkm);
    $this->db->where('mgls_code',$code);

    $query=$this->db->get('md_all_glasat_hdoor');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach ($query->result() as $row)
        {
            $data[]=$row->mem_id_fk;

            $x++;
        }
        return $data;
    }else{
        return false;
    }
}



public function select_all_glasat_by_rkm($glsa_rkm)
{
    $this->db->order_by('glsa_rkm','desc');
    $this->db->where('glsa_rkm',$glsa_rkm);
   $query=$this->db->get('md_all_glasat');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->glsa_rkm);
   $data[$x]->all_bnod=$this->get_all_bnod($row->glsa_rkm);
   
   
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}


public function get_all_bnod($glsa_rkm)
{
    $this->db->where('glsa_rkm',$glsa_rkm);
    $query=$this->db->get('md_gadwal_a3mal');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}


public function select_all_galasat_finshed()
{
     $this->db->where('glsa_finshed',1);
    $this->db->order_by('glsa_rkm','desc');
   $query=$this->db->get('md_all_glasat');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->glsa_rkm);
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}



  public function delete($table,$Conditions_arr){
       foreach($Conditions_arr as $key=>$value){
        $this->db->where($key,$Conditions_arr[$key]);    }
        $this->db->delete($table);
   }



public function get_open_galesa()
    {
        return $this->db->select('COUNT(id) as count ')->where('glsa_finshed', 0)->get('md_all_glasat')->row()->count;
    }




    }