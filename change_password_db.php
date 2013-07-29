<?php
session_start();
include("includes/config.php");

$connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
mysql_select_db("c43726") or die("Cannot select DB");

    $old_pswd = $_REQUEST['old_pswd'];
    $new_pswd = $_REQUEST['new_pswd'];
    $con_pswd = $_REQUEST['con_pswd'];
	
	$sel_qry = "select * from  customers where id='".$_SESSION['USER_ID']."' and password='".md5($old_pswd)."'";
	$rs = mysql_query($sel_qry) or die(mysql_error());
	if (mysql_num_rows($rs) <= 0)
	{
		$_SESSION['MSG'] = "Your Old Password is incorrect! ". md5($old_pswd). $_SESSION['USER_ID'];
		header ("location: change_password.php");
	}
	else
	{
		$upd_qry = "UPDATE customers set password='".md5($new_pswd)."' where id='".$_SESSION['USER_ID']."'";
		mysql_query($upd_qry);
		$_SESSION['MSG'] = "Your Password has been changed!";
        header ("location: change_password.php");
	}