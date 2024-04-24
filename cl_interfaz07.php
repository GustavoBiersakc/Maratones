<?php
    class CL_INTERFAZ07
    {
        private $interfaz;
        
        public function mostrar()
        {
            $this->interfaz=file_get_contents('../HTML_INTERFAZ/form_07.html');
            echo $this->interfaz;
        }
    }
?>