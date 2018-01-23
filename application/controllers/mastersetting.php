<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastersetting extends CI_Controller {
    // this is default function ,so default view loaded
	public function index()
	{
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['products'] = $this->mastersetting_model->get_products();
        //print_r($data);die;
		$this->load->view('header');
		$this->load->view('products_master_view',$data);
       
	}
    // To load service master page view
    public function services_master_view()
    {
        // Call get_service from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['services'] = $this->mastersetting_model->get_services();
        $this->load->view('header');
        $this->load->view('services_master_view',$data);
    }
    // To load product services mapping master page view
    public function productservice_mapping_master_view()
    { 
        // Call get_product from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['products'] = $this->mastersetting_model->get_products();
        $data['services'] = $this->mastersetting_model->get_services();
        $data['psmapping'] = $this->mastersetting_model->get_psmapping(); 
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

    // To load employee master page view
    public function employee_master_view()
    {
        $this->load->view('header');
        $this->load->view('employee_master_view');
    }
    // To load sms template master page view
    public function smstemplate_master_view()
    {
        $this->load->view('header');
        $this->load->view('smstemplate_master_view');
    }
  
  
   	// This function call from AJAX
	public function add_product_master()
	{
    	$data = array(
    	'productname' => $this->input->post('productname')
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
        'servicename' => $this->input->post('servicename')
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
   
    // This function call from AJAX
    public function add_customer_master()
    {
        $data = array(
        'customername' => $this->input->post('customername'),
        'contact' => $this->input->post('contact'),
        'address' => $this->input->post('address'),
        'email' => $this->input->post('email')
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->customer_insert($data);
    }

    // This function call from AJAX
    public function add_employee_master()
    {
         $data = array(
        'employeename' => $this->input->post('employeename'),
        'contact' => $this->input->post('contact'),
        'address' => $this->input->post('address'),
        'email' => $this->input->post('email')
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->staff_insert($data);
    }

    // This function call from AJAX
    public function add_smstemplate_master()
    {
         $data = array(
        'name' => $this->input->post('smstemplate'),
        'text' => $this->input->post('smstext')
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->smstemplate_insert($data);
    }

    public function smstextby_name()
    {
        //$data=array('name'=>$this->input->post('smstemplate'));
        $name=$this->input->post('smstemplate');
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->get_smstemplatetextby_name($name);
    }
  
  //Call from  AJAX to update product data
    public function update_product_master()
    {
        $data['productname'] = $this->input->post('productname');
        $id = $this->input->post('product_id');
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->update_product_master($data,$id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));        
    }
   //Call from  AJAX to delete product data
    public function delete_product_master()
    {
        $product_id = $this->input->post('product_id');
        //print_r($product_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->delete_product_master($product_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
    }

    //Call from  AJAX to update product data
    public function update_service_master()
    {
        $data['servicename'] = $this->input->post('servicename');
        $id = $this->input->post('service_id');
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->update_service_master($data,$id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));        
    }
   //Call from  AJAX to delete product data
    public function delete_service_master()
    {
        $product_id = $this->input->post('service_id');
        //print_r($product_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->delete_service_master($product_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
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
