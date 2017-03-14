use ferreteria;

create table user(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50) not null,
	email varchar(255) not null,
	password varchar(60) not null,
	image varchar(255),
	active boolean not null default 1,
	created_at datetime not null
);

insert into user(name,lastname,email,password,is_active,is_admin,created_at) value ("Administrador", "","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

create table category(
	id int not null auto_increment primary key,
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
	category_id int not null,
	created_at datetime not null,
	is_active boolean not null default 1,
	stock int not null,
	constraint 'product_category_fk' foreign key (category_id) references category(id),
	foreign key (user_id) references user(id)
);

/*
person kind
1.- Client
2.- Provider
*/
create table person(
	id int not null auto_increment primary key,
	name varchar(255) not null,
	lastname varchar(50) not null,
	company varchar(50) not null,
	address1 varchar(50) not null,
	address2 varchar(50) not null,
	phone1 varchar(50) not null,
	phone2 varchar(50) not null,
	email1 varchar(50) not null,
	email2 varchar(50) not null,
	kind_person_id int not null,
	created_at datetime not null,
	foreign key (kind_person_id) references kind_person(id)
);

create table kind_person(
	id int not null auto_increment primary key,
	kind ENUM('client', 'provider') not null DEFAULT 'client'
);

create table operation_type(
	id int not null auto_increment primary key,
	operation ENUM('sale', 'purchase', 'in-box', 'out-box', 'fix') not null
);

insert into operation_type (operation) value ("sale");
insert into operation_type (operation) value ("purchase");
insert into operation_type (operation) value ("in-box");
insert into operation_type (operation) value ("out-box");
insert into operation_type (operation) value ("fix");

create table `role`(
	id int not null auto_increment primary key,
	rol ENUM('administrator', 'seller') not null
);

insert into role (rol) value ("administrator");
insert into role (rol) value ("seller");


create table `permission`(
	id int not null auto_increment primary key,
	name ENUM('sell', 'buy', 'box-cut', 'box-close', 'box-in', 'box-out', 'report'
		, 'user-create', 'user-update', 'user-delete', 'provider-create'
		, 'provider-update', 'provider-delete', 'client-create', 'client-update'
		, 'client-delete') not null
);

insert into permission (name) value ("sell");
insert into permission (name) value ("buy");
insert into permission (name) value ("box-cut");
insert into permission (name) value ("box-close");
insert into permission (name) value ("box-in");
insert into permission (name) value ("box-out");
insert into permission (name) value ("report");
insert into permission (name) value ("user-create");
insert into permission (name) value ("user-update");
insert into permission (name) value ("user-delete");
insert into permission (name) value ("provider-create");
insert into permission (name) value ("provider-update");
insert into permission (name) value ("provider-delete");
insert into permission (name) value ("client-create");
insert into permission (name) value ("client-update");
insert into permission (name) value ("client-delete");

create table `permission_role`(
	id int not null auto_increment primary key,
	role_id int not null,
	permission_id int not null,
	foreign key (role_id) references role(id),
	foreign key (permission_id) references permission(id)
);

insert into permission_role (role_id, permission_id) value (1, 1);
insert into permission_role (role_id, permission_id) value (1, 2);
insert into permission_role (role_id, permission_id) value (1, 3);
insert into permission_role (role_id, permission_id) value (1, 4);
insert into permission_role (role_id, permission_id) value (1, 5);
insert into permission_role (role_id, permission_id) value (1, 6);
insert into permission_role (role_id, permission_id) value (1, 7);
insert into permission_role (role_id, permission_id) value (1, 8);
insert into permission_role (role_id, permission_id) value (1, 9);
insert into permission_role (role_id, permission_id) value (1, 10);
insert into permission_role (role_id, permission_id) value (1, 11);
insert into permission_role (role_id, permission_id) value (1, 12);
insert into permission_role (role_id, permission_id) value (1, 13);
insert into permission_role (role_id, permission_id) value (1, 14);
insert into permission_role (role_id, permission_id) value (1, 15);
insert into permission_role (role_id, permission_id) value (1, 16);
insert into permission_role (role_id, permission_id) value (2, 1);
insert into permission_role (role_id, permission_id) value (2, 2);
insert into permission_role (role_id, permission_id) value (2, 3);
insert into permission_role (role_id, permission_id) value (2, 5);
insert into permission_role (role_id, permission_id) value (2, 6);
insert into permission_role (role_id, permission_id) value (2, 7);
insert into permission_role (role_id, permission_id) value (2, 11);
insert into permission_role (role_id, permission_id) value (2, 12);
insert into permission_role (role_id, permission_id) value (2, 13);
insert into permission_role (role_id, permission_id) value (2, 14);
insert into permission_role (role_id, permission_id) value (2, 15);
insert into permission_role (role_id, permission_id) value (2, 16);

create table `permission_user`(
	id int not null auto_increment primary key,
	user_id int not null,
	permission_id int not null,
	foreign key (user_id) references user(id),
	foreign key (permission_id) references permission(id)
);

create table `role_user`(
	id int not null auto_increment primary key,
	user_id int not null,
	role_id int not null,
	foreign key (user_id) references user(id),
	foreign key (role_id) references role(id)
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
