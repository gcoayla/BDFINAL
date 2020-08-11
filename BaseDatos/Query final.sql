

  DROP TABLE IF EXISTS Sucursal;
      
  CREATE TABLE Sucursal (
    id_sucursal INT NOT   NULL,
    nombre varchar(50) NULL,
    direccion varchar(50) NULL,
    PRIMARY KEY (id_sucursal)
  );


  DROP TABLE IF EXISTS Mesa;
  		
  CREATE TABLE Mesa (
    id_mesa INT NOT  NULL,
    numero_personas INT  NULL,
    estado INT NULL,
    codigo_sucursal INT NULL,
    PRIMARY KEY (id_mesa)

  ) ;

  DROP TABLE IF EXISTS Pedido;
  		
  CREATE TABLE Pedido (
    id_pedido INT IDENTITY(1,1),  
    cantidad INT NULL,
    id_sucursal int ,
    id_platillo INT NULL,
    id_factura_factura INT NULL,
    id_mesa INT NULL,
    estado int ,
    PRIMARY KEY (id_pedido)
  );



  DROP TABLE IF EXISTS Platillo;
  		
  CREATE TABLE Platillo (
    id_platillo INT IDENTITY(1,1) ,
    nombre varchar(50) NULL,
    precio INT NULL,
    descripcion varchar(50) NULL,
    categoria varchar(50) NULL,
    activo int NULL,
    imagen varbinary(MAX) NULL,
    PRIMARY KEY (id_platillo)
  );


  DROP TABLE IF EXISTS Cliente;
  		
  CREATE TABLE Cliente (
    id_cliente INT IDENTITY(1,1),
    correo varchar(30) ,
    contrasenia varchar(30),
    nombre varchar(50) NULL,
    apellidos varchar(50) NULL,
    direccion varchar(50) NULL,
    PRIMARY KEY (id_cliente)
  );



  DROP TABLE IF EXISTS Empleado;
  		
  CREATE TABLE Empleado (
    id_empleado INT IDENTITY(1,1),
    nombre varchar(50) NULL,
    apellidos varchar(50) NULL,
    tipo INT NULL,
    hora_inicio time NULL,
    hora_fin time NULL,
    activo int , 
    PRIMARY KEY (id_empleado)
  );

  DROP TABLE IF EXISTS Factura;
  		
  CREATE TABLE Factura (
    id_factura INT IDENTITY(1,1), 
    estado int  ,
    hora time NULL,
    importe INT NULL,
    fecha date NULL,
    nombre varchar(50) NULL,
    id_empleado INT NULL,

    PRIMARY KEY (id_factura)
  );


  DROP TABLE IF EXISTS Vales;
  		
  CREATE TABLE Vales (
    id_vales INT IDENTITY(1,1),
    nombre varchar(50) NULL,
    PRIMARY KEY (id_vales)
  );



  DROP TABLE IF EXISTS Reserva;
  		
  CREATE TABLE Reserva (
    id_reserva INT IDENTITY(1,1),
    fecha date NULL,
    hora time NULL,
    n_comenzales INT NULL,
    id_cliente int ,
    PRIMARY KEY (id_reserva)
  );


  DROP TABLE IF EXISTS Tiene;
  		
  CREATE TABLE Tiene (
    id_sucursal INT NOT  NULL,
    stock INT NULL,
    id_platillos INT NOT NULL,
    PRIMARY KEY (id_sucursal, id_platillos)
  );

  DROP TABLE IF EXISTS Vale_Empleado;
      
  CREATE TABLE Vale_Empleado (
    id_vale INT NOT  NULL,
    id_empleado INT NOT NULL,
    cant INT NULL,
    fecha_ven date,
    PRIMARY KEY (id_vale,id_empleado)
  );



  ALTER TABLE Mesa ADD FOREIGN KEY (codigo_sucursal) REFERENCES Sucursal (id_sucursal) ;
  ALTER TABLE Pedido ADD FOREIGN KEY (id_platillo) REFERENCES Platillo (id_platillo);

  ALTER TABLE Pedido ADD FOREIGN KEY (id_factura_factura) REFERENCES Factura (id_factura);
  ALTER TABLE Pedido ADD FOREIGN KEY (id_mesa) REFERENCES Mesa (id_mesa);

  ALTER TABLE Factura ADD FOREIGN KEY (id_empleado) REFERENCES Empleado (id_empleado);
ALTER TABLE Reserva ADD FOREIGN KEY (id_cliente) REFERENCES Cliente (id_cliente)
ON DELETE CASCADE 
ON UPDATE CASCADE;

  ALTER TABLE Tiene  ADD FOREIGN KEY (id_platillos) REFERENCES Platillo  (id_platillo) ;
  ALTER TABLE Tiene  ADD FOREIGN KEY (id_sucursal) REFERENCES Sucursal  (id_sucursal) ;

  ALTER TABLE Vale_Empleado  ADD FOREIGN KEY (id_empleado) REFERENCES Empleado (id_empleado)
  ON DELETE CASCADE 
  ON UPDATE CASCADE ;
  ALTER TABLE Vale_Empleado  ADD FOREIGN KEY (id_vale) REFERENCES Vales  (id_vales) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE;

  ALTER TABLE Pedido ADD FOREIGN KEY (id_sucursal) REFERENCES Sucursal (id_sucursal);


