<?php
class Contributions_report_model extends CI_Model{

    public function getALL()
    {
        $this->db->where(array('person_name !=' =>null));
        $query = $this->db->select('*')->group_by('person_jwal')
            ->get('st_ezn_edafa')->result_array();

        if (!empty($query)) {
            return $query;
        }
        return 0;
    }

    public function search_result($date_from,$date_to,$person_name){

        if ($this->input->post('date_from') && !empty($this->input->post('date_from'))){
            $this->db->where('ezn_date_ar >=',$date_from);
        }
        if ($this->input->post('date_to') && !empty($this->input->post('date_to'))){
            $this->db->where('ezn_date_ar <=',$date_to);
        }


        if (!empty($this->input->post('type')) && !empty($this->input->post('type'))){
            $ids = $this->input->post('type');
            $this->db->where_in('type_ezn', $ids );
        }
        if (!empty($this->input->post('all')) && !empty($this->input->post('all'))){

        }


        if ($this->input->post('motbr3_name') && !empty($this->input->post('motbr3_name'))){
            $this->db->where('person_name',$person_name);
        }


        $query = $this->db->get('st_ezn_edafa');
        if ($query->num_rows()>0){

            return $query->result();
        } else{
            return 0;
        }

    }

}