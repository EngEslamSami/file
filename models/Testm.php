<?php

class Testm extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    public function select_all_q()
    {
        $this->db->select('finance_quods_details.*,finance_quods.no3_qued');
        $this->db->from('finance_quods_details');



        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");


 $this->db->where('finance_quods.no3_qued',2);
        $this->db->order_by('qued_rkm_fk', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->q_type = $this->get_q_type($row->qued_rkm_fk)["no3_qued_name"];
                $data[$i]->total_value = $this->get_q_type($row->qued_rkm_fk)["total_value"];
                $data[$i]->pill_pay_method = $this->get_pill_pay_method($row->marg3)["pay_method"]; 
                 $data[$i]->pill_about = $this->get_pill_pay_method($row->marg3)["about"]; 
           $data[$i]->pill_pill_num = $this->get_pill_pay_method($row->marg3)["pill_num"]; 
                $i++;
            }
            return $data;
        }
        return false;
    }


   public function get_q_type ($qued_rkm_fk){
        $h = $this->db->get_where("finance_quods",array("rkm"=>$qued_rkm_fk));
      return  $data = $h->row_array();
        
    }

   public function get_pill_pay_method ($marg3){
        $h = $this->db->get_where("fr_all_pills",array("pill_num"=>$marg3));
      return  $data = $h->row_array();
        
    }

/***************************************************/


    public function select_all_qq()
    {
        $this->db->select('finance_quods_details.*,finance_quods.no3_qued');
        $this->db->from('finance_quods_details');



        $this->db->join('finance_quods', 'finance_quods.rkm = finance_quods_details.qued_rkm_fk',"left");


// $this->db->where('finance_quods.no3_qued',2);
        $this->db->order_by('qued_rkm_fk', "ASC");
         $this->db->order_by('id', "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->q_type = $this->get_q_type($row->qued_rkm_fk)["no3_qued_name"];
                $data[$i]->total_value = $this->get_q_type($row->qued_rkm_fk)["total_value"];
                $data[$i]->pill_pay_method = $this->get_pill_pay_method($row->marg3)["pay_method"]; 
                 $data[$i]->pill_about = $this->get_pill_pay_method($row->marg3)["about"]; 
                $data[$i]->person_name = $this->get_pill_pay_method($row->marg3)["person_name"]; 
               $data[$i]->pill_pill_num = $this->get_pill_pay_method($row->marg3)["pill_num"]; 
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    
    
       public function select_all_qqq()
    {
        $this->db->select('*');
        $this->db->from('fr_all_pills');

           $this->db->where('pay_method !=',1);
         $this->db->order_by('pill_num', "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

                $i++;
            }
            return $data;
        }
        return false;
    }

}//END CLASS