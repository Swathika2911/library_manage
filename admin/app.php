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
    <td height="260" align="center" valign="top"><span class="menu"><?php include('menu.php') ?> </span></td>
  </tr>
</table>
<table width="100%" border="0" style="border-top:#FFFFFF solid 3px;" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td height="53" colspan="7" align="center"><h1>View Member </h1></td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
<tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <?php
$se = "select * from application 
		inner join supplier on  supplier.supp_id = application.app_sup
		inner join tender on tender.ten_id = application.app_ten
		where ten_id = '".$_REQUEST['ten_id']."' order by app_value asc";
$fro = mysql_query($se);
$re=mysql_fetch_object($fro);
?>
      <form id="form1" name="form1" method="post" action="">
  <tr>
    <td>&nbsp;</td>
    <td width="24%" align="right">Issued Member&nbsp;:&nbsp;&nbsp;</td>
    <td width="24%">&nbsp;<strong><?php echo $re->supp_name; ?></strong>
     <input type="hidden" name="app_id" readonly="readonly" value="<?php echo $re->app_id; ?>" />
      <input type="hidden" name="sup_id" readonly="readonly" value="<?php echo $re->supp_id; ?>" />    </td>
    <td width="20%">Amount&nbsp;&nbsp;:&nbsp;&nbsp;<strong><?php echo $re->app_value; ?></strong></td>
    <td width="30%"><input value="Issue" name="submit" type="submit" class="btn"/></td>
    <td>&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
        </form>
  <tr>
     <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td width="1%" height="55" align="center">&nbsp;</td>
    <td colspan="4" align="center" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">
    
    <table width="100%" border="1">
  	<tr style="color:#FFFFFF;background-color:#333333">
    <td width="9%" height="37" align="center"><strong>Id</strong></td>
    <td width="24%" height="37" align="center"><strong>Book</strong></td>
    <td width="17%" align="center"><strong>Author</strong></td>
    <td width="13%" align="center"><strong>Due</strong></td>
    <td width="21%" align="center"><strong>Member</strong></td>
    <td width="16%" align="center"><strong>Amount</strong></td>
       </tr>
<?php
$count = 0;
$sel = "select * from application 
		inner join supplier on  supplier.supp_id = application.app_sup
		inner join tender on tender.ten_id = application.app_ten
		where ten_id = '".$_REQUEST['ten_id']."' order by app_value asc";
$from = mysql_query($sel);
while($res=mysql_fetch_object($from))
{
$count++;
?>   
    <tr>
    <td height="43" align="center"><strong><?php echo $count; ?></strong></td>
    <td height="43" align="center"><strong><?php echo $res->ten_title; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_type; ?></strong></td>
    <td align="center"><strong><?php echo $res->ten_value; ?></strong></td>
    <td align="center"><strong><?php echo $res->supp_name; ?></strong></td>
    <td align="center"><strong><?php echo $res->app_value; ?></strong></td>
    </tr>
    
<?php } ?>
  </table>    </td>
    <td width="0%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
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

$sql="update `tender` set ten_status = 'Allotted',
							ten_to = '".$_REQUEST['sup_id']."'						  
							where ten_id = '".$_REQUEST['ten_id']."'";
mysql_query($sql);


	echo "<script type='text/javascript'> alert('Allotted Successfully');</script>";

	echo "<meta http-equiv='refresh' content='0;url=view.php'>";

}

?>