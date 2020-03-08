<?php
class Employee_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }




    public function select_by(){
        $this->db->select('*');
        $this->db->from('department_jobs');
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

    public function select_branch_department()
    {
        $this->db->where('from_id_fk !=',0);
        return $this->db->get('department_jobs')->result();
    }

    public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->from_id_fk);
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





    public function select_allEmployee()
    {

        return $this->db->get('employees')->result();
    }

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
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `id`=' . $row->id);
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
        $h = $this->db->get_where("department_jobs",array("id"=>$id));
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


        $data['birth_date']=$this->input->post('birth_date');
        $data['type_card']=$this->input->post('type_card');
        $data['dest_card']=$this->input->post('dest_card');
        $data['esdar_date']=$this->input->post('esdar_date');
        $data['end_date']=$this->input->post('end_date');
        $data['adress']=$this->input->post('adress');
        $data['email']=$this->input->post('email');
        $data['nationality']=$this->input->post('nationality');
        $data['deyana']=$this->input->post('deyana');
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




        $data['birth_date']=$this->input->post('birth_date');
        $data['type_card']=$this->input->post('type_card');
        $data['dest_card']=$this->input->post('dest_card');
        $data['esdar_date']=$this->input->post('esdar_date');
        $data['end_date']=$this->input->post('end_date');
        $data['adress']=$this->input->post('adress');
        $data['email']=$this->input->post('email');
        $data['nationality']=$this->input->post('nationality');
        $data['deyana']=$this->input->post('deyana');

        if($img_file!='')
        {
            $data['personal_photo']=$img_file;
        }
        $this->db->where('emp_code',$code);
        $this->db->update('employees',$data);
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

        $data['start_work_date']=$this->input->post('start_work_date');
        $data['reason']=$this->input->post('reason');
        $data['manger']=$this->input->post('manger');
        $data['end_contract_date']=$this->input->post('end_contract_date');
        $data['end_service_date']=$this->input->post('end_service_date');
        $data['type_tamin']=$this->input->post('type_tamin');
        $data['work_maktb']=$this->input->post('work_maktb');
        $data['start_tamin_date']=$this->input->post('start_tamin_date');
        $data['type_tamin__medicine']=$this->input->post('type_tamin__medicine');
        $data['tamin_company']=$this->input->post('tamin_company');
        $data['tamin_medicine_num']=$this->input->post('tamin_medicine_num');
        $data['polica_num']=$this->input->post('polica_num');
        $data['tamin_type']=$this->input->post('tamin_type');
        $data['tamin_date']=$this->input->post('tamin_date');




        $this->db->where('emp_code',$code);
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



        echo "ÊãÊ ÇáÚãáíÉ ÈäÌÇÍ";
    }
    public function insert_attached_file_data($code,$img,$field)
    {

        $data[$field]=$img;

        $this->db->where('emp_code',$code);
        $this->db->update('employees',$data);


    }

}// END CLASS