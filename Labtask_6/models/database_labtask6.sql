-- Create Database
CREATE DATABASE database_labtask6;
-- Create table name users
CREATE TABLE users(
    u_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    u_name VARCHAR(100) NOT NULL,
    u_username VARCHAR(50) NOT NULL,
    u_email VARCHAR(50) NOT NULL,
    u_password VARCHAR(50) NOT NULL,
    u_gender VARCHAR(50) NOT NULL,
    u_dob VARCHAR(50) NOT NULL,
    u_pp_path VARCHAR(255) NOT NULL DEFAULT ""
);
INSERT INTO `users` (
        `u_id`,
        `u_name`,
        `u_username`,
        `u_email`,
        `u_password`,
        `u_gender`,
        `u_dob`,
        `u_pp_path`
    )
VALUES (
        NULL,
        'Mohibor Rahman',
        'mohib',
        'mohib@user.com',
        '12345678',
        'male',
        '1999-08-27',
        ''
    ),
    (
        NULL,
        'Munem AL',
        'munem',
        'munem@gmail.com',
        '87654321',
        'male',
        '2020-09-22',
        ''
    );