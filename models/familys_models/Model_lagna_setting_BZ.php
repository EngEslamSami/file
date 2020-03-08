<?php
class Model_lagna_setting extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->main_table="";
    }
    //     $this->db->join('users', 'users.usrID = users_profiles.usrpID',"left");
    //======================================
    public  function insert(){
        $data['lagna_code']=$this->input->post('lagna_code');
        $data['lagna_name']=$this->input->post('lagna_name');
        $data['date']=time();
        $data['date_s']=time();
        $data['publisher']=$_SESSION["user_id"];
        $this->db->insert("lagna",$data);
    }
    //==========================================
    public function select_last_value_fild(){
        $this->db->select('lagna_code');
        $this->db->from("lagna");
        $this->db->order_by("lagna_code","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->lagna_code;
            }
            return $data;
        }
        return 0;
    }
    //========================================
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
    //======================================
    public  function update($id){
        $data['lagna_code']=$this->input->post('lagna_code');
        $data['lagna_name']=$this->input->post('lagna_name');
        $data['date']=time();
        $data['date_s']=time();
        $data['publisher']=$_SESSION["user_id"];
        $this->db->where("id_lagna",$id);
        $this->db->update("lagna",$data);
    }

    //======================================
    public  function delete_lagna($id){
        $this->db->where("id_lagna",$id);
        $this->db->delete("lagna");
    }
    public function getByArray($id){
       // $h = $this->db->get_where("lagna",array("id_lagna"=>$id));
       // return $h->row_array();
        $query = $this->db->get_where("lagna",array("id_lagna"=>$id));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;

    }
    //======================================
    public function getBySession($session_number){
       $this->db->select('selected_lagna_members.* ,lagna.lagna_name , lagna.lagna_code ');
        $this->db->from("selected_lagna_members");
        $this->db->join('lagna', 'lagna.id_lagna = selected_lagna_members.lagna_id_fk',"left");
        $this->db->where(array("session_number"=>$session_number));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    //=======================================
    public function add_procedures_option_lagna(){
        $data['title'] = $this->input->post('option_name');
        $data['type'] = $this->input->post('type');
        $data['lagna_id_fk'] = $this->input->post('lagna_id_fk');
        $this->db->insert('procedures_option_lagna', $data);
    }
    //======================================
    public function lagna_option(){
        $this->db->select('procedures_option_lagna.* ,lagna.lagna_name');
        $this->db->from("procedures_option_lagna");
        $this->db->join('lagna', 'lagna.id_lagna = procedures_option_lagna.lagna_id_fk',"left");
        $this->db->group_by("lagna_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]->sub=$this->get_lagna_option($row->lagna_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }
    //======================================
    public function procedure_option_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('procedures_option_lagna');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }
    //======================================
    public function update_procedures_option_lagna($id){
        $data['title'] = $this->input->post('option_name');
        $data['lagna_id_fk'] = $this->input->post('lagna_id_fk');
          $data['type'] = $this->input->post('type');
        
        $this->db->where('id',$id);
        $this->db->update('procedures_option_lagna',$data);
    }
    //======================================
    public function delete_procedures_option_lagna($id){
        $this->db->where('id',$id);
        $this->db->delete('procedures_option_lagna');
    }
    //======================================
    public function get_lagna_option($lagna_id_fk){
        $this->db->select('*');
        $this->db->from("procedures_option_lagna");
        $this->db->where("lagna_id_fk",$lagna_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //======================================
    public function get_all_members(){
        $data['magls_member']     = $this->db->get('magls_members_table')->result();
        $data['assembly_member'] = $this->db->get('general_assembley_members')->result();
        $data['employee_member'] = $this->db->get('employees')->result();
        return $data;

    }
    //======================================
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
    //======================================
    public function get_lagna_member($num){
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
    //======================================
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
    //======================================
    public function insert_lgna(){
        $lgna_name=$this->input->post('lgna_name');
        $lgna_num=$this->input->post('lgna_num');
        $type=$this->input->post('type');
        $lagna_id_fk=$this->input->post('lgna_num');
        $member_id=$this->input->post('member_ids');
        $member_job=$this->input->post('job_array');
        $count= count($member_job);
        for($x=0;$x<$count;$x++){
            $data['lagna_name']=$lgna_name;
            $data['lagna_num']=$lgna_num;
            $data['lagna_id_fk']=$lagna_id_fk;
            $data['member_job']=$member_job[$x];
            $data['member_id']=$member_id[$x];
            $data['type']=$type;
            $data['member_out_db']=0;
            $data['date']=date("Y-m-d");
            $this->db->insert('lagna_members',$data);
        }
        echo "تمت اضافه الاعضاء بنجاح";
    }
    //======================================
    public function save_member_out(){
        $lgna_name=$this->input->post('lgna_name');
        $lgna_num=$this->input->post('lgna_num');
        $lagna_id_fk=$this->input->post('lgna_num');
        $member_id=$this->input->post('members');
        $member_job=$this->input->post('job_array');
        $count= count($member_job);
        for($x=0;$x<$count;$x++){
            $data['lagna_name']=$lgna_name;
            $data['lagna_num']=$lgna_num;
            $data['lagna_id_fk']=$lagna_id_fk;
            $data['member_job']=$member_job[$x];
            $data['member_out_db']=$member_id[$x];
            $data['type']=0;
            $data['member_id']=0;
            $data['date']=date("Y-m-d");
            $this->db->insert('lagna_members',$data);
        }
        echo("اعضاء".$count."تمت اضافتهم");
    }
    //======================================
    public function delete_member($id,$field){
        $this->db->where($field,$id);
        $this->db->delete('lagna_members');
    }
    //======================================
    //======================================  22-10-2018
  /*  public function update_approved_lagna(){
        $reason=$this->input->post('reason');
        $reason_text=$this->input->post('reason_text');
        $value=$this->input->post('value');
        $money=$this->input->post('money');
        $condition=$this->input->post('condition');
        $row=$this->input->post('row');
        $treat=$this->input->post('treat');
        
        $data['approved_lagna'] =$value;
        $data['reason_lagna']   =$reason_text;
        $data['reason_id_fk']  =$reason;
        $data['order_num']      =$this->input->post('glsa_num');
        $data['session_num']    =$this->input->post('glsa_num');
        $data['condition_id_fk']=$condition;
        $data['main_type_id_fk']=$this->input->post('main_type_id');
        
        $this->db->where('id',$row);
        $this->db->update('transformation_lagna',$data);
        
        
        
             if(!empty($_POST['ids'])){
            $halet_file = $_POST['halet_file'];
            $procedure = $_POST['procedure'];
            $person_id = $_POST['ids'];
            for ($a=0;$a<sizeof($_POST['ids']);$a++){
                // $data2['mother_national_num'] =$file_id;
                //$data2['session_num_fk'] =$this->get_last_session();
                // $data2['session_num_fk'] =$this->input->post('glsa_num');
                $procedure_arr =explode('-',$procedure[$a]);
                $halet_file_arr =explode('-',$halet_file[$a]);
                $data2['procedure_id_fk'] =$procedure_arr[0];
                $data2['procedure_title'] =$procedure_arr[1];
                $data2['halet_file_id_fk'] =$halet_file_arr[0];
                $data2['halet_file_title'] =$halet_file_arr[1];
                //  $this->db->insert('transformation_lagna_members',$data2);
                $this->db->where('person_id_fk',$person_id[$a]);
                $this->db->where('session_num_fk',$_POST['session_num_fk']);
                $this->db->update('transformation_lagna_members',$data2);


            }
        }
       
        
        
        
        if( $value==1){
            echo "تم بنجاح قبول الطلب";
        }else{
            echo "تم بنجاح رفض الطلب";
        }
    }
    */
    
        //16-2-2019

    public function update_approved_lagna(){




        $reason=$this->input->post('reason');
        $reason_text=$this->input->post('reason_text');
        $value=$this->input->post('value');
        $money=$this->input->post('money');
        $condition=$this->input->post('condition');
        $row=$this->input->post('row');
        $treat=$this->input->post('treat');

        $data['approved_lagna'] =$value;
        $data['reason_lagna']   =$reason_text;
        $data['reason_id_fk']  =$reason;
        $data['order_num']      =$this->input->post('glsa_num');
        $data['session_num']    =$this->input->post('glsa_num');
        $data['condition_id_fk']=$condition;
        $data['main_type_id_fk']=$this->input->post('main_type_id');


        //$this->db->where('id',$row);
       // $this->db->update('transformation_lagna',$data);




        /*************update_transformation_lagna_members************/

        // if($process ==5){


        if(!empty($_POST['ids'])){
            $halet_file = $_POST['halet_file'];
            $procedure = $_POST['procedure'];
            $person_id = $_POST['ids'];
            for ($a=0;$a<sizeof($_POST['ids']);$a++){
                // $data2['mother_national_num'] =$file_id;
                //$data2['session_num_fk'] =$this->get_last_session();
                // $data2['session_num_fk'] =$this->input->post('glsa_num');
                $procedure_arr =explode('-',$procedure[$a]);
                $halet_file_arr =explode('-',$halet_file[$a]);

                if(!empty($procedure_arr[0])){

                    $data2['procedure_id_fk'] =$procedure_arr[0];
                }
                  if(!empty($procedure_arr[1])){
                      $data2['procedure_title'] =$procedure_arr[1];
                  }

                if(!empty($halet_file_arr[0])){
                    $data2['halet_file_id_fk'] =$halet_file_arr[0];
                }


                if(!empty($halet_file_arr[1])){
                    $data2['halet_file_title'] =$halet_file_arr[1];
                }



                //  $this->db->insert('transformation_lagna_members',$data2);
                $this->db->where('person_id_fk',$person_id[$a]);
                $this->db->where('session_num_fk',$_POST['session_num_fk']);
                $this->db->update('transformation_lagna_members',$data2);



            }
        }
      //  die;
      //  die;
        //  die;
        //}

        /*************************/
        if( $value==1){
            echo "تم بنجاح قبول الطلب";
        }else{
            echo "تم بنجاح رفض الطلب";
        }



    }
    
    
    //======================================  22-10-2018
    //======================================
  public function getByid_lagna(){
        $h = $this->db->get_where('lagna',array("id_lagna"=>1));
        return $h->row_array();
    }
    //======================================
    public function get_all_lagnas(){
        return $this->db->get('lagna')->result();
    }
    //======================================
    public function get_last_session(){
        $this->db->order_by('id','desc');
        $query=$this->db->get('selected_lagna_members');
        if($query->num_rows()>0){
            return  $query->row()->session_number;
        }else{
            return 0;
        }
    }
    //======================================
   /* public function get_all_session(){
        $this->db->group_by('session_number');
       // $query= $this->db->get('selected_lagna_members')->result();
        $query = $this->db->get('selected_lagna_members');
        if ($query->num_rows() > 0) {
            $x = 0;
            $data = array();
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_member_session($row->session_number);
                $x++;
            }
            return $data;
        }
        return false ;
    }*/
    public function get_all_session($where = false){
        $this->db->group_by('session_number');
        if($where != false) {
            $this->db->where($where);
        }
        $this->db->order_by("id","DESC");
        $query = $this->db->get('selected_lagna_members');
        
        if ($query->num_rows() > 0) {
            $x = 0;
            $data = array();
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_member_session($row->session_number);
                $x++;
            }
            return $data;
        }
        return false ;
    }
    //======================================
    public function get_member_session($num){
        $this->db->where('session_number',$num);
        return  $this->db->get('selected_lagna_members')->result();
    }
    //======================================
    public function ususpend_other($lagna_id_fk){
        $data['suspend']=0;
        $this->db->where("lagna_id_fk ",$lagna_id_fk);
        $this->db->update('selected_lagna_members',$data);
    }
    //======================================
    /*public function insert_selected_lagna(){
        $member_id=$this->input->post('member_id');
        $member_name=$this->input->post('member_name');
        $member_type=$this->input->post('member_type');
        $lagna_name=$this->input->post('lagna_name');
        $lagna_num=$this->input->post('lagna_num');
        $lagna_id_fk=$this->input->post('lagna_num');
        $lagna_date=strtotime($this->input->post('lagna_date'));
        $galsa_num=$this->input->post('galsa_num');
        $count=count($member_name);
        for($i=0;$i<$count;$i++){
            $data['name']=$lagna_name;
            $data['lagna_number']=$lagna_num;
            $data['lagna_id_fk']=$lagna_id_fk;
            $data['session_number']=$galsa_num;
            $data['member_type']=$member_type[$i];
            $data['member_id']=$member_id[$i];
            $data['member_name']=$member_name[$i];
            $data['date']=$lagna_date;
            $data['suspend']=1;
            $this->db->insert('selected_lagna_members',$data);
        }
        echo "تم  اختيار اعضاء الجلسه ";
    }*/
    public function insert_selected_lagna(){
        foreach ($this->input->post('member_id') as $key=>$value) {
            $data['name']=$this->input->post('name');
            $data['year']=$this->input->post('year');
            $data['lagna_number']=$this->input->post('lagna_number');
            $data['lagna_id_fk']=$this->input->post('lagna_number');
            $data['session_number']=$this->input->post('session_number');
            $data['member_type']=$this->input->post('member_type')[$key];
            $data['member_id']=$value;
            $data['member_name']=$this->input->post('member_name')[$key];
            $data['member_lagna_id_fk']=$this->input->post('member_lagna_id_fk')[$key];
            $data['date']=strtotime($this->input->post('date'));
            $data['suspend']=0;
            $this->db->insert('selected_lagna_members',$data);
        }
    }
      public function suspendLangna($session_number, $suspend)
    {
        $data['suspend']=!$suspend;
        $this->db->where("session_number",$session_number)
                 ->update('selected_lagna_members',$data);
        return $data['suspend'];
    }
    public function deleteLagna($session_number)
    {
        $this->db->where("session_number",$session_number)
                 ->delete('selected_lagna_members');
    }
    
    public function add_attachment($session_number,$file){
        $data["session_attachment"]=$file;
        $this->db->where("session_number",$session_number)->update('selected_lagna_members',$data);
        
    }
    public function delete_attachment($session_number){
       $data["session_attachment"]="0";
        $this->db->where("session_number",$session_number)->update('selected_lagna_members',$data);
        
    }
    
    public function editLagna($session_number)
    {
        $this->deleteLagna($session_number);
        $this->insert_selected_lagna();
    }
    //======================================
    public function delete_member_galsa($field,$id){
        $this->db->where($field,$id);
        $this->db->delete('selected_lagna_members');
    }
    //======================================
    public function get_member_lagna($id){
        $this->db->where('lagna_id_fk',$id);
        $query= $this->db->get('lagna_members')->result();
        $data=array();
        $x=0;
        foreach($query as $row) {
            $data[$x]=$row;
            $data[$x]->member_name=$this->get_member_name($row->lagna_num,$row->type,$row->member_id,$row->member_out_db);
            $x++;
        }
        return $data;
    }
    //======================================
    /**
     *   ===============================================================================================================
     *
     *
     *
     *   ===============================================================================================================
     */

    //========================================
    public function get_member_session_open($session_number){
        $this->db->select('selected_lagna_members.* , lagna.lagna_name as  lagna_title');
        $this->db->from('selected_lagna_members');
        $this->db->join('lagna', 'lagna.id_lagna = selected_lagna_members.lagna_id_fk',"left");
        //$this->db->join('', 'lagna.id_lagna = selected_lagna_members.lagna_id_fk',"left");
        $this->db->where('session_number',$session_number);
        $query= $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false ;
    }
  
    /**
     *   ===============================================================================================================
     *
     *
     *
     *   ===============================================================================================================
     */
     
       public function update_approved_lagna_sarf(){
        $reason=$this->input->post('reason');
        $reason_text=$this->input->post('reason_tex');
        $value=$this->input->post('value');
        $row=$this->input->post('row');
        $data['approved_lagna'] =$value;
        $data['reason_lagna']   =$reason_text;
        $data['reason_id_fk']  =$reason;
        $this->db->where('id',$row);
        $this->db->update('transformation_lagna',$data);
        if( $value==1){
            echo "تم بنجاح قبول الطلب";
        }else{
            echo "تم بنجاح رفض الطلب";
        }
    }  
 /**************************************************************************************/
 
 
 public function get_from_trans(){
    $this->db->select('*');
    $this->db->from("transformation_lagna");
    $this->db->where_in('procedure_id_fk', array('2','4','12'));
    $this->db->where("person_details !=","");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $x=0;
        foreach ($query->result() as $row){
            $data[$x] =$row;
            $array = json_decode($row->person_details, true);
            //$data[$x]=$array;

            if(!empty($array)){
                foreach ($array as $one){
                    $data2['file_num'] =$row->file_num;
                    $data2['mother_national_num'] =$row->mother_national_num;
                    $data2['session_num_fk'] =$row->session_num_fk;
                    $data2['procedure_id_fk'] =$row->procedure_id_fk;
                    $data2['procedure_title'] =$row->title;
                    //$data2['halet_file_id_fk'] =$this->chek_Null($this->input->post('halet_file_id_fk'));
                    //$data2['halet_file_title'] =$this->chek_Null($this->input->post('halet_file_title'));
                    //$person_id_fk =explode('-',$row);
                    $data2['person_id_fk']= $one;
                    $data2['person_name']= $this->getName($one,$row->mother_national_num);



                       $this->db->insert('transformation_lagna_members',$data2);

                }
            }

            $x++;}
        return $data ;
    }
    return false;
}




public function getName($id,$mother_num){
    if($id == $mother_num){
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_num));
        if ($h->num_rows() > 0) {
            return $h->row_array()['full_name'];
        }else{
            return false;

        }
    }else{

        $h = $this->db->get_where("f_members", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['member_full_name'];
        }else{
            return false;

        }
    }
}    
     

}//END CLASS

?>
