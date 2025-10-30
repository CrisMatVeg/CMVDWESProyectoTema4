/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  cristian.matveg
 * Created: 30 oct. 2025
 */
CREATE DATABASE IF NOT EXISTS DBCMVDWESProyectoTema4;
USE DBCMVDWESProyectoTema4;

CREATE TABLE IF NOT EXISTS T02_Departamento (
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255) NOT NULL,
    T02_FechaCreacionDepartamento DATETIME NOT NULL,
    T02_VolumenDeNegocio FLOAT NOT NULL,
    T02_FechaBajaDepartamento DATETIME
);

CREATE USER IF NOT EXISTS 'userCMVDWESProyectoTema4'@'%' IDENTIFIED BY 'paso';
GRANT ALL PRIVILEGES ON T02_Departamento TO 'userCMVDWESProyectoTema4'@'%';
FLUSH PRIVILEGES;