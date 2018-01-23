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
              <!-- <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Service Description:</label>
                  <div class="col-sm-5 input-group date">
                  <input class="form-control pull-right" id="servicedescription" name="servicedescription" type="text">
                  </div>
              </div> -->
           
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_servicemaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div id="addservice_msg"></div>

           <div class="table-wrapper">
              <table id="sdatatable" class="table display responsive nowrap" width="70%">
                <thead>
                  <tr>
                    <th class="wd-15p">Sr.No</th><th class="wd-15p">Service Name</th><th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($services as $s)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "servicename_".$s['service_id'] ?>' data-original-value="<?php echo $s['servicename'] ?>"><?php echo $s['servicename'] ?></td>
                    <td><a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php echo "editimg_".$s['service_id'] ?>' onclick="editMaster(this,'serviceid',<?php echo $s['service_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "deleteimg_".$s['service_id'] ?>' onclick="deleteMaster(this,'serviceid',<?php echo $s['service_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "cancelimg_".$s['service_id'] ?>'>
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
      $('#sdatatable').DataTable({
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
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_service_master"); ?>',
                data:{'servicename':  servicename},
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
                }
            });
    }
  }

  function isValidServiceMasterForm()
  {   
      $('#service_msg').html('');
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

  function editMaster(element,formType,uid)
  {
      if($(element).attr('data-action') === "show_gui")
      {
        var path= '<?php echo base_url();?>'
        oldservicename = jQuery("#servicename_" + uid).text();
        jQuery("#servicename_" + uid).html("<input type='text' name='servicenamenew_" + uid + "' id='servicenamenew_" + uid + "' value='" + oldservicename + "' />");
        $("#editimg_"+uid).attr('data-action','update_data');
        $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/save.png");?>');
        $("#cancelimg_"+uid).html('<a href="javascript:void(0);" onclick="cancelEdit(this,'+uid+');">'+'<img id="cancelimg_'+uid+'" src="'+path+'assets/img/cancel.ico" width="20" height="20"/>'+'</a>');

      }
      else if($(element).attr('data-action') === "update_data")
      {
        var servicename_new=jQuery("#servicenamenew_"+uid).val();
        var path = $('#path').val();
        //make ajax call
        var action = 'update_service_master';
        if(servicename_new != '')
        {
           $.ajax({
                  url:'<?php echo base_url("index.php/mastersetting/update_service_master"); ?>',
                  type:'POST',
                  data : {servicename:servicename_new,service_id:uid},
                  dataType: 'JSON',
                  success : function(data){
                      if(data.status == 1)
                      {
                        alert("Data updated successfully !");
                        jQuery("#servicename_" + uid).html(jQuery("#servicenamenew_" + uid).val());
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
   $("#servicenamenew_" +uid).remove();
   //$("#productdescnew_"+uid).remove('');
   jQuery("#servicename_" + uid).html(oldservicename);
   //jQuery("#productdesc_" + uid).html(olddesciption);
   $("#cancelimg_"+uid).html('');
   $("#editimg_"+uid).attr('data-action','show_gui'); 
   $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/edit.png");?>');
   }
  
  function deleteMaster(element,formType,uid)
  {
    var path= '<?php echo base_url();?>'
    servicename=$("#servicename_"+uid).data('original-value');
    //alert(servicename);
    var confirmation = confirm('Confirm to Delete '+ servicename + ' ? ');
    if(confirmation == false)
      return;
    var action = 'delete_service_master';
    $.ajax({
              url:'<?php echo base_url("index.php/mastersetting/delete_service_master"); ?>',
              type:'POST',
              data : {service_id:uid},
              dataType: 'JSON',
              success : function(data){
                  if(data.status == 1)
                  {
                    alert(servicename + " deleted successfully !");
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