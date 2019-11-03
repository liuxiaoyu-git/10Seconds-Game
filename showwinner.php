<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select (@rowno:= @rowno+1) AS rowno,username,result,gap from 10seconds , (SELECT @rowno:=0) as 10seconds order by gap";
$rs = $connection->query($sql);
echo "<table><tr><td>排名</td><td>抽奖人</td><td>时长</td><td>Gap</td></tr>";
while($row = mysqli_fetch_assoc($rs))
	echo "<tr><td>".$row['rowno']."</td><td>".$row['username']."</td><td>".$row['result']."</td><td>".$row['gap']."</td></tr>";
echo "</table>";                 
mysqli_close($connection);
?>
