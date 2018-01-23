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
                <label for="inputFname" class="col-sm-2 control-label">Name<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="customername" name="customername" type="text" required="required">
                  </div>
                <div class="col-sm-5 input-group" id="customername_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputContact" class="col-sm-2 control-label">Mobile<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" onkeypress="return isNumberKey(event)" id="contact" name="contact" type="text" maxlength="10" required>
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
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_customermaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div class="col-sm-5 input-group" id="addcustomer_msg"></div>

           <div class="table-wrapper">
              <table id="custdatatable" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-5p">Sr.No</th>
                    <th class="wd-15p">Customer Name</th>
                    <th class="wd-15p">Mobile</th>
                    <th class="wd-15p">Address</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($customers as $c)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "customername_".$c['customer_id'] ?>' data-original-value="<?php echo $c['customername'] ?>"><?php echo $c['customername']; ?>
                    </td>
                    <td id='<?php echo "contact_".$c['customer_id'] ?>' data-original-value="<?php echo $c['contact'] ?>"><?php echo $c['contact']; ?>
                    </td>
                    <td id='<?php echo "address_".$c['customer_id'] ?>' data-original-value="<?php echo $c['address'] ?>"><?php echo $c['address']; ?>
                    </td>
                    <td id='<?php echo "email_".$c['customer_id'] ?>' data-original-value="<?php echo $c['email'] ?>"><?php echo $c['email']; ?>
                    </td>
                    <td><a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php echo "editimg_".$c['customer_id'] ?>' onclick="editMaster(this,'custid',<?php echo $c['customer_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "deleteimg_".$c['customer_id'] ?>' onclick="blockMaster(this,'custid',<?php echo $c['customer_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "cancelimg_".$c['customer_id'] ?>'>
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
        $('#custdatatable').DataTable({
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
    if(formId == 'form_customermaster')
    {
      isValid = isValidForm(); 
      actionName = 'add_customermaster';
    }
    if(isValid)
    {
      var customefname=$('#customefname').val();
      var contact=$('#contact').val();
      var address=$('#address').val();
      var email=$('#email').val();
      //alert(productname);
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_customer_master"); ?>',
                data:{'customername':customername,'contact':contact,'address':address,'email':email},
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
    $('#customename_msg').html('');
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
        oldcustomername = $("#customername_" + uid).text();
        //console.log("s="+ oldcustomername+"e");
        oldcontact = $("#contact_" + uid).text();
        oldaddress = $("#address_" + uid).text();
        oldemail = $("#email_" + uid).text();

        $("#customername_" + uid).html("<input type='text' name='customernamenew_" + uid + "' id='customernamenew_" + uid + "' value='"+ oldcustomername + "' />");
        $("#contact_" + uid).html("<input type='text' onkeypress='return isNumberKey(event)' name='contactnew_" + uid + "' id='contactnew_" + uid + "' value='" + oldcontact+ "' />");
        $("#address_" + uid).html("<input type='text' name='addressnew_" + uid + "' id='addressnew_" + uid + "' value='" + oldaddress+ "' />");
        $("#email_" + uid).html("<input type='text' name='emailnew_" + uid + "' id='emailnew_" + uid + "' value='" + oldemail + "' />");
        $("#editimg_"+uid).attr('data-action','update_data');
        $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/save.png");?>');
        $("#cancelimg_"+uid).html('<a href="javascript:void(0);" onclick="cancelEdit(this,'+uid+');">'+'<img id="cancelimg_'+uid+'" src="'+path+'assets/img/cancel.ico" width="20" height="20"/>'+'</a>');

      }
      else if($(element).attr('data-action') === "update_data")
      {
        var customername_new=$("#customernamenew_"+uid).val();
        var contact_new=$("#contactnew_"+uid).val();
        var address_new=$("#addressnew_"+uid).val();
        var email_new=$("#emailnew_"+uid).val();
         //make ajax call
        var action = 'update_customer_master';
        if(customername_new != '' && contact_new != '' && address_new != '')
        {
           $.ajax({
                  url:'<?php echo base_url("index.php/mastersetting/update_customer_master"); ?>',
                  type:'POST',
                  data : {customername:customername_new,contact:contact_new,address:address_new,email:email_new,cust_id:uid},
                  dataType: 'JSON',
                  success : function(data){
                      if(data.status == 1)
                      {
                        alert("Data updated successfully !");
                        $("#customername_" + uid).html($("#customernamenew_" + uid).val());
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
   $("#customernamenew_" +uid).remove();
   $("#contactnew_" +uid).remove();
   $("#addressnew_" +uid).remove();
   $("#emailnew_" +uid).remove();
   
   $("#customername_" + uid).html(oldcustomername);
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
    customername=$("#customername_"+uid).data('original-value');
    contact=$("#contact_"+uid).data('original-value');
    address=$("#address_"+uid).data('original-value');
    email=$("#email_"+uid).data('original-value');
    var confirmation = confirm('Confirm to block '+ customername + ' ? ');
    if(confirmation == false)
      return;
    var action = 'block_customer_master';
    $.ajax({
              url:'<?php echo base_url("index.php/mastersetting/block_customer_master"); ?>',
              type:'POST',
              data : {cust_id:uid},
              dataType: 'JSON',
              success : function(data){
                  if(data.status == 1)
                  {
                    alert(customername + " blocked successfully !");
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