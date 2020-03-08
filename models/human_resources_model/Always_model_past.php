<?php
class Always_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function all_always()
    {
        $this->db->select('*');
        $this->db->from('always_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
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