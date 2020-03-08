<?php


class Abstinent extends CI_Model
{

    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert(){
 

        
            $data['name']=$this->chek_Null( $this->input->post('name'));
            $data['tele']=$this->chek_Null( $this->input->post('tele'));
            $data['status']=$this->chek_Null( $this->input->post('status'));
            $data['address']=$this->chek_Null( $this->input->post('address'));
            $data['approved']=0;
            $data['date'] = strtotime(date("Y-m-d"));
            $data['date_s'] = time();
            $data['date_ar'] = (date("Y-m-d"));
           $this->db->insert('abstinent',$data);
    }
        public function update($id){
        $update = array(
            'name'=>$this->input->post('name'),
            'tele'=>$this->input->post('tele'),
            'status'=>$this->input->post('status'),
            'address'=>$this->input->post('address')
              );
        
        $this->db->where('id', $id);
        if($this->db->update('abstinent',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
        public function select(){
        $this->db->select('*');
        $this->db->from('abstinent');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
     public function getById($id){
        $h = $this->db->get_where('abstinent', array('id'=>$id));
        return $h->row_array();
    }
    

    //=======================================================
    public function select_abstinent($where,$approve){
        $this->db->select('*');
        $this->db->from('abstinent');
        $this->db->where('type',$where);
        $this->db->where('approved',$approve);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    

    public function approve($id){
        $data['approved']= 1;
        $this->db->where('id', $id);
        if($this->db->update('abstinent',$data)) {
            return true;
        }else{
            return false;
        }
    }

    public function refuse($id){
        $update['approved']= 2;
        $this->db->where('id', $id);
        if($this->db->update('abstinent',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
      public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('abstinent');
    }
       public function select_abstinent_approved($approve){
        $this->db->select('*');
        $this->db->from('abstinent');
        $this->db->where('approved',$approve);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}