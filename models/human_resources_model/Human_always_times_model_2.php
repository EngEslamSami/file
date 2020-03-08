<?php
class Human_always_times_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }


 public function GetHours($test){
     $t = date('H:i',strtotime($test));
     return $t;

 }

    public function insert()
    {

        $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
        $data['always_id_fk'] = $this->input->post('always_id_fk');
        $data['period_id_fk'] = $this->input->post('period_id_fk');
        $data['period_from'] = $this->GetHours($this->input->post('period_from'));
        $data['period_to'] =$this->GetHours( $this->input->post('period_to'));
        $data['attend_from'] = $this->GetHours($this->input->post('attend_from'));
        $data['attend_to'] = $this->GetHours($this->input->post('attend_to'));
        $data['leave_from'] = $this->GetHours($this->input->post('leave_from'));
        $data['leave_to'] = $this->GetHours($this->input->post('leave_to'));

        $days =explode(',',$this->input->post('days'));

           foreach ($days as $day){

            if(in_array($day,$days_en)){

                $data[$day] = 1;
            }

           }
       $this->db->insert('human_always_times', $data);
    }

    public function update()
    {
        $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
        $data['always_id_fk'] = $this->input->post('always_id_fk');
        $data['period_id_fk'] = $this->input->post('period_id_fk');
        $data['period_from'] = $this->GetHours($this->input->post('period_from'));
        $data['period_to'] =$this->GetHours( $this->input->post('period_to'));
        $data['attend_from'] = $this->GetHours($this->input->post('attend_from'));
        $data['attend_to'] = $this->GetHours($this->input->post('attend_to'));
        $data['leave_from'] = $this->GetHours($this->input->post('leave_from'));
        $data['leave_to'] = $this->GetHours($this->input->post('leave_to'));

        foreach ($days_en as $name){
            $data[$name] =0;
        }
        $days =explode(',',$this->input->post('days'));
        foreach ($days as $day){

            if(in_array($day,$days_en)){
                $data[$day] = 1;
            }

        }
        
        $this->db->where_in("id",$this->input->post('id'));
        $this->db->update("human_always_times",$data);

    }



    public function select_all(){
        $this->db->select('human_always_times.*,always_setting.id as always_setting_id ,always_setting.name');
        $this->db->from("human_always_times");
        $this->db->join('always_setting', 'always_setting.id = human_always_times.always_id_fk','left');
        $this->db->group_by('period_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->period_num = $this->get_period_num($row->always_id_fk);
                $x++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function get_period_num($always_id_fk){
        $this->db->select('*');
        $this->db->from("human_always_times");
        $this->db->where("always_id_fk",$always_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }

    }



    public function delete($id){
        $this->db->where('always_id_fk',$id);
        $this->db->delete("human_always_times");
    }



    public function getById($id){
        $this->db->select('*');
        $this->db->where(array('always_id_fk'=>$id));
        $query = $this->db->get('human_always_times');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                   }
            return $data;
        }else{
            return 0;
        }
    }

}