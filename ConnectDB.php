<?php 
$DSN = "mysql:host=localhost;dbname=project;charset=utf8" ;
$user="root";
$pass="" ;

try{
$con= new PDO($DSN , $user , $pass ) ;
//echo "Connected Sucessfully" ;
}

catch(PDOException $e){
	echo $e->getMessage() ;
}

class Transaction{

	function select ($sql) {
		$stm = $con->prepare($sql) ;
		$stm->execute(); 
		if ($stm->rowCount() ){
			while($row= $stm->fetchAll()) {
				$resultset[] = $row;
			}		
			if(!empty($resultset))
				return $resultset;
		}

		else {
			echo "<p style ='color:gray ; margin: 50px' align = 'center' > No Items Here </p>" ;
		}
	}

	function insert ($query) {

	}

	function update ($query) {

	}


	function delete ($query , $id) {
		$stm = $con->prepare($sql) ; 
		$stm->execute(array ($id) );

		if($stm->rowCount() == 1) {
			echo "<div class='alert alert-success' > Deleted Successfully!! </div> " ; 
	
		}
	}
	
}


?>