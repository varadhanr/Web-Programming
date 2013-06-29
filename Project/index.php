<?php 
include_once"scripts/connect.php";


if ($_GET['id']) 
{
	
     $id = $_GET['id'];

} else 
{

$sql1 = mysql_query("SELECT * FROM entries ORDER BY id DESC LIMIT 0,1 ");
while($row1 = mysql_fetch_array($sql1)){ 
$id = $row1["id"];
}
}

$id = mysql_real_escape_string($id);
$id = eregi_replace("`", "", $id);
$sql = mysql_query("SELECT * FROM entries WHERE id='$id'");

while($row = mysql_fetch_array($sql))
	{ 

	$title = $row["title"];
	$contents = $row["contents"];
	$author = $row["author"];
	$date = $row["date"];
     $date = strftime("%b %d, %y", strtotime($date));	
	
     }

$sql1 = mysql_query("SELECT * FROM entries ORDER BY id DESC LIMIT 0,1 ");
while($row1 = mysql_fetch_array($sql1))
{ 
$id2 = $row1["id"];
}

$up_1 = $id+1;
$down_1 = $id-1;

if ($id2==1) 
{
$Left_move1 = '';
$Left_move2 = '';
$right_Move1 = '';
$right_Move2 = '';

} else if ($id==1)
{

$Left_move1 = '<a href="index.php?id=' . $id2 . '"><< Latest Article</a>';
$Left_move2 ='<a href="index.php?id=' . $up_1 . '">< Next Article</a>';
$right_Move1 = '';
$right_Move2 = '';

} else if ($id==$id2){

$right_Move1 =' <a href="index.php?id=' . $down_1 . '">Previous Article ></a>';
$right_Move2 ='<a href="index.php?id=1">Oldest Article >></a>';
$Left_move1 = '';
$Left_move2 = '';

} else {

$Left_move1 = '<a href="index.php?id=' . $id2 . '"><< Latest Article</a>';
$Left_move2 ='<a href="index.php?id=' . $up_1 . '">< Next Article</a>';
$right_Move1 =' <a href="index.php?id=' . $down_1 . '">Previous Article ></a>';
$right_Move2 ='<a href="index.php?id=1">Oldest Article >></a>';
}
?>

<html >
<head>
<link rel="icon" 
			type="image/png" 
			href="favicon.ico" />
			<title>Writer's Blog-Dare to Read</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<title><?php 

print"$title"; ?></title>
<style type="text/css">

.style1 {font-size: 35px}
.style3 {font-size: 20px}
.style4 {font-size: 15px}
.style5 {font-size: 30px}
.style6 {font-size: 12px}

</style>
</head>

<body leftmargin="0">
<font face="Arial, Helvetica, sans-serif">
<div align="center">


<table width="650" >
<tr>
<td colspan="5" >
  <span class="style1"><?php 

  print"$title"; ?><br />
  </span>
  <span class="style3"><?php

   print"$date"; ?>
  </span><p></p></td>
</tr>

<tr>
<td colspan="5">
  <p><span class="style6"><?php 
  print"$contents"; ?>
  </span></p></td>
</tr>
<tr>
<td colspan="5">
  <p><span class="style5"><?php 
//This printsthe article's author.
  print"$author"; ?>
  </span></p></td>
</tr>
<tr>
<td colspan="5" >
<img src="images/divide.png" /><br /><br /></td>
</tr>
<tr>
<td width="160" align="left"><span class="style4 black"><?php 
 
print"$Left_move1"; ?></span><br /><br /></td>
  <td width="160" align="right"><span class="style4 black"><?php 
   
print"$Left_move2"; ?></span><br /><br /></td>
  <td width="10" align="right"><br /><br /></td>
  <td width="160" align="left"><span class="style4 black"><?php 
 
print"$right_Move1"; ?></span><br /><br /></td>
  <td width="160" align="right"><span class="style4 black"><?php 
 
print"$right_Move2"; ?></span><br /><br /></td>
</tr>
  
</table>
</div>
</font>
<ul id=menu>
<li><a href="create.php">Create</a></li>
<li><a href="About.php">About</a></li>
<li><a href="All.php">All Entries</a></li>
<li><a href="poll.php">Poll Vote</a></li>
</body>
</html>