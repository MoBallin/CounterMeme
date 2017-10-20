drop table if exists cmUsers,logs;
create table cmUsers 
(
	ID int not null auto_increment,
	
	rank enum('Newbie','Mediocre','Pro','Legend') default 'Newbie',
	fName varchar(255),
	lName varchar(255),
	email varchar(255),
	username varchar(255),
	password varchar(255),
	isAdmin boolean default 0,
	isPrivate boolean default 0,
	profilePic varchar(255),
	aboutMe varchar(255),

	primary key (ID)
);
/*
create table logs 
(
	ipAdress varchar(255),
	actioon varchar(255),
	userID int,
	timestaamp time
);

create table (ID)followers
(
	accountID int,
	followerID int,
	dateFollowed date,
	
	primary key
);
create table (ID)following
(
	userID int, 
	dateFollowed date,
	primary key (userID),
	foreign key userID references user(ID)

);


create table (ID)smackdowns 
(
	ID int auto_increment,

	mainImg varchar(255),
	orangeImg varchar(255),
	greyImg varchar(255),
	greyVotes int,
	orangeVotes int, 
	orangeTitle varchar(255),
	greyTitle varchar(255),
	category varchar(255),
	viewCount int,
	tags varchar(255),
	caption varchar(255),
	

	primary key (ID),
	foreign key userID references user(ID)
	
);
create table counters 
(
	ID int auto_increment,
	memeID int,
	smackdownID int,
	parentID int default null,

	img varchar(255),
	uVotes int,
	dVotes int,
	creationDate date,

	primary key (ID),
	foreign key (memeID) references meme(ID),
	foreign key (smackdownID) references smackdown(ID),
	foreign key (parentID) references counter(ID) 
);


create table (ID)memes 
( 
	ID int auto_increment, 
	userID int,

	img varchar(255),
	uVotes int,

	primary key (ID),
	foreign key (userID) references user(ID),
);
*/