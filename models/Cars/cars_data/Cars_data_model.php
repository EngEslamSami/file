
<?php
class Cars_data_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "cars";
    }


    public function all_cars()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        $i =0;
        $data = $query->result();
        foreach ($query->result() as  $row) {
            $data[$i] = $row;
            $data[$i]->marka = $this->setting_name($row->b_car_marka);
            $data[$i]->traz = $this->setting_name($row->b_car_traz);
            $i++; }
        return $data;
        }
        return false;
    }
    public function select_last_code(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() > 0) {

                $data = $result[0]->b_car_code;

            return $data;
        }
        return 0;
    }



    public function setting_name($id)
    {
        return $this->db->get_where('cars_settings', array('id_setting'=>$id))->row_array()['title_setting'];
    }


    public function insert_car($img_file)
    {
        $data['b_car_code']             =$this->input->post('b_car_code');
        $data['b_car_marka']            =$this->input->post('b_car_marka');
        $data['b_car_traz']             =$this->input->post('b_car_traz');
        $data['b_car_model_year']       =$this->input->post('b_car_model_year');
        $data['b_fi_car_board_num']        =$this->input->post('b_fi_car_board_num');
        $data['b_se_car_board_num']        =$this->input->post('b_se_car_board_num');
        $data['b_car_color']            =$this->input->post('b_car_color');
        $data['b_car_structure_num']    =$this->input->post('b_car_structure_num');
        $data['b_car_fuel_fk']          =$this->input->post('b_car_fuel_fk');
        $data['b_car_img']              =$img_file;
        $data['b_date'] 		        = date("Y-m-d");
        $data['b_date_ar'] 		        = strtotime(date("Y-m-d"));
        $data['b_publisher']            = $_SESSION['user_id'];





        $data['malek_name']             =$this->input->post('malek_name');
        $data['malek_card_name']            =$this->input->post('malek_card_name');
        $data['actual_user_name']             =$this->input->post('actual_user_name');
        $data['actual_user_card_num']       =$this->input->post('actual_user_card_num');
        $data['tsalsol_num']        =$this->input->post('tsalsol_num');
        $data['reg_type']        =$this->input->post('reg_type');
    $data['dep_id']        =$this->input->post('dep_id');



        $this->db->insert($this->table,$data);
    }


    public function update_car($img_file,$id)
    {
        $data['b_car_code']             =$this->input->post('b_car_code');
        $data['b_car_marka']            =$this->input->post('b_car_marka');
        $data['b_car_traz']             =$this->input->post('b_car_traz');
        $data['b_car_model_year']       =$this->input->post('b_car_model_year');
     //   $data['b_car_board_num']        =$this->input->post('b_car_board_num');
        $data['b_car_color']            =$this->input->post('b_car_color');
        $data['b_car_structure_num']    =$this->input->post('b_car_structure_num');
        $data['b_car_fuel_fk']          =$this->input->post('b_car_fuel_fk');
        
        $data['b_fi_car_board_num']        =$this->input->post('b_fi_car_board_num');
        $data['b_se_car_board_num']        =$this->input->post('b_se_car_board_num');
        
        
        if($img_file!=''){
            $data['b_car_img']          =$img_file;
        }
        $data['b_date'] 		        = date("Y-m-d");
        $data['b_date_ar'] 		        = strtotime(date("Y-m-d"));
        $data['b_publisher']            = $_SESSION['user_id'];

        $data['malek_name']             =$this->input->post('malek_name');
        $data['malek_card_name']            =$this->input->post('malek_card_name');
        $data['actual_user_name']             =$this->input->post('actual_user_name');
        $data['actual_user_card_num']       =$this->input->post('actual_user_card_num');
        $data['tsalsol_num']        =$this->input->post('tsalsol_num');
        $data['reg_type']        =$this->input->post('reg_type');
           $data['dep_id']        =$this->input->post('dep_id');




        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }
    public function updateDates($id)
    {
        $data['date_end_estmara']       =$this->input->post('date_end_estmara');
        $data['date_end_fahsdawry']     =$this->input->post('date_end_fahsdawry');
        $data['date_end_tafweal']       =$this->input->post('date_end_tafweal');
        $data['date_end_tash3ol']       =$this->input->post('date_end_tash3ol');

        $data['date_date'] 		        = date("Y-m-d");
        $data['date_date_ar'] 		    = strtotime(date("Y-m-d"));
        $data['date_publisher']         = $_SESSION['user_id'];


        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }


    public function updateInsurance($id)
    {
        $data['insurance_company_fk']      =$this->input->post('insurance_company_fk');
        $data['insurance_type_fk']         =$this->input->post('insurance_type_fk');
        $data['insurance_wathiqa_num']     =$this->input->post('insurance_wathiqa_num');
        $data['insurance_start_date']      =$this->input->post('insurance_start_date');
        $data['insurance_end_date']        =$this->input->post('insurance_end_date');
        $data['insurance_value']           =$this->input->post('insurance_value');


        $data['insurance_date'] 		        = date("Y-m-d");
        $data['insurance_date_s'] 		        = strtotime(date("Y-m-d"));
        $data['insurance_publisher']            = $_SESSION['user_id'];


        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }


    public function carById($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->marka = $this->setting_name($data->b_car_marka);
            $data->traz = $this->setting_name($data->b_car_traz);
            return $data;
        }
        return false;
    }

    public function deleteCar($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);

    }


   //===============================
    public function attachment($id,$files)
    {
       $count=count($files);
        for($x=0;$x<$count;$x++) {
        $data['car_id_fk']      =$id;
        $data['morfaq_id_fk']      =$this->input->post('morfaq_id_fk')[$x];


        $data['img_file']      =$files[$x];
        $data['end_date']      =$this->input->post('end_date')[$x];
        $data['alert_type']      =$this->input->post('alert_type')[$x];
        $data['num']      =$this->input->post('num')[$x];
        $data['num_days']      =($this->input->post('num')[$x]*  $data['alert_type'] );
            $this->db->insert('cars_attachments',$data);
    }
    }



    public function get_by_id($id)
    {
        $this->db->where('car_id_fk',$id);
        $query=$this->db->get('cars_attachments');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->name=$this->get_name($row->morfaq_id_fk);
                $x++;

            }
            return $data;
        }else{
            return false;
        }
    }
    public  function get_name($id)
    {
        $this->db->where('id_setting',$id);
        $query=$this->db->get('cars_settings');
        if($query->num_rows()>0)
        {
       return $query->row()->title_setting;
        }else{
            return "ÛíÑ ãÍÏÏ";
        }
    }

public function delete_img($id)
{
    $this->db->where('id',$id);
    $this->db->delete('cars_attachments');
}
  
  /*************************************************************/
      public function updateAttachment($car_id,$id ,$files)
    {

            $data['car_id_fk']      =$car_id;
            $data['morfaq_id_fk']      =$this->input->post('morfaq_id_fk');


if($files !=''){
 $data['img_file']      =$files;   
}

            
            $data['end_date']      =$this->input->post('end_date');
            $data['alert_type']      =$this->input->post('alert_type');

            $data['num_days']      =($this->input->post('num')*  $data['alert_type'] );

            $this->db->where('id',$id);
            $this->db->update('cars_attachments',$data);


    }  

}
