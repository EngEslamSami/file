<?php
class Prisoner extends CI_Model
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

    public function select_all_interviews(){
        $this->db->select('interview.*,prisoners.id as prisoners_id,prisoners.nazeel_name');
        $this->db->from("interview");
        $this->db->join('prisoners', 'prisoners.id = interview.prisoner_id');
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
    //   var_dump($_POST); die;


      //  $data['asnaf']=$this->input->post('money_first');
            $data['interview_id'] = $this->input->post('interview_id');

            $data['prisoner_id'] = $this->input->post('prisoner_id');
            $data['help_id'] = $this->input->post('help_id');
        if($data['help_id'] ==1){
            $data['asnaf'] = $this->input->post('money_first');
        }elseif($data['help_id'] ==2){
            $array_ids = array();
            $s=0; foreach ($this->input->post("select-all[]") as $key => $value) { $s++;
                $post_in = explode("-", $value);
                $array_ids[$post_in[0]] = $this->input->post("amount".$s);
            }
            $data['asnaf'] =  serialize($array_ids);
        }
            $data['tbro3_type'] = $this->input->post('tbro3_type');
            $data['emp_id'] = $this->input->post('emp_id');
            $data['sakn'] = $this->input->post('sakn');
            $data['home'] = $this->input->post('home');
            $data['research'] = $this->input->post('research');
            $data['date_dev'] = $this->input->post('date_dev');
            $data['confirm'] = 0;
            $data['date'] = strtotime(date("Y-m-d",time()));
            $data['date_s'] = time();
            $this->db->insert('interview',$data);

    }



    public function getById($id){
        $h = $this->db->get_where('interview', array('id'=>$id));
        return $h->row_array();
    }
    /**
     * ===================================================================================================
     *
     *
     */


    public function update($id){
       // var_dump($_POST); die;

        $update['interview_id'] = $this->input->post('interview_id');
        $update['help_id'] = $this->input->post('help_id');
        if($update['help_id'] ==1){
            $update['asnaf'] = $this->input->post('money_first');
        }elseif($update['help_id'] ==2){
            $array_ids = array();
            $s=0; foreach ($this->input->post("select-all[]") as $key => $value) { $s++;
                $post_in = explode("-", $value);
                $array_ids[$post_in[0]] = $this->input->post("amount".$s);
            }
            $update['asnaf'] =  serialize($array_ids);
        }
        $update['prisoner_id'] = $this->input->post('prisoner_id');

        $update['tbro3_type'] = $this->input->post('tbro3_type');
        $update['emp_id'] = $this->input->post('emp_id');
        $update['sakn'] = $this->input->post('sakn');
        $update['home'] = $this->input->post('home');
        $update['research'] = $this->input->post('research');
        $update['date_dev'] = $this->input->post('date_dev');
        $update['confirm'] = 0;
        $update['date'] = strtotime(date("Y-m-d",time()));
        $update['date_s'] = time();
        $this->db->where('id', $id);
        $this->db->update('interview',$update);
    }

    public function delete($id){
        $this->db->where(array("id"=>$id));
        $this->db->delete("interview");
    }


}//END CLASS

