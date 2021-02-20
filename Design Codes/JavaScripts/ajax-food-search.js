
$(document).ready(function(){
                 
                 function search(){
 
                      var title=$("#src-food").val();
 
                      if(title!=""){
                        
                         $.ajax({
                            type:"post",
                            url:"ajax.php",
                            data: {search: title},
                            success:function(data){
                                $(".restro-list").html(data);
                              
                             }
                          });
                      }
 
                     
                 }
 
                  $("#button").click(function(){
                     search();
                  });
 
                  $('#src-food').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  
                  });

/* -------------------------------Location Part------------------------------------- */


    $("#area-select").change(function(){
      var loc = $(this).val();
        $.ajax({
            type:"post",
            url:"ajax.php",
            data: {location: loc},
            success:function(data){
             $(".restro-list").html(data);
                              
               }

        });
    });





});

