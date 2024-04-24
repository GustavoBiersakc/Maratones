<?php
    class CL_INTERFAZ04
    {
        private $interfaz;
        
        public function mostrar()
        {
            $this->interfaz=file_get_contents('../HTML_INTERFAZ/form_04.html');
            echo $this->interfaz;
        }
    }
?>