<?php
class Employe_model_tamouh extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
      private  function  check_box($ckeched){
        if($this->input->post($ckeched)){
            return 1;
        }
        return 0;
    }
    
    
    public function select_by(){
        $this->db->select('*');
        $this->db->from('hr_tamouh_department_jobs');
        $this->db->where('id !=',9);
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
        public function select_data(){
        $this->db->select('*');
        $this->db->from('hr_tamouh_department_jobs');
       // $this->db->where('id !=',9);
        $this->db->where('status',0)->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_branch_department()    {
        $this->db->where('status',1)->where('from_id_fk !=',0);
        return $this->db->get('hr_tamouh_department_jobs')->result();
    }
    
    public function select_last_code(){
    $this->db->select('*');
    $this->db->from("employees");
    $this->db->where("emp_type",2);
    $this->db->order_by("id","DESC");
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data = $row->emp_code;
        }
        return $data;
    }
    return 0;
}
    public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('hr_tamouh_department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `hr_tamouh_department_jobs` WHERE `from_id_fk`=' . $row->from_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
//=============================================================================================================
    public function select_allEmployee()
    {
        
  
        $this->db->order_by("id", "asc");
        $query= $this->db->where('emp_type',2)->get('employees')->result();
        $data=array();
        $x=0;
        foreach ($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->nationality=$this->get_from_employee_setting($row->nationality);
            $data[$x]->deyana=$this->get_from_employee_setting($row->deyana);
            $data[$x]->type_card=$this->get_from_employee_setting($row->type_card);
            $data[$x]->dest_card=$this->get_from_employee_setting($row->dest_card);
            $data[$x]->degree_science=$this->get_from_employee_setting($row->degree_id);
            $data[$x]->employee_qualification=$this->get_from_employee_setting($row->employee_qualification);
            $data[$x]->management=$this->get_from_department_job($row->administration);
            $data[$x]->part=$this->get_from_department_job($row->department);
            $data[$x]->job_role=$this->all_defined_setting($row->degree_id);
            $data[$x]->contract=$this->prog_main_sitting($row->contract);
            $data[$x]->company=$this->get_from_employee_setting($row->tamin_company);
            $data[$x]->tamin_type=$this->get_from_employee_setting($row->tamin_type);
            // $data[$x]->money_data=$this->getAllData($row->emp_code);
            $data[$x]->contract_employee=$this->get_contract_employee($row->id)[0];
            $data[$x]->dawam_employee=$this->get_period_emp_details($row->id)[0];
            $data[$x]->attach_files=$this->get_attach_files($row->id);
            $data[$x]->emp_custody=$this->emp_custody($row->id);
            $data[$x]->finance=$this->get_finance_employee($row->id)[0];
            //$data[$x]->badalat=$this->get_badalat($row->emp_code);
            $data[$x]->basic_badalat=$this->get_basic_badalat($row->id,1);
            $data[$x]->cut_emp=$this->get_basic_badalat($row->id,2);
            $data[$x]->banks=$this->get_banks($row->id,2);
            $x++;
        }
        return $data;
    }
    public function get_one_employee($id){
        $this->db->select('employees.* , 
                           admin_t.name as admin_name ,
                           depart_t.name as depart_name ,
                           degree.name as degree_name');
        $this->db->from("employees");
        $this->db->join('hr_tamouh_department_jobs as admin_t', 'admin_t.id = employees.administration',"left");
        $this->db->join('hr_tamouh_department_jobs as depart_t', 'depart_t.id = employees.department',"left");
        $this->db->join('hr_tamouh_department_jobs  as degree ', 'degree.id =employees.degree_id',"left");
        $this->db->where("employees.id",$id);
        $this->db->where("employees.emp_type",2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $x = 0;
            foreach ($query->result() as $row) {
               $data[$x]->manger_name = $this->get_emp_name($row->manger);
               $data[$x]->having_all_value = $this->get_emp_money($row->manger)["having_all_value"];
               $data[$x]->discut_all_value = $this->get_emp_money($row->manger)["discut_all_value"];
               
                 $data[$x]->sum_all_esthqaq = $this->select_from_emp_badlat_discount_details($row->id,1);
                 $data[$x]->sum_all_estqta3 = $this->select_from_emp_badlat_discount_details($row->id,2);
                // $data[$x]->sum_all_estqta3 = $this->select_from_emp_badlat_discount_details($row->manger)["discut_all_value"];
                  $data[$x]->order = $this->get_orders($id);
                $x++;
            }
            return $data;
        }
        return false;
    }
    //-----------------------------------------------
    
    
    public function get_emp_name($id){
        $h = $this->db->get_where("employees",array("id"=>$id));
        $data= $h->row_array();
        return $data["employee"];
    }
    
      
    public function select_from_emp_badlat_discount_details($id,$type)
{
    $this->db->select('*');
    $this->db->where('badl_type ',$type);
     $this->db->where('emp_code ',$id);  
    $query = $this->db->get('emp_badlat_discount_details');
    if ($query->num_rows() > 0) {
          $data =0;
        foreach ($query->result() as $row) {
            $data += $row->value;
        }
        return $data;
    }
    return 0;
}
    
    
    
    
    //-----------------------------------------------
    public function get_emp_money($id){
        $h = $this->db->get_where("finance_employes",array("id"=>$id));
        $data= $h->row_array();
        return $data;
    }
    //-----------------------------------------------
    public function get_basic_badalat($emp_code,$type)
    {
        $this->db->where('type',$type);
        $query=$this->db->get('emp_badlat_discount_settings');
        $data=array();
        $x=0;
        foreach($query->result() as $row)
        {
            $data[$x]=$row;
            $data[$x]->value=$this->basic_emp_badlat_discount_details($emp_code,$row->id);
            $x++;
        };
        return $data;
    }
    public function basic_emp_badlat_discount_details($emp_code,$id)
    {
        //$this->db->where('id',$badl);
        $arr=array('emp_code'=>$emp_code,'badl_discount_id_fk'=>$id);
        $this->db->where($arr);
        $query=$this->db->get('emp_badlat_discount_details');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        else{
            return 0;
        }
    }
    public function get_banks($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('bank_employes_details');
        $data=array();
        $x=0;
        foreach($query->result() as $row)
        {
            $data[$x]=$row;
            $data[$x]->bank=$this->get_from_banks_settings($row->bank_id_fk);
            $x++;
        };
        return $data;
    }
    public function get_badalat($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('emp_badlat_discount_details');
        $data=array();
        $x=0;
        foreach($query->result() as $row)
        {
            $data[$x]=$row;
            $data[$x]->badl=$this->emp_badlat_discount_settings($row->badl_discount_id_fk);
            $x++;
        };
        return $data;
    }
    public function emp_badlat_discount_settings($badl)
    {
        $this->db->where('id',$badl);
        $query=$this->db->get('emp_badlat_discount_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->title;
        }
        else{
            return 0;
        }
    }
    public function get_finance_employee($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('finance_employes');
        $data=array();
        $x=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->markz = $this->get_from_employee_setting($row->markz);
//                $data[$x]->type_salary = $this->get_from_employee_setting($row->salary_type);
                $x++;
            };
            return $data;
        }else{
            return false;
        }
    }
    public function emp_custody($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('emp_custody');
        $data=array();
        $x=0;
        foreach($query->result() as $row)
        {
            $data[$x]=$row;
            $data[$x]->product=$this->get_product($row->custody_id_fk);
            $x++;
        };
        return $data;
    }
    public function get_product($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('products');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        }
        else{
            return 0;
        }
    }
    public function get_attach_files($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('emp_files');
        return $query->result();
    }
    public function get_period_emp_details($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('period_emp_details');
        $data=array();
        $x=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->device_name=$this->get_from_employee_setting($row->device_id_fk);
                $data[$x]->peroid=$this->get_always_setting($row->period_id_fk);
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function get_always_setting($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('always_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        }else{
            return 0;
        }
    }
    public function get_from_banks_settings($bank_id)
    {
        $this->db->where('id',$bank_id);
        $query=$this->db->get('banks_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->ar_name;
        }else{
            return 0;
        }
    }
    public function get_contract_employee($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('contract_employe');
        $data=array();
        $x=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->bank_name=$this->get_from_banks_settings($row->bank_id_fk);
                $data[$x]->ticket_travel=$this->get_from_employee_setting($row->travel_type_fk);
                //  $data[$x]->ramz_bank=$this->get_from_banks_settings($row->bank_code)->bank_code;
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function getAllData($emp_code)
    {
        $query = $this->db->where('emp_code',$emp_code)->get('finance_employes');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->badlat = $this->getEmpBadalat($emp_code);
                $data[$i]->Banks = $this->getEmpBank($emp_code);
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function getEmpBadalat($emp_code)
    {
        $query = $this->db->where('emp_code',$emp_code)->get('emp_badlat_discount_details');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->badl_discount_id_fk] = $row;
            }
            return $data;
        }
        return false;
    }
    public function getEmpBank($emp_code)
    {
        return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
            ->join('banks_settings','banks_settings.id=bank_employes_details.bank_id_fk')
            ->where('emp_code',$emp_code)
            ->get('bank_employes_details')
            ->result();
    }
    public function prog_main_sitting($id)
    {
        $this->db->select('title');
        $this->db->from('prog_main_sitting');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->title;
        }else{
            return 0;
        }
    }
    public function  all_defined_setting($id)
    {
        $this->db->select('defined_title');
        $this->db->from('all_defined_setting');
        $this->db->where('defined_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        }else{
            return 0;
        }
    }
    public function get_from_department_job($id)
    {
        $this->db->select('name');
        $this->db->from('hr_tamouh_department_jobs');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        }else{
            return 0;
        }
    }
    public function get_from_employee_setting($id)
    {
        $this->db->select('title_setting');
        $this->db->from('employees_settings');
        $this->db->where('id_setting',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        }else{
            return 0;
        }
    }
    //==========================================================================================================
    /*
        public function select_allEmployee()
        {
            return $this->db->get('employees')->result();
        }*/
    public function select_employ_(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }
    public function select_employ_name(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }
    public function select_employ_by_dep(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$row->administration);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->administration]=$arr;
            }
            return $data;
        }
        return false;
    }
    public function all_emp_details()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->employees_total_rewards = $this->get_emp_rewards_month($p_cat->id);
            $categories[$i]->employees_total_penalty = $this->get_emp_penalty_month($p_cat->id);
            $i++;
        }
        return $categories;
    }
    public function get_emp_rewards_month($emp_id)
    {
        $this->db->select('*');
        $this->db->from('mon_rewards');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    public function get_emp_penalty_month($emp_id)
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('penalty_type',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    public function select_depart_name()
    {
        $this->db->select('*');
        $this->db->from('hr_tamouh_department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `hr_tamouh_department_jobs` WHERE `id`=' . $row->id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->id] = $arr;
            }
            return $data;
        }
        return false;
    }
    public function select_depart_sub()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }
    public function select_emp_assigned($dep,$id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('administration',$dep);
        $this->db->where('id !=',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function update_deport_employee($array_ids)
    {
        $data['deport_month']=date("m",time());
        $data['deport_year']=date("Y",time());
        $this->db->where_in("id",$array_ids);
        $this->db->update("employees",$data);
    }
    public function update_deport_emp_adds($table,$array_ids)
    {
        $data['deport']=1;
        $this->db->where_in("emp_id",$array_ids);
        $this->db->update($table,$data);
    }
    public function insert_deport_employee_salaries($process)
    {
        $data['p_cost']=$this->input->post("value");
        $data['madeen']=$this->input->post("madeen");
        $data['dayen']=$this->input->post("dayen");
        $data['paid_type']=0;
        $data['process']=$process;
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['pill_num']=time();
        $data['publisher']=$_SESSION['user_username'];
        $this->db->insert("all_deports",$data);
    }
    public function underot_emp_salaries()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('deport_month !=',date("m",time()));
        $this->db->where('deport_year !=',date("Y",time()));
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->employees_total_rewards = $this->get_emp_rewards_month($p_cat->id);
            $categories[$i]->employees_total_penalty = $this->get_emp_penalty_month($p_cat->id);
            $i++;
        }
        return $categories;
    }
    //=========================================
    public function get_emp_allowances_deduction_setting($id,$type){
        $this->db->select('emp_allowances ,emp_deduction');
        $this->db->from('employees');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->row_array();
            $ser_arr=unserialize($data[$type]);
            $data_return= array()  ;
            //$data_return=(object) $data_return;
            $i=0;
            foreach($ser_arr as $key=>$value){
                $data_return[$i]["defined_id"]=$key;
                $data_return[$i]['value']=$value;
                $data_return[$i]["defined_title"]=$this->get_setting_name($key);
                $i++;
            }
            return $data_return ;
        }
    }
    //=========================================
    public function get_setting_name($id){
        $h = $this->db->get_where("all_defined_setting",array("defined_id"=>$id));
        return $h->row_array()["defined_title"];
    }
    public function get_dep_name($id){
        $h = $this->db->get_where("hr_tamouh_department_jobs",array("id"=>$id));
        return $h->row_array()["name"];
    }
    /**************************************************/
    /*
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $row){
            $categories[$i] = $row;
            $categories[$i]->all_penalty = $this->get_all_penalty($row->id);
            $categories[$i]->all_rewards = $this->get_all_rewards($row->id);
            $i++;
        }
        return $categories;
    }
    */
    /*
    public function get_all_penalty($id){
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where('emp_id',$id);
        $this->db->where('penalty_type',8);
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data  +=$row->value;
            }
            return$data;
        }else{
            return 0;
        }
    }*/
    public function get_all_rewards($id){
        $this->db->select('*');
        $this->db->from('mon_rewards');
        $this->db->where('emp_id',$id);
        $this->db->where('type',14);
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data  +=$row->value;
            }
            return$data;
        }else{
            return 0;
        }
    }
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $row){
            $categories[$i] = $row;
            foreach ($this->select_all_prog_main_sitting()as $k=>$v){
                $categories[$i]->penalty[$v] = $this->get_all_penalty(array('emp_id'=>$row->id,'penalty_type'=>$v));
            }
            $categories[$i]->all_rewards = $this->get_all_rewards($row->id);
            $i++;
        }
        return $categories;
    }
    public function get_all_penalty($arr){
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where($arr);
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data  +=$row->value;
            }
            return$data;
        }else{
            return 0;
        }
    }
    public function select_all_prog_main_sitting(){
        $this->db->select('*');
        $this->db->from('prog_main_sitting');
        $this->db->where('type',3);
        $this->db->where('cash',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[]=$row->id;
            }
            return$data;
        }else{
            return 0;
        }
    }
    /********************************************************/
    public function all_emp_salary($where=false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if($where != false) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach($query->result() as $row){
                $data[$i] = $row;
                /*
                  foreach ($this->discount_types() as $value){
                    $data[$i]->discount[$value] = $this->get_discount_salary_operations(array('emp_id'=>$row->id,'discount_id_fk'=>$value));
               $data[$i]->sssssss[$value] = $this->get_discount_salary_operations(array('emp_id'=>$row->id));
                }*/
                $data[$i]->discount_typesss = $this->get_discount_salary_operations_new___2(array('emp_id'=>$row->id));
                $data[$i]->employees_total_rewards = $this->get_emp_rewards_month($row->id);
                $data[$i]->employees_total_penalty = $this->get_emp_penalty_month_new($row->id);
                $data[$i]->sum_first_discount = $this->get_sum_first_discount($row->id);
                $i++;
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function all_emp_salary_male($where=false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if($where != false) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach($query->result() as $row){
                $data[$i] = $row;
                $data[$i]->discount_typesss = $this->get_discount_salary_operations_new___2(array('emp_id'=>$row->id));
                $data[$i]->employees_total_rewards = $this->get_emp_rewards_month($row->id);
                $data[$i]->employees_total_penalty = $this->get_emp_penalty_month_new($row->id);
                $data[$i]->sum_first_discount = $this->get_sum_first_discount($row->id);
                $i++;
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function get_discount_salary_operations_new___2($arr){
        $this->db->select('*');
        $this->db->from('discount_salary_operations');
        $this->db->order_by('id','asc');
        $this->db->where($arr);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('deport',0);
        //$this->db->order('deport',0);
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data =$row->discount_id_fk;
            }
            return$data;
        }else{
            return 0;
        }
    }
    public function get_discount_salary_operations($arr){
        $this->db->select('*');
        $this->db->from('discount_salary_operations');
        $this->db->where($arr);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('deport',0);
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data  +=$row->value;
            }
            return$data;
        }else{
            return 0;
        }
    }
    public  function  discount_types(){
        $this->db->select('*');
        // $this->db->from('discount_salary');
        $this->db->from('discount_salary_operations');
        //  $this->db->group_by('emp_id');
        //  $this->db->order_by('discount_id_fk','asc');
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('deport',0);
        $this->db->where('emp_id',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[]=$row->id;
            }
            return $data;
        }else{
            return 0;
        }
    }
    public function get_emp_penalty_month_new($emp_id)
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        //  $this->db->where('penalty_type',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    public function get_sum_first_discount($emp_id)
    {
        $this->db->select('*');
        $this->db->from('discount_salary_operations');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('discount_id_fk',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    public function insert_emp($img_file)
    {
        echo($img_file);
        $code=$this->input->post('emp_code');
        $data['employee']=$this->input->post('name');
        $data['emp_code']=$this->input->post('emp_code');
        $data['card_num']=$this->input->post('card_num');
        $data['phone']=$this->input->post('phone');
        $data['gender']=$this->input->post('gender');
        $data['bank_num']=$this->input->post('bank_num');
        $data['bank']=$this->input->post('bank');
        $data['status']=$this->input->post('status');
        $data['personal_photo']=$img_file;
        $data['city_id_fk']=$this->input->post('city_id_fk');
        $data['hai_id_fk']=$this->input->post('hai_id_fk');
        $data['street_name']=$this->input->post('street_name');
       // $data['birth_date']=$this->input->post('birth_date');
        $data['birth_date_m']=$this->input->post('birth_date_m');
        $data['birth_date_h']=$this->input->post('birth_date_h');
        $data['type_card']=$this->input->post('type_card');
        $data['dest_card']=$this->input->post('dest_card');
        //$data['esdar_date']=$this->input->post('esdar_date');
        $data['esdar_date_m']=$this->input->post('esdar_date_m');
        $data['esdar_date_h']=$this->input->post('esdar_date_h');
      //  $data['end_date']=$this->input->post('end_date');
        $data['end_date_m']=$this->input->post('end_date_m');
        $data['end_date_h']=$this->input->post('end_date_h');
        $data['adress']=$this->input->post('adress');
        $data['adress_other']=$this->input->post('adress_other');
        $data['email']=$this->input->post('email');
        $data['nationality']=$this->input->post('nationality');
        $data['deyana']=$this->input->post('deyana');
        $data['another_phone']=$this->input->post('another_phone');
        $data['snap_chat']=$this->input->post('snap_chat');
        $data['twiter']=$this->input->post('twiter');
        $data['emp_type']=2;
        
        $this->db->insert('employees',$data);
    }
    public function edit_emp($code,$img_file)
    {
        if($img_file!=''){
            $data['personal_photo']=$img_file;
        }
        $data['employee']=$this->input->post('name');
        $data['card_num']=$this->input->post('card_num');
        $data['phone']=$this->input->post('phone');
        $data['gender']=$this->input->post('gender');
        $data['bank_num']=$this->input->post('bank_num');
        $data['bank']=$this->input->post('bank');
        $data['status']=$this->input->post('status');
        $data['city_id_fk']=$this->input->post('city_id_fk');
        $data['hai_id_fk']=$this->input->post('hai_id_fk');
        $data['street_name']=$this->input->post('street_name');
        $data['birth_date']=$this->input->post('birth_date');
        $data['type_card']=$this->input->post('type_card');
        $data['dest_card']=$this->input->post('dest_card');
        $data['esdar_date']=$this->input->post('esdar_date');
        $data['end_date']=$this->input->post('end_date');
        $data['adress']=$this->input->post('adress');
        $data['adress_other']=$this->input->post('adress_other');
        $data['email']=$this->input->post('email');
        $data['nationality']=$this->input->post('nationality');
        $data['deyana']=$this->input->post('deyana');
        $data['another_phone']=$this->input->post('another_phone');
        $data['snap_chat']=$this->input->post('snap_chat');
        $data['twiter']=$this->input->post('twiter');
        $data['emp_type']=2;
        if($img_file!='')
        {
            $data['personal_photo']=$img_file;
        }
        $this->db->where('emp_code',$code);
        $this->db->update('employees',$data);
    }
    public function get_city_name($id)
    {  $this->db->select('name');
        $this->db->where('id',$id);
        $query= $this->db->get('cities');
        return $query->row()->name;
    }
    

    public function check_emp_code($code)
    {
        $this->db->where('emp_code',$code);
        $query= $this->db->get('employees');
        return $query->num_rows();
    }
    public function get_data_by_code()
    {
        $code= $this->input->post('emp_code');
        $this->db->where('emp_code',$code);
        $query= $this->db->get('employees');
        if($query->num_rows()>0) {
            return $query->row_array();
        }else{
            return "nodata";
        }
    }
    public function insert_manage_emp($code)
    {
        $data['administration']=$this->input->post('administration');
        $data['department']=$this->input->post('department');
        $data['degree_id']=$this->input->post('degree_id');
        $data['contract']=$this->input->post('contract');
        $data['insurance_number']=$this->input->post('tamin');
        $data['employee_degree']=$this->input->post('employee_degree');
        $data['employee_type']=$this->input->post('employee_type');
        $data['employee_qualification']=$this->input->post('employee_qualification');
        $data['start_work_date_m']=$this->input->post('start_work_date_m');
        $data['start_work_date_h']=$this->input->post('start_work_date_h');
        $data['reason']=$this->input->post('reason');
        $data['manger']=$this->input->post('manger');
        $data['end_contract_date_m']=$this->input->post('end_contract_date_m');
        $data['end_contract_date_h']=$this->input->post('end_contract_date_h');
        $data['end_service_date_m']=$this->input->post('end_service_date_m');
        $data['end_service_date_h']=$this->input->post('end_service_date_h');
        $data['type_tamin']=$this->input->post('type_tamin');
        $data['work_maktb']=$this->input->post('work_maktb');
        $data['start_tamin_date_m']=$this->input->post('start_tamin_date_m');
        $data['start_tamin_date_h']=$this->input->post('start_tamin_date_h');
        $data['type_tamin__medicine']=$this->input->post('type_tamin__medicine');
        $data['tamin_company']=$this->input->post('tamin_company');
        $data['tamin_medicine_num']=$this->input->post('tamin_medicine_num');
        $data['polica_num']=$this->input->post('polica_num');
        $data['tamin_type']=$this->input->post('tamin_type');
        $data['tamin_date_m']=$this->input->post('tamin_date_m');
        $data['tamin_date_h']=$this->input->post('tamin_date_h');
         $data['cat_manager_id_fk']=$this->input->post('cat_manager_id_fk');
        $this->db->where('id',$code);
        $this->db->update('employees',$data);
    }
    public function insert_money_data()
    {
        $data['salary']=$this->input->post('salary');
        $data['employee_id_fk']=$this->input->post('emp_code');
        $data['b_sakn']=$this->input->post('b_sakn');
        $data['b_moslat']=$this->input->post('b_moslat');
        $data['b_etsal']=$this->input->post('b_etsal');
        $data['b_eaasha']=$this->input->post('b_eaasha');
        $data['b_natural']=$this->input->post('b_natural');
        $data['overtime']=$this->input->post('overtime');
        $data['bonus']=$this->input->post('bonus');
        $data['absence']=$this->input->post('absence');
        $data['late']=$this->input->post('late');
        $data['penalties']=$this->input->post('penalties');
        $data['insurance']=$this->input->post('insurance');
        $this->db->insert("employees_financial",$data);
        $banks=  $this->input->post('banks');
        $account_num=  $this->input->post('account_num');
        $main=  $this->input->post('main');
        if(!empty($banks)){
            $c=count($banks);
            for($i=0; $i<=$c;$i++)
            {
                $explode =explode('-',$banks[$i]);
                $data2['employee_id_fk']=$this->input->post('emp_code');
                $data2['bank_account_id']=$explode[0];
                $data2['bank_ramz']=$explode[1];
                $data2['bank_account_num']=$account_num[$i];
                $data2['main']=$main[$i];
                $this->db->insert("employees_financial_banks",$data2);
            }
        }
        echo "��� ������� �����";
    }
    public function insert_attached_file_data($code,$img,$field)
    {
        $data[$field]=$img;
        $this->db->where('emp_code',$code);
        $this->db->update('employees',$data);
    }
    /******************************/
    public function select_all_except($table,$filed,$value,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("$filed != ",$value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    /*******************************************************/
    
  public function get_manager_cat()
    {
        return $this->db->get('hr_main_cat')->result();
    }
    
    /********************************/
/***************************************************************************************************/

    
    public function get_employee_data()
    {
        $this->db->select('*');
        $this->db->from('hr_tamouh_department_jobs');
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = array($this->get_departments_job($row->id),$row->name);
            }
            return $data;
        }
        return false;
    }
    public function get_departments_job($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('administration',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
            return false;

    }

    public function insertDisclaimer()
    {
        $emp_id = $this->input->post('emp_id');
        $responsible_emps = $this->input->post('responsible_emp_id');
        $notes = $this->input->post('notes');
        $admin = $this->input->post('adminstration_id');
        $last = ($this->findLastDisclaimer())+1;
        $c = count($admin);

        for($i=0; $i<$c;$i++)
        {
            
            
            $data['emp_id_fk'] = $emp_id;
            $data['responsible_emp_id'] = (!empty($responsible_emps[$i]))? $responsible_emps[$i] : '0';
            $data['notes'] = $notes[$i];
            $data['adminstration_id'] = $admin[$i];
            $data['disclaimer_id'] = $last;
            
            if ($data['adminstration_id'] === '3'){
                $data['resignation'] = $this->check_box('resignation');
                $data['employee_card'] = $this->check_box('employee_card');
                $data['medical_card'] = $this->check_box('medical_card');
                $data['social_insurance'] = $this->check_box('social_insurance');
            }
            
            
            $this->db->insert("hr_disclaimers",$data);
        }
    }

    public function updateDisclaimer($id)
    {
         $emp =  $this->deleteDisclaimer($id);
        $emp_id = $this->input->post('emp_id');
        $responsible_emps = $this->input->post('responsible_emp_id');
        $notes = $this->input->post('notes');
        $admin = $this->input->post('adminstration_id');

        $c = count($admin);

        for($i=0; $i<$c;$i++)
        {
            $data['emp_id_fk'] = $emp_id;
            $data['responsible_emp_id'] = (!empty($responsible_emps[$i]))? $responsible_emps[$i] : '0';
            $data['notes'] = $notes[$i];
            $data['adminstration_id'] = $admin[$i];
            $data['disclaimer_id'] = $id;
            
            if ($data['adminstration_id'] === '3'){
                $data['resignation'] = $this->check_box('resignation');
                $data['employee_card'] = $this->check_box('employee_card');
                $data['medical_card'] = $this->check_box('medical_card');
                $data['social_insurance'] = $this->check_box('social_insurance');
            }
            
            
            $this->db->insert("hr_disclaimers",$data);
        }
    }


    public function findLastDisclaimer()
    {
        $this->db->select('*');
        $this->db->from('hr_disclaimers');
        $this->db->order_by('disclaimer_id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $h = $query->row();
            return $h->disclaimer_id;
        }
            return 0;

    }


public function findDisclaimer($id)
    {
        $this->db->select('*');
        $this->db->from('hr_disclaimers');
        $this->db->where('disclaimer_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) { 
                $data[$row->adminstration_id] = array('responsible_emp_id'=>$row->responsible_emp_id,
                    'notes'=>$row->notes,$row
                    );
                $data['emp_id'] = $row->emp_id_fk;
                $data['employee_info'] = $this->get_one_employee($row->emp_id_fk)[0];
                
            }
            return $data;

        }
        return false;

    }
    
    
    /*public function findDisclaimer($id)
    {
        $this->db->select('*');
        $this->db->from('hr_disclaimers');
        $this->db->where('disclaimer_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->adminstration_id] = array('responsible_emp_id'=>$row->responsible_emp_id,
                    'notes'=>$row->notes
                    );
                $data['emp_id'] = $row->emp_id_fk;
                $data['employee_info'] = $this->get_one_employee($row->emp_id_fk)[0];
            }
            return $data;

        }
        return false;

    }*/
    public function allDisclaimer()
    {
        $this->db->select('*');
        $this->db->from('hr_disclaimers');
        $this->db->group_by('disclaimer_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->result();
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i]->name = $this->get_emp_name($row->emp_id_fk);
                $data[$i]->employee_info = $this->get_one_employee($row->emp_id_fk)[0];
          $i++;  }
            return $data;
        }
        return false;

    }

    public function deleteDisclaimer($id){
        $this->db->where('disclaimer_id',$id);
        return $this->db->delete('hr_disclaimers');
    }

