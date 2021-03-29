<?php
function isLoginSessionExpired() {
	$login_session_duration = 2; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["nik"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}
?>