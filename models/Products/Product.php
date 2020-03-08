<?php
class Product extends CI_Model
{


    public function select_all(){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();

    }


    public function select_all_except($id){
        
        $this->db->where("id !=", $id);
        $query = $this->db->get('products');
        return $query->result();

    }
    //---------------------------------------------------------
public function select_all__(){   
    $this->db->select("*");
    $this->db->from('products');
    $this->db->where('from_id',0);
    $query = $this->db->get();
      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                    $data[$row->id] = $row;
                     $query2 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row->id);
                  if ($query->num_rows() > 0) {
                   foreach ($query2->result() as $row2) {
                   $data[$row2->id] = $row2;
                   $query3 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row2->id);
                           if ($query3->num_rows() > 0) {
                               
                                foreach ($query3->result() as $row3) {
                                     $data[$row3->id] = $row3;
                                     $query4 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row3->id);
                                           if ($query4->num_rows() > 0) {
                                              foreach ($query4->result() as $row4) {
                                              $data[$row4->id] = $row4;
                                              $query5 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row4->id);
                                                      if ($query5->num_rows() > 0) {
                                                      foreach ($query5->result() as $row5) {
                                                     
                                                     $data[$row5->id] = $row5;
                                                     }}
                                            
                                     
                                     }}
                                     
                                }
                            }        
                         
                          }
                  
                         }
                
            }
            return $data;
        }
    
}



    //------------------------Tree-------------------------------------------


    public function index()
    {
        $parent_key=0;
        $data = [];

        $row = $this->db->query('SELECT *  from products WHERE from_id ="'.$parent_key.'"');

        if($row->num_rows() > 0)
        {
            $data = $this->members_tree($parent_key);
        }


        return $data;

    }

    public function members_tree($parent_key)
    {
        $row1 = [];
        $row = $this->db->query('SELECT *  from products WHERE from_id ="'.$parent_key.'"')->result_array();
        foreach($row as $key => $value)
        {
            $id = $value['id'];
            $row1[$key]['id'] = $value['id'];
            $row1[$key]['from_id'] = $value['from_id'];
            $row1[$key]['code'] = $value['code'];
            $row1[$key]['name'] = $value['name'];
            $row1[$key]['level'] = $value['level'];
            $row1[$key]['count'] = count($this->members_tree($value['id']));
            $row1[$key]['nodes'] = array_values($this->members_tree($value['id']));
        }
        return $row1;
    }
//-------------------------------------------------------------------

 public function add_product_(){
    
    $data = [
        'from_id'=>$this->input->post('from_id'),
        'level'=>$this->input->post('product_type'),
        'name'=>$this->input->post('product_name')
        ];
    
    
    $this->db->insert('products',$data);
 }



    public function add_product(){

        $data = [
            'from_id'=>$this->input->post('fromm_id'),
            'code'=>$this->input->post('code'),
            'level'=>$this->input->post('level'),
            'name'=>$this->input->post('product_name')
        ];
        //var_dump($data);

        $this->db->insert('products',$data);
        return ($this->db->insert_id())? $this->db->insert_id() : false;
    }


    public function update_product($id){
        $data = [
            'from_id'=>$this->input->post('fromm_id'),
            'code'=>$this->input->post('code'),
            'level'=>$this->input->post('level'),
            'name'=>$this->input->post('product_name')
        ];

        $this->db->where('id',$id);
        $this->db->update('products',$data);
    }
    
    
    
    

//------------------------------------------------------------------
    public  function get_by_code($code){
        $h = $this->db->get_where('products', array('code'=>$code));
        return $h->row_array();
    }
//------------------------------------------------------------------
    public function get_last($from_id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('from_id',$from_id);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->code;
            }
            return $data;
        }
        return false;
    }


    public function get_productById($id){
        $this->db->where('id',$id);
        $query =  $this->db->get('products');
        return $query->row();
    }
    
    
    
    

    public function delete_product($id){
        $this->db->where('id',$id);
       return $this->db->delete('products');
    }



//-------------------------------------------------------------------




}