<?php
//Changes: Document must be .php to use php scripts. Field name attributes changed to match existing login scripts.
//Minor changes to match W3C standards
//Using unset and isset rather than != ""
//include("config.php");
session_start();
include("cart.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Store</title>

<link href="css/design.css" rel="stylesheet" type="text/css" />
</head>

<body >
<div class="container">
<div class="sidebar_left">
<img src="img/panther.jpg" height="200" width="200" alt="panther" align="middle"/><br/><br/>
<form action="login_attempt.php" method="post">
					<table width="178" border="0" align="center" cellpadding="0" cellspacing="0">
					
					
					<?php
						if (isset($_SESSION['MSG']))
					echo
						'<tr class="login-box-bg">
					  		<td>&nbsp;</td>
					  		<td class="error-msg" >'.$_SESSION['MSG']. '&nbsp; </td>
					  		<td>&nbsp;</td>
					  	</tr>';
                    else echo '

					<tr class="login-box-bg">
	                    <td colspan="3" height="25">
							&nbsp;&nbsp;&nbsp;&nbsp;Username :						</td>
                    </tr>
					
					<tr class="login-box-bg">
	                    <td colspan="3">
							&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="text" name="username"  id="unm" class="user-inputbox"></label>						</td>
                    </tr>
					
					<tr class="login-box-bg">
	                    <td colspan="3" height="25">
							&nbsp;&nbsp;&nbsp;&nbsp;Password :						</td>
                    </tr>
					
					<tr class="login-box-bg">
	                    <td colspan="3">
							&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="password" name="password" id="pswd" class="user-inputbox"></label>					</td>
                    </tr>
					<tr class="login-box-bg">
	                    <td colspan="3" height="5"></td>
                    </tr>
					<tr class="login-box-bg">
	                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgot_password.php" class="forget">Forgot Password?</a><br />&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php" class="forget">Register Now</a></td>
                    </tr>
					<tr class="login-box-bg">
	                    <td height="5" colspan="3"></td>
                    </tr>
					<tr class="login-box-bg">
                      <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="image"  type="image" src="img/login.jpg" /></td>
                    </tr>';?>
					
			</table>
		</form>
</div>
<div class="main_body">
<div class="frame_top"></div>
<span class="clearit">&nbsp;</span>
<div class="header">
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" id="menu">
  <tr>
    
    <td width="60" align="center" valign="middle"><a href="index.php">Home</a></td>
    <td width="62" align="center" valign="middle"><a href="about.php">About Us</a></td>
    <td width="93" align="center" valign="middle"><a href="store.php">Store</a></td>
    <td width="88" align="center" valign="middle"><a href="#">Shopping Cart</a></td>
    <td width="71" align="center" valign="middle" class="no-border"><a href="profile.php">Profile</a></td>
      </tr>
  <tr>
    
  </tr>
</table>
</div>
<div class="content">
	
	
</div>
<div class="frame_bottom"></div>
</div>
<div class="sidebar_right">
</div>
</div>
</body>
</html>
