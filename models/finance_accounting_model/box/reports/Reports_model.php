<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {
	public function chek_Null($post_value){
		if($post_value == '' || $post_value==null || (!isset($post_value))){
			$val='';
			return $val;
		}else{
			return $post_value;
		}
	}

      public function getAlldalel($from,$to)
      {
          $this->db->select('name,code,ttype,hesab_report,hesab_no3,id');
          $this->db->from('dalel');
          $this->db->where('hesab_report',2);
          $this->db->where('hesab_no3',2);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              $x=0;
              $erad_arr =array();
              $masrofat_arr =array();

              $data=array();
              foreach ($query->result() as $row){
                  $data[$x] =  $row;
                  if($row->ttype ==='إيرادات'){
                      $data[$x]->total_erad  = $this->getTotalValue($row->code,array('date >='=>strtotime($from),'date <='=>strtotime($to)));
                      $erad_arr[] =$row;
                  }else{
                      $data[$x]->total_erad  =0;
                  }

                  if($row->ttype ==='المصروفات'){
                      $data[$x]->total_masrofat  = $this->getTotalValue($row->code,array('date >='=>strtotime($from),'date <='=>strtotime($to)));
                      $masrofat_arr[] =$row;
                  }else{
                      $data[$x]->total_masrofat  =0;
                  }
                  $x++;}
              $output =array_merge($erad_arr, $masrofat_arr);
             return$output;
              //return$erad_arr;
          }else{
              return 0;
          }

      }
  /*  public function getAlldalel($from,$to)
    {
        $this->db->select('name,code,ttype,hesab_report,hesab_no3,id');
        $this->db->from('dalel');
        $this->db->where('hesab_report',2);
        $this->db->where('hesab_no3',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            $data=array();
            foreach ($query->result() as $row){
                $data[$x] =  $row;
                if($row->ttype ==='إيرادات'){
                    $data[$x]->total_erad  = $this->getTotalValue($row->code,array('date >='=>strtotime($from),'date <='=>strtotime($to)));

                }else{
                    $data[$x]->total_erad  =0;
                }

                if($row->ttype ==='المصروفات'){
                    $data[$x]->total_masrofat  = $this->getTotalValue($row->code,array('date >='=>strtotime($from),'date <='=>strtotime($to)));
                }else{
                    $data[$x]->total_masrofat  =0;
                }
                $x++;}
            return$data;
        }else{
            return 0;
        }

    }*/
    public function getTotalValue($code,$arr=false)
    {
        $this->db->select('*,SUM(dayen) as total_dayen,SUM(maden) as total_maden');
        $this->db->where("rkm_hesab",$code);
        $this->db->where($arr);
        $query=$this->db->get('finance_quods_details');
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){

                $total =  $row->total_dayen +$row->total_maden;

                $x++; }
            return $total;
        }else{
            return false;
        }
    }

/*********************************************/

    public function select_data_basic_order()
    {
        $this->db->select('*');
        $this->db->from('finance_quods_details');

        $this->db->order_by('qued_rkm_fk', "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->qued_date = $this->get_qued_date($row->qued_rkm_fk)["qued_date"];
                $data[$i]->qued_date_ar = $this->get_qued_date($row->qued_rkm_fk)["qued_date_ar"];
                
                $i++;
            }
            return $data;
        }
        return false;
    }



 public function get_qued_date ($qued_rkm_fk){
        $h = $this->db->get_where("finance_quods",array("rkm"=>$qued_rkm_fk));
     return   $data = $h->row_array();
      //  return $data["title_setting"];
    }
    
/********************************************************************/


   public function get_hesab_movement($arr)
    {
        $this->db->select('finance_quods_details.*,finance_quods.rkm,finance_quods.no3_qued_name');
        $this->db->from('finance_quods_details');
        $this->db->join('finance_quods','finance_quods.rkm = finance_quods_details.qued_rkm_fk','left');
        $this->db->where($arr);
         $this->db->order_by('finance_quods.rkm','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =  $row;

                $x++;}
            return$data;
        }else{
            return 0;
        }

    }

    public function get_hesab_tabe3a($code)
    {
        $this->db->select('*');
        $this->db->from('dalel');
        $this->db->where('code',$code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return$query->row()->hesab_tabe3a;
        }else{
            return 0;
        }

    }



    public function select_Rased_sabeq($date_from , $rkm_hesab)
{


     $this->db->select('*');
     $this->db->where('rkm_hesab',$rkm_hesab);
     $this->db->where('date < ',$date_from);
    $query = $this->db->get('finance_quods_details');
      $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $data1 =0;
        $data2=0;
        foreach ($query->result() as $row) {
            $data1 += $row->maden;
            $data2 += $row->dayen;
        }
        return array($data1,$data2);
    }
   return array(0,0);
}

