<?php
session_start();

include "header.php" ;
$trans = new Transaction();
?>

<?php 

if(isset( $_GET['action'] , $_GET['id']) ) {
	$action = $_GET['action'] ;
	$id= $_GET['id'] ;
	switch($action) {
		case "delete" :
		{
			$sql = "delete from product where PRODUCT_ID = ?" ;
			$trans -> delete($sql , $id);
		}
		break ;
		
		default:
		echo " ERROR" ; break ;
	}
}

?>

<?php 

include "footer.php" ;

?>