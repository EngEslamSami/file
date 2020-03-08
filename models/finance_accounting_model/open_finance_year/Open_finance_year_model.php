<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 29/12/2018
 * Time: 09:40 ص
 */

class Open_finance_year_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function insert()
    {

        $data['year'] = $this->input->post('year');
        $data['from_date_ar'] = $this->input->post('from_date');
        $data['to_date_ar'] = $this->input->post('to_date');
        $data['from_date'] = strtotime($this->input->post('from_date'));
        $data['to_date'] = strtotime($this->input->post('to_date'));
        $data['date'] = strtotime(date('Y-m-d'));
        $data['publisher'] = $_SESSION['user_id'];
        $data['closed'] = 0;
        $this->db->insert('financy_year_setting', $data);


    }

    public function select_all()
    {

        return $this->db->order_by('id', 'DESC')->get('financy_year_setting')->result();
    }

    public function select_last_row()
    {
        $last = $this->db->order_by('id', "desc")
            ->limit(1)
            ->get('financy_year_setting');
           if($last->num_rows() > 0){

               return $last ->row()->closed;
           }else{

               return 1;
           }
//
    }

    public function update()
    {

        $id = $this->input->post('id');
        $data['year'] = $this->input->post('year_up');
        $data['from_date_ar'] = $this->input->post('from_date_up');
        $data['to_date_ar'] = $this->input->post('to_date_up');
        $data['from_date'] = strtotime($this->input->post('from_date_up'));
        $data['to_date'] = strtotime($this->input->post('to_date_up'));
        $this->db->where('id', $id)->update('financy_year_setting', $data);
    }
public function delete($id){
    $this->db->where('id', $id)->delete('financy_year_setting');

}
}