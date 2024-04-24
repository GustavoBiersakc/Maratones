<?php
    class CL_INTERFAZ03
    {
        private $interfaz;
        public function mostrar()
        {
            $this->interfaz=file_get_contents('../HTML_INTERFAZ/form_03.html');
            echo $this->interfaz;
        }
    }
?>