/***********************************************************************************************/    
    
     
  public function get_orders($id)
    {
        $this->db->where('emp_id_fk',$id);
        $query=$this->db->get('hr_mandate_orders');
       return $query->num_rows();

    }
    public function get_nationality_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    $query= $this->db->get('employees_settings');
    return $query->row()->title_setting;
}

public function get_dest_card_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    $query= $this->db->get('employees_settings');
    return $query->row()->title_setting;
}

public function get_status_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    
    $query= $this->db->get('employees_settings');
    return $query->row()->title_setting;
}
public function get_reason_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    
    $query= $this->db->get('employees_settings');
 //   return $query->row()->title_setting;
}
public function get_qualification_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    
    $query= $this->db->get('employees_settings');
   // return $query->row()->title_setting;
}

public function get_employee_degree_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    
    $query= $this->db->get('employees_settings');
  //  return $query->row()->title_setting;
}
public function get_work_maktb_name($id)
{  $this->db->select('title_setting');
    $this->db->where('id_setting',$id);
    
    $query= $this->db->get('employees_settings');
    //return $query->row()->title_setting;
}
public function get_direct_manger($id)
{

    $this->db->select('*');
    $this->db->where('depart_id_fk', $id);
    $this->db->from('hr_depart_managers');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            if ($row->emp_type == 0) {
                $data[$x]->empolyee_name = $this->get_empolyee($row->emp_id_fk);
            } elseif ($row->emp_type == 1) {
                $emp_name = $this->select_all_by("md_all_gam3ia_omomia_members", array('id' => $row->emp_id_fk));
                if (!empty($emp_name)) {
                    $data[$x]->empolyee_name = '"' . $emp_name->name . '"';
                } else {
                    $data[$x]->empolyee_name = '';

                }
            }
            $x++;
        }
        return $data;
    } else {
        return 0;
    }
    

}
public function get_empolyee($id)
{  $this->db->select('*');
    $this->db->where('id',$id);
    $query= $this->db->get('employees');
    return $query->row()->employee;
}
public function select_search_key($table,$search_key,$search_key_value,$key,$key1){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($search_key,$search_key_value);    
    $this->db->where($key,$key1);    
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}


    
}// END CLASS