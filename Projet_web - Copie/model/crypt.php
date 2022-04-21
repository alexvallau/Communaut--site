<?php



	//return un mot de passe crypté
	function pwdCrypt($pwdFromForm){
	return password_hash($pwdFromForm, PASSWORD_DEFAULT);
	}


	//return un boolen 1 ou 0
	function verifyPwdFromDb($pwdFromForm,$pwdFromDb){
	return password_verify($pwdFromForm, $pwdFromDb);
	}

?>