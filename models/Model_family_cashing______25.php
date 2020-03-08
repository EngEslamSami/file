<?php
class Model_family_cashing extends CI_Model{
    public function __construct()
    {
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
        $this->db->select('mother.mother_national_num_fk ,mother.full_name');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
       // $this->db->where("basic.suspend",4);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
               // $data[$i]->total_child=$this->total_child(array("mother_national_num_fk"=>$row->mother_national_num_fk));
                $data[$i]->up_child=$this->total_child(array("mother_national_num_fk"=>$row->mother_national_num_fk,
                                                             "member_birth_date_hijri_year <="=>$condition_year));
                $data[$i]->down_child=$this->total_child(array("mother_national_num_fk"=>$row->mother_national_num_fk,
                                                             "member_birth_date_hijri_year >"=>$condition_year));
                $i++;
            }
            return $data;
        }
        return false;
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
        $data['sarf_date'] = strtotime($this->input->post('sarf_date'));
        $data['sarf_date_ar'] = $this->input->post('sarf_date');
        $data['type_sarf'] = $this->input->post('sarf_type');
        $data['method_type'] = $this->input->post('method_type');
        $data['type_family'] = $this->input->post('member_type');
        $data['total_value'] = $this->input->post('total_value');
        if( $this->input->post('method_type') != 3){
            $data['bank_id_fk'] = $this->input->post('bank_id_fk');
            $data['bank_account_num'] = $this->input->post('bank_account_num');
        }
        $data['publisher'] = $_SESSION["user_id"];
        $this->db->insert($this->main_table,$data);
        
    }
    //==========================================
    public  function  insert_details($sarf_num_fk){
        $main =$this->input->post('mother_national_num_fk');
           $data["sarf_num_fk"]=$sarf_num_fk;
        foreach ($main as $item=>$value) {
            $data['all_num'] = $this->input->post('all_num')[$item];
            $data['mother_national_num_fk'] = $this->input->post('mother_national_num_fk')[$item];

            $data['value'] = $this->input->post('value')[$item];
            if($this->input->post('sarf_type') == 3) {
                $data['mother_num'] = $this->input->post('mother_num')[$item];
                $data['young_num'] = $this->input->post('young_num')[$item];
                $data['adult_num'] = $this->input->post('adult_num')[$item];
                $data['mother_value'] = $this->input->post('mother_value')[$item];
                $data['young_value'] = $this->input->post('young_value')[$item];
                $data['adult_value'] = $this->input->post('adult_value')[$item];
            }
            $this->db->insert("finance_sarf_order_details",$data);
        }
    }
    //==========================================
    public function select_all(){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->group_by("sarf_num");
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
    public function printSarf($sarf_num)
    {
        return $this->db->select('finance_sarf_order_details.*, basic.file_num, mother.full_name')
            ->join('basic','basic.mother_national_num=finance_sarf_order_details.mother_national_num_fk')
            ->join('mother','mother.mother_national_num_fk=finance_sarf_order_details.mother_national_num_fk')
            ->where('finance_sarf_order_details.sarf_num_fk',$sarf_num)
            ->get('finance_sarf_order_details')
            ->result();
    }
    //==========================================


}//END CLASS


