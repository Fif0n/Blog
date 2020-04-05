CREATE TABLE blog_post (
	postID int(11) not null PRIMARY KEY AUTO_INCREMENT,
    userID int(11) not null,
    title varchar(256) not null,
    content text not null,
    imgName text not null
);