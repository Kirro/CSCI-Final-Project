<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];


$connect = mysql_connect("localhost","c43726","1db23");
mysql_select_db("c43726") or die("cannot select DB");

$sql= "SELECT * FROM customers WHERE username='$username' and password=md5('$password')";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
if ($rows == 1)
{
    $_SESSION['MSG'] = "Welcome " . $username;
    header ("location: index.php");
}
else
{
$_SESSION['MSG'] = "Login Failed";
header ("location: index.php");
}
?>

</body>
</html>