<?php
class Groups extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('system_management/Permission');
      
    }
//---------------------------------------------------------
    public function fetch_groups($limit, $start) {
        $this->db->where('group_id_fk',0);
        $this->db->limit($limit, $start);
         $this->db->order_by('page_order','ASC');
        $query = $this->db->get("pages");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//-------------------------------------------------------
    public function addGroup($file){
        $file_in=0;
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $file_in= $file;
        }
        $data = array(
            'page_title'=>  $this->input->post('page_title'),
            'page_order'=>  $this->input->post('page_order'),
            'page_link'=>$this->input->post('page_link'),
            'page_icon_code'=>$this->input->post('page_icon_code'),
            'group_id_fk'=>0,
            'level'=>0,
            'page_image'=>$file_in);
         $this->db->insert('pages', $data);
    }
//-------------------------------------------------------

    public  function getgroupbyid($id){
        $query= $this->db->get_where('pages',array('page_id'=>$id));
        return $query->row_array();
    }
//----------------------------------------------------
    function updateGroup($id,$file){


           $data = array(
            'page_title'=>  $this->input->post('page_title'),
            'page_order'=>  $this->input->post('page_order'),
            'page_link'=>   $this->input->post('page_link'),
            'page_icon_code'=>$this->input->post('page_icon_code'));
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $data['page_image']=  $file;
        }
        $this->db->where('page_id', $id);
        $this->db->update('pages', $data);
    }
    //------------------------------------------------
    public function level_groups() {
        $this->db->where('group_id_fk',0);
        $this->db->or_where('level',2);
         $this->db->order_by('page_order','ASC');
        $query = $this->db->get("pages");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
  
    //-----------------------------------------------------------

    public function get_categories(){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where("group_id_fk",0);
         $this->db->order_by('page_order','ASC');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->page_id);
            $i++;
        }
        return $categories;
    }
//-----------------------------------------------------------
    public function sub_categories($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('group_id_fk', $id);
         $this->db->order_by('page_order','ASC');
        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->page_id);
            $i++;
        }
        return $categories;
    }
//-----------------------------------------------------------
   public  function get_count_level($id){
       $this->db->select('*');
       $this->db->from('pages');
       $this->db->order_by('page_order','ASC');
       $this->db->where('group_id_fk', $id);
       $child = $this->db->get();
       $total=0;
       if ($child->num_rows() > 0){
           $categories = $child->result();
           foreach($categories as $p_cat){
               $total += $this->get_count_sub_level($p_cat->page_id);
           }
       }
       return $total;
   }
    public  function get_count_sub_level($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('group_id_fk', $id);
        $child = $this->db->get();
        $total=$child->num_rows();
        return $total;
    }



//---------------------------------------------------------
    public function main_fetch_group(){
        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->where('page_level',0);
        // $this->db->order_by('page_id_fk','ASC');
        $parent = $this->db->get("permissions");
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->count_level= $this->get_count_level($p_cat->page_id_fk);
            $categories[$i]->sub = $this->get_date_page($p_cat->page_id_fk);
            $i++;
        }
        return $categories;
    }
//----------------------------------------------------
    public  function get_date_page($id){
  
        $this->db->where('page_id',$id);
         $this->db->order_by('page_order','ASC');
        $query = $this->db->get("pages");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }
//------------------------------------------------------------
    public  function get_group($id ){
        $permetions=$this->Permission->select_per($_SESSION['user_id']);
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where("group_id_fk",$id);
        $this->db->order_by('page_order','ASC');
        
        $query = $this->db->get();
        $data=array();
        $i=0;
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {
                if(in_array($row->page_id,$permetions)){
                    $data[$i] = $row;
                    $data[$i]->count_level= $this->get_count_level($row->page_id);
                    $data[$i]->sub = $this->get_date_page($row->page_id);
                    $i++;
                }else{
                    continue;
                }
            }
            return $data;
        }
        return false;
    }
//-------------------------------------------------------------------------
public function get_group_title($id){ 
    $h = $this->db->get_where("pages", array('page_id'=>$id));
    $data=$h->row_array();
    
    $details=array();
    if($data['group_id_fk'] == 0  ){
        $details["title"]= $data['page_title'];
        $count_level=$this->get_count_level($data['page_id']);
        if($count_level >0){
          $link_to="Dash/mian_group/".$data['page_id'] ;
		}else{
          $link_to="Dash/sub_sub_main/".$data['page_id'].'/'.$data['page_id'] ;
		}
         $details["link"]= $link_to;
      //   $details["font_awesome"]=$data['page_icon_code'];
        return $details;
    }  if($data['group_id_fk'] != 0  ){
          $datareturn = $this->get_group_title($data['group_id_fk']);
       $details["title"]=$datareturn['title'];
       $details["link"]=$datareturn['link'];
   //    $details["font_awesome"]=$datareturn['font_awesome'];
        return $details;
    }
}
//---------------------------------------------------------------------------

}// END CLASS
?>