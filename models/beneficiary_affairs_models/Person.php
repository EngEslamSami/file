<?php
class Person extends CI_Model{

    public function __construct()

    {

        parent:: __construct();

    }


//-----------------------------------
public function select_data(){

        $this->db->select('*');

        $this->db->from('persons_files');

        $this->db->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[$row->id] = $row;

            }

            return $data;

        }

        return false;

    } 
     public  function  insert(){
        $data['file_name'] = $this->input->post('file_num');
        $data['name'] = $this->input->post('name');
        $data['father_status'] = $this->input->post('father_status');
        $data['card_id'] = $this->input->post('card_id'); 
        $data['card_type'] = $this->input->post('card_type'); 
        $data['birth_date'] = $this->input->post('birth_date');
        $data['group'] = $this->input->post('group');  
        $data['tele'] = $this->input->post('tele');
        $data['mob'] = $this->input->post('mob');
        $data['nationality_id_fk'] = $this->input->post('nationality_id_fk'); 
        $data['house_type'] = $this->input->post('house_type');
        $data['house_place'] = $this->input->post('house_palce');
        $data['health_type'] = $this->input->post('healthy_type'); 
        $data['job'] = $this->input->post('job'); 
        $data['education_level'] = $this->input->post('education_level'); 
        $data['sarf_type'] = $this->input->post('sarf_type');  
        $data['notes'] = $this->input->post('notes');  
        $total = $this->input->post('total'); 
        $this->db->insert('persons_files',$data);
        
        $this->db->select('*');
        $this->db->from('persons_files');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $query = $query->result_array();
        
        if($total > 1)
        {
            for($z = 0 ; $z < ($total) ; $z++)
            {
                $dd['file_num_id_fk'] = $query[0]['id'];
                $dd['name'] = ($this->input->post('f_name'.$z.''))?$this->input->post('f_name'.$z.''):0;
                $dd['birth_date'] = ($this->input->post('f_birth_date'.$z.''))?strtotime($this->input->post('f_birth_date'.$z.'')):0;
                $dd['type'] = ($this->input->post('f_type'.$z.''))?$this->input->post('f_type'.$z.''):0;
                $dd['education_level'] = ($this->input->post('f_education'.$z.''))?$this->input->post('f_education'.$z.''):0;  
                $dd['age'] = ($this->input->post('age'.$z.''))?$this->input->post('age'.$z.''):0;
                $this->db->insert('persons_kids',$dd);
            }
        }
      

    }
    
    
   public function getById($id){
        $h1 = $this->db->get_where('persons_files', array('id'=>$id));
        $h2 = $this->db->get_where('persons_kids', array('file_num_id_fk'=>$id));
        return array($h1->row_array(),$h2->result());
   } 
  public function update($id){
        $data['file_name'] = $this->input->post('file_num');
        $data['name'] = $this->input->post('name');
        $data['father_status'] = $this->input->post('father_status');
        $data['card_id'] = $this->input->post('card_id'); 
        $data['card_type'] = $this->input->post('card_type'); 
        $data['birth_date'] =$this->input->post('birth_date');
        $data['group'] = $this->input->post('group');  
        $data['tele'] = $this->input->post('tele');
        $data['mob'] = $this->input->post('mob');
        $data['nationality_id_fk'] = $this->input->post('nationality_id_fk'); 
        $data['house_type'] = $this->input->post('house_type');
        $data['house_place'] = $this->input->post('house_palce');
        $data['health_type'] = $this->input->post('healthy_type'); 
        $data['job'] = $this->input->post('job'); 
        $data['education_level'] = $this->input->post('education_level'); 
        $data['sarf_type'] = $this->input->post('sarf_type');  
        $data['notes'] = $this->input->post('notes');  
        $total = $this->input->post('total'); 
                
        $this->db->where('id', $id);
        $this->db->update('persons_files',$data);
        
        if($total > 1)
        {
            $this->db->where('file_num_id_fk',$id);
            $this->db->delete('persons_kids');
        
            for($z = 0 ; $z < ($total) ; $z++)
            {
                $dd['file_num_id_fk'] = $id;
                $dd['name'] = ($this->input->post('f_name'.$z.''))?$this->input->post('f_name'.$z.''):0;
                $dd['birth_date'] = ($this->input->post('f_birth_date'.$z.''))?strtotime($this->input->post('f_birth_date'.$z.'')):0;
                $dd['type'] = ($this->input->post('f_type'.$z.''))?$this->input->post('f_type'.$z.''):0;
                $dd['education_level'] = ($this->input->post('f_education'.$z.''))?$this->input->post('f_education'.$z.''):0;  
                $dd['age'] = ($this->input->post('age'.$z.''))?$this->input->post('age'.$z.''):0;
                $this->db->insert('persons_kids',$dd);
            }
        }
       ////////////////////////////////////////////////
        if($total == 1)
        {
            $this->db->where('file_num_id_fk',$id);
            $this->db->delete('persons_kids');
        }
        
        
      
        //}
    }

/////delete/////


    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('persons_files');
        
        $this->db->where('file_num_id_fk',$id);
        $this->db->delete('persons_kids');
        

    }
    
 

 

 
 




  

 }//end class

       

       



?>