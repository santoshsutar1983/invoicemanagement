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
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="productname" name="productname" type="text" required>
                  </div>
                <div class="col-sm-5 input-group" id="product_msg"></div>
              </div>
              <!-- <div class="form-group">
                <label for="inputFinance" class="col-sm-2 control-label">Product Description:</label>
                  <div class="col-sm-5 input-group">
                  <input class="form-control pull-right" id="productdescription" name="productdescription" type="text">
                  </div>
                <div id="descipt_msg"></div>
              </div> -->
           
              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_productmaster');"> Submit </a>
                </div>
              </div>
           </form>
           <div id="addproduct_msg"></div>
           
           <div class="table-wrapper">
              <table id="pdatatable" class="table display responsive nowrap" width="70%">
                <thead>
                  <tr>
                    <th class="wd-15p">Sr.No</th><th class="wd-15p">Product Name</th><th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($products as $p)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "productname_".$p['product_id'] ?>' data-original-value="<?php echo $p['productname'] ?>"><?php echo $p['productname'] ?></td>
                    <td><a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php echo "editimg_".$p['product_id'] ?>' onclick="editMaster(this,'productid',<?php echo $p['product_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "deleteimg_".$p['product_id'] ?>' onclick="deleteMaster(this,'productid',<?php echo $p['product_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "cancelimg_".$p['product_id'] ?>'>
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
      $('#pdatatable').DataTable({
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
    if(formId == 'form_productmaster')
    {
      isValid = isValidProductMasterForm(); 
      actionName = 'add_product_master';
    }
    if(isValid)
    {
      var productname=$('#productname').val();
      //var productdescription=$('#productdescription').val();
      //alert(productname);
      $.ajax({
                type:'POST',
                url:'<?php echo base_url("index.php/mastersetting/add_product_master"); ?>',
                data:{'productname':  productname},
                success:function(data){
                    $('#addproduct_msg').removeClass('alert alert-danger mg-b-0');
                    $('#addproduct_msg').html('Data Inserted Successfully').addClass('alert alert-success');
                    $('#productname').val('');
                    //$('#productdescription').val('');
                },
                error : function(error)
                {
                    $('#addproduct_msg').removeClass('alert alert-success');
                    $('#addproduct_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                }
            });
    }
  }

  function isValidProductMasterForm()
  {
      $('#product_msg').html('');
      if($('#productname').val() == "")
      {
        $('#product_msg').html('');
        $('#product_msg').html('<div style="color:red" role="alert">Please Enter Product Name</div>');
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
        oldproductname = jQuery("#productname_" + uid).text();
        //olddesciption = jQuery("#productdesc_" + uid).text();
        jQuery("#productname_" + uid).html("<input type='text' name='productnamenew_" + uid + "' id='productnamenew_" + uid + "' value='" + oldproductname + "' />");
        //jQuery("#productdesc_" + uid).html("<input type='text' name='productdescnew_" + uid + "' id='productdescnew_" + uid + "' value='" + olddesciption + "' />");
        $("#editimg_"+uid).attr('data-action','update_data');
        $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/save.png");?>');
        $("#cancelimg_"+uid).html('<a href="javascript:void(0);" onclick="cancelEdit(this,'+uid+');">'+'<img id="cancelimg_'+uid+'" src="'+path+'assets/img/cancel.ico" width="20" height="20"/>'+'</a>');

      }
      else if($(element).attr('data-action') === "update_data")
      {
        var productname_new=jQuery("#productnamenew_"+uid).val();
        //var desc_new=jQuery("#productdescnew_"+uid).val();
        var path = $('#path').val();
        //make ajax call
        var action = 'update_product_master';
        if(productname_new != '')
        {
           $.ajax({
                  url:'<?php echo base_url("index.php/mastersetting/update_product_master"); ?>',
                  type:'POST',
                  data : {productname:productname_new,product_id:uid},
                  dataType: 'JSON',
                  success : function(data){
                      if(data.status == 1)
                      {
                        alert("Data updated successfully !");
                        jQuery("#productname_" + uid).html(jQuery("#productnamenew_" + uid).val());
                        //jQuery("#productdesc_" + uid).html(jQuery("#productdescnew_" + uid).val());
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
   $("#productnamenew_" +uid).remove();
   //$("#productdescnew_"+uid).remove('');
   jQuery("#productname_" + uid).html(oldproductname);
   //jQuery("#productdesc_" + uid).html(olddesciption);
   $("#cancelimg_"+uid).html('');
   $("#editimg_"+uid).attr('data-action','show_gui'); 
   $("#editimg_"+uid).find('img').attr('src','<?php echo base_url("assets/img/edit.png");?>');
   }
  
  function deleteMaster(element,formType,uid)
  {
    var path= '<?php echo base_url();?>'
    productname=$("#productname_"+uid).data('original-value');
    var confirmation = confirm('Confirm to Delete '+ productname + ' ? ');
    if(confirmation == false)
      return;
    var action = 'delete_product_master';
    $.ajax({
              url:'<?php echo base_url("index.php/mastersetting/delete_product_master"); ?>',
              type:'POST',
              data : {product_id:uid},
              dataType: 'JSON',
              success : function(data){
                  if(data.status == 1)
                  {
                    alert(productname + " deleted successfully !");
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