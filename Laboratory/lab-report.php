<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `lab`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_lab(lab_id)
{
	if(confirm("Do you want to delete the lab?"))
	{
		this.document.frm_lab.lab_id.value=lab_id;
		this.document.frm_lab.act.value="delete_lab";
		this.document.frm_lab.submit();
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
			<h4 class="heading colr">Lab Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_lab" action="lib/lab.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Image</td>
						<td scope="col">Lab Name</td>		
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
						<td><?=$data[lab_id]?></td>
						<td>
						<a href="lab-details.php?lab_id=<?php echo $data[lab_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[lab_image]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[lab_name]?></td>
						<td style="text-align:center">
							<a href="lab.php?lab_id=<?php echo $data[lab_id] ?>">Edit</a> | <a href="Javascript:delete_lab(<?=$data[lab_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="lab_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
