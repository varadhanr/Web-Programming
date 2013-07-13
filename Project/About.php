<html>
<head>

<link rel="icon" 
			type="image/jpg" 
			href="logo.jpg" />
			<title>About</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.style3 {font-size: 35px}
.style4 {font-size: 18px}
.style5 {font-size: 14px}
.style6 {font-size: 16px}
.style7 {font-size: 12px}

</style>
</head>

<body leftmargin="0">

<div align="center">
<table  width="650" >
	<tr>
		<td >
			<div align="left"><span class="style3">About</span></div> 
			<br />
	<tr>
		<td >
			<img src="images/divide.png"/><br />
	<tr>
		<td>
			<?php													//used gravatar for my blog
				$email = "varadhan198@gmail.com";
				$default = "http://en.gravatar.com/userimage/52673634/dee1fc6f391b9e90a14e7d24a05235d1.jpg";
				$size =200;
				$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
				?>
				<div style="color:white; ">
				<img src="<?php echo $grav_url; ?>" alt="Writers Blog" />
				</div>
	<tr>
		<td><font face='verdana'>Hi this is R.VARADHAN. Have created this blog for those people who want to express their views and thoughts to other people of same interest.Their views may include problems that are faced by common people in day-to-day life.So you can send those views as an article to this mail <font color=red><u>varadhan198@gmail.com</u></font> which will be published on behalf of you.Include your name and the contents of your views.</face>			
</table>
</div>

<ul id=menu>
<li><a href="index.php"><font face=verdana>Home</font></a></li>
<li><a href="All.php"><font face=verdana>All Entries</font></a></li>
<li><a href="poll.php"><font face=verdana>Poll Archives</font></a></li>
<li><a href="video.php"><font face=verdana>Videos</font></a></li>
</body>
</html>
