<?php
class Model_deport_family extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }
    //====================================================
    public  function get_today_donations($Conditions_arr){
        $this->db->select('cash_donations.* ,
                           programs_depart.program_name   ,
                           sponsors.name as sponsors_name  ,
                           donors.name as donors_name  ,
                           account_settings.title');
        $this->db->join('programs_depart','programs_depart.id=cash_donations.program_id_fk','LEFT');
        $this->db->join('sponsors','sponsors.id=cash_donations.person_id','LEFT');
        $this->db->join('donors','donors.id=cash_donations.person_id','LEFT');
        $this->db->join('account_settings','account_settings.id=cash_donations.account_settings_id_fk','LEFT');
        $this->db->from("cash_donations");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //====================================================
    public function select_all(){
        $this->db->select("*");
        $this->db->from('accounts_group');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {

                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {

                                                $data[$row5->id] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }
            return $data;
        }

    }
    //====================================================
    public function select_all2(){
        $this->db->select("*");
        $this->db->from('accounts_group');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    $var['dis'.$row->id] = 'disabled';
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {
                            $var['dis'.$row2->id] = 'disabled';
                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    $var['dis'.$row3->id] = 'disabled';
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {

                                                $data[$row5->id] = $row5;
                                            }}
                                    }}
                            }
                        }
                    }
                }
            }
            return $var;
        }
    }
    //====================================================
    public function deport_today_onations(){
        $data['pill_num']= $this->input->post('qued_num');
        $data['paid_type']= $this->input->post('paid_type');
        $data['date']= strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['publisher']=$_SESSION["user_id"];
        $data['process']=4;
        foreach ($this->input->post('madeen_value') as $key=>$x){
            $data['p_cost']= $x;
            $data['madeen']= $this->input->post('madeen_acoount_name')[$key];
            $data['dayen']= 0;
            $this->db->insert("all_deports",$data);
        }
        foreach ($this->input->post('dayen_value') as $keys=>$y){
            $data['p_cost']= $y;
            $data['madeen']= 0;
            $data['dayen']=  $this->input->post('dayen_acoount_name')[$keys];
            $this->db->insert("all_deports",$data);
        }
    }
    //====================================================
    public  function update_deport_today_onations($ids){
        foreach ($ids as $key=>$value){
            $data["deport"]=1;
            $this->db->where("id",$value);
            $this->db->update("cash_donations",$data);
        }
    }
    //====================================================
    public function select_last_value_fild($process){
        $this->db->select('pill_num');
        $this->db->from("all_deports");
        $this->db->where("process",$process);
        $this->db->order_by('id',"DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->pill_num;
            }
            return $data;
        }
        return 0;
    }
    //====================================================
    public  function get_participation_money($Conditions_arr){
        $this->db->select('participation_money.* ,
                           programs_depart.program_name   ,
                           sponsors.name as sponsors_name  ,
                           donors.name as donors_name  ,
                           account_settings.title');
        $this->db->join('programs_depart','programs_depart.id=participation_money.program_id_fk','LEFT');
        $this->db->join('sponsors','sponsors.id=participation_money.donor_id','LEFT');
        $this->db->join('donors','donors.id=participation_money.donor_id','LEFT');
        $this->db->join('account_settings','account_settings.id=participation_money.account_settings_id_fk','LEFT');
        $this->db->from("participation_money");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //====================================================
    public function deport_participation_money(){
        $data['pill_num']= $this->input->post('qued_num');
        $data['paid_type']= $this->input->post('paid_type');
        $data['date']= strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['publisher']=$_SESSION["user_id"];
        $data['process']=5;
        foreach ($this->input->post('madeen_value') as $key=>$x){
            $data['p_cost']= $x;
            $data['madeen']= $this->input->post('madeen_acoount_name')[$key];
            $data['dayen']= 0;
            $this->db->insert("all_deports",$data);
        }
        foreach ($this->input->post('dayen_value') as $keys=>$y){
            $data['p_cost']= $y;
            $data['madeen']= 0;
            $data['dayen']=  $this->input->post('dayen_acoount_name')[$keys];
            $this->db->insert("all_deports",$data);
        }
    }
    //====================================================
    public  function update_participation_money($ids){
        foreach ($ids as $key=>$value){
            $data["deport"]=1;
            $this->db->where("id",$value);
            $this->db->update("participation_money",$data);
        }
    }
    //====================================================
    public function undeport_payment(){
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('deport',0);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->orphans_name = $this->get_orphans_name($p_cat->orphans_id_fk);
            $categories[$i]->program_name = $this->get_program_name($p_cat->program_id_fk);
            $i++;
        }
        return $categories;
    }
    //====================================================
    public function get_orphans_name($id){
        $h = $this->db->get_where("f_members", array('id'=>$id));
        $data=$h->row_array();
        return $data['member_full_name'];
    }
    //====================================================
    public function get_program_name($id){
        $h = $this->db->get_where("programs_depart", array('id'=>$id));
        $data=$h->row_array();
        return $data['program_name'];
    }

    //====================================================
    public function deport_payment(){
        $data['pill_num']= $this->input->post('qued_num');
        $data['paid_type']= $this->input->post('paid_type');
        $data['date']= strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['publisher']=$_SESSION["user_id"];
        $data['process']=6;
        foreach ($this->input->post('madeen_value') as $key=>$x){
            $data['p_cost']= $x;
            $data['madeen']= $this->input->post('madeen_acoount_name')[$key];
            $data['dayen']= 0;
            $this->db->insert("all_deports",$data);
        }
        foreach ($this->input->post('dayen_value') as $keys=>$y){
            $data['p_cost']= $y;
            $data['madeen']= 0;
            $data['dayen']=  $this->input->post('dayen_acoount_name')[$keys];
            $this->db->insert("all_deports",$data);
        }
    }
    //====================================================
    public  function update_payment($ids){
        foreach ($ids as $key=>$value){
            $data["deport"]=1;
            $this->db->where("id",$value);
            $this->db->update("payment",$data);
        }
    }
}//END CLASS
?>