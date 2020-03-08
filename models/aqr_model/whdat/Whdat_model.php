<?php
class Whdat_model extends CI_Model{
    public function get_whdat($type){
        $this->db->where('type',$type);
        $query = $this->db->get('aqr_settings');
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_akarat(){

        $query = $this->db->get('aqr_akarat');
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_rkm_whda(){

        $query = $this->db->get('aqr_whdat');
        if ($query->num_rows()>0){
            return $query->last_row()->whda_rkm;
        } else{
            return 0;
        }

    }

    public function insert_whda()
    {
        $data['whda_rkm']= $this->get_rkm_whda()+1;
        $data['whda_type_fk']= $this->input->post('whda_type_fk');
        $data['to_akar_fk']= $this->input->post('to_akar_fk');
        $data['halt_whda_fk']= $this->input->post('halt_whda_fk');
        $data['note']= $this->input->post('note');
        $data['maugod']= $this->input->post('maugod');
        $data['whda_type_n']= $this->get_id('aqr_settings','id_setting',$data['whda_type_fk'],'title_setting');
        $data['halt_whda_n']= $this->get_id('aqr_settings','id_setting',$data['halt_whda_fk'],'title_setting');
        $data['to_akar_n']= $this->get_id('aqr_akarat','id',$data['to_akar_fk'],'aname');
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher_fk']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher_fk'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher_fk'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher_fk'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }


        $this->db->insert('aqr_whdat',$data);
    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_all(){
        $query = $this->db->get('aqr_whdat');
        if ($query->num_rows()>0){
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i]= $row;
                $data[$i]->no3_color= $this->get_id('aqr_settings','id_setting',$row->whda_type_fk,'color');
                $data[$i]->color_7ala= $this->get_id('aqr_settings','id_setting',$row->halt_whda_fk,'color');

                $i++;


            }
            return $data;
        } else{
            return false;
        }

    }
    public function getById($id)
    {
        return $this->db->get_where('aqr_whdat', array('id'=>$id))->row();
    }
    public function update_whda($id){
        $data['whda_type_fk']= $this->input->post('whda_type_fk');
        $data['to_akar_fk']= $this->input->post('to_akar_fk');
        $data['halt_whda_fk']= $this->input->post('halt_whda_fk');
        $data['note']= $this->input->post('note');
        $data['maugod']= $this->input->post('maugod');
        $data['whda_type_n']= $this->get_id('aqr_settings','id_setting',$data['whda_type_fk'],'title_setting');
        $data['halt_whda_n']= $this->get_id('aqr_settings','id_setting',$data['halt_whda_fk'],'title_setting');
        $data['to_akar_n']= $this->get_id('aqr_akarat','id',$data['to_akar_fk'],'aname');
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher_fk']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher_fk'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher_fk'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher_fk'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }

        $this->db->where('id',$id);
        $this->db->update('aqr_whdat',$data);

    }
    public function delete_whda($id)
    {
        $this->db->where('id', $id)->delete('aqr_whdat');
    }




}
