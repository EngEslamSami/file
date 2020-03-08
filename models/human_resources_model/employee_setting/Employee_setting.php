<?php
class Employee_setting extends CI_Model
{


    //=================================================================================
	
	
    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id_setting]["title"]= $row->title_setting;
                $data[$row->id_setting]['in_order'] =  $row->in_order;
            }
            return $data;
        }
        return false;
    }

    public function add_emp_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
        $data['in_order']= $this->input->post('in_order');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert('employees_settings',$data);
    }
    public function get_all_data_emp_settings($arr_all){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_emp_settings($key);

        }

        return $data;
    }
    public function  get_type_emp_settings($type)
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where("type", $type);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_emp_settings($id)
    {
        $data['in_order']= $this->input->post('in_order');
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update('employees_settings',$data);
    }
    public function getById_emp_settings($id)
    {
        return $this->db->get_where('employees_settings', array('id_setting'=>$id))->row_array();
    }
    public function delete_emp_settings($id)
    {
        $this->db->where('id_setting', $id)->delete('employees_settings');
    }

    //===================================================================================
    
        public function add_area($type)
    {
        if($type == 'tab_areas'){
            $data['from_id_fk'] = 0;
        } else if($this->input->post('from_id_fk')){
            $data['from_id_fk'] =$this->input->post('from_id_fk');
        }else {
            $data['from_id_fk']= $type;
        }
        $data['name']= $this->input->post('name');
        $data['in_order']= $this->input->post('in_order');
        $this->db->insert("cities",$data);
    }


    public function update_area($id,$type)
    {
        if($this->input->post('from_id_fk')){
            $type =$this->input->post('from_id_fk');
        }
        $data['from_id_fk']= $type;
        $data['name']= $this->input->post('name');
        $data['in_order']= $this->input->post('in_order');
        $this->db->where('id',$id);

        $this->db->update("cities",$data);
    }


    public function select_areas(){
        $this->db->where('from_id_fk',0);
        $this->db->order_by("in_order", "asc");
        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;

            }
            return $data;
        }
        return false;
    }

    public function select_residentials(){
        $this->db->where('from_id_fk !=',0);

        $this->db->order_by("in_order", "asc");

        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function deleteAreas($id){
        $this->db->where('id',$id);
        $this->db->delete('cities');
    }

    public function getAreas($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->row_array() ;
        }
        return false;

    }


    public function getAhai($id){
        $this->db->where('from_id_fk',$id);
        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;

    }
/*************************************************************/    
    
    public function select_allCategories(){
        
        $this->db->order_by("in_order", "asc");
        $query =  $this->db->get("hr_main_cat");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[] = $key;
            }
            return $data;
        }
        return false;
    }


    public function getByIdCategories($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("hr_main_cat");
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;

    }

    public function insertCategories()
    {
        $data['in_order']= $this->input->post('in_order');
        $data['name']= $this->input->post('name');
        $data['max_degree']= $this->input->post('max_degree');
        $this->db->insert("hr_main_cat",$data);
    }


    public function updateCategories($id)
    {
        $this->db->where('id',$id);
        $data['in_order']= $this->input->post('in_order');
        $data['name']= $this->input->post('name');
        $data['max_degree']= $this->input->post('max_degree');

        $this->db->update("hr_main_cat",$data);
    }
    
    
/*************************************************************/  


	
    public function select_all_areas(){
        $this->db->where('from_id_fk!=',0);
        $this->db->order_by("in_order", "asc");
        $query =  $this->db->get("cities")->result();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                
                $query[$key]->city_name = $this->get_city($value->from_id_fk)->name;
                $query[$key]->city_id = $this->get_city($value->from_id_fk)->id;
               
            }
            return $query;
        }
    }
    public function get_city($id)
    {
        $this->db->where('id =',$id);

        $this->db->order_by("in_order", "asc");

        $query =  $this->db->get("cities");
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

  
}