INSERT INTO Sucursal VALUES (1, 'El Arequipeño', 'ASA , Calle Tacna 234 ' );
INSERT INTO Sucursal VALUES (2, 'El Limeño', 'JBR , Av. independencia 123' );
INSERT INTO Sucursal VALUES (3, 'La bala', 'CC, Calle Perú 456' );
INSERT INTO Sucursal VALUES (4, 'El Sabroso', ' MM , Calle Apurimac  678' );



INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Aji de gallina',25 , 'Aji con gallina' ,'segundo',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Lomo saltado', 20 ,'papas con cebolla' ,'segundo',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Papa a la huancayna',15, 'papa con huancayna ','entrada',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Chicharrón de chancho', 20, 'chancho ','segundo',1 );
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Arroz con Pollo',30, 'arroz verde con pollo' ,'segundo',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Arroz a la jardinera ',35,' Calle Tacna 234 ', 'segundo',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Cebiche', 40 , 'plato tipico ' ,'entrada',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Arroz a la cubana', 15 ,' arroz platano y huevo ', 'segundo',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Causa rellena',25 , 'pollo ' ,'entrada',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Anticuchos', 20 ,'papas con cebolla' ,'entrada',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Caldo de Gallina',15,'papa con huancayna ','sopa',1 );
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Caldo Blanco', 20, 'chancho ','sopa',1 );
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Moron', 40 , 'plato tipico ' ,'sopa',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Arroz con leche ',30, 'arroz verde con pollo' ,'postre',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Gelatina Natural ',35,' Calle Tacna 234 ', 'postre',1);
INSERT INTO Platillo(nombre,precio,descripcion,categoria,activo) VALUES ('Mazamorra', 15 ,' arroz platano y huevo ', 'postre',1);



INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (1, 30 , 1 );
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (2,  20 ,2 );
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (3, 30, 3 );
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (4, 20, 4);
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (1, 30, 5 );
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (2, 20,6 );
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (3,  40 , 7 );
INSERT INTO Tiene(id_sucursal ,stock ,id_platillos) VALUES (4,  20 ,8 );




INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ('Default','Default', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Juan',' Florez Huanqui', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Anita',' Mamani Champi', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Roxana',' Flores Quispe', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Manuel',' Higueras', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Roger','Mestas Chavez', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Yuber',' Velazco Paredes', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Yasiel',' Perez Vera', 1,'8:00','13:00',1);
INSERT INTO Empleado(nombre,apellidos,tipo,hora_inicio,hora_fin,activo) VALUES ( 'Edgar','Sarmiento Calisaya', 1,'8:00','13:00',1);







INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (1,  8 , 0,1);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (2,  8 , 0,2);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (3,  8 , 0,3);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (4,  8 , 0,4);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (5,  8 , 0,1);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (6,  8 , 0,2);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (7,  8 , 0,3);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (8,  8 , 0,4);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (9,  8 , 0,1);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (10,  8 , 0,2);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (11,  8 , 0,3);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (12,  8 , 0,4);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (13,  8 , 0,1);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (14,  8 , 0,2);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (15,  8 , 0,3);
INSERT INTO mesa(id_mesa,numero_personas,estado,codigo_sucursal) VALUES (16,  8 , 0,4);



INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Franco',' Anibal Lopez ','Av. Lima','1@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Ana',' Paredes Champi ','Av. Arequipa','2@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Rogel',' Flores Mango ','Av. Bolognesi','3@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Manuel',' Cari ','Av. San Andres','4@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Ronald',' Chavez ','Av. Jerusalen','5@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Juvenal',' Valencia Paredes ','Av. Chiclayo','6@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Yanitza',' Perez Chambi ','Av. Lima','7@gmail.com','123');
INSERT INTO cliente(nombre,apellidos,direccion,correo,contrasenia) VALUES ( 'Edgar','Montes Torres ','Av. Miraflores','8@gmail.com','123');





















INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (1, 'Franci',' Suni Lopez ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (2, 'Anita',' Mamani Champi ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (3, 'Roxana',' Flores Quispe ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (4, 'Manuel',' Higueras ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (5, 'Roger','Mestas Chavez ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (6, 'Yuber',' Velazco Paredes ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (7, 'Yasiel',' Perez Vera ', 1,8:00,13:00);
INSERT INTO pedido(id_pedido,cantidad,id_platillo,id_,id_factura,id_mesa) VALUES (8, 'Edgar','Sarmiento Calisaya ', 1,8:00,13:00);



INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (1, 'Franci',' Suni Lopez ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (2, 'Anita',' Mamani Champi ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (3, 'Roxana',' Flores Quispe ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (4, 'Manuel',' Higueras ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (5, 'Roger','Mestas Chavez ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (6, 'Yuber',' Velazco Paredes ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (7, 'Yasiel',' Perez Vera ', 1,8:00,13:00);
INSERT INTO factura(id_factura,hora,importe,id_,id_factura,id_mesa) VALUES (8, 'Edgar','Sarmiento Calisaya ', 1,8:00,13:00);

