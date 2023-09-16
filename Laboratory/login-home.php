<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
					<h4 class="heading colr">Welcome to Lab Management System</h4>
					<ul class='login-home-listing'>
							<li><a href="./index.php">Home</a></li>
							<li><a href="./about.php">About Us</a></li>
							<li><a href="./lab.php">Add Lab</a></li>
							<li><a href="./lab-report.php">Lab Report</a></li>
							<li><a href="./lab-listing.php">Lab Listing</a></li>
							<li><a href="./equipment.php">Add Equipment</a></li>
							<li><a href="./equipment-report.php">Equipment Report</a></li>
							<li><a href="./user.php?user_id=<?php echo $_SESSION['user_details']['user_id']; ?>">My Account</a></li>
							<li><a href="change-password.php">Change Password</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
