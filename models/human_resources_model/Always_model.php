<?php
class Always_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    public function all_always()
{

    $status_array = array('ÛíÑ äÔØ', 'äÔØ');//2-2-om
    $this->db->select('*');
    $this->db->from('always_setting');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $query = $query->result();
        foreach ($query as $key => $row) {
            
              ///new
            if ( $row->status==1) {
                $query[$key]->season_frq = $this->get_season_frq()->season_frq;
                }
                else{
                    $query[$key]->season_frq =0;
                }
                ///new
            if (!empty($this->get_season_status($row->season_num))) {
                $query[$key]->season_name = $this->get_season_status($row->season_num)->season_name;
                $query[$key]->season_status = $status_array[$this->get_season_status($row->season_num)->season_status];
            } else {
                $query[$key]->season_name = 'ÛíÑ ãÍÏÏ';
                $query[$key]->season_status = 'ÛíÑ ãÍÏÏ';

            }
        }
        return $query;
    }
    return false;
}


    public function get_season_frq()
    {
        //->season_frq
        $q = $this->db->where('status', 1)->get('hr_season_time')->row();
        if (!empty($q)) {
            return $q;
        } else return '';
    }
/*
    public function all_always()
    {
        $this->db->select('*');
        $this->db->from('always_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query= $query->result();
            foreach ($query as $key=>$row){
                $query[$key]->season_name=$this->get_season_status($row->season_num)->season_name;
            }
//

            return $query;
        }
        return false;
    }*/
    
    
    
    
    
    public function get_season_status($id)
    {
        $q = $this->db->where('id', $id)->get('hr_season_time')->row();
        if (!empty($q)) {
            return $q;
        } else return '';
    }

    public function insert_always()
    {
        //$data = $this->input->post('data');
        $data['name']=$this->input->post('name');
        $data['attend_time']=$this->input->post('attend_time');
        $data['leave_time']=$this->input->post('leave_time');
        $data['color']=$this->input->post('color');
        $data['late_min']=$this->input->post('late_min');
        $data['leave_early_min']=$this->input->post('leave_early_min');
        $data['start_enter']=$this->input->post('start_enter');
        $data['end_enter']=$this->input->post('end_enter');
        $data['start_out']=$this->input->post('start_out');
        $data['end_out']=$this->input->post('end_out');
        $data['account_day_work']=$this->input->post('account_day_work');
        $data['account_time_work']=$this->input->post('account_time_work');

        $data['status'] = $this->input->post('status');
        $status_array = array(' áÇ', 'äÚã');
 $data['status_name'] = $status_array[$data['status']];
 
        $data['season_num'] = $this->input->post('season_name');//2-2-om
        $data['season_status'] = $this->get_season_status($data['season_num'])->status;//2-2-om


        $this->db->insert('always_setting', $data);
    }

    public function update_always($id)
    {
        $data['name']=$this->input->post('name');
        $data['attend_time']=$this->input->post('attend_time');
        $data['leave_time']=$this->input->post('leave_time');
        $data['color']=$this->input->post('color');
        $data['late_min']=$this->input->post('late_min');
        $data['leave_early_min']=$this->input->post('leave_early_min');
        $data['start_enter']=$this->input->post('start_enter');
        $data['end_enter']=$this->input->post('end_enter');
        $data['start_out']=$this->input->post('start_out');
        $data['end_out']=$this->input->post('end_out');
        $data['account_day_work']=$this->input->post('account_day_work');
        $data['account_time_work']=$this->input->post('account_time_work');

        $data['status'] = $this->input->post('status');
        $status_array = array(' áÇ', 'äÚã');
        $data['status_name'] = $status_array[$data['status']];


        $data['season_num'] = $this->input->post('season_name');//2-2-om
        $data['season_status'] = $this->get_season_status($data['season_num'])->status;//2-2-om

        $this->db->where('id',$id);
        $this->db->update('always_setting',$data);
    }


    public function getById_always($id)
    {
        $this->db->where('id',$id);
       $query =  $this->db->get('always_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;


    }


    public function delete_always($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('always_setting');
    }
}