
function addtocart(productid,amount,shippingcharge){
    
    var productid = productid;   
    
    // alert(amount)
    var DataJsons = {
        productid : productid,   
        amount : amount+shippingcharge,    
    }

    $.ajax({
        url:baseURL+'index.php/ShopController/AddToCart',
        method: 'post',
        data: DataJsons,
        dataType: 'json',
        success: function(response) {
            // alert(response);
            if(response==1){
                swal({
                    title: "Success",
                    text: "Product Added successfully",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                })
                loadcart();
                loadcartpagetotal()
            }
            if(response==2){
                swal({
                    title: "Warning",
                    text: "Product Already Added",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            }
               
            if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            }
        }
    }); 
   
}





function addtowishlist(productid){
    
    var productid = productid;  
    
   
    var DataJsons = {
        productid : productid,       
    }

    $.ajax({
        url:baseURL+'index.php/ShopController/addToWishlist',
        method: 'post',
        data: DataJsons,
        dataType: 'json',
        success: function(response) {
            
            if(response==1){
                swal({
                    title: "Success",
                    text: "Product Added successfully",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                })
                loadcart();
                loadcartpagetotal()
                loadwishlist()
                
            }
            if(response==2){
                swal({
                    title: "Warning",
                    text: "Product Already Added",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            }
               
            if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            }
        }
    }); 
   
}









function quickview(productid){   

    var cid = cid;     
    
    var DataJsons = {
        productid : productid,       
    }
    $("#loadsec").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadQuickview',
        method: 'post',
        data: DataJsons,       
        success: function(response) {            
            $('#quickviewresult').html(response);           
            
        }
    });   
}


function sortproduct(categoryid){

    
    var DataJsons = {
        categoryid : categoryid,
        changekey : $('#changekey').val(),       
    }
   
    $("#loadsec").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/sortProductFilter',
        method: 'post',
        data: DataJsons,
        
        success: function(response) {    
            $("#beforesort").hide();  
            $("#loadsec").hide();      
            $('#sortresult').html(response);             
            
        }
    });   
}






function loadattribute(attributeid){

    var DataJsons = {
        attributeid : attributeid,          
    }
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadSubAttribute',
        method: 'post',
        data: DataJsons,
        success: function(response) {    
            $('#subattribute'+attributeid).html(response);
            
        }
    });   
}

function loadsubattribute(attributeid){

    var DataJsons = {
        attributeid : attributeid,          
    }
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadSubAttribute',
        method: 'post',
        data: DataJsons,
        success: function(response) {    
            $('#subattribute'+attributeid).html(response);
            
        }
    });   
}

function loadcart(){
   
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadCart',
        method: 'post',       
        success: function(response) {  
           
            $('#resultcarthome').html(response);
            $("#loader-wrapper").hide();
            
        }
    });
   
}


function loadwishlist(){
   
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadWishlist',
        method: 'post',       
        success: function(response) {  
          
            $('#resultwishlisthome').html(response);
            $("#loader-wrapper").hide();
            
        }
    });
   
}

function loadcartpagetotal(){
   
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadCartTotal',
        method: 'post',       
        success: function(response) {  
            
            $('#resultcarthome2').html(response);
            $("#loader-wrapper").hide();
            $('#procecheckout').hide();
            
        }
    });
   
}


