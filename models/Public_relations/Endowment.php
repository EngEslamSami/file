<?php



class Endowment extends CI_Model

{
    public function display($id){

        $this->db->where('user_id',$id);

        $query=$this->db->get('users');

        return $query->row_array();

    }
    public function __construct()

    {

        parent:: __construct();

    }

    public  function record_count(){

        return $this->db->count_all("endowment");

    }

    public  function  insert($file1,$file2){

        $data['end_title']=$this->input->post('end_title');
        $data['end_photo']=$file1;
        $data['end_pdf']=$file2;
        $data['date_s']=time();
        $data['date'] = strtotime(date("m/d/Y"));
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('endowment',$data);

    }

    //////////////////////////

///////////selecting data//////////////////

    public function select($limit){

        $this->db->select('*');

        $this->db->from('endowment');

        $this->db->order_by('id','DESC');

        $this->db->limit($limit);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }

   

///////update/////////

    public function getById($id){

        $h = $this->db->get_where('endowment', array('id'=>$id));

        return $h->row_array();

    }

    public function update($id,$file1,$file2){

        

        $h = $this->db->get_where('endowment', array('id'=>$id));

        $row = $h->row_array();

        

        $update = array(

            'end_title'=>$this->input->post('end_title') ,

        );
        
          if($file1 !=''){
            $update['end_photo'] = $file1;
        }
           if($file2 !=''){
            $update['end_pdf'] = $file2;
        }


        $this->db->where('id', $id);

        if($this->db->update('endowment',$update)) {

            return true;

        }else{

            return false;

        }

    }


    /////////////////////// Suspend

    public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }

        $this->db->where('id', $id);
        if($this->db->update('endowment',$update)) {
            return true;
        }else{
            return false;
        }
    }
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('endowment');

    }

 public function select_all_limit($start,$limit){
        $this->db->select('*');
        $this->db->from('endowment');
        $this->db->limit($limit, $start);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }



}