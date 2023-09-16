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
			<h4 class="heading colr">All Labs</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_lab" action="lib/lab.php" method="post">
				<div class="static">
				
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<div style="float:left; border:1px solid; margin:8px; padding:8px">
						<a href="lab-details.php?lab_id=<?php echo $data[lab_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[lab_image]?>" style="height:180px; width:150px"></a><br>
						<div style="text-align:center; border-top:2px solid; padding: 5px 0px; font-weight:bold; font-size:14px;"><?=$data[lab_name]?></div>
					</div>
					<?php } ?>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="lab_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
