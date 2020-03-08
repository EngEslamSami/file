<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_employee_model extends CI_Model
{

	public function getEmpData($empCode)
	{
		return $this->db->where('id', $empCode)->get('employees')->row_array();
	}

	public function getBadalat($type)
	{
		return $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
	}



	public function getBanks()
	{
		return $this->db->get('banks_settings')->result();
	}

	public function getbanks_another()
	{
		return $this->db->get('banks_settings')->result();
	}

	public function financeEmployee($emp_code)
	{
		$this->db->where('emp_code',$emp_code);
		$this->db->delete('finance_employes');

		$data['emp_code'] = $emp_code;

		$data['markz'] = $this->input->post('markz');
		$data['having_all_value'] = $this->input->post('having_all_value');
		$data['having_tamin_value'] = $this->input->post('having_tamin_value');
		$data['discut_all_value'] = $this->input->post('discut_all_value');
		$data['discut_tamin_value'] = $this->input->post('discut_tamin_value');

		$this->db->insert('finance_employes', $data);
		$this->emp_badlat_discount_details($emp_code);
		$this->bank_employes_details($emp_code);
	}


	public function emp_badlat_discount_details($emp_code)
	{

		if(!empty($this->input->post('badl_discount_id_fk'))){
			$count = count($this->input->post('badl_discount_id_fk'));
			for ($i = 0; $i < $count; $i++) {
				$data['emp_code'] = $emp_code;
				$data['method_to_count'] = $this->input->post('method_to_count')[$i];
				$data['badl_discount_id_fk'] = $this->input->post('badl_discount_id_fk')[$i];
                $data['badl_type']=$this->get_type_badl($this->input->post('badl_discount_id_fk')[$i]);

				$data['value'] = $this->input->post('value')[$i];
				$data['specific_period'] = $this->input->post('specific_period')[$i];
				if(!empty($this->input->post('date_from')[$i])){

					$data['date_from'] = $this->input->post('date_from')[$i];
				}
				if(!empty($this->input->post('date_to')[$i])){

					$data['date_to'] = $this->input->post('date_to')[$i];
				}


				if (!empty($this->input->post('insurance_affect')[$i])&&$this->input->post('insurance_affect')[$i]==1) {
					$data['insurance_affect'] = $this->input->post('insurance_affect')[$i];
				}
                
                $data['dalel_name'] = $this->input->post('dalel_name')[$i];
				$data['dalel_code'] = $this->input->post('dalel_code')[$i];
				$this->db->insert('emp_badlat_discount_details', $data);


			}
		}


	}


public function get_type_badl($id)
{
$this->db->where('id',$id);
   $query=$this->db->get('emp_badlat_discount_settings');
   if($query->num_rows()>0){
      return $query->row()->type;

   }else{
      return 0;

}
}
    public function bank_employes_details($emp_code)
    {

        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        if (!empty($_FILES['userfile']['name'])) {
            $cpt = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $this->upload->initialize($this->set_upload_options('human_resources/emp_banks/'));//25-6-om
                $this->upload->do_upload();
                $dataInfo[] = $this->upload->data();
            }
            // end if

            $data['emp_code'] = $emp_code;
            for ($i = 0; $i < $cpt; $i++) {
                $data['approved_for_sarf'] = 0;
                $data['bank_id_fk'] = $this->input->post('bank_id_fk')[$i];
                $data['bank_account_num'] = $this->input->post('bank_account_num')[$i];

                $data['bank_id_fk_image'] = $dataInfo[$i]['file_name'];

                $this->db->insert('bank_employes_details', $data);

            }
        }
    }
	
    
    
/*	public function bank_employes_details($emp_code)
	{


		$this->load->library('upload');
		$dataInfo = array();
		$files = $_FILES;
        if(!empty($_FILES['userfile']['name'])){
           $cpt = count($_FILES['userfile']['name']);
		for($i=0; $i<$cpt; $i++)
		 {
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];

			$this->upload->initialize($this->set_upload_options());
			$this->upload->do_upload();
			$dataInfo[] = $this->upload->data();
		 } 
        // end if 
		
         
		$data['emp_code'] = $emp_code;
		  for($i=0; $i<$cpt; $i++) {
			$data['approved_for_sarf'] = 0;
			$data['bank_id_fk'] = $this->input->post('bank_id_fk')[$i];
			$data['bank_account_num'] = $this->input->post('bank_account_num')[$i];

			  $data['bank_id_fk_image'] = $dataInfo[$i]['file_name'];

			$this->db->insert('bank_employes_details', $data);

		}
 }
	}*/
	/*public function getAllData($emp_code)
	{
		$query = $this->db->where('emp_code', $emp_code)->get('finance_employes');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->badlat = $this->getEmp_Badalat($emp_code, 1);
				$data[$i]->Banks = $this->getEmpBank($emp_code);
				$i++;
			}
			return $data;
		}
		return false;
	}*/

