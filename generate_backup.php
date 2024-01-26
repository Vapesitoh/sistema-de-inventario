<?php
require_once("includes/config.php");

function exportarTablaCategories($nombreDeBaseDeDatos)
{
    set_time_limit(3000);
    $nombreDeLaTabla = 'categories';

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, $nombreDeBaseDeDatos);
    $mysqli->select_db($nombreDeBaseDeDatos);
    $mysqli->query("SET NAMES 'utf8'");

    $contenido = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `" . $nombreDeBaseDeDatos . "`\r\n--\r\n\r\n\r\n";

    $esquemaDeTabla = $mysqli->query('SHOW CREATE TABLE ' . $nombreDeLaTabla);
    $filaDeTabla = $esquemaDeTabla->fetch_row();
    $contenido .= "\n\n" . $filaDeTabla[1] . ";\r\n\n";

    $datosQueContieneLaTabla = $mysqli->query('SELECT * FROM `' . $nombreDeLaTabla . '`');
    $cantidadDeCampos = $datosQueContieneLaTabla->field_count;
    $cantidadDeFilas = $mysqli->affected_rows;

    for ($i = 0, $contador = 0; $i < $cantidadDeCampos; $i++, $contador = 0) {
        while ($fila = $datosQueContieneLaTabla->fetch_row()) {
            // La primera y cada 100 veces
            if ($contador % 100 == 0 || $contador == 0) {
                $contenido .= "\nINSERT INTO " . $nombreDeLaTabla . " VALUES";
            }
            $contenido .= "\n(";
            for ($j = 0; $j < $cantidadDeCampos; $j++) {
                $fila[$j] = str_replace("\n", "\\n", addslashes($fila[$j]));
                if (isset($fila[$j])) {
                    $contenido .= '"' . $fila[$j] . '"';
                } else {
                    $contenido .= '""';
                }
                if ($j < ($cantidadDeCampos - 1)) {
                    $contenido .= ',';
                }
            }
            $contenido .= ")";
            # Cada 100...
            if ((($contador + 1) % 100 == 0 && $contador != 0) || $contador + 1 == $cantidadDeFilas) {
                $contenido .= ";";
            } else {
                $contenido .= ",";
            }
            $contador = $contador + 1;
        }
    }

    $contenido .= "\n\n\n";
    $contenido .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename('respaldo_categories_' . $nombreDeBaseDeDatos . '.sql') . '"');

    echo $contenido;
}

exportarTablaCategories(DB_NAME);
?>
