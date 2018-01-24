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

}
?>
