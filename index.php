<?php include ('./api/apiControl.php')?>
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

    <nav>
        <div class="nav-wrapper #ffff00 yellow accent-2">
            <a href="#!" class="brand-logo"><img class="logo" src="./public/pokebola.png"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down ">
                <li><a class="red-text " href="sass.html">Pokemon</a></li>
                <li><a class="red-text " href="badges.html">Marvel</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav #f44336 red" id="mobile-demo">
        <li><a class="#ffffff white-text" href=" sass.html">Pokemon</a></li>
        <li><a class="#ffffff white-text" href=" badges.html">Marvel</a></li>
    </ul>
    <div class="container">
        <div class="row">
        <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
        </div>
        <div class="row">
            <?php echo $cards; ?>
        </div>
        
    </div>
    <footer class="page-footer #ffff00 yellow accent-2">
          <div class="footer-copyright">
            © 2021 Copyright Sandro Amancio
          </div>
        </footer>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./js/javascript.js"></script>
</body>

</html>