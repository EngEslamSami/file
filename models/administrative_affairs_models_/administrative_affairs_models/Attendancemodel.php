<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendancemodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function insertManual()
    {
        $data['emp_code']             = $this->input->post('emp_code');
        $data['administration_id_fk'] = $this->input->post('administration_id_fk');
        $data['dep_job_id_fk']        = $this->input->post('dep_job_id_fk');
        $data['attendance_date']      = strtotime(date("Y-m-d"));
        $data['presence']             = date('H:i:s',time());
        $data['publisher']            = $_SESSION['user_id'];
        $this->db->insert('manual_attendance',$data);
    }

    public function updateManual($id, $presence)
    {
        $data['dissuasion'] = date('H:i:s',time());
        $data['diff']       =$this->get_time_difference($presence, $data['dissuasion']);
        $this->db->where('id', $id);
        $this->db->update('manual_attendance',$data);
    }

    public function get_time_difference($time1, $time2)
    {
        $time1 = strtotime("1/1/1980 $time1");
        $time2 = strtotime("1/1/1980 $time2");
    
        if ($time2 < $time1)
            $time2 = $time2 + 86400;
    
        return date("H:i:s", strtotime("1980-01-01 00:00:00") + ($time2 - $time1));
    }

    public function deleteManual($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('manual_attendance');
    }

    public function select_manualAttendance()
    {   
        $where['manual_attendance.id!='] = 0;
        if($_SESSION['role_id_fk'] == 2){
            $where['manual_attendance.administration_id_fk'] = $_SESSION['administration_id'];
            $where['manual_attendance.dep_job_id_fk'] = $_SESSION['dep_job_id_fk'];
        }
        $where['manual_attendance.attendance_date'] = strtotime(date('Y-m-d'));
        return $this->db->select('manual_attendance.*, employees.employee, mainBranch.name AS main,  subBranch.name AS sub')
                        ->from('manual_attendance')
                        ->join('employees','employees.emp_code=manual_attendance.emp_code')
                        ->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
                        ->join('department_jobs AS subBranch','subBranch.id=employees.department')
                        ->where($where)
                        ->order_by('manual_attendance.attendance_date', 'DESC')
                        ->get()
                        ->result();
    }

    public function select_loadAttendance()
    {   
        $where['load_attendance.id!='] = 0;
        if($_SESSION['role_id_fk'] == 2){
            $where['load_attendance.administration_id_fk'] = $_SESSION['administration_id'];
            $where['load_attendance.dep_job_id_fk'] = $_SESSION['dep_job_id_fk'];
        }
        return $this->db->select('load_attendance.*, employees.employee, mainBranch.name AS main,  subBranch.name AS sub')
                        ->from('load_attendance')
                        ->join('employees','employees.emp_code=load_attendance.emp_code')
                        ->join('department_jobs AS mainBranch','mainBranch.id=employees.administration')
                        ->join('department_jobs AS subBranch','subBranch.id=employees.department')
                        ->where($where)
                        ->get()
                        ->result();
    }

    public function select_employees($where)
    {
        return $this->db->select('employees.*')
                        ->from('employees')
                        ->join('manual_attendance','manual_attendance.attendance_date='.strtotime(date('Y-m-d')).' AND manual_attendance.emp_code=employees.emp_code','LEFT')
                        ->where($where)
                        ->where('manual_attendance.emp_code IS NULL')
                        ->get()
                        ->result();
    }

    public function insertLoadAttendance($file)
    {
        $objPHPExcel = PHPExcel_IOFactory::load($file);   
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
          
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }
        foreach ($arr_data as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if($key2 == 'A'){
                    $I['emp_code'] = $value2;
                }
                if($key2 == 'C'){
                    $I['main_branch_id_fk'] = $value2;
                }
                if($key2 == 'E'){
                    $I['sub_branch_id_fk'] = $value2;
                }
                if($key2 == 'G'){
                    $date = str_replace('/', '-', $value2);
                    $I['attendance_date'] = strtotime($date);
                }
                if($key2 == 'H'){
                    if($value2)
                        $I['presence'] = $value2.':00';
                    else
                        $I['presence'] = $value2;
                }
                if($key2 == 'I'){
                    if($value2)
                        $I['dissuasion'] = $value2.':00';
                    else
                        $I['dissuasion'] = $value2;
                }
            }
            if($I['presence'] && $I['dissuasion']){
                $I['diff']  = $this->get_time_difference($I['presence'], $I['dissuasion']);
            }
            $query = $this->db->query('SELECT * FROM `load_attendance` 
                               WHERE attendance_date='.$I['attendance_date'].' AND emp_code='.$I['emp_code'].'');
            $result = $query->row_array();
            if($query->num_rows() > 0){
                $this->db->where('id', $I['id']);
                $this->db->update('load_attendance',$I);
            }
            else{
                $this->db->insert('load_attendance',$I);
            }
        }
    }

}

/* End of file Attendancemodel.php */
/* Location: ./application/models/Attendancemodel.php */