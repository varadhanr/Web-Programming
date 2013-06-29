<?php


include_once"scripts/connect.php";

if ($_POST['parse_var'] == "new"){

        $title = $_POST['title'];
	   $contents = $_POST['contents'];
	   $author = $_POST['author'];

        $sqlcreate = mysql_query("INSERT INTO entries (date, title, contents, author)
		VALUES(now(),'$title','$contents','$author')");

        if ($sqlcreate){
            $msg = '<font color="#009900">A new article has been created.</font>';
        } else {
			$msg = '<font color="#FF0000">Problems connecting to server, please try again later.</font>';
		}
}
?>

<html >
<head>

<title>Create</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<link rel="icon" 
			type="image/png" 
			href="favicon.ico" />
			<title>Create Article</title>
<style type="text/css">

.style1 {font-size: 12px}

</style>
</head>

<body leftmargin="0">
<img src="images/create.jpg"/>
<font face="Arial, Helvetica, sans-serif">
<table width="847">
	<tr>
		<td width="100">
		<td width="735">
		<table>
			<tr>
			<td colspan="2" valign="top" height="40">
				<?php print"$msg"?> 
			<tr>
			<td width="327">
				<form action="create.php" method="post" name="new">
					<table>
						<tr>
							<td colspan="2">
								<input name="title" type="text" value="Title" size="26"/>
								<span class="small_print contents style1"> Article</span><span class="contents style1"> title<br />
								<br /></span>
						<tr>
							<td><textarea name="contents" rows="8" cols="24" >Content</textarea>
							<td valign="top"><p><span class="style1">Write your article, you will have to use html to make it look right.<br />  
   Some useful pieces of HTML are listed opposite.</span><br />
     </p>
						<tr>
							<td colspan="2">
								<span class="contents style1"><br />
								<input name="author" type="text" value="Author" size="26"/>
								Authors name
								</span><br />
								<br />
						<tr>
							<td colspan="2">
								<input name="parse_var" type="hidden" value="new" />
								<input type="submit" name="button3" id="button3" value="Submit" />
								<input type="reset" name="Reset" id="button" value="Reset" />
						</table>
					</form>
					<td width="424" valign="top">
						<table>
							<tr>
								<td>
								<table width="406" cellpadding="3" cellspacing="3">
								<tr>
								</table>

							<tr>
								<td height="27"></td>

						</table>
    
    </div></td>
</tr>
</table>
</td>
</tr>
</table>
</font>
</body>
</html>