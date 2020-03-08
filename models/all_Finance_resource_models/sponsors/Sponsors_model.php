<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_model extends CI_Model
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

	public function select_last_id()
	{
		$this->db->select('*');
		$this->db->from("fr_sponsor");
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
    public function count_all_donors_sponsors($table)
{
    return $this->db
        ->count_all_results($table);
}

	public function select_last_k_num()
	{
		$this->db->select('*');
		$this->db->from("fr_sponsor");
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

	/*

        public function getById($id){
            $this->db->select('*');
            $this->db->from('fr_sponsor');
            $this->db->where('id',$id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }*/
        
        public function getById($id)
{
    $this->db->select('*');
    $this->db->from('fr_sponsor');
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
/*	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('fr_sponsor');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$data[$x]->kafel_status = $this->getkafelStatusById($row->halat_kafel_id);
                $data[$x]->fe2a_title = $this->get_fe2a_type($row->fe2a_type);//3-2-om
				$x++;
			}

			return $query->result();
		}
		return false;


	}
*/

	/*
        public function select_all(){
            $this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
            $this->db->from('fr_sponsor');
            $this->db->join('banks_settings','banks_settings.id=fr_sponsor.bank_id_fk','left');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $x=0;
                foreach ($query->result() as $row){
                    $data[$x] =  $row;
                    $data[$x]->Images =  $this->getImagesById($row->id);
                   $data[$x]->kafel_status =  $this->getkafelStatusById($row->halat_kafel_id);
                $x++;}
                return $data;
            }else{
                return false;
            }

        }*/

	public function select_all()
	{
		$this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor');
		$this->db->join('banks_settings', 'banks_settings.id=fr_sponsor.bank_id_fk', 'left');

		$this->db->order_by("fr_sponsor.k_num", "asc");



		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
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

	public function insert_maindata($id, $file)
	{

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


		if (!empty($file)) {
			$data['person_img'] = $file;

		}

		if (empty($id)) {

			$data['date'] = date('Y-m-d');
			$data['date_s'] = strtotime(date('Y-m-d'));
			$data['date_ar'] = date('Y-m-d');
			$data['publisher'] = $_SESSION['user_id'];
			$this->db->insert('fr_sponsor', $data);
			return $this->db->insert_id();

		} else {
			$this->db->where('id', $id);
			$this->db->update('fr_sponsor', $data);
			return $id;
		}


	}


	public function getf_members($id)
	{
		$this->db->select('*');
		$this->db->from('f_members');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0];
		} else {
			return false;
		}

	}

/*      	public function insert_Kfala_data($file, $id)
	{

        $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
		$data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

		if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
			$person_type = 2;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
			$person_type = 3;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
			$person_type = 1;
		} else {
			$person_type = 0;
		}

		$datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
		if (empty($datas['checked_in_main_kafalat'])) {
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));

			//kafala_period

			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;
	
			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			//	$data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			//	$data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;

			//$this->db->insert('fr_main_kafalat',$data);




            //start if

            $resut_f_members =$this->getf_members($this->input->post('person_id_fk'));
            $resut_mother =$this->get_mother_data2($this->input->post('person_id_fk'));




            if($this->input->post('kafala_type_fk') ==4){
    



                if($resut_mother->first_k_id == 0){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();


                }elseif ($resut_mother->first_k_id != 0  &&  $resut_mother->first_to <= strtotime(date('Y-m-d'))){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();


                }




                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('mother', $mothers);

            }else{



                if($resut_f_members->first_k_id == 0){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'first';

                }elseif ($resut_f_members->first_k_id != 0  &&  $resut_f_members->first_to <= strtotime(date('Y-m-d'))){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'first';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                ||  ( $resut_f_members->second_k_id == 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'second';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                    ||  ( $resut_f_members->second_k_id != 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'second';

                }

        

                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('f_members', $f_members);



            }

            //end if



			$this->db->insert('fr_main_kafalat_details', $data);




		} else {

			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));



			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;
	
			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));
			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;
      






            //start if

            $resut_f_members =$this->getf_members($this->input->post('person_id_fk'));
            $resut_mother =$this->get_mother_data($this->input->post('person_id_fk'));
            if($this->input->post('kafala_type_fk') ==4){
   



                if($resut_mother->first_k_id == 0){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();


                }elseif ($resut_mother->first_k_id != 0  &&  $resut_mother->first_to <= strtotime(date('Y-m-d'))){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();


                }






                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('mother', $mothers);

            }else{


                if($resut_f_members->first_k_id == 0){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'first';

                }elseif ($resut_f_members->first_k_id != 0  &&  $resut_f_members->first_to <= strtotime(date('Y-m-d'))){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'first';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                    ||  ( $resut_f_members->second_k_id == 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'second';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                    ||  ( $resut_f_members->second_k_id != 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $data['first_second_kafala'] =  'second';

                }
             

                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('f_members', $f_members);




            }

            //end if





            $this->db->insert('fr_main_kafalat_details', $data);



		}


    }
*/

	/*
        public function insert_Kfala_data($file,$id)
        {


            $data['from_date_h'] 	    =  $this->chek_Null($this->input->post('from_date_h'));
            $data['to_date_h'] 	    =  $this->chek_Null($this->input->post('to_date_h'));

              if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
             $person_type =2;
            }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
              $person_type =3;
            }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
                $person_type =1;
            }else{
              $person_type = 0;
            }

        $datas['checked_in_main_kafalat'] =  $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk') , $person_type , $this->input->post('person_id_fk') );
         if(empty($datas['checked_in_main_kafalat']) ){
            $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
            $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
            $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
            $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
            $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
            $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
            $data['first_date_from_ar']     =  $this->chek_Null($this->input->post('from_date'));
            $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));
            $data['first_date_to_ar']       =  $this->chek_Null($this->input->post('to_date'));
            $data['first_date_to'] 	        =  strtotime($this->chek_Null($this->input->post('to_date')));
            $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));


            if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
             $person_type =2;
            }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
              $person_type =3;
            }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
                $person_type =1;
            }else{
              $person_type = 0;
            }

              $data['person_type'] 		    =  $person_type;

            $data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
            $data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
            $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
            $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
            $data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
            $data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
            $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
            $data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
            $data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
            $data['mostdem_img']    	   =  $file ;

             //$this->db->insert('fr_main_kafalat',$data);
            $this->db->insert('fr_main_kafalat_details',$data);
      }else{

         $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
            $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
            $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
            $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
            $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
            $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
            $data['first_date_from_ar'] 	    =  $this->chek_Null($this->input->post('from_date'));
            $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));
            $data['first_date_to_ar'] 		    =  $this->chek_Null($this->input->post('to_date'));
            $data['first_date_to'] 	    =  strtotime($this->chek_Null($this->input->post('to_date')));
            $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));



            if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
             $person_type =2;
            }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
              $person_type =3;
            }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
                $person_type =1;
            }else{
              $person_type = 0;
            }

              $data['person_type'] 		    =  $person_type;
               $data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
            $data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
            $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
            $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
            $data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
            $data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
             $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
             $data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
             $data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
            $data['mostdem_img']    	   =  $file ;


                  $this->db->insert('fr_main_kafalat_details',$data);




      }

        }
        */

	/*

      public function update_Kfala_data($file,$id)
      {



            if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
           $person_type =2;
          }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
            $person_type =3;
          }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
              $person_type =1;
          }else{
            $person_type = 0;
          }

      $datas['checked_in_main_kafalat'] =  $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk') , $person_type , $this->input->post('person_id_fk') );
       if(empty($datas['checked_in_main_kafalat']) ){
          $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
          $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
          $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
          $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
          $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
          $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
          $data['first_date_from_ar']     =  $this->chek_Null($this->input->post('from_date'));
          $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));
          $data['first_date_to_ar']       =  $this->chek_Null($this->input->post('to_date'));
          $data['first_date_to'] 	        =  strtotime($this->chek_Null($this->input->post('to_date')));
          $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));



          if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
           $person_type =2;
          }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
            $person_type =3;
          }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
              $person_type =1;
          }else{
            $person_type = 0;
          }

            $data['person_type'] 		    =  $person_type;

          $data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
          $data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
          $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
          $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
          $data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
          $data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
           $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
            $data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
            $data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
          $data['mostdem_img']    	   =  $file ;
          $this->db->where('id', $id);
          $this->db->update('fr_main_kafalat_details',$data);
    }else{

       $data['mother_national_num_fk'] =  $this->chek_Null($this->input->post('mother_national_num_fk'));
          $data['person_type'] 		    =  $this->chek_Null($this->input->post('person_type'));
          $data['person_id_fk'] 		    =  $this->chek_Null($this->input->post('person_id_fk'));
          $data['kafala_type_fk'] 	    =  $this->chek_Null($this->input->post('kafala_type_fk'));
          $data['first_kafel_id'] 	    =  $this->chek_Null($this->input->post('kafel_id_fk'));
          $data['first_value'] 		    =  $this->chek_Null($this->input->post('k_value'));
          $data['first_date_from_ar'] 	    =  $this->chek_Null($this->input->post('from_date'));
          $data['first_date_from'] 	    =  strtotime($this->chek_Null($this->input->post('from_date')));
          $data['first_date_to_ar'] 		    =  $this->chek_Null($this->input->post('to_date'));
          $data['first_date_to'] 	    =  strtotime($this->chek_Null($this->input->post('to_date')));
          $data['first_status'] 		    =  $this->chek_Null($this->input->post('kafala_status'));



          if($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2){
           $person_type =2;
          }elseif($this->chek_Null($this->input->post('kafala_type_fk')) ==3 ){
            $person_type =3;
          }elseif($this->chek_Null($this->input->post('kafala_type_fk')) == 4){
              $person_type =1;
          }else{
            $person_type = 0;
          }

            $data['person_type'] 		    =  $person_type;

          $data['alert_type'] 		   =  $this->chek_Null($this->input->post('alert_type'));
          $data['pay_method']            =  $this->chek_Null($this->input->post('pay_method'));
          $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
          $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
          $data['gamia_account'] 		   =  $this->chek_Null($this->input->post('gamia_account'));
          $data['gamia_bank_id_fk'] 	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
           $data['gamia_account_num'] 	   =  $this->chek_Null($this->input->post('gamia_account_num'));
           $data['bank_id_fk'] 	   =  $this->chek_Null($this->input->post('bank_id_fk'));
           $data['bank_account_num'] 	   =  $this->chek_Null($this->input->post('bank_account_num'));
          $data['mostdem_img']    	   =  $file ;


        $this->db->where('id', $id);

        $this->db->update('fr_main_kafalat_details',$data);

           }

        }
        */

   /*
	public function update_Kfala_data($file, $id)
	{


		$data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
		$data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

		if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
			$person_type = 2;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
			$person_type = 3;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
			$person_type = 1;
		} else {
			$person_type = 0;
		}

		$datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
		if (empty($datas['checked_in_main_kafalat'])) {
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));



			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;

			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

//	  $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
//	  $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;
			$this->db->where('id', $id);
			$this->db->update('fr_main_kafalat_details', $data);
		} else {

			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));


			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;

			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			// $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
			// $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;


			$this->db->where('id', $id);

			$this->db->update('fr_main_kafalat_details', $data);

		}
		//echo'<pre>';  var_dump($data); echo'</pre>'; die;
	}
    */


/*
//7-5-2019
    public function insert_Kfala_data($file, $id)
	{


        $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
		$data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

		if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
			$person_type = 2;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
			$person_type = 3;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
			$person_type = 1;
		} else {
			$person_type = 0;
		}

		$datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
		if (empty($datas['checked_in_main_kafalat'])) {
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
			//kafala_period



			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;
		
			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			//	$data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			//	$data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;

			//$this->db->insert('fr_main_kafalat',$data);




            //start if

            $resut_f_members =$this->getf_members($this->input->post('person_id_fk'));
            $resut_mother =$this->get_mother_data2($this->input->post('person_id_fk'));




            if($this->input->post('kafala_type_fk') ==4){
  

                if($resut_mother->first_k_id == 0){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                }elseif ($resut_mother->first_k_id != 0  &&  $resut_mother->first_to <= strtotime(date('Y-m-d'))){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                }


                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('mother', $mothers);

            }else{



                if($resut_f_members->first_k_id == 0){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] =  'first';

                }elseif ($resut_f_members->first_k_id != 0  &&  $resut_f_members->first_to <= strtotime(date('Y-m-d'))){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] =  'first';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                ||  ( $resut_f_members->second_k_id == 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] =  'second';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                    ||  ( $resut_f_members->second_k_id != 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] =  'second';

                }

    

                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('f_members', $f_members);



            }


			$this->db->insert('fr_main_kafalat_details', $data);




		} else {
		
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));



			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;
	
			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));
			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;


            $resut_f_members =$this->getf_members($this->input->post('person_id_fk'));
            $resut_mother =$this->get_mother_data($this->input->post('person_id_fk'));
            if($this->input->post('kafala_type_fk') ==4){
        


                if($resut_mother->first_k_id == 0){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


                }elseif ($resut_mother->first_k_id != 0  &&  $resut_mother->first_to <= strtotime(date('Y-m-d'))){


                    $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $mothers['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                }

                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));




                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('mother', $mothers);

            }else{


                if($resut_f_members->first_k_id == 0){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] =  'first';

                }elseif ($resut_f_members->first_k_id != 0  &&  $resut_f_members->first_to <= strtotime(date('Y-m-d'))){


                    $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['first_k_name'] =$this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                    $data['first_second_kafala'] =  'first';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                    ||  ( $resut_f_members->second_k_id == 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                    $data['first_second_kafala'] =  'second';

                }elseif (
                    ($resut_f_members->first_k_id != 0   &&  $resut_f_members->first_to > strtotime(date('Y-m-d')) )

                    ||  ( $resut_f_members->second_k_id != 0   && $resut_f_members->second_to < strtotime(date('Y-m-d')) )){

                    $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                    $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                    $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                    $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                    $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                    $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                    $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                    $data['first_second_kafala'] =  'second';

                }

            
                $this->db->where('id',$this->input->post('person_id_fk'));
                $this->db->update('f_members', $f_members);




            }

            //end if

            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));


            $this->db->insert('fr_main_kafalat_details', $data);


		
		}


    }*/
    
/*	public function update_Kfala_data($file, $id)
	{



        $result =$this->Get_Data_from_main_kafalat(array('id'=>$id));

        if($this->input->post('kafala_type_fk') ==4){




            $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
            $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $mothers['first_kafala_id'] = $id;




        }else{

            if($result->first_second_kafala === 'first'){


                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $id;


            }elseif($result->first_second_kafala === 'second'){


                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $id;


            }

            }



        if($result->kafala_type_fk ==4){

            $this->db->where('id',$result->person_id_fk);
            $this->db->update('mother', $mothers);

        }else{

            $this->db->where('id',$result->person_id_fk);
            $this->db->update('f_members', $f_members);

        }










        $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
		$data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

		if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
			$person_type = 2;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
			$person_type = 3;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
			$person_type = 1;
		} else {
			$person_type = 0;
		}

		$datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
		if (empty($datas['checked_in_main_kafalat'])) {
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));



			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;

			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

//	  $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
//	  $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;














            $this->db->where('id', $id);
			$this->db->update('fr_main_kafalat_details', $data);
		} else {

			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));

	

			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;

			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			// $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
			// $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;





			$this->db->where('id', $id);

			$this->db->update('fr_main_kafalat_details', $data);

		}
		//echo'<pre>';  var_dump($data); echo'</pre>'; die;
	}

*/

/*
public function insert_Kfala_data($file, $id)
{


    $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
    $data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

    if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
        $person_type = 2;
    } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
        $person_type = 3;
    } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
        $person_type = 1;
    } else {
        $person_type = 0;
    }

    $datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
    if (empty($datas['checked_in_main_kafalat'])) {
        $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
        $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
        //kafala_period



        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $data['person_type'] = $person_type;
    
        $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
        $data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        // $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
        $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
        $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

        // $data['mostdem_to_date']      =  $this->chek_Null($this->input->post('mostdem_to_date'));
        $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
        $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

        $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
        $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
        $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['mostdem_img'] = $file;

        //$this->db->insert('fr_main_kafalat',$data);


        //start if

        $resut_f_members = $this->getf_members($this->input->post('person_id_fk'));
        $resut_mother = $this->get_mother_data2($this->input->post('person_id_fk'));


        if ($this->input->post('kafala_type_fk') == 4) {



            if ($resut_mother->first_k_id == 0) {


                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


            } elseif ($resut_mother->first_k_id != 0 && $resut_mother->first_halet_kafala  ==2) {


                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


            }



            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('mother', $mothers);

        } else {


            if ($resut_f_members->first_k_id == 0) {


                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==2) {


                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==1)

                || ($resut_f_members->second_k_id == 0 && $resut_f_members->second_halet_kafala  ==2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'second';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==1)

                || ($resut_f_members->second_k_id != 0 &&  $resut_f_members->second_halet_kafala  ==2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'second';

            }



            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('f_members', $f_members);


        }

        $this->db->insert('fr_main_kafalat_details', $data);


    } else {
    
        $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
        $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));


        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $data['person_type'] = $person_type;

        $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
        $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

        $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
        $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));
        $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
        $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
        $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['mostdem_img'] = $file;


        $resut_f_members = $this->getf_members($this->input->post('person_id_fk'));
        $resut_mother = $this->get_mother_data($this->input->post('person_id_fk'));
        if ($this->input->post('kafala_type_fk') == 4) {



            if ($resut_mother->first_k_id == 0) {


                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


            } elseif ($resut_mother->first_k_id != 0 && $resut_mother->first_to <= strtotime(date('Y-m-d'))) {


                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            }

            $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));


            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('mother', $mothers);

        } else {


            if ($resut_f_members->first_k_id == 0) {


                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==2) {


                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif (
                ($resut_f_members->first_k_id != 0 &&  $resut_f_members->first_halet_kafala  ==1)

                || ($resut_f_members->second_k_id == 0 && $resut_f_members->second_halet_kafala  ==2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                $data['first_second_kafala'] = 'second';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala  ==1)

                || ($resut_f_members->second_k_id != 0 && $resut_f_members->first_halet_kafala  ==2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                $data['first_second_kafala'] = 'second';

            }



            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('f_members', $f_members);


        }



        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));


        $this->db->insert('fr_main_kafalat_details', $data);


        $data_history['mother_national_num_fk'] = $data['mother_national_num_fk'];
        $data_history['file_num'] = $this->get_file_num($data['mother_national_num_fk']);
        $data_history['person_type'] = $data['person_type'];
        $data_history['person_id_fk'] = $data['person_id_fk'];
        $data_history['kafala_type_fk'] = $data['kafala_type_fk'];
        $data_history['first_kafel_id'] = $data['first_kafel_id'];
        $data_history['first_value'] = $data['first_value'];
        $data_history['first_date_from'] = $data['first_date_from'];
        $data_history['first_date_from_ar'] = $data['first_date_from_ar'];
        $data_history['first_date_to'] = $data['first_date_to'];
        $data_history['first_date_to_ar'] = $data['first_date_to_ar'];
        $data_history['first_status'] = $data['first_status'];
        $data_history['alert_type'] = $data['alert_type'];

        $data_history['pay_method'] = $data['pay_method'];
        $data_history['mostdem_from_date_m'] = $data['mostdem_from_date_m'];
        $data_history['mostdem_from_date_h'] = $data['mostdem_from_date_h'];
        $data_history['mostdem_to_date_m'] = $data['mostdem_to_date_m'];
        $data_history['mostdem_to_date_h'] = $data['mostdem_to_date_h'];
        $data_history['gamia_account'] = $data['gamia_account'];
        $data_history['gamia_bank_id_fk'] = $data['gamia_bank_id_fk'];
        $data_history['gamia_account_num'] = $data['gamia_account_num'];
        $data_history['bank_id_fk'] = $data['bank_id_fk'];
        $data_history['bank_account_num'] = $data['bank_account_num'];

        $data_history['from_date_h'] = $data['from_date_h'];
        $data_history['to_date_h'] = $data['to_date_h'];
        $data_history['kafala_period'] = $data['kafala_period'];
        $data_history['first_kafala_reason'] = $data['first_kafala_reason'];

        $data_history['publisher'] = $_SESSION['user_id'];
        $data_history['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data_history['date_ar'] = date('Y-m-d');
        $data_history['time'] = date('H:i:s');
        $data_history['date'] = strtotime(date('Y-m-d')) ;
        $this->db->insert('fr_main_kafalat_history', $data_history);


    }


}
*/


public function insert_Kfala_data($file, $id)
{

    $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
    $data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

    if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
        $person_type = 2;
    } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
        $person_type = 3;
    } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
        $person_type = 1;
    } else {
        $person_type = 0;
    }

    $datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
    if (empty($datas['checked_in_main_kafalat'])) {
        $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
        $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
        //kafala_period

        /**
         * @Hints
         * armal    = 1
         * yatem    = 2
         * mostafed = 3
         */

        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $data['person_type'] = $person_type;
        /*******************************************************************************************/
        $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
        $data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        // $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
        $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
        $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

        // $data['mostdem_to_date']      =  $this->chek_Null($this->input->post('mostdem_to_date'));
        $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
        $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

        $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
        $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
        $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['mostdem_img'] = $file;

        //$this->db->insert('fr_main_kafalat',$data);

        //start if

        $resut_f_members = $this->getf_members($this->input->post('person_id_fk'));
        $resut_mother = $this->get_mother_data2($this->input->post('person_id_fk'));

        if ($this->input->post('kafala_type_fk') == 4) {
            /********************  update_mother*********************/

            if ($resut_mother->first_k_id == 0) {

                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            } elseif ($resut_mother->first_k_id != 0 && $resut_mother->first_halet_kafala == 2) {

                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            }

            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('mother', $mothers);
        } else {
            if ($resut_f_members->first_k_id == 0) {

                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala == 2) {

                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala == 1)

                || ($resut_f_members->second_k_id == 0 && $resut_f_members->second_halet_kafala == 2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'second';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala == 1)

                || ($resut_f_members->second_k_id != 0 && $resut_f_members->second_halet_kafala == 2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'second';

            }

            /******************** update_f_members********************/

            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('f_members', $f_members);

        }

        //end if
        $this->db->insert('fr_main_kafalat_details', $data);
        $this->insert_history($data, 'اضافة كفالة جديدة');

    } else {
        /********************************************************************/
        $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
        $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
        /**
         * @Hints
         * armal    = 1
         * yatem    = 2
         * mostafed = 3
         */

        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $data['person_type'] = $person_type;
        /*******************************************************************************************/
        $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
        $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

        $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
        $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));
        $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
        $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
        $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['mostdem_img'] = $file;
        /******************** *********************/

        //start if

        $resut_f_members = $this->getf_members($this->input->post('person_id_fk'));
        $resut_mother = $this->get_mother_data($this->input->post('person_id_fk'));
        if ($this->input->post('kafala_type_fk') == 4) {
            /********************  update_mother*********************/

            if ($resut_mother->first_k_id == 0) {

                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            } elseif ($resut_mother->first_k_id != 0 && $resut_mother->first_to <= strtotime(date('Y-m-d'))) {

                $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $mothers['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            }

            $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('mother', $mothers);

        } else {

            if ($resut_f_members->first_k_id == 0) {

                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala == 2) {

                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

                $data['first_second_kafala'] = 'first';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala == 1)

                || ($resut_f_members->second_k_id == 0 && $resut_f_members->second_halet_kafala == 2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                $data['first_second_kafala'] = 'second';

            } elseif (
                ($resut_f_members->first_k_id != 0 && $resut_f_members->first_halet_kafala == 1)

                || ($resut_f_members->second_k_id != 0 && $resut_f_members->first_halet_kafala == 2)) {

                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_kafala_id'] = $this->select_last_id_fr_main_kafalat_details();
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                $data['first_second_kafala'] = 'second';

            }

            /******************** update_f_members********************/

            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('f_members', $f_members);

        }

        //end if

        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
        /*
                    echo "<pre>";
                    print_r($data);
                    echo "</pre>";
                    die;*/

        $this->db->insert('fr_main_kafalat_details', $data);

        $this->insert_history($data, 'اضافة كفالة جديدة');

        /*********************************************************************/
    }

}


