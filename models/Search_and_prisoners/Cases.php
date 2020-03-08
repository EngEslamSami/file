<?php
class Cases extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    /**
     * ===================================================================================================
     *
     */

    public  function record_count($table){
        return $this->db->count_all($table);
    }

    //==========================================

    public function select_all_cases_types(){
        $this->db->select('motab3a.*,prisoners.id as prisoners_id,prisoners.nazeel_code,prisoners.case_type,prisoners.nationality,prisoners.nazeel_name,prisoners.sgl_mdny,cases.id,cases.name');
        $this->db->from("motab3a");
        $this->db->join('prisoners', 'prisoners.nazeel_code = motab3a.sagin_id');
        $this->db->join('cases', 'cases.id = prisoners.case_type');
        $this->db->where(array('date'=>strtotime(date('Y-m-d'))));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public function insert(){

        for($x=1 ;$x<= $this->input->post('max');$x++){
            $data['name'] = $this->input->post('name'.$x);
            $this->db->insert('cases',$data);
        }

    }

    /**
     * ===================================================================================================
     *
     *
     */


    public function update($id){
        $update['name'] = $this->input->post('name_edit');
        $this->db->where('id', $id);
        if($this->db->update('cases',$update)) {



        }

    }




}//END CLASS

