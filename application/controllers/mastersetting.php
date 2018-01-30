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
    // To load attributes master page view
    public function attributes_master_view()
    {
        // Call get_service from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['attributes'] = $this->mastersetting_model->get_attributes();
        $this->load->view('header');
        $this->load->view('attributes_master_view',$data);
    }

    // To load customer master page view
    public function customer_master_view()
    {
        // Call get_customers from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['customers'] = $this->mastersetting_model->get_customers();
        $this->load->view('header');
        $this->load->view('customer_master_view',$data);
    }

    // To load employee master page view
    public function employee_master_view()
    { 
        // Call get_employees from mastersetting_model here, first Load Model
        $this->load->model('mastersetting_model');
        $data['employees'] = $this->mastersetting_model->get_employees();
        $this->load->view('header');
        $this->load->view('employee_master_view',$data);
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
    	'productname' => trim($this->input->post('productname'))
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
        'servicename' => trim($this->input->post('servicename'))
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->service_insert($data);
    }

    // This function call from AJAX
    public function add_attribute_master()
    {
        $data = array(
        'attributename' => trim($this->input->post('attributename'))
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->attribute_insert($data);
    }

    // This function call from AJAX
    public function add_productservice_mapping_master()
    {
        $data = array(
        'productid' => $this->input->post('selectproduct'),
        'serviceid' => $this->input->post('selectservice'),
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->productserice_mapping_insert($data);
    }
   
    // This function call from AJAX
    public function add_customer_master()
    {
        $data = array(
        'customername' => trim($this->input->post('customername')),
        'contact' => trim($this->input->post('contact')),
        'address' => trim($this->input->post('address')),
        'email' => trim($this->input->post('email'))
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->customer_insert($data);
    }

    // This function call from AJAX
    public function add_employee_master()
    {
         $data = array(
        'employeename' => trim($this->input->post('employeename')),
        'contact' => trim($this->input->post('contact')),
        'address' => trim($this->input->post('address')),
        'email' => trim($this->input->post('email'))
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->employee_insert($data);
    }

    // This function call from AJAX
    public function add_smstemplate_master()
    {
         $data = array(
        'name' => trim($this->input->post('smstemplate')),
        'text' => trim($this->input->post('smstext'))
        );
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->smstemplate_insert($data);
    }

    public function smstextby_name()
    {
        //$data=array('name'=>$this->input->post('smstemplate'));
        $name=trim($this->input->post('smstemplate'));
        $this->load->model('mastersetting_model');
        $query=$this->mastersetting_model->get_smstemplatetextby_name($name);
    }
  
  //Call from  AJAX to update product data
    public function update_product_master()
    {
        $data['productname'] = trim($this->input->post('productname'));
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
        $data['servicename'] = trim($this->input->post('servicename'));
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

    //Call from  AJAX to update attribute data
    public function update_attribute_master()
    {
        $data['attributename'] = trim($this->input->post('attributename'));
        $id = $this->input->post('attribute_id');
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->update_attribute_master($data,$id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));        
    }
   //Call from  AJAX to delete product data
    public function delete_attribute_master()
    {
        $attribute_id = $this->input->post('attribute_id');
        //print_r($product_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->delete_attribute_master($attribute_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
    }


    //Call from  AJAX to block employee as per emp_id
    public function block_employee_master()
    {
        $emp_id = $this->input->post('emp_id');
        //print_r($emp_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->block_employee_master($emp_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
    }

    //Call from  AJAX to update employee master as per empid
    public function update_employee_master()
    {
        $emp_id = $this->input->post('emp_id');
        $data['employeename'] = trim($this->input->post('employeename'));
        $data['contact'] = trim($this->input->post('contact'));
        $data['address'] = trim($this->input->post('address'));
        $data['email'] = trim($this->input->post('email'));
        //print_r($emp_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->update_employee_master($data,$emp_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
    }

    //Call from  AJAX to block customer as per customerid
    public function block_customer_master()
    {
        $cust_id = $this->input->post('cust_id');
        //print_r($emp_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->block_customer_master($cust_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
    }

    //Call from  AJAX to update customer master as per customerid
    public function update_customer_master()
    {
        $cust_id = $this->input->post('cust_id');
        $data['customername'] = trim($this->input->post('customername'));
        $data['contact'] = trim($this->input->post('contact'));
        $data['address'] = trim($this->input->post('address'));
        $data['email'] = trim($this->input->post('email'));
        //print_r($emp_id);die;
        $this->load->model('mastersetting_model');
        $this->mastersetting_model->update_customer_master($data,$cust_id);
        $output['status']=1;
        $this->output->set_output(json_encode($output));
    }

    /* public function add_finance()
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


}
