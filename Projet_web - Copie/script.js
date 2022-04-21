// On initialise la latitude et la longitude de Paris (centre de la carte)
var lat = 45.564601
var lon = 5.917781
//var map = null;
var marker = null;
// Fonction d'initialisation de la carte



    async function loadNames(id) {
        const response = await fetch('coordinate.json');
        const names = await response.json();
        //console.log(names.results[0][7]); 
         lon = names.results[0][id].longitude;
        lat = names.results[0][id].lattitude;
       let coordonnes = [lon, lat];
        console.log("longi:"+names.results[0][id].longitude+" Latti: "+names.results[0][id].lattitude);

        return coordonnes;
        // logs [{ name: 'Joker'}, { name: 'Batman' }]
      }


window.onload = async function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    if(testUrl()){
      let id = parseInt(getIdFromUrl());
      console.log(id);
      var myLatlng = new google.maps.LatLng(45.564601,5.917781);
      var mapOptions = {
        zoom: 10,
        center: myLatlng
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);


         console.log("av tab");
      var tablo = await loadNames(id);
   
    var longi = tablo[0];
  var lati = tablo[1];

  console.log("la lati est de "+lati+"longi est de "+longi);

  var myLatlng = new google.maps.LatLng(lati,longi);
var mapOptions = {
zoom: 15,
center: myLatlng
}

var map = new google.maps.Map(document.getElementById("map"), mapOptions);

var marker = new google.maps.Marker({
  // Nous définissons sa position (syntaxe json)
  position: {lat: lati, lng: longi},
  // Nous définissons à quelle carte il est ajouté
  map: map
});

marker.setMap(map);
//placeMarker();

    }

 
};







async function reply_click(id)
  {
    //marker.setMap(null);
    
  var tablo = await loadNames(id);
    var longi = tablo[0];
    var lati = tablo[1];

    console.log("la lati est de "+lati+"longi est de "+longi);

    var myLatlng = new google.maps.LatLng(lati,longi);
var mapOptions = {
  zoom: 15,
  center: myLatlng
}

var map = new google.maps.Map(document.getElementById("map"), mapOptions);

var marker = new google.maps.Marker({
    // Nous définissons sa position (syntaxe json)
    position: {lat: lati, lng: longi},
    // Nous définissons à quelle carte il est ajouté
    map: map
});

marker.setMap(map);
  //placeMarker();

  }

 


 
  function placeMarker(){
    var marker = new google.maps.Marker({
        // Nous définissons sa position (syntaxe json)
        position: {lat: lat, lng: lon},
        // Nous définissons à quelle carte il est ajouté
        map: map
    });
  }

  function getIdFromUrl(){
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var product = urlParams.get('announceid');
   return product;
  }

  function testUrl(){
    var fullUrl = window.location.search;

    return fullUrl.includes("?page=list&announceid=");


  }
	

/*
  

function initMap() {

    // Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
    map = new google.maps.Map(document.getElementById("map"), {
        // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
        center: new google.maps.LatLng(lat, lon), 
        // Nous définissons le zoom par défaut
        zoom: 11, 
        // Nous définissons le type de carte (ici carte routière)
        mapTypeId: google.maps.MapTypeId.ROADMAP, 
        // Nous activons les options de contrôle de la carte (plan, satellite...)
        mapTypeControl: true,
        // Nous désactivons la roulette de souris
        scrollwheel: false, 
        mapTypeControlOptions: {
            // Cette option sert à définir comment les options se placent
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR 
        },
        // Activation des options de navigation dans la carte (zoom...)
        navigationControl: true, 
        navigationControlOptions: {
            // Comment ces options doivent-elles s'afficher
            style: google.maps.NavigationControlStyle.ZOOM_PAN 
        }

    });
}

*/


	
