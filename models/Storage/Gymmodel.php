<?php
class Gymmodel extends CI_Model
{
    
    public function select_all_items() {
     
    
     $query= $this->db->get('items');
      return $query->result();
     
 }
 public function select_all_branch() {
     
     $this->db->where_not_in('from_id',0);
     $query= $this->db->get('branch_settings');
      return $query->result();
     
 }
 public function get_unit()
 {
    // $sanf= $this->input->post('sanf');
     $this->db->select('units.unit_name');
              
     $this->db->from('items');
     $this->db->join('units','items.unit_id_fk=units.id','left');
     $this->db->where('items.id',1);
     $query = $this->db->get();
     if($query->num_rows()>0){
  return $query->row()->unit_name; 
     }else{
         return "لم يتم تحديد الوحده";
     }
     
 }
 public function get_available_amount() 
 {   
    $sanf= $this->input->post('sanf');
     
    $amount1= $this->get_past_amount($sanf);
    
    $amount2=$this->get_from_purchase_table($sanf);
    
    $amount3=$this->get_from_returns($sanf);
    
    $amount4=$this->get_amount_from_new_table($sanf);
    $amount5=$this->get_amount_from_saraf_items($sanf);
   
    $x1=$amount2+$amount1;
  
   
    $x2=$amount3+$amount4+$amount5;
   //echo ($amount2+$amount1)-($amount3+$amount4);
    if($x1>$x2){
        echo $x1-$x2;
     
        
    }else{
       echo $x2-$x1;  
    }
 
    
   }
   public function get_amount_from_saraf_items($sanf) {
       
    $this->db->select_sum('amount');
       $this->db->where('product_code',$sanf);
       $query=$this->db->get('saraf_items');
       if($query->num_rows()>0){
       return $query->row()->amount;
       }else{
           return 0;
       }
       
   }
   public function get_amount_from_new_table($sanf)
           {
       
       $this->db->select_sum('sale_amount');
       $this->db->where('product_code',$sanf);
       $query=$this->db->get('sales');
       if($query->num_rows()>0){
       return $query->row()->sale_amount;
       }else{
           return 0;
       }
     
       
   }
   public function get_past_amount($sanf)
   {
     $this->db->select('past_amount');
     $this->db->where('id',$sanf);
     $query=$this->db->get('items');
     return $query->row()->past_amount;
       
   }
   public function get_from_purchase_table($sanf)
   {
      $this->db->select('amount_buy');
     $this->db->where('product_code',$sanf);
     $query=$this->db->get('purchases');
    
       if($query->num_rows()>0){
       return $query->row()->amount_buy;
       
   }else{
       return 0;
   }
   }
   public function get_from_returns($sanf) 
           
           {
       
        $this->db->select('hadback_amount');
     $this->db->where('product_code',$sanf);
     $query=$this->db->get('purchases');
       if($query->num_rows()>0){
       return $query->row()->hadback_amount;
       
   }else{
       return 0;
   }
       
   }
   
   public function get_one_price_form_purchases(){
    $sanf= $this->input->post('sanf');
    
  
    $this->db->select('one_price_sell');
    $this->db->where('product_code',$sanf);
     $query=$this->db->get('purchases');
     $co=$query->num_rows();
    if($co==1){
     echo $query->row()->one_price_sell;  
    }
    else{
       $this->get_price_from_item();
    }
       
   }
   
