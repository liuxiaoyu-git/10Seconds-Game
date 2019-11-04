1)oc new-project tenseconds

2)部署一个mysql
oc new-app mysql-ephemeral --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=sampledb

3)创建表
mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use sampledb;

select * from 10seconds;
drop table 10seconds;  
create table 10seconds (username varchar(20) primary key, result varchar(10), gap int);
insert into 10seconds values('user1-0001', “9:925”, 75);

4)创建应用和相关route
oc new-app https://github.com/liuxiaoyu-git/10Seconds-Game --name=tenseconds --env MYSQL_SERVICE_HOST=mysql.tenseconds.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=sampledb DATABASE_USER=openshift DATABASE_PASSWORD=password
oc expose svc tenseconds 
