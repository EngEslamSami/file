<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Committee_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all_members()
    {
        $data['magls_member'] = $this->db->get('magls_members_table')->result();
        $data['assembly_member'] = $this->db->get('general_assembley_members')->result();
        $data['employee_member'] = $this->db->get('employees')->result();
        return $data;

    }

    public function insert_lgna()
    {



           $lgna_name=$this->input->post('lgna_name');

           $lgna_num=$this->input->post('lgna_num');
           $type=$this->input->post('type');


            $member_id=$this->input->post('member_ids');
            $member_job=$this->input->post('job_array');


            $count= count($member_job);
             for($x=0;$x<$count;$x++){
                $data['lagna_name']=$lgna_name;
                $data['lagna_num']=$lgna_num;
                $data['member_job']=$member_job[$x];
                $data['member_id']=$member_id[$x];
                $data['type']=$type;
                 $data['member_out_db']=0;
                 $data['date']=date("Y-m-d");
               $this->db->insert('lagna_members',$data);


            }
        echo "تمت اضافه الاعضاء بنجاح";


        }

    public function save_member_out()
    {
        $lgna_name=$this->input->post('lgna_name');

        $lgna_num=$this->input->post('lgna_num');



        $member_id=$this->input->post('members');
        $member_job=$this->input->post('job_array');
        $count= count($member_job);
        for($x=0;$x<$count;$x++){
            $data['lagna_name']=$lgna_name;
            $data['lagna_num']=$lgna_num;
            $data['member_job']=$member_job[$x];
            $data['member_out_db']=$member_id[$x];
            $data['type']=0;
            $data['member_id']=0;
            $data['date']=date("Y-m-d");
            $this->db->insert('lagna_members',$data);


        }
        echo("اعضاء".$count."تمت اضافتهم");


    }
    public function get_all_lgna()
    {
       // $this->db->select('distinct');
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
    public function get_lagna_member($num)
    {
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
    }
    public function get_member_name($num,$type,$id,$out)
    {
        if($type==1){


            $this->db->where('id',$id);
            return $this->db->get('magls_members_table')->row()->member_name;
        }
        if($type==2){
            $this->db->where('id',$id);
            return $this->db->get('general_assembley_members')->row()->name;
        }
        if($type==3){
            $this->db->where('id',$id);
            return $this->db->get('employees')->row()->employee;
        }
        if($type==0){
            return $out ;
        }

    }

public function delete_member($id,$field){
    $this->db->where($field,$id);
    $this->db->delete('lagna_members');
}

/********************************************/
public function get_all_member()
  {
      $this->db->order_by('id','desc');
      $lagna_num= $this->db->get('lagna_members')->row()->lagna_num;
      return $lagna_num;
  }
    public function get_member_lagna()
    {
        $this->db->where('lagna_num',$this->get_all_member());
        $query= $this->db->get('lagna_members')->result();
        $data=array();
        $x=0;
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->member_name=$this->get_member_name($row->lagna_num,$row->type,$row->member_id,$row->member_out_db);


           $x++;
        }
        return $data;
    }

    public function get_last_session()
    {
        $this->db->order_by('id','desc');
        $query=$this->db->get('selected_lagna_members');
        if($query->num_rows()>0){
          return  $query->row()->session_number;
        }else{
            return 0;

        }



    }
