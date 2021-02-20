<?php

include("Design Codes/PHP/dbconnect.php");

	error_reporting(0);
	
	$message = "";
	
/*--------------------------------------------------------------------------------
----------------------------Login Account Php-------------------------------------
--------------------------------------------------------------------------------*/



	if (isset($_POST['Login']))
				{
					
					$user = $_POST['user'];
					$pass = $_POST['pass'];

					$sql = "SELECT * FROM accounts WHERE u_name = '$user' and u_pass = '$pass'";
      				
      				
      				$result=mysqli_query($conn,$sql);
      				 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      				$numrows = mysqli_num_rows($result);

    		$id=$row['id'];
            $us_name=$row['u_name'];
            $us_pass=$row['u_pass'];
			$name=$row['user_name'];
	$firstname = strtok($name, ' ');

	$lastname = strstr($name, ' ');
					
					if(!empty($user) && !empty($pass))
 					{
 						if($numrows == 1) {
 							setcookie("unm",$user,time()+60*60*24*30,'/');
 							
 							
         				
         				$_SESSION['user']= $firstname;
         				
         				$message = "Success !";
         				
						echo "<style> 
						.login-card{display: none;}
						#cart{display: block;}
						#prfl{display:block;}
						#inline-popups{display: none;}
						</style>";
						
						}else {
        					 $message = "Your Username or Password is invalid";
        					 echo "<style> .login-card{
							display: block; }
						</style>";
      						}
      				}
 					else
 					{
 					 
						$message = "Both Fields are required";
						echo "<style> .login-card{
							display: block; 
						}
						</style>";
 						
 					}
	}
				
				$user_prfl=$_SESSION['user'];
				
				if ($user_prfl==true) {

					echo "<style> 
						.login-card{display: none;}
						#cart{display: block;}
						#prfl{display:block;}
						#inline-popups{display: none;}
						</style>";
				}
				else {
        					
        					 echo "<style>
							#inline-popups{display: block;}
						</style>";
      						}

/*--------------------------------------------------------------------------------
----------------------------Create Account Php----------------------------------
--------------------------------------------------------------------------------*/
$sql = "SELECT * FROM accounts";
      				
      				
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$us_user= $row['u_name'];	
		$c_name= $_POST['c-name'];
		$c_user= $_POST['c-user'];
		$c_pass= $_POST['c-pass'];
		$v_pass= $_POST['v-pass'];

if(isset($_POST['signup'])){



		if(!empty($c_name) && !empty($c_user) && !empty($c_pass) && !empty($v_pass)){
 			if($c_pass==$v_pass){
 				if($c_user!=$us_user){
 					$sql2= "INSERT INTO accounts (u_name, u_pass, user_name) VALUES ('$c_user', '$c_pass', '$c_name')";
 					if(mysqli_query($conn,$sql2))
	   				{
	   				$message= "";
	   				echo "<style> .success-card{
							display: block; 
						}
						</style>";
	   				}
	   			}else{$message="Username already taken."; echo "<style> .crt-card{
							display: block; 
						}
						</style>";}
 				
 			}else{ $message="Password didn't match !"; echo "<style> .crt-card{
							display: block; 
						}
						</style>"; }			
			
 			}
	   		
 		
 		else{
 				$message = "All fields are required.";
 						echo "<style> .crt-card{
							display: block; 
						}
						</style>";

 			}

}
?>




<div class="header">
		<div id="logo"><a href="index.php"><img src="../FinalyrProj/LOGO/Logo2.png"></a></div>
		<div id="upper-header"></div><div id="upper-header2"></div>
			<div id="call"><i class="fas fa-phone-alt"></i>&nbsp +91 7008-27-0513</div>
			<div id="mail"><i class="far fa-envelope"></i>&nbsp sachinmohanty98610@gmail.com</div>
			<div id="faq-list"><a href="#">FAQ &nbsp<i class="fas fa-question"></i></a></div>
		
		<div class="links" id="inline-popups">
			<button id="crt-acc-btn" onclick="document.getElementById('id02').style.display='block'" >Create an account</button>
			<a id="login-clk" onclick="document.getElementById('id01').style.display='block'" data-effect="mfp-zoom-in">Log in</a>
		</div>
		<div id="cart"><a href="order.php" style="color:#fff;"><i class="fas fa-shopping-cart"></i></a></div>

		<div class="dropdown-profile" id="prfl" >
					<div id="dropdown-box" class="d-b" onclick="myFunction()">

						<p id="hi-1">Hi</p>
						<p id="user-name"><?php 
						
						$user_logged=$_SESSION['user'];
						echo  $user_logged; ?></p>
						<i class="fas fa-caret-down"></i>
					</div>
		</div>

		<div class="toogle-list" id="t-list" style="display: none;">
	
    					<a href="#">My Profile</a>
    					<a href="#">Oder History</a>
    					<a href="#">Wishlist</a>
    					<a href="#">Notifications</a>
    					<a href="#">My Coupons</a>
    					<a href="logout.php" id="logout">Logout</a>
	
		</div>
				

		
	</div>
<!-- ------------------------------LOG IN ------------------------------------ -->


	<div class="login-card" id="id01">

			<div id="login-box">
				<div id="text-head"><p>Log in to Filisamercy.com</p>
					
					<span onclick="document.getElementById('id01').style.display='none'"><div id="close"><i class="fas fa-times"></i></div></span>
					
				</div>
				<form action="index.php" method="POST">

					<div id="username">Email / Username</div>
					<p id="login-error"><?php echo $message ?></p>
				<div id="username-box">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" name="user" value="<?php 
					if (empty($_COOKIE['unm'])) 
					{
						echo "";
					}
					else{
						echo $_COOKIE["unm"];
					}
					 ?>" id="u-1">
				</div>
				<div id="password">Password</div>
				<div id="password-box">
					<i class="fas fa-key"></i>
					<input type="password" placeholder="Password" name="pass" value="<?php 
					if (empty($_COOKIE['pwd'])) 
					{
						echo "";
					}
					else{
						echo $_COOKIE["pwd"];
					}
					 ?>" id="p-1">
				</div>
				<input type="submit" name="Login" value="Log in" id="login-btn" />
				
				
				</form>
	    </div>
	</div>
<!-- --------------------------Create an acc---------------------------- -->
<div class="crt-card" id="id02">

			<div id="crt-box">
				<div id="text-head"><p>Create an account</p>
					
					<span onclick="document.getElementById('id02').style.display='none'"><div id="close"><i class="fas fa-times"></i></div></span>
					
				</div>
				<form action="index.php" method="POST">
					<div id="f-name">Full Name</div><p id="login-error"><?php echo $message ?></p>
				<div id="name-box">
					<i class="fas fa-user"></i>
					<input type="text" name="c-name" value="">
				</div>
					<div id="username">Email / Username / Ph</div>
				<div id="username-box">
					<i class="fas fa-envelope"></i>
					<input type="text" name="c-user" value="">
				</div>
				<div id="password">Password</div>
				<div id="password-box">
					<i class="fas fa-key"></i>
					<input type="password" name="c-pass" value="">
				</div>
				<div id="v-password">Verify Password</div>
				<div id="vpassword-box">
					<i class="fas fa-key"></i>
					<input type="password" name="v-pass" value="">
				</div>
				<input type="submit" name="signup" value="Sign up" id="crt-btn" >

				</form>
	    </div>
	</div>

	<div class="success-card" id="id03">
		<div id="success-box">
			<i class="far fa-check-circle"></i>
			<h1>Successfully created.</h1>
			<button onclick="document.getElementById('id03').style.display='none'">Done</button>
		</div>
	</div>

<?php 
?>