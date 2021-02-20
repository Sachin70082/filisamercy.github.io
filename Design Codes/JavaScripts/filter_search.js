/*----------------food-categories-------------------*/
		$(document).ready(function(){

		
				$('#brk').click(function(){
					var cat="breakfast";
					$.ajax({
						type:"post",
						url:"ajax.php",
						data:{search:cat},
						success:function(data){
                         $(".restro-list").html(data);}
					});
				});

				$('#lnc').click(function(){
					var cat="lunch";
					$.ajax({
						type:"post",
						url:"ajax.php",
						data:{search:cat},
						success:function(data){
                         $(".restro-list").html(data);}
					});
				});

				$('#dnr').click(function(){
					var cat="dinner";
					$.ajax({
						type:"post",
						url:"ajax.php",
						data:{search:cat},
						success:function(data){
                         $(".restro-list").html(data);}
					});
				});

				$('#cfy').click(function(){
					var cat="cofee";
					$.ajax({
						type:"post",
						url:"ajax.php",
						data:{search:cat},
						success:function(data){
                         $(".restro-list").html(data);}
					});
				});

				$('#veg').click(function(){
					var food="yes";
					$.ajax({
						type:"post",
						url:"ajax.php",
						data:{search:food},
						success:function(data){
                         $(".restro-list").html(data);}
					});
				});

				$('#non-veg').click(function(){
					var food="no";
					$.ajax({
						type:"post",
						url:"ajax.php",
						data:{search:food},
						success:function(data){
                         $(".restro-list").html(data);}
					});
				});


		

			
                     
});
