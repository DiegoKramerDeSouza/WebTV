<?php
	if(session_id() == '') {
		session_start();
	}
	require_once "functions.php";
	
	if (isset($_POST['user']) && isset($_POST['pwd'])){
		$acu = strtolower($_POST['user']);
		$access = execLogin($acu, $_POST['pwd']);
		if(count($access) > 0){
			if(isset($access[7])){
				$_SESSION['id'] = $access[0];
				$_SESSION['matricula'] = $access[1];
				$_SESSION['nome'] = $access[2];
				$_SESSION['cod'] = $access[3];
				$_SESSION['escola'] = $access[4];
				$_SESSION['grupo'] = $access[6];
				$_SESSION['email'] = $access[7];
				$_SESSION['active'] = true;
				header("location:classroom.php");
			} else {
				header("location:logout.php");
			}
		} else {
			header("location:logout.php");
		}
	} else {
		$_SESSION['active'] = false;
		header("location:logout.php");
	}
	
?>