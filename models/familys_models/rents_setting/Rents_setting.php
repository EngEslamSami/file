<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 17/11/2018
 * Time: 12:17 م
 */

class Rents_setting extends CI_Model
{


public function all_family_categrpy(){

    $this->db->select('id,title');
    $all_category= $this->db->get('family_category')->result();

    return $all_category;
}

    public function all_rents(){


        $this->db->select('rents_setting.* ,family_category.title');
        $this->db->from('rents_setting');
        $this->db->join('family_category','rents_setting.fe2a_id_fk=family_category.id');
        $all_rents= $this->db->get()->result();

        return $all_rents;
    }
public function recent_rents(){

    $re=$this->db->select('*')->get('rents_setting')->result();

    $recent_rents=array();
     foreach($re as $row){

         array_push($recent_rents,$row->fe2a_id_fk);

     }

    return $recent_rents;
}

public function insert(){

   $data['fe2a_id_fk'] = $this->input->post('rent');
   $data['main_value']= $this->input->post('main');
    $data['increase_value']=$this->input->post('increase');


    $this->db->insert('rents_setting',$data);


}

public function update($id){


    $data['fe2a_id_fk'] = $this->input->post('rent');
    $data['main_value']= $this->input->post('main');
    $data['increase_value']=$this->input->post('increase');


    $this->db->where('id', $id);
    $this->db->update('rents_setting', $data);
}

public function delete($id){

    $this->db->where('id', $id);
    $this->db->delete('rents_setting');


}

}



?>