<?php
class employee_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

 	// function to get employee data 
	function get_employees() 
	{  
        $query = "SELECT * FROM tbl_employee_master ORDER BY employeename ASC";
        $query = $this->db->query($query);
        return $query->result_array();
    }
    
   function mark_employee_attendance($attendate,$presentemp)
   {
    
    if(!empty($presentemp))
        $presentemp=implode(",",$presentemp);
    else
        $presentemp="0";
    $attendate  = date('Y-m-d', strtotime($attendate));	
    //print_r($presentemp);die;
    //echo $attendate;die;

    // check already attendance taken on date or not
    $query="SELECT * FROM tbl_employee_attend WHERE present_date='$attendate'";
    $result=$this->db->query($query);
    //echo $result->num_rows();die;

    if($result->num_rows()>0)
    {
        if(!empty($presentemp))
        {
        $query="UPDATE tbl_employee_attend SET present_emp_id='$presentemp' WHERE present_date='$attendate'";
        //echo $query;die;
        $this->db->query($query);
        }
    }
    else // add new record of attendance
    {
        if(!empty($presentemp))
        {
        $query="INSERT INTO tbl_employee_attend(present_emp_id,present_date)values('$presentemp','$attendate')";
        //echo $query;die;
        $this->db->query($query);
        }
        else
        {
         $query="INSERT INTO tbl_employee_attend(present_emp_id,present_date)values('$presentemp','$attendate')";
        //echo $query;die;
        $this->db->query($query);
        } 
    }
    
      
   }

   function getEmployeeAttendance($attendate) 
    {
        $query="SELECT a.present_emp_id,b.emp_id,b.employeename FROM tbl_employee_attend as a 
        LEFT JOIN tbl_employee_master as b
        ON FIND_IN_SET(b.emp_id,a.present_emp_id)
        WHERE DATE_FORMAT(present_date,'%d-%m-%Y')='$attendate'"; 
        //echo $query;die;
        $query = $this->db->query($query);
        return $query->result_array();
    }

}
?>
