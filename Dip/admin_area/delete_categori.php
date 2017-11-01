

<br>
<h2 style="text-align:center;">Do you really want to DELETE categori?</h2>
<form action="" method="post">
	<br>
	<input type="submit" name="yes" value="Yes I want" />
	<input type="submit" name="no" value="No I was Joking" />
</form>


<?php
	
	include_once("../functions/functions.php"); 

	if(isset($_GET['delete_categori'])){

		if(isset($_POST['yes'])){

		$delete_id = $_GET['delete_categori'];

		$delete_cat = "delete from categories where cat_id='$delete_id'";
		
		$run_delete = mysqli_query($con, $delete_cat);

		if($run_delete){

			echo "<script>alert('A category has been deleted!')</script>";

			echo "<script>window.open('view_categori.php?view_cats','_self')</script>";
		}
	}
		if(isset($_POST['no'])){

		echo "<script>alert('Oh, dont joke again')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";

	}

}
?>