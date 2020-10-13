<?php

include 'datosConexion.php';

class Conexion {
    function Conectar($bd){
        try{
            switch ($bd) {
                case 1:
                    $conexion = new PDO("mysql:host=".mysqlSERVER.";dbname=".mysqlDBNAME, mysqlUSER, mysqlPASS);
                    break;
                case 2:
                    $conexion = new PDO("sqlsrv:Server=".sqlsrvSERVER.";Database=".sqlsrvDBNAME, sqlsrvUSER, sqlsrvPASS);
                    break;
                case 3:
                    $conexion = new PDO("pgsql:host=".pgsqlSERVER.";port=5432;dbname=".pgsqlDBNAME, pgsqlUSER, pgsqlPASS);
                    break;
            }
            return $conexion;     
        }catch (Exception $error){
            die("El error de conexion es: ".$error->getMessage());
        }
    }
}