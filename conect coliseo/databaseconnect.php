<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "ccl83791_local";
$dbpass = "5140042mM";
$dbname = "ccl83791_prueba";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>