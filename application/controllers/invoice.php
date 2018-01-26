<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('invoice_model');
        $data['companyinfo'] = $this->invoice_model->get_companyinfo();
        $data['lastinvoiceno']=$this->invoice_model->get_lastinvoice_number();
        //load mastersetting model for product data
        $this->load->model('mastersetting_model');
        $data['products']=$this->mastersetting_model->get_products();
        $data['services']=$this->mastersetting_model->get_services();
        $data['customers']=$this->mastersetting_model->get_customers();
        //print_r($invoiceno);die;
        //print_r($data);die;
		$this->load->view('header');
		$this->load->view('invoice_create_view',$data);
      
	}

    public function get_service_byproduct()
    {
        // Call get_service_byproduct from invoice here, first Load Model
        $product_id = $this->input->post('pid');
        $this->load->model('invoice_model');
        $data['pservices'] = $this->invoice_model->get_service_byproduct($product_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
      
    }
    public function get_customer_byid()
    {
        // Call get_service_byproduct from invoice here, first Load Model
        $customer_id = $this->input->post('customer_id');
        //echo $customer_id;die;
        $this->load->model('invoice_model');
        $data['customers'] = $this->invoice_model->get_customer_byid($customer_id);
        //print_r($data);die;
        $data['status']=1;
        $this->output->set_output(json_encode($data));
      
    }

    public function submit_invoice_generate()
    {
        // Call to submit invoice detail for generate first Load Model
        $datapost = $this->input->post('data');
        $this->load->model('invoice_model');
        $data['invoiceinfo'] = $this->invoice_model->submit_invoice_generate($datapost);
        //print_r($data);die;
        $data['status']=1;
        $this->output->set_output(json_encode($data));
      
    }

    
}
