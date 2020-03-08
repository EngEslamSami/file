<?php
class Secretary_model extends CI_Model
{
 public function insert()
 {
     $data['name']=$this->input->post('main_dest');
     $data['mob']=$this->input->post('phone');
     $data['email']=$this->input->post('email');
   
     $data['fax']=$this->input->post('fax');
     $data['type_id_fk']=1;
     $data['address']=$this->input->post('adress');
     $this->db->insert('office_setting',$data);
     
     
   
 }
 
 public function get_all_main_dest($id) {
     
   $this->db->where('type_id_fk',$id);
   return $this->db->get('office_setting')->result();
     
 }
 public function delete($id)
 {
     
    $this->db->where('id',$id);
    $this->db->delete('office_setting');

}
public function update($data)
{
     $id=$this->uri->segment(4);
    
  
   $this->db->where('id',$id);
    $this->db->update('office_setting',$data);

}
public function get_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('office_setting')->row();

}
public function add() {
    $data['name']=$this->input->post('main_trait');
     $data['mob']=0;
     $data['email']=0;
   
     $data['fax']=0;
     $data['type_id_fk']=2;
     $data['address']=0;
     $this->db->insert('office_setting',$data);
}
public function get_all_main_trait() {
   $this->db->where('form_id',0);
   //$this->db->where('type_id_fk',2);
   return $this->db->get('office_setting')->result();
     
 }
 public function add_branch() {
     $data['form_id']=$this->input->post('main_trait');
     $data['name']=$this->input->post('branch_trait');
     $data['mob']=0;
     $data['email']=0;
   
     $data['fax']=0;
     $data['type_id_fk']=2;
     $data['address']=0;
      $this->db->insert('office_setting',$data);
     
     
 }
 public function get_all_branch() {
     $this->db->where('form_id',0);
     $this->db->where('type_id_fk',2);
   $query=$this->db->get('office_setting')->result();
    
    
     $data=array();
     $x=0;
     //S$this->db->where('from_id',0)
   foreach($query as $row){
     $data[$x]=$row;  
     $data[$x]->branch=$this->get_by_from_id($row->id);
     $x++;
     
   }
   return $data;
  
   
   
     
 }
 public function get_by_from_id($id) {
     
    $this->db->where('form_id',$id);
   
   return $this->db->get('office_setting')->result();
 }
}