public function update_Kfala_data($file, $id)
{

    $result = $this->Get_Data_from_main_kafalat(array('id' => $id));

    if ($this->input->post('kafala_type_fk') == 4) {
        /********************  update_mother*********************/

        $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
        $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
        $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
        $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

        $mothers['first_kafala_id'] = $id;

    } else {

        if ($result->first_second_kafala === 'first') {

            $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
            $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
            $f_members['first_kafala_id'] = $id;

        } elseif ($result->first_second_kafala === 'second') {

            $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
            $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
            $f_members['second_kafala_id'] = $id;

        }

    }

    if ($result->kafala_type_fk == 4) {

        $this->db->where('id', $result->person_id_fk);
        $this->db->update('mother', $mothers);

    } else {

        $this->db->where('id', $result->person_id_fk);
        $this->db->update('f_members', $f_members);

    }

    /**************************************************************/

    $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
    $data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

    if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
        $person_type = 2;
    } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
        $person_type = 3;
    } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
        $person_type = 1;
    } else {
        $person_type = 0;
    }

    $datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
    if (empty($datas['checked_in_main_kafalat'])) {
        $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
        $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
        /**
         * @Hints
         * armal    = 1
         * yatem    = 2
         * mostafed = 3
         */

        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $data['person_type'] = $person_type;
        /*******************************************************************************************/
        $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
        $data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
        $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

        $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
        $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

//	  $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
//	  $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
        $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
        $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
        $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['mostdem_img'] = $file;

        $this->db->where('id', $id);
        $this->db->update('fr_main_kafalat_details', $data);
        if ($this->chek_Null($this->input->post('kafala_status')) == 2) {
            $this->insert_history($data, 'وقف كفالة ');
        } elseif ($this->input->post('edite_date')) {
            $this->insert_history($data, 'تجديد كفالة ');

        } else {
            $this->insert_history($data, 'تعديل كفالة ');
        }
    } else {
        /********************************************************************/
        $data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
        $data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
        $data['first_value'] = $this->chek_Null($this->input->post('k_value'));
        $data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
        $data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
        $data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
        $data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
        $data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
        $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
        $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
        /**
         * @Hints
         * armal    = 1
         * yatem    = 2
         * mostafed = 3
         */

        if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
            $person_type = 2;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
            $person_type = 3;
        } elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
            $person_type = 1;
        } else {
            $person_type = 0;
        }

        $data['person_type'] = $person_type;
        /*******************************************************************************************/
        $data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
        $data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
        // $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
        // $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
        $data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
        $data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

        $data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
        $data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

        $data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
        $data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
        $data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
        $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
        $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
        $data['mostdem_img'] = $file;
        $data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

        $this->db->where('id', $id);

        $this->db->update('fr_main_kafalat_details', $data);
