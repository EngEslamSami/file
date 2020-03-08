<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_orders_model extends CI_Model
{
	public function chek_Null($post_value)
	{
		if ($post_value == '' || $post_value == null || (!isset($post_value))) {
			$val = '';
			return $val;
		} else {
			return $post_value;
		}
	}

	public function GetFromEmployees_settings($type)
	{
		$this->db->select('*');
		$this->db->from('employees_settings');
		$this->db->where('type', $type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}


	public function GetFromFr_settings($type)
	{
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('type', $type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}
    
    
    	 public function select_last_k_num()
    {
        $this->db->select('*');
        $this->db->from("fr_sponsor_orders");
        $this->db->order_by("k_num", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            //	return $query->result()[0]->id + 1;
            return $query->result()[0]->k_num + 1;
        } else {
            return 0;
        }
    }
    
    
    
     public function select_last_rkm_talab()
    {
        $this->db->select('*');
        $this->db->from("fr_sponsor_orders");
        $this->db->order_by("k_num", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            //	return $query->result()[0]->id + 1;
            return $query->result()[0]->rkm_talab + 1;
        } else {
            return 1;
        }
    }

	public function GetFromFr_settings2($type)
	{
		$this->db->select('*');
		$this->db->from('fr_settings');
		$this->db->where('type', $type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function getImagesById($id)
	{
		$this->db->select('fr_all_attachments.*,fr_settings.*');
		$this->db->from('fr_all_attachments');
		$this->db->where('person_id', $id);
		$this->db->join('fr_settings', 'fr_settings.id_setting=fr_all_attachments.attach_id_fk', 'left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return false;
		}
	}

	public function GetFromGeneral_assembly_settings($type)
	{
		$this->db->select('*');
		$this->db->from('general_assembly_settings');
		$this->db->where('type', $type);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->id_setting] = $row;
			}
			return $data;
		}
		return false;
	}


	public function select_all()
	{
		$this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor');
		$this->db->join('banks_settings', 'banks_settings.id=fr_sponsor.bank_id_fk', 'left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
				//  $data[$x]->halt =  $this->get_fr_setting($row->halat_kafel_id);
				$data[$x]->halt = $this->fr_kafalat_kafel_status($row->halat_kafel_id);
				$data[$x]->reason = $this->get_fr_setting($row->reasons_stop_id_fk);
				$data[$x]->Images = $this->getImagesById($row->id);
				$data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
				$data[$x]->fe2a_title = $this->get_fe2a_type($row->fe2a_type);
				$x++;
			}
			return $data;
		} else {
			return false;
		}

	}


	public function get_fe2a_type($fe2a_type)
	{
		$h = $this->db->get_where("fr_sponser_donors_setting", array('id' => $fe2a_type));
		return $arr = $h->row_array();

	}

	public function fr_kafalat_kafel_status($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('fr_kafalat_kafel_status');
		if ($query->num_rows() > 0) {
			return $query->row()->title;
		} else {
			return 'غير محدد';
		}
	}

	public function get_fr_setting($id)
	{
		$this->db->where('id_setting', $id);
		$query = $this->db->get('fr_settings');
		if ($query->num_rows() > 0) {
			return $query->row()->title_setting;
		} else {
			return 'غير محدد';
		}
	}

	public function getkafelStatusById($id)
	{
		return $this->db->get_where('fr_kafalat_kafel_status', array('id' => $id))->row_array();
	}

//============================================osama=================
	public function select_all_orders()
	{
		$this->db->select('fr_sponsor_orders.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor_orders');
		$this->db->join('banks_settings', 'banks_settings.id=fr_sponsor_orders.bank_id_fk', 'left');
	  
        $this->db->where('transformed',0);
        $this->db->order_by("fr_sponsor_orders.k_num", "DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
				//  $data[$x]->halt =  $this->get_fr_setting($row->halat_kafel_id);
				$data[$x]->halt = $this->fr_kafalat_kafel_status($row->halat_kafel_id);
				$data[$x]->reason = $this->get_fr_setting($row->reasons_stop_id_fk);
				$data[$x]->Images = $this->getImagesById($row->id);
				$data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
				$data[$x]->fe2a_title = $this->get_fe2a_type($row->fe2a_type);
				$data[$x]->details = $this->getOrderByIdDetails($row->id);
                $data[$x]->order_reciver = $this->get_user_name_submit($row->publisher);
				$x++;
			}
			return $data;
		} 
        return FALSE;
        

	}



	public function get_user_name_submit($user_id)
	{
		$this->db->select('*');
		$this->db->where("user_id",$user_id);
		$query=$this->db->get('users');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			if($data->role_id_fk == 1 or $data->role_id_fk == 5)
			{
				return  $data->user_username;
			}
			elseif($data->role_id_fk == 2)
			{
				$name = $this->get_user_name_member($data->user_name);
				return $name;
			}
			elseif($data->role_id_fk == 3)
			{
				$name = $this->get_emp_name($data->emp_code);
				return $name;
			}
			elseif($data->role_id_fk == 4)
			{
				$name = $this->name_general_assembley($data->user_name);
				return $name;
			}



		}
		return false;
	}


	public function name_general_assembley($user_id)
	{
		$this->db->select('*');
		$this->db->where("id",$user_id);
		$query=$this->db->get('general_assembley_members');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return  $data->name;
		}
		return false;

	}


	public function get_user_name_member($user_id)
	{
		$this->db->select('*');
		$this->db->where("id",$user_id);
		$query=$this->db->get('magls_members_table');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return  $data->member_name;
		}
		return false;

	}

	public function get_emp_name($user_id)
	{
		$this->db->select('*');
		$this->db->where("id",$user_id);
		$query=$this->db->get('employees');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return  $data->employee;
		}
		return false;

	}



	public function insert_maindata_order($id, $file)
	{
       	$data['rkm_talab'] = $this->chek_Null($this->input->post('rkm_talab'));
		$data['fe2a_type'] = $this->chek_Null($this->input->post('fe2a_type'));
		$data['k_num'] = $this->chek_Null($this->input->post('k_num'));
		$data['k_addres'] = $this->chek_Null($this->input->post('k_addres'));
		$data['k_name'] = $this->chek_Null($this->input->post('k_name'));
		$data['k_gender_fk'] = $this->chek_Null($this->input->post('k_gender_fk'));
		$data['k_nationality_fk'] = $this->chek_Null($this->input->post('k_nationality_fk'));
		$data['k_national_num'] = $this->chek_Null($this->input->post('k_national_num'));
		$data['k_national_type'] = $this->chek_Null($this->input->post('k_national_type'));
		$data['k_national_place'] = $this->chek_Null($this->input->post('k_national_place'));
		$data['k_city'] = $this->chek_Null($this->input->post('k_city'));
		$data['k_job_fk'] = $this->chek_Null($this->input->post('k_job_fk'));
		$data['k_job_place'] = $this->chek_Null($this->input->post('k_job_place'));
		$data['k_specialize_fk'] = $this->chek_Null($this->input->post('k_specialize_fk'));
		$data['k_barid_box'] = $this->chek_Null($this->input->post('k_barid_box'));
		$data['k_bardid_code'] = $this->chek_Null($this->input->post('k_bardid_code'));
		$data['k_fax'] = $this->chek_Null($this->input->post('k_fax'));
		$data['k_mob'] = $this->chek_Null($this->input->post('k_mob'));
		$data['k_email'] = $this->chek_Null($this->input->post('k_email'));
		$data['k_activity_fk'] = $this->chek_Null($this->input->post('k_activity_fk'));
		$data['k_message_method'] = $this->chek_Null($this->input->post('k_message_method'));
		$data['k_message_mob'] = $this->chek_Null($this->input->post('k_message_mob'));
		$data['k_notes'] = $this->chek_Null($this->input->post('k_notes'));
		$data['right_time_from'] = $this->chek_Null($this->input->post('right_time_from'));
		$data['right_time_to'] = $this->chek_Null($this->input->post('right_time_to'));


		$data['social_status_id_fk'] = $this->chek_Null($this->input->post('social_status_id_fk'));
		$data['reasons_stop_id_fk'] = $this->chek_Null($this->input->post('reasons_stop_id_fk'));
		$data['halat_kafel_id'] = $this->chek_Null($this->input->post('halat_kafel_id'));
		$data['w_name'] = $this->chek_Null($this->input->post('w_name'));
		$data['w_national_num'] = $this->chek_Null($this->input->post('w_national_num'));
		$data['w_mob'] = $this->chek_Null($this->input->post('w_mob'));
		$data['k_hai'] = $this->chek_Null($this->input->post('k_hai'));


		$data['wakel_relationship'] = $this->chek_Null($this->input->post('wakel_relationship'));
		$data['wakala_type'] = $this->chek_Null($this->input->post('wakala_type'));


		$data['work_id_fk'] = $this->chek_Null($this->input->post('work_id_fk'));


		$data['company_phone'] = $this->chek_Null($this->input->post('company_phone'));
		$data['company_gawal'] = $this->chek_Null($this->input->post('company_gawal'));
		$data['company_fax'] = $this->chek_Null($this->input->post('company_fax'));
       $data['esalat_nums'] = $this->chek_Null($this->input->post('esalat_nums'));

		if (!empty($file)) {
			$data['person_img'] = $file;

		}

		if (empty($id)) {

			$data['date'] = date('Y-m-d');
			$data['date_s'] = strtotime(date('Y-m-d'));
			$data['date_ar'] = date('Y-m-d');
			$data['publisher'] = $_SESSION['user_id'];
			$this->db->insert('fr_sponsor_orders', $data);

			$last_id = $this->db->insert_id();

		} else {
			$last_id = $id;
			$this->db->where('id', $id);
			$this->db->update('fr_sponsor_orders', $data);
		}

		if ($this->input->post('member_num')) {
			$num = count($this->input->post('member_num'));
			for ($i = 0; $i < $num; $i++) {
				$data_r['kafel_id_fk'] = $last_id;
				$data_r['kafala_type'] = $this->chek_Null($this->input->post('kafala_type')[$i]);
				$data_r['member_num'] = $this->chek_Null($this->input->post('member_num')[$i]);
				$data_r['kafala_period'] = $this->chek_Null($this->input->post('kafala_period')[$i]);
				$data_r['kafala_value'] = $this->chek_Null($this->input->post('kafala_value')[$i]);
				$data_r['all_kafala_value'] = $this->chek_Null($this->input->post('all_kafala_value')[$i]);
				$data_r['pay_method'] = $this->chek_Null($this->input->post('pay_method')[$i]);

				$this->db->insert('fr_sponsor_orders_details', $data_r);
			}
		}


	}

	public function getOrderById($id)
	{
		$this->db->select('*');
		$this->db->from('fr_sponsor_orders');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
				$data[$x]->details = $this->getOrderByIdDetails($row->id);
				$x++;
			}

			return $query->result();
		}
		return false;


	}

	public function getOrderByIdDetails($id)
	{
		$this->db->select('*');
		$this->db->from('fr_sponsor_orders_details');
		$this->db->where('kafel_id_fk', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}

	}


	public function updateOrderDetails($id)
	{
		$data_r['kafala_type'] = $this->chek_Null($this->input->post('kafala_type'));
		$data_r['member_num'] = $this->chek_Null($this->input->post('member_num'));
		$data_r['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));
		$data_r['kafala_value'] = $this->chek_Null($this->input->post('kafala_value'));
		$data_r['all_kafala_value'] = $this->chek_Null($this->input->post('all_kafala_value'));
		$data_r['pay_method'] = $this->chek_Null($this->input->post('pay_method'));

		$this->db->where('id', $id);
		$this->db->update('fr_sponsor_orders_details', $data_r);
	}


	public function delete_order($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_sponsor_orders');
		$this->db->where('kafel_id_fk', $id);
		$this->db->delete('fr_sponsor_orders_details');
	}


	public function delete_order_details($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_sponsor_orders_details');
	}


	public function select_last_id()
	{
		$this->db->select('*');
		$this->db->from("fr_sponsor_orders");
		$this->db->order_by("id", "DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		//	return $query->result()[0]->id + 1;
        return $query->result()[0]->k_num + 1;
		} else {
			return 0;
		}
	}

public function select_last_id_basic()
	{
		$this->db->select('*');
		$this->db->from("fr_sponsor");
		$this->db->order_by("id", "DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		//	return $query->result()[0]->id;
        return $query->result()[0]->k_num + 1;
		} else {
			return 0;
		}
	}


	/********************************************************************/
	public function getMother($where = false)
	{
		$this->db->select('mother.*,basic.file_num');
		$this->db->from('mother');
		$this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk', "LEFT");
		$this->db->where('basic.final_suspend', 4);
		$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return 0;
		}

	}


	public function getMembers($where = false)
	{
		$query = $this->db->select('f_members.*,basic.file_num, 
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
			->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
			->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
			->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
			->where('basic.final_suspend', 4)
			->where('basic.file_status', 1)
			->where($where)
			->order_by("basic.file_num", "ASC")
			->get('f_members');
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result_array() as $row) {
				$data[$x] = $row;
				$data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
				$data[$x]['check_member'] = $this->CheckHalfKafalaMember($row['id']);

				$x++;
			}
			return $data;
		} else {
			return 0;
		}


	}


	/*******************************************************/

	public function CheckHalfKafalaMember($id)
	{
		$now = strtotime(date('Y-m-d'));
		$query = $this->db->select('*')
			->where('person_id_fk', $id)
			->where('kafala_type_fk', 2)
			->order_by('id', 'desc')
			->limit(2)
			->get('fr_main_kafalat_details');
		if ($query->num_rows() > 0) {
			$a = 0;
			foreach ($query->result_array() as $row) {
				if ($row['first_date_to'] < $now) {

					continue;
				}

				$data[] = $row;
				$a++;
			}
			return $a;
		} else {
			return 0;
		}


	}

	/*******************************************************/


	public function getMembersArmal($where = false)
	{
		$query = $this->db->select('mother.*,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
         files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
         ')
			->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
			->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
			->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
			->where($where)
			->where('basic.file_status', 1)
			->get('mother');
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result_array() as $row) {
				$data[$x] = $row;
				$data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
				$x++;
			}
			return $data;
		} else {
			return 0;
		}


	}


	public function getmain_kafalat_details_data($mother_id)
	{
		$this->db->select('person_id_fk,first_date_from,first_date_to');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where('person_id_fk', $mother_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array()[0];
		} else {
			return 0;
		}


	}


