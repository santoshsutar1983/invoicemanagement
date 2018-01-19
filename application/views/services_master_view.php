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
          <span class="breadcrumb-item active">Services Master</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Services Master</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_servicemaster">
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Service Name:<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group date">
                  <input class="form-control pull-right" id="servicename" name="servicename" type="text" required>
                  </div>
                  <div class="col-sm-5 input-group" id="service_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Service Description:</label>
                  <div class="col-sm-5 input-group date">
                  <input class="form-control pull-right" id="servicedescription" name="servicedescription" type="text">
                  </div>
              </div>
           
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_servicemaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div id="addservice_msg"></div>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>
    
      <div class="sh-footer">
        <div>Copyright &copy; 2017</div>
        <div class="mg-t-10 mg-md-t-0">Designed by: <a href="#">Prisms Communications</a></div>
      </div> 
      <!-- sh-footer -->
    </div><!-- sh-mainpanel -->

  </body>
<script type="text/javascript">
  $(document).ready(function(){
      $('.date-picker').datepicker("option", "dateFormat", "dd-mm-yy");
  });
  function submitMaster(formId) {
    //validate
    var isValid = false;
    var actionName = '';
    //alert(formId);
    if(formId == 'form_servicemaster')
    {
      isValid = isValidServiceMasterForm(); 
      actionName = 'add_service_master';
    }
    if(isValid)
    {
      //console.log("path",path);
      //alert(path);
      var servicename=$('#servicename').val();
      var servicedescription=$('#servicedescription').val();
      //alert(productname);
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_service_master"); ?>',
                data:{'servicename':  servicename,'servicedescription':servicedescription},
                success:function(data){
                    $('#addservice_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addservice_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#servicename').val('');
                    $('#servicedescription').val('');
                },
                error : function(error)
                {
                    $('#addservice_msg').removeClass('alert alert-success');
                    $('#addservice_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                    $('#servicename').val('');
                    $('#servicedescription').val('');
                }
            });
    }
  }

  function isValidServiceMasterForm()
  {
      if($('#servicename').val() == "")
      {
        $('#service_msg').html('');
        $('#service_msg').html('<div style="color:red" role="alert">Please Enter service Name</div>');
        //alert("Please Enter Product Name");
        return false;
      }
      else
        return true;
  }

</script> 
</html>