/************************************************************/


/*
    public function select_all_maden($rkm_hesab)
    {
        $this->db->select('*');
        $this->db->where('rkm_hesab', $rkm_hesab);
        $query = $this->db->get('finance_quods_details');
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $data1 = 0;

            foreach ($query->result() as $row) {
                $data1 += $row->maden;
            }
            return $data1;
        }
        return 0;
    }


    public function select_all_dayen($rkm_hesab)
    {
        $this->db->select('*');
        $this->db->where('rkm_hesab', $rkm_hesab);
        $query = $this->db->get('finance_quods_details');
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $data1 = 0;

            foreach ($query->result() as $row) {
                $data1 += $row->dayen;
            }
            return $data1;
        }
        return 0;
    }
    */
    
    public function select_all_maden($rkm_hesab,$date_arr)
    {
        $this->db->select('*');
        $this->db->where('rkm_hesab', $rkm_hesab);
        $this->db->where($date_arr);
        $query = $this->db->get('finance_quods_details');
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $data1 = 0;

            foreach ($query->result() as $row) {
                $data1 += $row->maden;
            }
            return $data1;
        }
        return 0;
    }


    public function select_all_dayen($rkm_hesab,$date_arr)
    {
        $this->db->select('*');
        $this->db->where('rkm_hesab', $rkm_hesab);
        $this->db->where($date_arr);
        $query = $this->db->get('finance_quods_details');
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            $data1 = 0;

            foreach ($query->result() as $row) {
                $data1 += $row->dayen;
            }
            return $data1;
        }
        return 0;
    }


/*
    public function tree($arr,$date_arr)
    {
         $from =array_values($date_arr);
         $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        if(!empty($arr)){
            $this->db->where($arr);
        }else{
            $this->db->where('parent',0);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['totla_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);

                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $children = $this->build_child($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {


                    $role['children'] = $children[0];

                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                }else{
                    $role['all_maden'] = $this->select_all_maden($result[$key]['code'],$date_arr);
                    $role['all_dayen'] = $this->select_all_dayen($result[$key]['code'],$date_arr);

                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }
*/	


    public function tree($arr, $date_arr){

        $from =array_values($date_arr);
        $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');

        if (!empty($arr)) {
            $this->db->where($arr);
        } else {
            $this->db->where('parent', 0);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['totla_sabeq'] = $this->select_Rased_sabeq($date_from, $result[$key]['code']);

                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $role['all_total_maden_sabek'] = 0;
                $role['all_total_dayen_sabek'] = 0;


                $children = $this->build_child($result[$key]['id'], $date_arr);

                if (!empty($children[0])) {
                    $role['children'] = $children[0];

                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                } else {
                    $role['all_maden'] = $this->select_all_maden($result[$key]['code'], $date_arr);
                    $role['all_dayen'] = $this->select_all_dayen($result[$key]['code'], $date_arr);
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }




    public function build_child($parent, $date_arr){
        $from =array_values($date_arr);
        $date_from =$from[0];
        $query = $this->db->query('select * from dalel where parent = ' . $parent . '');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;


        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];

                $role['totla_sabeq'] = $this->select_Rased_sabeq($date_from, $result[$key]['code']);

                $role['all_maden'] = $this->select_all_maden($result[$key]['code'], $date_arr);
                $role['all_dayen'] = $this->select_all_dayen($result[$key]['code'], $date_arr);


                $role['all_total_maden_sabek'] = 0;
                $role['all_total_dayen_sabek'] = 0;

                $children = $this->build_child($result[$key]['id'], $date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

                    // $role['sizeofchildren'] = count($children[0])-1;
                }

                $roles[] = $role;
            }
        }

        //    echo $eslam_maden.'<br/>';
        // echo '<pre>';
        //  print_r($roles);
        return array($roles, $value2, $eslam_maden);
    }	
