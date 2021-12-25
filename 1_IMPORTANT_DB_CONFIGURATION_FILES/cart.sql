create table cart(
	id int,
    name varchar(30) not null,
    content varchar(60) not null,
	foreign key(id) references warehouse(id)
);
    