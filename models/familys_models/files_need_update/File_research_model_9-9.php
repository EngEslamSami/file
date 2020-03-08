<?php
class File_research_model extends CI_Model{
    public function get_all_files(){
        $this->db->select('basic.*,
                           basic.mother_national_num  as  faher_name ,
                           
                           father.f_national_id     as  father_national,
                            father.full_name as father_full_name,
                           
                           mother.full_name     as  mother_name,
                           
                           
                           mother.mother_national_card_new     as  mother_new_card,
                           
                           files_status_setting.title as process_title ,
                           files_status_setting.color as files_status_color ,
                           mother.categoriey_m as categorey
                           
                            ');


        $this->db->from('basic');

        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status',"left");
        $this->db->where('basic.final_suspend',4);
        $this->db->where('basic.deleted',0);

        $arr_file = array(1,2);
        $this->db->where_in('basic.file_status',$arr_file);

        if ( !empty($this->input->post('date_from'))){
            $this->db->where('basic.file_update_date>=',$this->input->post('date_from'));
            $this->db->where('basic.file_update_date!=',0);
        }
        if ( !empty($this->input->post('date_to'))){
            $this->db->where('basic.file_update_date<=',$this->input->post('date_to'));
            $this->db->where('basic.file_update_date!=',0);
        }



        $this->db->order_by('file_num',"ASC");

        $query = $this->db->get();
        if($query->num_rows() >0){
            $data = $query->result_array(); $i =0;
            foreach ($query->result_array() as $array){
                $data[$i] =  $array;
                $data[$i]['nasebElfard'] =  $this->getNaseb($data[$i]['faher_name'],$data[$i]['categorey']);
                $i++;  }
            return $data;
        }
        return  $query->result_array();


    }
    public function getNaseb($mother_national_num_fk,$categoriey_m)
    {
        $this->db->select('*');
        $this->db->from('family_income_duties');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $query = $this->db->get();
        if($query->num_rows() >0){
            $total_income = 0;
            $total_duties = 0;
            $count =0;
            $data = $query->result(); $i =0;
            foreach ($query->result() as $row){

                if($row->affect == 1 && $row->type ==1){
                    $total_income +=$row->value;
                }
                if($row->affect == 1 && $row->type ==2){
                    $total_duties +=$row->value;
                }

            }
            if($categoriey_m == 1  || $categoriey_m == 2 ){
                $count =  $this->sum_mosfed_in_mother($mother_national_num_fk);
            }
            $member_num =$this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
            if($member_num == 0){
                $member_num = 1;
            }
            $total = $total_income - $total_duties;
            $data['naseb'] =$total  / $member_num;
            $data['f2a'] =$this->GetF2a_data($data['naseb']);

            return $data;

        }
        return 0;
    }
    public function sum_mosfed_in_mother($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('person_type',62);
        $this->db->where('halt_elmostafid_m',1);
        $query = $this->db->get();

        return $rowcount = $query->num_rows();


    }


    public function sum_mosfed_in_f_members($mother_national_num_fk){

        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);
        $this->db->where('member_person_type',62);
        $this->db->where('halt_elmostafid_member',1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }
    public function GetF2a_data($value)
    {
        $this->db->select("id,title,from,to,color");
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row();

        }else{
            return 0;
        }

    }
}