/*	
	
	    public function build_child($parent,$date_arr)
    {

        $from =array_values($date_arr);
        $date_from =$from[0];
        $query = $this->db->query('select * from dalel where parent = ' . $parent . '');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;


        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {


                if ($result[$key]['hesab_tabe3a'] == 1) {

                } elseif ($result[$key]['hesab_tabe3a'] == 2) {

                }
                // $value2 += 0 + $value;
                //  $eslam_maden +=$madeen_result[0]->madeen;

                //  $role['id'] = $result[$key]->id;
                //  $role['last_value'] = $madeen_result[0]->madeen+ $value;
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                // $role['last_value'] = $result[$key]->last_value;

                $role['totla_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);

                $role['all_maden'] = $this->select_all_maden($result[$key]['code'],$date_arr);
                $role['all_dayen'] = $this->select_all_dayen($result[$key]['code'],$date_arr);




                $children = $this->build_child($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

              
                }

                $roles[] = $role;
            }
        }

        return array($roles, $value2, $eslam_maden);
    }
*/
    
    
   /* public function tree($arr,$date_arr)
    {
         $from =array_values($date_arr);
         $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        //$this->db->where('code', 1311);
        if(!empty($arr)){
            $this->db->where($arr);
        }else{
            $this->db->where('parent',0);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['totla_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);

                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $children = $this->build_child($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {


                    $role['children'] = $children[0];

                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                }else{
                    $role['all_maden'] = $this->select_all_maden($result[$key]['code'],$date_arr);
                    $role['all_dayen'] = $this->select_all_dayen($result[$key]['code'],$date_arr);

                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }*/
 /*   public function tree($arr)
    {
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        //$this->db->where('code', 1311);
        if(!empty($arr)){
            $this->db->where($arr);
        }else{
            $this->db->where('parent',0);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $children = $this->build_child($result[$key]['id']);

                if (!empty($children[0])) {


                    $role['children'] = $children[0];

                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                }else{
                $role['all_maden'] = $this->select_all_maden($result[$key]['code']);
                $role['all_dayen'] = $this->select_all_dayen($result[$key]['code']);
                    
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }
*/


   /* public function build_child($parent,$date_arr)
    {
        $query = $this->db->query('select * from dalel where parent = ' . $parent . '');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;


        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {


                if ($result[$key]['hesab_tabe3a'] == 1) {

                } elseif ($result[$key]['hesab_tabe3a'] == 2) {

                }
                // $value2 += 0 + $value;
                //  $eslam_maden +=$madeen_result[0]->madeen;

                //  $role['id'] = $result[$key]->id;
                //  $role['last_value'] = $madeen_result[0]->madeen+ $value;
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                // $role['last_value'] = $result[$key]->last_value;


                $role['all_maden'] = $this->select_all_maden($result[$key]['code'],$date_arr);
                $role['all_dayen'] = $this->select_all_dayen($result[$key]['code'],$date_arr);





                $children = $this->build_child($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

                    // $role['sizeofchildren'] = count($children[0])-1;

                }

                $roles[] = $role;
            }
        }

        //    echo $eslam_maden.'<br/>';
        // echo '<pre>';
        //  print_r($roles);
        return array($roles, $value2, $eslam_maden);
    }
*/


    
    

    public function Get_hesab_name($hesab_rkm)
    {
        $this->db->select('name,code');
        $this->db->from('dalel');
        $this->db->where('code',$hesab_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return$query->row()->name;
        }else{
            return false;
        }

    }
    /******************************************/
    
       public function tree_anshta($date_arr)
    {

        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        $this->db->where_in('id', array('3','4'));
        $this->db->where('parent',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_erad'] = 0;
                $role['all_masrofat'] = 0;


               // $role['account_type'] = $result[$key]['hesab_tabe3a'];

                $role['ttype'] = $result[$key]['ttype'];
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                //$role['type'] = $result[$key]['hesab_tabe3a'];
               // $role['madeen'] = 0;
                //$role['dayen'] = 0;
                $role['Total_erad'] = 0;
                $role['Total_masrofat'] = 0;

                $children = $this->build_child_anshta_new($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['children'] = $children[0];
                    $role['Total_erad'] = 0;
                    $role['Total_masrofat'] = 0;
                }else{

                    if($role['ttype'] ==='إيرادات'){
                        $role['all_erad']  = $this->getTotalValue_erad($role['code'],$date_arr);

                    }else{
                        $role['all_erad']  =0;
                    }

                    if($role['ttype'] ==='المصروفات'){
                        $role['all_masrofat']  = $this->getTotalValue_masrof($role['code'],$date_arr);
                    }else{
                        $role['all_masrofat']  =0;
                    }

                    //$role['all_erad'] = $this->getTotalValue($result[$key]['code'],$date_arr);
                   // $role['all_masrofat'] = $this->getTotalValue($result[$key]['code'],$date_arr);

                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }
    
/*********************************************************************/    
    
     public function getTotalValue_erad($code,$arr=false)
    {
        $this->db->select('*,SUM(dayen) as total_dayen,SUM(maden) as total_maden');
        $this->db->where("rkm_hesab",$code);
        $this->db->where($arr);
        $query=$this->db->get('finance_quods_details');
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){

                $total =  $row->total_dayen -   $row->total_maden  ;

                $x++; }
            return $total;
        }else{
            return false;
        }
    }
    
    
        public function getTotalValue_masrof($code,$arr=false)
    {
        $this->db->select('*,SUM(dayen) as total_dayen,SUM(maden) as total_maden');
        $this->db->where("rkm_hesab",$code);
        $this->db->where($arr);
        $query=$this->db->get('finance_quods_details');
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){

                $total = $row->total_maden -  $row->total_dayen;

                $x++; }
            return $total;
        }else{
            return false;
        }
    }   
    
    

