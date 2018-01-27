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
          <span class="breadcrumb-item active">Create Invoice</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
         
          <div class="card bd-primary">
          <form id="myInvoice_cb" name="myInvoice_cb" enctype="multipart/form-data" method="post" method="post">
          <div class="card-body pd-30 pd-md-60">
            <div class="d-md-flex justify-content-between flex-row-reverse">
              <h1 class="mg-b-0 tx-uppercase tx-gray-400 tx-mont tx-bold">Invoice</h1>
              <?php foreach ($companyinfo as $ci) 
              { 
              ?>
              <div class="mg-t-25 mg-md-t-0">
                <h6 class="tx-primary"><?php echo $ci['companyname']?></h6>
                <p class="lh-7"><?php echo $ci['address']?><br>
                <?php echo $ci['contact']?><br>
                </p>
              </div>
              <?php
              } 
              ?>
            </div><!-- d-flex -->
            <div class="row mg-t-20">
              <div class="col-md">
                <label class="tx-uppercase tx-13 tx-bold mg-b-20">Billed To</label>
                 <select class="custselect"  id="selectcustomer" name="selectcustomer">
                    <option value="">Select Customer</option>\
                    <?php foreach($customers as $c) 
                     {
                     ?>
                     <option value="<?php echo $c['customer_id'] ?>"><?php echo $c['customername'] ?></option>
                     <?php } ?>
                     </select>
                <h6 class="tx-inverse">Name:<span id="cname"></span></h6>
                <p class="lh-7">Address:<span id="caddress"></span><br>
                Contact:<span id="ccontact"></span><br>
                Email:<span id="cemail"></p>
              </div><!-- col -->
              <div class="col-md">
                <label class="tx-uppercase tx-13 tx-bold mg-b-20">Invoice Information</label>
                <p class="d-flex justify-content-between mg-b-5">
                  <span>Invoice No</span>
                  <?php foreach ($lastinvoiceno as $last) 
                  { 
                  ?>
                  <span><input  id="invoicenumber" name="invoicenumber" value="<?php echo $last['value']+1 ?>" readonly="readonly" type="text">
                  </span>
                  <?php }
                  ?>
                </p>
                <p class="d-flex justify-content-between mg-b-5">
                  <span>Issue Date:</span>
                  <span><input  id="invoicedate" readonly="readonly" class="date-picker" name="invoicedate" type="text"></span>
                </p>
                </div><!-- col -->
            </div><!-- row -->
            <div class="table-responsive mg-t-40">
            <input type="hidden" id="rowcount" name="rowcount" value="1">
              <table id="invoicecreate_table" class="table">
                <thead>
                  <tr>
                    <th class="wd-20p">Product</th>
                    <th class="wd-20p">Service</th>
                    <th class="tx-center">QNTY</th>
                    <th class="tx-right">Unit Price</th>
                    <th class="tx-right">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="invoicerow_0">
                    <td>
                    <select class="prodselect" id="selectproduct_0" name="selectproduct_0">
                    <option value="">Select Product</option>\
                    <?php foreach($products as $pr) 
                     {
                     ?>
                     <option value="<?php echo $pr['product_id'] ?>"><?php echo $pr['productname'] ?></option>
                     <?php } ?>
                     </select>
                    </td>
                    <td>
                    <select class="servselect" id="selectservice_0" name="selectservice_0">
                    <option value="">Select Service</option>\
                     <?php foreach($services as $sr) 
                     {
                     ?>
                     <option value="<?php echo $sr['service_id'] ?>"><?php echo $sr['servicename'] ?></option>
                     <?php } ?>
                     </select></td>
                    <td class="tx-center">
                    <input  id="quantity_0" class="resetfield" name="quantity_0" onkeyup="return calc(this)" type="number" value="0" >
                    </td>
                    <td class="tx-right">
                    <input  id="unitprice_0" class="resetfield" name="unitprice_0" onkeyup="return calc(this)" type="number" value="0" >
                    </td>
                    <td class="tx-right">
                    <input  id="amount_0" class="amount" onblur="return totalIt(this)"  name="amount_0" type="number" value="0" readonly="readonly"  >
                    </td>
                  </tr>
                  <tr id="beforeaddmoreproduct">
                    <td>
                      <img  title="Add Product" id="addmoreproduct" class="addmoreproduct" width="30" height="30" src="<?php echo base_url()?>assets/img/plus.png" style="cursor: pointer;">
                      <img  title="Remove Product" class="removemoreproduct" width="30" height="30" src="<?php echo base_url()?>assets/img/minus.png" style="cursor: pointer;">
                    </td>
                    <td>
                    </td>
                    <td class="tx-center">
                    </td>
                    <td class="tx-right">
                    </td>
                    <td class="tx-right">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" rowspan="4" class="valign-middle">
                      <div class="mg-r-20">
                        <label class="tx-uppercase tx-13 tx-bold mg-b-10"></label>
                        <p class="tx-13"></p>
                        </div>
                    </td>
                  </tr>
                  <tr>
                  <td class="tx-right">Tax(%)</td>
                    <td colspan="2"  class="tx-right">
                      <input  id="tax" name="tax" value="0" type="number">
                    </td>
                  </tr>
                  <tr>
                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Amount</td>
                    <td colspan="2" class="tx-right"><h4 class="tx-primary tx-bold tx-lato"><input id="totalamount" readonly="readonly"  name="totalamount" value="0" type="number"></h4></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- table-responsive -->

            <hr class="mg-b-60">
          </div><!-- card-body -->
          </form>
          <input class="btn btn-primary btn-block" type="submit" value="Generate" id="invoice_submit" style="cursor: pointer;">
          <!-- <a href="" class="btn btn-primary btn-block">Generate Now</a> -->
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
  $(document).ready(function()
    {  // start of document ready function

      $('.date-picker').datepicker({
        dateFormat: 'dd-mm-yy'
        });
      $('#invoicedate').datepicker('setDate', 'today');
      $(".prodselect").select2();
      $(".servselect").select2();
      $(".custselect").select2();
      path='<?php echo base_url();?>'
      // script to add new product rows after plus click
      var FieldCount = 0;//to keep track of fileds added
      totalamount=0;
      $("#invoicecreate_table").on('click','.addmoreproduct',function()
      {
        FieldCount++; //text box added ncrement
        $("#rowcount").val(FieldCount+1);
        $('<tr id="invoicerow_'+FieldCount+'"><td><select class="prodselect" id="selectproduct_'+FieldCount+'" name="selectproduct_'+FieldCount+'"> \
                      <option value="">Select Product</option>\
                      <?php foreach ($products as $pr) { ?> \
                      <option value="<?php echo $pr['product_id']?>"><?php echo $pr['productname']?></option>\
                        <?php } ?>\
                      </select>\
                      </td>\
                      <td>\
                      <select class="servselect" id="selectservice_'+FieldCount+'" name="selectservice_'+FieldCount+'"> \
                      <option value="">Select Service</option>\
                      <?php foreach ($services as $sr) { ?> \
                      <option value="<?php echo $sr['service_id']?>"><?php echo $sr['servicename']?></option>\
                      <?php } ?>\
                     </select>\
                     </td>\
                     <td class="tx-center">\
                     <input id="quantity_'+FieldCount+'" onkeyup="return calc(this)"  name="quantity_'+FieldCount+'" value="0" type="number">\
                      </td>\
                      <td class="tx-right">\
                     <input  id="unitprice_'+FieldCount+'"  onkeyup="return calc(this)"  name="unitprice_'+FieldCount+'" value="0" type="number">\
                     </td>\
                     <td class="tx-right">\
                     <input  id="amount_'+FieldCount+'"  class="amount" onblur="return totalIt(this)" name="amount_'+FieldCount+'" value="0" type="number" readonly="readonly">\
                     </td>\
                  </tr>').insertBefore("#beforeaddmoreproduct");
               // x++; //text box increment
        $("#addmoreproduct").show();
        $(".prodselect").select2();
        $(".servselect").select2();
        //$('AddMoreFileBox').html("Add More Family Information");
       });

      // script to remove product row after minus click
      $("#invoicecreate_table").on("click",".removemoreproduct", function()
      { 
        if(FieldCount==0)
          return false;
        var $row = $(this).closest("tr").prev();
        var $preval = $row.find(".amount").val(); // Find the text
        // set new value of total here after remove product
        var newtotal= $("#totalamount").val()-$preval;
        $("#totalamount").val(newtotal);
        // remove previous row and decrement field  count
        $(this).closest('tr').prev().remove();
        FieldCount--;
        $("#rowcount").val($("#rowcount").val()-1);
      }) 
  
   // load services as per change in products

   /*jQuery('.prodselect').change(function ()
   {
    var pid=this.value;
    alert(pid);
    if(pid=="")
    {
        alert("Please Select Product");
        return false;
    }
    else
    {
      $.ajax({
          type:"POST",
          url:'<?php //echo base_url("index.php/invoice/get_service_byproduct"); ?>',
          data: {product_id:pid},
          success:function(msg){  
              alert(msg);
              var obj = $.parseJSON(msg); 
              var selectdivs = '';
              selectdivs += "<option value=''>Select Service</option>";
              obj.forEach(function(entry) {
                      selectdivs += "<option value='"+entry['service_id']+"'>"+entry['servicename']+"</option>";
                  }); 
              //jQuery('#classl').html("");
              //jQuery('#classl').append(selectdivs);
          },
          error: function (msg){
              //jQuery("#"+divid).hide();
              alert('Please try after sometime!!!');
          }
      });// end of jquery ajax
    }// end of if else
   });// end of prodselect change event*/

   // load customer info 
   jQuery('#selectcustomer').change(function ()
   {
    var cid=this.value;
    //alert(cid);
    if(cid=="")
    {
        alert("Please Select Customer");
        return false;
    }
    else
    {
      $.ajax({
          type:"POST",
          url:'<?php echo base_url("index.php/invoice/get_customer_byid"); ?>',
          data: {customer_id:cid},
          success:function(data){  
              var obj = $.parseJSON(data); 
               if(obj.status == 1)
                {
                    custobj=obj.customers;
                    console.log(custobj);
                    for(var i=0,len = obj.customers.length;i<len;i++)
                    {
                     var customername=obj.customers[i].customername;
                     var contact=obj.customers[i].contact;
                     var address=obj.customers[i].address;
                     var email=obj.customers[i].email;
                     $('#cname').html(customername);
                     $('#caddress').html(contact);
                     $('#ccontact').html(address);
                     $('#cemail').html(email);
                    }
                }
          },
          error: function (data){
              //jQuery("#"+divid).hide();
              alert('Please try after sometime!!!');
          }
      });// end of jquery ajax
    }// end of if else
   });// end of prodselect change event*/

    //invoice form submit
     $("#invoice_submit").on("click", function(event) {
   
          event.stopImmediatePropagation();
          //cnt = 0;
          var customerid=jQuery("#selectcustomer").val();
          var invoiceno=jQuery("#invoicenumber").val();
         /* var branch=jQuery("#divlist_fc").val();
          var memberid=jQuery("#memberid").val();
          var nonmember=jQuery("#nonmebername").val();
          var total=jQuery("#total").val();
          var paid=jQuery("#paid").val();*/

          if(customerid == "")
          {
            alert("Please Select Customer");
            return false;
          }

          //alert($('#myInvoice_cb').serialize());
          $.ajax
          ({
               url:'<?php echo base_url("index.php/invoice/submit_invoice_generate"); ?>',
              type:'POST',
              dataType:'json',
              data:{data:jQuery('#myInvoice_cb').serialize()},
              success:function(response)
              {
              //$('#invoice_submit')[0].reset();
              //$("#form")[0].reset();
              $(".removeLater").val(0);
              //$("#myInvoice_cb").closest('form').find("input[type=text]").val("");
              //alert(response);
             /* var baseUrl=' <?php //echo JURI::current();?>';
              window.location.href= baseUrl + '?acadid='+response[1]+'&userid='+response[0]+'&receipt='+response[2]+'&counter='+response[4]+'&openprint=getPrint';
              //jQuery("#myForm_cb")[0].reset();
              jQuery("#salerate").val("");
              jQuery("#paid").val("");
              jQuery("#quantity").val("");
              jQuery("#total").val("");*/
              //return false;

              printInvoice(invoiceno,customerid);
              },
              error:function(){
                alert('Please try after sometime!!!');
              }
             });

       }); //end of invoice submit function     
     
  }); // end of document ready function

  function calc(element)
  {
    //alert($(elementid).id());
  var elementid=$(element).attr('id');
  var fields = elementid.split('_');
  //var name = fields[0];
  var idx = fields[1];
  var price = parseFloat($("#quantity_"+idx).val())*parseFloat($("#unitprice_"+idx).val());
  price = isNaN(price)?0:price;
  $("#amount_"+idx).val(price);
  totalIt(element);
   //document.getElementById("price"+idx).value= isNaN(price)?"0.00":price.toFixed(2);
  }

  function totalIt() 
  {
    var sum = 0;
    
    $('.amount').each(function()
    {
    sum += parseFloat(this.value);
    });

    $("#totalamount").val(sum);
  } 

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
 // function to print invoice after submit
  function printInvoice(invoice_number,customer_no)
  {
    jQuery.ajax({
          type: "POST",
          url:'<?php echo base_url("index.php/invoice/printInvoice"); ?>',
          data:{invoice_no:invoice_number,customer_id:customer_no},
          //context: document.body,
          success:function(data)
          {
             var obj = $.parseJSON(data); 
             invoiceobj=obj.invoiceinfo;
             console.log(invoiceobj);
             if(obj.status == 1)
             {
             var htmlstr='<style>\
             body{border: 1px solid;width:600px;height:400px;margin: auto;padding:5px;}\
             .label_text {\
                display: inline-block;\
                font-weight: bold;\
                margin: 0;\
                width: 60%;\
                font-size: 1em\
                }\
            .label_value \
                {\
                display: inline-block;\
                text-align: right;\
                width: 35%;\
                font-size: 1em;\
                text-decoration: underline\
                }\
                #div_alltotal {\
                    width: 100%;\
                    border-top: 0.2em solid;\
                    border-top-style: outset;\
                    border-bottom: 0.2em solid;\
                    border-bottom-style: inset;\
                    padding-bottom: 1%\
                    }\
                    #div_wrapper {\
                        border: 0.2em solid;\
                        -moz-border-radius: 1%;\
                        -webkit-border-radius: 1%;\
                        border-radius: 1%;\
                        margin: 1%;\
                        padding: 0.4em;\
                        width: 45%;\
                        font-family: "Arial Unicode MS"\
                        }\
                        #fcheader {\
                            text-align: center\
                            }\
                        #fcheader b {\
                            font-size: 18px\
                            }\
                        .headerfont {\
                            border-top: 2px solid;\
                            font-weight: bold;\
                            text-align: center\
                            }\
                        #tbl_fcrcp {\
                            padding: 2%;\
                            width: 100%\
                            }\
                        #tbl_fcrcp th {\
                            text-align: left\
                            }\
                        .amount {\
                            display: block;\
                            text-align: right;\
                            width: 61px\
                            }\
                        #td_fcrcptotal {\
                            font-size: 16px;\
                            font-weight: bold;\
                            text-align: center\
                            }\
                        #div_alltotal_main {\
                            border-bottom: 1px solid;\
                            height: 12%;\
                            padding: 1% 1% 1.5%;\
                            border-top: 0.2em solid;\
                            border-top-style: outset\
                            }\
                        #div_alltotal_main > div {\
                            float: left\
                            }\
                        #div_frcpsign {\
                            border-top: \1px solid;\
                            margin-top: 1em;\
                            padding-right: 7%;\
                            padding-top: 4%;\
                            text-align: right\
                            }\
                        #div_frcpsignleft {\
                              float:left;\
                              padding:15px 15px 0 15px;\
                            }\
                        #div_frcpsignright {\
                              float:right;\
                              padding:15px 15px 0 15px;\
                            }\
                        #tbl_fcrcp td, th {\
                            border-top: 1px solid\
                            }\
                            #div_fcnote {\
                                font-size: 0.8em\
                                }\
                          #div_sdet {\
                                display: inline-block;\
                                width: 100%\
                                }\
             </style>';
             var srno=1;
             htmlstr+='<div class="headerfont">INVOICE</div>';
             for(var i=0,len = invoiceobj.length;i<len;i++)
             {
              var tamount=invoiceobj[i].total_amount;
                  if(i==0)
                  { 
                  htmlstr+='<div class="headerfont">'+ invoiceobj[i].companyname+'<br></div>';        
                  htmlstr+='<div class="studDetailsClass"><span style="float:left;"></span><span style="float:right">Invoice No:'+ invoiceobj[i].invoice_number+ ' <br> Date:'+ invoiceobj[i].invoice_date+'</span></div><div class="studDetailsClass">' + invoiceobj[i].customername+'<br>'+invoiceobj[i].address+'<br>'+invoiceobj[i].contact+'<br>'+invoiceobj[i].email+' </span><span style="float:left;"></span><span style="float:right"></span></div><div class="studDetailsClass"><span style="float:left"><span style="float:right"></span></div>';
                  }// end of if
             }// end of for
             htmlstr+='<table id="tbl_fcrcp"><tr><th>Sr.No.</th><th>Product</th><th>Serivce</th><th>Quantity</th><th>Price</th><th>Amount</th></tr><thead></thead><tbody>';
             for(var i=0,len = obj.invoiceinfo.length;i<len;i++)
              {
                var pname=obj.invoiceinfo[i].productname;
                var sname=obj.invoiceinfo[i].servicename;
                var quan=obj.invoiceinfo[i].quantity;
                var uprice=obj.invoiceinfo[i].unitprice;
                var amt=obj.invoiceinfo[i].amount;
               htmlstr+='<tr>\
               <td>'+srno+'</td>\
                <td>'+pname+'</td>\
                <td>'+sname+'</td>\
                <td>'+quan+'</td>\
                <td>'+uprice+'</td>\
                <td>'+amt+'</td>\
              </tr>';srno++;
              }
            htmlstr+='<tr><td></td><td></td><td><td><td></td><td><strong>Total Amount<strong></td><td><strong>'+tamount+'<strong></td></tr></tbody></table><div id="div_fcnote"><b> </b></div><div id="div_frcpsign"></div></div>';
             //alert(htmlstr);
             var newWin=window.open('Print-Window'); 
              newWin.document.open(); 
              newWin.document.write(htmlstr); 
              newWin.focus();
              newWin.print();
              newWin.document.close();  
              } // end of chk status   
          },
          error: function (msg){
           //someErrorFunction();
           alert('Please try after sometime!!!');
          }
        });
    //alert('Recepeit  will be available soon.');
}

</script> 

</html>