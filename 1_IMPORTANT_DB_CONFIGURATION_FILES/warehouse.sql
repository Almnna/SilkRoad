create table warehouse(
	id int primary key auto_increment,
    category varchar(30) not null,
    title varchar(255) not null,
    price int not null,
    quantity varchar(100) not null,
    imagename varchar(300) not null,
    unit varchar(20) not null,
    descr varchar(500)
);