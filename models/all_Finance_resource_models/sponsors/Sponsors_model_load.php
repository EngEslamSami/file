<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_model_load extends CI_Model
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


/*********************************************/

    public function GetData($type= false){
        if($type ==='aytam' || $type ==='mostafed') {
            $arr =array('f_members.categoriey_member'=>2,'f_members.persons_status'=>1);
            if($type ==='mostafed'){

                $arr = array('categoriey_member'=>3,'persons_status'=>1);
            }

            $query = $this->db->select('f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
           f_members.member_full_name,  f_members.member_birth_date_hijri,f_members.member_birth_date,
           f_members.member_birth_date_year,f_members.id,
            basic.file_num, basic.mother_national_num  as num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
                ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
                ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
                ->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
                ->where('basic.final_suspend', 4)
                ->where('basic.file_status', 1)
                ->where($arr)
                ->order_by("basic.file_num", "ASC")
                ->get('f_members');
            if ($query->num_rows() > 0) {
                $x = 0;
                foreach ($query->result_array() as $row) {
                    $data[$x] = $row;
                    if($row['member_birth_date_year'] >0){
                    $data[$x]['age'] =  date('Y') - $row['member_birth_date_year'];
                    }else{
                    $data[$x]['age'] = 'غير محدد';
                    }

                    $x++;
                }
                return $data;
            } else {
                return 0;
            }

        }elseif ($type ==='armal') {

            $where =array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62);
            $query = $this->db->select('
            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,
            mother.full_name,mother.m_birth_date_hijri_year
            , basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
         files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
         ')
                ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
                ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
                ->where($where)
                ->where('basic.file_status', 1)
                ->get('mother');
            if ($query->num_rows() > 0) {
                $x = 0;
                foreach ($query->result_array() as $row) {
                    $data[$x] = $row;
                    if($row['m_birth_date_year'] >0){
                        $data[$x]['age'] =  date('Y') - $row['m_birth_date_year'];
                    }else{
                        $data[$x]['age'] = 'غير محدد';
                    }
                    $x++;
                }
                return $data;
            } else {
                return 0;
            }



        }

    }
   /* public function GetMainKafalatData($id,$type)
    {
        $this->db->select('pay_method,id,kafala_type_fk,first_kafel_id,first_value,first_date_to_ar');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->group_by('person_id_fk');
        $this->db->order_by('id', "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            foreach ($query->result_array() as $row) {

                $data[$x] = $row;
                $data[$x]['kafel_name'] = $this->get_kafel_name($row['first_kafel_id']);
                $data[$x]['kafala_name'] = $this->get_kafela_name($row['kafala_type_fk'])['title'];
                if(!empty($pay_method_arr[$row['pay_method']])) {
                    $data[$x]['tawred_type'] = $pay_method_arr[$row['pay_method']];
                }
                if($type==='armal') {
                    $data[$x]['details'] = $this->get_data_bytable('
                            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,mother.full_name
                            ,mother.m_birth_date_hijri_year,mother.id,father.full_name AS father_name,basic.file_num AS family_file_num','mother',array('mother.id'=>$id));
                }else{

                    $data[$x]['details'] = $this->get_data_bytable('
                              f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
                             f_members.member_full_name,f_members.member_birth_date_hijri,f_members.member_birth_date,
                              f_members.member_birth_date_year,f_members.id,father.full_name AS father_name,basic.file_num AS family_file_num','f_members',array('f_members.id'=>$id));

                }
                $x++;}
            return $data;
        } else {
            return 0;
        }


    }*/
    public function get_data_bytable($select,$table,$arr){
        $this->db->select($select);
        $this->db->from($table);
        if($table ==='mother'){
            $this->db->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT");
            $this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk', "LEFT");
        }else{
            $this->db->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT");
             $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT");
        }
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return$query->row();
        }else{
            return 0;
        }


    }
 
 /*
    public function GetSubData($type= false,$person_type= false){

        if($type ==='aytam' || $type ==='mostafed') {
            $arr =array('f_members.categoriey_member'=>2,'f_members.persons_status'=>1);
            if($type ==='mostafed'){

                $arr = array('categoriey_member'=>3,'persons_status'=>1);
            }


            $query = $this->db->select('f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
           f_members.member_full_name,  f_members.member_birth_date_hijri,f_members.member_birth_date,
           f_members.member_birth_date_year,f_members.id,
            basic.file_num, basic.mother_national_num  as num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
                ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
                ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
                ->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
                ->where('basic.final_suspend', 4)
                ->where('basic.file_status', 1)
                ->where($arr)
                ->order_by("basic.file_num", "ASC")
                ->get('f_members');
            $my_arr =array();
            $my_arr2 =array();
            if ($query->num_rows() > 0) {
                $x = 0;
                foreach ($query->result_array() as $row) {

                    $data[$x] = $row;
                    if($row['member_birth_date_year'] >0){
                        $data[$x]['age'] =  date('Y') - $row['member_birth_date_year'];
                    }else{
                        $data[$x]['age'] = 'غير محدد';
                    }

                    $main_kafalat_num = $this->search_from_main_kafalat_details2($row['id'],array('first_date_to >='=>strtotime(date('Y-m-d'))));

                   // $main_kafalat_num = $this->search_from_main_kafalat_details($row['id']);
                    if($main_kafalat_num ==1){

                    $my_arr[$row['id']] = $this->GetMainKafalatData($row['id'],$type);

                    }elseif($main_kafalat_num ==0){
                        $my_arr2[] =$row;
                    }

                    $x++;
                }

                if($person_type ==='not_guaranteed'){
                    return $my_arr2;
                }elseif($person_type ==='guaranteed'){
                    return $my_arr;
                }


            }else{
                return 0;
            }

        }elseif ($type ==='armal') {

            $where =array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62);
            $query = $this->db->select('
            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,
            mother.full_name,mother.m_birth_date_hijri_year,mother.id
            , basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
         files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
         ')
                ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
                ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
                ->where($where)
                ->where('basic.file_status', 1)
                ->get('mother');
            $my_arr =array();
            $my_arr2 =array();
            if ($query->num_rows() > 0) {
                $x = 0;
                foreach ($query->result_array() as $row) {
                    $data[$x] = $row;
                    if($row['m_birth_date_year'] >0){
                        $data[$x]['age'] =  date('Y') - $row['m_birth_date_year'];
                    }else{
                        $data[$x]['age'] = 'غير محدد';
                    }
                    $main_kafalat_num = $this->search_from_main_kafalat_details2($row['id'],array('first_date_to >='=>strtotime(date('Y-m-d'))));

                    //$main_kafalat_num = $this->search_from_main_kafalat_details($row['id']);

                    if($main_kafalat_num ==1){
                        $my_arr[$row['id']] = $this->GetMainKafalatData($row['id'],$type);


                    }elseif($main_kafalat_num ==0){
                        $my_arr2[] =$row;
                    }
                    $x++;
                }
                if($person_type ==='not_guaranteed'){
                    return $my_arr2;
                }elseif($person_type ==='guaranteed'){
                    return $my_arr;
                }

            } else {
                return 0;
            }



        }

    }
    
    */
    
    
     public function GetMainKafalatData($id,$type)
    {


        $this->db->select('pay_method,id,kafala_type_fk,first_kafel_id,first_value,first_date_to_ar');
        $this->db->from('fr_main_kafalat_details');

        if($type === 'armal'){

            $this->db->where('kafala_type_fk', 4);
        }elseif($type == 'mostafed'){

            $this->db->where('kafala_type_fk', 3);
        }elseif($type == 'aytam'){
            $this->db->where('kafala_type_fk', 1);
            $this->db->or_where('kafala_type_fk', 2);
        }
        $this->db->where('person_id_fk', $id);
        $this->db->group_by('person_id_fk');
        $this->db->order_by('id', "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            foreach ($query->result_array() as $row) {

                $data[$x] = $row;
                $data[$x]['kafel_name'] = $this->get_kafel_name($row['first_kafel_id']);
                $data[$x]['kafala_name'] = $this->get_kafela_name($row['kafala_type_fk'])['title'];
                if(!empty($pay_method_arr[$row['pay_method']])) {
                    $data[$x]['tawred_type'] = $pay_method_arr[$row['pay_method']];
                }
                if($type==='armal') {
                    $data[$x]['details'] = $this->get_data_bytable('
                            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,mother.full_name
                            ,mother.m_birth_date_hijri_year,mother.id,father.full_name AS father_name,basic.file_num AS family_file_num','mother',array('mother.id'=>$id));
                }else{

                    $data[$x]['details'] = $this->get_data_bytable('
                              f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
                             f_members.member_full_name,f_members.member_birth_date_hijri,f_members.member_birth_date,
                              f_members.member_birth_date_year,f_members.id,father.full_name AS father_name,basic.file_num AS family_file_num','f_members',array('f_members.id'=>$id));

                }
                $x++;}
            return $data;
        } else {
            return 0;
        }


    }


public function GetSubData($type= false,$person_type= false){

        if($type ==='aytam' || $type ==='mostafed') {
            $arr =array('f_members.categoriey_member'=>2,'f_members.persons_status'=>1);
            if($type ==='mostafed'){

                $arr = array('categoriey_member'=>3,'persons_status'=>1);
            }

            $query = $this->db->select('f_members.first_halet_kafala,
           f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
           f_members.member_full_name,  f_members.member_birth_date_hijri,f_members.member_birth_date,
           f_members.member_birth_date_year,f_members.id,
            basic.file_num, basic.mother_national_num  as num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
                ->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
                ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
                ->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
                ->where('basic.final_suspend', 4)
                ->where('basic.file_status', 1)
                ->where($arr)
                ->order_by("basic.file_num", "ASC")
                ->get('f_members');
            $my_arr =array();
            $my_arr2 =array();
            if ($query->num_rows() > 0) {
                $x = 0;
                foreach ($query->result_array() as $row) {

                    $data[$x] = $row;
                    if($row['member_birth_date_year'] >0){
                        $data[$x]['age'] =  date('Y') - $row['member_birth_date_year'];
                    }else{
                        $data[$x]['age'] = 'غير محدد';
                    }

                    $main_kafalat_num = $this->search_from_main_kafalat_details2($row['id'],array('first_date_to >='=>strtotime(date('Y-m-d'))));



                    if($row['first_halet_kafala'] ==2){

                        $my_arr2[] =$row;

                    }elseif ($row['first_halet_kafala'] ==1){
                        if(!empty($this->GetMainKafalatData($row['id'], $type))) {
                            $my_arr[$row['id']] = $this->GetMainKafalatData($row['id'], $type);
                        }
                    }/*elseif($row->first_halet_kafala ==0){

                        $my_arr2[] =$row;

                    }*/




                   // $main_kafalat_num = $this->search_from_main_kafalat_details($row['id']);
              /*      if($main_kafalat_num ==1){

                    $my_arr[$row['id']] = $this->GetMainKafalatData($row['id'],$type);

                    }elseif($main_kafalat_num ==0){
                        $my_arr2[] =$row;
                    }*/

                    $x++;
                }

                if($person_type ==='not_guaranteed'){
                    return $my_arr2;
                }elseif($person_type ==='guaranteed'){
                    return $my_arr;
                }


            }else{
                return false;
            }

        }elseif ($type ==='armal') {

            $where =array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62);
            $query = $this->db->select('mother.first_halet_kafala,
            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,
            mother.full_name,mother.m_birth_date_hijri_year,mother.id
            , basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
         files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
         ')
                ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
                ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
                ->where($where)
                ->where('basic.file_status', 1)
                ->get('mother');
            $my_arr =array();
            $my_arr2 =array();
            if ($query->num_rows() > 0) {
                $x = 0;
                foreach ($query->result_array() as $row) {
                    $data[$x] = $row;
                    if($row['m_birth_date_year'] >0){
                        $data[$x]['age'] =  date('Y') - $row['m_birth_date_year'];
                    }else{
                        $data[$x]['age'] = 'غير محدد';
                    }
                    $main_kafalat_num = $this->search_from_main_kafalat_details2($row['id'],array('first_date_to >='=>strtotime(date('Y-m-d'))));

             /*       if($main_kafalat_num ==1){
                        $my_arr[$row['id']] = $this->GetMainKafalatData($row['id'],$type);
                    }elseif($main_kafalat_num ==0){
                        $my_arr2[] =$row;
                    }*/
                    if($row['first_halet_kafala'] ==2){

                        $my_arr2[] =$row;

                    }elseif ($row['first_halet_kafala'] ==1){
                        if(!empty($this->GetMainKafalatData($row['id'], $type))) {
                            $my_arr[$row['id']] = $this->GetMainKafalatData($row['id'], $type);
                        }
                    }
                    $x++;
                }
                if($person_type ==='not_guaranteed'){
                    return $my_arr2;
                }elseif($person_type ==='guaranteed'){
                    return $my_arr;
                }

            } else {
                return 0;
            }



        }

    }
    
    
    public function search_from_main_kafalat_details2($id,$arr=false)
    {
        $this->db->select('person_id_fk,first_date_from,first_date_to');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }


    }


    public function get_kafel_name($kafel_id)
    {
        $this->db->where('id', $kafel_id);
        $query = $this->db->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            return $query->row()->k_name;
        } else {
            return "غير محدد ";
        }
    }



    public function get_kafela_name($kafala_type_fk)
    {
        $h = $this->db->get_where("fr_kafalat_types_setting", array('id' => $kafala_type_fk));
        return $arr = $h->row_array();

    }



    public function search_from_main_kafalat_details($id)
    {
        $this->db->select('person_id_fk,first_date_from,first_date_to');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }


    }
