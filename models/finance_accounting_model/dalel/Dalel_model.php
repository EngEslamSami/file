<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dalel_model extends CI_Model {

	public function buildTree($where)
	{
		return $this->db->where($where)->order_by('code','ASC')->get('dalel')->result();
	}

	public function checkValidate($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}

	public function lastSubCode($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(code AS UNSIGNED)),0) AS maxSubCode')->where($where)->get('dalel')->row_array()['maxSubCode'];
	}

	public function deleteTreeNodes($id)
	{
		$accounts = $this->buildTree(array('parent'=>$id));
		if ($accounts != null) {
            foreach ($accounts as $row) {
                $this->deleteTreeNodes($row->id); 
        		$this->deleteAccount($row->id);
            }
        }
        $this->deleteAccount($id);
	}

	public function deleteAccount($id)
	{
		$this->db->where('id',$id)->delete('dalel');
	}

/*	public function getAccount($id)
	{
		return $this->db->select('dalel.*, branch.id AS branch')
						->join('dalel branch','branch.parent=dalel.id','LEFT')
						->where('dalel.id',$id)
						->get('dalel')
						->row_array();
	}
*/
   public function getAccount($id)
    {
        $query = $this->db->select('dalel.*, branch.id AS branch ,parent.name as parent_name ')
            ->join('dalel branch', 'branch.parent=dalel.id', 'LEFT')
            ->join('dalel parent', 'parent.id=dalel.parent', 'LEFT')
            ->where('dalel.id', $id)
            ->get('dalel')
            ->row_array();
        $query['marakez'] = $this->get_marakez($query['code']);
        return $query;
    }
/*	public function insert()
	{
		$data['name']	 	  = $this->input->post('name');
		$data['ttype']	 	  = $this->input->post('ttype');
		$data['parent_code']  = $this->input->post('parent_code');
		$data['code']	 	  = $this->input->post('code');
		$data['parent'] 	  = $this->input->post('parent');
		$data['level']	 	  = $this->input->post('level');
		$data['hesab_no3'] 	  = $this->input->post('hesab_no3');
		$data['hesab_tabe3a'] = $this->input->post('hesab_tabe3a');
		$data['hesab_report'] = $this->input->post('hesab_report');
		$this->db->insert('dalel',$data);
	}
*/

   public function insert()
    {
        $data['name'] = $this->input->post('name');
        $data['ttype'] = $this->input->post('ttype');
        $data['parent_code'] = $this->input->post('parent_code');
        $data['code'] = $this->input->post('code');
        $data['parent'] = $this->input->post('parent');
        $data['level'] = $this->input->post('level');
        $data['hesab_no3'] = $this->input->post('hesab_no3');
        $data['hesab_tabe3a'] = $this->input->post('hesab_tabe3a');
        $data['hesab_report'] = $this->input->post('hesab_report');


        $data['markz_tklfa'] = $this->input->post('markz_tklfa');
        if ($data['markz_tklfa'] == 1) {
            $maraz_taklefa = $this->input->post('markz_tklfa_fk');
            for ($i = 0; $i < sizeof($maraz_taklefa); $i++) {
                $this->add_hesab_markz_tklfa($maraz_taklefa[$i]);

            }
        }

        $this->db->insert('dalel', $data);
    }
	public function update($id)
	{
		$data['name']	 	  = $this->input->post('name');
		$data['ttype']	 	  = $this->input->post('ttype');
		$data['parent_code']  = $this->input->post('parent_code');
		($this->input->post('code'))?$data['code']=$this->input->post('code'):'';
		($this->input->post('parent'))?$data['parent']=$this->input->post('parent'):'';
		($this->input->post('level'))?$data['level']=$this->input->post('level'):'';
		($this->input->post('hesab_no3'))?$data['hesab_no3']=$this->input->post('hesab_no3'):'';
		($this->input->post('hesab_tabe3a'))?$data['hesab_tabe3a']=$this->input->post('hesab_tabe3a'):'';
		($this->input->post('hesab_report'))?$data['hesab_report']=$this->input->post('hesab_report'):'';
		$this->db->where('id',$id)->update('dalel',$data);
	}
    
    
    
    public function getBanks()
{
    return $this->db->select('bank_id,code_account_id, bank.title AS bank_title')
        ->join('banks_settings bank','bank.id=finance_sheek_setting.bank_id','LEFT')
        ->get('finance_sheek_setting')
        ->result_array();
}
/*************************************************************************/




