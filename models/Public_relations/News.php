<?php
class News extends CI_Model
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
    public  function  insert_news($news_type){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['news_category']=$this->chek_Null($this->input->post('news_category'));
        $data['news_type']=$news_type;
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('news',$data);
    }
//---------------------------------------------------  
public  function  update_news($id){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['news_category']=$this->chek_Null($this->input->post('news_category'));
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where("id",$id);
        $this->db->update('news',$data);
    }    
//----------------------------------------------------
    public  function  insert_photo($last,$file){
        $data['process']='news';
        $data['f_id']=$last;
        foreach($file as $key=>$value){
        $data['img']=$value;    
         $this->db->insert('news_photo',$data);
        }
        
    }
//-------------------------------------------------------
    public function select_all($order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    
    public function select_all_news(){
  $this->db->order_by("id","desc");
  $this->db->limit(3);
  $query= $this->db->get('news');

$x=0;
$data=array();

foreach($query->result()as $row)
{  $data[$x]=$row;
  $data[$x]->img=$this->get_img($row->id);     
   $x++;
}
    

return $data;

    }
    public function get_img($id)
    {
  
  $this->db->where('f_id',$id);
  
  $query=$this->db->get('news_photo');
  if($query->num_rows() > 0){
 return $query->row()->img;
  }
  else{
      return  false;
  }
    }
///-------------------------------------------------------
public function select($news_type){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where("news_type",$news_type);
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
        $this->db->from('news_photo');
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
      $h = $this->db->get_where("news_photo", array('id'=>$id));
        $arr=$h->row_array();
        return $arr['img'];
}
//----------------------------------------------------
public function delete_img($id){
    $this->load->helper('file');    
        $img_name=$this->get_image_name($id);
         delete_files(base_url()."uploads/images/".$img_name);
        $this->db->where("id",$id);
        $this->db->delete("news_photo");
}
//--------------------------------------------------
public function delete_where($f_id){
       $this->db->select('*');
        $this->db->from('news_photo');
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
//---------------------------------------------
public function insert_show($file){
        $data['name']=$this->input->post('name');
        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_username'];
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $this->db->insert('live_show',$data); 
    
}
//----------------------------------------------
public function update_show($file,$id){
 $data = array('name'=>$this->input->post('name') );
        $data['publisher'] = $_SESSION['user_username'];
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        if($this->chek_Null($file) != ''){
            $data['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('live_show',$data)) {
            return true;
        }else{
            return false;
        }
}
//-------------------------------------------------- dina

 public  function record_count(){
        return $this->db->count_all("news");

    }
    
   public function get_album_photos($id){
        $this->db->select('*');
        $this->db->from('news_photo');
        $this->db->where('f_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           
            foreach ($query->result() as $row) {
                $data[] = $row;
                
                
            }
            return $data;
        }
        return false;
    }
    
    
  public function select_all_limit($start,$limit){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('id','ASC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_album_photos($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
     public function select_all_home($limit){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('id','desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_album_photos($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
     public function select_by_id_images($id){
        $this->db->select('*');
        $this->db->from('news_photo');
        $this->db->where('f_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
   
    public function select_by_id($id){
        $h = $this->db->get_where('news', array('id'=>$id));
        return $h->row_array();
    }
    
 public function select_by_other($id){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id !=',$id);
        $this->db->limit(6);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_album_photos($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
     public function select_users(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
             $data[$row->user_id] = $row->user_name;
            }
            return $data;
        }
        return false;
    }






    public function select_all_(){
        $this->db->select('*');
        $this->db->from("news");
       // $this->db->order_by($order_by,$order_by_desc_asc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

     
     //==============================================================
     public function all_select_news($limit){
       $this->db->select('*');
        $this->db->from("news");
        $this->db->order_by("id","DESC");
        $this->db->limit($limit);
        $query = $this->db->get();  
        if ($query->num_rows() > 0) {
            $data =$query->result();$i=0;
            foreach ($query->result() as $row) {
                $data[$i]->sub_img = $this->get_img($row->id);
            }
            return $data;
        }
        return false;
     }

     //================================================================
              public function insert_views_new($id)
            {
                if($this-> get_view($id)==0){
               $data['num']= 1;
                $data['new_id']= $id;
                
                $this->db->insert('news_view',$data); 
                }else{
                   $data['num']= $this-> get_view($id)+1;
                   $this->db->where('new_id',$id);
                   $this->db->update('news_view',$data);
                }
            }
            public function get_view($id){
              $this->db->where('new_id',$id);
              $query = $this->db->get('news_view'); 
              if($query->num_rows()>0){
                return $query->row()->num;
              }else{
                return 0;
              }
            }
             
        public function select_latest_news($limit,$id,$field){
                $this->db->select('*');
                $this->db->where('id !=',$id);
                $this->db->from('news');
                $this->db->order_by($field,'desc');
                $this->db->limit($limit);
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                    $i=0;
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                        $data[$i]->photos = $this->get_news_img($row->id);
                        $i++;
                    }
                    return $data;
                }
                return false;
            }
        
        
        public function get_news_img($id){
                $this->db->select('*');
                $this->db->from('news_photo');
                $this->db->where('f_id',$id);
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                   
                  return  $query->row()->img;
                    
                }
                return false;
            }
            
        public function get_views_num()
        {
          $this->db->order_by('num', 'ASC');
           $this->db->limit(6);
           $query = $this->db->get('news_view');
           $data=array();
           $x=0;
          foreach ($query->result() as $row){
            $arr_news =$this->new_datails($row->new_id);
           if(!empty($arr_news)){
                 $data[$x]=$row;
                // $data[$x]->sub =$this->new_datails($row->new_id);
                   $data[$x]->title=$this->new_datails($row->new_id)->title;
                   $data[$x]->content=$this->new_datails($row->new_id)->content;
                   $data[$x]->img=$this->get_news_img($row->new_id);
             $x++;
           }
         
          }
          return  $data;
        }
        public function new_datails($id){
            $this->db->where('id',$id);
              $query = $this->db->get('news'); 
              if($query->num_rows()>0){
                return $query->row();
              }else{
                return 0;
              }
        }
   //===============================================================
   public function delete_cont_news($id){
       $this->db->where('new_id',$id);
       $this->db->delete("news_view");
   }






}//END CLASS
?>