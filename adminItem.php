<?php

session_start();

if( !isset($_SESSION['username'] )) { 
	include "header.php" ;
}

else {
	if ($_SESSION['username'] === "Admin")
		include "adminLoggedheader.php" ;
	
	else
		include "userLoggedheader.php" ;
}

?>

<style>
          /*start style image for baby*/
        h1
        {
            font-size:70;
            color:pink;
        }
        .img 
         {
            margin: 30px;
            border: 6px solid black;
            float: left;
            width: 320px;
            
        }
         .img:hover
         {
            border: 6px solid darkgray;
            
        }
         .img img 
         {
            width: 100%;
            height: 50%;
        }
         .desc 
         {
            padding: 15px;
            text-align: center;
        }
         span
         {
            font-size: 23px;
            color: black;
            font-family: cursive;
        }
         span:hover
         {
            color: darkred;
        }
        clear
         {
                clear: both;
            }
             /*end style image of decour*/

    </style>
	
<!---------------start image of baby -------------->
    <hr>
	
	<?php 
	         // Item name
			 if(isset($_GET['type'])) {
		$item_type = $_GET['type'] ;
		
		
		echo "<h1 align='center'> $item_type images</h1>" ;
		
		$sql =" select IMAGES , PRICE , PRODUCT_ID from product  where type = '$item_type' " ;
		$stm = $con->prepare($sql) ;
		$stm->execute(); 
		
		if ($stm->rowCount() ){
			 
			foreach( $stm->fetchAll() as $row) {
			 $img = $row['IMAGES'] ;
			 $price = $row['PRICE'] ;
			 $id = $row['PRODUCT_ID'] ;
			 
			  echo " 
			  <div class='col-md-4 col-sm-6' >
                  <a href='images/" . $img."'>
                  <img src='images/" .$img."' alt='cloth' width='300' height='200' class='img img-responsive img-thumbnail' >
                  </a>
                  <div class='desc'><span><del>$" . $price." </del>  <ins>$".($price-($price/10)) . "</ins></span></div>
				  <a onClick=\"javascript: return confirm('Are You Sure ?');\" href='deleteItem.php?action=delete&id=$id' class='btn btn-info' style = 'background-color:deeppink ; margin-top: 20px ; margin-left: 100px ; font-family: serif ; font-weight:bold ; font-size:18px' id='delete' > DELETE </a>
				  <a href='updateItem.php?action=update&type=$item_type&id=$id' class='btn btn-info' style = 'background-color:green ; margin-top: 20px ; font-family: serif ; font-weight:bold ; font-size:18px' > UPDATE </a>
              </div>
			  " ;
			}
		 }
		 
		 else {
			 echo "<p style ='color:gray ; margin: 50px' align = 'center' > No Items Here </p>" ;
		 }
		 
			 }
			else {
				
				echo" " ;
				
			}
			 
	?>
                   
                    <!-------------------end image for baby --------------------------->
<?php
include "footer.php" ;
?>

