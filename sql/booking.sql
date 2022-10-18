create table booking (
    id int(11) not null auto_increment,
    class_id int(11) not null,
    user_id int(11) not null,
    created_at datetime default current_timestamp on update current_timestamp,
    primary key (id)
)