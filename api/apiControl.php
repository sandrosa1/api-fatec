<?php
$cards="";
 $pokemon = ""; 
$cards="";
$id = 1;
$n = rand(8,1118);
$n2 = $n - 8;

$urlNomes = "https://pokeapi.co/api/v2/pokemon?limit={$n}&offset={$n2}";
$namesPokemons = json_decode(file_get_contents($urlNomes));
$pokemon = isset($_POST["pokemon"]) ? $_POST["pokemon"]: ""; 

$i = 0;
$names = [];
$urlPokemons = [];
foreach($namesPokemons->results as $value){
    $names[$i] = $value->name;
    $urlPokemons[$i] = $value->url;
    $i++;
}

if(isset($_POST['action'])){

   if($pokemon == ""){
        $cards = createCards($names,$urlPokemons);

   }
   else
   {
        $cards = createCardsPokemon($pokemon);
        
   }
    

}else{

    $cards = createCards($names,$urlPokemons);
}


function createCardsPokemon($pokemon){

    $urlPokemon = "https://pokeapi.co/api/v2/pokemon/{$pokemon}";
    $namesPokemon = json_decode(file_get_contents($urlPokemon));
   
    if(is_null($namesPokemon)){ 
        $cards = cardError();
        

    }else{

        $pokemon = getPokemonProperties($namesPokemon);
        $cards = createCardsUnique($pokemon);
        
    }
    return $cards;
    
}

function getImage($imgPokemon){

    $urlNomes = $imgPokemon;
    $namesPokemons = json_decode(file_get_contents($urlNomes));

    return $namesPokemons->sprites->front_default;

}

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

function createCards($names,$urlPokemons){

    $cards ="";
    for($j = 0; $j < 8; $j++ ){ 
        $pokemom = $names[$j];
        $urlPokemon = $urlPokemons[$j];
        $imgPokemon = getImage($urlPokemon);
        $cards .= "<div class='card'>
        <div class='card-header'>
        <img src='{$imgPokemon}'/>
        </div>
        <div class='card-body'>
        <h4>{$pokemom}</h4>
            <a nome='{$urlPokemon}' class='btn'>Saiba mais</a>
        </div>
    </div>";
    
    }

    return $cards;

}


function createCardsUnique($pokemon){

    $name = $pokemon[0];
    $img = $pokemon[1];
    $type = $pokemon[2];
    $ability1 = $pokemon[3];
    $ability2 = $pokemon[4];
    $heigth = $pokemon[5];
    $weight = $pokemon[6];

    $cards ="";

        $cards .= "<div class='card-unico'>
        <div class='card-header'>
        <img src='{$img}'/>
        </div>
        <div class='card-body'>
        <h4>{$name}</h4>
        <p>Type: {$type}</p>
        <p>Skllis: {$ability1}, {$ability2}</p>
        <p>Altura: {$heigth}</p>
        <p>Peso: {$weight}</p>
        </div>
        </div>";
    return $cards;

}


function cardError(){

    $cards ="";
        $cards .= "<div class='card-unico'>
        <div class='card-header'>
        <img src='./public/chorando.gif'/>
        </div>
        <div class='card-body'>
        <h4>Desculpe!</h4>
        <p>Talvez o nome ou número do pokemon seja inválido, tente outro.</p>
        </div>
        </div>";

    return $cards;
}
