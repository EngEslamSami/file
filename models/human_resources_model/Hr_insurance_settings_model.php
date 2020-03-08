<?php
class Hr_insurance_settings_model extends CI_Model
{


    //=================================================================================

    public function select_all_settings()
    {
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type',19);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[] = $row;
                $x++;}
            return $data;
        }
        return false;
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('hr_insurance_settings');
        $this->db->group_by('nationality_type');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[] = $row;
                $data[$x]->sub = $this->select_by($row->nationality_type);
                $x++;}
            return $data;
        }
        return false;
    }

    public function select_by($id)
    {
        $this->db->select('*');
        $this->db->from('hr_insurance_settings');
        $this->db->where('nationality_type',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->setting_id_fk] = $row;
               }
            return $data;
        }
        return false;
    }


    //===================================================================================

        public function insert(){

      $settings =$this->select_all_settings();
        if(!empty($this->input->post('emp_average'))){
            for ($a=0;$a<sizeof($settings);$a++){
                $data['nationality_type'] =$this->input->post('nationality_type');
                $data['setting_id_fk'] =$settings[$a]->id_setting;
                $data['emp_average'] =$this->input->post('emp_average')[$settings[$a]->id_setting];
                $data['society_average'] =$this->input->post('society_average')[$settings[$a]->id_setting];
                $data['date'] = strtotime(date("m/d/Y"));;
                $data['date_s'] = time();
                $this->db->insert("hr_insurance_settings",$data);
            }

        }

    }


    public function update($id)
    {



        $this->db->where('nationality_type', $id)->delete('hr_insurance_settings');





        $settings =$this->select_all_settings();
        if(!empty($this->input->post('emp_average'))){
            for ($a=0;$a<sizeof($settings);$a++){
                $data['nationality_type'] =$this->input->post('nationality_type');
                $data['setting_id_fk'] =$settings[$a]->id_setting;
                $data['emp_average'] =$this->input->post('emp_average')[$settings[$a]->id_setting];
                $data['society_average'] =$this->input->post('society_average')[$settings[$a]->id_setting];
                $data['date'] = strtotime(date("m/d/Y"));;
                $data['date_s'] = time();
                $this->db->insert("hr_insurance_settings",$data);
            }

        }


    }



    public function delete($id)
    {
        $this->db->where('nationality_type', $id)->delete('hr_insurance_settings');
    }


    public function select($id)
    {
        $this->db->select('*');
        $this->db->from('hr_insurance_settings');
        $this->db->where('nationality_type',$id);
        $this->db->group_by('nationality_type');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }

    }


}
