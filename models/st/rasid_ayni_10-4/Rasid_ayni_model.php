<?php
class Rasid_ayni_model extends CI_Model{

    public function get_storage($id){
        $this->db->where('type',$id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;

    }

    public function get_asnaf(){
        $this->db->order_by('code');
        $query = $this->db->get('st_asnaf');
        if ($query->num_rows() >0 ){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->wehda_name= $this->get_wehda($row->whda);
                $i++;
            }
            return $data;

        }
        return false;

    }

    public function get_wehda($id){
        $this->db->where('id_setting',$id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() >0 ){
            return $query->row()->title_setting;
        }
        return false;
    }

    public function insert_rasid(){
        $data['proc_rkm']= $this->input->post('proc_rkm');
        $data['proc_date']= strtotime($this->input->post('proc_date')) ;
        $data['proc_date_ar']= $this->input->post('proc_date');
        $data['proc_type']= $this->input->post('proc_type');
        if ($this->input->post('proc_type')==1){
            $data['proc_type_n']= "رصيد أول المدة"  ;
        }
        elseif($this->input->post('proc_type')==2){
            $data['proc_type_n']= "فروقات أرصدة"  ;
        }

        $data['storage_fk']= $this->input->post('storage_fk');
        $data['storage_name']= $this->get_id("st_setting",'id_setting',$this->input->post('storage_fk'),"title_setting");

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

        $this->db->insert('st_ayniirasid',$data);
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
                $data['proc_rkm_fk'] = $id;
                $this->db->insert("st_ayniirasid_details", $data);
            }

        }
    }
    public function update_rasid($id){

        $data['proc_rkm']= $this->input->post('proc_rkm');
        $data['proc_date']= strtotime($this->input->post('proc_date')) ;
        $data['proc_date_ar']= $this->input->post('proc_date');
        $data['proc_type']= $this->input->post('proc_type');
        if ($this->input->post('proc_type')==1){
            $data['proc_type_n']= "رصيد أول المدة"  ;
        }
        elseif($this->input->post('proc_type')==2){
            $data['proc_type_n']= "فروقات أرصدة"  ;
        }

        $data['storage_fk']= $this->input->post('storage_fk');
        $data['storage_name']= $this->get_id("st_setting",'id_setting',$this->input->post('storage_fk'),"title_setting");

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

        $this->db->where('id',$id);
        $this->db->update('st_ayniirasid',$data);

    }

    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

    public function get_proc_rkm(){
        $query = $this->db->get('st_ayniirasid');
        if ($query->num_rows() >0 ){
            return $query->last_row()->proc_rkm;
        }
        return 0;

    }

    public function display_rasid(){
        $this->db->order_by('proc_rkm');
        $query = $this->db->get('st_ayniirasid');
        if ($query->num_rows() >0 ){
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $i++;
            }

         return $data ;
        }
        return false;
    }
    public function get_details($id){
        $this->db->where('proc_rkm_fk',$id);
        $query = $this->db->get('st_ayniirasid_details');
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

    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('st_ayniirasid');
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

    public function delete_rasid($id){
        $this->db->where('id',$id);
        $this->db->delete('st_ayniirasid');
    }
    public function delete_all_asnaf($id){
        $this->db->where('proc_rkm_fk',$id);
        $this->db->delete('st_ayniirasid_details');
    }
    public function delete_sanf($id){
        $this->db->where('id',$id);
        $this->db->delete('st_ayniirasid_details');

    }

}