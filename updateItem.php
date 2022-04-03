<?php

session_start() ;
include "adminLoggedheader.php";
?>

<div id="fullscreen_bg" class="fullscreen_bg">
 <form class="form-signin" method="post" enctype="multipart/form-data">
	<div class="container" style='width:770px'>
    <div class="row">
        <div class="col-12-sx">
        <div class="panel panel-default">
        <div class="panel panel-primary">
			<!-- <img src ="<?php echo $_GET['img'];?>"  class='img img-responsive img-thumbnail' style="width:20% ;height:20% ; margin-left:300px ; margin-top:10px;" align ="center">-->
				<h3 class="text-center"><i class='fa fa-plus-circle'></i> Update this Item in <?php if(isset($_GET['type'], $_GET['action'] , $_GET['id'])  && $_GET['action'] ==="update" ) { echo $_GET['type']; ?> </h3>
				<?php
				$retrieve = "select * from product where type = '".$_GET['type']."' and PRODUCT_ID = '".$_GET['id']."' " ;
				$stmt = $con->prepare($retrieve) ;
				$stmt->execute() ;
				
				if($stmt->rowCount() ) {
					foreach ( $stmt->fetchAll() as $row ) {
						echo " <img src = 'images/".$row['IMAGES']."'  class='img img-responsive img-thumbnail' style='width:20% ;height:20% ; margin-left:300px ; margin-top:10px;' align ='center'> Current Image " ;
						$id = $row['PRODUCT_ID'] ;
						$prev_img = $row['IMAGES'];
						$prev_price = $row['PRICE'] ;
						$prev_desc = $row['DESCRIPTION'];
					}
				}
				
				
				?>
        
        <div class="panel-body">
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-sunglasses"></span>
				</span>
				<label style = "margin-left:5px" > Choose Image  </label>
				<input type="file" class="form-control" name="file"> 
				<input type ="hidden" name= "id" value= "<?php echo $id?>" > 
			</div>
		</div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				<input type="text" class="form-control" name="price" value =" <?php echo " $prev_price"; ?>" />
			</div>
		</div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
				<textarea name="description"class="form-control"> <?php echo " $prev_desc"; ?> </textarea>
			</div>
		</div>
		
			<input class="btn btn-lg btn-primary btn-block" type="submit" value='Save' name='save' style = "background-color:lightgreen ; color: deeppink" >
      </div>
       </div>
	   
	   <?php 
	   if(isset($_POST['save'])) {
		   $file = $_FILES['file'];
		   $file_name = $file['name'] ;
		   $extension = array ( "jpg" , "png" , "jpeg" ) ;
			
			$delimter = explode('.' , $file_name) ;
			$end = end($delimter) ;
	
	
			if (in_array($end , $extension)) { 
				//move_uploaded_file($file_tmp ,"upload/".$file_name);
				
				if ( empty($_POST['price'])) { 
					echo "<i class='alert alert-danger'  align='center'> Price Can Not Be NULL !!! </i>" ;
				}
				
				else{
					$img = $file_name ;
					$price = $_POST['price'] ;
					$id = $_POST['id'] ;
					
					$sql = "UPDATE `product` SET `PRICE` =? , `IMAGES` =?  WHERE `product`.`PRODUCT_ID` =?" ;
					$stm = $con->prepare($sql);
					$stm->execute(array ($price,$img,$id));
					
					if($stm->rowCount() == 0 ) {
						 echo "<i class='alert alert-success'  align='center'> Item Updated Successfully ^_^ !! </i>" ;
					}
				}
				
				}
		
				else {
					echo "<i class='alert alert-danger'  align='center'> Check your Image!!! </i>" ;
				}
	   }
				}
	   ?>
        </div>
    </div>
</div>
</form>
</div>

<?php
include"footer.php" ;
?>