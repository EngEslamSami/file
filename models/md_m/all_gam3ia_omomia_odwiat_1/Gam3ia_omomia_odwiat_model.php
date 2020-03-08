<?php
class Gam3ia_omomia_odwiat_model extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    public  function insert_gam3ia_omomia_odwiat($files,$id){


        if(!empty($files)){
            foreach ($files as  $name =>$file){
                if(!empty($file)){
                    $data[$name] = $this->chek_Null($file);
                }
            }

        }



        //$array =explode("/",$data['birth_date_h']);
       // $data['birth_date_h_y'] = $this->chek_Null($array[1]);

        // $data['rkm_odwia'] = $this->chek_Null($this->input->post('rkm_odwia'));

        $data['no3_odwia_fk'] = $this->chek_Null($this->input->post('no3_odwia_fk'));
        $no3_odwia_fk = $this->input->post('no3_odwia_fk');

        if ($no3_odwia_fk ==102 || $no3_odwia_fk ==103){
            $data['rkm_odwia_full'] = $this->chek_Null($this->input->post('rkm_odwia'));
           // $rkm_odwia = $this->input->post('rkm_odwia');
           $array =explode("/",$data['rkm_odwia_full']);
            $data['rkm_odwia'] = $this->chek_Null($array[0]);


        }
        else{
            $data['rkm_odwia_full'] ='';
            $data['rkm_odwia'] =$this->chek_Null($this->input->post('rkm_odwia'));
        }
       //
        $data['member_id_fk']= $id;
        $no3_odwia_title= $this->get_id('md_settings','id_setting',$no3_odwia_fk,'title_setting');
        $data['no3_odwia_title'] = $no3_odwia_title;
        $data['qrar_rkm'] = $this->chek_Null($this->input->post('qrar_rkm'));
        $data['qrar_date_m'] = $this->chek_Null($this->input->post('qrar_date_m'));
        $data['qrar_date_h'] = $this->chek_Null($this->input->post('qrar_date_h'));
        $data['subs_value'] = $this->chek_Null($this->input->post('subs_value'));
        $data['subs_from_date_m'] = $this->chek_Null($this->input->post('subs_from_date_m'));
        $data['subs_from_date_h'] = $this->chek_Null($this->input->post('subs_from_date_h'));
        $data['subs_to_date_m'] = $this->chek_Null($this->input->post('subs_to_date_m'));
        $data['subs_to_date_h'] = $this->chek_Null($this->input->post('subs_to_date_h'));
        $data['from_date'] =  strtotime($this->chek_Null($this->input->post('subs_from_date_m')));
        $data['to_date'] =  strtotime($this->chek_Null($this->input->post('subs_to_date_m')));
        $data['update_date'] =  strtotime($this->chek_Null($this->input->post('update_date')));
        $data['update_date_m'] = $this->chek_Null($this->input->post('update_date_m'));
        $data['update_date_h'] = $this->chek_Null($this->input->post('update_date_h'));
        $data['pay_method_fk'] = $this->chek_Null($this->input->post('pay_method_fk'));
        $pay_method_fk = $this->input->post('pay_method_fk');
        if ($pay_method_fk==1){
            $data['pay_method_title'] = "نقدي";
        }
        elseif ($pay_method_fk==2){
            $data['pay_method_title'] = "تحويل";
        }
        elseif ($pay_method_fk==3){
            $data['pay_method_title'] = "شيك";
        }
        elseif ($pay_method_fk==4){
            $data['pay_method_title'] = "بنك";
        }
        if ($this->input->post('bank_id_fk')){
            $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
            $bank_id_fk = $this->input->post('bank_id_fk');
            $bank_title= $this->get_id('banks_settings','id',$bank_id_fk,'title');
            $data['bank_title'] = $bank_title;

        }
        if ($this->input->post('rkm_hesab')){
            $data['rkm_hesab'] = $this->chek_Null($this->input->post('rkm_hesab'));
        }

        $data['odwia_status_fk'] = $this->chek_Null($this->input->post('odwia_status_fk'));
        if ($this->input->post('odwia_status_fk')==0){
            $data['odwia_status_title'] = "غير نشط";
        }
        elseif ($this->input->post('odwia_status_fk')==1){
            $data['odwia_status_title'] = " نشط";
        }
       // print_r($data);
      $num = $this->get_num($id);
        if ($num == 0){
            $this->db->insert('md_all_gam3ia_omomia_odwiat', $data);
        }
        else{
            $this->db->where('member_id_fk',$id);

            $this->db->update('md_all_gam3ia_omomia_odwiat', $data);

        }


    }
    public function get_num($id){
        $this->db->where('member_id_fk',$id);
        $query = $this->db->get('md_all_gam3ia_omomia_odwiat');

        if ($query->num_rows() >0){
            return $query->num_rows();
        }
        else {
            return 0;
        }
    }



    public function GetFromGeneral_assembly_settings($type){
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }


//    public function getById($id){
//
//        $this->db->select('*');
//        $this->db->from('md_all_gam3ia_omomia_members');
//        $this->db->where('id',$id);
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        }else{
//            return false;
//        }
//
//    }
//
public function getById($id){
    $this->db->where('member_id_fk',$id);
    $query = $this->db->get('md_all_gam3ia_omomia_odwiat');
    if ($query->num_rows() >0 ){
        $i=0;
        foreach ($query->result() as $row){
            $data[$i]= $row;
            $data[$i]->members= $this->get_member_data($row->member_id_fk);


            $i++;
        }
        return $data;
      //  return $query->row();
    }
    return 0;
}

    public function get_member_data($id){
        $this->db->where('id',$id);
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows()>0){
            return $query->row();
        }
        return 0;
    }

    public function get_id($table,$where,$value,$select){
        $query = $this->db->get_where($table,array($where =>$value));
        if ($query->num_rows()>0){
            return $query->row()->$select;
        }
        return 0;
    }

    public function get_odwia_rkm(){

      $query=  $this->db->get('md_all_gam3ia_omomia_odwiat');
      if ($query->num_rows() >0){
            return $query->row()->rkm_odwia;
        }
        else {
            return 0;
        }
    }

}