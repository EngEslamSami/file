<?php





class Person extends CI_Model

 {

    public function __construct()

    {

        parent:: __construct();

    }


 public  function record_count(){
  return $this->db->count_all("person");
      }
      
      public  function record_count2(){
        $query = $this->db->query('SELECT * FROM person WHERE approved=1');
return $query->num_rows();
      }
      
      public  function record_count3(){
  $query = $this->db->query('SELECT * FROM person WHERE approved=2');
return $query->num_rows();
      }

//-----------------------------------






  public function select_data(){

        $this->db->select('*');

        $this->db->from('persons_files');

        $this->db->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[$row->id] = $row;

            }

            return $data;

        }

        return false;

    } 
     public  function  insert(){



//print_r($this->input->post());

//die;
        $data['file_name'] = $this->input->post('file_num');
        $data['name'] = $this->input->post('name');
        $data['father_status'] = $this->input->post('father_status');
        $data['card_id'] = $this->input->post('card_id'); 
        $data['card_type'] = $this->input->post('card_type'); 
        $data['birth_date'] = $this->input->post('birth_date');
        $data['group'] = $this->input->post('group');  
        $data['tele'] = $this->input->post('tele');
        $data['mob'] = $this->input->post('mob');
        $data['nationality_id_fk'] = $this->input->post('nationality_id_fk'); 
        $data['house_type'] = $this->input->post('house_type');
        $data['house_place'] = $this->input->post('house_palce');
        $data['health_type'] = $this->input->post('healthy_type'); 
        $data['job'] = $this->input->post('job'); 
        $data['education_level'] = $this->input->post('education_level'); 
        $data['sarf_type'] = $this->input->post('sarf_type');  
        $data['notes'] = $this->input->post('notes');  
        // $data['approved'] = 0; 
       // $data['date'] = $date;//strtotime(date("Y/m/d"));
        //$data['date_s'] = time();
        $total = $this->input->post('total'); 
        $this->db->insert('persons_files',$data);
        
        $this->db->select('*');
        $this->db->from('persons_files');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $query = $query->result_array();
        
        if($total > 1)
        {
            for($z = 0 ; $z < ($total) ; $z++)
            {
                $dd['file_num_id_fk'] = $query[0]['id'];
                $dd['name'] = ($this->input->post('f_name'.$z.''))?$this->input->post('f_name'.$z.''):0;
                $dd['birth_date'] = ($this->input->post('f_birth_date'.$z.''))?$this->input->post('f_birth_date'.$z.''):0;
                $dd['type'] = ($this->input->post('f_type'.$z.''))?$this->input->post('f_type'.$z.''):0;
                $dd['education_level'] = ($this->input->post('f_education'.$z.''))?$this->input->post('f_education'.$z.''):0;  
                $dd['age'] = ($this->input->post('age'.$z.''))?$this->input->post('age'.$z.''):0;
                $this->db->insert('persons_kids',$dd);
            }
        }
      

    }
    
    
   public function getById($id){
        $h1 = $this->db->get_where('persons_files', array('id'=>$id));
        $h2 = $this->db->get_where('persons_kids', array('file_num_id_fk'=>$id));
        return array($h1->row_array(),$h2->result());
   } 
   
   public function search_web($id){
        $h1 = $this->db->get_where('person', array('card_num'=>$id));
        $result = $h1->row_array();
        $h2 = $this->db->get_where('education', array('person_id'=>$result['id']));
        $h3 = $this->db->get_where('income', array('person_id'=>$result['id']));
        return array($h1->row_array(),$h2->row_array(),$h3->row_array());
   }


   public  function  update($id,$file_name){

        $update['name'] = $this->input->post('name');
        $update['birth_date'] = $this->input->post('birth_date');
        $update['gender'] = $this->input->post('gender');
        $update['neighborhood'] = $this->input->post('neighborhood');
        $update['mobile'] = $this->input->post('mobile');
        $update['place'] = $this->input->post('place');
        $update['home_phone'] = $this->input->post('home_phone');
        $update['house_state'] = $this->input->post('house_state');
        $update['house_type'] = $this->input->post('house_type');
        if($this->input->post('house_type') == 7){
            $update['house_owner'] = $this->input->post('house_owner');
            $update['house_rent'] = $this->input->post('house_rent');
        }
        $update['card_num'] = $this->input->post('card_num');
        $update['card_date'] = $this->input->post('card_date');
        $update['card_source'] = $this->input->post('card_source');
         $update['person_responsible'] = $this->input->post('person_responsible');
        $update['male_num'] = $this->input->post('male_num');
        $update['femal_num'] = $this->input->post('femal_num');
        
        $total = $this->input->post('total'); 
        $update['job'] = $this->input->post('job');
        $update['job_phone'] = $this->input->post('job_phone');
        $update['job_place'] = $this->input->post('job_place');
        $update['salary'] = $this->input->post('salary');
        $update['benefit'] = $this->input->post('benefit');
        //$update['other'] = $this->input->post('other_person');
        $update['social_status'] = $this->input->post('social_status');
        if($this->input->post('social_status') == 16){
            $update['orphan_name'] = $this->input->post('orphan_name');
            $update['orphan_propety'] = $this->input->post('orphan_propety');
            $update['orphan_propety_rent'] = $this->input->post('orphan_propety_rent');
            if($file_name)
                $update['orphan_prove'] = $file_name;
        }
        $update['health_state'] = $this->input->post('health_state');
        $update['house_state'] = $this->input->post('house_state'); 

        //$update['date'] = strtotime(date("Y/m/d"));
        $update['date_s'] = time();
        
        $this->db->where('id', $id);
        $this->db->update('person',$update);
        
        if($total > 1)
        {
            $this->db->where('person_id',$id);
            $this->db->delete('education');
        
            for($z = 0 ; $z < ($total-1) ; $z++)
            {
                $dd['f_name'] = ($this->input->post('f_name'.$z.''))?$this->input->post('f_name'.$z.''):0;
                $dd['f_birth_date'] = ($this->input->post('f_birth_date'.$z.''))?$this->input->post('f_birth_date'.$z.''):0;
                $dd['f_id_card'] = ($this->input->post('f_id_card'.$z.''))?$this->input->post('f_id_card'.$z.''):0;
                $dd['f_type'] = ($this->input->post('f_type'.$z.''))?$this->input->post('f_type'.$z.''):0;
                $dd['f_education'] = ($this->input->post('f_education'.$z.''))?$this->input->post('f_education'.$z.''):0;
                $dd['total'] = $total;
                $dd['person_id'] = $id;
                
                $this->db->insert('education',$dd);
            }
        }
        if($total == 1)
        {
            $this->db->where('person_id',$id);
            $this->db->delete('education');
        }
        
        //if($this->input->post('total2') != 0)
        //{
            $r['person_id'] = $id;
            $r['society'] = $this->input->post('society');
            $r['retard'] = $this->input->post('retard');
            $r['begger'] = $this->input->post('begger');
            $r['awqaf'] = $this->input->post('awqaf');
            $r['3waned'] = $this->input->post('3waned');
            $r['retirement'] = $this->input->post('retirement');
            $r['other'] = $this->input->post('other');
            $r['total'] = $this->input->post('total2');
            
            $this->db->where('person_id', $id);
            $this->db->update('income',$r);
        //}
    }


