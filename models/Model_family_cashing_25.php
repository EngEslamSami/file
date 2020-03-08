<?php
class Model_family_cashing extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->main_table="finance_sarf_order";
    }
    //==========================================
    public function select_last_value_fild(){
        $this->db->select('sarf_num');
        $this->db->from($this->main_table);
        $this->db->order_by("sarf_num","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->sarf_num;
            }
            return $data;
        }
        return 0;
    }
    //==========================================
    public function select_where($Conditions_arr,$condition_year){
        $this->db->select('basic.file_num , mother.mother_national_num_fk ,mother.full_name');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
       // $this->db->where("basic.suspend",4);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
                $data[$i]->up_child=$this->get_up_child($row->mother_national_num_fk,$condition_year);
                $data[$i]->down_child=$this->get_down_child($row->mother_national_num_fk,$condition_year);
                $data[$i]->mother_num_in=$this->get_mother_num($row->mother_national_num_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
     //==========================================
     public function get_up_child($mother_national_num_fk ,$condition_year){
        $this->db->select('id, member_full_name');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk); // ""
        $this->db->where("member_birth_date_hijri_year <=",$condition_year); 
        $this->db->where("categoriey_member ",3);
        $this->db->where("halt_elmostafid_member",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }
      //==========================================
       public function get_down_child($mother_national_num_fk ,$condition_year){
            $this->db->select('id, member_full_name');
            $this->db->from("f_members");
            $this->db->where("mother_national_num_fk",$mother_national_num_fk); // ""
            $this->db->where("member_birth_date_hijri_year >=",$condition_year); 
            $this->db->where("categoriey_member ",3);
            $this->db->where("halt_elmostafid_member",1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }
     //==========================================
       public function get_mother_num($mother_national_num_fk ){
            $this->db->select('mother_national_num_fk, full_name');
            $this->db->from("mother");
            $this->db->where("mother_national_num_fk",$mother_national_num_fk); // ""
            $this->db->where("categoriey_m ",1);
            $this->db->where("halt_elmostafid_m",1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
       }
       //==========================================
    public function total_child($Conditions_arr){
        $this->db->select('id, member_full_name');
        $this->db->from("f_members");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }
    //==========================================
    public function insert(){

        $data['sarf_num'] = $this->input->post('sarf_num');
          $data['bnod_help_fk'] = $this->input->post('bnod_help_id_fk');
          $data['mon_melady'] = $this->input->post('mon_melady');
        $data['sarf_date'] = strtotime($this->input->post('sarf_date'));
        $data['sarf_date_ar'] = $this->input->post('sarf_date');
        $data['type_sarf'] = $this->input->post('sarf_type');
        $data['method_type'] = $this->input->post('method_type');
        $data['type_family'] = $this->input->post('member_type');
        $data['total_value'] = $this->input->post('total_value');
       /* if( $this->input->post('method_type') != 3){
            $data['bank_id_fk'] = $this->input->post('bank_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
        }*/
        $data['publisher'] = $_SESSION["user_id"];
        $this->db->insert($this->main_table,$data);
        
    }
    //==========================================
    public function update($sarf_num ,$total_value){

        $data['sarf_num'] = $this->input->post('sarf_num');
        $data['sarf_date'] = strtotime($this->input->post('sarf_date'));
        $data['sarf_date_ar'] = $this->input->post('sarf_date');
        $data['bnod_help_fk'] = $this->input->post('bnod_help_id_fk');
        $data['mon_melady'] = $this->input->post('mon_melady');
        // $data['type_sarf'] = $this->input->post('sarf_type');
        $data['method_type'] = $this->input->post('method_type');
        // $data['type_family'] = $this->input->post('member_type');
        $data['total_value'] = $total_value;
        /*if( $this->input->post('method_type') != 3){
            $data['bank_id_fk'] = $this->input->post('bank_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
        }*/
        $data['publisher'] = $_SESSION["user_id"];
        $this->db->where("sarf_num",$sarf_num);
        $this->db->update($this->main_table,$data);

    }
    //==========================================
    public function update_presence($sarf_num ){

         $data['presence_number'] = $this->input->post('presence_number');
         $data['presence_year'] = $this->input->post('presence_year');
         $this->db->where("sarf_num",$sarf_num);
        $this->db->update($this->main_table,$data);

    }
    //==========================================
    public  function  insert_details($sarf_num_fk){
        $main =$this->input->post('mother_national_num_fk');
           $data["sarf_num_fk"]=$sarf_num_fk;
        foreach ($main as $item=>$value) {
            $data['all_num'] = $this->input->post('all_num')[$item];
            $data['mother_national_num_fk'] = $this->input->post('mother_national_num_fk')[$item];
            $data['file_num'] = $this->input->post('file_num')[$item];
            $data['value'] = $this->input->post('value')[$item];
            $data['mother_num'] = $this->input->post('mother_num')[$item];
            $data['young_num'] = $this->input->post('young_num')[$item];
            $data['adult_num'] = $this->input->post('adult_num')[$item];
            if($this->input->post('sarf_type') == 3) {
                $data['mother_value'] = $this->input->post('mother_value')[$item];
                $data['young_value'] = $this->input->post('young_value')[$item];
                $data['adult_value'] = $this->input->post('adult_value')[$item];
            }
            $this->db->insert("finance_sarf_order_details",$data);
        }
    }
    //==========================================
    public function select_all(){
        $this->db->select('finance_sarf_order.* ,bnod_help.title as band_name');
        $this->db->from($this->main_table);
        $this->db->join('bnod_help', 'bnod_help.id = finance_sarf_order.bnod_help_fk',"left");
        //$this->db->group_by("sarf_num");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function select_all_banks(){
        $this->db->select('id ,title');
        $this->db->from("banks_settings");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function printSarf($sarf_num){
        return $this->db->select('finance_sarf_order_details.*, basic.file_num, mother.full_name')
            ->join('basic','basic.mother_national_num=finance_sarf_order_details.mother_national_num_fk')
            ->join('mother','mother.mother_national_num_fk=finance_sarf_order_details.mother_national_num_fk')
            ->where('finance_sarf_order_details.sarf_num_fk',$sarf_num)
            ->get('finance_sarf_order_details')
            ->result();
    }
    //==========================================
    public function getByArray($sarf_num){
        $h = $this->db->get_where($this->main_table,array("sarf_num"=>$sarf_num));
        return $h->row_array();
    }
    //==========================================
    public function select_sarf_detals($sarf_num_fk){
        $this->db->select('finance_sarf_order_details.* , mother.full_name as mother_name');
        $this->db->from("finance_sarf_order_details");
        $this->db->join('mother', 'mother.mother_national_num_fk = finance_sarf_order_details.mother_national_num_fk',"left");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public function delete_sarf($sarf_num){
        $this->db->where("sarf_num",$sarf_num);
        $this->db->delete($this->main_table);
        $this->delete_sarf_detals($sarf_num);
    }
    //==========================================
    public function delete_sarf_detals($sarf_num){
        $this->db->where("sarf_num_fk",$sarf_num);
        $this->db->delete("finance_sarf_order_details");
    }
    //==========================================
    public function delete_sarf_detals_id($id){
        $this->db->where("id",$id);
        $this->db->delete("finance_sarf_order_details");
    }
    //==========================================
    public function get_person_values($sarf_num_fk){
        $this->db->select('*');
        $this->db->from("finance_sarf_order_details");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data['mother_count']=0;$data['mother_value']=0;
            $data['young_count']=0;$data['young_value']=0;
            $data['adult_count']=0;$data['adult_value']=0;
            foreach ( $query->result() as $row ){
                //============================================
                 if($row->mother_value != 0){
                     $data['mother_count']+=1;
                     $data['mother_value']+=$row->mother_value;
                 }if ($row->young_value != 0){
                     $data['young_count']+=1;
                     $data['young_value']+=$row->young_value;
                 }if($row->adult_value != 0){
                     $data['adult_count']+=1;
                     $data['adult_value']+=$row->adult_value;
                }
               //============================================
            }
            $data_return["mother_value"]=($data['mother_count'] !=0 ? $data['mother_value'] /  $data['mother_count'] : 0 )  ;
            $data_return["young_value"]=($data['young_value']   !=0 ? $data['young_value']  /  $data['young_count'] : 0) ;
            $data_return["adult_value"]=( $data['adult_count']  !=0 ? $data['adult_value'] /  $data['adult_count'] :0 );
            return $data_return;
        }
        return false;
    }
    //==========================================
    public function get_sarf_total_value($sarf_num_fk){
        $this->db->select('value');
        $this->db->from("finance_sarf_order_details");
        $this->db->where("sarf_num_fk",$sarf_num_fk);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->value;
            }
        }
        return $total;
    }
    //==========================================
    public function check_family($file_num){
        $this->db->select('suspend');
        $this->db->from("basic");
        $this->db->where("file_num",$file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->row_array();
            return $data["suspend"];
        }
        return "not_found";
    }
    //==========================================
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

}//END CLASS


