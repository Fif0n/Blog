CREATE table blog_user (
	userID int(11) AUTO_INCREMENT PRIMARY key not null,
    username varchar(256) not null,
    password varchar(256) not null,
    email varchar(256) not null,
    userRank varchar(256) not null
);