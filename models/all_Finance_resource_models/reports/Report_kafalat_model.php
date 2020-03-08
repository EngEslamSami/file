<?php
class Report_kafalat_model extends CI_Model
{
    public function get_all_arml()
    {

        $mother_num = $this->input->post('mother_num');
        $this->db->select('mother.*');
        $this->db->from('mother');
        $this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk', 'right');
        $this->db->where('basic.final_suspend', 4);
        $this->db->where(array('mother.categoriey_m' => 1, 'mother.person_type' => 62,
            'mother.halt_elmostafid_m' => 1));
        if ($this->input->post('mother_num')) {
            $this->db->where('mother.mother_national_num_fk', $mother_num);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data2 = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data2[$i] = $row;
                $data2[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
                $data2[$i]->file_num = $this->get_file_num2($row->mother_national_num_fk);
                $data2[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data2[$i]->file_status = $this->get_file_status($row->mother_national_num_fk);

                $i++;

            }
            return $data2;


        } else {
            return 0;
        }
    }
    public function get_all_aytam()
    {
        $fe2a=$this->input->post('fe2a_type');
        $mother_num=$this->input->post('mother_num');
        $this->db->select('f_members.*');
        $this->db->from('f_members');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk','right');
        $this->db->where('basic.final_suspend',4);
        if($this->input->post('fe2a_type'))
        {
            $this->db->where('f_members.categoriey_member',$fe2a);
        }
        if($this->input->post('mother_num'))
        {
            $this->db->where('f_members.mother_national_num_fk',$mother_num);
        }
        $query=$this->db->get();

        if($query->num_rows()>0)
        {
            $data2=array();
            $i=0;
            foreach($query->result() as $row)
            {
                $data2[$i]=$row;
                $data2[$i]->person_data = $this->get_member_data($row->id);
                $data2[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data2[$i]->file_num=$this->get_file_num2($row->mother_national_num_fk);
                $data2[$i]->file_status=$this->get_file_status($row->mother_national_num_fk);


                $i++;

            }
            return $data2;


        }else{
            return 0;
        }
    }
    public function get_f_member()
    {

        $mother_num=$this->input->post('mother_num');
        $fe2a=$this->input->post('fe2a_type');
        $this->db->select('f_members.*');
        $this->db->from('f_members');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk','left');
        $this->db->where('basic.final_suspend',4);
        $this->db->where('f_members.first_halet_kafala',2);
        //$this->db->where('f_members.persons_status',2);
        //$this->db->or_where('f_members.first_halet_kafala',2);
        if($this->input->post('fe2a_type'))
        {
            $this->db->where('f_members.categoriey_member',$fe2a);
        }
        if($this->input->post('mother_num'))
        {
            $this->db->where('f_members.mother_national_num_fk',$mother_num);
        }
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            $data2=array();
            $i=0;
            foreach($query->result() as $row)
            {
                $data2[$i]=$row;
                $data2[$i]->person_data = $this->get_member_data($row->id);
                $data2[$i]->file_num=$this->get_file_num2($row->mother_national_num_fk);
                $data2[$i]->file_status=$this->get_file_status($row->mother_national_num_fk);
                $data2[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data2[$i]->khafala = $this->get_from_fr_khafalats($row->first_kafala_id);
                $i++;

            }
            return $data2;


        }else{
            return 0;
        }


    }
    public function get_f_mother()
    {

        $type =$this->input->post('type_member');
        $this->db->select('mother.*');
        $this->db->from('mother');
        $this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk','right');
        $this->db->where('basic.final_suspend',4);
        //$this->db->where('mother.first_k_id',0);
        if($type ==1 ){
           // $this->db->where(array('mother.first_k_id'=>0));
            $this->db->where(array('mother.first_halet_kafala'=>2));

        }
        $this->db->where(array('mother.categoriey_m'=>1,'mother.person_type'=>62,
            'mother.halt_elmostafid_m'=>1));
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            $data2=array();
            $i=0;
            foreach($query->result() as $row)
            {
                $data2[$i]=$row;
                $data2[$i]->person_data = $this->get_mother_data($row->mother_national_num_fk);
                $data2[$i]->file_num=$this->get_file_num2($row->mother_national_num_fk);
                $data2[$i]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data2[$i]->file_status=$this->get_file_status($row->mother_national_num_fk);

                $i++;

            }
            return $data2;

            /*  echo "<pre>";
              print_r($data2);
              echo "</pre>";
              die;*/
        }else{
            return 0;
        }


    }
    public function get_member_fr_khfalat()
    {
        $data_now=strtotime(date('Y-m-d'));
        $end_date=$this->input->post('end_date');
        $fe2a = $this->input->post('fe2a_type');
        $gender = $this->input->post('gender');

        $kafala_type_fk=$this->input->post('kafala_type_fk');
        $this->db->select('f_members.*');
        $this->db->from('f_members');
        $this->db->join('basic', 'basic.mother_national_num = f_members.mother_national_num_fk','left');
        $this->db->where('basic.final_suspend',4);
       // $this->db->where('f_members.categoriey_member',200);
        $this->db->where('f_members.first_halet_kafala',1);
       // $this->db->or_where('f_members.first_halet_kafala',1);

        //$this->db->where('f_members.first_to >=', $data_now);
        if($this->input->post('kafala_type_fk')!=0)
        {
            $this->db->where('f_members.first_kafala_type',$kafala_type_fk);
        }
        if($this->input->post('fe2a_type')!=0)
        {
            $this->db->where('f_members.categoriey_member',$fe2a);
        }
        if($this->input->post('gender')!=0 || $this->input->post('gender')==52)
        {
            $this->db->where('f_members.member_gender',52);
            $this->db->or_where('f_members.member_gender',1);
        }
        if($this->input->post('gender')!=0 || $this->input->post('gender')==53)
        {
            $this->db->where('f_members.member_gender',53);
            $this->db->or_where('f_members.member_gender',2);
        }
        $query=$this->db->get();
        $data=array();
        $x=0;
        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->file_status = $this->get_file_status($row->mother_national_num_fk);
                $data[$x]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data[$x]->file_num = $this->get_file_num($row->mother_national_num_fk);
                $data[$x]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data[$x]->khafala = $this->get_from_fr_khafalats($row->first_kafala_id);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }
    public function get_mother_fr_khfalat()
    {

        $type =$this->input->post('type_member');

        $data_now=strtotime(date('Y-m-d'));
        $kafala_type_fk=$this->input->post('kafala_type_fk');
        $end_date=$this->input->post('end_date');
        $this->db->select('mother.*');
        $this->db->from('mother');
        $this->db->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk','LEFT');
        $this->db->where('basic.final_suspend',4);
        $this->db->where('mother.first_halet_kafala',1);
         //$this->db->or_where('mother.first_halet_kafala',1);
        if($this->input->post('kafala_type_fk')!=0)
        {
            $this->db->where('mother.first_kafala_type',$kafala_type_fk);
        }

//        if($type == 2){
//
//            $this->db->where(array('mother.first_k_id !='=>0,'mother.first_halet_kafala'=>1));
//
//        }
        $query=$this->db->get();
        $data=array();
        $x=0;
        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->file_status = $this->get_file_status($row->mother_national_num_fk);
                $data[$x]->father_name = $this->get_father_name($row->mother_national_num_fk);
                $data[$x]->file_num = $this->get_file_num($row->mother_national_num_fk);

                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }


//=========================================================================method small========================
    public function get_mother_name($mother_national_num_fk)
    {
        $h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_national_num_fk));
        $arr = $h->row_array();
        return $arr['full_name'];
    }

    public function get_mother_data($mother_national_num_fk)
    {
        $this->db->select('mother.mother_national_num_fk,mother.m_birth_date_hijri_year,
                        mother.m_gender AS gender,mother.m_birth_date_hijri, files_status_setting.title AS halt_elmostafid_title,files_status_setting.color AS halt_elmostafid_color');
        $this->db->from("mother");
        $this->db->where("mother.mother_national_num_fk", $mother_national_num_fk);
        $this->db->join('files_status_setting', 'files_status_setting.id = mother.halt_elmostafid_m', "LEFT");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data[0];
        } else {
            return 0;
        }


    }

    public function get_member_name($person_id_fk)
    {
        $h = $this->db->get_where("f_members", array('id' => $person_id_fk));
        $arr = $h->row_array();
        return $arr['member_full_name'];
    }

    public function get_member_data($person_id_fk)
    {
        $this->db->select('f_members.id,f_members.member_gender AS gender,f_members.member_birth_date_hijri,f_members.member_birth_date_hijri_year,  files_status_setting.title AS halt_elmostafid_title,files_status_setting.color AS halt_elmostafid_color');
        $this->db->from("f_members");
        $this->db->where("f_members.id", $person_id_fk);
        $this->db->join('files_status_setting', 'files_status_setting.id = f_members.halt_elmostafid_member', "LEFT");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data[0];
        } else {
            return 0;
        }
    }

    public function get_file_num($mother_num)
    {
        $h = $this->db->get_where("basic", array('mother_national_num' => $mother_num));
        if ($h->num_rows() > 0) {
            $arr = $h->row_array();
            return $arr['file_num'];
        } else {
            return 0;
        }

    }

    public function halat_kafel_name($id)
    {
        $h = $this->db->get_where("fr_kafalat_kafel_status", array('id' => $id));
        $arr = $h->row_array();
        return $arr['title'];
    }
    public function get_file_num2($mother)
    {
        $this->db->where('mother_national_num',$mother);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
            return $query->row()->file_num;
        }else{
            return 0;
        }
    }

    public function get_father_name($mother)
    {
        $this->db->where('mother_national_num_fk',$mother);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->full_name;
        }else{
            return 0;
        }
    }
    public function get_khafe_name($id)
    {
        $this->db->where('k_num',$id);
        $query=$this->db->get('fr_sponsor');
        if($query->num_rows()>0)
        {
            return  $query->row()->k_name;
        }else{
            return 'غير محدد';
        }
    }

    public function get_file_status($mother_national_num)
    {
        $this->db->where('mother_national_num',$mother_national_num);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
            return  $query->row()->final_suspend;
        }else{
            return 0 ;
        }
    }
    public function get_from_fr_khafalats($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('fr_main_kafalat_details');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }

    }
}
?>