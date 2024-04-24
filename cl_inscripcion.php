<?php
    class CL_INSCRIPCION
    {
        private $correo_electronico;

        public function set_correo_electronico($x)
        {
            $this -> correo_electronico = $x;
        }

        public function get_correo_electronico()
        {
            return $this -> correo_electronico;
        }
    }
?>