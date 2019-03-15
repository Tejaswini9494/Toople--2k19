/* First name Starts here
Key press event to restrict the numeric characters for Customer First name
onkeypress="return alpha(event)"
onchange="AllowOnlyAlphabates(this);"
onpaste="return AllowOnlyAlphabates(this);"
oncopy="return AllowOnlyAlphabates(this);"
onblur="FormatString(this);"
 */

function alpha(e) {

    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 0 || k == 9 || k == 32 || k ==46);

}

function AllowOnlyAlphabates(obj) {

    var objVal = document.getElementById(obj.id).value;

    if (objVal.match(/^[A-Za-z.\s]+$/)) {

        //var str = objVal.replace(/[^a-zA-Z]/g, '');

        //document.getElementById(obj.id).value = str;

    } else {

        if (objVal != "") {

            document.getElementById(obj.id).value = "";

            alert("Only characters allowed");

            return false;

        }

    }
}

function FormatString(obj) {

    if (obj.value.trim() !='') {

        var strObj = obj.value.split(' ');

        if (strObj.length > 1) {

            //for (i = 0; i < strObj.length && IsNumber == true; i++) 

            obj.value ='';

            for (i = 0; i < strObj.length; i++) {



                obj.value = obj.value.trim() + " " + strObj[i].trim().substr(0, 1).toUpperCase() + strObj[i].trim().substr(1).toLowerCase();

            }
        }

        else {

            obj.value = obj.value.trim().substr(0, 1).toUpperCase() + obj.value.trim().substr(1).toLowerCase();

        }

    }

}
/* First name ends here */

/* Mobile number validation starts here
onkeypress="javascript:return OnlyNumeric(this,event,false);"
*/
function OnlyNumeric(id, evt, isNotAmount) {

    var Nav = navigator.appName;

    if (Nav == "Microsoft Internet Explorer" || Nav == "Opera") {

        var keyCode = event.keyCode;

    }

    else {

        var keyCode = document.layers ? evt.which : document.all ? evt.charCode : evt.charCode;

    }

    if (!(keyCode >= 48 && keyCode <= 57 || keyCode == 8 || keyCode == 0 ||  keyCode == 9)) {

        return false;

    }

    else {
        //Note : do not allow  Zero as first position for numeric fields.
        if (isNotAmount == false) {
            if ($(id).val().length == 1) {

                if ($(id).val().trim() == '0' || $(id).val().trim() == '') {

                    $(id).val('');

                    return false;

                }

            }

            if (keyCode == 48 && ($(id).val().charAt(0) == '' || $(id).val().charAt(0) == '0')) {
	       return false;
            }
        }
        return true;
    }
}


/* Mobile number validation ends here */

/* Email Validation Starts here 
onkeypress="javascript:return fncEmailValidate(event);"
OnPaste="return false;" 
*/
function fncEmailValidate(evt) {

    var Nav = navigator.appName;

    if (Nav == "Microsoft Internet Explorer" || Nav == "Opera") {

        var keyCode = event.keyCode;

    }

    else {

        var keyCode = document.layers ? evt.which : document.all ? evt.charCode : evt.charCode;

    }

    if (!(

            keyCode >= 97 && keyCode <= 122 ||

            keyCode >= 65 && keyCode <= 90 ||

            keyCode >= 48 && keyCode <= 57 ||

            keyCode == 46 ||

            keyCode == 64 ||

            keyCode == 95 ||

            keyCode == 8 ||

            keyCode == 0 ||

            keyCode == 9

            )) {

        return false;

    }

    else {
        return true;
    }
}
/* Email Validation Ends here */

/* Address validation starts here 
onpaste="return chkAddressLength(this);" 
oncopy="return chkAddressLength(this);"
onchange="javascript:FormatString(this);"
onkeypress="javascript:return fnAddressValidate(event);chkBrowser(this)"
*/
function chkAddressLength(obj) {

    if ($(obj) != null) {

        if ($(obj).val().length > 100) {

            //var l = $(obj).length > 50;

            var textValue = $(obj).val().substring(100);

            $(obj).val(textValue);

            //alert($(obj)

        }

    }
}

