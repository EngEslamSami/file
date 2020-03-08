<?php
class Family_letter_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_mother_data()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('mother');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->m_card_source);
            }
            return $data;

        } else {
            return false;
        }


    }

    public function get_dest_card($id)
    {
        $this->db->where('id_setting', $id);

        $query = $this->db->get('family_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return false;
        }

    }

    public function get_f_member()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('f_members');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->member_card_source);
            }
            return $data;

        } else {
            return false;
        }


    }

    public function get_father_data()
    {
        $mother_num = $this->uri->segment(4);
        $this->db->where('mother_national_num_fk', $mother_num);

        $query = $this->db->get('father');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->dest_card = $this->get_dest_card($row->f_card_source);
            }
            return $data;

        } else {
            return false;
        }


    }

    public function get_all_option_letter($type)
    {
        $this->db->where('type', $type);

        $query = $this->db->get('letter_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

/*
    public function insert_mother_letter($type)
    {
        $data['mother_national_num_fk'] = $this->uri->segment(4);
        $data['father_national_num'] = $this->get_father_data()[0]->f_national_id;
        $data['letter_type'] = $type;
        $data['num_heir'] = 0;
        $data['salary_month'] = $this->input->post('salary');
        $data['date_in_letter'] = strtotime($this->input->post('date'));
        $data['total_daman'] = 0;
        $data['option_id_fk'] = $this->input->post('daman_option');

        $this->db->insert('all_letters_family', $data);

//        $data2['mother_national_num_fk']=$this->uri->segment(4);;
//        $data2['person_type']=$person_type;
//        $data2['person_national_num_fk']=$this->uri->segment(4);
//        $data2['option_id_fk']=$this->input->post('daman_option');
//        $data2['value']=$this->input->post('money');
//
//      $this->db->insert('dman_letter_details',$data2);
    }
*/
    public function insert_mother_letter($type)
    {
        $salary =0;
        if($this->input->post('daman_option')==8){
            $salary = $this->input->post('money')[0];
        }elseif($this->input->post('daman_option') ==9){
            $salary = $this->input->post('money')[1];
        }
        $data['mother_national_num_fk'] = $this->uri->segment(4);
        $data['father_national_num'] = $this->get_father_data()[0]->f_national_id;
        $data['letter_type'] = $type;
        $data['num_heir'] = 0;
        $data['salary_month'] = $salary;
        $data['date_in_letter'] = strtotime($this->input->post('date'));
        $data['total_daman'] = 0;
        $data['option_id_fk'] = $this->input->post('daman_option');

        $this->db->insert('all_letters_family', $data);


    }

    public function get_letters_by_type($type)
    {
        $mother_num = $this->uri->segment(4);

        $arr = array('letter_type' => $type, 'mother_national_num_fk' => $mother_num);
        $this->db->where($arr);

        $query = $this->db->get('all_letters_family');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_letters_by_mother_num()
    {
        $mother_num = $this->uri->segment(4);

        $arr = array('mother_national_num_fk' => $mother_num);
        $this->db->where($arr);
        $this->db->group_by('person_national_num_fk');

        $query = $this->db->get('dman_letter_details');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->full_name = $this->get_member_full_name($row->person_national_num_fk, $row->person_type);

                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_member_full_name($person_national_num, $type)
    {
        if ($type == 1) {
            $this->db->where('mother_national_num_fk', $person_national_num);

            $query = $this->db->get('mother');
            if ($query->num_rows() > 0) {
                return $query->row()->full_name;
            } else {
                return false;
            }
        } elseif ($type == 2) {
            $this->db->where('member_card_num', $person_national_num);

            $query = $this->db->get('f_members');
            if ($query->num_rows() > 0) {
                return $query->row()->member_full_name;
            } else {
                return false;
            }
        }
    }

    public function insert_dman_family_letter()
    {

        $sel = $this->input->post('option_select');


        $option = explode("-", $sel[0]);


        $count = count($this->input->post('id_hid'));
        for ($x = 0; $x < $count; $x++) {
            $data['mother_national_num_fk'] = $this->uri->segment(4);;
            $data['person_type'] = $option[1];
            $data['person_national_num_fk'] = $option[0];
            $data['option_id_fk'] = $this->input->post('id_hid')[$x];
            $data['value'] = $this->input->post('money')[$x];

            $this->db->insert('dman_letter_details', $data);

        }


    }

    public function insert_fatherRetirement($type)
    {
        $data['mother_national_num_fk'] = $this->uri->segment(4);
        $data['father_national_num'] = $this->get_father_data()[0]->f_national_id;
        $data['letter_type'] = $type;
        $data['num_heir'] = $this->input->post('num_heir');
        $data['salary_month'] = $this->input->post('salary');
        $data['date_in_letter'] = strtotime($this->input->post('date'));
        $data['total_daman'] = 0;
        $data['option_id_fk'] = $this->input->post('daman_option');

        $this->db->insert('all_letters_family', $data);

    }

    public function get_by_person_national_card($mother_national_num, $type, $person_national_card)
    {
        $arr = array('mother_national_num_fk' => $mother_national_num, 'person_national_num_fk' => $person_national_card);
        $this->db->where($arr);


        $query = $this->db->get('dman_letter_details');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->full_name = $this->get_member_full_name($row->person_national_num_fk, $row->person_type);
                $data[$x]->title = $this->get_option_name($row->option_id_fk);


                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_option_name($option)
    {
        $this->db->where('id', $option);

        $query = $this->db->get('letter_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->title;
        } else {
            return false;
        }
    }


    public function get_letters_by_type_id($mother_num,$type,$id)
    {
        $mother_num=$this->uri->segment(4);

        $arr=array('letter_type'=>$type,'mother_national_num_fk'=> $mother_num,'id'=>$id);
        $this->db->where($arr);

        $query=$this->db->get('all_letters_family');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }
    }



}