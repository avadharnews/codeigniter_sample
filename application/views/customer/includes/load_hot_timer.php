                                             
                                             

                                             <script>                                                      
                                                            // alert(dateNow)                                                            
                                                            //    function calldealtime(dealingid){
                                                                var date1, date2;
                                                                // var dealsid = dealingid;  
                                                                
                                                                    date1 = new Date();

                                                                    date2 = new Date();

                                                                    var res = Math.abs(date1 - date2) / 1000;

                                                                    // get total days between two dates
                                                                    var days = Math.floor(res / 86400);
                                                                    document.write("<div class='count'>"+days+"<span>Days:</span></div> ");                        

                                                                    // get hours        
                                                                    var hours = Math.floor(res / 3600) % 24;        
                                                                    document.write("<div class='count'>"+hours+"<span>Hours:</span></div> ");  

                                                                    // get minutes
                                                                    var minutes = Math.floor(res / 60) % 60;
                                                                    document.write("<div class='count'>"+minutes+"<span>Mins:</span></div> ");  


                                                                    // get seconds
                                                                    // setInterval(function(){

                                                                        var seconds = 0;
                                                                
                                                                    var seconds = res % 60;                                                               

                                                                    setInterval(function(){
                                                                        document.getElementsByClassName("secs").value()=seconds;
                                                                    },1000)


                                                                    document.write("<div class='count'>"+Math.round(seconds)+"<span>Secs:</span></div> ");  
                                                                // 
                                                            //    } 


                                                                
                                                               
                                                     </script>