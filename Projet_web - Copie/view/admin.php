<link rel="stylesheet" href="view/css/styleinscription.css"/>


<article>


<!-- 
	<h3>Formulaire d'inscription</h3>


	<form method="post" action ="index.php">
		<?php
			if(isset($_GET['errorcle']))
			{
				echo "<p class = \"error\">Mauvaise cle</p>";
			}
		?>
		<p><Label>Cle : <input required name = "key"   <?php if (isset( $_SESSION['key'])) {echo  " value=\"".$_SESSION['key'].  "\"";}?>  /></p>
		<p><label>Nom de Compte : <input required  name="accName"   <?php if (isset( $_SESSION['accName'])) {echo  " value= \"".$_SESSION['accName']."\"";}?> /></p>
		<?php
			if(isset($_GET['errorname']))
			{
				echo "<p class = \"error\">Ce nom est déjà utilisé!</p>";
			}
		?>

		<p><label>Mot de passe : <input required type="password" name="pwd"   <?php if (isset( $_SESSION['pwd'])) {echo  "  value= \"".$_SESSION['pwd'].  "\"";}?>  /></p>
		<p><label>Mail : <input required type="email" name="mail"   <?php if (isset( $_SESSION['mail'])) {echo  "  value= \" ".$_SESSION['mail'].  "  \"  ";}?>  /></p>
		/*<?php
			if(isset($_GET['errormail']))
			{
				echo "<p class = \"error\">Email déjà utilisé!</p>";
			}
		?>
		<p><label>Adresse : <input  required name="address"   <?php if (isset( $_SESSION['address'])) {echo  "value=\"".$_SESSION['address'].  "\"";}?>  /></p>
		<p><button type="submit">S'inscrire</button></p>
	</form>
	-->
<style>
/*--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
/*-- reset --*/



</style>
			<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Connexion</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="index.php" method="post">
					
					<input class="text" type="text" name="login" placeholder="Nom de compte" required="">
			
			
					
					<input class="text" style="margin-top: 10px;" type="password" name="password" placeholder="Mot de passe" required="">
					<?php if(isset($_GET['errorconnexion'])){ echo "<p class = \"error\">Mauvais identifiant ou mot de passe.</p>";} ?>
					<?php if(isset($_GET['banned'])){ echo "<p class = \"error\">Votre compte a été banni.</p>";} ?>
				
					<input type="submit" value="Connexion">
				</form>
				<p>Vous n'avez pas de compte? <a href="index.php?page=candiduser"> Candidatez!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© All rights reserved | Design by Quentin Copin </p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->



</article>









