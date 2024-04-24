<?php
    class CL_TABLA_ALUMNO
    {
        private $id_bd;
        private $usuario;
        private $contrasena;

        public function set_id_bd($x)
        {
            $this -> id_bd = $x;
        }

        public function set_usuario($x)
        {
            $this ->usuario = $x;
        }

        public function set_contrasena($x)
        {
            $this ->contrasena = $x;
        }

        public function get_id_bd()
        {
            return $this -> id_bd;
        }

        public function get_usuario()
        {
            return $this ->usuario;
        }

        public function get_contrasena()
        {
            return $this ->contrasena;
        }

        public function guardar(CL_ALUMNO $x)
        {
            $connect = new PDO('mysql:host=localhost;dbname=bd_alumno',$this->usuario,$this->contrasena);
            $instruccionsql = "INSERT INTO ALUMNO VALUES (".$x->get_id().",'".$x->get_nombre()."','".$x->get_apellido1()."','".$x->get_apellido2()."');";
            echo $instruccionsql;
            $resul = $connect -> query($instruccionsql);
        }

        public function buscar(CL_ALUMNO $x)
        {
            $id;
            $id = get_id();
            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);
            $instruccionsql = "SELECT nombre, apellido1, apellido2 FROM alumno WHERE id = ".$this->id;
            $result = $connect->query($instruccionsql);
            $x->set_nombre($result["nombre"]);
            $x->set_apellido1($result["apellido1"]);
            $x->set_apellido2($result["apellido2"]);
            if(!$result)
            {
                die('Error en query: '.$connect->mysql_error());
            }
        }

        public function reporte()
        {
            $fld_id;
            $fld_nombre;
            $fld_apellido1;
            $fld_apellido2;

            $archivoAlumnos = fopen("arcA.txt", "w");
            fwrite($archivoAlumnos, "***********************************************************************\n");
            fwrite($archivoAlumnos, "*		   REPORTE DE ALUMNOS REGISTRADOS		      *\n");
            fwrite($archivoAlumnos, "***********************************************************************\n");
            fwrite($archivoAlumnos, "*  CLAVE    NOMBRE		APELLIDO 1		APELLIDO 2    *\n");

            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);
            $instruccionsql = "SELECT * FROM alumno ORDER BY APELLIDO1, APELLIDO2";
            $result = $connect->query($instruccionsql);
            while($result->next()){
                $fld_id = $result->getString("id");
                $fld_nombre = $result->getString("nombre");
                $fld_apellido1 = $result->getString("apellido1");
                $fld_apellido2 = $result->getString("apellido2");
                $linea_rtp = "  ".$fld_id."    ".$fld_nombre."		".$fld_apellido1. "		".$fld_apellido2;
                fwrite($linea_rtp);
            }
            fclose($archivoAlumnos);
        }
    }
?>