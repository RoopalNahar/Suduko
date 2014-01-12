<?php
$con=mysqli_connect("localhost","root","lincolnthegod","sud_db");
// Check connection
if (mysqli_connect_errno())
	  {
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		      }
if($_GET['mode']=="easy")
{
mysqli_query($con,"INSERT INTO scoreboard_easy (name, minute, second)
		VALUES ('".$_GET['name']."',".$_GET['minute'].",".$_GET['seconds'].")");
}
elseif($_GET['mode']=="medium")
{
mysqli_query($con,"INSERT INTO scoreboard_medium (name, minute, second)
		VALUES ('".$_GET['name']."',".$_GET['minute'].",".$_GET['seconds'].")");
}
else
{
mysqli_query($con,"INSERT INTO scoreboard_hard (name, minute, second)
		VALUES ('".$_GET['name']."',".$_GET['minute'].",".$_GET['seconds'].")");
}
mysqli_close($con);
$url = "display_easy.php";
?>