//history
        if ($this->chek_Null($this->input->post('kafala_status')) == 2) {
            $this->insert_history($data, 'وقف كفالة ');
        } elseif ($this->input->post('edite_date')) {
            $this->insert_history($data, 'تجديد كفالة ');
        } else {
            $this->insert_history($data, 'تعديل كفالة ');
        }
    }
    //echo'<pre>';  var_dump($data); echo'</pre>'; die;
}

public function insert_history($data, $title)
{
    $data_history['mother_national_num_fk'] = $data['mother_national_num_fk'];
    $data_history['file_num'] = $this->get_file_num($data['mother_national_num_fk']);
    $data_history['person_type'] = $data['person_type'];
    $data_history['person_id_fk'] = $data['person_id_fk'];
    $data_history['kafala_type_fk'] = $data['kafala_type_fk'];
    $data_history['first_kafel_id'] = $data['first_kafel_id'];
    $data_history['first_value'] = $data['first_value'];
    $data_history['first_date_from'] = $data['first_date_from'];
    $data_history['first_date_from_ar'] = $data['first_date_from_ar'];
    $data_history['first_date_to'] = $data['first_date_to'];
    $data_history['first_date_to_ar'] = $data['first_date_to_ar'];
    $data_history['first_status'] = $data['first_status'];
    $data_history['alert_type'] = $data['alert_type'];

    $data_history['pay_method'] = $data['pay_method'];
    $data_history['mostdem_from_date_m'] = $data['mostdem_from_date_m'];
    $data_history['mostdem_from_date_h'] = $data['mostdem_from_date_h'];
    $data_history['mostdem_to_date_m'] = $data['mostdem_to_date_m'];
    $data_history['mostdem_to_date_h'] = $data['mostdem_to_date_h'];
    $data_history['gamia_account'] = $data['gamia_account'];
    $data_history['gamia_bank_id_fk'] = $data['gamia_bank_id_fk'];
    $data_history['gamia_account_num'] = $data['gamia_account_num'];
    $data_history['bank_id_fk'] = $data['bank_id_fk'];
    $data_history['bank_account_num'] = $data['bank_account_num'];

    $data_history['from_date_h'] = $data['from_date_h'];
    $data_history['to_date_h'] = $data['to_date_h'];
    $data_history['kafala_period'] = $data['kafala_period'];
    $data_history['first_kafala_reason'] = $data['first_kafala_reason'];
    $data_history['publisher'] = $_SESSION['user_id'];
    $data_history['publisher_name'] = $this->getUserName($_SESSION['user_id']);
    $data_history['date_ar'] = date('Y-m-d');
    $data_history['time'] = date('H:i:s');
    $data_history['date'] = strtotime(date('Y-m-d'));
    $data_history['event_title'] = $title;
    $this->db->insert('fr_main_kafalat_history', $data_history);
}

