<?php
class Model_import extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->main_table="office_imports";
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//=============================================================
    private   function HijriToJD($inp){
        $input_date=explode('/',$inp);
        $m=$input_date[1];
        $d=$input_date[0];
        $y=$input_date[2];
        $out= (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m)
            - (int)(($m - 1) / 2) + $d + 1948440 - 385;
        return  strtotime(jdtogregorian($out));
    }
//=============================================================
    public function insert(){
        $data['organization_other'] =  serialize($this->input->post('organization_other'));
       // var_dump($data['organization_other']); die;
        $data['import_type_id_fk'] = $this->chek_Null($this->input->post('import_type_id_fk'));
        $data['import_num'] = $this->chek_Null($this->input->post('import_num'));
        $data['chairman_committee_name'] = $this->chek_Null($this->input->post('chairman_committee_name'));
        $data['chairman_committee_type'] = $this->chek_Null($this->input->post('chairman_committee_type'));
        $data['organization_from_id_fk'] =  $this->chek_Null($this->input->post('organization_from_id_fk'));
        $data['transaction_id_fk'] =  $this->chek_Null($this->input->post('transaction_id_fk'));
        if($data['transaction_id_fk'] ==2){
        $data['organization_sub_from_id_fk'] =  $this->chek_Null($this->input->post('organization_sub_from_id_fk'));
        }else{
            $data['organization_sub_from_id_fk'] ='';
        }
        $data['importance_degree_id_fk'] = $this->chek_Null($this->input->post('importance_degree_id_fk'));
        $data['importance_degree_other'] = $this->chek_Null($this->input->post('importance_degree_other'));
        $data['registration_number'] = $this->chek_Null($this->input->post('registration_number'));
        $data['method_recived_id_fk'] = $this->chek_Null($this->input->post('method_recived_id_fk'));
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['about'] =$this->chek_Null($this->input->post('about'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
       // $data['date'] = $this->HijriToJD($this->chek_Null($this->input->post('date')));
         $data['date'] = strtotime($this->chek_Null($this->input->post('date')));
       
        $data['date_ar'] =$this->chek_Null($this->input->post('date'));
        
     //   $data['date_receipt_letter'] = $this->HijriToJD($this->chek_Null($this->input->post('date_receipt_letter')));
     //   $data['date_receipt_letter_ar'] =$this->chek_Null($this->input->post('date_receipt_letter'));
              $data['date_receipt_letter'] = strtotime($this->chek_Null($this->input->post('date_receipt_letter')));
      $data['date_receipt_letter_ar'] =$this->chek_Null($this->input->post('date_receipt_letter')); 
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_name'];
        $data['organization_dep'] = $this->chek_Null($this->input->post('organization_dep'));
        $data['organization_employee'] =  serialize($this->input->post('organization_employee'));
        $data['method_recived_other'] = $this->chek_Null($this->input->post('method_recived_other'));
        $this->db->insert($this->main_table,$data);
    }
    //=================================================================================
    public function select_last_value_fild($fild){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->$fild;
            }
            return $data;
        }
        return 0;
    }
    //=================================================================================
    public function insert_attachment($file,$f_id,$type) {
    
        $a = 1;
        foreach($file as $record):

            if($record !=''){
                $val['img']=$record;
            }else{
                $val['img']="Null";
            }

            $val['title'] =$this->chek_Null($this->input->post('title'.$a));
            $val['exp_imp_id_fk']=$f_id;
            $val['type'] = $type;
            $a++;
            $this->db->insert('exports_imports_attachment',$val);
        endforeach;
    }
    //=================================================================================
    public function insert_signatures($f_id,$type) {
        for ($e = 1 ; $e <= $_POST['signatures'] ; $e++)
        {
            $data['exp_imp_id_fk']=$f_id;
            $data['type'] = $type;
            $data['name'] = $this->input->post('name'.$e);
            $data['job'] = $this->input->post('job'.$e);
            $this->db->insert('signatures',$data);

        }
    }
    //=================================================================================
    public function have_branch($id){
        $this->db->select('id ,  name   ,  type_id_fk  , form_id ');
        $this->db->from('office_setting');
        $this->db->where('form_id ',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //=================================================================================
    public function select_transaction(){
        $this->db->select('id ,  name   ,  type_id_fk  , form_id');
        $this->db->from('office_setting');
        $this->db->where('type_id_fk',2);
        $this->db->where('form_id',0);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    //=================================================================================
    public function select_organization(){
        $this->db->select('id ,  name   ,  type_id_fk  , form_id');
        $this->db->from('office_setting');
        $this->db->where('type_id_fk',1);
        $this->db->order_by('id','DESC');
        $this->db->where('form_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //=================================================================================
    public function select(){
        $this->db->select('office_imports.*,
                           office_setting.name,
                           office_setting.mob,
                           office_setting.email,
                           office_setting.address');
        $this->db->from('office_imports');
        $this->db->join('office_setting', 'office_setting.id = office_imports.transaction_id_fk');
        $this->db->order_by('office_imports.id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //=================================================================================
    public function select_department(){
        $this->db->select('*');
        $this->db->from("department_jobs");
        $this->db->where("from_id_fk !=",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //=================================================================================
    public function select_employees(){
        $this->db->select('id , employee');
        $this->db->from("employees");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //=================================================================================


    public function getById($id){
        $h = $this->db->get_where($this->main_table, array('id'=>$id));
        return $h->row_array();
    }




    public function getimg_2($id){
        $this->db->select("*");
        $this->db->from("exports_imports_attachment");
        $this->db->where('exp_imp_id_fk', $id);
        $this->db->where('type', 2);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_signatures($id){
        $this->db->select("*");
        $this->db->from("signatures");
        $this->db->where('exp_imp_id_fk', $id);
        $this->db->where('type', 2);

        $query = $this->db->get();
        return $query->result();
    }


    public function delete_photo($id){
        $this->db->where('id',$id);
        $this->db->delete('exports_imports_attachment');
    }


    public function delete_signature($id){
        $this->db->where('id',$id);
        $this->db->delete('signatures');
    }




    public function update($id){
		$data['organization_other'] =  serialize($this->input->post('organization_other'));
        $data['import_type_id_fk'] = $this->chek_Null($this->input->post('import_type_id_fk'));
        $data['import_num'] = $this->chek_Null($this->input->post('import_num'));
		if($this->input->post('organization_employee') != ''){
			
        $data['organization_employee'] =  serialize($this->input->post('organization_employee'));
		}
        $data['organization_from_id_fk'] =  $this->chek_Null($this->input->post('organization_from_id_fk'));
        $data['transaction_id_fk'] =  $this->chek_Null($this->input->post('transaction_id_fk'));
        $data['importance_degree_id_fk'] = $this->chek_Null($this->input->post('importance_degree_id_fk'));
        $data['importance_degree_other'] = $this->chek_Null($this->input->post('importance_degree_other'));
        $data['registration_number'] = $this->chek_Null($this->input->post('registration_number'));

        $data['method_recived_id_fk'] = $this->chek_Null($this->input->post('method_recived_id_fk'));
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['about'] =$this->chek_Null($this->input->post('about'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
       // $data['date'] = $this->HijriToJD($this->chek_Null($this->input->post('date')));
         $data['date'] = strtotime($this->chek_Null($this->input->post('date')));
        $data['date_ar'] =$this->chek_Null($this->input->post('date'));
       
      //  $data['date_receipt_letter'] = $this->HijriToJD($this->chek_Null($this->input->post('date_receipt_letter')));
      //  $data['date_receipt_letter_ar'] =$this->chek_Null($this->input->post('date_receipt_letter'));
      $data['date_receipt_letter'] = strtotime($this->chek_Null($this->input->post('date_receipt_letter')));
      $data['date_receipt_letter_ar'] =$this->chek_Null($this->input->post('date_receipt_letter')); 
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_id'];

        $data['method_recived_other'] = $this->chek_Null($this->input->post('method_recived_other'));

        $this->db->where('id', $id);
        $this->db->update('office_imports',$data);


    }

    //=================================================================================



    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete($this->main_table);
    }

    public function getByArray($arr){
        $h = $this->db->get_where($this->main_table,$arr);
        return $h->row_array();
    }

    public function select_where($Conditions_arr){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function select_wherein($where_in_arr){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where_in($where_in_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function select_search_key($search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where($search_key,$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function select_all($order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function select_where_groupy($Conditions_arr,$grouby){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where($Conditions_arr);
        $this->db->group_by($grouby);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_field(){
        $query = $this->db->query("select * from ".$this->main_table);
        $field_array = $query->list_fields();
        return $field_array;
    }

    public function table_truncate (){
        $this->db->from($this->main_table);
        $this->db->truncate();
    }

}//END CLASS


