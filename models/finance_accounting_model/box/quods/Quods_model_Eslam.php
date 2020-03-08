<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quods_model extends CI_Model {


	public function select_last_id(){
		$this->db->select('*');
		$this->db->from("finance_quods");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0]->id + 1;
		}else{
			return 1;
		}
	}


    public function insert($id =false,$all_img=false)
    {

        $no3_qued =explode('-',$this->input->post('no3_qued'));
        $data['no3_qued'] = $no3_qued[0];
        $data['no3_qued_name'] = $no3_qued[1];
        $halet_qued =explode('-',$this->input->post('halet_qued'));

        $data['halet_qued'] = $halet_qued[0];
        $data['halet_qued_name'] = $halet_qued[1];
        $data['qued_date'] = strtotime($this->input->post('qued_date'));
        $data['qued_date_ar'] = $this->input->post('qued_date');
        $data['total_value'] = $this->input->post('total_value');
        $data['rkm'] = $this->input->post('rkm');
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);


        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->update('finance_quods',$data);
            $this->delete_datails($id);

        }else{
            $data['date'] 		  	   = date('Y-m-d');
            $data['date_s'] 	  	   = time();
            $data['publisher'] 	  	   = $_SESSION['user_id'];
            $this->db->insert('finance_quods',$data);
        }


        //details

        if($this->input->post('rkm_hesab')){



            $count = count($this->input->post('rkm_hesab'));
            $maden_value =$this->input->post('maden_value');
            $dayen_value =$this->input->post('dayen_value');
            $byan =$this->input->post('byan');
            $marg3 =$this->input->post('marg3');

            for ($i=0 ;$i < $count; $i++){
                $details['qued_rkm_fk'] = $this->input->post('rkm');
                if(!empty($maden_value[$i])){
                    $details['maden'] = $maden_value[$i];
                }else{
                    $details['maden'] = 0;
                }
                if(!empty($dayen_value[$i])){
                    $details['dayen'] = $dayen_value[$i];
                }else{
                    $details['dayen'] = 0;
                }
                $details['rkm_hesab'] = $this->input->post('rkm_hesab')[$i];
                $details['hesab_name'] = $this->input->post('hesab_name')[$i];
                $details['byan'] = $byan[$i];
                $details['marg3'] = $marg3[$i];
              $this->update_finance($marg3[$i]);
                $this->db->insert('finance_quods_details',$details);
                $this->db->where('publisher_esal',$_SESSION['user_id']);
                $this->db->delete('queds_test-table');
            }

        }


        //////////// attaches

        if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){
                $files['qued_rkm_fk'] = $this->input->post('rkm');
                $files['file_attached'] = $all_img[$a];
                $files['title'] = $title[$a];
                $this->db->insert('finance_quods_attaches',$files);
            }

        }


    }
//==================================
public function update_finance($id)
{
    $data['deport_sand_qabd']=1;
    $this->db->where('pill_num',$id);
    $this->db->update('fr_all_pills',$data);
}


//===============================
	public function getAllquod($arr){
		$this->db->select('*');
		$this->db->from("finance_quods");
		if($arr !=''){
            $this->db->where($arr);
        }
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;
				$data[$i]->details = $this->getdetailsById($row->rkm);
				$data[$i]->attaches = $this->getAttachesByRkm($row->rkm);
			}
			return $query->result();
		}
			return false;

	}
    public function getdetailsById($id){
        $this->db->select('*');
        $this->db->from("finance_quods_details");
        $this->db->where("qued_rkm_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }


    public function getAttachesByRkm($id){
        $this->db->select('*');
        $this->db->from("finance_quods_attaches");
        $this->db->where("qued_rkm_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;

        }

    }



    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }



	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

    public function getAccount($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}




	public function delete($id)
	{
		$this->db->where("rkm",$id);
		$this->db->delete('finance_quods');
        $this->db->where("qued_rkm_fk",$id);
        $this->db->delete('finance_quods_attaches');
        $this->delete_datails($id);

	}


	public function delete_datails($id)
	{
		$this->db->where("qued_rkm_fk",$id);
		$this->db->delete('finance_quods_details');
	}

    public function delete_attaches($id)
    {
        $this->db->where("id",$id);
        $this->db->delete('finance_quods_attaches');
    }


    //==================================================================
    public function rkm_esal_array(){
        $this->db->select('*');
        $this->db->from("queds_test-table");
        $this->db->where("publisher_esal",$_SESSION['user_id']);
        $query = $this->db->get();
        $x =0;
        if ($query->num_rows() > 0) {
            //	return $query->result();
            foreach ($query->result() as $row) {
                $data[$x] = $row->rkm_esal;
                // $data[$x]->total_sand_value = $this->get_total_sand_value();
                $x++;
            }
            return $data;

        }
        return false;

    }

    public function GetTitleFromFr_bnod_pills_settingByCode($id){
        $h = $this->db->get_where("fr_bnod_pills_setting", array('code'=>$id));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['title'];
        }else{
            return 0;
        }


    }


   public function select_all_by_fr_all_pills()
    {
        $arr =$this->rkm_esal_array();
        $this->db->select('bnd_type1,bnd_type2,pill_num,bank_account_code,value,id');
        $this->db->from('fr_all_pills');
        $this->db->where_in('pill_num',$arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =  $row;
                $data[$x]->hesab_name =  $this->GetTitleFromSociety_main_banks_account($row->bank_account_code);
                $data[$x]->band_title =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type1);
                if(!empty($row->bnd_type2)){
                    $data[$x]->band_title2 =  $this->GetTitleFromFr_bnod_pills_settingByCode($row->bnd_type2);
                }
                $x++;}
            return$data;
        }else{
            return 0;
        }

    }


    public function select_all_in_queds()
    {
        $this->db->where('publisher_esal',$_SESSION['user_id']);
        return $this->db->get('queds_test-table')->result();
    }

    public function GetTitleFromSociety_main_banks_account($code){
        $h = $this->db->get_where("society_main_banks_account", array('rqm_hesab'=>$code));
        $arr= $h->row_array();
        if ($h->num_rows() > 0) {
            return $arr['name_hesab'];
        }else{
            return 0;
        }


    }



}

