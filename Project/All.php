<?php
include_once"scripts/connect.php";

$sql4 = mysql_query("SELECT * FROM entries ORDER BY id DESC");
while($row = mysql_fetch_array($sql4)){ 

	$title = $row["title"];
	$id = $row["id"];
	$author = $row["author"];

	
$result .= '<table align=center><tr><td width="100"><td width="40" align="left"><a href="index.php?id='.$id.'"><font color="red" face="verdana"><u>'.$id.'</u></font></td>
<td width="50" align="center"> <div align="center">-</div></td> <td width="150" align="left"><a href="index.php?id='.$id.'"><font color="black" face="verdana">
' . $title . '</font>
<td width="50" align="center"> <div align="center">-</div></td>
<td width="150" align="left"><a href="index.php?id='.$id.'"><font color="black" face="verdana"> ' . $author . '</font><br /> </td></tr></table>';

}
?>

<html >
<head>
<link rel="icon" 
			type="image/jpg" 
			href="logo.jpg" />
			
<title>All Entries</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0">
<table align=center>
<tr><td >
<img src="images/divide.png"/></table>
<br />
<div align="left">
<table>
<?php print"$result"; ?>
</table>
</div>

<ul id=menu>
<li><a href="index.php"><font face=verdana>Home</font></a></li>
<li><a href="About.php"><font face=verdana>About</font></a></li>
<li><a href="poll.php"><font face=verdana>Poll Archives</font></a></li>
<li><a href="video.php"><font face=verdana>Videos</font></a></li>
</body>
</html>
