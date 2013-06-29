<?php include_once"scripts/connect.php"; ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO poll (id, question) VALUES (%s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Poll'], "text"));

  mysql_select_db($db, $link);
  $Result1 = mysql_query($insertSQL, $link) or die(mysql_error());

  $insertGoTo = "results.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_rs_vote = "-1";
if (isset($_GET['recordID'])) {
  $colname_rs_vote = $_GET['recordID'];
}
mysql_select_db($db, $link);
$query_rs_vote = sprintf("SELECT * FROM poll WHERE id = %s", GetSQLValueString($colname_rs_vote, "int"));
$rs_vote = mysql_query($query_rs_vote, $link) or die(mysql_error());
$row_rs_vote = mysql_fetch_assoc($rs_vote);
$totalRows_rs_vote = mysql_num_rows($rs_vote);
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Poll</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<fieldset>

	<legend>Is This Blog Useful To You</legend>
	
	<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
    
    <label>
    	<input type="radio" name="Poll" value="mootools" id="Poll_0" />
     	Very Good
     </label>
     
    <label>
    	<input type="radio" name="Poll" value="prototype" id="Poll_1" />
      	Good
    </label>
    
    <label>
    	<input type="radio" name="Poll" value="jquery" id="Poll_2" />
		Average
	</label>
	
    <label>
    	<input type="radio" name="Poll" value="spry" id="Poll_3" />
		Ok
	</label>

    <label>
    	<input type="radio" name="Poll" value="other" id="Poll_4" />
		Not That Much
	</label>

    <input type="submit" name="submit" id="submit" value="Vote" />
    
	<input type="hidden" name="id" value="form1" />
	
	<input type="hidden" name="MM_insert" value="form1" />
</form>

</fieldset>

</body>
</html>


<?php
mysql_free_result($rs_vote);
?>
