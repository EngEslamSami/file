<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Markz_tklfa_m extends CI_Model
{
    
        public function select_markez()
    {
        $query = $this->db->get('finance_markz_taklfa')->result();
        return $query;


    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function add_markez()
    {

    $data['name']=$this->input->post('name');
    $data['color']=$this->input->post('color');
    $data['date_ar'] = date('Y-m-d H:i:s');
    if($_SESSION['role_id_fk']==1){

        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$_SESSION['user_name'];
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
    $this->db->insert('finance_markz_taklfa',$data);


    }

    public function select_markez_by_id($id)
    {
    $query = $this->db->where('id',$id)->get('finance_markz_taklfa')->row();
    return $query;

    }

    public function  update_markez($id)
    {
        
        $data['name']=$this->input->post('name');
        $data['color']=$this->input->post('color');
        
    
        $this->db->where('id',$id);
        $this->db->update('finance_markz_taklfa',$data);


    }
    public function delete_markez($id)
    {
        $this->db->where('id',$id)->delete('finance_markz_taklfa');
    
    }
    /////hesab////////////////////////
    public function getAllAccounts($where)
    {
        return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
    }
    public function select_hesab()
    {
        //$query = $this->db->get('finance_markz_taklfa_hesabat')->result();
      $query = $this->db->order_by('markz_id_fk','ASC')->get('finance_markz_taklfa_hesabat')->result();
        if ($query > 0) {
            $i=0;
            foreach ($query as $row) {
                $query[$i]->markez = $this->select_markez_by_id($row->markz_id_fk);
                $i++;
            }
            return $query;
        }
    
    }
    
    
    public function add_hesab()
{
    $hesab_no3 = $this->input->post('hesab_no3');
    if ($hesab_no3 == 2) {
        $data['markz_id_fk'] = $this->input->post('markez');
        $data['rkm_hesab'] = $this->input->post('account_num');
        $data['hesab_name'] = $this->input->post('account');
        $data['date_ar'] = date('Y-m-d H:i:s');
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $check = $this->check_account_markz($data['rkm_hesab'], $data['markz_id_fk']);
        if ($check == 0){
            $this->db->insert('finance_markz_taklfa_hesabat', $data);
            $this->update_account_dalel($data['rkm_hesab']);
        }

    } elseif ($hesab_no3 == 1) {
        $parent_code = $this->input->post('account_num');
        $accounts = $this->getAllAccounts__parent($parent_code);

//            echo '<pre>';
//            print_r($accounts);
//            die;
        if (!empty($accounts)) {

            foreach ($accounts as $account) {
                $data['markz_id_fk'] = $this->input->post('markez');

                $data['rkm_hesab'] = $account->code;

                $data['hesab_name'] = $account->name;

                $data['date_ar'] = date('Y-m-d H:i:s');

                if ($_SESSION['role_id_fk'] == 1) {

                    $data['publisher'] = $_SESSION['user_id'];

                    $data['publisher_name'] = $_SESSION['user_name'];

                } else if ($_SESSION['role_id_fk'] == 2) {

                    $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

                } else if ($_SESSION['role_id_fk'] == 3) {

                    $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

                } else if ($_SESSION['role_id_fk'] == 4) {

                    $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

                }
                $check = $this->check_account_markz($data['rkm_hesab'], $data['markz_id_fk']);
                if ($check == 0){
                    $this->db->insert('finance_markz_taklfa_hesabat', $data);
                    $this->update_account_dalel($data['rkm_hesab']);

                }
            }
        }

    }

}
  /*  public function add_hesab()
{
    $hesab_no3 = $this->input->post('hesab_no3');
    if ($hesab_no3 == 2) {
        $data['markz_id_fk'] = $this->input->post('markez');
        $data['rkm_hesab'] = $this->input->post('account_num');
        $data['hesab_name'] = $this->input->post('account');
        $data['date_ar'] = date('Y-m-d H:i:s');
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $this->db->insert('finance_markz_taklfa_hesabat', $data);
    } elseif ($hesab_no3 == 1) {
        $parent_code = $this->input->post('account_num');
        $accounts = $this->getAllAccounts__parent($parent_code);

//            echo '<pre>';
//            print_r($accounts);
//            die;
        if (!empty($accounts)) {

            foreach ($accounts as $account) {
                $data['markz_id_fk'] = $this->input->post('markez');

                $data['rkm_hesab'] = $account->code;

                $data['hesab_name'] = $account->name;

                $data['date_ar'] = date('Y-m-d H:i:s');

                if ($_SESSION['role_id_fk'] == 1) {

                    $data['publisher'] = $_SESSION['user_id'];

                    $data['publisher_name'] = $_SESSION['user_name'];

                } else if ($_SESSION['role_id_fk'] == 2) {

                    $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

                } else if ($_SESSION['role_id_fk'] == 3) {

                    $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

                } else if ($_SESSION['role_id_fk'] == 4) {

                    $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                    $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

                }

                $this->db->insert('finance_markz_taklfa_hesabat', $data);
            }
        }

    }

}
*/
    
    public function update_account_dalel($code)
{
    $data['markz_tklfa'] = 1;
    $this->db->where('code', $code)->update('dalel', $data);
}

public function check_account_markz($code, $markz_id_fk)
{
    return $this->db->where('rkm_hesab', $code)->where('markz_id_fk', $markz_id_fk)
        ->get('finance_markz_taklfa_hesabat')->num_rows();
}
    
    
    
    
     /* public function add_hesab(){
        $hesab_no3=$this->input->post('hesab_no3');
        if ($hesab_no3 == 2) {
            $data['markz_id_fk'] = $this->input->post('markez');
            $data['rkm_hesab'] = $this->input->post('account_num');
            $data['hesab_name'] = $this->input->post('account');
            $data['date_ar'] = date('Y-m-d H:i:s');
            if ($_SESSION['role_id_fk'] == 1) {
                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $_SESSION['user_name'];
            } else if ($_SESSION['role_id_fk'] == 2) {
                $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
            } else if ($_SESSION['role_id_fk'] == 3) {
                $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
            } else if ($_SESSION['role_id_fk'] == 4) {
                $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
            }
            $this->db->insert('finance_markz_taklfa_hesabat', $data);
        }elseif ($hesab_no3 == 1){
            $parent_code=$this->input->post('account_num');
            $accounts=$this->getAllAccounts(array('parent_code'=>$parent_code,'hesab_no3'=>2));
            if (!empty($accounts)){

                foreach ($accounts as $account){
                    $data['markz_id_fk'] = $this->input->post('markez');
                    $data['rkm_hesab'] = $account->code;
                    $data['hesab_name'] = $account->name;
                    $data['date_ar'] = date('Y-m-d H:i:s');
                    if ($_SESSION['role_id_fk'] == 1) {
                        $data['publisher'] = $_SESSION['user_id'];
                        $data['publisher_name'] = $_SESSION['user_name'];
                    } else if ($_SESSION['role_id_fk'] == 2) {
                        $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                        $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
                    } else if ($_SESSION['role_id_fk'] == 3) {
                        $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                        $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
                    } else if ($_SESSION['role_id_fk'] == 4) {
                        $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
                        $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
                    }
                    $this->db->insert('finance_markz_taklfa_hesabat', $data);
                }
            }

        }




    }*/
    /*public function add_hesab()
    {
    
        $data['markz_id_fk']=$this->input->post('markez');
        $data['rkm_hesab']=$this->input->post('account_num');
        $data['hesab_name']=$this->input->post('account');
        $data['date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){
    
            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];
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
        $this->db->insert('finance_markz_taklfa_hesabat',$data);
    
    
    }*/
     /*public function add_hesab(){

        $hesab_no3=$this->input->post('hesab_no3');
        if ($hesab_no3 == 2) {
            $data['markz_id_fk'] = $this->input->post('markez');

            $data['rkm_hesab'] = $this->input->post('account_num');

            $data['hesab_name'] = $this->input->post('account');

            $data['date_ar'] = date('Y-m-d H:i:s');

            if ($_SESSION['role_id_fk'] == 1) {

                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $_SESSION['user_name'];

            } else if ($_SESSION['role_id_fk'] == 2) {
                $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
            } else if ($_SESSION['role_id_fk'] == 3) {
                $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

            } else if ($_SESSION['role_id_fk'] == 4) {

                $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

            }

            $this->db->insert('finance_markz_taklfa_hesabat', $data);
        }elseif ($hesab_no3 == 1){
            $parent_code=$this->input->post('account_num');
            $accounts=$this->getAllAccounts(array('parent_code'=>$parent_code,'hesab_no3'=>2));
            if (!empty($accounts)){

                foreach ($accounts as $account){
                    $data['markz_id_fk'] = $this->input->post('markez');

                    $data['rkm_hesab'] = $account->code;

                    $data['hesab_name'] = $account->name;

                    $data['date_ar'] = date('Y-m-d H:i:s');

                    if ($_SESSION['role_id_fk'] == 1) {


                        $data['publisher'] = $_SESSION['user_id'];

                        $data['publisher_name'] = $_SESSION['user_name'];

                    } else if ($_SESSION['role_id_fk'] == 2) {

                        $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");

                        $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");


                    } else if ($_SESSION['role_id_fk'] == 3) {

                        $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");

                        $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");

                    } else if ($_SESSION['role_id_fk'] == 4) {

                        $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");

                        $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");

                    }

                    $this->db->insert('finance_markz_taklfa_hesabat', $data);
                }
            }

        }




    } 
    */
    
    public function select_hesab_by_id($id)
    {
        $query = $this->db->where('id',$id)->get('finance_markz_taklfa_hesabat')->row();
        return $query;
    
    }
    
    public function  update_hesab($id)
    {
            
            $data['markz_id_fk']=$this->input->post('markez');
            $data['rkm_hesab']=$this->input->post('account_num');
            $data['hesab_name']=$this->input->post('account');
            
        
            $this->db->where('id',$id);
            $this->db->update('finance_markz_taklfa_hesabat',$data);
    
    
    }
    public function delete_hesab($id)
    {
            $this->db->where('id',$id)->delete('finance_markz_taklfa_hesabat');
        
    }
    
public function getAllAccounts__parent($parent_code)
{
//        $this->db->like('parent_code', $parent_code, 'after');     // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'

    return $this->db->where('hesab_no3',2)->like('parent_code', $parent_code, 'after')->order_by('parent', 'ASC')->get('dalel')->result();

}
    
}


?>