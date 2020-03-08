<?php
class Moshtriat_ayni_model extends CI_Model{

    public function get_storage($id){
        $this->db->where('type',$id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;

    }


    public function get_suppliers(){

        $query = $this->db->get('st_suppliers');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;

    }


    public function get_code($id){
        $this->db->where('storage_fk',$id);
        $query = $this->db->get('st_edafa_sarf_setting');
        if ($query->num_rows() >0 ){
            return $query->row();
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

    public function insert_moshtriat(){
        $data['ezn_rkm']= $this->input->post('ezn_rkm');
        $data['ezn_date']= strtotime($this->input->post('ezn_date')) ;
        $data['ezn_date_ar']= $this->input->post('ezn_date');
        $data['storage_fk']= $this->input->post('storage_fk');
        $data['storage_name']= $this->get_id('st_setting','id_setting',$this->input->post('storage_fk'),'title_setting');
        $data['rkm_hesab']= $this->input->post('rkm_hesab');
        $data['hesab_name']= $this->input->post('hesab_name');
        $data['pay_method']= $this->input->post('pay_method');
        $data['supplier_name']= $this->input->post('supplier_name');
        $data['supplier_fk']= $this->input->post('supplier_fk');

        $data['mostand_rkm']= $this->input->post('mostand_rkm');
        $data['all_value']= $this->input->post('all_value');

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


        $this->db->insert('st_moshtriat_ayni',$data);
        return $this->db->insert_id();

    }
    public function insert_asnaf_details($id){

       if (!empty($this->input->post('sanf_code'))) {
           $sanf_code = $this->input->post('sanf_code');
//            $details = $this->input->post('details');


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
                $data["sanf_salahia_date"] = strtotime($this->input->post('sanf_salahia_date')[$a]) ;
                $data["sanf_salahia_date_ar"] = $this->input->post('sanf_salahia_date')[$a];
                $data["rased_hali"] = $this->input->post('rased_hali')[$a];
                $data["lot"] = $this->input->post('lot')[$a];
                $data['ezn_rkm_fk'] = $id;
                $this->db->insert("st_moshtriat_ayni_details", $data);
            }

       }
    }

    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

    public function get_ezn(){
        $query = $this->db->get('st_moshtriat_ayni');
        if ($query->num_rows() >0 ){
            return $query->last_row()->ezn_rkm;
        }
        return 0;

    }
    public function display_moshtriat(){

        $query = $this->db->get('st_moshtriat_ayni');
        if ($query->num_rows() >0 ){
            return $query->result();
        }
        return false;
    }
    public function delete_moshtriat($id){
        $this->db->where('id',$id);
        $this->db->delete('st_moshtriat_ayni');

    }

    public function delete_details($id){
        $this->db->where('ezn_rkm_fk',$id);
        $this->db->delete('st_moshtriat_ayni_details');

    }
}