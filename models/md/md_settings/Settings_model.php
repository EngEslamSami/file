<?php
class Settings_model extends CI_Model
{


    //=================================================================================


    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id_setting]["title"]= $row->title_setting;
//                $data[$row->id_setting]['in_order'] =  $row->in_order;
            }
            return $data;
        }
        return false;
    }

    public function add_member_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
//        $data['in_order']= $this->input->post('in_order');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert('md_settings',$data);
    }
    public function get_all_data_member_settings($arr_all){
        if(isset($arr_all) && !empty($arr_all)){
            foreach ($arr_all as $key=>$value) {

                $data[$key] = $this->get_type_member_settings($key);

            }

            return $data;
        }
        return false;
    }
    public function  get_type_member_settings($type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where("type", $type);
//        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_member_settings($id)
    {
//        $data['in_order']= $this->input->post('in_order');
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update('md_settings',$data);
    }
    public function getById_member_settings($id)
    {
        return $this->db->get_where('md_settings', array('id_setting'=>$id))->row_array();
    }
    public function delete_member_settings($id)
    {
        $this->db->where('id_setting', $id)->delete('md_settings');
    }
    ///yara
    public function  get_reasons_settings()
    {
        $this->db->select('*');
        $this->db->where('type',1);
        $this->db->from('md_reasons_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function  mgls_get_reasons_settings()
    {
        $this->db->select('*');
        $this->db->where('type',2);
        $this->db->from('md_reasons_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
    public function add_reasons(){

        if(!empty($_POST['reason'])){

            foreach ($_POST['reason'] as $key=>$value){

                $data['reason']= $value;
                $data['type']=1;
                $this->db->insert('md_reasons_settings',$data);

            }

        }

    }
    public function add_reasons_1(){

       
            $data['reason']=$this->input->post('reason');
            $data['type']=1;
            $this->db->insert('md_reasons_settings',$data);
        

    }

    public function mgls_add_reasons(){

        if(!empty($_POST['reason'])){

            foreach ($_POST['reason'] as $key=>$value){

                $data['reason']= $value;
                $data['type']=2;
                $this->db->insert('md_reasons_settings',$data);

            }

        }

    }
    
    public function getById_reasons_settings($id)
    {
        return $this->db->get_where('md_reasons_settings', array('id'=>$id))->row_array();
    }
    public function mgls_getById_reasons_settings($id)
    {
        return $this->db->get_where('md_reasons_settings', array('id'=>$id))->row_array();
    }
    public function update_reasons($id){

        if($id){

                $data['reason']= $this->input->post('reason');
             
                $this->db->where('id',$id);
             
                $this->db->update('md_reasons_settings',$data);

        }

    }
    public function mgls_update_reasons($id){

        if($id){

                $data['reason']= $this->input->post('reason');
                $this->db->where('id',$id);
                $this->db->update('md_reasons_settings',$data);

        }

    }
    public function delete_reasons($id){
        $this->db->where('id',$id);
        $this->db->delete('md_reasons_settings');

    }
    public function mgls_delete_reasons($id){
        $this->db->where('id',$id);
        $this->db->delete('md_reasons_settings');

    }
    public function add_reasons_2(){

       
        $data['reason']=$this->input->post('reason');
        $data['type']=2;
        $this->db->insert('md_reasons_settings',$data);
    

}



    /*************************************************************/
}
