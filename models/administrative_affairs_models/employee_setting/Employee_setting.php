<?php
class Employee_setting extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }


    public function insert_badlat()
    {
        $percent = $this->input->post('precent');
        $minum = $this->input->post('minum');

        $names = array('بدل سكن', 'بدل مواصلات', 'بدل طبيعه عمل', 'بدل غلاء معيشه', 'بدل اخري');
        for ($i = 0; $i < 5; $i++) {
            $data['id'] = ($i+1);
            $data['percent'] = $percent[$i];
            $data['mininum'] = $minum[$i];
            $data['title'] = $names[$i];
            $this->db->insert('badlat_percent_setting', $data);

        }


    }

    public function select_all_badlat()
    {
      $query = $this->db->query('SELECT * from badlat_percent_setting');
      return ($query->result())? $query->result() : null;
    }


    public function select_time_work()
    {
      $query = $this->db->query('SELECT * from time_work_setting');
      return ($query->row())? $query->row() : null;
    }

    public function select_ozonat_num()
    {
      $query = $this->db->query('SELECT * from ozonat_num_setting');
      return ($query->row())? $query->row() : null;
    }



    public function add_time_work()
    {
        $data['id'] = 1;
        $data['from'] = $this->input->post('from');
        $data['to'] = $this->input->post('to');

        $this->db->insert('time_work_setting', $data);
    }


    public function add_ozon()
    {
        $data['id'] = 1;
        $data['ozon_num_day'] = $this->input->post('ozon_num_day');
        $data['ozon_num_month'] = $this->input->post('ozon_num_month');

        $this->db->insert('ozonat_num_setting', $data);
    }


    public function delete_badlat()
    {

        return $this->db->empty_table('badlat_percent_setting');
    }


    public function delete_timeWork()
    {

        return $this->db->empty_table('time_work_setting');
    }

    public function delete_ozon()
    {

        return $this->db->empty_table('ozonat_num_setting');
    }
}