   public function get_price_from_item() 
           {
     $sanf= $this->input->post('sanf');
     $this->db->select('past_amount,cost_past_amount');
     $this->db->where('id',$sanf);
     $query=$this->db->get('items');
       
     echo ($query->row()->cost_past_amount/$query->row()->past_amount);
       
   }   
   public function save_fatora() {
   
  $data_total=$this->input->post('data_total');
  $data_amount=$this->input->post('data_amount');
 $data_name=$this->input->post('data_name');
 $data_branch=$this->input->post('data_branch');
  $data_total_d = json_decode(stripslashes($data_total));
  $data_amount_d = json_decode(stripslashes($data_amount));
  $data_name_d = json_decode(stripslashes($data_name));
 $data_branch_d = json_decode(stripslashes($data_branch));

 $all_cost=$this->input->post('all_cost');
 $pill=$this->input->post('numpill');
  $date=$this->input->post('date2');
  $act_amount=$this->input->post('act_amount');
 
   $c1=count($data_name_d);
   $c2=count($data_amount_d);
   $c3=count($data_branch_d);
   $c4=count($data_total_d);
  
   if ($c1==$c2&&$c2==$c3&&$c3==$c4){
       
       
    for($i=0;$i<$c1;$i++){
  $branch=$data_branch_d[$i];
  $array=array('product_code'=>$data_name_d[$i],'date_s'=>strtotime($date),'pill'=>$pill,'client_id_fk'=>$data_branch_d[$i]);
 
    $this->db->where($array);
   $query=$this->db->get('saraf_items');
    
  
   if($query->num_rows()<1){
        
       
     $data['pill']=$pill;
     
      $data['client_id_fk']=$data_branch_d[$i];
      $data['product_code']=$data_name_d[$i];
    $data['amount']=$data_amount_d[$i];
     //$data['total_sanf_cost']=$data_total_d[$i];
     $data['one_buy_cost']= $data_total_d[$i]/$data_amount_d[$i];
     $data['date']=time();
    $data['date_s']=strtotime($date);
     
      $data['available_amount']=$act_amount-$data_amount_d[$i];
    
   
     
     
     
    
     
     $this->save_table('saraf_items',$data);
     
    
     
    
   } else{
       
     
    $data2['client_id_fk']=$data_branch_d[$i];
    $data2['pill']=$pill;
    $data2['product_code']=$data_name_d[$i];
    $data2['date']=time();
    $data2['date_s']=strtotime($date);
    $data2['one_buy_cost']= $data_total_d[$i]/$data_amount_d[$i];
    $data2['available_amount']=$act_amount-$data_amount_d[$i];
    
    $data2['amount']=$data_amount_d[$i]+$query->row()->amount;
    
     $array2=array('product_code'=>$data_name_d[$i],'date_s'=>strtotime($date),'pill'=>$pill,'client_id_fk'=>$data_branch_d[$i]);
//    $this->db->where('product_code',$data_name_d[$i]);
//    $this->db->where('pill',$data_branch_d[$i]);
    $this->db->where($array2);
    $this->db->update('saraf_items',$data2);
    
      
   }
  
 
 //$data3['main_branch']=$this->get_main_branch($branch);
 $data3['client_id_fk']=$data_branch_d[$i];
 $data3['pill_num']=$pill;
 $data3['all_amount']=$data_amount_d[$i];
 $data3['all_cost']=$data_total_d[$i];
 
 $this->db->where('pill_num',$pill);
 $query2=$this->db->get('saraf_fatora');
  $co2=count($query2->row());
 
   if($co2==1){
       
       
    $data4['all_amount']=$data_amount_d[$i]+$query2->row()->all_amount;
    $data4['all_cost']=$data_total_d[$i]+$query2->row()->all_cost;
        $this->db->where('pill_num',$pill);
        $this->db->update('saraf_fatora',$data4);
   }else{
       $this->save_table('saraf_fatora',$data3); 
   }
    }
    echo "insert";
  }
   else{
       echo "not";
   }
    
}
public function get_main_branch($branch)
{
    $this->db->select('from_id');
     $this->db->where('id',$branch);
    $query= $this->db->get('branch_settings');
   return $query->row()->from_id;
    
}
public function save_table($table,$data) {
    $this->db->insert($table,$data);
    
}

public function get_all() {
$data=array(); 
$i=0;
$this->db->select('*');    
$this->db->from('start_other_items');
$this->db->join('branch_settings','start_other_items.sub_branch=branch_settings.id','left');
$query = $this->db->get();
foreach($query->result() as $row)
    {
    $data[$i]=$row;
   $data[$i]->capital=$this->get_main_branch2($row->main_branch) 
;
   $i++;
}
echo '<pre>';
print_r($data);
 echo '</pre>';   
        
    
}
public function get_main_branch2($id) 
        {
    $this->db->select('title'); 
    $this->db->where('id',$id);
    return $this->db->get('branch_settings')->row()->title;
}
public function get_all_main() {
     $data=array(); 
      $i=0;
     $this->db->select('id,name,sanf_code');
     $this->db->where_not_in('id_from',0);
     $query= $this->db->get('items');
     
      foreach($query->result() as $row){
         $data[$i]=$row ;
        $data[$i]->branches=$this->get_array($row->sanf_code);
          $i++;
      }
      return $data;
     
 }
 public function get_array($id) {
     
     //$this->db->where('main_branch',$id);
    // $query= $this->db->get('start_other_items');
     $this->db->select('start_other_items.id,start_other_items.sub_branch,start_other_items.main_branch,start_other_items.amount,start_other_items.date,start_other_items.sanf_code,'
             . 'start_other_items.one_buy_cost,start_other_items.available_amount,other_item.name,branch_settings.title');    
     $this->db->from('start_other_items');
     $this->db->join('branch_settings','start_other_items.sub_branch=branch_settings.id','left');
     
     $this->db->join('other_item','start_other_items.sanf_code=other_item.sanf_code','left');
     $this->db->where('start_other_items.sanf_code',$id);
    $query = $this->db->get();
      return $query->result();
 }
 
