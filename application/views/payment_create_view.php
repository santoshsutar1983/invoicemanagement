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
          <span class="breadcrumb-item active">Payment</span>
        </nav>
        <div id="path" value="<?php echo base_url(); ?>"></div>
      </div><!-- sh-breadcrumb -->
      
      <div class="sh-pagebody">
      <div class="card bd-primary mg-t-20">   
        <div class="card-header bg-primary tx-white">Invoice Payment</div>
            <div class="card-body pd-sm-30">
             <form class="form-horizontal" id="form_payment">
               <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <label for="inputInvoice">Search By Invoice No, Name, Contact</label>
                <select id="searchinvoice" name="searchinvoice" class="form-control select2-show-search" data-placeholder="Search Invoice" required>
                <option value="">Select Invoice</option>
                </select>
              <div style="width:100%"  id="searchinvoice_msg"></div>
              </div><!-- col-4 -->
              <br>
              <div class="form-group">
                <label for="inputAmount" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-5 input-group" style="width:34%;">
                  <input class="form-control pull-right" id="balanceamount" name="balanceamount" type="text" required> 
                  </div>
                <div class="col-sm-5 input-group" id="description_msg"></div>
              </div>
              <br>
              
              <div id="paymentoptions" class="table-responsive">
                <table class="table mg-b-0" style="margin-left:2%;">
                        <thead>
                          <tr>
                            <th>Pay Mode</th>
                            <th id="paid">Paid</th>
                            <th id="chqno">Chq/Card No</th>
                            <th id="chqdate">Chq/Card Date</th>
                            <th id="chqdate1"></th>
                            <th id="bankname">Bank Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                           <td style="width:100px;"> <select style="width:100px" id="paymentmode_0" name="paymentmode_0" required>
                          <option value="">Select Mode</option>
                          <?php foreach ($paymodeinfo as $pm) { ?>
                          <option value="<?php echo $pm['id'] ?>"><?php echo $pm['payment_mode'] ?></option>
                          <?php } ?>
                            </select>
                            </td>
                            <td><input class="form-control pull-right" id="paid_0" name="paid_0" type="text"></td>
                            <td><input class="form-control pull-right" id="chqno_0" name="chqno_0" type="text"></td>
                            <td><input class="form-control pull-right" id="chqdate_0" name="chqdate_0" type="text"></td>
                            <td> <input class="form-control pull-right" id="bankname_0" name="bankname_0" type="text"></td>
                          </tr> 
                       </tbody>
               </table>
              </div>

              <div class="form-group">
                <div></div>
                <div class="col-sm-5 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="submitMaster('form_maintanance');"> Submit </a>
                </div>
              </div>
             
             </form>
            </div>
        </div>

      </div><!-- card-body -->
      </div><!--sh-pagebody-->
     

      <!-- <input class="btn btn-primary btn-block" type="submit" value="Generate" id="invoice_submit" style="cursor: pointer;"> -->
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

           
         $("#chqno").hide();
         $("#chqdate").hide();
         $("#chqdate1").hide();
         $("#bankname").hide();
         $("#chqno_0").hide();
         $("#chqdate_0").hide();
         $("#bankname_0").hide();

      $('#paymentmode_0').on('change', function (e) 
      {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        //alert(valueSelected);
        if(valueSelected=='1')
        {
         $("#chqno_0").hide();
         $("#chqdate_0").hide();
         $("#bankname_0").hide();
         $("#chqno").hide();
         $("#chqdate").hide();
         $("#bankname").hide();
        }
        else if(valueSelected=='2')
        {
         $("#chqno_0").show();
         $("#chqdate_0").show();
         $("#bankname_0").show();
    
         $("#chqdate1").hide();
         $("#chqno").show();
         $("#chqdate").show();
         $("#bankname").show();
        }
        else if(valueSelected=='3')
        {
         $("#chqno_0").show();
         $("#chqdate_0").hide();
         $("#bankname_0").show();
         
         $("#chqdate1").show();
         $("#chqno").show();
         $("#chqdate").hide();
         $("#bankname").show();
        }
        else if(valueSelected=='4')
        {
         $("#chqno_0").show();
         $("#chqdate_0").show();
         $("#bankname_0").show();
     
         $("#chqno").show();
         $("#chqdate").show();
         $("#bankname").show();
          $("#chqdate1").hide();
        }
        else
        {
         $("#chqno_0").hide();
         $("#chqdate_0").hide();
         $("#bankname_0").hide();
         $("#chqno").hide();
         $("#chqdate").hide();
         $("#bankname").hide();
         $("#chqdate1").hide();
        }
    
      });

      var base = '<?php echo base_url() ?>'
      // search of rcustomer by name or contact
      /*jQuery('#searchcustomer').select2
      ({
        minimumInputLength: 3,
        formatInputTooShort: function (){
                return "Enter 3 Characters";
            },
        placeholder: 'Search Customer',
        ajax: {
        url:  base+'index.php/payment/get_customer_byname',
        dataType: 'json',
        delay: 250,
        processResults: function (data){
        return {
                results: data
               };
            },
              cache: true
              }
      });*/

      //search for invoice no by number name contact
      jQuery('#searchinvoice').select2
      ({
        minimumInputLength: 1,
        formatInputTooShort: function (){
                return "Enter 1 Characters";
            },
        placeholder: 'Search Invoice',
        ajax: {
        url:  base+'index.php/payment/get_invoice_bynumber',
        dataType: 'json',
        delay: 250,
        processResults: function (data){
        return {
                results: data
               };
            },
              cache: true
              }
      });

    path='<?php echo base_url();?>'
         
   //validate form by id here
   //var form = $( "#myInvoice_cb" );
   //form.validate();

   // load customer info 
   jQuery('#searchinvoice').change(function ()
   {
    //alert( "Valid: " + form.valid() );
    //var selecteduser = jQuery("#membernamefrom option:selected").val();
    var invoiceid=this.value;
    //alert(cid);
    if(invoiceid=="")
    {
        alert("Please Select Customer");
        return false;
    }
    else
    {
      $.ajax({
          type:"POST",
          url:'<?php echo base_url("index.php/payment/get_invoice_balanceamount"); ?>',
          data: {invoice_number:invoiceid},
          success:function(data){  
              var obj = $.parseJSON(data); 
               if(obj.status == 1)
                {
                    balanceobj=obj.balanceinfo;
                    console.log(balanceobj);
                    for(var i=0,len = balanceobj.length;i<len;i++)
                    {
                     var balance=balanceobj[i].balance;
                     //alert(balance);
                     $('#balanceamount').val(balance);
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
          var totalamt=jQuery("#totalamount").val();
          if(customerid == "")
          {
            alert("Please Select Customer");
            return false;
          }
          else if(totalamt<=0)
          {
            alert("Incorrect Total Amount");
            return false;
          }
          if(form.valid())
          {
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
              //$(".removeLater").val(0);
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
          }// end of if form valid check
          else
          {
            alert("All fields are required");
            return false;
          }
    
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