/*	public function getEmp_Badalat($emp_code, $type)
	{
		$query = $this->db->where('emp_code', $emp_code)->get('emp_badlat_discount_details');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[$row->badl_discount_id_fk] = $row;
			}
			return $data;
		}
		return false;

	}*/
    
    
    public function getEmp_Badalat($emp_code, $type)
	{

		$query2 = $this->db->where('emp_code', $emp_code)->get('emp_badlat_discount_details');
		if ($query2->num_rows() > 0) {
			$data_ids=array();
		foreach ($query2->result() as $row) {
			$data_ids[] = $row->badl_discount_id_fk;
		}
			}else{
			return 0;
		}
		$this->db->where_in('id', $data_ids);
		$this->db->order_by('in_order','asc');

		$query=$this->db->get('emp_badlat_discount_settings')->result();
		$x=0;
		$data=array();
		foreach ($query as $row){
			$data[$x]=$row;
			$data[$x]->badalat=$this->get_badalat_order_by($emp_code,$row->id);
			$x++;

		}
		return $data;

	}
	public function get_badalat_order_by($emp_code,$id)
	{
		$arr=array('emp_code'=>$emp_code,'badl_discount_id_fk'=>$id);
		$this->db->where($arr);
		return $this->db->get('emp_badlat_discount_details')->row();
	}

	public function get_badl($emp_code, $id)
	{
		$this->db->where('emp_code', $emp_code);
		$this->db->where('badl_discount_id_fk', $id);
		return $this->db->get('emp_badlat_discount_details')->result();

	}

	public function getEmpBank($emp_code)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
			->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
			->where('emp_code', $emp_code)
			->get('bank_employes_details')
			->result();
	}

	public function deleteFinanceEmp($id)
	{
		$this->db->where('id', $id)->delete('bank_employes_details');
	}

	public function deleteAllFinanceEmployee($empCode)
	{
		$this->db->where('emp_code', $empCode)->delete('finance_employes');
		$this->db->where('emp_code', $empCode)->delete('emp_badlat_discount_details');
		$this->db->where('emp_code', $empCode)->delete('bank_employes_details');
		$this->financeEmployee($empCode);
	}


	public function DeleteEmpAll($id)
	{
		$this->db->where('id', $id)->delete('employees');
		$this->db->where('from_emp_code', $id)->delete('emp_custody_transfer_operations');
		$arr_table = array('emp_badlat_discount_details', 'emp_custody', 'emp_files', 'emp_debts', 'emp_evaluation',
			'emp_attendance', 'bank_employes_details');
		$arr = array('emp_debts', 'emp_evaluation', 'emp_attendance');

		foreach ($arr_table as $key => $value) {
			if (in_array($value, $arr)) {
				$this->db->where('emp_id', $id)->delete($value);
			} else {

				$this->db->where('emp_code', $id)->delete($value);
			}

		}

	}


