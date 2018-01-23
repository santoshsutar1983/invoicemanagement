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
          <span class="breadcrumb-item active">SMS Template</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
     
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">SMS Template</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_smstemplate">
            <div class="row">
            </div>
              <label for="templatelbl" class="col-sm-2 control-label">Name:<span class="tx-danger">*</span></label>
              <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <select id="selecttemplate" class="form-control select2-show-search" data-placeholder="Select Template">
                 <option value="">Select Template</option>
                  <option value="payment">Payment</option>
                  <option value="paymentreminder">Payment Reminder</option>
                  <option value="birthday">Birthday</option>
                  <option value="attendance">Attendance</option>
                </select>
              <div style="width:100%" id="selecttemplate_msg"></div>
              </div><!-- col-4 -->
              <br>
              <div class="form-group">
                <label for="inputSmstext" class="col-sm-2 control-label">SMS Text:<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <textarea row="3" id="smstext" name="smstext" class="form-control pull-right"></textarea> 
                  </div>
                <div class="col-sm-5 input-group" id="smstext_msg"></div>
              </div>

              <br>
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_smstemplate');"> Submit </a>
                </div>
              </div>
           </form>
           <div id="addsmstemplate_msg"></div>
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
    
    $('#selecttemplate').on('change',function()
    {
        var smstemplate=$('#selecttemplate').val();
        $('#smstext').val('');;
        //$('#textboxid').val($(this).children(':selected').attr('data-time'))
        if(smstemplate!="")
        {
          $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/smstextby_name"); ?>',
                data:{'smstemplate':smstemplate},
                success:function(data){
                   //alert(data);
                   if(data)
                   {
                    $('#smstext').val(data);
                   }
                },
                error : function(error)
                {
                                       
                }
            });
        }
    });

  });
  function submitMaster(formId) {
    //validate
    var isValid = false;
    var actionName = '';
    //alert(formId);
    if(formId == 'form_smstemplate')
    {
      isValid = isValidForm(); 
      actionName = 'add_smstemplate_master';
    }
    if(isValid)
    {
      //console.log("path",path);
      //alert(path);
      var smstemplate=$('#selecttemplate').val();
      var smstext=$('#smstext').val();
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_smstemplate_master"); ?>',
                data:{'smstemplate': smstemplate,'smstext':smstext},
                success:function(data){
                    $('#addsmstemplate_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addsmstemplate_msg').html('Data Updated Successfully').addClass('alert alert-success');
                    $("select#selecttemplate").val('');
                    $('#smstext').val('');
                },
                error : function(error)
                {
                    $('#addsmstemplate_msg').removeClass('alert alert-success');
                    $('#addsmstemplate_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                   
                }
            });
    }
  }

  function isValidForm()
  {   
      $('#selecttemplate_msg').html('');
      $('#smstext_msg').html('');
      if($('#selecttemplate').val() == "")
      {
        $('#selecttemplate_msg').html('');
        $('#selecttemplate_msg').html('<div style="color:red" role="alert">Please Select Template</div>');
        //alert("Please Enter Product Name");
        return false;
      }
      else if($('#smstext').val() == "")
      {
        $('#smstext_msg').html('');
        $('#smstext_msg').html('<div style="color:red" role="alert">Please Enter SMS Text</div>');
        //alert("Please Enter Product Name");
        return false;
      }
      else
        return true;
  }

</script> 
</html>