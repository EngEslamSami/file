<?php

class Tazkra_orders_model extends CI_Model
{

    public function get_tazkra_settings($type)
    {
        return $this->db->where('type', $type)
            ->get('tech_tazkra_settings')->result();
    }

    public function get_deparments()
    {

        $this->db->where('from_id_fk !=', 0);
        return $this->db->get('department_jobs')->result();
    }

    public function add_order()
    {
        $data['tazkra_num']= $this->get_tazkra_num()+1;
        $data['qsm_id_fk']= $this->input->post('qsm_id_fk');
        $data['qsm_n']= $this->get_id('department_jobs','id',$data['qsm_id_fk'],'name');
        $data['tazkra_mawdo3']= $this->input->post('tazkra_mawdo3');
        $data['tazkra_no3']= $this->input->post('tazkra_no3');
        $data['importance_type']= $this->input->post('importance_type');
        $data['tazkra_content']= $this->input->post('tazkra_content');
        $data['date']= strtotime(date("Y-m-d"));

        $data['date_ar'] = date('Y-m-d g:i a');
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
        $this->db->insert('tech_all_tazaker_orders',$data);
        return $this->db->insert_id();

    }
    public function get_tazkra_num (){
        $this->db->order_by('tazkra_num','DESC');
        $query = $this->db->get('tech_all_tazaker_orders');
        if ($query->num_rows()>0){
            return $query->row()->tazkra_num;
        } else{
            return 0;
        }
    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

    public function get_tzkra_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tech_all_tazaker_orders');
        if ($query->num_rows()>0){
          //  return $query->row();
            $data = $query->row();
            $data->tazkra_no3_n= $this->get_id('tech_tazkra_settings','id',$data->tazkra_no3,'title');
            $data->tazkra_no3_color= $this->get_id('tech_tazkra_settings','id',$data->tazkra_no3,'color');
            $data->importance_n= $this->get_id('tech_tazkra_settings','id',$data->importance_type,'title');
            $data->importance_color= $this->get_id('tech_tazkra_settings','id',$data->importance_type,'color');

         return $data;
        } else{
            return 0;
        }
    }
    public function update_order($id){

        $data['qsm_id_fk']= $this->input->post('qsm_id_fk');
        $data['qsm_n']= $this->get_id('department_jobs','id',$data['qsm_id_fk'],'name');
        $data['tazkra_mawdo3']= $this->input->post('tazkra_mawdo3');
        $data['tazkra_no3']= $this->input->post('tazkra_no3');
        $data['importance_type']= $this->input->post('importance_type');
        $data['tazkra_content']= $this->input->post('tazkra_content');
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d g:i a');
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
        $this->db->where('id',$id);
        $this->db->update('tech_all_tazaker_orders',$data);
    }

    public function get_all_tazaker(){
        $query = $this->db->get('tech_all_tazaker_orders');
        if ($query->num_rows()>0){
         $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->tazkra_no3_n= $this->get_id('tech_tazkra_settings','id',$row->tazkra_no3,'title');
                $data[$i]->tazkra_no3_color= $this->get_id('tech_tazkra_settings','id',$row->tazkra_no3,'color');
                $data[$i]->importance_n= $this->get_id('tech_tazkra_settings','id',$row->importance_type,'title');
                $data[$i]->importance_color= $this->get_id('tech_tazkra_settings','id',$row->importance_type,'color');
                $i++;

            }
            return $data;
        } else{
            return false;
        }
    }
    public function add_attach($tzkra_id,$file,$size){
        $tzkra_num = $this->get_id('tech_all_tazaker_orders','id',$tzkra_id,'tazkra_num');
        $data['tazkra_num_fk']= $tzkra_num;
        $data['tazkra_id_fk']= $tzkra_id;
        $data['morfaq']= $file;
        $data['title']= $this->input->post('title');
        $data['size']= $size;
        $data['date']= strtotime(date("Y-m-d"));
      //  $data['date_ar'] = date('Y-m-d H:i:s ');
        $data['date_ar'] = date('Y-m-d g:i a ');
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

        $this->db->insert('tech_all_tazaker_orders_morfaq',$data);
    }

    public function delete_tazkra($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_all_tazaker_orders');

    }

    public function delete_all_attach($id){
        $this->db->where('tazkra_id_fk',$id);
        $this->db->delete('tech_all_tazaker_orders_morfaq');
    }
    public function get_all_attach($id){
        $this->db->where('tazkra_id_fk',$id);
        $query = $this->db->get('tech_all_tazaker_orders_morfaq');
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }

    }
    public function delete_attach($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_all_tazaker_orders_morfaq');
    }

}