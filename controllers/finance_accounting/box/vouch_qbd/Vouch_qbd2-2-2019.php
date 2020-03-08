<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_qbd extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in') == 0){
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('Difined_model');
    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


 public function convert_number($number)
    {

        if (($number < 0) || ($number > 999999999999))
        {
            throw new Exception("العدد خارج النطاق");
        }
        $return="";
        //convert number into array of (string) number each case
        // -------number: 121210002876-----------//
        // 	0		1		2		3  //
        //'121'	  '210'	  '002'	  '876'
        $english_format_number = number_format($number);
        $array_number=explode(',', $english_format_number);
        //convert each number(hundred) to arabic
        for($i=0; $i<count($array_number); $i++){
            $place=count($array_number) - $i;
            $return .= $this->convert($array_number[$i], $place);
            if(isset($array_number[($i + 1)]) && $array_number[($i + 1)]>0)  $return .= ' و';
        }
        return $return;
    }
    private function convert($number, $place){
        // take in charge the sex of NUMBERED
        $sex='female';
        //the number word in arabic for masculine and feminine
        $words = array(
            'male'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'أحد عشر','12' => 'إثني عشر','13' => 'ثلاثة عشر','14' => 'أربعة عشر','15' => 'خمس عشر',
                '16' => 'ستة عشر','17' => 'سبعة عشر','18' => 'ثمانية عشر','19' => 'تسعة عشر','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            ),
            'female'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنتان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'إحدى عشرة','12' => 'إثني عشر','13' => 'ثلاث عشرة','14' => 'أربع عشرة','15' => 'خمسة عشرة',
                '16' => 'ستة عشرة','17' => 'سبعة عشرة','18' => 'ثمانية عشرة','19' => 'تسعة عشرة','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            )
        );
        //take in charge the different way of writing the thousands and millions ...
        $mil = array(
            '2'=>array('1'=>'ألف', '2'=>'ألفان', '3'=>'آلاف'),
            '3'=>array('1'=>'مليون', '2'=>'مليونان', '3'=>'ملايين'),
            '4'=>array('1'=>'مليار', '2'=>'ملياران', '3'=>'مليارات')
        );

        $mf = array('1'=>$sex, '2'=>'male', '3'=>'male', '4'=>'male');
        $number_length = strlen((string)$number);
        if($number == 0) return '';
        else if($number[0]==0){
            if($number[1]==0) $number=(int)substr($number, -1);
            else $number=(int)substr($number, -2);
        }
        switch($number_length){
            case '1': {
                switch($place){
                    case '1':{
                        $return = $words[$mf[$place]][$number];
                    }
                        break;
                    case '2':{

                        if($number==1) $return = 'ألف';
                        else if($number==2) $return = 'ألفان';
                        else{
                            $return = $words[$mf[$place]][$number]. ' آلاف';
                        }
                    }
                        break;
                    case '3':{
                        if($number==1) $return = 'مليون';
                        else if($number==2) $return = 'مليونان';
                        else $return = $words[$mf[$place]][$number]. ' ملايين';
                    }
                        break;
                    case '4':{
                        if($number==1) $return = 'مليار';
                        else if($number==2) $return = 'ملياران';
                        else $return = $words[$mf[$place]][$number]. ' مليارات';
                    }
                        break;
                }
            }
                break;
            case '2': {
                if(isset($words[$mf[$place]][$number])) $return = $words[$mf[$place]][$number];
                else{
                    $twoy=$number[0] * 10;
                    $ony=$number[1];
                    $return = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                }
                switch($place){
                    case '2':{
                        $return .= ' ألف';
                    }
                        break;
                    case '3':{
                        $return .= ' مليون';
                    }
                        break;
                    case '4':{
                        $return .= ' مليار';
                    }
                        break;
                }
            }
                break;
            case '3':{
                if(isset($words[$mf[$place]][$number])){
                    $return = $words[$mf[$place]][$number];
                    if($number == 200) $return = 'مائتان';
                    switch($place){
                        case '2':{
                            $return .= ' ألف';
                        }
                            break;
                        case '3':{
                            $return .= ' مليون';
                        }
                            break;
                        case '4':{
                            $return .= ' مليار';
                        }
                            break;
                    }
                    return $return;
                }
                else{
                    $threey=$number[0] * 100;
                    if(isset($words[$mf[$place]][$threey])){
                        $return = $words[$mf[$place]][$threey];
                    }
                    $twoyony=$number[1] * 10 + $number[2];
                    if($twoyony==2){
                        switch($place){
                            case '1': $twoyony=$words[$mf[$place]]['2']; break;
                            case '2': $twoyony='ألفان'; break;
                            case '3': $twoyony='مليونان'; break;
                            case '4': $twoyony='ملياران'; break;
                        }
                        if($threey!=0){
                            $twoyony='و'.$twoyony;
                        }
                        $return = $return.' '.$twoyony;
                    }
                    else if($twoyony==1){
                        switch($place){
                            case '1': $twoyony=$words[$mf[$place]]['1']; break;
                            case '2': $twoyony='ألف'; break;
                            case '3': $twoyony='مليون'; break;
                            case '4': $twoyony='مليار'; break;
                        }
                        if($threey!=0){
                            $twoyony='و'.$twoyony;
                        }
                        $return = $return.' '.$twoyony;
                    }

                    else{
                        if(isset($words[$mf[$place]][$twoyony])) $twoyony = $words[$mf[$place]][$twoyony];
                        else{
                            $twoy=$number[1] * 10;
                            $ony=$number[2];
                            $twoyony = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                        }
                        if($twoyony!='' && $threey!=0) $return= $return.' و'.$twoyony;
                        switch($place){
                            case '2':{
                                $return .= ' ألف';
                            }
                                break;
                            case '3':{
                                $return .= ' مليون';
                            }
                                break;
                            case '4':{
                                $return .= ' مليار';
                            }
                                break;
                        }
                    }
                }
            }
                break;
        }
        return $return;
    }
	
	



	public function index($id=false) // finance_accounting/box/vouch_qbd/Vouch_qbd
	{

        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));
        $data['records'] = $this->Vouch_qbd_model->getAllVouchQbd();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
      //  $data['last_id'] = $this->Vouch_qbd_model->select_last_id();
         $data['last_id'] = $this->Vouch_qbd_model->select_last_rkm();
        
        if($id != 0){
            $data['result'] = $this->Vouch_qbd_model->findById($id);
        }
      //  $data['box_date'] = $this->Difined_model->getById('dalel',24);
          $data['box_date'] = $this->Vouch_qbd_model->get_hesab_data(1,1);  
        
        $data['tree'] = $this->buildTree($records);
        
        
        $data['all_qabd'] = $this->Vouch_qbd_model->get_all_qabds();
        $data['all_sarf'] = $this->Vouch_qbd_model->get_all_sarf();
        
         $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
        
        
        
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
        
        
        
		$data['title'] = 'إضافة سند قبض';
        $data['subview'] = 'admin/finance_accounting/box/vouch_qbd/vouch_qbd';
        $this->load->view('admin_index', $data);
	}





    public function updateView($id) // finance_accounting/box/vouch_qbd/Vouch_qbd/updateView
    {

        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));

        $data['box_date'] = $this->Difined_model->getById('dalel',24);

        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
        
        
        
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
        
        
        
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['last_id'] = $this->Vouch_qbd_model->select_last_rkm();
        $data['result'] = $this->Vouch_qbd_model->findById($id);
