create database proyecto;
drop database proyecto;
use proyecto;

CREATE TABLE AdicionalMensaje (
	adicional_id INT AUTO_INCREMENT PRIMARY KEY,
    mensaje_adicional text
);

CREATE TABLE Direccion (
	direccion_id INT AUTO_INCREMENT PRIMARY KEY,
    provincia VARCHAR(100) NOT NULL,
    canton VARCHAR(100) NOT NULL
);

CREATE TABLE Usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido_primer VARCHAR(100) NOT NULL,
    apellido_segundo VARCHAR(100) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mensaje_adicional int,
    direccion_usuario int,
    FOREIGN KEY (mensaje_adicional) REFERENCES AdicionalMensaje(adicional_id) ON DELETE CASCADE,
    FOREIGN KEY (direccion_usuario) REFERENCES Direccion(direccion_id) ON DELETE CASCADE
);

CREATE TABLE ContactosEmergencia (
    contacto_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    relacion VARCHAR(50),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id) ON DELETE CASCADE
);

CREATE TABLE Medicamentos (
    medicamento_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    dosis VARCHAR(50),
    frecuencia VARCHAR(50),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id) ON DELETE CASCADE
);

CREATE TABLE CitasMedicas (
    cita_id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    motivo TEXT,
    medico VARCHAR(100),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id) ON DELETE CASCADE
);


CREATE TABLE Mensajes (
	mensaje_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_mensaje varchar(50),
    email_mensaje varchar(50) not null,
    mensaje text
);

-- Inserción de datos en las tablas
INSERT INTO AdicionalMensaje (mensaje_adicional) VALUES
('Usuario requiere atención especial en el servicio de emergencia.');
INSERT INTO AdicionalMensaje (mensaje_adicional) VALUES
('Usuario es alérgico a ciertos medicamentos.');
INSERT INTO AdicionalMensaje (mensaje_adicional) VALUES
('Usuario prefiere comunicarse por correo electrónico.');

INSERT INTO Direccion (provincia, canton) VALUES
('San José', 'Central');
INSERT INTO Direccion (provincia, canton) VALUES
('Alajuela', 'Atenas');
INSERT INTO Direccion (provincia, canton) VALUES
('Cartago', 'Oreamuno');

INSERT INTO Usuarios (nombre, apellido_primer, apellido_segundo, genero, email, telefono, contrasena, mensaje_adicional, direccion_usuario) VALUES
('Carlos', 'Rodriguez', 'Gomez', 'Masculino', 'carlos.rodriguez@example.com', '555-1234', 'b93de9b62eafc81a0081a1c9fdb850232d1c8c5e307173c64a07f97b4477e0ff', 1, 1);
INSERT INTO Usuarios (nombre, apellido_primer, apellido_segundo, genero, email, telefono, contrasena, mensaje_adicional, direccion_usuario) VALUES
('María', 'Fernandez', 'Lopez', 'Femenino', 'maria.fernandez@example.com', '555-5678', '2c87b36ea4285dd1621ff19ffea5e379de76a7356804c10b89da0390206228b6', 2, 2);
INSERT INTO Usuarios (nombre, apellido_primer, apellido_segundo, genero, email, telefono, contrasena, mensaje_adicional, direccion_usuario) VALUES
('Jose', 'Martinez', 'Rojas', 'Masculino', 'jose.martinez@example.com', '555-8765', '97cde8cd459be14b038a52e520c8480459a050b388dca9f3cb9c1f37bd8a406e', 3, 3);

INSERT INTO ContactosEmergencia (nombre, apellido, telefono, relacion, usuario_id) VALUES
('Ana', 'Gonzalez', '555-4321', 'Hermana', 1);
INSERT INTO ContactosEmergencia (nombre, apellido, telefono, relacion, usuario_id) VALUES
('Luis', 'Perez', '555-9876', 'Amigo', 2);
INSERT INTO ContactosEmergencia (nombre, apellido, telefono, relacion, usuario_id) VALUES
('Clara', 'Vargas', '555-6543', 'Padre', 3);

INSERT INTO Medicamentos (nombre, descripcion, dosis, frecuencia, usuario_id) VALUES
('Ibuprofeno', 'Analgésico para el dolor', '200mg', 'Cada 8 horas', 1);
INSERT INTO Medicamentos (nombre, descripcion, dosis, frecuencia, usuario_id) VALUES
('Amoxicilina', 'Antibiótico para infecciones', '500mg', 'Cada 12 horas', 2);
INSERT INTO Medicamentos (nombre, descripcion, dosis, frecuencia, usuario_id) VALUES
('Paracetamol', 'Analgésico y antipirético', '500mg', 'Cada 6 horas', 3);

INSERT INTO CitasMedicas (fecha, hora, motivo, medico, usuario_id) VALUES
('2023-10-15', '10:00:00', 'Consulta general', 'Dr. Juan Perez', 1);
INSERT INTO CitasMedicas (fecha, hora, motivo, medico, usuario_id) VALUES
('2023-11-20', '14:30:00', 'Revisión de presión arterial', 'Dra. Ana Fernandez', 2);
INSERT INTO CitasMedicas (fecha, hora, motivo, medico, usuario_id) VALUES
('2023-12-05', '09:00:00', 'Chequeo anual', 'Dr. Luis Ramirez', 3);



select * from Usuarios;
select * from CitasMedicas where usuario_id = 1;
select * from ContactosEmergencia where usuario_id = 4;
select * from Medicamentos where usuario_id = 4;
drop table Mensajes;