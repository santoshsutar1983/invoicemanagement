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
          <span class="breadcrumb-item active">Employee Master</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Employee Master</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_employeemaster">
              <div class="form-group">
                <label for="inputFname" class="col-sm-2 control-label">Employee Name<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="employeename" name="employeename" type="text" >
                  </div>
                <div class="col-sm-5 input-group" id="employeename_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputContact" class="col-sm-2 control-label">Mobile<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" onkeypress="return isNumberKey(event)" maxlength="10" id="contact" name="contact" type="text" required>
                  </div>
                <div class="col-sm-5 input-group" id="contact_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputAddress" class="col-sm-2 control-label">Address<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="address" name="address" type="text" required> 
                  </div>
                <div class="col-sm-5 input-group" id="address_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="email" name="email" type="email">
                  </div>
                <div class="col-sm-5 input-group" id="email_msg"></div>
              </div>
          
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_employeemaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div class="col-sm-5 input-group" id="addemployee_msg"></div>


           <div class="table-wrapper">
              <table id="empdatatable" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-5p">Sr.No</th>
                    <th class="wd-15p">Employee Name</th>
                    <th class="wd-15p">Mobile</th>
                    <th class="wd-15p">Address</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($employees as $e)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "employeename_".$e['emp_id'] ?>' data-original-value="<?php echo $e['employeename'] ?>"><?php echo $e['employeename']; ?>
                    </td>
                    <td id='<?php echo "contact_".$e['emp_id'] ?>' data-original-value="<?php echo $e['contact'] ?>"><?php echo $e['contact']; ?>
                    </td>
                    <td id='<?php echo "address_".$e['emp_id'] ?>' data-original-value="<?php echo $e['address'] ?>"><?php echo $e['address']; ?>
                    </td>
                    <td id='<?php echo "email_".$e['emp_id'] ?>' data-original-value="<?php echo $e['email'] ?>"><?php echo $e['email']; ?>
                    </td>
                    <td><a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php echo "editimg_".$e['emp_id'] ?>' onclick="editMaster(this,'empid',<?php echo $e['emp_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "deleteimg_".$e['emp_id'] ?>' onclick="blockMaster(this,'empid',<?php echo $e['emp_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "cancelimg_".$e['emp_id'] ?>'>
                     </a>
                    </td>
                  </tr>
                 <?php 
                  $i++;
                  }

                  ?>  
                </tbody>
              </table>
            </div><!-- table-wrapper -->


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
      //$('.date-picker').datepicker("option", "dateFormat", "dd-mm-yy");
       $('#empdatatable').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
       });
  });
  function submitMaster(formId) {
     //validate
    var isValid = false;
    var actionName = '';
    //alert(formId);
    if(formId == 'form_employeemaster')
    {
      isValid = isValidForm(); 
      actionName = 'add_employee_master';
    }
    if(isValid)
    {
      var employeename=$('#employeename').val();
      var contact=$('#contact').val();
      var address=$('#address').val();
      var email=$('#email').val();
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_employee_master"); ?>',
                data:{'employeename':employeename,'contact':contact,'address':address,'email':email},
                success:function(data){
                    $('#addemployee_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addemployee_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#employeename').val('');
                    $('#contact').val('');
                    $('#address').val('');
                    $('#email').val('');
                    
                },
                error : function(error)
                {
                    $('#addemployee_msg').removeClass('alert alert-success');
                    $('#addemployee_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                }
            });
    }
  }

  function isValidForm()
  {
    $('#employeename_msg').html('');
    $('#contact_msg').html('');
    $('#address_msg').html('');
    $('#email_msg').html('');
    var emailid=$('#email').val();
    if($('#employeename').val() == "")
      {
        $('#employeename_msg').html('');
        $('#employeename_msg').html('<div style="color:red" role="alert">Please Enter Employee Name</div>');
        return false;
      }
      else if($('#contact').val() == "")
      {
        $('#contact_msg').html('');
        $('#contact_msg').html('<div style="color:red" role="alert">Please Enter Employee Contact</div>');
        return false;
      }
      else if($('#address').val() == "")
      {
        $('#address_msg').html('');
        $('#address_msg').html('<div style="color:red" role="alert">Please Enter Employee Address</div>');
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
  
  function isNumberKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
       return false;
    return true;
  }

  function editMaster(element,formType,uid)
  {
      if($(element).attr('data-action') === "show_gui")
      {
        var path= '<?php echo base_url();?>'
        oldemployeename = $("#employeename_" + uid).text();
        //console.log("s="+ oldemployeename+"e");
        oldcontact = $("#contact_" + uid).text();
        oldaddress = $("#address_" + uid).text();
        oldemail = $("#email_" + uid).text();

        $("#employeename_" + uid).html("<input type='text' name='employeenamenew_" + uid + "' id='employeenamenew_" + uid + "' value='"+ oldemployeename + "' />");
        $("#contact_" + uid).html("<input type='text' onkeypress='return isNumberKey(event)' name='contactnew_" + uid + "' id='contactnew_" + uid + "' value='" + oldcontact+ "' />");
        $("#address_" + uid).html("<input type='text' name='addressnew_" + uid + "' id='addressnew_" + uid + "' value='" + oldaddress+ "' />");
        $("#email_" + uid).html("<input type='text' name='emailnew_" + uid + "' id='emailnew_" + uid + "' value='" + oldemail + "' />");
        $("#editimg_"+uid).attr('data-action','update_data');
        $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/save.png");?>');
        $("#cancelimg_"+uid).html('<a href="javascript:void(0);" onclick="cancelEdit(this,'+uid+');">'+'<img id="cancelimg_'+uid+'" src="'+path+'assets/img/cancel.ico" width="20" height="20"/>'+'</a>');

      }
      else if($(element).attr('data-action') === "update_data")
      {
        var employeename_new=$("#employeenamenew_"+uid).val();
        var contact_new=$("#contactnew_"+uid).val();
        var address_new=$("#addressnew_"+uid).val();
        var email_new=$("#emailnew_"+uid).val();
         //make ajax call
        var action = 'update_employee_master';
        if(employeename_new != '' && contact_new != '' && address_new != '')
        {
           $.ajax({
                  url:'<?php echo base_url("index.php/mastersetting/update_employee_master"); ?>',
                  type:'POST',
                  data : {employeename:employeename_new,contact:contact_new,address:address_new,email:email_new,emp_id:uid},
                  dataType: 'JSON',
                  success : function(data){
                      if(data.status == 1)
                      {
                        alert("Data updated successfully !");
                        $("#employeename_" + uid).html($("#employeenamenew_" + uid).val());
                        $("#contact_" + uid).html($("#contactnew_" + uid).val());
                        $("#address_" + uid).html($("#addressnew_" + uid).val());
                        $("#email_" + uid).html($("#emailnew_" + uid).val());

                        $("#cancelimg_"+uid).html('');
                        $("#editimg_"+uid).attr('data-action','show_gui'); 
                        $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/edit.png");?>');
                        }
                      else
                      {
                          var err = '';
                          for(msg in data.message)
                          {
                              err += data.message[msg];
                          } 
                          alert(err);
                      }
                    //alert the message
                  },
                  error : function(error){
                    alert("network Error");
                  }
            });
        }
        
      }
  }

  function cancelEdit(element,uid)
  {
   $("#employeenamenew_" +uid).remove();
   $("#contactnew_" +uid).remove();
   $("#addressnew_" +uid).remove();
   $("#emailnew_" +uid).remove();
   
   $("#employeename_" + uid).html(oldemployeename);
   $("#contact_" + uid).html(oldcontact);
   $("#address_" + uid).html(oldaddress);
   $("#email_" + uid).html(oldemail);
  
   $("#cancelimg_"+uid).html('');
   $("#editimg_"+uid).attr('data-action','show_gui'); 
   $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/edit.png");?>');
   }
  
  function blockMaster(element,formType,uid)
  {
    var path= '<?php echo base_url();?>'
    employeename=$("#employeename_"+uid).data('original-value');
    contact=$("#contact_"+uid).data('original-value');
    address=$("#address_"+uid).data('original-value');
    email=$("#email_"+uid).data('original-value');
    var confirmation = confirm('Confirm to block '+ employeename + ' ? ');
    if(confirmation == false)
      return;
    var action = 'block_employee_master';
    $.ajax({
              url:'<?php echo base_url("index.php/mastersetting/block_employee_master"); ?>',
              type:'POST',
              data : {emp_id:uid},
              dataType: 'JSON',
              success : function(data){
                  if(data.status == 1)
                  {
                    alert(employeename + " blocked successfully !");
                    $(element).closest('tr').remove();
                  }
                  else
                  {
                      var err = '';
                      for(msg in data.message)
                      {
                          err += data.message[msg];
                      } 
                      alert(err);
                  }
                //alert the message
              },
              error : function(error){
                alert("network Error");
              }
        });
  }


</script> 

</html>