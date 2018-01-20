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
          <span class="breadcrumb-item active">Product-Services Mapping</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
     
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Product-Services Mapping Master</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_productservice_mapping">
            <div class="row">
            </div>
            <div class="col-lg-4 mg-t-20 mg-lg-t-0"><span class="tx-danger">*</span>
                <select id= "selectproduct" class="form-control select2-show-search" data-placeholder="Select Product">
                <option value="">Select Product</option>
                <?php foreach ($products as $p)
                 { 
                ?>
                  <option value="<?php echo $p['id'] ?>"><?php echo $p['productname'] ?></option>
                 <?php 
                 } 
                 ?>
                </select>
              <div style="width:100%"  id="selectproduct_msg"></div>
              </div><!-- col-4 -->
              <br>
              <div class="col-lg-4 mg-t-20 mg-lg-t-0"><span class="tx-danger">*</span>
                <select id="selectservice" class="form-control select2-show-search" data-placeholder="Select Service">
                <option value="">Select Service</option>
                <?php foreach($services as $s)
                 { 
                ?>
                  <option value="<?php echo $s['id'] ?>"><?php echo $s['servicename'] ?></option>
                 <?php 
                 } 
                 ?>
                 </select>
                 <div style="width:100%" id="selectservice_msg"></div>
              </div><!-- col-4 -->
              <br>
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_productservice_mapping');"> Submit </a>
                </div>
              </div>
           </form>
           <div id="addpsmapping_msg"></div>
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
   //$('#selectproduct').select2();
   //$('#selectservice').select2();
   //$('#selectservice').multiselect();
 //$('.date-picker').datepicker("option", "dateFormat", "dd-mm-yy");
  });
  function submitMaster(formId) {
    //validate
    var isValid = false;
    var actionName = '';
    //alert(formId);
    if(formId == 'form_productservice_mapping')
    {
      isValid = isValidForm(); 
      actionName = 'add_productservice_mapping_master';
    }
    if(isValid)
    {
      //console.log("path",path);
      //alert(path);
      var productid=$('#selectproduct').val();
      var serviceid=$('#selectservice').val();
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_productservice_mapping_master"); ?>',
                data:{'selectproduct': productid,'selectservice':serviceid},
                success:function(data){
                    $('#addpsmapping_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addpsmapping_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#selectproduct').val('');
                    $('#selectservice').val('');
                },
                error : function(error)
                {
                    $('#addpsmapping_msg').removeClass('alert alert-success');
                    $('#addpsmapping_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                    $('#selectproduct').val('');
                    $('#selectservice').val('');
                }
            });
    }
  }

  function isValidForm()
  {
      if($('#selectproduct').val() == "")
      {
        $('#selectproduct_msg').html('');
        $('#selectproduct_msg').html('<div style="color:red" role="alert">Please Select Product</div>');
        //alert("Please Enter Product Name");
        return false;
      }
      else if($('#selectservice').val() == "")
      {
        $('#selectservice_msg').html('');
        $('#selectservice_msg').html('<div style="color:red" role="alert">Please Select Services</div>');
        //alert("Please Enter Product Name");
        return false;
      }
      else
        return true;
  }

</script> 
</html>