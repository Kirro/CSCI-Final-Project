<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../project2/project2.css" />
</head>
<?php
$username = $_POST['username'];
$password = $_POST['password'];


$connect = mysql_connect("localhost","c43726","1db23");

mysql_select_db("c43726") or die("cannot select DB");

$sql= "SELECT * FROM customers WHERE username='$username' and passwordHash=md5('$password')";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
if ($rows == 1)
{
	echo "Login successful";
}
else echo "Login Failed";
?>

</body>
</html>