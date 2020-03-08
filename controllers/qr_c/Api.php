<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
	   
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->model('qr_m/api/Web_service');
        
     
          $this->load->model('qr_m/motab3a_hdoor_m/Hdoor_model');
              
	}
	
	 public function login_Qrcode()
    {
        $data['success']=0;
        if($this->input->post('emp_nationl_num'))
        {
           $emp_nationl_num=$this->input->post('emp_nationl_num');
            $arr_table_employees=array('card_num'=>$emp_nationl_num);
            
             $table_employees=$this->Web_service->count_rows('employees',$arr_table_employees);
             
          $arr_Qrcode_emps_table=array('emp_nationl_num'=>$emp_nationl_num);
           $table_Qrcode_emps_table=$this->Web_service->count_rows('Qrcode_emps_table',$arr_Qrcode_emps_table);
            
           if($table_employees==0)
           {
            // انت لست موظف
            $data['success']=0;
           }elseif($table_employees >0 && $table_Qrcode_emps_table==0)
           {
                $data_insert['emp_nationl_num']=$emp_nationl_num;
                $data_insert['date_login']=strtotime(date("Y-m-d"));
                $data_insert['time_login']=strtotime(date("H:i:s"));
                
                $this->Web_service->insert_data('Qrcode_emps_table',$data_insert);
                $data['success']=1;
                $data['emp_nationl_num']=$emp_nationl_num;
           }elseif($table_employees>0 && $table_Qrcode_emps_table>0)
           {
            // انت مسجل من قبل
             $data['success']=2;
             $data['emp_nationl_num']=$emp_nationl_num;
           }
            restful($data); 
            
        }
    }
    
  
    
    public function  register_Qrcode()
    {

                 
         $data['success']=0;
       
        if($this->input->post('emp_nationl_num')&& $this->input->post('Qrcode'))
        {
        
         // $lat1=30.573113799999994;
              $lat1=$this->Web_service->get_lat_long('main_data','lat_map'); 
             
          //$long1=31.009767500000002;
          $long1=$this->Web_service->get_lat_long('main_data','lang_map'); 
          $lat2=$this->input->post('lat');
           $long2=$this->input->post('long');
           $unit="K";
          
             $distance= $this->distance($lat1, $long1, $lat2, $long2, $unit);
              $distance_m=$distance*1000;
              
           //  if($distance_m < 20){
            $post_Qrcode=$this->input->post('Qrcode');
             $last_Qrcode=$this->Web_service->select_last_Qrcode('qrcodes_table','id');
              $last_Qrcode_db=$this->Web_service->select_last_Qrcode('qrcodes_table','Qrcode');
              
                
           // if($post_Qrcode==$last_Qrcode_db){
                
            
                    $emp_nationl_num=$this->input->post('emp_nationl_num');
               
                     $emp_id=$this->Hdoor_model->get_details('card_num', $emp_nationl_num, 'employees', 'id');
                     $day_num=date('N', strtotime(date("Y-m-d")));
                    $dwam=$this->Web_service->check_dwam(strtotime(date("Y-m-d")),$day_num,$emp_id)[0];
                     $data_insert['emp_national_num']=$emp_nationl_num;
                     $data_insert['Qrcode_id_fk']=1;
                     $data_insert['name']=$this->Hdoor_model->get_details('card_num', $emp_nationl_num, 'employees', 'employee');
                     $data_insert['emp_code']=$this->Hdoor_model->get_details('card_num', $emp_nationl_num, 'employees', 'emp_code');
                   //  $data_insert['dawam_fk']=$this->Web_service->get_emp_dawam($emp_id);
                     $data_insert['dawam_fk']=$this->Web_service->get_dawam(date("H:i:s"),$dwam);
                     $start_enter_db=$this->Hdoor_model->get_details('id', $data_insert['dawam_fk'], 'always_setting', 'start_enter');
                      $end_enter_db=$this->Hdoor_model->get_details('id', $data_insert['dawam_fk'], 'always_setting', 'end_enter');
                      $start_out_db=$this->Hdoor_model->get_details('id', $data_insert['dawam_fk'], 'always_setting', 'start_out');
                      $end_out_db=$this->Hdoor_model->get_details('id', $data_insert['dawam_fk'], 'always_setting', 'end_out');
                         $tim_hdoor=date("H:i:s");
                   
                      if($tim_hdoor>=$start_enter_db && $tim_hdoor <=$end_enter_db)
                      {
                        $data_insert['type']=1;
                         $data_insert['time_hdoor_absence']=date("H:i");
                      }else{
                         $data_insert['type']=2;
                          $data_insert['time_hdoor_absence']=date("H:i");
                      }
                        $data_insert['date']=strtotime(date("Y-m-d"));
                     $data_insert['date_ar']=date("Y/m/d");
                     $data_insert['month']=date("m");
                      $data_insert['year']=date("Y");
                      $arr=array('emp_code'=>$data_insert['emp_code'],'type'=>$data_insert['type'],'emp_national_num'=>$data_insert['emp_national_num'],'date'=>$data_insert['date']);
        
                    $num_rows=$this->Web_service->get_rows($arr,'hr_hdoor_ensraf');
                    if($num_rows==0)
                    {
                       $this->Web_service->insert_data('hr_hdoor_ensraf',$data_insert);  
                    }else{
                        
                      $this->Web_service->update_data_arr('hr_hdoor_ensraf',$data_insert,$arr);    
                    }
                    
                  
                         
                 $data['success']=1; 
               // }else{
               //     $data['success']=0;
              //   }
              //   }
                }else{
                   $data['success']=0;
                 }
            //  $data['success']=1;
               restful($data); 
       
            
        }
        
          
        
        
    public  function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}

  public function get_mac()
  {
    ob_start();
    system('ipconfig/all');
    $mycom=ob_get_contents();
    ob_clean();
    $findme="Physical";
    $pmac=strpos($mycom,$findme);
    $mac=substr($mycom,($pmac+36),17);
    echo $mac .'-'.$_SERVER['HTTP_USER_AGENT'];
   }


   
	
	public function hdoor_emps_table()
    {
        $this->db->truncate('hdoor_emps_table');
    }
    //============================================================================
    public function get_all_sites()
    {
        $data['sites']=$this->Web_service->get_all_sites();
        echo "<pre>";
        print_r($data['sites']);
    }
    
    
    
    
     //============================================================================
  
	
	 public function get_site_by_code()
    {
      //return $this->db->get('qrcode_alatheer_projects')->result();  
      $code=$this->input->post('code');
   
      if($code)
      {
        $data=$this->Web_service->get_code_site($code);
        if(isset($data)&& !empty($data))
        {
        //  $data=$this->Web_service->get_code_site($code);  
          $data->success=1;  
        }else{
           $data['success']=0; 
        }
      }
      restful($data);
    }
	
    public function delete_all() //Api/delete_all
    {
       $this->db->truncate('Qrcode_emps_table');
     //  $data=$this->db->get('hr_hdoor_ensraf')->result();
     //  echo "<pre>";
    //   print_r($data);
    }
    
    //=====================
    
    
    
         function rrmdir($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                  $this->rrmdir($full);
                }
                else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

   
	
	
	
}