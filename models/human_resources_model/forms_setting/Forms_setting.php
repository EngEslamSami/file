<?php
class Forms_setting extends CI_Model
{


    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //=================================================================================
	
	
    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('hr_forms_settings');
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

    public function add_form_settings($type)
    {
        $data['title_setting']= $this->chek_Null($this->input->post('title_setting'));
        $data['type']= $type;
        $data['type_name']= $this->chek_Null($this->input->post('type_name'));
        $data['in_order']= $this->input->post('in_order');
           $data['max_degree']= $this->chek_Null($this->input->post('max_degree'));
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert('hr_forms_settings',$data);
    }
    public function get_all_data_form_settings($arr_all){
   if( ! empty($arr_all)){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_form_settings($key);

        }

        return $data;
   }else{
       return 0;
   }
    }
    public function  get_type_form_settings($type)
    {
        $this->db->select('*');
        $this->db->from('hr_forms_settings');
        $this->db->where("type", $type);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_form_settings($id)
    {
        $data['in_order']= $this->chek_Null($this->input->post('in_order'));
        $data['title_setting']= $this->chek_Null($this->input->post('title_setting'));
               $data['max_degree']= $this->chek_Null($this->input->post('max_degree'));
        $this->db->where('id_setting',$id);
        $this->db->update('hr_forms_settings',$data);
    }
    public function getById_form_settings($id)
    {
        return $this->db->get_where('hr_forms_settings', array('id_setting'=>$id))->row_array();
    }
    public function delete_form_settings($id)
    {
        $this->db->where('id_setting', $id)->delete('hr_forms_settings');
    }

    //===================================================================================

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
    /*
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
}
