<?php
class Family_category extends CI_Model
{
    //---------------------------------------------------------
    public function select_Family_categories(){   
        $query = $this->db->get('family_category');
        return $query->result();   
    }
    
    
   //---------------------------------------------------------
   
   public function add_family_categories(){
   
    $data = [
        'title'=>$this->input->post('family_category'),
        'from'=>$this->input->post('from'),
        'to'=>$this->input->post('to'),
         'color'=>$this->input->post('color'),
        'date_ar'=>date("Y-m-d"),
          'service_type' =>$this->input->post('service_type'), //osama
        'publisher'=>$_SESSION['user_username']
        
        ];
   
    
  return $this->db->insert('family_category',$data);
 } 
 
 
 public function Family_categoryById($id){   
 
    $this->db->where('id',$id);
    $query = $this->db->get("family_category");
    return $query->row();
  }
  
  
  public function update_family_category($id)
     {
        $data = [
            'title'=>$this->input->post('family_category'),
            'from'=>$this->input->post('from'),
            'to'=>$this->input->post('to'),
             'color'=>$this->input->post('color'),
               'service_type' =>$this->input->post('service_type') //osama
            
            ];
            
        $this->db->where('id',$id);
        $this->db->update('family_category', $data);
     }
     
     
  public function delete_family_category($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('family_category');
     }


    //---------------------------------------------------------
    
            public function select_familys_category($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',4);
        $this->db->where('mother_national_num',$mother_national_num_fk);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
              //  $query_result[$i]->category = $this->categoryByValue($row->value);
                $query_result[$i]->mother_monthly_income = $this->get_mother_monthly_income($row->mother_national_num);
                 $query_result[$i]->total_financial = $this->get_total_financial($row->mother_national_num);
                
                 $query_result[$i]->member_num = $this->get_member_num($row->mother_national_num); 
                
                  $query_result[$i]->category = $this->categoryByValue(( $query_result[$i]->total_financial +$query_result[$i]->mother_monthly_income ) / ($query_result[$i]->member_num+1) );
                
                 $query_result[$i]->mother_name = $this->get_mother_name($row->mother_national_num );
                
                
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    
    /********/
    
        public function report_familys_category(){

        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',4);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
              //  $query_result[$i]->category = $this->categoryByValue($row->value);
                $query_result[$i]->mother_monthly_income = $this->get_mother_monthly_income($row->mother_national_num);
                 $query_result[$i]->total_financial = $this->get_total_financial($row->mother_national_num);
                
                 $query_result[$i]->member_num = $this->get_member_num($row->mother_national_num); 
                
                  $query_result[$i]->category = $this->categoryByValue(( $query_result[$i]->total_financial +$query_result[$i]->mother_monthly_income ) / ($query_result[$i]->member_num+1) );
                
                 $query_result[$i]->mother_name = $this->get_mother_name($row->mother_national_num );
                
                
                
                
                
                
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    
   
   
 /******************************************/  
 
         public function specific_familys_category($mother_national_num){

        $this->db->select('*');
        $this->db->from('basic');
        //$this->db->where('suspend',4);
         $this->db->where('mother_national_num',$mother_national_num);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
              //  $query_result[$i]->category = $this->categoryByValue($row->value);
              //  $query_result[$i]->mother_monthly_income = $this->get_mother_monthly_income($row->mother_national_num);
               //  $query_result[$i]->total_financial = $this->get_total_financial($row->mother_national_num);
                
                 $query_result[$i]->member_num = $this->get_member_num($row->mother_national_num); 
                
               //   $query_result[$i]->category = $this->categoryByValue(( $query_result[$i]->total_financial +$query_result[$i]->mother_monthly_income ) / ($query_result[$i]->member_num+1) );
                
                 $query_result[$i]->mother_name = $this->get_mother_name($row->mother_national_num );
                
                
                $query_result[$i]->all_mother_income = $this->get_mother_incomes($row->mother_national_num );
                     
                  $query_result[$i]->all_mother_masrof = $this->get_mother_masrof($row->mother_national_num );
                     
                
   $query_result[$i]->category = $this->categoryByValue(( $query_result[$i]->all_mother_income - $query_result[$i]->all_mother_masrof ) / ($query_result[$i]->member_num+1) );
                               
                
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    
 
 
 
   public function  get_mother_incomes($mother_national_num_fk){
           $this->db->select("*");
        $this->db->from("family_income_duties");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("affect",1);
        $this->db->where("type",1);
        $query = $this->db->get();
        $all_income=0;
        if ($query->num_rows() > 0) {
            $all_income=0;
            foreach ($query->result() as $row) {
                $all_income += $row->value;
            }
            return $all_income;
        }
        return 0;
    }    



   public function  get_mother_masrof($mother_national_num_fk){
           $this->db->select("*");
        $this->db->from("family_income_duties");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("affect",1);
        $this->db->where("type",2);
        $query = $this->db->get();
        $all_income=0;
        if ($query->num_rows() > 0) {
            $all_income=0;
            foreach ($query->result() as $row) {
                $all_income += $row->value;
            }
            return $all_income;
        }
        return 0;
    }   
/*****************************************/   
   
   public function  get_mother_monthly_income($mother_national_num_fk){
           $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        $m_monthly_income=0;
        if ($query->num_rows() > 0) {
            $m_monthly_income=0;
            foreach ($query->result() as $row) {
                $m_monthly_income += $row->m_monthly_income;
            }
            return $m_monthly_income;
        }
        return 0;
    }
    
       public function  get_total_financial($mother_national_num_fk){
           $this->db->select("*");
        $this->db->from("financial");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        $total_finance=0;
        if ($query->num_rows() > 0) {
            $total_finance=0;
            foreach ($query->result() as $row) {
                $total_finance += $row->f_pension_amount +    $row->f_warranty_amount 
                + $row->f_annual_amount   + $row->f_insurance_amount + $row->f_other_amount;
            }
            return $total_finance;
        }
        return 0;
    }
    
    
    public function  get_member_num($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    }


    public function categoryByValue($value){

        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        return $query->row();
    }

    public  function get_mother_name($mother_national_num_fk){
      
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }




    //---------------------------------------------------------



}