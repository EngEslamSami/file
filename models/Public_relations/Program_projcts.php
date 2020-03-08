<?php
class Program_projcts extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------
    public  function  insert_news(){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['project_donare_value']=$this->chek_Null($this->input->post('project_donare_value'));
        $data['project_type']=$this->chek_Null($this->input->post('project_type'));
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('programs_projects',$data);
    }
//---------------------------------------------------
    public  function  update_news($id){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['project_donare_value']=$this->chek_Null($this->input->post('project_donare_value'));
        $data['project_type']=$this->chek_Null($this->input->post('project_type'));
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where("id",$id);
        $this->db->update('programs_projects',$data);
    }
//----------------------------------------------------
    public  function  insert_photo($last,$file){
        $data['process']='projects';
        $data['f_id']=$last;
        foreach($file as $key=>$value){
            $data['img']=$value;
            $this->db->insert('programs_projects_photo',$data);
        }

    }
//-------------------------------------------------------
    public function select($arr_condition){

        $this->db->select('*');
        $this->db->from('programs_projects');
        $this->db->where($arr_condition);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_img = $this->get_photo($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
//-----------------------------------------------------
    public function get_photo($f_id){
        $this->db->select('*');
        $this->db->from('programs_projects_photo');
        $this->db->where("f_id",$f_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//-----------------------------------------------------
    public function get_image_name($id){
        $h = $this->db->get_where("programs_projects_photo", array('id'=>$id));
        $arr=$h->row_array();
        return $arr['img'];
    }
//----------------------------------------------------
    public function delete_img($id){

        $img_name=$this->get_image_name($id);
        unlink("uploads/images/".$img_name);
        unlink("uploads/thumbs/".$img_name);
        $this->db->where("id",$id);
        $this->db->delete("programs_projects_photo");
    }
//--------------------------------------------------
    public function delete_where($f_id){
        $this->db->select('*');
        $this->db->from('programs_projects_photo');
        $this->db->where("f_id",$f_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $this->delete_img($row->id);
            }
            return 1;
        }
        return false;
    }
//----------------------------------------------
  public function suspend($id ,$value){
      $data['suspend'] = $value;
      $this->db->where("id",$id);
      $this->db->update('programs_projects',$data);
  }
}//END CLASS
?>