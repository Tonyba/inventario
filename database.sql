CREATE DATABASE IF NOT EXISTS inventario;
USE inventario;

CREATE TABLE productos (
    id                 int(255)  auto_increment not null,
    categoria_id       int(255)  not null,
    nombre             varchar(100) not null,
    descripcion        text,   
    precio             float(255, 2) not null,
    stock              int(255),
    imagen             varchar(255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT pk_productos_categorias FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS categorias(
    id      int(255) auto_increment not null,
    nombre  varchar(255),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDB;