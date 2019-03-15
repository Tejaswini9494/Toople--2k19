/* The following function creates an XMLHttpRequest object... */

function createRequestObject(){
	var request_o; //declare the variable to hold the object.
	var browser = navigator.appName; //find the browser name
	if(browser == "Microsoft Internet Explorer"){
		/* Create the object using MSIE's method */
		request_o = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		/* Create the object using other browser's method */
		request_o = new XMLHttpRequest();
	}
	return request_o; //return the object
}

/* You can get more specific with version information by using 
	parseInt(navigator.appVersion)
	Which will extract an integer value containing the version 
	of the browser being used.
*/
/* The variable http will hold our new XMLHttpRequest object. */
var http = createRequestObject(); 




function  changeImage(){
	http.open("get","secImage.php");
	http.onreadystatechange = handleSCImage;
	http.send(null);//alert("raj");
}



/* Function called to handle the list that was returned from the internal_request.php file.. */
function handleSCImage(){
	
	if(http.readyState == 1){};
	if(http.readyState == 4){ //Finished loading the response
		
		var response = http.responseText;
			if (response=="")
			{	
				//nosub(obj)
				//nosub(obj1)
			}else{
				document.getElementById('cImg').innerHTML=response;
				//document.getElementById("capt").focus(); 

			}
	}
}