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
    <!-- Navbar -->
    <nav>
        <div class="nav-wrapper #ffff00 yellow accent-2">
            <a href="index.php" class="brand-logo"><img class="logo" src="./public/pokebola.png"></a>
            <a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down ">
                <li><a class="red-text " href="index.php">Pokemon</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav #f44336 red" id="mobile-demo">
        <li><a class="#ffffff white-text" href="index.php">Pokemon</a></li>
    </ul>

    <!-- Container -->
    <div class="container">
        <!-- Pesquisa pokemon -->
        <div class="row">
            <div class="col s4 offset-s8" style="width:350px;background:white;border-radius:5px;">
                <form id="form" method="POST" action="index.php">
                    <div class="autocomplete " style="width:200px;">
                        <input id="myInput" type="text" name="pokemon" placeholder="Procurar Pokemon">
                    </div>
                    <input type="submit" name="action" value="Pesquisar"
                        style="background: linear-gradient(to right, #41bdff, #402bff); margin:13px 0 0 15px;">
                </form>
            </div>
            
        </div>
        <!-- Cards pokemon -->
        <form method="get" action="index.php">
            <div class="row" id="cards">
                <?php echo $cards; ?>
            </div>
        </form>
    </div>
    <!-- Footer -->

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./js/javascript.js"></script>

</body>

</html>