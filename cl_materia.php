<?php
	class CL_MATERIA
	{
		private $id_participante;
		private $nombre;
		private $fecha_nacimiento;
		private $sexo;
		private $correo_electronico;
		private $estado;
		private $disciplina;
		private $telefono;
		private $edad;
		


		public function set_id_participante($x)
		{
			$this->id_participante= $x;
		}
		
		public function set_nombre($x)
		{
			$this->nombre= $x;
		}
		
		public function set_fecha_nacimiento($x)
		{
			$this->fecha_nacimiento= $x;
		}

		public function set_sexo($x)
		{
			$this->set_sexo= $x;
		}

		public function set_correo_electronico($x)
		{
			$this->correo_electronico= $x;
		}

		public function set_estado($x)
		{
			$this->estado= $x;
		}

		public function set_disciplina($x)
		{
			$this->disciplina= $x;
		}

		public function set_telefono($x)
		{
			$this->telefono= $x;
		}

		public function set_edad($x)
		{
			$this->edad= $x;
		}
		
		public function get_id_participante()
		{
			return $this->id_participante;
		}
		
		public function get_nombre()
		{
			return $this->nombre;
		}
		
		public function get_fecha_nacimiento()
		{
			return $this->fecha_nacimiento;
		}

		public function get_sexo()
		{
			return $this->sexo;
		}

		public function get_correo_electronico()
		{
			return $this->correo_electronico;
		}

		public function get_estado()
		{
			return $this->estado;
		}

		public function get_disciplina()
		{
			return $this->disciplina;
		}

		public function get_telefono()
		{
			return $this->telefono;
		}

		public function get_edad()
		{
			return $this->edad;
		}
		
	}
	
?>
	


