<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_vouchers_model extends CI_Model {

	public function allClients()
    {
    	return $this->db->select('*')
    					->get('clients')
    					->result();
    }

    public function insert()
    {
    	$data['client_code']   = $this->input->post('client_code');
    	$data['total'] 		   = $this->input->post('total');
    	$data['paid'] 		   = $this->input->post('paid');
    	$data['remain'] 	   = $this->input->post('remain');
    	$data['date']		   = strtotime($this->input->post('date'));
    	$data['date_s']		   = time();
    	$data['publisher']	   = $_SESSION['user_id'];
    	$this->db->insert('client_vouchers',$data);
    	return $this->db->insert_id();
    }

    public function client_total($id)
    {
    	return $this->db->query('
                                SELECT COALESCE(a.remain,0) AS remain, a.client_code, COALESCE(b.paid,0) AS paid, c.*
                                FROM (
                                SELECT *
                                From clients 
                                WHERE id='.$id.') c

                                 LEFT JOIN
                                (
	                                SELECT SUM(remain) AS remain, client_code
	                                From sales_fatora 
	                                WHERE client_code='.$id.'
	                                GROUP BY client_code 
                            	) a
                                on (c.id=a.client_code)

                                 LEFT JOIN
                                (
                                    SELECT SUM(paid) AS paid, client_code
                                    FROM client_vouchers
                                    WHERE client_code='.$id.'
                                    GROUP BY client_code 
                                ) b
                                on (c.id=b.client_code)
                                ')->row_array();
    }

    public function delete($id)
    {
    	$this->db->where('id', $id);
	    $this->db->delete('client_vouchers');
    }

    public function all_client_vouchers($id)
    {
    	return $this->db->select('*')
    	   				->from('client_vouchers')
    					->where('client_code', $id)
    					->order_by('id', 'DESC')
    					->get()
    					->result();
    }

    public function selectById($id)
    {
        return $this->db->select('client_vouchers.*,clients.name')
        				->join('clients','clients.id=client_vouchers.client_code')
	                    ->where('client_vouchers.id', $id)
	                    ->get('client_vouchers')
	                    ->row_array();
    }

    public function Get_ClientsCounting($client_code)
    {
        return $this->db->query('
                                SELECT client_vouchers.date AS today, client_vouchers.paid AS total, 2 AS type
                                FROM client_vouchers
                                WHERE client_vouchers.client_code='.$client_code.'
                                UNION
                                SELECT sales_fatora.fatora_date AS today, sales_fatora.remain AS total, 1 AS type
                                From sales_fatora 
                                WHERE sales_fatora.client_code='.$client_code.'
                                UNION
                                SELECT 0 AS today, clients.client_dayen AS total, 0 AS type
                                From clients 
                                WHERE clients.id='.$client_code.'
                                ORDER BY today ASC 
                                ')->result();
    }

}

/* End of file Client_vouchers_model.php */
/* Location: ./application/models/Storage/Client_vouchers_model.php */