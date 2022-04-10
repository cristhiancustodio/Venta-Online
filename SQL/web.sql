create database entregableia;
use entregableia;
create table usuarios(
	idUsuario int primary key auto_increment not null,
    usuario varchar(30) not null unique,
    contraseña varchar(255) not null,
    nombre varchar(30) not null,
    apellido varchar(30) not null,
    ciudad varchar(30) not null,
    dni varchar(10) not null
);
create table producto(
	idProducto int primary key not null,
    marca varchar(30) not null,
    descripcion varchar(60) not null,
    precio int not null
);

create table compra(
	idUsuario int not null,
    idProducto int not null,
    cantidad int not null,
    subtotal int not null,
    constraint fk_id_usuario
    foreign key(idUsuario) references usuarios(idUsuario),
    constraint fk_id_producto
    foreign key(idProducto) references producto(idProducto)
);


-- ----------------------
-- CREATE PROCEDURE STORED
-- ----------------------

CREATE PROCEDURE usp_CrearUsuario (
in _usuario varchar(50),
in _contraseña varchar(255),
in _nombre varchar(50),
in _apellido varchar(50),
in _ciudad varchar(50),
in _dni varchar(50))
insert usuarios(usuario, contraseña, nombre, apellido, ciudad, dni) 
values (_usuario, _contraseña,_nombre,_apellido,_ciudad,_dni);

create procedure usp_verProductos()
select * from producto;

create procedure usp_verUsuario(in _usuario varchar(30))
select * from usuarios where usuario = _usuario;

create procedure usp_ListaCompras(in _idUsuario int)
select usuarios.usuario, producto.marca, producto.descripcion,compra.cantidad, producto.precio, (compra.cantidad*producto.precio) as subtotal
from producto, compra, usuarios 
where usuarios.idUsuario = compra.idUsuario  
and producto.idProducto = compra.idProducto 
and compra.idUsuario = _idUsuario;

create procedure usp_insertCompra(
in _idUsuario int,
in _idProducto int,
in _cantidad int)
insert into compra values
(_idUsuario,_idProducto,_cantidad);

create procedure usp_verUnicoProducto(in _idProducto int)
select * from producto where idProducto = _idProducto;

/* -------------------------------------------*/
/*-- procedimientos a usar 
call usp_CrearUsuario(multiples argumentos);
call usp_verProductos();
call usp_verUsuario();
call usp_verUnicoProducto(1);
call usp_ListaCompras(1);
call usp_insertCompra();*/













