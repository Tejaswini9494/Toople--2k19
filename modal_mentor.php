
<?php
	$query1a1="select mentor_price_name from master_mentor_price GROUP BY mentor_price_name ORDER BY mentor_price_id DESC";
	$statement1a1=$mysqli->prepare($query1a1);
	$statement1a1->execute();
	$statement1a1->store_result();
	$statement1a1->bind_result($mentor_price_name);
?>

<div class="modal fade" id="modal_mentor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>  
<h2 class="modal-title" id="myModalLabel" style="width:auto;">Mentor Selection</h2>
			</div>
			<div class="modal-body"> 

				<input type='hidden' id="i_id" name="i_id" value="">
				<input type='hidden' id="sesshr_id" name="sesshr_id" value="">
				<input type='hidden' id="hid_proj" name="hid_proj" value="">
				<input type='hidden' id="hid_proj_count" name="hid_proj_count" value="">

				<div class="col-sm-12">
					<div class="gap10"></div>
					<div class="form-group">
						<div class="col-sm-6">
							<label>Mentor Type</label>
							<select class="form-control" id="mentor_temp_type" name="mentor_temp_type">
								<option value="">Select</option>
							<?php while($statement1a1->fetch()) { ?>
								<option value="<?php echo $mentor_price_name; ?>"><?php echo $mentor_price_name; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="gap20 yes600"></div>

						<div class="col-sm-4">
							<label>Hour(s)</label>
							<input type="text" class="form-control" id="mentor_temp_hours" name="mentor_temp_hours" placeholder="Hour(s)">
						</div>
						<div class="gap1 yes600"></div>

						<div class="col-sm-2">
							<div class="gap20"></div>
							<div class="gap5"></div>
							<button class="btn submitM" id="" name="" onclick="load_mentor_hours()"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div class="gap30"></div>

					<div id="load_mentor_hours" class="table-responsive">
					</div>
				</div> 
				<br class="clear">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cal_mentor()">Submit</button>
			</div>
		</div>
	</div>
</div>


<script>
function load_mentor_hours()
{
	var val1=$('#mentor_temp_type').val();
	var val2=$('#mentor_temp_hours').val();
	var val3=$('#hid_proj').val();
	var val4=$('#sesshr_id').val();
	var val5=$('#hid_proj_count_chk').val();
	var val6=$('#hid_proj_count').val();
	var val7=$('#i_id').val();
	var val10=$('#nrows2aa1').val();

	$.ajax({
		url:'ajax_load_mentor_hours.php', 
		type:'POST',
		data: {mentor_temp_type:val1, mentor_temp_hours:val2, hid_proj:val3, sesshr_id:val4, hid_proj_count_chk:val5, hid_proj_count:val6, i_id:val7, nrows2aa1:val10},
		success:function(result){ //alert(result);
			$("#load_mentor_hours").html(result);
			$('#mentor_temp_type').val('');
			$('#mentor_temp_hours').val('');
			var val8=$('#temp_tot').val();
			$('#mentor_price_'+val7).val(val8);
			//alert(val8);

			var val9=$('#modalValid').val();
			//alert(val9);
			$('#modalValid1_'+val7).val(val9);

		}
	});
}

function deleteInsiderTips(val1, val2)
{  var agree=confirm("Are you sure want to delete this auction?");
   if (agree) {
    $.ajax({url:'ajax_load_mentor_hours.php', 
		type:'POST',
		data: {del_id:val1, sesshr_id:val2},
		success:function(result){	
                    document.getElementById("load_mentor_hours").innerHTML=result;
			load_mentor_hours();
		}
	});
    }
}

</script>
