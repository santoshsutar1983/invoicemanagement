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

              <div class="box">
              <div class="form-group" style="display:inline;">
              
                <label  for="inputEmp" class="col-sm-2 control-label">
                <input type="checkbox" style="width:18px;height:18px;" class="checkbox" type="checkbox" name="presentAll" id="presentAll">&nbsp;<span style="    font-size: 15px;color: black;"> Select All </span>
                </label>
              </div>
              </div>

              <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                Employee List
                
                <div class="box" style="overflow: auto; height: 250px;width: 80%;
                  margin-top: 10px;">
                  <?php foreach ($employees as $e)
                  {  ?>
                  <div class="checkbox">
                    <label>
                     <input type="checkbox" name="markattend" value="<?php echo $e['emp_id'] ?>"/>
                      <i class="input-helper"></i>
                      <span><?php echo $e['employeename'] ?></span>
                    </label>
                  </div>
                  <?php } ?>

                </div>
              </div>
              <div id="employee_list"></div>
              
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

       $("#attenddate").on("change",function(){
        var selected = $(this).val();
        getEmployeeAttendance();
        //alert(selected);
        });

      $('#attenddate').datepicker('setDate', 'today');
  var attendate=$('#attenddate').val();
  //Load getEmployeeAttendance in page load
  getEmployeeAttendance(attendate);
  

  // check and uncheck all checkbox
     $("#presentAll").click(function () 
     {
        if ($("#presentAll").is(':checked')) 
        {
            $("input:checkbox[name=markattend]").each(function () 
            {
                  $(this).prop("checked", true);
            });
             $("input:checkbox[name=absentAll]").each(function () 
            {
                  $(this).prop("checked", false);
            });
        }
        else 
        {
            $("input:checkbox[name=markattend]").each(function () 
            {
                  $(this).prop("checked", false);
            });
        }
    });
     // uncheck all checkbox
     $("#absentAll").click(function () 
     {
        if ($("#absentAll").is(':checked')) 
        {
            $("input:checkbox[name=markattend]").each(function () 
            {
                  $(this).prop("checked", false);
            });
            $("input:checkbox[name=presentAll]").each(function () 
            {
                  $(this).prop("checked", false);
            });
        }
        else 
        {
            $("input:checkbox[name=markattend]").each(function () 
            {
                  $(this).prop("checked", true);
            });
        }
    });

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

  // get employee attendance dates
  function getEmployeeAttendance()
  {
   var attendate=$('#attenddate').val();
   jQuery.ajax({
        type:"POST",
        url:'<?php echo base_url("index.php/employee/getEmployeeAttendance"); ?>',
        data:{ attendate:attendate},
        success:function(result) 
        {
          
          $("input:checkbox[name=markattend]").each(function () 
          {
                $(this).prop("checked", false);
          });
          var obj = $.parseJSON(result);
          if(obj.status==1)
          {
            for(var i=0,len = obj.attendlist.length;i<len;i++)
                    {

                    $('input:checkbox[name=markattend][value="'+obj.attendlist[i].emp_id+'"]').prop('checked', true);
                    }
          }
         },
        error:function(error) {
            console.log(error);
        }
    });
  }
  // end of employee attendance dates

</script> 

</html>