<?php
class Gathering_place_model extends CI_Model
{


    //=================================================================================



    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('fr_gathering_place');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] = $row;
                $data[$x]->depart_name = $this->get_depart($row->edara_id_fk);
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


        public function insert(){
        if(!empty($this->input->post('title'))){
            for ($a=0;$a<sizeof($this->input->post('title'));$a++){
                $data['title'] =$this->input->post('title')[$a];
                $data['edara_id_fk'] =$this->input->post('edara_id_fk')[$a];
                $data['qsm_id_fk'] =$this->input->post('qsm_id_fk')[$a];
                $data['emp_id_fk'] =$this->input->post('emp_id_fk')[$a];
                $this->db->insert("fr_gathering_place",$data);
            }

        }

    }

    public function update($id,$file)
    {
        $data['depart_id_fk'] =$this->input->post('depart_id_fk');
        $data['emp_id_fk'] =$this->input->post('emp_id_fk');
        if(!empty($file)){
            $data['sign_img'] =$file;
        }
        $this->db->where('id',$id);
        $this->db->update("hr_depart_managers",$data);
    }

    public function getById($id){
        $h = $this->db->get_where("fr_gathering_place", array('id'=>$id));
        return $h->row_array();
    }
    public function getById_authorities($id){
        $h = $this->db->get_where("hr_jobtitles_managers", array('id'=>$id));
        return $h->row_array();
    }




    public function delete($id)
    {
       $this->db->where('id',$id);
       $this->db->delete('fr_gathering_place');
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
                $query_result[$i] =$row;
                $i++; }
            return $query_result;
        }else{
            return 0;
        }

    }







}
