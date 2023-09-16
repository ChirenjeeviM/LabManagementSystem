<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `equipment`, `lab` WHERE lab_id = equipment_lab_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_equipment(equipment_id)
{
	if(confirm("Do you want to delete the equipment?"))
	{
		this.document.frm_equipment.equipment_id.value=equipment_id;
		this.document.frm_equipment.act.value="delete_equipment";
		this.document.frm_equipment.submit();
	}
}
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Lab Equipment Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_equipment" action="lib/equipment.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Image</td>
						<td scope="col">Lab Name</td>		
						<td scope="col">Equipment Name</td>		
						<td scope="col">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[equipment_id]?></td>
						<td>
						<a href="equipment-details.php?equipment_id=<?php echo $data[equipment_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[equipment_image]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[lab_name]?></td>
						<td><?=$data[equipment_name]?></td>
						<td style="text-align:center">
							<a href="equipment.php?equipment_id=<?php echo $data[equipment_id] ?>">Edit</a> | <a href="Javascript:delete_equipment(<?=$data[equipment_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="equipment_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
