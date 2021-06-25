-- Creaando objetos en la base de datos
create table Usuario 
(
    ID_Usuario int PRIMARY key AUTO_INCREMENT not null,
    Nombre varchar(500),
    Apellidos varchar(1000),
    CorreoElectronico varchar(1000)
);
create table Cliente_direccion
(
    ID_Cliente_Direccion int not null PRIMARY key AUTO_INCREMENT,
    ID_Cliente int,
    Descripcion varchar(1000)
);
create table Cliente_Telefono
(
    ID_Cliente_Telefono int not null PRIMARY key AUTO_INCREMENT,
    ID_Cliente_Tipo_Telefono int,
    Descripcion varchar(15)
);
create table Cliente_Tipo_Telefono
(
    Cliente_Tipo_Telefono int not null PRIMARY key AUTO_INCREMENT,
    Descripcion varchar(150)
);