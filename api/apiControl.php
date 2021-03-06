<?php
$cards="";
$id = 1;
$urlNomes = "https://pokeapi.co/api/v2/pokemon?limit=151&offset=0";

$namesPokemons = json_decode(file_get_contents($urlNomes));

$i = 0;
$names = [];
$urlPokemons = [];
foreach($namesPokemons->results as $value){
    $names[$i] = $value->name;
    $urlPokemons[$i] = $value->url;
    $i++;
}

//var_dump($urlPokemons);

$cards = createCards($names,$urlPokemons);

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
            <a href='#' class='btn'>Saiba mais</a>
        </div>
    </div>";
    
    }

    return $cards;

}


function getImage($imgPokemon){

    $urlNomes = $imgPokemon;
    $namesPokemons = json_decode(file_get_contents($urlNomes));

    return $namesPokemons->sprites->front_default;

}




