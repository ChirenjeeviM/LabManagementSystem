<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[lab_id])
	{
		$SQL="SELECT * FROM lab WHERE lab_id = $_REQUEST[lab_id]";
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
				<h4 class="heading colr"><?=$heading?>Add Lab</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/lab.php" enctype="multipart/form-data" method="post" name="frm_lab">
					<ul class="forms">
						<li class="txt">Lab Name</li>
						<li class="inputfield"><input name="lab_name" id="lab_name" type="text" class="bar" required value="<?=$data[lab_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Lab Manager</li>
						<li class="inputfield"><input name="lab_manager" id="lab_manager" type="text" class="bar" required value="<?=$data[lab_manager]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Lab Email</li>
						<li class="inputfield"><input name="lab_email" id="lab_email" type="text" class="bar" required value="<?=$data[lab_email]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Lab Contact</li>
						<li class="inputfield"><input name="lab_contact" id="lab_contact" type="text" class="bar" required value="<?=$data[lab_contact]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Lab Location</li>
						<li class="inputfield"><input name="lab_location" id="lab_location" type="text" class="bar" required value="<?=$data[lab_location]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="lab_image" type="file" class="bar"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="inputfield"><input name="lab_description" id="lab_description" type="text" class="bar" required value="<?=$data[lab_description]?>"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_lab">
					<input type="hidden" name="avail_image" value="<?=$data[lab_image]?>">
					<input type="hidden" name="lab_id" value="<?=$data[lab_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
