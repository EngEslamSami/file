<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
	
	
	
	private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
public function insert($table,$data){
    
    $this->db->insert($table,$data);
    
    
    
    
}
public function get_all()
{
  return $this->db->get('main_society_pdf')->result();  
}

public function get_by_id($id,$table)
{
$this->db->where('id',$id);
return $this->db->get($table)->row();	
}
public function edit_by_id()
{
$id=$this->uri->segment(3);
$data['title']=$this->input->post('main_cat');
$this->db->where('id',$id);
$this->db->update('main_society_pdf',$data);

}
public function delete_by_id($id,$table)
{
	$this->db->where('id',$id);
	$this->db->delete($table);

}
public function get_all_files()
{
	$data=array();
	$x=0;
foreach($this->get_all() as $row){
	
	$data[$x]=$row;
	$data[$x]->files=$this->get_files($row->id);
	$x++;
}
return $data;
}
public function get_files($id)
{
$this->db->where('main_society_id_fk',$id);
return $this->db->get('society_pdf_files')->result();
}

public function update_branch()
{
	$id=$this->uri->segment(3);
$file=$this->upload_file('pdf');
$data['main_society_id_fk']=$this->input->post('main_cat');
$data['name']=$this->input->post('name');
if($file){
$data['file']=$file;
}else{
	$data['file']=$this->get_file_by_id($id);
}


$this->db->where('id',$id);
$this->db->update('society_pdf_files',$data);


}

public function get_file_by_id($id){
	$this->db->where('id',$id);
	return $this->db->get('society_pdf_files')->row()->file;
}
public function get_all_about()
{
    return $this->db->get('about')->result();
}

}