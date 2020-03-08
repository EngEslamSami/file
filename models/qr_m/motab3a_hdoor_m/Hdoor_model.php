
<?php
class Hdoor_model extends CI_Model
{
    public function get_hdoor_day($arr)
    {
        $this->db->order_by('id','desc');
       //$this->db->where($arr);
        $query=$this->db->get('hr_hdoor_ensraf');
        $data=array();
       $x=0;
        if($query->num_rows()>0)
        {
            //return $query->result();
            foreach ($query->result() as $row)
            {
               $data[$x]=$row;

                $data[$x]->name = $this->get_details('card_num', $row->emp_national_num, 'employees', 'employee');
                $administration_id=$this->get_details('card_num', $row->emp_national_num, 'employees', 'administration');
               $department_id=$this->get_details('card_num', $row->emp_national_num, 'employees', 'department');

                $data[$x]->department = $this->get_details('defined_id', $department_id, 'all_defined_setting', 'defined_title');
                $data[$x]->adminstration = $this->get_details('id', $administration_id, 'department_jobs', 'name');
               $data[$x]->dwam = $this->get_details('id', $row->dawam_fk, 'always_setting', 'name');
            
                $x++;
            }
            return $data;
        }else{
            return false;
        }


    }



    public function get_details($field, $value, $table, $return_field)
    {
        $this->db->where($field, $value);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row()->$return_field;
        } else {
            return false;
        }
    }

}