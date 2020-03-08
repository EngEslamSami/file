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

  public function get_solaf_search($emp_id_fk,$agza_to,$agza_from)
  {
      $this->db->select('hr_solaf.*, employees.employee');
      if (!empty($emp_id_fk)) {
        if ($emp_id_fk != 'all') {
          $this->db->where('hr_solaf.emp_id_fk', $emp_id_fk);
        }
      }
      if ((!empty($agza_from))&&(!empty($agza_to))) {
        $this->db->group_start();
          $this->db->where('hr_solaf.t_rkm_date_m >=', $agza_from);
          $this->db->where('hr_solaf.t_rkm_date_m <=', $agza_to);
          $this->db->group_end();
      }
      $this->db->join('employees', 'employees.id=hr_solaf.emp_id_fk');
      $this->db->order_by("hr_solaf.id", "DESC");


      $query = $this->db->get('hr_solaf');
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
