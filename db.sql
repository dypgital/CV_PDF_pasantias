CREATE DATABASE IF NOT EXISTS cv_app CHARACTER SET utf8mb4;
USE cv_app;

CREATE TABLE candidatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20),
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    fecha_nacimiento DATE,
    celular VARCHAR(20),
    correo VARCHAR(100),
    ciudad VARCHAR(100),
    domicilio TEXT,
    universidad VARCHAR(150),
    carrera VARCHAR(150),
    semestre VARCHAR(50),
    eventos_json JSON,
    experiencia_json JSON,
    idiomas_json JSON,
    habilidades TEXT,
    foto VARCHAR(255),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);
