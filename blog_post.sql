CREATE TABLE blog_post (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    title varchar(256) not null,
    content text not null,
    author varchar(256) not null,
    imgName text not null
);