/*
	public function update_Kfala_data($file, $id)
	{

        $result =$this->Get_Data_from_main_kafalat(array('id'=>$id));

        if($this->input->post('kafala_type_fk') ==4){




            $mothers['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
            $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $mothers['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));

            $mothers['first_kafala_id'] = $id;




        }else{

            if($result->first_second_kafala === 'first'){


                $f_members['first_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['first_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                $f_members['first_kafala_id'] = $id;


            }elseif($result->first_second_kafala === 'second'){


                $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
                $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
                $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
                $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
                $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
                $f_members['second_halet_kafala'] = $this->chek_Null($this->input->post('kafala_status'));
                $f_members['second_kafala_id'] = $id;


            }

            }



        if($result->kafala_type_fk ==4){

            $this->db->where('id',$result->person_id_fk);
            $this->db->update('mother', $mothers);

        }else{

            $this->db->where('id',$result->person_id_fk);
            $this->db->update('f_members', $f_members);

        }


        $data['from_date_h'] = $this->chek_Null($this->input->post('from_date_h'));
		$data['to_date_h'] = $this->chek_Null($this->input->post('to_date_h'));

		if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
			$person_type = 2;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
			$person_type = 3;
		} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
			$person_type = 1;
		} else {
			$person_type = 0;
		}

		$datas['checked_in_main_kafalat'] = $this->Get_Details_from_fr_main_kafalat($this->input->post('mother_national_num_fk'), $person_type, $this->input->post('person_id_fk'));
		if (empty($datas['checked_in_main_kafalat'])) {
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
			$data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
          $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
	

			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;

			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));

			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

//	  $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
//	  $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;

            $this->db->where('id', $id);
			$this->db->update('fr_main_kafalat_details', $data);
		} else {
	
			$data['mother_national_num_fk'] = $this->chek_Null($this->input->post('mother_national_num_fk'));
			$data['person_type'] = $this->chek_Null($this->input->post('person_type'));
			$data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
			$data['kafala_type_fk'] = $this->chek_Null($this->input->post('kafala_type_fk'));
			$data['first_kafel_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
			$data['first_value'] = $this->chek_Null($this->input->post('k_value'));
			$data['first_date_from_ar'] = $this->chek_Null($this->input->post('from_date'));
			$data['first_date_from'] = strtotime($this->chek_Null($this->input->post('from_date')));
			$data['first_date_to_ar'] = $this->chek_Null($this->input->post('to_date'));
			$data['first_date_to'] = strtotime($this->chek_Null($this->input->post('to_date')));
			$data['first_status'] = $this->chek_Null($this->input->post('kafala_status'));
            $data['first_kafala_reason'] = $this->chek_Null($this->input->post('kafala_reason'));
  $data['first_suspension_type'] = $this->chek_Null($this->input->post('suspension_type'));
	
			if ($this->chek_Null($this->input->post('kafala_type_fk')) == 1 || $this->chek_Null($this->input->post('kafala_type_fk')) == 2) {
				$person_type = 2;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 3) {
				$person_type = 3;
			} elseif ($this->chek_Null($this->input->post('kafala_type_fk')) == 4) {
				$person_type = 1;
			} else {
				$person_type = 0;
			}

			$data['person_type'] = $person_type;

			$data['alert_type'] = $this->chek_Null($this->input->post('alert_type'));
			$data['pay_method'] = $this->chek_Null($this->input->post('pay_method'));
			// $data['mostdem_from_date']     =  $this->chek_Null($this->input->post('mostdem_from_date'));
			// $data['mostdem_to_date'] 	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
			$data['mostdem_from_date_m'] = $this->chek_Null($this->input->post('mostdem_from_date_m'));
			$data['mostdem_from_date_h'] = $this->chek_Null($this->input->post('mostdem_from_date_h'));

			$data['mostdem_to_date_m'] = $this->chek_Null($this->input->post('mostdem_to_date_m'));
			$data['mostdem_to_date_h'] = $this->chek_Null($this->input->post('mostdem_to_date_h'));

			$data['gamia_account'] = $this->chek_Null($this->input->post('gamia_account'));
			$data['gamia_bank_id_fk'] = $this->chek_Null($this->input->post('gamia_bank_id_fk'));
			$data['gamia_account_num'] = $this->chek_Null($this->input->post('gamia_account_num'));
			$data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
			$data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
			$data['mostdem_img'] = $file;
           $data['kafala_period'] = $this->chek_Null($this->input->post('kafala_period'));




			$this->db->where('id', $id);

			$this->db->update('fr_main_kafalat_details', $data);



$data_history['mother_national_num_fk'] = $data['mother_national_num_fk'];
        $data_history['file_num'] = $this->get_file_num($data['mother_national_num_fk']);
        $data_history['person_type'] = $data['person_type'];
        $data_history['person_id_fk'] = $data['person_id_fk'];
        $data_history['kafala_type_fk'] = $data['kafala_type_fk'];
        $data_history['first_kafel_id'] = $data['first_kafel_id'];
        $data_history['first_value'] = $data['first_value'];
        $data_history['first_date_from'] = $data['first_date_from'];
        $data_history['first_date_from_ar'] = $data['first_date_from_ar'];
        $data_history['first_date_to'] = $data['first_date_to'];
        $data_history['first_date_to_ar'] = $data['first_date_to_ar'];
        $data_history['first_status'] = $data['first_status'];
        $data_history['alert_type'] = $data['alert_type'];

        $data_history['pay_method'] = $data['pay_method'];
        $data_history['mostdem_from_date_m'] = $data['mostdem_from_date_m'];
        $data_history['mostdem_from_date_h'] = $data['mostdem_from_date_h'];
        $data_history['mostdem_to_date_m'] = $data['mostdem_to_date_m'];
        $data_history['mostdem_to_date_h'] = $data['mostdem_to_date_h'];
        $data_history['gamia_account'] = $data['gamia_account'];
        $data_history['gamia_bank_id_fk'] = $data['gamia_bank_id_fk'];
        $data_history['gamia_account_num'] = $data['gamia_account_num'];
        $data_history['bank_id_fk'] = $data['bank_id_fk'];
        $data_history['bank_account_num'] = $data['bank_account_num'];

        $data_history['from_date_h'] = $data['from_date_h'];
        $data_history['to_date_h'] = $data['to_date_h'];
        $data_history['kafala_period'] = $data['kafala_period'];
        $data_history['first_kafala_reason'] = $data['first_kafala_reason'];
        $data_history['publisher'] = $_SESSION['user_id'];
        $data_history['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data_history['date_ar'] = date('Y-m-d');
        $data_history['time'] = date('H:i:s');
        $data_history['date'] = strtotime(date('Y-m-d')) ;
        $this->db->insert('fr_main_kafalat_history', $data_history);
		}
		//echo'<pre>';  var_dump($data); echo'</pre>'; die;
	}


*/

	public function Get_Details_from_fr_main_kafalat($mother_national_num_fk, $person_type, $person_id_fk)
	{
		$this->db->select('id,mother_national_num_fk,person_type,person_id_fk');
		$this->db->from('fr_main_kafalat');
		$this->db->where('mother_national_num_fk', $mother_national_num_fk);
		$this->db->where('person_type', $person_type);
		$this->db->where('person_id_fk', $person_id_fk);


		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = $row;
			}
			return $data;
		} else {
			return false;
		}

	}




	/*

        public function insert_Kfala_data($file,$id)
        {
            //fr_kafala_subscription

            $data['mother_national_num_fk'] 		   =  $this->chek_Null($this->input->post('mother_national_num_fk'));
            $data['kafel_id_fk'] 		   =  $this->chek_Null($this->input->post('kafel_id_fk'));
            $data['kafala_type_fk'] 		   =  $this->chek_Null($this->input->post('kafala_type_fk'));
            $data['person_type'] 		   =  $this->chek_Null($this->input->post('person_type'));
            $data['person_id_fk'] 		   =  $this->chek_Null($this->input->post('person_id_fk'));
            $data['from_date'] 		   =  $this->chek_Null($this->input->post('from_date'));
            $from_date =explode('/',$data['from_date'] 	);
            $data['from_d'] 		   =  $this->chek_Null($from_date[0]);
            $data['from_m'] 		   =  $this->chek_Null($from_date[1]);
            $data['from_y'] 		   =  $this->chek_Null($from_date[1]);

            $data['to_date'] 		   =  $this->chek_Null($this->input->post('to_date'));
            $to_date =explode('/',$data['to_date'] 	);
            $data['to_d'] 		   =  $this->chek_Null($to_date[0]);
            $data['to_m'] 		    =  $this->chek_Null($to_date[1]);
            $data['to_y'] 		   =  $this->chek_Null($to_date[1]);
            $data['kafala_now'] 		   =  0;
            $data['kafala_status'] 		   =  $this->chek_Null($this->input->post('kafala_status'));
            $data['num_days'] 		  	   =  $this->chek_Null($this->input->post('num_days'));
            $data['alert_type'] 		  	   =  $this->chek_Null($this->input->post('alert_type'));
            $data['pay_method']      =  $this->chek_Null($this->input->post('pay_method'));
            $data['bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('bank_id_fk'));
            $data['bank_account_num'] 		  	   =  $this->chek_Null($this->input->post('bank_account_num'));





            $data['mostdem_from_date'] 		  	   =  $this->chek_Null($this->input->post('mostdem_from_date'));
            $data['mostdem_to_date'] 		  	   =  $this->chek_Null($this->input->post('mostdem_to_date'));
            $data['gamia_account'] 		  	   =  $this->chek_Null($this->input->post('gamia_account'));
            $data['gamia_bank_id_fk'] 		  	   =  $this->chek_Null($this->input->post('gamia_bank_id_fk'));
            $data['mostdem_img'] 		  	   =  $file ;

            $data['date'] 		  	   = date('Y-m-d');
            $data['date_s'] 	  	   = strtotime(date('Y-m-d'));
            $data['date_ar'] 	  	   = date('Y-m-d');
            $data['publisher'] 	  	   = $_SESSION['user_id'];
            $this->db->insert('fr_kafala_subscription',$data);


            //f_members
            $data2['kafala_type_fk']      =  $this->chek_Null($this->input->post('kafala_type_fk'));
            $data2['kafel_id_fk'] 		  	   =  $this->chek_Null($this->input->post('kafel_id_fk'));
            if(	$data2['kafala_type_fk'] ==1){
                $data2['first_kafala_from'] 		  	   =  $this->chek_Null($data['from_date']);
                $data2['first_kafala_to'] 		  	   =  $this->chek_Null($data['to_date']);
            }elseif($data2['kafala_type_fk'] ==2){
                $f_members_data =$this->getf_members($this->input->post('person_id_fk'));
                if(!empty($f_members_data)){

                    if($f_members_data->first_kafala_from == 0 && $f_members_data->first_kafala_to == 0 ){
                        $data2['first_kafala_from'] 		  	   =  $this->chek_Null($data['from_date'] );
                        $data2['first_kafala_to'] 		  	   =  $this->chek_Null($data['to_date'] );

                    }else{
                        $data2['second_kafala_from'] 		  	   =  $this->chek_Null($data['from_date'] );
                        $data2['second_kafala_to'] 		  	   =  $this->chek_Null($data['to_date']);
                    }
                }

            }


            $this->db->where('id', $this->input->post('person_id_fk'));
            $this->db->update('f_members',$data2);


        }
    */
	/********************************************************************************************/

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_sponsor');
		$this->db->where('person_id', $id);
		$this->db->delete('fr_all_attachments');
	}

	public function delete_attach($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_all_attachments');
	}


	public function add_attach($images)
	{
		$attach_id_fk = $this->input->post('attach_id_fk');
		if (!empty($images)) {
			for ($s = 0; $s < sizeof($images); $s++) {
				$data['person_id'] = $this->chek_Null($this->input->post('person_id'));
				$data['attach_id_fk'] = $this->chek_Null($attach_id_fk[$s]);
				$data['img'] = $this->chek_Null($images[$s]);
				$data['type'] = 1;
				$this->db->insert('fr_all_attachments', $data);
			}
		}
	}



	/*********************************************************/


	/*
        public function getMother($where = false){
            $this->db->select('*');
            $this->db->from('mother.*,	basic.file_num,\ ');
            $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk',"LEFT");

            $this->db->where('basic.final_suspend',4);
            $this->db->where($where);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row){

                    $data[] =  $row;
                }
                 return$data;
            }else{
                return 0;
            }

        }*/

	/*	public function getMother($where = false)
        {

          $query =$this->db->select('mother.*,
                basic.file_num,
                father.full_name AS father_name')
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"LEFT")
                ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk',"LEFT")
                ->where('basic.final_suspend',4)
                ->where('basic.deleted',0)
                ->where($where)

                ->order_by("basic.file_num","ASC")
                ->get('mother');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row){

                    $data[] =  $row;
                }
                 return$data;
            }else{
                return 0;
            }


        }*/

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
		$query = $this->db->select('f_members.*,basic.file_num, basic.mother_national_num  as num,
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
				$data[$x]['nasebElfard'] =  $this->getNaseb($data[$x]['num'],$data[$x]['categoriey_member']);

				$x++;
			}
			return $data;
		} else {
			return 0;
		}


	}



	public function getMembers_for_edit($where = false)
	{
		$query = $this->db->select('f_members.*,basic.file_num, basic.mother_national_num  as num,
			father.full_name AS father_name,
              files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
            ')
			->join('father', 'father.mother_national_num_fk = f_members.mother_national_num_fk', "LEFT")
			->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
			->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT")
			->where('basic.final_suspend', 4)
		//	->where('basic.file_status', 1)
			->where($where)
			->order_by("basic.file_num", "ASC")
			->get('f_members');
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result_array() as $row) {




				$data[$x] = $row;
				$data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
				$data[$x]['check_member'] = $this->CheckHalfKafalaMember($row['id']);
				$data[$x]['nasebElfard'] =  $this->getNaseb($data[$x]['num'],$data[$x]['categoriey_member']);

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
		$query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
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
/*
                if($row['first_k_id'] != 0){
                                        if($row['first_kafala_type'] ==4 ){

                                          if( $row['first_to'] > strtotime(date('Y-m-d'))){
    continue;
}

                                        }

                                }*/

				$data[$x] = $row;
				$data[$x]['main_kafalat_details'] = $this->getmain_kafalat_details_data($row['id']);
				$data[$x]['nasebElfard'] =  $this->getNaseb($row['num'],$row['categoriey_m']);

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
        $this->db->order_by('id', "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array()[0];
		} else {
			return 0;
		}


	}

	/********************************************************************/


	/*
        public function getMembersArmal($where = false)
        {
            $query =$this->db->select('mother.*,basic.file_num,father.full_name AS father_name
            , fr_main_kafalat_details.id as fr_main_kafalat_details_id')
                ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk',"LEFT")
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"LEFT")
                ->join('fr_main_kafalat_details', 'fr_main_kafalat_details.person_id_fk = mother.id',"LEFT")
                ->where($where)
                ->where('basic.file_status',1)
                ->get('mother');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row){
    
                    $data[] =  $row;
                }
                return$data;
            }else{
                return 0;
            }
    
    
        }*/


	public function getBanks($acc = false)
	{
		$this->db->select('*');
		$this->db->from('society_main_banks_account');
		$this->db->where('account_id_fk', $acc);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $this->GetBanksDetails($row->bank_id_fk);
			}
			return $data;
		} else {
			return false;
		}

	}


	public function GetBanksDetails($bank_id)
	{
		$this->db->select('*');
		$this->db->from('banks_settings');
		$this->db->where('id', $bank_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0];
		} else {
			return false;
		}
	}

	public function select_banks_accounts()
	{
		$this->db->select('*');
		$this->db->from('society_main_banks_account');
		$this->db->where('type', 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$x++;
			}
			return $data;
		} else {
			return false;
		}

	}


	public function GetBankAccount($arr)
	{
		$this->db->select('id,account_num,bank_id_fk,account_id_fk');
		$this->db->from('society_main_banks_account');
		$this->db->where($arr);
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






	/*****************************************************/

	/*	public function getMembersArmal($where = false)
        {

            $query =$this->db->select('*')
                ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk',"RIGHT")
                ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk',"RIGHT")
                ->join('fr_main_kafalat_details', 'fr_main_kafalat_details.person_id_fk = mother.id',"RIGHT")

                ->where('basic.final_suspend',4)
                ->where($where)
                ->where('mother.categoriey_m',1)
                ->where('mother.halt_elmostafid_m',1)
                ->get('mother');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row){

                    $data[] =  $row;
                }
                return$data;
            }else{
                return 0;
            }
        }*/


	/*************************************************************************/

	public function select_sponsors_kafalat($kafel_id)
	{
		$this->db->select('fr_main_kafalat_details.*,basic.id as basic_id,basic.file_num');
		$this->db->from('fr_main_kafalat_details');
		$this->db->join('basic', 'basic.mother_national_num =  fr_main_kafalat_details.mother_national_num_fk', "LEFT");
		$this->db->where('first_kafel_id', $kafel_id);
		$this->db->order_by('id', "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
				$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
				$data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
				$data[$i]->kafala_color = $this->get_kafela_name($row->kafala_type_fk)['color'];

				$data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
				$data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];

				if ($row->person_type == 1) {
					$data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
					$data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
				} elseif ($row->person_type == 2 || $row->person_type == 3) {
					$data[$i]->person_name = $this->get_member_name($row->person_id_fk);
					$data[$i]->person_data = $this->get_member_data($row->person_id_fk);
				}


				$data[$i]->armal_num = $this->get_armal_num($row->first_kafel_id);
				$data[$i]->aytam_num = $this->get_aytam_num($row->first_kafel_id);
				$data[$i]->mostafed_num = $this->get_mostafed_num($row->first_kafel_id);

				$data[$i]->second_kafel = $this->get_second_kafel($kafel_id, $row->person_id_fk);
				/* $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                 $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                 $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                 $data[$i]->father_national = $this->get_father_national($row->mother_national_num);*/
				$i++;
			}
			return $data;
		}
		return false;
	}

	public function get_mother_data($mother_national_num_fk)
	{
		$this->db->select('mother.mother_national_num_fk,mother.m_birth_date_hijri_year,
                        mother.m_gender,mother.m_birth_date_hijri, files_status_setting.title AS halt_elmostafid_title,files_status_setting.color AS halt_elmostafid_color');
		$this->db->from("mother");
		$this->db->where("mother.mother_national_num_fk", $mother_national_num_fk);
		$this->db->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data[0];
		} else {
			return 0;
		}


	}


	public function get_second_kafel($kafel, $person)
	{
		$data_now = date("Y-m-d");
		$data_now = strtotime($data_now);
		$this->db->where('person_id_fk', $person);
		$this->db->where('first_kafel_id!=', $kafel);
	//	$this->db->where('first_date_from <=', $data_now);
	//	$this->db->where('first_date_to >=', $data_now);
         $this->db->where('first_status', 1);
		$query = $this->db->get('fr_main_kafalat_details');
		if ($query->num_rows() > 0) {

			//return $this->get_kafel_name($query->row()->first_kafel_id);
			$data = array();
			$x = 0;
			foreach ($query->result() as $row) {
				$data[$x] = $row;
				$data[$x]->name = $this->get_kafel_name($query->row()->first_kafel_id);


				$data[$x]->halt = $this->fr_kafalat_kafel_status($row->first_status);

				$data[$x]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];


				if ($row->person_type == 1) {
					$data[$x]->person_name = $this->get_mother_name($row->mother_national_num_fk);
					$data[$x]->person_data = $this->get_mother_data($row->mother_national_num_fk);
				} elseif ($row->person_type == 2 || $row->person_type == 3) {
					$data[$x]->person_name = $this->get_member_name($row->person_id_fk);
					$data[$x]->person_data = $this->get_member_data($row->person_id_fk);
				}
				$x++;
			}
			return $data[0];

		} else {
			return false;
		}


	}


	public function get_member_data($person_id_fk)
	{
		$this->db->select('f_members.id,f_members.member_gender,f_members.member_birth_date_hijri,f_members.member_birth_date_hijri_year,  files_status_setting.title AS halt_elmostafid_title,files_status_setting.color AS halt_elmostafid_color');
		$this->db->from("f_members");
		$this->db->where("f_members.id", $person_id_fk);
		$this->db->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data[0];
		} else {
			return 0;
		}
	}


	public function get_armal_num($kafel_id)
	{
		$this->db->select('id,first_value,first_status');
		$this->db->from("fr_main_kafalat_details");
		$this->db->where("first_kafel_id", $kafel_id);
		$this->db->where("person_type ", 1);
 	    $this->db->where("first_status ", 1);
        
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$total = 0;
			foreach ($query->result() as $row) {
				$total += $row->first_value;
			}
			$data['num'] = $query->num_rows();
			$data['total'] = $total;
			return $data;
		} else {
			return 0;
		}
	}

	public function get_aytam_num($kafel_id)
	{
		$this->db->select('id,first_value,first_status');
		$this->db->from("fr_main_kafalat_details");
		$this->db->where("first_kafel_id", $kafel_id);
		$this->db->where("person_type ", 2);
         $this->db->where("first_status ", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$total = 0;
			foreach ($query->result() as $row) {
				$total += $row->first_value;

			}
			$data['num'] = $query->num_rows();
			$data['total'] = $total;
			return $data;
		} else {
			return 0;
		}

	}


	public function get_mostafed_num($kafel_id)
	{
		$this->db->select('id,first_value,first_status');
		$this->db->from("fr_main_kafalat_details");
		$this->db->where("first_kafel_id", $kafel_id);
		$this->db->where("person_type ", 3);
        $this->db->where("first_status ", 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$total = 0;
			foreach ($query->result() as $row) {
				$total += $row->first_value;

			}
			$data['num'] = $query->num_rows();
			$data['total'] = $total;
			return $data;
		} else {
			return 0;
		}

	}


	function humanTiming($time)
	{

		$time = time() - $time; // to get the time since that moment
		$time = ($time < 1) ? 1 : $time;
		$tokens = array(
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
		}

	}


	function humanTiming_event($time_2, $time_actipn)
	{

		if ($time_actipn == 0) {
			$time_actipn_new = time();
		} else {
			$time_actipn_new = $time_actipn;
		}


		$time_2 = $time_actipn_new - $time_2; // to get the time since that moment
		$time_2 = ($time_2 < 1) ? 1 : $time_2;
		$tokens = array(
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($time_2 < $unit) continue;
			$numberOfUnits = floor($time_2 / $unit);
			return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
		}

	}


	public function get_father_name($mother_num)
	{
		$this->db->where('mother_national_num_fk', $mother_num);
		$query = $this->db->get('father');
		if ($query->num_rows() > 0) {
			return $query->row()->full_name;
		} else {
			return "غير محدد";
		}
	}

	public function get_mother_name($mother_national_num_fk)
	{
		$h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_national_num_fk));
		$arr = $h->row_array();
		return $arr['full_name'];
	}


	public function get_kafel_name($kafel_id)
	{
		$this->db->where('id', $kafel_id);
		$query = $this->db->get('fr_sponsor');
		if ($query->num_rows() > 0) {
			return $query->row()->k_name;
		} else {
			return "غير محدد ";
		}
	}


	public function get_halet_kafela($halet_kafala)
	{
		$h = $this->db->get_where("fr_kafalat_kafel_status", array('id' => $halet_kafala));
		return $arr = $h->row_array();

	}


	public function get_kafela_name($kafala_type_fk)
	{
		$h = $this->db->get_where("fr_kafalat_types_setting", array('id' => $kafala_type_fk));
		return $arr = $h->row_array();

	}


	public function get_member_name($person_id_fk)
	{
		$h = $this->db->get_where("f_members", array('id' => $person_id_fk));
		$arr = $h->row_array();
		return $arr['member_full_name'];
	}


	/*********************************************/
	public function getKafalatDetailsById($id)
	{
		$this->db->select('fr_main_kafalat_details.*,
		banks_settings.id as banks_settingsid, banks_settings.title as bank_title ,banks_settings.*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->join('banks_settings', 'banks_settings.id=fr_main_kafalat_details.bank_id_fk', 'left');
		$this->db->where('fr_main_kafalat_details.id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
				$data[$i]->kafela_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
				$i++;
			}
			return $data;
		} else {
			return false;
		}

	}


	/*************************start***/
	public function getById_main_kafalat_detai($id)
	{
		$h = $this->db->get_where("fr_main_kafalat_details", array('id' => $id));
		if ($h->num_rows() > 0) {
			return $h->row_array();
		} else {
			return false;
		}
	}


	public function getmain_kafalat_details_data_byarray($arr)
	{
		$this->db->select('*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where($arr);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return 0;
		}


	}

             /*
	public function deleteKfala_data($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fr_main_kafalat_details');

	}      */


