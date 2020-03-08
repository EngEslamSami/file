<?php
class Finance_resource_setting extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->table = "fr_settings";
    }

    //=================================================================================


    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id_setting]["title"]= $row->title_setting;
               
            }
            return $data;
        }
        return false;
    }

    public function add_fr_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');

        $this->db->insert($this->table,$data);
    }

    public function get_all_data_fr_settings($arr_all){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_fr_settings($key);

        }

        return $data;
    }
    public function  get_type_fr_settings($type)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("type", $type);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_fr_settings($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update($this->table,$data);
    }
    
    
    
    public function getById_fr_settings($id)
    {
        return $this->db->get_where($this->table, array('id_setting'=>$id))->row_array();
    }
    
    
    public function delete_fr_settings($id)
    {
        $this->db->where('id_setting', $id)->delete($this->table);
    }


    //===================================================================================

    public function add_kfr_settings($table)
    {
        if($this->input->post('tasnef')){
            $tasnef = $this->input->post('tasnef');
            foreach ($tasnef as $row){
                $data[$row] = 1;
            }
        }
        if($this->input->post('type_k')){
           $k =  $this->input->post('type_k');
           if($k == 1){
               $data['type'] = 1;
               $data['type_name'] = 'حالات الكفالات ';
           } elseif($k == 2){
               $data['type'] = 2;
               $data['type_name'] = 'حالات الكافل ';
           }
        }

        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
         $data['kafala_value']= $this->input->post('kafala_value');
        

        $this->db->insert($table,$data);
    }

    public function all_frk_settings($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        //$this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
    }

    public function all_frhk_settings($table,$typee_k)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("type", $typee_k);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
    }


    public function all_frhke_settings($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("type", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
    }

    public function update_frk_settings($table,$id)
    {
        if($this->input->post('tasnef')){
            $tasnef = $this->input->post('tasnef');
            foreach ($tasnef as $row){
                $data[$row] = 1;
            }
        }
        if($this->input->post('type_k')){
            $k =  $this->input->post('type_k');
            if($k == 1){
                $data['type'] = 1;
                $data['type_name'] = 'حالات الكفالات ';
            } elseif($k == 2){
                $data['type'] = 2;
                $data['type_name'] = 'حالات الكافل ';
            }
        }
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        
        $data['kafala_value']= $this->input->post('kafala_value');
        $this->db->where('id',$id);
        $this->db->update($table,$data);
    }

    public function getById_frk_settings($id,$table)
    {
        return $this->db->get_where($table, array('id'=>$id))->row_array();
    }

    public function delete_fr_settingsKa($id,$table)
    {
        $this->db->where('id', $id)->delete($table);
    }
/************************************************/



    public function add_kafala_types()
    {
        if($this->input->post('type')){
            $k =  $this->input->post('type');
            if($k == 1){
                $data['type'] = 1;
                $data['type_name'] = 'الكفلاء ';
            } elseif($k == 2){
                $data['type'] = 2;
                $data['type_name'] = 'المتبرعين ';
            }
        }
        if($this->input->post('specialize_fk')){
            $s =  $this->input->post('specialize_fk');
            if($s == 1){
                $data['specialize_fk'] = 1;
                $data['specialize_name'] = 'الأفراد ';
            } elseif($s == 2){
                $data['specialize_fk'] = 2;
                $data['specialize_name'] = 'الجهات و المؤسسات ';
            }
        }

        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');

        $this->db->insert('fr_sponser_donors_setting',$data);
    }

    // display kafalat types

/*    public function get_kafala_types()
    {
        $this->db->select('*');
        $this->db->from('fr_sponser_donors_setting');
     //  $this->db->group_by('type');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach($query->result() as $row ){
                $data[$i]->data_kafel = $this->get_data_kafel($row->type);
            $i++;
            }
            return $data;
        }
        return false;

    }*/


    public function get_kafala_types()
    {
        $this->db->select('*');
        $this->db->from('fr_sponser_donors_setting');
        $this->db->group_by('type');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            $data = $query->result();
            foreach($query->result() as $row ){
                $data[$i]->data_kafel = $this->get_data_kafel($row->type);
                $data[$i]->count = $this->get_count($row->type);
            $i++;
            }
            return $data;
        }
        return false;

    }
  /*  public function get_data_kafel($type)
    {
        $this->db->select('*');
        $this->db->from('fr_sponser_donors_setting');
      //  $this->db->group_by('specialize_fk');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach($query->result() as $row ){
                $data[$i]->data_member = $this->get_data_member($row->type,$row->specialize_fk);
                $i++; }
            return $data;
        }
        return false;

    }*/
    public function get_data_kafel($type)
    {
        $count =0;
        $this->db->select('*');
        $this->db->from('fr_sponser_donors_setting');
       $this->db->group_by('specialize_fk');
        $this->db->where('type', $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;$data = $query->result();
            foreach($query->result() as $row ){
                $data[$i]->data_member = $this->get_data_member($row->type,$row->specialize_fk);

                $i++; }
            return $data;
        }
        return false;

    }

