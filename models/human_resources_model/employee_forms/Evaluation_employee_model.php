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
        $evaluation_order_id= $this->db->insert_id();
        if(!empty($this->input->post('evaluate_id_fk')))
        {
    $count=count($this->input->post('evaluate_id_fk'));
            for($x=0; $x<$count;$x++)
            {
                $data2['evaluation_order_id']=$evaluation_order_id;
                $data2['emp_id_fk']=$this->input->post('emp_id_fk');
                $data2['evaluate_id_fk']=$this->input->post('evaluate_id_fk')[$x];
                $data2['max_degree']=$this->input->post('max_degree')[$x];
                $data2['emp_degree']=$this->input->post('emp_degree')[$x];
                $this->db->insert('hr_evaluation_employees_temporary_details',$data2);

            }

        }


    }



    public function update_data($id)
    {
        $data['emp_id_fk']=$this->input->post('emp_id_fk');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['total_degree']=$this->input->post('total_degree');
        $data['result_tagraba']=$this->input->post('result_tagraba');
        $data['taqdeer']=$this->input->post('taqdeer');
        $data['date']=date("Y-m-d");
        $data['date_s']=strtotime(date("Y-m-d"));
        $this->db->where('id',$id);
        $this->db->update('hr_evaluation_employees_temporary',$data);
        if(!empty($this->input->post('evaluate_id_fk')))
        {
            $count=count($this->input->post('evaluate_id_fk'));
            for($x=0; $x<$count;$x++)
            {
                $data2['emp_degree']=$this->input->post('emp_degree')[$x];
               $this->db->where('evaluation_order_id',$id);
                $this->db->where('emp_id_fk',$this->input->post('emp_id_fk'));
                $this->db->where('evaluate_id_fk',$this->input->post('evaluate_id_fk')[$x]);
                $this->db->update('hr_evaluation_employees_temporary_details',$data2);

            }

        }


    }

    public function get_all_evaluations()
    {
        $query=$this->db->get('hr_evaluation_employees_temporary');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->employee=$this->get_one_employee($row->emp_id_fk);
                $data[$x]->details = $this->get_one_employee_details($row->id,$row->emp_id_fk);
                $x++;

            }
            return $data;
        }
            return false;

    }

    public function get_one_evaluations($id,$emp_id)
    {

        $this->db->where('emp_id_fk',$emp_id);
        $this->db->where('id',$id);
        $query=$this->db->get('hr_evaluation_employees_temporary');
       
        if($query->num_rows()>0)
        {
                $data=$query->row();
                $data->employee=$this->get_one_employee($data->emp_id_fk);
                  $data->details = $this->get_one_employee_details($id,$emp_id);

            return $data;
        }
        return false;

    }
     public function get_one_employee_details($id,$emp_id)
        {
            $this->db->where('evaluation_order_id',$id);
            $this->db->where('emp_id_fk',$emp_id);
            $query=$this->db->get('hr_evaluation_employees_temporary_details');

            if($query->num_rows()>0)
            {
                $data=array();

                foreach ($query->result() as $row)
                {
                    $data[$row->evaluate_id_fk]=$row;



                }
                return $data;

            }
            return false;

        }


    public function get_one_employee($id){
        $this->db->select('hr_temporary_employment_qrars.* , 
                           admin_t.name as admin_name ,
                           depart_t.name as depart_name ,
                           all_defined_setting.defined_title as degree_name');
        $this->db->from("hr_temporary_employment_qrars");
        $this->db->join('department_jobs as admin_t', 'admin_t.id = hr_temporary_employment_qrars.edara_id_fk',"left");
        $this->db->join('department_jobs as depart_t', 'depart_t.id = hr_temporary_employment_qrars.qsm_id_fk',"left");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = hr_temporary_employment_qrars.job_title_id_fk',"left");
        $this->db->where("hr_temporary_employment_qrars.id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();

            return $data;
        }
        return false;
    }
    //-----------------------------------------------


    public function get_emp_name($id){
        $h = $this->db->get_where("hr_temporary_employment_qrars",array("id"=>$id));
        $data= $h->row_array();
        return $data["emp_name"];
    }


}