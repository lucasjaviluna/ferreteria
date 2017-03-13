create table category(
	id int not null auto_increment primary key,
	image varchar(255),
	name varchar(50) not null,
	description text not null,
	created_at datetime not null
);

create table product(
	id int not null auto_increment primary key,
	image varchar(255),
	barcode varchar(50) not null,
	name varchar(50) not null,
	description text not null,
	inventary_min int not null default 10,
	price_in float not null,
	price_out float,
	unit varchar(255) not null,
	presentation varchar(255) not null,
	user_id int not null,
	category_id int,
	created_at datetime not null,
	is_active boolean not null default 1,
	foreign key (category_id) references category(id),
	foreign key (user_id) references user(id)
);

/*
person kind
1.- Client
2.- Provider
*/
create table person(
	id int not null auto_increment primary key,
	image varchar(255) not null,
	name varchar(255) not null,
	lastname varchar(50) not null,
	company varchar(50) not null,
	address1 varchar(50) not null,
	address2 varchar(50) not null,
	phone1 varchar(50) not null,
	phone2 varchar(50) not null,
	email1 varchar(50) not null,
	email2 varchar(50) not null,
	kind int,
	created_at datetime not null
);


create table operation_type(
	id int not null auto_increment primary key,
	name varchar(50) not null
);

insert into operation_type (name) value ("sale");
insert into operation_type (name) value ("purchase");
insert into operation_type (name) value ("in-box");
insert into operation_type (name) value ("out-box");

create table `role`(
	id int not null auto_increment primary key,
	rol ENUM('user', 'client', 'provider') not null DEFAULT 'user'
);

create table box(
	id int not null auto_increment primary key,
	created_at datetime not null
);

create table sell(
	id int not null auto_increment primary key,
	person_id int ,
	user_id int ,
	operation_type_id int default 2,
	box_id int,
	foreign key (box_id) references box(id),
	foreign key (operation_type_id) references operation_type(id),
	foreign key (user_id) references user(id),
	foreign key (person_id) references person(id),
	created_at datetime not null
);

create table operation(
	id int not null auto_increment primary key,
	product_id int not null,
	quantity float not null,
  price_out float not null,
	operation_type_id int not null,
	sell_id int,
	created_at datetime not null,
	foreign key (product_id) references product(id),
	foreign key (operation_type_id) references operation_type(id),
	foreign key (sell_id) references sell(id)
);
