<?php
	class CL_INTERFAZ15
	{
		private $interfaz;
		private $caja_texto1;
		
		public function mostrar ()
		{
			$this->interfaz=file_get_contents('../HTML_INTERFAZ/form_15.html');
			echo $this->interfaz;
		}
		public function set_caja_texto($x)
		{
			$this->caja_texto1 = $x;
		}
		public function get_caja_texto1()
		{
			$this->caja_texto1=$_POST['caja_texto1'];
			return $this->caja_texto1;
		}
		
	}

?>