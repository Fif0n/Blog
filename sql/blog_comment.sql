CREATE table blog_comment (
	commentID int(11) PRIMARY KEY not null AUTO_INCREMENT,
    postID int(11) not null,
    userID int(11) not null,
    content text not null
);