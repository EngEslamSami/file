<?php
class Contact_model extends CI_Model
{
    public function insert_contact(){
        $data['name']= $this->input->post('name') ;
        $data['email']= $this->input->post('email') ;
        $data['phone']= $this->input->post('phone') ;
        $data['address']= $this->input->post('address') ;
        $data['message']= $this->input->post('message') ;
        $this->db->insert('pr_contact_us',$data);
    }
    public function display_contact(){
        $this->db->select('*');
        $this->db->from('pr_contact_us');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }
    public function delete_contact($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_contact_us');
    }
    public function update_message($id){
        $this->db->where('id',$id);
        $data['seen'] =1;

        $this->db->update('pr_contact_us',$data);
    }
}