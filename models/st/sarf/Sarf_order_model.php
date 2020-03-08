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
        $this->db->where('basic.file_status',1);
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
        $data['responsable_name'] = $this->input->post('responsable_name');

        $this->db->insert('st_ezn_sarf',$data);
        return $this->db->insert_id();
    }
    
    
            public function insert_asnaf_details(){
        $ezn_rkm = $this->input->post('ezn_rkm');

        if ($this->get_details($ezn_rkm) > 0) {
            $this->delete_all_asnaf($ezn_rkm);
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
                $data["storage_id_fk"] = $this->input->post('storage_fk');

                if (!empty($this->input->post('sanf_salahia_date')[$a])){
                    $data["sanf_salahia_date"] = strtotime($this->input->post('sanf_salahia_date')[$a]) ;
                    $data["sanf_salahia_date_ar"] = $this->input->post('sanf_salahia_date')[$a];
                }

                $data["rased_hali"] = $this->input->post('rased_hali')[$a];
                $data["lot"] = $this->input->post('lot')[$a];
          
                $data['ezn_rkm_fk'] = $ezn_rkm;;
                $this->db->insert("st_ezn_sarf_details", $data);
            }

        }
    }
  /*  public function insert_asnaf_details($id){

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
                $data["storage_id_fk"] = $this->input->post('storage_fk')[$a];

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
*/

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
    
    
        public function display_sarf_deport_finance_zero(){
        $this->db->where('finance_deport',0);
       $query =  $this->db->get('st_ezn_sarf');
       if ($query->num_rows()>0){
           $i =0;
           foreach ($query->result() as $row){
               $data[$i]= $row;
             //  $data[$i]->asnaf= $this->get_all_asnaf($row->id);
               $data[$i]->asnaf= $this->get_all_asnaf($row->ezn_rkm);
               $i++;
           }
           return $data;
       }
    }
            public function display_sarf_deport_finance_one(){
        $this->db->where('finance_deport',1);
       $query =  $this->db->get('st_ezn_sarf');
       if ($query->num_rows()>0){
           $i =0;
           foreach ($query->result() as $row){
               $data[$i]= $row;
               $data[$i]->asnaf= $this->get_all_asnaf($row->ezn_rkm);
               $i++;
           }
           return $data;
       }
    }
            public function display_sarf_be_in_finance(){
        $this->db->where('finance_deport',1);
       $query =  $this->db->get('st_ezn_sarf');
       if ($query->num_rows()>0){
           $i =0;
           foreach ($query->result() as $row){
               $data[$i]= $row;
               $data[$i]->asnaf= $this->get_all_asnaf($row->ezn_rkm);
               $i++;
           }
           return $data;
       }
    }
    
    

    public function display_sarf(){
       $query =  $this->db->get('st_ezn_sarf');
       if ($query->num_rows()>0){
           $i =0;
           foreach ($query->result() as $row){
               $data[$i]= $row;
               $data[$i]->asnaf= $this->get_all_asnaf($row->ezn_rkm);
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
                $data[$i]->jwal = $this->get_jwal($row->sarf_type, $row->sarf_to_fk);
                $data[$i]->family_cat_name = $this->get_family_cat_name($row->sarf_type, $row->sarf_to_fk);
             //   $data[$i]->details= $this->get_details($row->id);
                   $data[$i]->store_emp = $this->get_store_emp($row->storage_fk);
                     $data[$i]->details= $this->get_details($row->ezn_rkm);
                $i++;

            }
            return $data;

        }
        return 0;
    }
    
        public function get_jwal($sarf_type, $sarf_to_fk)
    {
        $tables = array('', 'basic', 'st_gehat');
        $tables_where = array('', 'file_num', 'id');
        $tables_select = array('', 'contact_mob', 'mob');

        $q = $this->db->select($tables_select[$sarf_type])->where($tables_where[$sarf_type], $sarf_to_fk)->get($tables[$sarf_type])->row();
        if ($sarf_type == 1) {
            return $q->contact_mob;
        } elseif ($sarf_type == 2) {
            return $q->mob;

        }
    }

    public function get_family_cat_name($sarf_type, $sarf_to_fk)
    {
        if ($sarf_type == 1) {
            $q = $this->db->where('file_num', $sarf_to_fk)->get('basic')->row();
            return $q->family_cat_name;
        } elseif ($sarf_type == 2) {
            return false;

        }
    }

    public function delete_sarf($id){
        $this->db->where('id',$id);
        $this->db->delete('st_ezn_sarf');

    }
    // _________ 24-4 ______________//

    public function update_sarf($id){

        $data['ezn_rkm']= $this->input->post('ezn_rkm');
        $data['ezn_date']= strtotime($this->input->post('ezn_date'));
        $data['ezn_date_ar']= $this->input->post('ezn_date');
        $data['storage_fk']= $this->input->post('storage_fk');
        $data['storage_name']= $this->get_id("st_setting",'id_setting',$this->input->post('storage_fk'),"title_setting");
        $data['rkm_hesab']= $this->input->post('rkm_hesab');
        $data['hesab_name']= $this->input->post('hesab_name');
        $data['all_value']= $this->input->post('all_value');

        if ($this->input->post('sarf_type')){
            $data['sarf_type']= $this->input->post('sarf_type');
        }

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
      $data['responsable_name'] = $this->input->post('responsable_name');
        $this->db->where('id',$id);
        $this->db->update('st_ezn_sarf',$data);
    }
