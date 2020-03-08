<?php


class Father extends CI_Model
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
    public  function  insert($national_mother)
    {
        $data['mother_national_num_fk']=$national_mother;
        $data['f_first_name']=$this->input->post('f_first_name');
        $data['f_father_name']=$this->input->post('f_father_name');
        $data['f_grandfather_name']=$this->input->post('f_grandfather_name');
        $data['f_nationality_id_fk']=$this->input->post('f_nationality_id_fk');
        $data['nationality_other']=$this->input->post('nationality_other');
        $data['f_national_id_type']=$this->input->post('f_national_id_type');
        $data['f_national_id']=$this->input->post('f_national_id');
        $data['f_national_id_place']=$this->input->post('f_national_id_place');
        $data['f_birth_date']=strtotime($this->input->post('f_birth_date'));
        $data['f_death_date']=strtotime($this->input->post('f_death_date'));
        $data['f_job']=$this->input->post('f_job');
        $data['f_job_place']=$this->input->post('f_job_place');
        $data['f_death_id_fk']=$this->input->post('f_death_id_fk');
        $data['f_death_reason_fk']=$this->input->post('f_death_reason_fk');
        $data['f_death_reason']=$this->input->post('f_death_reason');
        $data['f_child_num']=$this->input->post('f_child_num');
        $data['f_wive_count']=$this->input->post('f_wive_count');
        $data['f_family_name']=$this->input->post('f_family_name');
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

//---------------------------------------------------
    public function update($id){

        $data['f_first_name']=$this->chek_Null($this->input->post('f_first_name'));
        $data['f_father_name']=$this->chek_Null($this->input->post('f_father_name'));
        $data['f_grandfather_name']=$this->chek_Null($this->input->post('f_grandfather_name'));
        $data['f_nationality_id_fk']=$this->chek_Null($this->input->post('f_nationality_id_fk'));
                 $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['f_national_id_type']=$this->chek_Null($this->input->post('f_national_id_type'));
        $data['f_national_id']=$this->chek_Null($this->input->post('f_national_id'));
        $data['f_national_id_place']=$this->chek_Null($this->input->post('f_national_id_place'));
        $data['f_birth_date']=$this->chek_Null(strtotime($this->input->post('f_birth_date')));
        $data['f_death_date']=$this->chek_Null(strtotime($this->input->post('f_death_date')));
        $data['f_job']=$this->chek_Null($this->input->post('f_job'));
        $data['f_job_place']=$this->chek_Null($this->input->post('f_job_place'));
        $data['f_death_id_fk']=$this->chek_Null($this->input->post('f_death_id_fk'));
        $data['f_death_reason_fk']=$this->chek_Null($this->input->post('f_death_reason_fk'));
        $data['f_death_reason']=$this->chek_Null($this->input->post('f_death_reason'));
        $data['f_child_num']=$this->chek_Null($this->input->post('f_child_num'));
        $data['f_wive_count']=$this->chek_Null($this->input->post('f_wive_count'));
        $data['f_family_name']=$this->chek_Null($this->input->post('f_family_name'));

        $this->db->where('mother_national_num_fk', $id);
        if($this->db->update('father',$data)) {
            return true;
        }else{
            return false;
        }
    }
//---------------------------------------------------------------
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
 

    
}// END CLASS