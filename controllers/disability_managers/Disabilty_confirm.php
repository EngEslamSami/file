<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disabilty_confirm extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('disability_managers_models/Confirm_disabilty');
    }

    // disability_managers/Disabilty_confirm/confirm/1
    // disability_managers/Disabilty_confirm/confirm/2

	public function confirm($type) 
	{
        if($type == 1 || $type == 2) {
    		if($this->input->post('accept')){
                $this->Confirm_disabilty->confirmation($this->input->post('id'), 1);
                messages('success','إعتماد طلب الصرف');
            }
            if($this->input->post('refuse')){
                $this->Confirm_disabilty->confirmation($this->input->post('id'), 2);
                messages('success','إعتماد طلب الصرف');
            }
            $data['allOrders'] = $this->Confirm_disabilty->select_orders($type);
            $data['newOrders'] = $this->Confirm_disabilty->select_orders($type,0);
            $data['acceptedOrders'] = $this->Confirm_disabilty->select_orders($type,1);
            $data['refusedOrders'] = $this->Confirm_disabilty->select_orders($type,2);
            $data['print'] = $this->Confirm_disabilty->select_orders($type,1,'group');
            if($type == 1) {
    	        $data['title'] = 'إعتماد طلبات الصرف الداخلية';
    	    }
    	    else {
    	    	$data['title'] = 'إعتماد طلبات الصرف الخارجية';
    	    }
    	    $data['subview'] = 'admin/disability_managers_views/disability_confirm/disability_confirm';
            $this->load->view('admin_index', $data);
        }
        else {
            redirect('Page404','refresh');
        }
	}

    public function print_order($type,$order_num)
    {
        $data['type'] = $type;
        $data['devices'] = $this->Confirm_disabilty->getDevices($order_num);
        $this->load->view('admin/disability_managers_views/disability_confirm/print', $data);
    }

}

/* End of file Disabilty_confirm.php */
/* Location: ./application/controllers/disability_managers/Disabilty_confirm.php */