public function getAllData($emp_code)
	{
		$query = $this->db->where('emp_code', $emp_code)->get('finance_employes');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result() as $row) {
				$data[$i] = $row;
				$data[$i]->badlat = $this->getEmp_Badalat($emp_code, 1);
				$data[$i]->Banks = $this->getEmpBank($emp_code);
				$data[$i]->get_having_value = $this->get_sum_value($emp_code,$this->getBadalat_id(1));
				$data[$i]->get_discut_value = $this->get_sum_value($emp_code,$this->getBadalat_id(2));
				$data[$i]->tamin_value = $this->get_tamin_value($emp_code,$this->getBadalat_id(1));
				$i++;
			}
			return $data;
		}
		return false;
	}
	
	
	
	public function get_sum_value($emp_code,$ids)
{
$this->db->where_in('badl_discount_id_fk', $ids);
$this->db->where('emp_code',$emp_code);
	$this->db->select_sum('value');
	$result = $this->db->get('emp_badlat_discount_details');
	if($result->num_rows()>0){
		return $result->row()->value;
	}else{
		return 0;
	}

	
}

	public function get_tamin_value($emp_code,$ids)
	{
		$this->db->where_in('badl_discount_id_fk', $ids);
		$this->db->where('emp_code',$emp_code);
		$this->db->where('insurance_affect',1);
		$this->db->select_sum('value');
		$result = $this->db->get('emp_badlat_discount_details');
		if($result->num_rows()>0){
			return $result->row()->value;
		}else{
			return 0;
		}


	}
	//==========================================================================================
	public function getBadalat_id($type)
	{
		$query = $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
		$data = array();
		$x = 0;
		foreach ($query as $row) {
			$data[] = $row->id;
			$x++;
		}
		return $data;
	}



	public function get_all_badalat($type, $id)
	{
		$this->db->where('type', $type);
		$this->db->where_not_in('id', $id);
	    $this->db->order_by('in_order',"ASC");
		return $this->db->get('emp_badlat_discount_settings')->result();
	}


	public function delete_badl($id,$empCode,$value,$type)
	{
		$this->db->where('id', $id);
		$this->db->delete('emp_badlat_discount_details');
		if($type==1)
		{

			$val1=$this->get_new_value($empCode)->having_all_value;
			$val2=$value;
			$data['having_all_value']=$val1-$val2;
			$this->db->where('emp_code', $empCode);
			$this->db->update('finance_employes',$data);
		}elseif($type==2){

			$val1=$this->get_new_value($empCode)->discut_all_value;
			$val2=$value;
			$data['discut_all_value']=$val1-$val2;
			$this->db->where('emp_code', $empCode);
			$this->db->update('finance_employes',$data);


		}



	}

	public function get_new_value($empCode)
	{
		$this->db->where('emp_code', $empCode);

		$query=$this->db->get('finance_employes');
		if($query->num_rows()>0)
		{
		return  $query->row();
		}else{
			return 0;
		}
	}

	public function change_bank_status($id,$emp_code,$approved)
	{

		$this->db->where('emp_code',$emp_code);
		$data['approved_for_sarf']=0;
		$this->db->update('bank_employes_details',$data);
		$this->db->where('id',$id);
		$data2['approved_for_sarf']=$approved;
		$this->db->update('bank_employes_details',$data2);

	}
    
    
    
    /*************************************/
    
    	private function set_upload_options($folder = "images") 
	{ 
		//upload an image options
		$config = array();
		$config['upload_path'] = 'uploads/'.$folder;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}
    
    
    public function edit_bank_account($img)
	{
		$id=$this->input->post('row_id');
		$this->db->where('id',$id);
		$data['bank_id_fk'] = $this->input->post('edit_bank_id_fk');
		$data['bank_account_num'] = $this->input->post('edit_bank_account_num');
if($img!=''){
	$data['bank_id_fk_image'] = $img;
}

		$this->db->update('bank_employes_details',$data);

	}
    
    
 /***********************/
 
 	public function update_discut_having_employee($emp_code,$type)
	{
		$data['emp_code'] = $emp_code;
		$id = $this->input->post('having_row_id');

		$data['method_to_count'] = $this->input->post('have_method_to_count');
		$data['badl_discount_id_fk'] = $this->input->post('have_badl_discount_id_fk');
		$data['value'] = $this->input->post('have_value');
		$data['specific_period'] = $this->input->post('have_specific_period');

		$data['date_from'] = $this->input->post('have_date_from');

	$data['dalel_name'] = $this->input->post('have_dalel_name');

		$data['date_to'] = $this->input->post('have_date_to');


if($type==1) {

	$data['insurance_affect'] = $this->input->post('have_insurance_affect');
}else{
	$data['insurance_affect'] =0;
}

		$data['dalel_code'] = $this->input->post('have_dalel_code');
		$this->db->where('id',$id);
		$this->db->update('emp_badlat_discount_details',$data);


	}
    
    public function get_option_for_modal_select()
	{
		$ids=$this->input->post('valu');
		$select_val=$this->input->post('select_val');
		$type=$this->input->post('type');
		$this->db->where('type', $type);
		$this->db->where_not_in('id', $ids);

		return $this->db->get('emp_badlat_discount_settings')->result();
		

	}
	//===================================================== old ============================================================
	   
       	
	  public function get_nationality($emp_code)
	{
		$this->db->where('id',$emp_code);
		$query=$this->db->get('employees');
		if($query->num_rows()>0)
		{
		return $query->row()->nationality;
		}else{
			return 0;
		}
	}

	public function get_emp_setting($nationality)
	{
     $this->db->where('nationality_type',$nationality);
		$query2=$this->db->get('hr_insurance_settings');
		if($query2->num_rows()>0)
		{
			$this->db->select_sum('emp_average');
			$this->db->where('nationality_type',$nationality);
			$query=$this->db->get('hr_insurance_settings');
			return $query->row()->emp_average;
		}else{
			return 0;
		}

	}
       
       
 /******************************/
 
 	 public function edit_table_finance()
	{
		$emp_id=$this->input->post('emp_id');
		$data['having_all_value']=$this->input->post('having_all_value');
		$data['having_tamin_value']=$this->input->post('having_tamin_value');
		$data['discut_all_value']=$this->input->post('discut_all_value');
		$data['discut_tamin_value']=$this->input->post('discut_tamin_value	');

		$this->db->where('emp_code',$emp_id);
		$this->db->update('finance_employes',$data);
		
	}
    
    
    public function get_rkm_hesab($markz_id,$badl_id){
 	     $this->db->where('markz_id_fk',$markz_id);
 	     $this->db->where('band_id_fk',$badl_id);

 	   $query =  $this->db->get('hr_markz_taklfa_settings');
 	   if ($query->num_rows()>0){
 	      // return $query->row()->rkm_hesab;
          	 return $query->row();
       } else{
 	       return 0;
       }

    }      
    
}
/* End of file Finance_employee_model.php */
/* Location: ./application/models/human_resources_model/Finance_employee_model.php */