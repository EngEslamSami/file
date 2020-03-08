
<?php
class Setting_model extends CI_Model
{
    
    public function add($type)
	{
	   
      
	
		$data['title']= $this->input->post('title');
		if($type==1){
        $this->db->insert('medical_company',$data);
      }
      if($type==2){
        $this->db->insert('medical_devices',$data);
      }
      if($type==3){
        $this->db->insert('scientific_qualification',$data);
      }
      if($type==4){
        $this->db->insert('disabilities_type_settings',$data);
      }
		if($type==5){
        $this->db->insert('relative_relation',$data);
      }
      if($type==6){
        $this->db->insert('house_allowance',$data);
      }
		if($type==7){
        $this->db->insert('nationality_settings',$data);
      }
        
	
	}
    public function get_all_data(){
     $data['company']=$this->db->get('medical_company')->result();  
      $data['device']=$this->db->get('medical_devices')->result();  
      
       $data['science']=$this->db->get('scientific_qualification')->result();  
      
       $data['disability']=$this->db->get('disabilities_type_settings')->result();  
       $data['relation']=$this->db->get('relative_relation')->result();  
       $data['house']=$this->db->get('house_allowance')->result();  
       $data['nationality']=$this->db->get('nationality_settings')->result(); 
      return $data;
      
    }
    
    public function update($type,$id)
	{
      $data['title']= $this->input->post('title');
      $this->db->where('id',$id);
		if($type==1){
        $this->db->update('medical_company',$data);
      }
      if($type==2){
        $this->db->update('medical_devices',$data);
      }
      if($type==3){
        $this->db->update('scientific_qualification',$data);
      }
      if($type==4){
        $this->db->update('disabilities_type_settings',$data);
      }
	if($type==5){
        $this->db->update('relative_relation',$data);
      }
      if($type==6){
        $this->db->update('house_allowance',$data);
      }
      if($type==7){
        $this->db->update('nationality_settings',$data);
      }
	}
    public function getById($id,$type)
	{
	   if($type==1){
		return $this->db->get_where('medical_company', array('id'=>$id))
						->row_array();
                        }
                        if($type==2){
		return $this->db->get_where('medical_devices', array('id'=>$id))
						->row_array();
                        }
                        if($type==3){
		return $this->db->get_where('scientific_qualification', array('id'=>$id))
						->row_array();
                        }
                        if($type==4){
		return $this->db->get_where('disabilities_type_settings', array('id'=>$id))
						->row_array();
                        }
                        if($type==5){
		return $this->db->get_where('relative_relation', array('id'=>$id))
						->row_array();
                        }
                        if($type==6){
		return $this->db->get_where('house_allowance', array('id'=>$id))
						->row_array();
                        }
                        if($type==7){
		return $this->db->get_where('nationality_settings', array('id'=>$id))
						->row_array();
                        }
                       
	}
    public function delete($type,$id)
	{
	    if($type==1){
		$this->db->where('id', $id)
      			 ->delete('medical_company');
                 }
                 if($type==2){
		$this->db->where('id', $id)
      			 ->delete('medical_devices');
                 }
                 if($type==3){
		$this->db->where('id', $id)
      			 ->delete('scientific_qualification');
                 }
                 if($type==4){
		$this->db->where('id', $id)
      			 ->delete('disabilities_type_settings');
                 }
                 if($type==5){
		$this->db->where('id', $id)
      			 ->delete('relative_relation');
                 }
                 if($type==6){
		$this->db->where('id', $id)
      			 ->delete('house_allowance');
                 }
                 if($type==7){
		$this->db->where('id', $id)
      			 ->delete('nationality_settings');
                 }
	}

    
    }
    ?>