public function deleteKfala_data($id)
   {

       $result =$this->Get_Data_from_main_kafalat(array('id'=>$id));

        $mothers['first_k_id'] = 0;
        $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
        $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
        $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
        $mothers['first_kafala_id'] = 0;
        $mothers['first_halet_kafala'] = 2;



        if($result->first_second_kafala === 'first'){


            $f_members['first_k_id'] = 0;
            $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $f_members['first_kafala_id'] =  0;
            $f_members['first_halet_kafala'] = 2;


        }elseif($result->first_second_kafala === 'second'){


            $f_members['second_k_id'] = 0;
            $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
            $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $f_members['second_kafala_id'] =  0;
            $f_members['second_halet_kafala'] = 2;

        }



           if($result->kafala_type_fk ==4){

               $this->db->where('id',$result->person_id_fk);
               $this->db->update('mother', $mothers);

           }else{

               $this->db->where('id',$result->person_id_fk);
               $this->db->update('f_members', $f_members);

           }

      $this->db->where('id', $id);
      $this->db->delete('fr_main_kafalat_details');

   }
/*
public function deleteKfala_data($id)
	{

	    $result =$this->Get_Data_from_main_kafalat(array('id'=>$id));

        $mothers['first_k_id'] = 0;
        $mothers['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
        $mothers['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
        $mothers['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
        $mothers['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
        $mothers['first_kafala_id'] = 0;


        if($result->first_second_kafala === 'first'){


            $f_members['first_k_id'] = 0;
            $f_members['first_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $f_members['first_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $f_members['first_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $f_members['first_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $f_members['first_kafala_id'] =  0;


        }elseif($result->first_second_kafala === 'second'){


            $f_members['second_k_id'] = 0;
            $f_members['second_k_id'] = $this->chek_Null($this->input->post('kafel_id_fk'));
            $f_members['second_k_name'] = $this->get_kafel_name($this->input->post('kafel_id_fk'));
            $f_members['second_kafala_type'] = $this->chek_Null($this->input->post('kafala_type_fk'));
            $f_members['second_from'] = $this->chek_Null(strtotime($this->input->post('from_date')));
            $f_members['second_to'] = $this->chek_Null(strtotime($this->input->post('to_date')));
            $f_members['second_kafala_id'] =  0;

        }



           if($result->kafala_type_fk ==4){

               $this->db->where('id',$result->person_id_fk);
               $this->db->update('mother', $mothers);

           }else{

               $this->db->where('id',$result->person_id_fk);
               $this->db->update('f_members', $f_members);

           }

		$this->db->where('id', $id);
		$this->db->delete('fr_main_kafalat_details');

	}
*/

	public function add_days_num($id)
	{
		$data['days_num'] = $this->chek_Null($this->input->post('days_num'));
		$this->db->where('id', $id);
		$this->db->update('fr_main_kafalat_details', $data);
	}

	/********************************************************/
	public function get_sponsors_kafalat($kafel_id, $id)
	{
		$this->db->select('fr_main_kafalat_details.*,basic.id as basic_id,basic.file_num');
		$this->db->from('fr_main_kafalat_details');
		$this->db->join('basic', 'basic.mother_national_num =  fr_main_kafalat_details.mother_national_num_fk', "LEFT");
		$this->db->where('first_kafel_id', $kafel_id);
		$this->db->where('fr_main_kafalat_details.id', $id);
		$this->db->order_by('id', "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
				$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
				$data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
				$data[$i]->kafala_color = $this->get_kafela_name($row->kafala_type_fk)['color'];

				$data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
				$data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];
//				$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);

				if ($row->person_type == 1) {
					$data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
					$data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
				} elseif ($row->person_type == 2 || $row->person_type == 3) {
					$data[$i]->person_name = $this->get_member_name($row->person_id_fk);
					$data[$i]->person_data = $this->get_member_data($row->person_id_fk);
				}


				$data[$i]->armal_num = $this->get_armal_num($row->first_kafel_id);
				$data[$i]->aytam_num = $this->get_aytam_num($row->first_kafel_id);
				$data[$i]->mostafed_num = $this->get_mostafed_num($row->first_kafel_id);

				$i++;
			}
			return $data;
		}
		return false;
	}


	/************************************************************/

	public function select_all_orders()
	{
		$this->db->select('fr_sponsor_orders.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
		$this->db->from('fr_sponsor_orders');
		$this->db->join('banks_settings', 'banks_settings.id=fr_sponsor_orders.bank_id_fk', 'left');
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

	public function insert_maindata_order($id, $file)
	{

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

	/****************************************************/

	public function get_fe2a_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('fr_sponser_donors_setting');
		if ($query->num_rows() > 0) {
			return $query->row()->specialize_fk;
		} else {
			return 0;
		}
	}

	/*********************************************/

	public function GetLastDataInserted($id)
	{
		$this->db->select('*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where('first_kafel_id', $id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}

	}

	//=======================================================================================
	public function check_kafal_type($type_kafa, $person_id_fk)
	{
		$this->db->where('person_id_fk', $person_id_fk);
		$this->db->where('kafala_type_fk', 1);
		$query= $this->db->get('fr_main_kafalat_details');
		return $query->num_rows();
	}
	public function check_half_kafal_type($type_kafa, $person_id_fk)
	{
		$this->db->where('person_id_fk', $person_id_fk);
		$this->db->where('kafala_type_fk', 2);
		$query= $this->db->get('fr_main_kafalat_details');
		return $query->num_rows();
	}
	///======================
/*	public function Getkhafalat($id)
	{
		$this->db->select('*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where('first_kafel_id', $id);
		$this->db->order_by('id', 'desc');
		//$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
				$data[$i]->halt = $this->fr_kafalat_kafel_status($row->first_status);

				$data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];


				if ($row->person_type == 1) {
					$data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
					$data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
				} elseif ($row->person_type == 2 || $row->person_type == 3) {
					$data[$i]->person_name = $this->get_member_name($row->person_id_fk);
					$data[$i]->person_data = $this->get_member_data($row->person_id_fk);
				}


			}

			return $data;
		} else {
			return false;
		}

	}*/

public function Getkhafalat($id)
	{
		$this->db->select('*');
		$this->db->from('fr_main_kafalat_details');
		$this->db->where('first_kafel_id', $id);
		$this->db->order_by('id', 'desc');
		//$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
				$data[$i]->halt = $this->fr_kafalat_kafel_status($row->first_status);

				$data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
				if ($row->person_type == 1) {
					$data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
					$data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
					$data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
				} elseif ($row->person_type == 2 || $row->person_type == 3) {
					$data[$i]->person_data = $this->get_member_data($row->mother_national_num_fk);
					$data[$i]->person_name = $this->get_member_name($row->person_id_fk);
					$data[$i]->person_data = $this->get_member_data($row->person_id_fk);
				}


			$i++;}

			return $data;
		} else {
			return false;
		}

	}

//==================================================================




	public function get_gggg(){
		$this->db->select('basic.*,
                           basic.mother_national_num  as  faher_name ,
                           
                           father.f_national_id     as  father_national,
                            father.full_name as father_full_name,
                           
                           mother.full_name     as  mother_name,
                           
                           
                           mother.mother_national_card_new     as  mother_new_card,
                           
                           files_status_setting.title as process_title ,
                           files_status_setting.color as files_status_color ,
                           mother.categoriey_m as categorey
                           
                            ');


		$this->db->from('basic');

		$this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
		$this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
		$this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status',"left");


		$this->db->where('basic.final_suspend',4);
		$this->db->where('basic.deleted',0);



		$this->db->order_by("id","ASC");
		$query = $this->db->get();
		if($query->num_rows() >0){
			$data = $query->result_array(); $i =0;
			foreach ($query->result_array() as $array){
				$data[$i] =  $array;
				$data[$i]['nasebElfard'] =  $this->getNaseb($data[$i]['faher_name'],$data[$i]['categorey']);
				$i++;  }
			return $data;
		}
		return  $query->result_array();


		/*return  $query->result_array();

      return false;*/
	}



	public function getNaseb($mother_national_num_fk, $categoriey_m)
	{
		$this->db->select('*');
		$this->db->from('family_income_duties');
		$this->db->where('mother_national_num_fk', $mother_national_num_fk);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$total_income = 0;
			$total_duties = 0;
			$count = 0;
			$data = $query->result();
			$i = 0;
			foreach ($query->result() as $row) {

				if ($row->affect == 1 && $row->type == 1) {
					$total_income += $row->value;
				}
				if ($row->affect == 1 && $row->type == 2) {
					$total_duties += $row->value;
				}

			}
			if ($categoriey_m == 1 || $categoriey_m == 2) {
				$count = $this->sum_mosfed_in_mother($mother_national_num_fk);
			}
			$member_num = $this->sum_mosfed_in_f_members($mother_national_num_fk) + $count;
			if ($member_num == 0) {
				$member_num = 1;
			}
			$total = $total_income - $total_duties;
			$data['naseb'] = $total / $member_num;
			$data['f2a'] = $this->GetF2a_data($data['naseb']);

			return $data;

		}
		return 0;
	}

	public function sum_mosfed_in_mother($mother_national_num_fk)
	{

		$this->db->select('*');
		$this->db->from('mother');
		$this->db->where('mother_national_num_fk', $mother_national_num_fk);
		$this->db->where('person_type', 62);
		$this->db->where('halt_elmostafid_m', 1);
		$query = $this->db->get();

		return $rowcount = $query->num_rows();


	}


	public function sum_mosfed_in_f_members($mother_national_num_fk)
	{

		$this->db->select('*');
		$this->db->from('f_members');
		$this->db->where('mother_national_num_fk', $mother_national_num_fk);
		$this->db->where('member_person_type', 62);
		$this->db->where('halt_elmostafid_member', 1);
		$query = $this->db->get();
		return $rowcount = $query->num_rows();

	}

	public function GetF2a_data($value)
	{
		$this->db->select("id,title,from,to,color");
		$this->db->where('from <=', $value);
		$this->db->where('to >=', $value);
		$query = $this->db->get("family_category");
		if ($query->num_rows() > 0) {
			return $query->row();

		} else {
			return 0;
		}

	}
/********************************************************/
/**
 *13-2-2019 
 */ 
/* public function GetAll(){
    $data['aytam']=$this->getMembers2(
           array('categoriey_member'=>2,'persons_status'=>1));
    $data['armal']=$this->getMembersArmal2(
           array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));
    $data['mostafed']=$this->getMembers2(
           array('categoriey_member'=>3,'persons_status'=>1));
    return$data;
   }
   */
   
   public function GetAll(){
    $data['aytam']=$this->getMembers3(
           array('categoriey_member'=>2,'persons_status'=>1));
    $data['armal']=$this->getMembersArmal2(
           array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));
    $data['mostafed']=$this->getMembers2(
           array('categoriey_member'=>3,'persons_status'=>1));
    return$data;
   }
   
