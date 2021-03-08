<?php
//recebe o pokemon pele url
$pokemon = $_GET['var'];

//imprimi o card
echo $cards = createCardsPokemon($pokemon,$previous);


function createCardsPokemon($pokemon,$previous ){

    $urlPokemon = "https://pokeapi.co/api/v2/pokemon/{$pokemon}";
    $namesPokemon = json_decode(file_get_contents($urlPokemon));
   
    if(is_null($namesPokemon)){ 
        $cards = cardError();
        //se de algo errado imprimi card de error

    }else{

        $pokemon = getPokemonProperties($namesPokemon);
        $cards = createCardsUnique($pokemon,$previous);
        //tras pokemon solicitado
    }
    return $cards;
    
}

//pega propriedade do pokemon
function getPokemonProperties($namesPokemon){
    $pokemonProperties = [];
    $pokemonProperties[0] = $namesPokemon->forms[0]->name;  // 1 nome
    $pokemonProperties[1] = $namesPokemon->sprites->front_default; //2 imagem
    $pokemonProperties[2] = $namesPokemon->types[0]->type->name; // 3 tipo
    $pokemonProperties[3] = $namesPokemon->abilities[0]->ability->name; //4 habidade 1
    $pokemonProperties[4] = $namesPokemon->abilities[1]->ability->name; //5 habilidade 2
    $pokemonProperties[5] = ($namesPokemon->height)/10; //6 altura metros
    $pokemonProperties[6] = ($namesPokemon->weight)/10; //7  peso kg
    return $pokemonProperties;

}

//cria card do pockemon
function createCardsUnique($pokemon,$previous ){

    $name = $pokemon[0];
    $img = $pokemon[1];
    $type = $pokemon[2];
    $ability1 = $pokemon[3];
    $ability2 = $pokemon[4];
    $heigth = $pokemon[5];
    $weight = $pokemon[6];

    $cards ="";

        $cards .= 
       "<html>
       <head>
        <!--Import Google Icon Font-->
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
        <link href='./css/stylus.css' rel='stylesheet'>
        <!--Let browser know website is optimized for mobile-->
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />

</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class='nav-wrapper #ffff00 yellow accent-2'>
            <a href='index.php' class='brand-logo'><img class='logo'src='./public/pokebola.png'></a>
            <a href='index.php' data-target='mobile-demo' class='sidenav-trigger'><i class='material-icons'>menu</i></a>
            <ul class='right hide-on-med-and-down'>
                <li><a class='red-text'  href='index.php'>Pokemon</a></li>
            </ul>
        </div>
    </nav>
    <ul class='sidenav #f44336 red' id='mobile-demo'>
        <li><a class='#ffffff white-text' href='index.php'>Pokemon</a></li>
    </ul>

    <!-- Container -->
    <div class='container'>
        <div class='row'>
        <div class='card-unico'>
        <div class='card-header'>
        <img src='{$img}'/>
        </div>
        <div class='card-body'>
        <h4>{$name}</h4>
        <p>Type: {$type}</p>
        <p>Skllis: {$ability1}, {$ability2}</p>
        <p>Altura: {$heigth}</p>
        <p>Peso: {$weight}</p>
        <a class='card-btn'href='./'>Voltar</a>
        </div>
        </div>
        </div>
        </form>
    </div>
    <!-- Footer -->
    <!--JavaScript at end of body for optimized loading-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <script src=''./js/javascript.js'></script>
</body>
</html>";
    return $cards;

}

//Cria card de error
function cardError(){

    $cards ="";
        $cards .= "<div class='card-unico'>
        <div class='card-header'>
        <img src='./public/chorando.gif'/>
        </div>
        <div class='card-body'>
        <h4>Desculpe!</h4>
        <p>Talvez o nome ou número do pokemon seja inválido, tente outro.</p>
        <a href='index.php' class='card-btn'>Voltar</a>
        </div>
        </div>";

    return $cards;
}
