<?php 
session_start();
include_once "../db/db.php";

if($_REQUEST['Mode']=='Edit')
{

$sql="update `tender` set ten_status = 'Published'						  
							where ten_id = '".$_REQUEST['ten_id']."'";

mysql_query($sql);
echo "<script type='text/x-javascript'>alert('Published Sucessfully');</script>";
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
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
    <td height="260" align="center" valign="top"><span class="menu"><?php include('menu.php') ?> </span></td>
  </tr>
</table>
<table width="100%" border="0" style="border-top:#FFFFFF solid 3px;" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="53" colspan="4" align="center"><h1>BOOKS</h1></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>

  <tr>
    <td width="1%" height="55" align="center">&nbsp;</td>
    <td width="98%" align="center" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">
    
    <table width="100%" border="1">
  	<tr style="color:#FFFFFF;background-color:#333333">
    <td width="21%" height="37" align="center"><strong>Department</strong></td>
    <td width="17%" align="center"><strong>Title</strong></td>
    <td width="8%" align="center"><strong>Author</strong></td>
    <td width="9%" align="center"><strong>Volume</strong></td>
    <td width="14%" align="center"><strong>Publications</strong></td>
    <td width="10%" align="center"><strong>Issue<br />
      Date</strong></td>
    <td width="9%" align="center"><strong>Return<br />
      Date</strong></td>
    <td width="12%" align="center"><strong>Action</strong></td>
  	</tr>
<?php
$sel = "select * from tender where ten_status = 'Pending' order by ten_id desc";
$from = mysql_query($sel);
while($res=mysql_fetch_object($from))
{
?>   
    <tr>
    <td height="43" align="center"><strong><?php echo $res->ten_title; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_dept; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_type; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_value; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_loc; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_odate; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_cdate; ?></strong></td>
    <td align="center">
    <a href="index.php?ten_id=<?php echo $res->ten_id; ?>&Mode=Edit" style="text-decoration:none">
    <input type="button" value="Publish" style="width:50px"/></a>
</td>
  	</tr>
    
<?php } ?>
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