//==================================================
    public function select_gehat(){

        $query = $this->db->get('st_gehat');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function insert_geha(){
        $data['name'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $data['date'] =date("Y-m-d");
        $this->db->insert('st_gehat', $data);
    }

    public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('st_gehat');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }

    public function update_geah($id){


        $data['name']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $data['date']= date("Y-m-d");
        $this->db->where('id',$id);
        $this->db->update('st_gehat',$data);
    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('family_letter_setting');
    }

   /* public function filter_ezn_sarf()
    {
        $arr_filed = array('', 'sarf_to_fk', 'date');
        $store_id = $this->input->post('store_id');
        $select = $this->input->post('select');
        $to = $this->input->post('to');
        $from = $this->input->post('from');
        if (!empty($store_id)) {
            $this->db->where('storage_fk', $store_id);
        }
        if ($select != 0) {
            $this->db->where('sarf_type', $select);
            $this->db->where($arr_filed[$select] . '>=', $from);
            $this->db->where($arr_filed[$select] . '<=', $to);
        }
        return $this->db->get('st_ezn_sarf')->result();


    }*/



  /*  public function filter_ezn_sarf()
    {
        $arr_filed = array('', 'sarf_to_fk', 'date');

        $store_id = $this->input->post('store_id');
        $select = $this->input->post('select');
        $to = $this->input->post('to');
        $from = $this->input->post('from');
        $checkbox_value = $this->input->post('checkbox_value');
        $arr_to = array('', $to, strtotime($to));
        $arr_from = array('', $from, strtotime($from));
        if (!empty($store_id)) {
            $this->db->where('storage_fk', $store_id);
        }
        if ($select != 0) { 
            if ($select == 1) {
              //  $this->db->where('sarf_type', 1);

            }
            $this->db->where($arr_filed[$select] . '>=', $arr_from[$select]);
            $this->db->where($arr_filed[$select] . '<=', $arr_to[$select]);
        }

        if (!empty($checkbox_value)) {
            foreach ($checkbox_value as $value) {
                $this->db->where('id', $value);

            }
        }

        return $this->db->get('st_ezn_sarf')->result();


    }*/
       public function filter_ezn_sarf()
    {
        $arr_filed = array('', 'sarf_to_fk', 'ezn_date');

        $store_id = $this->input->post('store_id');
        $select = $this->input->post('select');
        $to = $this->input->post('to');
        $from = $this->input->post('from');
        $checkbox_value = $this->input->post('checkbox_value');
        $arr_to = array('', $to, strtotime($to));
        $arr_from = array('', $from, strtotime($from));
        if (!empty($store_id)) {
            $this->db->where('storage_fk', $store_id);
        }
        if ($select != 0) {
            if (!empty($arr_from[$select])) {
                $this->db->where($arr_filed[$select] . '>=', $arr_from[$select]);
            }
            if (!empty($arr_to[$select])) {
                $this->db->where($arr_filed[$select] . '<=', $arr_to[$select]);
            }
        }

        if (!empty($checkbox_value)) {
            $checkbox_value = array_map('intval', $checkbox_value);
            $this->db->where_in('id', $checkbox_value);
        }

        return $this->db->get('st_ezn_sarf')->result();
//        return $this->db->get('st_ezn_sarf');


    }
    
       public function insert_attach($id, $all_img)
    {


        if (!empty($all_img)) {
            $img_count = count($all_img);
            $title = $this->input->post('title');

            for ($a = 0; $a < $img_count; $a++) {
                $files['ezn_rkm_fk'] = $id;
                $files['file'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert('st_ezn_sarf_attach', $files);
            }

        }


    }
    
  
  public function family_member($file_num)
{
    $q = $this->db->select('mother.mother_national_num_fk,mother.full_name')->where('basic.file_num', $file_num)
        ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->get('mother')->row();

    if (!empty($q)) {
        $q->sons = $this->db->select('member_full_name')->where('mother_national_num_fk', $q->mother_national_num_fk)
            ->get('f_members')->result();
        return $q;
    }
    return false;

}
  
  public function get_store_emp($store_id)
{
    $emp_code = $this->db->where('storage_fk', $store_id)->get('st_edafa_sarf_setting')->row()->emp_code;
    $emp_name = $this->db->where('emp_code', $emp_code)->get('employees')->row()->employee;

    return $emp_name;
}
    
    
  public function update_status($id)
{

    $query = $this->db
        ->select('finance_deport')
        ->from('st_ezn_sarf')
        ->where('id', $id)
        ->get()->row()->finance_deport;
    if ($query == 0) {
        $data['finance_deport'] = 1;
    } else if ($query == 1) {
        $data['finance_deport'] = 0;
    }


      $data['finance_deport_date_ar'] =date('Y-m-d'); 
       $data['finance_deport_date'] = strtotime(date('Y-m-d'));
      $data['finance_deport_publisher_id'] = $_SESSION['user_id'];
      $data['finance_deport_publisher_name'] = $this->getUserName($_SESSION['user_id']);





    $this->db->where('id', $id);
    $this->db->update('st_ezn_sarf', $data);
   // return $data['finance_deport'];

}  
    
  
  
 public function delete_attach($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('st_ezn_sarf_attach');
    }


  
    public function get_by_id_morfq($id){
        $this->db->where('id',$id);
        $query = $this->db->get('st_ezn_sarf');
        if ($query->num_rows() >0 ){
            $i= 0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
              //  $data[$i]->nashat_name= $this->get_id('st_setting','id_setting',$row->nshat,'title_setting');
                $data[$i]->morfqat= $this->get_morfaq($row->ezn_rkm);

                $i++;

            }
            return $data;

        }

        return 0;
    }
    public function get_morfaq($id){
        $this->db->where('ezn_rkm_fk',$id);
        $query = $this->db->get(' st_ezn_sarf_attach');
        if ($query->num_rows() >0 ){
            //return $query->result();
            $i = 0;
            // foreach ($query->result() as $row){
            //     $data[$i]= $row;
            //     $data[$i]->morfqq = explode('//',$row->file);
            //     $data[$i]->morfq_name=  $data[$i]->morfqq[1];

            //     $i++;
            // }
            return $query->result();

        }
        return 0;

    } 
  
  
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }

     public function update_deport($ezn_id)
    {
        if (!empty($ezn_id)) {
            foreach ($ezn_id as $item) {
                $data['finance_deport'] = 1;
                $data['finance_deport_date'] = strtotime(date('Y-m-d'));
                $data['finance_deport_date_ar'] = date('Y-m-d');
                $data['finance_deport_publisher_name'] = $this->getUserName($_SESSION['user_id']);
                $this->db->where('id', $item)->update('st_ezn_sarf', $data);
            }
            return 1;
        } else {
            return 0;
        }

    }
    
}
