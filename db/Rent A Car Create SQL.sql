create database rent_a_car;

use rent_a_car;

create table Users(
	email varchar(50) NOT NULL UNIQUE,
    fname varchar(50),
    lname varchar(50),
    password varchar(15),
    date_of_birth date,
    address varchar(50),
    phone_number varchar(12),
    drivers_license varchar(20),
    user_type set('A','C','U'),
    primary key(email)
);

create table car(
	rego varchar(8) NOT NULL,
    manufacturer varchar(50) NOT NULL,
    car_model varchar(50) NOT NULL,
    year_manufactured year NOT NULL,
    car_type varchar(50) NOT NULL,
    rent_fee decimal(10,2),
    image varchar (50),
    booked tinyint(1) default 0,
    primary key(rego)
);

create table booking (
	booking_id int(11) auto_increment,
    rego varchar(8) NOT NULL,
    email varchar(50), 
    pick_up_date date,
    drop_off_date date,
    bstatus set('A','R','P'),
    booking_made timestamp,
    primary key (booking_id),
    foreign key(rego) references car(rego),
    foreign key(email) references users(email)
)auto_increment=1000;

create table message(
	message_id int auto_increment,
    email varchar(50) not null,
    message varchar(1000),
    primary key(message_id)
);