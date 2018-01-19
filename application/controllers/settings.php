<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('product_master');
	}
    // start of add product master
   
   function add_product_master1()
   {

    echo "Hi";
  		$data['products'] = $this->input->post('productname');
        $this->form_validation->set_data($data);
        if($this->form_validation->run() != FALSE)
        {
            $this->load->model('settings');
            $this->settings->insert($data);
            $output['status']=1;
            $this->output->set_output(json_encode($output));
        }
        /*else
        {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('status'=>'0','message'=> $this->form_validation->get_error_as_array())));
        }*/

   }

	// This function call from AJAX
	public function add_product_master()
	{
	$data = array(
	'productname' => $this->input->post('productname'),
    );
    $this->load->model('setting');
    $query=$this->setting->product_insert($data);
    //print_r($data);die;
	//Either you can print value or you can send value to database
	//echo json_encode($data);
	}

    public function add_finance()
    {
        $data['years'] = $this->input->post('inputFinance');
        $this->form_validation->set_data($data);
        if($this->form_validation->run('add_year') != FALSE)
        {
            $this->load->model('Finance_model');
            $this->Finance_model->insert($data);
            $output['status']=1;
            $this->output->set_output(json_encode($output));
        }
        else
        {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('status'=>'0','message'=> $this->form_validation->get_error_as_array())));
        }
    }
	  
    // end of add product master


}
