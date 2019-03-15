<?php
class FormValidator
{

// private variables
// 
var $_errorList;

// constructor
// reset error list
function FormValidator()
{
	$this->resetErrorList();
}


// methods (private)
// 
// function to get the value of a variable (field)
function _getValue($field)
{
	global ${$field};
	return ${$field};
}

// methods (public)
//
// check whether input is empty
function isEmpty($field, $msg)  
{
	$value = $this->_getValue($field);
	if (trim($value) == "")
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}

// check whether input is a string
function isString($field, $msg)
{
	$value = $this->_getValue($field);
	if(!is_string($value))
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}
// check whether input is a number
function isNumber($field, $msg)
{
	$value = $this->_getValue($field);
	if(!is_numeric($value))
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}

// check whether input is an integer
function isInteger($field, $msg)
{
	$value = $this->_getValue($field);
	if(!is_integer($value))
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}
// check whether input is a float
function isFloat($field, $msg)
{
	$value = $this->_getValue($field);
	if(!is_float($value))
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}


// check whether input is within a valid numeric range
function isWithinRange($field, $msg, $min, $max)
{
	$value = $this->_getValue($field);
	if(!is_numeric($value) || $value < $min || $value >
	$max)
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}

// check whether Password and Confirm Password Should be same
function isPassword($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern ="/^.*(?=.{4,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}
// check whether Password and Confirm Password Should be same
function isnumberdot($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern ="/^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

//check whether input is within length or not  Example: min char and max char

function isWithinLength($field, $msg, $min, $max)
{
	$value = $this->_getValue($field);
	if(strlen($value) < $min || $value >$max)
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}

//check whether input is within length or not  Example: min char 

function isWithinLengthmin($field, $msg, $min)
{
	$value = $this->_getValue($field);
	if(strlen($value) < $min)
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
	else
	{
	return true;
	}
}


// check whether input is alphabetic
function isAlpha($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[a-zA-Z ]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

// check whether input is alphabetic
function isnumberwithspace($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[0-9 ]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}
// check whether input is alphabetic
function isnumberamount($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[0-9.]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

// check whether input is alphabetic
function isurl($field, $msg)
{
	$value = $this->_getValue($field);
	//$pattern = "/(?i)\b((?:http?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
	$pattern="/^(http:\/\/www\.|https:\/\/www\.|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}


// check whether input is letters and numbers
function islettersnumbers($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[a-zA-Z0-9 ]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

// check whether input is only letters
function isletteronly($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[a-zA-Z]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}
// check whether input is alphabetic
function isAlphaapecial($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[a-zA-Z!@#$%^&*()]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

// check whether input is alphabetic
function isAlphaNumeric($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[a-zA-Z0-9!@#$%^&*() ]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

// check whether input is a valid email address
function isEmailAddress($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern ="/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

//contact no
function isContactNo($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern ="/^([0-9-])+([+])+/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

// check whether input is letters and numbers
function isnumberplushiphenspac($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[0-9 +-]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}
function isuppercaseletter($field, $msg)
{
	$value = $this->_getValue($field);
	$pattern = "/^[A-Z ]+$/";
	if(preg_match($pattern, $value))
	{
	return true;
	}
	else
	{
	$this->_errorList[] = array("field" => $field,
	"value" => $value, "msg" => $msg);
	return false;
	}
}

//to print the msg
function print_msg($msg){
	$this->_errorList[] = array(
	"value" => $value, "msg" => $msg);
	return false;
}

// check whether any errors have occurred in validation
// returns Boolean
function isError()
{
	if (sizeof($this->_errorList) > 0)
	{
	return true;
	}
	else
	{
	return false;
	}
}

// return the current list of errors
function getErrorList()
{
	return $this->_errorList;
}

// reset the error list
function resetErrorList()
{
	$this->_errorList = array();
}
}
?>
