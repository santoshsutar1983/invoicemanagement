<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
        
        $this->load->model('payment_model');
        $data['paymodeinfo'] = $this->payment_model->get_paymentmode();
        //$data['lastinvoiceno']=$this->invoice_model->get_lastinvoice_number();
        //load mastersetting model for product data
        //$this->load->model('mastersetting_model');
        //$data['products']=$this->mastersetting_model->get_products();
        //$data['services']=$this->mastersetting_model->get_services();
        //$data['customers']=$this->mastersetting_model->get_customers();
        //print_r($invoiceno);die;
        //print_r($data);die;
		$this->load->view('header');
		$this->load->view('payment_create_view',$data);
    }
   // for search customer by name or mobile for payment
    public function get_customer_byname()
    {
     if(isset($_GET['q']))
     {
        $search = $_GET['q'];
        $this->load->model('payment_model');
        $data = $this->payment_model->get_customer_byname($search);
        $this->output->set_output(json_encode($data));
     
     }
    }
    // search invoice number
    public function get_invoice_bynumber()
    {
     if(isset($_GET['q']))
     {
        $search = $_GET['q'];
        $this->load->model('payment_model');
        $data = $this->payment_model->get_invoice_bynumber($search);
        $this->output->set_output(json_encode($data));
     
     }
    }
   
   // search invoice number
    public function get_invoice_balanceamount()
    {
        $invoice_number = $this->input->post('invoice_number');
        //echo $invoice_number;die;
        $this->load->model('payment_model');
        $data['balanceinfo'] = $this->payment_model->get_invoice_balanceamount($invoice_number);
        $data['status']=1;
        $this->output->set_output(json_encode($data));
     
     }
   
   
}
