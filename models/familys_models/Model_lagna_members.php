<?php
class Model_lagna_members extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->main_table="";
    }
    //     $this->db->join('users', 'users.usrID = users_profiles.usrpID',"left");
    //======================================

    public function select_all(){
        $this->db->select('*');
        $this->db->from("lagna");
        $this->db->order_by("id_lagna","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }



    public function select_table($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
          //  $data='';
            foreach ($query->result() as $row) {

$var = $this->check_lagna_members($row->id);
                if( $var  >0){
                   continue;
                }
                $data[$a] = $row;
            $a++; }
            return $data;
        }else{

            return 0;
        }

    }


    public function check_lagna_members($id){
        $this->db->select('*');
        $this->db->from("lagna_members");
        $this->db->where("member_id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }

    }
/*
    public function get_all_members(){
        $data['magls_member']     = $this->select_table('magls_members_table');
        $data['assembly_member'] = $this->select_table('general_assembley_members');
        $data['employee_member'] = $this->select_table('employees');
        if(!empty($data)){
            return $data;
        }else{
            return 0;
        }

    }*/
    
       public function get_all_members()
    {
        $data['magls_member'] = $this->select_table('md_all_magls_edara_members');
        $data['assembly_member'] = $this->select_table('md_all_gam3ia_omomia_members');
        $data['employee_member'] = $this->select_table('employees');
        if (!empty($data)) {
            return $data;
        } else {
            return 0;
        }

    }
    public function insert_lgna(){

        $lgna_name=$this->input->post('lagna_name');
        $lgna_num=$this->input->post('lgna_num');
        $lagna_id_fk=$this->input->post('lagna_num_show');
        $member_id=$this->input->post('members_id');
        $member_job=$this->input->post('members_job');
        $out_members_job=$this->input->post('out_members_job');
        $count= count($member_job);
        if(!empty($member_job)) {
            for ($x = 0; $x < $count; $x++) {
                $data['lagna_name'] = $lgna_name;
                $data['lagna_num'] = $lgna_num;
                $data['lagna_id_fk'] = $lagna_id_fk;
                $data['member_job'] = $member_job[$member_id[$x]];
                $data['member_id'] = $member_id[$x];
                $data['type']=$_POST['type'][$member_id[$x]];
                $data['member_out_db'] = 0;
                $data['date'] = date("Y-m-d");
                $this->db->insert('lagna_members', $data);
            }
        }
if(!empty($_POST['out_members_id'])){
        for($s=1;$s<=count($_POST['out_members_id']);$s++){
            $data2['lagna_name']=$lgna_name;
            $data2['lagna_num']=$lgna_num;
            $data2['lagna_id_fk']=$lagna_id_fk;
            $data2['member_job']=$out_members_job[$s];
            $data2['member_id']=0;
            $data2['member_out_db']=$_POST['out_members_id'][$s];
            $data2['type']=0;
            $data2['date']=date("Y-m-d");
         $this->db->insert('lagna_members',$data2);
        }
}
    }
    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("lagna_members");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data+1;
        }else{

            return 1;
        }

    }

    public function get_all_lgna(){
        $this->db->select('lagna_num,lagna_name');
        $this->db->distinct();
        $query=$this->db->get('lagna_members');
        $data=array();
        $i=0;
        foreach($query->result() as $row){
            $data[$i]=$row;
            $data[$i]->members=$this->get_lagna_member($row->lagna_num);
            $i++;

        }
        return $data;
    }
    /*public function get_lagna_member($num){
        $this->db->where('lagna_num',$num);
        $query=$this->db->get('lagna_members');
        $data=array();
        $x=0;
        foreach($query->result() as $row){
            $data[$x]=$row;
            $data[$x]->member_num=$this->get_member_name($row->lagna_num,$row->type,$row->member_id,$row->member_out_db);
            $x++;

        }
        return $data;
    }*/
    public function get_lagna_member($num, $suspend = false)
{
    $this->db->where('lagna_num', $num);
    if(!empty($suspend)){
        $this->db->where('suspend', $suspend);
    }
    $query = $this->db->get('lagna_members');
    $data = array();
    $x = 0;
    foreach ($query->result() as $row) {
        $data[$x] = $row;
        $data[$x]->member_num = $this->get_member_name($row->lagna_num, $row->type, $row->member_id, $row->member_out_db);
        $x++;

    }
    return $data;
}
    
    
    public function select_department_jobs(){
        $this->db->select('*');
        $this->db->from("department_jobs");
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }else{

            return 0;
        }

    }
    public function get_member_name($num,$type,$id,$out){
        if($type==1){
            $this->db->where('id',$id);
            $query = $this->db->get('magls_members_table');
            if ($query->num_rows() > 0) {
                return $query->row()->member_name;
            }
            return false;
        }
        if($type==2){
            $this->db->where('id',$id);
            //return $this->db->get('general_assembley_members')->row()->name;
            $query = $this->db->get('general_assembley_members');
            if ($query->num_rows() > 0) {
                return $query->row()->name;
            }
            return false;
        }
        if($type==3){
            $this->db->where('id',$id);
            //return $this->db->get('employees')->row()->employee;
            $query = $this->db->get('employees');
            if ($query->num_rows() > 0) {
                return $query->row()->employee;
            }
            return false;
        }
        if($type==0){
            return $out ;
        }
    }
   /* public function get_department_emps($id,$lagna_id){
        $arr = $this->Check_member_employees($lagna_id);

        $this->db->select('*');
        $this->db->from("employees");
        $this->db->where("administration",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if(!empty($arr)){
                if(in_array($row->id ,$arr)){
                    continue;
                }
                }
                    $data[] = $row;


            }
            return $data;
        }else{

            return 0;
        }

    }*/
  public function get_department_emps($id, $lagna_id)
    {
        $arr = $this->Check_member_employees($lagna_id);

        $this->db->select('*');
        $this->db->from("employees");
        $this->db->where("administration", $id);
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if (!empty($arr)) {
                    if (in_array($row->id, $arr)) {
                        continue;
                    }
                }
                $data[] = $row;


            }
            return $data;
        } else {

            return 0;
        }

    }
    
    public function change_suspend($id, $suspend)
{

    $data['suspend'] = 1 - $suspend;
    $this->db->where("id", $id)->update('lagna_members', $data);
}


  /* public function change_suspend($id)
    {

        $data['suspend'] = 1;
        $this->db->where("id", $id)->update('lagna_members', $data);
    }*/
    public function Check_member_employees($lagna_id){
        $this->db->select('*');
        $this->db->from("lagna_members");
        $this->db->where("type",3);
        $this->db->where("lagna_id_fk",$lagna_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[] = $row->member_id;
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function GetFromTable($member_job,$lagna_id){
        $this->db->select('*');
        $this->db->from("lagna_members");
        $this->db->where("member_job",$member_job);
        $this->db->where("lagna_id_fk",$lagna_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }

/*
    public function GetFromTable($type,$lagna_id){
        $this->db->select('*');
        $this->db->from("lagna_members");
        $this->db->where("type",$type);
        $this->db->where("lagna_id_fk",$lagna_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }*/


    public function delete_member($id,$field){
        $this->db->where($field,$id);
        $this->db->delete('lagna_members');
    }
}//END CLASS

?>
