<?php
class Family_letter_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_basic_data($mother_national_num){
         $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    //=======================================================
    

    public function get_mother_data()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('mother');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->m_card_source);
                $x++;
            }
            return $data;

        } else {
            return false;
        }
    }
  //------------------------------------------------------------------
  public function get_one_mother_data($mother_num){
        $this->db->where('mother_national_card_new', $mother_num);
        $query = $this->db->get('mother');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->m_card_source);
             $x++;
            }
            return $data;

        } 
            return false;
    }
    //-------------------------------
  public function get_one_father_data($f_national_id){
        //$mother_num = $this->uri->segment(4);
        $this->db->where('f_national_id', $f_national_id);
        $query = $this->db->get('father');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->f_card_source);
                $data[$x]->mother_national_card_new = $this->get_mother_national_card_new($row->mother_national_num_fk);
                
               $x++;
            }
            return $data;

        }
            return false;
    }
    
    
          public function get_mother_national_card_new($mother_national_num_fk)
    {
        $this->db->where('mother_national_num_fk', $mother_national_num_fk);

        $query = $this->db->get('mother');
        if ($query->num_rows() > 0) {
            return $query->row()->mother_national_card_new;
        } else {
            return false;
        }

    }
    
   //-------------------------------
    public function get_one_f_member($member_id){
      
        $this->db->where('member_card_num',$member_id );
        $query = $this->db->get('f_members');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->member_card_source);
           $x++;
            }
            return $data;
        }
            return false;
    }
  
  
  
  
  //===================================================================
    public function get_dest_card($id)
    {
        $this->db->where('id_setting', $id);

        $query = $this->db->get('family_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return false;
        }

    }

    public function get_f_member()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('f_members');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->member_card_source);
            $x++;
            }
            return $data;

        } else {
            return false;
        }


    }

    public function get_father_data()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('father');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->f_card_source);
            $x++;
            }
            return $data;

        } else {
            return false;
        }


    }


    /*public function get_letters_by_type($type)
    {
        $mother_num = $this->uri->segment(4);

        $arr = array('letter_type' => $type, 'mother_national_num_fk' => $mother_num);
        $this->db->where($arr);
        $this->db->group_by('letter_num');

        $query = $this->db->get('all_letters_family');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }*/

public function get_letters_by_type($type)
    {
        $mother_num = $this->uri->segment(4);

        $arr = array('letter_type' => $type, 'mother_national_num_fk' => $mother_num);
        $this->db->where($arr);
        $this->db->group_by('letter_num');

        $query = $this->db->get('all_letters_family');
        if ($query->num_rows() > 0) {
            $data=array();
            $x=0;
            foreach($query->result() as $row){
                $data[$x]=$row;
                $data[$x]->num =$this->get_type($row->mother_national_num_fk);

                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }
	
	   public function get_type($id)
    {
        $this->db->where('mother_national_num',$id);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
        if($query->row()->final_suspend==0)
        {
          return  'ط /'. $query->row()->id  ;
        }elseif($query->row()->final_suspend==4){
            return   'م /'. $query->row()->file_num;
        }
        }else{
            return false;

        }
    }
    public function get_letters_by_type_id($mother_num,$type,$id)
    {
        $mother_num=$this->uri->segment(4);

        $arr=array('letter_type'=>$type,'mother_national_num_fk'=> $mother_num,'id'=>$id);
        $this->db->where($arr);

        $query=$this->db->get('all_letters_family');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }
    }


    /****************************************************************************************/

    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("all_letters_family");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data +1;
        }else{
            return 1;
        }

    }



    public function insert_letter($letter_type)
    {


        $data_2['mother_national_num_fk'] = $this->uri->segment(4);
        $data_2['letter_type'] = $letter_type;
        $data_2['letter_num'] = $this->input->post('letter_num');
        $data_2['date_in_letter'] = date('Y-m-d');
        $this->db->insert('all_letters_family', $data_2);

        foreach ($this->input->post('option_select') as $record) {

            $option = explode("-",$record);
            $data['person_national_num'] =  $option[0];
            $data['letter_type_fk'] = $letter_type;
            $data['letter_num_fk'] = $this->input->post('letter_num');
            $data['person_type'] = $option[1];
            $this->db->insert('persons_received_letters', $data);
        }




    }



    public function getByLetter_num($num){
        $this->db->select('*');
        $this->db->from("persons_received_letters");
        $this->db->where(array('letter_num_fk'=>$num));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->person_national_num;
            }
            return $data;
        }else{
            return 0;
        }
    }


    public function update_letter($letter_num,$letter_type){

        $this->db->where(array('letter_num'=>$letter_num));
        $this->db->delete("all_letters_family");

        $this->db->where(array('letter_num_fk'=>$letter_num));
        $this->db->delete("persons_received_letters");




        $data_2['mother_national_num_fk'] = $this->uri->segment(4);
        $data_2['letter_type'] = $letter_type;
        $data_2['letter_num'] = $this->input->post('letter_num');
        $data_2['date_in_letter'] = date('Y-m-d');
        $this->db->insert('all_letters_family', $data_2);

        foreach ($this->input->post('option_select') as $record) {

            $option = explode("-",$record);
            $data['person_national_num'] =  $option[0];
            $data['letter_type_fk'] = $letter_type;
            $data['letter_num_fk'] = $this->input->post('letter_num');
            $data['person_type'] = $option[1];
            $this->db->insert('persons_received_letters', $data);
        }


    }



    public function delete_letter($id){
 
        $this->db->where(array('letter_num'=>$id));
        $this->db->delete("all_letters_family");
        $this->db->where(array('letter_num_fk'=>$id));
        $this->db->delete("persons_received_letters");
    }


