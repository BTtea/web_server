# web_server

mysql settings:

## create new user
```
CREATE USER 'NewUser'@'%' IDENTIFIED BY 'Password';
GRANT ALL PRIVILEGES ON * . * TO 'NewUser'@'%';
quit
```

## create tables
```
create table user (
  id int auto_increment,
  name varchar(20) null,
  password VARCHAR(256) null,
  primary key (id)
) engine=InnoDB default charset=utf8;
```
