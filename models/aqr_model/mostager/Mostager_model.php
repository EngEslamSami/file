<?php
class Mostager_model extends CI_Model{

    public function get_rkm(){

        $query = $this->db->get('aqr_mostager');
        if ($query->num_rows()>0){
            return $query->last_row()->rkm;
        } else{
            return 0;
        }

    }
    public function get_national_source($type){
        $this->db->where('type',$type);
        $query = $this->db->get('family_setting');
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }


    }
    public function insert_mostager($file){
        $data['rkm']= $this->input->post('rkm');
        $data['aname']= $this->input->post('aname');
        $data['gensia_fk']= $this->input->post('gensia_fk');
        if ($data['gensia_fk']==1){
            $data['gensia_n'] = 'ذكر';
        } elseif ($data['gensia_fk']==2){
            $data['gensia_n'] = 'أنثي';
        }
        $data['national_card']= $this->input->post('national_card');
        $data['national_card_date_m']= $this->input->post('national_card_date_m');
        $data['national_card_date_h']= $this->input->post('national_card_date_h');
        $data['masdar_national_card']= $this->input->post('masdar_national_card');
        $data['jwal']= $this->input->post('jwal');
        $data['another_jwal']= $this->input->post('another_jwal');
        $data['wazefa']= $this->input->post('wazefa');
        $data['maqr_amal']= $this->input->post('maqr_amal');
        if (!empty($file)){
            $data['img']= $file;
        }
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher_id_fk']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher_id_fk'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher_id_fk'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher_id_fk'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->insert('aqr_mostager',$data);

    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_all(){
        $query = $this->db->get('aqr_mostager');
        if ($query->num_rows()>0){
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i]= $row;
                $data[$i]->masdar_national_card_n= $this->get_from_family_setting($row->masdar_national_card);
                $i++;
            }
            return $data;
        } else{
            return false;
        }

    }
    public function get_from_family_setting($id)
    {
        $this->db->where("type !=",26);
        $this->db->where("id_setting",$id);
        $query = $this->db->get('family_setting');
        if ($query->num_rows() > 0) {

            return $query->row()->title_setting;
        }else{
            return 0;
        }

    }
    public function getById($id)
    {
        return $this->db->get_where('aqr_mostager', array('id'=>$id))->row();
    }
    public function update_mostager($id,$file){
        $data['rkm']= $this->input->post('rkm');
        $data['aname']= $this->input->post('aname');
        $data['gensia_fk']= $this->input->post('gensia_fk');
        if ($data['gensia_fk']==1){
            $data['gensia_n'] = 'ذكر';
        } elseif ($data['gensia_fk']==2){
            $data['gensia_n'] = 'أنثي';
        }
        $data['national_card']= $this->input->post('national_card');
        $data['national_card_date_m']= $this->input->post('national_card_date_m');
        $data['national_card_date_h']= $this->input->post('national_card_date_h');
        $data['masdar_national_card']= $this->input->post('masdar_national_card');
        $data['jwal']= $this->input->post('jwal');
        $data['another_jwal']= $this->input->post('another_jwal');
        $data['wazefa']= $this->input->post('wazefa');
        $data['maqr_amal']= $this->input->post('maqr_amal');
        if (!empty($file)){
            $data['img']= $file;
        }
        $data['date']= strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
        if($_SESSION['role_id_fk']==1){

            $data['publisher_id_fk']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher_id_fk'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher_id_fk'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher_id_fk'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('aqr_mostager',$data);

    }
    public function delete_mostager($id)
    {
        $this->db->where('id', $id)->delete('aqr_mostager');
    }
    public function check_national_card($value){
        $this->db->where('national_card',$value);
        $query = $this->db->get('aqr_mostager');
        if ($query->num_rows()>0){
          return $query->row()->national_card;
         //   return $query->row();

        } else{
            return 0;
        }

    }


}