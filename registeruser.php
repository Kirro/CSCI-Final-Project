<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Blog Login</title>
    <link rel="stylesheet" type="text/css" href="../project2/project2.css" />
</head>
<body>
<?php
$username = $_POST["username"];
$email = $_POST["email"];
$author = $_POST["firstname"] . " " . $_POST["lastname"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$redirect = $_POST['redirect'];

$connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
mysql_select_db("c43726") or die("Cannot select DB");

$sql= "SELECT * FROM customers WHERE username='$username';";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
if ($rows >= 1)
    echo "Username already taken.<br>";
if ($password != $password2)
    echo "Passwords do not match.<br>";
if ($password == "")
    echo "Password cannot be empty";
if ($rows == 0 && $password == $password2 && $password != "")
{
    $sql= "SELECT * FROM customers";
    $result = mysql_query($sql);
    $rows = mysql_num_rows($result);
    $blogID = $rows + 1;
    $sql= "INSERT INTO blogs VALUES('$username','$password','$email','$name',md5('$password'),'$address','$phonenumber');";
    if (mysql_query($sql))
    {
        echo "Registration successful";
    }
    else echo "Registration failed";
}
mysql_close($connect);
?>
</body>
</html>