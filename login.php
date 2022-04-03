<?php
session_start();


include "header.php" ; 

?>




 <div id="fullscreen_bg" class="fullscreen_bg">
 <form action = "<?php echo $_SERVER['PHP_SELF']?>" class="form-signin" method="post" style="margin: inherit;margin-top: 80px;">
<div class="container" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
        <div class="panel panel-primary">
        
				<h3 class="text-center">Log In</h3>
        
        <div class="panel-body">   
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
				</span>
				<input type="text" class="form-control" name="username" placeholder="username" />
			</div>
		</div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" name='password' class="form-control" placeholder="Password" />
			</div>
		</div>
		
			<input class="btn btn-lg btn-primary btn-block" type="submit" value='login' name='login' style="background-color:deeppink; margin-bottom:10px">
			
			
			
      </div>
	  <?php 
			if(isset($_POST['login'])) {
				$user = $_POST['username'] ;
				$password = $_POST['password'] ;
				
				
				$_SESSION['username'] = $user ; 
				// check validation
				
				if ($user == NULL || $password == NULL ) 
					echo " <i class='alert alert-danger'  align='center'> ERROR :  VALUE CANNOT BE NULL !!! </i> " ; 
				
				else if (strlen($password)<= 6 )
					echo "<i class='alert alert-danger'  align='center'> Password must be more than 6 </i>" ;
				
		
				//
				else {
					$sql = "select * from user where USERNAME = '".$user."' and PASSWORD = '".md5($password)."'" ;
					$stm = $con->prepare($sql); 
					$stm->execute() ;
					
					//check if user exists in DB
					
					if ( $stm->rowCount() > 0 ) {
						$admin = "select * from user where USER_STATUS = 1" ;
						$stm2 = $con->prepare($admin);
						$stm2->execute();
						
						if ($stm2->rowCount() > 0 ) {
							$_SESSION['USERNAME'] = $user ;
							header('Location: adminHome.php') ;
							exit() ;
						}
					}
					
					else {
						echo "<i class='alert alert-danger'  align='center'> There is no user with these info !! </i>" ;
					}
				}
			}
	?>
	  
       </div>
	   <span style="margin-left : 100px ; font-size: 11px ;" > you don't have account ? <a href = "signup.php" style = "font-weight: bold ; color : deeppink;" > Create Account</a> </span>
        </div>
    </div>
	
</div>
</form>

<?php
include('footer.php');
?>