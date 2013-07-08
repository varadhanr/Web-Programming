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
<meta property="fb:admins"          content="100003616296047" /> 
<meta property="og:type"            content="website" /> 
<meta property="og:url"             content="http://varu.ap01.aws.af.cm/" /> 
<meta property="og:title"           content="Writer's Blog-Dare to Read" /> 
<meta property="og:image"           content="http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png" /> 
<meta property="og:description"            content="A Write's Blog" /> 

<head>

<link rel="icon" 
			type="image/jpg" 
			href="logo.jpg" />
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
<div id="content">
    <img src=final1.png />
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<font face="Arial, Helvetica, sans-serif">
<div align="center">


<table width="400" align=center >
<tr>
<td colspan="5" align=center >
  <span class="style1"><font face=verdana><?php 

  print"$title"; ?></font><br />
  </span>
  <tr>
 <td colspan=5 align=left>
  <span class="style3"><?php

   print"$date"; ?>
  </span><p></p></td>
</tr>
<tr>
<td colspan="5" align=center>
<img src="images/divide.png" /><br /><br /></td>
</tr>
<tr>
<tr>
<td colspan="5" >
  <p><span class="style4"><font face='verdana'><?php 
  print"$contents"; ?></font>
  </span></p></td>
</tr>
<tr>
<td colspan="5" align=left>
  <p><span class="style5"><font face='verdana'><?php 
 print"$author"; ?></font>
  </span></p></td>
</tr>
<tr>
<td colspan=5 align=left><div class="fb-like" data-href="http://varu.ap01.aws.af.cm" data-send="false" data-width="450" data-show-faces="true"></div>
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

<li><a href="About.php"><font face=verdana>About</font></a></li>
<li><a href="All.php"><font face=verdana>All Entries</font></a></li>
<li><a href="poll.php"><font face=verdana>Poll Archives</font></a></li>
<li><a href="video.php"><font face=verdana>Videos</font></a></li>
</body>
</html>