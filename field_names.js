REGISTRATION FIELD NAMES
----------------------------
$name       = test_input($_POST["company"]);
$email      = test_input($_POST["email"]);
$phone      = test_input($_POST["phone"]);
$age        = test_input($_POST["bus_age"]);
$location   = test_input($_POST["location"]);
$p_desc     = test_input($_POST["pro_desc"]);
$pass     	= test_input($_POST["account_password"]);


INPUT SPAN CLASS="ERROR" IDs
----------------------------
email_error		$emailErr
phone_error		$phoneErr
location_error	$locationErr
pro_desc_error	$pro_descErr

hideDescError


LOGIN FIELD NAMES
----------------------------
$u_email       = test_input($_POST["user_email"]);
$u_pswd		   = test_input($_POST["user_password"]);