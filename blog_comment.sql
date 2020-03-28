create table blog_comment (
	id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    postId int(11) not null,
    commentAuthor varchar(256) not null,
    commentContent text not null
);