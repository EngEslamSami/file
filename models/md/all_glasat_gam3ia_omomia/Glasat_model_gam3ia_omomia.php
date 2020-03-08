<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 31/01/2019
 * Time: 01:29 ص
 */

class Glasat_model_gam3ia_omomia extends CI_Model
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
  
    $this->db->order_by('id','desc');
    $query=$this->db->get('md_all_gam3ia_omomia_members');
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
    $query=$this->db->get('md_all_glasat_gam3ia_omomia');

    if($query->num_rows()>0)
    {
        return $query->row()->glsa_rkm+1;
    }else{
        return 1;
    }
}

/*public function get_magls_member()
{
  
   
    
    $query=$this->db->get('md_all_gam3ia_omomia_members');  
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}*/

    public function get_magls_member()
    {
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->odwiat = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->id), '');
            }
            return $query;
        } else {
            return false;
        }
    }



    public function get_last_galsa_member($rkm)
    {
        $this->db->where('glsa_rkm',$rkm);
        $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

public function insert_galsa()
{

$data['glsa_rkm']=$this->input->post('glsa_rkm');
$data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
$data['glsa_date_m']=$this->input->post('glsa_date_m');
$data['glsa_date_h']=$this->input->post('glsa_date_h');
$data['glsa_date']=strtotime($this->input->post('glsa_date_m'));
$this->db->insert('md_all_glasat_gam3ia_omomia', $data);
}
    public function update_galsa($rkm)
    {

        
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
        $data['glsa_date_m']=$this->input->post('glsa_date_m');
        $data['glsa_date_h']=$this->input->post('glsa_date_h');
        $data['glsa_date']=strtotime($this->input->post('glsa_date_m'));
   
        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat_gam3ia_omomia', $data);
    }
public function insert_galsa_member()
{


    if(!empty($this->input->post('member_id')))
    {
        $count=count($this->input->post('member_id'));
        for($x=0;$x<$count;$x++)
        {
       
            $data['glsa_rkm']=$this->input->post('glsa_rkm');
            $data['mem_id_fk']=$this->input->post('member_id')[$x];
            $data['mem_name']=$this->get_mem_detail($this->input->post('member_id')[$x])->name;
        
            $data['hdoor_satus']=0;
            $data['reason']=0;
            $this->db->insert('md_all_glasat_hdoor_gam3ia_omomia', $data);

        }



    }
}
public function update_galsa_member($rkm)
{

        $this->db->where('glsa_rkm',$rkm) ;
     
        $this->db->delete('md_all_glasat_hdoor_gam3ia_omomia');
    if(!empty($this->input->post('member_id')))
    {
        $count=count($this->input->post('member_id'));
        for($x=0;$x<$count;$x++)
        {
           
            $data['glsa_rkm']=$this->input->post('glsa_rkm');
            $data['mem_id_fk']=$this->input->post('member_id')[$x];
            $data['mem_name']=$this->get_mem_detail($this->input->post('member_id')[$x])->name;
      
            $data['hdoor_satus']=0;
            $data['reason']=0;
            $this->db->insert('md_all_glasat_hdoor_gam3ia_omomia', $data);

        }



    }

}
public function get_mem_detail($id)
{
$this->db->where('id',$id);
$query=$this->db->get('md_all_gam3ia_omomia_members');
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
   $query=$this->db->get('md_all_glasat_gam3ia_omomia');
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
/*
public function get_all_details($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}*/


/*    public function get_all_details($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->start_laqb = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk), 'laqb_title');
            }
            return $query;
        } else {
            return false;
        }
    }*/
    
    
     public function get_all_details($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }  
    
    
public function get_by_rkm($rkm)
{
    $this->db->where('glsa_rkm',$rkm);

    $query=$this->db->get('md_all_glasat_gam3ia_omomia');
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
    $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}

public function get_galsa_member($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    

    $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
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



/*public function select_all_glasat_by_rkm($glsa_rkm)
{
    $this->db->order_by('glsa_rkm','desc');
    $this->db->where('glsa_rkm',$glsa_rkm);
   $query=$this->db->get('md_all_glasat_gam3ia_omomia');
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

}*/

    public function select_all_glasat_by_rkm($glsa_rkm)
    {
        $this->db->order_by('glsa_rkm', 'desc');
        $this->db->where('glsa_rkm', $glsa_rkm);
        $query = $this->db->get('md_all_glasat_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_all_details_for_print($row->glsa_rkm);


                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }

   public function get_all_details_for_print($rkm)
    {
        $this->db->where('glsa_rkm', $rkm)->where('hdoor_satus',1);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }


public function select_all_galasat_finshed()
{
     $this->db->where('glsa_finshed',1);
    $this->db->order_by('glsa_rkm','desc');
   $query=$this->db->get('md_all_glasat_gam3ia_omomia');
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
        return $this->db->select('COUNT(id) as count ')->where('glsa_finshed', 0)->get('md_all_glasat_gam3ia_omomia')->row()->count;
    }

  /*  public function get_by($table, $where_arr, $select)
    {

        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            return $q->$select;
        } else {
            return false;
        }

    }
*/


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

    }