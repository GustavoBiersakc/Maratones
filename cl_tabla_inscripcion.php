<?php
    class CL_TABLA_INSCRIPCION
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
		
        public function guardar(CL_INSCRIPCION $x)
        {
            $connect = new PDO('mysql:host=172.18.0.3;dbname=bdmaratones',$this->usuario,$this->contrasena);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $instruccionsql = "SELECT * FROM Participantes WHERE Correo_Electronico = '".$x->get_correo_electronico()."'";
            echo $instruccionsql;
            $result = $connect -> query($instruccionsql);
            if ($result->rowCount() > 0) {
                header("Location: ");
            exit;
            } else {
                echo "Participante no registrado";
            }
        }

        public function buscar(CL_INSCRIPCION $x, CL_ALUMNO $y, CL_MATERIA $z)
        {
            $fecha;
            $fecha = $x->get_fecha($x);
            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);
            $instruccionsql = "SELECT INSCRIPCION.fecha, ALUMNO.nombre, ALUMNO.apellido1, ALUMNO.apellido2, MATERIA.nombre, MATERIA.horas_semana
            FROM ALUMNO
            JOIN inscripcion ON ALUMNO.id = inscripcion.idA
            JOIN MATERIA ON onscripcion.claveM = MATERIA.clave
            WHERE inscripcion.idA = inscripcion.idA AND inscripcion.claveM = inscripcion.claveM AND inscripcion.fecha = ".$this->fecha;
            $result = $connect->query($instruccionsql);
            $x->set_fecha(resultado["fecha"]);
            $y->set_nombre(resultado["nombre"]);
            $y->set_apellido1(resultado["apellido1"]);
            $y->set_apellido2(resultado["apellido2"]);
            $z->set_nombre(resultado["nombre"]);
            $z->set_horas_semana(resultado["horas_semana"]);
            if(!$result)
            {
                die('Error en query: '.$connect->mysql_error());
            }
        }
			
        public function reporte_MTA(CL_MATERIA $x)
        {
            $fld_fecha;
            $fld_na;
            $fld_ap1;
            $fld_ap2;
            $fld_nm;
            $fld_h; 
            $fld_clave; 
            $fld_clave = $x->get_clave($x);
        
            $archivoMTA =  fopen("reporteMTA.txt", "w");
            fwrite($archivoMTA, "***********************************************************************\n");
            fwrite($archivoMTA, "*            REPORTE DE MATERIA CON SUS ALUMNOS REGISTRADOS           *\n");
            fwrite($archivoMTA, "***********************************************************************\n");
            fwrite($archivoMTA, "*  NOMBRE  APELLIDO1  APELLIDO2   MATERIA        HORAS         FECHA  *\n");	
            
            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);	
            $instruccion_sql = "SELECT ALUMNO.nombre, ALUMNO.apellido1, ALUMNO.apellido2, MATERIA.nombre, MATERIA.horas_semana,INSCRIPCION.fecha
            FROM ALUMNO JOIN inscripcion ON ALUMNO.id = inscripcion.idA JOIN MATERIA ON inscripcion.claveM = MATERIA.clave
            WHERE inscripcion.claveM = ".$this->clave; 
            $resul = $connect->query($instruccionsql);
            while($result->next()){
                $fld_na = $result->getString("nombre");
                $fld_ap1 = $result->getString("apellido1");
                $fld_ap2 = $result->getString("apellido2");
                $fld_nm = $result->getString("materia");
                $fld_h = $result->getString("horas");
                $fld_fecha = $result->getString("fecha");
                $linea_rtp = "  ".$fld_na."    ".$fld_ap1."		".$fld_ap2. "		".$fld_nm. "         ".$fld_h. "        ".$fld_fecha;
                fwrite($linea_rtp);
             }
            fclose($archivoAlumnos);
        }

        public function reporte_ATM(CL_ALUMNO $x)
        {
            $fld_fecha;
            $fld_na;
            $fld_ap1;
            $fld_ap2;
            $fld_nm;
            $fld_h;
            $fld_id;
            $fld_clave;
            $fld_id = $x->get_id($x);
            
            $archivoATM =  fopen("reporteATM.txt", "w");
            fwrite($archivoATM, "***********************************************************************\n");
            fwrite($archivoATM, "*      REPORTE DE ALUMNO CON LAS MATERIAS A LAS QUE ESTA INSCRITO     *\n");
            fwrite($archivoATM, "***********************************************************************\n");
            fwrite($archivoATM, "*  NOMBRE    APELLIDO1   APELLIDO2  CLAVE   MATERIA   HORAS    FECHA  *\n");	
            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);	
                $instruccion_sql = "SELECT ALUMNO.nombre, ALUMNO.apellido1, ALUMNO.apellido2, MATERIA.clave, MATERIA.nombre, MATERIA.horas_semana, 			INSCRIPCION.fecha
            FROM ALUMNO
            JOIN inscripcion ON ALUMNO.id = inscripcion.idA
            JOIN MATERIA ON inscripcion.claveM = MATERIA.clave
            WHERE inscripcion.idA =" .$this->id. " AND inscripcion.claveM = MATERIA.clave";
            $result = $connect->query($instruccionsql);
            while($result->next()){
                $fld_na = $result->getString("nombre");
                $fld_ap1 = $result->getString("apellido1");
                $fld_ap2 = $result->getString("apellido2");
                $fld_clave = $result->getString("clave");
                $fld_nm = $result->getString("materia");
                $fld_h = $result->getString("horas");
                $fld_fecha = $result->getString("fecha");
                $linea_rtp = "  ".$fld_na."    ".$fld_ap1."		".$fld_ap2. "		".$fld_clave. "          ".$fld_nm. "        ".$fld_nm. "        ".$fld_h. "        ".$fld_fecha;
                fwrite($linea_rtp);
            }
            fclose($archivoAlumnos);
        }
    }
?>