function changeqtyproduct(cid){
    
    var count = $("#quantity"+cid).val();
    var cartid = cid;

    var DataJsons = {
        count : count,
        cartid : cartid,
    }

    if(count<1){
        swal({
            title: "Warning",
            text: "Product Count Minimum Of 1",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
        $("#quantity"+cid).val('1')
    }

    else{
        $.ajax({
            url:baseURL+'index.php/ShopController/ChangeCartProductQuantity',
            method: 'post',
            data: DataJsons,
            dataType: 'json',
            success: function(response) {
                loadcart();
                loadcartpagetotal()
               
            }
        }); 
    }
  

}

var categoryid = 0;
var arrribute = 0;
var arrribute = [];
function leftfilterproduct(attributeid,categoryid){
    
         
     if(document.getElementById('attr'+attributeid).checked){

         arrribute.push(attributeid);

        var DataJsons = {
            categoryid : categoryid,
            arrribute : arrribute,       
        }
        $("#loader-wrapper").show();
        $.ajax({
            url:baseURL+'index.php/ShopController/sortProductFilterLeft',
            method: 'post',
            data: DataJsons,
            success: function(response) {
                document.body.scrollTop = 300; // For Safari
                document.documentElement.scrollTop = 300 ; // For Chrome, Firefox, IE and Opera
                $("#loader-wrapper").hide();
                $("#beforesort").hide();        
                $('#sortresult').html(response);

                
                                
            }
        });   

     }
     else{      
        
        var index = arrribute.indexOf(attributeid);
        if (index > -1) {
             //if found
            arrribute.splice(index, 1);
        }
        

        var DataJsons = {
            categoryid : categoryid,
            arrribute : arrribute,       
        }
        // $("#loadsec").show();
        $("#loader-wrapper").show();
        $.ajax({
            url:baseURL+'index.php/ShopController/sortProductFilterLeft',
            method: 'post',
            data: DataJsons,
            success: function(response) { 
                document.body.scrollTop = 300; // For Safari
                document.documentElement.scrollTop = 300 ; // For Chrome, Firefox, IE and Opera   
                $("#loadsec").hide();  
                $("#loader-wrapper").hide();      
                $('#sortresult').html(response);
                $("#loader-wrapper").hide();               
    
                
                
            }
        });  

     }
}



function searchproduct(){
    $('#hidese').show();
    var searchkey = $('#searchkey').val();

    var DataJsons = {
        searchkey : searchkey,       
    }

    $.ajax({
        url:baseURL+'index.php/ShopController/searchProductFilter',
        method: 'post',
        data: DataJsons,
        // dataType: 'json',
        success: function(response) {    
            $("#beforesort").hide();        
            $('#autocommpleteitems').html(response);
            $("#loader-wrapper").hide();
            

            
            
        }
    });  
}

function hideautocomplete(){
    $('#hidese').hide();
}



function saveaddress(){
    var country = $("#countySel").val();
    var state = $("#stateSel").val();
    var district = $("#districtSel").val();
    var location = $("#location").val();
    var pin = $("#pin").val();
    var address = $("#address").val();


    if($.isNumeric(pin)) {
        var DataJsons = {
            country : country,    
            state : state,
            district : district,
            location : location,
            pin : pin,
            address : address
        }
        if(country=='' || state=='' || district=='' || location=='' || pin=='' || address==''){
            swal({
                title: "Warning",
                text: "Please Fill All Fields",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
        else if(pin.length != 6){
            swal({
                title: "Warning",
                text: "Please Enter Valid Pin Code",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
        else{
            $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/createShippingAddress',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Address Added Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })
                        loadshippingaddress()

                        $("#countySel").val('');
                        $("#stateSel").val('');
                        $("#districtSel").val('');
                        $("#location").val('');
                        $("#pin").val('');
                        $("#address").val('');

                        location.href=baseURL+"/ShopController/proceedCheckout"; 
                   }
                   else{
                        swal({
                            title: "Warning",
                            text: "Something went wrong in server",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            });  
        }
             

    }
    else{
        swal({
            title: "Warning",
            text: "Please Enter Numeric Values in PIN",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }

    
    
}


function deleteaddress(aid){

    var DataJsons = {
        aid : aid
    }
    
    swal({
        title: "Are you sure?",
        text: "You can't recover this Address ! Deletion is Permanent !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    },
    function () {
        $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/deleteShippingAddress',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Address Deleted Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })
                        loadshippingaddress();                       
                   }
                   else{
                        swal({
                            title: "Warning",
                            text: "Something went wrong in server",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            }); 
        }); 
}



function deletebankaccount(aid){

    var DataJsons = {
        aid : aid
    }
    
    swal({
        title: "Are you sure?",
        text: "You can't recover this account ! Deletion is permanent !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    },
    function () {
        $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/deleteBankAccount',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Account Deleted Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })
                        loadbankaccount();                       
                   }
                   else{
                        swal({
                            title: "Warning",
                            text: "Something went wrong in server",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            }); 
        }); 
}


function loadshippingaddress(){
   
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadShippingAddress',
        method: 'post',
        // data: DataJsons,
        // dataType: 'json',
        success: function(response) {  
          
            $('#shippingaddressdiv').html(response);
            $("#loader-wrapper").hide();
            
        }
    });
   
}


function loadbankaccount(){
   
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/ShopController/loadBankAccount',
        method: 'post',
        // data: DataJsons,
        // dataType: 'json',
        success: function(response) {  
          
            $('#bankaccountdiv').html(response);
            $("#loader-wrapper").hide();
            
        }
    });
   
}

function updateprofile(){

    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var address = $("#address").val();

 
        var DataJsons = {
            lname : lname,    
            fname : fname,           
            address : address
        }
        if(lname=='' || fname=='' || address==''){
            swal({
                title: "Warning",
                text: "Please Fill All Fields",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
       
        else{
            $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/updatePermanentAddress',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Address Updated Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })                       
                        
                   }
                   if(response==0){
                        swal({
                            title: "Warning",
                            text: "No Changes Detected",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            });  
        }
}




function placeorder(){

    var paytype = $("#paytype:checked").val();
    var billingaddress = $("#billingaddress:checked").val();
    var shippingstatus = $("#ship-box").val();
    var ordernote =  $("#ordernote").val();

    // check shipping to same address of bill or not and assign value`
    if(shippingstatus=='on'){
        var shippingaddress = $("#shippingaddress:checked").val();
    }
    else{
        var shippingaddress = $("#billingaddress:checked").val(); 
    }

        var DataJsons = {
            paytype : paytype,    
            billingaddress : billingaddress,    
            shippingaddress : shippingaddress,       
            ordernote : ordernote,
            products : products,
            amount : amount

        }
        if(amount=='' || products==''){
            swal({
                title: "Warning",
                text: "No Products in Cart",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
        else if(paytype=='' || billingaddress=='' || shippingaddress=='' ){
            swal({
                title: "Warning",
                text: "Please Fill All Fields",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }

        else if(billingaddress==undefined || shippingaddress==undefined ){
            swal({
                title: "Warning",
                text: "Please create alleast one Shipping or Billing address",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
       
        else{
            $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/placeOrder',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){


                    $.ajax({
                        url:baseURL+'index.php/ShopController/deleteCart',
                        method: 'post',
                        data: DataJsons,
                        success: function(responses) {    
                           alert(responses)
                        }
                    });  


                        swal({
                            title: "Success",
                            text: "Order Submitted Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })    
                        location.href=baseURL+"/ShopController/orderSuccess";                   
                        
                   }
                   if(response==0){
                        swal({
                            title: "Warning",
                            text: "Something went wrong in server",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            });  
        }
}




function placeorderwithbid(bidamount,bidid){

    var bidamounts = bidamount;
    var bidids = bidid;
    var counts = $("#itemcount").val();
    var paytype = $("#paytype:checked").val();
    var billingaddress = $("#billingaddress:checked").val();
    var shippingstatus = $("#ship-box").val();
    var ordernote =  $("#ordernote").val();

    // check shipping to same address of bill or not and assign value`
    if(shippingstatus=='on'){
        var shippingaddress = $("#shippingaddress:checked").val();
    }
    else{
        var shippingaddress = $("#billingaddress:checked").val(); 
    }

        var DataJsons = {
            paytype : paytype,    
            billingaddress : billingaddress,    
            shippingaddress : shippingaddress,       
            ordernote : ordernote,
            products : products,
            amount : amount,
            bidamounts : bidamounts,
            bidids : bidids,
            counts : counts
        }
        if(amount=='' || products==''){
            swal({
                title: "Warning",
                text: "No Products in Cart",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
        else if(paytype=='' || billingaddress=='' || shippingaddress=='' ){
            swal({
                title: "Warning",
                text: "Please Fill All Fields",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }

        else if(billingaddress==undefined || shippingaddress==undefined ){
            swal({
                title: "Warning",
                text: "Please create alleast one Shipping or Billing address",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
       
        else{
            $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/placeOrderwithbid',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Address Updated Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })    
                        location.href=baseURL+"/ShopController/orderSuccess";                   
                        
                   }
                   if(response==0){
                        swal({
                            title: "Warning",
                            text: "No Changes Detected",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            });  
        }
}




function trackorder(proorderids){

        var proorderid = proorderids;
        
        $('#trkid').html(proorderid);

        var DataJsons = {
            proorderid : proorderid,               
        }
        if(proorderid==''){
            swal({
                title: "Warning",
                text: "Missing Something",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
       
        else{
            $.ajax({
                url:baseURL+'index.php/ShopController/loadOrderTracking',
                method: 'post',
                data: DataJsons,
                success: function(response) {
                    $('#trackingdiv').html(response);                    
                  
                }
            });  
        }
}


function submitreview(product){
  
        
        var productid = product;
        var ratingstar = $('#ratingstar'+product).val();
        var reviewcomment = $('#reviewcomment'+product).val();
        
        var DataJsons = {
            productid : productid,
            ratingstar : ratingstar, 
            reviewcomment : reviewcomment              
        }
        if(ratingstar==''){
            swal({
                title: "Warning",
                text: "Please Select Star",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
       
        else{
            $.ajax({
                url:baseURL+'index.php/ShopController/saveCustomerReview',
                method: 'post',
                data: DataJsons,
                success: function(response) {
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Thank you for your review",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })
                   }
                   if(response==2){
                        swal({
                            title: "Success",
                            text: "Thank you for your review",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })
                   }
                   if(response==3){
                        swal({
                            title: "Warning",
                            text: "No changes",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                    }
                    if(response==0){
                        swal({
                            title: "Warning",
                            text: "Something went wrong in server",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                    }
                }
            });  
        }
}


function notsigninswal(){
    swal({
        title: "Warning",
        text: "Sign in To Continue",
        type: "warning",
        confirmButtonClass: "btn-danger",
    })
}





function removefromwishlist(wishid){

    
    var DataJson = {
        wishid : wishid,
    }


    $.ajax({
        url:baseURL+'index.php/ShopController/removeWishlist',
        method: 'post',
        data: DataJson,
        success: function(response) {    
           if(response==1){              
                $('#mywish'+wishid).fadeOut();
                
           }
           if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
           }

           $("#loader-wrapper").hide();
        }
    });  

}

function changepin(){

    var defaultpin = $('#defaultpin').val();

    if(defaultpin==''){
        swal({
            title: "Warning",
            text: "Please Select default PIN",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJson = {
            pin : defaultpin,
        }
    
        $.ajax({
            url:baseURL+'index.php/ShopController/updateDefaultPin',
            method: 'post',
            data: DataJson,
            success: function(response) {    
               if(response==1){
                    swal({
                        title: "Success",
                        text: "PIN Updated Successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })                  
               }
               
               if(response==0){
                    swal({
                        title: "Warning",
                        text: "Something Went wrong in server",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
               }
    
               $("#loader-wrapper").hide();
            }
        });  
    }

  
}


function loadavailability(sellerid){    
   
    var seller = sellerid;
    var JsonData = {
        sellerid : seller,
    }

    $.ajax({
        url:baseURL+'index.php/ShopController/availabilityCheck',
        method: 'post',
        data : JsonData,
        success: function(response) {  
            $('#availabilitycheck').html(response);
            $("#old-tab").hide(); 
            $("#loader-wrapper").hide();  
            
        }
    });

}



function clearfilter(categoryid){

    var categoryid = categoryid;
    var JsonData = {
        categoryid : categoryid,
    }

    location.reload();
}




function checkavailpin(sellerid){    
   
    var seller = sellerid;
    var pincode = $('#pincode').val();
    var JsonData = {
        sellerid : seller,
        pincode : pincode,
    }

    $.ajax({
        url:baseURL+'index.php/ShopController/availabilityCheckpin',
        method: 'post',
        data : JsonData,
        success: function(response) {  
            $('#availabilitycheck').html(response);         
            
        }
    });

}



function registeruser(){
    var country = $("#countySel").val();
    var state = $("#stateSel").val();
    var district = $("#districtSel").val();
    var name = $("#name").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var pin = $("#pin").val();
    var address = $("#address").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    
    var DataJson = {
        country : country, 
        state: state,
        phone: phone,
        email: email,
        district: district,
        firstname: fname,
        lastname : lname,
        address : address,
        pin: pin,
    } 

    

    // validation starts here
    if(phone.length == 10){
        var validphone = true;
    }
    else{
        var validphone = false;       
    }

    if(pin.length == 6){        
        var validpin = true;
    }
    else{
        var validpin = false;
    }
    var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (mailformat.test(email) == false) {
        validemail = false;       
    }
    else{
        validemail=true;        
    }
    // validation ends here

    

    if($.isNumeric(phone) && $.isNumeric(pin)) {
        if(country=='' || state=='' || name=='' || email=='' || pin==''){
            swal({
                title: "Warning",
                text: "Please Fill All Fields",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        } 
        else if(validphone==false || validpin==false || validemail==false){
            swal({
                    title: "Warning",
                    text: "Invalid Phone Number Or Pin Code Or Email",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
        }
        else{

            $('#logse').hide();
            $('#regid').show();
            

            $.ajax({
            url:baseURL+'index.php/ShopController/apiRegisterCustomer',
            method: 'post',
            data: DataJson,
            dataType: 'json',
            success: function(response) {
               if(response==1){
                swal({
                    title: "Success",
                    text: "Registration Successful, Usename and Password send to this Mail ID",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                   })  

                   window.location.assign(baseURL+"ShopController/LoginSuccess")

                   $("#name").val('');
                   $("#phone").val('');
                   $("#email").val('');
                   $("#pin").val('');
                   $("#address").val('');
                   $("#fname").val('');
                   $("#lname").val('');
               }   
               if(response==2){
                swal({
                    title: "Warning",
                    text: "User Already Exist",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                   })  
               }   
               if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                   })  
               }         
              
            }
            });
        }     
        
    }

    else{
        swal({
            title: "Warning",
            text: "Please Enter Numeric Values in Pin and Phone",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }

    
}


    function cancelorder(productorderid,orderid){
        var productorderid = productorderid;
        var orderid = orderid;

    if(productorderid=='' || orderid==''){
        swal({
            title: "Warning",
            text: "Missing something",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJson = {
            productorderid : productorderid,
            orderid : orderid,
        }
    
        $.ajax({
            url:baseURL+'index.php/ShopController/cancelOrder',
            method: 'post',
            data: DataJson,
            success: function(response) {    
               if(response==11){
                    swal({
                        title: "Success",
                        text: "Order Canceled Successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    });
                    $('#orid'+productorderid).hide();                 
               }
               
               if(response==00){
                    swal({
                        title: "Warning",
                        text: "Something Went wrong in server",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
               }
               if(response==3){
                swal({
                    title: "Warning",
                    text: "Order Processing Started, Order can't cancelled",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
           }
    
               $("#loader-wrapper").hide();
            }
        });  
    }
}





function calculatemlmpoint(){
    var point = 1323;

    var DataJson = {
        point : point,
    }
    alert(JSON.stringify(DataJson));

    $.ajax({
        url:baseURL+'index.php/ShopController/calculateMLMPoint',
        method: 'post',
        data: DataJson,
        success: function(response) { 

           alert(response);

        }
    });  
}



function removecartproduct(cid,stock){
    
    var cid = cid;   
    
    var DataJsons = {
        cid : cid,       
    }


    $.ajax({
        url:baseURL+'index.php/ShopController/RemoveFromCart',
        method: 'post',
        data: DataJsons,
        dataType: 'json',
        success: function(response) {
            if(response==1){
                swal({
                    title: "Success",
                    text: "Product Removed successfully",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                })
                $('#cartpro'+cid).hide();
                loadcartpagetotal();
                loadcart()
                
            }
          
               
            if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            }

     
        }
    }); 
   
}







function requestforsellers(){
    
    var shopname = $('#shopname').val();
    var gstno = $('#gstno').val();
    var shoptype = $('#shoptype').val();
    var address = $('#address').val();
    
    var DataJsons = {
        shopname : shopname,
        gstno : gstno, 
        shoptype : shoptype,
        address : address
    }

    if(shopname=='' || gstno=='' || shoptype=='' || address==''){
        swal({
            title: "Warning",
            text: "Please Fill All Fields",
            type: "warning",
            confirmButtonClass: "btn-danger",
        }) 
    }
    else{
        $.ajax({
            url:baseURL+'index.php/ShopController/RequestforSeller',
            method: 'post',
            data: DataJsons,
            success: function(response) {
                if(response==1){
                    swal({
                        title: "Success",
                        text: "Request Send successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })      
                    $('#shopname').val(''); 
                    $('#gstno').val('');
                    $('#shoptype').val('');
                    $('#address').val('');                      
                }    
                
                if(response==2){
                    swal({
                        title: "Warning",
                        text: "Request Already Send",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
                    $('#shopname').val('');
                    $('#gstno').val('');
                    $('#shoptype').val('');
                    $('#address').val('');     
                }
                   
                if(response==0){
                    swal({
                        title: "Warning",
                        text: "Something went wrong in server",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
                }
    
            }
        }); 
    }
   
}




// load commission   date wise


function loadcommissionuser(){   

    var startingdate = $('#startingdate').val();
    var endingdate = $('#endingdate').val();

    if(endingdate=='' || startingdate==''){
        swal({
            title: "Warning",
            text: "Select Starting and Ending Date",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJsons = { 
            startingdate : startingdate,
            endingdate : endingdate        
        }
        $("#loader-wrapper").show();  
        $.ajax({
            url:baseURL+'index.php/ShopController/LoadCommission',
            method: 'post',
            data: DataJsons,
            success: function(response) { 
                $('#loadseccon').show();
                $("#loader-wrapper").hide();   
                $('#monthlycommission').html(response);
                
                        
            }
        });
    }

   
   
}










function savebankaccount(){
    var bankname = $("#bankname").val();
    var ifsc = $("#ifsc").val();
    var accountnumber = $("#accountnumber").val();
    var accountholder = $("#accountholder").val();
    var phone = $("#phone").val();


    if($.isNumeric(phone)) {
        var DataJsons = {
            bankname : bankname,    
            ifsc : ifsc,
            accountnumber : accountnumber,
            accountholder : accountholder,
            phone : phone,            
        }
        if(bankname=='' || ifsc=='' || accountnumber=='' || accountholder=='' || phone==''){
            swal({
                title: "Warning",
                text: "Please Fill All Fields",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
        else if(phone.length != 10){
            swal({
                title: "Warning",
                text: "Please Enter Valid Phone Number",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
        }
        else{
            $("#loader-wrapper").show();
            $.ajax({
                url:baseURL+'index.php/ShopController/createBankAccount',
                method: 'post',
                data: DataJsons,
                success: function(response) {    
                   if(response==1){
                        swal({
                            title: "Success",
                            text: "Account Added Successfully",
                            type: "success",
                            confirmButtonClass: "btn-danger",
                        })
                        loadbankaccount();

                        $("#bankname").val('');
                        $("#ifsc").val('');
                        $("#accountnumber").val('');
                        $("#accountholder").val('');
                        $("#phone").val('');
                   }
                   else{
                        swal({
                            title: "Warning",
                            text: "Something went wrong in server",
                            type: "warning",
                            confirmButtonClass: "btn-danger",
                        })
                   }

                   $("#loader-wrapper").hide();
                }
            });  
        }
             

    }
    else{
        swal({
            title: "Warning",
            text: "Please Enter Numeric Values in Phone",
            type: "warning",
            confirmButtonClass: "btn-danger",
        });
    }

    
    
}



function returnproduct(orderid){   

    var orderid = orderid;
    var reason = $('#reason').val();
    var comment = $('#comment').val();
    var returntype = $('#returntype').val();
    var bank = $('#bank').val();

    if(reason=='' || comment=='' || returntype=='' || bank==''){
        swal({
            title: "Warning",
            text: "Please Fill All Fields",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJsons = { 
            orderid : orderid,
            reason : reason,
            comment : comment,  
            returntype : returntype,
            bank : bank  
        }
        $("#loader-wrapper").show();  
        $.ajax({
            url:baseURL+'index.php/ShopController/ApiReturnProduct',
            method: 'post',
            data: DataJsons,
            success: function(response) { 
                $('#loadseccon').show();
                $("#loader-wrapper").hide();   
                if(response==0){
                    swal({
                        title: "Warning",
                        text: "Something went wrong in server",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
                } 
                if(response==1){
                    swal({
                        title: "Success",
                        text: "Return request send successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })
                } 
                if(response==2){
                    swal({
                        title: "Warning",
                        text: "Request already sended",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
                } 
                        
            }
        });
    }
  
   
}





function generatepassword(){

   
    var phone = $("#phone").val();
    var email = $("#email").val();
  
    
    var DataJson = {     
        phone: phone,
        email: email,   
    } 

    

    // validation starts here
    if(phone.length == 10){
        var validphone = true;
    }
    else{
        var validphone = false;       
    }

  
    var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (mailformat.test(email) == false) {
        validemail = false;       
    }
    else{
        validemail=true;        
    }
    // validation ends here


    if(email==''){
        
    } 
    else if(validemail==false){
        swal({
                title: "Warning",
                text: "Invalid Email",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
    }
    else{

               

        $.ajax({
        url:baseURL+'index.php/ShopController/forgotPasswordMail',
        method: 'post',
        data: DataJson,
        dataType: 'json',
        success: function(response) {
            if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            } 
            if(response==1){

                window.location.assign(baseURL+"ShopController/PasswordResetSuccess")
            } 
            if(response==4){
                swal({
                    title: "Warning",
                    text: "No user exist with this email or phone",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            } 
          
        }


        });
    }   

    

    if(phone==''){

    } 
    else if(validphone==false){
        swal({
                title: "Warning",
                text: "Invalid Phone",
                type: "warning",
                confirmButtonClass: "btn-danger",
            })
    }
    else{

               

        $.ajax({
        url:baseURL+'index.php/ShopController/forgotPasswordPhone',
        method: 'post',
        data: DataJson,
        dataType: 'json',
        success: function(response) {
                
            if(response==0){
                swal({
                    title: "Warning",
                    text: "Something went wrong in server",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            } 
            if(response==1){

                window.location.assign(baseURL+"ShopController/PasswordResetSuccess")
            } 
            if(response==4){
                swal({
                    title: "Warning",
                    text: "No user exist with this email or phone",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            } 
        }


        });
    }   


    // if($.isNumeric(phone)) {
         
        
    // }

    // else{
    //     swal({
    //         title: "Warning",
    //         text: "Please Enter Numeric Values in Phone",
    //         type: "warning",
    //         confirmButtonClass: "btn-danger",
    //     })
    // }

    
}



function sendsms(){
    
    
alert('sdf');
    $.ajax({
        url:baseURL+'index.php/ShopController/sendSmsApi',
        method: 'post',
        success: function(response) {
            alert(response);
            

        }
    }); 
   
}





