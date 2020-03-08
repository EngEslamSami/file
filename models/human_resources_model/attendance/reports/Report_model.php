<?php
class Report_model extends CI_Model{
public  function get_all_emp(){
    $query = $this->db->get('employees');
    $this->db->order_by('emp_code');
    if ($query->num_rows() > 0) {
        return $query->result() ;
    }
    else{
        return false;
    }
}

public function search_result(){
    $this->load->model('human_resources_model/Public_employee_main_data');
    $checkbox_value = $this->input->post('checkbox_value');
    $from_date = strtotime($this->input->post('from_date')) ;
    $to_date = strtotime($this->input->post('to_date'));
    // $this->db->select('hr_hdoor_ensraf.*,employees.card_num,employees.emp_code')
    // ->join('hr_hdoor_ensraf','employees.card_num=hr_hdoor_ensraf.emp_national_num','left');
    if (!empty($checkbox_value)) {
        $this->db->where_in('emp_code', $checkbox_value);
    }
    if (!empty($from_date)) {
        $this->db->where('date>=', $from_date);
    }
    if (!empty($to_date)) {
        $this->db->where('date<=', $to_date);
    }

    $query = $this->db->get('hr_hdoor_ensraf');
    if ($query->num_rows() > 0) {
        $i =0;
        $data = array( );
        foreach ($query->result() as $row){


             $emp_data= $this->get_details(array('emp_code'=>$row->emp_code),'employees');
            if (!empty($emp_data)) {
              $data[$i]= $row;
              $data[$i]->emp_data=$emp_data;

              $data[$i]->edara = $this->Public_employee_main_data->get_edara_name_by_emp_id($data[$i]->emp_data->id);
              $data[$i]->qsm = $this->Public_employee_main_data->get_qsm_name_by_emp_id($data[$i]->emp_data->id);
              $days = array('', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', 'الأحد');
              $day_num=date('N', strtotime($row->date_ar));
              $data[$i]->day_name=$days[$day_num];
              if (!empty($data[$i]->emp_data->degree_id)){
                  $data[$i]->job = $this->get_job_title( $data[$i]->emp_data->degree_id);
              }
              if (empty($row->hdoor_time) && empty($row->ensraf_time)){
                  $data[$i]->attend= 'غائب' ;
                  $dwam=$this->check_dwam(strtotime($row->date_ar),$day_num,$data[$i]->emp_data->id);
                   if ($dwam == 1) {
                     $agaza=$this->check_agaza(strtotime($row->date_ar),$data[$i]->emp_data->id);
                     if ($agaza == 0) {
                       $data[$i]->day_type ='عمل'   ;
                       $data[$i]->day_color = 'red';
                      }else {
                       $data[$i]->day_type ='اجازة' ;
                      $data[$i]->day_color = 'green';
                     }
                   }else {
                     $data[$i]->day_color = 'gold';
                     $data[$i]->attend= 'خارج الدوام' ;
                   }
              } else{
                $data[$i]->day_type ='عمل'   ;
                $data[$i]->day_color = 'red';
                //   $data[$i]->day_color = '';
                  $data[$i]->attend= 'حاضر' ;
              }
              $data[$i]->period = $this->get_details(array('emp_code'=>$data[$i]->emp_data->emp_code),'contract_employe');
            }
          $i++;
        }
      return $data ;
    }
    else{
        return false;
    }



}

public function get_total_report()
{
  $this->load->model('human_resources_model/Public_employee_main_data');
  $checkbox_value = $this->input->post('checkbox_value');
  $from_date = strtotime($this->input->post('from_date')) ;
  $to_date = strtotime($this->input->post('to_date'));
  $data = array();
  for ($i=0; $i <sizeof($checkbox_value) ; $i++) {
    $emp_code=$checkbox_value[$i];
    $emp_data = $this->get_details(array('emp_code'=>$emp_code),'employees');
    if (!empty($emp_data)) {
    //   $hdoor_ensraf_data = $this->get_hdoor_ensraf_data($emp_data->emp_code,$emp_data->id,$from_date,$to_date);
      $hdoor_ensraf_data = $this->get_hdoor_ensraf_data_emp($emp_data->id,$emp_data->card_num,$from_date,$to_date);
      if (!empty($hdoor_ensraf_data)) {
        $data[$i]=$emp_data;
        $data[$i]->edara = $this->Public_employee_main_data->get_edara_name_by_emp_id($data[$i]->id);
        $data[$i]->qsm = $this->Public_employee_main_data->get_qsm_name_by_emp_id($data[$i]->id);
        if (!empty($data[$i]->degree_id)){
            $data[$i]->job = $this->get_job_title( $data[$i]->degree_id);
        }
        $data[$i]->main_delay = $hdoor_ensraf_data['total_dalay'];
        $data[$i]->ensraf_delay = $hdoor_ensraf_data['total_dalay_ensraf'];
        $data[$i]->days_abs =  $hdoor_ensraf_data['days_abs'];
        $data[$i]->hdoor_dalay_num =  $hdoor_ensraf_data['hdoor_dalay_num'];
        $data[$i]->ensraf_num =  $hdoor_ensraf_data['ensraf_num'];
      }
    // print_r($hdoor_ensraf_data);
  }
  }
  return $data;

}



public function get_hdoor_ensraf_data($emp_code,$emp_id,$from_date,$to_date){

    $this->db->where('emp_code',$emp_code);
    
    if (!empty($from_date)) {
        $this->db->where('date>=', $from_date);
    }
    if (!empty($to_date)) {
        $this->db->where('date<=', $to_date);
    }
    $query = $this->db->get('hr_hdoor_ensraf');


    if ($query->num_rows() > 0) {
      $days_abs=$total_dalay=$total_dalay_ensraf=0;

        $i =0;
        foreach ($query->result()  as $row){
            $data[$i]= $row ;

            $dawam_time_setting = strtotime($row->dawam_time_setting);
            $hdoor_time = strtotime( $row->hdoor_time);
            $diff_mint =  $dawam_time_setting - $hdoor_time;
            if ($diff_mint < 0) {
              $total_dalay+=intval(gmdate('i',abs($diff_mint))) ;
            }

            $ensraf_time_setting = strtotime($row->ensraf_time_setting);
            $ensraf_time = strtotime($row->ensraf_time);
            $diff_ensraf = $ensraf_time_setting - $ensraf_time;
            if ($diff_ensraf > 0) {
              $total_dalay_ensraf+=intval(gmdate('i',abs($diff_ensraf))) ;
            }

            $day_num=date('N', strtotime($row->date_ar));
            if (empty($row->hdoor_time) && empty($row->ensraf_time)){
                $dwam=$this->check_dwam(strtotime($row->date_ar),$day_num,$emp_id);
                if ($dwam == 1) {
                  $agaza=$this->check_agaza(strtotime($row->date_ar),$emp_id);
                    if ($agaza == 0) {
                        $days_abs+=1;
                    }
                }
            }
            $i++;
        }
        return array('days_abs'=>$days_abs,'total_dalay'=>$total_dalay ,'total_dalay_ensraf'=>$total_dalay_ensraf);

    }else {
      return false;
    }

}


public function check_dwam($hdoor_date,$day_hdoor,$emp_id)
{
    $days_en =array("","monday","tuesday","wednesday","thursday","friday","saturday","sunday");

    $q=$this->db->where('from_date <=',$hdoor_date)->where('to_date >=',$hdoor_date)
        ->where('emp_id',$emp_id)->where($days_en[$day_hdoor],1)->get('emp_always_times');
    if ($q->num_rows() > 0) {
        return 1 ;
    }
    else{

        return 0;
        
    }

}



public function check_agaza($hdoor_date,$emp_id)
{
    $q=$this->db->where('agaza_from_date <=',$hdoor_date)->where('agaza_to_date >=',$hdoor_date)
        ->where('emp_id_fk',$emp_id)->where("suspend",4)->get('hr_all_agzat_orders');
    if ($q->num_rows() > 0) {
        return 1 ;
    }
    else{
        return 0;
    }

}

public function get_details($arr,$table){
    $this->db->where($arr);
    $query = $this->db->get($table);
    if ($query->num_rows() > 0) {
        return $query->row() ;
    }
    else{
        return false;
    }
}



    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }



