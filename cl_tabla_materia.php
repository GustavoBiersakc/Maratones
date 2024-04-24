<?php
    class CL_TABLA_MATERIA
    {
        private $id_db;
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

        public function guardar(CL_MATERIA $x)
        {
            $connect = new PDO('mysql:host=172.18.0.3;dbname=bdmaratones',$this->usuario,$this->contrasena);
            $instruccionsql = "INSERT INTO Participantes 
            (ID_participante, Nombre, Fecha_Nacimiento, Sexo, Correo_Electronico, Estado, Diciplina, Telefono, Edad) 
            VALUES (".$x->get_id_participante().",'".$x->get_nombre()."',
                    '".$x->get_fecha_nacimiento()."',
                    '".$x->get_sexo()."',
                    '".$x->get_correo_electronico()."',
                    '".$x->get_estado()."',
                    '".$x->get_disciplina()."','".$x->get_telefono()."',
                    '".$x->get_edad()."');";
            echo $instruccionsql;
            $result = $connect -> query($instruccionsql);
        }

        public function buscar(CL_MATERIA $x)
        {
            $clave;
            $clave = $x->get_clave();
            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);
            $instruccionsql = "SELECT nombre, horas_semana FROM materia WHERE clave = ".$this->clave;
            $result = $connect->query($instruccionsql);
            $x->set_nombre($result->getString("nombre"));
            $x->set_horas_semana($result("horas_semana"));
        }

        public function reporte()
        {
            $fld_clave;
            $fld_nombre;
            $fld_horas_semana;

            $archivoMaterias = fopen("arcM.txt", "w");
            fwrite($archivoMaterias, "***********************************************************************\n");
            fwrite($archivoMaterias, "*		   REPORTE DE MATERIAS REGISTRADAS		      *\n");
            fwrite($archivoMaterias, "***********************************************************************\n");
            fwrite($archivoMaterias, "*  	CLAVE    	     NOMBRE	  	 HORA SEMANA          *");

            $connect = new PDO('mysql:host=localhost;dbname='.$this->id_bd,$this->$usuario,$this->$contrasena);
            $instruccionsql = "SELECT * FROM materia ORDER BY CLAVE";
            $result = $connect->query($instruccionsql);
            while($result->next()){
                $fld_clave = $result->getString("clave");
                $fld_nombre = $result->getString("nombre");
                $fld_horas_semana = $result->getString("horas_semana");
                $linea_rpt = "  	 ".$fld_clave."    	     ".$fld_horas_semana."          *";
                fwrite($linea_rpt);
            }
            fclose($archivoMaterias);
        }

    }
?>