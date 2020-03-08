<?php
class Evaluation_employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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


    public function get_all_emp()
    {
       return $this->db->get('hr_temporary_employment_qrars')->result();
    }
    public function get_all_setting()
    {
        $this->db->where('from_id',0);
        $query=$this->db->get('hr_evaluation_setting');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
       foreach ($query->result() as $row)
       {
           $data[$x]=$row;
           $data[$x]->branch=$this->get_from($row->id);
           $x++;

       }
            return $data;
        } else{
        return 0;
    }
    }
    public function get_from($id)
    {
        $this->db->where('from_id',$id);
        $query=$this->db->get('hr_evaluation_setting');
        if($query->num_rows()>0)
        {
          return $query->result();
        }else{
            return 0;
        }

    }
    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('hr_temporary_employment_qrars');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return 0;
        }

    }

    public function insert_data()
    {
        $data['emp_id_fk']=$this->input->post('emp_id_fk');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['total_degree']=$this->input->post('total_degree');
        $data['result_tagraba']=$this->input->post('result_tagraba');
        $data['taqdeer']=$this->input->post('taqdeer');
        $data['date']=date("Y-m-d");
         $data['date_s']=strtotime(date("Y-m-d"));
         $this->db->insert('hr_evaluation_employees_temporary',$data);
        if(!empty($this->input->post('evaluate_id_fk')))
        {
    $count=count($this->input->post('evaluate_id_fk'));
            for($x=0; $x<$count;$x++)
            {
                $data2['emp_id_fk']=$this->input->post('emp_id_fk');
                $data2['evaluate_id_fk']=$this->input->post('evaluate_id_fk')[$x];
                $data2['max_degree']=$this->input->post('max_degree')[$x];
                $data2['emp_degree']=$this->input->post('emp_degree')[$x];
                $this->db->insert('hr_evaluation_employees_temporary_details',$data2);

            }

        }
        
        
        
    }

}