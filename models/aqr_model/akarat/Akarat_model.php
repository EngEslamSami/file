<?php
class Akarat_model extends CI_Model{
    public function get_aqr($type){
        $this->db->where('type',$type);
        $query = $this->db->get('aqr_settings');
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
public function get_rkm_aqr(){

    $query = $this->db->get('aqr_akarat');
    if ($query->num_rows()>0){
        return $query->last_row()->rkm;
    } else{
        return 0;
    }

}
    public function insert_aqar()
    {
        $data['rkm']= $this->get_rkm_aqr()+1;
        $data['aname']= $this->input->post('aname');
        $data['ttype_fk']= $this->input->post('ttype_fk');
        $data['notes']= $this->input->post('notes');
        $data['ttype']= $this->get_id('aqr_settings','id_setting',$data['ttype_fk'],'title_setting');
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


        $this->db->insert('aqr_akarat',$data);
    }

    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_all(){
        $query = $this->db->get('aqr_akarat');
        if ($query->num_rows()>0){
            $i=0;
          //  return $query->result();
            foreach ($query->result() as $row) {
                $data[$i]= $row;
                $data[$i]->color= $this->get_id('aqr_settings','id_setting',$row->ttype_fk,'color');

                $i++;


            }
            return $data;
        } else{
            return false;
        }

    }
    public function getById($id)
    {
        return $this->db->get_where('aqr_akarat', array('id'=>$id))->row();
    }
    public function update_aqar($id){
        $data['aname']= $this->input->post('aname');
        $data['ttype_fk']= $this->input->post('ttype_fk');
        $data['notes']= $this->input->post('notes');
        $data['ttype']= $this->get_id('aqr_settings','id_setting',$data['ttype_fk'],'title_setting');
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
        $this->db->update('aqr_akarat',$data);
    }
    public function delete_aqar($id)
    {
        $this->db->where('id', $id)->delete('aqr_akarat');
    }



}
