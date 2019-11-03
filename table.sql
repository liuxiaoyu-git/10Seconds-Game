mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use sampledb;

select * from 10seconds;
drop table 10seconds;  
create table 10seconds (username varchar(20) primary key, result varchar(10), gap int);
insert into 10seconds values('user1-0001', “9:925”, 75);
