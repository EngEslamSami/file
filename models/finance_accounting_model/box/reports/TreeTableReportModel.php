<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TreeTableReportModel extends CI_Model
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

    public function tree()
    {
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        //$this->db->where('code', 1311);
  $this->db->where('parent',0);
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
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }


    public function build_child($parent)
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

                /* $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id.' ');
                 $result2 = $query2->result();

                 $query = $this->db->query('select SUM(maden) AS madeen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                 $madeen_result = $query->result();
                 $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                 $dayen_result = $query->result();*/
                if ($result[$key]['hesab_tabe3a'] == 1) {
                    /* $value = $madeen_result[0]->madeen - $dayen_result[0]->dayen;
                     $role['madeen'] = 0 + $madeen_result[0]->madeen;
                     $role['dayen'] = $dayen_result[0]->dayen;*/
                } elseif ($result[$key]['hesab_tabe3a'] == 2) {
                    /*  $value = $dayen_result[0]->dayen - $madeen_result[0]->madeen;
                      $role['madeen'] = $madeen_result[0]->madeen;
                      $role['dayen'] = 0 + $dayen_result[0]->dayen;*/
                }
                // $value2 += 0 + $value;
                //  $eslam_maden +=$madeen_result[0]->madeen;

                //  $role['id'] = $result[$key]->id;
                //  $role['last_value'] = $madeen_result[0]->madeen+ $value;
                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                // $role['last_value'] = $result[$key]->last_value;


                $role['all_maden'] = $this->select_all_maden($result[$key]['code']);
                $role['all_dayen'] = $this->select_all_dayen($result[$key]['code']);


                /*$role['madeen'] =0;
                $role['dayen'] = 0;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->madeen;


                  $role['total'] = $madeen_result[0]->madeen;*/


                $children = $this->build_child($result[$key]['id']);

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

/*******************************/
/*
 public function tree_date($date_arr)
    {
        $from =array_values($date_arr);
        $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        //$this->db->where('code', 1311);
        $this->db->order_by('code', 'ASC');
        $this->db->where('parent',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $children = $this->build_child_date($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {


                    $role['children'] = $children[0];

                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }
    */
  /*  public function tree_date($date_arr)
    {
        $from =array_values($date_arr);
        $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        //$this->db->where('code', 1311);
        $this->db->where('parent',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $children = $this->build_child_date($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {


                    $role['children'] = $children[0];

                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }*/
 public function tree_date($date_arr)
    {
        $from =array_values($date_arr);
        $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        //$this->db->where('code', 1311);
        $this->db->order_by('code', 'ASC');
        $this->db->where('parent',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = 0;
                $role['all_dayen'] = 0;


                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;

                $role['all_total_sabeq_maden'] = 0;
                $role['all_total_sabeq_dayen'] = 0;

                $children = $this->build_child_date($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {


                    $role['children'] = $children[0];
                    $role['Total_maden'] = 0;
                    $role['Total_dayen'] = 0;
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }
	    public function build_child_date($parent,$date_arr)
    {
        $query = $this->db->query('select * from dalel where parent = ' . $parent .' order by code ASC');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;
        $from =array_values($date_arr);
        $date_from =$from[0];

        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];


                $role['all_maden'] = $this->select_all_maden_date($result[$key]['code'],$date_arr);
                $role['all_dayen'] = $this->select_all_dayen_date($result[$key]['code'],$date_arr);

                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);

                 $role['all_total_sabeq_maden'] = 0;
                 $role['all_total_sabeq_dayen'] = 0;
                $children = $this->build_child_date($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

                }

                $roles[] = $role;
            }
        }
        return array($roles, $value2, $eslam_maden);
    }


    /*public function build_child_date($parent,$date_arr)
    {
        $query = $this->db->query('select * from dalel where parent = ' . $parent .' order by code ASC');
        $result = $query->result_array();
        $roles = array();
        $value = 0;
        $value2 = 0;
        $eslam_maden = 0;
        $from =array_values($date_arr);
        $date_from =$from[0];

        foreach ($result as $key => $val) {
            $role = array();

            if ($result[$key]['parent'] == $parent) {


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];


                $role['all_maden'] = $this->select_all_maden_date($result[$key]['code'],$date_arr);
                $role['all_dayen'] = $this->select_all_dayen_date($result[$key]['code'],$date_arr);

                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);


                $children = $this->build_child_date($result[$key]['id'],$date_arr);

                if (!empty($children[0])) {
                    $role['value'] = $children[1];
                    $role['children'] = $children[0];

                }

                $roles[] = $role;
            }
        }
        return array($roles, $value2, $eslam_maden);
    }*/




    public function select_all_maden_date($rkm_hesab,$date_arr)
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


    public function select_all_dayen_date($rkm_hesab,$date_arr)
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
    
    
   	  public function tree_date2($date_arr)
    {
        $from =array_values($date_arr);
        $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        $this->db->where('hesab_no3', 2);
        $this->db->order_by('code','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = $this->select_all_maden_date($result[$key]['code'],$date_arr);
                $role['all_dayen'] = $this->select_all_dayen_date($result[$key]['code'],$date_arr);



                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;


                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }


 
    
   /* 
    public function tree_date2($date_arr)
    {
        $from =array_values($date_arr);
        $date_from =$from[0];
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
        //  $this->db->order_by('parent', 'ASC');
        $this->db->where('hesab_no3', 2);
        // $this->db->where('parent',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                $role = array();
                $role['id'] = $result[$key]['id'];
                $role['all_maden'] = $this->select_all_maden_date($result[$key]['code'],$date_arr);
                $role['all_dayen'] = $this->select_all_dayen_date($result[$key]['code'],$date_arr);



                $role['account_type'] = $result[$key]['hesab_tabe3a'];
                $role['total_sabeq'] = $this->select_Rased_sabeq($date_from,$result[$key]['code']);


                $role['code'] = $result[$key]['code'];
                $role['name'] = $result[$key]['name'];
                $role['type'] = $result[$key]['hesab_tabe3a'];
                $role['madeen'] = 0;
                $role['dayen'] = 0;
                $role['Total_maden'] = 0;
                $role['Total_dayen'] = 0;


                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }
*/
}

