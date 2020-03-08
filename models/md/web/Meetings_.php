<?php
class Meetings extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

   
public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}

    
        public function insert($img_file,$file_name)
        {
          
            if($_SESSION['role_id_fk']==1){

                $data['publisher']=$_SESSION['user_id'];
                $data['publisher_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
    
      $data['galsa_rkm']=$this->input->post('galsa_rkm');
      $data['galsa_place']=$this->input->post('galsa_place');
      $data['galsa_time']=$this->input->post('galsa_time');
            $data['galsa_date']=$this->input->post('galsa_date');
     
            $data['details']=$this->input->post('details');
          
            $data['ffile'] = $img_file;
                $data['file_name'] = $file_name;//2-12-om
              
       $data['galsa_time_2']=$this->input->post('galsa_time');









       $data['date']= strtotime(date("Y-m-d"));
       $data['date_ar'] = date('Y-m-d H:i:s');
      

      

       $x= $this->input->post('to_user_fk');
       $y=$this->input->post('to_user_fk_name');
      
       if(   $x!=null)
       {
        
       for($i=0;$i<sizeof($x);$i++)
{
   
   
   $datax['mem_id'] = $x[$i];
   $datax['mem_name'] = $y[$i];
$datax['galsa_id_fk']=$this->select_last_galsa();;
$datax['date']= strtotime(date("Y-m-d"));
       $datax['date_ar'] = date('Y-m-d H:i:s');


       if($_SESSION['role_id_fk']==1){

        $datax['publisher']=$_SESSION['user_id'];
        $datax['publisher_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $datax['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $datax['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $datax['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $datax['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $datax['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $datax['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
   $this->db->insert(' md_web_members',$datax);
}}


            
$this->db->insert('md_web',$data);    
          
        }
        public function update($id,$img_file,$file_name)
        {
           
    
      $data['galsa_rkm']=$this->input->post('galsa_rkm');
      $data['galsa_place']=$this->input->post('galsa_place');
      $data['galsa_time']=$this->input->post('galsa_time');
      $data['galsa_time_2']=strtotime($this->input->post('galsa_time'));
      $data['galsa_date']=$this->input->post('galsa_date');
     
            $data['details']=$this->input->post('details');
          if(!empty($img_file)&&$img_file!=0)
          {
            $data['ffile'] = $img_file;
            $data['file_name'] = $file_name;//2-12-om
          }


       $x= $this->input->post('to_user_fk');
       $y=$this->input->post('to_user_fk_name');
      
       if(   $x!=null)
       {
        
       for($i=0;$i<sizeof($x);$i++)
{
   
   
   $datax['mem_id'] = $x[$i];
   $datax['mem_name'] = $y[$i];
$datax['galsa_id_fk']=$this->uri->segment(5);
$datax['date']= strtotime(date("Y-m-d"));
       $datax['date_ar'] = date('Y-m-d H:i:s');


       if($_SESSION['role_id_fk']==1){

        $datax['publisher']=$_SESSION['user_id'];
        $datax['publisher_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $datax['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $datax['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $datax['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $datax['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $datax['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $datax['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
   $this->db->insert(' md_web_members',$datax);
}}


            
$this->db->where('id',$id)->update('md_web',$data);  

        }
        public function delete_metting($id)
        {
            $this->db->where('id',$id)->delete('md_web'); 

        }
        public function delete_memebers($id)
        {
            $this->db->where('galsa_id_fk',$id)->delete('md_web_members'); 

        }
        public function insert_attached($img_file,$id)
        {
            $dataq['file'] = $img_file;
            $dataq['title'] = $this->input->post('title');
            $dataq['galsa_id_fk']=$id;
            $dataq['date']= strtotime(date("Y-m-d"));
            $dataq['date_ar'] = date('Y-m-d H:i:s');
     
     
            if($_SESSION['role_id_fk']==1){
     
             $dataq['publisher']=$_SESSION['user_id'];
             $dataq['publisher_name']=$_SESSION['user_name'];;
         }
         else if ($_SESSION['role_id_fk']==2){
             $dataq['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
             $dataq['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
     
         }
         else if ($_SESSION['role_id_fk']==3){
             $dataq['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
             $dataq['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
         }
         else if ($_SESSION['role_id_fk']==4){
             $dataq['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
             $dataq['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
         }

            $this->db->insert('md_web_images',$dataq);

        }
        public function select_all_my_images($id)
        {
            $this->db->select('*');
            $this->db->from('md_web_images');
            $query = $this->db->where('galsa_id_fk',$id)->get()->result();
            return $query;
        }
     
        public function  delete_images($id)
        {
            $this->db->where('id',$id)->delete('md_web_images'); 

        }
       
        
        public function select_last_galsa()
        {
            
                $this->db->select('id');
                $this->db->order_by('id','desc');
                $query=$this->db->get('md_web');
                if($query->num_rows()>0)
                {
                    return $query->row()->id + 1;
                }else{
                    return 1;
                }
            
              
        }
        //yara
        public function select_all_my_meeting()
        {
            $this->db->select('*');
            $this->db->from('md_web');
              $this->db->order_by('id','desc');
            $query = $this->db->get()->result();
            return $query;

        }
        public function get_all_details($rkm)
        {
            $this->db->where('galsa_id_fk', $rkm);
            $query = $this->db->get('md_web_members');
            if ($query->num_rows() > 0) {
                $query = $query->result();
                foreach ($query as $key => $row) {
                    $query[$key]->member_data = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id));
                    $query[$key]->odwiat_data = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id));
                }
                return $query;
            } else {
                return false;
            }
        }  
        public function get_by($table, $where_arr, $select = false)
        {
    
            $q = $this->db->where($where_arr)
                ->get($table)->row();
            if (!empty($q)) {
                if (!empty($select)) {
                    return $q->$select;
                } else {
                    return $q;
                }
            } else {
                return false;
            }
    
        }
        public function select_meeting_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('md_web');
            $query = $this->db->where('id',$id)->get()->row();
            return $query;

        }
        //yara
       
    public function update_read($id)
    {
        
        
        $data['views_num']=$this->select_last_views($id);
        
    $this->db->where('id',$id)->update('md_web',$data);
    }
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function select_last_views($id)
    {
        
            $this->db->select('views_num');
            $this->db->where('id',$id);
            $query=$this->db->get('md_web');
            if($query->num_rows()>0)
            {
                return $query->row()->views_num + 1;
            }else{
                return 1;
            }
        
          
    }
    public function  update_download($id)
    {
        
        
        $data['download_num']=$this->select_last_download($id);
        
    $this->db->where('id',$id)->update('md_web',$data);
    }
    public function select_last_download($id)
    {
        
            $this->db->select('download_num');
            $this->db->where('id',$id);
            $query=$this->db->get('md_web');
            if($query->num_rows()>0)
            {
                return $query->row()->download_num + 1;
            }else{
                return 1;
            }
        
          
    }
    public function select_all_my_mehwar($id)
    {
        $this->db->select('*');
        $this->db->from('md_web_mehwar');
        $query = $this->db->where('galsa_id_fk',$id)->get()->result();
        return $query;
    }
    public function select_mehwar_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('md_web_mehwar');
        $query = $this->db->where('id',$id)->get()->row();
        return $query;

    }
    public function add_mehwar($id)
    {
      
        $dataq['mahwer_name'] = $this->input->post('mahwer_name');
        $dataq['mahwer_krar'] = $this->input->post('mahwer_krar');
        $dataq['galsa_id_fk']=$id;
        $dataq['date']= strtotime(date("Y-m-d"));
        $dataq['date_ar'] = date('Y-m-d H:i:s');
 
 
        if($_SESSION['role_id_fk']==1){
 
         $dataq['publisher']=$_SESSION['user_id'];
         $dataq['publisher_name']=$_SESSION['user_name'];;
     }
     else if ($_SESSION['role_id_fk']==2){
         $dataq['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
         $dataq['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
 
     }
     else if ($_SESSION['role_id_fk']==3){
         $dataq['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
         $dataq['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
     }
     else if ($_SESSION['role_id_fk']==4){
         $dataq['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
         $dataq['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
     }

        $this->db->insert('md_web_mehwar',$dataq);

    }
    public function update_mehwar($id)
    {
      
        $dataq['mahwer_name'] = $this->input->post('mahwer_name');
        $dataq['mahwer_krar'] = $this->input->post('mahwer_krar');
       
        $dataq['date']= strtotime(date("Y-m-d"));
        $dataq['date_ar'] = date('Y-m-d H:i:s');
 
 
        if($_SESSION['role_id_fk']==1){
 
         $dataq['publisher']=$_SESSION['user_id'];
         $dataq['publisher_name']=$_SESSION['user_name'];;
     }
     else if ($_SESSION['role_id_fk']==2){
         $dataq['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
         $dataq['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
 
     }
     else if ($_SESSION['role_id_fk']==3){
         $dataq['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
         $dataq['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
     }
     else if ($_SESSION['role_id_fk']==4){
         $dataq['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
         $dataq['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
     }

        $this->db->where('id',$id)->update('md_web_mehwar',$dataq);

    }
    public function delete_mehwar($id)
    {

        $this->db->where('id',$id)->delete('md_web_mehwar');
    }
    
}