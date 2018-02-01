<?php
class payment_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

  //function to search customer by name or number
  function get_customer_byname($search) 
	{ 
	  $query="SELECT b.customer_id as id,b.customer_id,b.customername,b.contact, 
    UPPER(CONCAT(b.customername,':',b.contact)) as `text` FROM 
    tbl_invoice_details as a
    LEFT JOIN tbl_customer_master as b 
    ON a.customer_id=b.customer_id WHERE b.customername LIKE '%".$search."%' OR
    b.contact LIKE '%".$search."%'";
    //echo $query;
    $query=$this->db->query($query);
    return $query->result_array();
  }

  //function to search invoice by number
  function get_invoice_bynumber($search) 
  { 
    
    $query="SELECT distinct(a.invoice_number) as id,a.invoice_number,UPPER(CONCAT(a.invoice_number,':',b.customername,':',b.contact)) as `text` FROM tbl_invoice_details as a 
    LEFT JOIN tbl_customer_master as b 
    ON a.customer_id=b.customer_id
    WHERE a.invoice_number LIKE '%".$search."%' OR b.customername LIKE '%".$search."%' OR b.contact LIKE '%".$search."%'";
    //echo $query;
    $query=$this->db->query($query);
    return $query->result_array();
  }

  //function to get invoice balance as per invoice number
  function get_invoice_balanceamount($invoicenumber) 
  { 
    
    $query="SELECT SUM(a.amount) as balance FROM tbl_invoice_details as a WHERE
    a.invoice_number='$invoicenumber'";
    //echo $query;
    $query=$this->db->query($query);
    return $query->result_array();
  }

  function get_paymentmode()
  {
    $query = $this->db->get('tbl_payment_mode');
    return $query->result_array();
  }


}
?>
