<?php
class invoice_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

  public function get_companyinfo()
  {
  	$query= $this->db->get('tbl_companyinfo_master');
  	return $query->result_array();
  }
  public function get_lastinvoice_number()
  {
  	
  	$this->db->select('value');
	$this->db->from('tbl_common_setting');
	$where = "variable='invoice_lastno'";
	$this->db->where($where);
  	$query= $this->db->get();
  	return $query->result_array();
  }

  // function to service as per product id AJAX call
  function get_service_byproduct($product_id) 
	{ 
		$this->db->select('psm.psmap_id,psm.productid,psm.serviceid,p.product_id,p.productname,s.service_id,s.servicename', false);
		$this->db->from('tbl_productservice_mapping as psm ,tbl_product_master as p,tbl_service_master as s');
		$where = "psm.productid = ".$product_id;
	    $this->db->where($where);
	    $query = $this->db->get();
        return $query->result_array();
    }

   // function to service as per product id AJAX call
  function get_customer_byid($customer_id) 
	{ 
		$this->db->select('*', false);
		$this->db->from('tbl_customer_master');
		$where = "status='1' AND customer_id = ".$customer_id;
		//echo $where;die;
	    $this->db->where($where);
	    $query = $this->db->get();
        return $query->result_array();
    }

   // function to submit invoice information to generate
  function submit_invoice_generate($data) 
	{ 
	    parse_str($data, $arrFilter);
	    //print_r($data);die;	
	    $invoicenumber= $arrFilter['invoicenumber'];
	    $invoicedate  = date('Y-m-d', strtotime($arrFilter['invoicedate']));	 
      $customerid   = $arrFilter['selectcustomer'];
      $tax          = $arrFilter['tax'];
      $totalamount  = $arrFilter['totalamount'];
      $rowcount  = $arrFilter['rowcount'];

        for($i = 0; $i < $rowcount; $i++)
            {
            $productid= $arrFilter['selectproduct_'.$i];
            $serviceid= $arrFilter['selectservice_'.$i];
            $quantity= $arrFilter['quantity_'.$i];
            $unitprice= $arrFilter['unitprice_'.$i];
            $amount= $arrFilter['amount_'.$i];
            //Standard insert
            /*$query = "INSERT INTO tbl_user (name, groupname, age) 
            VALUES (".$this->db->escape($name).", ".$this->db->escape($groupname).".", ".$this->db->escape($age).")";
            $this->db->query($sql);*/
            $query="INSERT INTO tbl_invoice_details
            (invoice_number,invoice_date,customer_id,product_id,service_id,quantity,unitprice,amount,tax_percent,total_amount)
            values
            ('$invoicenumber','$invoicedate','$customerid','$productid','$serviceid','$quantity','$unitprice','$amount','$tax','$totalamount')";
            $this->db->query($query);
            }

        //increment invoice number after insert data
    }

}
?>