/**********************************/

/*

    public function all_aytam(){
        $sql = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1    ORDER BY basic.file_num  ASC";
        $this->db->query($sql);

        return$this->db->query($sql)->num_rows();

    }



    public function all_aytam_mkfol_shamla(){
//

        $sql = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1   AND  f_members.first_kafala_type =1 AND f_members.first_halet_kafala =1 ORDER BY basic.file_num  ASC";
        $this->db->query($sql);

        return$this->db->query($sql)->num_rows();

    }

    public function all_aytam_mkfol_nos(){
        $sql = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1   AND  f_members.first_kafala_type =2 AND f_members.first_halet_kafala =1 ORDER BY basic.file_num  ASC";
        $this->db->query($sql);
     $nos1=$this->db->query($sql)->num_rows();


        $sql2 = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1   AND  f_members.second_kafala_type =2 AND f_members.second_halet_kafala =1 ORDER BY basic.file_num  ASC";
        $this->db->query($sql2);
        $nos2=$this->db->query($sql2)->num_rows();
        return (($nos1 +$nos2) /2);

    }

*/
    public function all_aytam($arr){
        //AND f_members.categoriey_member=2 AND f_members.persons_status =1
        $sql = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE ".$arr." AND  basic.final_suspend =4 AND basic.file_status=1     ORDER BY basic.file_num  ASC";
        $this->db->query($sql);
        if ($this->db->query($sql)->num_rows() > 0) {
            $data['num'] = $this->db->query($sql)->num_rows();
            $data['details'] = $this->db->query($sql)->result();
            return $data;
        }else{
            return false;
        }

    }


   public function all_aytam_mkfol_shamla(){

        $sql = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            , f_members.member_full_name, f_members.member_birth_date_year, f_members.member_birth_date_hijri,f_members.member_birth_date,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num

            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1   AND  f_members.first_kafala_type =1 AND f_members.first_halet_kafala =1 ORDER BY basic.file_num  ASC";

        $this->db->query($sql);
        if ($this->db->query($sql)->num_rows() > 0) {
            $data['num'] =$this->db->query($sql)->num_rows();
            $data['details'] =$this->db->query($sql)->result_array();
            return$data;
        }else{
            return false;
        }


    }


    public function all_armal($where){
        $sql = " SELECT mother.first_halet_kafala,
            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,
            mother.full_name,mother.m_birth_date_hijri_year,mother.id
            , basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
            files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            FROM mother
            INNER JOIN basic
            ON mother.mother_national_num_fk = basic.mother_national_num
             INNER JOIN father
            ON mother.mother_national_num_fk = father.mother_national_num_fk
                 INNER JOIN files_status_setting
            ON mother.halt_elmostafid_m = files_status_setting.id
            WHERE ".$where." AND   basic.file_status=1     ORDER BY basic.file_num  ASC";
        $this->db->query($sql);
        if ($this->db->query($sql)->num_rows() > 0) {
            $data['num'] =$this->db->query($sql)->num_rows();
            $data['details'] =$this->db->query($sql)->result();
            return$data;
        }else{
            return false;

        }

    }



    public function all_aytam_mkfol_nos(){
        $sql = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.member_full_name, f_members.member_birth_date_year, f_members.member_birth_date_hijri,f_members.member_birth_date,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1   AND  f_members.first_kafala_type =2 AND f_members.first_halet_kafala =1 ORDER BY basic.file_num  ASC";
        $this->db->query($sql);
        $nos1['num'] =$this->db->query($sql)->num_rows();
        $nos1['details'] =$this->db->query($sql)->result_array();


       $sql2 = " SELECT f_members.first_halet_kafala, f_members.second_kafala_type, f_members.id, f_members.second_halet_kafala,f_members.id,f_members.first_k_id,f_members.first_kafala_type, f_members.categoriey_member,f_members.mother_national_num_fk,f_members.first_to,f_members.second_k_id
            ,f_members.member_full_name, f_members.member_birth_date_year, f_members.member_birth_date_hijri,f_members.member_birth_date,f_members.second_to,basic.file_num,basic.mother_national_num AS num
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
            
            WHERE   basic.final_suspend =4 AND basic.file_status=1 AND f_members.categoriey_member=2
             AND f_members.persons_status =1   AND  f_members.second_kafala_type =2 AND f_members.second_halet_kafala =1 ORDER BY basic.file_num  ASC";
        $this->db->query($sql2);
        $nos2['num'] =$this->db->query($sql2)->num_rows();
        $nos2['details'] =$this->db->query($sql2)->result_array();




        $total['num'] =(($nos1['num'] +$nos2['num']) /2);
        $total['details'] = array_merge($nos1['details'], $nos2['details']);


        return $total;

    }


    public function GetSubData2($type= false,$person_type= false){

        if($type ==='aytam'  ) {
            if($person_type =='guaranteed'){
                $sql = " SELECT f_members.first_halet_kafala,f_members.first_kafala_type,f_members.categoriey_member,f_members.persons_status,
           f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
           f_members.member_full_name,  f_members.member_birth_date_hijri,f_members.member_birth_date,
           f_members.member_birth_date_year,f_members.id,f_members.first_k_id, f_members.second_k_id,
            basic.file_num, basic.mother_national_num  as num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
             INNER JOIN father
            ON f_members.mother_national_num_fk = father.mother_national_num_fk
                 INNER JOIN files_status_setting
            ON f_members.halt_elmostafid_member = files_status_setting.id
            WHERE    
            f_members.categoriey_member=2
             AND f_members.persons_status =1  AND 
            f_members.first_kafala_type  IN (1,2) AND f_members.first_halet_kafala =1 AND  basic.final_suspend =4 And  basic.file_status=1     ORDER BY basic.file_num  ASC";
                $this->db->query($sql);
                if ($this->db->query($sql)->num_rows() > 0) {
                    $x = 0;
                    foreach ($this->db->query($sql)->result_array() as $row) {
                        $data[$x] = $row;
                        $data[$x]['first_kafel_name'] = $this->get_kafel_name($row['first_k_id']);
                        $data[$x]['second_kafel_name'] = $this->get_kafel_name($row['second_k_id']);
                        $x++;}
                    return$data;

                }else{
                    return false;
                }

            }elseif($person_type =='not_guaranteed'){
                $sql = " SELECT f_members.first_halet_kafala,f_members.first_kafala_type,f_members.categoriey_member,f_members.persons_status,
           f_members.halt_elmostafid_member,f_members.mother_national_num_fk,f_members.second_halet_kafala,
           f_members.member_full_name,  f_members.member_birth_date_hijri,f_members.member_birth_date,
           f_members.member_birth_date_year,f_members.id,f_members.first_k_id, f_members.second_k_id,
            basic.file_num, basic.mother_national_num  as num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
             INNER JOIN father
            ON f_members.mother_national_num_fk = father.mother_national_num_fk
                 INNER JOIN files_status_setting
            ON f_members.halt_elmostafid_member = files_status_setting.id
            WHERE    
            f_members.categoriey_member=2
             AND f_members.persons_status =1  AND 
              f_members.first_kafala_type  IN (2,0) AND f_members.second_halet_kafala =2
             AND  basic.final_suspend =4 And  basic.file_status=1     ORDER BY basic.file_num  ASC";
                $this->db->query($sql);
                if ($this->db->query($sql)->num_rows() > 0) {
                    $x = 0;
                    foreach ($this->db->query($sql)->result_array() as $row) {
                        $data[$x] = $row;
                        $data[$x]['first_kafel_name'] = $this->get_kafel_name($row['first_k_id']);
                        $data[$x]['second_kafel_name'] = $this->get_kafel_name($row['second_k_id']);
                        $x++;}
                    return$data;

                }else{
                    return false;
                }
            }



        }elseif ($type ==='armal') {

            if($person_type =='guaranteed'){
                $where ='mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62 And
                mother.first_kafala_type =4 AND mother.first_halet_kafala =1 
                ';


            }elseif($person_type =='not_guaranteed'){

                $where ='mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62 
                And   mother.first_kafala_type   IN (0,4)  AND  mother.first_halet_kafala =2 
                ';

            }

            $sql = " SELECT mother.first_halet_kafala,
            mother.halt_elmostafid_m,mother.mother_national_num_fk,mother.m_birth_date_year,
            mother.full_name,mother.m_birth_date_hijri_year,mother.id
            , basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
            files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            FROM mother
            INNER JOIN basic
            ON mother.mother_national_num_fk = basic.mother_national_num
             INNER JOIN father
            ON mother.mother_national_num_fk = father.mother_national_num_fk
                 INNER JOIN files_status_setting
            ON mother.halt_elmostafid_m = files_status_setting.id
            WHERE ".$where." AND   basic.file_status=1     ORDER BY basic.file_num  ASC";
            $this->db->query($sql);
            if ($this->db->query($sql)->num_rows() > 0) {

                $x = 0;
                foreach ($this->db->query($sql)->result_array() as $row) {
                    $data[$row['id']] = $row;
                    if($row['m_birth_date_year'] >0){
                        $data[$row['id']]['age'] =  date('Y') - $row['m_birth_date_year'];
                    }else{
                        $data[$row['id']]['age'] = 'غير محدد';
                    }

                    if($person_type =='guaranteed') {
                        if (!empty($this->GetMainKafalatData($row['id'], $type))) {
                            $data[$row['id']] = $this->GetMainKafalatData($row['id'], $type);
                        }
                    }
                    $x++;}
                return$data;

            }else{
                return false;

            }


        }elseif ($type ==='mostafed'){

            if($person_type =='guaranteed'){
                $arr='f_members.categoriey_member=3   AND f_members.persons_status =1
                And f_members.first_kafala_type =3 AND f_members.first_halet_kafala =1
                ';

            }elseif($person_type =='not_guaranteed'){
                $arr='f_members.categoriey_member=3   AND f_members.persons_status =1 AND
                 f_members.first_kafala_type   IN (0,3)  AND  f_members.first_halet_kafala =2 
                ';
            }

             $sql = " SELECT f_members.first_halet_kafala,
           f_members.halt_elmostafid_member,f_members.mother_national_num_fk,
           f_members.member_full_name,  f_members.member_birth_date_hijri,f_members.member_birth_date,
           f_members.member_birth_date_year,f_members.id,
            basic.file_num, basic.mother_national_num  as num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            FROM f_members
            INNER JOIN basic
            ON f_members.mother_national_num_fk = basic.mother_national_num
             INNER JOIN father
            ON f_members.mother_national_num_fk = father.mother_national_num_fk
                 INNER JOIN files_status_setting
            ON f_members.halt_elmostafid_member = files_status_setting.id
            WHERE ".$arr." AND   basic.file_status=1     ORDER BY basic.file_num  ASC";
            $this->db->query($sql);
            if ($this->db->query($sql)->num_rows() > 0) {

                $x = 0;
                foreach ($this->db->query($sql)->result_array() as $row) {
                    $data[$x] = $row;

                    if($row['member_birth_date_year'] >0){
                        $data[$x]['age'] =  date('Y') - $row['member_birth_date_year'];
                    }else{
                        $data[$x]['age'] = 'غير محدد';
                    }

                    if($person_type =='guaranteed') {
                        if (!empty($this->GetMainKafalatData($row['id'], $type))) {
                            $data[$x] = $this->GetMainKafalatData($row['id'], $type);
                        }
                    }
                    $x++;}
                return$data;

            }else{
                return false;

            }
        }

    }




}