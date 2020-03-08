<?php
class Add_society_system_model extends CI_Model
{
    public function display_departments(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows () > 0){
            $data= $query->result();

            return $data;
        }

    }
    
    public function display_system(){
        $this->db->select('*');
        $this->db->from('system_society_dep_relationship');
        $this->db->where('system_dep_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $data = $query->result();
            return $data;
        }
        
    }
    public function display_updated_system(){
        $this->db->select('*');
        $this->db->from('system_society_dep_relationship');
        $this->db->where('system_dep_fk !=',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->name = $this->display_dep_system($row->system_dep_fk);

                $i++;

            }
            return $data;
        }

    }


   
    public function update_dep_sys(){
        $this->db->select('*');
        $this->db->from('system_society_dep_relationship');
        $this->db->where('from_id_fk !=',0);
        $this->db->join('department_jobs',
            'department_jobs.id = system_society_dep_relationship.system_dep_fk ');
        $query = $this->db->get();
        if ($query->num_rows() > 0){

            $data = $query->result();
            return $data;
        }
    }
    public function display_dep_system($id){
        $this->db->select('name');
       $this->db->from('department_jobs');
       $this->db->where('from_id_fk',0);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0){

          $data = $query->row_array()['name'];
            return $data;
        }

    }


    // update

    public function update_sys(){
        $id = $this->input->post('society_dep_name');
        $data['system_dep_fk']=$this->input->post('name');
        $this->db->where('id',$id);
        $this->db->update('system_society_dep_relationship',$data);

    }



    public function set_sys($id){
      
        $data = array(
                    'system_dep_fk' => '0'
        );
        $this->db->where('id',$id);
        $this->db->update('system_society_dep_relationship',$data);

    }



}