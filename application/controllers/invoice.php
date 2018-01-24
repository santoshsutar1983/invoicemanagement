<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('invoice_model');
        $data['companyinfo'] = $this->invoice_model->get_companyinfo();
        //print_r($data);die;
		$this->load->view('header');
		$this->load->view('invoice_create_view',$data);
       
	}
    


}
