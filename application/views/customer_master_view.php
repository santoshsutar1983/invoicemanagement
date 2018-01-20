<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <div class="sh-headpanel">
    </div><!-- sh-headpanel -->
    <div class="sh-mainpanel">
      <div class="sh-breadcrumb">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="#">Invoice Management System</a>
          <span class="breadcrumb-item active">Customer Master</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Customer Master</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_customermaster">
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Name<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="customername" name="customername" type="text" required="required">
                  </div>
                <div class="col-sm-5 input-group" id="customername_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Contact<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="contact" name="contact" type="text" required>
                  </div>
                <div class="col-sm-5 input-group" id="contact_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Address<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="address" name="address" type="text" required> 
                  </div>
                <div class="col-sm-5 input-group" id="address_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="email" name="email" type="email">
                  </div>
                <div class="col-sm-5 input-group" id="email_msg"></div>
              </div>
          
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_customermaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div class="col-sm-5 input-group" id="addcustomer_msg"></div>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>
      <div style="position:fixed;margin:0" class="sh-footer">
        <div>Copyright &copy; 2017</div>
        <div class="mg-t-10 mg-md-t-0">Designed by: <a href="#">Prisms Communications</a></div>
      </div> 
      <!-- sh-footer -->
     
    </div><!-- sh-mainpanel -->

  </body>
<script type="text/javascript">
  $(document).ready(function(){
      //$('.date-picker').datepicker("option", "dateFormat", "dd-mm-yy");
  });
  function submitMaster(formId) {
     //validate
    var isValid = false;
    var actionName = '';
    //alert(formId);
    if(formId == 'form_customermaster')
    {
      isValid = isValidForm(); 
      actionName = 'add_customermaster';
    }
    if(isValid)
    {
      var customername=$('#customername').val();
      var contact=$('#contact').val();
      var address=$('#address').val();
      var email=$('#email').val();
      //alert(productname);
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_product_master"); ?>',
                data:{'customername':productname,'contact':contact,'address':address,'email':email},
                success:function(data){
                    $('#addcustomer_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addcustomer_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#customername').val('');
                    $('#contact').val('');
                    $('#address').val('');
                    $('#email').val('');
                    
                },
                error : function(error)
                {
                    $('#addcustomer_msg').removeClass('alert alert-success');
                    $('#addcustomer_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                }
            });
    }
  }

  function isValidForm()
  {
    $('#customername_msg').html('');
    $('#contact_msg').html('');
    $('#address_msg').html('');
    $('#email_msg').html('');
    var emailid=$('#email').val();
    if($('#customername').val() == "")
      {
        $('#customername_msg').html('');
        $('#customername_msg').html('<div style="color:red" role="alert">Please Enter Customer Name</div>');
        return false;
      }
      else if($('#contact').val() == "")
      {
        $('#contact_msg').html('');
        $('#contact_msg').html('<div style="color:red" role="alert">Please Enter Customer Contact</div>');
        return false;
      }
      else if($('#address').val() == "")
      {
        $('#address_msg').html('');
        $('#address_msg').html('<div style="color:red" role="alert">Please Enter Customer Address</div>');
        return false;
      }
      else if($('#email').val()!="")
      {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
       if(filter.test(emailid))
        {
         return true;
        }
        else
        {
        $('#email_msg').html('');
        $('#email_msg').html('<div style="color:red" role="alert">Please Enter Valid Email</div>');
        return false;
        }
      }
      else
        return true;
  }

  // Function that validates email address through a regular expression.
  function validateEmail(sEmail){
    //alert(sEmail);
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

</script> 

</html>