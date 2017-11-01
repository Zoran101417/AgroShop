<?php
	
include_once("../functions/functions.php");

	if(isset($_GET['delete_customer'])){

		$delete_id = $_GET['delete_customer'];

		$delete_cus = "delete from customers where customer_id='$delete_id'";
		
		$run_delete = mysqli_query($con, $delete_cus);

		if($run_delete){

			echo "<script>alert('A customer has been deleted!')</script>";

			echo "<script>window.open('view_customers.php','_self')</script>";
		}
	}


?>