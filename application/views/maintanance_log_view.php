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
          <span class="breadcrumb-item active">Maintanance Log</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Maintanance Log</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_mlogmaster">
              
              <div class="col-lg-4 mg-t-20 mg-lg-t-0"><span class="tx-danger">*</span>
                <select id= "selectproduct" class="form-control select2-show-search" data-placeholder="Select Product" required>
                <option value="">Select Product</option>
                <?php foreach ($products as $p)
                 { 
                ?>
                  <option value="<?php echo $p['product_id'] ?>"><?php echo $p['productname'] ?></option>
                 <?php 
                 } 
                 ?>
                </select>
              <div style="width:100%"  id="selectproduct_msg"></div>
              </div><!-- col-4 -->
               <div class="col-lg-4 mg-t-20 mg-lg-t-0"><span class="tx-danger">*</span>
                <select id="selectattribute" class="form-control select2-show-search" data-placeholder="Select Attribute" required>
                <option value="">Select Attribute</option>
                <?php foreach ($attributes as $a)
                 { 
                ?>
                  <option value="<?php echo $a['attribute_id'] ?>"><?php echo $a['attributename'] ?></option>
                 <?php 
                 } 
                 ?>
                </select>
              <div style="width:100%" id="selectattribute_msg"></div>
              </div><!-- col-4 -->
              <div class="form-group">
                <label for="inputDate" class="col-sm-2 control-label">Date<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="logdate" name="logdate" type="text" required> 
                  </div>
                <div class="col-sm-5 input-group" id="description_msg"></div>
              </div>
              <div class="form-group">
                <label for="inputDescription" class="col-sm-2 control-label">Description<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="description" name="description" type="text" required> 
                  </div>
                <div class="col-sm-5 input-group" id="description_msg"></div>
              </div>
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_maintanance');"> Submit </a>
                </div>
              </div>
           </form>
           <div class="col-sm-5 input-group" id="addmlog_msg"></div>

           <div class="table-wrapper">
              <table id="logtable" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-5p">Sr.No</th>
                    <th class="wd-15p">Product</th>
                    <th class="wd-15p">Attribute</th>
                    <th class="wd-15p">Date</th>
                    <th class="wd-15p">Description</th>
                    <!-- <th class="wd-15p">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($maintanancelog as $m)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "productname_".$m['mlog_id'] ?>' data-original-value="<?php echo $m['productname'] ?>"><?php echo $m['productname']; ?>
                    </td>
                    <td id='<?php echo "attributename_".$m['mlog_id'] ?>' data-original-value="<?php echo $m['attributename'] ?>"><?php echo $m['attributename']; ?>
                    </td>
                    <td id='<?php echo "logdate_".$m['mlog_id'] ?>' data-original-value="<?php echo $m['log_date'] ?>"><?php echo $m['log_date']; ?>
                    </td>
                    <td id='<?php echo "description_".$m['mlog_id'] ?>' data-original-value="<?php echo $m['description'] ?>"><?php echo $m['description']; ?>
                    </td>
                   <!--  <td><a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php //echo "editimg_".$m['mlog_id'] ?>' onclick="editMaster(this,'custid',<?php //echo $m['mlog_id'] ?>);">
                    <img src="<?php //echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a>
                     <a class="img-link" href="javascript:void(0);" id='<?php //echo "deleteimg_".$m['mlog_id'] ?>' onclick="blockMaster(this,'custid',<?php //echo $m['mlog_id'] ?>);">
                    <img src="<?php //echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <a class="img-link" href="javascript:void(0);" id='<?php //echo "cancelimg_".$m['mlog_id'] ?>'>
                     </a>
                    </td> -->
                  </tr>
                 <?php 
                  $i++;
                  }

                  ?>  
                </tbody>
              </table>
            </div> <!-- table-wrapper -->


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
      $('#logdate').datepicker({
        dateFormat: 'dd-mm-yy'
        });
      $('#logdate').datepicker('setDate', 'today');
      $('#selectproduct').select2();
      $('#selectattribute').select2();
    
      //$('.date-picker').datepicker("option", "dateFormat", "dd-mm-yy");
        $('#logtable').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
       });
  });
  function submitMaster(formId) {
     
   var form = $( "#form_mlogmaster" );
   form.validate();
   //alert(form.valid());
   //var validator = $( "#form_mlogmaster" ).validate();
   //validator.element( "#selectattribute" );
    

    if(form.valid())
    {
      var product_id=$('#selectproduct').val();
      var attribute_id=$('#selectattribute').val();
      var mlogdate=$('#logdate').val();
      var description=$('#description').val();
     //alert(productname);
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/maintanance/add_maintanlog_master"); ?>',
                data:{'product_id':product_id,'attribute_id':attribute_id,'mlogdate':mlogdate,'description':description},
                success:function(data){
                    $('#addmlog_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addmlog_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $("select#selectproduct").val('');
                    $("select#selectattribute").val('');
                    //$('#mlogdate').val('');
                    $('#description').val('');
                    
                },
                error : function(error)
                {
                    $('#addmlog_msg').removeClass('alert alert-success');
                    $('#addmlog_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                }
            });
    }
    else
    {
      alert("All fields are required");
      return false;
    }
  }

  function isValidForm()
  {
    /*$('#product_id').html('');
    $('#attribute_id').html('');
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
        return true;*/
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
  
</script> 

</html>