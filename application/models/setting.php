<?php
class setting extends CI_Model{
function __construct() {
parent::__construct();
}
function product_insert($data)
{
//print_r($data);die;
// Inserting in Table(product master) of Database(invoicemgt)
$this->db->insert('tbl_product_master', $data);
}
}
?>