<?php 
	require_once './class/entity/user.php';
	class userDAO extends user{
		private $connect;
		private $result = "";
		private $table = "user";
		private $user;
		public function __construct(){
			$this->connect = new connect();
		}
		public function getContent($id, $where, $content){
			$sql = "SELECT $content FROM $this->table WHERE $where = '$id'";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			$count = $exec->num_rows;
			if($count > 0){
				while($obj = $exec->fetch_assoc()){
					$this->result = $obj[$content];
				}
				return $this->result;
			} else {
				return false;
			}
		}
		public function login($nome, $senha){
			$user = new user();
			$sql = "SELECT * FROM $this->table WHERE nome = '$nome' AND senha = $senha";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			$count = $exec->num_rows;
			if($count > 0){
				while($obj = $exec->fetch_assoc()){
					$user->setid($obj["id"]);
					$user->setMatricula($obj["matricula"]);
					$user->setNome($obj["nome"]);
					$user->setCodescola($obj["codescola"]);
					$user->setEscola($obj["escola"]);
					$user->setSenha($obj["senha"]);
					$user->setGrupo($obj["grupo"]);
					$user->setEmail($obj["email"]);
				}
				$this->user = array($user->getid(),$user->getMatricula(),$user->getNome(),$user->getCodescola(),$user->getEscola(),$user->getSenha(),$user->getGrupo(),$user->getEmail());
				return $this->user;
			} else {
				return false;
			}
		}
		public function getEveryThing(){
			$user = new user();
			$sql = "SELECT * FROM $this->table";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			$count = $exec->num_rows;
			if($count > 0){
				$result = array();
				while($obj = $exec->fetch_assoc()){
					$user->setid($obj["id"]);
					$user->setMatricula($obj["matricula"]);
					$user->setNome($obj["nome"]);
					$user->setCodescola($obj["codeescola"]);
					$user->setEscola($obj["escola"]);
					$user->setSenha($obj["senha"]);
					$user->setGrupo($obj["grupo"]);
					$user->setEmail($obj["email"]);
					array_push($result, array($user->getid(),$user->getMatricula(),$user->getNome(),$user->getCodescola(),$user->getEscola(),$user->getSenha(),$user->getGrupo(),$user->getEmail()));
				}
				return $result;
			} else {
				return false;
			}
		}
		public function setAll($id, $where){
			$user = new user();
			$sql = "SELECT * FROM $this->table WHERE $where = '$id'";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			$count = $exec->num_rows;
			if($count > 0){
				while($obj = $exec->fetch_assoc()){
				$user->setid($obj["id"]);
				$user->setMatricula($obj["matricula"]);
				$user->setNome($obj["nome"]);
				$user->setCodescola($obj["codeescola"]);
				$user->setEscola($obj["escola"]);
				$user->setSenha($obj["senha"]);
				$user->setGrupo($obj["grupo"]);
				$user->setEmail($obj["email"]);
			}
			$this->user = array($user->getid(),$user->getMatricula(),$user->getNome(),$user->getCodescola(),$user->getEscola(),$user->getSenha(),$user->getGrupo(),$user->getEmail());
				return true;
			} else {
				return false;
			}
		}
		public function countCIC(){
			$user = new user();
			$sql = "SELECT * FROM $this->table";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			$count = $exec->num_rows;
			return $count;
		}
		public function insertCIC($setorid, $name){
			$user = new user();
			$sql = "INSERT INTO $this->table (id, Operacao_id, name) VALUES (NULL, '$setorid', '$name')";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			if($exec){
				$newid = mysqli_insert_id($this->connect->getCon());
			} else {
				$newid = false;
			}
			return $newid;
		}
		public function deleteCIC($query){
			$user = new user();
			$sql = "DELETE FROM $this->table WHERE $query";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			return $exec;
		}
		public function updateCIC($id, $setorid, $name){
			$user = new user();
			$sql = "UPDATE $this->table SET Operacao_id = '$setorid', name = '$name' WHERE $this->table.id = '$id'";
			$exec = mysqli_query($this->connect->getCon(), $sql);
			return $exec;
		}
		
		public function getuser(){
			return $this->user;
		}
		public function setuser($user){
			$this->user = $user;
		}
	}

?>