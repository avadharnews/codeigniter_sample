
function registerseller(){
    var companyname = $("#companyname").val();
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
        companyname : companyname,
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
        if(companyname=='' || country=='' || state=='' || name=='' || email=='' || pin==''){
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
            $.ajax({
            url:baseURL+'index.php/SellerController/apiRegisterSeller',
            method: 'post',
            data: DataJson,
            dataType: 'json',
            success: function(response) {
               if(response==1){
                swal({
                    title: "Success",
                    text: "Registration Successful",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                   })  
                   window.location.assign("/RegistrationSuccess")
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


function resendotp(){
    signuptaxiprovider();
    $("#otpinput").show();
    $("#otpbtn").show();  
    $("#otpbtn").show();   
    $("#timer").show(); 
    
}



function confirmotp(){
    alert('ss')
    var otpno = $("#otpnos").val();
    var phone = $("#phone").val();
    var email = $("#email").val();

    var DataJsons = {
        otpno : otpno,
        phone : phone,
        email : email,
    }

    $.ajax({
        url:baseURL+'index.php/TaxiController/apiConfirmOTPRegisterTaxi',
        method: 'post',
        data: DataJsons,
        dataType: 'json',
        success: function(response) {
            if(response==1){
                $("#otpform").hide();
                $("#passwordform").show();                
            }
            else{
                swal({
                    title: "Warning",
                    text: "OTP Mismatch",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                })
            }
        }
    }); 
}





function deleteproduct(productid){
    
    var productid = productid;   

    var DataJsons = {
        productid : productid,       
    }



    swal({
        title: "Are you sure?",
        text: "Your will be able to recover this file! Deletion is temporary !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, deactivate it!",
        closeOnConfirm: false
    },
    function () {
        $.ajax({
            url:baseURL+'index.php/SellerController/deleteProduct',
            method: 'post',
            data: DataJsons,
            dataType: 'json',
            success: function(response) {
    
    
    
                
                if(response==1){
                    swal({
                        title: "Success",
                        text: "Product deleted successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })
                    document.getElementById("productlist"+productid).style.display="none";
                }
                else{
                    swal({
                        title: "Warning",
                        text: "Something went wrong in server",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
                }
            }
        }); 
    });



    
}



function confirmpassword(){

    var otpno = $("#otpnos").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();

    var DataJsons = {
        otpno : otpno,
        phone : phone,
        email : email,
        password : password,
        cpassword : cpassword,
    }

    if(password==cpassword){
        $.ajax({
            url:baseURL+'index.php/TaxiController/apiConfirmPasswordTaxi',
            method: 'post',
            data: DataJsons,
            dataType: 'json',
            success: function(response) {
                if(response==1){
                    alert(response)
                    $("#otpform").hide();
                    $("#passwordform").hide();  
                    swal({
                        title: "Success",
                        text: "Account Created Successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })   
                    $("#loginform").show();                      
                }
                else{
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
    else{
        swal({
            title: "Warning",
            text: "Password Mismatch",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
   
}





function loadattributes(productid){
    var spec = $("#attribute").val(); 
    var productid = productid;  

    var DataJsons = {
        spec : spec,
        productid : productid,   
    }
 
    $("#loader-wrapper").show();
    $.ajax({
        url:baseURL+'index.php/SellerController/loadSubAttributes',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
         
            $('#result').html(response);
            $("#loader-wrapper").hide();
            
        }
    });
   
}


function addattributetoproduct(productid){
    
    var attribute = $("#attribute").val();
    var subattribute = $("#subattribute").val(); 
    var productid = productid;

    

    if(attribute==null || subattribute==null){
        swal({
            title: "Warning",
            text: "Please Select All Fields",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJsons = {
            attribute : attribute,
            subattribute : subattribute,   
            productid : productid,        
        }
        $.ajax({
            url:baseURL+'index.php/SellerController/addAttributeToProduct',
            method: 'post',
            data: DataJsons,
            success: function(response) {  
                if(response==2){
                    swal({
                        title: "Warning",
                        text: "Attribute Already Added",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                    })
                }
                if(response==1){
                  
                    loadAttributes(productid)
                }
                
            }
        });
    }

}



function loadAttributes(productid){   

    var productid = productid;
    var DataJsons = { 
        productid : productid,        
    }
    $.ajax({
        url:baseURL+'index.php/SellerController/loadProductAttribute',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
            $('#attributes_list').html(response);
            $("#loader-wrapper").hide();  
            
        }
    });
   
}


function removeproductattribute(productid,attributeid){   

    var attribute = attributeid;
    var productid = productid;

    

    if(attribute==null || productid==null){
        swal({
            title: "Warning",
            text: "Missing Something",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJsons = {
            attribute : attribute,
            productid : productid,        
        }
        $.ajax({
            url:baseURL+'index.php/SellerController/removeAttributeFromProduct',
            method: 'post',
            data: DataJsons,
            success: function(response) {  
                loadAttributes(productid)
               
                
            }
        });
    }
   
}




function updatetrackstatus(pro_or_id){

    var pro_order_id = pro_or_id;
    var trackingstage = $('#trackingstage').val();
    var trackingdescription = $('#trackingdescription').val();

    var DataJsons = {
        pro_order_id : pro_order_id,
        trackingstage : trackingstage,
        trackingdescription : trackingdescription
    }
    
    if(pro_order_id=='' || trackingstage=='' ){
        swal({
            title: "Warning",
            text: "Please Fill All Fields",
            type: "warning",
            confirmButtonClass: "btn-danger",
            })
    }
    else{
        $.ajax({
            url:baseURL+'index.php/SellerController/updateOrderTracking',
            method: 'post',
            data: DataJsons,
            success: function(response) {  
                
                swal({
                    title: "Success",
                    text: "Tracking Added Successfully",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                }) 
                loadtracking(pro_or_id);
                if(response==1){                       
                    
                    if(trackingstage=='Delivered'){  
                        window.location.assign(baseURL+"SellerController/loadOrders")          
                    }
                }
            
                
            }
        });
    }

    
}









function deletetrack(trid,pro_or_id){
    
    var trackingstageid = trid;
    var pro_or_id = pro_or_id;
    var DataJsons = { 
        trackingstageid : trackingstageid,        
    }

    if(trackingstageid==''){
        swal({
            title: "Warning",
            text: "Missing Something",
            type: "warning",
            confirmButtonClass: "btn-danger",
            })
    }
    else{
        $.ajax({
            url:baseURL+'index.php/SellerController/deleteOrderTracking',
            method: 'post',
            data: DataJsons,
            success: function(response) {               
              
                if(response==1){
                    swal({
                        title: "Success",
                        text: "Attribute Added Successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })    
                    loadtracking(pro_or_id);            
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


function loadtracking(pro_or_id){   
    
    var pro_orrder_id = pro_or_id;
    var DataJsons = { 
        pro_orrder_id : pro_orrder_id,        
    }
    $.ajax({
        url:baseURL+'index.php/SellerController/loadOrderTracking',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
            $('#ordertrackingstage').html(response);
            $("#loader-wrapper").hide();  
            
        }
    });
   
}




var offset = 1;
var next = 19;
function productviewnext(){    
    offset = offset + 19;
    next = 20;

    var DataJsons = {
        offset : offset,
        next : next,
    }

    $.ajax({
        url:baseURL+'index.php/SellerController/loadProductspage',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
            $('#productspage').html(response);
            $("#old-tab").hide(); 
            $("#loader-wrapper").hide();  
            
        }
    });

}

function productviewprev(){    
    offset = offset - 19;
    next = 20;
    if(offset<0){
        offset=1
    }    

    var DataJsons = {
        offset : offset,
        next : next,
    }

    $.ajax({
        url:baseURL+'index.php/SellerController/loadProductspage',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
            $('#productspage').html(response);
            $("#old-tab").hide(); 
            $("#loader-wrapper").hide();  
            
        }
    });

}




var ordersoffset = 1;
var ordersnext = 19;
function ordernext(){    
    ordersoffset = ordersoffset + 19;
    ordersnext = 20;

    var DataJsons = {
        offset : ordersoffset,
        next : ordersnext,
    }


    $.ajax({
        url:baseURL+'index.php/SellerController/loadOrderspage',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
            $('#orderspage').html(response);
            $("#old-tab").hide(); 
            $("#loader-wrapper").hide(); 
            
        }
    });

}

function orderprev(){    
    ordersoffset = ordersoffset - 19;
    ordersnext = 20;

    if(ordersoffset<0){
        ordersoffset=1
    } 

    var DataJsons = {
        offset : ordersoffset,
        next : ordersnext,
    }

    $.ajax({
        url:baseURL+'index.php/SellerController/loadOrderspage',
        method: 'post',
        data: DataJsons,
        success: function(response) {  
            $('#orderspage').html(response);
            $("#old-tab").hide(); 
            $("#loader-wrapper").hide();  
            
        }
    });

}



function savepin(){

    var pincode = $('#pincode').val();

    if(pincode==''){
        swal({
            title: "Warning",
            text: "Please Enter PIN",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else if(pincode.length!=6){
        swal({
            title: "Warning",
            text: "Invalid PIN",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJson = {
            pin : pincode,
        }
    
        $.ajax({
            url:baseURL+'index.php/SellerController/savePin',
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
                    $('#pincode').val('')                 
               }
               
               if(response==2){
                    swal({
                        title: "Warning",
                        text: "PIN already exist",
                        type: "warning",
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


function deletepincode(pin){

    var pincode = pin;

    if(pincode==''){
        swal({
            title: "Warning",
            text: "Missing Something",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
   
    else{
        var DataJson = {
            pin : pincode,
        }
    
        $.ajax({
            url:baseURL+'index.php/SellerController/deletePin',
            method: 'post',
            data: DataJson,
            success: function(response) {    
               if(response==1){
                   $('#pinlist'+pincode).hide();
                    swal({
                        title: "Success",
                        text: "PIN Updated Successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    }) 
                    $('#pincode').val('')                 
               }
               
               if(response==2){
                    swal({
                        title: "Warning",
                        text: "PIN already exist",
                        type: "warning",
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




function biddingaction(biddingid,status){

    var biddingid = biddingid;
    var status = status;

    if(biddingid==''){
        swal({
            title: "Warning",
            text: "Missing Something",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
    else{
        var DataJson = {
            biddingid : biddingid,
            status : status,
        }
        
    
        $.ajax({
            url:baseURL+'index.php/SellerController/biddingAction',
            method: 'post',
            data: DataJson,
            success: function(response) {    
               if(response==1){
                    swal({
                        title: "Success",
                        text: "Bidding Updated Successfully",
                        type: "success",
                        confirmButtonClass: "btn-danger",
                    })    
                    
                    $('#pinlist'+biddingid).hide();
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



// load commission   date wise


function loadcommission(){   

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
            url:baseURL+'index.php/SellerController/LoadCommission',
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
