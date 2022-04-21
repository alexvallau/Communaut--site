<?php

// cette fonction est utile pour récupérer l'utilisateur maladroit entrant plusieurs espaces successifs. Elle supprime tous les espaces
// et laisse 
function getRightString($string){
    $nouveau_mot="";
    $compteur_nouveau_mot=0;
	for($i = 0; $i < strlen($string); $i++){
		if($i == strlen($string) -1){
            if($string[$i] != " " ){
                $nouveau_mot.=$string[$i];
            }
            else{
                break;
            }
        }
        elseif($string[$i] == " "){
            if($i == 0){
                continue;
            }
            elseif($string[$i+1] == " "){
                continue;
            }
            elseif(strlen($nouveau_mot) == 0){
                continue;
            }
            else{
                $nouveau_mot .= $string[$i];
            }
        }
        else{
            $nouveau_mot .= $string[$i];
        }
	}
    return str_replace(" ", "+",$nouveau_mot);
}

function getLatAndLongFromAddre($address){


	$url=  "https://maps.googleapis.com/maps/api/geocode/json?address==$address&key=AIzaSyBbuGjneceLw0fHFmXgS7ZuCsbm7VVCTU4";
	$json = file_get_contents($url);
	$json = json_decode($json);
	$lat = $json->results[0]->geometry->location->lat;
	$lng = $json->results[0]->geometry->location->lng;
    //$address_number =  $json->results[0]->address_components[0]->long_name;
    $real_address=$json->results[0]->address_components[1]->long_name;
    $ville = $json->results[0]->address_components[2]->long_name;
    $status= $json->status;

    $coordinate = array(
        "lattitude" => $lat,
        "longitude" =>$lng,
        "city" =>$ville,
        "adress" => $real_address,
        "status"=> $status,
    );

    return $coordinate;
}

?>