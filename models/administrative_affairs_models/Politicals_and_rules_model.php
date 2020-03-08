<?php

class  Politicals_and_rules_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }


    public function insert($file)
    {
        $data['date_ar'] = $this->input->post('date_ar');
        $data['number'] = $this->input->post('number');
        $data['details'] = $this->input->post('details');

        if ($file != '') {
            $data['file'] = $file;
        }
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->insert('politicals_and_rules', $data);
    }

    /******************************************************/

        public function select(){
            $this->db->select('*');
            $this->db->from('politicals_and_rules');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
    
    public function folder($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('politicals_and_rules');
        return $query->row();
    }


    /******************************************************/

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('politicals_and_rules');

    }

    /******************************************************/
    public function getById($id)
    {
        $h = $this->db->get_where('politicals_and_rules', array('id' => $id));
        return $h->row_array();
    }

    /******************************************************/
    public function update($id,$file)
    {


        $data['date_ar'] = $this->input->post('date_ar');
        $data['number'] = $this->input->post('number');
        $data['details'] = $this->input->post('details');

        if ($file != '') {
            $data['file'] = $file;
        }
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->where('id', $id);
        $this->db->update('politicals_and_rules', $data);

    }

    /******************************************************/


}