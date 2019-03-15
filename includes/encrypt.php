<?php
/*
+--------------------------------------------------------------------------
|	
|   ========================================
|	Encrpt / Decrypt Class	
+--------------------------------------------------------------------------
*/

$key="tooople#@D2016";//this key is needed to encrypt and decrypt.

	function encrypt($ses,$key)
	{	//echo "Enc** ".$ses." **Enc";
		  $sesencoded = $ses;
		  $num = mt_rand(2,5);
		  for($i=1;$i<=$num;$i++)
		  {
			 $sesencoded =     base64_encode($sesencoded);
		  }
		 // $alpha_array =  array('Y','D','U','R','P','S','B','M','A','T','H');
		 $alpha_array =  array('P','E','U','R','C','S','B','M','A','T','N');
		  $sesencoded =  $sesencoded."+".$alpha_array[$num];
		  $sesencoded =  base64_encode($sesencoded);
		//echo "<br>Encryption= ".$sesencoded;
		  return $sesencoded;
	
	} // end constructor
	function decrypt($dec,$key)
	{ //echo $dec."##<br>";
	   //$alpha_array =   array('Y','D','U','R','P','S','B','M','A','T','H');
	   $alpha_array =  array('P','E','U','R','C','S','B','M','A','T','N');

	   $decoded =   base64_decode($dec); 
	   list($decoded,$letter) =   explode("+",$decoded);
	   for($i=0;$i<count($alpha_array);$i++)
	   {
	   if($alpha_array[$i] == $letter)
	   break;
	   }
	   for($j=1;$j<=$i;$j++)
	   {
		 $decoded =       base64_decode($decoded);
	   } //echo 'Return= '.$decoded."<br><br>";
		return $decoded;
   }//end of decoded function

?>
