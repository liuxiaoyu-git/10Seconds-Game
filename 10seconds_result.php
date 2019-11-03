<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$username = trim($_POST['username']);
$code = trim($_POST['code']);
$result = trim($_POST['result']);
$second=strstr($result,':',TRUE);
$microsecond==strstr($result,':');
$gap=abs(10000-1000*(int)$second-(int)$microsecond);
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "insert into 10seconds values('".$username."-".$code."','".$result."',".$gap.")";
if ($connection->query($sql) !== TRUE) {  
	echo "发生数据库操作错误或用户".$username."已经存在";
} else {
	echo "您使用了以下信息参加本轮游戏：";
	echo "<br/>用户名：".$username;
	echo "<br/>手机后4位：".$code;
}
mysqli_close($connection);
?>
