<?php
class Mandate_order_model extends CI_Model
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
    public function select_depart()
    {
        $this->db->select('*');
        $this->db->where('from_id_fk!=',0);
        $this->db->from('department_jobs');
        $query = $this->db->get();
        return $query->result();

    }
   /* public function get_last()
    {
        $this->db->order_by('id_setting','desc');
        $this->db->select('id_setting');

        $this->db->where('type',9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
        return $query->row()->id_setting;
    }*/
        public function get_last()
    {
        $this->db->order_by('id_setting','desc');
        $this->db->select('id_setting');
        $this->db->where('type',9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
          return $query->row()->id_setting;
        }else{
            return 0;
        }
        
    }

    public function insert_record($valu)
    {
        $data['title_setting']=$valu;
        $data['type']=9;
        $data['have_branch']=0;
        $this->db->insert('hr_forms_settings',$data);
    }
    public function get_data()
    {
        $data['emp_id_fk']=$this->input->post('emp_id_fk');
        $data['edara_id_fk']=$this->input->post('edara_id_fk');
        $data['qsm_id_fk']=$this->input->post('qsm_id_fk');
        $data['direct_manager_id_fk']=$this->input->post('direct_manager_id_fk');
        $data['job_title_id_fk']=$this->input->post('job_title');
        //========================
        $data['mandate_type_fk']=$this->input->post('mandate_type_fk');
        $data['mandate_direction']=$this->input->post('mandate_direction');
        $data['mandate_distance']=$this->input->post('mandate_distance');
        $data['mandate_purpose']=$this->input->post('mandate_purpose');
        $data['from_date']=$this->input->post('from_date');
        $data['to_date']=$this->input->post('to_date');
        $data['num_days']=$this->input->post('num_days');

        $data['bdal_count_method']=$this->input->post('bdal_count_method');
        $data['bdal_value']=$this->input->post('bdal_value');
        $data['bdal_total']=$this->input->post('bdal_total');
        $data['date']=$this->input->post('date');
        $data['date_s']=strtotime($data['date']);
        $data['publisher']=$_SESSION['user_name'];
           $data['job_title_id_fk']= $this->get_id('employees','id',$data['emp_id_fk'],'degree_id');

        return $data;
    }
    public function insert_order()
    {
        $data=$this->get_data();
       $this->db->insert('hr_mandate_orders',$data);
       // return $data;
    }

    public function get_last_id()
    {
        $this->db->order_by('id','desc');
        $this->db->select('id');


        $query=$this->db->get('hr_mandate_orders');
        if($query->num_rows()>0)
        {
           return  $query->row();
        }else{
            return 0;
        }
    }

    public function get_from_hr_mandate_orders()
    {
        $this->db->order_by('emp_id_fk','asc');
        $query=$this->db->get('hr_mandate_orders');
        $data=array();
        $x=0;
        foreach ($query->result() as $row)
        {
             $data[$x]=$row;
            $data[$x]->name=$this->get_name($row->emp_id_fk);
            $data[$x]->destination=$this->get_dest($row->mandate_direction);
            $data[$x]->times=$this->get_orders($row->emp_id_fk);
            $data[$x]->emp_code=$this->get_emp_code($row->emp_id_fk);
            $x++;
        }
        return $data;
    }

    public function get_name($emp)
    {
        $this->db->where('id',$emp);
        $query=$this->db->get('employees');
        if($query->num_rows()>0)
        {
           return $query->row()->employee;
        }else{
            return 0;
        }
    }
    public function get_dest($dest)
    {
       $this->db->where('id_setting',$dest);
        $query=$this->db->get('hr_forms_settings');

        if($query->num_rows()>0)
        {
        return $query->row()->title_setting;
        }else{
            return 0;
        }

    }
    public function get_by_id($id)
    {
        $this->db->where('id',$id);
       $query= $this->db->get('hr_mandate_orders');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
           foreach ($query->result() as $row)
           {
               $data[$x]=$row;
               $data[$x]->times=$this->get_orders($row->emp_id_fk);
               $data[$x]->emp_code=$this->get_emp_code($row->emp_id_fk);
               $data[$x]->job_title = $this->get_id('all_defined_setting','defined_id',$row->job_title_id_fk,'defined_title');
               $data[$x]->emp_name = $this->get_id('employees','id',$row->emp_id_fk,'employee');
               $data[$x]->qsm_name = $this->get_id('department_jobs','id',$row->qsm_id_fk,'name');
               $data[$x]->edara_name = $this->get_id('department_jobs','id',$row->edara_id_fk,'name');
               return $data[0];
           }
        }else{
            return 0;
        }
    }
    
    
    	
	 public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
    public function get_emp_code($emp)
    {
        $this->db->where('id',$emp);
        $query=$this->db->get('employees');
        if($query->num_rows()>0)
        {
            return $query->row()->emp_code;
        }else{
            return 0;
        }
    }
    public function get_orders($id)
    {
        $this->db->where('emp_id_fk',$id);
        $query=$this->db->get('hr_mandate_orders');
        return $query->num_rows();

    }
    public function edit_order($id)
    {
        $data=$this->get_data();
        $this->db->where('id',$id);
        $this->db->update('hr_mandate_orders',$data);
    }

    public function delete_mandate_order($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('hr_mandate_orders');
    }
    
  /***************************************************/
  
    
    public function get_all_emp()
    {

        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                $q[$key]->job_title = $this->get_job_title($row->degree_id);
                $q[$key]->direct_manager_id_fk= $this->get_direct_manager_name_by_emp_id($row->id);
                $q[$key]->direct_manager_job_title_fk= $this->get_job_title($row->id);
                $q[$key]->times= $this->get_by_id($row->id);
                
                

               

            }
            return $q;
        }
    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {

        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }
    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.employee as manager_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_name;
        } else {
            return false;
        }
    }  
    
    
    
    
    
}