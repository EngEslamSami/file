<?php
class Day_delay_model extends CI_Model
{

    public function select()
    {
        $this->db->select('*');
        $this->db->from('delay_reason');
        $this->db->group_by('emp_id');
        $query = $this->db->get();
        $d=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$d] = $row;
                $data[$d]->days = $this->get_days($row->emp_id);
                $data[$d]->name = $this->getEmp_name($row->emp_id);
                $data[$d]->all_days = $this->get_all_days($row->emp_id);
                $d++; }
            return $data;
        }
        return false;
    }

    public function get_days($id){
        $this->db->select('*');
        $this->db->from('delay_reason');
        $this->db->where("emp_id",$id);
        $this->db->group_by('num');
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data += $row->day_delay;
            }
            return $data;
        }else{
            return 0;
        }

    }

    public function get_all_days($id){
        $this->db->select('*');
        $this->db->from('delay_reason');
        $this->db->where("emp_id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }else{
            return 0;
        }

    }

    public function get_all_days2($id,$num){
        $this->db->select('*');
        $this->db->from('delay_reason');
        $arr=array('num'=>$num,'emp_id'=>$id);
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }else{
            return 0;
        }

    }
    public function select_last_id(){
        $this->db->select('*');
        $this->db->from('delay_reason');
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->num+1;
            }
            return $data;
        }else{
            return 1;
        }

    }


    public function insert()
    {

        $number =$this->select_last_id();
        for ($a=1;$a<=$this->input->post('max');$a++){
            $data['emp_id'] = $this->input->post('emp_id');
            $data['num'] = $number;
            $data['day_delay'] = $this->input->post('day_delay');
            $data['day'] = $this->input->post('day'.$a);
            $data['time'] = $this->input->post('time'.$a);
            $data['reason'] = "اذكر السبب";
            $this->db->insert('delay_reason', $data);
        }

    }


    public function getEmp_name($id){
        $h = $this->db->get_where("employees", array('id'=>$id));
        return $h->row_array();

    }


    public function get_all($id)
{


    $this->db->select('DISTINCT(num),emp_id,day_delay');
  $this->db->where('emp_id',$id);



    $query= $this->db->get('delay_reason')->result();


    $data=array();
    $x=0;
    foreach($query as $row){

       $data[$x]=$row;
        $data[$x]->id=$this->get_id($row->num,$id);


        $data[$x]->days=$this->get_days2($row->num,$id);
        $data[$x]->name=$this->get_name($id);
        $x++;

}
    return $data;

}

public function get_id($num,$id)
{
    $arr=array('num'=>$num,'emp_id'=>$id);
    $this->db->where($arr);
    $query= $this->db->get('delay_reason');
    if($query->num_rows()>0){
        return $query->row()->id;
    }
    else{
        return 0;
    }
}

    public function get_name($id)
    {
        $this->db->where('id',$id);
        $query= $this->db->get('employees');
        if($query->num_rows()>0){
           return $query->row()->employee;
        }
        else{
            return 0;
        }
    }
    public function get_days2($num,$id)
    {
        //$this->db->select('DISTINCT(num),emp_id,day_delay');
        $arr=array('num'=>$num,'emp_id'=>$id);

        $this->db->where($arr);
        $query=$this->db->get('delay_reason');

        return  $query->result();




    }


public function update_day_delay($num_day,$num,$emp_id)
{

    
    $date = $this->input->post('date2');
    $time = $this->input->post('time2');


    $this->db->where(array('num' => $num, 'emp_id' => $emp_id));
    $this->db->delete('delay_reason');
    $x = count($time);
    for ($i = 0; $i < $x; $i++) {
        $data['num'] = $num;
        $data['emp_id'] = $emp_id;
        $data['day'] = $date[$i];
        $data['time'] = $time[$i];
        $data['day_delay'] = $num_day;
         $data['reason'] = "اذكر السبب" ;
        $this->db->insert('delay_reason', $data);



}


}

/*
public function update_day_delay()
{

   
    $num= $this->input->post('num');
    $emp_id= $this->input->post('emp_id');
    $date=$this->input->post('date2');
    $time=$this->input->post('time2');
   
   
   echo $num .'br/>';
     echo $emp_id .'br/>';
       echo $date .'br/>';
         echo $time .'br/>';
         echo $this->input->post('day_num');
   
   
    print_r($time);
    return;

    $this->db->where(array('num'=>$num,'emp_id'=>$emp_id));
    $this->db->delete('delay_reason');
    $x=count($time);
    for($i=0; $i<$x; $i++) {
        $data['num']=$num;
        $data['emp_id']=$emp_id;
        $data['day']=$date[$i];
        $data['time']=$time[$i];
        $data['day_delay']=$this->input->post('day_num');
        $data['reason']="اسباب شخصيه";
        $this->db->insert('delay_reason',$data);

            
        
    }
}*/


public function update_day()
{
    $check=$this->input->post('check');
    $reason=$this->input->post('reason');
    $x=count($check);
    for($i=0; $i<$x;$i++){
        if($reason[$i]) {
            $data['reason'] = $reason[$i];
        }else{
            $data['reason'] = "لم يتم اضافه اسباب";
        }
        $this->db->where('id',$check[$i]);
        $this->db->update('delay_reason',$data);
    }

   
}

    
}