<?php
	if(session_id() == '') {
		session_start();
	}
	if(isset($_SESSION['active'])){
		if($_SESSION['active'] == true){
			require_once("structure.php");
			require_once("functions.php");
	
			$currentUser = $_SESSION['name'];
			$login = base64_encode($_SESSION['id']);
			$senha = base64_encode($_SESSION['senha']);

			echo $headerHtml;

		} else {
			header("Location:logout.php");
		}
	} else {
		header("Location:login.php");
	}
 
?>
<body>
	<?php
		echo $bodyHeader;
	?>
	
	<?php
		echo $scriptsHtml;
		echo $bodyFooter;
	?>	
</body>

</html>