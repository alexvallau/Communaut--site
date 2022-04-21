<?php

	//Choix de page
	$page = 'home';
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	
	
	//Deconnexion
	if (isset($_GET['deconnect']))
	{
		unset($_SESSION['login']);
		unset($_SESSION['admin']);
		session_destroy();
	}
	
	if (isset($_POST['filtre'])) {
		//$_SESSION['filtresession']=$_POST['filtre'];
        header('location: index.php?page=list&category='.$_POST['filtre']);
    } 



/************Annonces  ajout/suppression/inscription/desinscription**************** */


	if (isset($_SESSION['login']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['adresse'])
	 && isset($_POST['nbplace'])&& isset($_POST['price']) && isset($_POST['categorie'])&&isset($_POST['ville']) && isset($_POST['phone'])){

		/*session_start();
		$_SESSION['key'] = $_POST['key'];
		$_SESSION['title'] = $_POST['title'];
		$_SESSION['description'] = $_POST['description'];
		$_SESSION['adresse'] = $_POST['adresse'];
		$_SESSION['nbplace'] = $_POST['nbplace'];
		$_SESSION['price'] = $_POST['price'];
		$_SESSION['phone'] = $_POST['phone'];
		*/
		//enlève tous les espaces inutiles et ajoute des + entre chaques mots
		$wellFormatedAdress = getRightString($_POST['adresse']);
		$wellFormatedAdress .="+";
		$wellFormatedAdress.=  getRightString($_POST['ville']);
		//renvoie les coordonnées en fonction de l'addresse 
		$coordinates[]= getLatAndLongFromAddre($wellFormatedAdress);

		if($coordinates[0]['status'] == "OK"){
			$lattitude = $coordinates[0]['lattitude'];
		$longitude = $coordinates[0]['longitude'];
		$placerestante = $_POST['nbplace'];
		//insert l'annonce ..
        insert_announce($_SESSION['login'], $_POST['title'], $_POST['description'],
		 $longitude, $lattitude, $_POST['nbplace'],$placerestante, $_POST['price'], $_POST['categorie'], $_POST['phone']);

		 //met a jour le fichier json
		$newCoordinates = getCoordinateDataFromdb();
		formalizeSimpleDataIntoWorkableJson($newCoordinates);

        header('location: index.php?page=list');
		}else{ header('location: index.php?page=newannounce&wrongaddress');}
		
	}
	
	//cliquer sur une annonce
	if(isset($_POST['annoucebutton'])){
		header('location: index.php?page=list&announceid='.$_POST['annoucebutton']);
	}

	//s'enregistrer à une annonce

	if(isset($_GET['registertoannounce'])){
		addUserToAnnounces($_GET['registertoannounce'],$_SESSION['login']);
		header('location: index.php?page=list');
	}


	// se désinscrire d'une annonce
	if(isset($_GET['deleteUserFromAnounce'])){
		deleteRegistrationFromAnnounce($_GET['deleteUserFromAnounce'], $_SESSION['login']);
		header('Location:  index.php?page=list');
	}



	
	
	//Formulaire suppression
	if(isset($_GET['delete']))
	{
		delete_announce($_GET['delete']);
		header('location: index.php?page=list');
	}

	if(isset($_GET['delete_candid']))
	{
		delete_candid($_GET['delete_candid']);
		header('location: index.php?page=candidadmin');
	}



	/* ***********candidature*********** */




//ajoute un vote lorsque l'admin clique sur oui ou non. La valeure est prise 
//à partir du html

	if(isset($_POST['vote']) && $_SESSION['candidId'])
	{
		candid_vote($_SESSION['candidId'], $_POST['vote']);

		
		a_vote($_SESSION['candidId'],$_SESSION['admin']);
		unset($_SESSION['candidId']);
		header('location: index.php?page=candidadmin');
	}



//Gestion admins pour les comptes bannis
if(isset($_GET['banid']) && isset($_GET['banaccname']))
{
	ban_user($_GET['banid'],$_GET['banaccname']);
	header('location: index.php?page=list_account');
}

//Gestion admins pour debannir les comptes

if(isset($_GET['unbanaccname']))
{
unban_user($_GET['unbanaccname']);
header('location: index.php?page=list_account');
}



if(isset($_POST['changenumberofvoters'])){
	тормоз($_POST['changenumberofvoters']);
	header('location: index.php?page=list_account');
}