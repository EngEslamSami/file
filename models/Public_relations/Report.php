<?php
class Report extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    
    
        public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    public function get_sum($table, $field, $id, $sum){
        $this->db->select('SUM('.$sum.') AS summation');
        $this->db->from($table);
        $this->db->where($field,$id);
        $query = $this->db->get();
        $data = $query->result();
        return $data[0]->summation;
    }
    
    public function get_total($id){
        $this->db->select('*');
        $this->db->from('standard_recepies');
        $this->db->where('product_sub_code_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $z = 0;
            foreach ($query->result() as $row) {
                $data1[$z] = $row;
                $data1[$z]->production = $this->get_sum('production_system','product_main_code_fk',$row->product_main_code_fk,'product_main_amount');
                $z++;
            }
            $value = 0;
            for($z = 0 ; $z < count($data1) ; $z++){
                $value += ($data1[$z]->product_sub_amount * $data1[$z]->production);
            }
            return $value;
        }
    }
    
    public function products($z){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where(array('p_from_id_fk!='=>0,'p_type_fk'=>$z));
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $x = 0 ;
            foreach ($query->result() as $row){
                $data1[$x] = $row;
                $data1[$x]->supplies = $this->get_sum('supplies_items','product_code_fk',$row->id,'product_amount');
                $data1[$x]->exchange = $this->get_sum('exchange_items','product_code_fk',$row->id,'product_amount');
                if($z == 2)
                    $data1[$x]->production = $this->get_sum('production_system','product_main_code_fk',$row->id,'product_main_amount');
                if($z == 1)
                    $data1[$x]->production = $this->get_total($row->id);
                $x++;
            }
            return $data1;
        }
    }
    
    
     public  function record_count(){
        return $this->db->count_all("reports");

    }
    
    
    
        public  function  insert($file,$img){
        $data['title']=$this->input->post('title');
        if($file == ''){
            $data['file']  = 'null';
        }else{
            $data['file']  =  $file;
        }
        $data['img'] = $img;
        $data['details']=$this->input->post('details');
        $data['date']=strtotime($this->input->post('date'));
        $data['publisher'] = $_SESSION['user_id'];
        $data['date_s'] = time();
        $data['suspend'] = 1;


        $this->db->insert('reports',$data);
    }
    
    ///////////selecting data//////////////////
    public function select(){
        $this->db->select('*');
        $this->db->from('reports');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
        public function select_report(){
        $this->db->select('*');
        $this->db->from('reports');
        $this->db->order_by('id','DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
        /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('reports');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('reports', array('id'=>$id));
        return $h->row_array();
    }
    
    
    
    public function update($id,$file,$img){
        $data['title']=$this->input->post('title');
        $data['details']=$this->input->post('details');
        $data['date']=strtotime($this->input->post('date'));
        $data['publisher'] = $_SESSION['user_id'];
        $data['date_s'] = time();
        $data['suspend'] = 1;

        if($file !=''){
            $data['file']  =  $file;


        }
        if($img !=''){
            $data['img']  =  $img;


        }
        $this->db->where('id', $id);
        if($this->db->update('reports',$data)) {
            return true;
        }else{
            return false;
        }
    }

    /////////////////////// Suspend

    public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }

        $this->db->where('id', $id);
        if($this->db->update('reports',$update)) {
            return true;
        }else{
            return false;
        }
    }

    
    
    
    

}

