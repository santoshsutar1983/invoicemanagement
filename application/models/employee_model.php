<?php
class employee_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

 
	// function to get employee data 
	function get_employees() 
	{
        $query = $this->db->get('tbl_employee_master');
        return $query->result_array();
    }
    
   function mark_employee_attendance($attendate,$presentemp)
   {
    //print_r($presentemp);die;
    $attendate  = date('Y-m-d', strtotime($attendate));	
    //echo $attendate;die;
    foreach($presentemp as $p) 
    { 
    	$query="INSERT INTO tbl_employee_attend(emp_id,present_date)values($p[0],'$attendate')";
    	//echo $query;die;
    	$this->db->query($query);
    	//echo $p[0];
    }
   }
}
?>
