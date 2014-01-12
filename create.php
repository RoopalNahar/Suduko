<?php
$password="gthgotohell";
//Create Connection
$con=mysqli_connect("localhost","root",$password);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";
}
else
{
	echo "Connected to MySql<br>";
}

//Create Database
$sql="CREATE DATABASE sud_db";
if (mysqli_query($con,$sql))
{
	echo "Database my_db created successfully<br>";
}
else
{
	echo "Error creating database: " . mysqli_error($con) . "<br>";
}
$con=mysqli_connect("localhost","root",$password,"sud_db");

// Create table-1
$sql="CREATE TABLE scoreboard_easy
(
PID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(PID),
name CHAR(30),
minute INT,
second INT
)";
if (mysqli_query($con,$sql))
{
	echo "Table-1 persons created successfully<br>";
}
else
{
	echo "Error creating table: " . mysqli_error($con) . "<br>";
}
//Inserting Data
mysqli_query($con,"INSERT INTO scoreboard_easy (name, minute, second)
VALUES ('Peter', 20, 20)");
mysqli_query($con,"INSERT INTO scoreboard_easy (name, minute, second)
VALUES ('Peter', 20, 20)");
mysqli_query($con,"INSERT INTO scoreboard_easy (name, minute, second)
VALUES ('Pete', 11, 1)");

$result = mysqli_query($con,"SELECT * FROM scoreboard_easy ORDER BY minute, second");
echo "<table border='1'>
<tr>
<th>PID</th>
<th>Name</th>
<th>Time</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
        echo "<tr>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['minute'] . ":" . $row['second'] . "</td>";
        echo "</tr>";
}
echo "</table>"."<br>";

// Create table-2
$sql="CREATE TABLE scoreboard_medium
(
PID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(PID),
name CHAR(30),
minute INT,
second INT
)";
if (mysqli_query($con,$sql))
{
	echo "Table-2 persons created successfully<br>";
}
else
{
	echo "Error creating table: " . mysqli_error($con) . "<br>";
}
//Inserting Data
mysqli_query($con,"INSERT INTO scoreboard_medium (name, minute, second)
VALUES ('Peter', 45, 20)");
mysqli_query($con,"INSERT INTO scoreboard_medium (name, minute, second)
VALUES ('Peter', 45, 20)");
mysqli_query($con,"INSERT INTO scoreboard_medium (name, minute, second)
VALUES ('Pete', 21, 1)");

$result = mysqli_query($con,"SELECT * FROM scoreboard_medium ORDER BY minute, second");
echo "<table border='1'>
<tr>
<th>PID</th>
<th>Name</th>
<th>Time</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
        echo "<tr>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['minute'] . ":" . $row['second'] . "</td>";
        echo "</tr>";
}
echo "</table>"."<br>";

// Create table-3
$sql="CREATE TABLE scoreboard_hard
(
PID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(PID),
name CHAR(30),
minute INT,
second INT
)";
if (mysqli_query($con,$sql))
{
	echo "Table-3 persons created successfully<br>";
}
else
{
	echo "Error creating table: " . mysqli_error($con) . "<br>";
}
//Inserting Data
mysqli_query($con,"INSERT INTO scoreboard_hard (name, minute, second)
VALUES ('Peter', 65, 20)");
mysqli_query($con,"INSERT INTO scoreboard_hard (name, minute, second)
VALUES ('Peter', 65, 20)");
mysqli_query($con,"INSERT INTO scoreboard_hard (name, minute, second)
VALUES ('Pete', 31, 1)");

$result = mysqli_query($con,"SELECT * FROM scoreboard_hard ORDER BY minute, second");
echo "<table border='1'>
<tr>
<th>PID</th>
<th>Name</th>
<th>Time</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
        echo "<tr>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['minute'] . ":" . $row['second'] . "</td>";
        echo "</tr>";
}
echo "</table>"."<br>";
mysqli_close($con);
?>
