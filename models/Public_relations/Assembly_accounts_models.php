<?php



class Assembly_accounts_models extends CI_Model

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

        return $this->db->count_all("assembly_accounts");



    }






    public  function  insert(){

        $data['account_name']=$this->input->post('account_name');
        $data['account_number']=$this->input->post('account_number');
        $data['date_s']=time();
        $data['date'] = strtotime(date("m/d/Y"));
        $data['publisher'] = $_SESSION['user_id'];
        $this->db->insert('assembly_accounts',$data);

    }

    //////////////////////////

///////////selecting data//////////////////

    public function select($limit){

        $this->db->select('*');

        $this->db->from('assembly_accounts');

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

        $h = $this->db->get_where('assembly_accounts', array('id'=>$id));

        return $h->row_array();

    }

    public function update($id){

        

        $h = $this->db->get_where('assembly_accounts', array('id'=>$id));

        $row = $h->row_array();

        

        $update = array(

            'account_name'=>$this->input->post('account_name') ,

            'account_number'=>$this->input->post('account_number') 

        );

        $this->db->where('id', $id);

        if($this->db->update('assembly_accounts',$update)) {

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
        if($this->db->update('assembly_accounts',$update)) {
            return true;
        }else{
            return false;
        }
    }
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('assembly_accounts');

    }

 public function select_all_limit($start,$limit){
        $this->db->select('*');
        $this->db->from('Assembly_accounts');
        $this->db->limit($limit, $start);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }



}