/******************************************************************************************/
    public function tree(){
        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');
       
      //  $this->db->where('parent',21);
        $this->db->where('hesab_report',1);
        $this->db->where('parent',0);
         // $this->db->where('parent',21);
    //   $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach($result as $key=>$value)
            {
                $query = $this->db->query('select SUM(maden) AS madeen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $dayen_result = $query->result();
                
                $role = array();
                $role['id'] = $result[$key]->id;
               $role['last_value'] = $result[$key]->last_value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                   $role['hesab_tabe3a'] = $result[$key]->hesab_tabe3a;
               // $role['madeen'] = $result[$key]->last_value_madeen;
               // $role['dayen'] = $result[$key]->last_value_dayen;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->madeen;
        
                $children = $this->build_child($result[$key]->id);              
        
                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id.'');
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
                }
        
                $roles[] = $role;                   
            }       
        return $roles;
        }
        return false;
    }

    
    public function build_child($parent){
       /* $query = $this->db->query('select * from dalel where parent = '.$parent.'');
        $result = $query->result();
     */
          $this->db->select('*');
        $this->db->from('dalel');
      
        $this->db->where('parent',$parent);
        
      //    $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
     
     
     
     
        $roles = array();
        $value = 0;  
        $value2 = 0;    
         
        foreach($result as $key => $val){
            $role = array();
            
            if($result[$key]->parent == $parent){
                $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id.'');
                $result2 = $query2->result();
                
                $query = $this->db->query('select SUM(maden) AS maden from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where rkm_hesab = '.$result[$key]->code.'');
                $dayen_result = $query->result();
                if($result[$key]->hesab_tabe3a == 1){
                    $value = $madeen_result[0]->maden - $dayen_result[0]->dayen;
                    $role['madeen'] = $result[$key]->last_value + $madeen_result[0]->maden;
                    $role['dayen'] = $dayen_result[0]->dayen;
                }
                elseif($result[$key]->hesab_tabe3a == 2){
                    $value = $dayen_result[0]->dayen - $madeen_result[0]->maden;
                    $role['madeen'] = $madeen_result[0]->maden;
                    $role['dayen'] = $result[$key]->last_value + $dayen_result[0]->dayen;
                }
                $value2 += $result[$key]->last_value + $value;
                
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value + $value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                   $role['hesab_tabe3a'] = $result[$key]->hesab_tabe3a;
             //   $role['madeen'] = $result[$key]->last_value_madeen;
             //   $role['dayen'] = $result[$key]->last_value_dayen;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->maden;
    
                $children = $this->build_child($result[$key]->id);
                
                if( !empty($children[0]) ){ 
                    $role['value'] =  $children[1];
                    $role['children'] = $children[0];
                }
                    
                $roles[] = $role;
            }
        }
        return array($roles,$value2);
    }
