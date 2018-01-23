<?php
class mastersetting_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function product_insert($data)
	{
		// Insert data in product master tbl
		$this->db->insert('tbl_product_master', $data);
	}

	function service_insert($data)
	{
		$this->db->insert('tbl_service_master', $data);
	}
	function attribute_insert($data)
	{
		// Insert data in product master tbl
		$this->db->insert('tbl_attribute_master', $data);
	}
	function productserice_mapping_insert($data)
	{
		$this->db->insert('tbl_productservice_mapping', $data);
	}
	function customer_insert($data)
	{
		$this->db->insert('tbl_customer_master', $data);
	}
	function employee_insert($data)
	{

		$this->db->insert('tbl_employee_master', $data);
	}
	//Function to update sms template text as per name
	function smstemplate_insert($data)
	{   
		$smstext=$data['text'];
		$name=$data['name'];
		$query="UPDATE tbl_sms_template SET `text`= '$smstext' WHERE `name`= '$name'";
		$this->db->query($query);
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
    // function to get attributes data from attribute_master tbl
	function get_attributes() 
	{
        $query = $this->db->get('tbl_attribute_master');
        return $query->result_array();
    }
    // function to get product service mapping data from service_master tbl
	function get_psmapping() 
	{
        //$this->db->select('*');
		//$this->db->from('tbl_productservice_mapping');
       // $query = $this->db->get();
        //print_r($query);die;

        $this->db->select('psm.psmap_id,psm.productid,psm.serviceid,p.productname,s.servicename', false);
		$this->db->from('tbl_productservice_mapping as psm');
		$this->db->join('tbl_product_master as p', 'psm.productid = p.product_id');
	    $this->db->join('tbl_service_master as s', 'psm.productid = s.service_id');
		$query = $this->db->get();
        return $query->result_array();
    }
    // function to get employees  data from employee master tbl
	function get_employees() 
	{
        $this->db->where('status','1');
		$query = $this->db->get('tbl_employee_master');
        return $query->result_array();
    }
    // function to get customer data from customer master tbl
	function get_customers() 
	{
        $this->db->where('status','1');
		$query = $this->db->get('tbl_customer_master');
        return $query->result_array();
    }

    // function to get sms text data as per template name
	function get_smstemplatetextby_name($name) 
	{ 
		$text="";
        $this->db->select('text');
		$this->db->from('tbl_sms_template');
		$where = "name='$name'";
	    $this->db->where($where);
		//$query = $this->db->get_where('tbl_sms_template', array('id' => $id), $limit, $offset);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
		        $text=$row->text;
		}
		echo $text;
		return $text;
    }

    public function update_product_master($data,$id)
  	{
  	  //print_r($data);die;
      $this->db->where('product_id',$id);
      $this->db->update('tbl_product_master',$data);
  	}
  	public function delete_product_master($product_id)
	{
		//echo "Hi".$product_id;die;
	    $this->db->query("delete from tbl_product_master where product_id=".$product_id);
	}
  	
  	public function update_attribute_master($data,$id)
  	{
  	  //print_r($data);die;
      $this->db->where('attribute_id',$id);
      $this->db->update('tbl_attribute_master',$data);
  	}
  	public function delete_attribute_master($attribute_id)
	{
		//echo "Hi".$product_id;die;
	    $this->db->query("delete from tbl_attribute_master where attribute_id=".$attribute_id);
	}

  	public function update_service_master($data,$id)
  	{
  	  //print_r($data);die;
      $this->db->where('service_id',$id);
      $this->db->update('tbl_service_master',$data);
  	}
  	public function delete_service_master($service_id)
	{
		//echo "Hi".$product_id;die;
	  $this->db->query("delete from tbl_service_master where service_id=".$service_id);
	}
	public function update_employee_master($data,$emp_id)
  	{
  	  //print_r($data);die;
      $this->db->where('emp_id',$emp_id);
      $this->db->update('tbl_employee_master',$data);
  	}
	public function block_employee_master($emp_id)
	{
	  $this->db->query("UPDATE tbl_employee_master SET status='0' WHERE emp_id=".$emp_id);
	}
	public function update_customer_master($data,$cust_id)
  	{
  	  //print_r($data);die;
      $this->db->where('customer_id',$cust_id);
      $this->db->update('tbl_customer_master',$data);
  	}
	public function block_customer_master($cust_id)
	{
	  $this->db->query("UPDATE tbl_customer_master SET status='0' WHERE customer_id=".$cust_id);
	}
}
?>