//$this->test($data['result']);
 $data['arabicNum'] = convertNumber($data['result']->total_value);
        $data['tree'] = $this->buildTree($records);
        $data['title'] = 'إضافة سند قبض';
        $data['subview'] = 'admin/finance_accounting/box/vouch_qbd/vouch_qbd';
        $this->load->view('admin_index', $data);
    }


  /* public function add($id=0,$sanad_id=false,$last_quod_num=false)
    {
        messages('success','تم إضافة سند قبض');
       $inserted_id = $this->Vouch_qbd_model->insert_update($id,$sanad_id,$last_quod_num);
       $this->Vouch_qbd_model->insert_update_datails($inserted_id);
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }*/

/*
    public function add($id=0)
    {
        messages('success','تم إضافة سند قبض');
       $inserted_id = $this->Vouch_qbd_model->insert_update($id);
       $this->Vouch_qbd_model->insert_update_datails($inserted_id);
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }*/
  /*  public function update($id)
    {
       messages('success','تم تعديل سند قبض');
       $this->Vouch_qbd_model->delete_datails($id);
       $inserted_id = $this->Vouch_qbd_model->insert_update($id);
       $this->Vouch_qbd_model->insert_update_datails($inserted_id);
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }*/
    
  /*  public function update($id,$sanad_id=false,$last_quod_num=false)
{
   messages('success','تم تعديل سند قبض');
   $this->Vouch_qbd_model->delete_datails($id);
   $inserted_id = $this->Vouch_qbd_model->insert_update($id,$sanad_id,$last_quod_num);
   $this->Vouch_qbd_model->insert_update_datails($inserted_id);
    redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
}*/


    public function add($id=0,$sanad_id=false,$last_quod_num=false)
    {
        messages('success','تم إضافة سند قبض');
        $inserted_id = $this->Vouch_qbd_model->insert_update($id,$sanad_id,$last_quod_num);
        $this->Vouch_qbd_model->insert_update_datails($inserted_id);
        $this->Vouch_qbd_model->insert_sheek_details($inserted_id);
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }

    public function update($id,$sanad_id=false,$last_quod_num=false)
    {
        messages('success','تم تعديل سند قبض');
        $this->Vouch_qbd_model->delete_datails($id);
        $inserted_id = $this->Vouch_qbd_model->insert_update($id,$sanad_id,$last_quod_num);
        $this->Vouch_qbd_model->insert_update_datails($inserted_id);
        $this->Vouch_qbd_model->insert_sheek_details($inserted_id);

        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }
    public function add_rqm_cheque()
    {
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');

        $this->load->view('admin/finance_accounting/box/vouch_qbd/load_cheque_detail',$data);

    }

    public function deleteVouchQbd($id,$sanadId)
    {
        messages('success','تم تعديل سند قبض');
        $this->Vouch_qbd_model->delete_datails($sanadId);
        $inserted_id = $this->Vouch_qbd_model->delete($id);
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }

	public function buildTree($elements, $parent = 0) 
	{
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

  public function getValueArabic()
    {
        echo convertNumber($this->input->post('number'));
    }
    	

    
    

    public function getAccountName()
    {
        echo $this->Vouch_qbd_model->getAccount(array('code'=>$this->input->post('code'), 'hesab_no3'=>2))['name'];
    }


	public function get_hesab_data()
    {
        if($_POST['hesab']){
            $data = $this->Vouch_qbd_model->get_hesab_data($_POST['hesab'],1);
          
            echo json_encode($data);

        }
    }


    public function printSanedQbd($id){ // finance_accounting/box/vouch_qbd/Vouch_qbd/printSanedQbd

        $this->load->model("familys_models/Responsible_account");
        $data['result'] = $this->Vouch_qbd_model->findById($id);
        $this->load->view('admin/finance_accounting/box/vouch_qbd/print_saned_qbd', $data);
    }



}

/* End of file Vouch_qbd.php */
/* Location: ./application/controllers/finance_accounting/box/vouch_qbd/Vouch_qbd.php */