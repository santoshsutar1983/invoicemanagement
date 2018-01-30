<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintanance extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['products']=$this->mastersetting_model->get_products();

        $this->load->model('maintanancelog_model');
        $data['attributes']=$this->maintanancelog_model->get_attributes();
        $data['maintanancelog']=$this->maintanancelog_model->get_maintanance_log();
        //print_r($invoiceno);die;
        //print_r($data);die;
		$this->load->view('header');
		$this->load->view('maintanance_log_view',$data);
      
	}
    public function add_maintanlog_master()
    {
         $data = array(
        'product_id' => $this->input->post('product_id'),
        'attribute_id' => $this->input->post('attribute_id'),
        'log_date' => date('Y-m-d',strtotime($this->input->post('mlogdate'))),
        'description' =>$this->input->post('description'),
        );
        //print_r($data);die;
        $this->load->model('maintanancelog_model');
        $query=$this->maintanancelog_model->maintanancelog_insert($data);
    }
 
}
