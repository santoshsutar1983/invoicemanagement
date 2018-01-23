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

           <div class="table-wrapper">
              <table id="psdatatable" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-5p">Sr.No</th><th class="wd-15p">Product Name</th><th class="wd-15p">Service Name</th><th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;
                foreach ($psmapping as $m)
                { ?>
                 <tr>
                    <td><?php echo $i; ?></td>
                    <td id='<?php echo "product_".$m['psmap_id'] ?>' data-original-value="<?php echo $m['productname'] ?>" > <?php echo $m['productname'] ?></td>
                    <td id='<?php echo "service_".$m['psmap_id'] ?>' data-original-value="<?php echo $m['servicename'] ?>" ><?php echo $m['servicename'] ?></td>
                    <td><!-- <a class="img-link" href="javascript:void(0);" data-action="show_gui" id='<?php //echo "editimg_".$m['psmap_id'] ?>' onclick="editMaster(this,'productid',<?php //echo $m['psmap_id'] ?>);">
                    <img src="<?php //echo base_url(); ?>assets/img/edit.png" width="20" height="20"/></a> -->
                     <a class="img-link" href="javascript:void(0);" id='<?php echo "deleteimg_".$m['psmap_id'] ?>' onclick="deleteMaster(this,'psmapid',<?php echo $m['psmap_id'] ?>);">
                    <img src="<?php echo base_url(); ?>assets/img/delete.png" width="20" height="20"/>
                     </a>
                     <!-- <a class="img-link" href="javascript:void(0);" id='<?php //echo "cancelimg_".$m['psmap_id'] ?>'>
                     </a> -->
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
   $('#psdatatable').DataTable({
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
                    $("select#selectproduct").val('');
                    $("select#selectservice").val('');
                },
                error : function(error)
                {
                    $('#addpsmapping_msg').removeClass('alert alert-success');
                    $('#addpsmapping_msg').html('Error while Adding Data').addClass('alert alert-danger mg-b-0');
                   
                }
            });
    }
  }

  function isValidForm()
  {   
      $('#selectproduct_msg').html('');
      $('#selectservice_msg').html('');
      
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

  function deleteMaster(element,formType,uid)
  {
    var path= '<?php echo base_url();?>'
    //productname=  $("#psmapping_"+uid).val();
    productname=$("#product_"+uid).data('original-value');
    servicename=$("#service_"+uid).data('original-value');
    //alert(productname);
    var confirmation = confirm('Confirm to Delete '+ productname + '-'+ servicename + ' Mapping ? ');
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