<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
error_reporting(1);
date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","admin","1234");
mysql_query("SET NAMES 'UTF8'");
mysql_select_db("water_quality");
$mr=mysql_result;
$mq=mysql_query;
$mnr=mysql_num_rows;
$mfa=mysql_fetch_array;
?>