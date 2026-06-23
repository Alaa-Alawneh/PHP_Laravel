create table users(
    id int primary key,
    username varchar(50) not null,
    email varchar(100) not null ,
    user_address text,
    phone varchar(255),
    unique (email)
);

