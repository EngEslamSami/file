<?php

class Department_jobs extends CI_Model
 {
    public function __construct(){
        parent:: __construct();
    }
    
    public  function record_count($table, $array){
        $this->db->where($array);
        return $this->db->count_all_results($table);
    }
    
    public  function dashbord_tables($table, $array){
        $this->db->select('*');
        $this->db->from(''.$table.'');
        $this->db->order_by('id','DESC');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

/***************************************************/
    public  function insert_main(){
        $data['name']=$this->input->post('name');
        $data['status'] = 0;
        $data['from_id_fk'] = 0;
      
        $this->db->insert('department_jobs',$data);
    }
    
    
    
    public function update_main($id){
        $update = array(
            'name'=>$this->input->post('name'),
        );
        
        $this->db->where('id', $id);
        if($this->db->update('department_jobs',$update)) {
            return true;
        }else{
            return false;
        }
    }



    public  function insert_sub(){
        
        

         $data['from_id_fk']=$this->input->post('p_from_id_fk');
        $data['name']=$this->input->post('name');
        $data['status']=1;
      
        
        $this->db->insert('department_jobs',$data);
    }
    
        public function update_sub($id){
        $update = array(
            'name'=>$this->input->post('name') ,
            'from_id_fk'=>$this->input->post('p_from_id_fk') ,
     
        );
        
        $this->db->where('id', $id);
        if($this->db->update('department_jobs',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    
/*********************************************************/    

    public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
       public function select_search_key_2($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key ,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } 
    
    

       public function select($type,$main){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->order_by('id','DESC');
        if($main == '')
            $this->db->where('status',$type);
        elseif($main != '' && $main != 'all')
            $this->db->where('from_id_fk',$main);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($type == 0 || $main != '')
                    $data[$row->id] = $row;
                elseif($type == 1 && $main == '')
                    $data[$row->from_id_fk][] = $row;
                elseif($type == 1 && $main == 'all')
                    $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    } 


       public function select_2($type,$main){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->order_by('id','DESC');
        if($main == ''){
            $this->db->where('status',$type);}
        elseif($main != '' && $main != 'all')
            $this->db->where('from_id_fk !=',$main);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($type == 0 || $main != '')
                    $data[$row->id] = $row;
                elseif($type == 1 && $main == '')
                    $data[$row->from_id_fk][] = $row;
                elseif($type == 1 && $main == 'all')
                    $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    } 


    public function dep_in()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("status",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->from_id_fk;
            }
            return $data;
        }
        return false;
    }



    public function delete($id,$status){
        if($status == 0){
            $array = array('id'=>$id);
            $this->db->where($array);
            $this->db->delete('department_jobs');
            
       
            }
            $this->db->where('id',$id);
            $this->db->delete('department_jobs');
    }
    
    

    

    
    public function getById($id){
        $h = $this->db->get_where('department_jobs', array('id'=>$id));
        return $h->row_array();
    }
    




    


    
   

 }