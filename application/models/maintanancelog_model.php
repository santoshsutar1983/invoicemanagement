<?php
class maintanancelog_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

  public function get_attributes()
  {
  	$query= $this->db->get('tbl_attribute_master');
  	return $query->result_array();
  }

  function maintanancelog_insert($data)
  {
    // Insert data in product master tbl
    $this->db->insert('tbl_product_maintanance_log', $data);
  }

  // function to get maintanance log data from maintanance log table
  function get_maintanance_log() 
  {    
      $query="SELECT ml.*,p.product_id,p.productname,a.attribute_id,a.attributename FROM tbl_product_maintanance_log as ml 
        LEFT JOIN tbl_product_master as p
        ON p.product_id=ml.product_id
        LEFT JOIN tbl_attribute_master as a
        ON a.attribute_id=ml.attribute_id";
      $query = $this->db->query($query);
      return $query->result_array();
    }
  
}
?>
