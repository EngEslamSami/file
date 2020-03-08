<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 22/04/2019
 * Time: 03:01 م
 */

class Search_family extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();

    }

    public function get_cat()
    {

        $q = $this->db->select('id,title')->get('family_category')->result();
        if (!empty($q)) {
            return $q;
        }
        return false;
    }

  /*public function serach($arr)
    {
        $q = $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk')
            ->where($arr)->from('basic')
            ->join('father', 'basic.mother_national_num = father.mother_national_num_fk')
            ->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk')
            ->get()->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;

    }*/
 /*    public function serach($search_key ,$status_value ,$arr)
    {

        $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk');
        $this->db->from('basic');
        $this->db->join('father','basic.mother_national_num = father.mother_national_num_fk');
        $this->db->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk');
        $this->db->where($arr);
        $this->db->where_in($search_key,$status_value);

        if ($search_key =='file_status'){
            $this->db->where_in($search_key,$status_value);
        }
        elseif ($search_key =='family_cat'){
            $this->db->where($arr);
            $this->db->where_in($search_key,$status_value);
        }
        else{
            $this->db->where($arr);
        }
        $q = $this->db->get()->result();

        if (!empty($q)) {
            foreach ($q as $key =>$row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;

    }*/
    
    public function serach($search_key ,$status_value ,$arr)
    {

        $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk');
        $this->db->from('basic');
        $this->db->join('father','basic.mother_national_num = father.mother_national_num_fk');
        $this->db->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk');
     
        if ($search_key =='file_status'){
            $this->db->where_in('file_status',$status_value);
        }
        elseif ($search_key =='family_cat'){
            $this->db->where($arr);
            $this->db->where_in('file_status',$status_value);
        }
        else{
            $this->db->where($arr);
        }
        $q = $this->db->get()->result();
     
        if (!empty($q)) {
            foreach ($q as $key =>$row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;

    }


   /* public function serach($search_key, $key_value)
    {
        $q = $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk')
            ->where($search_key, $key_value)->from('basic')
            ->join('father', 'basic.mother_national_num = father.mother_national_num_fk')
            ->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk')
            ->get()->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;

    }*/

    public function serach_by($search_key, $key_value, $table_name)
    {
        $field = explode('.', $search_key)[1];

        $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk')
            ->from('basic');
        switch ($table_name) {
            case 'father':
            case 'mother':
                if ($field == 'full_name') {
                    $a = str_replace('الا', 'الإ', $key_value);
                    $b = str_replace('ره', 'رة', $key_value);
                    $c = str_replace('الإ', 'الا', $key_value);
                    $d = str_replace('الا', 'الآ', $key_value);
                    $e = str_replace('ا', 'أ', $key_value);
                    $f = str_replace('ة', 'ه', $key_value);
                    $g = str_replace('ه', 'ة', $key_value);
                    $h = str_replace('ى', 'ي', $key_value);
                    $j = str_replace('إ', 'أ', $key_value);
                    $k = str_replace('ا', 'إ', $key_value);


                    $this->db->or_like($search_key, $a, 'both');
                    $this->db->or_like($search_key, $b, 'both');
                    $this->db->or_like($search_key, $c, 'both');
                    $this->db->or_like($search_key, $d, 'both');
                    $this->db->or_like($search_key, $e, 'both');
                    $this->db->or_like($search_key, $k, 'both');
                    $this->db->or_like($search_key, $f, 'both');
                    $this->db->or_like($search_key, $g, 'both');
                    $this->db->or_like($search_key, $h, 'both');
                    $this->db->or_like($search_key, $j, 'both');
                    $this->db->or_like($search_key, $key_value, 'both');

                } else {
                    $this->db->where($search_key, $key_value);
                }
                $this->db->join('father', 'basic.mother_national_num = father.mother_national_num_fk');
                $q = $this->db->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk')
                    ->get()->result();
                break;
            default:
                if ($field == 'member_full_name') {
                    $a = str_replace('الا', 'الإ', $key_value);
                    $b = str_replace('ره', 'رة', $key_value);
                    $c = str_replace('الإ', 'الا', $key_value);
                    $d = str_replace('الا', 'الآ', $key_value);
                    $e = str_replace('ا', 'أ', $key_value);
                    $f = str_replace('ة', 'ه', $key_value);
                    $g = str_replace('ه', 'ة', $key_value);
                    $h = str_replace('ى', 'ي', $key_value);
                    $j = str_replace('إ', 'أ', $key_value);

                    $this->db->or_like($search_key, $a, 'both');
                    $this->db->or_like($search_key, $b, 'both');
                    $this->db->or_like($search_key, $c, 'both');
                    $this->db->or_like($search_key, $d, 'both');
                    $this->db->or_like($search_key, $e, 'both');
                    $this->db->or_like($search_key, $f, 'both');
                    $this->db->or_like($search_key, $g, 'both');
                    $this->db->or_like($search_key, $h, 'both');
                    $this->db->or_like($search_key, $j, 'both');
                    $this->db->or_like($search_key, $key_value, 'both');

                } else {
                    $this->db->where($search_key, $key_value);
                }
                $this->db->join($table_name, 'basic.mother_national_num = ' . $table_name . '.mother_national_num_fk');
                $this->db->join('father', 'basic.mother_national_num = father.mother_national_num_fk');
                $q = $this->db->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk')->group_by('mother_national_num_fk')->get()->result();
                break;
        }
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;
    }

    public function serach_by_wakels($search_key, $key_value, $table_name)
    {
        $q = $this->db->where($search_key, $key_value)->get($table_name)->row();

        $q = $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk')
            ->where('basic.mother_national_num', $q->mother_national_num_fk)->from('basic')
            ->join('father', 'basic.mother_national_num = father.mother_national_num_fk')
            ->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk')
            ->get()->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;
    }

    public function get_wakel($mother_national_num)
    {
        $q = $this->db->select('w_national_id,w_name')->where('mother_national_num_fk', $mother_national_num)->get('wakels')->row();
        return $q;


    }
    
    
     public function get_basic_data($mother_national_num_fk)
    {
       $this->db->select('basic.*,father.full_name as father_name ,father.f_national_id,
        mother.full_name as mother_name ,mother.mother_national_num_fk');
        $this->db->where( 'mother_national_num',$mother_national_num_fk)->from('basic');
        $this->db->join('father', 'basic.mother_national_num = father.mother_national_num_fk');
        $this->db->join('mother', 'basic.mother_national_num = mother.mother_national_num_fk');
        $x= $this->input->post('key_value[]');

           if($x!=0)
            {
                
                $this->db->where_in('basic.file_status',$x);
             }
       
            $q =  $this->db->get()->result();

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $wakel = $this->get_wakel($row->mother_national_num);
                if (!empty($wakel)) {
                    $q[$key]->w_name = $wakel->w_name;
                    $q[$key]->w_national_id = $wakel->w_national_id;
                } else {
                    $q[$key]->w_name = '';
                    $q[$key]->w_national_id = '';
                }
            }
        }
        return $q;

    }
    public function select_main_data($data)
    {
       
        $this->db->select('*');
        $this->db->from('finance_sarf_order_details');
      
      $this->db->where('sarf_num_fk',$data);
        
        $query = $this->db->get()->result();
        if (!empty($query)) {
            foreach ($query as $key => $row) {
                $query[$key]->basic = $this->get_basic_data($row->mother_national_num_fk);
               
            }
        }





        return $query;
    }
    public function select_last_value_fild($key_value2){
        $this->db->select('*');
        $this->db->from('finance_sarf_order');
        $this->db->order_by("sarf_num","DESC");
        if($key_value2!=0)
        {
            $this->db->where("bnod_help_fk",$key_value2);
        }
        $this->db->limit(1);
      


        $query = $this->db->get()->row();
        if (!empty($query)) {
           
                 $sarf_details = $this->select_main_data($query->sarf_num);
               
            return     $sarf_details;
        }


    }
    public function select_all_bnod(){
        $this->db->select('*');
        $this->db->from("bnod_help");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    



  
    

}