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
          <span class="breadcrumb-item active">Product Master</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Product Master</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_productmaster">
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Product Name:<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group date">
                  <input class="form-control pull-right" id="productname" name="productname" type="text" required>
                  </div>
              </div>
           
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_productmaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div id="addproduct_msg"></div>
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
    if(formId == 'form_productmaster')
    {
      isValid = isValidProductMasterForm(); 
      actionName = 'add_product_master';
    }
    if(isValid)
    {
      //submit data
      //var path = $('#path').val();
      //var path="localhost/invoicemanagement/"
      console.log("path",path);
      //alert(path);
      var productname=$('#productname').val();
      //alert(productname);
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/settings/add_product_master"); ?>',
                data:{'productname':productname},
                success:function(data){
                    $('#addproduct_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addproduct_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#productname').val('');
                },
                error : function(error)
                {
                    $('#addproduct_msg').removeClass('alert alert-success');
                    $('#addproduct_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                    $('#productname').val('');
                }
            });
    }
  }

  function isValidProductMasterForm()
  {
      if($('#productname').val() == "")
      {
        $('#addproduct_msg').removeClass('alert alert-success');
        $('#addproduct_msg').html('<div class="alert alert-danger mg-b-0" role="alert">Please Enter Product Name</div>');
        //alert("Please Enter Product Name");
        return false;
      }
      else
        return true;
  }

}
</script> 
</html>