<?php
class Programs_dep extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert(){
        $data['program_name']=$this->input->post('program_name');
        $data['monthly_value']=$this->input->post('monthly_value');
        $data['individual_value']=$this->input->post('individual_value');
        $data['cooperate']=$this->input->post('cooperate');
        $data['program_from']=strtotime($this->input->post('program_from'));
        $data['program_to']=strtotime($this->input->post('program_to'));
          $data['account_settings_id_fk']=$this->input->post('account_settings_id_fk');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('programs_depart',$data);
    }
    
    public function insert2(){
        for($x = 0 ; $x < count($this->input->post('program_id_fk')) ; $x++){
            $data['program_id_fk']=$this->input->post('program_id_fk')[$x];
            $data['donor_id']=$this->input->post('donor_id');
            $data['date'] = strtotime(date("Y/m/d"));
            $data['date_s']=time();
            $data['publisher']=$_SESSION['user_id'];
            $this->db->insert('programs_to',$data);
        }
    }
    
    public function select(){
        $this->db->select('*');
        $this->db->from('programs_depart');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
        public function select_for_web_donner(){
   
        $this->db->select('*');
        $this->db->from('programs_depart');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
        public function select_mother(){
        $this->db->select('*');
        $this->db->from('mother');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }
    
     public function select2(){
        $this->db->select('*');
        $this->db->from('programs_to');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->donor_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
         public function select3(){
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->member_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
    public function select_all(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where('type',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    

    
    
        public function select_all2(){
        $this->db->select('*');
        $this->db->from('f_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
            public function select_all3(){
        $this->db->select('*');
        $this->db->from('f_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
     
    
        public function select34(){
    
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->member_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_programs_to($id){
        $this->db->select('*');
        $this->db->from('programs_to');
        $this->db->where('donor_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function getById($id){
        $h = $this->db->get_where('programs_depart', array('id'=>$id));
        return $h->row_array();
    }
    public function get_condition($id){
           $h = $this->db->get_where('participation_money', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id){
        $update = array(
            'account_settings_id_fk'=>$this->input->post('account_settings_id_fk'),
            'program_name'=>$this->input->post('program_name'),
            'monthly_value'=>$this->input->post('monthly_value'),
            'individual_value'=>$this->input->post('individual_value'),
            'cooperate'=>$this->input->post('cooperate'),
            'program_from'=>strtotime($this->input->post('program_from')),
            'program_to'=>strtotime($this->input->post('program_to')),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' =>$_SESSION['user_id']
        );
        
        $this->db->where('id', $id);
        if($this->db->update('programs_depart',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function update2($id){
        $this->db->where('donor_id',$id);
        $this->db->delete('programs_to');
        $this->insert2();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('programs_depart');
    }
     public function delete_contributions($id){
        $this->db->where('id',$id);
        $this->db->delete('participation_money');
    }
    
    
//-------------------------------------------------------------------
   public function member_mothers(){
    
    $this->db->select('id ,mother_national_num_fk ');
    $this->db->from('f_members');
    $this->db->group_by("mother_national_num_fk");
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->mother_name = $this->get_mother($row->mother_national_num_fk);
            $query_result[$i]->sub_mem = $this->get_member($row->mother_national_num_fk);
            $query_result[$i]->father_name = $this->get_father($row->mother_national_num_fk);
            
            $i++;
        }
        return $query_result;
    }
    return false;
   
   }   
//----------------------------
public function get_member($mother_id){
    $this->db->select('*');
    $this->db->from('f_members');
    $this->db->where("mother_national_num_fk",$mother_id);
     $query = $this->db->get();
     $query_result=$query->result();
     return $query_result; 
} 
//-----------------------------
public function get_mother($mother_id){
   
     $h = $this->db->get_where('mother', array("mother_national_num_fk"=>$mother_id));
      $data =$h->row_array();
      $total_name=$data["full_name"];//." ".$data["m_father_name"]." ".$data["m_grandfather_name"]." ".$data["m_family_name"];
      return $total_name;
}

public function get_father($father_id){
   
     $h = $this->db->get_where('father', array("mother_national_num_fk"=>$father_id));
      $data =$h->row_array();
      $total_name=$data["full_name"];//." ".$data["f_father_name"]." ".$data["f_grandfather_name"]." ".$data["f_family_name"];
      return $total_name;
}


//---------------------------------    
 public function progams(){
    
      $this->db->select('donor_id ,program_id_fk');
    $this->db->from('programs_to');
    $this->db->group_by("program_id_fk");
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->program_name = $this->get_program_name($row->program_id_fk);
            $query_result[$i]->sub_doner = $this->get_doners($row->program_id_fk);
           $i++;
        }
        return $query_result;
    }
    return false;
 } 
//--------------------------------------------------------------
  public function get_doners($program_id_fk){
     $this->db->select('*');
    $this->db->from('programs_to');
    $this->db->where("program_id_fk",$program_id_fk);
     $query = $this->db->get();
    
     $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->doner_name = $this->get_doner_name($row->donor_id);
            $i++;
        }
        return $query_result;
    }
    return false;
  }  
   //-----------------------------
public function get_doner_name($donor_id){
   
     $h = $this->db->get_where('donors_t', array("id"=>$donor_id));
      $data =$h->row_array();
      $total_name=$data["user_name"];
     /* ."(".$data["donor_mediator_name"].
                     $data["father_name"]." ".$data["grand_father_name"]." ".$data["family_name"]." )" */
      return $total_name;
}
//---------------------------------  

public function get_program_name($program_id_fk){
   
     $h = $this->db->get_where('programs_depart', array("id"=>$program_id_fk));
      $data =$h->row_array();
      $total_name=$data["program_name"];
      return $total_name;
}
//-------------------------------------------------
public function insert_programs_orphan(){
       $arr=explode("-",$this->input->post('member_id'));
      $data['member_id']=$arr[0];
      $data['mother_national_num_fk']=$arr[1];
    for($x = 0 ; $x < count($this->input->post('programs')) ; $x++){
        $id_program=$this->input->post('programs')[$x];
      $data['program_id_fk']=$id_program;
      $data['donor_id']=$this->input->post('doners_id'.$id_program);
    $data['date'] = strtotime(date("Y/m/d"));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_username'];
    $this->db->insert('programs_to_orphan',$data); 
    } 
}
//-------------------------------------------------
public function all_member_in(){
      $this->db->select('*');
        $this->db->from('programs_to_orphan');
         $this->db->group_by("member_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->member_id;
            }
            return $data;
        }
        return false;
}
//--------------------------------------------------
public function all_member_table(){
  $this->db->select('member_id');
    $this->db->from('programs_to_orphan');
   $this->db->group_by("member_id");
     $query = $this->db->get();
     $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->members_name = $this->get_member_name($row->member_id);
             $query_result[$i]->sub_members = $this->get_member_prog($row->member_id);
            $i++;
        }
        return $query_result;
    }
    return false;
}
//--------------------------------------------------------------
  public function get_member_prog($member_id){
     $this->db->select('*');
    $this->db->from('programs_to_orphan');
    $this->db->where("member_id",$member_id);
     $query = $this->db->get();
     $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->doner_name = $this->get_doner_name($row->donor_id);
             $query_result[$i]->program_name = $this->get_program_name($row->program_id_fk);
             $query_result[$i]->sub_doner = $this->get_doners($row->program_id_fk);
            $i++;
        }
        return $query_result;
    }
    return false;
  }  
  //---------------------------------  

public function get_member_name($member_id){
   
     $h = $this->db->get_where('f_members', array("id"=>$member_id));
      $data =$h->row_array();
      $total_name=$data["member_name"];
      return $total_name;
}
//-------------------------------------------------
    public function get_member_progr_in($member_id){
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $this->db->where("member_id",$member_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->program_id_fk;
            }
            return $data;
        }
        return false;
    }

//----------------------------------------------------------------


  public function family(/*$case */){
 $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name,mother.mother_national_num_fk');
      $this->db->from('basic'); 
      $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
     // $this->db->where("basic.suspend",$case);
      $this->db->group_by('basic.mother_national_num');
      $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {   foreach ($query->result() as $row) {
                 $data[] = $row;
                 }
            return $data;
            }
            else
            {
                return false;
            }
    
    
    
  }
  
  //-------------------------------------------------
  /** before 21-11-2017 
public function insert_Payment(){
       $arr=explode("/",$this->input->post('date'));
      $data['month']=$arr[0];
      $data['year']=$arr[2];
      $data['pay_method_id_fk']=$this->input->post('pay_method_id_fk');
      $data['donor_id']=$this->input->post('donor_id');
    $data['date'] = strtotime($this->input->post('date'));
    $data['date_s']=time();
    
      if($this->input->post('network')){
         $data['network']=$this->input->post('network'); 
    }else{
        
    }
    
     if($this->input->post('box_type')){
         $data['box_type']=$this->input->post('box_type'); 
    }else{
        
    }
      if($this->input->post('worth_date')){
         $data['worth_date']= strtotime($this->input->post('worth_date')); ; 
    }else{
        
    }
    
    $data['value']=$this->input->post('value');
    $data['value_added']=$this->input->post('value_added');
    $this->db->insert('participation_money',$data); 
        return $this->db->insert_id();
}
**/

public function insert_Payment(){
     // echo("<pre>");
    //  print_r($_POST);
    //  die;
   for($x=0 ;$x<$this->input->post('max') ;$x++){
        $data['pill_num']=$this->input->post('pill_num'); 
        $data['program_id_fk']=$this->input->post('program_id_fk'.$x.''); 
        $data['account_settings_id_fk']=$this->input->post('account_settings_id_fk'.$x.''); 
        $data['value']=$this->input->post('value'.$x.''); 
        
      $arr=explode("/",$this->input->post('date'));
      $data['month']=$arr[0];
      $data['year']=$arr[2];
      $data['pay_method_id_fk']=$this->input->post('pay_method_id_fk');
      $data['donor_id']=$this->input->post('donor_id');
      $data['date'] = strtotime($this->input->post('date'));
      $data['date_s']=time();
    
      if($this->input->post('network')){
         $data['network']=$this->input->post('network'); 
    }else{
        
    }
    
     if($this->input->post('box_type')){
         $data['box_type']=$this->input->post('box_type'); 
    }else{
        
    }
      if($this->input->post('worth_date')){
         $data['worth_date']= strtotime($this->input->post('worth_date')); ; 
    }else{
        
    }
         if($this->input->post('bank_id')){
         $data['bank_id']= strtotime($this->input->post('bank_id')); ; 
    }else{
        
    }
           if($this->input->post('acc_number')){
         $data['acc_number']= strtotime($this->input->post('acc_number')); ; 
    }else{
        
    }
    //$data['value']=$this->input->post('value');
    //$data['value_added']=$this->input->post('value_added');
     $this->db->insert('participation_money',$data); 
      
   }
  return $this->db->insert_id();
   
    
}



public function select_Payment(){
    
       $arr=explode("/",(date("Y/m/d")));
      $month=$arr[1];
      $year=$arr[0];

    //$this->db->insert('participation_money',$data); 
           $this->db->select('*');
        $this->db->from('participation_money');
        $this->db->where("month",$month);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
}

public function select_Payment_today(){
    
       $arr=explode("/",(date("Y/m/d")));
      $month=$arr[1];
      $year=$arr[0];

    //$this->db->insert('participation_money',$data); 
           $this->db->select('*');
        $this->db->from('cash_donations');
        $this->db->where("month",$month);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
}
/*
public function insert_Payment_for_orphan(){

        for($x=0;$x<count($_POST['values']);$x++){
         $arr=explode("-",$_POST['values'][$x]);  
       
         
         
          $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $this->db->where('member_id',$arr[1]);
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
              $arr2='';
            foreach ($query->result() as $row) {
               $arr2[]=$row->program_id_fk;
               
            }
             $data['programs']=serialize($arr2);
       
            }
        $data['orphans_id_fk']=$arr[1];
        $data['total']=$arr[0];
        
               $arr4=explode("/",(date("Y/m/d")));
      $month=$arr4[1];
      $year=$arr4[0];
     $data['month'] = $month;
      $data['year'] = $year;
        
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $data['last_payment_month'] = $month ;
        $this->db->insert('payment',$data);
         
         
    }
}
*/
    public function insert_Payment_for_orphan(){

        for($x=0;$x<count($_POST['values']);$x++){
            $arr_post=explode("-",$_POST['values'][$x]);
            //-------------------------------
              $this->db->select('*');
              $this->db->from('programs_to_orphan');
              $this->db->where('member_id',$arr_post[1]);
              $query = $this->db->get();
              $arr2=array();
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $arr2[]=$row->program_id_fk;
                }
                $data['programs']=serialize($arr2);
              }
            //-------------------------------
            $data['program_id_fk']=$arr_post[2];
            $data['account_settings_id_fk']=$arr_post[3];
            $data['orphans_id_fk']=$arr_post[1];
            $data['total']=$arr_post[0];
            $data['month'] =date("m",time());
            $data['year']=date("Y",time());
            $data['date'] = strtotime(date("Y/m/d"));
            $data['date_s']=time();
            $data['publisher']=$_SESSION['user_id'];
            $data['last_payment_month'] = date("m",time()) ;
            $this->db->insert('payment',$data);
        }
    }
    
//-----------------------------------------------------------------------------
    public function check_in_payment(){
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->group_by("orphans_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `payment` WHERE `orphans_id_fk`=' . $row->orphans_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->orphans_id_fk] = $arr;
            }
            return $data;
        }
        return false;

}// end 
//------------------------------------------------------------------------------

public function count_add_donations(){
    
     $this->db->select('*');
     $this->db->from('cash_donations');
      $query = $this->db->get();
          $tatal=0;
          if($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                $tatal +=$row->value;
              }
              return $tatal;
          }
    return 0;
}
//------------------------------------------------------------------------------

  public function count_payment(){
    $this->db->select('*');
     $this->db->from('payment');
      $query = $this->db->get();
          $tatal=0;
          if($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                $tatal +=$row->total;
              }
              return $tatal;
          }
    return 0;
    
    
  }
  
  
  /************************************************************************/
  
  public function all_data(){
    $this->db->select('*');
    $this->db->from('donors_t');
    $this->db->where("type",1);
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->programs = $this->get_program($row->id);
            $query_result[$i]->donations = $this->get_cash_donations($row->id);
            $i++;
        }
        return $query_result;
    }
    return false;
}
public function get_program($id){
    $this->db->select('*');
    $this->db->from('programs_to');
    $this->db->where("donor_id",$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[$row->id] = $row;
        }
        return $data;
    }
    return false;
}

