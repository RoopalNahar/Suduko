<html>
<head>
<link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
<h1 class="score">Scoreboard</h1>
<a href="index.php"><button class="but">Back</button></a>
<div class="nav">
<ul>
	<li><a href="display_easy.php">Easy</a></li>
	<li><a href="display_medium.php">Medium</a></li>
	<li><a href="display_hard.php">Hard</a></li>
</ul>
</div>
<?php
function n_dis($num)
{
	if($num<10)
		return ("0$num");
	else
		return $num;
}
function table_display($a)
{
	$con=mysqli_connect("localhost","root","lincolnthegod","sud_db");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM $a ORDER BY minute, second");
	echo '<table border="1" style="position:absolute;top:150px;left:220px;width:60%;text-align:center" cellpadding="30">
	<tr style="background-color:blue;">
	<th style="background-color:blue"><h2>Name</h2></th>
	<th><h2>Time</h2></th>
	</tr>';
	while($row = mysqli_fetch_array($result))
	{
	        echo "<tr>";
	        echo "<td>" . $row['name'] . "</td>";
	        echo "<td>" . n_dis($row['minute']) . ":" . n_dis($row['second']) . "</td>";
	        echo "</tr>";
	}
	echo "</table>"."<br>";
}
table_display("scoreboard_hard");
?>
</body>
</html>
