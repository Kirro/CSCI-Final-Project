<?php
	is_login();
?>
<script language="javascript" >
	function check_valid (th)
	{
		if (th.old_pswd.value=="")
		{
			alert ("Please Enter Old Password!");
			th.old_pswd.focus();
			th.old_pswd.select();
			return false;
		}
		if (th.new_pswd.value=="")
		{
			alert ("Please Enter New Password!");
			th.new_pswd.focus();
			th.new_pswd.select();
			return false;
		}
		if (th.con_pswd.value!=th.new_pswd.value)
		{
			alert ("Both New & Confirm Passwords do not matched!");
			th.con_pswd.focus();
			th.con_pswd.select();
			return false;
		}
//		return false;
	}
</script>

	<form action="change_password_db.php" method="post" name="fnm" onsubmit="return check_valid(this)">
		<table align="center" border="0" width="50%">
		<?php
			if ($_SESSION['MSG'] != "")
			{
		?>
				<tr>
					<td colspan="2" height="25" align="center">
						<font color="#FF0000"><?php echo $_SESSION['MSG']; ?></font>		
					</td>
				</tr>
		<?php
				$_SESSION['MSG']="";
			}
		?>
	<tr>
		<td colspan="2" height="25" align="center">
			<font size="+1" color="#993399">Change Password</font>		
		</td>
	</tr>
	<tr>
		<td width="40%" align="right">Old Password:</td>
		<td align="left">
			<input type="password" name="old_pswd" id="old_pswd" size="25"  class="user-inputbox"/>		
		</td>
	</tr>
	<tr>
		<td width="40%" align="right">New Password:</td>
		<td align="left">
			<input type="password" name="new_pswd" id="new_pswd" size="25"  class="user-inputbox"/>		
		</td>
	</tr>
	<tr>
		<td width="40%" align="right">Confirm Password:</td>
		<td align="left">
			<input type="password" name="con_pswd" id="con_pswd" size="25"  class="user-inputbox"/>		
		</td>
	</tr>
	<tr>
			<td align="right"><input type="submit" value="Submit" class="user-inputbox"/></td>
			<td>
				<input type="button" value="Cancel" onclick="window.location='index.php'" class="user-inputbox"/>			</td>
		</tr>		
</table>
	</form>

