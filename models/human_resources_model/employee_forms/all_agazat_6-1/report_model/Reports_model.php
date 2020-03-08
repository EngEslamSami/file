<?php /**
 *
 */
class Reports_model extends CI_Model
{

  function __construct()
  {
      parent::__construct();
  }

  public function get_all_emp($id)
  {
      $this->db->where_not_in('id',$id);
      $q = $this->db->get('employees')->result();
      if (!empty($q)) {
          foreach ($q as $key => $row) {
              // $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
              // $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
              // $q[$key]->job_title = $this->get_job_title($row->degree_id);
          }
          return $q;
      }
  }

  public function get_vacation_search($emp_id_fk,$agza_to,$agza_from)
  {
      $this->db->select('hr_all_agzat_orders.*, employees.employee');
      if (!empty($emp_id_fk)) {
        if ($emp_id_fk != 'all') {
          $this->db->where('hr_all_agzat_orders.emp_id_fk', $emp_id_fk);
        }
      }

      if ((!empty($agza_from))&&(!empty($agza_to))) {
        $this->db->group_start();

        $this->db->group_start();
          $this->db->where('hr_all_agzat_orders.agaza_from_date >=', strtotime($agza_from));
          $this->db->where('hr_all_agzat_orders.agaza_from_date <=', strtotime($agza_to));
          $this->db->group_end();

        $this->db->or_group_start();
          $this->db->where('hr_all_agzat_orders.agaza_to_date >=', strtotime($agza_from));
          $this->db->where('hr_all_agzat_orders.agaza_to_date <=', strtotime($agza_to));
          $this->db->group_end();
          $this->db->group_end();
      }
      $this->db->join('employees', 'employees.id=hr_all_agzat_orders.emp_id_fk');
      $this->db->order_by("hr_all_agzat_orders.id", "DESC");


      $query = $this->db->get('hr_all_agzat_orders');
      // print_r($query);
      // return $query;
      $data = array();
      $x = 0;
      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[$x] = $row;
              $data[$x]->name = $this->holiday($row->no3_agaza);
              $x++;
          }
          return $data;
      } else {
          return false;
      }
  }
  public function holiday($id)
  {

      $this->db->where('id', $id);
      $query= $this->db->get('holiday_setting');
      if($query->num_rows()>0)
      {
          return $query->row();
      }else{
          return 'غير محدد';
      }
  }

}
 ?>
