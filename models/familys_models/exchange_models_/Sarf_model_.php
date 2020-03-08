<?php

class Sarf_model extends CI_Model
{

    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
    public function HijriToJD10($date_in){
        $ex =(explode('/',$date_in));
        $y  = (int) $ex[0];
        $m  = (int) $ex[1];
        $d  = (int) $ex[2];

        return (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m) - (int)(($m - 1) / 2) + $d + 1948440 - 385;
    }
    public function HijriToJD10year($date_in){
        $ex =(explode('/',$date_in));
        $y  = (int) $ex[0];


        return $y ;
    }

    public function HijriToJD10year_2($date_in){
        $ex =(explode('/',$date_in));
        $y  = (int) $ex[2];


        return $y ;
    }





//---------------------------------------------------



    public  function  insert(){

         $last_id =$_POST['sarf_num'];
  /*      echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/


        //sarf_order_details
        $total=0;
              if(!empty($_POST['mother_national_if_fk'])){
                  foreach ( $_POST['mother_national_if_fk'] as  $key=>$value){
                      $data['sarf_num_fk']=$last_id;
                      $data['mother_national_if_fk']=$key;
                      $data['value']=$value;
                      $total +=$value;
                      $this->db->insert('sarf_order_details',$data);
                  }
              }
        //sarf_orders
        $data2['sarf_num']=$last_id;
        $data2['total']=$total;
        $data2['mon_hij']=$this->chek_Null( $this->input->post('mon_hij'));
        $data2['mon_melady']=date('m');
        $data2['year_hij']=$this->chek_Null( $this->input->post('year_hij'));
        $data2['year_melady']=date('Y');
        $data2['date_ar']=date('Y-m-d');
        $data2['date']=strtotime(date('Y-m-d'));
        $this->db->insert('sarf_orders',$data2);

    }

    //=======================================================================

    public function update($last_id){
        //sarf_order_details
        $this->db->where(array("sarf_num_fk"=>$last_id));
        $this->db->delete("sarf_order_details");

        $total=0;
        if(!empty($_POST['mother_national_if_fk'])){
            foreach ( $_POST['mother_national_if_fk'] as  $key=>$value){
                $data['sarf_num_fk']=$last_id;
                $data['mother_national_if_fk']=$key;
                $data['value']=$value;
                $total +=$value;
                $this->db->insert('sarf_order_details',$data);
            }
        }
        //sarf_orders
        $data2['sarf_num']=$last_id;
        $data2['total']=$total;
        $data2['mon_hij']=$this->chek_Null( $this->input->post('mon_hij'));
        $data2['year_hij']=$this->chek_Null( $this->input->post('year_hij'));
        $this->db->where('sarf_num',$last_id);
        $this->db->update('sarf_orders',$data2);

    }






    /*********************************************************************/
    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("sarf_orders");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id+1;
            }
            return $data;
        }else{
        return 1;
        }
    }

    public function getName($id){
        $h = $this->db->get_where("family_data", array('id'=>$id));
        return $h->row_array()['name'];
    }
    /*********************************************************************/
    public function select_all(){
        $this->db->select('*');
        $this->db->from("sarf_orders");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->details = $this->getDetails($row->sarf_num);
                $x++; }
            return $data;
        }else{
            return 0;
        }
    }

    public function getDetails($num){
        $this->db->select('*');
        $this->db->from("sarf_order_details");
        $this->db->where("sarf_num_fk",$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->name = $this->getName($row->mother_national_if_fk);
                $x++; }
            return $data;
        }else{
            return 0;
        }
    }


/*******************************************************************/
    public function select_inserted(){
        $this->db->select('*');
        $this->db->from("sarf_order_details");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->mother_national_if_fk;
            }
            return $data;
        }else{
            return 0;
        }
    }
    /*********************************************************************/
    public function getById($num){
        $h = $this->db->get_where("sarf_orders", array('sarf_num'=>$num));
        return $h->row_array();
    }

    /*********************************************************************/

    public function getDetails2($num){
        $this->db->select('*');
        $this->db->from("sarf_order_details");
        $this->db->where("sarf_num_fk",$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->mother_national_if_fk;
              }
            return $data;
        }else{
            return 0;
        }
    }

}// END CLASS
