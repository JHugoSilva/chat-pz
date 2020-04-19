create database chat;
create table users(
    id int auto_increment primary key,
    username varchar(50)not null,
    pass varchar(255)not null,
    loginhash varchar(32)
);
create table groups(
    id int auto_increment primary key,
    name varchar(100)not null
);
create table messages(
    id int auto_increment primary key,
    id_user int not null,
    id_group int not null,
    date_msg datetime not null,
    msg text not null
);
/**TBL TESTE**/
create table contatos(
    id int auto_increment primary key,
    nome varchar(100)not null,
    email varchar(100)not null
);