<?php
class Managers_and_authorities_settings_model extends CI_Model
{


    //=================================================================================

    /*public function select_all_settings()
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
    }*/


  /*  public function select_all()
    {
        $this->db->select('*');
        $this->db->from('hr_depart_managers');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                $data[$x]->depart_name = $this->get_depart($row->depart_id_fk);
                $data[$x]->empolyee_name = $this->get_empolyee($row->emp_id_fk);
                $x++;}
            return $data;
        }else{
            return 0;
        }

    }
*/
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('hr_depart_managers');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                if ($row->emp_type == 0) {
                    $data[$x]->depart_name = $this->get_depart($row->depart_id_fk);
                    $data[$x]->empolyee_name = $this->get_empolyee($row->emp_id_fk);
                } elseif ($row->emp_type == 1) {
                    $data[$x]->depart_name = $this->get_depart($row->depart_id_fk);
                    $emp_name = $this->select_all_by("md_all_gam3ia_omomia_members", array('id' => $row->emp_id_fk));
                    if (!empty($emp_name)) {
                        $data[$x]->empolyee_name = '"' . $emp_name->name . '"';
                    } else {
                        $data[$x]->empolyee_name = 'ÛíÑ ãÍÏÏ';

                    }

                }
                $x++;
            }
            return $data;
        } else {
            return 0;
        }

    }

    public function select_all_jobtitles()
    {
        $this->db->select('*');
        $this->db->from('hr_jobtitles_managers');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                $data[$x]->jobtitle_name = $this->get_jobtitle($row->job_title_id_fk);
                $data[$x]->empolyee_name = $this->get_empolyee($row->emp_id_fk);
                $x++;}
            return $data;
        }else{
            return 0;
        }

    }



    public function get_depart($id){
        $h = $this->db->get_where("department_jobs", array('id'=>$id));
        if ($h->num_rows() > 0) {
            return $h->row_array()['name'];
        }
    }

    public function get_empolyee($id){
        $h = $this->db->get_where("employees", array('id'=>$id));
        if ($h->num_rows() > 0) {
        return $h->row_array()['employee'];
        }
    }

   public function get_jobtitle($id){
        $h = $this->db->get_where("all_defined_setting", array('defined_id'=>$id));
        if ($h->num_rows() > 0) {
        return $h->row_array()['defined_title'];
        }
    }



    //===================================================================================


        public function insert($files){

        if(!empty($this->input->post('depart_id_fk'))){
            for ($a=0;$a<sizeof($files);$a++){
                $data['depart_id_fk'] =$this->input->post('depart_id_fk')[$a];
                $data['emp_id_fk'] =$this->input->post('emp_id_fk')[$a];
                $data['emp_type'] = $this->input->post('emp_type')[$a];
                if(!empty($files[$a])){
                    $data['sign_img'] =$files[$a];
                }

                $this->db->insert("hr_depart_managers",$data);
            }

        }

    }

    public function update($id,$file)
    {
        $data['depart_id_fk'] =$this->input->post('depart_id_fk');
        $data['emp_id_fk'] =$this->input->post('emp_id_fk');
           $data['emp_type'] = $this->input->post('emp_type');
        if(!empty($file)){
            $data['sign_img'] =$file;
        }
        $this->db->where('id',$id);
        $this->db->update("hr_depart_managers",$data);
    }

    public function getById($id){
        $h = $this->db->get_where("hr_depart_managers", array('id'=>$id));
        return $h->row_array();
    }
    public function getById_authorities($id){
        $h = $this->db->get_where("hr_jobtitles_managers", array('id'=>$id));
        return $h->row_array();
    }


    public function insert_authorities_managers($files){

        if(!empty($this->input->post('job_title_id_fk'))){
            for ($a=0;$a<sizeof($files);$a++){
                $data['job_title_id_fk'] =$this->input->post('job_title_id_fk')[$a];
                $data['emp_id_fk'] =$this->input->post('emp_id_fk')[$a];
                if(!empty($files[$a])){
                    $data['sign_img'] =$files[$a];
                }

                $this->db->insert("hr_jobtitles_managers",$data);
            }

        }

    }

    public function update_authorities_managers($id,$file)
    {
        $data['job_title_id_fk'] =$this->input->post('job_title_id_fk');
        $data['emp_id_fk'] =$this->input->post('emp_id_fk');
        if(!empty($file)){
            $data['sign_img'] =$file;
        }
        $this->db->where('id',$id);
        $this->db->update("hr_jobtitles_managers",$data);
    }



    public function delete($id)
    {
       $this->db->where('id',$id);
       $this->db->delete('hr_depart_managers');
    }
    public function delete_authorities($id)
    {
       $this->db->where('id',$id);
       $this->db->delete('hr_jobtitles_managers');
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


/**********************************************/
    public function select_all_departments(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where("from_id_fk",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
          /*      if( $this->GetCount($row->id) > 0){
                    continue;
                }*/
                $query_result[$i] =$row;
                $query_result[$i]->sub =$this->GetCount($row->id);
                $i++; }
            return $query_result;
        }else{
            return 0;
        }

    }


    public function select_all_defined($type){
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $query_result[$i] =$row;
                $i++;
            }
            return $query_result;
        }else{
            return 0;
        }

    }

    public function GetCount($id){
        $this->db->select('*');
        $this->db->from('hr_depart_managers');
        $this->db->where("depart_id_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }

public function get_by_ids(){
    $ids=$this->input->post('vales');
    $this->db->select('*');
    $this->db->from('department_jobs');
    $this->db->where_not_in('id',$ids);
    $this->db->where("from_id_fk",0);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query->result() as $row) {
            if( GetCount($row->id) > 0){
                continue;
            }
            $query_result[$i] =$row;
            $query_result[$i]->sub =$this->GetCount($row->id);

            $i++; }
        return $query_result;
    }else{
        return 0;
    }
    
}
/****************************************************/

  public function select_all_by($table, $where_arr)
    {
        $query = $this->db->where($where_arr)->get($table);
        if ($query->num_rows() > 0) {
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return $query->result();
            }

        }
    }

}