public function insert_selected_lagna()
{
    $member_id=$this->input->post('member_id');
    $member_name=$this->input->post('member_name');
    $member_type=$this->input->post('member_type');
    $lagna_name=$this->input->post('lagna_name');
    $lagna_num=$this->input->post('lagna_num');
    $lagna_date=$this->input->post('lagna_date');
    $galsa_num=$this->input->post('galsa_num');
   $count=count($member_name);
    for($i=0;$i<$count;$i++){

        $data['name']=$lagna_name;
        $data['lagna_number']=$lagna_num;
        $data['session_number']=$galsa_num;
        $data['member_type']=$member_type[$i];
        $data['member_id']=$member_id[$i];
        $data['member_name']=$member_name[$i];
        $data['date']=$lagna_date;

      $this->db->insert('selected_lagna_members',$data);
        



    }
    echo "تم  اختيار اعضاء الجلسه ";


}







 public function get_all_session()
    {
       
        $this->db->group_by('session_number');

        $query= $this->db->get('selected_lagna_members')->result();
    
        $data=array();
        $x=0;
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->members=$this->get_member_session($row->session_number);
            $x++;

        }
        return $data;

    }
    public function get_member_session($num)
    {
        $this->db->select('*');
        $this->db->from('selected_lagna_members');
        $this->db->where('session_number',$num);
        $this->db->order_by('id','asc');
         $query = $this->db->get();
       if ($query->num_rows() > 0) {
          $data  =$query->result() ;$i=0;
            foreach ($query->result() as $row) {
                  $data[$i]->galsa_member_job = $this->getByArray_job_name($row->member_type,$row->member_id);
                  $i++;
            }
          return  $data ; 
        }
        return false;
    }
      public function getByArray_job_name($type,$member_id){
        $h = $this->db->get_where("lagna_members",array("type"=>$type,"member_id"=>$member_id) );
        $data = $h->row_array();
        return $data["member_job"] ;
    }
    
    
    public function delete_member_galsa($field,$id)
    {
        $this->db->where($field,$id);
        $this->db->delete('selected_lagna_members');
    }


