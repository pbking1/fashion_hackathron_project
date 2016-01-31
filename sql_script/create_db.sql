create database kent_hackathron;

use kent_hackathron;

create table material_info(
	id integer,
	brand varchar(255),
	material_name varchar(255),
	fully_fashioned varchar(255)
);

create table brand_material_quantity(
	id Integer,
	material_name varchar(255),
	what_to_do varchar(255),
	sample_reproduct varchar(255)
);

create table brand_rank(
	brand varchar(255),
	b_rank Integer
);

create table material_rank(
	material_name varchar(255),
	b_rank Integer
);

create table fully_fashion_rank(
	fully_fashioned varchar(255),
	f_rank Integer
);



insert into material_info values(123, 'nike', 'wool', 'yes');
insert into material_info values(456, 'addidas', 'nilon', 'no');
insert into material_info values(789, 'apple', 'wool', 'idonotknow');
insert into material_info values(237, 'google', 'test_material', 'no');

insert into brand_rank values('nike', 3);
insert into brand_rank values('addidas', 5);
insert into brand_rank values('apple', 1);
insert into brand_rank values('google', 9);

insert into brand_material_quantity values(123, 'wool', 'we need to recycle it', '5-1,4-3,1-5');
insert into brand_material_quantity values(456, 'nilon', 'we do not want to recycle it', '6-2,1-1');
insert into brand_material_quantity values(789, 'test', 'we need to recycle it', '4-2,9-3');

insert into material_rank values('wool', 3);
insert into material_rank values('nilon', 6);
insert into material_rank values('test_material', 1);

insert into fully_fashion_rank values('yes', 2);
insert into fully_fashion_rank values('no', 0);
insert into fully_fashion_rank values('maybe', 1);