/****************************************************************************/

    /*
     * 1-4-2019**/
    public function tree_dates($date_from,$date_to){
        /*$this->load->model('finance_accounting_model/box/reports/Reports_model');
        $data['totla_sabeq']   =
            $this->Reports_model->select_Rased_sabeq(strtotime($_POST['from']) , $_POST['rkm_hesab']);
*/

        $roles = array();
        $this->db->select('*');
        $this->db->from('dalel');

        //  $this->db->where('parent',21);
        $this->db->where('hesab_report',1);
        $this->db->where('parent',0);
        // $this->db->where('parent',21);
        //   $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach($result as $key=>$value)
            {
                $query = $this->db->query('select SUM(maden) AS madeen from finance_quods_details where  date  >= '.$date_from.' and date  <= '.$date_to.' and rkm_hesab = '.$result[$key]->code);
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where  date  >= '.$date_from.' and date  <= '.$date_to.' and rkm_hesab = '.$result[$key]->code);
                $dayen_result = $query->result();

                $role = array();
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                $role['hesab_tabe3a'] = $result[$key]->hesab_tabe3a;
                // $role['madeen'] = $result[$key]->last_value_madeen;
                // $role['dayen'] = $result[$key]->last_value_dayen;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->madeen;

                $children = $this->build_child_tree_dates($result[$key]->id,$date_from,$date_to);

                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id);
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
                }

                $roles[] = $role;
            }
            return $roles;
        }
        return false;
    }


    public function build_child_tree_dates($parent,$date_from,$date_to){
        $this->load->model('finance_accounting_model/box/reports/Reports_model');

        $this->db->select('*');
        $this->db->from('dalel');

        $this->db->where('parent',$parent);

        //    $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();




        $roles = array();
        $value = 0;
        $value2 = 0;

        foreach($result as $key => $val){
            $role = array();

            if($result[$key]->parent == $parent){
                $query2 = $this->db->query('select SUM(last_value) AS value from dalel where parent = '.$result[$key]->id);
                $result2 = $query2->result();




                /*$this->db->select('*SUM(maden) AS maden');
                $this->db->where('rkm_hesab', $result[$key]->code);
                $this->db->where($date_arr);
                $query = $this->db->get('finance_quods_details');
                $query_result = $query->result();
                if ($query->num_rows() > 0) {
                    $data1 = 0;

                    foreach ($query->result() as $row) {
                        $data1 += $row->dayen;
                    }
                    return $data1;
                }

                $query = $this->db->select_sum('maden AS maden');
                $query = $this->db->get('finance_quods_details');
                $result = $query->result();*/


                $query = $this->db->query('select SUM(maden) AS maden from finance_quods_details where date  >= '.$date_from.' and date  <= '.$date_to.' and rkm_hesab = '.$result[$key]->code);
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(dayen) AS dayen from finance_quods_details where date  >= '.$date_from.' and date  <= '.$date_to.' and rkm_hesab = '.$result[$key]->code);
                $dayen_result = $query->result();
                if($result[$key]->hesab_tabe3a == 1){
                    $value = $madeen_result[0]->maden - $dayen_result[0]->dayen;
                    $role['madeen'] = $result[$key]->last_value + $madeen_result[0]->maden;
                    $role['dayen'] = $dayen_result[0]->dayen;
                }
                elseif($result[$key]->hesab_tabe3a == 2){
                    $value = $dayen_result[0]->dayen - $madeen_result[0]->maden;
                    $role['madeen'] = $madeen_result[0]->maden;
                    $role['dayen'] = $result[$key]->last_value + $dayen_result[0]->dayen;
                }
                $value2 += $result[$key]->last_value + $value;

                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value + $value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                $role['hesab_tabe3a'] = $result[$key]->hesab_tabe3a;
                //   $role['madeen'] = $result[$key]->last_value_madeen;
                //   $role['dayen'] = $result[$key]->last_value_dayen;
                $role['all_dayen'] = $dayen_result[0]->dayen;
                $role['all_madeen'] = $madeen_result[0]->maden;

                $children = $this->build_child_tree_dates($result[$key]->id,$date_from,$date_to);

                if( !empty($children[0]) ){
                    $role['value'] =  $children[1];
                    $role['children'] = $children[0];
                }else{

                    $role['rased_sabek'.$result[$key]->code] =  $this->Reports_model->select_Rased_sabeq($date_from,$result[$key]->code);
                }

                $roles[] = $role;
            }
        }
        return array($roles,$value2);
    }





