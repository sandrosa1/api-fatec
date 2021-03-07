<?php // include ('./api/apiControl.php')?>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="./css/stylus.css" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
<!-- Navbar -->
    <nav>
        <div class="nav-wrapper #ffff00 yellow accent-2">
            <a href="#!" class="brand-logo"><img class="logo" src="./public/pokebola.png"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down ">
                <li><a class="red-text " href="index.php">Pokemon</a></li>
                <li><a class="red-text " href="marvel.php">Marvel</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav #f44336 red" id="mobile-demo">
        <li><a class="#ffffff white-text" href="index.php">Pokemon</a></li>
        <li><a class="#ffffff white-text" href="marvel.php">Marvel</a></li>
    </ul>

<!-- Container -->
    <div class="container">
<!-- Pesquisa pokemon -->
<form autocomplete="off" action="/action_page.php">
  <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Country">
  </div>
  <input type="submit">
</form>
    </div>
<!-- Footer -->
   
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./js/javascript2.js"></script>
</body>

</html>