public function get_cash_donations($id){
    $this->db->select('*');
    $this->db->from('cash_donations');
    $this->db->where("person_id",$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}
  
  /************/
  
  
  public function get_details_beetween_dates($from,$to,$id)
{
    $this->db->select('*');
    $this->db->from('programs_to_orphan');
    $this->db->where('date>=',$from);
    $this->db->where('date <= ',$to);
    if($id != 'all'){

        $this->db->where('member_id',$id);
    }else{
        $this->db->group_by('member_id');
    }
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->members_name = $this->get_name($row->member_id);
            $query_result[$i]->all = $this->get_by_member_id($row->member_id);
            $i++;
        }
        return $query_result;
    }
}



public function get_name($member_id){
    $h = $this->db->get_where('f_members', array('id'=>$member_id));
    return $h->row_array();
}



public function get_by_member_id($id){
    $this->db->select('*');
    $this->db->from('programs_to_orphan');
    $this->db->where("member_id",$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

      /**********************  8-11  **************************************************/

    public function select_donor($array_condition){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where($array_condition);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->programs = $this->get_program($row->id);
                $query_result[$i]->donations = $this->get_cash_donations($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
  
 
    //**************************************************************************
  public function get_orphans_non_participants()
{
    $this->db->select('*');
    $this->db->from('f_members');
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->programs = $this->get_programs_by_member_id($row->id);
            $i++;
        }
        return $query_result;
    }
}


public function get_programs_by_member_id($id){
    $this->db->select('*');
    $this->db->from('programs_to_orphan');
    $this->db->where("member_id",$id);
    $query = $this->db->get();
    return $query->num_rows();
}



public function select_father(){
    $this->db->select('*');
    $this->db->from('father');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[$row->mother_national_num_fk] = $row;
        }
        return $data;
    }
    return false;
}