public function search_from_main_kafalat_details($id)
{
    $this->db->select('person_id_fk,first_date_from,first_date_to');
    $this->db->from('fr_main_kafalat_details');
    $this->db->where('person_id_fk', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return 1;
    } else {
        return 0;
    }


}
   public function getMembers2($arr)
{
    $query = $this->db->select('f_members.first_halet_kafala,f_members.second_halet_kafala,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
        ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
        ->where('basic.final_suspend', 4)
        ->where('basic.file_status', 1)
        ->where($arr)
        ->order_by("basic.file_num", "ASC")
        ->get('f_members');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
        $data[$x] = $row;
        $data[$x]->num_rows = $query->num_rows();
        //20-3-2019
        //=============================================================//


             if($row->categoriey_member ==3){

                 if($row->first_halet_kafala ==2){

                     $not_guaranteed =$not_guaranteed+1;

                 }elseif ($row->first_halet_kafala ==1){
                     $guaranteed = $guaranteed+1;

                 }elseif($row->first_halet_kafala ==0){

                     $not_guaranteed =$not_guaranteed+1;

                 }



             }



        //=============================================================//
        $x++;}
        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
        //return $query->result();
    } else {
        return 0;
    }


}

    public function getMembers3($arr){
        $query = $this->db->select('f_members.first_halet_kafala,f_members.second_kafala_type,f_members.second_halet_kafala,f_members.categoriey_member,f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
            ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
            ->where('basic.final_suspend', 4)
            ->where('basic.file_status', 1)
            ->where($arr)
            ->order_by("basic.file_num", "ASC")
            ->get('f_members');
        if ($query->num_rows() > 0) {
            $not_guaranteed=0;
            $guaranteed=0;
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->num_rows = $query->num_rows();




         if ($row->categoriey_member == 2){

             if ($row->first_kafala_type ==0 ) {

                 $not_guaranteed = $not_guaranteed + 1;

             }



             if ($row->first_kafala_type ==1 ) {

                 if ($row->first_halet_kafala == 2) {

                     $not_guaranteed = $not_guaranteed + 1;

                 } elseif ($row->first_halet_kafala == 1) {
                     $guaranteed = $guaranteed + 1;

                 }

             }

             if ($row->first_kafala_type ==2  ) {

                 if ($row->first_halet_kafala == 2) {

                     $not_guaranteed = $not_guaranteed + 1;

                 } elseif ($row->first_halet_kafala == 1) {
                     $guaranteed = $guaranteed + 1;

                 }
             }


             if ($row->second_kafala_type ==2  ) {


                 if ($row->second_halet_kafala == 2) {

                     $not_guaranteed = $not_guaranteed + 1;

                 } elseif ($row->second_halet_kafala == 1) {
                     $guaranteed = $guaranteed + 1;

                 }
               }

             if ($row->second_kafala_type ==0 ) {

                 $not_guaranteed = $not_guaranteed + 1;

             }


         }
                //=============================================================//
                $x++;}
            $values['num']=$query->num_rows();
            $values['guaranteed']=$guaranteed/2;
            $values['not_guaranteed']=$not_guaranteed/2;
            return $values;
        } else {
            return 0;
        }


    }

