<?php 
session_start();
include_once "../db/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include('../title.php') ?></title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="total">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background:url(../images/banner.png) no-repeat bottom">
  <tr>
    <td height="260" align="center" valign="top"><span style="float:left;line-height:60px;font-weight:bold;padding-left:25px;"><?php echo $_SESSION['user_name']; ?> logged in...</span><span class="menu"><?php include('menu.php') ?> </span></td>
  </tr>
</table>
<table width="100%" border="0" style="border-top:#FFFFFF solid 3px;" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="53" colspan="4" align="center"><h1>Member Details</h1></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>

  <tr>
    <td width="1%" height="55" align="center">&nbsp;</td>
    <td width="98%" align="center" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">
    
    <table width="100%" border="1">
  	<tr style="color:#FFFFFF;background-color:#333333">
    <td width="34%" height="37" align="center"><strong>Name</strong></td>
    <td width="36%" align="center">Email Id</td>
    <td width="30%" align="center"><strong>Amt Paid</strong></td>
    </tr>
<?php
$sel = "select * from tender 
		inner join application on application.app_ten = tender.ten_id
		inner join supplier on supplier.supp_id = tender.ten_to
		where ten_id = '".$_REQUEST['ten_id']."'
		order by ten_id desc";
$from = mysql_query($sel);
$res=mysql_fetch_object($from);
?>   
    <tr>
    <td height="43" align="center"><strong><?php echo $res->supp_name; ?></strong></td>
    <td align="center"><strong><?php echo $res->supp_email; ?></strong></td>
    <td align="center"><strong><?php echo $res->app_value; ?></strong></td>
    </tr>
  </table>
    
    </td>
    <td width="1%" align="center">&nbsp;</td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</form>
<table width="100%" border="0" class="table2">
  <tr>
    <td height="60" align="center"><?php include('../footer.php') ?></td>
  </tr>
</table>
</div>
</body>
</html>