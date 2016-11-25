<!DOCTYPE html>
<html>
<head>
	<title>LIGTAS</title>

	<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 500px;
      }
      #abc{
        width:100%;
        height:100%;
        opacity:.95;
        top:0;
        left:0;
        display:none;
        position:fixed;
        background-color:#313131;
        overflow:auto;
      }
      img#close{
        /*position:absolute;
        right:-14px;
        top:-14px;*/
        cursor:pointer;
        float:right;

      }
      div#popupContact{
        /*position:absolute;
        left:50%;
        top:17%;
        margin-left: -202px;*/
        margin-top:40px;
        font-family:'Raleway', sans-serif;
      }
      form{
        max-width:300px;
        min-height:250px;
        border: 2px solid gray;
        border-radius:10px;
        font-family:raleway;
        background-color:#fff;
      }

      #loc{
        border:none;
        width:85%;
        background:none;
        color:#4f604b;
        font-family: Arial;
        font-size: 15px;
        text-align: center;
      }
      .try{
        cursor: pointer;
  width:75%;
  height:47px;
  border-radius:5px;
  padding:5px;
  text-align: center;
  border:0px;
  font-family: arial;
  color:#fff;
  background:#42ac02;
  font-weight: bold;
      }
      .submitStyle:focus {
    outline:none;
}

    </style>

</head>

<body>
<center>
<div id="map"></div>
<script type="text/javascript">
      function showAndroidCameraHere(){
        Android.showAndroidCamera();

      }

      function getImage(src) {
        var img = document.createElement("IMG");
        img.setAttribute("width", "94");
        img.setAttribute("height", "70");
        img.setAttribute("alt", "Your image here");
        document.getElementById('imageHolder').appendChild(img);
      }
      



  //start from marker labels
  var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;
//end from marker labels

      function initMap() {

       
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
        center: {lat: 51.8752, lng: 176.0266},
});
var infoWindow = new google.maps.InfoWindow({map: map});

if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent("You are Here<br>"+"Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
              
          });
          

  //start from marker labels
       google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);
        });

        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        
  //end from marker labels

      }//function init end

      // Adds a marker to the map.
      function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map
          
        });

         marker.addListener('click', function(event) {
         document.getElementById('abc').style.display = "block";

         var latitude = this.position.lat();
         var longitude = this.position.lng();
        var geocoder;

geocoder = new google.maps.Geocoder();

var latlng = new google.maps.LatLng(latitude, longitude);geocoder.geocode(

   {'latLng': latlng},

   function(results, status) {

       if (status == google.maps.GeocoderStatus.OK) {

               if (results[0]) {

                   var add= results[0].formatted_address ;

                   var  value=add.split(",");                    count=value.length;

                   country=value[count-1];

                   state=value[count-2];

                   city=value[count-3];
                   street=value[count-4];

                   //alert( street+" , "+city+" City, "+state+", "+country);
                   
                    document.getElementById('loc').value= street+" , "+city+" City, "+state+", "+country;
                   

                   
               }

               else  {

                   alert("address not found");

               }

       }

        else {

           alert("Geocoder failed due to: " + status);

       }

   }

);

         document.getElementById('lat').value= latitude;

      document.getElementById('longg').value= longitude;

        });
          marker.addListener('tap', function(event) {
         
        // alert(this.position);
        });
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);https://foresthack2016.slack.com/archives/G25J2AZE1/p1472342084000003
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }

      google.maps.event.addDomListener(window, 'load', initialize);
//END Adds a marker to the map.
    
      function div_hide(){
        document.getElementById('abc').style.display = "none";
      }

      var lat = this.position.lat();

      var longg = this.position.lng();

      


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxjUT7DXGS98ShciphEaH9lUByHsx6wkY&callback=initMap">
    </script>

<div id="abc">
    <div id="popupContact">
      <form method="post" name="form">
        <img id="close" src="images/close.png" height="30px" width="30px" onclick="div_hide()">
        <center>
        <div class="imageCon">
        <!--<input type="file" accept="image/#" id="camera">-->
        <br>
        <input type="hidden" id="lat" disabled/>
        <input type="hidden" id="longg" disabled/>
          <textarea name="loc" id="loc" disabled></textarea>
        

        <div id="infoCon">

        </div>

        
        <button type="button" onClick="showAndroidCameraHere()" class="try"> Capture </button>
        <!--<a href="savingimage.php"><button type="button" class="try"> Try it </button></a>-->
        <div id ="imageHolder" width="100px" height="80px"><img src="about:blank" alt="" id="show-picture"></div>
         <br>

        

      </div>
    </center>
      </form>
    </div>



</center>

</body>
</html>
