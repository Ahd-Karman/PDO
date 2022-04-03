<?php
session_start();

include "header.php" ;
/*if( !isset($_SESSION['username'] )) { 
	header ('location:login.php? error= "You have to login ' ) ;
}

else {
	if ($_SESSION['username'] === "Admin")
		include "adminLoggedheader.php" ;
	
	else
		include "userLoggedheader.php" ;
}*/
?>
 <hr>
<div class='container' style="margin-left:50px">
		<div class='row' align="center" >
			<div class='col-md-4 col-sm-8' >
					<h3>Dresses</h3>
					<a href ="Items.php?type=Dresses"> <img src='images/d1.jpg' class='img img-responsive img-thumbnail'  width='300' height='200' align ="right" > </a>
					
					<a href='addItem.php?type=Dresses&img=images/d1.jpg ' class='btn btn-info' style = "background-color:deeppink ; margin-top: 20px ; margin-left: 55px ;font-family: serif ; font-weight:bold ; font-size:20px" > ADD </a>
					<a href='adminItems.php?action=delete&type=Dresses' class='btn btn-info' style = "background-color:green ; margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > DELETE </a>
					<a href='adminItems.php?action=update&type=Dresses' class='btn btn-info' style = " margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > UPDATE </a>
			</div>
			
			<div class='col-md-4 col-sm-8'>
					<h3>Shoeses</h3>
					<a href ="Items.php?type=Shoeses"> <img src='images/sh7.jpg' class='img img-responsive img-thumbnail'  width='300' height='200' align ="right"> </a>
				
					<a href='addItem.php?type=Shoeses&img=images/sh7.jpg' class='btn btn-info' style = "background-color:deeppink ; margin-top: 20px ;  margin-left: 55px ; font-family: serif ; font-weight:bold ; font-size:20px" > ADD </a>
					<a href='adminItems.php?action=delete&type=Shoeses' class='btn btn-info' style = "background-color:green ; margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > DELETE </a>
					<a href='adminItems.php?action=update&type=Shoeses' class='btn btn-info' style = " margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > UPDATE </a>
			</div>
			
			
			<div class='col-md-4 col-sm-8'   >
					<h3>Bags</h3>
					<a href ="Items.php?type=Bags"> <img src='images/b4.jpg' class='img img-responsive img-thumbnail' style=" float:center"  width='300' height='200' align ="right"> </a>
			
					<a href='addItem.php?type=Bags&img=images/b4.jpg' class='btn btn-info' style = "background-color:deeppink ; margin-top: 20px ;  margin-left: 55px ; font-family: serif ; font-weight:bold ; font-size:20px" > ADD </a>
					<a href='adminItems.php?action=delete&type=Bags' class='btn btn-info' style = "background-color:green ; margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > DELETE </a>
					<a href='adminItems.php?action=update&type=Bags' class='btn btn-info' style = " margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > UPDATE </a>
			</div>
			
			
			
			<div class='col-md-4 col-sm-8' style="float:right ; margin-right : 400px ; margin-top: 20px" >
					<h3>Accesories </h3>
					<a href ="Items.php?type=Accessories"> <img src='images/a1.jpg' class='img img-responsive img-thumbnail' style=" margin-right: 30px"  width='300' height='200' align ="right"> </a>
			
					<a href='addItem.php?type=Accessories&img=images/a1.jpg' class='btn btn-info' style = "background-color:deeppink ; margin-top: 20px ;  margin-left: 10px ;  font-family: serif ; font-weight:bold ; font-size:20px"> ADD </a>
					<a href='adminItems.php?action=delete&type=Accessories' class='btn btn-info' style = "background-color:green ; margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px" > DELETE </a>
					<a href='adminItems.php?action=update&type=Accessories' class='btn btn-info' style = " margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px"> UPDATE </a>
			</div>
			
			
			
		</div>
	</div>
<?php
include "footer.php" ;
?>