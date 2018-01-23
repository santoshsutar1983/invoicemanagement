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
          <span class="breadcrumb-item active">Attribute Master</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
        <div class="card bd-primary mg-t-20">
          <div class="card-header bg-primary tx-white">Attribute Master</div>
          <div class="card-body pd-sm-30">
           <form class="form-horizontal" id="form_attributemaster">
              <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Attribute Name:<span class="tx-danger">*</span></label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="attributename" name="attributename" type="text" required>
                  </div>
                <div class="col-sm-5 input-group" id="attribute_msg"></div>
              </div>
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_attributemaster');">Submit</a>
                </div>
              </div>
           </form>
           <div id="addattribute_msg"></div>
           
           <div class="table-wrapper">
              <table id="adatatable" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-5p">Sr.No</th>
                    <th class="wd-15p">Attribute Name</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($attributes as $a)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "attributename_".$a['attribute_id'] ?>' data-original-value="<?php echo $a['attributename'] ?>"><?php echo $a['attributename'] ?></td>
                    <td><a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php echo "editimg_".$a['attribute_id'] ?>' onclick="editMaster(this,'attributeid',<?php echo $a['attribute_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "deleteimg_".$a['attribute_id'] ?>' onclick="deleteMaster(this,'attribute_d',<?php echo $a['attribute_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "cancelimg_".$a['attribute_id'] ?>'>
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
     // $('.date-picker').datepicker("option", "dateFormat", "dd-mm-yy");
      $('#adatatable').DataTable({
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
    if(formId == 'form_attributemaster')
    {
      isValid = isValidForm(); 
      actionName = 'add_attribute_master';
    }
    if(isValid)
    {
      var attributename=$('#attributename').val();
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_attribute_master"); ?>',
                data:{'attributename':  attributename},
                success:function(data){
                    $('#addattribute_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addattribute_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#attributename').val('');
                    
                },
                error : function(error)
                {
                    $('#addattribute_msg').removeClass('alert alert-success');
                    $('#addattribute_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                }
            });
    }
  }

  function isValidForm()
  {
      $('#attribute_msg').html('');
      if($('#attributename').val() == "")
      {
        $('#attribute_msg').html('');
        $('#attribute_msg').html('<div style="color:red" role="alert">Please Enter attribute Name</div>');
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
        oldattributename = $("#attributename_" + uid).text();
        $("#attributename_" + uid).html("<input type='text' name='attributenamenew_" + uid + "' id='attributenamenew_" + uid + "' value='" + oldattributename + "' />");
        $("#editimg_"+uid).attr('data-action','update_data');
        $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/save.png");?>');
        $("#cancelimg_"+uid).html('<a href="javascript:void(0);" onclick="cancelEdit(this,'+uid+');">'+'<img id="cancelimg_'+uid+'" src="'+path+'assets/img/cancel.ico" width="20" height="20"/>'+'</a>');

      }
      else if($(element).attr('data-action') === "update_data")
      {
        var attributename_new=$("#attributenamenew_"+uid).val();
        var path = $('#path').val();
        //make ajax call
        var action = 'update_attribute_master';
        if(attributename_new != '')
        {
           $.ajax({
                  url:'<?php echo base_url("index.php/mastersetting/update_attribute_master"); ?>',
                  type:'POST',
                  data : {attributename:attributename_new,attribute_id:uid},
                  dataType: 'JSON',
                  success : function(data){
                      if(data.status == 1)
                      {
                        alert("Data updated successfully !");
                        $("#attributename_" + uid).html(jQuery("#attributenamenew_" + uid).val());
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
   $("#attributenamenew_" +uid).remove();
   $("#attributename_" + uid).html(oldattributename);
   $("#cancelimg_"+uid).html('');
   $("#editimg_"+uid).attr('data-action','show_gui'); 
   $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/edit.png");?>');
   }
  
  function deleteMaster(element,formType,uid)
  {
    var path= '<?php echo base_url();?>'
    attributename=$("#attributename_"+uid).data('original-value');
    var confirmation = confirm('Confirm to Delete '+ attributename + ' ? ');
    if(confirmation == false)
      return;
    var action = 'delete_attribute_master';
    $.ajax({
              url:'<?php echo base_url("index.php/mastersetting/delete_attribute_master"); ?>',
              type:'POST',
              data : {attribute_id:uid},
              dataType: 'JSON',
              success : function(data){
                  if(data.status == 1)
                  {
                    alert(attributename + " deleted successfully !");
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