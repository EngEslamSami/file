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

                $this->db->insert('finance_quods_details',$details);
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




}

