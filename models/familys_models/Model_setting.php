<?php
class Model_setting extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="family_setting";
    }
    //==========================================
    public function add($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert($this->main_table,$data);
    }
    public function get_all_data($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function  get_type($type)
    {
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
            $this->db->where('id_setting',$id);
            $this->db->update($this->main_table,$data);
    }
    public function getById($id)
    {
      return $this->db->get_where($this->main_table, array('id_setting'=>$id))->row_array();
    }
    public function delete($id)
    {
     $this->db->where('id_setting', $id)->delete($this->main_table);
    }
    
    /****************************************************************************/
    
    
       public function add_data($table)
    {
        if($table=="socity_branch") {
            $data['title'] = $this->input->post('title');
        }

        if($table=="banks_settings") {
          // $data['title'] = $this->input->post('title');
          //  $data['account_num'] = $this->input->post('bank_account');
            
            $data['account_num_length'] = $this->input->post('account_num_length');
            $data['bank_code'] = $this->input->post('bank_code');
            $data['ar_name'] = $this->input->post('ar_name');
            $data['en_name'] = $this->input->post('en_name');
            $data['title'] = $this->input->post('ar_name');
        }

        $this->db->insert($table, $data);
    }
    public function get_data_branch($table)
    {
        $this->db->order_by('id','desc');
        return $this->db->get($table)->result();

    }
    public function delete_where_id($id,$table)
    {
        $this->db->where('id', $id)->delete($table);
    }
    public function get_where_id($id,$table)
    {
        return $this->db->get_where($table, array('id'=>$id))->row();
    }
    public function update_by_id($id,$table)
    {
        //$data['title']= $this->input->post('title');
         if($table=="socity_branch") {
            $data['title'] = $this->input->post('title');
        }

        if($table=="banks_settings") {
            //$data['title'] = $this->input->post('title');
             //$data['account_num'] = $this->input->post('bank_account');
           
            $data['account_num_length'] = $this->input->post('account_num_length');
            $data['bank_code'] = $this->input->post('bank_code');
            $data['ar_name'] = $this->input->post('ar_name');
            $data['en_name'] = $this->input->post('en_name');
            $data['title'] = $this->input->post('ar_name');
        }

        
        
        $this->db->where('id',$id);
        $this->db->update($table,$data);
    }
    /***************************************************/
    
    // ********************************************osama _________________

    public function add_files_option_updates()
    {
        $data['title'] = $this->input->post('file_update_name');
        $data['num_of_day'] = $this->input->post('num_of_days');


        $this->db->insert('files_option_updates', $data);


    }

    public function select_all_updates(){

        $this->db->order_by("id","ASC");
        $query = $this->db->get('files_option_updates');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }



  public function file_update_byId($id){
      $this->db->where('id',$id);
      $query = $this->db->get('files_option_updates');
      if ($query->num_rows() > 0) {
          return $query->row() ;
      }
      return false;
  }

    public function update_files_option_updates($id){

        $data['title'] = $this->input->post('file_update_name');
        $data['num_of_day'] = $this->input->post('num_of_days');

        $this->db->where('id',$id);
        $this->db->update('files_option_updates',$data);
    }



    public function delete_files_option_updates($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('files_option_updates');
    }



    /// วฯวัษ วแลฬัวมวส



    public function add_procedures_option_lagna()
    {
        $data['title'] = $this->input->post('option_name');

        $this->db->insert('procedures_option_lagna', $data);

    }


    public function select_all_lagnas(){

        $this->db->order_by("id","ASC");
        $query = $this->db->get('procedures_option_lagna');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function procedure_option_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('procedures_option_lagna');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }

    public function update_procedures_option_lagna($id){

        $data['title'] = $this->input->post('option_name');


        $this->db->where('id',$id);
        $this->db->update('procedures_option_lagna',$data);
    }

    public function delete_procedures_option_lagna($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('procedures_option_lagna');
    }

    public function select_time_work()
    {
        $query = $this->db->query('SELECT * from time_work_gameya_setting');
        return ($query->row())? $query->row() : null;
    }

    public function add_time_work()
    {
        $data['id'] = 1;
        $data['from'] = $this->input->post('from');
        $data['to'] = $this->input->post('to');

        $this->db->insert('time_work_gameya_setting', $data);
    }

    public function delete_timeWork()
    {

        return $this->db->empty_table('time_work_gameya_setting');
    }

    public function add_file_day_num()
    {
        $data['id'] = 1;
        $data['num_days'] = $this->input->post('num_day');


        $this->db->insert('files_option_updates_days', $data);
    }

    public function delete_file_day_num()
    {

        return $this->db->empty_table('files_option_updates_days');
    }

    public function select_file_day_num()
    {
        $query = $this->db->query('SELECT * from files_option_updates_days');
        return ($query->row())? $query->row() : null;
    }

    //_________________________________________osama**********************
    
    
    
        //_________________________________________New osama**********************

    public function select_person_ages(){
       $query =  $this->db->get("person_ages_setting");
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
        
    }




    public function add_person_ages_setting()
    {
      
        $data['from_age_female'] = $this->input->post('from_age_female');
        $data['to_age_female'] = $this->input->post('to_age_female');
        $data['from_age_male'] = $this->input->post('from_age_male');
        $data['to_age_male'] = $this->input->post('to_age_male');


        $this->db->insert('person_ages_setting', $data);
    }




    public function update_person_ages_setting($id)
    {

        $data['from_age_female'] = $this->input->post('from_age_female');
        $data['to_age_female'] = $this->input->post('to_age_female');
        $data['from_age_male'] = $this->input->post('from_age_male');
        $data['to_age_male'] = $this->input->post('to_age_male');

        $this->db->where('id',$id);
        $this->db->update('person_ages_setting', $data);
    }


    public function select_files_status_setting(){

        $query = $this->db->get('files_status_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }



    public function add_files_status_setting()
    {

        $data['title'] = $this->input->post('status_name');
        $data['color'] = $this->input->post('color');


        $this->db->insert('files_status_setting', $data);
    }



    public function files_status_settingById($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("files_status_setting");
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false; 
    }


    public function update_files_status_setting($id)
    {

        $data['title'] = $this->input->post('status_name');
        $data['color'] = $this->input->post('color');

        $this->db->where('id',$id);
        $this->db->update('files_status_setting', $data);
    }

    public function delete_files_status_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('files_status_setting');
    }
    
  /**************************************/
  
     public function add_procedures_option_transform()
    {
        $data['title'] = $this->input->post('option_name');

        $this->db->insert('process_procedures', $data);

    }  
    
	
    public function update_procedures_option_transform($id){

        $data['title'] = $this->input->post('option_name');


        $this->db->where('id',$id);
        $this->db->update('process_procedures',$data);
    }
	
	
	  public function delete_procedures_option_transform($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('process_procedures');
    }
	
	   public function select_option_transform(){

        $this->db->order_by("id","ASC");
        $query = $this->db->get('process_procedures');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
	
	
	  public function procedure_option_transform_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('process_procedures');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }  
/*******************************************************/

public function select_persons_status_setting(){

        $query = $this->db->get('persons_status_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }

    public function add_persons_status_setting()
    {

        $data['title'] = $this->input->post('status_name');
        $data['color'] = $this->input->post('color');


        $this->db->insert('persons_status_setting', $data);
    }


//files_status_setting
    public function persons_status_settingById($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("persons_status_setting");
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }


    public function update_persons_status_setting($id)
    {

        $data['title'] = $this->input->post('status_name');
        $data['color'] = $this->input->post('color');

        $this->db->where('id',$id);
        $this->db->update('persons_status_setting', $data);
    }

    public function delete_persons_status_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('persons_status_setting');
    }
    /************************************อวแวส วแรÝัวฯ************************************/    
    
    
        public function add_level($type)
    {
        if($type == 'tab_levels'){
            $data['from_id_fk'] = 0;
        } else if($this->input->post('from_id_fk')){
            $data['from_id_fk'] =$this->input->post('from_id_fk');
        }else {
            $data['from_id_fk']= $type;
        }
        $data['name']= $this->input->post('name');
        $this->db->insert("classrooms",$data);
    }


    public function update_level($id,$type)
    {
        if($this->input->post('from_id_fk')){
            $type =$this->input->post('from_id_fk');
        }
        $data['from_id_fk']= $type;
        $data['name']= $this->input->post('name');
        $this->db->where('id',$id);

        $this->db->update("classrooms",$data);
    }

 /*   public function select_levels($type){
        $this->db->where('from_id_fk',$type);
        $query =  $this->db->get("classrooms");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;
            }
            return $data;
        }
        return false;
    }*/
    
        public function select_levels(){
        $this->db->where('from_id_fk',0);
        $query =  $this->db->get("classrooms");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;
            }
            return $data;
        }
        return false;
    }

    public function select_classes(){
        $this->db->where('from_id_fk !=',0);
        $query =  $this->db->get("classrooms");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function deleteLevels($id){
        $this->db->where('id',$id);
        $this->db->delete('classrooms');
    }

    public function getLevels($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("classrooms");
        if ($query->num_rows() > 0) {
            return $query->row_array() ;
        }
        return false;

    }

   //====================================================================================================
   
     public function add_files_member_status_setting(){
        $data['title'] = $this->input->post('status_name');
        $data['color'] = $this->input->post('color');
        $this->db->insert('persons_status_setting', $data);
    }
    public function files_member_status_settingById($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("persons_status_setting");
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false; 
    }
    public function update_files_member_status_setting($id){
        $data['title'] = $this->input->post('status_name');
        $data['color'] = $this->input->post('color');
        $this->db->where('id',$id);
        $this->db->update('persons_status_setting', $data);
    }
    public function delete_files_member_status_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('persons_status_setting');
    }
    public function select_files_member_status_setting(){

        $query = $this->db->get('persons_status_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    
  /******************************************************/  
    
    public function insert_data_status()
{
    $data['title']=$this->input->post('reason');
    $data['type']=$this->input->post('type');
        $this->db->insert('family_reasons_settings',$data);
}


    public function get_persons_status_setting()
    {
        $this->db->group_by('type');
        $query=$this->db->get('family_reasons_settings')->result();
        $data=array();
        $x=0;
       foreach($query as $row)
       {
           $data[$x]=$row;
           $data[$x]->branch=$this->get_reasons($row->type);
           $x++;
       }
return $data;

    }
    public function get_reasons($type)
    {

        $this->db->where('type',$type);
        $query=$this->db->get('family_reasons_settings');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return 0;
        }
    }


    public function delete_from_persons_status_setting($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('family_reasons_settings');
    }
    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('family_reasons_settings');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return 0;
        }
    }
public function update_data_status($id)
{
    $data['title']=$this->input->post('reason');
    $data['type']=$this->input->post('type');
    $this->db->where('id',$id);
    $this->db->update('family_reasons_settings',$data);
}


/*****************************************************/


/*********************************************************/





    public function select_family_letter_setting(){

        $query = $this->db->get('family_letter_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }



    public function add_family_letter_setting()
    {

        $data['title'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');


        $this->db->insert('family_letter_setting', $data);
    }



    public function family_letter_settingById($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("family_letter_setting");
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }


    public function update_family_letter_setting($id)
    {

        $data['title'] = $this->input->post('title');

        $this->db->where('id',$id);
        $this->db->update('family_letter_setting', $data);
    }

    public function delete_family_letter_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('family_letter_setting');
    }

    /**************************************/







    
/*********************************************************/    
}// END CLass
?>