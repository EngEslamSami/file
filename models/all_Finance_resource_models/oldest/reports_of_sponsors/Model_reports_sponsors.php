<?php
class Model_reports_sponsors extends CI_Model{
    public function __construct() {

        parent::__construct();

    }
   //---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    //===================================================================================    
    public function R_current_donors($status){
        $current_date = strtotime(date("Y-m-d"));
        if($status == 0)
            $query = $this->db->query('SELECT sponsors.*, (SELECT COUNT(*) FROM programs_to WHERE programs_to.donor_id = sponsors.id) AS TOT, (SELECT COUNT(*) FROM participation_money WHERE participation_money.donor_id = sponsors.id) AS pay, (SELECT date FROM participation_money WHERE participation_money.donor_id = sponsors.id ORDER BY participation_money.id DESC LIMIT 1) AS DAT FROM sponsors WHERE sponsors.date_to >= '.$current_date.' AND sponsors.type = 1');
        else
            $query = $this->db->query('SELECT sponsors.*, (SELECT COUNT(*) FROM programs_to WHERE programs_to.donor_id = sponsors.id) AS TOT, (SELECT COUNT(*) FROM participation_money WHERE participation_money.donor_id = sponsors.id) AS pay, (SELECT date FROM participation_money WHERE participation_money.donor_id = sponsors.id ORDER BY participation_money.id DESC LIMIT 1) AS DAT FROM sponsors WHERE sponsors.date_from < '.$current_date.' AND sponsors.type = 1');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }  
    //===================================================================================
    
    
    
    
}

