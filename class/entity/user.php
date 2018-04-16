<?php 
	class user{
		private $id;
		private $matricula;
		private $nome;
		private $codescola;
		private $escola;
		private $senha;
		private $grupo;
		private $email;
		
		
		public function getid(){
			return $this->id;
		}
		public function setid($id){
			$this->id = $id;
		}
		public function getmatricula(){
			return $this->matricula;
		}
		public function setmatricula($matricula){
			$this->matricula = $matricula;
		}
		public function getnome(){
			return $this->nome;
		}
		public function setnome($nome){
			$this->nome = $nome;
		}
		public function getcodescola(){
			return $this->codescola;
		}
		public function setcodescola($codescola){
			$this->codescola = $codescola;
		}
		public function getescola(){
			return $this->escola;
		}
		public function setescola($escola){
			$this->escola = $escola;
		}
		public function getsenha(){
			return $this->senha;
		}
		public function setsenha($senha){
			$this->senha = $senha;
		}
		public function getgrupo(){
			return $this->grupo;
		}
		public function setgrupo($grupo){
			$this->grupo = $grupo;
		}
		public function getemail(){
			return $this->email;
		}
		public function setemail($email){
			$this->email = $email;
		}
		

	}
?>