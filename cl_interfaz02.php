<?php
    class CL_INTERFAZ02
    {
        private $interfaz;

        public function mostrar()
        {
            $this->interfaz=file_get_contents('../HTML_INTERFAZ/form_02.html');
            echo $this->interfaz;
        }
    }
?>