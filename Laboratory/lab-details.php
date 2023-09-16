<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[lab_id])
	{
		$SQL="SELECT * FROM lab WHERE lab_id = $_REQUEST[lab_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
	$SQL="SELECT * FROM `equipment` WHERE equipment_lab_id = $_REQUEST[lab_id]";
	$lab_rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?> 

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$data[lab_name]?> Lab Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div id="myrow">
					
				<table>
		
						<tr>
							<th>Lab Name</th>
							<td><?=$data[lab_name]?></td>
						</tr>
						<tr>
							<th>Manager Name</th>
							<td><?=$data[lab_manager]?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?=$data[lab_email]?></td>
						</tr>
						<tr>
							<th>Contact</th>
							<td><?=$data[lab_contact]?></td>
						</tr>
						<tr>
							<th>Location</th>
							<td><?=$data[lab_location]?></td>
						</tr>
						<tr>
						<tr>
							<th>Description</th>
							<td><?=$data[lab_description]?></td>
						</tr>
					</table>
			</div>
		<h4 class="heading colr">All Equipments of Lab (<?=$data[lab_name]?>)</h4>
			<div class="static">
			<table>
					<?php 
					$sr_no=1;
					while($lab_data = mysqli_fetch_assoc($lab_rs))
					{
					?>
					<tr>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$lab_data[equipment_image]?>" style="height:70px; width:70px"></td>
						<td style="vertical-align:top">
						<table border="0">
								<tr>
									<td class="tdheading">Equipment ID</th>
									<td><?=$lab_data[equipment_id]?></td>
								</tr>
								<tr>
									<td class="tdheading">Equipment Name</th>
									<td><?=$lab_data[equipment_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Equipment Quantity</th>
									<td><?=$lab_data[equipment_quantity]?></td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Lab (<?=$data['lab_name']?>)</h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[lab_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