function fnAddressValidate(evt) {

    // A-Z, a-z, 0-9, Spacebar , Backspace, Delete,\,[,],-,Comma,Dot,(,),&

    // Use : Address

    var Nav = navigator.appName;

    if (Nav == "Microsoft Internet Explorer" || Nav == "Opera") {

        var keyCode = event.keyCode;
    }

    else {

        var keyCode = document.layers ? evt.which : document.all ? evt.charCode : evt.charCode;

    }

    if (!(

            keyCode >= 97 && keyCode <= 122 ||

            keyCode >= 65 && keyCode <= 90 ||

            keyCode >= 48 && keyCode <= 57 ||

            keyCode >= 91 && keyCode <= 93 ||

            keyCode >= 44 && keyCode <= 47 ||

            keyCode == 38 || keyCode > 39 && keyCode <= 41 ||

            keyCode == 32 ||

            keyCode == 8 ||

            keyCode == 0 ||

            keyCode == 9

            )) {

        return false;
    }

    else {

        return true;
    }
}

/* Address validation ends here */


/* Pincode Validation Starts here */

function fnCheckInteger(evt) {

    var Nav = navigator.appName;

    if (Nav == "Microsoft Internet Explorer" || Nav == "Opera") {

        var keyCode = event.keyCode;

    }

    else {

        var keyCode = document.layers ? evt.which : document.all ? evt.charCode : evt.charCode;

    }

    if (!(

        keyCode >= 48 && keyCode <= 57 ||

        keyCode == 8 ||

        keyCode == 0 ||

        keyCode == 9

        )) {

        return false;

    }

    else {

        return true;

    }

}

/* Pincode Validation Starts here */

/* Engine Number validation Starts here
onkeypress="return RestrictSpecial(event)" */
function RestrictSpecial(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 0 || k == 9 || k == 32 || (k >= 48 && k < 58));
}
/* Engine Number validation Ends here */



//Customized for validation of Prev Pol No starts here

function RestrictSpecial_C1(e) {

    var k;
    document.all ? k = e.keyCode : k = e.which;
    //alert('keycode:' + k);
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 0 || k == 9 || (k >= 48 && k < 58) || k == 45 || k == 47 || k == 92);
}

//Customized for validation of Prev Pol No Ends here


/* Car Reg number's Third column Starts here 
onpaste="return false" onkeypress="javascript:return fnCheckAlphaNumeric(event);"
*/


function AppendZeroforRegNo2() {

	//alert();
	var reg_val=$('#txtRegNo3').val().trim();
	$("#txtRegNo3_error").html('');
    if (reg_val.length < 4) {
       // $('#txtRegNo3').val(padleft($('#txtRegNo3').val(), "0", 1));

	var num=$('#txtRegNo3').val();
	var places=4;

	var zero = places - num.toString().length + 1;
        var finalval= Array(+(zero > 0 && zero)).join("0") + num;
	$('#txtRegNo3').val(finalval);
	
    }
	if(reg_val==0)
	{
		$("#txtRegNo3_error").html('Please enter valid registration number \n');
	}
}
function fnCheckAlphaNumeric(evt) {

    var Nav = navigator.appName;
    if (Nav == "Microsoft Internet Explorer" || Nav == "Opera") {
        var keyCode = event.keyCode;
    }
    else {
        var keyCode = document.layers ? evt.which : document.all ? evt.charCode : evt.charCode;
    }

    if (keyCode == "46") {
        //  alert('aa')
        return false;
    }

    if (!(keyCode >= 97 && keyCode <= 122 || keyCode >= 65 && keyCode <= 90 || keyCode == 32 || keyCode == 8 || keyCode == 0 || keyCode == 9 || (event.keyCode >= 48 && event.keyCode <= 57))) {
        return false;
    }
    return true;
}
/* Car Reg number's Third column ends here */