/**********************************************************************************/

 public function select_markez()
    {
        $query = $this->db->get('finance_markz_taklfa')->result();
        return $query;
    }

    public function get_marakez($code)
    {
        $arkam = array();
        $q = $this->db->select('markz_id_fk')->where('rkm_hesab', $code)->get('finance_markz_taklfa_hesabat')->result();
        if (!empty($q)) {
            foreach ($q as $value) {
                array_push($arkam, $value->markz_id_fk);
            }
        }
        return $arkam;
    }

    public function delete_hesab_markz_tklfa($code)
    {
        $this->db->where('rkm_hesab', $code)->delete('finance_markz_taklfa_hesabat');
    }

    public function add_hesab_markz_tklfa($maraz_taklefa)
    {
        $data['markz_id_fk'] = $maraz_taklefa;
        $data['rkm_hesab'] = $this->input->post('code');
        $data['hesab_name'] = $this->input->post('name');
        $data['date_ar'] = date('Y-m-d H:i:s');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);


        $this->db->insert('finance_markz_taklfa_hesabat', $data);
    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }
    
        public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }
  public function update_ajex($id)
    {
        $data['name'] = $this->input->post('name');
        $data['ttype'] = $this->input->post('ttype');
        $data['parent_code'] = $this->input->post('parent_code');
        ($this->input->post('code')) ? $data['code'] = $this->input->post('code') : '';
        ($this->input->post('parent')) ? $data['parent'] = $this->input->post('parent') : '';
        ($this->input->post('level')) ? $data['level'] = $this->input->post('level') : '';
        ($this->input->post('hesab_no3')) ? $data['hesab_no3'] = $this->input->post('hesab_no3') : '';
        ($this->input->post('hesab_tabe3a')) ? $data['hesab_tabe3a'] = $this->input->post('hesab_tabe3a') : '';
        ($this->input->post('hesab_report')) ? $data['hesab_report'] = $this->input->post('hesab_report') : '';
//        14-1-om
//        ($this->input->post('markz_tklfa')) ? $data['markz_tklfa'] = $this->input->post('markz_tklfa') : '';

        if ($this->input->post('markz_tklfa')) {

            $data['markz_tklfa'] = $this->input->post('markz_tklfa');
            if ($data['markz_tklfa'] == 1) {
                $this->delete_hesab_markz_tklfa($data['code']);
                $maraz_taklefa = $this->input->post('markz_tklfa_fk');
//                $maraz_taklefa=explode(',',$maraz_taklefa);
                for ($i = 0; $i < sizeof($maraz_taklefa); $i++) {
                    $this->add_hesab_markz_tklfa($maraz_taklefa[$i]);

                }
            } else {
                $this->delete_hesab_markz_tklfa($data['code']);

            }

        }
        $this->db->where('id', $id)->update('dalel', $data);


    }

    public function update_mrakez_taklefa($id)
    {

        if ($this->input->post('markz_tklfa')) {

            $data['markz_tklfa'] = $this->input->post('markz_tklfa');
            if ($data['markz_tklfa'] == 1) {
                $this->delete_hesab_markz_tklfa($this->input->post('code'));
                $maraz_taklefa = $this->input->post('markz_tklfa_fk');
                for ($i = 0; $i < sizeof($maraz_taklefa); $i++) {
                    $this->add_hesab_markz_tklfa($maraz_taklefa[$i]);
                }
            } else {
                $this->delete_hesab_markz_tklfa($this->input->post('code'));
            }
        }
        $this->db->where('id', $id)->update('dalel', $data);

    }
    public function GetById($code)
    {
        $this->db->select('dalel.*');
        $this->db->from('dalel');
        $this->db->where('dalel.code', $code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }
    
     public function get_parent($code)
    {
        $new_code=substr($code, 0, 2);
        $query2 = $this->db->where('code', $new_code)->get('dalel')->row_array();
        return $query2;
    }
}

/* End of file Dalel_model.php */
/* Location: ./application/models/finance_accounting_model/Dalel_model.php */