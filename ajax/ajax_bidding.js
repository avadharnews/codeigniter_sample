

function submitbidding(userid,productid,sellerid){

    var biddingamount = $('#biddingamount').val();    
    var userid = userid;

    var DataJsons = {
        biddingamount : biddingamount,  
        userid : userid,     
        productid : productid,   
        sellerid : sellerid,     
    }
    // alert(JSON.stringify(DataJsons))
    if(biddingamount=='' || userid=='' || sellerid==''){
        swal({
            title: "Warning",
            text: "Missing Something",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
   
    else if($.isNumeric(biddingamount)){
        // $("#loader-wrapper").show();
        $.ajax({
            url:baseURL+'index.php/BiddingController/submitBidding',
            method: 'post',
            data: DataJsons,
            success: function(response) {

                loadbidding(productid);

                if(response==1){
                    $('#biddingamount').val('');
                    var x = document.getElementById("toast")
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 8000);
                }

                

                // $('#trackingdiv').html(response);                    
                
                // alert(response);
                // $("#loader-wrapper").hide();

                // $("#loader-wrapper").hide();
            }
        });  
    }
    else{
        swal({
            title: "Warning",
            text: "Please enter numeric values in amount",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
}





function loadbidding(productid){

    var userid = userid;

    var DataJsons = {
        productid : productid,              
    }
    // alert(JSON.stringify(DataJsons))
    if(biddingamount=='' || userid==''){
        swal({
            title: "Warning",
            text: "Missing Something",
            type: "warning",
            confirmButtonClass: "btn-danger",
        })
    }
   
    $.ajax({
        url:baseURL+'index.php/BiddingController/loadBidding',
        method: 'post',
        data: DataJsons,
        success: function(response) {

            $('#biddings-list').html(response);
            $("#loader-wrapper").hide();
        }
    });  
}
