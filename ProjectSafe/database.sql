CREATE Database login_sample_db;
USE login_sample_db;
CREATE TABLE users (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    user_name varchar(100),
    password varchar(100),
    date timestamp,
    email varchar(255),
    PRIMARY KEY(id)
);