public function get_donors_non_participants()
{
    $this->db->select('*');
    $this->db->from('donors_t');
    $this->db->where("type",1);
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->programs = $this->get_donor_programs_by_member_id($row->id);
            $i++;
        }
        return $query_result;
    }
}


public function get_donor_programs_by_member_id($id){
    $this->db->select('*');
    $this->db->from('programs_to');
    $this->db->where("donor_id",$id);
    $query = $this->db->get();
    return $query->num_rows();
}



public function select_by_paymethod($type){
    $this->db->select('*');
    $this->db->from('participation_money');
    $this->db->where("pay_method_id_fk",$type);
    $this->db->group_by("donor_id");
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->banks = $this->get_bank_name($row->bank_id);
            $query_result[$i]->all_money = $this->get_all_money($row->donor_id);
            $i++;
        }
        return $query_result;
    }
    return false;
}

public function get_bank_name($id){
    $h = $this->db->get_where('banks', array('id'=>$id));
    return $h->row_array();
}



public function get_all_money($id){
    $this->db->select('*');
    $this->db->from('participation_money');
    $this->db->where("donor_id",$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

  
/*****************/
    public function all_payments_on(){
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $parent = $this->db->get();
       if($parent->num_rows() > 0){
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->orphan_name = $this->get_names("persons_kids",array("id"=>$p_cat->member_id),"name");
            $categories[$i]->program_name = $this->get_names("programs_depart",array("id"=>$p_cat->program_id_fk),"program_name");
            $categories[$i]->donar_name = $this->get_names("sponsors",array("id"=>$p_cat->donor_id),"name");
            $categories[$i]->program_value = $this->get_prog_value($p_cat->program_id_fk);
            $i++;
        }
        return $categories;
        }
        return false ;
    }
    //-----------------------------------------------------------------
    public function get_names($table,$array_if,$fild_name){
        $h = $this->db->get_where($table,$array_if );
        $data=$h->row_array();
        return $data[$fild_name];
    }
    //----------------------------------------------------------------
    public function get_prog_value($programs_id){
        $h = $this->db->get_where("programs_depart",array("id"=>$programs_id) );
        return $h->row_array();
    }
    //--------------------------------------------------------
    public function payments_in(){
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where("month",date("m",time()));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->orphans_id_fk."-".$row->program_id_fk;
            }
            return $data;
        }
        return false;
    } 
  
   
  

}// end CLASS 