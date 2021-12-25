create table users(
	id int primary key auto_increment,
    name varchar(30) not null,
    email varchar(50) not null,
    password varchar(100) not null,
    locked boolean not null default 0,
    bitcoins int not null default 10
)