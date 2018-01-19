<?php
class mastersetting_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function product_insert($data)
	{
		$this->db->insert('tbl_product_master', $data);
	}

	function service_insert($data)
	{
		$this->db->insert('tbl_service_master', $data);
	}
	function productserice_mapping_insert($data)
	{
		//print_r($data);die;
		// Inserting in Table(product master) of Database(invoicemgt)
		$this->db->insert('tbl_productservice_mapping', $data);
	}
	function customer_insert($data)
	{
		//print_r($data);die;
		// Inserting in Table(product master) of Database(invoicemgt)
		$this->db->insert('tbl_customer_master', $data);
	}
	function staff_insert($data)
	{
		//print_r($data);die;
		// Inserting in Table(product master) of Database(invoicemgt)
		$this->db->insert('tbl_staff_master', $data);
	}

	// function to get product data from product_master tbl
	function get_products() 
	{
        $query = $this->db->get('tbl_product_master');
        return $query->result_array();
    }
    // function to get services data from service_master tbl
	function get_services() 
	{
        $query = $this->db->get('tbl_service_master');
        return $query->result_array();
    }
}
?>