 public function delete_row() {
   $id=$this->input->post('id');
  
$this->db->where('id', $id);
$this->db->delete('start_other_items');
     
 }
 
 public function get_all_pills()
 {
    $this->db->distinct();
    $this->db->select('DISTINCT(pill)');
    $query = $this->db->get('start_other_items');
    return $query->result(); 
 }
 
 public function get_pill_items()
 {
  $pill=$this->uri->segment(3); 
  $this->db->select('start_other_items.id,start_other_items.sub_branch,start_other_items.main_branch,start_other_items.amount,start_other_items.date,start_other_items.sanf_code,'
             . 'start_other_items.one_buy_cost,start_other_items.available_amount,branch_settings.title,other_item.name');    
     $this->db->from('start_other_items');
     $this->db->join('branch_settings','start_other_items.sub_branch=branch_settings.id','left');
     $this->db->join('other_item','start_other_items.sanf_code=other_item.sanf_code','left');
      $this->db->where('start_other_items.pill',$pill);
      $query=$this->db->get();
       return $query->result();
  
 }
 public function get_date2() {
    
     $pill=$this->uri->segment(3);
     $this->db->select('date');
    $this->db->where('pill',$pill);
    $query=$this->db->get('start_other_items');
    
     return $query->row()->date;
    
 }
 public function get_item_branch(){
    $pill=$this->uri->segment(3);
     $this->db->select('sub_branch');
    $this->db->where('pill',$pill);
    $query=$this->db->get('start_other_items');
    
     return $query->row()->sub_branch;
     
 }
 public function delete_item_from_fatora() {
   $id=$this->input->post('id'); 
   $amount=$this->input->post('amount'); 
    $pill=$this->input->post('pill'); 
    $id=$this->input->post('id');
  
$this->db->where('id', $id);
$this->db->delete('start_other_items');
$this->db->select('all_amount,all_cost');
$this->db->where('pill_num',$pill);
 $pmonnt= $this->db->get('start_other_fatora')->row()->all_amount;
 $cost= $this->db->get('start_other_fatora')->row()->all_cost;
 $data['all_amount']=$pmonnt-$amount;
 $data['all_cost']=$cost-($amount*$this->get_one_price());     
 $this->db->where('pill_num',$pill);
 $this->db->update('start_other_fatora',$data);

     
 }
 public function get_one_price() {
     
  $id=$this->input->post('id');
  $this->db->select('one_buy_cost');
 $this->db->where('id', $id);
 return $this->db->get('start_other_items')->row()->one_buy_cost;
 }

}