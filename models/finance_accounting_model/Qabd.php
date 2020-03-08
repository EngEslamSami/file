<?php
class Qabd extends CI_Model{
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
         $mod = current($_SESSION["sanad_qabd_".$session_name]);
      for ($x = 0; $x < count($_SESSION["sanad_qabd_".$session_name]); $x++) {
            $data['receipt_date'] = strtotime($mod['receipt_date']);
            $data['vouch_num'] = $mod['vouch_num'];
            $data['vouch_type'] = $mod['vouch_type'];
            $data['details'] = $mod['byan_sarf'];
            $data['value'] = $mod['value'];
            $data['type'] = 2; 
             if($mod['vouch_type']==1){
                
                 $data['maden']= $mod['box_name'];
                 $data['dayen']=$mod['account_code'];
                 $data['date_received']="";
                 $data['sheek_num']="";
             }elseif($mod['vouch_type']==2 || $mod['vouch_type']==3){
                 $data['maden']=$mod['bank_name'];
                 $data['dayen']=$mod['account_code'];
                
                
                 $data['date_received']=strtotime($mod['recive_date']);
                 $data['date_received_other']=strtotime($mod['recive_date_other']);
                 $data['sheek_num']=$mod['check_num'];
             }
            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s'] = time();
            $mod = next($_SESSION["sanad_qabd_".$session_name]);
            $this->db->insert('vouchers', $data);   
        }//END FOR
    } 
//-------------------------------------------------
       public function select_between_dates($date_from,$date_to,$type)
    {
        $this->db->select('*');
        $this->db->from('vouchers');
        $this->db->where('date >=', strtotime($date_from));
        $this->db->where('date <=', strtotime($date_to));
        $this->db->where('type', $type);
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
    
    
        public function query_vouchers()
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
    //===============================================
    public function select_dayen()
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `accounts_group` WHERE `code`=' . $row->code);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->code] = $arr;

            }
            return $data;
        }
        return false;
    }
    
    
        public function sarf_group()
{
    $this->db->select('*');
    $this->db->from('vouchers');
    $this->db->where('date ', strtotime(date("m/d/Y")));
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
//-------------------------------------------------


public function get_all()
{
    $this->db->where('type', 2);

   $query= $this->db->get('vouchers')->result();
    $data=array();
    $x=0;
    foreach($query as $row)
    {
        $data[$x]=$row;
        $data[$x]->debt=$this->get_all_dedt();

    }
}

 public function query_vouchers_qabd() //old function
    {
        $this->db->select('* , sum(value) as sum');
        $this->db->from('vouchers');
        $this->db->where('type', 2);
        $this->db->group_by('vouch_num');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $i = 0;
     if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $data[$i] = $row;
        $data[$i]->details = $this->getById($row->vouch_num);
        $data[$i]->box_name = $this->get_form_id($row->maden); 
        $i++;
    }
    return $data;
}
        return false;
    }

////////////////////////////
 public function sand_qabd_delete($id)
    {
        $this->db->where('vouch_num',$id);
        $this->db->where('type',2);
        $this->db->delete('vouchers');

    }
    
    
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
    
  /*  public function query_vouchers_qabd()
    {
        $this->db->select('* , sum(value) as sum');
        $this->db->from('vouchers');
        $this->db->where('type', 2);
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


/*
    public function get_sand_item($num)
    {
        $this->db->where('vouch_num', $num);
        $query= $this->db->get('vouchers')->result();
        $data=array();
        $x=1;
        foreach($query as $row){
            $data[$x]=$row;
            $data[$x]->account_group=$this->get_by_code($row->dayen);
            $x++;
        }
        return $data;
    }
    public  function get_by_code($code){
        $h = $this->db->get_where('accounts_group', array('code'=>$code))->row()->name;
        return $h;

    }
*/
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('vouchers');
        $array = array('type' =>2, 'deport' => 0);
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
    public function edit_qabd()
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
            $data['type'] = 2; 
            if($vouch_type==1){
                 $data['maden']= $box_name;
                 $data['dayen']=$data_name[$i];
                 $data['date_received']=0;
                  $data['date_received_other']=0;
                 $data['sheek_num']="";
             }elseif($vouch_type==2){
                 $data['maden']=$bank_name;
                 $data['dayen']=$data_name[$i];
                
                
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
   

//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    

}// END CLASS   
?>