    // /***********************************************************/
public function get_hdoor_ensraf_data_emp($emp_id,$emp_card_num,$from_date,$to_date)
{

      // Declare an empty array 
        $array = array(); 
        $data = array();

        // Use strtotime function 
        $start = date('Y-m-d',$from_date); 
        $end = date('Y-m-d',$to_date); 

        // Variable that store the date interval 
        // of period 1 day 
        $interval = new DateInterval('P1D'); 
    
        $realEnd = new DateTime($end); 
        $realEnd->add($interval); 
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
    
        // Use loop to store date into array 
        foreach($period as $Date) { 
            $array[] = strtotime($Date->format('Y-m-d'));  
        }
              $days_abs=$total_dalay=$total_dalay_ensraf=$hdoor_dalay_num=$ensraf_num=0;

        foreach($array as $key=>$currentDate) { 

            $data[$key]=$this->get_hdoodr_emp_for_one_day($emp_id,$emp_card_num,$currentDate);  
            if ($data[$key]['attend']!=1) {
                $dawam_time_setting = strtotime($data[$key]['dawam_time_setting']);
                $hdoor_time = strtotime( $data[$key]['hdoor_time']);
                $diff_mint =  $dawam_time_setting - $hdoor_time;
                if ($diff_mint < 0) {
                    $total_dalay+=intval(abs($diff_mint)/60) ;
                    $hdoor_dalay_num++;
                }
            }
            if ($data[$key]['attend']!=1) {
               $ensraf_time_setting = strtotime($data[$key]['ensraf_time_setting']);
                $ensraf_time = strtotime($data[$key]['ensraf_time']);
                $diff_ensraf = $ensraf_time_setting - $ensraf_time;
                if ($diff_ensraf > 0) {
                    $total_dalay_ensraf+=intval(abs($diff_ensraf)/60) ;
                    $ensraf_num++;
            }
            }
            

             $days_abs+=$data[$key]['attend'];
        }
        return array('days_abs'=>$days_abs,'total_dalay'=>$total_dalay ,
        'total_dalay_ensraf'=>$total_dalay_ensraf,
            'hdoor_dalay_num'=>$hdoor_dalay_num,'ensraf_num'=>$ensraf_num);

    
}

public function get_hdoodr_emp_for_one_day($emp_id,$emp_card_num,$currentDate)
{
    //   $this->db->where('emp_code',$emp_card_num);
    
    if (!empty($currentDate)) {
        $this->db->where('date', $currentDate);
    }
    
    $hdoor=$this->check_hdoor($emp_card_num,$currentDate,1);
    $ensraf= $this->check_hdoor($emp_card_num,$currentDate,2);
     $days = array('', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', 'الأحد');
    $day_num=date('N', $currentDate);
    $dwam=$this->check_dwam_emp($currentDate,$day_num,$emp_id);
    if ((!empty($dwam))) {
        $data['dawam_time_setting']=$dwam->end_enter;
        $data['ensraf_time_setting']=$dwam->end_out;
    }else{
        $data['dawam_time_setting']='';
        $data['ensraf_time_setting']='';

    }
    if (empty($hdoor) && empty($ensraf)){
        $data['hdoor_time']='';
        $data['ensraf_time']='';
        $data['attend']= 1 ;
        if ((!empty($dwam))) {
            
            $agaza=$this->check_agaza($currentDate,$emp_id);
            if ($agaza == 0) {
                $data['attend']= 1 ;
            }else {
                $data['attend']= 0 ;
            }
        }else {
            $data['attend']= 0 ;
        }
    }else{
        $data['attend']= 0 ;

        if (!empty($hdoor)) {
            $data['hdoor_time']=$hdoor->time_hdoor_absence	;
        }else{
            $data['hdoor_time']='';
        }
        if (!empty($ensraf)) {
            $data['ensraf_time']=$ensraf->time_hdoor_absence	;
        }else{
            $data['ensraf_time']='';
        }
    }
                     
return $data;

}
// for report detalies
   public function get_all_data_hdoor()
    {
        $from_date = strtotime($this->input->post('from_date')) ;
        $to_date = strtotime($this->input->post('to_date'));
        // Declare an empty array 
        $array = array(); 
        $data = array();

        // Use strtotime function 
        $start = date('Y-m-d',$from_date); 
        $end = date('Y-m-d',$to_date); 

        // Variable that store the date interval 
        // of period 1 day 
        $interval = new DateInterval('P1D'); 
    
        $realEnd = new DateTime($end); 
        $realEnd->add($interval); 
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
    
        // Use loop to store date into array 
        foreach($period as $Date) { 
            $array[] = strtotime($Date->format('Y-m-d'));  
        }
        foreach($array as $key=>$currentDate) { 

            $data[$key]=$this->get_hdoo_all_emp_for_one_day($currentDate);     
        }
        return $data;
    }




 

    public function get_hdoo_all_emp_for_one_day($currentDate)
    {
        $this->load->model('human_resources_model/Public_employee_main_data');

        $checkbox_value = $this->input->post('checkbox_value');
        if (!empty($checkbox_value)) {
            $this->db->where_in('emp_code', $checkbox_value);
        }
        $all_emp = $this->db->get('employees')->result();
        if (!empty($all_emp)) {
            $data = array();
                foreach ($all_emp as $i => $row) {
                        $data[$i]= $row;
                        $data[$i]->edara = $this->Public_employee_main_data->get_edara_name_by_emp_id($row->id);
                        $data[$i]->qsm = $this->Public_employee_main_data->get_qsm_name_by_emp_id($row->id);
                        $days = array('', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', 'الأحد');
                        $day_num=date('N', $currentDate);
                        $data[$i]->day_name=$days[$day_num];
                        $data[$i]->date_ar=date('Y-m-d', $currentDate);
                        if (!empty($row->degree_id)){
                            $data[$i]->job = $this->get_job_title( $row->degree_id);
                        }
                        $hdoor=$this->check_hdoor($row->card_num,$currentDate,1);
                        $ensraf= $this->check_hdoor($row->card_num,$currentDate,2);
                        $dwam=$this->check_dwam_emp($currentDate,$day_num,$row->id);
                        if ((!empty($dwam))) {
                            $data[$i]->dawam_id=$dwam->always_id_fk;
                            $dawam_title=$this->get_details(array('id'=>$dwam->always_id_fk),'always_setting');  
                            if (!empty($dawam_title)) {
                            $data[$i]->dawam_title=$dawam_title->name;  
                            }else{
                                $data[$i]->dawam_title='';  

                            }
                            $data[$i]->dawam_time_setting=$dwam->end_enter;
                            $data[$i]->ensraf_time_setting=$dwam->end_out;
                        }else{
                            $data[$i]->dawam_time_setting='';
                            $data[$i]->ensraf_time_setting='';
                            $data[$i]->dawam_id='';

                        }
                        if (empty($hdoor) && empty($ensraf)){
                            $data[$i]->hdoor_time='';
                            $data[$i]->ensraf_time='';
                            $data[$i]->attend= 'غائب' ;
                            if ((!empty($dwam))) {
                                
                                $agaza=$this->check_agaza($currentDate,$row->id);
                                if ($agaza == 0) {
                                $data[$i]->day_type ='عمل'   ;
                                $data[$i]->day_color = 'red';
                                }else {
                                $data[$i]->day_type ='اجازة' ;
                                $data[$i]->day_color = 'green';
                                }
                            }else {
                                $data[$i]->day_type ='خارج الدوام' ;
                                $data[$i]->day_color = 'gold';
                                $data[$i]->attend= 'خارج الدوام' ;
                            }
                        }else{
                            if (!empty($hdoor)) {
                                $data[$i]->hdoor_time=$hdoor->time_hdoor_absence	;
                            }else{
                                $data[$i]->hdoor_time='';
                            }
                            if (!empty($ensraf)) {
                                $data[$i]->ensraf_time=$ensraf->time_hdoor_absence	;
                            }else{
                                $data[$i]->ensraf_time='';
                            }
                            
                            $data[$i]->day_type ='عمل'   ;
                            // $data[$i]->day_color = 'red';
                            //$data[$i]->day_color = '';
                            $data[$i]->attend= 'حاضر' ;
                        }
                    $data[$i]->period = $this->get_details(array('emp_code'=>$data[$i]->emp_code),'contract_employe');

                     
            }

        }
        return $data;

    }
    public function check_hdoor($emp_card,$currentDate,$type)
    {
       $this->db->where(array('emp_national_num'=>$emp_card,'date'=>$currentDate,'type'=>$type));
       if ($type == 1) {
           $this->db->order_by('time_hdoor_absence ASC');
       }elseif ($type == 2) {
           $this->db->order_by('time_hdoor_absence DESC');
       }
         $q=$this->db->get('hr_hdoor_ensraf')->row();  
         return $q;
    }
    
public function check_dwam_emp($hdoor_date,$day_hdoor,$emp_id)
{
    $days_en =array("","monday","tuesday","wednesday","thursday","friday","saturday","sunday");

    $q=$this->db->select('end_enter,end_out,always_id_fk')->where('from_date <=',$hdoor_date)->where('to_date >=',$hdoor_date)
        ->where('emp_id',$emp_id)->where($days_en[$day_hdoor],1)->get('emp_always_times');
    if ($q->num_rows() > 0) {
        return $q->row();
    }
    

}






public function get_history_report()
{
    $this->load->model('human_resources_model/Public_employee_main_data');
    $checkbox_value = $this->input->post('checkbox_value');
    $from_date = strtotime($this->input->post('from_date')) ;
    $to_date = strtotime($this->input->post('to_date'));
    if (!empty($checkbox_value)) {
        $this->db->where_in('emp_code', $checkbox_value);
    }
    if (!empty($from_date)) {
        $this->db->where('date>=', $from_date);
    }
    if (!empty($to_date)) {
        $this->db->where('date<=', $to_date);
    }

    $query = $this->db->get('hr_hdoor_ensraf');
    if ($query->num_rows() > 0) {
        $i =0;
        $data = array( );
        foreach ($query->result() as $row){
             $emp_data= $this->get_details(array('emp_code'=>$row->emp_code),'employees');
            if (!empty($emp_data)) {
              $data[$i]= $row;
              $data[$i]->emp_data=$emp_data;

              $data[$i]->edara = $this->Public_employee_main_data->get_edara_name_by_emp_id($data[$i]->emp_data->id);
              $data[$i]->qsm = $this->Public_employee_main_data->get_qsm_name_by_emp_id($data[$i]->emp_data->id);
               if (!empty($data[$i]->emp_data->degree_id)){
                    $data[$i]->job = $this->get_job_title( $data[$i]->emp_data->degree_id);
                }
              $days = array('', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', 'الأحد');
              $day_num=date('N', strtotime($row->date_ar));
              $data[$i]->day_name=$days[$day_num];
           }
          $i++;
        }
      return $data ;
    }
    else{
        return false;
    }

    

}



public function get_hdoor_first_last_ensraf()
{
    
 $this->load->model('human_resources_model/Public_employee_main_data');
    $checkbox_value = $this->input->post('checkbox_value');
    $from_date = strtotime($this->input->post('from_date')) ;
    $to_date = strtotime($this->input->post('to_date'));
    if (!empty($checkbox_value)) {
        $this->db->where_in('emp_code', $checkbox_value);
    }
    if (!empty($from_date)) {
        $this->db->where('date>=', $from_date);
    }
    if (!empty($to_date)) {
        $this->db->where('date<=', $to_date);
    }
    $this->db->order_by('date ASC');

    $this->db->group_by('emp_code,type,date');
    $query = $this->db->get('hr_hdoor_ensraf');
    if ($query->num_rows() > 0) {
        $i =0;
        $data = array( );
        foreach ($query->result() as $row){
             $emp_data= $this->get_details(array('emp_code'=>$row->emp_code),'employees');
            if (!empty($emp_data)) {
              $data[$i]= $row;
              $data[$i]->emp_data=$emp_data;

              $data[$i]->edara = $this->Public_employee_main_data->get_edara_name_by_emp_id($data[$i]->emp_data->id);
              $data[$i]->qsm = $this->Public_employee_main_data->get_qsm_name_by_emp_id($data[$i]->emp_data->id);
              $frist_hdoor = $this->check_hdoor($row->emp_national_num,$row->date,1);
              if (!empty($frist_hdoor)) {
              $data[$i]->frist_hdoor = $frist_hdoor->time_hdoor_absence;
              }else{
                  $data[$i]->frist_hdoor ="";
              }

              $last_ensraf = $this->check_hdoor($row->emp_national_num,$row->date,2);
              if (!empty($last_ensraf)) {
              $data[$i]->last_ensraf = $last_ensraf->time_hdoor_absence;
              }else{
                  $data[$i]->last_ensraf ="";
              }
              
           }
          $i++;
        }
      return $data ;
    }
    else{
        return false;
    }


}


public function get_date_time($date,$emp_code,$type)
{
    
}
}
