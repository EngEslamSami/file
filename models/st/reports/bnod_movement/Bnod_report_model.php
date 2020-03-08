<?php
class Bnod_report_model extends CI_Model{
    public function get_storage($id)
    {
        $this->db->where('type', $id);
        $query = $this->db->get('st_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }

    public function get_bnod(){
        $this->db->where('type',4);
        $query = $this->db->get('st_bnod_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;

    }


    public function search_sanf(){
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $storage_fk = $this->input->post('storage_fk');
        $where_arr = array();
        if (!empty($storage_fk)) {
            $where_arr['storage_fk'] = $storage_fk;
        }
        if (!empty($date_from)) {
            $where_arr['ezn_date>='] = strtotime($date_from);
        }
        if (!empty($date_to)) {
            $where_arr['ezn_date<='] = strtotime($date_to);
        }
       $query =  $this->db->get('st_asnaf');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i] = $row;
                $data[$i]->edafa = $this->get_ezn_edafa($where_arr,$row->code);

                $data[$i]->sarf = $this->get_ezn_sarf($where_arr,$row->code);
                $data[$i]->rased =  $data[$i]->edafa->edafa_amount -  $data[$i]->sarf->sarf_amount;
                if (empty($row->edafa->edafa_amount) && empty($row->sarf->sarf_amount)){
                    unset($data[$i]);
                }
                $i++;
            }
            return $data;
        }

    }
    public function get_ezn_sarf($where_arr,$sanf_code){

     $query =  $this->db->select('st_ezn_sarf.ezn_date,st_ezn_sarf.ezn_date_ar,st_ezn_sarf.ezn_rkm,st_ezn_sarf.sarf_to_name,
          SUM(st_ezn_sarf_details.sanf_amount)  as sarf_amount ,st_ezn_sarf_details.sanf_code')
            ->join('st_ezn_sarf_details', 'st_ezn_sarf_details.ezn_rkm_fk=st_ezn_sarf.ezn_rkm')
            ->where('st_ezn_sarf_details.sanf_code',$sanf_code)->where($where_arr)->order_by('ezn_date ASC')
            ->get('st_ezn_sarf');
     if ($query->num_rows()>0){
         return $query->row();
     } else{
         return 0;
     }
    }
    public function get_ezn_edafa($where_arr,$sanf_code){

        $query = $this->db->select('st_ezn_edafa.ezn_date,st_ezn_edafa.ezn_date_ar,st_ezn_edafa.type_ezn,st_ezn_edafa.ezn_rkm,st_ezn_edafa.person_name,
        SUM(st_ezn_edafa_details.sanf_amount)  as edafa_amount ,st_ezn_edafa_details.sanf_code ')
            ->join('st_ezn_edafa_details', 'st_ezn_edafa_details.ezn_rkm_fk=st_ezn_edafa.ezn_rkm')
            ->where('st_ezn_edafa_details.sanf_code',$sanf_code)->where($where_arr)->order_by('ezn_date ASC')
            ->get('st_ezn_edafa');
        if ($query->num_rows()>0){
            return $query->row();
        } else{
            return 0;
        }


    }


}