
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <script src="<?php echo base_url('/application/assets/js/map.js');?>" type="text/javascript"></script> 
  </head>
  <body>
  <style>
    #map {
      position: relative;
      width: 100%;
      height: 0;
      padding-bottom: 100%;
    }
  </style>

    <script>
    function showMap() {
      document.getElementById('mapDiv').style.display = "block";
      document.getElementById('ShowMapButton').style.display = "none";
      document.getElementById('HideMapButton').style.display = "block";
      document.getElementById("fillerMapDiv").style.width= "50%";
      google.maps.event.trigger(map, 'resize');

    }
    function hideMap() {
      document.getElementById("mapDiv").style.display = "none";
      document.getElementById('HideMapButton').style.display = "none";
      document.getElementById('ShowMapButton').style.display = "block";
      document.getElementById("fillerMapDiv").style.width= "100%";
      google.maps.event.trigger(map, 'resize');
    }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0bVsLgkZYZWMqGl4Fj_FVCxiMJ-IWt9E&signed_in=true&libraries=places&callback=initMap" async defer></script>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container"> 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $title; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo $title; ?></h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6" style="width:100%" id="fillerMapDiv">
          <h2>Heading</h2>
          <p>Spicing up your life! Hell yeah! </p>
                <a id="HideMapButton" class="btn btn-lg btn-secondary" onclick="hideMap()" style="display:none;">Hide Map</a>
                <a id="ShowMapButton" class="btn btn-lg btn-secondary" onclick='showMap()' style="display:block;">Show Map</a>
        </div>
        <div class="col-md-6" style="display:none;" id="mapDiv">
          <h2>The awesome map!</h2>
          <div id="map" ></div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Spice Up, Inc.</p>
      </footer>
    </div> <!-- /container -->

  </body>
</html>
