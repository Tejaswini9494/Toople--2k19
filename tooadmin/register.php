<?php 
$page="register";
$tit="Register &raquo; Student";
$ses="no";
include("head.php"); ?>
 <style>
 body{background:#f7f7f7; }
 </style>

 <?php include("in_top.php"); ?>
 


 <div class="col-xs-12">
 
<div class="gap30"></div>
  
<h1 >Register &raquo; Student </h1>
<div class="logBox regBox">

  
  <!--inner  -->
  
  
  <div class="animated fadeInUp">
<form name="reg" method="post" id="seeker_valid">

<h3>Type of Users</h3>
	<div class="gap10"></div>
	<div class="item1 text-center">
		<div class="gap10"></div>

		 
		 <label><input type="radio" name="11" /> Student </label> &nbsp;&nbsp;&nbsp;
       
         <div class="gap10"></div>
         
         <p class="red">/*If Student checked the below will show*/</p>
         
          <label><input type="radio" name="12" /> Project Student </label> &nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="12" />  Internship Student </label>
         
		<div class="gap10"></div>
	</div>
	<div class="gap15"></div>
    
    
	<h3>Login Info</h3>
	<div class="gap10"></div>
	<div class="item1">
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Email ID <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="text" name="user_email" id="user_email" class="form-control" placeholder="Email ID" autofocus>
				</div>
				<div class="gap1"></div>
				<span for="user_email" class="errors"></span>
			</div>
		</div>
		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Password <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
				<input type="password" name="user_password" id="user_password" class="form-control" placeholder="Password">
				</div>
				<div class="gap1"></div>
				<span for="user_password" class="errors"></span>
			</div>
		</div>
        
        
        <div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Plan <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pie-chart"></i></span>
				<select name="user_plan" id="user_plan" class="form-control"  >
					<option value="">Select</option>
					<option value="S">Silver</option>
					<option value="G">Gold</option>
					<option value="E">Platinum</option>
				</select><i></i>
				</div>
				<div class="gap1"></div>
				<span for="user_plan" class="errors"></span>
			</div>
		</div>
        

		<div class="gap10"></div>
	</div>
	<div class="gap15"></div>
	<!------------>
	<h3>Personal Info</h3>
	<div class="gap10"></div>
	<div class="item1">
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Name">
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
		</div>
		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Date of Birth <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="text" class="form-control" name="user_dob" id="user_dob" placeholder="Date Of Birth">
				</div>
				<div class="gap1"></div>
				<span for="user_dob" class="errors"></span>
			</div>
		</div>
        		<div class="gap15"></div>
		

		<div class="form-group">
			<label class="col-sm-3 text-right">Gender <span class="red">*</span></label>
			<div class="col-sm-3">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-female"></i></span>
				<span class="form-control">Female</span>
				<span class="input-group-addon"><input type="radio" id="" name="gender"></span>
				</div>
			</div>
			 
			<div class="col-sm-3">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-male"></i></span>
				<span class="form-control">Male</span>
				<span class="input-group-addon"><input type="radio" id="" name="gender"></span>
				</div>
			</div>
				<div class="gap1"></div>
				<span for="gender" class="errors col-sm-8 col-sm-push-5" ></span>
		</div>
        
        <div class="gap15"></div>
        <div class="form-group">
			<label class="col-sm-3 text-right">Identity Number <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Name">
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
		</div>
      </div>  
		<div class="gap15 no600"></div>
 
	<!------------>
	<h3>Contact Info</h3>
	<div class="gap10"></div>
	<div class="item1">
		<div class="gap10"></div>

	
		<div class="form-group">
			<label class="col-sm-3 text-right">Address Line1 <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
				<input type="text" class="form-control" />
				</div>
				<div class="gap1"></div>
				<span for="address" class="errors"></span>
			</div>
		</div>
        
        <div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Address Line2 <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
				<input type="text" class="form-control" />
				</div>
				<div class="gap1"></div>
				<span for="address" class="errors"></span>
			</div>
		</div>

		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
				<select name="user_state" id="user_state" class="form-control">
					<option value="AF">Afghanistan </option>
<option value="AL">Albania </option>
<option value="DZ">Algeria </option>
<option value="AS">American Samoa </option>
<option value="AD">Andorra </option>
<option value="AO">Angola </option>
<option value="AI">Anguilla </option>
<option value="AQ">Antarctica </option>
<option value="AG">Antigua and Barbuda </option>
<option value="AR">Argentina </option>
<option value="AM">Armenia </option>
<option value="AW">Aruba </option>
<option value="AU">Australia </option>
<option value="AT">Austria </option>
<option value="AZ">Azerbaijan </option>
<option value="BS">Bahamas </option>
<option value="BH">Bahrain </option>
<option value="BD">Bangladesh </option>
<option value="BB">Barbados </option>
<option value="BY">Belarus </option>
<option value="BE">Belgium </option>
<option value="BZ">Belize </option>
<option value="BJ">Benin </option>
<option value="BM">Bermuda </option>
<option value="BT">Bhutan </option>
<option value="BO">Bolivia </option>
<option value="BA">Bosnia and Herzegovina </option>
<option value="BW">Botswana </option>
<option value="BV">Bouvet Island </option>
<option value="BR">Brazil </option>
<option value="IO">British Indian Ocean Territory </option>
<option value="BN">Brunei Darussalam </option>
<option value="BG">Bulgaria </option>
<option value="BF">Burkina Faso </option>
<option value="BI">Burundi </option>
<option value="KH">Cambodia </option>
<option value="CM">Cameroon </option>
<option value="CA">Canada </option>
<option value="CV">Cape Verde </option>
<option value="KY">Cayman Islands </option>
<option value="CF">Central African Republic </option>
<option value="TD">Chad </option>
<option value="CL">Chile </option>
<option value="CN">China </option>
<option value="CX">Christmas Island </option>
<option value="CC">Cocos (Keeling) Islands </option>
<option value="CO">Colombia </option>
<option value="KM">Comoros </option>
<option value="CG">Congo </option>
<option value="CD">Congo, the Democratic Republic of the </option>
<option value="CK">Cook Islands </option>
<option value="CR">Costa Rica </option>
<option value="CI">Cote D'Ivoire </option>
<option value="HR">Croatia </option>
<option value="CU">Cuba </option>
<option value="CY">Cyprus </option>
<option value="CZ">Czech Republic </option>
<option value="DK">Denmark </option>
<option value="DJ">Djibouti </option>
<option value="DM">Dominica </option>
<option value="DO">Dominican Republic </option>
<option value="EC">Ecuador </option>
<option value="EG">Egypt </option>
<option value="SV">El Salvador </option>
<option value="GQ">Equatorial Guinea </option>
<option value="ER">Eritrea </option>
<option value="EE">Estonia </option>
<option value="ET">Ethiopia </option>
<option value="FK">Falkland Islands (Malvinas) </option>
<option value="FO">Faroe Islands </option>
<option value="FJ">Fiji </option>
<option value="FI">Finland </option>
<option value="FR">France </option>
<option value="GF">French Guiana </option>
<option value="PF">French Polynesia </option>
<option value="TF">French Southern Territories </option>
<option value="GA">Gabon </option>
<option value="GM">Gambia </option>
<option value="GE">Georgia </option>
<option value="DE">Germany </option>
<option value="GH">Ghana </option>
<option value="GI">Gibraltar </option>
<option value="GR">Greece </option>
<option value="GL">Greenland </option>
<option value="GD">Grenada </option>
<option value="GP">Guadeloupe </option>
<option value="GU">Guam </option>
<option value="GT">Guatemala </option>
<option value="GN">Guinea </option>
<option value="GW">Guinea-Bissau </option>
<option value="GY">Guyana </option>
<option value="HT">Haiti </option>
<option value="HM">Heard Island and Mcdonald Islands </option>
<option value="VA">Holy See (Vatican City State) </option>
<option value="HN">Honduras </option>
<option value="HK">Hong Kong </option>
<option value="HU">Hungary </option>
<option value="IS">Iceland </option>
<option selected="selected" value="IN">India </option>
<option value="ID">Indonesia </option>
<option value="IR">Iran, Islamic Republic of </option>
<option value="IQ">Iraq </option>
<option value="IE">Ireland </option>
<option value="IL">Israel </option>
<option value="IT">Italy </option>
<option value="JM">Jamaica </option>
<option value="JP">Japan </option>
<option value="JO">Jordan </option>
<option value="KZ">Kazakhstan </option>
<option value="KE">Kenya </option>
<option value="KI">Kiribati </option>
<option value="KP">Korea, Democratic People's Republic of </option>
<option value="KR">Korea, Republic of </option>
<option value="KW">Kuwait </option>
<option value="KG">Kyrgyzstan </option>
<option value="LA">Lao People's Democratic Republic </option>
<option value="LV">Latvia </option>
<option value="LB">Lebanon </option>
<option value="LS">Lesotho </option>
<option value="LR">Liberia </option>
<option value="LY">Libyan Arab Jamahiriya </option>
<option value="LI">Liechtenstein </option>
<option value="LT">Lithuania </option>
<option value="LU">Luxembourg </option>
<option value="MO">Macao </option>
<option value="MK">Macedonia, the Former Yugoslav Republic of </option>
<option value="MG">Madagascar </option>
<option value="MW">Malawi </option>
<option value="MY">Malaysia </option>
<option value="MV">Maldives </option>
<option value="ML">Mali </option>
<option value="MT">Malta </option>
<option value="MH">Marshall Islands </option>
<option value="MQ">Martinique </option>
<option value="MR">Mauritania </option>
<option value="MU">Mauritius </option>
<option value="YT">Mayotte </option>
<option value="MX">Mexico </option>
<option value="FM">Micronesia, Federated States of </option>
<option value="MD">Moldova, Republic of </option>
<option value="MC">Monaco </option>
<option value="MN">Mongolia </option>
<option value="MS">Montserrat </option>
<option value="MA">Morocco </option>
<option value="MZ">Mozambique </option>
<option value="MM">Myanmar </option>
<option value="NA">Namibia </option>
<option value="NR">Nauru </option>
<option value="NP">Nepal </option>
<option value="NL">Netherlands </option>
<option value="AN">Netherlands Antilles </option>
<option value="NC">New Caledonia </option>
<option value="NZ">New Zealand </option>
<option value="NI">Nicaragua </option>
<option value="NE">Niger </option>
<option value="NG">Nigeria </option>
<option value="NU">Niue </option>
<option value="NF">Norfolk Island </option>
<option value="MP">Northern Mariana Islands </option>
<option value="NO">Norway </option>
<option value="OM">Oman </option>
<option value="PK">Pakistan </option>
<option value="PW">Palau </option>
<option value="PS">Palestinian Territory, Occupied </option>
<option value="PA">Panama </option>
<option value="PG">Papua New Guinea </option>
<option value="PY">Paraguay </option>
<option value="PE">Peru </option>
<option value="PH">Philippines </option>
<option value="PN">Pitcairn </option>
<option value="PL">Poland </option>
<option value="PT">Portugal </option>
<option value="PR">Puerto Rico </option>
<option value="QA">Qatar </option>
<option value="RE">Reunion </option>
<option value="RO">Romania </option>
<option value="RU">Russian Federation </option>
<option value="RW">Rwanda </option>
<option value="SH">Saint Helena </option>
<option value="KN">Saint Kitts and Nevis </option>
<option value="LC">Saint Lucia </option>
<option value="PM">Saint Pierre and Miquelon </option>
<option value="VC">Saint Vincent and the Grenadines </option>
<option value="WS">Samoa </option>
<option value="SM">San Marino </option>
<option value="ST">Sao Tome and Principe </option>
<option value="SA">Saudi Arabia </option>
<option value="SN">Senegal </option>
<option value="CS">Serbia and Montenegro </option>
<option value="SC">Seychelles </option>
<option value="SL">Sierra Leone </option>
<option value="SG">Singapore </option>
<option value="SK">Slovakia </option>
<option value="SI">Slovenia </option>
<option value="SB">Solomon Islands </option>
<option value="SO">Somalia </option>
<option value="ZA">South Africa </option>
<option value="GS">South Georgia and the South Sandwich Islands </option>
<option value="ES">Spain </option>
<option value="LK">Sri Lanka </option>
<option value="SD">Sudan </option>
<option value="SR">Suriname </option>
<option value="SJ">Svalbard and Jan Mayen </option>
<option value="SZ">Swaziland </option>
<option value="SE">Sweden </option>
<option value="CH">Switzerland </option>
<option value="SY">Syrian Arab Republic </option>
<option value="TW">Taiwan </option>
<option value="TJ">Tajikistan </option>
<option value="TZ">Tanzania, United Republic of </option>
<option value="TH">Thailand </option>
<option value="TL">Timor-Leste </option>
<option value="TG">Togo </option>
<option value="TK">Tokelau </option>
<option value="TO">Tonga </option>
<option value="TT">Trinidad and Tobago </option>
<option value="TN">Tunisia </option>
<option value="TR">Turkey </option>
<option value="TM">Turkmenistan </option>
<option value="TC">Turks and Caicos Islands </option>
<option value="TV">Tuvalu </option>
<option value="UG">Uganda </option>
<option value="UA">Ukraine </option>
<option value="AE">United Arab Emirates </option>
<option value="GB">United Kingdom </option>
<option value="US">United States </option>
<option value="UM">United States Minor Outlying Islands </option>
<option value="UY">Uruguay </option>
<option value="UZ">Uzbekistan </option>
<option value="VU">Vanuatu </option>
<option value="VE">Venezuela </option>
<option value="VN">Viet Nam </option>
<option value="VG">Virgin Islands, British </option>
<option value="VI">Virgin Islands, U.s. </option>
<option value="WF">Wallis and Futuna </option>
<option value="EH">Western Sahara </option>
<option value="YE">Yemen </option>
<option value="ZM">Zambia </option>
<option value="ZW">Zimbabwe </option>
				</select><i></i>
				</div>
				<div class="gap1"></div>
				<span for="user_state" class="errors"></span>
			</div>
		</div>

		<div class="gap15"></div>
        
      
		<div class="form-group">
			<label class="col-sm-3 text-right">State <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-flag"></i></span>
				<select name="user_nationality" id="user_nationality" class="form-control">
					<option value="">- Select - </option>
					<option value="1">Load From Master</option>
				</select><i></i>
				</div>
				<div class="gap1"></div>
				<span for="user_nationality" class="errors"></span>
			</div>
		</div>
        
          
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">City <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				<select name="user_city" id="user_city" class="form-control">
					<option value="">Select</option>
<option>Loaded from master</option>
<option value="">Select</option>
<option value="1">Ahmedabad </option>
<option value="2">Bangalore </option>
<option value="3">Chennai </option>
<option value="4">Delhi </option>
<option value="199">Delhi Region </option>
<option value="5">Gurgaon </option>
<option value="6">Hyderabad </option>
<option value="7">Kolkata </option>
<option value="8">Mumbai </option>
<option value="9">Noida </option>
<option value="10">Pune </option>
<option value="11">Agartala </option>
<option value="12">Agra </option>
<option value="13">Ahmednagar </option>
<option value="14">Aizawal </option>
<option value="15">Ajmer </option>
<option value="16">Aligarh </option>
<option value="17">Allahabad </option>
<option value="18">Ambala </option>
<option value="19">Amritsar </option>
<option value="20">Anand </option>
<option value="21">Ankleshwar </option>
<option value="22">Asansol </option>
<option value="23">Aurangabad </option>
<option value="24">Bahgalpur </option>
<option value="25">Bareilly </option>
<option value="26">Baroda </option>
<option value="27">Belgaum </option>
<option value="28">Bellary </option>
<option value="29">Bharuch </option>
<option value="30">Bhatinda </option>
<option value="31">Bhavnagar </option>
<option value="32">Bhilaigarh </option>
<option value="33">Bhopal </option>
<option value="34">Bhubaneshwar </option>
<option value="35">Bhuj </option>
<option value="36">Bidar </option>
<option value="37">Bilaspur </option>
<option value="38">Bokaro </option>
<option value="39">Calicut </option>
<option value="40">Chandigarh </option>
<option value="41">Coimbatore </option>
<option value="42">Cuttack </option>
<option value="43">Dalhousie </option>
<option value="44">Daman </option>
<option value="45">Dehradun </option>
<option value="46">Dhanbad </option>
<option value="47">Dharamsala </option>
<option value="48">Dharwad </option>
<option value="49">Dispur </option>
<option value="50">Durgapur </option>
<option value="51">Ernakulam </option>
<option value="52">Erode </option>
<option value="53">Faizabad </option>
<option value="54">Faridabad </option>
<option value="55">Gandhinagar </option>
<option value="56">Gangtok </option>
<option value="57">Ghaziabad </option>
<option value="58">Goa </option>
<option value="59">Gorakhpur </option>
<option value="60">Gulbarga </option>
<option value="61">Guntur </option>
<option value="62">Guwahati </option>
<option value="63">Gwalior </option>
<option value="64">Haldia </option>
<option value="65">Hisar </option>
<option value="66">Hosur </option>
<option value="67">Hubli </option>
<option value="68">Imphal </option>
<option value="69">Indore </option>
<option value="70">Itanagar </option>
<option value="71">Jabalpur </option>
<option value="72">Jaipur </option>
<option value="73">Jaisalmer </option>
<option value="74">Jalandhar </option>
<option value="75">Jalgaon </option>
<option value="76">Jammu </option>
<option value="77">Jamnagar </option>
<option value="78">Jamshedpur </option>
<option value="79">Jodhpur </option>
<option value="80">Kakinada </option>
<option value="81">Kandla </option>
<option value="82">Kannur </option>
<option value="83">Kanpur </option>
<option value="84">Karnal </option>
<option value="85">Kavaratti </option>
<option value="86">Kharagpur </option>
<option value="87">Kochi </option>
<option value="88">Kohima </option>
<option value="89">Kolar </option>
<option value="90">Kolhapur </option>
<option value="91">Kollam </option>
<option value="92">Kota </option>
<option value="93">Kottayam </option>
<option value="94">Kulu/Manali </option>
<option value="95">Kurnool </option>
<option value="96">Kurukshetra </option>
<option value="97">Lucknow </option>
<option value="98">Ludhiana </option>
<option value="99">Madurai </option>
<option value="100">Mangalore </option>
<option value="101">Mathura </option>
<option value="102">Meerut </option>
<option value="103">Mohali </option>
<option value="104">Moradabad </option>
<option value="105">Mysore </option>
<option value="106">Nagercoil </option>
<option value="107">Nagpur </option>
<option value="108">Nasik </option>
<option value="109">Nellore </option>
<option value="110">Nizamabad </option>
<option value="111">Ooty </option>
<option value="112">Pallakad </option>
<option value="113">Panipat </option>
<option value="114">Paradeep </option>
<option value="115">Pathankot </option>
<option value="116">Patiala </option>
<option value="117">Patna </option>
<option value="118">Pondicherry </option>
<option value="119">Porbandar </option>
<option value="120">Port Blair </option>
<option value="121">Puri </option>
<option value="122">Quilon </option>
<option value="123">Raipur </option>
<option value="124">Rajamundry </option>
<option value="125">Rajkot </option>
<option value="126">Ranchi </option>
<option value="127">Rohtak </option>
<option value="128">Roorkee </option>
<option value="129">Rourkela </option>
<option value="130">Salem </option>
<option value="131">Shillong </option>
<option value="132">Shimla </option>
<option value="133">Sholapur </option>
<option value="134">Silchar </option>
<option value="135">Siliguri </option>
<option value="136">Silvassa </option>
<option value="137">Srinagar </option>
<option value="138">Surat </option>
<option value="139">Thanjavur </option>
<option value="140">Thrissur </option>
<option value="143">Thiruvananthapuram </option>
<option value="141">Tirunalveli </option>
<option value="142">Tirupati </option>
<option value="144">Trichy </option>
<option value="145">Tuticorin </option>
<option value="146">Udaipur </option>
<option value="147">Ujjain </option>
<option value="148">Vadodara </option>
<option value="149">Valsad </option>
<option value="150">Vapi </option>
<option value="151">Varanasi </option>
<option value="152">Vellore </option>
<option value="153">Vijayawada </option>
<option value="154">Visakhapatnam </option>
<option value="155">Warangal </option>
<option value="198">Other India </option>
<option value="156">Australia </option>
<option value="158">Bahrain </option>
<option value="157">Bangladesh </option>
<option value="159">Belgium </option>
<option value="160">Canada </option>
<option value="161">China </option>
<option value="250">Egypt </option>
<option value="164">France </option>
<option value="165">Germany </option>
<option value="204">Gulf </option>
<option value="166">Hongkong </option>
<option value="167">Indonesia </option>
<option value="168">Ireland </option>
<option value="169">Japan </option>
<option value="238">Jordan </option>
<option value="170">Kuwait </option>
<option value="237">Lebanon </option>
<option value="171">Malaysia </option>
<option value="172">Maldives </option>
<option value="173">Mauritius </option>
<option value="174">Mexico </option>
<option value="175">Nepal </option>
<option value="176">Netherlands </option>
<option value="177">New Zealand </option>
<option value="178">Oman </option>
<option value="179">Pakistan </option>
<option value="249">Philippines </option>
<option value="180">Qatar </option>
<option value="181">Russia </option>
<option value="182">Saudi Arabia </option>
<option value="183">Singapore </option>
<option value="184">South Africa </option>
<option value="185">South Korea </option>
<option value="186">Spain </option>
<option value="187">SriLanka </option>
<option value="188">Sweden </option>
<option value="189">Switzerland </option>
<option value="190">Thailand </option>
<option value="191">UK </option>
<option value="192">United Arab Emirates </option>
<option value="193">US </option>
<option value="194">Yemen </option>
<option value="195">Zimbabwe </option>
<option value="197">Other International </option>
				</select><i></i>
				</div>
				<div class="gap1"></div>
				<span for="user_city" class="errors"></span>
			</div>
		</div>

	<div class="gap15"></div>
	<div class="form-group">
			<label class="col-sm-3 text-right">Primary Contact <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
				<select class="form-control" style="width: 35%;">
					<option>India (+91)</option>
				</select><i style="left: 34.6%;"></i>
				<input type="text" name="country_code" id="country_code" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" required />
				</div>
				<div class="gap1"></div>
				<span for="country_code" class="errors"></span>
			</div>
		</div>
        
        
	<div class="gap15"></div>
	<div class="form-group">
			<label class="col-sm-3 text-right">Secondary Contact </label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
				<select class="form-control" style="width: 35%;">
					<option>India (+91)</option>
				</select><i style="left: 34.6%;"></i>
				<input type="text" name="country_code" id="country_code" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" required />
				</div>
				<div class="gap1"></div>
				<span for="country_code" class="errors"></span>
			</div>
		</div>

	<div class="gap1"></div>
	
	 
	 
 
	</div>
	<div class="gap15"></div>
	<!------------>
	<h3>Educational  Qualification</h3>
	<div class="gap10"></div>
	<div class="item1">
		 
 
		<div class="col-md-12">
		<div class="table-responsive">
			<table width="100%" class="table table-striped border">
				<tr>
				  <td>Program</td>
				  <td>Department</td>
				  <td>Yr of Str</td>
				  <td>Yr of Complt</td>
				  <td>% Achvd</td>
				  <td>Institution Name</td>
				  <td>Institution Country</td>
				  <td>Institution State</td>
				  <td>Institution City</td>
				  <td>Institution Zip</td>
				  <td align="right">&nbsp;</td>
			    </tr>
				<tr>
				  <td><span class="input-group">
				    <select class="form-control" name="academic_course2" id="academic_course2">
				      <option value="">Select</option>
				      
				      <option  >Loaded from DB</option>
			        </select>
				  </span></td>
				  <td><span class="input-group">
				    <select class="form-control" name="academic_course3" id="academic_course3">
				      <option value="">Select</option>
				      <option  >Loaded from DB</option>
			        </select>
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="" id="" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input" id="input" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input2" id="input2" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input3" id="input3" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input4" id="input4" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input5" id="input5" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input6" id="input6" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input7" id="input7" class="form-control" />
				  </span></td>
				  <td align="right">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
			    </tr>
				<tr>
					<td>B.Tech</td>
					<td>Civil</td>
					<td>2000</td>
					<td>2003</td>
					<td>85</td>
					<td>SRM</td>
					<td>India</td>
					<td>Tamilnadu</td>
					<td>Chennai</td>
					<td>600040</td>
					<td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
				</tr>
			</table>
		</div>
		</div> 
		 
	</div>
    
    
    
     <div class="gap15"></div>
    
    <h3>Technical Skills</h3>
    
    
    <div class="gap10"></div>
    
    <div class="item1">
		 
 
		<div class="col-md-12">
		<div class="table-responsive">
			<table width="100%" class="table table-striped border">
				<tr>
				  <td>Technical Area</td>
				  <td>Trained By</td>
				  <td>Trained From</td>
				  <td>Trained Upto</td>
				  <td>Knowledge Level</td>
				  <td align="right">&nbsp;</td>
			    </tr>
				<tr>
				  <td><span class="input-group">
				    <select class="form-control" name="academic_course2" id="academic_course2">
				      <option value="">Select</option>
				      
				      <option  >Loaded from DB</option>
			        </select>
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input8" id="input8" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="" id="" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input" id="input" class="form-control" />
				    </span></td>
				  <td><span class="input-group">
				    <select class="form-control" name="academic_course" id="academic_course">
				      <option value="">Select</option>
				      <option  >Low</option>
                      <option  >Intermediate</option>
                      <option  >Expert</option>
			        </select>
				  </span></td>
				  <td align="right">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
			    </tr>
				<tr>
					<td height="21">PHP</td>
					<td>NIIT</td>
					<td>2000</td>
					<td>2003</td>
					<td>Expert</td>
					<td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
				</tr>
			</table>
		</div>
		</div> 
		<div class="gap10"></div>
	</div>
    
    
    
    
    
    <div class="gap15"></div>
    
    <h3>Cetification Details </h3>
    
    
    <div class="gap10"></div>
    
    <div class="item1">
		 
 
		<div class="col-md-12">
		<div class="table-responsive">
			<table width="100%" class="table table-striped border">
				<tr>
				  <td>Select Certification Name</td>
				  <td>Date of Cleared</td>
				  <td align="right">&nbsp;</td>
			    </tr>
				<tr>
				  <td><span class="input-group">
				    <select class="form-control" name="academic_course2" id="academic_course2">
				      <option value="">Select</option>
				      
				      <option  >Loaded from DB</option>
			        </select>
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input8" id="input8" class="form-control" />
				  </span></td>
				  <td align="right">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
			    </tr>
				<tr>
					<td height="21">VB</td>
					<td>12/12/2015</td>
					<td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
				</tr>
			</table>
		</div>
		</div> 
		<div class="gap10"></div>
	</div>
    
    
    
    
        
    <div class="gap15"></div>
    
    <h3>Work Experienace </h3>
    
    
    <div class="gap10"></div>
    
    <div class="item1">
		 
 
		<div class="col-md-12">
		<div class="table-responsive">
			<table width="100%" class="table table-striped border">
				<tr>
				  <td>Organisation Name</td>
				  <td>Desgination</td>
				  <td>Str Date</td>
				  <td>End date</td>
				  <td align="right">&nbsp;</td>
			    </tr>
				<tr>
				  <td><span class="form-group">
				    <input type="text" name="input9" id="input9" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input10" id="input10" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="" id="" class="form-control" />
				  </span></td>
				  <td><span class="form-group">
				    <input type="text" name="input" id="input" class="form-control" />
				  </span></td>
				  <td align="right">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
			    </tr>
				<tr>
					<td height="21">CSS</td>
					<td>Trainer</td>
					<td>01/01/2014</td>
					<td>01/01/2015</td>
					<td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
				</tr>
			</table>
		</div>
		</div> 
		<div class="gap10"></div>
	</div>
    
    
    
	<div class="gap20"></div>
	<!------------>
 
			<div class="form-group">
				<label class="col-sm-5 text-right">Captcha <span class="red">*</span></label>
				<div class="col-sm-4">
					<div id="cImg"><?php include("secImage.php"); ?></div>
					<span class="errors" for="STI_imgString"></span>
				</div>
			</div>
	 
            
	<div class="gap20"></div>
	<!------------>
	<div class="item1 text-center">
		<div class="gap10"></div>
			<input type="checkbox" name="amenities" id="amenities"> 
			I confirm that I have read and agreed to <a href="#modal_terms" data-toggle="modal">Terms of Use</a> | <a href="#modal_privacy" data-toggle="modal">Privacy Policy</a> of Toople. <span class="red">*</span>
			<div class="gap1"></div>
			<span for="amenities" class="errors"></span>
		<div class="gap10"></div>
	</div>
	<!------------>
	<div class="gap30"></div>
    <div class="text-right">
	<input type="submit" class="btn btn-primary" value="Submit">
	<a href="index.php" class="btn btn-primary">Cancel</a>
    </div>
</form>
<div class="gap30"></div>
</div>
    <!--inner  /-->
  
  
  
  
<div class="gap1"></div>

</div>
</div>


<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#log").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					vendor_email: {
                                        required:true,
                                        minlength:5,
                                        email:true,
                                        },
                                        password: {
                                        required:true,
                                        minlength:6,
                                        maxlength:18,
                                        lettersnumberswithalpha:true,
                                        },
                                        first_name: {
                                        required:true,    
                                        minlength:2,
                                        lettersonly:true,
                                        },
                                        vendor_company_name: {
                                        required:true,
                                        minlength:2,
                                        },
                                        mobile_no: {
                                        required:true,
                                        digits:true,
                                        minlength:10,
                                        },
                                        city: {
                                        required:true,
                                        },
                                        vendor_about: {
                                        minlength:2,
                                        maxlength:1000,
                                        },
                                        vendor_letus: {
                                        minlength:2,
                                        },
                                        pincode: {
                                        required:true,
                                        digits:true,
					},
                                        vendor_address: {
                                        minlength:2,
                                        maxlength:1000,
                                        },

					    STI_imgString:{
                                               required:true,
                                                "remote":
                                                  {
                                                    url: 'includes/capchaValidation.php',
                                                    type: "post",
                                                    data:
                                                    {
                                                            depends: function()
                                                            {
                                                                    return $('input[name="STI_imgString"]').val();//For captcha validation
                                                            }
                                                    }
                                                  }
                                          },

                                        
                    },


				//The error message Str here

           messages: {
                 
      },
       
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>

<?php include("foot.php"); ?>

