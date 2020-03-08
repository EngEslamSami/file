<?php


class Father_web extends CI_Model
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

    
        public  function  insert($national_mother)
        {
        $data['mother_national_num_fk']=$national_mother;
        $data['full_name']=$this->chek_Null($this->input->post('full_name'));
        $data['f_nationality_id_fk']=$this->chek_Null($this->input->post('f_nationality_id_fk'));
        $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['f_national_id_type']=$this->chek_Null($this->input->post('f_national_id_type'));
        $data['f_national_id']=$this->chek_Null($this->input->post('f_national_id'));
       // $data['f_birth_date']=strtotime($this->input->post('f_birth_date'));
        $data['f_death_date']=$this->chek_Null($this->input->post('f_death_date'));
        $data['f_job']=$this->chek_Null($this->input->post('f_job'));
        $data['f_job_place']=$this->chek_Null($this->input->post('f_job_place'));
        $data['f_death_id_fk']=$this->chek_Null($this->input->post('f_death_id_fk'));
        $data['f_death_reason']=$this->chek_Null($this->input->post('f_death_reason'));
        $data['f_child_num']=$this->chek_Null($this->input->post('male_number'));
        $data['f_wive_count']=$this->chek_Null($this->input->post('f_wive_count'));
        $data['f_death_reason_fk']=$this->chek_Null($this->input->post('f_death_reason_fk'));
		      $data['f_female_num']=$this->chek_Null($this->input->post('female_number'));
        /**********ahmed*/
        $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
        $gregorian_date=implode('/',$gregorian_date_arr);
        $data['f_birth_date']=$gregorian_date;
        $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
        $hijri_date=implode('/',$hijri_date_arr);
        $data['f_birth_date_hijri']=$hijri_date;
        $data['f_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
        $data['f_birth_date_hijri_year']=$this->chek_Null( $this->input->post('HYear'));
        $data['family_members_number']=$this->chek_Null( $this->input->post('family_members_number'));
        $data['f_card_source']=$this->chek_Null( $this->input->post('f_card_source'));

        
     
        if($this->get_mother_national($national_mother)>0){
            $this->db->where('mother_national_num_fk',$national_mother);
            $this->db->update('father',$data);
        }else {
            $this->db->insert('father',$data);
        }

    }
//--------------------------------------------------
    public function get_mother_national($national_mother)
    {
        $this->db->where('mother_national_num_fk',$national_mother);
        $query=$this->db->get('father');
        return $query->num_rows();
    }
//--------------------------------------------------
 public function getById($id){
        $h = $this->db->get_where('father', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }


public function get_by_id($id)
{
$this->db->where('id',$id);
return $this->db->get('father')->row();	
}
  public function select_data_basic(){
        $this->db->select('*');
        $this->db->from('father');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } 
 
    public function get_by_mother($id,$table)
    {
        $this->db->where('mother_national_num_fk',$id);
        return $this->db->get($table)->row();

    }
    public function get_by_mother2($id,$table)
    {
        $this->db->where('mother_national_num_fk',$id);
        return $this->db->get($table)->row_array();

    }

    
}// END CLASS