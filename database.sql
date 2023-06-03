drop database workflowexamenfinal;
create database workflowexamenfinal;
use workflowexamenfinal;

create table flujo
(
    flujo varchar(3),
    proceso varchar(3),
    proceso_siguiente varchar(3),
    tipo varchar(1),
    rol varchar(15),
    pantalla varchar(30)
);

create table flujocondicional
(
    codFlujo varchar(3),
    codProceso varchar(3),
    codProcesoSi varchar(3),
    codProcesoNo varchar(3)
);

create table flujousuario
(
    numerotramite int,
    flujo varchar(3),
    proceso varchar(3),
    fecha_inicio datetime,
    fecha_fin datetime,
    usuario varchar(20)
);

-- - Para el primer flujo
INSERT INTO flujo
    VALUES('F1', 'P1', 'P2', 'I', 'administrador', 'ini_proceso_admin');

INSERT INTO flujo
    VALUES('F1', 'P2', 'P3', 'P', 'administrador', 'lista_productos');

INSERT INTO flujo
    VALUES('F1', 'P3', 'P4', 'P', 'administrador', 'formulario_producto');

INSERT INTO flujo
    VALUES('F1', 'P4', NULL, 'C', 'administrador', 'verificar_existencia_producto');

INSERT INTO flujo
    VALUES('F1', 'P5', NULL, 'C', 'administrador', 'conf_mod_prod');

INSERT INTO flujo
    VALUES('F1', 'P6', NULL, 'C', 'administrador', 'conf_eliminar_prod');

INSERT INTO flujo
    VALUES('F1', 'P7', NULL, 'F', 'site_store', 'adicion_producto');

INSERT INTO flujo
    VALUES('F1', 'P8', NULL, 'P', 'site_store', 'modificacion_producto');

INSERT INTO flujo
    VALUES('F1', 'P9', NULL, 'P', 'site_store', 'eliminacion_producto');

INSERT INTO flujocondicional
    VALUES('F1', 'P4', 'P5', 'P7');

INSERT INTO flujocondicional
    VALUES('F1', 'P5', 'P8', 'P6');

INSERT INTO flujocondicional
    VALUES('F1', 'P5', 'P5', 'P2');

-- - Para el segundo flujo

INSERT INTO flujo
    VALUES('F2', 'P1', 'P2', 'I', 'cliente', 'ini_proceso_cliente');

INSERT INTO flujo
    VALUES('F2', 'P2', 'P3', 'P', 'site_store', 'mostrar_catalogo');

INSERT INTO flujo
    VALUES('F2', 'P3', NULL, 'C', 'site_store', 'conf_compra_prod');

INSERT INTO flujo
    VALUES('F2', 'P4', NULL, 'C', 'site_store', 'verificar_compra');

INSERT INTO flujo
    VALUES('F2', 'P5', 'P6', 'F', 'site_store', 'notificar_compra');

INSERT INTO flujocondicional
    VALUES('F2', 'P3', 'P4', 'P2');

INSERT INTO flujocondicional
    VALUES('F2', 'P4', 'P5', 'P2');

INSERT INTO flujousuario
    VALUES (100, 'F1', 'P1', '2023/06/02 11:00', '2023/06/02 11:15', 'cjahuitas');

INSERT INTO flujousuario
    VALUES (101, 'F1', 'P2', '2023/06/02 11:00', Null, 'cjahuitas');

DROP DATABASE Book_Store;
CREATE DATABASE Book_Store;
use Book_Store;

-- - Para la base de datos de la tienda

CREATE TABLE Libro(
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255) NOT NULL,
    descripcion varchar(255) NOT NULL,
    autor varchar(255) NOT NULL,
    editorial varchar(50) NOT NULL,
    PRIMARY KEY(id)
    /* no hay como tal un atributo imagen de portada 
     ya vamos a considerar el hecho de que el nombre
     de cada imagen de portada sera:
     id + nombre + editorial el cual se almacenada en el
     directorio de img_books*/
);


INSERT INTO Libro VALUES (1, "La Naranja Mecanica", "Libro acerca de la ultra violencia", "Anthony Burgess", "MINOTAURO");
INSERT INTO Libro VALUES (2, "El Padrino", "Mafia Italiana Americana", "Mario Puzo", "De Bolsillo");
INSERT INTO Libro VALUES (3, "El Siciliano", "Mafia Siciliana", "Mario Puzo", "De Bolsillo");
INSERT INTO Libro VALUES (4, "La Parabola de Pablo", "La vida de Pablo Emilio Escobar Gaviria", "Alonso Salazar", "Planeta Columbiana");


CREATE TABLE Usuario(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    rol varchar(255) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO Usuario VALUES(1, "jlegua", md5("password123"), "administrador");
INSERT INTO Usuario VALUES(2, "djcq301", md5("password123"), "administrador");
INSERT INTO Usuario VALUES(3, "cjahuitas", md5("password123"), "cliente");
INSERT INTO Usuario VALUES(4, "mariadb", md5("password123"), "cliente");
INSERT INTO Usuario VALUES(5, "sofiacr", md5("password123"), "cliente");