/*
public function getMembers2($arr)
{
    $query = $this->db->select('f_members.mother_national_num_fk,f_members.id,basic.file_num, basic.mother_national_num  as num 

          
        ')
        ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
        ->where('basic.final_suspend', 4)
        ->where('basic.file_status', 1)
        ->where($arr)
        ->order_by("basic.file_num", "ASC")
        ->get('f_members');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
        $data[$x] = $row;
        $data[$x]->num_rows = $query->num_rows();
        $main_kafalat_num = $this->search_from_main_kafalat_details($row->id);

        if($main_kafalat_num ==1){

            $guaranteed = $guaranteed+1;

        }elseif ($main_kafalat_num ==0){
            $not_guaranteed =$not_guaranteed+1;
        }

        $data[$x]->guaranteed = $guaranteed;
        $data[$x]->not_guaranteed =$not_guaranteed;

        $x++;}
        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
    } else {
        return 0;
    }


}
*/
/*
public function getMembersArmal2($arr)
{
    $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
     files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
     ')
        ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
        ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
        ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
        ->where($arr)
        ->where('basic.file_status', 1)
        ->get('mother');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->num_rows = $query->num_rows();
            $data[$x]->main_kafalat_num = $this->search_from_main_kafalat_details($row->id);
            if($data[$x]->main_kafalat_num ==1){
                $guaranteed=$guaranteed+1;
            }elseif ($data[$x]->main_kafalat_num ==0){
                $not_guaranteed=$not_guaranteed+1;
            }
            $data[$x]->guaranteed = $guaranteed;
            $data[$x]->not_guaranteed =$not_guaranteed;
            $x++;}

        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
    } else {
        return 0;
    }


}*/ 


/*
public function getMembers2($arr)
{
    $query = $this->db->select('f_members.mother_national_num_fk,f_members.id,
     f_members.first_k_id,f_members.first_kafala_type
    ,f_members.first_to, f_members.second_k_id,f_members.second_to,
    basic.file_num, basic.mother_national_num  as num 
        ')
        ->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk', "LEFT")
        ->where('basic.final_suspend', 4)
        ->where('basic.file_status', 1)
        ->where($arr)
        ->order_by("basic.file_num", "ASC")
        ->get('f_members');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
        $data[$x] = $row;
        $data[$x]->num_rows = $query->num_rows();
        //20-3-2019
        //=============================================================//
         
             $date_of_now =strtotime(date('Y-m-d'));
            if($row->first_kafala_type =='0'){
                $not_guaranteed =$not_guaranteed+1;
            }elseif ($row->first_kafala_type ==1  || $row->first_kafala_type ==3){
                 if($row->first_k_id ==='0'){
                     $not_guaranteed =$not_guaranteed+1;
                 }elseif ($row->first_k_id !=0 && $row->first_to <= $date_of_now  ){
                     $not_guaranteed =$not_guaranteed+1;
                 }elseif ($row->first_k_id !=0 && $row->first_to > $date_of_now ){
                     $guaranteed = $guaranteed+1;
                 }

            }elseif ($row->first_kafala_type ==2){

                if($row->second_k_id == 0 || $row->second_k_id == null){
                    if($row->first_k_id ==0){
                        $not_guaranteed =$not_guaranteed+1;
                    }elseif ($row->first_k_id !=0 && $row->first_to <= $date_of_now  ){
                        $not_guaranteed =$not_guaranteed+1;
                    }elseif ($row->first_k_id !=0 && $row->first_to > $date_of_now ){
                        $guaranteed = $guaranteed+1;
                    }

                }else{

                    if (($row->first_k_id != 0   &&  $row->first_to > $date_of_now) &&
                        ($row->second_k_id != 0   && $row->second_to > $date_of_now)){
                        $guaranteed = $guaranteed+1;
                    }else{
                        $not_guaranteed =$not_guaranteed+1;
                    }
                }
            }
        //=============================================================//
        $x++;}
        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
        //return $data;
    } else {
        return 0;
    }


}
*/




