<?php


// Ce fichier sert à prendre toutes les données de la base de donnée et a les formater  en format json

//Ce fichier est donc à utiliser quand l'utilisateur créé une annonce afin que son fichier .json soit mit à jour.

function getCoordinateDataFromdb(){
    global $c;
    $sql = 'SELECT id ,longi, lat FROM announce';
    $result = mysqli_query($c, $sql) or die("error in selecting".mysqli_error($c));

    $array = [];
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }
    return $array;
    //file_put_contents('./data/coordinate.json', json_encode($array));
}



// cette fonction créee le fichier json voulue
function formalizeSimpleDataIntoWorkableJson($datas){

    $length = count($datas);
    $compteur = 0;
	$json="{".chr(34)."results".chr(34).":[{";
        foreach($datas as $data){
            $compteur ++;
            $json.=chr(34).$data['id'].chr(34).":";
            $json.="{".chr(34). "longitude".chr(34). ": ";
            $json.= $data['longi'];
            $json.=",";
            $json.=chr(34)."lattitude".chr(34).":";
            $json.=$data['lat'];
            if($compteur == $length){
                $json.="}";
            }
            else{
                $json.="},";
            }
        }
        $json.="}]}";

        $fp = fopen('./data/coordinate.json', 'w');
        fwrite($fp, $json);

		file_put_contents('./data/coordinate.json', $json);


    }

?>