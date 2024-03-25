<?php 
session_start();
include_once "../db/db.php";
$sel = "select * from tender where ten_id = '".$_REQUEST['ten_id']."'";
$from = mysql_query($sel);
$res=mysql_fetch_object($from);
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
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table width="100%" border="0" style="border-top:#FFFFFF solid 3px;" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td height="53" colspan="5" align="center"><h1>Request Book </h1></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>

  <tr>
    <td width="22%" height="55" align="center">&nbsp;</td>
    <td width="20%" align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;">Department&nbsp;&nbsp;</td>
    <td width="33%" align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">&nbsp;&nbsp;
        <?php echo $res->ten_title; ?></td>
    <td width="25%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;">Title&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">&nbsp;&nbsp;
        <?php echo $res->ten_dept; ?></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;">Author&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">&nbsp;&nbsp;
       <?php echo $res->ten_type; ?></td>
    <td align="center">&nbsp;</td>
  </tr><tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;">Volume&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">&nbsp;&nbsp;
        <?php echo $res->ten_value; ?></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Amount&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_val" type="text" required/></td>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Email id&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_email" type="text" required/></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Date&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_date" type="text" required/></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">
    <input type="submit" name="submit" value="Request" class="btn">	</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
     <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
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
<?php
if(isset($_REQUEST['submit']))
{

$ten_title =$_SESSION["ten_title"];
$ten_dept =$_SESSION["ten_dept"];
$email    =$_POST["ten_email"];
$return    =$_POST["ten_date"];

$subjetc = "Book Due Alert Mail";
	$body = "Hi student return book you received from library is on due:$return";
	$headers = "From: sreesubha172005@gmail.com";
	if (mail($email, $subjetc, $body, $headers)) 
	{
    echo "Email successfully sent to $email ...";
	} else {
    echo "Email sending failed...";
    }
	
$sql="INSERT INTO `application` (`app_ten` ,
								`app_sup` ,
								`app_value`
								`email`  ) 
					VALUES ('".$_REQUEST['ten_id']."',
							'".$_SESSION['user_id']."', 
							'".$_REQUEST['ten_val']."',
							'".$_REQUEST['ten_email']."',)";
mysql_query($sql);
echo "<script type='text/x-javascript'>alert('Applied Sucessfully');</script>";
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>