/******************************************************************************************/

  /*public function get_session_procedure($session_num)
    {
        $this->db->where('session_num_fk',$session_num);
       $this->db->where('procedure_id_fk !=',14);
    
        $this->db->group_by('procedure_id_fk');
        $query=$this->db->get('transformation_lagna');
      if($query->num_rows()>0)
      {
         
          $data = array();
          $x = 0;
          foreach ($query->result() as $row) {
              $data[$x] = $row;
              $data[$x]->decision = $this->get_decision($row->procedure_id_fk, $row->session_num_fk);
              $x++;

          }
          return $data;

      }else{
          return false;
      }
    }*/




    public function get_session_procedure($session_num){
        $this->db->where('session_num_fk',$session_num);
        $this->db->group_by('procedure_id_fk');
        $query=$this->db->get('transformation_lagna');
        if($query->num_rows()>0)
        {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->decision = $this->get_decision($row->procedure_id_fk, $row->session_num_fk);
                // $data[$x]->members_details = $this->get_members($row->file_num, $row->session_num_fk);
                $x++;

            }
            return $data;

        }else{
            return false;
        }
       }


    public function get_mahader_lagna_data($session_num){
        $this->db->select('session_num_fk,mehwar_id_fk,mehwar_title,mother_national_num');
        $this->db->where('session_num_fk',$session_num);
        $this->db->order_by('mehwar_id_fk','asc');
        $this->db->group_by('mehwar_id_fk');
        $query=$this->db->get('all_mahader_lagna_arch_ended');
        if($query->num_rows()>0)
        {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->mahder_details =
                    $this->get_mahder_details(array('session_num_fk'=>$session_num,'mehwar_id_fk'=>$row->mehwar_id_fk));
                
            
                
                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }
    public function get_father_members($arr){
        $this->db->select('*');
        $this->db->where($arr);
        $query=$this->db->get('all_mahader_lagna_arch_ended');
        if($query->num_rows()>0)
        {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }
    public function get_mahder_details($arr){
        $this->db->where($arr);
        $this->db->group_by('mother_national_num');
        $this->db->order_by('file_num','asc');
        $query=$this->db->get('all_mahader_lagna_arch_ended');
        if($query->num_rows()>0)
        {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->father=$this->get_father_name($row->mother_national_num);
                $data[$x]->members =$this->get_father_members(
                    array('file_num'=>$row->file_num ,
                        'mehwar_id_fk'=>$row->mehwar_id_fk,
                        'mother_national_num'=>$row->mother_national_num,
                        'session_num_fk'=>$row->session_num_fk)
                    );
                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }




    public  function get_decision($procedure,$session){

        $this->db->select('transformation_lagna.* ,family_reasons_settings.title as reason_title');
        $this->db->from('transformation_lagna');
        $this->db->join('family_reasons_settings', 'family_reasons_settings.id = transformation_lagna.reason_id_fk',"left");
        $this->db->where(array('session_num_fk'=>$session,'procedure_id_fk'=>$procedure));
        $this->db->order_by('transformation_lagna.file_num','asc');
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
            foreach($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->all_member=$this->get_member($row->mother_national_num,array(1,2,3));
                $data[$x]->armla=$this->get_mothers($row->mother_national_num,array(1));
                $data[$x]->yateem=$this->get_member($row->mother_national_num,array(2));
                $data[$x]->mostafid=$this->get_member($row->mother_national_num,array(3));
                $data[$x]->father=$this->get_father_name($row->mother_national_num);
                $data[$x]->file_num=$this->get_file_num($row->mother_national_num);
                //$data[$x]->all_members_details=$this->get_all_members_details($data[$x]->file_num);
                $data[$x]->members_details = $this->get_members($row->file_num, $row->session_num_fk,$row->mother_national_num);
                $x++;

            }
            return $data;

        }else{
            return false;
        }
    }

    public function get_members($file_num,$session_num_fk,$mother_num)
    {
        $this->db->where('file_num', $file_num);
        $this->db->where('session_num_fk', $session_num_fk);
        $query=$this->db->get('transformation_lagna_members');
        if($query->num_rows()>0)
        {

            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                if($row->person_id_fk ==$mother_num){
                    $data[$x]->armal=1;
                    $data[$x]->yatem =0;
                    $data[$x]->mostafed =0;
                    $data[$x]->total_num = ($data[$x]->armal+$data[$x]->yatem+$data[$x]->mostafed);
                }else{
                    $details =$this->get_member_details($row->person_id_fk);

                    if(!empty($details->categoriey_member)){

                        if($details->categoriey_member ==2){
                            $data[$x]->armal=0;
                            $data[$x]->yatem =1;
                            $data[$x]->mostafed =0;
                            $data[$x]->total_num = ($data[$x]->armal+$data[$x]->yatem+$data[$x]->mostafed);
                        }elseif ($details->categoriey_member ==3){
                            $data[$x]->armal=0;
                            $data[$x]->yatem =0;
                            $data[$x]->mostafed =1;
                            $data[$x]->total_num = ($data[$x]->armal+$data[$x]->yatem+$data[$x]->mostafed);
                        }


                    }else{
                        $data[$x]->armal=0;
                        $data[$x]->yatem =0;
                        $data[$x]->mostafed =0;
                        $data[$x]->mostafed =0;
                        $data[$x]->total_num =0;
                    }

                }
                $x++;
            }
            return $data;

        }else{
            return false;
        }
    }



    public function get_member_details($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('f_members');
        if($query->num_rows()>0){
            return $query->row();

        }else{

            return false;
        }

    }



    public function get_session_procedure2()
 {    $this->db->where('ab',1 );
 
     $this->db->order_by('file_num','asc');
      
    $query=$this->db->get('tttest');
    if($query->num_rows()>0)
    {
 
        $data = array();
        $x = 0;
        foreach ($query->result() as $row) { 
            $data[$x] = $row;
            $data[$x]->no = $this->get_no_file_num($row->file_num);
            
            $x++;

        }
        return $data;

    }else{
        return false;
    }
}

   public function get_no_file_num($file_num){
        $this->db->select('file_num');
        $this->db->from("tttest");
        $this->db->where("file_num",$file_num); // ""
 $this->db->where('ab',0 );
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }








public function get_mothers($mother_num,$arr)
{
   // $arr=array(1,2,3);
    $this->db->where_in('categoriey_m', $arr);
    $this->db->where('mother_national_num_fk', $mother_num);
    $this->db->where('halt_elmostafid_m', 1);
    $query=$this->db->get('mother');
    return $query->num_rows();
}

public function get_member($mother_num,$arr)
{
   // $arr=array(1,2,3);
    $this->db->where_in('categoriey_member', $arr);
    $this->db->where('mother_national_num_fk', $mother_num);
    $this->db->where('persons_status', 1);
    $query=$this->db->get('f_members');
    return $query->num_rows();
}


public function get_session_data($session_num)
{
    $this->db->where('session_number',$session_num);
    $query=$this->db->get('selected_lagna_members');
    if($query->num_rows()>0)
    {
     return $query->row();
    }else{
        return false;
    }

}
    public function get_father_name($mother_national_num)
    {
        $this->db->where('mother_national_num_fk',$mother_national_num);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->full_name;
        }else{
            return false;
        }

    }

    public function get_file_num($mother_national_num)
    {
        $this->db->where('mother_national_num',$mother_national_num);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
            return $query->row()->file_num;
        }else{
            return false;
        }

    }












}