///////////selecting data//////////////////


    public function get_define($type){


        $this->db->select('*');


        $this->db->from('all_defined');


        $this->db->order_by('id','ASC');


        $this->db->where('type',$type);


        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;


            }


            return $data;


        }


        return false;


    }
    
    
    
    
     public function get_define2($type){


        $this->db->select('*');


        $this->db->from('all_defined');


        $this->db->where('type',$type);


        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[$row->id] = $row;


            }


            return $data;


        }


        return false;


    }
    
    
    
     public function select(){
        
        $data2 = '';


        $this->db->select('*');


        $this->db->from('person');


        $this->db->order_by('id','DESC');


        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;
                
                $this->db->select('*');


                $this->db->from('papers');
                
                $this->db->where('person_id',$row->id);
        
        
                $query1 = $this->db->get();
                
                if ($query1->num_rows() > 0) {
                    
                    foreach ($query1->result() as $row2) {
                        
                        $data2[$row->id] = $row2;
                    
                    }
                }


            }


            return array($data,$data2);


        }


        return false;


    }



 public function select_request($type){

        $this->db->select('*');

        $this->db->from('person');
        
        $this->db->where('approved',$type);

        $this->db->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;
            }
            return $data;
        }
        return false;


    }
    
    public function approved_request($type , $id){

            $up['approved'] = $type;
            $this->db->where('id', $id);
            $this->db->update('person',$up);

    }

    /////delete/////


    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('person');
        
        $this->db->where('person_id',$id);
        $this->db->delete('education');
        
        $this->db->where('person_id',$id);
        $this->db->delete('income');
        
        $this->db->where('person_id',$id);
        $this->db->delete('papers');

    }
    
    public function paper($id,$file1,$file2){
        
        $this->db->select('*');
        $this->db->from('papers');
        $this->db->where('person_id',$id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            if($file1)
                $report['report1'] = $file1;
            if($file2)
                $report['report2'] = $file2;
            
            $this->db->where('person_id', $id);
            $this->db->update('papers',$report);
        }
        else
        {
            if($file1)
                $report['report1'] = $file1;
            if($file1)
                $report['report2'] = $file2;
                
            $report['person_id'] = $id;
            
            $this->db->insert('papers',$report);
        }
        
    }
 

 
 public function select_data_period($date_from,$date_to){

        $this->db->select('*');

        $this->db->from('person');
        
        $this->db->where("date_s BETWEEN ".strtotime($date_from)." AND ".strtotime($date_to)." ");

        $this->db->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[$row->id] = $row;

            }

            return $data;

        }

        return false;

    }
    
    
    public function print_report($benefit){

        $this->db->select('*');

        $this->db->from('person');
        
        if($benefit != 0)
            $array = array('approved'=>1,'benefit'=>$benefit);
        else    
            $array = array('approved'=>1);
        
        $this->db->where($array);

        $this->db->order_by('id','DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }
 
 
 
 
 public function print_report_type($arr){
    $this->db->select('*');
    $this->db->from('person');
    $this->db->where('approved',1);
    
    $this->db->where('benefit',$arr[0]);
    for ($d =1;$d<sizeof($arr);$d++):
        $this->db->or_where('benefit',$arr[$d]);
    endfor;

    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;

}


public function print_report_type_by_place($arr,$area_rr){
    $this->db->select('*');
    $this->db->from('person');
    $this->db->where('approved',1);
    $this->db->where_in('benefit', $arr);
    $this->db->where_in('place', $area_rr);
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;

}


  

 }//end class

       

       



?>