<!DOCTYPE html> 
<html style = "background-color: #F0F8FF">
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width"> 
  <title>Sistem Informasi Geografis</title> 
    <h1><center>Sistem Informasi Geografis Persebaran Lokasi KKN UNILA</center></h1> 
  <script src="http://maps.googleapis.com/maps/api/js"></script> 

  <script> 

var marker; 
   
function taruhMarker(peta, posisiTitik){ 
     
    if( marker ){ 
      marker.setPosition(posisiTitik); 
    } else { 
      marker = new google.maps.Marker({ 
        position: posisiTitik, 
        map: peta 
      }); 
    } 
    document.getElementById("lat").value = posisiTitik.lat(); 
    document.getElementById("lng").value = posisiTitik.lng(); 
 document.getElementById("info").value = posisiTitik.info(); 
     
} 
   
function initialize() { 
  var propertiPeta = { 
    center:new google.maps.LatLng(-4.5585849,105.4068079), 
    zoom:8, 
    mapTypeId:google.maps.MapTypeId.ROADMAP 
  }; 
   
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta); 
  var infoWindow = new google.maps.InfoWindow; 
  google.maps.event.addListener(peta, 'click', function(event) { 
    taruhMarker(this, event.latLng); 
  }); 
  google.maps.event.addListener(peta,'rightclick',function(event){ 
  marker.setPosition(null); 
  }); 

} 
    function bindInfoWindow(marker, map, infoWindow, html) { 
      google.maps.event.addListener(marker, 'click', function() { 
        infoWindow.setContent(html); 
        infoWindow.open(map, marker); 
      }); 
    } 

google.maps.event.addDomListener(window, 'load', initialize); 
   

</script> 

</head> 
<body> 

  <div id="googleMap" style="width:600px;height:300px;"></div> 
   
  <form style="width: 300px" action="" method="post"> 
 <table> 
 <tr>  
 <td> Latitude </td> <td>:</td> <td><input type="text" id="lat" name="lat" value=""> </td> </tr> 
 <tr>  
 <td> Longitude </td> <td>:</td> <td><input type="text" id="lng" name="lng" value=""> </td></tr> 
 <tr>  
 <td> Info </td> <td>:</td> <td><input type="text" id="info" name="info" value=""> </td></tr> 
 <tr> 
 <td><button type="tmb" class="tmb"><center>Submit</center></button></td> 
 </table> 
  </form> 
   
</body> 
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbbqT1TlPfBngjX21yWPHgSGFpWkUVnqw&callback=initMap"> 
</script> 
</html>