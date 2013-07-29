<?php
include("./includes/config.php");

	$unm = $_REQUEST['unm'];
    $pswd = $_REQUEST['paswd'];
    $fnm = $_REQUEST['fnm'];
    $lnm = $_REQUEST['lnm'];
    $gender = $_REQUEST['gender'];
    $date = $_REQUEST['date'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $add = $_REQUEST['add'];
    $email = $_REQUEST['email'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $country = $_REQUEST['country'];
    $contact = $_REQUEST['contact'];
	$dob = $year."-".$month."-".$date;
    $fulladd = $add." \n".$city." ".$state.", 30047";
    $name = $fnm." ".$lnm;
    $connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
    mysql_select_db("c43726") or die("Cannot select DB");

	
	$qry1 = "select * from customers where username='".$unm."'";
	$rs1 = mysql_query($qry1);
	
	if (mysql_num_rows($rs1) > 0)
	{
		$_SESSION['msg'] = "Username not available";
		$_SESSION['tmp']=1;
		//echo "lll";
		header ("location: index.php");
	}

	
	$sql = "INSERT INTO customers VALUES ('$unm', md5('$pswd'), '$contact', '$name', '$fulladd', '$contact', '$gender');";
	$con = mysql_query($sql) or die ('cannot because: ' . mysql_error());
	
	$qry2 = "select * from customers where username='".$unm."' and password='".$pswd."'";
	$rs2 = mysql_query($qry2);
	
	if (mysql_num_rows($rs2) == 1)
	{
		$val = mysql_fetch_array($rs2);
		$_SESSION['USER_ID'] = $val['id'];
		$_SESSION['USER_NAME'] = $val['username'];
		$_SESSION['USER_EMAIL'] = $val['email'];
		
		//echo "ppp";
		header ("location: index.php");
	}
	//echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
	
	header ("location: index.php");



?>
