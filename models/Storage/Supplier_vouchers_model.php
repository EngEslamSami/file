<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_vouchers_model extends CI_Model {

	public function allSuppliers()
    {
    	return $this->db->select('*')
    					->get('suppliers')
    					->result();
    }

    public function get_SupplierById($id)
    {
        return $this->db->select('*')
                        ->where('id',$id)
                        ->get('suppliers')
                        ->row_array();
    }

    public function insert()
    {
    	$data['supplier_code'] = $this->input->post('supplier_code');
    	$data['total'] 		   = $this->input->post('total');
    	$data['paid'] 		   = $this->input->post('paid');
    	$data['remain'] 	   = $this->input->post('remain');
    	$data['date']		   = strtotime($this->input->post('date'));
    	$data['date_s']		   = time();
    	$data['publisher']	   = $_SESSION['user_id'];
    	$this->db->insert('supplier_vouchers',$data);
    	return $this->db->insert_id();
    }

    public function supplier_total($id)
    {
    	return $this->db->query('
                                SELECT COALESCE(a.remain,0) AS remain, a.supplier_code, COALESCE(b.paid,0) AS paid, c.*
                                FROM (
                                SELECT *
                                From suppliers 
                                WHERE id='.$id.') c

                                 LEFT JOIN
                                (
	                                SELECT SUM(remain) AS remain, supplier_code
	                                From purchases_fatora 
	                                WHERE supplier_code='.$id.'
	                                GROUP BY supplier_code 
                            	) a
                                on (c.id=a.supplier_code)

                                 LEFT JOIN
                                (
                                    SELECT SUM(paid) AS paid, supplier_code
                                    FROM supplier_vouchers
                                    WHERE supplier_code='.$id.'
                                    GROUP BY supplier_code 
                                ) b
                                on (c.id=b.supplier_code)
                                ')->row_array();
    }

    public function delete($id)
    {
    	$this->db->where('id', $id);
	    $this->db->delete('supplier_vouchers');
    }

    public function all_supplier_vouchers($id)
    {
    	return $this->db->select('*')
    	   				->from('supplier_vouchers')
    					->where('supplier_code', $id)
    					->order_by('id', 'DESC')
    					->get()
    					->result();
    }

    public function selectById($id)
    {
        return $this->db->select('supplier_vouchers.*,suppliers.name')
        				->join('suppliers','suppliers.id=supplier_vouchers.supplier_code')
	                    ->where('supplier_vouchers.id', $id)
	                    ->get('supplier_vouchers')
	                    ->row_array();
    }

    public function Get_SuppliersCounting($supplier_code)
    {
        return $this->db->query('
                                SELECT supplier_vouchers.date AS today, supplier_vouchers.paid AS total, 2 AS type
                                FROM supplier_vouchers
                                WHERE supplier_vouchers.supplier_code='.$supplier_code.'
                                UNION
                                SELECT purchases_fatora.fatora_date AS today, purchases_fatora.remain AS total, 1 AS type
                                From purchases_fatora 
                                WHERE purchases_fatora.supplier_code='.$supplier_code.'
                                UNION
                                SELECT 0 AS today, suppliers.supplier_dayen AS total, 0 AS type
                                From suppliers 
                                WHERE suppliers.id='.$supplier_code.'
                                ORDER BY today ASC 
                                ')->result();
    }

}

/* End of file Supplier_vouchers_model.php */
/* Location: ./application/models/Storage/Supplier_vouchers_model.php */