<?php
class Sarf extends CI_Model{
    public function __construct() {
        parent::__construct();
}    
//-------------------------------------------------
 public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || empty($post_value) ){
            return 0;
        }else{
            return $post_value;
        }
    }
//-------------------------------------------------
    public function insert($session_name){
/*        echo "<pre>";
        print_r($_SESSION["sanad_sarf_".$session_name]);
        echo "</pre>";
        die;*/
         $mod = current($_SESSION["sanad_sarf_".$session_name]);
      for ($x = 0; $x < count($_SESSION["sanad_sarf_".$session_name]); $x++) {
            $data['receipt_date'] = strtotime($mod['receipt_date']);
            $data['vouch_num'] = $mod['vouch_num'];
            $data['vouch_type'] = $mod['vouch_type'];
            $data['details'] = $mod['byan_sarf'];
            $data['value'] = $mod['value'];
            $data['type'] = 1; 
             if($mod['vouch_type']==1){
                 $data['maden']= $mod['account_code'];
                 $data['dayen']=$mod['box_name'];
                 $data['date_received']="";
                 $data['sheek_num']="";
             }elseif($mod['vouch_type']==2 || $mod['vouch_type']==3){
                 $data['maden']=$mod['account_code'];
                 $data['dayen']=$mod['bank_name'];
                 $data['date_received']=strtotime($mod['recive_date']);
                 $data['date_received_other']=strtotime($mod['recive_date_other']);
                 $data['sheek_num']=$mod['check_num'];
             }
            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s'] = time();
            $mod = next($_SESSION["sanad_sarf_".$session_name]);
            $this->db->insert('vouchers', $data);
        }//END FOR

    } 
//-------------------------------------------------
/*    public function insert_($session_name){
        
        $mod = current($_SESSION["sarf_edit".$session_name]);
        $this->db->where("vouch_num",$mod['vouch_num']);
        $this->db->delete("vouchers");

        for ($x = 0; $x < count($_SESSION["sarf_edit".$session_name]); $x++) {
            $data['receipt_date'] = strtotime($mod['receipt_date']);
            $data['vouch_num'] = $mod['vouch_num'];
            $data['vouch_type'] = $mod['vouch_type'];
            $data['details'] = $mod['byan_sarf'];
            $data['value'] = $mod['value'];
            $data['type'] = 1;
            if($mod['vouch_type']==1){
                $data['maden']= $mod['account_code'];
                $data['dayen']=$mod['box_name'];
                $data['date_received']=strtotime($mod['recive_date']);
                $data['sheek_num']="";
            }elseif($mod['vouch_type']==2 || $mod['vouch_type']==3){
                $data['maden']=$mod['account_code'];
                $data['dayen']=$mod['bank_name'];
                $data['date_received']=strtotime($mod['recive_date']);
                $data['sheek_num']=$mod['check_num'];
            }
            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s'] = time();
            $mod = next($_SESSION["sarf_edit".$session_name]);
            $this->db->insert('vouchers', $data);
        }//END FOR

    }*/
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------

    public function query_vouchers_sarf()
{
    $this->db->select('* , sum(value) as sum');
    $this->db->from('vouchers');
    $this->db->where('type', 1);
    $this->db->group_by('vouch_num');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}
    
 public function select_sarf_group()
{
    $this->db->select('*');
    $this->db->from('vouchers');
     $array = array('type' => 1, 'deport' => 0);
     $this->db->where($array);
    $this->db->order_by('id', 'DESC');
    $this->db->group_by('vouch_num');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}   
    

public function select_all_value()
{
    $this->db->select('*');
    $this->db->from('vouchers');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $query2 = $this->db->query('SELECT * FROM `vouchers` WHERE `vouch_num`=' . $row->vouch_num);
            $arr = array();
            foreach ($query2->result() as $row2) {
                $arr[] = $row2;
            }
            $data[$row->vouch_num] = $arr;

        }
        return $data;
    }
    return false;
}
    
    
 public function select_max_id()
{   
   /* $this->db->limit(1);
$this->db->order_by('id', 'DESC');
$query  = $this->db->get('vouchers');
return $query->row_array();*/

 $this->db->select_max('id');
    $this->db->from('vouchers');
    $query = $this->db->get();
    $r=$query->result();
    return $r;
    }


    /***************/
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('vouchers');
        $array = array('type' => 1, 'deport' => 0);
        $this->db->where('vouch_num',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->account_name = $this->get_by_code($row->dayen);
                $x++; }
            return $data;
        }
        return false;
    }


    public  function get_by_code($code){
        $h = $this->db->get_where('accounts_group', array('code'=>$code));
        return $h->row_array()['name'];
    }
     public function query_vouchers_qabd()// old function 
    {
        $this->db->select('* ,sum(value) as sum');
        $this->db->from('vouchers');
        $this->db->where('type', 1);
        $this->db->group_by('vouch_num');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $i = 0;
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $data[$i] = $row;
        $data[$i]->details = $this->getById($row->vouch_num);
        $data[$i]->box_name = $this->get_form_id($row->dayen);
        $i++;
    }
        return $data;
    }
       return false;
    }
	/////////////////////////
	
	
	
	public function get_form_id($code){
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->where('code', $code);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data=$row->name;
            }
            return $data;
        }
        return false;
    }


    public function sand_sarf_delete($id)
    {
        $this->db->where('vouch_num',$id);
        $this->db->where('type',1);
        $this->db->delete('vouchers');

    }
    
/*     public function query_vouchers_qabd()
    {
        $this->db->select('* ,sum(value) as sum');
        $this->db->from('vouchers');
        $this->db->where('type', 1);
        $this->db->group_by('vouch_num');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }*/

public function edit_sarf()
    {
        
       $receipt_date=$this->input->post('receipt_date');
       $date_sand=$this->input->post('date_sand');
      $receipt_date_other=$this->input->post('receipt_date_other');
      $vouch_num=$this->input->post('vouch_num');
      $vouch_type=$this->input->post('vouch_type');
      $box_name=$this->input->post('box_name');
      $bank_name=$this->input->post('bank_name');
      $check_num=$this->input->post('check_num');
      $data_name=$this->input->post('data_name');
      $data_amount=$this->input->post('data_amount');
      $data_bayan=$this->input->post('data_bayan');
      $count=count($data_name);
      for($i=0;$i<$count;$i++) {
        $data['receipt_date'] = strtotime($date_sand);
        $data['vouch_num'] = $vouch_num;
            $data['vouch_type'] = $vouch_type;
            $data['details'] = $data_bayan[$i+2];
            $data['value'] = $data_amount[$i];
            $data['type'] = 1; 
            if($vouch_type==1){
                 $data['dayen']= $box_name;
                 $data['maden']=$data_name[$i];
                 $data['date_received']=0;
                  $data['date_received_other']=0;
                 $data['sheek_num']="";
             }elseif($vouch_type==2){
                 $data['dayen']=$bank_name;
                 $data['maden']=$data_name[$i];
                
                
                 $data['date_received']=strtotime($receipt_date);
                 $data['date_received_other']=0;
                 $data['sheek_num']=$check_num;
             }elseif($vouch_type==3){
                $data['maden']=$bank_name;
                 $data['dayen']=$data_name[$i];
                
                
                 $data['date_received']=0;
                 $data['date_received_other']=strtotime($receipt_date_other);
                 $data['sheek_num']=$check_num;
             }
            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s'] = time();
             $this->db->insert('vouchers', $data);
            
      }
      
    
      echo "تم التعديل بنجاح";
    }
   
}// END CLASS   
?>