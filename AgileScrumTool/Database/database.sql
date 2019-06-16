drop database Login;
create database Login;

use Login;

create table user
(
	user_id integer auto_increment,
	user_name text,
	password text,
	user_type text,
	first_name text,
	PRIMARY KEY(user_id)
);
create table project
(
	project_id integer auto_increment,
	user_id integer,
	name text,
	product text,
	start date,
	end date,
	PRIMARY KEY(project_id)
);
create table story
(
	story_id integer auto_increment,
	user_id integer,
	project_id integer,
	project text,
	name text,
	state text,
	story_point integer,
	PRIMARY KEY(story_id)
);	
create table iteration
(
	iteration_id integer auto_increment,
	user_id integer,
	project_id integer,
	story_id integer,
	iteration_name text,
	project text,
	start_date date,
	end_date date,
	PRIMARY KEY(iteration_id)
);
create table team
(
	team_id integer auto_increment,
	user_id integer,
	name text,
	email text,
	password text,
	PRIMARY KEY(team_id)

);

create table linkuesr
(
	linkuser_id integer auto_increment,
	user_id integer,
	user_linkid integer,
	PRIMARY KEY(linkuser_id)
);