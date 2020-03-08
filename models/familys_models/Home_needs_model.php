<?php

class Home_needs_model extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }
   
   /* public  function  insert($mother_national_num){


         $count=1;
        for ($a=0;$a<$_POST['max'];$a++){

          $data['mother_national_num_fk'] = $mother_national_num;
            $data['h_home_device_id_fk'] = $this->input->post('h_home_device_id_fk'.$count);
            $data['h_count'] = $this->input->post('h_count'.$count);
             $data['h_note'] = $this->input->post('h_note'.$count);
            $this->db->insert('home_needs',$data);
            $count++;
        }

    }*/

    public  function  insert($mother_national_num){
 
         $count=1;
        for ($a=0;$a<sizeof($_POST['h_house_device_id_fk']);$a++){

            $data['mother_national_num_fk'] = $mother_national_num;
            $data['h_home_device_id_fk'] = $this->input->post('h_house_device_id_fk')[$a];
            $data['h_count'] = $this->input->post('h_count')[$a];
            $data['h_note'] = $this->input->post('h_note')[$a];
            $this->db->insert('home_needs',$data);
            $count++;
        }

    }


    //=======================================================================
    public  function  update($mother_id){
        for($a =1;$a<=$_POST['max_edit'];$a++){
           $input_post=$this->input->post('d_house_device_id_fk'.$a);
            if(!empty($input_post)) {
                $data['d_house_device_id_fk'] = $this->input->post('d_house_device_id_fk' . $a);
            }
            $out=$this->input->post('d_count'.$a);
            if(!empty($out)) {
            $data['d_count']= $this->input->post('d_count'.$a);
            }
            $out2=$this->input->post('d_house_device_status_id_fk'.$a);
            if(!empty($out2)) {
            $data['d_house_device_status_id_fk']= $this->input->post('d_house_device_status_id_fk'.$a);
            }
            if(!empty($this->input->post('d_note'.$a))) {
            $data['d_note']=$this->input->post('d_note'.$a);
            }
            if($_POST['type'.$a] == 'edit') {
                $this->db->where('id', $_POST['id'.$a]);
                $this->db->update('devices', $data);
            }
        }
               $d =$_POST['max'] ;
        for($s = 0; $s<$_POST['max_insert'];$s++){
            $d++;
                if ($_POST['type' . $d] == 'insert') {
                    $v['mother_national_num_fk']=$mother_id;
                    $v['d_house_device_id_fk'] = $this->chek_Null($this->input->post('d_house_device_id_fk' . $d));
                    $v['d_count'] = $this->chek_Null($this->input->post('d_count' . $d));
                    $v['d_house_device_status_id_fk'] = $this->chek_Null($this->input->post('d_house_device_status_id_fk' . $d));
                    $v['d_note'] = $this->chek_Null($this->input->post('d_note' . $d));
               $this->db->insert('devices', $v);
                }


        }




    }
//===============================================================
    public function delete($from,$id){
        $this->db->where('id',$id);
        $this->db->delete($from);
    }
//===============================================================    

//=========================================================
    public function select_where($mother_national_num_fk){
    //    $this->db->select('*');
           $this->db->select('home_needs.* , home_needs.id as home_needs_id ,
                              products_sub.* ,
                              products_main.name as main_name ');
        $this->db->from('home_needs');
        $this->db->join('products  products_sub',"products_sub.id=home_needs.h_home_device_id_fk","left");
        $this->db->join('products  products_main',"products_main.id=products_sub.from_id","left");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }




//=========================================================




    /*******************************ahmed*/


    public function select_all(){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {

                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {

                                                $data[$row5->id] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }
            return $data;
        }

    }



    public function select_disabled(){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    $var['dis'.$row->id] = 'disabled';
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {
                            $var['dis'.$row2->id] = 'disabled';
                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    $var['dis'.$row3->id] = 'disabled';
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `products` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {
                                                $data[$row5->id] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }

            return $var;
        }

    }
    
    /************************************************************************************/
    //===================================
    public function select_Max_value()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('level','desc');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result()[0]->level;
        }else{
            return 0;
        }

    }


public function get_sub($id)
{
    $this->db->where('from_id',$id);
    $query= $this->db->get('products');
    if($query->num_rows()>0)
    {
      return $query->result();
    }else{
        return false;
    }
}


    //=====================================


    public function get_products()
    {
        $this->db->where('from_id',0);
       $query= $this->db->get('products')->result();
        $data=array();
        $x=0;
        foreach($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->branch=$this->get_branch($row->id);
            $x++;
        }
        return $data;
    }

    public function get_branch($id)
    {
        $this->db->where('from_id',$id);
        $query= $this->db->get('products')->result();
        $data=array();
        $x=0;
        foreach($query as $row)
        {
                 $data[$x]=$row;

                $data[$x]->sub_branch=$this->get_aaa($row->id);

               // $data[$x]->branch43=$this->get_aaa(2);


            $x++;
        }
        return $data;
    }
    public function get_aaa($i)
    {
        $this->db->where('from_id',$i);
        $query= $this->db->get('products')->result();
        $data=array();
        $x=0;
        foreach($query as $row){

            $data[$x]=$row;
           $data[$x]->sub_sub_branch=$this->get_aaa($row->id);
            $x++;
        }
        return $data;
    }
    
    
    
    
    
    
}// END CLASS

