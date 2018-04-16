<?php
	require_once 'conf.php';
	class connect{
		private $user = "d2ViQ09ERTAwMDAxQXBwQ29yZQ==|OjpjMDAyMzU6OkFjY291bnQ6OmRpZWdva3JhbWVyOjpyb290Ojpqb2FvZGluaXo=";
		private $password = "d2ViQ09ERTAwMDAy|OjoxMjM0NTY3ODo6Y29kZUAxMjMhMDAxOjp3ZWJUVnIwMHQhOjpCcjE3MDNAISE=";
		private $banco = "webtv";
		private $path = "localhost";
		private $con;
		private $ac;
		private $account;
		private $ps;
		private $key;
		public function __construct(){
			$this->ac = explode("|", $this->user);
			$this->ps = explode("|", $this->password);
			$this->account = base64_decode($this->ac[1]);
			$this->account = explode("::",$this->account);
			$this->key = base64_decode($this->ps[1]);
			$this->key = explode("::", $this->key);
			
			echo $this->user . "<br />";
			echo $this->password . "<br />";
			echo "Usuario: " . $this->account[3] . " senha: " . $this->key[3] . " local: " . $this->path;
			
			$this->con = mysqli_connect($this->path, $this->account[3], $this->key[3]) or die ('Falha ao conectar à base');
			mysqli_select_db($this->con, $this->banco) or die ("Não foi possível conectar à base!");
		}
		public function getCon(){
			return $this->con;
		}
	}
?>