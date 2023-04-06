-- Crear la base de datos
CREATE DATABASE Formulario;

-- Seleccionar la base de datos
USE Formulario;

-- Crear la tabla para almacenar las preguntas
CREATE TABLE Preguntas (
    Id INT IDENTITY(1,1) PRIMARY KEY,
    TextoPregunta NVARCHAR(255) NOT NULL,
    TipoPregunta INT NOT NULL
);

-- Crear la tabla para almacenar las respuestas
CREATE TABLE Respuestas (
    Id INT IDENTITY(1,1) PRIMARY KEY,
    IdPregunta INT NOT NULL,
    TextoRespuesta NVARCHAR(255) NOT NULL,
    EsCorrecta BIT NOT NULL DEFAULT 0
);

-- Crear una clave foránea para relacionar las tablas Preguntas y Respuestas
ALTER TABLE Respuestas ADD CONSTRAINT FK_Respuestas_Preguntas FOREIGN KEY (IdPregunta) REFERENCES Preguntas(Id);
