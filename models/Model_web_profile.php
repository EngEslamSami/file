
<?php
class Model_web_profile extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }
     
//---------------------------------------------
    public function check_user_data($table ,$conddition_arr){

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($conddition_arr);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }
//----------------------------------------------
    public function select_sponsors($id)
    {
        $sql = $this->db->select('sponsors.*, nationality.title AS nationality, prog_main_sitting.title AS bank')
            ->join('nationality','nationality.id=sponsors.nationality_id_fk','LEFT')
            ->join('prog_main_sitting','prog_main_sitting.id=sponsors.bank_id_fk','LEFT')
            ->where("sponsors.id",$id)
            ->get('sponsors');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->files = $this->select_files($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_files($id)
    {
        return $this->db->where('sponsor_id_fk',$id)->get('sponsors_files')->result();
    }
    public function select_sponsors_prog($id)
    {
        $sql = $this->db->select('programs_to.program_id_fk,programs_to.date as prog_date ,programs_depart.*')
            ->join('programs_depart','programs_depart.id=programs_to.program_id_fk','LEFT')
            ->where("programs_to.donor_id",$id)
            ->get('programs_to');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
        return false;
    }
    public function select_sponsors_orphan($id)
    {
        $sql = $this->db->select('programs_to_orphan.member_id,   f_members.member_full_name')
            ->join('f_members','f_members.id=programs_to_orphan.member_id','LEFT')
            ->where("programs_to_orphan.donor_id",$id)
            ->get('programs_to_orphan');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
        return false;
    }
    public function select_sponsors_pill($id)
    {
        $sql = $this->db->select('*')
            ->where("person_id",$id)
            ->where("donate_type_id_fk",3)
            ->get('cash_donations');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
        return false;
    }

//----------------------------------------------
    public function select_donors($id)
    {
        $sql = $this->db->select('donors.*, nationality.title AS nationality, prog_main_sitting.title AS bank')
            ->join('nationality','nationality.id=donors.nationality_id_fk','LEFT')
            ->join('prog_main_sitting','prog_main_sitting.id=donors.bank_id_fk','LEFT')
            ->where("donors.id",$id)
            ->get('donors');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                $data[$i]->files = $this->select_files_donor($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_files_donor($id)
    {
        return $this->db->where('donor_id_fk',$id)->get('donors_files')->result();
    }

    public function select_donor_pill($id)
    {
        $sql = $this->db->select('*')
            ->where("person_id",$id)
            ->where("donate_type_id_fk",1)
            ->get('cash_donations');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
        return false;
    }







}//END CLASS


