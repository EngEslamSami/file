<?php
class Program_model extends CI_Model{

    public function insert_program($file){
        $data['title']= $this->input->post('title');
        $data['details']= $this->input->post('details');
        $data['sahm_price']= $this->input->post('sahm_price');
        $data['sahm_amount']= $this->input->post('sahm_amount');
        $data['total']= $this->input->post('total');
        $data['date']= strtotime(date("Y-m-d"));
        if (isset($file) && !empty($file)){
            $data['img']= $file;
        }

        $this->db->insert('pr_programs',$data);
    }
    public function display_programs(){
        $query = $this->db->get('pr_programs');
        if ($query->num_rows() > 0){
            return $query->result();
        }
        return false;
    }

    public function update_program($id,$file){
        $data['title']= $this->input->post('title');
        $data['details']= $this->input->post('details');
        $data['sahm_price']= $this->input->post('sahm_price');
        $data['sahm_amount']= $this->input->post('sahm_amount');
        $data['total']= $this->input->post('total');
        $data['date']= strtotime(date("Y-m-d"));
        if (isset($file) && !empty($file)){
            $data['img']= $file;
        }

        $this->db->where('id',$id);
        $this->db->update('pr_programs',$data);
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('pr_programs');
        if ($query->num_rows() > 0){
            return $query->row();
        }
        return false;

    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_programs');
    }

    public function insert_cart()
    {
        $cart = $this->input->post('cartArray');

        if (!empty($cart) ) {
            foreach ($cart as $row) {

                //$data['program_id_fk'] = $row['pro_ID'];
                $data['sahm_amount'] = $row['count'];
                $data['sahm_price'] = $row['price'];
                $data['programe_name'] = $row['name'];
                $data['total'] = $row['price'] * $row['count'];
                $data['date'] = date("Y-m-d H:i:s");
                $data['country'] = $this->input->post('country');
                $data['user_name'] = $this->input->post('user_name');
                $data['city'] = $this->input->post('city');
                $data['phone'] = $this->input->post('phone');
                $data['email'] = $this->input->post('email');
                $this->db->insert('pr_web_cart', $data);

            }

        }
    }


    public function get_sahm_amount($name){
        $this->db->where('title',$name);
        $query = $this->db->get('pr_programs');
        if ($query->num_rows() > 0){
            return $query->row()->sahm_amount;
        }
        return false;

    }


}