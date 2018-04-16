<?php
	if(session_id() == '') {
		session_start();
	}
	require_once "./class/DAO/connect.php";
	require_once "./class/DAO/userDAO.php";

	global $userDAO;
	
	$userDAO = new userDAO();

	
	function getcount(){
		global $userDAO;
		$countUser = $userDAO->countCIC();
		$result = array("Users"=>$countUser);
		return $result;
	}
	function getAllData(){
		global $userDAO;
		$index = $userDAO->getEveryThing();
		return $index;
	}
	function execLogin($us, $pw){
		global $userDAO;
		$result = $userDAO->login($us, $pw);
		return $result;
	}
	
	//===============================================================
	//Ciclo
	//===============================================================
	function collectImagem($cicsetorId, $cichdwId){
		global $imagemDAO;
		$result = $imagemDAO->getIMGname($cicsetorId, $cichdwId);
		return $result;
	}
	function newCiclo($name, $setor, $imgs, $desc, $start, $end){
		global $cicloDAO;
		global $ciclodataDAO;
		$name = utf8_decode($name);
		$desc = utf8_decode($desc);
		$creator = $_SESSION['name'];
		$insertCiclo = $cicloDAO->insertCIC($setor, $name);
		if($insertCiclo != false){
			$insertCicloData = $ciclodataDAO->insertCICdata($insertCiclo, $imgs, $start, $end, $desc);
		} else {
			$insertCicloData = false;
		}
		return $insertCicloData;
	}
	
	function deleteCiclo($id, $dataid){
		global $cicloDAO;
		global $ciclodataDAO;
		$index = false;
		$indexA = $ciclodataDAO->deleteCICdata("id = '$dataid'");
		if($indexA != false){
			$index = $cicloDAO->deleteCIC("id = '$id'");
		} else {
			$index = false;
		}
		return $index;
	}

	function updateCiclo($id, $dataid, $name, $setorid, $imgid, $start, $end, $desc){
		global $cicloDAO;
		global $ciclodataDAO;
		$name = utf8_decode($name);
		$desc = utf8_decode($desc);
		$updateCiclo = $ciclodataDAO->updateCICdata($dataid, $id, $imgid, $start, $end, $desc);
		if($updateCiclo != false){
			$updateCicloData = $cicloDAO->updateCIC($id, $setorid, $name);
		} else {
			$updateCicloData = false;
		}
		return $updateCicloData;
	}
	//===============================================================
	
	function dateTime(){
		//Set time zone
		date_default_timezone_set("America/Sao_Paulo");
		
		//Data/Hora Atual
		$data = getdate();
		$mesPadrao = 31;
		
		$horas = $data["hours"];
		$minutos = $data["minutes"];
		$dias = $data["mday"];
		$meses = $data["mon"];
		$anos = $data["year"];
		if(strlen($horas) == 1){
			$horas = "0" . $horas;
		}
		if(strlen($minutos) == 1){
			$minutos = "0" . $minutos;
		}
		if(strlen($dias) == 1){
			$dias = "0" . $dias;
		}
		if(strlen($meses) == 1){
			$meses = "0" . $meses;
		}
		
		$dataAtual = $horas . ":" . $minutos . "|" . $dias . "-" . $meses . "-" . $anos;
		return $dataAtual;
	}
	
	
	

?>