/*************************************************************************/
    public function build_child_anshta($parent,$date_arr)
    {
        $query = $this->db->query('select * from dalel where parent = ' . $parent . '');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;


        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {

                if ($result[$key]['hesab_tabe3a'] == 1) {
                } elseif ($result[$key]['hesab_tabe3a'] == 2) {
                }
                $role['ttype'] = $result[$key]['ttype'];
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
               // $role['type'] = $result[$key]['hesab_tabe3a'];
                // $role['last_value'] = $result[$key]->last_value;



                if($role['ttype'] ==='إيرادات'){
                    $role['all_erad']  = $this->getTotalValue_erad($role['code'],$date_arr);

                }else{
                    $role['all_erad']  =0;
                }

                if($role['ttype'] ==='المصروفات'){
                    $role['all_masrofat']  = $this->getTotalValue_masrof($role['code'],$date_arr);
                }else{
                    $role['all_masrofat']  =0;
                }

               // $role['all_maden'] = $this->select_all_maden($result[$key]['code'],$date_arr);
                //$role['all_dayen'] = $this->select_all_dayen($result[$key]['code'],$date_arr);



                $children = $this->build_child_anshta($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

                }

                $roles[] = $role;
            }
        }

        //    echo $eslam_maden.'<br/>';
        // echo '<pre>';
        //  print_r($roles);
        return array($roles, $value2, $eslam_maden);
    } 
    
   
   
   
   
   
       public function build_child_anshta_new($parent,$date_arr)
    {
        $query = $this->db->query('select * from dalel where parent = ' . $parent . '');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;


        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {

                if ($result[$key]['hesab_tabe3a'] == 1) {
                } elseif ($result[$key]['hesab_tabe3a'] == 2) {
                }
                $role['ttype'] = $result[$key]['ttype'];
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
               // $role['type'] = $result[$key]['hesab_tabe3a'];
                // $role['last_value'] = $result[$key]->last_value;



                if($role['ttype'] ==='إيرادات'){
                    $role['all_erad']  = $this->getTotalValue_erad($role['code'],$date_arr);

                }else{
                    $role['all_erad']  =0;
                }

                if($role['ttype'] ==='المصروفات'){
                    $role['all_masrofat']  = $this->getTotalValue_masrof($role['code'],$date_arr);
                }else{
                    $role['all_masrofat']  =0;
                }

               // $role['all_maden'] = $this->select_all_maden($result[$key]['code'],$date_arr);
                //$role['all_dayen'] = $this->select_all_dayen($result[$key]['code'],$date_arr);



                $children = $this->build_child_anshta($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

                }

                $roles[] = $role;
            }
        }

        //    echo $eslam_maden.'<br/>';
        // echo '<pre>';
        //  print_r($roles);
        return array($roles, $value2, $eslam_maden);
    } 
/*********************************************************************/   
   
    
    
    
    
    
      public function check_rkm_hesab_dalel($arr)
    {
        $this->db->select('*');
        $this->db->where($arr);
        $query = $this->db->get('dalel');
        $query_result = $query->result();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else {
            return false;
        }

    }

    
    
}

