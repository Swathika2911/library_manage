<?php 
session_start();
include_once "../db/db.php";

if($_REQUEST['Mode']=='Edit')
{
$sel="select * from `tender` where ten_id = '".$_REQUEST['ten_id']."'";
$from=mysql_query($sel);
$res=mysql_fetch_object($from);
}
if($_REQUEST['Mode']=='Delete')
{
$sql = "DELETE FROM `tender` WHERE `ten_id` = '".$_REQUEST['ten_id']."'";
mysql_query($sql);
echo "<meta http-equiv='refresh' content='0;url=view.php'>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include('../title.php') ?></title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlxcalendar.css"></link>
	<link rel="stylesheet" type="text/css" href="../codebase/skins/dhtmlxcalendar_dhx_skyblue.css"></link>
	<script src="../codebase/dhtmlxcalendar.js"></script>
	<style>
		input#date_from, input#date_to {
			font-family: Tahoma;
			font-size: 12px;
			background-color: #fafafa;
			border: #c0c0c0 1px solid;
			width: 100px;
		}
		span.label {
			font-family: Tahoma;
			font-size: 12px;
		}
	</style>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["date_from","date_to"]);
			myCalendar.hideTime();
			// init values
			var t = new Date();
			byId("date_from").value = myCalendar.getFormatedDate(null, t);
			t.setDate(t.getDate()+10);
			byId("date_to").value = myCalendar.getFormatedDate(null, t);
		}

		function setSens(id, k) {
			// update range
			if (k == "min") {
				myCalendar.setSensitiveRange(byId(id).value, null);
			} else {
				myCalendar.setSensitiveRange(null, byId(id).value);

			}
		}
		function byId(id) {
			return document.getElementById(id);
		}
	</script>
</head>
<body onLoad="doOnLoad();">
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
    <td height="53" colspan="5" align="center"><h1>BOOK DETAILS </h1></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>

  <tr>
    <td width="22%" height="55" align="center">&nbsp;</td>
    <td width="20%" align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Department&nbsp;&nbsp;</td>
    <td width="33%" align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_title" type="text" value="<?php echo $res->ten_title; ?>" required/></td>
    <td width="25%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Title&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_dept" type="text" value="<?php echo $res->ten_dept; ?>" required/></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Author&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_type" type="text" value="<?php echo $res->ten_type; ?>" required/></td>
    <td align="center">&nbsp;</td>
  </tr><tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Volume&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_value" type="text" value="<?php echo $res->ten_value; ?>" required/></td>
    <td align="center">&nbsp;</td>
  </tr><tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Publications&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
        <input name="ten_loc" type="text" value="<?php echo $res->ten_loc; ?>" required/></td>
    <td align="center">&nbsp;</td>
  </tr><tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Publish  Date&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
<input type="text" name="date_from" id="date_from" onClick="setSens('date_to', 'max');" readonly="true" value="<?php echo $res->ten_odate; ?>">
</td>
    <td align="center">&nbsp;</td>
  </tr><tr>
    <td height="55" align="center">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">Closing Date&nbsp;&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold"><br />
      &nbsp;&nbsp;
<input type="text" name="date_to" id="date_to" onClick="setSens('date_from', 'min');" readonly="true" value="<?php echo $res->ten_cdate; ?>" >

</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="color:#000000;font-size:14px;font-weight:bold">
  <?php
	if($_REQUEST['Mode']=='Edit')
	{
	?>
    <input type="submit" name="update" value="UPDATE" class="btn">
    <?php } else { ?>
    <input type="submit" name="submit" value="SUBMIT" class="btn">
    <?php } ?> </td>
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
$sql="INSERT INTO `tender` (
					`ten_title` ,
					`ten_dept` ,
					`ten_type` ,
					`ten_value` ,
					`ten_loc` ,
					`ten_odate` ,
					`ten_cdate` ,
					`ten_user` ,
					`ten_to`,
					`ten_status`) 
					VALUES ('".$_REQUEST['ten_title']."',
							'".$_REQUEST['ten_dept']."', 
							'".$_REQUEST['ten_type']."', 
							'".$_REQUEST['ten_value']."', 
							'".$_REQUEST['ten_loc']."',
							'".$_REQUEST['date_from']."', 
							'".$_REQUEST['date_to']."', 
							'".$_SESSION['user_id']."',
							'0',
							'Pending')";
mysql_query($sql);
echo "<script type='text/x-javascript'>alert('Added Sucessfully');</script>";
echo "<meta http-equiv='refresh' content='0;url=view.php'>";
}
elseif(isset($_REQUEST['update']))
{

$sql="update `tender` set ten_title = '".$_REQUEST['ten_title']."',
						  ten_dept = '".$_REQUEST['ten_dept']."',
						  ten_type = '".$_REQUEST['ten_type']."',
						  ten_value = '".$_REQUEST['ten_value']."',
						  ten_loc = '".$_REQUEST['ten_loc']."',
						  ten_odate = '".$_REQUEST['date_from']."',
						  ten_cdate = '".$_REQUEST['date_to']."'						  
					where ten_id = '".$_REQUEST['ten_id']."'";

mysql_query($sql);
echo "<script type='text/x-javascript'>alert('Updated Sucessfully');</script>";
echo "<meta http-equiv='refresh' content='0;url=view.php'>";

}
?>