/*
public function getMembersArmal2($arr)
{
    $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
     files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
     ')
        ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
        ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
        ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
        ->where($arr)
        ->where('basic.file_status', 1)
        ->get('mother');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->num_rows = $query->num_rows();
            $date_of_now =strtotime(date('Y-m-d'));

            if($row->first_kafala_type =='0'){
                $not_guaranteed =$not_guaranteed+1;
            }elseif ( $row->first_kafala_type ==4){
                if($row->first_k_id ==='0'){
                    $not_guaranteed =$not_guaranteed+1;
                }elseif ($row->first_k_id !=0 && $row->first_to <= $date_of_now  ){
                    $not_guaranteed =$not_guaranteed+1;
                }elseif ($row->first_k_id !=0 && $row->first_to > $date_of_now ){
                    $guaranteed = $guaranteed+1;
                }
            }


            $data[$x]->guaranteed = $guaranteed;
            $data[$x]->not_guaranteed =$not_guaranteed;
            $x++;}

        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
    } else {
        return 0;
    }


}
*/



 /********************************************************************************/


    public function get_mother_data2($id)
    {
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }


    }

    public function select_last_id_fr_main_kafalat_details()
    {
        $this->db->select('*');
        $this->db->from("fr_main_kafalat_details");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id + 1;
        } else {
            return 1;
        }
    }


    public function Get_Data_from_main_kafalat($arr)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where($arr);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

public function getMembersArmal2($arr)
{
    $query = $this->db->select('mother.*, basic.mother_national_num as num,basic.id as basic_id,basic.file_num,father.full_name AS father_name,
     files_status_setting.title AS halt_elmostafid_title , files_status_setting.color AS halt_elmostafid_color
     ')
        ->join('basic', 'basic.mother_national_num =  mother.mother_national_num_fk', "LEFT")
        ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk', "LEFT")
        ->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT")
        ->where($arr)
        ->where('basic.file_status', 1)
        ->get('mother');
    if ($query->num_rows() > 0) {
        $not_guaranteed=0;
        $guaranteed=0;
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->num_rows = $query->num_rows();
            $date_of_now =strtotime(date('Y-m-d'));


            if($row->first_halet_kafala ==2){

                $not_guaranteed =$not_guaranteed+1;

            }elseif ($row->first_halet_kafala ==1){
                $guaranteed = $guaranteed+1;

            }else{

                $not_guaranteed =$not_guaranteed+1;

            }

            /* if($row->first_kafala_type =='0'){
                 $not_guaranteed =$not_guaranteed+1;
             }elseif ( $row->first_kafala_type ==4){
                 if($row->first_k_id ==='0'){
                     $not_guaranteed =$not_guaranteed+1;
                 }elseif ($row->first_k_id !=0 && $row->first_to <= $date_of_now  ){
                     $not_guaranteed =$not_guaranteed+1;
                 }elseif ($row->first_k_id !=0 && $row->first_to > $date_of_now ){
                     $guaranteed = $guaranteed+1;
                 }
             }*/


            $data[$x]->guaranteed = $guaranteed;
            $data[$x]->not_guaranteed =$not_guaranteed;
            $x++;}

        $values['num']=$query->num_rows();
        $values['guaranteed']=$guaranteed;
        $values['not_guaranteed']=$not_guaranteed;
        return $values;
    } else {
        return 0;
    }


}






public function  get_halet_kafalaat_reasons_settings()
{
    $this->db->select('*');
    $this->db->from('halet_kafalaat_reasons_settings');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
}
/************************************************/
 public function  get_halet_kafalaat_reasons_settingsByArray($arr)
    {
        $this->db->select('*');
        $this->db->from('halet_kafalaat_reasons_settings');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
/***********************************/

public function get_city_name($id)
{  $this->db->select('name,id');
    $this->db->where('id',$id);
    $query= $this->db->get('cities')->row();
    if(!empty($query)){
        return $query->name;
    }
}
public function get_data_table($input_num,$type)
{
$table_arr=array(1=>'employees_settings',2=>'fr_settings',3=>'family_setting');
if(key_exists($input_num, $table_arr)){

    $q=$this->db->where('type',$type)->get($table_arr[$input_num])->result();
    if(!empty($q)){
        return $q;
    }
}
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

public function insert_data_pop($input_num,$type)
{
$table_arr=array(1=>'employees_settings',2=>'fr_settings',3=>'family_setting');
if(key_exists($input_num, $table_arr)){

        $data['type']=$type;
        $data['title_setting']=$this->input->post('input_name');

       $q=$this->db->insert($table_arr[$input_num],$data);
    
}
}

public function update_data_pop($input_num,$type)
{
$table_arr=array(1=>'employees_settings',2=>'fr_settings',3=>'family_setting');
if(key_exists($input_num, $table_arr)){

        $data['type']=$type;
        $data['title_setting']=$this->input->post('input_name');

       $q=$this->db->where('type',$type)->where('id_setting',$this->input->post('input_id'))
       ->update($table_arr[$input_num],$data);
    
}
}
public function delete_data_pop($input_num)
{
$table_arr=array(1=>'employees_settings',2=>'fr_settings',3=>'family_setting');
if(key_exists($input_num, $table_arr)){

       $q=$this->db->where('id_setting',$this->input->post('input_id'))
       ->delete($table_arr[$input_num]);
    
}
}
/*********************************************/

	 public function get_file_num($mother_num)
    {
        return $this->db->where('mother_national_num',$mother_num)->get('basic')->row()->file_num;
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

    public function get_kafala_history($kafel_id,$mother_num){
        $this->db->where('first_kafel_id',$kafel_id);
        $this->db->where('mother_national_num_fk',$mother_num);
        $this->db->order_by('id','DESC');
        $query= $this->db->get('fr_main_kafalat_history');
        if ($query->num_rows() >0){
            // return ;
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                if ($row->person_type == 1) {
                    $data[$i]->person_name = $this->get_mother_name($row->mother_national_num_fk);
                    $data[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
                } elseif ($row->person_type == 2 || $row->person_type == 3) {
                    $data[$i]->person_name = $this->get_member_name($row->person_id_fk);
                    $data[$i]->person_data = $this->get_member_data($row->person_id_fk);
                }
                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->kafala_color = $this->get_kafela_name($row->kafala_type_fk)['color'];
                $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
                $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];


                $i++;

            }
            return $data;
        }
        else{
            return false;
        }

    }



  /*  public function getRows($postData){
        //$this->_get_datatables_query($postData);

        // Set orderable column fields
        $column_order = array(null, 'fr_sponsor.k_num','fr_sponsor.k_name','fr_sponsor.w_mob');
        // Set searchable column fields
        $column_search = array('fr_sponsor.k_num','fr_sponsor.k_name','fr_sponsor.w_mob');
        // Set default order
        $order = array('fr_sponsor.k_num' => 'asc');


        $this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
        $this->db->from('fr_sponsor');
        $this->db->join('banks_settings', 'banks_settings.id=fr_sponsor.bank_id_fk', 'left');

//        $this->db->order_by("fr_sponsor.k_num", "asc");

        $i = 0;
        // loop searchable columns
        foreach($column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if(count($column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if(isset($postData['order'])){
            $this->db->order_by($column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($order)){
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
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
    */
    
    
    public function getRows($postData)
{
    //$this->_get_datatables_query($postData);

    // Set orderable column fields
    $column_order = array(null, 'fr_sponsor.k_num', 'fr_sponsor.k_name', 'fr_sponsor.w_mob','fr_sponsor.fe2a_type','fr_sponsor.halat_kafel_id');
    // Set searchable column fields
    $column_search = array('fr_sponsor.k_num', 'fr_sponsor.k_name', 'fr_sponsor.w_mob', 'fr_sponsor.k_mob');
    // Set default order
    $order = array('fr_sponsor.k_num' => 'asc');

    $this->db->select('fr_sponsor.*,banks_settings.id as banks_settings_id, banks_settings.title as banks_settings_title ');
    $this->db->from('fr_sponsor');
    $this->db->join('banks_settings', 'banks_settings.id=fr_sponsor.bank_id_fk', 'left');

    
    $i = 0;
    // loop searchable columns
    foreach ($column_search as $item) {
        // if datatable send POST for search
        if ($postData['search']['value']) {
            // first loop
            if ($i === 0) {
                // open bracket
                $this->db->group_start();
                $this->db->like($item, $postData['search']['value']);
            } else {
                $this->db->or_like($item, $postData['search']['value']);
            }

            // last loop
            if (count($column_search) - 1 == $i) {
                // close bracket
                $this->db->group_end();
            }
        }
        $i++;
    }

    if (isset($postData['order'])) {
        $this->db->order_by($column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
    } else if (isset($order)) {
        $order = $order;
        $this->db->order_by(key($order), $order[key($order)]);
    }

    if ($postData['length'] != -1) {
        $this->db->limit($postData['length'], $postData['start']);
    }
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->desc = $this->get_fr_setting($row->wakel_relationship);
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
    public function select_count()
    {
        $this->db->select('COUNT(id) as count');

        $count = $this->db->get('fr_sponsor')->row()->count;

        return $count;

    }

    public function countAll(){
//        $this->db->from($this->table);
        $customers = $this->select_all();
        return count($customers);
    }


}