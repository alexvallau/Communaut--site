<?php
	//Session
	session_start();
	
	//BDD
	include 'db.php';
	
	//Modèle

	include './model/votenumber_model.php';
	include './model/crypt.php';
	include './model/register.php';
	include './model/key_model.php';
	include './model/jokes.php';
	include './model/candid_model.php';
	include './model/announces_model.php';
	include './model/map_model.php';
	include './model/json_model.php';
	include './model/list_account_model.php';
	include './model/mail/test_mail.php';
	include './model/user_model.php';

	
	
	//Controller
	include './controller/action_register.php';
	include './controller/action_login.php';
	include './controller/action.php';
	include './controller/action_file.php';
	
	//Vue
	include './view/template.php';