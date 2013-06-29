<?php
include_once"scripts/connect.php";

$sql4 = mysql_query("SELECT * FROM entries ORDER BY id DESC");
while($row = mysql_fetch_array($sql4)){ 

	$title = $row["title"];
	$id = $row["id"];
	$author = $row["author"];

	
$result .= '<tr><td width="100"><td width="40" align="left">' . $id . '</td>
<td width="50" align="center"> <div align="center">-</div></td> <td width="150" align="left">
' . $title . '
<td width="50" align="center"> <div align="center">-</div></td>
<td width="150" align="left"> ' . $author . '<br /> </td></tr>';

}
?>

<html >
<head>
<link rel="icon" 
			type="image/png" 
			href="favicon.ico" />
			
<title>All Entries</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0">
<img src="images/divide.png"/>
<br />
<div align="left">
<table>
<?php print"$result"; ?>
</table>
</div>
</body>
</html>
