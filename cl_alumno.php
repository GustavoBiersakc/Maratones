<?php
	class CL_ALUMNO
	{
		private $id;
		private $nombre;
		private $apellido1;
		private $apellido2; 
		
		public function set_id($x)
		{
			$this->id = $x;
		}
		
		public function set_nombre($x)
		{
			$this->nombre = $x;
		}
		
		public function set_apellido1($x)
		{
			$this->apellido1 = $x;
		}
		
		public function set_apellido2($x)
		{
			$this->apellido2 = $x; 
		}
		
		public function get_id()
		{
			return $this->id;
		}
		
		public function get_nombre()
		{
			return $this->nombre;
		}
		
		public function get_apellido1()
		{
			return $this->apellido1;
		}
		
		public function get_apellido2() 
		{
			return $this->apellido2;
		}
			
	}
	
?>