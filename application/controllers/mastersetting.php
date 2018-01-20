<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastersetting extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
		$this->load->view('header');
		$this->load->view('products_master_view');
       
	}
    // To load service master page view
    public function services_master_view()
    {
        $this->load->view('header');
        $this->load->view('services_master_view');
    }
    // To load product services mapping master page view
    public function productservice_mapping_master_view()
    { 
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['products'] = $this->mastersetting_model->get_products();
        $data['services'] = $this->mastersetting_model->get_services();
        //print_r($data);die;
        $this->load->view('header');
        $this->load->view('productservice_mapping_master_view',$data);
    }

    // To load customer master page view
    public function customer_master_view()
    {
        $this->load->view('header');
        $this->load->view('customer_master_view');
    }

   	// This function call from AJAX
	public function add_product_master()
	{
	$data = array(
	'productname' => $this->input->post('productname'),'description' => $this->input->post('productdescription'),
    );
    $this->load->model('mastersetting_model');
    $query=$this->mastersetting_model->product_insert($data);
    //print_r($data);die;
	//Either you can print value or you can send value to database
	//echo json_encode($data);
	}

    // This function call from AJAX
    public function add_service_master()
    {
    $data = array(
    'servicename' => $this->input->post('servicename'),'description' => $this->input->post('servicedescription'),
    );
    $this->load->model('mastersetting_model');
    $query=$this->mastersetting_model->service_insert($data);
    }

    // This function call from AJAX
    public function add_productservice_mapping_master()
    {
    $data = array(
    'productid' => $this->input->post('selectproduct'),'serviceid' => $this->input->post('selectservice'),
    );
    $this->load->model('mastersetting_model');
    $query=$this->mastersetting_model->productserice_mapping_insert($data);
    }
   

/*    public function add_finance()
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
    }*/
	  
    // end of add product master


}
