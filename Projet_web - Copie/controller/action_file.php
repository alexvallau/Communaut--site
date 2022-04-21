
 <?php
// Vérifier si le formulaire a été soumis

    // Vérifie si le fichier a été uploadé sans erreur.

    if( isset($_POST['candimail']) && isset($_POST['candimail'])){
        
    if(strlen($_POST['candimail']) < 4 ){
        header('location: index.php?page=candiduser&mailerror');
    }
    elseif(isset($_FILES["lettreMotiv"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array('.pdf', '.PDF');
        $filename = $_FILES["lettreMotiv"]["name"];
        $filetype = strrchr($filename,'.');
        $filesize = $_FILES["lettreMotiv"]["size"];
        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        if(verifyMailAldreadyExists($_POST['candimail'])){header('location: index.php?page=candiduser&mailalrsbdd');}
        // Vérifie le type MIME du fichier
       elseif(in_array($filetype, $allowed)){
           $keygen = strval(getKey());
           $newName = $keygen.".pdf";
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("upload/" . $_FILES["lettreMotiv"]["name"])){
                echo $_FILES["lettreMotiv"]["name"] . " existe déjà.";
            } else{

                move_uploaded_file($_FILES["lettreMotiv"]["tmp_name"], "candidfolder/" .$newName);
                insert_candid($_POST['candimail'], $newName);
                header('location: index.php?page=candidaturevalide');
                echo "Votre fichier a été téléchargé avec succès.";
            } 
        } else{
            header('location: index.php?page=candiduser&badformat'); 
        }
    } else{
        echo "Error: " . $_FILES["lettreMotiv"]["error"];
        header('location: index.php?page=candiduser&fileerror'); 
    }
}




?>