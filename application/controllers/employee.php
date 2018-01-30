<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('employee_model');
        $data['employees'] = $this->employee_model->get_employees();
        //print_r($data);die;
		$this->load->view('header');
		$this->load->view('employee_attend_view',$data);
       
	}

    public function mark_employee_attendance()
    {
        $attendate = $this->input->post('attendate');
        $presentemp = $this->input->post('selectedemp');
        //print_r($presentemp);die;
        $this->load->model('employee_model');
        $this->employee_model->mark_employee_attendance($attendate,$presentemp);
        $data['status']=1;
        $this->output->set_output(json_encode($data));
    }

    public function getEmployeeAttendance()
    {
        $attendate = $this->input->post('attendate');
        //print_r($presentemp);die;
        $this->load->model('employee_model');
        $data['attendlist']=$this->employee_model->getEmployeeAttendance($attendate);
        $data['status']=1;
        $this->output->set_output(json_encode($data));
    }

    

    
   

}
