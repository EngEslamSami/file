<?php

class Sarf_order_model extends CI_Model{

    public function get_storage($type){

        $this->db->where('type',$type);
        return $this->db->get('st_setting')->result();
    }




    public function get_family(){
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

        $this->db->order_by('file_num',"ASC");

        $query = $this->db->get();
        if($query->num_rows() >0){
            $data = $query->result(); $i =0;
            foreach ($query->result() as $row){
                $data[$i] =  $row;
                $data[$i]->nasebElfard =  $this->getNaseb($row->faher_name,$row->categorey);
                $data[$i]->mosatfed_num = $this->sum_mosfed_in_mother($row->mother_national_num)+ $this->sum_mosfed_in_f_members($row->mother_national_num) ;
                $i++;  }
            return $data;
        }
        return  $query->result();

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

    public function get_ezn_rkm(){
        $query = $this->db->get('st_ezn_sarf');
        if ($query->num_rows() >0 ){
            return $query->last_row()->ezn_rkm;
        }
        return 0;

    }

    public function get_code($id){
        $this->db->where('storage_fk',$id);
        $query = $this->db->get('st_edafa_sarf_setting');
        if ($query->num_rows() >0 ){
            return $query->row();
        }
        return 0;

    }

    public function insert_sarf(){
        $data['ezn_rkm']= $this->input->post('ezn_rkm');
        $data['ezn_date']= strtotime($this->input->post('ezn_date'));
        $data['ezn_date_ar']= $this->input->post('ezn_date');
        $data['storage_fk']= $this->input->post('storage_fk');
        $data['storage_name']= $this->get_id("st_setting",'id_setting',$this->input->post('storage_fk'),"title_setting");
        $data['rkm_hesab']= $this->input->post('rkm_hesab');
        $data['hesab_name']= $this->input->post('hesab_name');
        $data['all_value']= $this->input->post('all_value');
        $data['sarf_type']= $this->input->post('sarf_type');
        $data['sarf_to_fk']= $this->input->post('sarf_to_fk');
        $data['sarf_to_name']= $this->input->post('sarf_to_name');
        $data['mostand_rkm']= $this->input->post('mostand_rkm');
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
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

        $this->db->insert('st_ezn_sarf',$data);
        return $this->db->insert_id();
    }
    public function insert_asnaf_details($id){

        if ($this->get_details($id) > 0) {
            $this->delete_all_asnaf($id);
        }
        if (!empty($this->input->post('sanf_code'))) {
            $sanf_code = $this->input->post('sanf_code');

            for ($a = 0; $a < count($sanf_code); $a++) {
                $data["sanf_code"] = $sanf_code[$a];
                $data["sanf_coade_br"] = $this->input->post('sanf_coade_br')[$a];
                $data["sanf_name"] = $this->input->post('sanf_name')[$a];
                $data["sanf_whda"] = $this->input->post('sanf_whda')[$a];
                $data["sanf_rased"] = $this->input->post('sanf_rased')[$a];
                $data["sanf_amount"] = $this->input->post('sanf_amount')[$a];
                $data["sanf_rased"] = $this->input->post('sanf_rased')[$a];
                $data["sanf_one_price"] = $this->input->post('sanf_one_price')[$a];
                $data["all_egmali"] = $this->input->post('all_egmali')[$a];

                if (!empty($this->input->post('sanf_salahia_date')[$a])){
                    $data["sanf_salahia_date"] = strtotime($this->input->post('sanf_salahia_date')[$a]) ;
                    $data["sanf_salahia_date_ar"] = $this->input->post('sanf_salahia_date')[$a];
                }

                $data["rased_hali"] = $this->input->post('rased_hali')[$a];
                $data["lot"] = $this->input->post('lot')[$a];
                $data['ezn_rkm_fk'] = $id;
                $this->db->insert("st_ezn_sarf_details", $data);
            }

        }
    }


    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

    public function get_details($id){
        $this->db->where('ezn_rkm_fk',$id);
        $query = $this->db->get('st_ezn_sarf_details');
        if ($query->num_rows() >0 ){
            $i=0;
            foreach ($query->result() as $row ){
                $data[$i]= $row;
                $data[$i]->salhia= $this->get_id("st_asnaf",'code',$row->sanf_code,"slahia");;
                $i++;
            }
            return $data;
        }
        return 0;

    }
    public function delete_all_asnaf($id){
        $this->db->where('ezn_rkm_fk',$id);
        $this->db->delete('st_ezn_sarf_details');
    }

    public function display_sarf(){
       $query =  $this->db->get('st_ezn_sarf');
       if ($query->num_rows()>0){
           $i =0;
           foreach ($query->result() as $row){
               $data[$i]= $row;
               $data[$i]->asnaf= $this->get_all_asnaf($row->id);
               $i++;
           }
           return $data;
       }
    }
    public function get_all_asnaf($id){
        $this->db->where('ezn_rkm_fk',$id);
        return $this->db->get('st_ezn_sarf_details')->result();

    }

    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('st_ezn_sarf');
        if ($query->num_rows() >0 ){
            $i= 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->details= $this->get_details($row->id);
                $i++;

            }
            return $data;

        }
        return 0;
    }

    public function delete_sarf($id){
        $this->db->where('id',$id);
        $this->db->delete('st_ezn_sarf');

    }

}
