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
          <span class="breadcrumb-item active">Employee Attendance</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Employee Attendance</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_empattend">
              <div class="form-group">
                <label for="inputDate" class="col-sm-2 control-label">Date<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="" id="attenddate" name="attenddate" type="text" readonly="readonly" required> 
                  </div>
                <div class="col-sm-5 input-group" id="attendate_msg"></div>
              </div>
              <div class="col-lg-4 mg-t-20 mg-lg-t-0"><span class="tx-danger"></span>
                <div id="empattend" style="overflow: auto; height: 250px;width: 80%;
                                      margin-top: 10px;">
                  <?php foreach ($employees as $e)
                 {  ?>
                  <div class="switch" style="width: auto;height: 23px;">
                   <span style="float:left"> 
                   <input type="checkbox" name="markattend" value="<?php echo $e['emp_id'] ?>"/>&nbsp;&nbsp;<?php echo $e['employeename'] ?>
                   </span>
                  </div>
                  <?php } ?>
                </div>
              </div><!-- col-4 -->
              
              <br>
               <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_maintanance');"> Submit </a>
                </div>
              </div>
           </form>
           <div class="col-sm-5 input-group" id="addmlog_msg"></div>

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
      $('#attenddate').datepicker({
        dateFormat: 'dd-mm-yy'
        });
      $('#attenddate').datepicker('setDate', 'today');

  });
  function submitMaster(formId) {

    var attendate=$('#attenddate').val();
    if(attenddate=="")
    {
      alert("Please select data");
      return false;
    }
    // get select checkbox values as per empid
    var selectedemp = [];                
    $("input:checkbox[name=markattend]:checked").each(function() 
    {
           selectedemp.push($(this).val());
    });
    //alert(selectedemp);
    //$('#res').html(JSON.stringify(selected));
    var form = $( "#form_empattend" );
    //alert(productname);
     $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/employee/mark_employee_attendance"); ?>',
                data:{'attendate':attendate,'selectedemp':selectedemp},
                success:function(data){
                  var obj = $.parseJSON(data);
                  if(obj.status==1)
                   alert("Attendance Marked Successfully");
                    
                },
                error : function(error)
                {
                  alert("Error while updating attendate");
                }
            });
    
 
  }

    
  
</script> 

</html>