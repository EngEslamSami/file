<?php
class Member_model extends CI_Model
{
    
    private function upload_image($file_name)
	{
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
          return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
           return  $datafile['file_name'];
        }
    }
    private function thumb($data)
	{
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    
  public function insert()
  {
    $file=$this->upload_image('img');
    $data['membership_num']=$this->input->post('num');
    $data['membership_date']=$this->input->post('register_date');
     $data['membership_value']=$this->input->post('money');
      $data['name']=$this->input->post('name');
      $data['membership_type']=$this->input->post('type');
      $data['scientific_qualification_id_fk']=$this->input->post('degree');
        $data['email']=$this->input->post('email');
         $data['specialist']=$this->input->post('specialize');
         $data['mob']=$this->input->post('phone');
          $data['job']=$this->input->post('job');
           $data['adress']=$this->input->post('member_adress');
           $data['date_birth']=$this->input->post('member_date');
           $data['work_mob']=$this->input->post('work_number');
           $data['work_adress']=$this->input->post('work_adress');
           $data['work_place']=$this->input->post('work_place');
           $data['mail_box']=$this->input->post('mailbox');
           $data['img']=$file;
           $data['approved']=0;
           $data['date_s']=$this->input->post('register_date');
           $data['date']=$this->input->post('register_date');
           $this->db->insert('general_assembley_members',$data);
          
  }   
  
  
  public function get_all()
  {
    $this->db->order_by('id','desc');
    return $this->db->get('general_assembley_members')->result();
  }
  
  public function delete($id)
  {
    $this->db->where('id',$id);
     $this->db->delete('general_assembley_members');
  }
  public function get_by_id($id)
  {
     $this->db->where('id',$id);
    return $this->db->get('general_assembley_members')->row_array();
  }
  public  function edit($id) 
  {
    $file=$this->upload_image('img');
        $data['membership_num']=$this->input->post('num');
        $data['membership_date']=$this->input->post('register_date');
        $data['membership_value']=$this->input->post('money');
        $data['name']=$this->input->post('name');
        $data['membership_type']=$this->input->post('type');
        $data['scientific_qualification_id_fk']=$this->input->post('degree');
        $data['email']=$this->input->post('email');
        $data['specialist']=$this->input->post('specialize');
        $data['mob']=$this->input->post('phone');
        $data['job']=$this->input->post('job');
        $data['adress']=$this->input->post('member_adress');
        $data['date_birth']=$this->input->post('member_date');
        $data['work_mob']=$this->input->post('work_number');
        $data['work_adress']=$this->input->post('work_adress');
        $data['work_place']=$this->input->post('work_place');
        $data['mail_box']=$this->input->post('mailbox');
           if($file){
             $data['img']=$file;
           }else{
            $data['img']=$this->get_file($id);
           }
          
           $data['approved']=0;
           $data['date_s']=$this->input->post('register_date');
           $data['date']=$this->input->post('register_date');
           
           $this->db->where('id',$id);
         $this->db->update('general_assembley_members',$data);
  }
  
  public function get_all_degree()
  {
     return $this->db->get('scientific_qualification')->result();
  }
  public function get_file($id)
  {
     $this->db->where('id',$id);
     return $this->db->get('general_assembley_members')->row()->img;
  }
  public function get_last_id()
  {
   $this->db->order_by('id','desc');
    $query = $this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
         return $query->row()->id;
         }
   return false;
  }
    }  // end class 
    ?>