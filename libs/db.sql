drop database if exists ad_posting_app;
create database ad_posting_app;
use ad_posting_app;

drop table if exists users;
create table users (
	id integer primary key auto_increment, 
	app_username varchar(32) not null,
	app_password varchar(64) not null,
	
);
