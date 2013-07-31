<?php session_start();
$connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
mysql_select_db("c43726") or die("Cannot select DB");

function getItems ()
{
    if (!isset($_COOKIE['cart']))
        return false;
    else $items = explode(",",$_COOKIE['cart']);
    asort($items);
    return $items;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Online Store</title>

    <link href="css/design.css" rel="stylesheet" type="text/css" />
</head>

<body >
<div class="wrapper" id="footer">
    <div style="width:100%;"><ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li ><a href="about.php">About Us</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <?php if(isset($_SESSION['username'])) echo '<li><a href="logout.php">Logout</a></li>';?>
        </ul>
    </div>
</div>
<div class="container2">
    <div class="sidebar_left">
        <img src="img/logo.gif" height="200" width="200" alt="panther" align="middle"/><br/><br/>
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
	                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<a class="links" href="forgot_password.php">Forgot Password?</a><br />&nbsp;&nbsp;&nbsp;&nbsp;<a class="links" href="register.php">Register Now</a></td>
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
    <div class="main_body flow">
        <?php if(isset($_COOKIE['cart'])) echo $_COOKIE['cart'];?>
        <table cellspacing="20">
            <tr>
            <td>Item</td><td>Quantity</td><td>Price</td>
                <?php
                setlocale(LC_MONETARY, 'en_US');
                $connect = mysql_connect("localhost","c43726","1db23") or die("Cannot connect to DB");
                mysql_select_db("c43726") or die("Cannot select DB");
                $prices[] = null;
                $itemNames[] = null;;
                for ($i = 1; $i < 10; $i++)
                {
                $sql = "SELECT * FROM inventory WHERE itemID='$i';";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);
                $itemNames[$i] = $row['item'];
                $prices[$i] = $row['price'];
                }
                $items = getItems();
                $amount = 1;
                $next = 0;
                $totalprice = 0;
                while (!empty($items))
                {
                    $item = array_pop($items);
                    if (!empty($items))
                    {
                        $next = array_pop($items);
                        array_push($items, $next);
                    }
                    else if ($item == $next)
                        $amount++;
                    if (empty($items) || $item != $next)
                    {
                        $price = $prices[$item]*$amount;
                        $totalprice += $price;
                        echo '<tr><td>'.$itemNames[$item].'</td><td>'.$amount.'</td><td>'.money_format('%i',$price).'</td></tr>';
                        $amount = 1;
                    }
                }
                echo '<tr><td>Total Sum: '.money_format('%i',$totalprice).'</td></tr>'
                ?>
            </tr>
        </table>
        <?php if (isset($_SESSION['username']) && isset($_COOKIE['cart'])) echo '<form action="checkout.php" method=post><label><input type="submit" value="Checkout"></label><label><input type="hidden" value="0" name="price"></label></form>';?>
        <?php if (isset($_COOKIE['cart'])) echo '<form action="checkout.php" method=post><label><input type="submit" value="Cancel Order"></label><label><input type="hidden" value="0" name="cancel"></label></form>';?>
        <div class="frame_top"></div>
        <span class="clearit">&nbsp;</span>
        <div class="content">
        </div>
        <div class="frame_bottom"></div>
    </div>
    <div class="sidebar_right">
    </div>
</div>
</body>
</html>