/*
    public function get_data_member($type ,$specialize)
    {
        $this->db->select('*');
        $this->db->from('fr_sponser_donors_setting');
        $this->db->where('type', $type);
        $this->db->where('specialize_fk', $specialize);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            return $data;
        }
        return false;

    }*/
     public function get_data_member($type ,$specialize)
    {
        $this->db->select('*');
        $this->db->from('fr_sponser_donors_setting');
        $this->db->where('type', $type);
        $this->db->where('specialize_fk', $specialize);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            return $data;
        }
        return false;

    }
    
    
  /*  public function getById_kafala_types($id)
    {
        return $this->db->get_where('fr_sponser_donors_setting', array('id'=>$id))->row_array();
    }
*/
 public function getById_kafala_types($id)
    {
        return $this->db->get_where('fr_sponser_donors_setting', array('id'=>$id))->row_array();
    }
    // update kafal types

    public function update_kafala_types($id)
    {
        if($this->input->post('type')){
            $k =  $this->input->post('type');
            if($k == 1){
                $data['type'] = 1;
                $data['type_name'] = 'الكفلاء ';
            } elseif($k == 2){
                $data['type'] = 2;
                $data['type_name'] = 'المتبرعين ';
            }
        }
        if($this->input->post('specialize_fk')){
            $s =  $this->input->post('specialize_fk');
            if($s == 1){
                $data['specialize_fk'] = 1;
                $data['specialize_name'] = 'الأفراد ';
            } elseif($s == 2){
                $data['specialize_fk'] = 2;
                $data['specialize_name'] = 'الجهات و المؤسسات ';
            }
        }


        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        $this->db->where('id',$id);
        $this->db->update('fr_sponser_donors_setting',$data);
    }
    //delete

    public function delete_kafala_types($id)
    {
        $this->db->where('id', $id)->delete('fr_sponser_donors_setting');
    }

    public function get_count($type){
        $count = 0;
        $row = $this->get_data_kafel($type);
       if(isset($row)&&  !empty($row)){
           foreach($row as $record){
               $count+= count($record->data_member);



           }
           return $count;
       }
        return 0;

    }





    public function add_halet_kafalaat_reasons(){

        if(!empty($_POST['reason'])){

            foreach ($_POST['reason'] as $key=>$value){

                $data['reason']= $value;
                $data['reason_type']= $this->input->post('reason_type_'.$key);
                $this->db->insert('halet_kafalaat_reasons_settings',$data);

            }

        }

    }


    public function update_halet_kafalaat_reasons($id){

        if($id){

                $data['reason']= $this->input->post('reason');
                $data['reason_type']= $this->input->post('reason_type');
                $this->db->where('id',$id);
                $this->db->update('halet_kafalaat_reasons_settings',$data);

        }

    }
    public function  get_halet_kafalaat_reasons_settings()
    {
        $this->db->select('*');
        $this->db->from('halet_kafalaat_reasons_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function getById_halet_kafalaat_reasons_settings($id)
    {
        return $this->db->get_where('halet_kafalaat_reasons_settings', array('id'=>$id))->row_array();
    }


    public function delete_halet_kafalaat_reasons($id){
        $this->db->where('id',$id);
        $this->db->delete('halet_kafalaat_reasons_settings');

    }




}
