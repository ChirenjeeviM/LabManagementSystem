<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[equipment_id])
	{
		$SQL="SELECT * FROM equipment WHERE equipment_id = $_REQUEST[equipment_id]";
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
				<h4 class="heading colr"><?=$heading?>Add Lab Equipment</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/equipment.php" enctype="multipart/form-data" method="post" name="frm_equipment">
					<ul class="forms">
						<li class="txt">Select Lab</li>
						<li class="inputfield">
							<select name="equipment_lab_id" class="bar" required/>
								<?php echo get_new_optionlist("lab","lab_id","lab_name",$data[equipment_lab_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Equipment Name</li>
						<li class="inputfield"><input name="equipment_name" id="equipment_name" type="text" class="bar" required value="<?=$data[equipment_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Quantity</li>
						<li class="inputfield"><input name="equipment_quantity" id="equipment_quantity" type="text" class="bar" required value="<?=$data[equipment_quantity]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="equipment_image" type="file" class="bar"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="inputfield"><input name="equipment_description" id="equipment_description" type="text" class="bar" required value="<?=$data[equipment_description]?>"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_equipment">
					<input type="hidden" name="avail_image" value="<?=$data[equipment_image]?>">
					<input type="hidden" name="equipment_id" value="<?=$data[equipment_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