/****************************************************************/

    public function get_member_full_name($person_national_num, $type)
    {
        if ($type == 1) {
            $this->db->select('m_card_source,full_name');
            $this->db->where('mother_national_num_fk', $person_national_num);

            $query = $this->db->get('mother');
            if ($query->num_rows() > 0) {
                //return $query->row()->full_name;
                $data = array();
                $x = 0;
                foreach ($query->result() as $row) {
                    $data[$x] = $row;
                    $data[$x]->dest_card = $this->get_dest_card($row->m_card_source);
                $x++;
                }
                return $data;
            } else {
                return false;
            }
        }
        elseif ($type == 2) {
            $this->db->select('f_card_source,full_name');
            $this->db->where('f_national_id', $person_national_num);

            $query = $this->db->get('father');
            if ($query->num_rows() > 0) {
                //return $query->row()->full_name;
                $data=array();
                $x=0;

                foreach ($query->result() as $row) {
                    $data[$x] = $row;
                    $data[$x]->dest_card = $this->get_dest_card($row->f_card_source);
                $x++;
                }
                return $data;

            } else {
                return false;
            }
        } elseif ($type == 3) {
            $this->db->select('member_card_source,member_full_name');
            $this->db->where('member_card_num', $person_national_num);

            $query = $this->db->get('f_members');
            if ($query->num_rows() > 0) {
                $data=array();
                $x=0;
                foreach ($query->result() as $row) {
                    $data[$x] = $row;
                    $data[$x]->dest_card = $this->get_dest_card($row->member_card_source);
                $x++;
                }
                return $data;
            } else {
                return false;
            }
        }
        elseif ($type == 4) {
            $this->db->select('w_card_source,w_name');
            $this->db->where('w_national_id', $person_national_num);

            $query = $this->db->get('wakels');
            if ($query->num_rows() > 0) {
                $data=array();
                $x=0;
                foreach ($query->result() as $row) {
                    $data[$x] = $row;
                    $data[$x]->dest_card = $this->get_dest_card($row->w_card_source);
                $x++;
                }
                return $data;
            } else {
                return false;
            }
        }
    }
    public function get_by_person_national_card($mother_national_num, $type, $letter_num)
    {
        $arr = array('letter_type_fk' => $type,'letter_num_fk'=>$letter_num);
        $this->db->where($arr);


        $query = $this->db->get('persons_received_letters');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->letter_date= $this->letter_date($row->letter_num_fk);
               $data[$x]->files= $this->get_num_files($row->letter_num_fk);
                
            //    $data[$x]->full_name = $this->get_member_full_name($row->person_national_num, $row->person_type);
    if($row->person_type == 1){
                  $data[$x]->mother_name =   $this->get_mother_name($row->person_national_num)['full_name']; 
                  $data[$x]->m_card_source =   $this->get_mother_name($row->person_national_num)['m_card_source']; 
                   $data[$x]->m_card_source_name = $this->get_dest_card($data[$x]->m_card_source);

                  
                  }else{
                      $data[$x]->full_name = $this->get_member_full_name($row->person_national_num, $row->person_type);
                  }


                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }
    
         public function get_mother_name($person_national_num)
    {
        $h = $this->db->get_where("mother", array('mother_national_card_new' => $person_national_num));
       return $arr = $h->row_array();
       // return $arr['full_name'];
    }
        public function letter_date($letter_num)
    {
$this->db->where('letter_num',$letter_num);
$query=$this->db->get('all_letters_family');
if($query->num_rows()>0)
{
    return $query->row()->date_in_letter;
}else{
    return false;
}
    }

    public function get_num_files($num)
    {
        $this->db->where('letter_num',$num);
        $query=$this->db->get('all_letters_family');
        if($query->num_rows()>0)
        {
            if(!empty($query->row()->file1)){
                $y=1;
            }else{
                $y=0;
            }
            if(!empty($query->row()->file2)){
                $z=1;
            }else{
                $z=0;
            }
            if(!empty($query->row()->file3)){
                $x=1;
            }else{
                $x=0;
            }

            return $x+$y+$z;
        }else{
            return '-';
        }
    }
    
    public function get_letters_by_type2($type)
    {
        $this->db->where('type',$type);
        $query = $this->db->get('letter_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

/*
    public function Letter_upload($file,$num){

        $data['file'] = $file;
        $this->db->where('letter_num', $num);
        $this->db->update('all_letters_family', $data);
    }*/
    
       /* public function Letter_upload($img_file,$img_file2,$img_file3,$num){
        
if(!empty($img_file)) {
    $data['file'] = $img_file;
}if(!empty($img_file2)) {
            $data['file2'] = $img_file2;
        }if(!empty($img_file3)) {
            $data['file3'] = $img_file3;
        }
        $this->db->where('letter_num', $num);
        $this->db->update('all_letters_family', $data);
    }*/
    
     public function Letter_upload($img_file, $img_file2, $img_file3, $num)
    {

        if (!empty($img_file) && (!empty($this->input->post('name1')))) {
            $data['file1'] = $img_file;
            $data['name1'] = $this->input->post('name1');
        }
        if (!empty($img_file2) && (!empty($this->input->post('name2')))) {
            $data['file2'] = $img_file2;
            $data['name2'] = $this->input->post('name2');

        }
        if (!empty($img_file3) && (!empty($this->input->post('name3')))) {
            $data['file3'] = $img_file3;
            $data['name3'] = $this->input->post('name3');

        }
        $this->db->where('letter_num', $num);
        $this->db->update('all_letters_family', $data);
    }
    
    
     public function delet_img($leter_num,$id)
    {
        if ($id == 1) {
            $data['file1'] = null;
            $data['name1'] = null;

        }elseif ($id == 2) {
            $data['file2'] = null;
            $data['name2'] = null;

        }
        elseif ($id == 3) {
            $data['file3'] = null;
            $data['name3'] = null;

        }

        $this->db->where('letter_num', $leter_num);
        $this->db->update('all_letters_family', $data);
    }
    //yara_stat
    public function get_wakel_data()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('wakels');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->w_card_source);
            $x++;
            }
            return $data;

        } else {
            return false;
        }


    }
    public function get_one_w_member($member_id){
      
        $this->db->where('w_national_id',$member_id );
        $query = $this->db->get('wakels');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->w_card_source);
           $x++;
            }
            return $data;
        }
            return false;
    }

    
    
    

}