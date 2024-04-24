<?php
    class CL_INTERFAZ01
    {
        private $interfaz;

        public function mostrar()
        {
            $this->interfaz=file_get_contents('../HTML_INTERFAZ/form_01.html');
            echo $this->interfaz;
        }
    }
?>