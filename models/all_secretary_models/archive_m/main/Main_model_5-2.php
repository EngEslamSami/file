<?php

class Main_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }
    public function select_new_wared()
    {
       
        $this->db->select('*');
        $this->db->from('arch_wared');
        $this->db->join('arch_wared_history', 'arch_wared_history.wared_id_fk = arch_wared.id');
        $this->db->where(array('arch_wared_history.esthkak_date' => date('Y-m-d')));
        
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_new_sader()
    {
       
        $this->db->select('*');
        $this->db->from('arch_sader');
        $this->db->join('arch_sader_history', 'arch_sader_history.sader_id_fk = arch_sader.id');
        $this->db->where(array('arch_sader_history.esthkak_date' => date('Y-m-d')));
        
        $query = $this->db->get()->result();
        return $query;
    }
    
    
    public function select_wared_mostalm()
    {
       
        $this->db->select('*');
        $this->db->from('arch_wared');
        $this->db->join('arch_wared_history', 'arch_wared_history.wared_id_fk = arch_wared.id');
     
        
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_sader_mostalm()
    {
       
        $this->db->select('*');
        $this->db->from('arch_sader');
        $this->db->join('arch_sader_history', 'arch_sader_history.sader_id_fk = arch_sader.id');
       
        
        $query = $this->db->get()->result();
        return $query;
    }
    //nagwa
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                if($table=='arch_sader_history'){
                    $data_table = 'arch_sader';
                    $row_id = 'sader_id_fk' ;
                } elseif ($table=='arch_wared_history'){
                    $data_table = 'arch_wared';
                    $row_id = 'wared_id_fk' ;

                }
                else{
                    $data_table='';
                    $row_id ='';
                }
                $data[$i]->data = $this->get_tahwel_data($data_table,array('id'=>$row->$row_id));
                $i++;
            }
            return $data;

        }else{
            return false;
        }
    }
    public  function get_tahwel_data($table,$arr){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->row();
        } else{
            return false;
        }

    }
    //yara
    public function get_updates($table,$arr){
        $this->db->where($arr);
       
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_updates_wared($table,$arr,$from_date,$to_date,$reply_moamla,$no3_khtab,$title_name,$tarekt_estlam_name,$is_secret,$awlawya,$need_follow){
        $this->db->where($arr);
        if(!empty($from_date))
        {
        $this->db->where('tsgeel_date >=',$from_date);
        }
        if(!empty($to_date))
        {
        $this->db->where('tsgeel_date <=',$to_date);
        }
        if(!empty($reply_moamla))
        {
        $this->db->where('reply_moamla',$reply_moamla);
        }
        if(!empty($no3_khtab))
        {
        $this->db->where('no3_khtab_fk',$no3_khtab);
        }
        if(!empty($title_name))
        {
        $this->db->where('title_id_fk',$title_name);
        }
        if(!empty($tarekt_estlam_name))
        {
        $this->db->where('tarekt_estlam',$tarekt_estlam_name);
        }
        if(!empty($is_secret))
        {
        $this->db->where('is_secret',$is_secret);
        }
        if(!empty($awlawya))
        {
        $this->db->where('awlawya',$awlawya);
        }
        if(!empty($need_follow))
        {
        $this->db->where('need_follow',$awlawya);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }

    public function get_updates_sader($table,$arr,$from_date,$to_date,$reply_moamla,$no3_khtab,$title_name,$tarekt_estlam_name,$is_secret,$awlawya,$need_follow){
        $this->db->where($arr);
        if(!empty($from_date))
        {
        $this->db->where('tasgel_date >=',$from_date);
        }
        if(!empty($to_date))
        {
        $this->db->where('tasgel_date <=',$to_date);
        }
        if(!empty($reply_moamla))
        {
        $this->db->where('mo3mla_reply',$reply_moamla);
        }
        if(!empty($no3_khtab))
        {
        $this->db->where('no3_khtab_fk',$no3_khtab);
        }
        if(!empty($title_name))
        {
        $this->db->where('title_id_fk',$title_name);
        }
        if(!empty($tarekt_estlam_name))
        {
        $this->db->where('tarekt_ersal_fk',$tarekt_estlam_name);
        }
        if(!empty($is_secret))
        {
        $this->db->where('is_secret',$is_secret);
        }
        if(!empty($awlawya))
        {
        $this->db->where('awlawia_fk',$awlawya);
        }
        if(!empty($need_follow))
        {
        $this->db->where('need_follow',$awlawya);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }











}
?>