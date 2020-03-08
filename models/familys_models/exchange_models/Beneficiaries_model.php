<?php

class Beneficiaries_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

    }

//---------------------------------------------------
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = "";
            return $val;
        } else {
            return $post_value;
        }
    }
   //---------------------------------------------------


/*******************/

    public function select_all()
    {
        $this->db->select('file_num,mother_national_num,father_national_num');
        $this->db->from("basic");
        $this->db->where("final_suspend",4);
        $this->db->where("file_status",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->bank_details = $this->get_Bank_details($row->mother_national_num);
                $data[$a]->father_name = $this->get_father_name($row->mother_national_num);
                /********* الارامل ***********/
                $data[$a]->ff_armal = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);
                /********* الايتام ***********/
                $data[$a]->ff_yatem = $this->get_yatem_full_active($row->mother_national_num);

                $data[$a]->up_child = $this->get_bale3_full_active($row->mother_national_num);



  $data[$a]->mother_name = $this->getMother_name($row->mother_national_num);
   $data[$a]->mother_id = $this->getMother_id($row->mother_national_num);
  
                $a++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function  get_bale3_full_active($mother_national_num_fk){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_member",3);

        $this->db->where('persons_status',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
    
    /**********************/
    public function  get_father_name($mother_national_num)
    {
        $this->db->select("full_name");
        $this->db->from("father");
        $this->db->where("mother_national_num_fk", $mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data->full_name;
        }
        return false;
    }

    public function  get_pure_all_sum_mostafed_finance_members($mother_national_num_fk){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("member_person_type",62);
        $this->db->where('persons_status',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }

    public function  get_armal_sum_armal_full_active_mother($mother_national_num_fk){
        $this->db->select("id");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
         $this->db->where("person_type",62);
        $this->db->where("categoriey_m",1);

        $this->db->where('halt_elmostafid_m',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }

    public function  get_yatem_full_active($mother_national_num_fk){
        $this->db->select("id");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
         $this->db->where("member_person_type",62);
        $this->db->where("categoriey_member",2);
        $this->db->where('persons_status',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }




    public function get_Bank_details($id)
    {
        $this->db->select('*');
        $this->db->from('family_bank_responsible');
        $this->db->where('family_national_num_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data =$query->row();
                $data->bank_name = $this->getBank_name($data->bank_id_fk);
         /*   if($data->family_national_num_fk == $data->person_national_card){
                $data->person_name = $this->getMother_name($data->family_national_num_fk);
            }*/
                 if($data->person_id_fk == 0){
                $data->person_name =  $data->person_name;
                $data->person_card =  $data->person_national_card;
            }elseif($data->person_id_fk  !=0 and $data->type == 1){
                $data->person_name = $this->getMother_data($data->person_id_fk)['full_name'];
                $data->person_card = $this->getMother_data($data->person_id_fk)['mother_national_card_new'];

            }elseif($data->person_id_fk  !=0 and $data->type == 2){
                $data->person_name = $this->getfamily_member_data($data->person_id_fk)['member_full_name'];
                $data->person_card = $this->getfamily_member_data($data->person_id_fk)['member_card_num'];
            }
            

            return $data;
        }
            return false;

    }


    public function getBank_name($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        return $h->row_array()['ar_name'];

    }
    public function getMother_name($id){
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$id));
        return $h->row_array()['full_name'];

    }
 public function getMother_id($id){
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$id));
        return $h->row_array()['id'];

    }

    
      public function getMother_data($id){
        $h = $this->db->get_where("mother", array('id'=>$id));
        return $h->row_array();

    }

    public function getfamily_member_data($id){
        $h = $this->db->get_where("f_members", array('id'=>$id));
        return $h->row_array();

    }
 /***********************************************************************************/
 /*
 
 public function select_all_22($cond)
{
    $this->db->select('file_num,mother_national_num,father_national_num,file_status,process_title');
    $this->db->from("basic");
    $this->db->where("final_suspend", 4);
    $this->db->where('file_status', $cond['file_status']);
    $query = $this->db->get();
    $data=array();
    if ($query->num_rows() > 0) {
        $a = 0;
        foreach ($query->result() as $row) {

            $mater_data = $this->getMother_22($row->mother_national_num, $cond['category']);
            if(empty($mater_data)){
                continue ;
            }

            $data[$a] = $row;


            $data[$a]->father_name = $this->get_father_name($row->mother_national_num);
           
            $data[$a]->ff_armal = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);

            $data[$a]->ff_yatem = $this->get_yatem_full_active($row->mother_national_num);

            $data[$a]->up_child = $this->get_bale3_full_active($row->mother_national_num);
            $data[$a]->mother = $mater_data;




            $a++;
        }
        return $data;
    } else {
        return 0;
    }

}



public function getMother_22($id, $cat)
{
    $h = $this->db->get_where("mother", array('mother_national_num_fk' => $id))->row();

    if(!empty($h)) {
        $categoriey = $this->getNaseb($h->mother_national_num_fk, $h->categoriey_m);
        if (!empty($categoriey)) {
            if ($categoriey->id == $cat) {

                $data = array();
                $data['categoriey'] = $categoriey->title;
                $data['mother_name'] = $h->full_name;
                $data['mother_phone'] = $h->m_mob;

                return $data;
            } else {
                return false;
            }
        }
    }



}

public function getNaseb($mother_national_num_fk, $categoriey_m)
{
    $this->db->select('*');
    $this->db->from('family_income_duties');
    $this->db->where('mother_national_num_fk', $mother_national_num_fk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $total_income = 0;
        $total_duties = 0;
        $count = 0;
        foreach ($query->result() as $row) {

            if ($row->affect == 1 && $row->type == 1) {
                $total_income += $row->value;
            }
            if ($row->affect == 1 && $row->type == 2) {
                $total_duties += $row->value;
            }

        }
        if ($categoriey_m == 1 || $categoriey_m == 2) {
            $count = $this->sum_mosfed_in_mother($mother_national_num_fk);
        }
        $member_num = $this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
        if ($member_num == 0) {
            $member_num = 1;
        }
        $total = $total_income - $total_duties;
        $naseb = $total / $member_num;
        $f2a = $this->GetF2a_data($naseb);

        return $f2a;

    }

}

public function sum_mosfed_in_mother($mother_national_num_fk)
{

    $this->db->select('*');
    $this->db->from('mother');
    $this->db->where('mother_national_num_fk', $mother_national_num_fk);
    $this->db->where('person_type', 62);
    $this->db->where('halt_elmostafid_m', 1);
    $query = $this->db->get();

    return $rowcount = $query->num_rows();


}


public function sum_mosfed_in_f_members($mother_national_num_fk)
{

    $this->db->select('*');
    $this->db->from('f_members');
    $this->db->where('mother_national_num_fk', $mother_national_num_fk);
    $this->db->where('member_person_type', 62);
    $this->db->where('halt_elmostafid_member', 1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

public function GetF2a_data($value)
{
    $this->db->select("id,title,from,to,color");
    $this->db->where('from <=', $value);
    $this->db->where('to >=', $value);
    $query = $this->db->get("family_category");
    if ($query->num_rows() > 0) {
        return $query->row();

    }

}

//__________Nagwa_________

public function get_category()
{
    $this->db->select('*');
    $this->db->from(' family_category');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
}

public function get_file_satus()
{
    $this->db->select('*');
    $this->db->from('files_status_setting');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
} 
*/
  
    public function select_all_fe2at()
    {
        $this->db->select('file_num,mother_national_num,father_national_num,file_status,
        mother.categoriey_m as categorey');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->where("final_suspend",4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;

                $data[$a]->bank_details = $this->get_Bank_details($row->mother_national_num);
                $data[$a]->father_name = $this->get_father_name($row->mother_national_num);
                /********* الارامل ***********/
                $data[$a]->ff_armal = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);
                /********* الايتام ***********/
                $data[$a]->ff_yatem = $this->get_yatem_full_active($row->mother_national_num);

                $data[$a]->up_child = $this->get_bale3_full_active($row->mother_national_num);



                $data[$a]->mother_name = $this->getMother_name($row->mother_national_num);
                $data[$a]->mother_id = $this->getMother_id($row->mother_national_num);
                $data[$a]->nasebElfard =  $this->getNaseb($data[$a]->mother_national_num,$data[$a]->categorey);

                $a++;}
            return $data;
        }else{
            return 0;
        }

    }

    public function getNaseb($mother_national_num_fk,$categoriey_m)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $query = $this->db->get();
        if($query->num_rows() >0){
            $total_income = 0;
            $total_duties = 0;
            $count =0;
            $data = $query->result(); $i =0;
            foreach ($query->result() as $row){

                if($row->affect == 1 && $row->type ==1){
                    $total_income +=$row->value;
                }
                if($row->affect == 1 && $row->type ==2){
                    $total_duties +=$row->value;
                }

            }
            if($categoriey_m == 1  || $categoriey_m == 2 ){
                $count =  $this->sum_mosfed_in_mother($mother_national_num_fk);
            }
            $member_num =$this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
            if($member_num == 0){
                $member_num = 1;
            }
            $total = $total_income - $total_duties;
            $data['naseb'] =$total  / $member_num;
            $data['f2a'] =$this->GetF2a_data($data['naseb']);

            return $data;

        }
        return 0;
    }

    public function sum_mosfed_in_mother($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('person_type',62);
        $this->db->where('halt_elmostafid_m',1);
        $query = $this->db->get();

        return $rowcount = $query->num_rows();


    }


    public function sum_mosfed_in_f_members($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('member_person_type',62);
        $this->db->where('halt_elmostafid_member',1);
        
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
    public function GetF2a_data($value)
    {
        $this->db->select("id,title,from,to,color");
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row();

        }else{
            return 0;
        }

    }
  
    
}