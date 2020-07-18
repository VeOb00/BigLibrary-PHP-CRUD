drop database if exists cr10_vedrana_biglibrary;
create database if not exists cr10_vedrana_biglibrary;

use cr10_vedrana_biglibrary;

create table media(
id int not null auto_increment,
title varchar(250) not null,
subtitle varchar(250),
author_fn varchar(50),
author_ln varchar(50),
band_name varchar(50),
media_type varchar(20) not null,
description varchar(6000),
publisher varchar(150) not null,
publisher_address varchar(250),
publisher_size enum('big', 'medium', 'small'),
date_published date not null,
availability boolean,
image varchar(250) not null default 'generic_cover.jpg',
isbn13 varchar(14),
stars varchar(250),
primary key (id)
);
