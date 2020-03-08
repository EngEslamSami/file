<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_approved extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        
        $this->load->model('services_models/Services_approved_model');
    }
	private  function test($data=array()){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die;
	}

	public function index()   //   services_orders/Services_approved
	{
		
		$tables = array(2=>'marriage_help', 3=>'medical_center', 4=>'electronic_card',
			            5=>'', 6=>'electrical_device_order', 7=>'maintenance_electrical_device_order',
			            8=>'furniture_order', 9=>'electrical_fatora_order', 10=>'water_fatora_order',
			            11=>'haj_omra_order', 12=>'haj_omra_order', 13=>'home_repairs_order',
			            14=>'restore_repairs_order', 15=>'cars_repairs_order',
			            16=>'health_care_orders', 17=>'insurance_medical_device_orders',
			            18=>'school_supplies_order');
		$data['categories'] = $this->Services_approved_model->selectCategories();
		foreach ($data['categories'] as $key => $value) {
			if($key == 1 || $key == 5){
				continue;
			}
            //==========================================================
			$where = array($tables[$key].'.approved' => 0);
			if($key == 11){
				$where = array($tables[$key].'.approved' => 0 ,"type"=>1);
				$data['haj_new'] = $this->Services_approved_model->$tables[$key]($where);
			}elseif ($key == 12){
				$where = array($tables[$key].'.approved' => 0 ,"type"=>2);
				$data['omra__new'] = $this->Services_approved_model->$tables[$key]($where);
			}else{
				$data[$tables[$key].'_new'] = $this->Services_approved_model->$tables[$key]($where);
			}

            //==========================================================
			$where = array($tables[$key].'.approved' => 1);
			if($key == 11){
				$where = array($tables[$key].'.approved' => 1 ,"type"=>1);
				$data['haj_accept'] = $this->Services_approved_model->$tables[$key]($where);
			}elseif ($key == 12){
				$where = array($tables[$key].'.approved' => 1 ,"type"=>2);
				$data['omra_accept'] = $this->Services_approved_model->$tables[$key]($where);
			}else{
				$data[$tables[$key].'_accept'] = $this->Services_approved_model->$tables[$key]($where);
			}

            //==========================================================
			$where = array($tables[$key].'.approved' => 2);
			if($key == 11){
				$where = array($tables[$key].'.approved' => 2 ,"type"=>1);
			}elseif ($key == 12){
				$where = array($tables[$key].'.approved' => 2 ,"type"=>2);
			}
			$data[$tables[$key].'_refused'] = $this->Services_approved_model->$tables[$key]($where);
			$data[$tables[$key]] = $this->Services_approved_model->$tables[$key]();
		}

		$data['title'] = 'إعتماد خدمات الأسر';
        $data['subview'] = 'admin/services_orders/services_approved/services_approved';
        $this->load->view('admin_index', $data);
	}

	// =============================================================================
    public  function  ApprovedOpration($table_total,$mainServices,$id,$value_approve){
		$this->load->model('Difined_model');
		$table_ex=explode("_new",$table_total);
		$table =$table_ex[0];
		$update["approved"]=$value_approve;
		$update["approved_date_ar"]=date("Y-m-d",time());
		$update["approved_publisher"]=$_SESSION['user_id'];
		$update["approved_reason"]=$this->input->post("reason");
		/**************nashwa **********************/
		if($mainServices == 2) {
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 3) {
          $arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 4) {
           $arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 16) {
			$datas=$this->Difined_model->getById($table,$id);
            $arr_conditin=array("order_num"=>$datas["order_num"]);
			$this->Services_approved_model->update($table,$arr_conditin,$update);
		}
		if($mainServices == 17) {
			$datas=$this->Difined_model->getById($table,$id);
			$arr_conditin=array("order_num"=>$datas["order_num"]);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		/*************************************************/
		if($mainServices == 11){
			$datas=$this->Difined_model->getById("haj_omra_order",$id);
			$arr_conditin=array("order_num"=>$datas["order_num"]);
			$this->Services_approved_model->update("haj_omra_order",$arr_conditin,$update);

		}
		if($mainServices == 12){
			$datas=$this->Difined_model->getById("haj_omra_order",$id);
			$arr_conditin=array("order_num"=>$datas["order_num"]);
			$this->Services_approved_model->update("haj_omra_order",$arr_conditin,$update);

		}
		if($mainServices == 18){
			$datas=$this->Difined_model->getById($table,$id);
			$arr_conditin=array("order_num"=>$datas["order_num"]);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		/*************************************************/
		if($mainServices == 6){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 7){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 8){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 9){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 10){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 15){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 13){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($mainServices == 14){
			$arr_conditin=array("id"=>$id);
			$this->Services_approved_model->update($table,$arr_conditin,$update);

		}
		if($value_approve == 1){
			messages('success', 'تمت الموافقة ');
		}else {
			messages('error', 'تم الرفض ');
		}
		redirect('services_orders/Services_approved','refresh');

	}

} // END CLASS






/* End of file Services_approved.php */
/* Location: ./application/controllers/services_orders/Services_approved.php */