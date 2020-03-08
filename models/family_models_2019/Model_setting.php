<?php
class Model_setting extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="family_setting";
    }
    //==========================================
    public function add($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert($this->main_table,$data);
    }
    public function get_all_data($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function  get_type($type)
    {
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
            $this->db->where('id_setting',$id);
            $this->db->update($this->main_table,$data);
    }
    public function getById($id)
    {
      return $this->db->get_where($this->main_table, array('id_setting'=>$id))->row_array();
    }
    public function delete($id)
    {
     $this->db->where('id_setting', $id)->delete($this->main_table);
    }
}// END CLass
?>