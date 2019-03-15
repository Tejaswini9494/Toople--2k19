<div class="modal fade" id="modal_mentor_calendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>  
<h2 class="modal-title" id="myModalLabel" style="width:auto;">Mentor Calendar</h2>
			</div>
			<div class="modal-body"> 
				<div class="col-sm-12">
					<div class="gap10"></div>
					<div id="load_modal_cal_trig">
					</div>
				</div> 
				<br class="clear">
			</div>
<!--
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="save_mentor()">Submit</button>
			</div>
-->
		</div>
	</div>
</div>

<script type="text/javascript">
function selall1(aa1){ 

if(aa1.checked==true){
	checkAll(document.frm,0)	
}else{checkAll(document.frm,1)	}
}
function checkAll(formObj, invert){ 
with (formObj) { 
  for (var i=0;i < elements.length;i++){ 
    fldObj = elements[i]; 
      if(fldObj.type == "checkbox"){ 
        if(invert==0){ 
          fldObj.checked = true; 
        }
        else{ 
          fldObj.checked = false; 
        } 
      }  
    } 
  } 
} 

function save_mentor(val1) {
	//alert(val1);
	var val5="<?php echo $mentor_hrs; ?>";
	val5=eval(val5);
	var val3=$("#mentor_type option:selected" ).text();
	var val4=$( "#mentor_id option:selected" ).text();

	$("#load_hidden_cal").html("");
	var result="";
	var ioo=1;
	var val2a=0;
	for(io=1; io<=val1; io++) {
		var isChecked = $("#cal_check_"+io).is(":checked");
		if (isChecked) {
			var val2=$("#cal_check_"+io).val();
			val2a= val2a + eval($("#cal_check_hrs"+io).val());
			result+="<input type='hidden' name='hid_cal_val["+ioo+"]' value='"+val2+"'>";
			ioo++;
		}
	}
	if(val2a <= val5) {
		ioo=ioo-1;
		result+="<input type='hidden' name='hid_cal_val_count' value='"+ioo+"'>";
		var result1="<td>1</td><td>"+val3+"</td><td>"+val4+"</td>";
		$("#men_cal_table").html(result1);
		$("#load_hidden_cal").html(result);
	} else {
		var result1="<td colspan='3' align='center'>Please schedule not more than"+val5+" hrs</td>";
		$("#men_cal_table").html(result1);
	}
}
</script>