/*
	public function insertSponsorOrdersTransform($id){
		$sponser_to_insert = $this->sponserbyId($id);
		$data = array();
		foreach ($sponser_to_insert as $key=>$value){
			if($key == 'id' || $key == 'kafel_order_num'|| $key == 'transformed'){
				continue;
			}
			$data[$key] = $value;
		}
		$data['kafel_order_num'] = $id;
		$this->db->insert('fr_sponsor',$data);
		$updateee['transformed'] = 1;
		$this->db->where('id',$id);
		$this->db->update('fr_sponsor_orders',$updateee);
	}*/
	public function insertSponsorOrdersTransform($id){
		$sponser_to_insert = $this->sponserbyId($id);
		$data = array();
		foreach ($sponser_to_insert as $key=>$value){
			/*if($key == 'id' || $key == 'kafel_order_num'|| $key == 'transformed' || $key == 'k_num'){
				continue;
			}*/
            if(in_array($key,  array('id','kafel_order_num','transformed','k_num','esalat_nums')) ){
            continue;
              }
            
			$data[$key] = $value;
		}
		$data['kafel_order_num'] = $id;
		$data['k_num'] = $this->select_last_id_basic();
		$this->db->insert('fr_sponsor',$data);
		$updateee['transformed'] = 1;
		$this->db->where('id',$id);
		$this->db->update('fr_sponsor_orders',$updateee);
	}
	public function sponserbyId($id)
	{
		$this->db->select('*');
		$this->db->from('fr_sponsor_orders');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
			return false;
	}
	//////
	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('fr_sponsor_orders');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			$query=$query->result();
			foreach ($query as $row) {
				$data[$x] = $row;
				$data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
				$data[$x]->fe2a_title = $this->get_fe2a_type($row->fe2a_type);//3-2-om
				// get_data_table_by
				$data[$x]->k_nationality_name = $this->get_data_table_by(1,2,$row->k_nationality_fk);
				$data[$x]->social_status_name = $this->get_data_table_by(2,11,$row->social_status_id_fk);
				$data[$x]->k_national_place_name = $this->get_data_table_by(2,4,$row->k_national_place);
				$type_f2a=$this->get_fe2a_type($row->fe2a_type)['specialize_fk'];
				if($type_f2a == 1){
					$data[$x]->wakel_relationship_name = $this->get_data_table_by(3,34,$row->wakel_relationship);
				}elseif($type_f2a == 2) {
					$data[$x]->wakel_relationship_name = $this->get_data_table_by(2,15,$row->wakel_relationship);
				}
				$data[$x]->city_name = $this->get_city_name($row->k_city);
				$data[$x]->hai_name = $this->get_city_name($row->k_hai);
	
				$data[$x]->k_specialize_name = $this->get_data_table_by(2,7,$row->k_specialize_fk);
				$data[$x]->k_job_name = $this->get_data_table_by(2,2,$row->k_job_fk);
				$data[$x]->reasons_stop_name = $this->get_data_table_by(2,12,$row->reasons_stop_id_fk);
	
	
	
	
				$x++;
			}
	
			return $data;
		}
		return false;
	
	
	}
	public function get_data_table_by($input_num,$type,$id)
{
$table_arr=array(1=>'employees_settings',2=>'fr_settings',3=>'family_setting');
if(key_exists($input_num, $table_arr)){

    $q=$this->db->where('type',$type)->where('id_setting',$id)->get($table_arr[$input_num])->row();
    if(!empty($q)){
        return $q->title_setting;
    }
}
}
public function get_city_name($id)
{  $this->db->select('name,id');
    $this->db->where('id',$id);
    $query= $this->db->get('cities')->row();
    if(!empty($query)){
        return $query->name;
    }
}




}