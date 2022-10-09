create table class (
    id int(11) not null auto_increment,
    title varchar(250) not null,
    content varchar(500) not null,
    created_at datetime default current_timestamp on update current_timestamp,
    date datetime default null,
    primary key (id)
)