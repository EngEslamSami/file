<?php

class Money_web extends CI_Model
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
//---------------------------------------------------

    //---------------------------------------------------
    public  function  insert($num)
    {
        if (!empty($this->input->post('income_max'))){
             for ($a=0;$a<$this->input->post('income_max');$a++){
                 if(!empty($this->input->post('value_income'.$a))&&$this->input->post('affect_income'.$a) !=''){
                 $data['mother_national_num_fk']=$this->chek_Null($num);
                 $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_income'.$a));
                 $data['value']=$this->chek_Null($this->input->post('value_income'.$a));
                 $data['affect']=$this->chek_Null($this->input->post('affect_income'.$a));
                 $data['type']=1;
                 $this->db->insert('family_income_duties',$data);
                 }
             }
        }
        if (!empty($this->input->post('duty_max'))){
            for ($a=0;$a<$this->input->post('duty_max');$a++){
                if(!empty($this->input->post('value_duty'.$a))&& $this->input->post('affect_duty'.$a) !='') {
                    $data['mother_national_num_fk']=$this->chek_Null($num);
                    $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_duty'.$a));
                    $data['value'] = $this->chek_Null($this->input->post('value_duty' . $a));
                    $data['affect'] = $this->chek_Null($this->input->post('affect_duty' . $a));
                    $data['type'] = 2;
                    $this->db->insert('family_income_duties', $data);
                }
            }
        }
    }
    
    
      public function getArray($num)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where("mother_national_num_fk",$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->finance_income_type_id] = $row;
            }
            return $data;
        }else{
            return 0;
        }

    }




//----------------------------------------------------------
   public function getById($id){
        $h = $this->db->get_where('family_income_duties', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }


    
     public function update($num){
        
            $this->db->where('mother_national_num_fk',$num);
            $this->db->delete("family_income_duties");

        if (!empty($this->input->post('income_max'))){
            for ($a=0;$a<$this->input->post('income_max');$a++){
                if(!empty($this->input->post('value_income'.$a))&&$this->input->post('affect_income'.$a) !=''){
                    $data['mother_national_num_fk']=$this->chek_Null($num);
                    $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_income'.$a));
                    $data['value']=$this->chek_Null($this->input->post('value_income'.$a));
                    $data['affect']=$this->chek_Null($this->input->post('affect_income'.$a));
                    $data['type']=1;
                    $this->db->where('mother_national_num_fk', $num);
                    $this->db->insert('family_income_duties',$data);
                }
            }
        }
        if (!empty($this->input->post('duty_max'))){
            for ($a=0;$a<$this->input->post('duty_max');$a++){
                if(!empty($this->input->post('value_duty'.$a))&& $this->input->post('affect_duty'.$a) !='') {
                    $data['mother_national_num_fk']=$this->chek_Null($num);
                    $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_duty'.$a));
                    $data['value'] = $this->chek_Null($this->input->post('value_duty' . $a));
                    $data['affect'] = $this->chek_Null($this->input->post('affect_duty' . $a));
                    $data['type'] = 2;
                    $this->db->insert('family_income_duties',$data);
                }
            }
        }

    }
    
    
     public function select_bank(){
        $this->db->select('*');
        $this->db->from('banks_settings');
        $this->db->order_by('id','DESC');
        //$this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

public function select_mother_name($national_id)
	{
		 $sql = $this->db->where('mother_national_num_fk',$national_id)->get('mother')->row_array();
         return $sql['full_name'];
	}


}// END CLASS 