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
          return $q;

  }

  public function get_ozonat_search($emp_id_fk,$agza_to,$agza_from)
  {
      $this->db->select('hr_all_ozonat_orders.*, employees.employee');
      if (!empty($emp_id_fk)) {
        if ($emp_id_fk != 'all') {
          $this->db->where('hr_all_ozonat_orders.emp_id_fk', $emp_id_fk);
        }
      }
      if ((!empty($agza_from))&&(!empty($agza_to))) {
        $this->db->group_start();
          $this->db->where('hr_all_ozonat_orders.ezn_date >=', strtotime($agza_from));
          $this->db->where('hr_all_ozonat_orders.ezn_date <=', strtotime($agza_to));
          $this->db->group_end();
      }
      $this->db->join('employees', 'employees.id=hr_all_ozonat_orders.emp_id_fk');
      $this->db->order_by("hr_all_ozonat_orders.id", "DESC");


      $query = $this->db->get('hr_all_ozonat_orders');
      // print_r($query);
      // return $query;
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return false;
      }
  }


}
 ?>
