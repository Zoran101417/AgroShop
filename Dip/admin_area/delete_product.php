<?php
	
	include_once("../functions/functions.php"); 

	if(isset($_GET['delete_product'])){

		$delete_id = $_GET['delete_product'];

		$delete_pro = "delete from products where products_id='$delete_id'";
		
		$run_delete = mysqli_query($con, $delete_pro);

		if($run_delete){

			echo "<script>alert('A product has been deleted!')</script>";

			echo "<script>window.open('admin.php?view_products','_self')</script>";
		}
	}


?>